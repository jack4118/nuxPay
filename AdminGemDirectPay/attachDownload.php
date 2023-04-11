<?php
    session_start();
    
    include($_SERVER["DOCUMENT_ROOT"]."/include/config.php");
    // include($_SERVER["DOCUMENT_ROOT"]."/include/class.general.php");
    include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
    
    // $general = new general();
    $post = new post();


    $params = array(
                'uploadID' => $_POST['uploadID']
                );

    $result = $post->curl("getTicketItemAttachment", $params);
    // $xml = simplexml_load_string($result);
    $res = json_decode($result, 1);

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.$res['data']['fileName']);
    header('Content-Transfer-Encoding: binary');
    header('Connection: Keep-Alive');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
// header('Content-Length: ' . $size);
    echo base64_decode($res['data']['fileAttachment']);

    exit();

    
?>