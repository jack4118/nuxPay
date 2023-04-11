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
            case "getSwapList":
                $params = array(
                    'business_id' => $_SESSION ["business"]["uuid"],
                    "page" => $_POST['page'],
                    'from_datetime'  => $_POST["date_from"],
                    'to_datetime'    => $_POST["date_to"],
                    'status' => $_POST["status"]
                );

                // $result = $post->curl_post("/xun/crypto/get/wallets/destination/address", $params);
                $result = $post->curl_post("/swapcoin/history/get", $params);

                echo $result;
            break;


            case "getSwapPreview":
                $params = array(
                    'from_wallet_type'  => $_POST["from_wallet_type"],
                    'to_wallet_type'    => $_POST["to_wallet_type"],
                );                
                $result = $post->curl_post("/swapcoin/preview/get", $params);

                echo $result;
            break;

            case "estimateSwapcoinRate":
                $params = array(
                    'businessID' => $_SESSION["business"]["uuid"],
                    'fromWalletType'  => $_POST["from_wallet_type"],
                    'toWalletType'    => $_POST["to_wallet_type"],
                    'fromAmount'    => $_POST["from_amount"],
                    'toAmount'    => $_POST["to_amount"],
                );                
                $result = $post->curl_post("/swapcoin/estimate/rate", $params);

                echo $result;
            break;

            case "swapcoinSwap":
                $params = array(                    
                    'referenceID'    => $_POST["reference_id"],
                );                
                $result = $post->curl_post("/swapcoin/swap", $params);

                echo $result;
            break;

          
			
        }  
        ?>