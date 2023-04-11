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
        case "getVerifyCode":
            $params = array(
                'business_name' => $_POST["businessName"],
                'phone_number' => $_POST["phoneNumber"]
            );

            $result = $post->curl_post("/xun/business/market/register", $params);

            echo $result;
            break;

        case "resendVerificationCode":
            $params = array(
                'table_id' => $_POST["tableID"],
                'business_name' => $_POST["businessName"],
                'phone_number' => $_POST["phoneNumber"]
            );

            $result = $post->curl_post("/xun/business/market/get", $params);

            echo $result;
            break;

        case "checkVerificationCode":

            $params = array(
                'verify_code' => $_POST["verifyCode"],
                'id' => $_POST["id"]
            );

                $result = $post->curl_post("/xun/business/market/code", $params);

                echo $result;
            break;

        case "registerLanding":

            $params = array(
              'table_id' => $_POST['tableID'],
              'business_email' => $_POST['business_email'],
              'business_password' => $_POST['business_password'],
              'business_name' => $_POST['business_name'],
              'utm_source' => $_POST['utmSource'],
              'utm_medium' => $_POST['utmMedium'],
              'utm_campaign' => $_POST['utmCampaign'],
              'utm_term' => $_POST['utmTerm'],
              'ip' => $_POST['ip'],
              'user_agent' => $_POST['user_agent'],
              'type' => $_POST['type'],
              'country' => $_POST['country'],
              'device_id' => $_POST['device_id'],
              'url' => $_POST['userUrl']
            );

            $result = $post->curl_post("/xun/business/market/signup", $params);

            // $test = json_encode($params);
            // echo $test;
            echo $result;
            
            break;

        case "webpaylandingpagedetailsget":
     
            $params = array(
                'short_code' => $_POST['short_code'],
				'code' => $_POST['code'],
                'username'  => $_POST['username'],
                'return_referral_code' => $_POST['return_referral_code'],
				
                
            );

            $result = $post->curl_post("/web/pay/landing/page/details/get", $params);

            // $test = json_encode($params);
            // echo $test;
            echo $result;
        
            break;

    }
    ?>
