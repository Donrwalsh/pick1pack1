<?php
	/*
	Plugin Name: Use AJAX
	Plugin URI: http://I-just-made-this-up.com
	Description: Run AJAX events on user input
	Version: 1.0
	Author: Don R Walsh
	Author URI: http://donrwalsh@gmail.com
	License: GPL2
	*/
	
add_action("wp_ajax_my_card_pick", "my_card_pick");
add_action("wp_ajax_nopriv_my_card_pick", "my_card_pick");



function my_card_pick() {
	global $wpdb;
	//Result is a list of the 15 cards in the pack for later use.
	//Result is only valid if hash exists, pick is NULL and selected card is found in the pack.
	$result = $wpdb->get_row("SELECT card01, card02, card03, card04, card05, card06, card07, 
							card08, card09, card10, card11, card12, card13, card14, card15 
							from pack_15 WHERE hash = '" . $_REQUEST['hash'] . 
						    "' AND pick IS NULL AND '" . $_REQUEST['card'] . "' IN (card01,
						    card02, card03, card04, card05, card06, card07, card08, card09,
						    card10, card11, card12, card13, card14, card15)");
	if (count($result) != 0) {
		
		$wpdb->query("UPDATE pack_15 SET pick = " . $_REQUEST['card'] . " WHERE hash = '" . $_REQUEST['hash'] . "'");
		$wpdb->query("UPDATE pack_15 P, set_" . $_REQUEST['set'] . " S SET P.CMC = S.CMC, P.colorIdentity = S.colorIdentity,
					P.rarity = S.rarity, P.IP = '" . $_SERVER['REMOTE_ADDR'] . "' WHERE P.pick = S.multiverseID AND P.hash = '" . $_REQUEST['hash'] . "'");
		$wpdb->query("UPDATE set_" .$_REQUEST['set'] . " SET picks = picks + 1 WHERE multiverseID = " . $_REQUEST['card']);
		
		//$wpdb->query("UPDATE set_" .$_REQUEST['set'] . " SET packs = packs + 1 WHERE multiverseID = 221557");
		
		$long_q = "";
		foreach ($result as &$card) {
			if ($long_q == "") {
				$long_q = $long_q . "multiverseID = " . (string)$card . " ";
			} else {
				$long_q = $long_q . "OR multiverseID = " . (string)$card . " ";
			}
		}
		$wpdb->query("UPDATE set_" .$_REQUEST['set'] . " SET packs = packs + 1 WHERE " . $long_q);
		header("Location: ".$_SERVER["HTTP_REFERER"]);
		die();
	} else {
		
		exit("Invalid pick.");
	}
	}
	/*
	if ( !wp_verify_nonce( $_REQUEST['nonce'], "my_draft_pick_nonce")) {
			exit("No naughty business please");
	}
	
	
	/* if nonce doesn't exist in choices table / *
	
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


?>*/
