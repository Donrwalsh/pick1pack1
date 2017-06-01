<?php /* Template Name: Leaderboard
 * Custom template for displaying top picking users
 */
?>

<?php get_header();?> 

<style>
table{
    border: px solid black;
    margin:1em auto;
    width: 400px;
}
th
{
    border: px solid black;
}
td
{
    padding: 5px 15px 5px 15px;
    border: .5px solid black;
}
</style>
<?php
$set_transmog = array(
	P1P => "All Random",
	AKH => "Amonkhet",
	MM3 => "Modern Masters 2017",
	AER => "Aether Revolt",
	KLD => "Kaladesh",
	CN2 => "Conspiracy Take the Crown",
	EMN => "Eldritch Moon",
	EMA => "Eternal Masters",
	SOI => "Shadows over Innistrad",
	OGW => "Oath of the Gatewatch",
	BFZ => "Battle for Zendikar",
	ORI => "Magic Origins",
	MM2 => "Modern Masters 2015",
	TPR => "Tempest Remastered",
	DTK => "Dragons of Tarkir",
	FRF => "Fate Reforged",
	KTK => "Khans of Tarkir",
	M15 => "Magic 2015",
	VMA => "Vintage Masters",
	CNS => "Conspiracy",
	JOU => "Journey into Nyx",
	BNG => "Born of the Gods",
	THS => "Theros",
	M14 => "Magic 2014",
	MMA => "Modern Masters",
	DGM => "Dragon's Maze",
	GTC => "Gatecrash",
	RTR => "Return to Ravnica",
	M13 => "Magic 2013",
	AVR => "Avacyn Restored",
	DKA => "Dark Ascension",
	ISD => "Innistrad",
	M12 => "Magic 2012",
	NPH => "New Phyrexia",
	MBS => "Mirrodin Besieged",
	ME4 => "Master's Edition IV",
	SOM => "Scars of Mirrodin",
	M11 => "Magic 2011",
	ROE => "Rise of the Eldrazi",
	WWK => "Worldwake",
	ZEN => "Zendikar",
	ME3 => "Master's Edition III",
	M10 => "Magic 2010",
	ARB => "Alara Reborn",
	CON => "Conflux",
	ALA => "Shards of Alara",
	ME2 => "Master's Edition II",
	EVE => "Eventide",
	SHM => "Shadowmoor",
	MOR => "Morningtide",
	LRW => "Lorwyn",
	MED => "Master's Edition",
	"10E" => "10th Edition",
	FUT => "Future Sight",
	PLC => "Planar Chaos",
	TSP => "Time Spiral",
	CSP => "Coldsnap",
	DIS => "Dissension",
	GPT => "Guildpact",
	RAV => "Ravnica City of Guilds",
	"9ED" => "9th Edition",
	SOK => "Saviors of Kamigawa",
	BOK => "Betrayers of Kamigawa",
	UNH => "Unhinged",
	CHK => "Champions of Kamigawa",
	"5DN" => "5th Dawn",
	DST => "Darksteel",
	MRD => "Mirrodin",
	"8ED" => "8th Edition", 
	SCG => "Scourge",
	LGN => "Legions",
	ONS => "Onslaught",
	JUD => "Judgment",
	TOR => "Torment",
	ODY => "Odyssey",
	APC => "Apocalypse",
	"7ED" => "7th Edition",
	PLS => "Planeshift",
	INV => "Invasion",
	PCY => "Prophecy",
	NMS => "Nemesis",
	MMQ => "Mercadian Masques",
	S99 => "Starter 1999",
	UDS => "Urza's Destiny",
	PTK => "Portal Three Kingdoms",
	"6ED" => "6th Edition",
	ULG => "Urza's Legacy",
	USG => "Urza's Saga",
	UGL => "Unglued",
	PO2 => "Portal 2nd Age",
	EXO => "Exodus",
	STH => "Stronghold",
	TMP => "Tempest",
	WTH => "Weatherlight",
	POR => "Portal",
	"5ED" => "5th Edition",
	VIS => "Visions",
	MIR => "Mirage",
	"ALL" => "Alliances",
	HML => "Homelands",
	"CHR" => "Chronicles",
	ICE => "Ice Age",
	"4ED" => "4th Edition",
	FEM => "Fallen Empires",
	DRK => "The Dark",
	LEG => "Legends",
	"3ED" => "Revised Edition",
	ATQ => "Antiquities",
	ARN => "Arabian Nights",
	"2ED" => "Unlimited Edition",
	LEB => "Limited Edition Beta",
	LEA => "Limited Edition Alpha"
	);
