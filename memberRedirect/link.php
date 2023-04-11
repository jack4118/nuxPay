<?php    
    $currentPath = __DIR__;
    $logPath = $currentPath.'/log/';
    $logBaseName = basename(__FILE__, '.php');

    include($currentPath."/include/class.post.php");
    include($currentPath.'/include/class.log.php');
    include($currentPath.'/include/config.php');
    
    
   $log = new Log($logPath, $logBaseName);
    $post = new post();

   $log->write(date("Y-m-d H:i:s")." "."FILE_GET_CONTENTS : ".file_get_contents('php://input')." ## HTTP_RAW_POST_DATA : ".$GLOBALS['HTTP_RAW_POST_DATA']." ## QUERY_STRING : ".$_SERVER['QUERY_STRING']."\n");

    // $originalURL = "homepage.php";

    $shortURL = $_GET;

    if($shortURL['link'] != '' && $shortURL['link'] != NULL){
        $params['short_code'] = $shortURL['link'];

        // $result = $post->curl_post("/web/pay/campaign/long/url/get", $params);
      
        // unset($params);

        // $result = json_decode($result,1);

        // $originalURL = isset($result['data']['long_url']) ? $result['data']['long_url'] : false; // Default set into config.php
    }
    
    // if($originalURL != "" && $originalURL != NULL ){
    //    $log->write(date("Y-m-d H:i:s")." Link : ".$_GET['link']." Redirect to : ".$originalURL."\n\n");
    //     header("Location: ".$originalURL."");
    // }else{
    //    $log->write(date("Y-m-d H:i:s")." Link : ".$_GET['link']." Return Error 404.\n\n");
    //     header("Location: ".$sys['memberSiteURL']."");
    // }

    
?>