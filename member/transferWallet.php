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
						<div class="col-12 pageHeader mt-3">                    
                            <?php echo $translations["M02046"][$language]; /* Batch Transfer */ ?>
						</div>
						<div class="col-12 mt-3 mb-4">                    
                            <?php echo $translations["M02054"][$language]; /* Manage your batch transfer wallet by enabling and deposit a lumpsum amount into the wallet. Use API to perform a batch transfer to multiple recipients. (*Network transaction fees and platform fees incurred) */ ?>
						</div>
					</div>

                    <div class="mt-4 col-12 p-0">
                        <!-- <div class="m-portlet"> -->
                            <!-- <div class="m-portlet__body" style="padding-top: 0px; padding-bottom:0px;"> -->
                                <!-- <div class="row m-form"> -->
                                    <div class="row-auto" id="buildWalletBalance" style="width: 100%;">
                                    
                                    </div>
                                <!-- </div> -->
                            <!-- </div> -->
                        <!-- </div> -->
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.qrcode.js" type="text/javascript"></script>
</body>


</html>

<script defer>
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

        loadDefaultFundOutCoinListing();
    });

    function loadDefaultFundOutCoinListing() {
        formData = {
            command: 'getFundOutCoinListing',
            listOnly: false
        };
        fCallback = defaultFundOutCoinListingCallback;
        ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, 1, 0);
    }

    function loadFundOutCoinListing(){
        formData = {
            command: 'getFundOutCoinListing',
            listOnly: false
        };
        fCallback = fundOutCoinListingCallback;
        ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, 1, 0);
    }

    function fundOutCoinListingCallback(data, message){
        var walletBalance = data.data;
        var walletBalance3 = data.result.address;
        var buildBalance = '';
        var check;
        var length = walletBalance3.length;
        var mod_length = Math.floor(length/5);
        console.log(2)
        if (walletBalance3 != "") {
            if (length > 0)
            {
                for (let i = 0; i <= mod_length; i++) {
                    formData = {
                        command: 'getFundOutCoinListing',
                        listOnly: true,
                        listOnlyLength: i+1,
                    };
                    fCallback = fundOutCoinListingCallback_V2;
                    ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, 1, 0);
                }
            }
        } 
	}
    function fundOutCoinListingCallback_V2(data, message){
        var walletBalance = data.data;
        var walletBalance2 = data.result.address
        var buildBalance = '';
        var check;
        console.log(3)

        if (walletBalance2 != "") {
    		$('#buildWalletBalance').show();

    		// $.each(walletBalance, function(key, val){
                $.each(walletBalance2, function(creditType,v){
                // $.each(v, function(k,d){
                //     var balance = d['balance'];
                //     var address = d['address'];

                //     $('#'+address).text(balance);
                // })
                    var balance = v['balance'];
                    var checkV2 = v['check'];
                    var address = v['address'];

                    if(checkV2 == 1){
                        $('#'+address).text(balance);
                        
                    }
                });
                // var name = val['name'];
                // var currency_id = val['wallet_type'];
                // var symbol = val['symbol'].toUpperCase();
                // var display_symbol = val['display_symbol'].toUpperCase();
                // var image = val['image'];
				// var balance = val['balance'];
                // var status = val['status'];
                // var address = val['address'];
                
	    		// $('#'+currency_id).text(balance);
			// })
        } 
        
	}

    function defaultFundOutCoinListingCallback(data, message) {
        //console.log(data.result.destination_addresses);
        var walletBalance = data.data;
        var walletBalance2 = data.result.destination_addresses;
        var buildBalance = '';
        var check;
        if (walletBalance != "") {
    		$('#buildWalletBalance').show();

    		$.each(walletBalance, function(key, val){
                var name = val['name'];
                var currency_id = val['wallet_type'];
                var symbol = val['symbol'].toUpperCase();
                var display_symbol = val['display_symbol'].toUpperCase();
                var image = val['image'];
				var balance = val['balance'];
                var status = val['status'];
                var address = val['address'];

                buildBalance += '<div class="m-portlet">';
                buildBalance += '<div class="m-portlet__body p-0">';
                buildBalance += '<div class="row m-form">'
                buildBalance += '<div class="col-12 dashboardNewsBox" id="buildWalletBalance">';
    			buildBalance +=	'<div class="creditMainContainer">';
                if (status == 1){
                    buildBalance +=	'<div class="" style="text-align:center; padding-left:70px">';
                    // buildBalance +=' <label class="toggle"> ';
                    // buildBalance +=' <input type="checkbox" data-address="'+address+'" data-status="" data-currency_id="'+currency_id+'" data-wallet_type="'+symbol+'" class="toggle-input cryptoBtn" checked> ';
                    // buildBalance +=' <div class="toggle-controller default-success text-center"></div> ';
                    // buildBalance +=' </label> ';
                    buildBalance +=	'</div>';
                    check = "true";
                }else{
                    buildBalance +=	'<div class="" style="text-align:center; padding-left:70px">';
                    // buildBalance +=' <label class="toggle"> ';
                    // buildBalance +=' <input type="checkbox" data-address="" data-status="" data-currency_id="'+currency_id+'" data-wallet_type="'+symbol+'" class="toggle-input cryptoBtn" > ';
                    // buildBalance +=' <div class="toggle-controller default-success text-center"></div> ';
                    // buildBalance +=' </label> ';
                    buildBalance +=	'</div>';  
                    check = "false";  
                }
                    buildBalance +=	'<div class="creditType">';
                    buildBalance +=	'<img src="'+image+'" style="width: 35px">';
                    buildBalance +=	'<b style="padding-left: 10px;">'+display_symbol+'</b>';
                    buildBalance +=	'</div>';

                    // buildBalance +=	'<div class="creditBalance" style="padding-left:0px">';
                    // buildBalance +=	'<?php echo $translations["M01616"][$language]; /* Balance */ ?>'+': ';
                    // buildBalance +=	'<b id="'+currency_id+'">0</b>';
                    // buildBalance +=	'</div>';

	    		buildBalance +=	'<div class="creditButtons">';
	    		// buildBalance +=	'<div class="">';

                // if (check == "true"){
                    buildBalance +=	'<div class="creditDeposit" style="padding-top:3px; padding-left:0px;">';
                    buildBalance +=	'<button id="depositBtn" data-address="'+address+'" data-symbol="'+display_symbol+'" data-img_source="'+image+'" data-currency_id="'+currency_id+'" data-balance="'+balance+'" type="button" class="btn primaryBtn depositBtn">';
                    buildBalance += '<?php echo "Generate"; /* Generate */ ?>' + '</button>';
                    buildBalance +=	'</div>';
                    buildBalance +=	'<div class="creditHistory">';
                    buildBalance +=	'<div class="" style="padding-top: 3px;">';
                    buildBalance +=	'<div class="col-md-12 col-sm-12 fundOutHistoryIconStyle" style="padding-right: 0; padding-left: 0;">';
                    buildBalance += '<button type="button" class="fundOutHistoryList fundOutHistoryID pt-0" data-wallet-type="'+currency_id+'" id="fundOutHistoryID">'+ '<?php echo $translations["M02050"][$language]; /* View History */ ?>' +' ></button>';
                    // buildBalance += '<img src ="/images/fundOut/history-icon.png" class="fundOutHistoryIcon fundOutHistoryID" data-wallet-type="'+currency_id+'" id="fundOutHistoryID">';


                    buildBalance +=	'</div>';
                // }else{
                    // buildBalance +=	'<div class="">';   
                    // buildBalance +=	'</div>';
                    // buildBalance +=	'<div class="">';
                    // buildBalance +=	'<div class="row">';
                    // buildBalance +=	'<div class="">';
                    // buildBalance +=	'</div>';
                // }
                buildBalance +=	'</div>';
                // buildBalance +=	'</div>';
                buildBalance +=	'</div>';
                buildBalance +=	'</div>';
                buildBalance +=	'</div>';
                buildBalance +=	'</div>';
                
                $.each(walletBalance2, function(creditType,v){
                $.each(v, function(k,d){
                    if(k==0){
                        unnamed_wallet_num = 1;
                    }
                    var address1 = d['address'];
                    var balance1 = d['balance'];
                    var name = '';
                    var status1 = d['status'];
                    var sWallet = d['wallet_type'];
					//var display_symbol = '';
                    var checkAddress;

                    if(sWallet == currency_id){
                            //console.log(address1);

                        // WALLET TITLE
                        // buildBalance +=' <div class="row"> ';
                        // buildBalance +=' <div class="col-12"> ';
                        // buildBalance +=' <img src="'+image+'"> <span>'+display_symbol+' </span> ';
                        // buildBalance +=' </div> ';
                        // buildBalance +=' <div class="col-12 mt-3"> ';
                        // buildBalance +=' <div class="m-portlet" id="'+symbol+'">';
                        buildBalance +=' <div class="col-12 dashboardNewsBox"> ';
                        buildBalance +=' <div class="withdrawalBlock m-0 walletContainer"> ';

                        // TOGGLE BUTTON
                        if(status1 == 1){
                            buildBalance +=' <div style="margin-left: 15px;"> ';
                            buildBalance +=' <label class="toggle"> ';
                            buildBalance +=' <input type="checkbox" data-address="'+address1+'" data-status="'+status1+'" data-currency_id="'+currency_id+'" data-wallet_type="'+symbol+'" class="toggle-input cryptoBtn" checked> ';
                            buildBalance +=' <div class="toggle-controller default-success text-center"></div> ';
                            buildBalance +=' </label> ';
                            buildBalance +=' </div> ';
                            checkAddress = "true";
                        }else{
                            buildBalance +=' <div style="margin-left: 15px;"> ';
                            buildBalance +=' <label class="toggle"> ';
                            buildBalance +=' <input type="checkbox" data-address="'+address1+'" data-status="'+status1+'" data-currency_id="'+currency_id+'" data-wallet_type="'+symbol+'" class="toggle-input cryptoBtn"> ';
                            buildBalance +=' <div class="toggle-controller default-success text-center"></div> ';
                            buildBalance +=' </label> ';
                            buildBalance +=' </div> ';
                            checkAddress = "false";
                        }
                        
                    //     // NAME AND DESTINATION ADDRESS
                        buildBalance +=' <div class="withdrawalBorder walletAddress"> ';
                        buildBalance +=' <div class="row"> ';
                        buildBalance +=' <div class="col-12"> ';
                        buildBalance +='<?php echo 'Sender Address'; /* Destination Address */ ?>';
                        buildBalance +=' </div> ';
                        buildBalance +=' <div class="col-12 stdBold addressBreak" style="word-break: break-all;"> ';
                        buildBalance += address1;
                        buildBalance +=' </div> ';
                        buildBalance +=' </div> ';
                        buildBalance +=' </div> ';
                        
                        buildBalance +=	'<div class="creditBalance" style="padding-left:0px">';
                        buildBalance +=	'<?php echo $translations["M01616"][$language]; /* Balance */ ?>'+': ';
                        buildBalance +=	'<b id="'+address1+'">0</b>';
                        buildBalance +=	'</div>';


                        buildBalance +=	'<div class="creditButtons">';

                        buildBalance +=	'<div class="creditDeposit" style="padding-top:3px; padding-left:0px;">';
                        buildBalance +=	'<button id="depositBtn1" data-address="'+address1+'" data-symbol="'+display_symbol+'" data-img_source="'+image+'" data-balance="'+balance1+'" type="button" class="btn primaryBtn depositBtn1">';
                        buildBalance += '<?php echo $translations["M02051"][$language]; /* Deposit */ ?>' + '</button>';
                        buildBalance +=	'</div>';
                        buildBalance +=' <div class="walletHistory"> ';
                        buildBalance +=' <div class="row"> ';
                        buildBalance +=' <div class="col-12"> ';
                        // buildBalance += '<button type="button" class="fundOutHistoryList fundOutHistoryID pt-0" data-wallet-type="'+currency_id+'" id="fundOutHistoryID">'+ '<?php echo $translations["M02050"][$language]; /* View History */ ?>' +' ></button>';
                        buildBalance +=' </div> ';
                        buildBalance +=' </div> ';
                        buildBalance +=' </div> ';
                        
                        buildBalance +=	'</div>';

                        // if (checkAddress == "true"){
                        //     buildBalance +=' <div class="withdrawalBorder walletHistory"> ';
                        //     buildBalance +=' <div class="row"> ';
                        //     buildBalance +=' <div class="col-12"> ';
                        //     buildBalance +=' <button type="button" class="transactionHistoryList" data-wallet-type="'+ creditType +'" id="transactionHistoryBtn">'+ '<?php echo $translations["M02050"][$language]; /* View History */ ?>' +' ></button> ';
                        //     buildBalance +=' </div> ';
                        //     buildBalance +=' </div> ';
                        //     buildBalance +=' </div> ';
                        // }else{
                        //     buildBalance +=	'<div class="">';   
                        //     buildBalance +=	'</div>';
                        //     buildBalance +=	'<div class="">';
                        //     buildBalance +=	'<div class="row">';
                        //     buildBalance +=	'<div class="">';
                        //     buildBalance +=	'</div>';
                        // }

                        // buildBalance +=' </div> ';
                        // buildBalance +=' </div> ';
                        // buildBalance +=' </div> ';
                        buildBalance +=' </div> ';
                        buildBalance +=' </div> ';
                    }
                })
                });

                buildBalance += '<div class="newsLastHR">';
                buildBalance += '<hr class="dashboardHR">';
                buildBalance += '</div>';
                buildBalance += '</div>';
                buildBalance += '</div>';
                buildBalance += '</div>';

                
	    		$('#buildWalletBalance').empty().append(buildBalance); 
                
                $(':checkbox').change(function(){
                    currency_id = $(this).attr('data-currency_id'); 
                    status = $(this).is(":checked") ? 1 : 0;
                    address = $(this).attr('data-address'); 
                    //console.log(address);

                    <?php    $_SESSION["hasSetFundOutAddress"] = "true";?>
                    setFundOutExternalAddress(currency_id, status, address);
                });

                $('.depositBtn').click(function() {
                    // depositCryptoBalance($(this));
                    currency_id = $(this).attr('data-currency_id'); 
                    generateExternalAddress(currency_id);
                });

                $('.depositBtn1').click(function() {
                    depositCryptoBalance($(this));
                });

                $('.fundOutHistoryID').click(function() {
                    fundOutHistoryListing($(this));
                });

			})
        } 
        loadFundOutCoinListing();

    }

    function buildFundOutListing(data, message) {
        var walletBalance = data.data;
        var buildBalance = '';
        var check;

        console.log(walletBalance)
        if (walletBalance != "") {
    		$('#buildWalletBalance').show();
            $.each(walletBalance, function(key, val) {
                var name = val['name'];
                var currency_id = val['wallet_type'];
                var symbol = val['symbol'].toUpperCase();
                var display_symbol = val['display_symbol'].toUpperCase();
                var image = val['image'];
				var balance = val['balance'];
                var status = val['status'];
                var address = val['address'];
                buildBalance += '<div class="m-portlet">';
                buildBalance += '<div class="m-portlet__body" style="padding-top: 0px; padding-bottom:0px;">';
                buildBalance += '<div class="row m-form">'
                buildBalance += '<div class="col-12 dashboardNewsBox" id="buildWalletBalance mb-3">';
    			buildBalance +=	'<div class="row">';
    			buildBalance +=	'</div>';
    			buildBalance +=	'</div>';
    			buildBalance +=	'</div>';
    			buildBalance +=	'</div>';
    			buildBalance +=	'</div>';

                $('#buildWalletBalance').empty().append(buildBalance); 
            })

        }
    }

    function setFundOutExternalAddress(currency_id, status, address){
        formData = {
            //command: 'setFundOutExternalAddress',
            command: 'setFundOutExternalAddressV2',
            currency_id: currency_id,
            status: status,
            address: address
        };
        fCallback = setFundOutExternalAddressCallback;
        ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function setFundOutExternalAddressCallback(data, message){
        if (data.code == 1){ //success
            loadFundOutCoinListing();
            showMessage('<?php echo $translations["M02130"][$language]; /* Transfer Wallet Updated */ ?>', 'success', "Success", "check-circle-o", 'transferWallet.php');
        }
    }

    function generateExternalAddress(currency_id){
        formData = {
            command: 'generateExternalAddress',
            currency_id: currency_id,
        };
        fCallback = generateExternalAddressCallback;
        ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function generateExternalAddressCallback(data, message){
        if (data.code == 1){ //success
            loadFundOutCoinListing();
            showMessage('<?php echo "Success Generated." /* Success Generated */ ?>', 'success', "Success", "check-circle-o", 'transferWallet.php');
        }
    }
    
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
        $('#modalBalance').html(document.getElementById(dest_add).innerText.toLocaleString('en'));
        // $('#modalBalance').html(balance.toLocaleString('en'));
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

/* @media (max-width: 767px) {
    .fundOutHistoryList {
        display : none;
    }
    .fundOutHistoryIconStyle{
        padding :6px;
        background-color:#53c2d4;
        border-radius:50%;
        width: 36px;
        display: flex;
        justify-content: center;
        align-items: center;
        object-fit: contain;
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

} */

.creditType {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding-left:30px; 
    padding-right:0px;
    width: 25%;
}

.creditBalance {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: 43%;
}

.creditButtons {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: 30%;
}

.creditDeposit {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: 50%;
}

.creditHistory {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: 50%;
}

.creditMainContainer {
    display: flex;
}

.walletContainer {
    display: flex;
    align-items: center;
    height: 100%;
}

.walletAddress {
    width: 65%;
    margin: 0 0 0 15px;
}

.walletHistory {
    width: 18%;
    min-width: 160px;
}

.transactionHistoryList {
    padding-top: 10px;
    color: #53c2d4;
    text-decoration: underline;
    background: none;
    border: none;
}   

@media (max-width: 660px) {
    .creditMainContainer {
        flex-wrap: wrap;
    }

    .creditBalance {
        width: 30%;
    }

    .creditType {
        width: 40%;
    }

    .creditButtons {
        width: 100%;
        padding-left: 20px;
        padding-right: 20px;
        margin-top: 10px;
    }

    .creditHistory {
        width: 30%;
        justify-content: flex-end;
    }

    .creditDeposit {
        width: 70%;
        justify-content: flex-end;
    }

    .walletAddress {
        width: 90% !important;
        margin: 10px 0 0 15px !important;
    }

    .walletHistory {
        width: 100% !important;
        text-align: right;
    }

    .transactionHistoryList {
        padding-right: 20px;
    }
}

@media (max-width: 470px) {
    .creditMainContainer {
        flex-direction: column;
    }

    .toggle {
        text-align: left;
        margin-bottom: 5px;
    }

    .creditBalance {
        width: 100%;
        margin: 10px 30px 0 30px;
    }

    .creditType {
        width: 100%;
    }

    .creditHistory {
        width: 40%;
        justify-content: flex-end;
    }

    .creditDeposit {
        width: 60%;
        justify-content: flex-end;
    }

    .pageHeader {
        font-size: 24px;
    }

    .creditType > img {
        width: 26px !important;
    }

}
#fundOutHistoryID:hover {
    cursor: pointer;
}
</style>