$metadata = $wpdb->get_results("SELECT user, count(*) as picks FROM pack_15
WHERE pick is not null and user > 0 GROUP BY user ORDER BY picks DESC LIMIT 100", ARRAY_N);
$setadata = $wpdb->get_results("SELECT set_code, count(*) as picks FROM pack_15
WHERE pick is not NULL GROUP BY set_code ORDER BY picks DESC LIMIT 50", ARRAY_N); 

echo '<table class="tableContainer" cellspacing="10px">';
echo '<tr>';
echo '<col width="50">';
echo '<col width="150">';
echo '<col width="90">';
echo '<col width="90">';
echo '<th style="text-align:center"><b>Rank</b></th>';
echo '<th style="text-align:center"><b>Name</b></th>';
echo '<th style="text-align:center"><b>Picks</b></th>';
echo '<th style="text-align:center"><b>Favorite Set</b></th>';
echo '</tr>';
$i = 0;
foreach ($metadata as &$indiv) {
	$i++;
	$top_card = $wpdb->get_results("SELECT user, pick, count(*) as picks FROM pack_15
	WHERE user = " . $indiv[0] . " and pick is not NULL GROUP BY pick ORDER BY picks DESC LIMIT 1", ARRAY_N);
	$top_set = $wpdb->get_results("SELECT user, set_code, pick, count(*) as picks FROM pack_15
	WHERE user = " . $indiv[0] . " and pick is not NULL GROUP BY set_code ORDER BY picks DESC LIMIT 1", ARRAY_N);
	$data = get_userdata( $indiv[0] ); 
	
	echo '<tr>';
	echo '<td style="text-align:center"><b>' . $i . '</b></td>';
	echo '<td><a href = "http://pick1pack1.com/profile/' . $data->user_login . '">' . $data->user_login . '</a></td>';
	echo '<td style="text-align:center">' . number_format($indiv[1]) . '</td>';
	
	echo '<td style="text-align:center"><a href = "' . $site_url . '/' . strtolower(str_replace(" ", "-",$set_transmog[$top_set[0][1]])) . '">';
	if ($top_set[0][1] == "LEA") {
	echo '<img src = "' . $site_url . '/wp-content/uploads/set_symbols/Alpha-Symbol.png">';
	} elseif ($top_set[0][1] == "LEB") {
	echo '<img src = "' . $site_url . '/wp-content/uploads/set_symbols/Beta-Symbol.png">';
	} elseif ($top_set[0][1] == "2ED") {
	echo '<img src = "' . $site_url . '/wp-content/uploads/set_symbols/Unlimited-Symbol.png">';
	} elseif ($top_set[0][1] == "3ED") {
	echo '<img src = "' . $site_url . '/wp-content/uploads/set_symbols/Revised-Symbol.png">';
	} else {
	echo '<img src = "' . $site_url . '/wp-content/uploads/set_symbols/' . str_replace("'", "", str_replace(" ", "-",$set_transmog[$top_set[0][1]])) . '-Symbol.png">';
	}
	echo'</td>';
	
	
	

	
	echo '</tr>';

}

echo '</table>';
/*
echo '<h2> Top 10 Pickers with Favorite Card: </h2>';
foreach ($metadata as &$indiv) {
$top_card = $wpdb->get_results("SELECT user, pick, count(*) as picks FROM pack_15
WHERE user = " . $indiv[0] . " and pick is not NULL GROUP BY pick ORDER BY picks DESC LIMIT 1", ARRAY_N);
$data = get_userdata( $indiv[0] );  



echo '<div id="stat_card">';
echo '<a href = "http://pick1pack1.com/profile/' . $data->user_login . '"><h2>' . $data->user_login . '</h2></a>';
echo $indiv[1] . ' picks'. '<br><br>';
echo '<img src="' . $site_url . '/wp-content/uploads/2017/03/' . $top_card[0][1] . '.jpg"></a>';
echo '</div>';
}
echo '<br><br>';
echo '<h2> Top 50 Most Picked Sets: </h2>';
$i = 1;
foreach ($setadata as &$indiv) {
	echo '<div class="ldr-box">
	<a href = "' . $site_url . '/' . strtolower(str_replace(" ", "-",$set_transmog[$indiv[0]])) . '">';
	if ($indiv[0] == "CN2") {
	echo '<img src = "' . $site_url . '/wp-content/uploads/2017/03/' . str_replace(" ", "-",$set_transmog[$indiv[0]]) . '.jpg">';
	} elseif ($indiv[0] == "LEA") {
	echo '<img src = "' . $site_url . '/wp-content/uploads/2017/03/Alpha-Symbol.jpg">';
	} elseif ($indiv[0] == "LEB") {
	echo '<img src = "' . $site_url . '/wp-content/uploads/2017/03/Beta-Symbol.jpg">';
	} elseif ($indiv[0] == "2ED") {
	echo '<img src = "' . $site_url . '/wp-content/uploads/2017/03/Unlimited-Symbol.jpg">';
	} elseif ($indiv[0] == "3ED") {
	echo '<img src = "' . $site_url . '/wp-content/uploads/2017/03/Revised-Symbol.jpg">';
	} else {
	echo '<img src = "' . $site_url . '/wp-content/uploads/2017/03/' . str_replace("'", "", str_replace(" ", "-",$set_transmog[$indiv[0]])) . '-Symbol.jpg">';
	}
	echo '<br>' . $set_transmog[$indiv[0]] . '</a>
	<br>' . number_format($indiv[1]) . ' picks<br><br>
 </div>';
}
*/
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>