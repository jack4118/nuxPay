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
					<div class="row d-flex justify-content-between">
						 <div class="col-12 pageHeader mt-3 mb-3">                    
							<?php echo $translations["M00532"][$language]; /* Settings */ ?>
						</div>
						<!--<div class="pageHeader pl-3">
							<a href="withdrawalListing.php"><button class="btn primaryBtn btn-block"><?php echo $translations["M01633"][$language]; /* Fund Out History */ ?></button></a>
						</div>-->
					</div>
<!--
                    <div class="row col-12" style="padding-top:10px">
                        <div class="col-10">
                        <p>Select the crypto currencies below for your application usage. This will allow you and your customer to deposit/withdraw any amount related to the particular crypto currency.</p>

                        </div>
                         UNCOMMENT, TO TRY TEST THE FADE MODAL  
                        <button id="depositBtn1" type="button" class="btn primaryBtn">Deposit</button> 
                        <div class="col-2">
                        <button id="documentationBtn" class="btn searchBtn my-2" style="float:right;" >Documentation</button>

                        </div>

                    </div>
-->
<!--
					<div class="d-flex align-items-center">
						<div class="col-12">
-->
							<div class="d-flex border-bottom justify-content-between">
								<nav class="nav">
								  <a class="nav-link" id="profileBtn" href="settings.php" style="font-size: 15px;"><?php echo $translations["M01876"][$language]; /* Profile */ ?></a>
								  <a class="nav-link" id="walletBtn" href="paymentWallet.php" style="font-size: 15px;"> <?php echo $translations["M01702"][$language]; /* Withdrawal Wallets */ ?> </a>
								  <a class="nav-link" id="securityBtn" href="settingsChangePassword.php" style="font-size: 15px;"><?php echo $translations["M01703"][$language]; /* Security */ ?></a>
								  <a class="nav-link" id="coinBtn" href="settingsAddWallet.php" style="font-size: 15px;"><?php echo $translations["M01704"][$language]; /* Acceptable Currency */ ?></a>
                                  <a class="nav-link" id="coinBtn1" href="settingsAddWalletCurrency.php" style="font-size: 15px;"><?php echo $translations["M02016"][$language]; /* Wallet Coin Currency */ ?></a>
                                  <!-- <a class="nav-link" id="apiBtn" href="apiIntegration.php" style="font-size: 15px;"><?php echo $translations["M01597"][$language]; /* API Integration */ ?></a> -->
								  <a class="nav-link" id="whitelistBtn" href="whitelistAddresses.php" style="font-size: 15px;"><?php echo $translations["M01713"][$language]; /* Whitelist Addresses */ ?></a>
								  <a class="nav-link active" id="fundOutBtn" href="javascript:void(0)" style="font-size: 15px;"><?php echo $translations["M01600"][$language]; /* Fund Out */ ?></a>

								</nav>
							</div>
<!--
						</div>
					</div>
-->
                    <div>

                    </div>

                    <div class="mt-4 col-12">
                        <div class="m-portlet">
                            <div class="m-portlet__body" style="padding-top: 0px; padding-bottom:0px;">
                                <div class="row m-form">
                                    <div class="row-auto" id="buildWalletBalance" style="width: 100%;">
                                    
                                    </div>
                                    <!-- <div class="col-xl-12 px-0" id="showresultListing" style="display: block;">
                                        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                                            <div class="table-responsive" id="transactionHistoryListDiv"></div>
                                            <div class="m-datatable__pager m-datatable--paging-loaded clearfix m-t-rem3">
                                                <ul class="m-datatable__pager-nav" id="transactionHistoryPager">
                                                </ul>
                                                <div class="m-datatable__pager-info">
                                                    <span class="m-datatable__pager-detail"></span>
                                                </div>
                                            </div>   
                                        </div>   
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    

    <?php include 'footerDashboard.php'; ?>

</div>




