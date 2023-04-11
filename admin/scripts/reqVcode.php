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
            
            case "adminGetUserVerificationCodeListing":

                 $params = array(
                                "mobile" => $_POST['mobile'],
                                "status" => $_POST['status'],
                                "action_type" => $_POST['action_type'],
                                "from_datetime" => $_POST['from_datetime'],
                                "to_datetime" => $_POST['to_datetime'],
                                "page" => $_POST['pageNumber'],
                                "page_size" => $_POST['page_size'],
                                "order" => $_POST['order']
                );
               
                $result = $post->curl($command, $params);

                echo $result;

            break;

        }
    }
?>
