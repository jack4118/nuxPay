<?php include 'include/config.php'; ?>
<?php include 'headLogin.php'; ?>

<body>
    <div class="col-12">
        <div class="row requestFundFullWrapper">
            <?php include 'requestFundSide.php'; ?>
            <div class="col-md-8 requestFundRight">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-10">
                                <span class="requestRightTitle"><?php echo $translations["M01552"][$language]; /*  Request fund from your customer */ ?></span>
                                <div class="d-block mt-1">
                                    <div class="stepProgress">
                                        <span class="active"></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <span class="d-inline-block ml-2" style="vertical-align: middle;">
                                        <?php echo $translations["M01553"][$language]; /*  Create Payment */ ?>
                                    </span>
                                </div>

                                <div class="mt-5" id="yourInfoSection" >
                                    <div class="requestDescTitle"><span><?php echo $translations["M01554"][$language]; /*  Your Info */ ?></span></div>
                                    <div class="requestInputWrapper mt-4">
                                        <input type="text" class="form-control requestInput" id="payeeName" placeholder="<?php echo $translations["M01555"][$language]; /*  Your name */ ?>" value="<?php echo $_POST['payeeName']; ?>">
                                        <div class="row" id="payee_phone_Option">
                                            <div class="col-12" id="mobileSection" style="width:100%;">
                                                            

                                                <div class="row" id="phoneOption">

                                                    <div id="payeeCountryCodeTmp" class="phoneNumberPrefix" style="margin-top: 20px;line-height: 36px;font-size: 15px;">+</div>
                                                    <div class="nuxPaySection01Part02">

                                                        <input type="text" id="payeeMobileNumber" style="padding-left: 16px;padding-right: 8px;" class="form-control requestInput " placeholder=" <?php echo $translations["M01513"][$language]; /*  Your Mobile number */ ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $_POST['phoneNumber']; ?>">
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
                                        <div class="row" id="payee_email_Option" style="display:none;">
                                            <div class="col-12 form-group" style="display: flex;">
                                                <input type="text" class="form-control requestInput" id="payeeEmailAddress" placeholder="<?php echo $translations["M01512"][$language]; /*  Your email address */ ?>" value="<?php echo $_POST['payeeEmail']; ?>">
                                            </div>

                                            <div id="payeeSwitchMobile" class= "col-12 form-group" style="display:flex; text-decoration: underline;">
                                                <a href="#"><?php echo $translations["M01513"][$language]; /*  Switch to Mobile Number */ ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- payer section -->
                                <div class="d-block mt-5">
                                    <div class="requestDescTitle"><span><?php echo $translations["M01556"][$language]; /*  Payer Info */ ?></span></div>
                                    <div class="requestInputWrapper mt-4">
                                        <input type="text" class="form-control requestInput" id="payerName" placeholder="<?php echo $translations["M01557"][$language]; /*  Payer Name */ ?>" value="<?php echo $_POST['payerName']; ?>">

                                        <!-- mobile section -->
                                        <div class="row" id="payerMobileSection" style="">
                                            <div class="col-12" id="mobileSection" style="width:100%;">
                                                <div class="row" id="phoneOption">

                                                    <div id="payerCountryCodeTmp" class="phoneNumberPrefix" style="margin-top: 20px;line-height: 38px;font-size: 15px;">+</div>
                                                    <div class="nuxPaySection01Part02">
                                                        <input type="text" id="payerMobileNumber" autocomplete="no" style="padding-left: 16px;padding-right: 8px;" class="form-control requestInput" placeholder=" <?php echo $translations["M01563"][$language]; /*  Payer Mobile Number */ ?>" value="<?php echo $_POST['payerMobileNumber']; ?>">
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

                                        <div class="row" id="payerEmailSection" style="width:100%;display:none;">
                                            
                                            <!--<div class="col-10 pl-0">
                                                <!-- <input type="text" class="form-control requestInput" placeholder="Payer mobile number" value="<?php echo $_POST['payerMobileNumber']; ?>"> - ->
                                                <input type="text" id="payerMobileNumber" class="form-control requestInput" placeholder="Payer mobile number" value="<?php echo $_POST['payerMobileNumber']; ?>">

                                            </div>

                                            <div id="payerSwitchEmail" class= "col-12 mt-2 form-group" style="display:flex; text-decoration: underline;">
                                                <a href="#">Switch to Email</a>
                                            </div>-->
                                            <div class="col-12 form-group" style="display: flex;">
                                                <input placeholder="<?php echo $translations["M01517"][$language]; /*  Email */ ?>" id="payerEmail" type="text" class="form-control requestInput">
                                            </div>

                                            <div id="payerSwitchMobile" class= "col-12 form-group" style="display:flex; text-decoration: underline;">
                                                <a href="#"><?php echo $translations["M01513"][$language]; /*  Switch to Mobile Number */ ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-block mt-5">
                                    <div class="requestDescTitle"><span><?php echo $translations["M01564"][$language]; /*  Payment Details */ ?></span></div>
                                    <div class="requestInputWrapper mt-4">
                                        <div class="requestAmountInput">
												<div class="row">
													 <input type="text" class="form-control requestInput amountToPay" id="amount" placeholder="<?php echo $translations["M01565"][$language]; /*  Amount to pay */ ?>" oninput="this.value = this.value.match(/^[0-9]+\.?[0-9]{0,8}/);" value="<?php echo $_POST['amount']; ?>" autocomplete="off" style="margin-top:0 !important;">
													<div class="walletTypeDropdown1">
														<select id="walletDropdownGraph" class="requestInput full-width selectValue" style="width:80px !important">
															<option value="tetherusd">USDT</option>
															<option value="bitcoin">BTC</option>
															<option value="ethereum">ETH</option>
															
														</select>
												</div>
											
											</div>
                                        </div>
                                        <textarea name="" id="paymentDescription" rows="10" maxlength="50" placeholder='<?php echo $translations["M01571"][$language]; /*  Payment Description */ ?>' class="form-control requestInput"><?php echo $_POST['paymentDescription']; ?></textarea>
                                    </div>
                                </div>

                                <div id="promoCodeSection" class="d-block mt-5">
                                    <div id="promoCodeTitle" class="requestDescTitle"><span><?php echo $translations["M01543"][$language]; /*  Promotion Code */ ?></span></div>

                                        <div class="requestInput" style="display: flex;">
                                            <input id="referralCode" placeholder="<?php echo $translations["M01543"][$language]; /*  Promotion Code */ ?>" type="text" class="form-control requestInput" >
                                        </div>
									<div id="promoCodeDesc" class= "mt-2 form-group" style="display:flex">
										<span class="promoCodeSpan"><?php echo $translations["M01572"][$language]; /*  Enter promotion code to get $10 for free */ ?></span>
									</div>
                                </div>  

                                <div class="d-block mt-4">
                                    <button onclick="goToConfirmation()" class="btn btnRequest"><?php echo $translations["M01573"][$language]; /*  Next */ ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php include 'sharejsDashboard.php'; ?>

