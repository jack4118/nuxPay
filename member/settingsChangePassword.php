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
                              <a class="nav-link " id="profileBtn" href="settings.php" style="font-size: 15px;"><?php echo $translations["M01876"][$language]; /* Profile */ ?></a>
                              <a class="nav-link active" id="securityBtn" href="javascript:void(0)" style="font-size: 15px;"><?php echo $translations["M01703"][$language]; /* Security */ ?></a>
                              <a class="nav-link" id="coinBtn" href="settingsAddWallet.php" style="font-size: 15px;"><?php echo $translations["M02074"][$language]; /* Payment Currencies */ ?></a>
                              <a class="nav-link" id="coinBtn1" href="settingsAddWalletCurrency.php" style="font-size: 15px;"><?php echo $translations["M02071"][$language]; /* Personal Wallet */ ?></a>
							  <a class="nav-link" id="whitelistBtn" href="whitelistAddresses.php" style="font-size: 15px;"><?php echo $translations["M01713"][$language]; /* Whitelist Addresses */ ?></a>
                            </nav>
                        </div>
                    </div>
				</div>
			</div>



			<div class="m-content">


                <div class="col-12" id="securitySection">
                    <div class="row">

                        <div class="col-12 mt-3">
                            <div class="row">
                                <div class="col-12 bigText">
                                    <?php echo $translations["M02075"][$language]; /* Change Login Password */ ?>
                                </div>
                                <div class="col-12">
                                    <div class="m-portlet col-md-6 px-0">
                                        <div class="m-portlet__body">
                                            <div class="row m-form">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">
                                                            <?php echo $translations["M00373"][$language]; /* Current Password */ ?><span class="text-danger">*</span>
                                                        </label>
                                                        <input id="currentPassword" type="password" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="capitalStyle"><?php echo $translations["M01569"][$language]; /* New Password */ ?><span class="text-danger">*</span></label>
                                                            <i data-toggle="m-tooltip" data-direction="left" data-width="auto" class="m-form__heading-help-icon descMsg flaticon-info m--icon-font-size-lg" title="" data-html="true" data-original-title="<p align='left' class='mb-0'>Min 8 characters</p>"></i>
                                                        <input id="newPassword" type="password" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="capitalStyle"><?php echo $translations["M00375"][$language]; /* Confirm New Password */ ?><span class="text-danger">*</span></label>
                                                        <input id="confirmPassword" type="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 px-2">
                            <button id="changePasswordBtn" class="btn searchBtn mx-2 my-2" type="button"><?php echo $translations["M01820"][$language]; /* Save */ ?></button>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="innerPageTitle"><?php echo $translations["M01653"][$language]; /* 2-Factor Authentication */ ?></div>
                            <div class="innerPageSubTitle">
                                <?php echo $translations["M01638"][$language]; /* Security is critical at */ ?> <?php echo $sys['companyName']?>.</div>
                                <?php echo $translations["M02076"][$language]; /* To help keep your account safe, enable authenticator */ ?>.
                            </div>

                        <div class="col-12 mt-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="m-portlet">
                                        <div class="m-portlet__body">
                                            <div class="row">
                                                <div class="col-12 px-0">
                                                    <div class="m-form">
                                                        <div class="d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <img src="images/ga2.svg" width="50px">
                                                            </div>
                                                            <div>
                                                                <b class="d-block"><?php echo $translations["M02077"][$language]; /* Authenticator */ ?></b>
                                                                <span class="d-block"><?php echo $translations["M02078"][$language]; /* Time-based one-time 6-digits code */ ?></span>
                                                            </div>
                                                            <div class="col text-right">
                                                                <button id="enableBtn" class="btn primaryBtn"><?php echo $translations["M01031"][$language]; /* Enable */ ?></button>
                                                                <button id="unableBtn" class="btn primaryBtn" data-toggle="modal" style="display: none;"><?php echo $translations["M01030"][$language]; /* Disable */ ?></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

