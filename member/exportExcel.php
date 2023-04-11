<?php

    session_start();
    setlocale(LC_ALL, "US");

    include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
    include($_SERVER["DOCUMENT_ROOT"]."/language/lang_all.php");
    $post = new post();

	$command = $_POST['command'];
	unset($_POST['command']);

	$params = $_POST;
	$params['business_id'] =  $_SESSION["business"]["uuid"];
    $json = $post->curl_post($command, $params);
    $result = json_decode($json, true);

    $filename = $_POST['filename']."_".date('Y/m/d').".xlsx";
    $fileData = base64_decode($result['data']['base64']);

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    header("Content-Type: {'".$ext."'}");
    header("Content-Transfer-Encoding: base64");
    header("Content-Disposition: attachment; filename=$filename");
    flush();
    ob_end_clean();
    echo $fileData;
    flush();
    ob_end_clean();
    unlink($filename);
    
?>
