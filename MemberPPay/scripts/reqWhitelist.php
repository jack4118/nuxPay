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
        case "get2FAStatus":
            $params = array(
                'user_id' => $_SESSION["business"]["uuid"]
            );

            $result = $post->curl_post_whitelist("get2FAStatus", $params);

            echo $result;
        break;
			
		case "request2FA":
			$params = array(
				'user_id' => $_SESSION["business"]["uuid"]
			);

			$result = $post->curl_post_whitelist("request2FA", $params);

			echo $result;
        break;
			
		case "register2FA":
			$params = array(
				'user_id' => $_SESSION["business"]["uuid"],
				'code'	  => $_POST['code'],
			);

			$result = $post->curl_post_whitelist("register2FA", $params);

			echo $result;
        break;
			
		case "validate2FA":
			$params = array(
				'user_id' => $_SESSION["business"]["uuid"],
				'code'    => $_POST['code'],
			);

			$result = $post->curl_post_whitelist("validate2FA", $params);

			echo $result;
        break;
			
		case "request2FASMSOTP":
			$params = array(
				'user_id' => $_SESSION["business"]["uuid"],
			);

			$result = $post->curl_post_whitelist("request2FASMSOTP", $params);

			echo $result;
        break;
			
		case "verify2FASMSOTP":
			$params = array(
				'user_id' => $_SESSION["business"]["uuid"],
				'otp_code' => $_POST['otp_code'],
			);

			$result = $post->curl_post_whitelist("verify2FASMSOTP", $params);

			echo $result;
        break;
			
		case "disabled2FA":
			$params = array(
				'user_id' => $_SESSION["business"]["uuid"],
				'code' => $_POST['code'],
			);

			$result = $post->curl_post_whitelist("disabled2FA", $params);

			echo $result;
		break;

		case "whitelistAddress":
			$params = array(
				'user_id' => $_SESSION["business"]["uuid"],
				'code' => $_POST['code'],
				'wallet_type' => $_POST['wallet_type'],
				'address' => $_POST['address']
			);

			$result = $post->curl_post_whitelist("whitelistAddress", $params);

			echo $result;

		break;

		case "getWhitelistAddressListing":

			$params = array(
				'user_id' => $_SESSION["business"]["uuid"],
				'wallet_type' => $_POST['wallet_type'],
				'address' => $_POST['address'],
				'page' => $_POST['page']
			);

			$result = $post->curl_post_whitelist("getWhitelistAddressListing", $params);

			echo $result;

		break;
	
		case "removeAddress":

			$params = array(
				'user_id' => $_SESSION["business"]["uuid"],
				'wallet_type' => $_POST['wallet_type'],
				'address' => $_POST['address'],
				'code' => $_POST['code']
			);

			$result = $post->curl_post_whitelist("removeAddress", $params);

			echo $result;

		break;

		case "whitelistMultiAddress":

			$params = array(
				'user_id' => $_SESSION["business"]["uuid"],
				'address' => $_POST['address'],
				'code' => $_POST['code']
			);

			$result = $post->curl_post_whitelist("whitelistMultiAddress", $params);

			echo $result;

		break;
		

		case "batchWhitelistAddress":

			if(!empty($_FILES['excel']['tmp_name']) && is_uploaded_file($_FILES['excel']['tmp_name'])) {
                $fileData = file_get_contents($_FILES['excel']['tmp_name']);
                $base64 = base64_encode($fileData);
            }

			$params = array(
				'user_id' => $_SESSION["business"]["uuid"],
				'wallet_type' => $_POST['wallet_type'],
				'code' => $_POST['code'],
				'tmpName' => $_FILES['excel']['tmp_name'],
				'type' => $_FILES['excel']['type'],
				'name' => $_FILES['excel']['name'],
				'base64' => $base64
			);

			$result = $post->curl_post_whitelist("batchWhitelistAddress", $params);

			echo $result;

		break;


   }
?>