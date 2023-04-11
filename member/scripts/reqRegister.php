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
                echo json_encode(array("status"=>"ok"));
        break;

        case "memberRegister":

            $params = array(
                'mobile' => $_POST['business_mobile'],
                'email' => $_POST['business_email'],
                'req_type' => $_POST['mode'],
                'pay_password' => $_POST['business_password'],
                'pay_retype_password' => $_POST['business_retypePassword'],
                'nickname' => $_POST['business_name'],
                'verify_code' => $_POST['verify_code'],
                'type' => $sys['source'],
                'content' => $_COOKIE['keyword'],
                'reseller_code' => $_POST['reseller_code'],
				'signup_type' => $_POST['signup_type']
            );

        $result = $post->curl_post("/web/pay/register", $params,"Member","english","NuxPay");
        
        $result = json_decode($result,true);
        $_SESSION["access_token"] = $result['data']['access_token'];

        // foreach ($result["xun_business_account"] as $key => $value) {
        //     $_SESSION[$key] = $value;
        // }
        
        $_SESSION["business"]["uuid"] = $result['data']['business_id'];
        $_SESSION["email"] = $result['data']['email'];
        $_SESSION["mobile"] = $result['data']['mobile'];
        $_SESSION["name"] = $result['data']['name'];
        $_SESSION["hasSetFundOutAddress"] = "false";
		$_SESSION["changedPassword"] = $result['data']['hasChangedPassword'];
		$_SESSION["registerDate"] = $result['data']['registerDate'];
		$_SESSION["account_type"] = $result['data']['account_type'];
        $_SESSION['fund_in_address_list'] = json_encode($result['data']['fund_in_address_list']);

        // $_SESSION["result"] = $result["result"];
        $result = json_encode($result,true);

        // $result = json_decode($result,true);

        // $result = json_encode($result);
        echo $result;
        break;

        case "verifyPhone":
            $params = array(
            'mobile' => $_POST['phoneNumber'],
            'email' => $_POST['email'],
            'req_type' => $_POST['mode'],
            );

        $result = $post->curl_post("/web/pay/register/otp/get", $params,"Member","english","NuxPay");


        $result = json_decode($result,true);

        $_SESSION["mobile"] = $_POST['phoneNumber'];
        $_SESSION["isMobileVerified"] = 1;

        $_SESSION["email"] = $_POST['email'];
        $_SESSION["isEmailVerified"] = 1;
        

        $result = json_encode($result,true);

        echo $result;
        break;

         case "resendOtpPhone":

                $params = array(
                    "mobile" => $_POST['mobile']
                );

                $result = $post->curl_post("/web/pay/resend/otp", $params,"Member","english","NuxPay");

                echo $result;
        break;


        case "verifyPhoneConfirm":



        $params = array(
            'business_email' => $_SESSION["business_email"],
            'mobile' => $_SESSION["mobile"],
            'verify_code' => $_POST['verifyCode']
            );

        $result = $post->curl_post("/xun/business/mobile/verifycode/verify", $params,"Member","english","NuxPay");


        $result = json_decode($result,true);
        // $_SESSION["phoneNumber"] = $_POST['phoneNumber'];
        $_SESSION["verifyCode"] = $_POST['verifyCode'];
        // $_SESSION["timeout"] = $result['timeout'];
        $result['isMobileVerified'] = $_SESSION["isMobileVerified"];
        $result['isBusinessCreated'] = $_SESSION["isBusinessCreated"];

        $result = json_encode($result,true);

        echo $result;
        break;


        case "createBusiness":

        $params = array(

            'business_name' => $_POST['businessName'],
            'business_phone_number' => $_POST["phoneNumber"],
            'business_website' => $_POST["website"],
            'business_company_size' => $_POST['companySize'],
            'business_email' => $_SESSION["business_email"],
            'business_email_address' => $_POST["businessEmail"],

            'business_address1' => $_POST['Address1'],
            'business_address2' => $_POST["Address2"],
            'business_city' => $_POST["City"],
            'business_state' => $_POST['State'],
            'business_postal' => $_POST['Zip'],
            'business_country' => $_POST["Country"],
            'business_info' => $_POST["businessInfo"]
            
            );

        $result = $post->curl_post("/xun/business/create", $params,"Member","english","NuxPay");

        $result = json_decode($result,true);

        // foreach ($result["xun_business"] as $key => $value) {
        //     $_SESSION[$key] = $value;
        // }
        $_SESSION['business'] = $result['xun_business'];
        $_SESSION["business"]["business_created_date"] =  date("d/m/Y H:i:s", strtotime($result["xun_business"]["business_created_date"]) - $serverTimeZone - $_SESSION["timezone"]);
        $_SESSION["isBusinessCreated"] = 1;

        // $_SESSION['businessDetails'] = $result['xun_business'];
        
        $result = json_encode($result,true);

        echo $result;
        break;

        // case "memberForgotPassword":

        //     $params = array(

        //     'business_email' => $_POST["businessForgotEmail"]
            
        //     );
            
        // $result = $post->curl_post("/xun/business/forgotpassword", $params);
        
        // // $result = json_decode($result,true);

        // // $result = json_encode($result);
        // echo $result;
        // break;
			
		case "resellerRegister":
			$params = array(
				"nickname" => $_POST['nickname'],
				"username" => trim($_POST['username']),
				"email" => $_POST['email'],
				"team_code" => $_POST['teamCode'],
				"phone_number" => $_POST['phone_number'],
				"distributor_username" => $_POST['distributor_username'],
			);
			
			$result = $post->curl_post("/xun/web/pay/reseller/register", $params);

            echo $result;
        	break;

			
			

       
    }
}



?>  
