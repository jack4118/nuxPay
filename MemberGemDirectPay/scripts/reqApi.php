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
            case "getApiListing":
                $params = array(
                    'business_email' => $_SESSION["business_email"],
                    'business_id' => $_SESSION["business"]["uuid"]
                );

                $result = $post->curl_post("/xun/business/api_key/list", $params);
                
                $result = json_decode($result, true);

                    // foreach ($result['xun_business_api_key'] as $key => $data) {
                    //     $data['apikey_expire_date'] = date("d/m/Y H:i:s", strtotime($data['apikey_expire_date']) - $serverTimeZone - $_SESSION["timezone"]);
                    //     $result['xun_business_api_key'][$key] = $data;
                    // }

                    // foreach ($result["data"]["xun_business_api_key"] as $key => $value) {
                    //     unset($result["data"]["xun_business_api_key"][$key]["apikey_created_date"]);
                    //      unset($result["data"]["xun_business_api_key"][$key]["apikey_is_enabled"]);
                    //       unset($result["data"]["xun_business_api_key"][$key]["business_uuid"]);
                    // }

                $result = json_encode($result);
                
                echo $result;

            break;
            case "generateAPI":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'business_email' => $_SESSION["business_email"],
                'X-Xun-Token' => $_SESSION["access_token"],
                'apikey_name' => $_POST["apikey_name"],
                'apikey_expiry_date' => $_POST["apikey_expiry_date"]
            );
            $result = $post->curl_post("/xun/web/pay/generate/api_key", $params);
            echo $result;
            break;

            case "deleteSomeAPI":
            $params = array(
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION["business_email"],
                'business_id' => $_SESSION["business"]["uuid"],
                'api_key' => $_POST['api_key']
            );
            $result = $post->curl_post("/xun/business/api_key/delete", $params);
            echo $result;
            break;
            
            case "deleteAllAPI":
            $params = array(
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION["business_email"],
                'business_id' => $_SESSION["business"]["uuid"],
                
            );
            $result = $post->curl_post("/xun/business/api_key/delete/all", $params);
            echo $result;
            break;
            case "updateAPI":
            $params = array(
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_email' => $_SESSION["business_email"],
                'business_id' => $_SESSION["business"]["uuid"],
                'api_key' => $_POST['api_key'],
                'apikey_name' => $_POST["apikey_name"],
                'apikey_expiry_date' => $_POST["apikey_expiry_date"],
                'apikey_status' => $_POST["apikey_status"]
            );
            $result = $post->curl_post("/xun/business/api_key/update", $params);
            echo $result;
            break;


            case "getCrowdFundingPercent":
            $params = array();
            $result = $post->curl_post("/xun/crowdfunding/details", $params);
            echo $result;
            break;

            case "crowdFundingSubscribe":
            $params = array(
                'name' => $_POST["name"],
                'phone_number' => $_POST["phone_number"],
                'email' => $_POST["email"],
                'url' => $_POST['userUrl'],
                'ip' => $_POST['ip'],
                'country' => $_POST['country'],
                'device' => $_POST['device_id']
            );
            $result = $post->curl_post("/xun/crowdfunding/subscribe", $params);
            echo $result;
            break;


    }
?>
