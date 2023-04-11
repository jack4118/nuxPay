<?php
    /**
     * @author TtwoWeb Sdn Bhd.
     * This file is contains the functions related to Ticket user.
     * Date  09/06/2018.
    **/
    session_start();

    include ($_SERVER["DOCUMENT_ROOT"] . "/include/config.php");
    include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
    
    $post = new post();

    $command = $_POST['command'];

    $username   = $_SESSION['username'];
    $userID     = $_SESSION['userID'];
    $sessionID  = $_SESSION['sessionID'];

    if($_POST['type'] == 'logout'){
        session_destroy();
    }
    else{
        switch($command) {
            
            case "addTicket":

                $attachmentTempName = $_FILES['attachment']['tmp_name'];

                $attachmentBase64 = "";
                $attachmentType = "";
                $attachmentName = "";

                if(!empty($attachmentTempName) && is_uploaded_file($attachmentTempName)) {
                    $fileData = file_get_contents($attachmentTempName);
                    $attachmentBase64 = base64_encode($fileData);

                    $attachmentType = $_FILES['attachment']['type'];
                    $attachmentName = $_FILES['attachment']['name'];
                }

                $params = array (
                    'clientName' => $_POST['clientName'],
                    'clientEmail' => $_POST['clientEmail'],
                    'clientPhone' => $_POST['clientPhone'],
                    'status' => $_POST['status'],
                    'priority' => $_POST['priority'],
                    'type' => $_POST['type'],
                    'subject' => $_POST['subject'],
                    'department' => $_POST['department'],
                    'assigneeID' => $_POST['assigneeID'],
                    'assigneeName' => $_POST['assigneeName'],
                    'internal' => $_POST['internal'],
                    'content' => $_POST['content'],
                    'attachmentBase64' => $attachmentBase64,
                    'attachmentType' => $attachmentType,
                    'attachmentName' => $attachmentName
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getTicketDefaultData":

                $params = array();
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "unassignTickets":

                $params = array (
                    'searchData' => $_POST['searchData'],
                    'pageNumber' => $_POST['pageNumber']
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "updateTicket":

                $attachmentTempName = $_FILES['attachment']['tmp_name'];

                $attachmentBase64 = "";
                $attachmentType = "";
                $attachmentName = "";

                if(!empty($attachmentTempName) && is_uploaded_file($attachmentTempName)) {
                    $fileData = file_get_contents($attachmentTempName);
                    $attachmentBase64 = base64_encode($fileData);

                    $attachmentType = $_FILES['attachment']['type'];
                    $attachmentName = $_FILES['attachment']['name'];
                }

                $ticketIDs[] = $_POST['ticketID'];

                $params = array (
                    'ticketIDs' => $_POST['ticketIDs'] ? $_POST['ticketIDs'] : $ticketIDs,
                    'assigneeID' => $_POST['assigneeID'] ? $_POST['assigneeID'] : "",
                    'status' => $_POST['status'] ? $_POST['status'] : "",
                    'priority' => $_POST['priority'] ? $_POST['priority'] : "",
                    'department' => $_POST['department'] ? $_POST['department'] : "",
                    'type' => $_POST['type'] ? $_POST['type'] : "",
                    'content' => $_POST['content'] ? $_POST['content'] : "",
                    'updateType' => $_POST['updateType'] ? $_POST['updateType'] : "",
                    'ticketAction' => $_POST['ticketAction'] ? $_POST['ticketAction'] : "",
                    'attachmentBase64' => $attachmentBase64,
                    'attachmentType' => $attachmentType,
                    'attachmentName' => $attachmentName,
                    'internal' => $_POST['internal']
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "updateMutipleTicket":

                // $ticketIDs[] = $_POST['ticketID'];

                // $params = array (
                //     'ticketIDs' => $_POST['ticketIDs'] ? $_POST['ticketIDs'] : $ticketIDs,
                //     'assigneeID' => $_POST['assigneeID'] ? $_POST['assigneeID'] : "",
                //     'status' => $_POST['status'] ? $_POST['status'] : "",
                //     'priority' => $_POST['priority'] ? $_POST['priority'] : "",
                //     'department' => $_POST['department'] ? $_POST['department'] : "",
                //     'type' => $_POST['type'] ? $_POST['type'] : "",
                //     'content' => $_POST['content'] ? $_POST['content'] : "",
                //     'updateType' => $_POST['updateType'] ? $_POST['updateType'] : "",
                //     'ticketAction' => $_POST['ticketAction'] ? $_POST['ticketAction'] : ""
                // );
                $result = $post->curl($command, $_POST['multipleArray']);
                
                echo $result;
                break;

            case "getTicketDetails":

                $params = array (
                    'ticketID' => $_POST['ticketID']
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "deleteTicket":

                $params = array (
                    'ticketIDs' => $_POST['ticketIDs']
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getTicket":

                $params = array (
                    'status'     => $_POST['status'],
                    'searchData' => $_POST['searchData'],
                    'pageNumber' => $_POST['pageNumber']
                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "adminGetDisputeList":

                $params = array(
                    'from_datetime' => $_POST['fromDateTime'],
                    'to_datetime'   => $_POST['toDateTime'],
                    'reportBy'      => $_POST['reportBy'],
                    'mobile_number' => $_POST['mobileNumber'],
                    'status'        => $_POST['status'],
                    'page'          => $_POST['pageNumber'],
                    'page_size'     => $_POST['pageSize']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "adminGetSpecificDisputeDetails":

                $params = array(
                    'id'        => $_POST['id'],
                    'page'      => $_POST['pageNumber'],
                    'page_size' => $_POST['pageSize']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;
                
            case "adminGetSpecificEscrowInbox":

                $params = array(
                    'id'        => $_POST['id'],
                    'page'      => $_POST['pageNumber'],
                    'page_size' => $_POST['pageSize']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "adminDisputeActionPerform":

                $params = array(
                    'id'        => $_POST['id'],
                    'type'      => $_POST['type'],
                    'username'  => $username,
                    'password'  => $_POST['password'],
                    'action'    => $_POST['action']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "adminGetCrowdfundingListing":

                $params = array(
                    'from_datetime'  => $_POST['from_datetime'],
                    'to_datetime'    => $_POST['to_datetime'],
                    'created_at'     => $_POST['created_at'],
                    'name'           => $_POST['name'],
                    'phone_number'   => $_POST['phone_number'],
                    'email'          => $_POST['email'],
                    'url'            => $_POST['url'],
                    'ip'             => $_POST['ip'],
                    'country'        => $_POST['country'],
                    'device'         => $_POST['device'],
                    'page'           => $_POST['page'],
                    'page_size'      => $_POST['page_size']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;
        }
    }
?>
