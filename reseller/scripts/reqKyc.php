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

            case "adminGetKYCList":

                 $params = array(
                                "nickname" => $_POST['username'],
								"username" => $_POST['phoneNumber'],
								"country" => $_POST['country'],
								"first_name" => $_POST['firstName'],
								"last_name" => $_POST['lastName'],
								"document_id" => $_POST['idNumber'],
								"document_type" => $_POST['typeOfImage'],
								"s3_link" => $_POST['viewImage'],
								"status" => $_POST['status'],
								"risk_level" => $_POST['riskLevel'],
								"created_at" => $_POST['submittedAt'],
								"updated_at" => $_POST['updatedAt'],

                                "submitted_from_datetime" => $_POST['fromDate'],
                                "submitted_to_datetime" => $_POST['toDate'],



                                "updated_from_datetime" => $_POST['upFromDate'],
                                "updated_to_datetime" => $_POST['upToDate'],

                                "page" => $_POST['pageNumber'],
                                "page_size" => $_POST['pageSize'],
                                "order" => $_POST['order']


                );

                $result = $post->curl($command, $params);

                echo $result;

            break;

        }
    }
?>
