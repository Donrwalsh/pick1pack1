<?php /* Template Name: Stats
 * Custom template for displaying Stats for different sets.
 */
?>

<?php get_header();?> 
<?php $site_url = get_site_url();?>

<?php function set_box($set_name, $site_name, $icon_name) {
	echo '<div class="set-box">
	<a href = "' . $site_url . '/stats-' . $site_name . '/">
	<img src = "' . $site_url . '/wp-content/uploads/set_symbols/' . $icon_name . '">
	<br>' . $set_name . '</a><br>
 </div>';
}?>

<?php 
echo '<div class="set-box">
	<a href = "' . $site_url . '/stats-P1P/">
	<img src = "' . $site_url . '/wp-content/uploads/set_symbols/All-Random-Symbol.png">
	<br>All Random</a><br>
 </div>';
 echo '<div class="set-box">
	<a href = "' . $site_url . '/stats-AKH/">
	<img src = "' . $site_url . '/wp-content/uploads/set_symbols/Amonkhet-Symbol.png">
	<br>Amonkhet</a><br>
 </div>';
set_box("Modern Masters 2017", "MM3", "Modern-Masters-2017-Symbol.png");
set_box("Aether Revolt", "AER", "Aether-Revolt-Symbol.png");
set_box("Kaladesh", "KLD", "Kaladesh-Symbol.png");
set_box("Conspiracy: Take the Crown", "CN2", "Conspiracy-Take-the-Crown-Symbol.png");
set_box("Eldritch Moon", "EMN", "Eldritch-Moon-Symbol.png");
set_box("Eternal Masters", "EMA", "Eternal-Masters-Symbol.png");
set_box("Shadows over Innistrad", "SOI", "Shadows-over-Innistrad-Symbol.png");
set_box("Oath of the Gatewatch", "OGW", "Oath-of-the-Gatewatch-Symbol.png");
set_box("Battle for Zendikar", "BFZ", "Battle-for-Zendikar-Symbol.png");
set_box("Magic Origins", "ORI", "Magic-Origins-Symbol.png");
set_box("Modern Masters 2015", "MM2", "Modern-Masters-2015-Symbol.png");
set_box("Tempest Remastered", "TPR", "Tempest-Remastered-Symbol.png");
set_box("Dragons of Tarkir", "DTK", "Dragons-of-Tarkir-Symbol.png");
set_box("Fate Reforged", "FRF", "Fate-Reforged-Symbol.png");
set_box("Khans of Tarkir", "KTK", "Khans-of-Tarkir-Symbol.png");
set_box("Magic 2015", "M15", "Magic-2015-Symbol.png");
set_box("Vintage Masters", "VMA", "Vintage-Masters-Symbol.png");
set_box("Conspiracy", "CNS", "Conspiracy-Symbol.png");
set_box("Journey into Nyx", "JOU", "Journey-into-Nyx-Symbol.png");
set_box("Born of the Gods", "BNG", "Born-of-the-Gods-Symbol.png");
set_box("Theros", "THS", "Theros-Symbol.png");
set_box("Magic 2014", "M14", "Magic-2014-Symbol.png");
set_box("Modern Masters", "MMA", "Modern-Masters-Symbol.png");
set_box("Dragon's Maze", "DGM", "Dragons-Maze-Symbol.png");
set_box("Gatecrash", "GTC", "Gatecrash-Symbol.png");
set_box("Return to Ravnica", "RTR", "Return-to-Ravnica-Symbol.png");
set_box("Magic 2013", "M13", "Magic-2013-Symbol.png");
set_box("Avacyn Restored", "AVR", "Avacyn-Restored-Symbol.png");
set_box("Dark Ascension", "DKA", "Dark-Ascension-Symbol.png");
set_box("Innistrad", "ISD", "Innistrad-Symbol.png");
set_box("Magic 2012", "M12", "Magic-2012-Symbol.png");
set_box("New Phyrexia", "NPH", "New-Phyrexia-Symbol.png");
set_box("Mirrodin Besieged", "MBS", "Mirrodin-Besieged-Symbol.png");
set_box("Master's Edition IV", "ME4", "Masters-Edition-IV-Symbol.png");
set_box("Scars of Mirrodin", "SOM", "Scars-of-Mirrodin-Symbol.png"); 
set_box("Magic 2011", "M11", "Magic-2011-Symbol.png");
set_box("Rise of the Eldrazi", "ROE", "Rise-of-the-Eldrazi-Symbol.png");
set_box("Worldwake", "WWK", "Worldwake-Symbol.png");
set_box("Zendikar", "ZEN", "Zendikar-Symbol.png");
set_box("Master's Edition III", "ME3", "Masters-Edition-III-Symbol.png");
set_box("Magic 2010", "M10", "Magic-2010-Symbol.png");
set_box("Alara Reborn", "ARB", "Alara-Reborn-Symbol.png");
set_box("Conflux", "CON", "Conflux-Symbol.png");
set_box("Shards of Alara", "ALA", "Shards-of-Alara-Symbol.png");
set_box("Master's Edition II", "ME2", "Masters-Edition-II-Symbol.png");
set_box("Eventide", "EVE", "Eventide-Symbol.png");
set_box("Shadowmoor", "SHM", "Shadowmoor-Symbol.png");
set_box("Morningtide", "MOR", "Morningtide-Symbol.png");
set_box("Lorwyn", "LRW", "Lorwyn-Symbol.png");
set_box("Master's Edition", "MED", "Masters-Edition-Symbol.png");
set_box("10th Edition", "10E", "10th-Edition-Symbol.png");
set_box("Future Sight", "FUT", "Future-Sight-Symbol.png");
set_box("Planar Chaos", "PLC", "Planar-Chaos-Symbol.png");
set_box("Time Spiral", "TSP", "Time-Spiral-Symbol.png");
set_box("Coldsnap", "CSP", "Coldsnap-Symbol.png");
set_box("Dissension", "DIS", "Dissension-Symbol.png");
set_box("Guildpact", "GPT", "Guildpact-Symbol.png");
set_box("Ravnica: City of Guilds", "RAV", "Ravnica-City-of-Guilds-Symbol.png");
set_box("9th Edition", "9ED", "9th-Edition-Symbol.png");
set_box("Saviors of Kamigawa", "SOK", "Saviors-of-Kamigawa-Symbol.png");
set_box("Betrayers of Kamigawa", "BOK", "Betrayers-of-Kamigawa-Symbol.png");
set_box("Unhinged", "UNH", "Unhinged-Symbol.png");
set_box("Champions of Kamigawa", "CHK", "Champions-of-Kamigawa-Symbol.png");
set_box("5th Dawn", "5DN", "5th-Dawn-Symbol.png");
set_box("Darksteel", "DST", "Darksteel-Symbol.png");
set_box("Mirrodin", "MRD", "Mirrodin-Symbol.png");
set_box("8th Edition", "8ED", "8th-Edition-Symbol.png");
set_box("Scourge", "SCG", "Scourge-Symbol.png");
set_box("Legions", "LGN", "Legions-Symbol.png");
set_box("Onslaught", "ONS", "Onslaught-Symbol.png");
set_box("Judgment", "JUD", "Judgment-Symbol.png");
set_box("Torment", "TOR", "Torment-Symbol.png");
set_box("Odyssey", "ODY", "Odyssey-Symbol.png");
set_box("Apocalypse", "APC", "Apocalypse-Symbol.png");
set_box("7th Edition", "7ED", "7th-Edition-Symbol.png");
set_box("Planeshift", "PLS", "Planeshift-Symbol.png");
set_box("Invasion", "INV", "Invasion-Symbol.png");
set_box("Prophecy", "PCY", "Prophecy-Symbol.png");
set_box("Nemesis", "NMS", "Nemesis-Symbol.png");
set_box("Mercadian Masques", "MMQ", "Mercadian-Masques-Symbol.png");
set_box("Starter 1999", "S99", "Starter-1999-Symbol.png");
set_box("Urza's Destiny", "UDS", "Urzas-Destiny-Symbol.png");
set_box("Portal Three Kingdoms", "PTK", "Portal-Three-Kingdoms-Symbol.png");
set_box("6th Edition", "6ed", "6th-Edition-Symbol.png");
set_box("Urza's Legacy", "ULG", "Urzas-Legacy-Symbol.png");
set_box("Urza's Saga", "USG", "Urzas-Saga-Symbol.png");
set_box("Unglued", "UGL", "Unglued-Symbol.png");
set_box("Portal 2nd Age", "po2", "Portal-2nd-Age-Symbol.png");
set_box("Exodus", "EXO", "Exodus-Symbol.png");
set_box("Stronghold", "STH", "Stronghold-Symbol.png");
set_box("Tempest", "TMP", "Tempest-Symbol.png");
set_box("Weatherlight", "WTH", "Weatherlight-Symbol.png");
set_box("Portal", "POR", "Portal-Symbol.png");
set_box("5th Edition", "5ED", "5th-Edition-Symbol.png");
set_box("Visions", "VIS", "Visions-Symbol.png");
set_box("Mirage", "MIR", "Mirage-Symbol.png");
set_box("Alliances", "ALL", "Alliances-Symbol.png");
set_box("Homelands", "HML", "Homelands-Symbol.png");
set_box("Chronicles", "CHR", "Chronicles-Symbol.png");
set_box("Ice Age", "ICE", "Ice-Age-Symbol.png");
set_box("4th Edition", "4ED", "4th-Edition-Symbol.png");
set_box("Fallen Empires", "FEM", "Fallen-Empires-Symbol.png");
set_box("The Dark", "DRK", "The-Dark-Symbol.png");
set_box("Legends", "LEG", "Legends-Symbol.png");
set_box("Revised Edition", "3ED", "Revised-Symbol.png");
set_box("Antiquities", "ATQ", "Antiquities-Symbol.png");
set_box("Arabian Nights", "ARN", "Arabian-Nights-Symbol.png");
set_box("Unlimited Edition", "2ED", "Unlimited-Symbol.png");
set_box("Limited Edition Beta", "LEB", "Beta-Symbol.png");
set_box("Limited Edition Alpha", "LEA", "Alpha-Symbol.png");
?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
