<?php include 'include/config.php'; ?>

<?php
session_start();

if((isset($_POST['access_token']) && $_POST['access_token'] != "")) {
  $_SESSION["access_token"] = $_POST['access_token'];
  $_SESSION["business"]["uuid"] = $_POST['businessID'];
  $_SESSION["sessionLoginTime"] = $_POST['sessionLoginTime'];
}
?>

<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >

    
        <div class="m-grid m-grid--hor m-grid--root m-page">

            <?php include 'headerDashboard.php'; ?>


            <div class="m-grid__item m-grid__item--fluid m-wrapper">

                <div class="m-content marginTopHeader">
                    <div style="padding-left:15px">
                        <h4>Upgrade</h4>
                    </div>
                    <div class="row col-12" style="padding-top:10px">
                        <div class="col-10">
                        <p>Upgrade to <?php echo $sys['companyName']?> premium account to enable API integration.</p>

                        </div>
                        <!-- UNCOMMENT, TO TRY TEST THE FADE MODAL  
                        <button id="depositBtn1" type="button" class="btn primaryBtn">Deposit</button> -->
                        

                    </div>
                    <div>

                    </div>
                    <!-- <div class="panel-body">
                        <div class="col-sm-12 dashboardNewsBox px-0">
                            <div class="col-sm-3 px-0">
                                <div id="blogDIV">
                                    <div class="row" style="padding-bottom:10px;border-bottom:1px solid #ebeff2;">
                                        <div class="col-4">
                                        
                                        </div>
                                        <div class="col-4">
                                        Basic Account
                                        </div>
                                        <div class="col-4">
                                        Premium Account
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="mt-4 col-12">
                        <div class="m-portlet">
                            <div class="m-portlet__body" style="padding-top: 0px; padding-bottom:0px;">
                                <div class="row m-form">
                                        <div class="col-12 dashboardNewsBox" id="">
                                        <div class="row">
                                            <div class="col-4" style="padding-right:0px">

                                                    <div class="row lefty col-12" style="color:white;">
                                                    .
                                                    </div>
                                                    <div class="row lefty col-12" style="">
                                                    <span style="font-weight:bold">Account Setup Fee</span>
                                                    </div>
                                                    <div class="row  col-12" style="border-bottom:1px solid #ebeff2;padding:15px;">
                                                    <span style="font-weight:bold">Request Fund</span>
                                                    </div>
                                                    <div class="row lefty col-12" style="">
                                                    <span>No. of Transactions</span>
                                                    </div>
                                                    <div class="row lefty col-12" style="">
                                                    <span>Processing Fee / Transactions</span>
                                                    </div>
                                                    <div class="row  col-12" style="border-bottom:1px solid #ebeff2;padding:15px;">
                                                    <span style="font-weight:bold">API Integration</span>
                                                    </div>
                                                    <div class="row lefty col-12" style="">
                                                    <span>No. of Transactions</span>
                                                    </div>
                                                    <div class="row lefty col-12" style="">
                                                    <span>Wallet Address Generation</span>
                                                    </div>
                                                    <div class="row lefty col-12" style="">
                                                    <span>Processing Fee / Transactions</span>
                                                    </div>
                                                    <div class="row lefty col-12" style="">
                                                    <span>No. of API Keys</span>
                                                    </div>
                                                    <div class="row lefty col-12" style="">
                                                    <span style="font-weight:bold">Real Time Reporting</span>
                                                    </div>
                                                    <div class="row lefty col-12" style="">
                                                    <span style="font-weight:bold">Instant Withdrawal</span>
                                                    </div>
                                                    <div class="row col-12" style="color:white;border-right:1px solid #ebeff2;padding:15px;">
                                                    .
                                                    </div>
                                            </div>
                                            <div class="col-4" style="padding-right:0px;padding-left:0px">
                                                    <div class="row mid col-12" style="">
                                                    <span style="font-weight:bold">Basic Account</span>
                                                    </div>
                                                    <div class="row mid col-12" style="">
                                                    <span>No Charges</span>
                                                    </div>
                                                    <div class="row col-12" style="color:white;border-bottom:1px solid #ebeff2;padding:15px;">
                                                    <span>.</span>
                                                    </div>
                                                    <div class="row mid col-12" style="">
                                                    <span>Unlimited<span>
                                                    </div>
                                                    <div class="row mid col-12" style="">
                                                    <span>No Charges<span>
                                                    </div>
                                                    <div class="row col-12" style="color:white;border-bottom:1px solid #ebeff2;padding:15px;">
                                                    <span>.</span>
                                                    </div>
                                                    <div class="row mid col-12" style="text-align:center;">
                                                    <span style="color:red;">X<span>
                                                    </div>
                                                    <div class="row mid col-12" style="text-align:center;">
                                                    <span style="color:red;">X<span>
                                                    </div>
                                                    <div class="row mid col-12" style="text-align:center;">
                                                    <span style="color:red;">X<span>
                                                    </div>
                                                    <div class="row mid col-12" style="text-align:center;">
                                                    <span style="color:red;">X<span>
                                                    </div>
                                                    <div class="row mid col-12" style="">
                                                    <span>Yes<span>
                                                    </div>
                                                    <div class="row mid col-12" style="text-align:center;">
                                                    <span style="color:red;">X<span>
                                                    </div>
                                                    <div class="row col-12" style="color:white;border-right:1px solid #ebeff2;padding:15px;">
                                                    <span>.</span>
                                                    </div>
                                            </div>
                                            <div class="col-4" style="padding-left:0px">
                                                    <div class="row righty col-12" style="">
                                                    <span style="font-weight:bold">Premium Account</span>
                                                    </div>
                                                    <div class="row righty col-12" style="">
                                                    No Charges
                                                    </div>
                                                    <div class="row righty col-12" style="color:white;">
                                                    .
                                                    </div>
                                                    <div class="row righty col-12" style="">
                                                    <span>Unlimited<span>
                                                    </div>
                                                    <div class="row righty col-12" style="">
                                                    No Charges
                                                    </div>
                                                    <div class="row righty col-12" style="color:white;">
                                                    <span>.</span>
                                                    </div>
                                                    <div class="row righty col-12" style="">
                                                    <span>Unlimited<span>
                                                    </div>
                                                    <div class="row righty col-12" style="">
                                                    <span>Unlimited<span>
                                                    </div>
                                                    <div class="row righty col-12" style="">
                                                    <span>0.2 USD or 0.5% whichever higher<span>
                                                    </div>
                                                    <div class="row righty col-12" style="">
                                                    <span>Unlimited<span>
                                                    </div>
                                                    <div class="row righty col-12" style="">
                                                    <span>Yes<span>
                                                    </div>
                                                    <div class="row righty col-12" style="">
                                                    <span>Yes<span>
                                                    </div>
                                                    <div class="row col-12" style="padding: 5px">
                                                    
                                                        <button class="btn searchBtn col-xs-12" id="upgradeBtn">Upgrade Now</button>
                                                    
                                                    </div>
                                            </div>
                                        </div>    
                                        </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="mt-4 col-12 " style="">
                        <div class="m-portlet container_">
                            <div class="m-portlet__body " style="padding-top: 0px; padding-bottom:0px;">
                                <div class="row m-form ">
                                    <div class="col-12 dashboardNewsBox " style="padding-bottom:0px" id="">
                                        <div class="row col-12">
                                            <div class="lefty col-5" style="color:white;">
                                                .
                                            </div>
                                            <div class="mid col-4" style="">
                                                <span style="font-weight:bold">Basic Account</span>
                                            </div>
                                            <div class="righty col-3" style="">
                                                <span style="font-weight:bold">Premium Account</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 dashboardNewsBox dashboardNew2" style="" id="">
                                        <div class="row col-12">
                                            <div class="lefty col-5" style="">
                                                <span style="font-weight:bold">Account Setup Fee</span>
                                            </div>
                                            <div class="mid col-4" style="">
                                                <span>No Charges</span>
                                            </div>
                                            <div class="righty col-3" style="">
                                                No Charges
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 dashboardNewsBox dashboardNew2" style="" id="">
                                        <div class="row col-12">
                                            <div class="lefty col-5" style="border-right:0px solid #ebeff2;">
                                                <span style="font-weight:bold">Request Fund</span>
                                            </div>
                                            <div class="mid col-4" style="border-right:0px solid #ebeff2;color:white;">
                                                .
                                            </div>
                                            <div class="righty col-3" style="border-right:0px solid #ebeff2;color:white;">
                                                .
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 dashboardNewsBox dashboardNew2" style="" id="">
                                        <div class="row col-12">
                                            <div class="lefty col-5" style="">
                                                <span style="">No. of Transaction</span>
                                            </div>
                                            <div class="mid col-4" style="">
                                                <span>Unlimited</span>
                                            </div>
                                            <div class="righty col-3" style="">
                                                Unlimited
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 dashboardNewsBox dashboardNew2" style="" id="">
                                        <div class="row col-12">
                                            <div class="lefty col-5" style="">
                                                <span style="">Processing Fee / Transaction</span>
                                            </div>
                                            <div class="mid col-4" style="">
                                                <span>No Charges</span>
                                            </div>
                                            <div class="righty col-3" style="">
                                                No Charges
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 dashboardNewsBox dashboardNew2" style="" id="">
                                        <div class="row col-12">
                                            <div class="lefty col-5" style="border-right:0px solid #ebeff2;">
                                                <span style="font-weight:bold">API Integration</span>
                                            </div>
                                            <div class="mid col-4" style="border-right:0px solid #ebeff2;color:white;">
                                                .
                                            </div>
                                            <div class="righty col-3" style="border-right:0px solid #ebeff2;color:white;">
                                                .
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 dashboardNewsBox dashboardNew2" style="" id="">
                                        <div class="row col-12">
                                            <div class="lefty col-5" style="">
                                                <span style="">No. of Transaction</span>
                                            </div>
                                            <div class="mid col-4" style="">
                                                <span style="color:red">X</span>
                                            </div>
                                            <div class="righty col-3" style="">
                                                Unlimited
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 dashboardNewsBox dashboardNew2" style="" id="">
                                        <div class="row col-12">
                                            <div class="lefty col-5" style="">
                                                <span style="">Wallet Address Generation</span>
                                            </div>
                                            <div class="mid col-4" style="">
                                                <span style="color:red">X</span>
                                            </div>
                                            <div class="righty col-3" style="">
                                                Unlimited
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 dashboardNewsBox dashboardNew2" style="" id="">
                                        <div class="row col-12">
                                            <div class="lefty col-5" style="">
                                                <span style="">Wallet Address Generation</span>
                                            </div>
                                            <div class="mid col-4" style="">
                                                <span style="color:red">X</span>
                                            </div>
                                            <div class="righty col-3" style="">
                                                0.2 USD or 0.5% whichever is higher
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 dashboardNewsBox dashboardNew2" style="" id="">
                                        <div class="row col-12">
                                            <div class="lefty col-5" style="">
                                                <span style="">No. of API Keys</span>
                                            </div>
                                            <div class="mid col-4" style="">
                                                <span style="color:red">X</span>
                                            </div>
                                            <div class="righty col-3" style="">
                                                Unlimited
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 dashboardNewsBox dashboardNew2" style="" id="">
                                        <div class="row col-12">
                                            <div class="lefty col-5" style="">
                                                <span style="font-weight:bold">Real Time Reporting</span>
                                            </div>
                                            <div class="mid col-4" style="">
                                                <span>Yes</span>
                                            </div>
                                            <div class="righty col-3" style="">
                                                Yes
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 dashboardNewsBox dashboardNew2" style="" id="">
                                        <div class="row col-12">
                                            <div class="lefty col-5" style="">
                                                <span style="font-weight:bold">Instant Withdrawal</span>
                                            </div>
                                            <div class="mid col-4" style="">
                                                <span style="color:red">X</span>
                                            </div>
                                            <div class="righty col-3" style="">
                                                Yes
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 dashboardNewsBox" style="margin-top:0px;padding-top:0px;" id="">
                                        <div class="row col-12">
                                            <div class="col-5" style="padding:15px;border-right:1px solid #ebeff2;color:white">
                                                <span style="font-weight:bold">.</span>
                                            </div>
                                            <div class="col-4" style="padding:15px;border-right:1px solid #ebeff2;">
                                                <span style="color:white">.</span>
                                            </div>
                                            <div class="col-3" style="padding:0px 0px">
                                                    
                                                <button class="btn searchBtn" style="width:100%;min-width:60px" id="upgradeBtn">Upgrade</button>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-12">
                        <div class="doc-title-margin-top1">
                            <div class="table-responsive table-responsive-no-border" style="padding:25px 25px;background-color: #fff">
                                <table class="table table-vcenter t-head changeColorTr changeColorBody">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Basic Account</th>
                                            <th>Premium Account</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>Account Setup Fee</b></td>
                                            <td>No Charges</td>
                                            <td>No Charges</td>
                                        </tr>
                                        <tr>
                                            <td style="border-right:0px solid"><b>Request Fund</b></td>
                                            <td style="border-right:0px solid"></td>
                                            <td style="border-right:0px solid"></td>
                                        </tr>
                                        <tr>
                                            <td>No. of Transactions</b></td>
                                            <td>Unlimited</td>
                                            <td>Unlimited</td>
                                        </tr>
                                        <tr>
                                            <td>Processing Fee / Transaction</b></td>
                                            <td>No Charges</td>
                                            <td>No Charges</td>
                                        </tr>
                                        <tr>
                                            <td style="border-right:0px solid"><b>API Integration</b></td>
                                            <td style="border-right:0px solid"></td>
                                            <td style="border-right:0px solid"></td>
                                        </tr>
                                        <tr>
                                            <td>No. of Transactions</td>
                                            <td><span style="color:red">X</span></td>
                                            <td>Unlimited</td>
                                        </tr>
                                        <tr>
                                            <td>Wallet Address Generation</td>
                                            <td><span style="color:red">X</span></td>
                                            <td>Unlimited</td>
                                        </tr>
                                        <tr>
                                            <td>Processing Fee / Transaction</td>
                                            <td><span style="color:red">X</span></td>
                                            <td>0.2 USD or 0.5% whichever is higher</td>
                                        </tr>
                                        <tr>
                                            <td>No. of API Keys</td>
                                            <td><span style="color:red">X</span></td>
                                            <td>Unlimited</td>
                                        </tr>
                                        <tr>
                                            <td><b>Real Time Reporting</b></td>
                                            <td>Yes</td>
                                            <td>Yes</td>
                                        </tr>
                                        <tr>
                                            <td><b>Instant Withdrawal</b></td>
                                            <td><span style="color:red">X</span></td>
                                            <td>Yes</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><button class="btn searchBtn" style="width:50%;min-width:60px" id="upgradeBtn">Upgrade</button></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    

    <?php include 'footerDashboard.php'; ?>

