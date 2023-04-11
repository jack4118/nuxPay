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

    // get server timezone
    $date = new DateTime();
    $serverTimeZone = date_offset_get($date);

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

        switch($command) {
            //dashboard
            case "getCurrentSubscription":
                $params = array(
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_email' => $_SESSION["business_email"],
                    'business_id' => $_SESSION["business"]["uuid"]
                );

                $result = $post->curl_post("/xun/business/package/subscription", $params);

                $result = json_decode($result, true);

                    $result["viewType"] = $_POST["viewType"];

                    $result['result']['package_start_date'] = date("d/m/Y", strtotime($result['result']['package_start_date']) - $serverTimeZone - $_SESSION["timezone"]);
                    $result['result']['package_end_date'] = date("d/m/Y", strtotime($result['result']['package_end_date']) - $serverTimeZone - $_SESSION["timezone"]);
                    
                $result = json_encode($result);
              
                echo $result;

            break;

            case "getPackageList":
                $params = array(
                    'X-Xun-Token' => $_SESSION["access_token"]
                );

                $result = $post->curl_post("/xun/business/package/list", $params);

                // $result = json_decode($result, true);

                //     if($result['result'][0]['package_price']==0.00){
                //         $result['result'][0]['package_price'] = "FREE";
                //     }                    
                    
                // $result = json_encode($result);
              
                echo $result;

            break;

            case "subscribePlan":
                $params = array(
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_email' => $_SESSION["business_email"],
                    'package_code' => $_POST['package_code'],
                    'business_id' => $_SESSION["business"]["uuid"],
                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'address' => $_POST['address'],
                    'postal' => $_POST['postal'],
                    'city' => $_POST['city'],
                    'state' => $_POST['state'],
                    'country' => $_POST['country'],
                    'auto_top_up_status' => $_POST['auto_top_up_status'],
                    'top_up_boundary' => $_POST['top_up_boundary'],
                    'stripe_token' => $_POST['stripeToken'],
                    'environment' => $_POST['environment']
                );
                //print_r($params);

                $result = $post->curl_post("/xun/business/package/payment/subscribe", $params);

                $result = json_decode($result,true);
                    if ($result["code"]==1) {
                        $_SESSION["package_code"] = $_POST['package_code'];
                    }

                $result = json_encode($result,true);

                echo $result;

            break;

            case "getBillingList":
                $params = array(
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_id' => $_SESSION["business"]["uuid"],
                    'business_email' => $_SESSION["business_email"],
                    'page' => $_POST['page'],
                    'page_size' => $_POST['page_size'],
                    'order' => $_POST['order']
                );

                $result = $post->curl_post("/xun/business/package/billing/history", $params);

                $result = json_decode($result, true);

                    foreach ($result['billing_history'] as $key => $data) {
                        $data['billing_date'] = date("d/m/Y H:i:s", strtotime($data['billing_date']) - $serverTimeZone - $_SESSION["timezone"]);
                        $result['billing_history'][$key] = $data;
                    }
                    
                $result = json_encode($result);

                echo $result;

            break;

            case "getInvoiceData":
                $params = array(
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_id' => $_SESSION["business"]["uuid"],
                    'business_email' => $_SESSION["business_email"],
                    'billing_invoice' => $_POST['invoiceID']
                );

                $result = $post->curl_post("/xun/business/package/billing/invoice", $params);

                $result = json_decode($result, true);

                    $result['result']['billing_date'] = date("d/m/Y", strtotime($result['result']['billing_date']) - $serverTimeZone - $_SESSION["timezone"]);
                    
                $result = json_encode($result);

                echo $result;

            break;

            case "getTopUpList":
                $params = array(
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_email' => $_SESSION["business_email"]
                );

                $result = $post->curl_post("/xun/business/package/top_up/list", $params);
                // print_r($result);
                echo $result;

            break;

            case "topUpPlan":
                $params = array(
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_email' => $_SESSION["business_email"],
                    'package_code' => $_POST['package_code'],
                    'business_id' => $_SESSION["business"]["uuid"],
                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'address' => $_POST['address'],
                    'postal' => $_POST['postal'],
                    'city' => $_POST['city'],
                    'state' => $_POST['state'],
                    'country' => $_POST['country'],
                    'quantity' => $_POST['quantity'],
                    'stripe_token' => $_POST['stripeToken'],
                    'environment' => $_POST['environment']
                );

                $result = $post->curl_post("/xun/business/package/payment/top_up", $params);
                
                echo $result;

            break;

            case "getAutoTopUp":
                $params = array(
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_email' => $_SESSION["business_email"],
                    'business_id' => $_SESSION["business"]["uuid"]
                );

                $result = $post->curl_post("/xun/business/package/subscription/auto_top_up/get", $params);
                
                echo $result;

            break;

            case "setAutoTopUp":
                $params = array(
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_email' => $_SESSION["business_email"],
                    'business_id' => $_SESSION["business"]["uuid"],
                    'top_up_boundary' => $_POST['top_up_boundary'],
                    'status' => $_POST['status']
                );

                $result = $post->curl_post("/xun/business/package/subscription/auto_top_up/set", $params);
                
                echo $result;

            break;

            case "getCreditBalance":
                $params = array(
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_email' => $_SESSION["business_email"],
                    'business_id' => $_SESSION["business"]["uuid"]
                );

                $result = $post->curl_post("/xun/business/package/credit/balance", $params);

                $result = json_decode($result,true);

                    if ($result["code"]==1) {
                        $_SESSION["credit_balance"] = $result['credit_balance'];
                    }

                $result = json_encode($result,true);
                
                echo $result;

            break;
            
    }
?>
