<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">

                <div class="col-12 pageHeader mt-3 mb-5">                    
                    <?php echo $translations["M01845"][$language]; /* Settings */ ?>
                </div>


				<div class="d-flex align-items-center">
                    <div class="col-12">
                        <div class="d-flex border-bottom justify-content-between">
                            <nav class="nav">                              
                              <a class="nav-link active" id="profileBtn" href="javascript:void(0)" style="font-size: 15px;"><?php echo $translations["M01876"][$language]; /* Profile */ ?></a>
                              <a class="nav-link" id="securityBtn" href="settingsChangePassword.php" style="font-size: 15px;"><?php echo $translations["M01810"][$language]; /* Security */ ?></a>
                              <a class="nav-link" id="coinBtn" href="settingsAddWallet.php" style="font-size: 15px;"><?php echo $translations["M02074"][$language]; /* Payment Currencies */ ?></a>
                              <a class="nav-link" id="coinBtn1" href="settingsAddWalletCurrency.php" style="font-size: 15px;"><?php echo $translations["M02071"][$language]; /* Personal Wallet */ ?></a>
							  <a class="nav-link" id="whitelistBtn" href="whitelistAddresses.php" style="font-size: 15px;"><?php echo $translations["M01713"][$language]; /* Whitelist Addresses */ ?></a>								
                            </nav>
                        </div>
                    </div>
				</div>
			</div>

            


			<div class="m-content">
                <div class="col-12" id="profileSection">
                    <div class="row">
						<!--
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 bigText">
                                    Profile Logo
                                </div>
                                <div class="col-lg-8 col-md-8 col-12">
                                    <div class="m-portlet">
                                        <div class="m-portlet__body">
                                            <div class="row">
                                                <div class="col-md-4 col-12 text-center text-md-left align-self-center">
                                                    <div class="profileImgDiv">
                                                        <img id="profileImgSrc" class="profileStyle" src="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12 text-center text-md-left align-self-center" style="padding-left: 0px">
                                                    <div class="row">-->
                                                        <!-- <div class="col-12 bigText" id="userName">
                                                        </div> -->
                                                       <!-- <b div class="col-12 bigText" style="margin-bottom: 5px; padding-left: 0px">Change Logo</b div>
                                                        <div class="col-12" style="padding-left: 0px">
                                                            <div class="row">
                                                                <div class="col-12">Max File Size is 10Mb.</div>
                                                                <a href="" div class="col-12" style="margin-top: 10px; color: red">Remove</a div>-->
                                                                <!-- <div class="col-md-6 mt-3 mt-md-0">
                                                                    <button onclick="" id="" class="btn revokeBtn" type="button" data-toggle="modal" data-target="#deleteProfilePicture" style="min-width: 105px" type="button">Delete</button>
                                                                </div> -->
                                                           <!-- </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12 text-center text-md-left align-self-center" style="padding-left: 0px">
                                                    <button onclick="" id="changePic" class="btn searchBtn" style="min-width: 105px" type="button">Change</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div class="col-12 mt-3">
                            <div class="row">
                            
                                <div class="col-12 bigText">                                    
                                    <?php echo $translations["M01844"][$language]; /* Basic Info */ ?>
                                
                                </div>
                                <div class="col-12 form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="settingsError" class="alert alert-danger" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="m-portlet">
                                        <div class="m-portlet__body">
                                            <div class="row m-form">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">
                                                            <?php echo $translations["M01706"][$language]; /* Your Name */ ?>
                                                        </label>
                                                        <input id="businessName" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">
                                                            <?php echo $translations["M01877"][$language]; /* Account ID */ ?>
                                                        </label>
                                                        <input id="businessID" type="text" class="form-control" disabled>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">
                                                            <?php echo $translations["M01523"][$language]; /* Email */ ?>
                                                        </label>
                                                        <div class="d-flex">
                                                            <input id="businessEmailAddress" type="text" class="form-control" >
                                                            
                                                            <button id="emailVerifyBtn" class="btn primaryBtn" type="button" style="margin-left: 5px; width: 140px; font-size: 14px"> <?php echo $translations["M01821"][$language]; /* Verify */ ?> </button>

                                                            <button id="emailResendBtn" class="btn primaryBtn" type="button"   style="margin-left: 5px; width: 140px; display: none;"><?php echo $translations["M00451"][$language]; //Resend ?></button>

                                                            <span id="timer" name="timer" style="margin-left: 5px; margin-top:8px; width: 140px; text-align: center; display: none;"></span>

                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group" id="emailOtpDiv">
                                                        <label id="lblEmailOtpCode" style="font-size: 10px;">
                                                            <?php echo $translations["M01709"][$language]; /* An OTP code has been sent to your email address */ ?>.
                                                        </label>

                                                        <div class="d-flex">
                                                            <input id="emailOtpCode" type="text" placeholder="OTP Code" class="form-control" style="width: 150px;">

                                                            <button id="emailOtpSaveBtn" class="btn primaryBtn" type="button" style="margin-left: 5px; width: 120px;"><?php echo $translations["M01270"][$language]; /* Save */ ?></button>
                                                        </div>

                                                    </div>
                                                    

                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">
                                                            <?php echo $translations["M01497"][$language]; /* Mobile Number */ ?>
                                                        </label>
                                                        <div class="col-12 px-0">
                                                            <div class="row">
                                                               <div class="col-12 form-group" style="display: flex;" id="mobileDiv">
                                                                    <div class="countryContactBox">
                                                                        <select id="dialCode" class="form-control contactInput">
                                                                            <?php include 'phoneList.php'; ?>
                                                                        </select>
                                                                    </div>
                                                                    <input id="businessPhone" placeholder="<?php echo $translations["M01497"][$language]; /* Mobile Number */ ?>" type="text" class="form-control contactInput" style="margin-left: 5px;">

                                                                    <button id="mobileVerifyBtn" class="btn primaryBtn" type="button" style="margin-left: 5px; width: 140px; font-size: 14px;">
                                                                        <?php echo $translations["M01821"][$language]; /* Verify */ ?>
                                                                    </button>
                                                                    
                                                                    <button type="button" class="btn primaryBtn" id="mobileResendBtn" style="margin-left: 5px; width: 140px; display: none;"><?php echo $translations["M00451"][$language]; //Resend ?></button>

                                                                    <span id="timer2" name="timer2" style="margin-left: 5px; margin-top:8px; width: 140px; text-align: center; display: none;"></span>

                                                                </div>
                                                                <div class="form-group" id="mobileOtpDiv" style="margin-left: 15px;">
                                                                    <label id="lblMobileOtpCode" style="font-size: 10px;">
                                                                        <?php echo "An OTP code has been sent to your mobile number "; /* An OTP code has been sent to your mobile number */ ?>.
                                                                        </label>
                                                                        <div class="d-flex">
                                                                            <input id="mobileOtpCode" type="text" placeholder="OTP Code" class="form-control">
                                                                                
                                                                            <button id="mobileOtpSaveBtn" class="btn primaryBtn" type="button" style="margin-left: 5px; width: 120px;">
                                                                                <?php echo $translations["M00291"][$language]; /* Save */ ?> 
                                                                            </button>

                                                                        </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">
                                                            <?php echo $translations["M01815"][$language]; /* Address Line 1 */ ?> 
                                                        </label>
                                                        <input id="businessAddress1" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">
                                                            <?php echo $translations["M01816"][$language]; /* Address Line 2 */ ?> 
                                                        </label>
                                                        <input id="businessAddress2" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">
                                                            <?php echo $translations["M01817"][$language]; /* City */ ?>
                                                        </label>
                                                        <input id="businessCity" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">
                                                            <?php echo $translations["M01818"][$language]; /* State */ ?>
                                                        </label>
                                                        <input id="businessState" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">
                                                            <?php echo $translations["M01819"][$language]; /* Postal */ ?>
                                                        </label>
                                                        <input id="businessPostal" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">
                                                            <?php echo $translations["M00389"][$language]; /* Country */ ?>
                                                        </label>
                                                        <select class="form-control" name="" id="businessCountry">
                                                            <?php include 'countryList.php'; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <button id="saveBtn" class="btn searchBtn my-2" type="button" style="font-size: 14px;"><?php echo $translations["M01820"][$language]; /* Save */ ?></button>
                        </div>

                    </div>
                </div>

                <!-- <div class="col-12" id="walletSection" style="display: none">
                    <div class="row">

                        <div class="col-12">
                            <div class="m-portlet">
                                <div class="m-portlet__body">
                                    <div class="row">
                                        <div class="col-8">
                                            Do not have crypto wallet? <a href="javascript:void(0)">Connect with TheNux</a> wallet to receive payment instantly without miner fee!
                                        </div>
                                        <div class="col-4">
                                            <div class="connectWalletButton">
                                                <img src="images/nuxPay/newDesign/connectIcon.png">Connect with TheNux Wallets
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <button id="addBtn" class="btn searchBtn" type="button">Add Withdrawal Wallet</button>
                        </div>

                        <div class="col-12 text-center my-5" id="noWallet" style="display: none">
                            <div class="row">
                                <div class="col-12">
                                    <img src="images/nuxPay/newDesign/noWalletIcon.png">
                                </div>
                                <div class="col-12 mt-3 bigText">
                                    No Withdrawal Wallet
                                </div>
                                <div class="col-12">
                                    Add withdrawal wallet to receive payment instantly from your customers
                                </div>
                            </div>
                        </div>

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
                        </div>

                    </div>
                </div> -->

                <!-- <div class="col-12" id="securitySection" style="display: none">
                    <div class="row">

                        <div class="col-12 mt-3">
                            <div class="row">
                                <div class="col-12 bigText">
                                    Change Login Password
                                </div>
                                <div class="col-12">
                                    <div class="m-portlet col-md-6 px-0">
                                        <div class="m-portlet__body">
                                            <div class="row m-form">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">Current Password<span class="text-danger">*</span></label>
                                                        <input id="currentPassword" type="password" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">New Password<span class="text-danger">*</span></label>
                                                            <i data-toggle="m-tooltip" data-direction="left" data-width="auto" class="m-form__heading-help-icon descMsg flaticon-info m--icon-font-size-lg" title="" data-html="true" data-original-title="<p align='left' class='mb-0'>Min 4 characters</p>"></i>
                                                        <input id="newPassword" type="password" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">Confirm New Password<span class="text-danger">*</span></label>
                                                        <input id="confirmPassword" type="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <button id="changePasswordBtn" class="btn searchBtn mx-2 my-2" type="button">Save</button>
                        </div>

                    </div>
                </div> -->

			</div>

			</div>

		</div>
	<?php include 'footerDashboard.php'; ?>
