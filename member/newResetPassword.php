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

				<div id="createTitle"><?php echo $translations["M01561"][$language]; /* Reset Login Password */?></div>
				<div id="createSubTitle"></div>

                <div class="row">

                	<div id="newPasswordSection">
						<div id="newPasswordLabelDiv" class="col-12 form-group" >
	                		<label><?php echo $translations["M01569"][$language]; /*New Password */?></label>
	                		<i class="fa fa-question-circle-o newSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="Min 8 characters"></i>
	                	</div>
						<div id="newPasswordDiv" class="col-12 form-group" style="display: flex;">
							<input id="newPassword" type="password" class="form-control loginInput">
						</div>
					</div>

					<div id="confirmPasswordSection">
						<div id="confirmPasswordLabelDiv" class="col-12 form-group" >
	                		<label><?php echo $translations["M01570"][$language]; /*Confirm Password */?></label>
	                	</div>
						<div id="confirmPasswordDiv" class="col-12 form-group" style="display: flex;">
							<input id="confirmPassword" type="password" class="form-control loginInput">
						</div>
					</div>

					
					<div class="col-12 form-group" style="margin-top: 7px;">
						<button id="submitButton" type="button" class="btn primaryBtn"><?php echo $translations["M01576"][$language]; /*SUBMIT */?></button>
					</div>

                </div>

			</div>

		</div>

		<div id="loginFooter">
			<p>Copyright ©<?php echo date("Y"); ?> • <?php echo $sys['companyName']; ?> • <?php echo $translations["M00299"][$language]; ?><!-- All Rights Reserved. --> </p>
		</div>
	</div>

	<?php include('floatedWhatsapp.php'); ?>
</body>


<?php include 'sharejsDashboard.php'; ?>  

<script>
	
	var accountType = '<?php echo $_POST['accountType']; ?>';
	var email = '<?php echo $_POST['email']; ?>';
	var countryCode = '<?php echo $_POST['countryCode']; ?>';
	var mobileNumber = '<?php echo $_POST['mobileNumber']; ?>';
	var requestId = '<?php echo $_POST['request_id']; ?>';
	var validateId = '<?php echo $_POST['validate_id']; ?>';
	var verifyCode = '<?php echo $_POST['verify_code']; ?>';

	$(document).ready(function(){

		if(accountType=='' || (accountType=='email' && email=='') || (accountType=='mobile' && mobileNumber=='') || requestId=='' || validateId=='' || verifyCode=='' ) {

			$.redirect('index.php', {});
		}

		$('#newPassword').keypress(function(e) {
			if (e.which == 13) {
				$('#confirmPassword').focus();
			}
		});

		$('#confirmPassword').keypress(function(e) {
			if (e.which == 13) {
				$('#confirmPassword').blur();
				$('#submitButton').trigger('click');
			}
		});

	});

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

	$('#submitButton').click(function() {

		var newPassword = sanitize($('#newPassword').val());
		var confirmPassword = sanitize($('#confirmPassword').val());

		if(newPassword=="") {
			showMessageDiv(false, '<?php echo $translations["M01578"][$language]; /* New password cannot be empty. */?>');

			if(accountType=="email") {
				utmTracking('', email, '', 'Reset Password Page newPassword_empty.');
			} else {
				utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')), '', 'Reset Password Page newPassword_empty.');
			}

			return;
			
		} else if(confirmPassword=="") {
			showMessageDiv(false, '<?php echo $translations["M01579"][$language]; /*Confirm password cannot be empty. */?>');

			if(accountType=="email") {
				utmTracking('', email, '', 'Reset Password Page confirmPassword_empty.');
			} else {
				utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')), '', 'Reset Password Page confirmPassword_empty.');
			}
			
			return;
			
		} else if(newPassword != confirmPassword) {
			showMessageDiv(false, '<?php echo $translations["M01580"][$language]; /*Password and confirm password not same. */?>');

			if(accountType=="email") {
				utmTracking('', email, '', 'Reset Password Page password not match.');
			} else {
				utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')), '', 'Reset Password Page password not match.');
			}

			return;

		} else if(newPassword.length<8) {
			showMessageDiv(false, '<?php echo $translations["M01581"][$language]; /*New password cannot be less than 8 characters. */?>');

			if(accountType=="email") {
				utmTracking('', email, '', 'Reset Password Page password_less_than_8_character.');
			} else {
				utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')), '', 'Reset Password Page password_less_than_8_character.');
			}

			return;
		}

		hideMessageDiv();

		var url = '<?php echo $sys['domain'] ?>/scripts/reqLogin.php';
		var method = 'POST';
		var debug = 0;
		var bypassBlocking = 0;
		var bypassLoading = 0;

		var formData = {
			command: "resetMerchantPassword",
			mobile: (countryCode + mobileNumber.replace(/^0+/, '')),
			email: email,
			mode: accountType,
			verify_code: verifyCode,
			request_id: requestId,
			validate_id: validateId,
			password: newPassword,
			confirm_password: confirmPassword
		};
		fCallback = resetMerchantPasswordResult;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


	});

	function resetMerchantPasswordResult(data, message) {

		// console.log('####');
		// console.log(message);
		// console.log(data);

		if(accountType=="email") {
			utmTracking('', email, '', 'Reset Password Page Success.');
		} else {
			utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')), '', 'Reset Password Page Success.');
		}

		showMessage(data.message_d, 'success', 'Success', 'check-circle-o', '<?php echo $sys['domain']?>/login.php');

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
