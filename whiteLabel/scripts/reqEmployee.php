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
            case "getEmployeeList":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_email' => $_SESSION["business_email"]
                );

                $result = $post->curl_post("/xun/business/employee/list", $params);
                
                $result = json_decode($result, true);

                    foreach ($result['result'] as $key => $data) {
                        $data['employee_modified_date'] = date("d/m/Y H:i:s", strtotime($data['employee_modified_date']) - $serverTimeZone - $_SESSION["timezone"]);
                        $result['result'][$key] = $data;
                    }

                $result = json_encode($result);
                
                echo $result;

            break;

        case "getTagListing":
        $params = array(
            'X-Xun-Token' => $_SESSION["access_token"],
            'business_email' => $_SESSION["business_email"],
            'business_id' => $_SESSION["business"]["uuid"]
        );

        $result = $post->curl_post("/xun/business/tag/list", $params);

        $result = json_decode($result, true);

                    foreach ($result['result'] as $key => $data) {
                        $data['employee_created_date'] = date("d/m/Y H:i:s", strtotime($data['employee_created_date']) - $serverTimeZone - $_SESSION["timezone"]);
                        $result['result'][$key] = $data;
                    }

        $result = json_encode($result);

        echo $result;
        break;

        case "getCategoriesListing":
        $params = array(
            'X-Xun-Token' => $_SESSION["access_token"],
            'business_email' => $_SESSION["business_email"],
            'business_id' => $_SESSION["business"]["uuid"]
        );

        $result = $post->curl_post("/xun/business/tag/chat/list", $params);

        $result = json_decode($result, true);

                    foreach ($result['result'] as $key => $data) {
                        $data['employee_created_date'] = date("d/m/Y H:i:s", strtotime($data['employee_created_date']) - $serverTimeZone - $_SESSION["timezone"]);
                        $result['result'][$key] = $data;
                    }

                $result = json_encode($result);
        echo $result;
        break;

            case "addEmployee":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION["business_email"],
                'employee_name' => $_POST["employeeName"],
                'employee_mobile' => $_POST["employeeMobile"],
                'live_chat_tag' => $_POST["liveChat"],
                'business_chat_tag' => $_POST["businessChat"]
            );
            $result = $post->curl_post("/xun/business/employee/add", $params);
            echo $result;
            break;

            case "editEmployee":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION["business_email"],
                'employee_id' => $_POST["employeeID"],
                'employee_name' => $_POST["employeeName"],
                'live_chat_tag' => $_POST["liveChat"],
                'business_chat_tag' => $_POST["businessChat"]
            );
            $result = $post->curl_post("/xun/business/employee/edit", $params);
            echo $result;
            break;

            case "getEmployeeItem":
            $params = array(
             'X-Xun-Token' => $_SESSION["access_token"],
             'business_email' => $_SESSION["business_email"],
             'business_id' => $_SESSION["business"]["uuid"],
             'employee_id' => $_POST["employee_id"]
            );
        $result = $post->curl_post("/xun/business/employee/get", $params);
        echo $result;
        break;

            case "deleteEmployee":
            $params = array(
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION['business_email'],
                'business_id' => $_SESSION["business"]["uuid"],
                'employee_id' => $_POST["deleteData"]
            );
            $result = $post->curl_post("/xun/business/employee/delete", $params);
            echo $result;
            break;

            case "deleteAllEmployee":
            $params = array(
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION['business_email'],
                'business_id' => $_SESSION["business"]["uuid"]
            );
            $result = $post->curl_post("/xun/business/employee/delete/all", $params);
            echo $result;
            break;
    }
?>
