<?php

    session_start();

    include ($_SERVER["DOCUMENT_ROOT"] . "/include/config.php");
    include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
    include("geoiploc.php");

    $post       = new post();
    $date = new DateTime();
    $serverTimeZone = date_offset_get($date);

    if (!isset($_COOKIE['utm_campaign'])) {
        $utm_source = urldecode($_GET['utm_source']);
        $utm_medium = urldecode($_GET['utm_medium']);
        $utm_campaign = urldecode($_GET['utm_campaign']);
        $utm_term = urldecode($_GET['utm_term']);
    }else{
        $utm_source = $_COOKIE['utm_source'];
        $utm_medium = $_COOKIE['utm_medium'];
        $utm_campaign = $_COOKIE['utm_campaign'];
        $utm_term = $_COOKIE['utm_term'];
    }

    $userUrl = "$_SERVER[REQUEST_SCHEME]://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $ip = $post->getRealUserIp();
    $countryCode = $_SERVER["HTTP_CF_IPCOUNTRY"];
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $parser = $post->parseUserAgent($userAgent);
    $type = $parser['platform']." - ".$parser['browserName'];
    $country = getCountryFromIP($ip, " NamE ");
    $deviceToken = "$_COOKIE[deviceToken]";
    $command = 'utm_record';
    $parameter = $_SERVER['QUERY_STRING'];
    $currentPage = basename($_SERVER['PHP_SELF']);

    if ($currentPage == "homepage.php" || $currentPage == "nuxpayLandingPage.php") {
        if ($parameter) {
            setcookie("keyword", $parameter, time() + (86400 * 30), "/");
        }
    }

    // echo $deviceToken;

    // if (!$_COOKIE['deviceToken']) {
        $params = [
            'utm_source' => $utm_source,
            'utm_medium' => $utm_medium,
            'utm_campaign' => $utm_campaign,
            'utm_term' => $utm_term,
            'ip' => $ip,
            'user_agent' => $userAgent,
            'type' => $type,
            'country' => $country,
            'url' => $userUrl,
            'device_id' => $deviceToken,
            'register_status' => '1',
            'tracking_site' => 'PPay'
        ];
        // $params = json_encode($params);
        $dataArray = array("command" => $command,
                           "params" => $params
                           );




        $url = "/modules/xun/xun_webservices.php";
        $webserviceURL = $sys['utmWebserviceURL'];

        $params = json_encode($dataArray);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $webserviceURL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-msgpack'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($result,true);

        if ($result["code"]==1) {
            $token = $result['device_id'];

            // if(!isset($_COOKIE['deviceToken'])) {
                // setcookie('deviceToken', $token, time() + (900 * 365 * 24 * 60 * 60) );
                setcookie("utm_source", $utm_source, time() + (86400 * 30), "/");
                setcookie("utm_medium", $utm_medium, time() + (86400 * 30), "/");
                setcookie("utm_campaign", $utm_campaign, time() + (86400 * 30), "/");
                setcookie("utm_term", $utm_term, time() + (86400 * 30), "/");
                setcookie("deviceToken", $token, time() + (86400 * 30), "/");
            // }
        }

        $result = json_encode($result,true);
        // echo $result;
    // }
    // else{
    //     $recordArray = json_decode($_COOKIE['records']);
    //     $recordNo = count(json_decode($_COOKIE['records']))+1;
    //     // echo $recordNo;
    //     $newRecord = array(
    //                 'count' => $recordNo,
    //                 'url' => $link,
    //                 'dateTime' => date("d/m/Y H:i:s", strtotime(date("Y/m/d H:i:s")) - $serverTimeZone)
    //         );
    //     array_push($recordArray, $newRecord);
    //     $recordArray = json_encode($recordArray);

    //     setcookie("records", $recordArray, time() + (86400 * 30), "/");
    // }
 ?>
