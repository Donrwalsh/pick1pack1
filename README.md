# pick1pack1
http://pick1pack1.com

# 0.6 Notes

The update notes on the website summarize this update well. Other than the activity page, which was a simple addition of a Query I've been using to monitor activity for some time, all the updates have to do with performance. Indexing the pack_15 table is the biggest one, except that isn't anywhere in the code I include in this repo. 

I modified a few items in my style.css file to remove floats and start down the road of sorting them all out. I removed a handful of actions from wp_head() that I determined weren't adding anything to the site (other than longer load times).

It also turns out somewhere along the line I lost the line of code that properly includes a timestamp in the hash generation. My working theory is that this was the underlying cause for the reported 'invalid pick' on a fresh pack. Since the hash was being generated with only the 15 cards in the pack, it was only a matter of time until there was a collision. Users submitted over 6,000 picks since HOU went live, which means there were more than that number of packs generated. I'm hoping there are no more reports, and if that's the case I'll call off the search on this one.

# 0.5 Notes

Now that I'm getting into the groove of updating this website, I'm going to start storing code for each update in this repo.

The individual updates getting to this point are covered on the website itself. From here on out, I'll take better notes here as well.

# 0.0 Notes

This version of the site was only 2 pages. All Random and All Random stats.

Python file mtg.py used to create master.csv and collect 16,324 jpgs of unique cards.

MAMP downloaded to host local Wordpress site for building. Used native upload tool to add all jpgs to site. Some were inexplicably turned into pngs, so a png->jpg plugin was used to fix. (https://wordpress.org/plugins/png-to-jpg/)

Used http://html5blank.com/ as template to reduce unwatned blog features. All code was dropped into single.php and page.php bypassing a lot of Wordpress features.

Not in order:

Built customplugin.php to handle clicks with AJAX on cards by running update queries on wp_master and input queries on wp_inputs.

Tables.sql holds commands for creating sql tables used. wp_master holds a master list of unique cards and simple int count of picks, while wp_inputs records individual picks with timestamps and IP address of submitter.

<Use & Drop python was used to output insert commands to build wp_master, although an import of master.csv and some manipulation would've worked as well>

single.php and page.php were heavily modified to include the bulk of the display for the site. The site was configured to only show the single page and then a link to the single post, which is the list of popular picks. These pages were also modified to remove unwanted text that the wordpress theme included. This is probably a very silly way of doing things.

Wordpress Duplicator plugin https://wordpress.org/plugins/duplicator/ was used to save local wordpress site. Purchased domain and site from ehost and then uploaded installer/archive created by duplicator. Installation was easy, getting files onto the server was not (ftp settings provided by ehost needed to be masaged to work; archive was too big to upload manually).



