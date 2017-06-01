<?php /* Template Name: Master_Stats
 * Template for display indvidual set stats
 */
?>


<?php get_header();

$site_url = get_site_url();
$meta = get_post_meta( get_the_ID() );
$set = $meta["set_code"][0];
$set_long_name = $meta["set_long_name"][0];



//Color variables
$picks = $wpdb->get_var('SELECT SUM(picks) from set_' . $set);
$W_picks = $wpdb->get_var('SELECT SUM(picks/LENGTH(colorIdentity)) from set_' . $set . ' where colorIdentity LIKE "%W%"');
$U_picks = $wpdb->get_var('SELECT SUM(picks/LENGTH(colorIdentity)) from set_' . $set . ' where colorIdentity LIKE "%U%"');
$B_picks = $wpdb->get_var('SELECT SUM(picks/LENGTH(colorIdentity)) from set_' . $set . ' where colorIdentity LIKE "%B%"');
$R_picks = $wpdb->get_var('SELECT SUM(picks/LENGTH(colorIdentity)) from set_' . $set . ' where colorIdentity LIKE "%R%"');
$G_picks = $wpdb->get_var('SELECT SUM(picks/LENGTH(colorIdentity)) from set_' . $set . ' where colorIdentity LIKE "%G%"');
$C_picks = $wpdb->get_var('SELECT SUM(picks/LENGTH(colorIdentity)) from set_' . $set . ' where colorIdentity LIKE "%C%"');
if ($C_picks == NULL) { //Portal sets without colorless cards
	$C_picks = 0;
}

//Rarity variables
$Specials = $wpdb->get_var('SELECT SUM(picks) from set_' . $set . ' where rarity = "Special"');
if ($Specials == NULL) { //For normal sets with no Special cards
	$Specials = 0;
}
$Mythics = $wpdb->get_var('SELECT SUM(picks) from set_' . $set . ' where rarity = "Mythic Rare" OR rarity = "df_Mythic Rare" OR rarity = "dm_Mythic Rare"');
if ($Mythics == NULL) { //For early sets with no Mythic Rares
	$Mythics = 0;
}
$Rares = $wpdb->get_var('SELECT SUM(picks) from set_' . $set . ' where rarity = "Rare" OR rarity = "df_Rare" OR rarity = "dm_Rare"');
if ($Rares == NULL) { //For early sets with no Rares
	$Rares = 0;
}
$Uncommons = $wpdb->get_var('SELECT SUM(picks) from set_' . $set . ' where rarity = "Uncommon" OR rarity = "df_Uncommon" OR rarity = "dm_Uncommon"');
$Commons = $wpdb->get_var('SELECT SUM(picks) from set_' . $set . ' where rarity = "Common" OR rarity = "df_Common" OR rarity = "dm_Common" OR rarity = "Basic Land"');

//CMC variables
$Max = $wpdb->get_var("SELECT MAX(CMC) from set_" . $set);
if ($Max > 16) { //For 10,000 CMC in Unhinged. It is unfortunately left off the CMC graph.
	$Max = 15;
	}
$Min = $wpdb->get_var("SELECT MIN(CMC) from set_" . $set);
$max_single_val = 0;
$min_single_val = 0;
$labelstring = 'labels="';
for ($i = $Min; $i < $Max; $i++) {
    $labelstring .= $i . ",";
}
$labelstring .=  $Max . '"';
$datastring = 'datasets="';
for ($i = 0; $i < $Max; $i++) {
	$num = $wpdb->get_var('SELECT SUM(picks) from set_' . $set . ' where CMC = ' . $i);
		if ($num == NULL) {
		$num = 0;
		}
	$datastring .= $num . ",";
	if ($num > $max_single_val) {
		$max_single_val = $num;
	}
	if ($num < $min_single_val) {
		$min_single_val = $num;
	}
}
$step = ceil($max_single_val/10);
$datastring .= $wpdb->get_var('SELECT SUM(picks) from set_' . $set . ' where CMC = ' . $Max) . '"';


//Text beneath title
echo "<center><a href = " . $site_url . "/" . $set_long_name . ">Go To Pack</center></a><br>";
echo '<h2>This set has ' . number_format($picks) . ' recorded picks</h2><br>';


//Graphs
?>
<div id = "charts">
	<div id = "stats_pie_chart">
		<?php echo do_shortcode( '[wp_charts title="colorpie" type="pie" align="aligncenter" margin="5px 20px" width="70%" 
		data="' . $W_picks . ',' . $U_picks . ',' . $B_picks . ',' . $R_picks . ',' . $G_picks . ',' . $C_picks . '" 
		class= "stats_pie_chart" colors="#F7f8f9,#0060C1,#0b0c0c,#e01818,#0a5b25,#5b3e0a"]' );?>
		<h3>Color Distribution</h3>
	</div>
	<div id = "CMC_graph">
		<?php echo do_shortcode( '[wp_charts title="linechart" type="line" align="aligncenter" scaleFontSize="30" width="70%" 
		scaleoverride="true" scaleSteps="10" scaleStepWidth = "' . $step . '" scaleStartValue = "' . $min_single_val . '"
		margin="5px 20px" ' . $datastring . ' ' . $labelstring . ']');?>
		<h3>Converted Mana Cost Distribution</h3>
	</div>
	<div id = "rarity_graph">
		<?php echo do_shortcode( '[wp_charts title="raritydough" type="doughnut" align="aligncenter" margin="5px 20px" width="70%"
		class= "stats_pie_chart" data="' . $Specials . ',' . $Mythics . ',' . $Rares . ',' . $Uncommons . ',' . $Commons . '"
		colors="#7400aa,#cc820c,#e8e120,#CCCBC8,#000000"]');?>
		<h3>Rarity Distribution</h3>
	</div>
</div>
<div id="content" class="site-content">
<h2>Individual Card Pick Percentages:</h2>



<?php
//Pictures of cards
$cards = $wpdb->get_results("SELECT * FROM set_" . $set . " order by (picks/packs*100) DESC, picks DESC, packs ASC, name ASC;");	
$i = 0;
if ($set == "P1P") {
	$path = "2017/03/";
} else {
	$path = "cards/" . $set . "/";
}
/*if ($set == "LEA" OR $set == "2ED" OR $set == "3ED" ) {
	$path = "cards/" . $set . "/";
} else {
	$path = "2017/03/";
}*/
foreach ($cards as $card) {
	if ($set == "P1P") {
		if ($card->setCode == "LEA") {
			$path = "cards/" . $card->setCode . "/";
		} else {
			$path = "2017/03/";
		}
	}
	if ($i > 100 AND $set == "P1P" ) {
		break;
	}
		echo '<div id="stat_card">';
		echo "<img src=" . $site_url . "/wp-content/uploads/" . $path . $card->multiverseID . ".jpg>";
		
		if ($card->packs == 0) {
			echo '<br> 0 picks / 0 packs <br> 0% pick rate';
			echo '</div>';
		} else {
			if ($card->picks == 1) {
				$s1 = "";
			} else {
				$s1 = "s";
			}
			if ($card->packs == 1) {
				$s2 = "";
			} else {
				$s2 = "s";
			}		
			echo '<br>' . $card->picks . " pick" . $s1 . " / " . $card->packs . " pack" . $s2 . "<br>" . round(($card->picks/$card->packs)*100, 2) . "% pick rate";
			echo '</div>';
			}
		$i += 1;
	}
?>




	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
