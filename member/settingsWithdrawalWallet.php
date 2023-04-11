<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">

                <div class="col-12 pageHeader mt-3 mb-5">                    
                    <?php echo $translations["M00532"][$language]; /* Settings */ ?>
                </div>

				<div class="d-flex align-items-center">
                    <div class="col-12">
                        <div class="d-flex border-bottom justify-content-between">
                            <nav class="nav">
							  <a class="nav-link " id="profileBtn" href="settings.php" style="font-size: 15px;"><?php echo $translations["M01876"][$language]; /* Profile */ ?></a>
                              <a class="nav-link active" id="walletBtn" href="javascript:void(0)" style="font-size: 15px;"> <?php echo $translations["M01702"][$language]; /* Withdrawal Wallets */ ?> </a>
                              <a class="nav-link" id="securityBtn" href="settingsChangePassword.php" style="font-size: 15px;"><?php echo $translations["M01703"][$language]; /* Security */ ?></a>
                              <a class="nav-link" id="coinBtn" href="settingsAddWallet.php" style="font-size: 15px;"><?php echo $translations["M01704"][$language]; /* Acceptable Currency */ ?></a>
                              <a class="nav-link" id="coinBtn1" href="settingsAddWalletCurrency.php" style="font-size: 15px;"><?php echo $translations["M02016"][$language]; /* Wallet Coin Currency */ ?></a>
                              <!-- <a class="nav-link" id="apiBtn" href="apiIntegration.php" style="font-size: 15px;"><?php echo $translations["M01597"][$language]; /* API Integration */ ?></a> -->
							  <a class="nav-link" id="whitelistBtn" href="whitelistAddresses.php" style="font-size: 15px;"><?php echo $translations["M01713"][$language]; /* Whitelist Addresses */ ?></a>
							  <!-- <a class="nav-link" id="fundOutBtn" href="transferWallet.php" style="font-size: 15px;"><?php echo $translations["M01600"][$language]; /* Fund Out */ ?></a> -->
								
                            </nav>
                        </div>
                    </div>
				</div>
			</div>



			<div class="m-content">

                <div class="col-12" id="walletSection">
                    <div class="row">

                        <!-- <div class="col-12">
                            <div class="m-portlet">
                                <div class="m-portlet__body">
                                    <div class="row">
                                        <div class="col-md-8 align-self-center">
                                            <span id="noWalletMsg" style="display: inline-block;">Do not have crypto wallet?</span> <a href="javascript:void(0)">Connect with TheNux</a> wallet to receive payment instantly without miner fee!
                                        </div>
                                        <div class="col-md-4 mt-4 mt-md-0 align-self-center">
                                            <div class="connectWalletButton">
                                                <img src="images/nuxPay/newDesign/connectIcon.png">Connect with TheNux Wallets
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="col-6">
                            <button id="addBtn" class="btn searchBtn" type="button"><?php echo $translations["M01604"][$language]; /* Add Withdrawal Wallet */ ?></button>
                        </div>

                        <div class="col-12 text-center my-5" id="noWallet" style="display: none">
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


                        <!-- Old Withdrawal Wallet Listing with plugin

                        <div class="col-12 my-5">
                            <div class="m-portlet">
                                <div class="m-portlet__body">
                                    <div class="row" id="destinationDiv">
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-group m-form__group marginLeftBtnAlign">
                                            <span id="saveCoinAddress" class="btn btn btn m-btn--pill m-btn--air btn-outline-metal btn-sm m-btn m-btn--custom newSaveBtnDesign" style="color:white;border-color:#51c2db; background-color: #51c2db"  role="button"> <?php echo $translations["M01270"][$language]; /* Save */ ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="col-12 my-5">
                            <div class="row">
                                <div class="col-12 walletField" id="destinationDiv">
                                    <!-- <div class="row">
                                        <div class="col-12">
                                            <img src="images/cryptocurrencies/USDT.png"> <span>USDT - Tether USD</span>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="m-portlet">
                                                <div class="m-portlet__body">
                                                    <div class="withdrawalBlock row align-items-center">
                                                        <div class="">
                                                            <label class="toggle">
                                                                <input type="checkbox" class="toggle-input cryptoBtn">
                                                                <div class="toggle-controller default-success text-center"></div>
                                                            </label>
                                                        </div>
                                                        <div class="col-md withdrawalBorder">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    Wallet Name
                                                                </div>
                                                                <div class="col-12 stdBold">
                                                                    TheNux Wallet
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-7 withdrawalBorder">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    Destination Address
                                                                </div>
                                                                <div class="col-12 stdBold">
                                                                    <img src="images/nuxGradientLogo.svg" width="15px">0x57579cfc2b22a20e86373d52ac33552d685154e0
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 walletField">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="images/cryptocurrencies/USDT.png"> <span>USDT - Tether USD</span>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="m-portlet">
                                                <div class="m-portlet__body">
                                                    <div class="row align-items-center">
                                                        <div class="">
                                                            <label class="toggle">
                                                                <input type="checkbox" class="toggle-input cryptoBtn">
                                                                <div class="toggle-controller default-success text-center"></div>
                                                            </label>
                                                        </div>
                                                        <div class="col-md py-2 ">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    Wallet Name
                                                                </div>
                                                                <div class="col-12 stdBold">
                                                                    TheNux Wallet
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-7 py-2 ">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    Destination Address
                                                                </div>
                                                                <div class="col-12 stdBold">
                                                                    0x57579cfc2b22a20e86373d52ac33552d685154e0
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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

		</div>
	<?php include 'footerDashboard.php'; ?>
