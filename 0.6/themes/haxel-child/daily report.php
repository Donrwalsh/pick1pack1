<?php /* Template Name: Activity
 * Custom template for displaying site usage
 */
?>

<?php get_header();?> 

<style>
table{
    border: px solid black;
    margin:1em auto;
    width: 800px;
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



$metadata = $wpdb->get_results("SELECT DATE(DateCreated), count(*) AS picks, COUNT(DISTINCT user)
 AS 'registered users', COUNT(DISTINCT IP) AS 'unique pickers' FROM pack_15 WHERE pick is not null
GROUP BY DATE(DateCreated) ORDER BY DateCreated DESC", ARRAY_N);


$divisor = (count($metadata)-1)/2;

echo '<table class="activitysTable" cellspacing="10px">';
echo '<CAPTION><center><h3>Activity by Day</h3></center></CAPTION>';
echo '<tr>';
echo '<col width="75">';
echo '<col width="50">';
echo '<col width="50">';
echo '<col width="5">';
echo '<col width="75">';
echo '<col width="50">';
echo '<col width="50">';
echo '<th style="text-align:center"><b>Date</b></th>';
echo '<th style="text-align:center"><b>Picks</b></th>';
echo '<th style="text-align:center"><b>Pickers</b></th>';
echo '<th></th>';
echo '<th style="text-align:center"><b>Date</b></th>';
echo '<th style="text-align:center"><b>Picks</b></th>';
echo '<th style="text-align:center"><b>Pickers</b></th>';
echo '</tr>';
$i = 0;
foreach ($metadata as &$indiv) {
	echo '<tr>';
	echo '<td style="text-align:center"><b>' . $indiv[0] . '</b></td>';
	echo '<td style="text-align:center">' . $indiv[1] . '</td>';
	echo '<td style="text-align:center">' . $indiv[3] . '</td>';
	echo '<td BGCOLOR="#000000"></td>';
	if ($i > $divisor) {
		break;
	} else {
		echo '<td style="text-align:center"><b>' . $metadata[$i+ceil($divisor)][0] . '</b></td>';
		echo '<td style="text-align:center">' . $metadata[$i+ceil($divisor)][1] . '</td>';
		echo '<td style="text-align:center">' . $metadata[$i+ceil($divisor)][3] . '</td>';
		$i++;
	}
	
		
}

echo '</tr>';
echo '</table>';
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
