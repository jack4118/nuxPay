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
            
            case "utm_list":

                 $params = array("country" => $_POST['country'],
                                "tracking_site" => $_POST['tracking_site'],
                                "url" => $_POST['url'],
                                "ip" => $_POST['ip'],
                                "device_id" => $_POST['device_id'],
                                "date_from" => $_POST['date_from'],
                                "date_to" => $_POST['date_to'],
                                "page" => $_POST['pageNumber'],
                                "page_size" => $_POST['page_size']
                );

                $result = $post->curlUtm($command, $params);

                $result = json_decode($result, true);

                    foreach ($result['data']['countriesList'] as $key => $data) {
                        // $data['created_at'] = date("d/m/Y H:i:s", strtotime($data['created_at']) - $serverTimeZone - $_SESSION["timezone"]);
                        $result['data']['countriesList'][$key] = $data;
                    }

                $result = json_encode($result);

                echo $result;
            break;

            case "utm_tracking_list":

                 $params = array("action_type" => $_POST['action_type'],
                                "date_to" => $_POST['date_to'],
                                "date_from" => $_POST['date_from'],
                                "device_id" => $_POST['device_id'],
                                "tracking_site" => $_POST['domain'],
                                "page" => $_POST['pageNumber']
                );
               
                $result = $post->curlUtm($command, $params);

                // $result = json_decode($result, true);

                //     foreach ($result['data']['countriesList'] as $key => $data) {
                //         $data['created_at'] = date("d/m/Y H:i:s", strtotime($data['created_at']) - $serverTimeZone - $_SESSION["timezone"]);
                //         $result['data']['countriesList'][$key] = $data;
                //     }

                // $result = json_encode($result);

                echo $result;
            break;

            case "addExcelReq":
                $params = array("command"     => $_POST['API'],
                  "type"        => 'excel',
                  "titleKey"    => $_POST['titleKey'],
                  "params"      => $_POST['params'],
                  "headerAry"   => $_POST['headerAry'],
                  "keyAry"      => $_POST['keyAry'],
                  "fileName"    => $_POST['fileName']
                );

                $result = $post->curl($command, $params);
                echo $result;
            break;

            case "getExcelReqList":
              $params = array("searchData" => $_POST['inputData'],
                              "pageNumber" => $_POST['pageNumber']
            );

                $result = $post->curl($command, $params);
                echo $result;
            break;

        }
    }
?>