</div>


<?php include 'sharejsDashboard.php'; ?>

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
    var dropdownFake;
    var status;
    var firstTime       = "<?php echo $_POST['firstTime']; ?>";


    $(document).ready(function(){

        // fCallback = getWalletType;
        // formData  = {
        //     command: 'getWalletType'
        // };
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


        // fCallback = getCallbackData;
        // formData  = {
        //     command: 'getCallbackURL'
        // };
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        formData = {
            command: 'getDestinationAddress'
        };
        fCallback = getWalletAddress;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        

        // $("#profileBtn").click(function(){
        //     $("#profileSection").show();
        //     $("#walletSection").hide();
        //     $("#securitySection").hide();
        //     $("#profileBtn").addClass("active");
        //     $("#walletBtn").removeClass("active");
        //     $("#securityBtn").removeClass("active");
        // });

        // $("#walletBtn").click(function(){
        //     $("#walletSection").show();
        //     $("#profileSection").hide();
        //     $("#securitySection").hide();
        //     $("#walletBtn").addClass("active");
        //     $("#profileBtn").removeClass("active");
        //     $("#securityBtn").removeClass("active");
        // });

        // $("#securityBtn").click(function(){
        //     $("#securitySection").show();
        //     $("#profileSection").hide();
        //     $("#walletSection").hide();
        //     $("#securityBtn").addClass("active");
        //     $("#profileBtn").removeClass("active");
        //     $("#walletBtn").removeClass("active");
        // });

    });

    // $(".cryptoBtn").change(function(){
    //     alert(1);
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
                    var name = sanitize(d['wallet_name']);
                    var status = d['status'];
                    var image = d['image'];
                    var symbol = d['symbol'];
					var display_symbol = d['display_symbol'];

                    if(symbol == sameCurrency){
                        destinationAddress =' <div style="padding-left: 9px; padding-right:9px; padding-top:14px; padding-bottom:14px"> ';
                        destinationAddress +=' <div class="withdrawalBlock row align-items-center"> ';

                        // TOGGLE BUTTON
                        if(status == 1){
                            destinationAddress +=' <div style="padding-left: 9px; padding-right:9px; padding-top:14px; padding-bottom:14px"> ';
                            destinationAddress +=' <label class="toggle" style="margin-left: 20px"> ';
                            destinationAddress +=' <input type="checkbox" data-address="'+address+'" data-status="'+status+'" data-wallet_type="'+symbol+'" class="toggle-input cryptoBtn" checked> ';
                            destinationAddress +=' <div class="toggle-controller default-success text-center"></div> ';
                            destinationAddress +=' </label> ';
                            destinationAddress +=' </div> ';
                        }else{
                            destinationAddress +=' <div style="padding-left: 9px; padding-right:9px; padding-top:14px; padding-bottom:14px"> ';
                            destinationAddress +=' <label class="toggle" style="margin-left: 20px"> ';
                            destinationAddress +=' <input type="checkbox" data-address="'+address+'" data-status="'+status+'" data-wallet_type="'+symbol+'" class="toggle-input cryptoBtn"> ';
                            destinationAddress +=' <div class="toggle-controller default-success text-center"></div> ';
                            destinationAddress +=' </label> ';
                            destinationAddress +=' </div> ';
                        }
                        
                        // NAME AND DESTINATION ADDRESS
                        destinationAddress +=' <div class="col-md withdrawalBorder"> ';
                        destinationAddress +=' <div class="row"> ';
                        destinationAddress +=' <div class="col-12"> ';
                        destinationAddress += '<?php echo $translations["M01721"][$language]; /* Wallet Name */ ?>';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' <div class="col-12 stdBold"> ';
                        destinationAddress += name == "" ? d['display_symbol'] + " Wallet-" + (unnamed_wallet_num++) + " ": name;
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' <div class="col-12 col-md-7 withdrawalBorder"> ';
                        destinationAddress +=' <div class="row"> ';
                        destinationAddress +=' <div class="col-12"> ';
                        destinationAddress +=' Destination Address ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' <div class="col-12 stdBold addressBreak"> ';
                        destinationAddress += address;
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
                        destinationAddress +=' <div style="padding-left: 9px; padding-right:9px; padding-top:14px; padding-bottom:14px"> ';
                        destinationAddress +=' <div class="withdrawalBlock row align-items-center"> ';

                        // TOGGLE BUTTON
                        if(status == 1){
                            destinationAddress +=' <div class="" style="padding-left: 9px; padding-right:9px; padding-top:14px; padding-bottom:14px"> ';
                            destinationAddress +=' <label class="toggle" style="margin-left: 20px"> ';
                            destinationAddress +=' <input type="checkbox" data-address="'+address+'" data-status="'+status+'" data-wallet_type="'+symbol+'" class="toggle-input cryptoBtn" checked> ';
                            destinationAddress +=' <div class="toggle-controller default-success text-center"></div> ';
                            destinationAddress +=' </label> ';
                            destinationAddress +=' </div> ';
                        }else{
                            destinationAddress +=' <div class="" style="padding-left: 9px; padding-right:9px; padding-top:14px; padding-bottom:14px"> ';
                            destinationAddress +=' <label class="toggle" style="margin-left: 20px"> ';
                            destinationAddress +=' <input type="checkbox" data-address="'+address+'" data-status="'+status+'" data-wallet_type="'+symbol+'" class="toggle-input cryptoBtn"> ';
                            destinationAddress +=' <div class="toggle-controller default-success text-center"></div> ';
                            destinationAddress +=' </label> ';
                            destinationAddress +=' </div> ';
                        }
                        
                        // NAME AND DESTINATION ADDRESS
                        destinationAddress +=' <div class="col-md withdrawalBorder"> ';
                        destinationAddress +=' <div class="row"> ';
                        destinationAddress +=' <div class="col-12"> ';
                        destinationAddress += '<?php echo $translations["M01721"][$language]; /* Wallet Name */ ?>';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' <div class="col-12 stdBold"> ';
                        destinationAddress += name == "" ? d['display_symbol'] + " Wallet-" + (unnamed_wallet_num++) + " ": name;
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' <div class="col-12 col-md-7 withdrawalBorder"> ';
                        destinationAddress +=' <div class="row"> ';
                        destinationAddress +=' <div class="col-12"> ';
                        destinationAddress +=' Destination Address ';
                        destinationAddress +=' </div> ';
                        destinationAddress +=' <div class="col-12 stdBold addressBreak"> ';
                        destinationAddress += address;
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


    // function getWalletType(data,message){
    //     var wallets = data.result.coin_data;
    //     var walletActive ='';
    //     var destinationAddress ='';

    //     if (!wallets) {
    //         showMessage('<?php echo $translations["M00309"][$language]; /* An internal error has occured. Please contact to our support team.  */ ?> ', 'danger', 'Failed', 'times-circle-o', 'dashboard.php');
    //     }

    //     $.each(wallets,function(k,v){
    //         var displayName = v['wallet_type'];
    //         displayName = displayName.toLowerCase().replace(/\b[a-z]/g, function(letter) {
    //             return letter.toUpperCase();
    //         });

    //         destinationAddress =' <div class="col-12 mb-1"> ';
    //         destinationAddress +=' <div class="row"> ';
    //         destinationAddress +=' <div class="col-xl-2 col-lg-2 col-md-3 col-12 text-md-center">';
    //         destinationAddress +=' <div class="three columns"> ';
    //         destinationAddress +=' <label class="toggle"> ';
    //         destinationAddress +=' <input type="checkbox" class="toggle-input cryptoBtn" id="'+v['wallet_type']+'Status" data-type="'+v['wallet_type']+'">';
    //         destinationAddress +=' <div class="toggle-controller default-success"></div>';
    //         destinationAddress +=' </label>';
    //         destinationAddress +=' </div>';
    //         destinationAddress +=' </div>';

    //         destinationAddress +=' <div class="col-xl-3 col-lg-3 col-md-3 col-12 ml-3 ml-md-0 imageOpacity'+v['wallet_type']+'" style="margin-left: -30px; opacity: 0.5">';
    //         destinationAddress +=' <h3 class="m-form__heading-title activeTitle"> ';
    //         destinationAddress +=' <img class="mr-2" src="'+v['image']+'" width="35">';
    //         destinationAddress +=' <span style="vertical-align: middle; font-weight: 300; font-size: 15px">'+v['name']+'</span> ';
    //         destinationAddress +=' </h3> ';
    //         destinationAddress +=' </div>';

    //         destinationAddress +=' <div class="col-xl-7 col-lg-7 col-md-6 col-12"> ';
    //         destinationAddress +=' <div class="form-group m-form__group cryptoSection pb-3 Destination paddingMobileRightInput" style=""> ';
    //         destinationAddress +=' <input type="text" id="'+v['wallet_type']+'Address" name="example-text-input" class="form-control destinationAddress" placeholder="" disabled>';
    //         destinationAddress +=' <span id="addressDisplayError" class="montserratRegularFont" style="display: none; color: red"></span> ';
    //         destinationAddress +=' </div> ';
    //         destinationAddress +=' </div> ';
    //         destinationAddress +=' </div> ';
    //         destinationAddress +=' </div> ';

    //         $('#destinationDiv').append(destinationAddress);
    //     });

    //     action(wallets);
    // }

    function getWalletData(data,message){
        $.each(data.result.wallets, function(k, v) {
            if (v["status"]==1) {
                $("."+v["type"]+"ActiveCrypto").addClass("cryptoBox");
                // $("."+v["type"]+"Active").show();
                $("."+v["type"]+"Destination").show();
                $("#"+v["type"]+"Status").attr('checked', true);
                $("#"+v["type"]+"Status").attr('data-status', '1');

                $("#"+v["type"]+"Address").prop('disabled', false);
                $(".imageOpacity"+v["type"]).css({ opacity: 1 });
            }else{
                $("#"+v["type"]+"Status").attr('checked', false);
                $("#"+v["type"]+"Status").attr('data-status', '0');
            }
        });
    }

    function action(wallets){

        if (!firstTime) {
            $('.activeDIV').show();
            var formData = {
                command          : 'getDestinationAddress'
            };

            var fCallback      = loadDestinationAddress;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        fCallback = getWalletData;
        formData  = {
            command: 'getWalletData'
        };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        

        $('#saveCoinAddress').click(function(){
            var storeWalletAddress = "";
            var storeWalletAry = [];

            $('.cryptoBtn').each(function()
            {
                var walletType = $(this).attr("data-type");
                var destinationAddress = $('#'+walletType+'Address').val();

                if( $(this).is(':checked') )
                {
                    storeWalletAddress = {
                      wallet_type           : walletType,
                      destination_address   : destinationAddress,
                      status                : 1
                    };

                    storeWalletAry.push(storeWalletAddress);
                }
            });

            var formData = {
                command                  : 'webpaydestinationaddresssetv1',
                crypto_address_details   : storeWalletAry
            };
            var fCallback = setDestinationAddress;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });
    }

    function setDestinationAddress(data, message) {
        firstTime="";

        showMessage(message, 'success', '<?php echo $translations["M01173"][$language]; /* Success */ ?>', 'check-circle-o', 'settings.php');

        
    }

    function loadDestinationAddress(data, message) {

        var address = data.result.destination_addresses;

        $.each(address, function(k, v) {
            $('#'+k+"Address").val(v);
            $('#'+k+"CancelBtn").attr("data-address",v);
        });
    }


    function getCallbackData(data,message){
        $('#callBackURL').val(data.result.callback_url);
    }

    $('#addBtn').click(function(){
        $.redirect("addWithdrawalAddress.php");

    });


    

   



 


</script>