</div>




<?php include 'sharejsDashboard.php'; ?>

<script src="js/jquery.qrcode.js" type="text/javascript"></script>
</body>


</html>

<script>
    /*
    var divId    = 'transactionHistoryListDiv';
    var tableId  = 'transactionHistoryListTable';
    var pagerId  = 'transactionHistoryPager';
    var btnArray = {};
    var thArray  = Array(
	        // 'Date',
         //    'Currency',
         //    'Withdrawable Amount',
         //    'Destination Address',
         //    'Status'
            '',
            'Date, Time',
            'Withdraw to',
            'Actual Amount',
            'Miner Fee',
            'Nett Amount'
        );
    */    
    var url             = 'scripts/reqEditBusiness.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var dateToday       = new Date();
    var firstTime       = "<?php echo $_POST['firstTime']; ?>";
    var walletType;
    var getToken 		= "<?php echo $_GET['token']?>";
    var dest_add;
    var wallet_type_params;
    var accountType = "<?php echo $_SESSION['account_type']; ?>";

    $(document).ready(function(){
        if(accountType == "premium"){
            $("#upgradeBtn").hide();   
        }
    });

    $("#upgradeBtn").click(function(){
        formData = {
            command: 'upgradeuseraccounttype',
        };
        fCallback = premiumUpgradedSuccess;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    
    });  

    function premiumUpgradedSuccess(data, message){
        
        if(data.code == "1"){
            showMessage("Account Successfully Upgraded", 'success', '<?php echo $translations["M01164"][$language]; /* Congratulations */ ?>', 'check-circle-o', '<?php echo $sys['domain']?>/dashboard.php')
        }else{
            showMessage("Failed to Upgrade Account. Please try again later.", 'warning', obj.message, 'warning', '')
        }
    }
    
