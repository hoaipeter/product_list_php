<?php

/**
 * Handle HTTP request
 *
 * @param $method
 * @param $url
 * @param $data
 *
 * @return bool|string|void
 */
function callAPI( $method, $url, $data ) {
	$curl = curl_init();
	switch ( $method ) {
		case "POST":
			curl_setopt( $curl, CURLOPT_POST, 1 );
			if ( $data ) curl_setopt( $curl, CURLOPT_POSTFIELDS, $data );
			break;
		case "PUT":
			curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "PUT" );
			if ( $data ) curl_setopt( $curl, CURLOPT_POSTFIELDS, $data );
			break;
		default:
			if ( $data ) $url = sprintf( "%s?%s", $url, http_build_query( $data ) );
	}
	// OPTIONS:
	curl_setopt( $curl, CURLOPT_URL, $url );
	curl_setopt( $curl, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
	) );
	curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
	// EXECUTE:
	$result = curl_exec( $curl );
	if ( !$result ) {
		die( "Connection Failure" );
	}
	curl_close( $curl );
	return $result;
}

/**
 * Insert data to database
 */
function insert_data() {
	include_once $_SERVER['DOCUMENT_ROOT'] . '/db_config.php';
	$img_arr = array(
		"3" => "/images/cropped_boucle_tweed_top.png",
		"5" => "/images/square_neck_ruched_mini_dress.png",
		"8" => "/images/diagonal_stitch_tapered_jean.png",
		"9" => "/images/super_oversized_tee.png",
		"10" => "/images/boxy_knit_top.png",
		"12" => "/images/seamless_zip_through_top.png",
		"13" => "/images/longline_cord_shirt.png",
		"14" => "/images/super_high_rise_straight_jean.png",
		"15" => "/images/pintuck_wide_leg_pant.png",
		"16" => "/images/seamless_v-scoop_top.png",
		"17" => "/images/wide_leg_jean.png",
		"18" => "/images/seamless_zip_through_top.png",
	);

	$get_data = callAPI( 'GET', 'https://www.blackpepper.co.nz/api/candidate/products', false );
	$response = json_decode( $get_data, true );

	$sql = "INSERT INTO " . $db_Name . ".product (product_id,	style,	description,	extdescription,	img_url, lastupdated)";
	$sql .= " VALUES ";

	$sql1 = "INSERT INTO " . $db_Name . ".price (product_id,	currency,	base_unit_price, unit_price)";
	$sql1 .= " VALUES ";

	foreach ( $response["data"] as $key => $data ) {
		if ( $key === count( $response["data"] ) - 1 ) {
			$sql .= "(" . $data["productid"] . ',"' . $data["style"] . '","' . $data["description"] . '","' . $data["extdescription"] . '","' . $img_arr[$data["productid"]] . '","' . $data["lastupdated"] . '")';
			$sql1 .= "(" . $data["productid"] . ',"' . $data["price"][0]["currency"] . '","' . $data["price"][0]["baseunitprice"] . '","' . $data["price"][0]["unitprice"] . '")';
		} else {
			$sql .= "(" . $data["productid"] . ',"' . $data["style"] . '","' . $data["description"] . '","' . $data["extdescription"] . '","' . $img_arr[$data["productid"]] . '","' . $data["lastupdated"] . '"),';
			$sql1 .= "(" . $data["productid"] . ',"' . $data["price"][0]["currency"] . '","' . $data["price"][0]["baseunitprice"] . '","' . $data["price"][0]["unitprice"] . '"),';
		}
	}

	if ( $db_connection->query( $sql ) !== true ) {
		echo "Error: " . $sql . "<br>" . $db_connection->error;
	}

	if ( $db_connection->query( $sql1 ) !== true ) {
		echo "Error: " . $sql1 . "<br>" . $db_connection->error;
	}
}

/**
 * Get data from database
 *
 * @return array
 */
function get_data() {
	include_once $_SERVER['DOCUMENT_ROOT'] . '/db_config.php';

	$sql = "SELECT * FROM product LEFT JOIN price ON product.product_id = price.product_id ORDER BY product.description, price.currency, price.base_unit_price, price.unit_price";

	$return_data = array();
	$stmt = $db_connection->prepare( $sql );

	if ( $stmt->execute() ) {
		$result = $stmt->get_result();
		foreach ( $result as $data ) {
			$return_data[] = $data;
		}
	}

	return $return_data;
}


/**
 * Search field based on search string
 *
 * @param $query
 *
 * @return array
 */
function search_data( $query ) {
	include_once $_SERVER['DOCUMENT_ROOT'] . '/db_config.php';

	$sql = "SELECT * FROM product LEFT JOIN price ON product.product_id = price.product_id
        WHERE product.style like '%$query%' 
        OR product.description like '%$query%' 
        OR price.currency like '%$query%' 
        OR price.base_unit_price like '%$query%' 
        OR price.unit_price like '%$query%'
        ORDER BY product.description, price.currency, price.base_unit_price, price.unit_price";

	$return_data = array();
	$stmt = $db_connection->prepare( $sql );

	if ( $stmt->execute() ) {
		$result = $stmt->get_result();
		foreach ( $result as $data ) {
			$return_data[] = $data;
		}
	}

	return $return_data;
}