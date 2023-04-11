<?php
/**
* @author TtwoWeb Sdn Bhd.
* This file is contains the functions related to Nuxpay user.
* Date  21/07/2017.
**/
session_start();

include ($_SERVER["DOCUMENT_ROOT"] . "/include/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");

$post = new post();

$command = $_POST['command'];

$username   = $_SESSION['username'];
$userId     = $_SESSION['userID'];
$sessionID  = $_SESSION['sessionID'];

if($_POST['type'] == 'logout'){
    session_destroy();
}
else{
    switch($command) {
        case "getResellerSalesListing":
            $params = array(
                "user_id"                 => $_SESSION['userID'],
                "pageNumber"                    => $_POST['page'],
                "page_size"               => $_POST['page_size'],
                "date_to"                 => $_POST["date_to"],
                "date_from"               => $_POST["date_from"],
            );
    
            $result = $post->curl($command, $params);
    
        echo $result;
        break;

        case "saleListingDetails":
            $params = array(
                "user_id"                 => $_SESSION['userID'],
                "transactionDate"         => $_POST["transactionDate"],
            );
            $result = $post->curl($command, $params);
    
            echo $result;
            break;

    }

}
?>