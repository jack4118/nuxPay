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
      case "changePassword":

      $params = array(
        'X-Xun-Token' => $_SESSION["access_token"],
        'business_id' => $_SESSION["business"]["uuid"],
        'business_email' => $_SESSION["business"]["business_email"],
        'current_password' => $_POST['current_password'],
        'new_password' => $_POST['new_password'],
        'confirm_password' => $_POST['confirm_password']
      );

      $result = $post->curl_post("/web/pay/change/password", $params);

      echo $result;
      break;
    }
}



?>
