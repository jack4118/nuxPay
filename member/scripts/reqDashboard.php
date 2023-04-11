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

                // $result = json_decode($result, true);
                
                //     if ($result) {
                //         $result['result']['package_start_date'] = date("d/m/Y", strtotime($result['result']['package_start_date']) - $serverTimeZone - $_SESSION["timezone"]);
                //         $result['result']['package_end_date'] = date("d/m/Y", strtotime($result['result']['package_end_date']) - $serverTimeZone -$_SESSION["timezone"]);
                //     }
                    
                // $result = json_encode($result);
                echo $result;

            break;


            case "getReceiveAddress":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    'wallet_type' => $_POST["wallet_type"]
                );

                $result = $post->curl_post("/web/pay/pg/address/list/get", $params);
                
                echo $result;
            break;


            case "getGraphData":
                $params = array(
                    'business_id'   => $_SESSION["business"]["uuid"],
                    'wallet_type'   => $_POST["wallet_type"],
                    'from_datetime' => $_POST["from_datetime"],
                    'to_datetime'   => $_POST["to_datetime"]
                );

                $result = $post->curl_post("/web/pay/transaction/gross/volume/get", $params);
                
                echo $result;
            break;

            case "getSalesGraphData":
                $params = array(
                    'business_id'   => $_SESSION["business"]["uuid"],
                    'time'   => $_POST["time"]
                );

                $result = $post->curl_post("/web/pay/transaction/sales/data/get", $params);
                
                echo $result;
            break;

            case "getOverallSalesData":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                );

                $result = $post->curl_post("/web/pay/transaction/overall/sales/get", $params);

                echo $result;
            break;
            
            case "getNewsCenter":
                $params = array(
                    'business_id'   => $_SESSION["business"]["uuid"]
                );

                $result = $post->curl_post("/web/pay/news/listing", $params);
                
                echo $result;
            break;


            case "getTransactionList":
                $params = array(
                    'business_id'   => $_SESSION["business"]["uuid"],
                    'wallet_type'   => $_POST["wallet_type"]
                );

                $result = $post->curl_post("/web/pay/latest/transaction/get", $params);
                
                echo $result;
            break;
            case "swapEstimateRate":
                $params = array(
                    'businessID'   => $_SESSION["business"]["uuid"],
                    'fromWalletType'   => $_POST["from_wallet_type"],
                    'toWalletType'   => $_POST["to_wallet_type"],
                );

                $result = $post->curl_post("/swapcoin/estimaterate", $params);
                
                echo $result;
            break;
            case "swap":
                $params = array(
                    'businessID'   => $_SESSION["business"]["uuid"],
                    'fromWalletType'   => $_POST["from_wallet_type"],
                    'toWalletType'   => $_POST["to_wallet_type"],
                    'referenceID'   => $_POST["reference_id"],
                );

                $result = $post->curl_post("/swapcoin/swap", $params);
                
                echo $result;
            break;
    }
?>
