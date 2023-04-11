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

            case "adminGetUserListing":

            $params = array("page" => $_POST['pageNumber'],
                "business_email" => $_POST['email'],
                "business_company_name" => $_POST['businessName'],
                "country" => $_POST['country'],
                "business_id" => $_POST['businessID'],
                "business_mobile" => $_POST['mobileNo'],
                "domain" => $_POST['domain']
            );
            $result = $post->curl($command, $params);

            echo $result;
            break;

            case "adminUserAddTeamMember":

            $params = array(
                "business_id" => $_POST['businessID'],
                "employee_name" => $_POST['employee_name'],
                "employee_mobile" => $_POST['employee_mobile']
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

            case "adminGetUserTeamMember":

            $params = array("business_id" =>  $_POST['businessID'],
                "employee_id" => $_POST ['employee_id'],
                "page" => $_POST['page'],
                "page_size" => $_POST['page_size'],
                "order" => $_POST['order']

            );
            $result = $post->curl($command, $params);

            $result = json_decode($result, true);

            foreach ($result['data']['data'] as $key => $data) {
                $data['date'] = date("d/m/Y H:i:s", strtotime($data['date'])-$_SESSION["timezone"]);
                $result['data']['data'][$key] = $data;
            }

            $result = json_encode($result);

            echo $result;
            break;

            case "adminUserEditTeamMember":

            $params = array("business_id" => $_POST['businessID'],
                "employee_id" => $_POST['employee_id'],
                "employee_name" => $_POST['employee_name']
            );

            $result = $post->curl($command, $params);

            echo $result;
            break;

            case "adminGetUserDetails":


            $params = array("business_id" => $_POST['businessID']
                // "X-Xun-Token" => $_SESSION['access_token'],
        );

            $result = $post->curl($command, $params);

            $result = json_decode($result, true);
                if($result['data']){
                    if ($result['data']['created_date']) {
                        $result['data']['created_date'] = date("d/m/Y H:i:s", strtotime($result['data']['created_date']) - $serverTimeZone - $_SESSION["timezone"]);
                    }
                    if ($result['data']['last_purchase']) {
                        $result['data']['last_purchase'] = date("d/m/Y H:i:s", strtotime($result['data']['last_purchase']) - $serverTimeZone - $_SESSION["timezone"]);
                    }
                    if($result['data']['last_login']){
                        $result['data']['last_login'] = date("d/m/Y H:i:s", strtotime($result['data']['last_login']) - $serverTimeZone - $_SESSION["timezone"]);
                    }
                }
            $result = json_encode($result);

            echo $result;
            break;


            case "adminEditUser":

            $params = array("mobile" => $_POST['mobile'],
                "referral_id"    => $_POST['referral_id'],
                "business_country" => $_POST['business_country'],
                "freeze"   => $_POST['freeze'],
                "description"   => $_POST['description'],
                "business_id" => $_POST['business_id'],
                "business_name" => $_POST['business_name']
                // "X-Xun-Token"   => $_SESSION["access_token"]
            );

            $result = $post->curl($command, $params);

            echo $result;
            break;


            case "adminGetUserUsageHistory":

            $params = array("business_id" => $_POST['businessID'],
                "from_datetime" => $_POST['from_datetime'],
                "to_datetime" => $_POST['to_datetime'],
                "page_size" => $_POST['pageSize'],
                "order" => $_POST['order'],
                "page" => $_POST['page']
            );
            $result = $post->curl($command, $params);

            $result = json_decode($result, true);

             foreach ($result['data']['data'] as $key => $data) {
                        $data['datetime'] = date("d/m/Y H:i:s", strtotime($data['datetime']) - $serverTimeZone - $_SESSION["timezone"]);
                        $result['data']['data'][$key] = $data;
                    }

             $result = json_encode($result);

            echo $result;

            break;

            case "adminGetUserFollow":

            $params = array("business_id" => $_POST['businessID'],
                "page" => $_POST['page'],
                "page_size" => $_POST['pageSize'],
                "order" => $_POST['order']
            );
            $result = $post->curl($command, $params);

            echo $result;
            break;

            case "adminUserAddCategory":

            $params = array(
                "business_id" => $_POST['business_id'],
                "employee_mobile" => $_POST['employee_mobile'],
                "tag" => $_POST['tag'],
                "tag_description" => $_POST['tag_description'],
                "callback_url" => $_POST['callback_url'],
                "working_hour_from" => $_POST['working_hour_from'],
                "working_hour_to" => $_POST['working_hour_to'],
                "priority" => $_POST['priority']
            );

            $result = $post->curl($command, $params);

            echo $result;
            break;

             case "adminUserEditCategory":

            $params = array(
                "business_id" => $_POST['businessID'],
                "employee_mobile" => $_POST['employee_mobile'],
                "tag" => $_POST['tag'],
                "tag_description" => $_POST['tag_description'],
                "callback_url" => $_POST['callback_url'],
                "working_hour_from" => $_POST['working_hour_from'],
                "working_hour_to" => $_POST['working_hour_to'],
                "priority" => $_POST['order']
            );

            $result = $post->curl($command, $params);

            echo $result;
            break;

            case "adminGetCategoryDetails":


            $params = array("business_id" => $_POST['businessID'],
                "tag" => $_POST['tag']
                // "X-Xun-Token" => $_SESSION['access_token'],
        );

            $result = $post->curl($command, $params);

            echo $result;
            break;




            case "adminGetUserConfirmedMember":


            $params = array("business_id" => $_POST['businessID']
                // "X-Xun-Token" => $_SESSION['access_token'],
        );

            $result = $post->curl($command, $params);

            echo $result;
            break;

            case "getXunCountryList":

                $params = array(
                    "pagination" => $_POST['pagination']
                );

                $result = $post->curl($command, $params);

                echo $result;

            break;

            case "adminGetUserCategory":

                $params = array("business_id" => $_POST['businessID'],
                                "page" => $_POST['page']

                );
                $result = $post->curl($command, $params);

                $result = json_decode($result, true);

                 foreach ($result['data']['data'] as $key => $data) {
                            $data['date'] = date("d/m/Y H:i:s", strtotime($data['date']) - $serverTimeZone - $_SESSION["timezone"]);
                            $result['data']['data'][$key] = $data;
                        }

                $result = json_encode($result);

                echo $result;
                break;


            case "adminGetInvoiceDetails":

                $params = array("billing_invoice" => $_POST['invoiceID']
                    // "X-Xun-Token" => $_SESSION['access_token'],
                );
                $result = $post->curl($command, $params);

                $result = json_decode($result, true);

                    foreach ($result['data'] as $key => $data) {
                        $data['billing_date'] = '123';
                        $result['data'][$key] = $data;
                    }

                $result = json_encode($result);

                echo $result;
                break;


            case "adminGetUserTopupHistory":

            $params = array("business_id" => $_POST['businessID'],
                "from_datetime" => $_POST['from_datetime'],
                "to_datetime" => $_POST['to_datetime'],
                "page_size" => $_POST['page_size'],
                "order" => $_POST['order'],
                "page" => $_POST['page']
            );
            $result = $post->curl($command, $params);

            $result = json_decode($result, true);

             foreach ($result['data']['data'] as $key => $data) {
                        $data['billing_date'] = date("d/m/Y H:i:s", strtotime($data['billing_date']) - $serverTimeZone - $_SESSION["timezone"]);
                        $result['data']['data'][$key] = $data;
                    }

             $result = json_encode($result);

            echo $result;

            break;


            case "adminGetTeamMemberDetails":

            $params = array("business_id" =>  $_POST['businessID'],
                "employee_id" => $_POST ['employeeID']
            );

            $result = $post->curl($command, $params);

            echo $result;
            break;

            case "adminDeleteAllUserCategory":

            $params = array("business_id" =>  $_POST['business_id']
            );

            $result = $post->curl($command, $params);

            echo $result;
            break;

            case "adminDeleteUserCategory":

            $params = array("business_id" =>  $_POST['business_id'],
                            "tag" => $_POST['tag']
            );

            $result = $post->curl($command, $params);

            echo $result;
            break;

            case "adminDeleteUserTeamMember":

            $params = array("business_id" =>  $_POST['business_id'],
                            "employee_id" => $_POST['employee_id']
            );

            $result = $post->curl($command, $params);

            echo $result;
            break;

            case "adminDeleteAllUserTeamMember":

            $params = array("business_id" =>  $_POST['business_id']
            );

            $result = $post->curl($command, $params);

            echo $result;
            break;

            case "adminLivechatSettingGet":

            $params = array("business_id" =>  $_POST['business_id']
            );

            $result = $post->curl($command, $params);

            echo $result;
            break;

            case "adminLivechatSettingAdd":

            $params = array(
                    'business_id' => $_POST['business_id'],
                    'websiteUrl' => $_POST["websiteUrl"],
                    'contactUsURL' => $_POST["contactUsURL"],
                    'liveChatNoAgentMsg' => $_POST["liveChatNoAgentMsg"],
                    'liveChatAfterWorkingHrsMsg' => $_POST["liveChatAfterWorkingHrsMsg"],
                    'liveChatFirstMsg' => $_POST["liveChatFirstMsg"],
                    'liveChatPromp' => $_POST["liveChatPromp"],
                    'liveChatInfo' => $_POST["liveChatInfo"]

                );

            $result = $post->curl($command, $params);

            echo $result;
            break;


            case "adminGetBusinessCommission":

            $params = array(
                    'page'                      =>      $_POST['page'],
                    'page_size'                 =>      $_POST['page_size'],
                    'order'                     =>      $_POST['order'],
                    'from_datetime'             =>      $_POST['from_datetime'],
                    'to_datetime'               =>      $_POST['to_datetime'],
                    'business_id'               =>      $_POST['businessID'],
                    'wallet_type'               =>      $_POST['wallet_type'],
                    'transaction_type'          =>      $_POST['transaction_type'],
                    'service_charge_type'       =>      $_POST['service_charge_type'],
                    'amount'                    =>      $_POST['amount'],
                    'status'                    =>      $_POST['status'],
                    'transaction_username'      =>      $_POST['transaction_username']
                );

            $result = $post->curl($command, $params);

            echo $result;
            break;

            
            case "adminNuxpayTotalCoinTransactionList":
            $params = array(
                "date_from"         => $_POST['date_from'],
                "date_to"           => $_POST['date_to']
            );
            $result = $post->curl($command, $params);
            echo $result;
            break;

            case "adminNuxpayTopTenTransactionList":
            $params = array(
                "date_from"         => $_POST['date_from'],
                "date_to"           => $_POST['date_to']
            );
            $result = $post->curl($command, $params);
            echo $result;
            break;
            
            
            case "adminNuxpayTopTenMerchantList":
            $params = array(
                "date_from"         => $_POST['date_from'],
                "date_to"           => $_POST['date_to']
            );
            $result = $post->curl($command, $params);
            echo $result;
            break;

            case "adminNuxpayTopMerchantServiceFee":
            $params = array(
                "date_from"         => $_POST['date_from'],
                "date_to"           => $_POST['date_to']
            );
            $result = $post->curl($command, $params);
            echo $result;
            break;

            case "resellerNuxpayTransactionHistoryList":
            $params = array(
                "page"         => $_POST['page'],
                "date_from"         => $_POST['date_from'],
                "date_to"           => $_POST['date_to'],
                "business_id"           => $_POST['business_id'],
                "tx_hash"           => $_POST['tx_hash'],
                "status"           => $_POST['status'],
                "business_name"           => $_POST['business_name'],
                "reseller" => $_POST['reseller'],
                "distributor" => $_POST['distributor'],
                "site" => $_POST['site'],
                "phone_no"           => $_POST['phone_no'],
                "address"           => $_POST['address'],
                "dest_address"           => $_POST['dest_address'],
                "sender_address"           => $_POST['sender_address'],
                "coin_type"           => $_POST['coin_type']
            );
            $result = $post->curl($command, $params);
            echo $result;
            break;

            case "adminNuxpayTransactionHistoryDetails":
            $params = array(
                "page"         => $_POST['page'],
                "transaction_hash"         => $_POST['transaction_hash']
            );
            $result = $post->curl($command, $params);
            echo $result;
            break;

            case "adminNuxpayMerchantList":
                $params = array(
                    "page"                  => $_POST['page'],
                    "page_size"             => $_POST['page_size'],
                    // "date_from"         => $_POST['date_from'],
                    // "date_to"           => $_POST['date_to'],
                    "business_id"           => $_POST['business_id'],
                    "business_name"         => $_POST['business_name'],
                    "phone_number"          => $_POST['phone_number'],
                    "business_site"         => $_POST['business_site'],
                    "email"                 => $_POST['email'],
                    "distributor_username"  => $_POST['distributor_username'],
                    "reseller_username"     => $_POST['reseller_username']
                );
            $result = $post->curl($command, $params);
            echo $result;
            break;

            case "adminNuxpayMerchantDetails":
                $params = array(
                    "business_id" => $_POST['business_id']
                );
            $result = $post->curl($command, $params);
            echo $result;
            break;

            case "resellerNuxpayMerchantList":
            $params = array(
                "page"         => $_POST['page'],
                "page_size" => $_POST['page_size'],
                "business_id"         => $_POST['business_id'],
                "business_name"         => $_POST['business_name'],
                "reseller" => $_POST['reseller'],
                "distributor" => $_POST['distributor']
            );
            $result = $post->curl($command, $params);
            echo $result;
            break;

            case "resellerNuxpayMerchantDetails":
            $params = array(
                "business_id" => $_POST['business_id']
            );
            $result = $post->curl($command, $params);
            echo $result;
            break;
            
            case "resellerNuxpayLatestTransactionList":
            $params = array(
                "limit" => $_POST['limit'],
				"tx_type" => $_POST['tx_type'],
            );
            $result = $post->curl($command, $params);
            echo $result;
            break;
                
            case "resellerNuxpayDashboardStatistics":
            $params = array(
                "date_from" => $_POST['date_from'],
                "date_to" => $_POST['date_to'],
            );
            $result = $post->curl($command, $params);
            echo $result;
            break;
            
			case "resellerNuxpayGetMinerFeeReport":
			$params = array(
                "date_from" => $_POST['date_from'],
                "date_to" => $_POST['date_to'],
				"type" => $_POST['report_type'],
				"business_id" => $_POST['business_id'],
            );
            $result = $post->curl($command, $params);
            echo $result;
            break;
				
			case "resellerNuxpayGetMinerFeeDetails":
			$params = array(
				"page"         => $_POST['page'],
                "page_size" => $_POST['page_size'],
                "date_from" => $_POST['date_from'],
                "date_to" => $_POST['date_to'],
				"type" => $_POST['report_type'],
				"business_id" => $_POST['business_id'],
            );
            $result = $post->curl($command, $params);
            echo $result;
            break;
				
			case "resellerGetFundOutListing":
				$params = array(
				"page"         => $_POST['page'],
                "date_from" => $_POST['date_from'],
                "date_to" => $_POST['date_to'],
				"business_id" => $_POST['business_id'],
                    "business_name" => $_POST['business_name'],
                    "tx_hash" => $_POST['tx_hash'],
                    "status" => $_POST['status'],
                    "recipient_address" => $_POST['recipient_address'],
                    "site" => $_POST['site'],
                    "distributor" => $_POST['distributor'],
                    "reseller" => $_POST['reseller'],
                    "currency" => $_POST['currency'],
            );
            $result = $post->curl($command, $params);
            echo $result;
            break;

            case "adminGetWalletType":
                $params = array(
                );

                $result = $post->curl($command, $params);
                
                echo $result;
                
            break;

            case "resellerFundOutDetails":
                $params = array(
                    "tx_hash"                => $_POST['tx_hash'],
                    
                );
                    
                $result = $post->curl($command, $params);
                    
                echo $result;
                break;
				
				
        }
    }
    ?>
