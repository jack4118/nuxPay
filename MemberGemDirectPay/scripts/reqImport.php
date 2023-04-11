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

            case "uploadFile":

                $tmpName = $_FILES['file']['tmp_name'];

                $params = array ( 
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_email' => $_SESSION["business_email"],
                    'business_id' => $_SESSION["business"]["uuid"],
                    "contact_file"    => "@".$tmpName,
                    "file_name" => $_FILES['file']['name'],
                    "group_name" => $_POST['groupName']                
                );
                
                $result = $post->curl_post_multipart("/xun/business/contact/group/import", $params);

                echo $result;
                break;


            case "uploadContact":

                $tmpName = $_FILES['file']['tmp_name'];
                
                $params = array ( 
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_email' => $_SESSION["business_email"],
                    'business_id' => $_SESSION["business"]["uuid"],
                    "contact_file"    => "@".$tmpName,
                    "file_name" => $_FILES['file']['name'],
                    "group_id" => $_POST['groupID']                
                );
                
                // print_r($params);
                $result = $post->curl_post_multipart("/xun/business/contact/group/edit/import", $params);

                echo $result;
                break;
    }
?>