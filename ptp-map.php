<?php
/*
* Plugin Name: Pro-Truth Pledge Map
* Description: Shortcode [ptpMap] will display the map of Pledge Signers.
* Version: 1.0
* Author: Bentley Davis
* Author URI: https://BentleyDavis.com
* Author: Noah Heck
*/

function ptpLatLongs() {
    global $wpdb;
    $pledgeTable = $wpdb->prefix . "ptp_pledges";

    $result = $wpdb->get_results ( "
		SELECT *
		FROM $pledgeTable
		WHERE lat IS NOT NULL
	");

    $latLongs = [];

    foreach ($result as $row) {
        if ( $row->lng <> 0) {
            $latLongs[] = ["lat" => (string) $row->lat, "lng" => (string) $row->lng];
        }
    }

    return $latLongs;
}

function googleApiKey() {
    $data = include "config.php";

    return $data['googleApiKey'];
}


function ptpMap($atts, $content = "") {

    if (isset($_GET['address'])) {
        return "";
    }

    $latLongJson  = json_encode(ptpLatLongs());
    $googleApiKey = googleApiKey();

    ob_start();

    include "content.php";

    $html = ob_get_clean();

    return $html;
}

add_shortcode('ptpMap', 'ptpMap');
