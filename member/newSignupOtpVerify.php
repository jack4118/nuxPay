<?php 
include 'include/config.php';
include 'headLogin.php'; 
?>

<link href="<?php echo $config['domain']?>/css/customLogin.css?ts=<?php echo filemtime('css/customLogin.css'); ?>" rel="stylesheet" type="text/css" />

<body>
	
	<div id="loginContainer">

		<div id="loginHeader">
			<a href='index.php'><img id="loginHeaderLogo" src="<?php echo $dashboardLogo; ?>"></a>
		</div>

		<div id="loginMessage"></div>

		<div id="loginContent">
			
			<div id="accountBox">

				<div id="createTitle"><?php echo $translations["M01527"][$language]; /* Account Verification */ ?></div>
				<div id="createSubTitle"><?php echo $translations["M01528"][$language]; /* Please enter the 5-digit OTP that was sent to */ ?> <br><span id='otpReceiver'></span></div>

                
				<div style="margin-top: 50px;">

					<div class="otpDiv"><?php echo $translations["M01583"][$language]; /* OTP */ ?></div>
					<form method="get" class="digit-group" data-group-name="digits" data-autosubmit="false" autocomplete="off" >

						<input type="text" inputmode="numeric" pattern="[0-9]*" id="digit_1" name="digit_1" data-next="digit_2" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
						<input type="text" inputmode="numeric" pattern="[0-9]*" id="digit_2" name="digit_2" data-next="digit_3" data-previous="digit_1" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
						<input type="text" inputmode="numeric" pattern="[0-9]*" id="digit_3" name="digit_3" data-next="digit_4" data-previous="digit_2" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
						<input type="text" inputmode="numeric" pattern="[0-9]*" id="digit_4" name="digit_4" data-next="digit_5" data-previous="digit_3" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
						<input type="text" inputmode="numeric" pattern="[0-9]*" id="digit_5" name="digit_5" data-previous="digit_4" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />

					</form>

				</div>

				<div class="col-12 otpDiv" style="margin-top: 30px; margin-bottom: 30px;">
					<div class='row justify-content-between'>
						<div class="col-6">
							<span class="resendText"><?php echo $translations["M01568"][$language]; /*Resend OTP in*/ ?> </span><span id="timer"></span><span class="seconds">s</span>
							<a id="resendBtn"><u><?php echo $translations["M01530"][$language]; /*Resend OTP*/ ?></u></a>
						</div>
						<div class="col-6">
							<button class="btn primaryBtn" id="signUpBtn"><?php echo $translations["M01985"][$language]; /*Next*/ ?></button>
						</div>
					</div>
				</div>
				

			</div>

		</div>

		<div id="loginFooter">
			<p>Copyright ©<?php echo date("Y"); ?> • <?php echo $sys['companyName']; ?> • <?php echo $translations["M00299"][$language]; ?><!-- All Rights Reserved. --> </p>
		</div>
	</div>

</body>


<?php include 'sharejsDashboard.php'; ?>  

