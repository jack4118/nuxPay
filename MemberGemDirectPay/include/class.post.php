<?php
class post{
  function post() {
    return array(
      "/xun/business/signin",
      "/xun/business/register"
    );
  }
  public function curlUtm($command, $params = array(), $site="Admin", $language="english", $source="GemDirectPay", $sourceVersion="", $userAgent="")
  {
    include(__DIR__.'/config.php');
    include(__DIR__.'/class.msgpack.php');
    
    if (!$userAgent) $userAgent = $_SERVER['HTTP_USER_AGENT'];
    
    if ($source == 'Web') {
                // Parse the user agent to find out details about the device
      $parser = $this->parseUserAgent($userAgent);
      $sourceVersion = $parser['browserVersion'];
      $type = $parser['platform']." - ".$parser['browserName'];
    }
    
            // Build the post data here
    $dataArray = array("command" => $command,
     "params" => $params
   );
    
    $dataArray = json_encode($dataArray);
            // return $dataArray;
    $webServiceUrl = $sys['utmWebserviceURL'];
    
    $request = $_SERVER['REQUEST_METHOD'];
    
    $user_ip = $this->getRealUserIp();
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $webServiceUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-msgpack','user-agent: '.$userAgent, 'user-ip: '.$user_ip,'source: '.$source, 'source2: nuxpay', 'access-token: '.$_SESSION["access_token"],'business-id: '.$_SESSION["business"]["uuid"]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataArray);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//          curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60); //timeout in seconds
//          curl_setopt($ch, CURLOPT_TIMEOUT, 60); //timeout in seconds
    $result = curl_exec($ch);
    curl_close($ch);
            // return $result;
    
    return $result;
  }
  
  public function curl_standard($command, $params = array(), $site="Admin", $language="english", $source="business", $sourceVersion="", $userAgent="")
  {
    include(__DIR__.'/config.php');
    include(__DIR__.'/class.msgpack.php');

    if (!$userAgent) $userAgent = $_SERVER['HTTP_USER_AGENT'];

    if ($source == 'Web') {
                // Parse the user agent to find out details about the device
      $parser = $this->parseUserAgent($userAgent);
      $sourceVersion = $parser['browserVersion'];
      $type = $parser['platform']." - ".$parser['browserName'];
    }

            // Build the post data here
    $dataArray = array("command" => $command,
     "userID" => $_SESSION['userID'],
     "username" => $_SESSION['username'],
     "sessionID" => $_SESSION['sessionID'],
     "sessionTimeOut" => $_SESSION['sessionTimeOut'],
                               "source" => $source, //change member/admin accordingly
                               "sourceVersion" => $sourceVersion,
                               "language" => $language, //change chinese/malay/english accordingly
                               "userAgent" => $userAgent,
                               "type" => $type,
                               "site" => $site,
                               "ip" => $_SERVER['REMOTE_ADDR'],
                               "params" => $params
                             );

    $adminWebserviceURL = $sys['adminWebserviceURL'];
    // return $adminWebserviceURL;
    $request = $_SERVER['REQUEST_METHOD'];

            //set your curl data here
            //$params is having the from data.
    $msgpack = new msgpack();

    $msg = $msgpack->msgpack_pack($dataArray);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $adminWebserviceURL);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-msgpack','source: '.$source, 'source2: nuxpay', 'access-token: '.$_SESSION["access_token"],'business-id: '.$_SESSION["business"]["uuid"]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $msg);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60); //timeout in seconds
//        curl_setopt($ch, CURLOPT_TIMEOUT, 60); //timeout in seconds
    $result = curl_exec($ch);
    curl_close($ch);
    $msgReturn = $msgpack->msgpack_unpack($result);

            //Destroy session here
    if($msgReturn['code'] == 3) {
      session_destroy();
    }
    else
                $_SESSION["sessionTimeOut"] = time(); //Reset session

              if ($command != 'adminLogin')
                $msgReturn = json_encode($msgReturn);