<script src="js/general.js"></script>
<script>
    var url             = 'scripts/reqPaymentGateway.php';
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

    $(document).ready(function(){

		 $('#walletDropdownGraph').select2({
			dropdownAutoWidth : true,
			minimumResultsForSearch: Infinity
        });
		
        $('#payerMobileNumber').on('input', function (event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        $('#payeeMobileNumber').on('input', function (event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        
        $('#paymentDescription').keypress(
            function(event){
                if (event.which == '13') {
                event.preventDefault();
            }
        });

        // if(payeeEmail == ''){
        //     // $('#payeeMobileNumber').show();
        //     // $('#payeeCountryCode').show();
        //     // $('#payeeSwitchEmail').show();
        //     $('#phone_Option').show();

        //     // $('#payeeSwitchMobile').hide();
        //     // $('#payeeEmailAddress').hide();
        //     $('#email_Option').hide();

        //     payeeType = "mobile";
        //     //e.preventDefault()
        // }
        // else if(phoneNumber == ''){
        //     // $('#payeeMobileNumber').hide();
        //     // $('#payeeCountryCode').hide();
        //     // $('#payeeSwitchEmail').hide();
        //     $('#phone_Option').hide();
        //     $('#email_Option').show();
        //     // $('#payeeSwitchMobile').show();
        //     // $('#payeeEmailAddress').show();
        //     payeeType = "email";
        //     //e.preventDefault()
        // }

        if (code == 1){
            $('#promoCodeTitle').show();
            $('#referralCode').show();
            $('#promoCodeDesc').show();

            var promoCode = getCookie("utm_promoCode");
            if(promoCode!="" && promoCode!=null && promoCode!=undefined && promoCode!='null' && promoCode!='undefined') {
                $('#referralCode').val(promoCode);
                $("#referralCode").attr("disabled", true);
            }

        }else{
            $('#promoCodeTitle').hide();
            $('#referralCode').hide();
            $('#promoCodeDesc').hide();

            if(payeeNickname!="") {
                $("#payeeName").val(payeeNickname);
                // $('#yourInfoSection').hide();
            }
        }

        //$('#payeeEmailAddress').hide();
        //$('#payerEmail').hide();
        // $('#payeeSwitchMobile').hide();
        //$('#payerSwitchMobile').hide();

        $('#payeeSwitchEmail').click(function (e) {
			
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
			$('#payee_phone_Option').show();
            $('#payee_email_Option').hide();
            // $('#payeeMobileNumber').show();
            // $('#payeeCountryCode').show();
            // $('#payeeSwitchEmail').show();
            // $('#payeeSwitchMobile').hide();
            // $('#payeeEmailAddress').hide();
            payeeType = "mobile";

            e.preventDefault()
            
		});


        if(payeeEmail != ''){
            $('#payeeSwitchEmail').trigger('click');
        } else if(phoneNumber == ''){
            $('#payeeSwitchMobile').trigger('click');
        }


        $('#payerSwitchEmail').click(function (e) {
            $('#payerEmailSection').show();
            $('#payerMobileSection').hide();
			/*$('#payerMobileNumber').hide();
            $('#payerCountryCode').hide();
            $('#payerSwitchEmail').hide();
            $('#payerSwitchMobile').show();
            $('#payerEmail').show();
            $('#payerMobileNumber').val("");
            $('#payerCountryCode').val("");*/
            payerType = "email";
            e.preventDefault()           
		});

		$('#payerSwitchMobile').click(function (e) {
            console.log("payerSwitchMobile");
            $('#payerEmailSection').hide();
            $('#payerMobileSection').show();
			/*$('#payerMobileNumber').show();
            //$('#payerCountryCode').show();
            $('#payerSwitchEmail').show();
            $('#payerSwitchMobile').hide();
            $('#payerEmail').hide();
            $('#payerEmail').val("");*/
            payerType = "mobile";
            e.preventDefault()      
		});


        var defaultCountryCode = "";
        if(countryNumber && countryNumber!="") {
            $("#payeeDialingArea").val(countryNumber);
            $("#payeeDialingArea").parent().val(this.value).trigger('change');
            $("#payeeMobileNumber").val(countryNumber.substring(1)+phoneNumber);
            defaultCountryCode = countryNumber;
            //$('#payeeCountryCodeTmp').text(countryNumber);
        }else{
            $('#payeeDialingArea').find('option').each(function(){
                if (countryCode != "ZZ") {
                    if ($(this).attr("data-countrycode") == countryCode) {
                        $(this).parent().val(this.value).trigger('change');
                        defaultCountryCode = this.value;
                    }
                }else{
                    if ($(this).attr("data-countrycode") == "US") {
                        $(this).parent().val(this.value).trigger('change');
                        defaultCountryCode = this.value;
                    }
                }

                
            });
            $("#payeeMobileNumber").val(defaultCountryCode.substring(1));
        }
        console.log("defaultCountryCode = "+defaultCountryCode);
        //defaultCountryCode = countryCode;
        // payee mobile section
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
            
            $('#payeeMobileNumber').attr("placeholder", "           <?php echo $translations["M01513"][$language]; /*  Your Mobile number */ ?>");
        });

        $("#payeeMobileNumber").blur()

        if(payerCountryCode && payerCountryCode!="") {
            $("#payerDialingArea").val(countryNumber);
            $("#payerMobileNumber").val(countryNumber.substring(1)+phoneNumber);
            

            $("#payerDialingArea").parent().val(this.value).trigger('change');
        }else{
            $('#payerDialingArea').find('option').each(function(){
                if (countryCode != "ZZ") {
                    if ($(this).attr("data-countrycode") == countryCode) {
                        $(this).parent().val(this.value).trigger('change');
                    }
                }else{
                    if ($(this).attr("data-countrycode") == "US") {
                        $(this).parent().val(this.value).trigger('change');
                    }
                }
            });
        }

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
            console.log("123 = "+tmpPhoneNumber);
            console.log(defaultCountryCode);
            if(tmpPhoneNumber=="" || "+"+tmpPhoneNumber==defaultCountryCode) {
                $('#payerMobileNumber').val('');
                $('#payerCountryCodeTmp').text(defaultCountryCode);
            }
            
            $('#payerMobileNumber').attr("placeholder", "           <?php echo $translations["M01563"][$language]; /*  Payer Mobile Number */ ?>");
        });
        $("#payerMobileNumber").blur()
        

        setFormValue();
        

        // $('#payerDialingArea').find('option').each(function(){
        //     if (countryCode && countryCode != "ZZ") {
        //         if ($(this).attr("data-countrycode") == countryCode) {
        //             $(this).parent().val(this.value).trigger('change');
        //         }
        //     }else{
        //         if ($(this).attr("data-countrycode") == "US") {
        //             $(this).parent().val(this.value).trigger('change');
        //         }
        //     }
        // });
        
        $('.selectOption').select2({
            dropdownAutoWidth : true,
            templateSelection: format,
			width: 80
        });
        
        

    });

    function setFormValue() {

        var post_isBack = '<?php echo $_POST['isBack']; ?>';
        var post_userCode = '<?php echo $_POST['userCode']; ?>';
        var post_payeeName = '<?php echo $_POST['payeeName']; ?>';
        var post_payeeEmail = '<?php echo $_POST['payeeEmail']; ?>';
        var post_payeeMobileNumber = '<?php echo $_POST['payeeMobileNumber']; ?>';
        
        var post_payerName = '<?php echo $_POST['payerName']; ?>';
        var post_payerEmail = '<?php echo $_POST['payerEmail']; ?>';
        var post_payerMobileNumber = '<?php echo $_POST['payerMobileNumber']; ?>';
        var post_payerCountryCode = '<?php echo $_POST['payerCountryCode']; ?>';
        
        var post_amount = '<?php echo $_POST['amount']; ?>';
        var post_paymentDescription = '<?php echo $_POST['paymentDescription']; ?>';
        var post_countryNumber = '<?php echo $_POST['countryNumber']; ?>';
        var post_phoneNumber = '<?php echo $_POST['phoneNumber']; ?>';
        var post_referralCode = '<?php echo $_POST['referralCode']; ?>';


        if(post_isBack=="yes") {

            //payee
            if(post_payeeEmail!="") {
                $("#payeeEmailAddress").val(post_payeeEmail);
                $('#payeeSwitchEmail').trigger('click');
            } else {
                if(post_countryNumber!="") {
                    $("#payeeDialingArea").val(post_countryNumber);
                    $("#payeeDialingArea").parent().val(this.value).trigger('change');
                    $("#payeeMobileNumber").val(post_phoneNumber);
                }
                $('#payeeSwitchMobile').trigger('click');
            }

            if(post_payeeName!="") {
                $("#payeeName").val(post_payeeName);
                if(!post_userCode) {
                    // $('#yourInfoSection').hide();
                }
            }

            //payer
            if(post_payerEmail!="") {
                $("#payerEmail").val(post_payerEmail);
                $('#payerSwitchEmail').trigger('click');
            } else {
                if(post_payerCountryCode!="") {
                    $("#payerDialingArea").val(post_payerCountryCode);
                    $("#payerDialingArea").parent().val(this.value).trigger('change');
                    $("#payerMobileNumber").val(post_payerMobileNumber);
                }
                $('#payerSwitchMobile').trigger('click');
            }

            if(post_payerName!="") {
                $("#payerName").val(post_payerName);
            }

            if(post_amount!="") {
                $("#amount").val(post_amount);
            }
            
            if(post_paymentDescription!="") {
                $("#paymentDescription").val(post_paymentDescription);
            }
            
            if(post_referralCode!="") {
                $('#referralCode').val(post_referralCode);
                $("#referralCode").attr("disabled", true);
                $('#promoCodeTitle').show();
                $('#referralCode').show();
                $('#promoCodeDesc').show();
            } else {
                $('#promoCodeTitle').hide();
                $('#referralCode').hide();
                $('#promoCodeDesc').hide();
            }
            
        }
        
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return '';
    }

    function format(val) {
        return val.id;
    }

    function goToConfirmation() {
        var payeeName = $("#payeeName").val();
        var payeeEmail = $("#payeeEmailAddress").val();
        var payeeDialingArea = $("#payeeDialingArea").val();
        var payeeMobileNumber = $("#payeeMobileNumber").val();
        var payerName = $("#payerName").val();
        var payerEmail = $("#payerEmail").val();
        var payerDialingArea = $("#payerDialingArea").val();
        var payerMobileNumber = $("#payerMobileNumber").val();
        var amount = $("#amount").val();
        var paymentDescription = $("#paymentDescription").val();
        var paymentItemList = 1;
        var referralCode = $('#referralCode').val();

        if (payeeName == '') {
            var message = "Please enter your name";
            errorOutput(message);
            return false;
        }
  //       else{
		// 	if(/[^a-zA-Z., ]/.test(payeeName)){
		// 		var message = "Special character or number is not allowed for Payee Name";
		// 		errorOutput(message);
		// 		return false;
		// 	}
		// }
        // if (payeeEmail == '') {
        //     alert("Please enter Payee Email");
        //     return false;
        // }
        if (payeeDialingArea == '') {
            var message = "Please enter your dialing area";
            errorOutput(message);
            return false;
        }
        if (payeeMobileNumber == '' && payeeEmail == '') {
            var message = "Please enter your mobile number or email";
            errorOutput(message);
            return false;
        }else{
            if(payeeMobileNumber != ''){
                if(/[^0-9.+]/.test(payeeMobileNumber)){
                    var message = "Only numbers and symbols are allowed for mobile number";
                    errorOutput(message);
                    return false;
                }
            } else {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			    if(!emailReg.test(payeeEmail)) {
                    var message = "Please enter a valid email";
                    errorOutput(message);
				    return false;
			    }
            }
		}
        if (payerName == '') {
            var message = "Please enter Payer Name";
            errorOutput(message);
            return false;
        }
  //       else{
		// 	if(/[^a-zA-Z., ]/.test(payerName)){
  //               var message = "Special character or number is not allowed for Payer Name";
		// 		errorOutput(message);
		// 		return false;
		// 	}
		// }
        // if (payerEmail == '') {
        //     var message = "Please enter Payer Email";
        //     errorOutput(message);
        //     return false;
        // }
        if (payerDialingArea == '' && payerMobileNumber != '') {
            var message = "Please enter Payer Dialing Area";
            errorOutput(message);
            return false;
        }
        if (payerMobileNumber == '' && payerEmail == '') {
            var message = "Please enter Payer Mobile Number or Payer Email";
            errorOutput(message);
            return false;
        }else{
            if(payerMobileNumber != ''){
                if(/[^0-9.+]/.test(payerMobileNumber)){
                    var message = "Only numbers and symbols are allowed for mobile number";
                    errorOutput(message);
                    return false;
                }
            } else {
                payerDialingArea = "";
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			    if(!emailReg.test(payeeEmail)) {
				    var message = "Please enter a valid email";
                    errorOutput(message);
                    return false;
			    }
            }

		}

        if (amount == '') {
            var message = "Please enter amount";
            errorOutput(message);
            return false;
        }else{
			if(/[^0-9.]/.test(amount)){
                var message = "Only numbers and symbols are allowed for amount";
				errorOutput(message);
				return false;
			}
		}

        if(paymentDescription=='') {
            var message = "Payment description cannot be empty.";
            errorOutput(message);
            return false;
        }
		
		var walletType = $('select#walletDropdownGraph option:selected').val();

        formData = {
            command : 'requestFundVerification',
            currency: walletType,
            payee_name : payeeName,
            payee_email_address : payeeEmail,
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
            referral_code : referralCode,
        };
        console.log(formData);
        fCallback = verifiedSuccess;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function verifiedSuccess(data, message) {
        var payeeDialingArea = $("#payeeDialingArea").val();
        var payeeMobileNumber = $("#payeeMobileNumber").val();
        var referralCode = $('#referralCode').val();
		var walletType = $('select#walletDropdownGraph option:selected').val();
		
		var symbol = $('select#walletDropdownGraph option:selected').text();

        var setData = data.data;
        setData['payeeDialingArea'] = payeeDialingArea;
        setData['payeeMobileNumber'] = payeeMobileNumber;
        setData['referral_code'] = referralCode;
        setData['userCode']= code;
		setData['symbol'] = symbol;
		setData['walletType'] = walletType;
        $.redirect("requestFundConfirmation.php", setData);
    }

    function errorOutput(message){
		showMessage(message, 'warning', '', 'warning', '');
	}
</script>

</body>


</html>
