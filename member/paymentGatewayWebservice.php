<?php

      include("include/config.php");

      $json_data = json_decode(file_get_contents('php://input'), true);

      $command = strtolower(str_replace("/", "", $_SERVER['REQUEST_URI']));

      if($command=="whitelistaddressmulti") {
            // $business_id = trim($params["business_id"]) ? trim($params["business_id"]) :  trim($params["account_id"]);
            $new_data = array("command"=>"whitelistMultiAddressAPI", 
                                "partner"=>$sys['whitelistPartner'], 
                                "params"=> array("user_id"=>$json_data['business_id']? $json_data['business_id'] : $json_data['account_id'],
                                                "api_key"=>$json_data['api_key'],
                                                "address"=>$json_data['address'])
                        );

            $json_data = json_encode($new_data);
            $ws_url = $sys['whitelistWebserviceURL'];

      } else {

            $json_data = json_encode($json_data);
            $ws_url = $sys['webserviceURL'].$_SERVER['REQUEST_URI'];

      }

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $ws_url);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'X-FORWARDED-FOR: '.$_SERVER['HTTP_X_FORWARDED_FOR']));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_TIMEOUT, 30);
      $requestFund = curl_exec($ch);
      curl_close($ch);

      print_r($requestFund);

?>
