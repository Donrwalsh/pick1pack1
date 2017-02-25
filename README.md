# pick1pack1
http://pick1pack1.com

Python file mtg.py used to create master.csv and collect 16,324 jpgs of unique cards.
MAMP downloaded to host local Wordpress site for building. Used native upload tool to add all jpgs to site. Some were inexplicably turned into pngs, so a png->jpg plugin was used to fix. (https://wordpress.org/plugins/png-to-jpg/)
Used http://html5blank.com/ as template to reduce unwatned blog features. All code was dropped into single.php and page.php bypassing a lot of Wordpress features.

Not in order:
Built customplugin.php to handle clicks with AJAX on cards by running update queries on wp_master and input queries on wp_inputs.
Tables.sql holds commands for creating sql tables used. wp_master holds a master list of unique cards and simple int count of picks, while wp_inputs records individual picks with timestamps and IP address of submitter.
<Use & Drop python was used to output insert commands to build wp_master, although an import of master.csv and some manipulation would've worked as well>
single.php and page.php were heavily modified to include the bulk of the display for the site. The site was configured to only show the single page and then a link to the single post, which is the list of popular picks. These pages were also modified to remove unwanted text that the wordpress theme included. This is probably a very silly way of doing things.
Wordpress Duplicator plugin https://wordpress.org/plugins/duplicator/ was used to save local wordpress site. Purchased domain and site from ehost and then uploaded installer/archive created by duplicator. Installation was easy, getting files onto the server was not (ftp settings provided by ehost needed to be masaged to work; archive was too big to upload manually).


