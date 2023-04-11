<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>


<body style="overflow-x: hidden;display: flex">

	<div id="" class="col-12">
		<div class="row nuxPayLoginHeight">

			<div class="col-xl-4 col-lg-6 col-12 nuxPayloginSection2Box">
				<div class="row">
					<div class="loginContainer">
						<div class="row">
							<div class="col-12 text-center">
								<a class="kt-header__brand-logo headerLink" href="homepage.php" data-name="Homepage">
									<img alt="Logo" src="<?php echo $sys['newHomepageLogoBlack2'] ?>" style="" class="logoWidth">
								</a>
							</div>

							<div class="col-12 nuxPayDesc text-center nuxPayLoginFormMargin1" style="color: #000">
								<span>Dear </span>
								<span id="userRegisterName"></span>
							</div>
							<div class="col-12 nuxPayNoAccount text-center mt-4" style="color: #000">
								<span>an OTP had been sent to your phone number </span>
								<span id="userMobileNumber"></span>
							</div>

							<div class="col-12 text-center nuxPayLoginFormMargin2" style="">
								<div class="row">

									<div class="col-12">
										<div id="errorMsg" class="alert alert-danger" style="display: none;"></div>
									</div>
									<div class="col-12">
										<div class="row">

											<div class="col-10 form-group">
												<input id="linkCode" name="linkCode" class="form-control m-input m-login__form-input--last" placeholder="<?php echo $translations["M00450"][$language]; //5 Digit Code?>" maxlength="5" type="text" onkeypress="return isNumberKey(event);">
											</div>
											<div class="col-2 px-0">
												<div id="timerDiv" class="col-md-4 text-center linkCode2" style="margin-top: 10px;">
													<div id="linkCode2" name="linkCode2" class="" placeholder="" disabled>
														<span id="timer" name="timer" style="text-align: center;"></span>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-12 form-group" id="resendDiv" style="display: block;">
										<button type="button" class="btn primaryBtn" id="resendBtn"><?php echo $translations["M00451"][$language]; ?><!-- Resend --></button>
									</div>

									<div class="col-12 form-group mt-4">
										<div class="row justify-content-center">

											<div class="col-xl-8 col-lg-8 col-md-6 col-12">
												<div class="row">
												<div class="col-xl-6 col-lg-6 col-md-6 col-12">
													<button type="button" class="btn primaryBtn" onclick="window.location.href='login.php?type=loginPage'"><?php echo $translations["M00443"][$language]; ?><!-- Back --></button>
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6 col-12 marginSignPhone">
													<button id="nextBtn" type="button" class="btn primaryBtn"><?php echo $translations["M00444"][$language]; ?><!-- Next --></button>
												</div>
												</div>
											</div>

										</div>
									</div>

									<div class="col-12 text-center loginCopyRight">
										Copyright © 2020 NuxPay. All Rights Reserved.
									</div>


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-8 col-lg-6 col-12 order-lg-2 order-1 nuxPayLoginBox2 nuxPaySignupBG">
				<div class="row">
					<div class="col-12 nuxPayLoginObjectPosition2">
						<img class="nuxPayLoginObject2" src="/images/login/nuxPayLoginObject.png">
					</div>
					<div class="col-10 align-self-center">
						<div class="row">
							<div class="col-12 nuxPayTitle">
								Welcome To NuxPay
							</div>
							<div class="col-12 nuxPayDesc">
								Start getting payment from around the world.
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<?php include 'sharejsDashboard.php'; ?>   

</body>


</html>

<script>
	
	var url = 'scripts/reqLogin.php';
	var method = 'POST';
	var debug = 0;
	var bypassBlocking = 0;
	var bypassLoading = 0;
	var mobileNo = "<?php echo $_POST['mobileNumber']; ?>";
	var username = "<?php echo $_POST['name']; ?>";
	var fromPage = "<?php echo $_POST['fromPage']; ?>"

	$(document).ready(function(){

		if (fromPage) {
			var formData = {
				command     : "resendOtpPhone",
				mobile      : mobileNo
			};
			fCallback = registerPhoneMsg;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);   
		}

		$('#userRegisterName').html(username);
		$('#userMobileNumber').html(mobileNo);
		$('#resendBtn').click(function() {
			
			$('#errorMsg').hide();
			$('#errorMsg').text();
           
			var formData = {
				command     : "resendOtpPhone",
				mobile      : mobileNo
			};
			fCallback = registerPhoneMsg;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);   

		});

		$('#nextBtn').click(function() {
			var verifyCode = $("#linkCode").val();

			$('#errorMsg').hide();
			$('#errorMsg').text();

			if($('input#linkCode').val() ==""){
				$('#errorMsg').show();
				$('#errorMsg').text("Please enter your Verify Code.");
				hideCanvas();
			}else{
				var formData = {
					command       : "verifyCode",
					mobile        : mobileNo,
					verify_code   : verifyCode
				};
				fCallback = verifyMsg;
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
			}
		});   
	});

	function registerPhoneMsg(data, message) {

		var countDownDate = data.timeout;

		document.getElementById("timer").innerHTML = countDownDate;
		startTimer();

		function startTimer() {
			$('#timerDiv').show();
			$('#timer').show();
			$('#resendDiv').hide();

			var presentTime = document.getElementById('timer').innerHTML;

			var s = checkSecond((presentTime - 1));

			if(s <= "00"){

				$('#timerDiv').hide();
				$('#timer').hide();
				$('#resendDiv').show();

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
	}

    function verifyMsg(data, message) {
    	<?php $_SESSION["isMobileVerified"] = 1; ?>
    	showMessage(message, 'success', data.message, 'check-circle-o', 'login.php');
    }

</script>