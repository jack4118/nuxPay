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
            
            case "adminGetUsageHistory":

                 $params = array("business_id" => $_POST['businessID'],
                                "from_datetime" => $_POST['from_datetime'],
                                "to_datetime" => $_POST['to_datetime'],
                                "business_name" => $_POST['businessName'],
                                "business_email" => $_POST['email'],
                                "mobile" => $_POST['mobile'],
                                "page" => $_POST['page'],
                                "page_size" => $_POST['pageSize'],
                                "order" => $_POST['order']
                );
               
                $result = $post->curl($command, $params);

                $result = json_decode($result, true);

                    foreach ($result['data']['data'] as $key => $data) {
                        $data['billing_date'] = date("d/m/Y H:i:s", strtotime($data['billing_date']) - $serverTimeZone - $_SESSION["timezone"]);
                        $result['data']['data'][$key] = $data;
                    }

                $result = json_encode($result);

                echo $result;
            break;

        }
    }
?>