              return $msgReturn;
            }

            public function parseUserAgent($userAgent)
            {
              $browserName = 'Unknown';
              $platform = 'Unknown';
              $version= "";
              
            //First get the platform?
              if (preg_match('/android/i', $userAgent)) {
                $platform = 'Android';
              }
              elseif (preg_match('/linux/i', $userAgent)) {
                $platform = 'Linux';
              }
              elseif (preg_match('/iphone|cpu iphone os/i', $userAgent)) {
                $platform = 'iPhone';
              }
              elseif (preg_match('/macintosh|mac os x/i', $userAgent)) {
                $platform = 'Mac';
              }
              elseif (preg_match('/windows|win32/i', $userAgent)) {
                $platform = 'Windows';
              }
              
              
            // Next get the name of the useragent yes seperately and for good reason
              if(preg_match('/MSIE/i',$userAgent) && !preg_match('/Opera/i',$userAgent))
              {
                $browserName = 'Internet Explorer';
                $ub = "MSIE";
              }
              elseif(preg_match('/Firefox/i', $userAgent))
              {
                $browserName = 'Mozilla Firefox';
                $ub = "Firefox";
              }
              elseif(preg_match('/Chrome/i', $userAgent))
              {
                $browserName = 'Google Chrome';
                $ub = "Chrome";
              }
              elseif(preg_match('/Safari/i', $userAgent))
              {
                $browserName = 'Apple Safari';
                $ub = "Safari";
              }
              elseif(preg_match('/Opera/i', $userAgent))
              {
                $browserName = 'Opera';
                $ub = "Opera";
              }
              elseif(preg_match('/Netscape/i', $userAgent))
              {
                $browserName = 'Netscape';
                $ub = "Netscape";
              }
              
            // finally get the correct version number
              $known = array('Version', $ub, 'other');
              $pattern = '#(?<browser>' . join('|', $known) .
              ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
              if (!preg_match_all($pattern, $userAgent, $matches)) {
                // we have no matching number just continue
              }
              
            // see how many we have
              $i = count($matches['browser']);
              if ($i != 1) {
                //we will have two since we are not using 'other' argument yet
                //see if version is before or after the name
                if (strripos($userAgent, "Version") < strripos($userAgent, $ub)){
                  $version = $matches['version'][0];
                }
                else {
                  $version = $matches['version'][1];
                }
              }
              else {
                $version = $matches['version'][0];
              }
              
            // check if we have a number
              if ($version==null || $version=="") {$version="?";}
              
              $data['browserName'] = $browserName;
              $data['browserVersion'] = $version;
              $data['platform'] = $platform;
              $data['pattern'] = $pattern;
              
              return $data;
            }

            function getRealUserIp(){
                switch(true){
                    case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
                    case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
                    case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
                    default : return $_SERVER['REMOTE_ADDR'];
                }
            }

            function get_ip_country($ip){
                $ip_info_country = $this->ip_info($ip, "country");

                return $ip_country ? $ip_country : '';
            }

            function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
                $output = NULL;
                if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
                    $ip = $_SERVER["REMOTE_ADDR"];
                    if ($deep_detect) {
                        if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                        if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                            $ip = $_SERVER['HTTP_CLIENT_IP'];
                    }
                }
            
                $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
                $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
                $continents = array(
                    "AF" => "Africa",
                    "AN" => "Antarctica",
                    "AS" => "Asia",
                    "EU" => "Europe",
                    "OC" => "Australia (Oceania)",
                    "NA" => "North America",
                    "SA" => "South America"
                );
            
                if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
                    $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
                    if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                        switch ($purpose) {
                            case "location":
                                $output = array(
                                    "city"           => @$ipdat->geoplugin_city,
                                    "state"          => @$ipdat->geoplugin_regionName,
                                    "country"        => @$ipdat->geoplugin_countryName,
                                    "country_code"   => @$ipdat->geoplugin_countryCode,
                                    "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                                    "continent_code" => @$ipdat->geoplugin_continentCode
                                );
                                break;
                            case "address":
                                $address = array($ipdat->geoplugin_countryName);
                                if (@strlen($ipdat->geoplugin_regionName) >= 1)
                                    $address[] = $ipdat->geoplugin_regionName;
                                if (@strlen($ipdat->geoplugin_city) >= 1)
                                    $address[] = $ipdat->geoplugin_city;
                                $output = implode(", ", array_reverse($address));
                                break;
                            case "city":
                                $output = @$ipdat->geoplugin_city;
                                break;
                            case "state":
                                $output = @$ipdat->geoplugin_regionName;
                                break;
                            case "region":
                                $output = @$ipdat->geoplugin_regionName;
                                break;
                            case "country":
                                $output = @$ipdat->geoplugin_countryName;
                                break;
                            case "countrycode":
                                $output = @$ipdat->geoplugin_countryCode;
                                break;
                        }
                    }
                }
                return $output;
            }

            function curl_post($command, $params = array(), $site="Member", $language="english", $source="GemDirectPay", $sourceVersion="", $userAgent="") {
          //   include(__DIR__.'/config.php');
          //   include(__DIR__.'/class.msgpack.php');

          //   if (!$userAgent) $userAgent = $_SERVER['HTTP_USER_AGENT'];

          //   if ($source == 'Web') {
          //     $parser = $this->parseUserAgent($userAgent);
          //     $sourceVersion = $parser['browserVersion'];
          //     $type = $parser['platform']." - ".$parser['browserName'];
          //   }
              
          // $params['userAgent']= $userAgent;
          // $params['ip']= $_SERVER['REMOTE_ADDR'];
          // $params['type']= $type;
          // $params['countryISO']= $_SERVER["HTTP_CF_IPCOUNTRY"];
          // $params = json_encode($params);

          // // return $params;

          // $webserviceURL = $sys['webserviceURL'].$command;
          // $request = $_SERVER['REQUEST_METHOD'];

          // $ch = curl_init();
          // curl_setopt($ch, CURLOPT_URL, $webserviceURL);
          // curl_setopt($ch, CURLOPT_POST, true);
          // curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Xun-Token: '.$_SESSION["access_token"]));
          // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          // curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
          // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          // $result = curl_exec($ch);
          // curl_close($ch);

          // return $result;

              include(dirname(__FILE__)."/../include/config.php");

              $source = $sys['source'];

              //RESELLER TABLE ID
              $rid = $sys['rid'];


              $filteredCommand = $this->post();

              $webserviceURL = $sys['webserviceURL'].$command;
    // if(!in_array($command, $filteredCommand)) $params["business_email"] = $_SESSION["business_email"];

              // $_SERVER['REMOTE_ADDR'] = isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"];
              $_SERVER['REMOTE_ADDR'] = $this->getRealUserIp();
              $user_ip = $this->getRealUserIp();
              $userAgent = $_SERVER['HTTP_USER_AGENT'];

              

              $params["access_token"] = $_SESSION["access_token"];
              $params["source"] = $source;

              $params = json_encode($params);
              
              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $webserviceURL);
              curl_setopt($ch, CURLOPT_POST, true);
              curl_setopt($ch, CURLOPT_HTTPHEADER, array('user-agent: '.$userAgent, 'user-ip: '.$user_ip, 'rid: '.$rid, 'source: '.$source, 'source2: nuxpay', 'access-token: '.$_SESSION["access_token"],'business-id: '.$_SESSION["business"]["uuid"]));
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
              curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, 'POST');
              $result = curl_exec($ch);

              curl_close($ch);

              $_SESSION["sessionLoginTime"] = time();

              return $result;
            }

            function curl_post_multipart($command, $params = array(), $source = "GemDirectPay") {
              include(dirname(__FILE__)."/../include/config.php");

              $filteredCommand = $this->post();

              $webserviceURL = $sys['webserviceURL'].$command;
              if(!in_array($command, $filteredCommand)) $params["business_email"] = $_SESSION["business_email"];

              $_SERVER['REMOTE_ADDR'] = isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"];

    // $boundary = 'TITO-' . md5(time());
    // $params = json_encode($params);

    // return $this->getBody($boundary, $params);

              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $webserviceURL);
              curl_setopt($ch, CURLOPT_POST, true);
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Xun-Token: '.$_SESSION["access_token"], 'Content-Type: multipart/form-data; boundary=' . $boundary));
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Xun-Token: '.$_SESSION["access_token"]));
              curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
              curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
              $result = curl_exec($ch);

              curl_close($ch);

              return $result;
            }


            function curl_post_pass($command, $params = array(), $source = "GemDirectPay") {
              include(dirname(__FILE__)."/../include/config.php");

              $filteredCommand = $this->post();

              $webserviceURL = $sys['webserviceURL'].$command;
    // if(!in_array($command, $filteredCommand)) $params["business_email"] = $_SESSION["business_email"];

              $_SERVER['REMOTE_ADDR'] = isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"];

              $params = json_encode($params);

              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $webserviceURL);
              curl_setopt($ch, CURLOPT_POST, true);
              curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Xun-Token: '.$_SESSION["access_token"], 'source: '.$source, 'source2: nuxpay'));
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
              curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, 'POST');
              $result = curl_exec($ch);

              curl_close($ch);

              return $result;
            }

            function curl_get($command, $params = array(), $source = "GemDirectPay") {
              include(dirname(__FILE__)."/../include/config.php");

              $filteredCommand = $this->post();

              $webserviceURL = $sys['webserviceURL'].$command;
    // if(!in_array($command, $filteredCommand)) $params["business_email"] = $_SESSION["business_email"];

              $_SERVER['REMOTE_ADDR'] = isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"];

              $webserviceURL .= "?".http_build_query($params);

              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $webserviceURL);
              curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Xun-Token: '.$_SESSION["access_token"], 'source: '.$source, 'source2: nuxpay'));
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
              $result = curl_exec($ch);

              curl_close($ch);

              return $result;
            }

            function getPart($name, $value, $boundary)
            {
              $eol = "\r\n";

              $part = '--'. $boundary . $eol;
              $part .= 'Content-Disposition: form-data; name="' . $name . '"' . $eol;
              $part .= 'Content-Length: ' . strlen($value) . $eol . $eol;
              $part .= $value . $eol;

              return $part;
            }


            function getBody($boundary, $params)
            {  
              $eol = "\r\n";
              $body = "";

              foreach($params as $key => $value) {
                $body .= $this->getPart($key, $value, $boundary);
              }

              $body .= '--'. $boundary . '--' . $eol;

              return $body;
            }
          }

          ?>
