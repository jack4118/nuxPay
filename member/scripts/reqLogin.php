<?php
session_start();
// echo "????";

include(dirname(__FILE__)."/../include/config.php");
// include($_SERVER["DOCUMENT_ROOT"]."/language/lang_all.php");
include(dirname(__FILE__)."/../include/class.general.php");
include(dirname(__FILE__)."/../include/class.post.php");
// include($_SERVER["DOCUMENT_ROOT"]."/include/class.globalSettings.php");

$general = new general();
$language = $general->getLanguage();
$post = new post();

    // get server timezone
    $date = new DateTime();
    $serverTimeZone = date_offset_get($date);

// echo "Test Test";
//print_r($_POST);

$command = $_POST['command'];

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $return = array(
        "command" => $_POST['command'],
        "status" => "error",
        "msgCode" => "",
        "msg" => "",
        );

    // echo "Test Test2";

    switch($command) {
        case "logout":
            session_destroy();
            echo json_encode(array("code"=>"1"));
        break;

        case "memberLogin":
        case "newMemberLogin":

        if( ($_SESSION['captcha'] == strtoupper($_POST['captcha'])) || $command == "newMemberLogin" ) {
            $params = array(
                'emailMobile' => $_POST['emailMobile'],
                'password' => $_POST['password'],
                'time_zone' => $_POST['time_zone'],
		'mode' => $_POST['mode']
                );
     // print_r($params);
            // exit();
            $result = $post->curl_post("/web/pay/login", $params,"Member","english","NuxPay");
            // print_r($result);
            // exit();

            $result = json_decode($result,true);
            $_SESSION["access_token"] = $result['user']['access_token'];

            // foreach ($result["xun_business_account"] as $key => $value) {
            //     $_SESSION[$key] = $value;
            // }

            $_SESSION["business"]["uuid"] = $result['user']['business_id'];
            $_SESSION["business"]["business_profile_picture"] = $result['user']['picture_url'];
            $_SESSION["email"] = $result['user']['email'];
            $_SESSION["mobile"] = $result['user']['mobile'];
            $_SESSION["name"] = $result['user']['name'];
            $_SESSION["timezone"] = $_POST["time_zone_offset"];
            $_SESSION["hasSetFundOutAddress"] = $result['user']['hasSetFundOutAddress'];
            $_SESSION["registerDate"] = $result['user']['registerDate'];
            $_SESSION["changedPassword"] = $result['user']['hasChangedPassword'];
            $_SESSION["account_type"] = $result['user']['account_type'];
            // $_SESSION["result"] = $result["result"];

            if($result['user']['mobile']!="") {
//                $_SESSION['receive_link'] = $sys['receiveLink'].$result['user']['mobile'];
				$mobile_number = $result['user']['mobile'];
				if($mobile_number[0] == '+'){
					$mobile_number = substr($mobile_number, 1);
				}
                $_SESSION['receive_link'] = $_SERVER['SERVER_NAME'].'/send/'.$mobile_number;
				
            } else {
                $_SESSION['receive_link'] = $_SERVER['SERVER_NAME'].'/send/'.$result['user']['email'];
            }
            
             $_SESSION['fund_in_address_list'] = json_encode($result['user']['fund_in_address_list']);


            $result = json_encode($result,true);
            // print_r($result);
            echo $result;
        }else {
            $myJson = array('status' => 'error', 'code' => 0, 'message' => "Failed", 'message_d' => 'Incorrect security code.');
            $myJson = json_encode($myJson);
            echo $myJson;
        }
        break;

        case "resendEmail":

                $params = array("business_email" => $_POST['business_email']);

                $result = $post->curl_post("/xun/web/pay/register/resend-email", $params,"Member","english","NuxPay");

                echo $result;
        break;

        case "linkPhone":

                $params = array("mobile" => $_POST['mobile'],
                                "email" => $_SESSION["email"]
                            );

                $result = $post->curl_post("/web/pay/register/otp/get", $params);

                echo $result;
        break;

        case "resendOtpPhone":

                $params = array(
                    "mobile" => $_POST['mobile'],
                    "email" => $_POST['email'],
                    "req_type" => $_POST['mode']
                );

                $result = $post->curl_post("/web/pay/resend/otp", $params,"Member","english","NuxPay");

                echo $result;
        break;

        case "registerXun":

                $params = array("mobile" => $_POST['mobile'],
                                "business_email" => $_SESSION["business_email"]
                            );

                $result = $post->curl_post("/xun/business/mobile/verifycode/register", $params,"Member","english","NuxPay");

                echo $result;
        break;

        case "verifyCode":

                $params = array(
                    "mobile" => $_POST['mobile'],
                    "verify_code" => $_POST['verify_code']
                );

                $result = $post->curl_post("/web/pay/register/otp/verify", $params,"Member","english","NuxPay");

                $result = json_decode($result,true);

                if ($result["code"]==1) {
                    $_SESSION["mobile"] = $_POST['mobile'];
                    $_SESSION["isMobileVerified"] = 1;
                }

                $result = json_encode($result,true);

                echo $result;
        break;

        case "editBusinessConfirm":

              // $params = array(
              //       'business_id' => $_SESSION["business"]["uuid"]
              //   );

                $params = array(
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_id' => $_SESSION["business"]["uuid"],
                    'business_name' => $_SESSION["business"]["business_name"],
                    'business_email' => $_SESSION["business_email"],
                    'business_phone_number' => $_POST["business_phone_number"],
                    // 'business_profile_picture' => $_POST["business_profile_picture"],
                    'business_website' => $_POST["business_website"],
                    'business_address1' => $_POST["business_address1"],
                    'business_address2' => $_POST["business_address2"],
                    'business_city' => $_POST["business_city"],
                    'business_state' => $_POST["business_state"],
                    'business_postal' => $_POST["business_postal"],
                    'business_country' => $_POST["business_country"],
                    'business_info' => $_POST["business_info"],
                    'business_company_size' => $_POST["business_company_size"],
                    'business_email_address' => $_POST["business_email_address"]
                    );

                // $output['code'] = 1;
                // $output['message'] = 'message';
                // $output['command'] = $command;
                // $output['params'] = $params;

                // echo json_encode($output);

                //print_r($params);
                $result = $post->curl_post("/xun/business/edit", $params);
                // echo print_r($result);
                // exit();
                $result = json_decode($result, true);

                    unset($_SESSION["businessDetails"]);
                    foreach ($result["result"] as $key => $value) {
                        $_SESSION["businessDetails"][$value["uuid"]] = $value;
                        $value["business_profile_picture"] = $_POST["business_profile_picture"];
                    }

                    $_SESSION["business"]["business_email_address"] = $_POST["business_email_address"];
                    $_SESSION["business"]["business_phone_number"] = $_POST["business_phone_number"];
                    // $_SESSION["business"]["business_profile_picture"] = $_POST["business_profile_picture"];
                    // $_SESSION["business"]["uuid"] = $_POST["uuid"];
                    // $_SESSION["business"]["business_name"] = $_POST["business_name"];
                    $_SESSION["business"]["business_website"] = $_POST["business_website"];
                    $_SESSION["business"]["business_address1"] = $_POST["business_address1"];
                    $_SESSION["business"]["business_address2"] = $_POST["business_address2"];
                    $_SESSION["business"]["business_city"] = $_POST["business_city"];
                    $_SESSION["business"]["business_state"] = $_POST["business_state"];
                    $_SESSION["business"]["business_postal"] = $_POST["business_postal"];
                    $_SESSION["business"]["business_country"] = $_POST["business_country"];
                    $_SESSION["business"]["business_info"] = $_POST["business_info"];
                    $_SESSION["business"]["business_company_size"] = $_POST["business_company_size"];

                $result = json_encode($result);

                echo $result;

            break;

            case "getCountryList":

                $params = array(
                            'X-Xun-Token' => $_SESSION["access_token"]
                            );

                $result = $post->curl_post("/xun/country/phone_code/list", $params);

                echo $result;
            break;

            case "setLanguage":

                $_SESSION['language'] = $_POST['language'];
                $_SESSION['languageISO'] = $_POST['isoCode'];

                setcookie("language", $_POST['language'], time() + (86400 * 30), "/");
                setcookie("languageISO", $_POST['isoCode'], time() + (86400 * 30), "/");

                if ($_SESSION['language']) {
                    $results = array('code' => 1, 'message' => '', 'message_d' => '', 'data' =>'');
                    // echo json_encode($results);
                    echo $results;
                }
            break;
			
			case "getResellerDetails":

				$params = array(
					'referral_code' => $_POST["referral_code"],
					'username' => $_POST['username'],
					'promo_code' => $_POST{'promo_code'},
					'type' => $_POST['type'],
				);

				$result = $post->curl_post("/xun/web/pay/reseller/details/get", $params);

				echo $result;

            break;

            case "resetMerchantPasswordVerifyCode":

                $params = array(
                    "mobile" => $_POST['mobile'],
                    "email" => $_POST['email'],
                    "req_type" => $_POST['mode'],
                    "user_type" => "resetMerchantPasswordVerifyCode"
                );

                $result = $post->curl_post("/web/pay/resetpassword/otp/get", $params, "Member", "english", "NuxPay");

                echo $result;
            break;

            case "resetMerchantPasswordValidate":

                $params = array(
                    "mobile" => $_POST['mobile'],
                    "email" => $_POST['email'],
                    "req_type" => $_POST['mode'],
                    "verify_code" => $_POST['verify_code']
                );

                $result = $post->curl_post("/web/pay/resetpassword/otp/validate", $params, "Member", "english", "NuxPay");

                echo $result;
            break;

            case "resetMerchantPassword":

                $params = array(
                    "mobile" => $_POST['mobile'],
                    "email" => $_POST['email'],
                    "req_type" => $_POST['mode'],
                    "verify_code" => $_POST['verify_code'],
                    "request_id" => $_POST['request_id'],
                    "validate_id" => $_POST['validate_id'],
                    "password" => $_POST['password'],
                    "confirm_password" => $_POST['confirm_password']
                );

                $result = $post->curl_post("/web/pay/resetpassword", $params, "Member", "english", "NuxPay");

                echo $result;
            break;

    }
}



?>
