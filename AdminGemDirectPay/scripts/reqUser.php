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
        case "adminNuxpayCreateUser":
        $params = array(
            "mobile"                 => $_POST['mobile'],
            "pay_password"           => $_POST['pay_password'],
            "pay_retype_password"    => $_POST['pay_retype_password'],
            "nickname"               => $_POST['nickname'],
            "country"               => $_POST['country'],
            "type"                   => $config['companyName'],
            "content"                => 'Admin',
            "distributor"           => $_POST['distributor'],
            "reseller"              => $_POST['reseller'],
            "site"                  => $_POST['site'],
            "email"                 => $_POST['email'],
            "country_code"          => $_POST['country_code']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "adminGetSites":
        $params = array("site"=>$_POST['site']);

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "adminResellerCreateDistributor":
        $params = array(
            "username"          => $_POST['username'],
            "nickname"          => $_POST['nickname'],
            "email"             => $_POST['email'],
            "password"          => $_POST['password'],
            "confirm_password"  => $_POST['confirm_password'],
            "mobile_no"         => $_POST['mobile_no'],
            "site"              => $_POST['site']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "adminResellerCreateReseller":
        $params = array(
            "username"          => $_POST['username'],
            "nickname"          => $_POST['nickname'],
            "email"             => $_POST['email'],
            "password"          => $_POST['password'],
            "confirm_password"  => $_POST['confirm_password'],
            "mobile_no"         => $_POST['mobile_no'],
            "distributor"       => $_POST['distributor'],
            "site"              => $_POST['site']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;
    }
}
?>
