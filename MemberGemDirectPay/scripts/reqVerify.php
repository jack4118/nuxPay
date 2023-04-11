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
        case "verifyAcc":
            $params = array(
                'verify_code' => $_POST["verify"]
            );

            $result = $post->curl_post("/web/pay/verify/code", $params);

            echo $result;
            break;

        case "resendEmail":

                $params = array("business_email" => $_POST['businessEmail']);

                $result = $post->curl_post("/xun/business/register/resend-email", $params);

                echo $result;
            break;

    }
    ?>
