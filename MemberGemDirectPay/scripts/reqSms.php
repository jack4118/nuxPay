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
    if($_POST['type'] == 'logout'){
        session_destroy();
    }

    switch($command) {
            //get tag table data
        case "getTagListing":
        $params = array(
            'X-Xun-Token' => $_SESSION["access_token"],
            'business_email' => $_SESSION["business_email"],
            'business_id' => $_SESSION["business"]["uuid"]
        );

        $result = $post->curl_post("/xun/business/tag/list", $params);

        $result = json_decode($result, true);

        foreach ($result['result'] as $key => $data) {
            $data['created_date'] = date("d/m/Y H:i:s", strtotime($data['created_date']) - $serverTimeZone - $_SESSION["timezone"]);
            $result['result'][$key] = $data;
        }

        $result = json_encode($result);

        echo $result;
        break;

        case "getGroupList":
        $params = array(
            'business_id' => $_SESSION["business"]["uuid"],
            'X-Xun-Token' => $_SESSION["access_token"],
            'business_email' => $_SESSION["business_email"]
        );

        $result = $post->curl_post("/xun/business/contact/group/list", $params);

        $result = json_decode($result, true);

        foreach ($result['result'] as $key => $data) {
            $data['contact_group_created_time'] = date("d/m/Y H:i:s", strtotime($data['contact_group_created_time']) - $serverTimeZone - $_SESSION["timezone"]);
            $result['result'][$key] = $data;
        }

        $result = json_encode($result);

        echo $result;

        break;

        case "sendMessage":
        $params = array(
            'X-Xun-Token' => $_SESSION["access_token"],
            'business_email' => $_SESSION["business_email"],
            'business_id' => $_SESSION["business"]["uuid"],
            'mobile_list' => $_POST["mobile_list"],
            'tag' => $_POST["tag"],
            'message' => $_POST["message"],
            'group_id' => $_POST["group_id"],
            'send_to_followers' => $_POST["send_to_followers"]
            // 'api_key' => ""
        );

        $result = $post->curl_post("/xun/business/broadcast", $params);
        
        echo $result;

        break;

        case "sendHistory":
        $params = array(
            'X-Xun-Token' => $_SESSION["access_token"],
            'business_email' => $_SESSION["business_email"],
            'business_id' => $_SESSION["business"]["uuid"],
            'page' => $_POST["page"],
            'page_size' => $_POST["page_size"],
            'order' => $_POST["order"]
        );

        $result = $post->curl_post("/xun/business/broadcast/history/list", $params);

        // $result = json_decode($result, true);

        // foreach ($result['result']['data'] as $key => $data) {
        //     $data['datetime'] = date("d/m/Y H:i:s", strtotime($data['datetime']) - $serverTimeZone - $_SESSION["timezone"]);
        //     $result['result']['data'][$key] = $data;
        // }

        // $result = json_encode($result);
        
        echo $result;

        break;

        case "sendHistoryDetail":
        $params = array(
            'X-Xun-Token' => $_SESSION["access_token"],
            'business_email' => $_SESSION["business_email"],
            'business_id' => $_SESSION["business"]["uuid"],
            'message_history_id' => $_POST["message_history_id"]
        );

        $result = $post->curl_post("/xun/business/broadcast/history/detail", $params);

        $result = json_decode($result, true);

        $result['result']['datetime'] = date("d/m/Y H:i:s", strtotime($result['result']['datetime']) - $serverTimeZone - $_SESSION["timezone"]);
        
        // foreach ($result['result'] as $key => $data) {
        //     $data['datetime'] = date("Y-m-d H:i:s", strtotime($data['datetime']));
        //     $result['result'][$key] = $data;
        // }

        $result = json_encode($result);
        
        echo $result;

        break;

        case "getFollowersData":
        $params = array(
            'X-Xun-Token' => $_SESSION["access_token"],
            'business_id' => $_SESSION["business"]["uuid"]
        );

        $result = $post->curl_post("/xun/business/follow/count", $params);
        
        echo $result;

        break;

        case "addIntegrationProvider":
        $params = array(
            'X-Xun-Token' => $_SESSION["access_token"],
            'business_id' => $_SESSION["business"]["uuid"],
            'provider_id' => $_POST["provider"],
            'integration_name' => $_POST["name"],
            'key_input_1' => $_POST["key1"],
            'key_input_2' => $_POST["key2"],
            'key_input_3' => $_POST["key3"]
        );

        $result = $post->curl_post("/xun/business/integration/add", $params);
        
        // $test = json_encode($params);
        // echo $test;
        echo $result;

        break;

        case "getMyIntegrationDetails":
        $params = array(
            'X-Xun-Token' => $_SESSION["access_token"],
            'business_id' => $_SESSION["business"]["uuid"],
            'business_sms_provider_id' => $_POST["integrationID"]
        );

        $result = $post->curl_post("/xun/business/integration/get", $params);
        
        echo $result;

        break;

        case "editMyIntegrationDetails":
        $params = array(
            'X-Xun-Token' => $_SESSION["access_token"],
            'business_id' => $_SESSION["business"]["uuid"],
            'sms_provider_key' => $_POST["provider"],
            'business_sms_provider_id' => $_POST["integrationID"],
            'integration_name' => $_POST["name"],
            'key_input_1' => $_POST["key1"],
            'key_input_2' => $_POST["key2"],
            'key_input_3' => $_POST["key3"]
        );

        $result = $post->curl_post("/xun/business/integration/edit", $params);
        // $test = json_encode($params);
        // echo $test;
        echo $result;

        break;

        case "deleteAllIntegration":
        $params = array(
            'X-Xun-Token' => $_SESSION["access_token"],
            'business_id' => $_SESSION["business"]["uuid"]
        );

        $result = $post->curl_post("/xun/business/integration/delete/all", $params);
        
        echo $result;

        break;

        case "deleteIntegration":
        $params = array(
            'X-Xun-Token' => $_SESSION["access_token"],
            'business_id' => $_SESSION["business"]["uuid"],
            'business_sms_provider_id' => $_POST["integrationID"]
        );

        $result = $post->curl_post("/xun/business/integration/delete", $params);
        
        echo $result;

        break;

        case "getMyIntegrationListing":
        $params = array(
            'X-Xun-Token' => $_SESSION["access_token"],
            'business_id' => $_SESSION["business"]["uuid"]
        );

        $result = $post->curl_post("/xun/business/integration/listing", $params);

        $result = json_decode($result, true);

        foreach ($result['result']['data'] as $key => $data) {
            $data['created_datetime'] = date("d/m/Y H:i:s", strtotime($data['created_datetime']) - $serverTimeZone - $_SESSION["timezone"]);
            $result['result']['data'][$key] = $data;
        }

        $result = json_encode($result);
        
        // $test = json_encode($params);
        // echo $test;
        echo $result;

        break;

        case "sendSMSMessage":
        $params = array(
            'X-Xun-Token' => $_SESSION["access_token"],
            'business_id' => $_SESSION["business"]["uuid"],
            'mobile_list' => $_POST["mobile_list"],
            'message' => $_POST["message"],
            'business_sms_provider_id' => $_POST["business_sms_provider_id"]
        );

        $result = $post->curl_post("/xun/business/integration/message/send", $params);
        
        // $test = json_encode($params);
        // echo $test;
        
        echo $result;

        break;

        case "sendSmsMessage":
        $params = array(
            'X-Xun-Token' => $_SESSION["access_token"],
            'business_id' => $_SESSION["business"]["uuid"],
            'mobile_list' => $_POST["mobile_list"],
            'message' => $_POST["message"],
            'business_sms_provider_id' => $_POST["business_sms_provider_id"],
            'status' => 1
        );

        $result = $post->curlUtm($command, $params);
        
        // $test = json_encode($params);
        // echo $test;
        
        echo $result;

        break;

    }
    ?>
