<?php /* Template Name: Master_Pack
 * Custom template for displaying booster packs. Current up to 7th Edition
 */
?>

<?php get_header();?> 
<?php
function randomGen($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}
$meta = get_post_meta( get_the_ID() );
$site_url = get_site_url();
$set = $meta['set_code'][0];
echo "<center><a href = " . $site_url . "/stats-" . $set . ">Go To Stats</center></a><br>";

//Rarity counts
global $wpdb;
$set_size = $wpdb->get_var( 'SELECT COUNT(*) FROM set_' . $set);
$specials = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_s');
$mythics = $wpdb->get_var( 'SELECT COUNT(*) FROM '. strtolower($set) . '_m');	
$rares = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_r');
$uncommons = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_u');
$commons = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_c');
$basic_lands = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_bl');
$common_foil_replacement = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_cbl');

if ($set == "PLC") {
	$ts_cs = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_tsc');
	$ts_urs = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_tsur');
	$TSC = randomGen(0, $ts_cs-1, 3);
} elseif ($set == "ISD" OR $set == "DKA" OR $set == "SOI" OR $set == "EMN") {
	$df_mythics = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_dfm');
	$df_rares = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_dfr');
	$df_uncommons = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_dfu');
	$df_commons = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_dfc');
	$nondfsize = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_nondf');
} elseif ($set == "DGM") {
	$set_size -= 20;
	$commons -= 10;
	$rares -= 10;
} elseif ($set == "CNS") {
	$dm_rares = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_dmr');
	$dm_uncommons = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_dmu');
	$dm_commons = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_dmc');
	$nondfsize = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_nondf');
} elseif ($set == "CN2") {
	$dm_mythics = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_dmm');
	$dm_rares = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_dmr');
	$dm_uncommons = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_dmu');
	$dm_commons = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_dmc');
	$nondfsize = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_nondf');
} elseif ($set == "FRF") {
	$set_size -= 5;
	$nonbasiclands = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . strtolower($set) . '_nonbl');
} elseif ($set == "BFZ") {
	$set_size -= 25;
	$masterpieces = 25;
} elseif ($set == "OGW" ) {
	$set_size -= 45;
	$masterpieces = 20;
} elseif ($set == "KLD" ) {
	$set_size -= 30;
	$masterpieces = 30;
} elseif ($set == "AER" ) {
	$set_size -= 44;
	$masterpieces = 24;
} elseif ($set == "AKH" ) {
	$set_size -= 30;
	$masterpieces = 30;
	}
	

$hashstring = (string)$time;
$U = randomGen(0, $uncommons-1, 3);
$C = randomGen(0, $commons-1, 11);
$BL = randomGen(0, $basic_lands-1, 3);
$CFR = randomGen(0, $common_foil_replacement-1, 1);
$foil = rand(0, 5);
$mythic = rand(0, 7);
$foil_card = 50;

