<?php include 'include/config.php'; ?>
<?php include 'headHomepage.php'; ?>

<style type="text/css">
     .toggle {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  display: block;
  height: auto;
  width: 7.5rem;
  cursor: pointer;
}
.toggle-input {
  display: none;
  margin: 0;
}
.toggle-input:checked + .toggle-controller.default-success {
  border: 0.125rem solid grey;
  background: #2196F3;
}
.toggle-input:checked + .toggle-controller.default-success:after {
  left: 40px;
  background: #2196F3;
  content: '\2713';
  padding: 3px 1px 0 0;
}
.toggle-controller.default-success {
  position: relative;
  display: inline-block;
  height: 30px;
  width: 70px;
  border: 0.125rem solid grey;
  -webkit-border-radius: 1.5625rem;
  -moz-border-radius: 1.5625rem;
  border-radius: 1.5625rem;
  background: rgba(46, 45, 44, 0.025);
  -webkit-transition: all 0.25s ease;
  -moz-transition: all 0.25s ease;
  -o-transition: all 0.25s ease;
  transition: all 0.25s ease;
}
.toggle-controller.default-success:after {
  position: absolute;
  top: 1px;
  left: 5px;
  content: '';
  display: block;
  height: 23px;
  width: 23px;
  -webkit-border-radius: 1.5625rem;
  -moz-border-radius: 1.5625rem;
  border-radius: 1.5625rem;
  -webkit-transition: all 0.25s ease;
  -moz-transition: all 0.25s ease;
  -o-transition: all 0.25s ease;
  transition: all 0.25s ease;
  padding: 2px 2px 0 0;

  background: #d6d6d6;
  color: #FFF;
  content: '\2715';
}
 </style>

<?php
if((isset($_POST['access_token']) && $_POST['access_token'] != "")) {
		$_SESSION["access_token"] = $_POST['access_token'];
		$_SESSION["business"]["uuid"] = $_POST['businessID'];
}

    if(  isset($_POST['mobile_phone']) ) {
        $_SESSION["mobile_phone"] = $_POST['mobile_phone'];    
    }

    if(  isset($_POST['email_address']) ) {
        $_SESSION["mobile_phone"] = $_POST['mobile_phone'];    
    }
 ?>

<body>
<div class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed kt-page--loading">
<div class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed kt-page--loading">

<?php include 'headerHomapage.php'; ?>

