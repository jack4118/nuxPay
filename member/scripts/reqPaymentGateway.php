<?php
    /**
     * @author ttwoweb.
     * This file is contains the Webservices for messageAssigned Listing.
     *
    **/
    session_start();
    // echo "????";

    include(dirname(__FILE__)."/../include/config.php");
    // include($_SERVER["DOCUMENT_ROOT"]."/language/lang_all.php");
    include(dirname(__FILE__)."/../include/class.general.php");
    include(dirname(__FILE__)."/../include/class.post.php");
    // include($_SERVER["DOCUMENT_ROOT"]."/include/class.globalSettings.php");

    $general = new general();
    $language = $general->getLanguage();


    $post      = new post();
    $command   = $_POST['command'];
    $viewType   = $_POST['viewType'];
    // $inputData = $_POST['inputData'];
    // $sessionID = $_SESSION['sessionID'];
    // $username  = $_SESSION['username'];
    // $userID    = $_SESSION['userID'];

    // if($_POST['type'] == 'logout'){
    //     session_destroy();
    // }
    // else{
    if($_POST['type'] == 'logout'){
        session_destroy();
    }

    switch($command) {
            //get tag table data
            case "getDestinationAddress":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"]
                );

                // $result = $post->curl_post("/xun/crypto/get/wallets/destination/address", $params);
                $result = $post->curl_post("/xun/crypto/get/wallets/destination/address/v1", $params);

                echo $result;
            break;

        case "getDestinationAddressType":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'wallet_type' => $_POST["wallet_type"]
            );

            $result = $post->curl_post("/xun/crypto/get/wallets/destination/address/v1", $params);

            echo $result;
        break;

        case "setDestinationAddress":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'wallet_type' => $_POST["wallet_type"],
                'destination_address' => $_POST["destination_address"],
                'status' => $_POST["status"],
                "wallet_name" => $_POST['wallet_name']
            );

                $result = $post->curl_post("/web/pay/destination/address/set", $params);

                echo $result;
            break;

            case "getAddressListing":
                $params = array(
                    'wallet_type' => $_POST["wallet_type"],
                    'business_id' => $_SESSION["business"]["uuid"],
                    'page' => $_POST['page']
                );

                $result = $post->curl_post("/xun/crypto/get/address/list", $params);
                
                echo $result;
            break;

            case "generateNewAddress":
                $params = array(
                    'wallet_type' => $_POST["wallet_type"],
                    'business_id' => $_SESSION["business"]["uuid"]
                );

                $result = $post->curl_post("/xun/web/pay/generate/address", $params);
                
                echo $result;
            break;

            case "getApiKeyListing":
                $params = array(
                    'business_id'       => $_SESSION["business"]["uuid"],
                    'status'            => $_POST["status"],
                    'from_datetime'     => $_POST["from_datetime"],
                    'to_datetime'       => $_POST["to_datetime"],
                    'page'              => $_POST['page']
                );

                $result = $post->curl_post("/xun/crypto/get/apikey/list", $params);
                
                echo $result;
            break;

            case "generateApiKeys":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    'expired_at'  => $_POST["expiry_date"],
                    'reference' => $_POST["reference"],
                );

                $result = $post->curl_post("/xun/crypto/generate/apikey", $params);
                
                echo $result;
            break;

            case "deleteApiKey":
                $params = array(
                    'apikey_id' => $_POST["apikey_id"]
                );

                $result = $post->curl_post("/xun/crypto/delete/apikey", $params);
                
                echo $result;

            break;

            case "getTransactionList":
                $params = array(
                
                    'business_id' => $_SESSION["business"]["uuid"],
                    'wallet_type' => $_POST["wallet_type"],
                    'status'      => $_POST["status"],
                    'from'        => $_POST["from"],
                    'to'          => $_POST["to"],
                    'page'        => $_POST['page'],
					'search_param'=> $_POST['searchParam'],
                    'name'        => $_POST["name"],
                    'mobile'      => $_POST["mobile"],
                    'email'       => $_POST["email"],
					'is_export'	  => $_POST["is_export"],
					
                );

                $result = $post->curl_post("/xun/crypto/get/transaction/list/v1", $params);
                
                echo $result;

            break;

            case "getWalletType":
				$params = array(
					"provider" => $_POST['provider'],
                    "setting_type" => $_POST['setting_type'],
                    "tx_wallet_type" => $_POST['tx_wallet_type'],
                    "user_id" => $_POST['user_id']
				);
			
                $result = $post->curl_post("/xun/crypto/get/wallet/type", $params);
                
                echo $result;

            break;

            case "getWalletData":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"]
                );

                $result = $post->curl_post("/xun/crypto/get/wallet/data", $params);
                
                echo $result;

            break;

            case "setCryptoStatus":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    'wallet_type' => $_POST["wallet_type"],
                    'status' => $_POST["status"]
                );

                $result = $post->curl_post("/xun/crypto/set/wallet/status", $params);
                
                echo $result;

            break;

            case "getCallbackURL":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"]
                );

                $result = $post->curl_post("/xun/crypto/get/callback/url", $params);
                
                echo $result;

            break;

            case "setCallbackURL":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    'callback_url' => $_POST["callbackURL"]
                );

                $result = $post->curl_post("/xun/crypto/set/callback/url", $params);
                
                echo $result;

            break;

            case "getPgTransactionDetails":
                $params = array(
                    'transaction_token' => $_POST["transactionToken"]
                );

                $result = $post->curl_post("/xun/payment_gateway/merchant/transaction/details", $params);
                
                echo $result;

            break;

            case "getPgTransactionCheckStatus":
                $params = array(
                    'transaction_token' => $_POST["transactionToken"]
                );

                $result = $post->curl_post("/xun/payment_gateway/merchant/transaction/status", $params);
                
                echo $result;

            break;

            case "getPgTransactionListDetails":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    'id'          => $_POST["id"]
                );

                $result = $post->curl_post("/web/pay/transaction/details/get", $params);
                
                echo $result;

            break;

            case "webpaydestinationaddresssetv1":
                $params = array(
                    'business_id'             => $_SESSION["business"]["uuid"],
                    'crypto_address_details'  => $_POST["crypto_address_details"]
                );

                $result = $post->curl_post("/xun/crypto/set/destination/address/v1", $params);
                
                echo $result;

            break;

            case "requestFundVerification":
                $params = array(
                    "currency" => $_POST['currency'],
                    "payee_name" => $_POST['payee_name'],
                    "payee_email_address" => $_POST['payee_email_address'],
                    "payee_mobile_phone" => $_POST['payee_mobile_phone'],
                    "payer_name" => $_POST['payer_name'],
                    "payer_email_address" => $_POST['payer_email_address'],
                    "payer_dialing_area" => $_POST['payer_dialing_area'],
                    "payer_mobile_phone" => $_POST['payer_mobile_phone'],
                    "payer_mobile_phone_full" => $_POST['payer_mobile_phone_full'],
                    "payment_amount" => $_POST['payment_amount'],
                    "payment_description" => $_POST['payment_description'],
                    "payment_item_list" => $_POST['payment_item_list'],
                    "payee_type" => $_POST['payee_type'],
                    "payer_type" => $_POST['payer_type'],
                    "referral_code" => $_POST['referral_code'],
                    "toggle_new_address" => $_POST['toggle_new_address'],
                );

                $result = $post->curl_post("/xun/payment_gateway/invoice/payment/request/verification", $params);
                
                echo $result;

            break;

            case "requestFundConfirmation":
                $params = array(
                    "currency" => $_POST['currency'],
                    "payee_name" => $_POST['payee_name'],
                    "payee_email_address" => $_POST['payee_email_address'],
                    "payee_mobile_phone" => $_POST['payee_mobile_phone'],
                    "payer_name" => $_POST['payer_name'],
                    "payer_email_address" => $_POST['payer_email_address'],
                    "payer_dialing_area" => $_POST['payer_dialing_area'],
                    "payer_mobile_phone" => $_POST['payer_mobile_phone'],
                    "payment_amount" => $_POST['payment_amount'],
                    "payment_description" => $_POST['payment_description'],
                    "payment_item_list" => $_POST['payment_item_list'],
                    "payee_type" => $_POST["payee_type"],
                    "payer_type" => $_POST["payer_type"],
                    "referral_code" => $_POST['referral_code'],
                    "signup_type" => $_POST['signup_type'],
                    "set_my_name" => $_POST['set_my_name'],
                    "toggle_new_address" => $_POST['toggle_new_address']
                );

                $result = $post->curl_post("/xun/payment_gateway/invoice/payment/request", $params);
                
                $result2 = json_decode($result, true);
                if ($result2['code'] == 1){
                    $_SESSION["name"] = $_POST['payee_name'];
                }


                echo $result;

            break;

            case "getPaymentDetails":
                $params = array(
                    "transaction_token" => $_POST['transaction_token']
                );

                $result = $post->curl_post("/xun/payment_gateway/invoice/details/get", $params);
                
                echo $result;

            break;

            case "getUserInfo":
                $params = array(
                    "user_search" => $_POST['user_search']
                );

                $result = $post->curl_post("/web/get/user/info", $params);
                
                echo $result;

            break;

            case "payment_gatewaypayerdetailset":
                $params = array(
                    "invoice_detail_id" => $_POST['invoice_detail_id'],
                    "new_payer_name" => $_POST['new_payer_name'],
                    "new_payer_email" => $_POST['new_payer_email'],
                    "new_payer_mobile" => $_POST['new_payer_mobile']
                );

                $result = $post->curl_post("/xun/payment_gateway/payer/detail/set", $params);
                
                echo $result;

            break;

            case "getSwapcoinSupportedCoins":
                $params = array(                    
                );

                $result = $post->curl_post("/swapcoin/supportedcoins/get", $params);
                
                echo $result;

            break;

            case "getInvoiceList":
                $params = array(
                    "payee_mobile_phone" => $_POST['payee_mobile_phone'],
                    "payee_email_address" => $_POST['payee_email_address'],
                    "status" => $_POST['status'],
                    "date_from" => $_POST['date_from'],
                    "date_to" => $_POST['date_to'],
                    "payer_name" => $_POST['payer_name'],
                    "payer_mobile_phone" => $_POST['payer_mobile_phone'],
                    "payer_email_address" => $_POST['payer_email_address'],
                    "page" => $_POST['page'],
                    "see_all" => $_POST['see_all']
                );

                $result = $post->curl_post("/xun/payment_gateway/invoice/list/get", $params);
                
                echo $result;

            break;

            case "getWithdrawalBalance":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    'wallet_type' => $_POST["walletType"]
                );

                $result = $post->curl_post("/xun/payment_gateway/withdrawal/balance/get", $params);
                
                echo $result;

            break;

            case "getWithdrawalList":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    "status" => $_POST['status'],
                    "date_from" => $_POST['date_from'],
                    "date_to" => $_POST['date_to'],
                    "page" => $_POST['page'],
                    "see_all" => $_POST['see_all'],
                    "wallet_type" => $_POST['wallet_type'],
					"search_param" => $_POST["searchParam"],
					"name" => $_POST["name"],
					"email" => $_POST["email"],
                    "mobile" => $_POST["mobile"],
                    "type" => $_POST["type"]
                );

                $result = $post->curl_post("/xun/payment_gateway/withdrawal/list/get", $params);
                
                echo $result;

            break;

            case "payment_gatewayapiwithdrawallistget":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    "status" => $_POST['status'],
                    "date_from" => $_POST['date_from'],
                    "date_to" => $_POST['date_to'],
                    "page" => $_POST['page'],
                    "see_all" => $_POST['see_all'],
                    "wallet_type" => $_POST['wallet_type'],
					"search_param" => $_POST["searchParam"],
                );

                $result = $post->curl_post("/xun/payment_gateway/api/withdrawal/list/get", $params);
                
                echo $result;
            break;

            case "createWithdrawal":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    'wallet_type' => $_POST["wallet_type"],
                    "withdrawal_balance" => $_POST["withdrawal_balance"],
                    "destination_address" => $_POST["destination_address"]
                );

                $result = $post->curl_post("/xun/payment_gateway/request/fund/withdrawal/create", $params);

                echo $result;

            break;

            case "getWalletBalance":
                $params = array(
                    // 'business_id' => $_SESSION["business"]["uuid"],
                    'wallet_status' => $_POST['wallet_status'],
                    'setting_type' => $_POST['setting_type']
                );

                $result = $post->curl_post("/xun/payment_gateway/wallet/balance/get", $params);

                echo $result;

            break;

            case "destinationAddressSet":
                $params = array(
                    // 'business_id' => $_SESSION["business"]["uuid"],
                    "unit" => $_POST["unit"],
                    "destination_address" => $_POST["destination_address"],
                    "status" => $_POST["status"]
                );

                $result = $post->curl_post("/xun/crypto/destination/address/status/set", $params);

                echo $result;

            break;
			
			case "getEstimatedMinerFee":
				$params= array(
					"sender_address" => $_POST['sender_address'],
					"receiver_address" => $_POST['destination_address'],
					"amount" => $_POST['amount'],
					"wallet_type" => $_POST['wallet_type'],
					"transaction_type" => $_POST['transaction_type'],
					
				);
			
				$result = $post->curl_post("/xun/get/estimated/miner/fee", $params);

                echo $result;
				break;
			
			case "getWithdrawalDetails":
				$params = array(
					"id" => $_POST['withdrawal_id'],
				);
			
				$result = $post->curl_post("/xun/payment_gateway/withdrawal/details/get", $params);

                echo $result;
                break;
                
            case "getFundOutCoinListing":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    'listOnly' => $_POST['listOnly'],
                    'listOnlyLength' => $_POST['listOnlyLength']
                );

                $result = $post->curl_post("/xun/payment_gateway/get/fund/out/coin/listing", $params);

                echo $result;
                break;
            
            case "setFundOutExternalAddress":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    'currency_id' => $_POST['currency_id'],
                    'status' => $_POST['status']
                );

                $result = $post->curl_post("/xun/payment_gateway/set/fund/out/external/address", $params);

                echo $result;
                break;

            case "setFundOutExternalAddressV2":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    'currency_id' => $_POST['currency_id'],
                    'status' => $_POST['status'],
                    'address' => $_POST['address']
                );

                $result = $post->curl_post("/xun/payment_gateway/set/fund/out/external/address/V2", $params);

                echo $result;
                break;

            case "generateExternalAddress":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    'currency_id' => $_POST['currency_id'],
                );

                $result = $post->curl_post("/xun/payment_gateway/generate/external/address", $params);

                echo $result;
                break;
    
            case "getFundOutListing":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    'status' => $_POST['status'],
                    "date_from" => $_POST['date_from'],
                    "date_to" => $_POST['date_to'],
                    "currency_id" => $_POST['wallet_type'],
                    "pageNumber" => $_POST['pageNumber'],

                );

                $result = $post->curl_post("/xun/payment_gateway/get/fund/out/listing", $params);

                echo $result;
                break;
            
            case "getInvoiceTransaction":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    'transaction_hash' => $_POST['transaction_hash']
                );

                $result = $post->curl_post("/web/pay/get/invoice/transaction", $params);

                echo $result;
                break;
            
            case "updateTransactionInvoice":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    'transaction_hash' => $_POST['transaction_hash'],
                    'invoice_detail_id'=> $_POST['invoice_detail_id']
                );

                $result = $post->curl_post("/web/pay/invoice/transaction/update", $params);

                echo $result;
                break;
			
			case "webpaysendfundverification":
				$params = array(
					'business_id' => $_SESSION["business"]["uuid"],
					'sender_name' => $_POST['sender_name'],
					'sender_email_address' => $_POST['sender_email_address'],
					'sender_mobile_number' => $_POST['sender_mobile_number'],
					'sender_type' => $_POST['sender_type'],
					'receiver_name' => $_POST['receiver_name'],
					'receiver_email_address' => $_POST['receiver_email_address'],
					'receiver_mobile_number' => $_POST['receiver_mobile_number'],
					'receiver_type' => $_POST['receiver_type'],
					'amount' => $_POST['amount'],
					'wallet_type' => $_POST['wallet_type'],
					'description' => $_POST['description']
					
				);
			
				$result = $post->curl_post("/web/pay/send/fund/verification", $params);

                echo $result;
                break;
			
			case "webpaysendfundrequest":
				$params = array(
					'business_id' => $_SESSION["business"]["uuid"],
					'sender_name' => $_POST['sender_name'],
					'sender_email_address' => $_POST['sender_email_address'],
					'sender_mobile_number' => $_POST['sender_mobile_number'],
					'sender_type' => $_POST['sender_type'],
					'receiver_name' => $_POST['receiver_name'],
					'receiver_email_address' => $_POST['receiver_email_address'],
					'receiver_mobile_number' => $_POST['receiver_mobile_number'],
					'receiver_type' => $_POST['receiver_type'],
					'amount' => $_POST['amount'],
                    'escrow' => $_POST['escrow'],
					'wallet_type' => $_POST['wallet_type'],
					'description' => $_POST['description'],
					'transaction_token' => $_POST['transaction_token'],
					
				);
			
				$result = $post->curl_post("/web/pay/send/fund/request", $params);

                echo $result;
                break;

                
			case "webpayredeemcodedetailsget":
				$params = array(
					'redeem_code' => $_POST['redeem_code']
				);
			
				$result = $post->curl_post("/web/pay/redeem/code/details/get", $params);

                echo $result;
                break;

			case "webpayredeempin":
				$params = array(
					'business_id' => $_SESSION["business"]["uuid"],
					'redeem_code' => $_POST['redeem_code']
				);
			
				$result = $post->curl_post("/web/pay/redeem/pin", $params);

                echo $result;
                break;
			
			case "webpayredeempinresend":
				$params = array(
					'business_id' => $_SESSION["business"]["uuid"],
					'redeem_code' => $_POST['redeem_code']
				);
			
				$result = $post->curl_post("/web/pay/redeem/pin/resend", $params);

                echo $result;
                break;
			
            case "getconversionrate":
           		$params = array(
					'amount' => $_POST["amount"],
                    'fiat_currency_id' => $_POST['fiat_currency_id'],
                    'destination_address' => $_POST["destination_address"],
                    'wallet_type' => $_POST['wallet_type'],
					'provider' => $_POST['provider'],
                    'type' => $_POST['type'],
                );
			
                $result = $post->curl_post("/crypto/conversion/get", $params);

                echo $result;
                break;
			
			case "pgAddressWithdrawVerification":
     
				$params = array(
                    'destination_address' => $_POST["destination_address"],
                    'wallet_type' => $_POST['wallet_type']
                );
            
                $result = $post->curl_post("/web/pay/pg/address/withdraw/verification", $params);

                echo $result;
                break;
			
			case "pgAddressWithdraw":
     
				$params = array(
                    'destination_address' => $_POST["destination_address"],
                    'wallet_type' => $_POST['wallet_type']
                );
            
                $result = $post->curl_post("/web/pay/pg/address/withdraw", $params);

                echo $result;
                break;
			
			case "webpaysendfunddetailsget":
     
				$params = array(
                    'transaction_token' => $_POST['transaction_token']
                );
            
                $result = $post->curl_post("/web/pay/send/fund/details/get", $params);

                echo $result;
                break;
			
			case "getSendFundTransactionStatus":
                $params = array(
                    'transaction_token' => $_POST["transactionToken"]
                );

                $result = $post->curl_post("/xun/payment_gateway/send/fund/transaction/status/get", $params);
                
                echo $result;

            	break;
			
			case "webpaypaymentaddressdetailget":
                $params = array(
                    'transaction_token' => $_POST["transactionToken"],
					'wallet_type' => $_POST['walletType'],
                );

                $result = $post->curl_post("/xun/web/pay/payment/address/detail/get", $params);
                
                echo $result;

            	break;
			
			case "webpayconversionamountget":
                $params = array(
                    'amount' => $_POST['amount'],
					'from_wallet_type' => $_POST['walletType'],
					'to_wallet_type' => $_POST['toWalletType'],
                );

                $result = $post->curl_post("/xun/web/pay/conversionamountget", $params);
                
                echo $result;

                break;
            case "getNuxPayWalletAddressList":
                    $params = array(
                        'business_id' => $_SESSION["business"]["uuid"]
                    );
        
                    $result = $post->curl_post("/xun/web/pay/wallet/address/list/get", $params);
        
                    echo $result;
                break;

            case "validateAddress":
                    $params = array(
                        'business_id' => $_SESSION["business"]["uuid"],
                        'wallet_type' => $_POST['wallet_type'],
                        'address'     => $_POST["address"],
                    );
        
                    $result = $post->curl_post("/xun/web/pay/address/validate", $params);
        
                    echo $result;
                break;
			
	        case "receiptdetailsget":
                    $params = array(
                        'transaction_token'     => $_POST["transaction_token"],
                    );
        
                    $result = $post->curl_post("/xun/web/pay/receipt/details/get", $params);
        
                    echo $result;
                break;
			
			case "getSimplexQuote":
				$params = array(
					'wallet_type' => $_POST['wallet_type'],
					'fiat_currency' => $_POST['fiat_currency'],
					'fiat_amount' => $_POST['fiat_amount'],
					'crypto_amount' => $_POST['crypto_amount'],
					'transaction_type' => $_POST['transaction_type'],
					'payment_method_type' => $_POST['payment_method_type'],
					'destination_address' => $_POST['destination_address'],
                    'end_user_id' => $_POST['end_user_id'],
                    'business_id' => $_POST['business_id'],
				);
			
				$result = $post->curl_post("/web/pay/crypto/quote/get", $params);
        
                    echo $result;
                break;
			
			case "simplexCreatePayment":
				$params = array(
					'wallet_type' => $_POST['wallet_type'],
					'fiat_currency' => $_POST['fiat_currency'],
					'fiat_amount' => $_POST['fiat_amount'],
					'crypto_amount' => $_POST['crypto_amount'],
					'transaction_type' => $_POST['transaction_type'],
					'payment_method_type' => $_POST['payment_method_type'],
					'quote_id' => $_POST['quote_id'],
					'destination_address' => $_POST['destination_address'],
					'transaction_token' => $_POST['transaction_token'],
				
				);
		
			
				$result = $post->curl_post("/web/pay/simplex/payment", $params);
        
                    echo $result;
                break;
			
			case "getXanpoolQuote":
				$params = array(
					'wallet_type' => $_POST['wallet_type'],
//					'amount' => $_POST['amount'],
					'fiat_amount' => $_POST['fiat_amount'],
					'crypto_amount' => $_POST['crypto_amount'],
					'fiat_currency' => $_POST['fiat_currency'],
					'transaction_type' => $_POST['transaction_type'],
					'destination_address' => $_POST['destination_address'],
				
				);

			
				$result = $post->curl_post("/web/pay/xanpool/quote/get", $params);
        
                echo $result;
                break;
			
			case "xanpoolCreatePayment":
				$params = array(
					'wallet_type' => $_POST['wallet_type'],
					'fiat_amount' => $_POST['fiat_amount'],
					'fiat_currency' => $_POST['fiat_currency'],
					'crypto_amount' => $_POST['crypto_amount'],
					'transaction_type' => $_POST['transaction_type'],
//					'payment_method' => $_POST['payment_method_type'],
					'destination_address' => $_POST['destination_address'],
					'transaction_token' => $_POST['transaction_token'],
					
				);

			
				$result = $post->curl_post("/web/pay/xanpool/payment", $params);
        
                echo $result;
                break; 	
			
			case "getSupportedCurrencies":
				$params = array(
					"provider" => $_POST['provider'],
					"transaction_type" => $_POST['transaction_type']
				);
			
				$result = $post->curl_post("/web/pay/buy/crypto/supported/currency/get", $params);
        
                echo $result;
                break; 	

                
            
            case "getBuyCryptoHistory":
				$params = array(
                    'symbol' => $_POST["wallet_type"],
                    'status'      => $_POST["status"],
                    'date_from'        => $_POST["from"],
                    'date_to'          => $_POST["to"],
                    'page'        => $_POST['page'],
                    'provider'=> $_POST['provider'],
					'transaction_type' => $_POST['transaction_type'],
				);
				$result = $post->curl_post("/web/pay/buy/crypto/history/get", $params);
        
                echo $result;
                break;
			
			case "getBuyCryptoSetting":
				$params = array(
                    'provider'=> $_POST['provider'],
					'type' => $_POST['type'],
                    'transactionToken' => $_POST['transactionToken'],
				);
				$result = $post->curl_post("/web/pay/buy/crypto/setting/get", $params);
        
                echo $result;
                break;

            case "getBuySellTransactionTokenDetails":
				$params = array(
                    'transaction_token'=> $_POST['transaction_token'],
					'type' => $_POST['type'],
                    'custom_fiat_currency' => $_POST['custom_fiat_currency']
				);
				$result = $post->curl_post("/web/pay/buy/sell/transaction/token/details/get", $params);
        
                echo $result;
                break;    
			
            case "getProvider":
                $params = array(
                    'walletType'=> $_POST['walletType']
                );
                $result = $post->curl_post("/web/pay/provider/get", $params);
        
                echo $result;
                break;
			
			case "transferSellCrypto":
			
				 $params = array(
					'payment_id'=> $_POST['payment_id'],
					'reference_id' => $_POST['reference_id'],
					'crypto_amount' => $_POST['crypto_amount'],
					'symbol' => $_POST['symbol'],
					'fiat_amount' => $_POST['fiat_amount'],
					'fiat_currency' => $_POST['fiat_currency'],
					'destination_address' => $_POST['destination_address']
				);
				$result = $post->curl_post("/web/pay/xanpool/sell/crypto", $params);

				echo $result;
				break;

            case "getSupportedCurrenciesAndWalletType":

                $params = array(
                    "provider" => $_POST['provider'],
					"transaction_type" => $_POST['transaction_type'],
                    "setting_type" => $_POST['setting_type'],
                    "user_id" => $_POST['user_id'],
                );
                $result = $post->curl_post("/xun/crypto/get/wallet/supported/currencies", $params);

                echo $result;
                break;

            case "payment_gatewaymerchantbuysellpaymentrequest":

                $params = array(
                    'account_id'=> $_POST['account_id'],
                    'wallet_type' => $_POST['wallet_type'],
                    'crypto_amount' => $_POST['crypto_amount'],
                    'fiat_currency' => $_POST['fiat_currency'],
                    'type' => $_POST['type'],
                    'destination_address' => $_POST['destination_address'],
                    'provider' => $_POST['provider'],
                    'reference_id' => $_POST['reference_id']
                );
                $result = $post->curl_post("/payment_gateway/merchant/buysell/payment/request", $params);

                echo $result;
                break;

            case "getDeveloperData":
                $params = array(
                    'time' => $_POST['time'],
                    'user_id' => $_POST['userID']
                );
                $result = $post->curl_post("/xun/crypto/get/developer/data", $params);

                echo $result;
                break;

            case "getDeveloperIOData":
                $params = array(
                    'page' => $_POST['page'],
                    'search' => $_POST['search'],
                    'user_id' => $_SESSION["business"]["uuid"]
                );
                $result = $post->curl_post("/xun/crypto/get/developer/io/data", $params);

                echo $result;
                break;

            case "getDeveloperIOCommandList":
                $params = array();
                
                $result = $post->curl_post("/xun/crypto/get/developer/io/command/list", $params);

                echo $result;
                break;
			
    }  
?>
