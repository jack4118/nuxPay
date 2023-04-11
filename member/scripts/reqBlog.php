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
                $result = $post->curl_post('/xun/blog/list', $params);

                echo $result;

            break;

            case "blogDetails":

                $params = array(
                    "id" => $_POST['id']
                );
                
                $result = $post->curl_post('/xun/blog/details', $params);

                echo $result;

            break;

            case "getMainStoryPage":
            $params = array(
                'top_story_page_number'       => $_POST["top_story_page_number"],
                'top_story_page_size'         => $_POST["top_story_page_size"],
                'category_filter_offset'      => $_POST["category_filter_offset"],
                'category_filter_page_size'   => $_POST["category_filter_page_size"],
                'category_id'                 => $_POST["category_id"],
            );
            $result = $post->curl_post("/web/main/story/page", $params);
            echo $result;
            break;

            case "getMainStoryPageDetail":

                $params = array(
                    "id" => $_POST['id']
                );
                
                $result = $post->curl_post('/xun/story/details', $params);

                echo $result;

            break;

            case "getMainStoryPageTrans":

                $params = array(
                    "id"        => $_POST['id'],
                    "last_id"   => $_POST['last_id'],
                    "page_size" => $_POST['page_size']
                );
                
                $result = $post->curl_post('/xun/story/transaction/history', $params);

                echo $result;

            break;

            case "getMainStoryPageComment":

                $params = array(
                    "id"        => $_POST['id'],
                    "last_id"   => $_POST['last_id'],
                    "page_size" => $_POST['page_size']
                );
                
                $result = $post->curl_post('/xun/story/comment/list', $params);

                echo $result;

            break;

            case "addMainStoryPageComment":

                $params = array(
                    "username"     => $_POST['username'],
                    "business_id"  => $_POST['business_id'],
                    "story_id"     => $_POST['story_id'],
                    "comment"      => $_POST['comment']
                );
                
                $result = $post->curl_post('/xun/story/add/comment', $params);

                echo $result;

            break;

        }
    }
?>
