<?php
	/*
	Plugin Name: Custom Plugin
	Plugin URI: http://I-just-made-this-up.com
	Description: eventually implement AJAX on my site
	Version: 0.0
	Author: Bigbrass
	Author URI: http://bigbrass.com
	License: GPL2
	*/
	
add_action("wp_ajax_my_card_pick", "my_card_pick");
add_action("wp_ajax_nopriv_my_card_pick", "my_card_pick");



function my_card_pick() {
	if ( !wp_verify_nonce( $_REQUEST['nonce'], "my_draft_pick_nonce")) {
			exit("No naughty business please");
	}
	
	
	/* if nonce doesn't exist in choices table */
	
	global $wpdb;

	$last_choice = $wpdb->get_results('SELECT card_Choice FROM `wp_inputs` WHERE user_IP = "' . $_SERVER['REMOTE_ADDR'] . '" ORDER BY ID DESC LIMIT 1');
        $last_choice = array_shift($last_choice);

	if((string)$last_choice->card_Choice != (string)$_REQUEST['choice']){

	$wpdb->query('UPDATE wp_master SET Picks = Picks + 1 WHERE ID = ' . $_REQUEST['choice']);
	
	}
	
	global $wpdb;
	
	$wpdb->insert(
		'wp_inputs',
		array(
				'card_Choice' => $_REQUEST['choice'],
				'user_IP' => $_SERVER['REMOTE_ADDR']
		),
		array(
				'%s',
				'%s'
		)
	);

		
	
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$result = json_encode($result);
		echo $result;
	}
	else {
		header("Location: ".$_SERVER["HTTP_REFERER"]);
	}
	
	header("Refresh:0");
	die();

}


?>
