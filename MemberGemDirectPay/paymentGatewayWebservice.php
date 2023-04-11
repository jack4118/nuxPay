<?php
include("include/config.php");
//print_r($_SERVER['REQUEST_URI']);
$json_data = json_decode(file_get_contents('php://input'), true);
$json_data = json_encode($json_data);
//echo "\n\n";
//print_r($json_data);

$ws_url = $sys['webserviceURL'].$_SERVER['REQUEST_URI'];

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
//echo "\n";
print_r($requestFund);

            $requestFund = json_decode($requestFund);
//echo "\n";
//echo $requestFund;


?>
