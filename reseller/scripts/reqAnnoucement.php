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
            
            case "adminAnnouncementS3UrlGet":

                 $params = array("file_name" => $_POST['file_name'],
                                "content_type" => $_POST['content_type'],
                                "content_size" => $_POST['content_size']
                );
               
                $result = $post->curl($command, $params);

                echo $result;
            break;

            case "adminAnnouncementAudienceGet":

                $params = array();
               
                $result = $post->curl($command, $params);

                echo $result;
            break;

            case "adminAnnouncementCreate":

                 $params = array("scheduled_date" => $_POST['scheduled_date'],
                                "time_zone" => $_POST['time_zone'],
                                "s3_link" => $_POST['s3_link'],
                                "title" => $_POST['title'],
                                "description" => $_POST['description'],
                                "audience_number" => $_POST['audience_number'],
                                "audience_id" => $_POST['audience_id'],
                                "valid_days" => $_POST['valid_days'],
                                "button_type" => $_POST['button_type'],
                                "button_name" => $_POST['button_name'],
                                "button_link" => $_POST['button_link']           
                            );
               
                $result = $post->curl($command, $params);

                echo $result;
            break;

            case "adminAnnouncementDetails":

                 $params = array(
                                "announcement_id" => $_POST['announcement_id']
                            );
               
                $result = $post->curl($command, $params);
                // print_r($params);
                echo $result;
            break;

            case "adminAnnouncementDelete":

                 $params = array(
                                "announcement_id" => $_POST['announcement_id']
                            );
               
                $result = $post->curl($command, $params);
                // print_r($params);
                echo $result;
            break;           

            case "adminAnnouncementRecipientHistory":

                 $params = array(
                                "announcement_id" => $_POST['announcement_id'],
                                "date_from" => $_POST['date_from'],
                                "date_to" => $_POST['date_to'],
                                // "type" => $_POST['type'],
                                "page" => $_POST['pageNumber']
                            );
               
                $result = $post->curl($command, $params);
                // print_r($params);
                echo $result;
            break;

            case "adminAnnouncementHistory":

                 $params = array(
                                "type"                  => $_POST['type'],
                                "date_from_created"     => $_POST['date_from_created'],
                                "date_to_created"       => $_POST['date_to_created'],
                                "date_from_scheduled"   => $_POST['date_from_scheduled'],
                                "date_to_scheduled"     => $_POST['date_to_scheduled'],
                                "title"                 => $_POST['title'],
                                "button_type"           => $_POST['buttonType'],
                                "page"                  => $_POST['pageNumber']
                            );
               
                $result = $post->curl($command, $params);
                // print_r($params);
                echo $result;
            break;

            
            case "adminAnnouncementEdit":

                 $params = array("announcement_id" => $_POST['announcementID'],
                                "scheduled_date" => $_POST['scheduled_date'],
                                "time_zone" => $_POST['time_zone'],
                                "s3_link" => $_POST['s3_link'],
                                "title" => $_POST['title'],
                                "description" => $_POST['description'],
                                "audience_number" => $_POST['audience_number'],
                                "audience_id" => $_POST['audience_id'],
                                "valid_days" => $_POST['valid_days'],
                                "button_type" => $_POST['button_type'],
                                "button_name" => $_POST['button_name'],
                                "button_link" => $_POST['button_link']           
                            );
               
                $result = $post->curl($command, $params);

                echo $result;
            break;

        }
    }
?>