<div class="modal fade" id="twoFactorModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b justify-content-center">
                <div class="modal-title hasSub">
                    <h5 id="twoFactorTitle"><?php echo $translations["M01673"][$language]; /* Enable 2-Factor Authentication */ ?></h5>
                    <p class="my-0 enableStep1">
                        <?php echo $translations["M01674"][$language]; /* The OTP code has been sent to your verified contact method */ ?>:<br>
                        <span id="mobileAvailable"><?php echo $translations["M00390"][$language]; /* Mobile Number */ ?>: <?php echo $_SESSION['mobile']?><br></span>
                        <span id="emailAvailable"><?php echo $translations["M00383"][$language]; /* Email */ ?>: <?php echo $_SESSION['email']?></span>
                    </p>

                    <div class="enableStep2" style="display: none;">
						<div id="qrcode" class=""></div>
                        <ul class="text-left pl-3">
                            <li><?php echo $translations["M01646"][$language]; /* Install Google Authenticator app on your mobile device. */ ?></li>
                            <li><?php echo $translations["M01647"][$language]; /* Scan QR code with the authenticator. */ ?></li>
                            <li><?php echo $translations["M01648"][$language]; /* Enter 6-digits codes from authenticator. */ ?></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div class="col-12 text-center">
                    <p class="enableStep1"><?php echo $translations["M01649"][$language]; /* Enter your OTP code */ ?></p>
                    <p class="enableStep2" style="display: none;"><?php echo $translations["M01650"][$language]; /* Enter your 2-factor authenticator code */ ?></p>
                    <div class="d-inline-flex authenticationBox align-items-center" id=timerTable>
                        <div class="mr-2">
                            <img src="images/OTP.png" width="30px">
                        </div>
                        <input class="form-control authenticator" type="" name="" id ="otpCodeID">
						<span id="timer" name="timer" style="padding-left: 20px"></span>
                    </div>
                    <p id ="didNotReceiveSms" ><?php echo $translations["M01651"][$language]; /* Didn't receive the OTP? */ ?> 
                        <a href="javascript:;" onclick="requestOTP()"><?php echo $translations["M01652"][$language]; /* Re-send OTP */ ?></a>
                    </p>

                </div>
            </div>

            <div class="modal-footer bg-w">
                <div class="col-12 text-center">
                    <a href="javascript:void(0)" id="confirmBtn" class="btn primaryBtn enableStep1" style=""><?php echo $translations["M01788"][$language]; /* Confirm */?></a>
                    <a href="javascript:void(0)" id="enableModalBtn" class="btn primaryBtn enableStep2" style=" display: none;"><?php echo $translations["M01031"][$language]; /* Enable */ ?></a>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="unableModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b justify-content-center">
                <div class="modal-title hasSub">
                    <h5>2-Factor Authentication</h5>
                    <p class="my-0 enableStep1">Enter authenticator codes to make sure it's really you trying to change settings</p>
                </div>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div class="col-12 text-center">
                    <p>Enter your 2-factor authenticator code</p>
                    <div class="d-inline-flex authenticationBox">
                        <img src="images/ga2.svg" width="40px" class="mr-2">
                        <input class="form-control authenticator" type="" name="" id="authCodeID">
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-w">
                <div class="col-12 text-center">
                    <a href="javascript:void(0)" id="confirmUnableBtn" class="btn primaryBtn" style="">Confirm</a>
                </div>
                
            </div>
        </div>
    </div>
</div> -->


