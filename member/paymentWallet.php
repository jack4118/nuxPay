<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>


<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default dashboardPage">
    <div class="m-grid m-grid--hor m-grid--root m-page">

        <?php include 'headerDashboard.php'; ?>

        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <div class="m-content marginTopHeader">

                <div class="col-12 pageHeader px-0 mb-1">      
                    <?php echo $translations["M01617"][$language]; /* Payments */ ?>
                </div>

                <div class="col-12 px-0 mb-4">      
                    <?php echo $translations["M02053"][$language]; /* Set your destination address in your payment wallet for each acceptable payment currencies. Our system will perform an instant fund out to the destination address upon receiving payments. */ ?>
                </div>

                <div class="col-6 p-0 addBtnContainer">
                    <button id="addBtn" class="btn searchBtn" type="button">
                        <?php echo $translations["M02052"][$language]; /* Add Destination Address */ ?>
                    </button>
                </div>

                <div class="col-12 my-5">
                    <div class="row">
                        <div class="col-12 walletField p-0" id="destinationDiv">
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center my-5" id="noWallet" style="display: none;">
                    <div class="row">
                        <div class="col-12">
                            <img src="<?php echo $sys['source'] == 'FTAG' ?  'images/whitelabel/ftag/no-withdrawal.png' :  'images/nuxPay/newDesign/noWalletIcon.png'?>">
                        </div>
                        <div class="col-12 mt-3 bigText">
                            <?php echo $translations["M02040"][$language]; /* No Withdrawal Wallet */ ?>
                        </div>
                        <div class="col-12">
                            <?php echo $translations["M02041"][$language]; /* Add withdrawal wallet to receive payment instantly from your customers */ ?>
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
    var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = ""; 
	var checkWalletStatus = 1;
    var swapReferenceID;
    var walletBalance;

    $(document).ready(function(){
        formData = {
            command: 'getDestinationAddress'
        };
        fCallback = getWalletAddress;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#addBtn').click(function(){
            $.redirect("addWithdrawalAddress.php");
        });
    });


    function getWalletAddress(data, message){
        var walletType = data.result.destination_addresses;
        var destinationAddress = '';
        var sameCurrency = '';
        var unnamed_wallet_num = 1;

        if(!walletType){
            $('#noWallet').show();
        }else{
            $('#destinationDiv').empty();
            $.each(walletType, function(creditType,v){
                $.each(v, function(k,d){
                    if(k==0){
                        unnamed_wallet_num = 1;
                    }
                    var address = d['address'];
                    var name = sanitize(d['wallet_name']);
                    var status = d['status'];
                    var image = d['image'];
                    var symbol = d['symbol'];
					var display_symbol = d['display_symbol'];

                    if(symbol == sameCurrency){
                        destinationAddress =' <div style="padding: 20px 0 20px 0;"> ';
                        destinationAddress +=' <div class="withdrawalBlock walletContainer"> ';

                        // TOGGLE BUTTON
                        if(status == 1){
                            destinationAddress +=' <div style="margin-left: 15px;"> ';
                            destinationAddress +=' <label class="toggle"> ';
                            destinationAddress +=' <input type="checkbox" data-address="'+address+'" data-status="'+status+'" data-wallet_type="'+symbol+'" class="toggle-input cryptoBtn" checked> ';
                            destinationAddress +=' <div class="toggle-controller default-success text-center"></div> ';
                            destinationAddress +=' </label> ';
                            destinationAddress +=' </div> ';
                        }else{
                            destinationAddress +=' <div style="margin-left: 15px;"> ';
                            destinationAddress +=' <label class="toggle"> ';
                            destinationAddress +=' <input type="checkbox" data-address="'+address+'" data-status="'+status+'" data-wallet_type="'+symbol+'" class="toggle-input cryptoBtn"> ';
                            destinationAddress +=' <div class="toggle-controller default-success text-center"></div> ';
                            destinationAddress +=' </label> ';
                            destinationAddress +=' </div> ';
                        }
                        
                        // NAME AND DESTINATION ADDRESS
                        destinationAddress +=' <div class="withdrawalBorder walletName"> ';
                        destinationAddress +=' <div class="row"> ';
                        destinationAddress +=' <div class="col-12"> ';
                        destinationAddress += '<?php echo $translations["M01721"][$language]; /* Wallet Name */ ?>';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' <div class="col-12 stdBold"> ';
                        destinationAddress += name == "" ? d['display_symbol'] + " Wallet-" + (unnamed_wallet_num++) + " ": name;
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' <div class="withdrawalBorder walletAddress"> ';
                        destinationAddress +=' <div class="row"> ';
                        destinationAddress +=' <div class="col-12"> ';
                        destinationAddress +='<?php echo $translations["M02042"][$language]; /* Destination Address */ ?>';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' <div class="col-12 stdBold addressBreak"> ';
                        destinationAddress += address;
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' <div class="withdrawalBorder walletHistory"> ';
                        destinationAddress +=' <div class="row"> ';
                        destinationAddress +=' <div class="col-12"> ';
                        destinationAddress +=' <button type="button" class="transactionHistoryList" data-wallet-type="'+ creditType +'" id="transactionHistoryBtn">'+ '<?php echo $translations["M02050"][$language]; /* View History */ ?>' +' ></button> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';

                        $('#'+symbol+'').append(destinationAddress);
                    }else{
                        // WALLET TITLE
                        destinationAddress =' <div class="row"> ';
                        destinationAddress +=' <div class="col-12"> ';
                        destinationAddress +=' <img src="'+image+'"> <span>'+display_symbol+' </span> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' <div class="col-12 mt-3"> ';
                        destinationAddress +=' <div class="m-portlet" id="'+symbol+'">';
                        destinationAddress +=' <div style="padding: 20px 0 20px 0;"> ';
                        destinationAddress +=' <div class="withdrawalBlock m-0 walletContainer"> ';

                        // TOGGLE BUTTON
                        if(status == 1){
                            destinationAddress +=' <div style="margin-left: 15px;"> ';
                            destinationAddress +=' <label class="toggle"> ';
                            destinationAddress +=' <input type="checkbox" data-address="'+address+'" data-status="'+status+'" data-wallet_type="'+symbol+'" class="toggle-input cryptoBtn" checked> ';
                            destinationAddress +=' <div class="toggle-controller default-success text-center"></div> ';
                            destinationAddress +=' </label> ';
                            destinationAddress +=' </div> ';
                        }else{
                            destinationAddress +=' <div style="margin-left: 15px;"> ';
                            destinationAddress +=' <label class="toggle"> ';
                            destinationAddress +=' <input type="checkbox" data-address="'+address+'" data-status="'+status+'" data-wallet_type="'+symbol+'" class="toggle-input cryptoBtn"> ';
                            destinationAddress +=' <div class="toggle-controller default-success text-center"></div> ';
                            destinationAddress +=' </label> ';
                            destinationAddress +=' </div> ';
                        }
                        
                        // NAME AND DESTINATION ADDRESS
                        destinationAddress +=' <div class="withdrawalBorder walletName"> ';
                        destinationAddress +=' <div class="row"> ';
                        destinationAddress +=' <div class="col-12"> ';
                        destinationAddress += '<?php echo $translations["M01721"][$language]; /* Wallet Name */ ?>';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' <div class="col-12 stdBold"> ';
                        destinationAddress += name == "" ? d['display_symbol'] + " Wallet-" + (unnamed_wallet_num++) + " ": name;
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' <div class="withdrawalBorder walletAddress"> ';
                        destinationAddress +=' <div class="row"> ';
                        destinationAddress +=' <div class="col-12"> ';
                        destinationAddress +='<?php echo $translations["M02042"][$language]; /* Destination Address */ ?>';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' <div class="col-12 stdBold addressBreak" style="word-break: break-all;"> ';
                        destinationAddress += address;
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' <div class="withdrawalBorder walletHistory"> ';
                        destinationAddress +=' <div class="row m-0"> ';
                        destinationAddress +=' <div class="col-12 p-0"> ';
                        destinationAddress +=' <button type="button" class="transactionHistoryList" data-wallet-type="'+ creditType +'" id="transactionHistoryBtn">'+ '<?php echo $translations["M02050"][$language]; /* View History */ ?>' +' ></button> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';

                        sameCurrency = symbol;
                        $('#destinationDiv').append(destinationAddress);
                    }
                })
            });
        }

        $('.cryptoBtn').click(function(){
            var thisValue = $(this).is(":checked");
            // thisValue RETURNS BOOLEAN, TRUE OR FALSE
            // IF TRUE THEN CAN SET TO 1, FALSE CAN SET TO 0
            if(thisValue == true){
                formData = {
                    command : "destinationAddressSet",
                    destination_address : $(this).attr('data-address'),
                    unit : $(this).attr('data-wallet_type'),
                    status : 1
                }
            }else{
                formData = {
                    command : "destinationAddressSet",
                    destination_address : $(this).attr('data-address'),
                    unit : $(this).attr('data-wallet_type'),
                    status : 0
                }
            }
            fCallback = getUpdatedAddress;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('.transactionHistoryList').click(function() {
            navigateSentHistory($(this));
        });
    }

    function getUpdatedAddress(data, message){
        if(data.code == 1){
            formData = {
                command: 'getDestinationAddress'
            };
            fCallback = getWalletAddress;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }else{
            errorOutput(data.message_d);
        }
    }
    
    function navigateSentHistory(elem) {
        var params = elem.attr('data-wallet-type');
        
        $.redirect("withdrawalListing.php", {
            wallet_type_params: params
        });
    }

</script>
<style type="text/css">
.transactionHistoryList {
    padding-top: 10px;
    color: #53c2d4;
    text-decoration: underline;
    background: none;
    border: none;
}

.walletContainer {
    display: flex;
    align-items: center;
    height: 100%;
}

.walletName {
    width: 20%;
    margin: 0 0 0 15px;
}

.walletAddress {
    width: 45%;
    margin: 0 0 0 15px;
}

.walletHistory {
    width: 18%;
    min-width: 160px;
}

@media (max-width: 600px) {
    .walletContainer {
        flex-direction: column;
        align-items: flex-start;
    }

    .walletName {
        width: 100% !important;
        margin: 10px 0 0 15px !important;
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

    .pageHeader {
        font-size: 24px;
    }

    .addBtnContainer {
        width: 100% !important;
        max-width: none;
    }

    .searchBtn {
        width: 100% !important;
    }
}

#transactionHistoryBtn:hover {
    cursor: pointer;
}
</style>


            


