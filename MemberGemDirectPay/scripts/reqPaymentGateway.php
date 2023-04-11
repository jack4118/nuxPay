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

            $result = $post->curl_post("/xun/crypto/get/wallets/destination/address", $params);

            echo $result;
        break;

        case "setDestinationAddress":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'wallet_type' => $_POST["wallet_type"],
                'destination_address' => $_POST["destination_address"],
                'status' => $_POST["status"]
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
                    'expired_at'  => $_POST["expiry_date"]
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
                    'wallet_type' => $_POST["walletType"],
                    'status'      => $_POST["status"],
                    'from'        => $_POST["from"],
                    'to'          => $_POST["to"],
                    'page'        => $_POST['page']
                );

                $result = $post->curl_post("/xun/crypto/get/transaction/list", $params);
                
                echo $result;

            break;

            case "getWalletType":
                $params = array(
                    // 'business_id' => $_SESSION["business"]["uuid"]
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
                    "payment_amount" => $_POST['payment_amount'],
                    "payment_description" => $_POST['payment_description']
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
                    "payment_description" => $_POST['payment_description']
                );

                $result = $post->curl_post("/xun/payment_gateway/invoice/payment/request", $params);
                
                echo $result;

            break;

            case "getPaymentDetails":
                $params = array(
                    "transaction_token" => $_POST['transaction_token']
                );

                $result = $post->curl_post("/xun/payment_gateway/invoice/details/get", $params);
                
                echo $result;

            break;

            case "getInvoiceList":
                $params = array(
                    "payee_mobile_phone" => $_POST['payee_mobile_phone'],
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
                    "see_all" => $_POST['see_all']
                );

                $result = $post->curl_post("/xun/payment_gateway/withdrawal/list/get", $params);
                
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
    }
    ?>