</script>
<style>
.fundOutHistoryList {
    padding-top: 10px;
    color: #53c2d4;
    text-decoration: underline;
    background: none;
    border: none;
}
.lefty{
    border-bottom:1px solid #ebeff2;
    border-right:1px solid #ebeff2;
    padding:15px;
}
.mid{
    border-bottom:1px solid #ebeff2;
    border-right:1px solid #ebeff2;
    padding:15px;
}
.righty{
    border-bottom:1px solid #ebeff2;
    padding:15px;
}
.dashboardNew2{
    margin-top:0px;
    margin-bottom:0px;
    padding-top:0px;
    padding-bottom:0px;
}
@media (max-width: 767px) and (min-width: 320px){
.searchBtn {
padding-left:2px;
font-size:12px;
}
}
@media (max-width: 768px) {
  body,
  html {
    font-size: 12px;
  }
}
.responsive {
    min-height: .01%;
    overflow-x: auto;
    overflow-y: auto;
    display:inline-block;
    white-space:nowrap;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 1px solid #ebeff2;
    width:250px;
    min-width:250px;
}
.table th {
    padding: 1.1rem;
    vertical-align: top;
    border-top: 0px solid #dee2e6;
}
.table tr th, .table tr th:last-child,
.table tr td:last-child, 
.table tr td{
    text-align:left;
    border-right:0px solid #dee2e6;
}
.table tr th, 
.table tr td{
    border-right:1px solid #dee2e6;
}
.container-outer {overflow:scroll; width:500px;}
.cointainer-inner {width: 1000px;}
</style>