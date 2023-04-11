<?php include 'include/config.php'; ?>
<?php include 'headHomepage.php'; ?>

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
                                        	<?php echo $translations["M01778"][$language]; /* A simple and faster way to send fund abroad.*/ ?>
                                        </h1>
                                    </div>
                                    <div class="row">
										
											<button type="button" class="btn custonButtonSend" style="margin-top:25px;"  onclick="openSendVideo()">
												<img src="images/sendandreceive/video-icon.png">&nbsp &nbsp
											 <?php echo $translations["M01779"][$language]; /* See how we send fund */ ?>
											</button>
										
                                    </div>
                                    

                                    
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-5" id="nuxPaySection01ImgDiv2">                                                                                                     

                                    <!-- Your Name -->
                                    <input type="text" class="form-control requestInput" id="payerName" placeholder="<?php echo $translations["M01511"][$language]; /*  Your Name */ ?>" value="<?php echo $_POST['payeeName']; ?>">
                                    <!-- Your Name -->         

                                    <!-- sender -->
                                    <div class="row" id="payee_phone_Option" style="display:<?php if(!empty($_POST['payeeEmail'])){echo 'none';} else {echo '';} ?>;">
                                    <div id="mobileSection" class="container-fluid" >
                                                                                            
                                            <div class="row" id="phoneOption">

                                                <div id="payeeCountryCodeTmp" class="phoneNumberPrefix" style="margin-top: 20px;line-height: 38px;font-size: 15px;">+</div>
                                                <div class="nuxPaySection01Part02">
                                                    <input type="text" id="payeeMobileNumber" autocomplete="no" style="padding-left: 16px;padding-right: 8px;" class="form-control requestInput " placeholder="	<?php echo $translations["M01513"][$language]; /*  Your Mobile number */ ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $_POST['phoneNumber']; ?>">
                                                </div>

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
                                            <a href="#"><?php echo $translations["M01676"][$language]; /*  Switch to Mobile Number*/ ?></a>
                                        </div>
                                    </div>
                                    <!-- sender -->
                                    
                                    <!-- 1 row 2 columns -->
                                    <div class="row">
                                        <div class='col-8 balanceDiv' style="padding-top:5px; padding-bottom:15px; display:block">
                                            <div class="row" style="text-align:right">
                                                <h4 style="width:100%">
                                                    <?php if($_SESSION['access_token'] != '') {?>
                                                        Balance: 
                                                    <?php } else { ?>                                                    
                                                        &nbsp
                                                    <?php } ?>                                                                                                        
                                                </h4>                                                                                                                        
                                            </div>
                                            <div class="row">                                        
                                                    <span class="w-100" style="text-align:right;" id="balanceAmount">                                                    
                                                        <?php if($_SESSION['access_token'] != '') {?>
                                                            0.00000000
                                                    <?php } else { ?>                                                    
                                                        &nbsp
                                                    <?php } ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class='col-2' id="balanceCoinImageDiv">
                                                                                   
                                                   
                                        </div>
                                        <div class='col-1 backgroundGifArrowDown'>
                                                                                        
                                        </div>
                                    </div>
                                    <!-- 1 row 2 columns -->

                                    <!-- receiver -->
                                    <input type="text" class="form-control requestInput" id="payeeName" placeholder="<?php echo $translations["M01802"][$language]; /*  Recipient Name */ ?>" value="<?php echo $_POST['payeeName']; ?>">
                                    <!-- receiver -->                       

                                    <!-- name -->
                                    

                                    <!-- mobile section -->
                                    <div class="row" id="payerMobileSection" style="">
                                        <div class="col-12" id="mobileSection" style="width:100%;">
											
												<div style="display: none;" class="nuxPaySection01Part01" id="country_code">
													<select id="countryCode" class="form-control nuxPaySection01Dropdown">
														<?php include 'phoneList.php'; ?>
													</select>
												</div>
                                            <div class="row" id="phoneOption">

                                                <div id="payerCountryCodeTmp" class="phoneNumberPrefix" style="margin-top: 20px;line-height: 38px;font-size: 15px;">+</div>
                                                <div class="nuxPaySection01Part02">
                                                    <input type="text" id="payerMobileNumber" autocomplete="no" style="padding-left: 16px;padding-right: 8px;" class="form-control requestInput" placeholder="	 <?php echo $translations["M01803"][$language]; /*  Recipient Mobile Number */ ?>" value="<?php if($_POST['payerMobileNumber']) {echo $_POST['payerMobileNumber'];} else {echo $_GET['mobile_number'];} ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
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
                                    <div class="row" id="payerEmailSection" style="display:none;">

                                        <div class="col-12 form-group" >
                                            <input placeholder="Recipient Email Address" id="payerEmail" type="text" class="form-control requestInput">
                                        </div>

                                        <div id="payerSwitchMobile" class= "col-12 form-group" style="text-decoration: underline;margin-top:-15px">
                                            <a href="#"><?php echo $translations["M01676"][$language];/* Switch to mobile */ ?></a>
                                        </div>
                                    </div>
                                    
                                    
                                    <!-- amount -->        
                                    
                                    <div class="input-group">
                                        <input type="text" class="form-control requestInput" aria-label="Text input with dropdown button" placeholder="<?php echo $translations["M01800"][$language]; /*  Amount */ ?>" id="amount">
                                        
                                        <div class="dashboardBoxWidth3 align-self-center text-center walletTypeDropdown2" style="margin-top:20px;">
                                            <select id="walletDropdown" class="full-width selectValue"></select>
                                        </div>
                                        <!-- </div> -->
                                    </div>

                                    <div class="row" style="margin-top: 5px;">
                                        <div class="col-2">

                                            <div style="">
                                                <label class="toggle">
                                                    <input id="escrowSwitch" type="checkbox" data-address="" data-status="" data-currency_id="" data-wallet_type="" class="toggle-input cryptoBtn" >
                                                    <div class="toggle-controller default-success text-center"></div>

                                                </label>
                                                
                                            </div>
                                            

                                            


                                        </div>
                                        <div class="col-10">
                                            <div style="line-height: 35px;font-weight: bold;">Escrow
                                                <i class="fa fa-question-circle-o newSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="By turning on this option, your funds will be held in escrow until you decide to release it." style="margin-left: 5px;"></i></div>

                                        </div>

                                    </div>

                                    
                                    <!-- amount -->                       

									<!-- description-->
									 <input  style="display:none;" type="text" class="form-control requestInput" id="description" placeholder="<?php echo $translations["M00345"][$language]; /*  Description */ ?>"?>
									<!-- description -->

                                    <?if(!isset($_SESSION['access_token'])) { ?>                                    
                                    <div id="promotionCodeDiv">                                    
                                        <!-- Promo code -->
                                        <input type="text" class="form-control requestInput" id="promoCode" placeholder="<?php echo $translations["M01543"][$language]; /*  Promotion Code */ ?>">
                                        <div class= "col-12 mt-2 form-group" style="display:flex; text-decoration: underline; margin-left: -10px;">
                                            <a style="background: transparent;" id="switchEmail" href="#"> <?php echo $translations["M01572"][$language]; /*  Enter promotion code to get $10 for free */ ?></a>                                        
                                        </div>
                                        <!-- Promo code -->
                                    </div>
                                    <? } ?>

                                    <button type="button" id="continueBtn" class="btnRequest btn btn-primary btn-block mt-5"><?php echo $translations["M01780"][$language]; /*  Continue */ ?></button>

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
				<source src="https://s3-ap-southeast-1.amazonaws.com/com.nuxpay/sendandreceivefund/main_send.mp4" type="video/mp4" >
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
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 1;
	var pageNumber      = 1;
	var formData        = "";
	var fCallback       = "";
	var accessToken = "<?php echo $_SESSION['access_token'];?>";
	var dropdownFake;
	var balance;
	var payeeType = "<?php echo $_POST['sender_type']?>";
    var payerType = "mobile";
    var disableSwith = false;
	var countryCode 	= "<?php echo $countryCode; ?>";
	
	if(payeeType == null || payeeType == ''){
		payeeType = 'mobile';
	}

    var selectedWalletType = 'tetherusd';
	var sendFundType = "<?php echo $_POST['sendFundType']; ?>";
	var sendFundParam = <?php $sendFundParam = $_POST['sendFundParam']; echo json_encode($sendFundParam, true);?>;
	var payeeMobileNumber = '';
	var payerMobileNumber = '';
    var phoneNumber = "<?php echo $_POST['phoneNumber'];?>";
    var getMobile = "<?php echo $_GET['mobile_number']; ?>";
    var getEmail = "<?php echo $_GET['email_address']; ?>";
    var balanceAmount;
    
    $(document).ready(function () {
        
        if(getMobile){            
            formData  = {            
                command: 'getUserInfo',
                user_search: getMobile
            };
            fCallback = loadUserInfo; 
            ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        if(getEmail){            
            formData  = {            
                command: 'getUserInfo',
                user_search: getEmail
            };
            fCallback = loadUserInfo; 
            ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function loadUserInfo(data,message) {                    
            // $('#payeeName').val(data.nickname);                        
            $('#payeeName').val(data.data.nickname);
            
            if (getEmail) {
                $('#payerEmailSection').show();
                $('#payerMobileSection').hide();
                payerType = "email";
                $('#payerSwitchMobile').text('');
            } else {
                $('#payerSwitchEmail').text('');
            }
            
        }    

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
            } else{
                if ($(this).attr("data-countrycode") == "US") {
                	$(this).parent().val(this.value).trigger('change');
                }
            }
        });
		defaultCountryCode = $('#countryCode').val();

        $(':checkbox').change(function(){
            //currency_id = $(this).attr('data-currency_id'); 
            var status = $(this).is(":checked") ? 1 : 0;
            //setWallet(currency_id, status);
        });

		$('.phoneNumberPrefix').text(defaultCountryCode);

			$('#payeeMobileNumber').on('focus', function(e) {

				var tmpPhoneNumber = $('#payeeMobileNumber').val();

				if(tmpPhoneNumber=="") {
					$('#payeeMobileNumber').val(defaultCountryCode.substring(1));
				}

				$('#payeeMobileNumber').attr("placeholder", "");
				$('#payeeCountryCodeTmp').text('+');

        $('#payeeMobileNumber').caretToEnd();
			});

			$('#payeeMobileNumber').on('blur', function(e) {

				var tmpPhoneNumber = $('#payeeMobileNumber').val();

				if(tmpPhoneNumber=="" || "+"+tmpPhoneNumber==defaultCountryCode) {
					$('#payeeMobileNumber').val('');
					$('#payeeCountryCodeTmp').text(defaultCountryCode);
				}

				$('#payeeMobileNumber').attr("placeholder", "         <?php echo $translations["M01513"][$language]; /*  Your Mobile Number  */ ?>");
			});



			$('#payerMobileNumber').on('focus', function(e) {

				var tmpPhoneNumber = $('#payerMobileNumber').val();

				if(tmpPhoneNumber=="") {
					$('#payerMobileNumber').val(defaultCountryCode.substring(1));
				}

				$('#payerMobileNumber').attr("placeholder", "");
				$('#payerCountryCodeTmp').text('+');

        $('#payerMobileNumber').caretToEnd();
			});

			$('#payerMobileNumber').on('blur', function(e) {

				var tmpPhoneNumber = $('#payerMobileNumber').val();

				if(tmpPhoneNumber=="" || "+"+tmpPhoneNumber==defaultCountryCode) {
					$('#payerMobileNumber').val('');
					$('#payerCountryCodeTmp').text(defaultCountryCode);
				}
				

				$('#payerMobileNumber').attr("placeholder", "<?php echo $translations["M01803"][$language]; /*  Recipient Mobile Number */ ?>");
			});
		
		if(phoneNumber != ''){
			$('#payeeCountryCodeTmp').text('+');

		}
		
		if(sendFundParam){
			
			$('#payerName').val(sendFundParam.sender_name);
			$('#payeeName').val(sendFundParam.receiver_name);
			$('#amount').val(sendFundParam.amount);
			$('#walletDropdown').val(sendFundParam.wallet_type);
			$('#description').val(sendFundParam.description);
			
			if(sendFundParam.sender_type == 'email'){
				
				$('#payeeEmailAddress').val(sendFundParam.sender_email_address);
				$('#payee_phone_Option').hide();
				$('#payee_email_Option').show();

				
				payeeType = "email";
			}
			else if(sendFundParam.sender_type == 'mobile'){

				$('#payeeCountryCodeTmp').text('+');
				$('#payeeMobileNumber').val(sendFundParam.sender_mobile_number);

				$('#payee_phone_Option').show();
				$('#payee_email_Option').hide();
				payeeType = "mobile";
				
			}
				
			if(sendFundParam.receiver_type == 'email'){
				$('#payerEmail').val(sendFundParam.receiver_email_address);
				 $('#payerEmailSection').show();
				$('#payerMobileSection').hide();
				payerType = "email";			
			}
			else if(sendFundParam.receiver_type == 'mobile'){
				$('#payerCountryCodeTmp').text('+');
				
				$('#payerMobileNumber').val(sendFundParam.receiver_mobile_number);
				$('#payerEmailSection').hide();
				$('#payerMobileSection').show();
				payerType = "mobile";
			}
			
		}
		else if (getMobile) {
            $('#payerCountryCodeTmp').text('+');			            
            $('#payerCountryCodeTmp').attr('readonly','readonly');
        } 
        else if (getEmail) {
            $('#payerEmail').val('<?php echo $_GET['email_address'];?>');
            $('#payerEmail').attr('readonly','readonly');
            $('#payerEmailSection').show();
            $('#payerMobileSection').hide();
        }
		
        if(accessToken == ''){//not login
            formData  = {
                command: 'getWalletType'
            };
            fCallback = getWalletType; 
            ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        }
        
        if(accessToken != ''){
            
            formData  = {
                // command: 'getWalletType'
                command: 'getWalletBalance'
                // wallet_status: checkWalletStatus
            };
            fCallback = getWalletBalance; 
            ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
            $('#balanceDiv').show();
            $('#balanceCoinImageDiv').show();

            formData  = {
                command: 'getWalletType',
                setting_type : 'nuxpay_wallet'
            };
            fCallback = getWalletType; 
            ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
        }

        loadProfileDetails();
        
        // formData  = {
		// 	command: 'getWalletType'
		// 	// command: 'getWalletBalance',
		// 	// wallet_status: checkWalletStatus
        // };
        // fCallback = getWalletType; 
        // ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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
		
		$('#walletDropdown').change(function(){
			var walletType = $('select#walletDropdown option:selected').val();

			selectedWalletType = walletType;
			getWalletBalance('','');


		});

        function getWalletBalance(data, message){
			if(data != ''){
				balance = data.data.wallet_list;
			}
		            
            var headerBalance = '';
            var buildList = '';

            if(balance){
	
                $.each(balance, function(k,v){
					
                    var symbol = v['symbol'];
                    var display_symbol = v['display_symbol'];
                    var image = v['image'];
                    var balance = v['balance'];
                    var currency_id = v['currency_id'];
                    
                    if(currency_id == selectedWalletType){
						
                        $('#balanceCoinImageDiv').empty().append('<img src="'+image+'" width="30px" class="mr-2">');
                        $('#balanceAmount').text(balance + ' ' + display_symbol );
						balanceAmount = balance;
                    }
                
                });

            }
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
		
        $('#divPayeeEmail').hide();
        // $('#kt_header').css('padding-bottom', '20px');
        // $('#kt_header').css('border-bottom-style', 'solid');
        // $('#kt_header').css('border-bottom-width', '1px');
        // $('#kt_header').css('border-bottom-color', '#e1e1ef');
        $('#languageDiv').css('border-style','none');         
		
		$('#videoModal').on('shown.bs.modal', function (e) {
			$('#videoID').trigger('play');
		})
		
		$('#videoModal').on('hidden.bs.modal', function (e) {
			$('#videoID').trigger('pause');
		})
        
    });   

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
            $('#payerName').val(business_name);
            $("#payerName"). attr('readonly','readonly');
            $('#promotionCodeDiv').hide();
        }
        if (business_phone_number) {                
            $('#payeeMobileNumber').val(business_phone_number);            
            $("#payeeMobileNumber"). attr('readonly','readonly');                    
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
	
    
    $('#usdtOption').click(function(e) {
        $('#dropdownCurrency').text('USDT');
        e.preventDefault();
    })
    $('#btcOption').click(function(e) {
        $('#dropdownCurrency').text('BTC');
        e.preventDefault();
    })
    $('#ethOption').click(function(e) {
        $('#dropdownCurrency').text('ETH');
        e.preventDefault();
    })
    
    $('#payeeMobileNumber').on('blur', function(e) {
    

//    var tmpPhoneNumber = $('#payeeMobileNumber').val();
//
//    if(tmpPhoneNumber=="" || "+"+tmpPhoneNumber==defaultCountryCode) {
//        $('#payeeMobileNumber').val('');
//        $('#payeeCountryCodeTmp').text(defaultCountryCode);
//    }

    $('#payeeMobileNumber').attr("placeholder", "<?php echo $translations["M01513"][$language]; /*  Your Mobile number */ ?>");
    });


    function payeeSwitchEmail() {
        $('#payee_phone_Option').hide();
        $('#payee_email_Option').show();
        payeeType = "email";

    }

    $('#payeeSwitchEmail').click(function (e) {			
        if (disableSwith) {
            return ;
        }
        // $('#payeeMobileNumber').hide();
        // $('#payeeCountryCode').hide();
        // $('#payeeSwitchEmail').hide();
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
        payerType = "email";
        e.preventDefault()           
    });

    $('#payerSwitchMobile').click(function (e) {
        $('#payerEmailSection').hide();
        $('#payerMobileSection').show();
        payerType = "mobile";
        e.preventDefault()      
    });

 
	$('#continueBtn').click( function(e){
		

		payeeMobileNumber = $('#payeeMobileNumber').val();
		payerMobileNumber = $('#payerMobileNumber').val();
//		if(payeeMobileNumber.slice(0,1) != '+'){
//			payeeMobileNumber = '+' +$('#payeeMobileNumber').val();
//		}
//	
//		if(payerMobileNumber.slice(0, 1) != '+'){
//			  payerMobileNumber = '+' +$('#payerMobileNumber').val();
//		}
//		console.log('payee mobile number');
//		console.log(payeeMobileNumber);
//		
//		console.log('payer mobile number');
//		console.log(payerMobileNumber);
//      
        var payeeEmailAddress = $('#payeeEmailAddress').val();
        var payerEmailAddress = $('#payerEmail').val();
        
        var payeeName = $('#payeeName').val();
        var currency  = $('#dropdownCurrency').text();
        
        if(payeeType == 'mobile' && !(payeeMobileNumber)) {
            showMessage("<?php echo $translations["E00601"][$language]; /*  Sender Mobile number cannot be empty. */ ?>", 'warning', "ERROR", 'warning', ''); 
            return;

        } else if(payeeType == 'email' && !(payeeEmailAddress)) {
            showMessage("<?php echo $translations["E00600"][$language]; /*  Sender Email Address cannot be empty. */ ?>", 'warning', "ERROR", 'warning', '');
            return;

    
        }

        if (!payeeName) {
            showMessage("<?php echo $translations["M01830"][$language]; /* Sender Name cannot be empty. */ ?>", 'warning', "ERROR", 'warning', '');
            return;

  
        }

        if(payerType == 'mobile' && !(payerMobileNumber)) {
            showMessage("<?php echo $translations["E00604"][$language]; /*  Receiver Mobile number cannot be empty. */ ?>", 'warning', "ERROR", 'warning', ''); 
            return;

        } else if(payerType == 'email' && !(payerEmailAddress)) {
            showMessage("<?php echo $translations["E00603"][$language]; /*  Receiver Email Address cannot be empty. */ ?>", 'warning', "ERROR", 'warning', '');
            return;
    
        }

        if (!payerName) {
            showMessage("<?php echo $translations["M01833"][$language]; /* Receiver Name cannot be empty. */ ?>", 'warning', "ERROR", 'warning', '');
            return;
  
        }
        
		var command = '';
		
		command = 'webpaysendfundverification';
		fCallback = verifySendFund;
			
		
		formData  = {
			command: command,
			sender_name: $('#payerName').val(),
			sender_email_address :$('#payeeEmailAddress').val(),
			sender_mobile_number : payeeMobileNumber,
			sender_type : payeeType,
			receiver_name: $('#payeeName').val(),
			receiver_email_address :  $('#payerEmail').val(),
			receiver_mobile_number :payerMobileNumber,
			receiver_type :  payerType,
			amount : $('#amount').val(),
			wallet_type :  selectedWalletType,
			description :  $('#description').val(),
			
		};

				
		ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	})

	function verifySendFund(data, message){

		var sendFundParam = {
			sender_name: sanitize($('#payerName').val()),
			sender_email_address :sanitize($('#payeeEmailAddress').val()),
			sender_mobile_number : payeeMobileNumber,
			sender_type : payeeType,
			receiver_name: sanitize($('#payeeName').val()),
			receiver_email_address :  sanitize($('#payerEmail').val()),
			receiver_mobile_number :payerMobileNumber,
			receiver_type :  payerType,
			amount : sanitize($('#amount').val()),
			wallet_type :  selectedWalletType,
			description :  sanitize($('#description').val()),
            escrow : $("#escrowSwitch").is(":checked") ? "1" : "0",
			symbol: $('select#walletDropdown option:selected').text(),
            balance: balanceAmount,
		};


		 if(accessToken != ''){
			$.redirect("sendReview.php", {
				sendFundParam: sendFundParam

			});
		 }
		 else{
			if(data.data.user_exist == 1){
				$.redirect("login.php", {
					fromSendFund: 1,
					sendFundParam: sendFundParam

				});
			}
			else{
				sendFundParam.promo_code = $('#promoCode').val();
				$.redirect("sendReview.php", {
					fromSendFund: 1,
					sendFundParam: sendFundParam
				});
			}
		}
	}
	
	function openSendVideo(){
		$('#videoModal').modal('toggle');
	}
	

</script>
