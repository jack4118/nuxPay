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
    }
?>