<script>
	
	var email = '<?php echo $_POST['email']; ?>';
	var password = '<?php echo $_POST['password']; ?>';
	var mobileNumber = '<?php echo $_POST['mobileNumber']; ?>';
	var countryCode = '<?php echo $_POST['countryCode']; ?>';
	var promoCode = '<?php echo $_POST['promoCode']; ?>';
	var timeout = '<?php echo $_POST['timeout']; ?>';
	var accountType = '<?php echo $_POST['accountType']; ?>';
	var requestNewOtp = false;
	var from_send_fund = "<?php echo $_POST['fromSendFund'];?>";
	var send_fund_param = <?php $sendFundParam = $_POST['sendFundParam']; echo json_encode($sendFundParam, true);?>;
	var otpCode = '';
	var transaction_token = "<?php echo $_POST['transaction_token'];?>";

	$(document).ready(function(){

		$('.digit-group').find('input').each(function() {
			$(this).attr('maxlength', 1);

			$(this).on('keypress', function(e) {
				var parent = $($(this).parent());

				if (e.keyCode === 8 || e.keyCode === 37) {
					var prev = parent.find('input#' + $(this).data('previous'));
					if (prev.length) {
						$(prev).select();

					}
				} else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode==37 ) {
					var next = parent.find('input#' + $(this).data('next'));

					if (next.length) {
						setTimeout(function() {
							$(next).select();
						}, 100);
					}
				}
			});


			$(this).on('keyup', function(e) {
				var parent = $($(this).parent());

				// alert('keycode: '+e.keyCode);
				// alert($(this).val());

				if (e.keyCode === 8 || e.keyCode === 37) {
                    var prev = parent.find('input#' + $(this).data('previous'));
                    if (prev.length) {
                            $(prev).select();

                    }
                } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode==37 ) {
					var next = parent.find('input#' + $(this).data('next'));

					if (!next.length) {

						var digit1 = document.getElementById("digit_1").value;
						var digit2 = document.getElementById("digit_2").value;
						var digit3 = document.getElementById("digit_3").value;
						var digit4 = document.getElementById("digit_4").value;
						var digit5 = document.getElementById("digit_5").value;
						var verify_code = digit1+digit2+digit3+digit4+digit5;
						otpCode = verify_code;

						if(verify_code.length==5) {
							$(this).blur();
							submitOTPCode(countryCode, mobileNumber, email, accountType, password, promoCode, verify_code);
						}

					}
				} else if(e.keyCode==undefined) {

					var str = $(this).val();

					if(str.length==5) {
						$('#digit_1').val(str.substring(0,1));
						$('#digit_2').val(str.substring(1,2));
						$('#digit_3').val(str.substring(2,3));
						$('#digit_4').val(str.substring(3,4));
						$('#digit_5').val(str.substring(4,5));

						otpCode = str;
						
						$(this).blur();
						submitOTPCode(countryCode, mobileNumber, email, accountType, password, promoCode, str);
					}
				}

			});


		});
		
		$('#signUpBtn').click(function() {
			submitOTPCode(countryCode, mobileNumber, email, accountType, password, promoCode, otpCode);
			
		});

		$('#resendBtn').click(function() {

			var url = '<?php echo $sys['domain'] ?>/scripts/reqLogin.php';
			var method = 'POST';
			var debug = 0;
			var bypassBlocking = 0;
			var bypassLoading = 0;

			var formData = {
				command: "resendOtpPhone",
				mobile: (countryCode + mobileNumber.replace(/^0+/, '')),
				email: email,
				'mode': accountType,
			};
			fCallback = registerPhoneMsg;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		});

		if(accountType=="email") {
			$('#otpReceiver').text(email);
		} else {
			$('#otpReceiver').text((countryCode.replace(countryCode, '') + mobileNumber.replace(/^0+/, '')));
		}


		if(accountType=='' || (accountType=='email' && email=='') || (accountType=='mobile' && mobileNumber=='') || password=='' ) {

			$.redirect('index.php', {});

		} else {

			document.getElementById("timer").innerHTML = timeout;
			startTimer();

		}

		

	});

	function submitOTPCode(countryCode, mobileNumber, email, accountType, password, promoCode, verify_code) {

		var digit1 = document.getElementById("digit_1").value;
		var digit2 = document.getElementById("digit_2").value;
		var digit3 = document.getElementById("digit_3").value;
		var digit4 = document.getElementById("digit_4").value;
		var digit5 = document.getElementById("digit_5").value;

		verify_code = digit1+digit2+digit3+digit4+digit5;
		// console.log(verify_code);
		
		if(verify_code.length==5) {
			
			showCanvas();
			
			var mobile = (countryCode + mobileNumber.replace(/^0+/, ''));
			var url = '<?php echo $sys['domain'] ?>/scripts/reqRegister.php';
			var formData = {
				command: 'memberRegister',
				business_mobile: mobile,
				business_email: email,
				'mode': accountType,
				business_password: password,
				business_retypePassword: password,
				business_name: (accountType=='email'? email: mobile),
				verify_code: verify_code,
				reseller_code: promoCode,
				signup_type: 'newSignup'
			};

			// console.log("#####");
			// console.log(url);
			// console.log(formData);

			var method = 'POST';
			var debug = 0;
			var bypassBlocking = 0;
			var bypassLoading = 0;

			$.ajax({
				type: method, // define the type of HTTP verb we want to use (POST for our form)
				url: url, // the url where we want to POST
				data: formData, // our data object
				dataType: 'text', // what type of data do we expect back from the server
				encode: true,
			})
			.done(function(data) {

				var obj = JSON.parse(data);
				//console.log(obj);
				if (obj.code == 1) {

					hideCanvas();

					if(accountType=='email') {
						utmTracking('', email, '', 'Sign Up OTP Verify (' + obj.message_d + ')');
					} else {
						utmTracking('', mobile, '', 'Sign Up OTP Verify (' + obj.message_d + ')');
					}
					
					if(from_send_fund == 1){
						showMessage(obj.message_d, 'success', '<?php echo $translations["M01164"][$language]; /* Congratulations */ ?>', 'check-circle-o', ['<?php echo $sys['domain']?>/sendFund.php', {sendFundParam:send_fund_param}]);
					}
					else if(transaction_token != ''){
						showMessage(obj.message_d, 'success', '<?php echo $translations["M01164"][$language]; /* Congratulations */ ?>', 'check-circle-o', ['<?php echo $sys['domain']?>/sendReview.php', {transaction_token:transaction_token}]);
					}
					else{
						showMessage(obj.message_d, 'success', '<?php echo $translations["M01164"][$language]; /* Congratulations */ ?>', 'check-circle-o', '<?php echo $sys['domain']?>/dashboard.php');
					}
					

				} else if(obj.errorCode==-102) {

					hideCanvas();

					$('.digit-group').trigger("reset");

					showMessage(obj.message_d, 'warning', obj.message, 'warning', '');

					if(accountType=='email') {
						utmTracking('', email, '', 'Sign Up OTP Verify (' + obj.message_d + ')');
					} else {
						utmTracking('', mobile, '', 'Sign Up OTP Verify (' + obj.message_d + ')');
					}

					requestNewOtp = true;
					document.getElementById('timer').innerHTML = 1;

				} else {

					hideCanvas();

					$('.digit-group').trigger("reset");

					var error_message = "";
					if (obj.error_message) {

						$.each(obj.error_message, function(k, v) {
							error_message += v + "<br>";
						});

						showMessage(obj.message_d + "<br><?php echo $translations["M01165"][$language]; ?><br>" + error_message, 'warning', obj.message, 'warning', '');

					} else {
						
						error_message = obj.message_d.replace("%%timeout%%", obj.timeout);

						showMessage(error_message, 'warning', obj.message, 'warning', '');

					}

					if(accountType=='email') {
						utmTracking('', email, '', 'Sign Up OTP Verify (' + error_message + ')');
					} else {
						utmTracking('', mobile, '', 'Sign Up OTP Verify (' + error_message + ')');
					}
					
				}
			});

		}
	}

	function registerPhoneMsg(data, message) {
		
		timeout = data.timeout;
		document.getElementById("timer").innerHTML = timeout;
		startTimer();

	}

	function startTimer() {

		$('#timer').show();
		$('.seconds').show();
		$('#resendBtn').hide();
		
		var presentTime = document.getElementById('timer').innerHTML;

		var s = checkSecond((presentTime - 1));

		if (s <= "00") {
			$('.resendText').hide();
			$('#timer').hide();
			$('.seconds').hide();
			$('#resendBtn').show();

			if(requestNewOtp) {
				requestNewOtp = false;
				$('#resendBtn').html('<u><?php echo $translations["M01567"][$language]; /* Request New OTP */ ?></u>');
			} else {
				$('#resendBtn').html('<u><?php echo $translations["M01530"][$language]; /* Resend OTP */ ?></u>');
			}

		} else {
			$('.resendText').show();
			document.getElementById('timer').innerHTML = s;
			setTimeout(startTimer, 1000);
		}
	}

	function checkSecond(sec) {
		if (sec < 10 && sec >= 0) {
			sec = "0" + sec
		}; // add zero in front of numbers < 10
		if (sec < 0) {
			sec = "59"
		};
		return sec;
	}

	function hideMessageDiv() {
		document.getElementById("loginContainer").style.gridTemplateRows = "60px 0px auto 60px";
	}
	
	function showMessageDiv(isSuccess, m) {

		var msg = "";			
		if(isSuccess) {
			msg = "<p><i class='fa fa-check successFa'></i> <span>" + m + "</span></p>";
		} else {
			msg = "<p><i class='fa fa-times failedFa'></i> <span>" + m + "</span></p>";
		}
		
		$('#loginMessage').html(msg);
		document.getElementById("loginContainer").style.gridTemplateRows = "60px 40px auto 60px";

		// setTimeout(function() {
	 //        document.getElementById("loginContainer").style.gridTemplateRows = "60px 0px auto 60px";
	 //    }, 3000);

	}

	function adjustFooter() {

		var windowHeight = $(window).height();
		var loginContentHeight = document.getElementById('loginContent').offsetHeight;
		var loginMessageHeight = document.getElementById('loginMessage').offsetHeight;
		var allHeight = 70 + loginMessageHeight + loginContentHeight + 60;
		var diffHeight = windowHeight - allHeight;

		if(diffHeight > 0) {
			$('#loginFooter').css('padding-top', diffHeight);
		} else {
			$('#loginFooter').css('padding-top', 0);
		}

	}

	function detectIEEdge() {

	    var ua = window.navigator.userAgent;
	    var msie = ua.indexOf('MSIE ');
	    if (msie > 0) {
	        // IE 10 or older => return version number
	        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
	    }

	    var trident = ua.indexOf('Trident/');
	    if (trident > 0) {
	        // IE 11 => return version number
	        var rv = ua.indexOf('rv:');
	        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
	    }

	    var edge = ua.indexOf('Edge/');
	    if (edge > 0) {
	       // Edge => return version number
	       return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
	    }

	    // other browser
	    return "";
	}
	
	if(detectIEEdge()!="") {
		$( window ).resize(function() {
			adjustFooter();
		});

		adjustFooter();
	}

</script>


</html>