if ($set == "LEA" OR $set == "LEB" OR $set == "2ED" OR $set == "3ED" OR $set == "LEG" OR 
	$set == "4ED" OR $set == "ICE" OR $set == "MIR" OR $set == "VIS" OR $set == "5ED" OR
	$set == "POR" OR $set == "WTH" OR $set == "TMP" OR $set == "STH" OR $set == "EXO" OR
	$set == "PO2" OR $set == "USG" OR $set == "6ED" OR $set == "ULG" OR $set == "UDS" OR
	$set == "MMQ" OR $set == "NMS" OR $set == "PCY" OR $set == "INV" OR $set == "PLS" OR
	$set == "APC" OR $set == "ODY" OR $set == "TOR" OR $set == "JUD" OR $set == "ONS" OR
	$set == "LGN" OR $set == "SCG" OR $set == "MRD" OR $set == "DST" OR $set == "5DN" OR
	$set == "CHK" OR $set == "BOK" OR $set == "SOK" OR $set == "RAV" OR $set == "GPT" OR 
	$set == "DIS" OR $set == "CSP") {
	//Old_15_Cards and Bulk_Mid_Foils and Pack_Pre_TSP_Base
	$pack_size = 15;
	$pack = array(
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1)),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[9]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[10])
	);
} elseif ($set == "ARN" OR $set == "ATQ" OR $set == "DRK" OR $set == "FEM" OR $set == "HML") {
	//Old_8_Cards
	$pack_size = 8;
	$pack = array(
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
	);
} elseif ($set == "CHR" OR $set == "ALL") {
	//Old_12_Cards
	$pack_size = 12;
	$pack = array(
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1)),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
	);
} elseif ($set == "UGL") {
	//Unglued
	$pack_size = 8;
	$pack = array(
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1)),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_bl LIMIT 1 OFFSET ' . rand(0, $basic_lands -1))
	);
} elseif ($set == "PTK") {
	//Portal 3 Kingdoms
	$pack_size = 10;
	$pack = array(
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1)),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_bl LIMIT 1 OFFSET ' . $BL[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_bl LIMIT 1 OFFSET ' . $BL[1])
	);
} elseif ($set == "S99") {
	//Starter 1999
	$pack_size = 15;
	$pack = array(
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1)),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_bl LIMIT 1 OFFSET ' . $BL[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_bl LIMIT 1 OFFSET ' . $BL[1])
	);
} elseif ($set == "7ED" OR $set == "8ED" OR $set == "9ED") {
	//Core_789
	$pack_size = 15;
	$pack = array(
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1)),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[9]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_bl LIMIT 1 OFFSET ' . rand(0, $basic_lands -1))
	);
} elseif ($set == "UNH") {
	//Unhinged
	$pack_size = 15;
	$pack = array(
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -2)),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[9]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[10])
	);
} elseif ($set == "TSP") {
	//Time Spiral
	$pack_size = 15;
	$pack = array(
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1)),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[9]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_s LIMIT 1 OFFSET ' . rand(0, $specials -1))
	);
} elseif ($set == "PLC") {
	//Planar Chaos
	$pack_size = 15;
	$pack = array(
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1)),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_tsur LIMIT 1 OFFSET ' . rand(0, $ts_urs -1)),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_tsc LIMIT 1 OFFSET ' . $TSC[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_tsc LIMIT 1 OFFSET ' . $TSC[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_tsc LIMIT 1 OFFSET ' . $TSC[2])
	);
} elseif ($set == "FUT" OR $set == "LRW" OR $set == "MOR" OR $set == "SHM" OR $set == "EVE") {
	//R3U11C_WFoil
	$pack_size = 15;
	$pack = array(
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1)),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[9]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[10])
	);
} elseif ($set == "10E" OR $set == "MED" OR $set == "ME2" OR $set == "ME3" OR $set == "ME4") {
	//R3U11C1BL_WFoil
	$pack_size = 15;
	$pack = array(
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1)),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[9]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_bl LIMIT 1 OFFSET ' . rand(0, $basic_lands -1)),
	);
} elseif ($set == "ALA" OR $set == "CON" OR $set == "ARB" OR $set == "M10" OR $set == "ZEN" OR
		  $set == "WWK" OR $set == "ROE" OR $set == "M11" OR $set == "SOM" OR $set == "MBS" OR
		  $set == "NPH" OR $set == "M12" OR $set == "AVR" OR $set == "M13" OR $set == "RTR" OR
		  $set == "GTC" OR $set == "M14" OR $set == "THS" OR $set == "BNG" OR $set == "JOU" OR 
		  $set == "M15" OR $set == "KTK" OR $set == "DTK" OR $set == "TPR" OR $set == "ORI" OR
		  $set == "MMA" OR $set == "MM2" OR $set == "MM3" OR $set == "EMA") {
	//Mythic_Base_Set and Mythic_Expansion
	$pack_size = 15;
	if ($mythic == 7) {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_m LIMIT 1 OFFSET ' . rand(0, $mythics -1 ));
		} else {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1 ));
		}
	
	$pack = array(
		$topcard,
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[9]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_bl LIMIT 1 OFFSET ' . rand(0, $basic_lands -1)),
	);
} elseif ($set == "DGM") {
	//Dragon's Maze
	$pack_size = 15;
	if ($mythic == 7) {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_m LIMIT 1 OFFSET ' . rand(0, $mythics -1 ));
		} else {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares - 1 ));
		}
	$land_roll = rand(0, 20);
	if ($land_roll == 20) {
		$land_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(35, 44));
	} else {	
	$land_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . rand(60, 69));
}
	$pack = array(
		$topcard,
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[9]),
		$land_card
	);
} elseif ($set == "ISD") {
	//Innistrad
	$pack_size = 15;
	if ($mythic == 7) {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_m LIMIT 1 OFFSET ' . rand(0, $mythics -1 ));
		} else {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1 ));
	}
	$double_sided = rand(0, 120);
	if ($double_sided == 0) {
		$df_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dfm LIMIT 1 OFFSET 0');
		} elseif ($double_sided > 0 and $double_sided < 13) {
		$df_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dfr LIMIT 1 OFFSET ' . rand(0, $df_rares - 1));
		} elseif ($double_sided > 12 and $double_sided < 55) {
		$df_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dfu LIMIT 1 OFFSET ' . rand(0, $df_uncommons - 1));
		} elseif ($double_sided > 54) {
		$df_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dfc LIMIT 1 OFFSET ' . rand(0, $df_commons - 1));
		}
	if ($foil == 5) {
		$foil_df = rand(0, 263);
		if ($foil_df < 20) {
			$last_common = 	$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]);
			$foil_card = 13;
			$df_foil = true;
		} else {
			$last_common = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_nondf LIMIT 1 OFFSET ' . rand(0, $nondfsize -1 ));
			$df_foil = false;
			$foil_card = 12;
		}
	} else {
		$last_common = 	$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]);
	}
	$pack = array(
		$topcard,
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
		$last_common,
		$df_card,
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_bl LIMIT 1 OFFSET ' . rand(0, $basic_lands -1)),
	);
} elseif ($set == "DKA") {
	//Dark Ascension
	$pack_size = 15;
	if ($mythic == 7) {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_m LIMIT 1 OFFSET ' . rand(0, $mythics -1 ));
		} else {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1 ));
	}
	$double_sided = rand(0, 79);
	if ($double_sided == 0 or $double_sided == 1) {
		$df_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dfm LIMIT 1 OFFSET ' . rand(0, $df_mythics - 1));
		} elseif ($double_sided > 1 and $double_sided < 9) {
		$df_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dfr LIMIT 1 OFFSET ' . rand(0, $df_rares - 1));
		} elseif ($double_sided > 8 and $double_sided < 33) {
		$df_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dfu LIMIT 1 OFFSET ' . rand(0, $df_uncommons - 1));
		} elseif ($double_sided > 32) {
		$df_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dfc LIMIT 1 OFFSET ' . rand(0, $df_commons - 1));
		}
	if ($foil == 5) {
		$foil_df = rand(0, 157);
		if ($foil_df < 13) {
			$last_common = 	$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]);
			$foil_card = 13;
			$df_foil = true;
		} else {
			$last_common = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_nondf LIMIT 1 OFFSET ' . rand(0, $nondfsize -1 ));
			$df_foil = false;
			$foil_card = 12;
		}
	} else {
		$last_common = 	$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]);
	}
	$pack = array(
		$topcard,
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
		$last_common,
		$df_card,
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_bl LIMIT 1 OFFSET ' . rand(0, $basic_lands -1)),
	);
} elseif ($set == "CNS") {
	//Conspiracy
	$pack_size = 15;
	if ($mythic == 7) {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_m LIMIT 1 OFFSET ' . rand(0, $mythics -1 ));
		} else {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1 ));
	}
	$dm_roll = rand(0, 59);
	if ($dm_roll < 9) {
		$dm_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dmr LIMIT 1 OFFSET ' . rand(0, $dm_rares - 1 ));
	} elseif ($dm_roll > 8 and $dm_roll < 25) {
		$dm_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dmu LIMIT 1 OFFSET ' . rand(0, $dm_uncommons - 1 ));
	} elseif ($dm_roll > 24) {	
		$dm_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dmc LIMIT 1 OFFSET ' . rand(0, $dm_commons - 1 ));
	}
	$pack = array(
		$topcard,
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[9]),
		$dm_card,
	);
} elseif ($set == "VMA") {
	//Vintage Masters
	$pack_size = 15;
	if ($mythic == 7) {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_m LIMIT 1 OFFSET ' . rand(0, $mythics -1 ));
		} else {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1 ));
	}
	$special = rand(0, 39);
	$foil_p9 = rand(0, 14);
	if ($special == 39) {
		$last_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . "_s LIMIT 1 OFFSET " . rand(0, $specials -1 ));
		if ($foil_p9 == 14) {
			$foil_card = 14;
			}  else {
			$last_card = $wpdb->get_var( ' SELECT multiverseID FROM set_' . $set . ' LIMIT 1 OFFSET ' . rand(0, $set_size +8 ));
			$foil_card = 14;
		} }  else {
		$last_card = $wpdb->get_var( ' SELECT multiverseID FROM set_' . $set . ' LIMIT 1 OFFSET ' . rand(0, $set_size +8 ));
		$foil_card = 14;
	}
	$pack = array(
		$topcard,
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[9]),
		$last_card,
	);
} elseif ($set == "FRF") {
	//Fate Reforged
	$pack_size = 15;
	if ($mythic == 7) {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_m LIMIT 1 OFFSET ' . rand(0, $mythics -1 ));
		} else {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1 ));
	}
	$land_roll = rand(0, 21);
	if ($land_roll == 21) {
		$land_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_fetches LIMIT 1 OFFSET ' . rand(0, 5));
	} else {
		$land_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_nonbl LIMIT 1 OFFSET ' . rand(0, $nonbasiclands -1 ));
	}

	$pack = array(
		$topcard,
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[9]),
		$land_card,
	);
} elseif ($set == "BFZ" OR $set == "OGW" OR $set == "KLD" OR $set == "AER" OR $set == "AKH") {
	//Masterpiece Sets
	$pack_size = 15;
	if ($mythic == 7) {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_m LIMIT 1 OFFSET ' . rand(0, $mythics -1 ));
		} else {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1 ));
	}
	$masterpiece = rand(0, 431);
	$foil = rand(0, 5);
	if ($foil == 5) {
		$last_card = $wpdb->get_var( ' SELECT multiverseID FROM set_' . $set . ' LIMIT 1 OFFSET ' . rand(0, $set_size -1 ));
		$foil_card = 13;
	} else {
		$last_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[9]);
	}
	if ($masterpiece == 431) {
		$last_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_s LIMIT 1 OFFSET ' . rand(0, $masterpieces-1));
		$foil_card = 13;
	}

	$pack = array(
		$topcard,
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]),
		$last_card,
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_bl LIMIT 1 OFFSET ' . rand(0, $basic_lands -1)),
	);
} elseif ($set == "SOI" OR $set == "EMN") {
	//Shadows over Innistrad
	$pack_size = 15;
	if ($mythic == 7) {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_m LIMIT 1 OFFSET ' . rand(0, $mythics -1 ));
		} else {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1 ));
	}
	$twodf = rand(0, 7);
	if ($twodf == 7) {
		$double_sided = rand(0, 120);
		$twodfcs = true;
		if ($double_sided < 4) {
			$last_common = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dfm LIMIT 1 OFFSET ' . rand(0, $df_mythics -1));
		} elseif ($double_sided > 3 and $double_sided < 16) {
			$last_common = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dfr LIMIT 1 OFFSET ' . rand(0, $df_rares -1));
		} elseif ($double_sided > 15 and $double_sided < 54) {
			$last_common = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dfu LIMIT 1 OFFSET ' . rand(0, $df_uncommons -1));
		} elseif ($double_sided > 53) {
			$last_common = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dfc LIMIT 1 OFFSET ' . rand(0, $df_commons -1));
		}
	} else {
	$last_common = 	$wpdb->get_var( ' SELECT multiverseID FROM ' . $set . '_c LIMIT 1 OFFSET ' . $C[7]);
	}
	if ($foil == 5) {
		$foil_df = rand(0, 296);
		if ($twodfcs) {
			if ($foil_df < 32) {
				$secondtolastcommon = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]);
				$df_foil = true;
			} else {
				$secondtolastcommon = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_nondf LIMIT 1 OFFSET ' . rand(0, $nondfsize -1 ));
			}
		} else {
			if ($foil_df < 32) {
				$secondtolastcommon = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]);
				$last_common = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]);
				$df_foil = true;
			} else {
				$last_common = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_nondf LIMIT 1 OFFSET ' . rand(0, $nondfsize -1 ));
				$secondtolastcommon = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]);
				$df_foil = false;
			}
		}
	} else {
		if ($twodfcs) {
			$secondtolastcommon = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]);
		} else {
			$last_common = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]);
			$secondtolastcommon = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]);
	}
}

	$double_sided = rand(0, 120);
	if ($double_sided < 4) {
			$df_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dfm LIMIT 1 OFFSET ' . rand(0, $df_mythics -1));
		} elseif ($double_sided > 3 and $double_sided < 16) {
			$df_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dfr LIMIT 1 OFFSET ' . rand(0, $df_rares -1));
		} elseif ($double_sided > 15 and $double_sided < 54) {
			$df_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dfu LIMIT 1 OFFSET ' . rand(0, $df_uncommons -1));
		} elseif ($double_sided > 53) {
			$df_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dfc LIMIT 1 OFFSET ' . rand(0, $df_commons -1));
		}


	$pack = array(
		$topcard,	
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$secondtolastcommon,
		$last_common,
		$df_card,
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_bl LIMIT 1 OFFSET ' . rand(0, $basic_lands -1)),
	);
} elseif ($set == "CN2") {
	//Conspiracy 2
	$pack_size = 15;
	if ($mythic == 7) {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_m LIMIT 1 OFFSET ' . rand(0, $mythics -1 ));
		} else {
	$topcard = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_r LIMIT 1 OFFSET ' . rand(0, $rares -1 ));
	}
	$foil = rand(0, 5);
	if ($foil == 5) {
		$last_card = $wpdb->get_var( ' SELECT multiverseID FROM set_' . $set . ' LIMIT 1 OFFSET ' . rand(0, $set_size -1 ));
	} else {
		$last_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[9]);
	}

	$dm_roll = rand(0, 119);
	if ($dm_roll < 2) {
		$dm_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dmm LIMIT 1 OFFSET ' . rand(0, $dm_mythics -1 ));
	} elseif ($dm_roll > 1 and $dm_roll < 18) {
		$dm_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dmr LIMIT 1 OFFSET ' . rand(0, $dm_rares - 1 ));
	} elseif ($dm_roll > 17 and $dm_roll < 47) {
		$dm_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dmu LIMIT 1 OFFSET ' . rand(0, $dm_uncommons -1 ));
	} elseif ($dm_roll > 46) {
		$dm_card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_dmc LIMIT 1 OFFSET ' . rand(0, $dm_commons -1 ));
	}

	$pack = array(
		$topcard,	
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_u LIMIT 1 OFFSET ' . $U[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[7]),
		$wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_c LIMIT 1 OFFSET ' . $C[8]),
		$last_card,
		$dm_card
		);
} elseif ($set == "P1P") {
	//Wacky pack
	$pack_size = 15;
	$W = randomGen(0, $set_size-1, 15);
	$pack = array(
		$wpdb->get_var( ' SELECT multiverseID FROM set_P1P LIMIT 1 OFFSET ' . $W[0]),
		$wpdb->get_var( ' SELECT multiverseID FROM set_P1P LIMIT 1 OFFSET ' . $W[1]),
		$wpdb->get_var( ' SELECT multiverseID FROM set_P1P LIMIT 1 OFFSET ' . $W[2]),
		$wpdb->get_var( ' SELECT multiverseID FROM set_P1P LIMIT 1 OFFSET ' . $W[3]),
		$wpdb->get_var( ' SELECT multiverseID FROM set_P1P LIMIT 1 OFFSET ' . $W[4]),
		$wpdb->get_var( ' SELECT multiverseID FROM set_P1P LIMIT 1 OFFSET ' . $W[5]),
		$wpdb->get_var( ' SELECT multiverseID FROM set_P1P LIMIT 1 OFFSET ' . $W[6]),
		$wpdb->get_var( ' SELECT multiverseID FROM set_P1P LIMIT 1 OFFSET ' . $W[7]),
		$wpdb->get_var( ' SELECT multiverseID FROM set_P1P LIMIT 1 OFFSET ' . $W[8]),
		$wpdb->get_var( ' SELECT multiverseID FROM set_P1P LIMIT 1 OFFSET ' . $W[9]),
		$wpdb->get_var( ' SELECT multiverseID FROM set_P1P LIMIT 1 OFFSET ' . $W[10]),
		$wpdb->get_var( ' SELECT multiverseID FROM set_P1P LIMIT 1 OFFSET ' . $W[11]),
		$wpdb->get_var( ' SELECT multiverseID FROM set_P1P LIMIT 1 OFFSET ' . $W[12]),
		$wpdb->get_var( ' SELECT multiverseID FROM set_P1P LIMIT 1 OFFSET ' . $W[13]),
		$wpdb->get_var( ' SELECT multiverseID FROM set_P1P LIMIT 1 OFFSET ' . $W[14])
		);
}

