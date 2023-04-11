<?php 
session_start();
$_SESSION['userID'] = "7";
$_SESSION['username'] = "nuxpayadmin";
$_SESSION['sessionID'] = "bdf7ef1e6156e18f9dead84893c3c687";
$_SESSION['sessionTimeOut'] = "1625968070";

    include("include/class.post.php");

    $post = new post();

    $params["id"] = "332";
    

    $result = $post->curl("sellCryptoConfirmation", $params);

    print_r($result);

?>