<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor customSend" style="">
        <section class="nuxPaySection01BG">
            <div class="kt-container ">
                <div class="row justify-content-center customPaddingSendReceive1" style="">
                    <div class="col-11">
                        <div class="row">
                            <div class="col-12 row">
                                <div id="nuxPaySection01Content01" class="col-sm-12 col-md-12 col-lg-7" >    
                                    <div class="row h-50 d-flex align-items-end">
                                        <h1>
                                            <?php echo $translations["M01823"][$language]; /*  Receive payments globally */ ?>
                                        </h1>
                                    </div>     
                                    <div class="row">
										
										<button type="button" class="btn custonButtonSend" style="margin-top:25px;"  onclick="openReceiveVideo()">
											<img src="images/sendandreceive/video-icon.png"> &nbsp &nbsp <?php echo $translations["M01824"][$language]; /*  See how we receive fund */ ?>
										</button>
									
                                    </div>   
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-5" id="nuxPaySection01ImgDiv2">                                                                                                     
                                
                                    <!-- Request Reedem -->
                                    <?php if($_SESSION['access_token'] != '') {?>
                                        <div class="row" style="padding-bottom:25px">                                    

                                            <!-- Request -->
                                            <div class="col-sm-6 receiveSelect">
                                                <a>
                                                    <div class="row justify-content-center">
                                                        <span>                                                                                                            
                                                            <?php echo $translations["M01792"][$language]; /*  Receive*/ ?>
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- Request -->

                                            <!-- Redeem -->
                                            <div class="col-sm-6 receiveNotSelect">
                                                <a href="redeemFund.php" style="color:black">
                                                    <div class="row justify-content-center">
                                                        <span>                                                             
                                                            <?php echo $translations["M01759"][$language]; /*  Redeem */ ?>
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- Redeem -->
                                        </div>
                                        <?php } ?>
                                    <!-- Request Reedem -->

                                    <!-- sender Name -->
                                    <input type="text" class="form-control requestInput" id="payeeName" placeholder="<?php echo $translations["M01511"][$language]; /*  Your name */ ?>" value="<?php echo $_POST['payeeName']; ?>">
                                        <!-- sender Name -->    

                                    <!-- sender -->
                                    <div class="row" id="payee_phone_Option" style="display:<?php if(!empty($_POST['payeeEmail'])){echo 'none';} else {echo '';} ?>;">
                                        <div id="mobileSection" class="container-fluid" >                                            

                                            <div class="row" id="phoneOption">

                                                <div id="payeeCountryCodeTmp" class="phoneNumberPrefix" style="margin-top: 20px;line-height: 36px;font-size: 15px;">+</div>
                                                <div class="nuxPaySection01Part02">
                                                    <input type="text" id="payeeMobileNumber" style="padding-left: 16px;padding-right: 8px;" class="form-control requestInput " placeholder=" 	<?php echo $translations["M01513"][$language]; /*  Your Mobile number */ ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $_POST['phoneNumber']; ?>">
                                                </div>

                                            </div>
                                            	<div style="display: none;" class="nuxPaySection01Part01" id="country_code">
													<select id="countryCode" class="form-control nuxPaySection01Dropdown">
														<?php include 'phoneList.php'; ?>
													</select>
												</div>
                                            <div id="payeeSwitchEmail" class= "col-12 form-group" style="padding-left:0px;display:flex; text-decoration: underline;">
                                                <a href="#"><?php echo $translations["M01495"][$language]; /*  Switch to Email */ ?></a>
                                            </div>
                                        </div>
                                        
                                        <div class="col-2 pr-0 align-self-end dailingCodeInput" id="payeeCountryCode" style="display:none;">
                                            <select name="" id="payeeDialingArea" class="selectOption form-control requestInput">
                                                <?php include 'phoneList.php'; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!--  -->                                    
                                    <div class="row" id="payee_email_Option" style="display:<?php if(!empty($_POST['payeeEmail'])){echo '';} else {echo 'none';} ?>">
                                        <div class="container-fluid" >
                                            <input type="text" class="form-control requestInput" id="payeeEmailAddress" placeholder="<?php echo $translations["M01512"][$language]; /*  Your email address */ ?>" value="<?php echo $_POST['payeeEmail']; ?>">
                                        </div>

                                        <div id="payeeSwitchMobile" class= "col-12 form-group" style="display:flex; text-decoration: underline; margin-top:10px">
                                            <a href="#"><?php echo $translations["M01676"][$language]; /*  Switch to Mobile Number */ ?></a>
                                        </div>
                                    </div>
                                    <!-- sender -->
                                    
                                    <!-- 1 row 2 columns -->
                                    <div class="row">
                                        <div class='col-8' style="padding-top:5px; padding-bottom:15px; display:block">
                                            <div class="row" style="text-align:right">
                                                <h4 style="width:100%">
                                                    <?php if($_SESSION['access_token'] != '') {?>
                                                         
                                                        &nbsp
                                                    <?php } else { ?>                                                    
                                                        &nbsp
                                                    <?php } ?>                                                                                                        
                                                </h4>                                                                                                                        
                                            </div>
                                            <div class="row">                                        
                                                    <span class="w-100" style="text-align:right;">                                                    
                                                        <?php if($_SESSION['access_token'] != '') {?>
                                                          
                                                            &nbsp
                                                    <?php } else { ?>                                                    
                                                        &nbsp
                                                    <?php } ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class='col-2' >
                                        <span class="w-100" style="text-align:right;">                                                    
                                                    <?php if($_SESSION['access_token'] != '') {?>
                                                        
                                                        &nbsp
                                                    <?php } else { ?>                                                    
                                                        &nbsp
                                                    <?php } ?>
                                        </div>
                                        <div class='col-1 backgroundGifArrowUp' style="">
                                                                                        
                                        </div>
                                    </div>
                                    <!-- 1 row 2 columns -->

                                    <!-- receiver -->
                                    <input type="text" class="form-control requestInput" id="payerName" placeholder="<?php echo $translations["M01557"][$language]; /*  Payer Name */ ?>" value="<?php echo $_POST['payerName']; ?>">
                                    <!-- receiver -->                       

                                    <!-- name -->
                                    

                                    <!-- mobile section -->
                                    <div class="row" id="payerMobileSection" style="display:<?php if(!empty($_POST['payerEmail'])){echo 'none';} else {echo '';} ?>;">
                                        <div class="col-12" id="mobileSection" style="width:100%;">
                                            <div class="row" id="phoneOption">

                                                <div id="payerCountryCodeTmp" class="phoneNumberPrefix" style="margin-top: 20px;line-height: 38px;font-size: 15px;">+</div>
                                                <div class="nuxPaySection01Part02">
                                                    <input type="text" id="payerMobileNumber" autocomplete="no" style="padding-left: 16px;padding-right: 8px;" class="form-control requestInput" placeholder="	<?php echo $translations["M01563"][$language]; /*  Payer Mobile Number */ ?>" value="<?php echo $_POST['payerMobileNumber']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>

                                            </div>
                                            <div class="col-2 pr-0 align-self-end dailingCodeInput" id="payerCountryCode" style="display:none;">
                                                <select name="" id="payerDialingArea" class="selectOption form-control requestInput">
                                                    <?php include 'phoneList.php'; ?>
                                                </select>
                                            </div>
                                            <div id="payerSwitchEmail" class= "col-12 mt-2 form-group" style="display:flex; text-decoration: underline;padding-left: 0px;">
                                                <a href="#"><?php echo $translations["M01495"][$language]; /*  Switch to Email */ ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- email section -->
                                    <div class="row" id="payerEmailSection" style="display:<?php if(!empty($_POST['payerMobileNumber'])){echo 'none';} else {echo '';} ?>;">

                                        <div class="col-12 form-group" >
                                            <input placeholder="<?php echo $translations["M01826"][$language]; /*  Payer Email Address */ ?>" id="payerEmail" type="text" class="form-control requestInput" value="<?php echo $_POST['payerEmail']; ?>">
                                        </div>

                                        <div id="payerSwitchMobile" class= "col-12 form-group" style="text-decoration: underline;margin-top:-15px">
                                            <a href="#"> <?php echo $translations["M01676"][$language]; /*  Switch to mobile */ ?></a>
                                        </div>
                                    </div>
                                    
                                    
                                    <!-- amount -->        
                                    
                                        <div class="input-group">
                                            <input type="text" id="amount" class="form-control requestInput" aria-label="Text input with dropdown button" placeholder="<?php echo $translations["M01800"][$language]; /*  Amount */ ?>" value="<?php echo $_POST['amount']; ?>">
