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

            case "editGroupContact":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION["business_email"],
                'group_id' => $_POST["contactGroupID"],
                'group_name' => $_POST["groupName"]
            );
            $result = $post->curl_post("/xun/business/contact/group/edit", $params);
            echo $result;
            break;

            case "addGroupContact":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION["business_email"],
                'group_id' => $_POST["groupID"],
                'contact_mobile' => $_POST["contactMobile"],
                'contact_name' => $_POST["contactName"]
            );
            $result = $post->curl_post("/xun/business/contact/group/contact/add", $params);
            echo $result;
            break;

            case "deleteContact":
            $params = array(
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION['business_email'],
                'business_id' => $_SESSION["business"]["uuid"],
                'group_id' => $_POST["groupID"],
                'contact_group_member_id' => $_POST["deleteData"]
            );
            $result = $post->curl_post("/xun/business/contact/group/contact/delete", $params);
            echo $result;
            break;

            case "deleteAllContact":
            $params = array(
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION['business_email'],
                'business_id' => $_SESSION["business"]["uuid"],
                'group_id' => $_POST["groupID"]
            );
            $result = $post->curl_post("/xun/business/contact/group/contact/delete/all", $params);
            echo $result;
            break;

            case "deleteGroup":
            $params = array(
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION['business_email'],
                'business_id' => $_SESSION["business"]["uuid"],
                'group_id' => $_POST["deleteData"]
            );
            $result = $post->curl_post("/xun/business/contact/group/delete", $params);
            echo $result;
            break;

            case "deleteAllGroup":
            $params = array(
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION['business_email'],
                'business_id' => $_SESSION["business"]["uuid"]
            );
            $result = $post->curl_post("/xun/business/contact/group/delete/all", $params);
            echo $result;
            break;




            case "getContactList":
                $params = array(
                    'business_id' => $_SESSION["business"]["uuid"],
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_email' => $_SESSION["business_email"],
                    'group_id' => $_POST["groupID"]
                );

                $result = $post->curl_post("/xun/business/contact/group/get", $params);
                
                $result = json_decode($result, true);

                    foreach ($result['result'] as $key => $data) {
                        $data['created_date'] = date("d/m/Y H:i:s", strtotime($data['created_date']) - $serverTimeZone - $_SESSION["timezone"]);
                        $result['result'][$key] = $data;
                    }

                $result = json_encode($result);
                
                echo $result;

            break;

            case "editContact":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION["business_email"],
                'contact_group_member_id' => $_POST["memberID"],
                'contact_mobile' => $_POST["contactMobile"],
                'contact_name' => $_POST["contactName"]
            );
            $result = $post->curl_post("/xun/business/contact/group/contact/edit", $params);
            echo $result;
            break;

            case "addEmployee":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION["business_email"],
                'employee_name' => $_POST["employeeName"],
                'employee_mobile' => $_POST["employeeMobile"]
            );
            $result = $post->curl_post("/xun/business/employee/add", $params);
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