//Foil handling for foils that replace the same rarity
//Bulk_Mid_Foils
if ($foil == 5 AND ($set == "ULG" OR $set == "UDS" OR $set == "NMS" OR $set == "PCY" OR
					$set == "PLS" OR $set == "APC" OR $set == "TOR" OR $set == "JUD" OR
					$set == "LGN" OR $set == "SCG" OR $set == "DST" OR $set == "5DN" OR
					$set == "GPT" OR $set == "DIS" OR $set == "CSP")) {
		$foil_card = rand(0, 14);
		if ($pack[$foil_card] == 26408) {
			$pack[$foil_card] = 29291;
			}
		if ($pack[$foil_card] == 25614) {			
			$pack[$foil_card] = 29292;
			}
		if ($pack[$foil_card] == 26480) {
			$pack[$foil_card] = 29293;
			}
	} 
//Foil handling for foils that replace the same rarity but may be a basic land if they replace a common
//Pre_TSP_Base and Core789
if ($foil == 5 AND ($set == "MMQ" OR $set == "INV" OR $set == "7ED" OR $set == "ODY" OR 
					$set == "ONS" OR $set == "8ED" OR $set == "MRD" OR $set == "CHK" OR
					$set == "UNH" OR $set == "BOK" OR $set == "SOK" OR $set == "9ED" OR
					$set == "RAV")) {
		$sst = rand(0,9);
		if ($sst == 9 AND $set == "UNH") {
			$foil_card = 0;
			$pack[$foil_card] = 74272;
		} else {
			$foil_card = rand(0, 14);
			$foil_rarity = $wpdb->get_var('SELECT Rarity from set_' . strtolower($set) . ' WHERE multiverseID = ' . $pack[$foil_card]);
			if ($foil_rarity == "Common" OR "Basic Land") {
				$card = $wpdb->get_var( ' SELECT multiverseID FROM ' . strtolower($set) . '_cbl LIMIT 1 OFFSET ' . $CFR[0]);
				$pack[$foil_card] = $card;
			}
		}	
	}
