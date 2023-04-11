<?php

	$json = json_decode(file_get_contents('php://input'), true);

	$ws_url = $json['url'];
	$data = $json['data'];
	$json_data = json_encode($data);


	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $ws_url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	$requestFund = curl_exec($ch);
	curl_close($ch);

	print_r($requestFund);


?>