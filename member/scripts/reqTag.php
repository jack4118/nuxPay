<?php
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept,Content-Type, Authorization, X-Requested-With,Access-Control-Allow-Methods,Access-Control-Allow-Origin');
    header('Access-Control-Allow-Origin: *');

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

        // $result = json_decode($result, true);

        //             foreach ($result['result'] as $key => $data) {
        //                 $data['created_date'] = date("d/m/Y H:i:s", strtotime($data['created_date']) - $serverTimeZone - $_SESSION["timezone"]);
        //                 $result['result'][$key] = $data;
        //             }

        // $result = json_encode($result);

        echo $result;
        break;

        case "addTagItem":
            $params = array(
             'X-Xun-Token' => $_SESSION["access_token"],
             'business_email' => $_SESSION["business_email"],
             'business_id' => $_SESSION["business"]["uuid"],
             'tag' => $_POST["tag"],
             'callback_url' => $_POST["callback_url"],
             'priority' => intval($_POST["order"]),
             'tag_description' => $_POST["tag_description"],
             'employee_mobile' => $_POST["employee_mobile"],
             'working_hour_from' => $_POST["working_hour_from"],
             'working_hour_to' => $_POST["working_hour_to"]
            );
        $result = $post->curl_post("/xun/business/tag/add", $params);
        echo $result;
        break;

        case "addBusinessCategory":
            $params = array(
             'X-Xun-Token' => $_SESSION["access_token"],
             'business_email' => $_SESSION["business_email"],
             'business_id' => $_SESSION["business"]["uuid"],
             'tag' => $_POST["tag"],
             'tag_description' => $_POST["tag_description"],
             'employee_mobile' => $_POST["employee_mobile"],
            );
        $result = $post->curl_post("/xun/business/tag/chat/add", $params);
        echo $result;
        break;

        case "getCategoriesListing":
        $params = array(
            'X-Xun-Token' => $_SESSION["access_token"],
            'business_email' => $_SESSION["business_email"],
            'business_id' => $_SESSION["business"]["uuid"]
        );

        $result = $post->curl_post("/xun/business/tag/chat/list", $params);
        echo $result;
        break;

        case "editCategories":
            $params = array(
             'X-Xun-Token' => $_SESSION["access_token"],
             'business_email' => $_SESSION["business_email"],
             'business_id' => $_SESSION["business"]["uuid"],
             'tag' => $_POST["tag"],
             'tag_description' => $_POST["tag_description"],
             'employee_mobile' => $_POST["employee_mobile"]
            );
        $result = $post->curl_post("/xun/business/tag/chat/edit", $params);
        echo $result;
        break;

        case "getCategoriesItem":
            $params = array(
             'X-Xun-Token' => $_SESSION["access_token"],
             'business_email' => $_SESSION["business_email"],
             'business_id' => $_SESSION["business"]["uuid"],
             'tag' => $_POST["tag"]
            );
        $result = $post->curl_post("/xun/business/tag/chat/get", $params);
        echo $result;
        break;

        case "deleteCategories":
            $params = array(
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION['business_email'],
                'business_id' => $_SESSION["business"]["uuid"],
                'tag' => $_POST["tag"]
            );
            $result = $post->curl_post("/xun/business/tag/chat/delete", $params);
            echo $result;
            break;

             case "deleteAllCategories":
            $params = array(
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION['business_email'],
                'business_id' => $_SESSION["business"]["uuid"]
            );
            $result = $post->curl_post("/xun/business/tag/chat/delete/all", $params);
            echo $result;
            break;

        case "editTagItem":
            $params = array(
             'X-Xun-Token' => $_SESSION["access_token"],
             'business_email' => $_SESSION["business_email"],
             'business_id' => $_SESSION["business"]["uuid"],
             'tag' => $_POST["tag"],
             'callback_url' => $_POST["callback_url"],
             'tag_description' => $_POST["tag_description"],
             'employee_mobile' => $_POST["employee_mobile"],
             'priority' => intval($_POST["order"]),
             'working_hour_from' => $_POST["working_hour_from"],
             'working_hour_to' => $_POST["working_hour_to"]
            );
        $result = $post->curl_post("/xun/business/tag/edit", $params);
        echo $result;
        break;

        case "getTagItem":
            $params = array(
             'X-Xun-Token' => $_SESSION["access_token"],
             'business_email' => $_SESSION["business_email"],
             'business_id' => $_SESSION["business"]["uuid"],
             'tag' => $_POST["tag"]
            );
        $result = $post->curl_post("/xun/business/tag/get", $params);
        echo $result;
        break;

        case "deleteTagItem":
            $params = array(
             'X-Xun-Token' => $_SESSION["access_token"],
             'business_email' => $_SESSION["business_email"],
             'business_id' => $_SESSION["business"]["uuid"],
             'tag' => $_POST["tag"]
            );
        $result = $post->curl_post("/xun/business/tag/delete", $params);
        echo $result;
        break;

        case "deleteAllTagItem":
            $params = array(
             'X-Xun-Token' => $_SESSION["access_token"],
             'business_email' => $_SESSION["business_email"],
             'business_id' => $_SESSION["business"]["uuid"]
            );
        $result = $post->curl_post("/xun/business/tag/delete/all", $params);
        echo $result;
        break;


        case "getEmployeeList":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION["business_email"]
            );

            $result = $post->curl_post("/xun/business/employee/confirmed/list", $params);
            
            $result = json_decode($result, true);

                foreach ($result['result'] as $key => $data) {
                    $data['employee_created_date'] = date("d/m/Y H:i:s", strtotime($data['employee_created_date']) - $serverTimeZone - $_SESSION["timezone"]);
                    $result['result'][$key] = $data;
                }

            $result = json_encode($result);
            
            echo $result;

        break;


        case "tagList":
            $params = array(
             'business_id' => $_POST["businessID"]
            );

            $result = $post->curl_get("/xun/app/business/tag/list", $params);
            
            echo $result;
            break;
        case "getBusinessProfile":
            $params = array(
             'business_id' => $_POST["businessID"]
            );

            $result = $post->curl_get("/xun/business/profile/get", $params);
            
            echo $result;
            break;
        
        }

    ?>
