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
            
            case "adminGetBlogImagePresignedUrl":

                 $params = array("file_name" => $_POST['file_name'],
                                "content_type" => $_POST['content_type'],
                                "content_size" => $_POST['content_size']
                );
               
                $result = $post->curl($command, $params);

                echo $result;
            break;

            case "adminAddNews":

                 $params = array("content_type" => $_POST['type'],
                                "url_name" => $_POST['url_name'],
                                "redirect_url" => $_POST['redirect_url'],
                                "image_url" => $_POST['image_url'],
                                "source" => $_POST['source'],
                                "title" => $_POST['title'],
                                "meta_title" => $_POST['meta_title'],
                                "meta_description" => $_POST['meta_description'],
                                "content" => $_POST['content']                
                            );
               
                $result = $post->curl($command, $params);

                echo $result;
            break;

            case "adminGetNewsListing":

                 $params = array(
                                "from_datetime" => $_POST['from_datetime'],
                                "to_datetime" => $_POST['to_datetime'],
                                "page" => $_POST['page'],
                                "page_size" => $_POST['page_size'],
                                "order" => $_POST['order']
                            );
               
                $result = $post->curl($command, $params);

                echo $result;
            break;

            case "adminDeleteBlog":

                 $params = array(
                    "id" => $_POST['blogID'],
                 );
               
                $result = $post->curl($command, $params);

                echo $result;
            break;

            case "adminGetNewsDetails":

                 $params = array(
                    "id" => $_POST['blogID'],
                 );
               
                $result = $post->curl($command, $params);

                echo $result;
            break;
            
            case "adminEditNews":

                 $params = array("id" => $_POST['id'],
                                "url_name" => $_POST['url_name'],
                                "redirect_url" => $_POST['redirect_url'],
                                "image_url" => $_POST['image_url'],
                                "source" => $_POST['source'],
                                "title" => $_POST['title'],
                                "meta_title" => $_POST['meta_title'],
                                "meta_description" => $_POST['meta_description'],
                                "content" => $_POST['content']                
                            );
               
                $result = $post->curl($command, $params);

                echo $result;
            break;

        }
    }
?>
