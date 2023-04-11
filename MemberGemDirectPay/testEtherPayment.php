<?php

	$business_id = "10009";//"10010";
	$api_key = "DH9jto9iuDngLscw2ZUJpFP3V6qAmEX5";//"dHlkyo9iuDngLscw2ZUJpFP3V6qAmEX5";
	$fundInCurrency = "ethereum";
	$fundInAmount = "";
	$ref = "test";
	$returnURL = "https://devgemdirectpay2.nuxpay.com/testreturn.php";
	
	$ws_url = "http://dev.nuxpaywhitelabelbackend.testback/payment_gateway/merchant/transaction/request";

        $params = array("business_id"=>$business_id,
                        "api_key"=>$api_key,
                        "currency"=>$fundInCurrency, //tetherUSD
                        "amount"=>$fundInAmount,
                        "reference_id"=>$ref,
                        "redirect_url"=>$returnURL,
                        "address"=>'');

        $params = json_encode($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $ws_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $requestFund = curl_exec($ch);

        curl_close($ch);
        $requestFund = json_decode($requestFund);

        if ($requestFund->code == 1) {

            $requestFundData = $requestFund->data;

            $transaction_token = $requestFundData->transaction_token;
            $reference_id = $requestFundData->reference_id;
            $address = $requestFundData->address;

	   
	    echo '<form action="https://devgemdirectpay2.nuxpay.com/qrPayment.php" method="post" id="frm" >';
	    echo '<input type="hidden" name="transaction_token" id="transaction_token" value="'.$transaction_token.'">';
	    echo '</form>'; 
	    echo '<script>document.getElementById("frm").submit();</script>';	

	} else {
		echo "+60165974123|Gem";
		echo "<pre>";
		print_r($requestFund);
		echo "</pre>";
	}

?>
