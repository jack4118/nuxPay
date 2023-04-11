<?php
    /**
     * @author TtwoWeb Sdn Bhd.
     * This file is contains the functions related to Escrow Chat.
     * Date  05/01/2021.
    **/
    session_start();

    include ($_SERVER["DOCUMENT_ROOT"] . "/include/config.php");
    include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
    
    $post = new post();

    $command = $_POST['command'];
    
    $businessId     = $_SESSION['business']['uuid'];

    switch($command) {

        case "nuxpayEscrowGetMessage":

            $params = array(
                'tx_type' => 'send',
                'reference_id' => $_POST['reference_id']
            );
            $result = $post->curl_post('/nuxpay/escrow/get/messages', $params);

            echo $result;

        break;

        case "nuxpayEscrowSendMessage":

            $params = array(
                "business_id" => $businessId,
                "reference_id" => $_POST['reference_id'],
                "message" => $_POST['message'],
                "tx_type" => 'send'
            );
            
            $result = $post->curl_post('/nuxpay/escrow/send/message', $params);

            echo $result;

        break;

        case "cryptoEscrowGetTransaction":

            $params = array(
                "escrow_id" => $_POST['reference_id'],
                "business_id" => $businessId,
                "type" => $_POST['type']
            );
            
            $result = $post->curl_post('/crypto/escrow/get/transaction', $params);

            echo $result;

        break;

        case "nuxpayEscrowRelease":

            $params = array(
                "business_id" => $businessId,
                "transaction_hash" => $_POST['transaction_hash']
            );
            
            $result = $post->curl_post('/nuxpay/escrow/release', $params);

            echo $result;

        break;

        
    }
    
?>