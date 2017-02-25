# -*- coding: utf-8 -*-

import json
import os
import csv
import unicodedata
import sys
import zipfile
import urllib
from pprint import pprint

sets = ('LEA', 'LEB', 'ARN', '2ED', 'pDRC', 'ATQ', '3ED', 'LEG', 'DRK', 'FEM', '4ED',
        'ICE', 'CHR', 'HML', 'ALL', 'MIR', 'VIS', '5ED', 'VAN', 'POR',
        'WTH', 'TMP', 'STH', 'PO2', 'EXO', 'USG', 'ULG', '6ED', 'PTK', 'UDS',
        'S99', 'MMQ', 'BRB', 'NMS', 'PCY', 'BTD', 'INV', 'PLS',
        '7ED', 'APC', 'ODY', 'TOR', 'JUD', 'ONS', 'LGN', 'SCG', '8ED', 'MRD', 'DST', '5DN',
        'CHK', 'BOK', 'SOK', '9ED', 'RAV', 'GPT', 'DIS', 'CSP', 'TSB', 'TSP',
        'PLC', 'FUT', '10E', 'MED', 'LRW', 'EVG', 'MOR', 'SHM',
        'EVE', 'DRB', 'ME2', 'ALA', 'DD2', 'CON', 'DDC', 'ARB', 'M10', 'V09', 'HOP', 'ME3', 'ZEN', 'DDD', 'H09',
        'WWK', 'DDE', 'ROE', 'ARC', 'M11', 'V10', 'DDF', 'SOM', 'PD2', 'ME4', 'MBS', 'DDG', 'NPH', 'CMD', 'M12',
        'V11', 'DDH', 'ISD', 'PD3', 'DKA', 'DDI', 'AVR', 'PC2', 'M13', 'V12', 'DDJ', 'RTR', 'CM1', 'GTC', 'DDK',
        'DGM', 'MMA', 'M14', 'V13', 'DDL', 'THS', 'C13', 'BNG', 'DDM', 'JOU', 'MD1', 'CNS', 'VMA', 'M15', 'V14',
        'DDN', 'KTK', 'C14', 'DD3_GVL', 'DD3_DVD', 'DD3_EVG', 'DD3_JVC', 'FRF_UGIN', 'FRF', 'DDO', 'DTK', 'TPR', 'MM2',
        'ORI', 'V15', 'DDP', 'EXP', 'BFZ', 'C15', 'OGW', 'DDQ', 'W16', 'SOI', 'EMA', 'EMN', 'V16', 'CN2', 'DDR', 'KLD',
        'MPS', 'C16', 'PCA', 'AER', )
# This list was generated using AllSets-x.json. They were ordered chronologically by the printed date.
# Furthermore, sets without multiverseids as well as un-sets were removed.

def download_mtg_json():
    urllib.urlretrieve("http://www.mtgjson.com/json/AllSets-x.json.zip", "AllSets-x.json.zip")
    zip_ref = zipfile.ZipFile("AllSets-x.json.zip", 'r')
    zip_ref.extractall()
    zip_ref.close()
    os.remove("AllSets-x.json.zip")

def view_cards(set): #Useful for reviewing data before jumping into it

    for card in data[set]["cards"]:
        pprint(card["multiverseid"])
        pprint(card["name"])
        pprint(card["rarity"])

def check_match(card):
    if card['layout'] == 'vanguard' or card['layout'] == 'token' or card['layout'] == 'plane' or \
                    card['layout'] == 'scheme' or card['layout'] == 'phenomenon':
        return True #Skip vanguard, token, plane, scheme and phenomenon cards
    with open('master.csv', 'rU') as csvfile:
        masterreader = csv.reader(csvfile)
        #Each distinct card needs a distinct name. Certain card-types must be handled differently:
        if card['layout'] == 'split':
            name = card['names'][0] + '//' + card['names'][1]
        elif card['layout'] == 'flip':
            name = card['names'][0]
        elif card['layout'] == 'double-faced':
            name = card['names'][0]
        else:
            name = card['name']

        if card['layout'] == 'meld' and card['name'] == card['names'][2]:
            return True #MTGJSON considers combined meld cards as unique cards, I do not.


        for row in masterreader:
            if row[1] == unicodedata.normalize('NFKD', name).encode('ascii', 'ignore'): #The Dandân clause
                return True #There is a match
        return False #There is not a match

def Add_card(card): #where card is a card object from AllSets-x.json
    if check_match(card):
        print(card["name"] + " exists in master.csv. Skipping...")
    else:
        print(card["name"] + " is not in master.csv. Adding...")
        with open('master.csv', 'rU') as csvfile:
            masterreader = csv.reader(csvfile)
            ID = sum(1 for row in masterreader)
        mc = open('master.csv', 'a')
        writer=csv.writer(mc)
        myCsvRow = [ID, unicodedata.normalize('NFKD', card["name"]).encode('ascii', 'ignore'), card["multiverseid"]]
        if card['layout'] == 'split':
            myCsvRow = [ID, unicodedata.normalize('NFKD', card['names'][0] + '//' + card['names'][1]).encode('ascii', 'ignore'), card["multiverseid"]]
        writer.writerow(myCsvRow)
        mc.close()

download_mtg_json()
with open('AllSets-x.json') as data_file:
   data = json.load(data_file)
#Build master.csv: ID/Name/MultiverseID
for set in sets:
    for card in data[set]["cards"]:
        Add_card(card)
#Download images from gatherer for all cards listed in master.csv:
with open('master.csv', 'rU') as csvfile:
    masterreader = csv.reader(csvfile)
    for row in masterreader:
        mvid = row[2]
        localid = row[0]
        urllib.urlretrieve("http://gatherer.wizards.com/Handlers/Image.ashx?multiverseid=" + mvid + "&type=card", "pics/" + localid + ".jpg")


