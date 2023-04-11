<?php

	$direct_detail = $_POST['direct_detail'];
	$payment_channel = $_POST['payment_channel'];

	if($direct_detail && $payment_channel) {

		$selected_payment_channel = $payment_channel[0];

		if($selected_payment_channel=="credit_card") {
			//simplex

			$payment_checkout_page = $direct_detail['payment_checkout_page'];
			$partner_name = $direct_detail['partner_name'];
			$payment_success_url = $direct_detail['payment_success_url'];
			$payment_failed_url = $direct_detail['payment_failed_url'];
			$payment_id = $direct_detail['payment_id'];
			$payment_flow_type = $direct_detail['payment_flow_type'];

			echo "<form id='payment_form' action='".$payment_checkout_page."' method='POST' target='_self'>";
			echo "<input type='hidden' name='version' value='1'>";
			echo "<input type='hidden' name='partner' value='".$partner_name."'>";
			echo "<input type='hidden' name='payment_flow_type' value='".$payment_flow_type."'>";
			echo "<input type='hidden' name='return_url_success' value='".$payment_success_url."'>";
			echo "<input type='hidden' name='return_url_fail' value='".$payment_failed_url."'>";
			echo "<input type='hidden' name='payment_id' value='".$payment_id."'>";
			echo "</form>";
			echo "<script>payment_form.submit();</script>";

		} else {
			//xanpool

			$xanpool_checkout_url = $direct_detail['xanpool_checkout_page']."/?apiKey=".$direct_detail['api_key']."&redirectUrl=".urlencode($direct_detail['redirect_url'])."&wallet=".$direct_detail['destination_address']."&partnerData=".$direct_detail['payment_id']."&fiat=".$direct_detail['fiat_amount']."&cryptoCurrency=".$direct_detail['symbol']."&currency=".$direct_detail['fiat_currency']."&transactionType=".$direct_detail['transaction_type'];

			header("Location: ".$xanpool_checkout_url);

		}

	} else {

		header("Location: index.php");
	}
	
?>