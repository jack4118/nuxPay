<?php
    /**
     * @author ttwoweb.
     * This file is contains the script to process adminLogin.
     *
    **/
    
	session_start();
    include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");

    //$general = new general();
    //$language = $general->getLanguage();
	$post = new post();

	$command = $_POST['command'];

    if($_POST['type'] == 'logout'){
        session_destroy();
    }
    else {
        //if($_SESSION['captcha'] == strtoupper($_POST['captcha'])) {
            $params = array("username" => $_POST['username'],
                            "password" => $_POST['password'],
                            "site" => "GemDirectPay"
                            );
            $result = $post->curl($command, $params);
    //        $status = $result['status'];
    //        $code = $result['code'];
    //        $statusMsg = $result['statusMsg'];
            // include($_SERVER["DOCUMENT_ROOT"]."/sidebarArray.php");

            $userData = $result['data']['userDetails'];
    //        print_r($result);
    //
    //        $data = json_decode($data);
    //        
            // $pages = $result['data']['pages'];
            // $hiddens = $result['data']['hidden'];
            $permissions = $result['data']['permissions'];
            // $permissions = $menu['permissions'];
            $pages = $result['data']['pages'];
            
            $userID = $userData['userID'];
            $username = $userData['username'];
            $userEmail = $userData['userEmail'];
            $userRoleID = $userData['userRoleID'];
            $userType = $userData['userType'];
            $sessionID = $userData['sessionID'];
            $sessionTimeOut = $userData['sessionTimeOut'];
            $pagingCount = $userData['pagingCount'];
            $timeOutFlag = $userData['timeOutFlag'];
            $decimalPlaces = $userData['decimalPlaces'];
            $distributor_username = $userData["distributor_username"];

            $_SESSION["distributor_username"] = $distributor_username;
            $_SESSION["permission"] = $permissions;
    //        $_SESSION["userData"] = $permissions;
            $_SESSION["userID"] = $userID;
            $_SESSION["username"] = $username;
            $_SESSION["userEmail"] = $userEmail;
            $_SESSION["userRoleID"] = $userRoleID;
            $_SESSION["userType"] = $userType;
            $_SESSION["sessionID"] = $sessionID;
            $_SESSION["pagingCount"] = $pagingCount;
            $_SESSION["sessionExpireTime"] = $timeOutFlag;
            $_SESSION["decimalPlaces"] = $decimalPlaces;
            $_SESSION["timezone"] = $_POST["time_zone_offset"];
            
            // Set session for menu and submenu
            foreach($permissions as $array) {
                if($array['file_path'] != '')
                    $_SESSION["access"][$array['file_path']] = $array['name'];
                $menuPath[$array['id']] = $array['file_path'];
            }

            // Set session for hidden page
            foreach($hiddens as $array) {
                $menuPath[$array['id']] = $array['file_path'];
                $_SESSION["access"][$array['file_path']] = $array['name'];
    //            $_SESSION["parentPage"][$array['file_path']] = $menuPath[$array['parent_id']];
            }

            // Set session for hidden parent. To get to know which parent this hidden page belongs to
            foreach($pages as $array) {
                $_SESSION["parentPage"][$array['file_path']] = $menuPath[$array['parent_id']];
            }
            
            // Set session for page
            foreach($pages as $array) {
                $menuPath[$array['id']] = $array['file_path'];
                $_SESSION["access"][$array['file_path']] = $array['name'];
    //            $_SESSION["parentPage"][$array['file_path']] = $menuPath[$array['parent_id']];
            }
            
            // Set session for page parent. To get to know which parent this page belongs to
            foreach($pages as $array) {
                $_SESSION["parentPage"][$array['file_path']] = $menuPath[$array['parent_id']];
            }
            
            $_SESSION['lastVisited'] = 'admin.php';
            $_SESSION['menuPath'] = $menuPath;
            $myJson = json_encode($result);
            echo $myJson;
//            }
//        else {
//            $myJson = array('status' => 'error', 'code' => 1, 'statusMsg' => 'Incorrect security code.', 'data' => "");
//            $myJson = json_encode($myJson);
//            echo $myJson;
//        }
    }
?>
