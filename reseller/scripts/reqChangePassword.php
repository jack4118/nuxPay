<?php
    /**
     * @author TtwoWeb Sdn Bhd.
     * This file is contains the functions related to Admin user.
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

    $date = new DateTime();
    $serverTimeZone = date_offset_get($date);

    if($_POST['type'] == 'logout'){
        session_destroy();
    }
    else{
        switch($command) {
            case "resellerChangePassword":
            $params = array(
                "username"          => $username,
                "current_password"      => $_POST['current_password'],
                "new_password"      => $_POST['new_password'],
                "confirm_password"  => $_POST['confirm_password'],
            );

            $result = $post->curl($command, $params);

            echo $result;
            break;

            case "resellerRequestResetPasswordOTP":
            $params = array(
                "email" => $_POST['email'],
                "source" => $_POST['source']
            );

            $result = $post->curl($command, $params);

            echo $result;
            break;

            case "resellerResetPassword":
            $params = array(
                "email" => $_POST['email'],
                "user_otp" => $_POST['user_otp'],
                "new_password" => $_POST['new_password'],
                "confirm_password" => $_POST['confirm_password'],
                "source" => $_POST['source']
            );

            $result = $post->curl($command, $params);

            echo $result;
            break;          
        }
    }
    ?>
