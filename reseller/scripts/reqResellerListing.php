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
            
            case "getresellerList":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "inputData" => $_POST['inputData']
                );
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getAdminDetails":

                $params = array("id" => $_POST['id']);
                               
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "addAdmins":
                
                $params = array("roleID" => $_POST['roleID'],
                                "email" => $_POST['email'],
                                "businessName"    => $_POST['businessName'],
                                "mobileNumber" => $_POST['mobileNumber'],
                                "countryName"   => $_POST['countryName'],
                               );
                                
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "editAdmins":
                
                $params = array("roleID" => $_POST['roleID'],
                                "email" => $_POST['email'],
                                "businessName"    => $_POST['businessName'],
                                "mobileNumber" => $_POST['mobileNumber'],
                                "country"   => $_POST['country'],
                               );
                                
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getRoles":

                $params = array("searchData"     => $_POST['inputData'],
                                "getActiveRoles" => $_POST['getActiveRoles'],
                                "site"           => $_POST['site']
                               );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            

            

            
        }
    }
?>
