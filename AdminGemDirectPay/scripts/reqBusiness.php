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

    $date = new DateTime();
    $serverTimeZone = date_offset_get($date);

    if($_POST['type'] == 'logout'){
        session_destroy();
    }
    else{
        switch($command) {

            case "getAdminList":

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

            case "adminGetUserListing":

                 $params = array(
                    "pageNumber" => $_POST['pageNumber'],
                    "business_email" => $_POST['business_email'],
                    "business_company_name" => $_POST['business_company_name'],
                    "country" => $_POST['country'],
                    "business_id" => $_POST['business_id'],
                    "business_mobile" => $_POST['business_mobile'],
                    "inputData" => $_POST['inputData'],
                    "domain"    => $_POST['domain']
                );
                $result = $post->curl($command, $params);

                echo $result;
            break;


            case "addAdmins":

                $params = array("fullName" => $_POST['fullName'],
                    "username" => $_POST['username'],
                    "email"    => $_POST['email'],
                    "password" => $_POST['password'],
                    "roleID"   => $_POST['roleID'],
                    "status"   => $_POST['status']
                );

                $result = $post->curl($command, $params);

                echo $result;
            break;

            case "getBusinessDetails":

            $params = array("business_id" => $_POST['business_id'],
                "X-Xun-Token" => $_SESSION['access_token'],
            );

            $result = $post->curl($command, $params);

            echo $result;
            break;

            case "updated":

            $params = array("mobile" => $_POST['mobile'],
                "creditBalance" => $_POST['creditBalance'],
                "referral_id"    => $_POST['referral_id'],
                "business_country" => $_POST['business_country'],
                "freeze"   => $_POST['freeze'],
                "description"   => $_POST['description'],
                "X-Xun-Token"   => $_SESSION["access_token"]
            );

            $result = $post->curl($command, $params);

            echo $result;
            break;

            case "editAdmins":

                $params = array("id"       => $_POST['id'],
                    "fullName" => $_POST['fullName'],
                    "username" => $_POST['username'],
                    "email"    => $_POST['email'],
                    "roleID"   => $_POST['roleID'],
                    "status"   => $_POST['status']
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

            case "getRoles":

                $params = array("searchData"     => $_POST['inputData'],
                    "getActiveRoles" => $_POST['getActiveRoles'],
                    "site"           => $_POST['site']
                );
                $result = $post->curl($command, $params);

                echo $result;
            break;

            case "addUserTeamMember":

                $params = array(
                    'X-Xun-Token'   => $_SESSION["access_token"],
                    'business_id'   => $_SESSION["business"]["uuid"],
                    "name"          => $_POST['name'],
                    "mobileNo"      => $_POST['mobileNo'],
                    "hoursFrom"     => $_POST['hoursFrom'],
                    "hoursTo"       => $_POST['hoursTo']
                );
                $result = $post->curl($command, $params);
                
                echo $result;
            break;

         case "addCategoriesItem":

            $params = array(
             'X-Xun-Token' => $_SESSION["access_token"],
             // 'business_email' => $_SESSION["business_email"],
             'business_id' => $_POST["business_id"]["uuid"],
             'tag' => $_POST["tag"],
             'tag_description' => $_POST["tag_description"],
             'callback_url' => $_POST["callback_url"],


             // 'employee_mobile' => $_POST["employee_mobile"]
            );
        $result = $post->curl_post("/xun/business/tag/add", $params);
        echo $result;
        break;

            
        case "getTeamMemberList":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'X-Xun-Token' => $_SESSION["access_token"],
                'employee_mobile' => $_SESSION["employee_mobile"]
            );

            $result = $post->curl_post("/xun/business/employee/confirmed/list", $params);
            
            $result = json_decode($result, true);

                foreach ($result['result'] as $key => $data) {
                    $data['employee_mobile'] = date("d/m/Y H:i:s", strtotime($data['employee_mobile']) - $serverTimeZone -$_SESSION["timezone"]);
                    $result['result'][$key] = $data;
                }

            $result = json_encode($result);
            
            echo $result;

        break;

        case "editCategoriesItem":
            $params = array(
             'X-Xun-Token' => $_SESSION["access_token"],
             // 'business_email' => $_SESSION["business_email"],
             'business_id' => $_SESSION["business"]["uuid"],
             'categoriesName' => $_POST["categories_Name"],
             'tag*' => $_POST["employee_Add"],
             'tag_description' => $_POST["tag_description"],
             'callback_url' => $_POST["foward_Url"],
             'employee_mobile' => $_POST["employeeMobile"],
            );
        $result = $post->curl_post("/xun/business/tag/edit", $params);
        echo $result;
        break;

           case "addTeamMember":
                
                $params = array(
                    'X-Xun-Token' => $_SESSION["access_token"],
                    'business_id' => $_POST["business"]["uuid"],
                    'employee_name' => $_POST["employee_name"],
                    'employee_mobile' => $_POST["employee_mobile"]
                );
                
                $result = $post->curl($command, $params);
                
                $result = json_decode($result, true);

                    foreach ($result['result'] as $key => $data) {
                        $data['employee_modified_date'] = date("d/m/Y H:i:s", strtotime($data['employee_modified_date']) - $serverTimeZone - $_SESSION["timezone"]);
                        $result['result'][$key] = $data;
                }

                $result = json_encode($result);
                
                echo $result;
                break;

             case "editTeamMember":
                
                $params = array("X-Xun-Token" => $_SESSION['access_token'],
                                'business_id' => $_POST["business"]["uuid"],
                                'employee_id' => $_POST["employee_id"],
                                'employee_name' => $_POST["employee_name"]
                               );
                                
                $result = $post->curl($command, $params);

                echo $result;
                break;

                case "adminDeleteUserTeamMember":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'employee_id' => $_POST["deleteData"]
            );
            $result = $post->curl_post("/xun/business/employee/delete", $params);
            echo $result;
            break;

                            case "adminDeleteAllUserTeamMember":
            $params = array(
                'business_id' => $_SESSION["business"]["uuid"],
                'employee_id' => $_POST["deleteData"]
            );
            $result = $post->curl_post("/xun/business/employee/delete", $params);
            echo $result;
            break;
            
        }
    }
    ?>