if ($foil == 5 AND ($set == "TSP" OR $set == "FUT" OR $set == "10E" OR $set == "MED" OR
					$set == "ME2" OR $set == "ME3" OR $set == "ME4" OR $set == "ALA" OR
					$set == "CON" OR $set == "ARB" OR $set == "M10" OR $set == "ZEN" OR
		 			$set == "WWK" OR $set == "ROE" OR $set == "M11" OR $set == "SOM" OR 
		 			$set == "MBS" OR $set == "NPH" OR $set == "M12" OR $set == "AVR" OR 
		 			$set == "M13" OR $set == "RTR" OR $set == "GTC" OR $set == "M14" OR 
		 			$set == "THS" OR $set == "BNG" OR $set == "JOU" OR $set == "M15" OR 
		 			$set == "KTK" OR $set == "DTK" OR $set == "TPR" OR $set == "ORI" OR
		 			$set == "DGM")) {
	$foil_replace = $wpdb->get_var( ' SELECT multiverseID FROM set_' . $set . ' LIMIT 1 OFFSET ' . rand(0, $set_size - 1));
	$foil_card = 13;
} elseif ($foil == 5 AND ($set == "FUT" OR $set == "LRW" OR $set == "MOR" OR $set == "SHM" 
					   OR $set == "EVE")) {
	$foil_replace = $wpdb->get_var( ' SELECT multiverseID FROM set_' . $set . ' LIMIT 1 OFFSET ' . rand(0, $set_size - 1));
	$foil_card = 14;
}
if ($foil == 5 AND $set == "PLC") {
	$foil_replace = $wpdb->get_var( ' SELECT multiverseID FROM set_' . $set . ' LIMIT 1 OFFSET ' . rand(0, $set_size - 1));
	$foil_card = 10;
	$pack[$foil_card] = $foil_replace;
}
if ($set == "MMA" OR $set == "MM2" OR $set == "MM3" OR $set == "EMA") {
	$foil_card = 14;
	$foil_replace = $wpdb->get_var( ' SELECT multiverseID FROM set_' . $set . ' LIMIT 1 OFFSET ' . rand(0, $set_size - 1));
	$pack[$foil_card] = $foil_replace;
}