<!--                                            
                                            <div class="input-group-append">
                                                <button id="dropdownCurrency" class="btn btn-outline-secondary " style="background-color:green;color:white;margin-top:19px" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="tetherusd"> USDT </button>
                                                <div id="dropdownCurrencySelect" class="dropdown-menu">
                                                    <a id="usdtOption" class="dropdown-item" href="#">USDT</a>
                                                    <a id="btcOption" class="dropdown-item" href="#">BTC</a>
                                                    <a id="ethOption" class="dropdown-item" href="#">ETH</a>
                                            </div>  
                                            </div>
-->
											<div class="dashboardBoxWidth3 align-self-center text-center walletTypeDropdown2" style="margin-top:20px;">
                                                <select id="walletDropdown" class="full-width selectValue"></select>
                                            </div>
                                        </div>
                                        <div class= "col-12 mt-2 form-group" style="display:flex; text-decoration: underline; margin-left: -10px;">
                                            <a style="background: transparent;" id="manageSettingList" href="settingsAddWallet.php"> <?php echo $translations["M02017"][$language]; /*  Manage Setting List */ ?></a>                                        
                                        </div>
                                    
                                    <!-- amount -->                       


                                    <input type="text" class="form-control requestInput" maxlength="50" id="paymentDescription" placeholder="<?php echo $translations["M01571"][$language]; /*  Payment Description */ ?>" value="<?php echo $_POST['paymentDescription']; ?>">

                                    <!-- Promo code -->
                                    <div id="promotionCodeDiv">
                                        <input type="text" class="form-control requestInput" id="promotionCode" placeholder="<?php echo $translations["M01543"][$language]; /*  Promotion Code */ ?>" value="<?php echo $_POST['referralCode']; ?>">
                                        <div class= "col-12 mt-2 form-group" style="display:flex; text-decoration: underline; margin-left: -10px;">
                                            <a style="background: transparent;" id="switchEmail" href="#"> <?php echo $translations["M01572"][$language]; /*  Enter promotion code to get $10 for free */ ?></a>                                        
                                        </div>
                                    </div>
                                    <!-- Promo code -->

                                    <div class="row" style="margin-top: 5px;">
                                        <div class="col-2">

                                            <div style="">
                                                <label class="toggle">
                                                    <input id="newAddressSwitch" type="checkbox" onclick="SwitchListing()" data-address="" data-status="" data-currency_id="" data-wallet_type="" class="toggle-input cryptoBtn" >
                                                    <div class="toggle-controller default-success text-center"></div>

                                                </label>
                                                
                                            </div>

                                        </div>
                                        <div class="col-10">
                                            <div style="line-height: 35px;font-weight: bold;">New Address
                                                <i class="fa fa-question-circle-o newSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" 
                                                data-original-title="By turning on this option, you will generate new address for each receive fund request." 
                                                style="margin-left: 5px;"></i></div>

                                        </div>

                                    </div>

                                    <button id="continueButton" onclick="clickContinue()" type="button" class="btnRequest btn btn-primary btn-block mt-5"><?php echo $translations["M01760"][$language]; /*  Continue */ ?></button>

                                </div>
                            </div>
                            

                        </div>
                    </div>    
                
                </div>
            </div>
        </section>
        
    </div>
