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
          case "editBusinessConfirm":
              $params = array(
                'X-Xun-Token' => $_SESSION["access_token"],
                'business_id' => $_SESSION["business"]["uuid"],
                'business_email' => $_SESSION["business"]["business_email"],
                'business_name' => $_POST["business_name"],
                'business_email_address' => $_POST["business_email_address"],
                'business_website' => $_POST["business_website"],
                'business_country' => $_POST["business_country"],
                'business_info' => $_POST["business_info"],
                'business_phone_number' => $_POST["business_phone_number"],
                'business_company_size' => $_POST["business_company_size"],
                'business_address1' => $_POST["business_address1"],
                'business_address2' => $_POST["business_address2"],
                'business_city' => $_POST["business_city"],
                'business_state' => $_POST["business_state"],
                'business_postal' => $_POST["business_postal"],
                  );

              $result = $post->curl_post("/web/pay/edit/info", $params);

              $result2 = json_decode($result, true);
              
              if ($result2['code'] == 1) {
                  $_SESSION["name"] = $_POST["business_name"];
              }

              echo $result;

          break;

          case "editProfileImage":

              $params = array(
                  'X-Xun-Token' => $_SESSION["access_token"],
                  'business_id' => $_SESSION["business"]["uuid"],
                  'business_email' => $_SESSION["business"]["business_email"],
                  'business_profile_picture' => $_POST["business_profile_picture"]
                  );

              $result = $post->curl_post("/web/pay/profile/picture/upload", $params);
              echo $result;

          break;

          case "getProfileData":

              $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
              );

              $result = $post->curl_post("/xun/business/profile/get", $params);
              echo $result;

          break;

          case "bindUserOtpGet":

            $params = array(
                'user_id' => $_POST['user_id'],
                'req_type' => $_POST['mode'],
                'mobile' => $_POST['mobile'],
                'email' => $_POST['email'],

            );

            $result = $post->curl_post("/web/pay/bind/user/otp/get", $params);
            echo $result;
         
         break;


         case "bindUserAccount":

            $params = array(
                'user_id' => $_POST['user_id'],
                'req_type' => $_POST['mode'],
                'mobile' => $_POST['mobile'],
                'email' => $_POST['email'],
                'verify_code' => $_POST['verify_code'], 
            );

            $result = $post->curl_post("/web/pay/bind/user/account", $params);
            $result2 = json_decode($result, true);

            if($result2['code']==1) {
              $_SESSION['mobile'] = $_POST['mobile'];
              $_SESSION['email'] = $_POST['email']; 
            }

            echo $result;

         break;

         case "resendOtp":
            $params = array(
                'mobile' => $_POST['mobile'],
                'email' => $_POST['email'],
                'req_type' => $_POST['mode'],

            );

            $result = $post->curl_post("/web/pay/resend/otp", $params);
            echo $result;

        break;

        case "firsttimeupdate":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'business_name' => $_POST['business_name'],
                'password' => $_POST['password'],
                'confirm_password' => $_POST['confirm_password']
            );
        
            $result = $post->curl_post("/web/pay/user/first/time/info/update", $params);
            $result2 = json_decode($result, true);

            if ($result2['code'] == 1){
                $_SESSION['changedPassword'] = 1;
            }

            echo $result;

        break;

        case "firsttimebusinessupdate":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'business_name' => $_POST['business_name']
            );
        
            $result = $post->curl_post("/web/pay/user/first/time/business/update", $params);
            $result2 = json_decode($result, true);

            if ($result2['code'] == 1){
                $_SESSION['changedPassword'] = 1;
            }

            echo $result;

        break;

        case "firsttimebusinessskipupdate":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"]
            );
        
            $result = $post->curl_post("/web/pay/user/first/time/business/update/skip", $params);
            $result2 = json_decode($result, true);

            if ($result2['code'] == 1){
                $_SESSION['changedPassword'] = 1;
                $_SESSION["name"] = "";
            }

            echo $result;

        break;

        case "upgradeuseraccounttype":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"]
            );
        
            $result = $post->curl_post("/upgrade/user/account/type", $params);
            $result2 = json_decode($result, true);
            
            if ($result2['code'] == 1){
                $_SESSION['account_type'] = "premium";
            } 

            echo $result;

        break;

        case "webpaywalletstatusget":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"]
            );
        
            $result = $post->curl_post("/web/pay/wallet/status/get", $params);
            echo $result;

        break;

        case "webpaywalletstatusset":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'wallet_type' => $_POST['currency_id'],
                'status' => $_POST['status']
            );
        
            $result = $post->curl_post("/web/pay/wallet/status/set", $params);
            echo $result;

        break;
        
        case "webpaynuxpaywalletstatusget":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"]
            );
        
            $result = $post->curl_post("/web/pay/nuxpay/wallet/status/get", $params);
            echo $result;

        break;

        case "webpaynuxpaywalletstatusset":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'wallet_type' => $_POST['currency_id'],
                'status' => $_POST['status']
            );
        
            $result = $post->curl_post("/web/pay/nuxpay/wallet/status/set", $params);
            $result = json_decode($result,true);
            $_SESSION["fund_in_address_list"] = json_encode($result['data']['fund_in_address_list']);
            $result = json_encode($result,true);
            echo $result;

        break;

        case "setswitchcurrency":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'switch_currency_status' => $_POST['switch_currency_status']
            );
        
            $result = $post->curl_post("/set/switch/currency", $params);
            echo $result;

        break;
    }
?>
