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
        case "utm_tracking":
            $params = array(
                'business_name' => $_POST["business_name"],
                'mobile_number' => $_POST["mobile_number"],
                'email_address' => $_POST["email_address"],
                'device_id' => $_POST["device_id"],
                'utm_campaign' => $_POST["utm_campaign"],
                'utm_source' => $_POST["utm_source"],
                'utm_medium' => $_POST["utm_medium"],
                'utm_term' => $_POST["utm_term"],
                'device' => $_POST["device"],
                'action_type' => $_POST["action_type"],
                'status_msg' => $_POST["status_msg"],
                'tracking_site' => 'nuxpay',
                'ip' => $_POST["ip"],
                'country' => $_POST["country"],
                'user_agent' => $_POST["user_agent"],
                'url' => $_POST["url"],
                'content' => $_POST["content"]
            );

            $result = $post->curlUtm($command, $params);

            echo $result;
            break;


    }

    switch($command) {
        case "download_link_tracking":
            $params = array(
                'ip' => $_POST["ip_address"],
                'device' => $_POST["device"],
                'os' => $_POST["os"],
                'url' => $_POST["links"],
                'content' => $_POST["content"],
                'country' => $_POST["country"],
                'date' => $_POST["date"],
                'tracking_site' => 'nuxpay'
              );

            $result = $post->curlUtm($command, $params);

            echo $result;
            break;
    }
    ?>
