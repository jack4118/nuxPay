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

        switch($command) {
            //dashboard
            case "getLiveChatWidget":
                $params = array(
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_email' => $_SESSION["business_email"],
                    'business_id' => $_SESSION["business"]["uuid"]
                );

                $result = $post->curl_post("/xun/business/livechat/script", $params);
              
                echo $result;

            break;

            case "getLiveChatSettings":
                $params = array(
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_id' => $_SESSION["business"]["uuid"]
                );

                $result = $post->curl_post("/xun/business/livechat/setting/get", $params);
              
                echo $result;

            break;

            case "updateLiveChatSettings":
                $params = array(
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_id' => $_SESSION["business"]["uuid"],
                    'websiteUrl' => $_POST["websiteUrl"],
                    'contactUsURL' => $_POST["contactUsURL"],
                    'liveChatNoAgentMsg' => $_POST["liveChatNoAgentMsg"],
                    'liveChatAfterWorkingHrsMsg' => $_POST["liveChatAfterWorkingHrsMsg"],
                    'liveChatFirstMsg' => $_POST["liveChatFirstMsg"],
                    'liveChatPromp' => $_POST["liveChatPromp"],
                    'liveChatInfo' => $_POST["liveChatInfo"]

                );

                $result = $post->curl_post("/xun/business/livechat/setting/add", $params);
              
                echo $result;

            break;
            
    }
?>
