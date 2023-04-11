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

        case "getAdminWithdrawalList":

        $params = array("searchData"    => $_POST['inputData']
    );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "adminCancelWithdrawal":

        $params = array("withdrawalId"      => $_POST['withdrawalId'],
            "clientId"          => $_POST['clientId']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getAdminClientWithdrawalDetail":

        $params = array("withdrawalId"      => $_POST['withdrawalId']
    );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "approveWithdrawal":

        $params = array("withdrawalId"      => $_POST['withdrawalId'],
            "status"            => $_POST['status'],
            "charges"           => $_POST['charges'],
            "remark"            => $_POST['remark'],
            "adminId"           => $userId,
            "adminName"         => $username
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getActivityLogList":

        $params = array("pageNumber"   => $_POST['pageNumber'],
            "searchData"   => $_POST['inputData'],
            "memberId"     => $_POST['memberId']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getLanguageTranslationList":

        $params = array("pageNumber" => $_POST['pageNumber'],
            "searchData" => $_POST['searchData']
//search data inside will be below
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getLanguageTranslationData":

        $params = array("id"      => $_POST['id'] );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "editLanguageTranslationData":

        $params = array("id"          => $_POST['id'],
            "contentCode" => $_POST['contentCode'],
            "module"      => $_POST['module'],
            "language"    => $_POST['language'],
            "site"        => $_POST['site'],
            "category"    => $_POST['category'],
            "content"     => $_POST['content']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getMemberAccList":

        $params = array(
            "searchData" => $_POST['inputData'],
            "creditType" => $_POST['creditType'],
            "pageNumber" => $_POST['pageNumber']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getMemberDetailsListAdmin":

        $params = array("id"         => $_POST['id'],
            "creditType" => $_POST['creditType'],
            "pageNumber" => $_POST['pageNumber']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getMemberCreditsTransaction":

        $params = array(
            "clientID"   => $_POST['memberId'],
            "creditType" => $_POST['creditType'],
            "pageNumber" => $_POST['pageNumber']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getMemberBalanceAdmin":

        $params = array("id"         => $_POST['id'],
            "creditType" => $_POST['creditType']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "editAdjustmentDetailAdmin":

        $params = array("id"               => $_POST['id'],
            "creditType"       => $_POST['creditType'],
            "adjustmentType"   => $_POST['adjustmentType'],
            "adjustmentAmount" => $_POST['adjustmentAmount'],
            "remark"           => $_POST['remark']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "transferCreditAdmin":

        $params = array("creditType"       => $_POST['creditType'],
            "transferID"       => $_POST['id'],
            "receiverUsername" => $_POST['receiverUsername'],
            "transferAmount"   => $_POST['transferAmount'],
            "remark"           => $_POST['remark']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "transferCreditConfirmationAdmin":

        $params = array("creditType"       => $_POST['creditType'],
            "transferID"       => $_POST['id'],
            "receiverUsername" => $_POST['receiverUsername'],
            "transferAmount"   => $_POST['transferAmount'],
            "remark"           => $_POST['remark']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getWithdrawalDetailAdmin":

        $params = array("creditType"            => $_POST['creditType'],
            "clientId"              => $_POST['id']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "addNewWithdrawalAdmin":

        $params = array("clientId"              => $_POST['id'],
            "amount"                => $_POST['amount'],
            "countryID"             => $_POST['country'],
            "bankId"                => $_POST['bankId'],
            "accountNumber"         => $_POST['accountNumber'],
            "branch"                => $_POST['branch'],
            "creditType"            => $_POST['creditType']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getClientPortfolioList":

        $params = array("searchData"        => $_POST['searchData'],
            "pageNumber"        => $_POST['pageNumber'],
            "clientId"          => $_POST['clientId'],
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getMemberList":

        $params = array (
            "searchData" => $_POST['inputData'],
            "pageNumber" => $_POST['pageNumber']
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getMemberDetails":

        $params = array("memberId"          => $_POST['memberId']

    );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getRankMaintain":

        $params = array("clientId"          => $_POST['clientId']);

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "updateRankMaintain":

        $params = array("clientId"          => $_POST['clientId'],
            "bonusNameAndRank"  => $_POST['bonusNameAndRank']

        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getInvoiceList":

        $params = array("searchData"        => $_POST['searchData'],
            "offsetSecs"        => $_POST['offsetSecs'],
            "pageNumber"        => $_POST['pageNumber']

        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getPortfolioList":

        $params = array("searchData"        => $_POST['searchData'],
            "pageNumber"        => $_POST['pageNumber']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getInvoiceDetail":

        $params = array("invoiceId"         => $_POST['invoiceId']

    );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getPinList":

        $params = array("searchData"        => $_POST['searchData'],
            "offsetSecs"        => $_POST['offsetSecs'],
            "pageNumber"        => $_POST['pageNumber']

        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getPinDetail":

        $params = array("pinId"             => $_POST['pinId']

    );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "updatePinDetail":

        $params = array("pinId"             => $_POST['pinId'],
            "status"            => $_POST['status']

        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getPinPurchaseFormDetail":

        $params = array();

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "checkProductAndGetClientCreditType":

        $params = array("productIdList"     => $_POST['productIdList'],
            "clientId"          => $_POST['clientId']

        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "purchasePin":

        $params = array("products"          => $_POST['products'],
            "buyerId"           => $_POST['buyerId'],
            "wallets"           => $_POST['wallets'],
            "tPassword"         => $_POST['tPassword']

        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getProductDetail":

        $params = array("searchData"        => $_POST['searchData'],
            "offsetSecs"        => $_POST['offsetSecs'],
            "pageNumber"        => $_POST['pageNumber']

        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getExchangeRateList":

        $params = array("offsetSecs"        => $_POST['offsetSecs'],
            "pageNumber"        => $_POST['pageNumber']

        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "editExchangeRate":

        $params = array("exchangeRateId"    => $_POST['exchangeRateId'],
            "exchangeRate"      => $_POST['exchangeRate']

        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getUnitPriceList":

        $params = array("offsetSecs"        => $_POST['offsetSecs'],
            "pageNumber"        => $_POST['pageNumber']

        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "addUnitPrice":

        $params = array("unitPrice"         => $_POST['unitPrice'],
            "creatorId"         => $userId

        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getTicketList":

        $params = array("searchData"        => $_POST['searchData'],
            "offsetSecs"        => $_POST['offsetSecs'],
            "pageNumber"        => $_POST['pageNumber']

        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getTicketDetail":

        $params = array("searchData"        => $_POST['searchData'],
            "offsetSecs"        => $_POST['offsetSecs'],
            "pageNumber"        => $_POST['pageNumber'],
            "ticketId"          => $_POST['ticketId']

        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "replyTicket":

        $params = array("senderId"          => $_POST['senderId'],
            "ticketId"          => $_POST['ticketId'],
            "message"           => $_POST['message']

        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "updateTicketStatus":

        $params = array("status"            => $_POST['status'],
            "ticketId"          => $_POST['ticketId']

        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "changeMemberPassword":
        $params = array(
            "memberId"           => $_POST['memberId'],
            "passwordType"       => $_POST['passwordType'],
            "newPassword"        => $_POST['newPassword']
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getCustomerServiceMemberDetails":

        $params = array("clientID"  => $_POST['memberId']);

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getLanguageCodeList":

        $searchData = $_POST['searchData'];
        $searchData = json_encode($searchData);
        $params = array(
            "searchData" => $searchData,
            "pageNumber" => $_POST['pageNumber']
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getLanguageCodeData":

        $params = array(
            "id" => $_POST['languageCodeId']
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "editLanguageCodeData":

        $params = array(
            "id"            => $_POST['languageCodeId'],
            "contentCode"   => $_POST['contentCode'],
            "module"        => $_POST['module'],
            "language"      => $_POST['language'],
            "site"          => $_POST['site'],
            "category"      => $_POST['category'],
            "content"       => $_POST['content']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getMemberLoginDetail":

        $params = array(
            "memberId"          => $_POST['memberId'],
            "loginToMemberURL"  => $config['loginToMemberURL'],
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getWhoIsOnlineList":

        $params = array();

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getClientRightsList":

        $params = array(
            "clientId"          => $_POST['clientId']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "lockAccount":

        $params = array(
            "clientId"          => $_POST['clientId'],
            "blockedList"       => $_POST['blockedList']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "deleteRole":
        $deleteData = $_POST['deleteData'];
        $params = array("id" => $deleteData);
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "addRole":
        $params = array("roleName" => $_POST['roleName'],
            "description" => $_POST['description'],
            "status" => $_POST['status'],
            "site" => $_POST['site']
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getRoleDetails":
        $params = array("id" => $_POST['editId']
    );
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "editRole":
        $params = array("id" => $_POST['roleID'],
            "roleName" => $_POST['roleName'],
            "description" => $_POST['description'],
            "status" => $_POST['status']
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getPaymentMethodList":
        $params = array ("inputData" => $_POST['inputData'],
            "pageNumber" => $_POST['pageNumber']
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getPaymentMethodDetails":

        $params = array("id" => $_POST['id']);

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "editPaymentMethod":

        $params = array("id"       => $_POST['id'],
            "payment_type" => $_POST['payment_type'],
            "credit_type" => $_POST['credit_type'],
            "min_percentage"    => $_POST['min_percentage'],
            "max_percentage"   => $_POST['max_percentage'],
            "status"   => $_POST['status']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "deletePaymentMethod":
        $deleteData = $_POST['deleteData'];
        $params = array("id" => $deleteData);
        $result = $post->curl($command, $params);

        echo $result;
        break;


        case "getPaymentSettingDetails":
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "addPaymentMethod":

        $params = array("paymentType" => $_POST['paymentType'],
            "creditType" => $_POST['creditType'],
            "minPercentage"    => $_POST['minPercentage'],
            "maxPercentage" => $_POST['maxPercentage'],
            "status"   => $_POST['status']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "cancelSale":

        $params = array("referenceNumber" => $_POST['referenceNumber']
    );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "adminGetCommissionListing":

        $params = array("from_datetime"				=> $_POST['fromDateTime'],
            "to_datetime" 				=> $_POST['toDateTime'],
            "phone"    						=> $_POST['phone'],
            "coin_type" 					=> $_POST['coinType'],
            "status"   						=> $_POST['status'],
            "transaction_hash"   	=> $_POST['hash'],
            'page'      					=> $_POST['pageNumber'],
            'page_size' 					=> $_POST['pageSize']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "adminGetCommissionDetails":

        $params = array("id"   =>  $_POST['dataID']);

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "adminGetStoryListing":

        $params = array(
            "page"              => $_POST['page'],
            "page_size"         => $_POST['page_size'],
            "from_datetime"     => $_POST['from_datetime'],
            "to_datetime"       => $_POST['to_datetime'],
            "order"             => $_POST['order'],
            "id"                => $_POST['id'],
            "title"             => $_POST['title'],
            "description"       => $_POST['description'],
            "username"          => $_POST['username'],
            "category_type"     => $_POST['category_type'],
            "status"            => $_POST['status']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "cancelSale":

        $params = array("referenceNumber" => $_POST['referenceNumber']);

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "adminGetStoryDetails":

        $params = array("id"   =>  $_POST['dataID']);

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "adminMobileSubmitList":

        $params = array(
            "date_from"         => $_POST['date_from'],
            "date_to"           => $_POST['date_to'],
            "mobile"            => $_POST['mobile'],
            "domain"            => $_POST['domain'],
            "url"               => $_POST['url'],
            "country"           => $_POST['country'],
            "page"              => $_POST['page']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "adminCashpoolTopupList":

        $params = array(
            "page"              => $_POST['page'],
            "page_size"         => $_POST['page_size'],
            "date_from"         => $_POST['date_from'],
            "date_to"           => $_POST['date_to'],
            "business_id"       => $_POST['business_id'],
            "mobile"            => $_POST['mobile'],
            "business_name"     => $_POST['business_name'],
            "status"            => $_POST['status']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "adminApproveCashpoolTopup":

        $params = array(
            "id"              => $_POST['id'],
            "status"          => $_POST['status']
        );

        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "resellerMerchantListing":
        
        $params = array(
            "page"              => $_POST['page'],
            "page_size"         => $_POST['page_size'],
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "resellerListing":
        
        $params = array(
            "page"              => $_POST['page'],
            "page_size"         => $_POST['page_size'],
            "site"              => $_POST['site'],
            "reseller"          => $_POST['reseller'],
            "reseller_name"     => $_POST['reseller_name'],
            "reseller_email"    => $_POST['reseller_email'],
            "reseller_number"   => $_POST['reseller_number'],
            "distributor"       => $_POST['distributor'],

        );
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "distributorListing":
        
        $params = array(
            "page"              => $_POST['page'],
            "page_size"         => $_POST['page_size'],
            "username"          => $_POST['username'],
            "name"              => $_POST['name'],
            "email"             => $_POST['email'],
            "mobile"            => $_POST['mobile'],
            "site"              => $_POST['site']
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;


        case "resellerCreateReseller":
        $params = array(
            "username"          => $_POST['username'],
            "nickname"          => $_POST['nickname'],
            "email"             => $_POST['email'],
            "password"          => $_POST['password'],
            "confirm_password"  => $_POST['confirm_password'],
            "distributor"       => $_POST['distributor']
        ); 
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "resellerCreateDistributor":
        $params = array(
            "username"          => $_POST['username'],
            "nickname"          => $_POST['nickname'],
            "email"             => $_POST['email'],
            "password"          => $_POST['password'],
            "confirm_password"  => $_POST['confirm_password']
        ); 
        $result = $post->curl($command, $params);

        echo $result;
        break;

        // NO LONGER NEEDED FOR RESELLER            
        case "adminRolesListing":
        $params = array(
            
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;
            
        case "resellerCreateMerchant":
        $params = array(
            "username"          => $_POST['username'],
            "nickname"          => $_POST['nickname'],
            "email"             => $_POST['email'],
            "password"          => $_POST['password'],
            "confirm_password"  => $_POST['confirm_password'],
            // "role_id"           => $_POST['role_id'],
            "status"            => $_POST['status'],
            "reseller"          => $_POST['reseller']
        ); 
        $result = $post->curl($command, $params);

        echo $result;
        break;
            
        case "adminPermissionListing":
        $params = array(
            
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;
            
        case "adminCreateRoles":
        $params = array(
            "name"              => $_POST['name'],
            "description"       => $_POST['description'],
            "status"            => $_POST['status'],
            "role_access"       => $_POST['role_access'],
        );
            
        $result = $post->curl($command, $params);

        echo $result;
        break;
        
        case "resellerGetMerchantDetails":
        $params = array(
            "id"                => $_POST['id'],
        );
            
        $result = $post->curl($command, $params);
            
        echo $result;
        break;
            
        case "resellerEditMerchantDetails":
        $params = array(
            "id"                => $_POST['id'],
            "username"          => $_POST['username'],
            "nickname"          => $_POST['nickname'],
            // "role_id"           => $_POST['role_id'],
            //"email"             => $_POST['email'],
            "status"            => $_POST['status'],
            "reseller"          => $_POST['reseller']
            
            // command: 'resellerEditResellerDetails',
            // id : id,
            // username: username,
            // nickname: nickname,                
            // email: email,
            // status: status,
        );
            
        $result = $post->curl($command, $params);
            
        echo $result;
        break;
            
        case "adminWithdrawalAddress":
        $params = array(
            "business_id" => $_POST['business_id'],
        );

        $result = $post->curl($command, $params);
        
        echo $result;
        break;

        case "adminDisplayMerchantCallbackUrl":
        $params = array(
            "business_id" => $_POST['business_id'],
        );

        $result = $post->curl($command, $params);
    
        echo $result;
        break;

        case "adminGetApikeyDetails":
        $params = array(
            "page"              => $_POST['page'],
            "page_size"         => $_POST['page_size'],
            "business_id" => $_POST['business_id']
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "adminChangeMerchantPassword":
        $params = array(
            "business_id" => $_POST['business_id'],
            "new_password" => $_POST['new_password']
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "resellerGetDetails":
        $params = array(
            "id"                => $_POST['id'],
        );
            
        $result = $post->curl($command, $params);
            
        echo $result;
        break;
            
        case "distributorGetDetails":
        $params = array(
            "id"                => $_POST['id'],
        );
            
        $result = $post->curl($command, $params);
            
        echo $result;
        break;

        case "resellerEditDetails":
        $params = array(
            "id"                => $_POST['id'],
            "username"          => $_POST['username'],
            "nickname"          => $_POST['nickname'],
            "email"             => $_POST['email'],
            "distributor_username" => $_POST['distributor_username'],
            "disabled"          => $_POST['disabled']
        );
            
        $result = $post->curl($command, $params);
            
        echo $result;
        break;

        case "distributorEditDetails":
        $params = array(
            "id"                => $_POST['id'],
            "username"          => $_POST['username'],
            "nickname"          => $_POST['nickname'],
            "email"             => $_POST['email']
        );
            
        $result = $post->curl($command, $params);
            
        echo $result;
        break;

        case "loadResellerOptions":
        $params = array(
            "id"                => $_POST['id'],
            "distributor"       => $_POST['distributor']
        );
                
        $result = $post->curl($command, $params);
                
        echo $result;
        break;
		
		case "adminNuxpayMerchantDetails":
		$params = array(
			"business_id" => $_POST['businessID'],
		);
			
		$result = $post->curl($command, $params);
			
		echo $result;
		break;
			
		case "adminChangeMerchantDetails":
		$params = array(
			"business_id" => $_POST['business_id'],
			"new_distributor" => $_POST['new_distributor'], 
			"new_reseller" => $_POST['new_reseller'],
			"new_merchant_name" => $_POST['new_merchant_name'],
			"new_email" => $_POST['new_email'],
			"new_mobile_number" => $_POST['new_mobile_number'],
			"new_address1" => $_POST['new_address1'],
			"new_address2" => $_POST['new_address2'],
			"new_city" => $_POST['new_city'],
			"new_state"	=> $_POST['new_state'],
			"new_postal" => $_POST['new_postal'],
			"new_country" => $_POST['new_country'],
            "new_company_size" => $_POST['new_company_size'],
            "new_website"   => $_POST['new_website'],
		);
			
		$result = $post->curl($command, $params);
			
		echo $result;
		break;

        case "resellerGetWithdrawalHistory":
            $params = array(
                "page"                  => $_POST['page'],
                "page_size"             => $_POST['page_size'],
                "date_from"         => strtotime($_POST['datetime_from']),
                "date_to"           => strtotime($_POST['datetime_to']),
                "datetime_from"     => $_POST['datetime_from'],
                "datetime_to"       => $_POST['datetime_to'],
                "business_id"           => $_POST['business_id'],
                "business_name"         => $_POST['business_name'],
                "tx_hash"               => $_POST['tx_hash'],
                "recipient_address"     => $_POST['recipient_address'],
                "status"                => $_POST['status'],
                "reseller"              => $_POST['reseller'],
                "distributor"           => $_POST['distributor'],
                "site"                  => $_POST['site'],
                "currency"              => $_POST['currency'],
            );
                
            $result = $post->curl($command, $params);
                
            echo $result;
        break;

        case "resellerWithdrawalHistoryDetails":
            $params = array(
                "tx_hash"                => $_POST['tx_hash'],
                
            );
                
            $result = $post->curl($command, $params);
                
            echo $result;
        break;
			
		case "resellerApplicationListing":
		$params = array(
			"reseller" => $_POST['reseller'],
            "reseller_name" => $_POST['reseller_name'],
            "reseller_email" => $_POST['reseller_email'],
            "reseller_number" => $_POST['reseller_number'],
            "site" => $_POST['site'],
            "distributor" => $_POST['distributorUsername'],
		);
			
		$result = $post->curl($command, $params);
			
		echo $result;
		break;
		
		case "adminResellerApprove":
		$params = array(
//			"reseller_username" => $_POST['reseller_username'],
			"reseller_email" => $_POST['reseller_email'],
			"source" => $_POST['source'],
			
		);
		$result = $post->curl($command, $params);
			
		echo $result;
        break;
        
        case "createCampaign":
        $params = array(
            "campaign_name"          => $_POST['campaign_name'],
            "long_url"          => $_POST['long_url']
        ); 
        $result = $post->curl($command, $params);

        echo $result;
        break;   

        case "campaignListing":
        $params = array(
            "campaign_name"          => $_POST['campaign_name'],
            "long_url"          => $_POST['long_url']
        ); 
        $result = $post->curl($command, $params);

        echo $result;
        break;
        
        case "campaignListingDetails": 
        $params = array(
            "campaign_id"          => $_POST['campaign_id']
        ); 
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "createShortUrl":
        $params = array(
            "url_reference_name"    => $_POST['url_reference_name'],
            "source"            => $_POST['source'],
            "campaign_id"       => $_POST['campaign_id']

        ); 
        $result = $post->curl($command, $params);

        echo $result;
        break;   

        case "campaignGetShortUrlDetails":
        $params = array(
            "short_url"       => $_POST['short_url'],
            "date_from"             => $_POST['date_from'],
            "date_to"               => $_POST['date_to'],
            "page"                  => $_POST['page'],
            "page_size"             => $_POST['page_size']

        ); 
        $result = $post->curl($command, $params);

        echo $result;
        break;    

        case "getTopDistributors":
        $params = array(
            "dateFrom"             => strtotime($_POST['dateFrom']),
            "dateTo"               => strtotime($_POST['dateTo'])

        ); 
        $result = $post->curl($command, $params);

        echo $result;
        break;  

        case "getTopResellers":
        $params = array(
            "dateFrom"             => strtotime($_POST['dateFrom']),
            "dateTo"               => strtotime($_POST['dateTo'])

        ); 
        $result = $post->curl($command, $params);

        echo $result;
        break;
        
        case "getCommissionBalance":
        $params = array(
            
        ); 
        $result = $post->curl($command, $params);

        echo $result;
        break;
        
        case "getCommissionTransactionHistory":
        $params = array(
            "user_id"                 => $_SESSION['userID'],
            "wallet_type"             => $_POST['wallet_type'],
            "page"                  => $_POST['page'],
            "page_size"             => $_POST['page_size']
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;
        
        case "requestCommissionWithdrawalOTP":
        $params = array(
            
        ); 
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "resellerWithdrawal":
        $params = array(
            "destination_address"       => $_POST['destination_address'],
            "wallet_type"               => $_POST['wallet_type'],
            "amount"                    => $_POST['amount'],
            "otp_code"                  => $_POST['otp_code']

        ); 
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "getCommissionWithdrawalHistory":
        $params = array(
            "wallet_type"             => $_POST['wallet_type'],
            "page"                  => $_POST['page'],
            "page_size"             => $_POST['page_size']
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;
            
        case "resellerLandingPagePresignURL":
        $params = array(
            "file_name"             => $_POST['file_name'],
            "content_type"                  => $_POST['content_type'],
            "content_size"             => $_POST['content_size']
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "resellerGetCreateLandingPageDetails":
        $params = array(
            
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;
        
        case "resellerCreateLandingPage":
        $params = array(
            "name"             => $_POST['name'],
            "short_code"       => $_POST['short_code'],
            "title"            => $_POST['title'],
            "subtitle"         => $_POST['subtitle'],
            "description"      => $_POST['description'],
            "image_url"        => $_POST['image_url'],
            "mobile"           => $_POST['mobile'],
            "email"            => $_POST['email'],
            "whatsapp"         => $_POST['whatsapp'],
            "instagram"        => $_POST['instagram'],
            "telegram"         => $_POST['telegram']

        );
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "resellerEditLandingPage":
        $params = array(
            "landing_page_id"       => $_POST['landing_page_id'],
            "page_name"             => $_POST['name'],
            "short_code"       => $_POST['short_code'],
            "page_title"            => $_POST['title'],
            "page_subtitle"         => $_POST['subtitle'],
            "page_description"      => $_POST['description'],
            "page_image_url"        => $_POST['image_url'],
            "mobile"           => $_POST['mobile'],
            "email"            => $_POST['email'],
            "whatsapp"         => $_POST['whatsapp'],
            "instagram"        => $_POST['instagram'],
            "telegram"         => $_POST['telegram']
        );
        $result = $post->curl($command, $params);

        echo $result;
        break;
			
		case "resellerGetCreateCampaignDetails":
        $params = array();
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "resellerVerifyLandingPageURL":
        $params = array(
            "short_code"             => $_POST['short_code']

        );
        $result = $post->curl($command, $params);

        echo $result;
        break;

        case "resellerGetLandingPageListing":
            $params = array(
                'page' => $_POST['page'],
            );
            $result = $post->curl($command, $params);
    
            echo $result;
            break;
        
    }
}
?>
