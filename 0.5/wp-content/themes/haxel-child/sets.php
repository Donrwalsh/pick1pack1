<?php /* Template Name: Sets
 * Custom template for displaying sets to choose from.
 */
?>

<?php get_header();?> 
<?php $site_url = get_site_url();?>

<?php function set_box($set_name, $site_name, $icon_name) {
echo '<div class="set-box">
	<a href = "' . $site_url . '/' . $site_name . '/">
	<img src = "' . $site_url . '/wp-content/uploads/set_symbols/' . $icon_name . '">
	<br>' . $set_name . '</a><br>
	
 </div>';
}?>

<?php 
echo '<div class="set-box">
	<a href = "' . $site_url . '/all-random/">
	<img src = "' . $site_url . '/wp-content/uploads/set_symbols/All-Random-Symbol.png">
	<br>All Random</a><br>
 </div>';
  echo '<div class="set-box">
	<a href = "' . $site_url . '/amonkhet/">
	<img src = "' . $site_url . '/wp-content/uploads/set_symbols/Amonkhet-Symbol.png">
	<br>Amonkhet</a><br>
 </div>';
set_box("Modern Masters 2017", "modern-masters-2017", "Modern-Masters-2017-Symbol.png");
set_box("Aether Revolt", "aether-revolt", "Aether-Revolt-Symbol.png");
set_box("Kaladesh", "kaladesh", "Kaladesh-Symbol.png");
set_box("Conspiracy: Take the Crown", "conspiracy-take-the-crown", "Conspiracy-Take-the-Crown-Symbol.png");
set_box("Eldritch Moon", "eldritch-moon", "Eldritch-Moon-Symbol.png");
set_box("Eternal Masters", "eternal-masters", "Eternal-Masters-Symbol.png");
set_box("Shadows over Innistrad", "shadows-over-innistrad", "Shadows-over-Innistrad-Symbol.png");
set_box("Oath of the Gatewatch", "oath-of-the-gatewatch", "Oath-of-the-Gatewatch-Symbol.png");
set_box("Battle for Zendikar", "battle-for-zendikar", "Battle-for-Zendikar-Symbol.png");
set_box("Magic Origins", "magic-origins", "Magic-Origins-Symbol.png");
set_box("Modern Masters 2015", "modern-masters-2015", "Modern-Masters-2015-Symbol.png");
set_box("Tempest Remastered", "tempest-remastered", "Tempest-Remastered-Symbol.png");
set_box("Dragons of Tarkir", "dragons-of-tarkir", "Dragons-of-Tarkir-Symbol.png");
set_box("Fate Reforged", "fate-reforged", "Fate-Reforged-Symbol.png");
set_box("Khans of Tarkir", "khans-of-tarkir", "Khans-of-Tarkir-Symbol.png");
set_box("Magic 2015", "magic-2015", "Magic-2015-Symbol.png");
set_box("Vintage Masters", "vintage-masters", "Vintage-Masters-Symbol.png");
set_box("Conspiracy", "conspiracy", "Conspiracy-Symbol.png");
set_box("Journey into Nyx", "journey-into-nyx", "Journey-into-Nyx-Symbol.png");
set_box("Born of the Gods", "born-of-the-gods", "Born-of-the-Gods-Symbol.png");
set_box("Theros", "theros", "Theros-Symbol.png");
set_box("Magic 2014", "magic-2014", "Magic-2014-Symbol.png");
set_box("Modern Masters", "modern-masters", "Modern-Masters-Symbol.png");
set_box("Dragon's Maze", "dragons-maze", "Dragons-Maze-Symbol.png");
set_box("Gatecrash", "gatecrash", "Gatecrash-Symbol.png");
set_box("Return to Ravnica", "return-to-ravnica", "Return-to-Ravnica-Symbol.png");
set_box("Magic 2013", "magic-2013", "Magic-2013-Symbol.png");
set_box("Avacyn Restored", "avacyn-restored", "Avacyn-Restored-Symbol.png");
set_box("Dark Ascension", "dark-ascension", "Dark-Ascension-Symbol.png");
set_box("Innistrad", "innistrad", "Innistrad-Symbol.png");
set_box("Magic 2012", "magic-2012", "Magic-2012-Symbol.png");
set_box("New Phyrexia", "new-phyrexia", "New-Phyrexia-Symbol.png");
set_box("Mirrodin Besieged", "mirrodin-besieged", "Mirrodin-Besieged-Symbol.png");
set_box("Master's Edition IV", "masters-edition-iv", "Masters-Edition-IV-Symbol.png");
set_box("Scars of Mirrodin", "scars-of-mirrodin", "Scars-of-Mirrodin-Symbol.png");
set_box("Magic 2011", "magic-2011", "Magic-2011-Symbol.png");
set_box("Rise of the Eldrazi", "rise-of-the-eldrazi", "Rise-of-the-Eldrazi-Symbol.png");
set_box("Worldwake", "worldwake", "Worldwake-Symbol.png");
set_box("Zendikar", "zendikar", "Zendikar-Symbol.png");
set_box("Master's Edition III", "masters-edition-III", "Masters-Edition-III-Symbol.png");
set_box("Magic 2010", "magic-2010", "Magic-2010-Symbol.png");
set_box("Alara Reborn", "alara-reborn", "Alara-Reborn-Symbol.png");
set_box("Conflux", "conflux", "Conflux-Symbol.png");
set_box("Shards of Alara", "shards-of-alara", "Shards-of-Alara-Symbol.png");
set_box("Master's Edition II", "masters-edition-ii", "Masters-Edition-II-Symbol.png");
set_box("Eventide", "eventide", "Eventide-Symbol.png");
set_box("Shadowmoor", "shadowmoor", "Shadowmoor-Symbol.png");
set_box("Morningtide", "morningtide", "Morningtide-Symbol.png");
set_box("Lorwyn", "lorwyn", "Lorwyn-Symbol.png");
set_box("Master's Edition", "masters-edition", "Masters-Edition-Symbol.png");
set_box("10th Edition", "10th-edition", "10th-Edition-Symbol.png");
set_box("Future Sight", "future-sight", "Future-Sight-Symbol.png");
set_box("Planar Chaos", "planar-chaos", "Planar-Chaos-Symbol.png");
set_box("Time Spiral", "time-spiral", "Time-Spiral-Symbol.png");
set_box("Coldsnap", "coldsnap", "Coldsnap-Symbol.png");
set_box("Dissension", "dissension", "Dissension-Symbol.png");
set_box("Guildpact", "guildpact", "Guildpact-Symbol.png");
set_box("Ravnica: City of Guilds", "ravnica-city-of-guilds", "Ravnica-City-of-Guilds-Symbol.png");
set_box("9th Edition", "9th-edition", "9th-Edition-Symbol.png");
set_box("Saviors of Kamigawa", "saviors-of-kamigawa", "Saviors-of-Kamigawa-Symbol.png");
set_box("Betrayers of Kamigawa", "betrayers-of-kamigawa", "Betrayers-of-Kamigawa-Symbol.png");
set_box("Unhinged", "unhinged", "Unhinged-Symbol.png");
set_box("Champions of Kamigawa", "champions-of-kamigawa", "Champions-of-Kamigawa-Symbol.png");
set_box("5th Dawn", "5th-dawn", "5th-Dawn-Symbol.png");
set_box("Darksteel", "darksteel", "Darksteel-Symbol.png");
set_box("Mirrodin", "mirrodin", "Mirrodin-Symbol.png");
set_box("8th Edition", "8th-edition", "8th-Edition-Symbol.png");
set_box("Scourge", "scourge", "Scourge-Symbol.png");
set_box("Legions", "legions", "Legions-Symbol.png");
set_box("Onslaught", "onslaught", "Onslaught-Symbol.png");
set_box("Judgment", "judgment", "Judgment-Symbol.png");
set_box("Torment", "torment", "Torment-Symbol.png");
set_box("Odyssey", "odyssey", "Odyssey-Symbol.png");
set_box("Apocalypse", "apocalypse", "Apocalypse-Symbol.png");
set_box("7th Edition", "7th-edition", "7th-Edition-Symbol.png");
set_box("Planeshift", "planeshift", "Planeshift-Symbol.png");
set_box("Invasion", "invasion", "Invasion-Symbol.png");
set_box("Prophecy", "prophecy", "Prophecy-Symbol.png");
set_box("Nemesis", "nemesis", "Nemesis-Symbol.png");
set_box("Mercadian Masques", "mercadian-masques", "Mercadian-Masques-Symbol.png");
set_box("Starter 1999", "starter-1999", "Starter-1999-Symbol.png");
set_box("Urza's Destiny", "urzas-destiny", "Urzas-Destiny-Symbol.png");
set_box("Portal Three Kingdoms", "portal-three-kingdoms", "Portal-Three-Kingdoms-Symbol.png");
set_box("6th Edition", "6th-edition", "6th-Edition-Symbol.png");
set_box("Urza's Legacy", "urzas-legacy", "Urzas-Legacy-Symbol.png");
set_box("Urza's Saga", "urzas-saga", "Urzas-Saga-Symbol.png");
set_box("Unglued", "unglued", "Unglued-Symbol.png");
set_box("Portal 2nd Age", "portal-2nd-age", "Portal-2nd-Age-Symbol.png");
set_box("Exodus", "exodus", "Exodus-Symbol.png");
set_box("Stronghold", "stronghold", "Stronghold-Symbol.png");
set_box("Tempest", "tempest", "Tempest-Symbol.png");
set_box("Weatherlight", "weatherlight", "Weatherlight-Symbol.png");
set_box("Portal", "portal", "Portal-Symbol.png");
set_box("5th Edition", "5th-edition", "5th-Edition-Symbol.png");
set_box("Visions", "visions", "Visions-Symbol.png");
set_box("Mirage", "mirage", "Mirage-Symbol.png");
set_box("Alliances", "alliances", "Alliances-Symbol.png");
set_box("Homelands", "homelands", "Homelands-Symbol.png");
set_box("Chronicles", "chronicles", "Chronicles-Symbol.png");
set_box("Ice Age", "ice-age", "Ice-Age-Symbol.png");
set_box("4th Edition", "4th-edition", "4th-Edition-Symbol.png");
set_box("Fallen Empires", "fallen-empires", "Fallen-Empires-Symbol.png");
set_box("The Dark", "the-dark", "The-Dark-Symbol.png");
set_box("Legends", "legends", "Legends-Symbol.png");
set_box("Revised Edition", "revised-edition", "Revised-Symbol.png");
set_box("Antiquities", "antiquities", "Antiquities-Symbol.png");
set_box("Arabian Nights", "arabian-nights", "Arabian-Nights-Symbol.png");
set_box("Unlimited Edition", "unlimited-edition", "Unlimited-Symbol.png");
set_box("Limited Edition Beta", "limited-edition-beta", "Beta-Symbol.png");
set_box("Limited Edition Alpha", "limited-edition-alpha", "Alpha-Symbol.png");
?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