</div>


<?php include 'sharejsDashboard.php'; ?>

</body>
</html>

<script>

    var url             = 'scripts/reqEditBusiness.php';
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
    var mode;
    // var countryCode     = "<?php echo $countryCode; ?>";
    var countryCode = '<?php echo $_SERVER["HTTP_CF_IPCOUNTRY"] ?>';
    var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';

    if (hasChangedPassword == 0){
		$.redirect('firstTimeLogin.php');
	}

    $(document).ready(function(){
        
        formData  = {
            command: 'getProfileData'
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        var businessEmail = $('#businessEmailAddress').val();
        var countryValue = "<?php echo $_SESSION["business"]["business_country"]; ?>";
        var companySizeRange =  "<?php echo $_SESSION["business"]["business_company_size"]; ?>";
        $('#businessCountry').val(countryValue);
        $('#companySizeRange').val(companySizeRange);

        if($('input#businessEmailAddress').val() != '' && $('input#businessEmailAddress').length() > 0){
            $('#businessEmailAddress').prop('disabled', true);
            $("#emailVerifyBtn").hide();
        }else if($('input#businessEmailAddress').val() == ''){
            $('#businessEmailAddress').prop('disabled', false);
            $("#emailVerifyBtn").show();
        }

        if($('input#businessPhone').val() != '' && $('input#businessPhone').length() > 0){
            $('#businessPhone').prop('disabled', true);
            $('#dialCode').prop('disabled', true);
            $("#mobileVerifyBtn").hide();
        }else if($('input#businessPhone').val() == ''){
            $('#businessPhone').prop('disabled', false);
            $('#dialCode').prop('disabled', false);
            $("#mobileVerifyBtn").show();
        }

        // if($('input#dialCode').val() != '' && $('input#dialCode').length() > 0){
        //     $('#businessPhone').prop('disabled', true);
        //     $('#dialCode').prop('disabled', true);
        //     $("#mobileVerifyBtn").hide();
        // }else if($('input#dialCode').val() == ''){
        //     $('#businessPhone').prop('disabled', false);
        //     $('#dialCode').prop('disabled', false);
        //     $("#mobileVerifyBtn").show();
        // }


        $("#changePic").click(function(){
            $("#fileUpload").click();
        });

        $("#saveBtn").click(function(){
            $('.text-danger').hide();
            // showCanvas();

            if (validateEmail($('#businessEmailAddress').val())== false && $('#businessEmailAddress').val()!="")
            {
                hideCanvas();
                $('#businessEmailAddress').after('<span class="text-danger"><?php echo $translations["M00365"][$language]; /* Your email address is invalid. Please enter a valid email address. */ ?>.</span>');
                $('html, body').animate({
                    scrollTop: $("#businessEmailAddress").offset().top-120
                }, 500);
                $('#businessEmailAddress').focus();
            }
            else if($("#businessName").val().trim()=="") {

                showMessage('Name cannot be empty', 'warning', '', 'warning', '');

            } else {
                var formData ={
                    'command' : 'editBusinessConfirm',
                    'business_name' : sanitize($("#businessName").val()).trim(),
                    'business_email_address' : sanitize($("#businessEmailAddress").val()),
                    'business_website' : $("#businessWebsite").val(),
                    'business_country' : sanitize($("#businessCountry").val()),
                    'business_info' : $("#businessInfo").val(),
                    'business_phone_number' : sanitize($("#businessPhone").val()),
                    'business_company_size' : $("#companySizeRange").val(),
                    'business_address1' : sanitize($("#businessAddress1").val()),
                    'business_address2' : sanitize($("#businessAddress2").val()),
                    'business_city' : sanitize($("#businessCity").val()),
                    'business_state' : sanitize($("#businessState").val()),
                    'business_postal' : sanitize($("#businessPostal").val())
                };

                fCallback = updateSuccess;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }

            

        });


            $('#emailOtpDiv').hide();
            $('#emailResendBtn').hide();
            $('#timer').hide();

            $('#mobileOtpDiv').hide();
            $('#mobileResendBtn').hide();
            $('#timer2').hide();

            $('#emailOtpSaveBtn').hide();
            $('#mobileOtpSaveBtn').hide();

            $("#emailVerifyBtn").click(function(data){

                var businessPhoneNumber = $('#dialCode').val() + $('input#businessPhone').val().replace(/^0+/, '');
                mode = "email";

                if($('#businessEmailAddress').val() == ''){
                    $('#settingsError').show();
                    $('#settingsError').text('Please fill in your email.');
                    
                } else if (!validateEmail2($('#businessEmailAddress').val())) {
                    $('#settingsError').show();
                    $('#settingsError').text('Please fill in valid email.');
                } else {
                    $('#settingsError').hide();
                    
                    
                    var formData ={
                        'command': 'bindUserOtpGet',
                        user_id: $('input#businessID').val(),
                        'mode' : mode,
                        mobile: businessPhoneNumber,
                        email: $('input#businessEmailAddress').val(),
                    };
                    showCanvas();
                    // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                    
                    
                    $.ajax({
                        type: method,
                        url: url,
                        data: formData,
                        dataType: 'text',
                        encode: true,
                    })
                    
                    .done(function(data) {
                      
                        var obj = JSON.parse(data);


                        if(obj.code == 1){
                            //hideCanvas();
                            showMessage(obj.message_d, 'success', '<?php echo $translations["M01164"][$language]; ?>', 'check-circle-o', '');

                            $("#emailOtpDiv").show();
                            $('#emailResendBtn').hide();
                            $('#emailVerifyBtn').hide();
                            $('#timer').show();
                            $('#emailOtpSaveBtn').show();

            			    var countDownDate = obj.timeout;
                            document.getElementById("timer").innerHTML = countDownDate;
                            startTimerE();

                        } else {

            			    showMessage(obj.message_d, 'warning', '<?php echo $translations["M00168"][$language]; ?>', 'warning', '');

            			}

                        hideCanvas();
                     
                    });
                    
                    
                    
                }

                
            });

            $("#emailResendBtn").click(function(){
                // var businessPhoneNumber = $('#dialCode').val() + $('input#businessPhone').val().replace(/^0+/, '');
                // mode = "email";

                // var formData={
                //     'command' : 'resendOtp',
                //     mobile: businessPhoneNumber,
                //     email: $('input#businessEmailAddress').val(),
                //     'mode' : mode,
                // };
                // fCallback = emailResendOTP;
                // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                $("#emailVerifyBtn").click();
            })

            $("#mobileResendBtn").click(function(){
                // var businessPhoneNumber = $('#dialCode').val() + $('input#businessPhone').val().replace(/^0+/, '');
                // mode = "mobile";

                // var formData={
                //     'command' : 'resendOtp',
                //     mobile: businessPhoneNumber,
                //     email: $('input#businessEmailAddress').val(),
                //     'mode' : mode,
                // };
                // fCallback = mobileResendOTP;
                // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                $("#mobileVerifyBtn").click();

            })

            $("#mobileVerifyBtn").click(function(){

                var businessPhoneNumber = $('#dialCode').val() + $('input#businessPhone').val().replace(/^0+/, '');
                mode = "mobile";

                if($('#businessPhone').val() == ''){
                    $('#settingsError').show();
                    $('#settingsError').text('Please fill in your mobile.');
                    
                }else {
                    $('#settingsError').hide();
                    
                    
                    var formData ={
                        'command': 'bindUserOtpGet',
                        user_id: $('input#businessID').val(),
                        'mode' : mode,
                        mobile: businessPhoneNumber,
                        email: $('input#businessEmailAddress').val(),
                    };
                    showCanvas();
                    // fCallback = bindUserOtpGetResult2;
                    // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                
                    $.ajax({
                        type: method,
                        url: url,
                        data: formData,
                        dataType: 'text',
                        encode: true,
                    })
                
                    .done(function(data) {
                      
                        var obj = JSON.parse(data);

                        hideCanvas();
                        if(obj.code == 1){
                            showMessage(obj.message_d, 'success', '<?php echo $translations["M01164"][$language]; /* Congratulations */ ?>', 'check-circle-o', '');

			                $("#mobileOtpDiv").show();
                            $('#mobileResendBtn').hide();
                            $('#mobileVerifyBtn').hide();
                            $('#timer2').show();
                            $('#mobileOtpSaveBtn').show();

                            var countDownDate = obj.timeout;
                            document.getElementById("timer2").innerHTML = countDownDate;
                            startTimerM();

                        } else {

			                 showMessage(obj.message_d, 'warning', '<?php echo $translations["M00168"][$language]; /* Failed */ ?>', 'warning', '');

			             }


                    });
               }
            });

            $('#emailOtpSaveBtn').click(function(){
                mode = "email";
                var businessPhoneNumber = $('#dialCode').val() + $('input#businessPhone').val().replace(/^0+/, '');

                if($('input#emailOtpCode').val() == ''){
                    $('#settingsError').show();
                    $('#settingsError').text('Please fill in the OTP Code.');
                }
                else {
                    $('#settingsError').hide();
                    var formData ={
                    'command' : 'bindUserAccount',
                    user_id: $('input#businessID').val(),
                    email: $('input#businessEmailAddress').val(),
                    mobile: businessPhoneNumber,
                    verify_code: $('input#emailOtpCode').val(),
                    'mode': mode,
                    };
                    showCanvas();
                    

                    $.ajax({
                        type: method,
                        url: url,
                        data: formData,
                        dataType: 'text',
                        encode: true,
                    })

                    .done(function(data) {
                        showCanvas();
                        var obj = JSON.parse(data);


                        if(obj.code == 1){

                            hideCanvas();
                            showMessage(obj.message_d, 'success', '<?php echo $translations["M01164"][$language]; ?>', 'check-circle-o', 'settings.php');
                            
                            console.log("Success");
                            console.log(obj.message_d);
                            console.log(obj);

                            // $('#emailOtpDiv').hide();

                            // $('#emailResendBtn').hide();
                            // $('#timer').hide();

                            // $("#emailVerifyBtn").hide();
                            // $('#emailOtpSaveBtn').hide();
                            // $('#businessEmailAddress').attr("disabled", "disabled");
                           
                        
                        }else if(obj.code == 0){
                            hideCanvas();
                            showMessage(obj.message_d, 'warning', '<?php echo $translations["M00168"][$language]; /* Failed */ ?>', 'warning');

                            // showMessage(obj.message_d, 'warning', obj.message, 'warning', '')


                        }
                    });
                     
                }
                    

            });

            $('#mobileOtpSaveBtn').click(function(){
                mode ="mobile";
                var businessPhoneNumber = $('#dialCode').val() + $('input#businessPhone').val().replace(/^0+/, '');

                if($('input#mobileOtpCode').val() == ''){
                    $('#settingsError').show();
                    $('#settingsError').text('Please fill in the OTP Code.');
                }else {
                    var formData ={
                    'command' : 'bindUserAccount',
                    user_id: $('input#businessID').val(),
                    email: $('input#businessEmailAddress').val(),
                    mobile: businessPhoneNumber,
                    verify_code: $('input#mobileOtpCode').val(),
                    'mode': mode,
                    };
                    showCanvas();
                

                    $.ajax({
                        type: method,
                        url: url,
                        data: formData,
                        dataType: 'text',
                        encode: true,
                    })

                    .done(function(data) {
                        showCanvas();
                        var obj = JSON.parse(data);

                        if(obj.code == 1){
                            
                            hideCanvas();
                            showMessage(obj.message_d, 'success', '<?php echo $translations["M01164"][$language]; ?>', 'check-circle-o', 'settings.php');
                            
                            console.log("Success");
                            console.log(obj.message_d);
                            console.log(obj);

                            // $('#mobileOtpDiv').hide();
                            // $("#mobileVerifyBtn").hide();
                            // $('#mobileOtpSaveBtn').hide();
                            // $('#businessPhone').attr("disabled", "disabled"); 
                            // $('#dialCode').attr("disabled", "disabled");
                        
                        }else if(obj.code == 0){
                            hideCanvas();
                            showMessage(obj.message_d, 'warning', '<?php echo $translations["M00168"][$language]; /* Failed */ ?>', 'warning');



                        }


                    });
                    
                }
                    

            });


            function format(val) {
                return val.id;
            }
            
            $('#dialCode').select2({
                dropdownAutoWidth : true,
                templateSelection: format,
                width: 80
            });


    });

    function emailResendOTP(data, message){
        showMessage(message, 'success', "Success", "check-circle-o");
        var countDownDate = data.timeout;

        document.getElementById("timer").innerHTML = countDownDate;
        startTimerE();

    }

    function mobileResendOTP(data, message){
        showMessage(message, 'success', "Success", "check-circle-o");
        var countDownDate = data.timeout;

        document.getElementById("timer2").innerHTML = countDownDate;
        startTimerM();

    }

    function startTimerM() {
        // $('#timerDiv').show();
        $('#timer2').show();
        $("#mobileVerifyBtn").hide();
        $('#mobileResendBtn').hide();

        var presentTime = document.getElementById('timer2').innerHTML;

        var s = checkSecondM((presentTime - 1));

        if(s <= "00"){

            // $('#timerDiv').hide();
            $('#timer2').hide();
            $('#mobileResendBtn').show();

        }
        else {
            document.getElementById('timer2').innerHTML = s;
            setTimeout(startTimerM, 1000);
        }
    }

    function startTimerE() {
                            // $('#timerDiv').show();
        $('#timer').show();
        $('#emailVerifyBtn').hide();
        $('#emailResendBtn').hide();

        var presentTime = document.getElementById('timer').innerHTML;

        var s = checkSecondE((presentTime - 1));

        if(s <= "00"){

            // $('#timerDiv').hide();
            $('#timer').hide();
            $('#emailResendBtn').show();

        }
        else {
            document.getElementById('timer').innerHTML = s;
            setTimeout(startTimerE, 1000);
        }
    }

    function checkSecondE(sec) {
        if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
        if (sec < 0) {sec = "59"};
        return sec;
    }

    function checkSecondM(sec) {
        if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
        if (sec < 0) {sec = "59"};
        return sec;
    }

    function bindUserOtpGetResult(data, message) {
        showMessage(message, 'success', "Success", "check-circle-o");
        // $("#emailOtpDiv").show();
        
    }

    function bindUserOtpGetResult2(data, message) {
        showMessage(message, 'success', "Success", "check-circle-o");
        $("#mobileOtpDiv").show();
    }
    


    function updateSuccess(data, message)
    {
        showMessage(message, 'success', "Success", "check-circle-o", 'settings.php');
    }

    function testdelete() {
        var businessImageDelete = "";
        var formData ={
            'command' : 'editProfileImage',
            'business_profile_picture' : businessImageDelete
    };

    fCallback = updateSuccess;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function validateEmail(sEmail) {
        var sEmail = sEmail.trim();
        var filter = /^([\w-\.]+)@/;
        if (filter.test(sEmail)) {
            return true;
        }
        else {
            return false;
        }
        }

    function validateEmail2(sEmail) {
        var email = sEmail.trim();
        var mailformat = /^\w+([\.-]?\w+)*@[a-zA-Z]+(-?[a-zA-Z]+)*(\.[a-zA-Z]{2,3})(\.[a-zA-Z]{2,3})?$/;
		// var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		//var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;S
		
		if(email.match(mailformat))
		{
			return true;
		}
		else
		{
			return false;
		}
    }

        function displayFileName(n)
        {
        if (n.files && n.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#storeFileData").val(reader["result"]);

                var picData = $("#storeFileData").val();

                var formData ={
                    'command' : 'editProfileImage',
                    'business_profile_picture' : picData
                };
                fCallback = updateSuccess;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            };
            reader.readAsDataURL(n.files[0]);
        }
    }

    function loadDefaultListing(data, message) {
        var profileData = data.xun_business;
        var emailVerified = profileData.business_email_verified;
        var phoneVerified = profileData.business_phone_number_verified;
		function format(val) {
            return val.id;
        }
        
        if(emailVerified == 1){
            $('#businessEmailAddress').prop('disabled', true);
            $("#emailVerifyBtn").hide();
        }else if(emailVerified == 0){
            $('#businessEmailAddress').prop('disabled', false);
            $("#emailVerifyBtn").show();
        }

        if(phoneVerified == 1){
            $('#businessPhone').prop('disabled', true);
            $('#dialCode').prop('disabled', true);
            $("#mobileVerifyBtn").hide();
        }else if(phoneVerified == 0){
            $('#businessPhone').prop('disabled', false);
            $('#dialCode').prop('disabled', false);
            $("#mobileVerifyBtn").show();
        }


        $('#businessCountry').select2({
            dropdownAutoWidth : true
        }).val(profileData.business_country).trigger("change");
		
		
        if(profileData.business_name=="") {
            $("#businessName").prop('disabled', false);
        } else {
            $("#businessName").prop('disabled', true);
        }
        $("#userName").html(profileData.business_name);
        $("#profileImgSrc").attr("src", profileData.business_profile_picture_url);
        $("#businessName").val(sanitize(profileData.business_name));
        $("#businessID").val((data.business_id));
        $("#businessEmailAddress").val(sanitize(profileData.business_email_address));
        $("#businessWebsite").val(profileData.business_website);
        $("#businessCountry").val(profileData.business_country);
        $("#businessInfo").val(profileData.business_info);
        $("#businessPhone").val(sanitize(profileData.business_phone_number));
        $("#companySizeRange").val(profileData.business_company_size);
        $("#businessAddress1").val(sanitize(profileData.business_address1));
        $("#businessAddress2").val(sanitize(profileData.business_address2));
        $("#businessCity").val(sanitize(profileData.business_city));
        $("#businessState").val(sanitize(profileData.business_state));
        $("#businessPostal").val(sanitize(profileData.business_postal));
        if (profileData.business_country_code != ''){
            $("#dialCode").val('+' + profileData.business_country_code);
        } else {
            $('#dialCode').find('option').each(function(){
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


        if(phoneVerified == 1) {
            $('#dialCode').select2({
                dropdownAutoWidth : true,
                templateSelection: format,
                width: 80
            });
        }
        
    }


</script>

<style>
    .capitalStyle{
        font-size: 15px !important;
    }
</style>