if ($foil == 5 AND ($set == "CNS" OR $set == "FRF")) {
	$foil_card = 13;
	$foil_replace = $wpdb->get_var( ' SELECT multiverseID FROM set_' . $set . ' LIMIT 1 OFFSET ' . rand(0, $set_size - 1));
	$pack[$foil_card] = $foil_replace;
}




//Build hashstring
foreach ($pack as $card) {
	$hashstring .= (string)$card;
}
$hash = hash('sha256', $hashstring);
$user = get_current_user_id();

//Check for validity of pick, record hash and pack contents
if (!$wpdb->get_results("SELECT * from pack_15 WHERE hash = '" . $hash . "'")) {
	if ($pack_size == 15) {
		$wpdb->insert('pack_15', array('hash' => $hash, 'user' => $user, 'set_code' => $set,
			'card01' => $pack[0], 'card02' => $pack[1], 'card03' => $pack[2], 'card04' => $pack[3],
			'card05' => $pack[4], 'card06' => $pack[5], 'card07' => $pack[6], 'card08' => $pack[7],
			'card09' => $pack[8], 'card10' => $pack[9], 'card11' => $pack[10], 'card12' => $pack[11],
			'card13' => $pack[12], 'card14' => $pack[13], 'card15' => $pack[14], ), 
		array( '%s', '%d', '%s', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d',
	      	  '%d', '%d', '%d', '%d', '%d') );
	} elseif ($pack_size == 8) {
		$wpdb->insert( 'pack_15', array( 'hash' => $hash, 'user' => $user, 'set_code' => $set,
			'card01' => $pack[0], 'card02' => $pack[1], 'card03' => $pack[2], 'card04' => $pack[3],
			'card05' => $pack[4], 'card06' => $pack[5], 'card07' => $pack[6], 'card08' => $pack[7] ), 
		array( '%s', '%d', '%s', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d' )  );
	} elseif ($pack_size == 12) {
		$wpdb->insert( 'pack_15', array( 'hash' => $hash, 'user' => $user, 'set_code' => $set,
			'card01' => $pack[0], 'card02' => $pack[1], 'card03' => $pack[2], 'card04' => $pack[3],
			'card05' => $pack[4], 'card06' => $pack[5], 'card07' => $pack[6], 'card08' => $pack[7],
			'card09' => $pack[8], 'card10' => $pack[9], 'card11' => $pack[10], 'card12' => $pack[11], ), 
		array( '%s', '%d', '%s', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d' ) );
	} elseif ($pack_size == 10) {
		$wpdb->insert( 'pack_15', array( 'hash' => $hash, 'user' => $user, 'set_code' => $set,
			'card01' => $pack[0], 'card02' => $pack[1], 'card03' => $pack[2], 'card04' => $pack[3],
			'card05' => $pack[4], 'card06' => $pack[5], 'card07' => $pack[6], 'card08' => $pack[7],
			'card09' => $pack[8], 'card10' => $pack[9], ), 
		array( '%s', '%d', '%s', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d') );
	}
}
	
?>


<?php
//Display Cards
$i = 0;
$path = "cards/" . $set . "/";
foreach ($pack as &$card) {
	if ($set == "P1P") {
		$cardsetcode = $wpdb->get_var( ' SELECT setCode FROM set_P1P WHERE multiverseID = ' . $card);
		$path = "cards/" . $cardsetcode . "/";
	}
	if ($i == $foil_card) {
		echo '<div id="foil-card">';
		echo '<div id="foil-card-text">';
		echo 'Foil';
		echo '</div>';
		$link = admin_url('admin-ajax.php?action=my_card_pick&hash='.$hash.'&card='.$card.'&set='.$set);
		echo '<a href ="' . $link . '"> <img src="' . $site_url . '/wp-content/uploads/' . $path . $card . '.jpg"></a>';
		
		echo '</div>';
	} else {
		echo '<div id="card">';
		$link = admin_url('admin-ajax.php?action=my_card_pick&hash='.$hash.'&card='.$card.'&set='.$set);
		echo '<a href ="' . $link . '"> <img src="' . $site_url . '/wp-content/uploads/' . $path . $card . '.jpg"></a>';
		echo '</div>';
	}
	$i++;
}



?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
