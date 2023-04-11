<?php
    /**
     * @author TtwoWeb Sdn Bhd.
     * This file is contains the functions related to Admin user.
     * Date  21/07/2017.
    **/
	session_start();

    include($_SERVER["DOCUMENT_ROOT"]."/include/config.php");
	include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
    
    $post = new post();

	$command = $_POST['command'];

    $username   = $_SESSION['username'];
    $userId     = $_SESSION['userID'];
    $sessionID  = $_SESSION['sessionID'];

    if($_POST['type'] == 'logout') {
        session_destroy();
    }
    else{
        switch($command) {
            case "getMemberList":
                
                $params = array (
                                    "searchData" => $_POST['inputData'],
                                    "pageNumber" => $_POST['pageNumber']
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getCountriesList":
                $params = array("pagination" => $_POST['pagination']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getMemberDetails":
                $params = array("memberId" => $_POST['memberId']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "editMemberDetails":
                $params = array(
                                    "memberId"  => $_POST['memberId'],
                                    "fullName"  => $_POST['fullName'],
                                    "email"     => $_POST['email'],
                                    "phone"     => $_POST['phone'],
                                    "address"   => $_POST['address'],
                                    "country"   => $_POST['country'],
                                    "disabled"  => $_POST['disabled'],
                                    "suspended" => $_POST['suspended'],
                                    "freezed"   => $_POST['freezed']
                                );
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "getViewMemberDetails":
                $params = array("memberId" => $_POST['memberId']);
                $result = $post->curl($command, $params);
                
                echo $result;
                break;

            case "memberRegistrationAdmin":
                
                $params = array("registerType"      => $_POST['type'],
                                "fullName"          => $_POST['fullName'],
                                "username"          => $_POST['username'],
                                "address"           => $_POST['address'],
                                "country"           => $_POST['country'],
                                "state"             => $_POST['state'],
                                "county"            => $_POST['county'],
                                "city"              => $_POST['city'],
                                "dialingArea"       => $_POST['dialingArea'],
                                "phone"             => $_POST['phone'],
                                "email"             => $_POST['email'],
                                "password"          => $_POST['password'],
                                "checkPassword"     => $_POST['retypePassword'],
                                "tPassword"         => $_POST['transactionPassword'],
                                "checkTPassword"    => $_POST['retypeTPassword'],
                                "sponsorName"       => $_POST['sponsorUsername'],
                                "placementUsername" => $_POST['placementUsername'],
                                "placementPosition" => $_POST['placementPosition'],
                                "codeNum"           => $_POST['codeNum']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "memberRegistrationConfirmationAdmin":
                
                $params = array("registerType"      => $_POST['type'],
                                "creditData"        => $_POST['creditData'],
                                "fullName"          => $_POST['fullName'],
                                "username"          => $_POST['username'],
                                "address"           => $_POST['address'],
                                "country"           => $_POST['country'],
                                "state"             => $_POST['state'],
                                "county"            => $_POST['county'],
                                "city"              => $_POST['city'],
                                "phone"             => $_POST['phone'],
                                "email"             => $_POST['email'],
                                "password"          => $_POST['password'],
                                "tPassword"         => $_POST['transactionPassword'],
                                "sponsorName"       => $_POST['sponsorUsername'],
                                "placementUsername" => $_POST['placementUsername'],
                                "placementPosition" => $_POST['placementPosition'],
                                "codeNum"           => $_POST['codeNum']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getRegistrationDetailAdmin":
                
                $params = array();

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getRegistrationPackageDetailAdmin":
                
                $params = array("codeNum"         => $_POST['codeNum'],
                                "type"            => $_POST['type'],
                                "status"          => $_POST['status'],
                                "sponsorUsername" => $_POST['sponsorUsername']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getRegistrationPaymentDetailAdmin":
                
                $params = array("sponsorUsername" => $_POST['sponsorUsername'],
                                "codeNum"         => $_POST['codeNum']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "verifyPaymentAdmin":
                
                $params = array("clientId"   => $_POST['sponsorID'],    
                                "packageId"  => $_POST['packageId'],
                                "creditData" => $_POST['creditData']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getCreditTransactionList":
                
                $params = array("searchData" => $_POST['inputData'],
                                "creditType" => $_POST['type'],
                                "pageNumber" => $_POST['pageNumber']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;
            case "getBankAccountListAdmin":
                
                $params = array("searchData" => $_POST['inputData'],
                                "pageNumber" => $_POST['pageNumber']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "updateBankAccStatusAdmin":

                $params = array(
                    'checkedIDs' => $_POST['checkedIDs'],
                    'status'     => $_POST['status']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "reentryPin":

                $params = array("receiverId"        => $_POST['receiverId'],
                                "pinNumber"         => $_POST['pinNumber']

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getRepurchasePackagePaymentDetailAdmin":

                $params = array("packageID"         => $_POST['packageId'],
                                "clientID"          => $_POST['clientId']

                );
                
                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "reentryPackageAdmin":

                $params = array("clientID"          => $_POST['clientId'],
                                "packageID"         => $_POST['packageId'],
                                "creditData"        => $_POST['creditData'],
                                "creatorId"         => $userId

                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getClientRepurchasePinDetail":

                $params = array("clientId" => $_POST['clientId']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getClientRepurchasePackageDetailAdmin":

                $params = array("clientID"  => $_POST['clientId']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

            case "getRepurchasePackageSuccessDetailAdmin":

                $params = array("clientID"  => $_POST['clientId'],
                                "packageID" => $_POST['packageId']
                );

                $result = $post->curl($command, $params);

                echo $result;
                break;

        }
    }
?>
