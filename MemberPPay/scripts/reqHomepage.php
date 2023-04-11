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

            case "contactUs":

                $params = array("name" => $_POST['name'],
                    "email_address" => $_POST['email'],
                    "country" => $_POST['country'],
                    "mobile_number" => $_POST['mobileNo'],
                    "company_name" => $_POST['companyName'],
                    "subject" => $_POST['subject'],
                    "message" => $_POST['message'],
                    "website" => $_POST['website'],
                    "symbol" => $_POST['symbol'],
                    "keyword" => $_POST['keyword']
                );
                $result = $post->curl_standard($command, $params);

                echo $result;

            break;


            case "CreateCoin":

                $params = array("name" => $_POST['name'],
                    "company_name" => $_POST['companyName'],
                    "mobile_number" => $_POST['mobileNo'],
                    "country" => $_POST['country'],
                    "token" => $_post['token']
                );
                $result = $post->curl_standard($command, $params);

                echo $result;

            break;

            // case "getCountriesList":

            //     $params = array(
            //         "pagination" => $_POST['pagination']
            //     );

            //     $result = $post->curl_standard($command, $params);

            //     echo $result;

            // break;




            case "homepageTable":

                $params = array();
                $result = $post->curl_post("/web/pay/homepage", $params);

                echo $result;

            break;

        }
    }
?>
