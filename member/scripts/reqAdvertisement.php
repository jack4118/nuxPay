<?php
    /**
     * @author TtwoWeb Sdn Bhd.
     * This file is contains the functions related to Admin user.
     * Date  08/01/2021.
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

            case "nuxpayadvestimentcreate":

                $params = array(
                    'type'   => $_POST["type"],
//                    'wallet_type'   => $_POST["wallet_type"],
//                    'amount'   => $_POST["amount"],
                    'content'   => $_POST["content"]
                );

                $result = $post->curl_post("/nuxpay/advestiment/create", $params);
                
                echo $result;

            break;

            case "nuxpayadvestimentdelete":

                $params = array(
                    'ads_id'   => $_POST["ads_id"]
                );

                $result = $post->curl_post("/nuxpay/advestiment/delete", $params);
                
                echo $result;

            break;

            case "nuxpayadvestimentupdate":

                $params = array(
                    'ads_id'   => $_POST["ads_id"],
//                    'amount'   => $_POST["amount"],
                    'content'   => $_POST["content"],
                );

                $result = $post->curl_post("/nuxpay/advestiment/update", $params);
                
                echo $result;

            break;

            case "nuxpayadvestimentlistingget":

                $params = array(
                    'page'   => $_POST["page"],
                    'type'   => $_POST["type"]
                );

                $result = $post->curl_post("/nuxpay/advestiment/listing/get", $params);
                
                echo $result;

            break;

            case "nuxpayadvestimentdetailget":

                $params = array(
                    'ads_id'   => $_POST["ads_id"]
                );

                $result = $post->curl_post("/nuxpay/advestiment/detail/get", $params);
                
                echo $result;

            break;


            //buy sell
            case "nuxpaybuysellordercreate":

                $params = array(
                    'type'   => $_POST["type"],
                    'content'   => $_POST["content"],
                    'currency' => $_POST['currency'],
                    'contactInfo' => $_POST['contactInfo']
                );

                $result = $post->curl_post("/nuxpay/buysell/order/create", $params);
                
                echo $result;

            break;

            case "nuxpaybuysellorderdelete":

                $params = array(
                    'order_id'   => $_POST["order_id"]
                );

                $result = $post->curl_post("/nuxpay/buysell/order/delete", $params);
                
                echo $result;

            break;

            case "nuxpaybuysellorderupdate":

                $params = array(
                    'order_id'   => $_POST["order_id"],
                    'content'   => $_POST["content"],
                    'currency' => $_POST['currency'],
                    'contactInfo' => $_POST['contactInfo']
                );

                $result = $post->curl_post("/nuxpay/buysell/order/update", $params);
                
                echo $result;

            break;

            case "nuxpaybuyselllistingget":

                $params = array(
                    'page'   => $_POST["page"],
                    'type'   => $_POST["type"],
                    'currency' => $_POST['currency']
                );

                $result = $post->curl_post("/nuxpay/buysell/listing/get", $params);
                
                echo $result;

            break;

            case "nuxpaybuyselldetailget":

                $params = array(
                    'order_id'   => $_POST["order_id"]
                );

                $result = $post->curl_post("/nuxpay/buysell/detail/get", $params);
                
                echo $result;

            break;

            case "nuxpaybuysellwallettypeget":

                $params = array(
                    
                );

                $result = $post->curl_post("/nuxpay/buysell/wallettype/get", $params);
                
                echo $result;

            break;

        }
    }
?>