<?php include 'sharejsDashboard.php'; ?>
<script src="js/jquery.qrcode.js" type="text/javascript"></script>

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
    var check = "false";
    var mobileAva = '<?php echo $_SESSION['mobile']?>';
    var emailAva = '<?php echo $_SESSION['email']?>';

    var twoFAMode = "";

    var twoFAMode = "";

	$(document).ready(function() {
		formData = {
			command : 'get2FAStatus',

		};
		fCallback = loadGet2FAStatus;

		ajaxSend('scripts/reqWhitelist.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	});

    if (mobileAva==""){
        $('#mobileAvailable').hide();
    }
    if (emailAva==""){
        $('#emailAvailable').hide();
    }
    

    $("#enableBtn").click(function(){
		
        twoFAMode = "enabled";
        $("#twoFactorTitle").text("Enable 2-Factor Authentication");

		formData = {
			command : 'request2FASMSOTP'

		};
		fCallback = loadSendSMSOTP;
		whitelistUrl ='scripts/reqWhitelist.php'
		ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		
    });

    $("#unableBtn").click(function(){
        
        twoFAMode = "disabled";
        $("#twoFactorTitle").text("Disable 2-Factor Authentication");

        formData = {
            command : 'requestDisable2FASMSOTP'

        };
        fCallback = loadSendSMSOTP;
        whitelistUrl ='scripts/reqWhitelist.php'
        ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
    });

    $("#confirmBtn").click(function(){

        if(twoFAMode=="enabled") {
            formData = {
                command : 'verify2FASMSOTP',
                otp_code : $('#otpCodeID').val()

            };
        } else {
            formData = {
                command : 'verifyDisable2FASMSOTP',
                otp_code : $('#otpCodeID').val()

            };
        }

		fCallback = loadVerifySMSOTP;
		whitelistUrl ='scripts/reqWhitelist.php'
		ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
       
    });
	
	// $("#confirmUnableBtn").click(function(){
	
	// 	formData = {
	// 		command : 'disabled2FA',
	// 		code : $('#authCodeID').val()

	// 	};
	// 	fCallback = loadDisabled2FA;
	// 	whitelistUrl ='scripts/reqWhitelist.php'
	// 	ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
       
 //    });

	$("#enableModalBtn").click(function(){
		
		formData = {
			command : 'register2FA',
			code : $('#otpCodeID').val()

		};
		fCallback = loadRegister2FA;
		whitelistUrl ='scripts/reqWhitelist.php'
		ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	});
	

    $('#changePasswordBtn').click(function(){

            if( $('input#currentPassword').val() == ''){
                $('.text-danger').hide();
                $('input#currentPassword').after('<span class="text-danger"><?php echo $translations["M00377"][$language]; /* Please fill in your current password. */ ?></span>');
                $('html, body').animate({
                    scrollTop: $("#currentPassword").offset().top-120
                }, 500);
                $('input#currentPassword').focus();
            }else if( $('input#newPassword').val() == ''){
                $('.text-danger').hide();
                $('input#newPassword').after('<span class="text-danger"><?php echo $translations["M00378"][$language]; /* Please fill in your new password. */ ?></span>');
                $('html, body').animate({
                    scrollTop: $("#newPassword").offset().top-120
                }, 500);
                $('input#newPassword').focus();
            }else if($('input#newPassword').val().length < 8 ){
                $('.text-danger').hide();
                $('input#newPassword').after('<span class="text-danger"><?php echo $translations["M01588"][$language]; /* Password cannot be less than 8 characters. */ ?></span>');
                $('html, body').animate({
                    scrollTop: $("#newPassword").offset().top-120
                }, 500);
                $('input#newPassword').focus();
            }else if( $('input#confirmPassword').val() == ''){
                $('.text-danger').hide();
                $('input#confirmPassword').after('<span class="text-danger"><?php echo $translations["M00379"][$language]; /* Please fill in your confirm password. */ ?></span>');
                $('html, body').animate({
                    scrollTop: $("#confirmPassword").offset().top-120
                }, 500);
                $('input#confirmPassword').focus();
            }else if($('input#newPassword').val() != $('input#confirmPassword').val()){
                $('.text-danger').hide();
                $('input#confirmPassword').after('<span class="text-danger"><?php echo $translations["M00380"][$language]; /* The passwords you entered do not match. Please retype your password. */ ?></span>');
                $('html, body').animate({
                    scrollTop: $("#confirmPassword").offset().top-120
                }, 500);
                $('input#confirmPassword').focus();
            }else{
                $('.text-danger').hide();
                var currentPassword = sanitize($('input#currentPassword').val());
                var newPassword = sanitize($('input#newPassword').val());
                var confirmPassword = sanitize($('input#confirmPassword').val());

                fCallback = changePasswordCB;
                formData  = {
                    command: 'changePassword',
                    current_password: currentPassword,
                    new_password: newPassword,
                    confirm_password: confirmPassword
                };
                ajaxSend("scripts/reqChangePassword.php", formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            }
        });


	function loadRegister2FA(data, message){
		var obj = data;
		$("#twoFactorModal").modal('hide');

		if(obj.code == 1){
			hideCanvas();
			location.reload();

		}
	}
	
	
	// function loadDisabled2FA(data, message){
	// 	var obj = data;
	// 	$("#unableModal").modal('hide');


	// 	if(obj.code == 1){
	// 		hideCanvas();
	// 		location.reload();

	// 	}
	// }
	
	function loadGet2FAStatus(data, message){
		var obj = data;
		var faStatus = obj.data.status;
	

		if(faStatus != false){

			$("#enableBtn").hide();
			$("#unableBtn").show();
		}
		else{
			$("#enableBtn").show();
			$("#unableBtn").hide();



		}
	}
	
	function loadVerifySMSOTP(data, message){
		if(data.code == 1){			
			
            if(twoFAMode=="enabled") {

                var qr_data = data.data.qr_param;
                $('#qrcode').empty();
                $('#qrcode').qrcode({
                    render: "canvas", 
                    text: qr_data,
                    width: 200,
                    height: 200,
                    background: "#ffffff",
                    foreground: "#000000",
    //                  src: 'images/qrcode.jpg',
                    imgWidth: 20,
                    imgHeight: 20,
                });

                $('#otpCodeID').val('');
                $("#timerDiv").hide();
                $("#timer").hide();
                $("#didNotReceiveSms").hide();
                $(".enableStep1").hide();
                $(".enableStep2").show();
                check = "true";
                document.getElementById('timer').innerHTML = "1";   

            } else {

                $("#twoFactorModal").modal('hide');
                hideCanvas();
                location.reload();

            }

            	
        }
		else{
			$("#twoFactorModal").modal('hide');
		}
	}
	
	function loadSendSMSOTP(data,message){
        $("#otpCodeID").val('');
		if(data.code == 1){

            if(data.data) {

                document.getElementById("timer").innerHTML = data.data.countdown_second;
                $("#didNotReceiveSms").hide();
                $("#timer").show();
                startTimer();
                $(".enableStep1").show();
                $(".enableStep2").hide();

                $("#twoFactorModal").modal('show');
                
            } else {
                showMessage(message, 'danger', '', 'times-circle-o', 'settings.php');
            }
			
		}
	}
	
    function loadDisableSendSMSOTP(data,message) {
        $("#otpCodeID2").val('');
        if(data.code == 1){

            if(data.data) {

                document.getElementById("timer").innerHTML = data.data.countdown_second;
                $("#didNotReceiveSms").hide();
                $("#timer").show();
                startTimer();
                $(".enableStep1").show();
                $(".enableStep2").hide();

                $("#twoFactorModal").modal('show');
                
            } else {
                showMessage(message, 'danger', '', 'times-circle-o', 'settings.php');
            }
            
        }
    }

    function changePasswordCB(data,message){
        showMessage(message, 'success', 'Success', "check-circle-o", 'settingsChangePassword.php');
    };

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

	function startTimer() {
		$('#timerDiv').show();
		$('#timer').show();
		$('#didNotReceiveSms').hide();

		var presentTime = document.getElementById('timer').innerHTML;

		var s = checkSecond((presentTime - 1));

		if(s <= "00" && check == "false"){
			$('#timerDiv').hide();
			$('#timer').hide();
			$('#didNotReceiveSms').show();

		} else if (s <= "00" && check == "true"){
            $('#timerDiv').hide();
			$('#timer').hide();
            $('#didNotReceiveSms').hide();
        }
		else {
			document.getElementById('timer').innerHTML = s;
			setTimeout(startTimer, 1000);
		}
	}

	function checkSecond(sec) {
		if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
		if (sec < 0) {sec = "59"};
		return sec;
	}
	
	function requestOTP(){

        if(twoFAMode=="enabled") {
            formData = {
                command : 'request2FASMSOTP'

            };
        } else {
            formData = {
                command : 'requestDisable2FASMSOTP'

            };
        }
		
		fCallback = loadRequestOTP;
		whitelistUrl ='scripts/reqWhitelist.php'
		ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}
	
	function loadRequestOTP(data, message){
		if(data.code == 1){

            if(data.data) {
    			document.getElementById("timer").innerHTML = data.data.countdown_second;
    			$("#didNotReceiveSms").hide();
    			$("#timer").show();
    			startTimer();
            } else {
                showMessage(message, 'danger', '', 'times-circle-o', 'settings.php');
    			
    		}
        }
	}
	




</script>