</div>
</div>
</div>
	
<div class="modal fade" id="videoModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
           
          <div class="modal-body">
			<video id="videoID" width="100%" controls>
				<source src="https://s3-ap-southeast-1.amazonaws.com/com.nuxpay/sendandreceivefund/main_receive.mp4" type="video/mp4" >
			 </video>
		  </div>
        </div>
    </div>
</div>
    
    <!-- <div class="container">
            <div class="row">
                <div class="col">
                1 of 2
                </div>
                <div class="col">
                2 of 2
                </div>
            </div>
    </div> -->
</body>

<?php include 'sharejsDashboard.php'; ?>
<script>        
    var code = "<?php echo $_POST['code']; ?>";
    var url             = 'scripts/reqPaymentGateway.php';
    var url2             = 'scripts/reqEditBusiness.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 1;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var phoneNumber = "<?php echo $_POST['phoneNumber']; ?>";
    var countryNumber = "<?php echo $_POST['countryNumber']; ?>";
    var payerCountryCode = "<?php echo $_POST['payerCountryCode']; ?>";
    var payeeEmail = "<?php echo $_POST['payeeEmail']; ?>";
    var countryCode     = "<?php echo $countryCode; ?>";
    var payerType = "mobile";
    var payeeType;
    var code = "<?php echo $_POST['code']; ?>";
    var payeeNickname = "<?php echo $_POST['payeeNickname']; ?>";
    var referralCode;
    var dropdownFake;     
    var accessToken = "<?php echo $_SESSION["access_token"]; ?>";
    var disableSwith = false;
	var payerMobileNumber = "<?php echo $_POST['payerMobileNumber'];?>";

    $(document).ready(function () {    

		
		function format(val) {
			return val.id;
		}

		$('#countryCode').select2({
			dropdownAutoWidth : true,
			templateSelection: format
		});

		$('#countryCode').find('option').each(function(){
            if (countryCode && countryCode != "ZZ") {
                if ($(this).attr("data-countrycode") == countryCode) {
                	$(this).parent().val(this.value).trigger('change');
                }
            }else{
                if ($(this).attr("data-countrycode") == "US") {
                	$(this).parent().val(this.value).trigger('change');
                }
            }
        });
		defaultCountryCode = $('#countryCode').val();
		
		$('.phoneNumberPrefix').text(defaultCountryCode);

			$('#payeeMobileNumber').on('focus', function(e) {

				var tmpPhoneNumber = sanitize($('#payeeMobileNumber').val());

				if(tmpPhoneNumber=="") {
					$('#payeeMobileNumber').val(defaultCountryCode.substring(1));
				}

				$('#payeeMobileNumber').attr("placeholder", "");
				$('#payeeCountryCodeTmp').text('+');

        $('#payeeMobileNumber').caretToEnd();

			});

			$('#payeeMobileNumber').on('blur', function(e) {

				var tmpPhoneNumber = sanitize($('#payeeMobileNumber').val());

				if(tmpPhoneNumber=="" || "+"+tmpPhoneNumber==defaultCountryCode) {
					$('#payeeMobileNumber').val('');
					$('#payeeCountryCodeTmp').text(defaultCountryCode);
				}

				$('#payeeMobileNumber').attr("placeholder", "         <?php echo $translations["M01513"][$language]; /*  Your Mobile Number  */ ?>");
			});



			$('#payerMobileNumber').on('focus', function(e) {

				var tmpPhoneNumber = sanitize($('#payerMobileNumber').val());

				if(tmpPhoneNumber=="") {
					$('#payerMobileNumber').val(defaultCountryCode.substring(1));
				}

				$('#payerMobileNumber').attr("placeholder", "");
				$('#payerCountryCodeTmp').text('+');

        $('#payerMobileNumber').caretToEnd();
			});

			$('#payerMobileNumber').on('blur', function(e) {

				var tmpPhoneNumber = sanitize($('#payerMobileNumber').val());

				if(tmpPhoneNumber=="" || "+"+tmpPhoneNumber==defaultCountryCode) {
					$('#payerMobileNumber').val('');
					$('#payerCountryCodeTmp').text(defaultCountryCode);
				}

				$('#payerMobileNumber').attr("placeholder", "         <?php echo $translations["M01563"][$language]; /*  Payer Mobile Number */ ?>");
			});
		
		if(phoneNumber != ''){
			$('#payeeCountryCodeTmp').text('+');

		}
		
		if(payerMobileNumber != ''){
			$('#payerCountryCodeTmp').text('+');
		}
		
		
        $('#divPayeeEmail').hide();
        // $('#kt_header').css('padding-bottom', '20px');
        // $('#kt_header').css('border-bottom-style', 'solid');
        // $('#kt_header').css('border-bottom-width', '1px');
        // $('#kt_header').css('border-bottom-color', '#e1e1ef');
        $('#languageDiv').css('border-style','none');            
        payeeType = "mobile";
        payerType = "mobile";     
        
        if($('#payeeEmailAddress').val()) {
            // $('#payerEmailSection').hide();
            // payeeType = "email";
            payeeSwitchEmail();            
        } else {
            $('#payee_phone_Option').show();
            $('#payee_email_Option').hide();                
            payeeType = "mobile";
        }

        if(!($('#payerEmail').val())) {
            $('#payerEmailSection').hide();
            payerType = "mobile";
        } else {
            payerType = "email";
        }

        loadProfileDetails();        

        //  getWallettType
        // formData  = {
        //     command: 'getWalletType'
        //     // command: 'getWalletBalance',
        //     // wallet_status: checkWalletStatus
        // };
        // fCallback = getWalletType; 
        // ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        if(accessToken == ''){//not login
            $('#manageSettingList').hide();
            formData  = {
                command: 'getWalletType'
            };
            fCallback = getWalletType; 
            ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        }

        if(accessToken != ''){//after login
            $('#manageSettingList').show();
            SwitchListing();
        }

		$('#videoModal').on('shown.bs.modal', function (e) {
			$('#videoID').trigger('play');
		})
		
		$('#videoModal').on('hidden.bs.modal', function (e) {
			$('#videoID').trigger('pause');
		})
        
    });   
	
    function SwitchListing() {
        var checkBox = document.getElementById("newAddressSwitch");
        if(checkBox.checked == true && accessToken != ''){ //PG
            formData  = {
                command: 'getWalletType',
                setting_type : 'payment_gateway'
            };
            fCallback = getWalletType; 
            ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        if(checkBox.checked == false && accessToken != ''){ //  BC
            formData  = {
                command: 'getWalletType',
                setting_type : 'nuxpay_wallet'
            };
            fCallback = getWalletType; 
            ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
    }

    function getWalletType(data,message){
        // var wallets = data.result.coin_data;
        var wallets = data.result.coin_data;

        if (wallets && dropdownFake !=1) {
            $.each(wallets, function(key, val){
                // if(val['wallet_type'] == 'tetherusd' || val['wallet_type'] == 'ethereum' || val['wallet_type'] == 'bitcoin'){
                $('#walletDropdown').append('<option dataName="'+ val['name'] +'" data-image="'+val['image']+'" value="'+ val['wallet_type'] +'">'+ val['display_symbol'] +'</option>')
                // }
                
            });
            dropdownFake = 1;
        }if (wallets && dropdownFake ==1) {
            $('#walletDropdown').empty();
            $.each(wallets, function(key, val){
                // if(val['wallet_type'] == 'tetherusd' || val['wallet_type'] == 'ethereum' || val['wallet_type'] == 'bitcoin'){
                $('#walletDropdown').append('<option dataName="'+ val['name'] +'" data-image="'+val['image']+'" value="'+ val['wallet_type'] +'">'+ val['display_symbol'] +'</option>')
                // }
                
            });
            dropdownFake = 1;
        }


        $('#walletDropdown').select2({
            // dropdownAutoWidth : true,
            width: '180px',
            minimumResultsForSearch: Infinity,
            templateResult: formatState,
            templateSelection: formatState
        });


        $('select#walletDropdown option:selected').val(wallets[0].wallet_type).trigger('change');
        selectedWalletType = wallets[0].wallet_type;
        


    }

    function loadProfileDetails() {
        if(!accessToken) {            
            return;
        }
        // getProfileData
        formData2  = {
            command: 'getProfileData'
        };
        
        fCallback2 = loadProfile;        
        ajaxSend('scripts/reqEditBusiness.php', formData2, method, fCallback2, debug, bypassBlocking, bypassLoading, 0);
        
    }

    function loadProfile(data, message){                        
            var xun_business = data.xun_business;
            var business_email = xun_business.business_email;
            var business_phone_number = xun_business.business_country_code+xun_business.business_phone_number;
            var business_name = xun_business.business_name;
            
            if (business_name) {                
                $('#payeeName').val(business_name);    
				$("#payeeName"). attr('readonly','readonly');
                $('#promotionCodeDiv').hide();
            }
            if (business_phone_number) {                
                $('#payeeMobileNumber').val(business_phone_number);
                $('#payeeCountryCodeTmp').text('+');
            } else {
                if (business_email) {                
                    payeeSwitchEmail();
                    $('#payeeEmailAddress').val(business_email);                    
                    $("#payeeEmailAddress"). attr('readonly','readonly');                    
                }
            }
            disableSwith = true;
            $('#payeeSwitchMobile').css('text-decoration', 'none')
            $('#payeeSwitchMobile a').replaceWith(function(){
                return $("<span>" + '&nbsp' + "</span>");
            });
            $('#payeeSwitchEmail').css('text-decoration', 'none')
            $('#payeeSwitchEmail a').replaceWith(function(){
                return $("<span>" + '&nbsp' + "</span>");
            });


            
            
            
        }
    
	function formatState (method) {
		if (!method.id) {
			return method.text;
		} 


		var optimage = $(method.element).attr('data-image')
		if(!optimage){
		return method.text;
		} else {                    
			var $opt = $(
						'<span><img src="'+optimage+'" class="walletTypeIcon" /> <span style="vertical-align: middle; color:black;">' + method.text + '</span></span>'
			);
			return $opt;
		}
	}
		
    
    $('#usdtOption').click(function(e) {
        $('#dropdownCurrency').text('USDT');
        $('#dropdownCurrency').value('tetherusd');
        e.preventDefault();
    })
    $('#btcOption').click(function(e) {
        $('#dropdownCurrency').text('BTC');
        $('#dropdownCurrency').value('ethereum');
        e.preventDefault();
    })
    $('#ethOption').click(function(e) {
        $('#dropdownCurrency').text('ETH');
        $('#dropdownCurrency').value('ethereum');
        e.preventDefault();
    })


    function payeeSwitchEmail() {
        $('#payee_phone_Option').hide();
        $('#payee_email_Option').show();        

        payeeType = "email";
    }
    
    $('#payeeSwitchEmail').click(function (e) {			        
        if (disableSwith) {
            return ;
        }
        $('#payee_phone_Option').hide();
        $('#payee_email_Option').show();        

        // $('#payeeSwitchMobile').show();
        // $('#payeeEmailAddress').show();
        payeeType = "email";
        e.preventDefault()        
    });

    $('#payeeSwitchMobile').click(function (e) {        
        if (disableSwith) {
            return ;
        }
        $('#payee_phone_Option').show();
        $('#payee_email_Option').hide();                
        payeeType = "mobile";
        e.preventDefault()
        
    });

    $('#payerSwitchEmail').click(function (e) {
        $('#payerEmailSection').show();
        $('#payerMobileSection').hide();        
        $('#payerMobileNumber').val('');
        payerType = "email";
        e.preventDefault()           
    });

    $('#payerSwitchMobile').click(function (e) {
        console.log("payerSwitchMobile");
        $('#payerEmailSection').hide();
        $('#payerMobileSection').show();
        $('#payerEmail').val('');
        payerType = "mobile";
        e.preventDefault()      
    });

    //  click continue button
    function clickContinue(e) {               
        var payeeName = sanitize($("#payeeName").val());
        var payeeDialingArea = sanitize($("#payeeDialingArea").val());
        var payeeMobileNumber = sanitize($('#payeeMobileNumber').val());
        var payeeEmailAddress = sanitize($('#payeeEmailAddress').val());        
        var payerName = sanitize($("#payerName").val());
        var payerEmail = sanitize($("#payerEmail").val());        
        var payerDialingArea = sanitize($("#payerDialingArea").val());
        var payerMobileNumber = sanitize($("#payerMobileNumber").val());
        var amount = sanitize($("#amount").val());
        var paymentDescription = sanitize($("#paymentDescription").val());
        var paymentItemList = 1;
        var promotionCode = $('#x').val();

        var currency  = sanitize($('select#walletDropdown option:selected').val());       
        
        if (payeeName == '') {
            var message = "Please enter your name";
            errorOutput(message);
            return false;
        }
        
        if (payeeDialingArea == '') {
            var message = "Please enter your dialing area";
            errorOutput(message);
            return false;
        }
                
        if (payeeMobileNumber == '' && payeeEmailAddress == '') {
            var message = "Please enter your mobile number or email";
            errorOutput(message);
            return false;
        }
        else{
            if(payeeMobileNumber != ''){
                if(/[^0-9.+]/.test(payeeMobileNumber)){
                    var message = "Only numbers and symbols are allowed for mobile number";
                    errorOutput(message);
                    return false;
                }
            } else {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			    if(!emailReg.test(payeeEmailAddress)) {
                    var message = "Please enter a valid email";
                    errorOutput(message);
				    return false;
			    }
            }
		}

        if (payerName == '') {
            var message = "<?php echo $translations["M01689"][$language]; /*  Please enter Payer Name */ ?>";
            errorOutput(message);
            return false;
        }

        if (payerDialingArea == '' && payerMobileNumber != '') {
            var message = "<?php echo $translations["M01761"][$language]; /*  Please enter Payer Dialing Area */ ?>";
            errorOutput(message);
            return false;
        }
        if (payerMobileNumber == '' && payerEmail == '') {
            var message = "<?php echo $translations["M01825"][$language]; /* Please enter Payer Mobile Number or Payer Email */ ?>";
            errorOutput(message);
            return false;
        } else{
            if(payerMobileNumber != ''){
                if(/[^0-9.+]/.test(payerMobileNumber)){
                    var message = "<?php echo $translations["M01763"][$language]; /* Only numbers and symbols are allowed for mobile number */ ?>";
                    errorOutput(message);
                    return false;
                }
            } else {
                payerDialingArea = "";
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			    if(!emailReg.test(payerEmail)) {
				    var message = "<?php echo $translations["M01534"][$language]; /* Please enter a valid email */ ?>";
                    errorOutput(message);
                    return false;
			    }
            }
        }        
        if (amount == '') {
            var message = "<?php echo $translations["M01764"][$language]; /* Please enter amount */ ?>";
            errorOutput(message);
            return false;
        }else{
			if(/[^0-9.]/.test(amount)){
                var message = "<?php echo $translations["M01765"][$language]; /* Only numbers and symbols are allowed for amount */ ?>";
				errorOutput(message);
				return false;
			}
        }
        
        if(paymentDescription=='') {
            var message = "<?php echo $translations["M01827"][$language]; /* Payment description cannot be empty */ ?>.";
            errorOutput(message);
            return false;
        }

        

        var walletType = $('select#walletDropdown option:selected').val();       
        

        formData = {
            command : 'requestFundVerification',
            currency: walletType,            
            payee_name : payeeName,
            payee_email_address : payeeEmailAddress,
            // payeeDialingArea : payeeDialingArea,
            payee_mobile_phone : payeeMobileNumber,
            payer_name : payerName,
            payer_email_address : payerEmail,
            // payerDialingArea : payerDialingArea,
            //payer_dialing_area : payerDialingArea,
            //payer_mobile_phone : payerMobileNumber,
            payer_mobile_phone_full : payerMobileNumber,
            payment_amount : amount,
            payment_description : paymentDescription,
            payment_item_list : paymentItemList,
            payee_type : payeeType,
            payer_type : payerType,
            referral_code : promotionCode,
            toggle_new_address: $("#newAddressSwitch").is(":checked") ? "1" : "-1",
        };
        
        fCallback = verifiedSuccess;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // if(payeeType == 'mobile' && !(payeeMobileNumber)) {
        //     alert('cannot be empty!! mobile');     
        // } else if(payeeType == 'email' && !(payeeEmailAddress)) {
        //     alert('cannot be empty!! email');     
        // }

        // if (!payeeName) {
        //     alert('cannot be empty!! payeeName');     
        // }                          
    }

    function verifiedSuccess(data, message) {
        var payeeName = sanitize($("#payeeName").val());
        var payeeDialingArea = sanitize($("#payeeDialingArea").val());
        var payeeMobileNumber = sanitize($("#payeeMobileNumber").val());
        var promotionCode = sanitize($('#promotionCode').val());
		var walletType = sanitize($('#dropdownCurrency').text());                
        
		var walletType =  $('select#walletDropdown option:selected').val();       
		var symbol =  $('select#walletDropdown option:selected').text();   

        var setData = data.data;
        setData['payeeName'] = payeeName;
        setData['payeeDialingArea'] = payeeDialingArea;
        setData['payeeMobileNumber'] = payeeMobileNumber;
        setData['referral_code'] = promotionCode;
        setData['userCode']= code;
		setData['symbol'] = symbol;
		setData['walletType'] = walletType;
        $.redirect("receiveReview.php", setData);
    }

    function errorOutput(message){        
		showMessage(message, 'warning', '', 'warning', '');
	}
	
	function openReceiveVideo(){
		$('#videoModal').modal('toggle');
    }

</script>
