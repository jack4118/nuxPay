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

    if($_POST['type'] == 'logout'){
        session_destroy();
    }
    else{
        switch($command) {
            
            case "adminGetReferralList":

                 $params = array("referral_code" => $_POST['referralCode'],
                                "business_email" => $_POST['email'],
                                "business_name" => $_POST['businessName'],
                                "country" => $_POST['country'],
                                "business_id" => $_POST['businessID'],
                                "mobile" => $_POST['mobileNo'],
                                "page" => $_POST['page'],
                                "page_size" => $_POST['page_size'],
                                "order" => $_POST['order']
                );
               
                $result = $post->curl($command, $params);

                echo $result;
            break;

            case "getXunCountryList":

                $params = array(
                    // "pagination" => $_POST['pagination']
                );
                
                $result = $post->curl($command, $params);

                echo $result;

            break;

        }
    }
?>