<?php include 'sharejsDashboard.php'; ?>
<div class="modal fade" id="depositCryptoModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b justify-content-center" style="padding-top:5px;padding-bottom:5px;">
                <div class="row">
                    <div class="modalAmount mt-2 col-12 text-center">
                        Deposit
                    </div>
                </div>
                
            </div>
            <div class="modal-body withdrawalDetailsModal border-b col-12" style="line-height: 25px; border-bottom-left-radius: .3rem; border-bottom-right-radius: .3rem; padding-bottom: 20px;">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12" style="padding-bottom:20px; padding-top:20px;border-bottom:1px solid #e9ecef;">
                            <div class="row">
                            <div id="qrcode" class=""></div>
                            </div>
                        </div>
                        <div class="col-12" style="padding-bottom:20px; padding-top:20px;border-bottom:1px solid #e9ecef;"> 
                            <div class="row">
                                <div class="col-4 pr-0 text-left">
                                    Address:
                                </div>
                                <div class="col-8">
                                    <span style="word-break: break-all;" id="modalTxId">

                                    </span>
                                    <span>
                                        <img src="images/dashboard/newCopyIcon.png" style="width: 25px; padding-left:5px" id="modalCopyTxId">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" style="padding-bottom:20px; padding-top:20px;border-bottom:1px solid #e9ecef;">
                            <div class="row">
                                <div class="col-4 pr-0 text-left">
                                    Currency:
                                </div>
                                <div class="col-8">
                                    <span>
                                        <img src="" style="width: 25px; padding-right:5px;" id="modalCurrencyImg">
                                    </span>
                                    <span id="modalCurrency">

                                    </span>    
                                </div>
                            </div>
                        </div>
                        <div class="col-12" style="padding-bottom:10px; padding-top:20px;">
                            <div class="row">
                                <div class="col-4 pr-0 text-left">
                                    Balance:
                                </div>
                                <div class="col-8" id="modalBalance">

                                </div>
                            </div>
                        </div>
                        
                        
                        <!-- <div class="col-12 mt-4 text-center">
                            <a href="javascript:;" target="_blank" id="modalURL">Go to Etherscan for more details</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
    var url             = 'scripts/reqPaymentGateway.php';
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

    $(document).ready(function(){
        $('#documentationBtn').hide();
        $('#documentationBtn').click(function() {
            $.redirect("autoFundOut.php")
                });

        loadFundOutCoinListing();

        // formData = {
        //     command: 'getDestinationAddress'
        // };
        // fCallback = getWalletAddress;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        //TABLE JUST IN CASE
        // formData  = {
        //         command     : 'getWithdrawalList',
        //         status      : status,
        //         page        : pageNumber
        //     };

        //     fCallback = loadWithdrawalListing;
        //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    });
    function loadFundOutCoinListing(){
        formData = {
            command: 'getFundOutCoinListing',
        };
        fCallback = fundOutCoinListingCallback;
        ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function fundOutCoinListingCallback(data, message){
        var walletBalance = data.data;
        var buildBalance = '';
        var check;
        if (walletBalance != "") {
    		$('#buildWalletBalance').show();
    		// $('#noDataReceiveAddress').hide();
    		$.each(walletBalance, function(key, val){
                var name = val['name'];
                var currency_id = val['wallet_type'];
                var symbol = val['symbol'].toUpperCase();
                var display_symbol = val['display_symbol'].toUpperCase();
                var image = val['image'];
				var balance = val['balance'];
                var status = val['status'];
                var address = val['address'];

                buildBalance += '<div class="col-12 dashboardNewsBox" id="buildWalletBalance">';
    			buildBalance +=	'<div class="row">';
                if (status == 1){
                    buildBalance +=	'<div class="col-md-3 col-sm-2 col-4 align-self-center" style="text-align:center; padding-left:0px">';
                    buildBalance +=' <label class="toggle"> ';
                    buildBalance +=' <input type="checkbox" data-address="'+address+'" data-status="" data-currency_id="'+currency_id+'" data-wallet_type="'+symbol+'" class="toggle-input cryptoBtn" checked> ';
                    buildBalance +=' <div class="toggle-controller default-success text-center"></div> ';
                    buildBalance +=' </label> ';
                    buildBalance +=	'</div>';
                    check = "true";
                }else{
                    buildBalance +=	'<div class="col-md-3 col-sm-2 col-4" style="text-align:center; padding-left:0px">';
                    buildBalance +=' <label class="toggle"> ';
                    buildBalance +=' <input type="checkbox" data-address="" data-status="" data-currency_id="'+currency_id+'" data-wallet_type="'+symbol+'" class="toggle-input cryptoBtn" > ';
                    buildBalance +=' <div class="toggle-controller default-success text-center"></div> ';
                    buildBalance +=' </label> ';
                    buildBalance +=	'</div>';  
                    check = "false";  
                }
                    buildBalance +=	'<div class="col-md-1 col-sm-2 col-3 align-self-center" style="padding-left:10px; padding-right:0px">';
                    buildBalance +=	'<img src="'+image+'" style="width: 35px">';
                    buildBalance +=	'</div>';

                    buildBalance +=	'<div class="col-md-4 col-sm-5 col-5 align-self-center" style="padding-left:0px">';
                    buildBalance +=	'<b>'+display_symbol+'</b>';
                    buildBalance +=	'<br>Balance: ';
                    buildBalance +=	'<b>'+balance+'</b>';
                    buildBalance +=	'</div>';

	    		buildBalance +=	'<div class="col-md-4 col-sm-3 col-12">';
	    		buildBalance +=	'<div class="row">';
                if (check == "true"){
                    buildBalance +=	'<div class="col-7 spaceTuning">';
                    buildBalance +=	'</div>';
                    buildBalance +=	'<div class="col-md-4 col-sm-4 col-5 d-flex justify-content-sm-end justify-content-md-end justify-content-start" style="padding-top:3px; padding-left:0px;">';
                    buildBalance +=	'<button id="depositBtn" data-address="'+address+'" data-symbol="'+display_symbol+'" data-img_source="'+image+'" data-balance="'+balance+'" type="button" class="btn primaryBtn depositBtn">Deposit';
                    // buildBalance += ''deposit'';
                    buildBalance += '</button>';
                    buildBalance +=	'</div>';
                    buildBalance +=	'<div class="col-7 spaceTuning">';
                    buildBalance +=	'</div>';
                    buildBalance +=	'<div class="col-md-8 col-sm-8 col-5 d-flex justify-content-sm-start justify-content-md-start justify-content-start">';
                    buildBalance +=	'<div class="row" style="padding-top: 3px;">';
                    buildBalance +=	'<div class="col-md-12 col-sm-12 fundOutHistoryIconStyle">';
                    buildBalance += '<button type="button" class="fundOutHistoryList fundOutHistoryID" data-wallet-type="'+currency_id+'" id="fundOutHistoryID">Fund Out History ></button>';
                    buildBalance += '<img src ="/images/fundOut/history-icon.png" class="fundOutHistoryIcon fundOutHistoryID" data-wallet-type="'+currency_id+'" id="fundOutHistoryID">';


                    buildBalance +=	'</div>';
                }else{
                    buildBalance +=	'<div class="col-md-5">';   
                    buildBalance +=	'</div>';
                    buildBalance +=	'<div class="col-md-7">';
                    buildBalance +=	'<div class="row">';
                    buildBalance +=	'<div class="col-md-12">';
                    buildBalance +=	'</div>';
                }
                buildBalance +=	'</div>';
                buildBalance +=	'</div>';
                buildBalance +=	'</div>';
                buildBalance +=	'</div>';
                buildBalance +=	'</div>';
                buildBalance +=	'</div>';
                
                buildBalance += '<div class="col-sm-12 px-0 newsLastHR">';
                buildBalance += '<hr class="dashboardHR">';
                buildBalance += '</div>';
                
	    		$('#buildWalletBalance').empty().append(buildBalance); 
                
                $(':checkbox').change(function(){
                    currency_id = $(this).attr('data-currency_id'); 
                    status = $(this).is(":checked") ? 1 : 0;
                    <?php    $_SESSION["hasSetFundOutAddress"] = "true";?>
                    setFundOutExternalAddress(currency_id, status);
                });

                $('.depositBtn').click(function() {
                    depositCryptoBalance($(this));
                });

                $('.fundOutHistoryID').click(function() {
                    fundOutHistoryListing($(this));
                });
                

	    		// if(walletBalance){

                // $.each(walletBalance, function(k, v) {
                //     $('#' + buildBalance).find('tr#' + k).attr('data-th', v['short_url']);
                // });

                // }

			})
        } 
        
	}

    function setFundOutExternalAddress(currency_id, status){
        formData = {
            command: 'setFundOutExternalAddress',
            currency_id: currency_id,
            status: status
        };
        fCallback = setFundOutExternalAddressCallback;
        ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function setFundOutExternalAddressCallback(data, message){
        if (data.code == 1){ //success
            loadFundOutCoinListing();
        }
    }
    /*
    function loadWithdrawalListing(data, message) {

        var tableNo;
        var withdrawalList = data.data.withdrawal_listing;
        img_list = data.data.crypto_img_list;
        symbol_list = data.data.crypto_symbol_list;

        if(withdrawalList && withdrawalList.length > 0) {
            $('#showErrorMsg').hide();
            $('#showresultListing').show();

            var newList = [];
            tableRowDetails = [];
            $.each(withdrawalList, function(k, v) {
                v['wallet_type'] = v['wallet_type'].toLowerCase();
        //                if (searchTab == "API Integration"){
        //                    v['destination_address'] = v['recipient_external'] ? v['recipient_external'] : v['recipient_internal'];
        //                }
                tableRowDetails.push(v);

                var buildCurrencyIcon = `
                <img src=${img_list[v['wallet_type']]} class="currencyLogo">

                `;

                var rebuildData = {
                    currency : buildCurrencyIcon,
                    created_at : dateTimeToDateFormat(v['created_at']),
                    destination_address : encrypt(v['destination_address'], 6),
                    withdrawal_amount : v['withdrawal_amount'],
                    miner_fee: v['miner_fee'],
                    nett_amount : v['amount']
                };

                newList.push(rebuildData);
            });
        }
        else
        {
            $('#showErrorMsg').show();
            $('#showresultListing').hide();
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.data.pageNumber, data.data.totalPage, data.data.totalRecord, data.data.numRecord);

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).addClass("removeBackgorundColor");
            $(this).click(runModal);
        });

    }*/
    /*
    function runModal() { 
        var tableRowID = $(this).attr("id");
        var currentRow = tableRowDetails[tableRowID];
        var currentSymbol = symbol_list[currentRow["wallet_type"]].toUpperCase()
        $('#modalCoinImg').attr('src', img_list[currentRow["wallet_type"]]);
        $('#modalTitleNettAmount').html(currentRow["amount"] + ' ' + currentSymbol);
        $('#modalCreatedDate').html("Created on " + dateTimeToDateFormat(currentRow["created_at"]));
        $('#modalTxId').html(encrypt(currentRow["transaction_hash"], 10));
        $('#modalActualAmount').html(currentRow["withdrawal_amount"] + ' ' + currentSymbol);
        $('#modalMinerFee').html(currentRow["miner_fee"] + ' ' + currentSymbol);
        $('#modalNettAmount').html(currentRow["amount"] + ' ' + currentSymbol);
        $('#modalWithdrawTo').html(encrypt(currentRow["destination_address"], 10));
        // $('#modalURL').attr('href', `<?php echo $sys["txDomain"]?>` + currentRow["transaction_hash"]);

        $('#modalCopyTxId').click(() =>
            copyToClipboard(currentRow["transaction_hash"])
        );

        $('#modalCopyWithdrawTo').click(() =>
            copyToClipboard(currentRow["destination_address"])
        );

        $('#withdrawalDetailsModal').modal();
	}
    */
    
    function fundOutHistoryListing(elem){
        wallet_type_params =  elem.attr('data-wallet-type');
        $.redirect("fundOutHistory.php", {
            wallet_type_params: wallet_type_params
        });
    }

    function depositCryptoBalance(elem){
        dest_add = elem.attr('data-address');
        image_url = elem.attr('data-img_source');
        symbol = elem.attr('data-symbol');
        balance = elem.attr('data-balance');

        profile_picture_url = "<?php echo $sys['qrLogoIcon']?>";
        $('#qrcode').empty();
        $('#qrcode').qrcode({
            render: "canvas", 
            text: dest_add,
            width: 200,
            height: 200,
            background: "#ffffff",
            foreground: "#000000",
            src: profile_picture_url,
            imgWidth: 40,
            imgHeight: 40,
        });
        $('#qrcode').css('margin', '0 auto');
        $('#modalTxId').html(dest_add.substr(0, 10) + '...' + dest_add.substr(-10));
        $('#modalCurrency').html(symbol.toUpperCase());
        $('#modalBalance').html(balance.toLocaleString('en'));
        $('#modalCurrencyImg').attr('src', image_url);

        $('#depositCryptoModal').modal();

        $('#modalCopyTxId').click(function(){
            copyToClipboard(dest_add)
        });
    }

    function copyToClipboard(val){
        var dummy = document.createElement("input");
        document.body.appendChild(dummy);
        dummy.setAttribute("id", "dummy_id");
        document.getElementById("dummy_id").value=val;
        dummy.select();
        document.execCommand("copy");
        document.body.removeChild(dummy);
        swal.fire({
            position:"center",
            type:"success",
            title:"<?php echo $translations["M00137"][$language]; /* Copied to clipboard  */?>",
            showConfirmButton:!1,
            timer:1000
        })
    }

    /* UNCOMMENT THIS TO TRY TO TEST THE FADE MODAL USING THIS BUTTON */
    // $('#depositBtn1').click(function() {
    //     console.log("hi");
    //     depositCryptoBalance(dest_add);
    // });

    function getWalletAddress(data, message){
        var walletType = data.result.destination_addresses;
        var destinationAddress = '';
        var sameCurrency = '';
        var unnamed_wallet_num = 1;

        if(!walletType){
            $('#noWallet').show();
        }else{
            $('#destinationDiv').empty();
            $.each(walletType, function(k,v){
                $.each(v, function(k,d){
                    if(k==0){
                        unnamed_wallet_num = 1;
                    }
                    var address = d['address'];
                    var name = d['wallet_name'];
                    var status = d['status'];
                    var image = d['image'];
                    var symbol = d['symbol'];

                    dest_add = address;
                });
            });
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

.fundOutHistoryIcon{
    width : 20px;
}

@media (max-width: 767px) {
    .fundOutHistoryList {
        display : none;
    }
    .fundOutHistoryIconStyle{
        padding :6px;
        background-color:#53c2d4;
        border-radius:50%;
    }

}

@media (min-width: 768px) {
    .fundOutHistoryIcon {
        display : none;
    }
    .spaceTuning{
        display: none;
    }

}

@media (min-width: 576px) {
    .spaceTuning{
        display: none;
    }

}
</style>