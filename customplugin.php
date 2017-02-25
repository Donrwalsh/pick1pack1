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
	
add_action( 'init', 'my_script_enqueuer' );
add_action("wp_ajax_my_card_pick", "my_card_pick");
add_action("wp_ajax_nopriv_my_card_pick", "my_card_pick");



function my_card_pick() {
	if ( !wp_verify_nonce( $_REQUEST['nonce'], "my_draft_pick_nonce")) {
			exit("No naughty business please");
	}
	
	
	/* if nonce doesn't exist in choices table */
	
	global $wpdb;

	$wpdb->query('UPDATE wp_master SET Picks = Picks + 1 WHERE ID = ' . $_REQUEST['choice']);
	
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





function my_script_enqueuer() {
   wp_register_script( "my_voter_script", WP_PLUGIN_URL.'/customplugin/my_voter_script.js', array('jquery') );
   wp_localize_script( 'my_voter_script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        

   wp_enqueue_script( 'jquery' );
   wp_enqueue_script( 'my_voter_script' );

}

?>
