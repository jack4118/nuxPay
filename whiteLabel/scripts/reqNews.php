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

            case "blogListing":

                $params = array(
                    'page' => $_POST['page'],
                    'page_size' => $_POST['page_size'],
                    'order' => $_POST['order']
                );
                $result = $post->curl_post('/xun/news/list', $params);

                echo $result;

            break;

            case "blogDetails":

                $params = array(
                    "id" => $_POST['id']
                );
                
                $result = $post->curl_post('/xun/news/details', $params);

                echo $result;

            break;

        }
    }
?>
