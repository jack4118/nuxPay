<?php 

include 'include/config.php';
include 'headLogin.php'; 

?>

<link href="<?php echo $config['domain']?>/css/customLogin.css?ts=<?php echo filemtime('css/customLogin.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/slidercaptcha.min.css" rel="stylesheet" />
<style>
	.slidercaptcha {
		margin: 0 auto;
		width: 100%;
		max-width: 314px;
		height: 286px;
		border-radius: 4px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.125);
		margin-top: 40px;
	}

	.slidercaptcha .card-body {
		padding: 1rem;
	}

	.slidercaptcha canvas:first-child {
		border-radius: 4px;
		border: 1px solid #e6e8eb;
	}

	.slidercaptcha.card .card-header {
		background-image: none;
		background-color: rgba(0, 0, 0, 0.03);
	}

	.refreshIcon {
		top: -54px;
	}
</style>
<body>
	
	<div id="loginContainer">

		<div id="loginHeader">
			<a href='index.php'><img id="loginHeaderLogo" src="<?php echo $dashboardLogo; ?>"></a>
		</div>

		<div id="loginMessage" style="margin-top:0"></div>

		<div id="loginContent" >
			
			<div id="accountBox">
				<div id="createTitle"><?php echo $translations["M01541"][$language]; /*Create a free account*/ ?></div>
				<div id="createSubTitle"><?php echo $translations["M01539"][$language]; /*Welcome to */ ?> <?php echo $sys['companyName']; ?></div>
                
				<div id="accountType">
                    <nav class="nav">
                    	<a class="nav-link active" id="emailButton" href="javascript:switchAccountType('email');"><?php echo $translations["M01523"][$language]; /*Email*/ ?></a>
                      	<a class="nav-link" id="mobileButton" href="javascript:switchAccountType('mobile');"><?php echo $translations["M01522"][$language]; /*Mobile*/ ?></a>
					  
                    </nav>
                    <hr>
                </div>
                

                <div class="row">
                	<div id="mobileSection" style="display: none;">
                		<div id="mobileLabelDiv" class="col-12 form-group" >
	                		<label><?php echo $translations["M01522"][$language]; /*Mobile*/ ?></label>
	                	</div>
	                	<div class="col-12 form-group" style="display: flex;">
                            <div id="countryCodeTmp" class="phoneNumberPrefix" style="line-height: 36px;font-size: 15px;text-align: left;">+</div>
                            <div class="nuxPaySection01Part02">
                                <input type="text" id="mobileNumber" style="padding-left: 16px;padding-right: 8px;" class="form-control loginInput " placeholder="      <?php echo $translations["M01522"][$language]; /*Mobile nyumber*/ ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $_POST['phoneNumber']; ?>">
                            </div>
                        </div>
	                	<div id="dialingArea" class="col-12 form-group" style="display: none;" >
							<div class="loginCountryBox">
								<select id="countryCode" class="selectOption form-control loginInput">
									<?php include 'phoneList.php'; ?>
								</select>
							</div>
						<!--	<input id="mobileNumber" type="text" class="form-control loginInput" spellcheck="false" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">!-->
						</div>
                	</div>

					<div id="emailSection">
						<div id="emailLabelDiv" class="col-12 form-group" >
	                		<label><?php echo $translations["M01523"][$language]; /*Email*/ ?></label>
	                	</div>
						<div id="emailDiv" class="col-12 form-group">
							<input id="email" type="text" class="form-control loginInput">
						</div>
					</div>
					
					<div id="passwordSection">
						<div id="passwordLabelDiv" class="col-12 form-group" >
	                		<label><?php echo $translations["M00154"][$language]; /* Password */?></label>
	                		<i class="fa fa-question-circle-o newSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="<?php echo $translations["M01594"][$language]; /* Min 8 characters */?>"></i>
	                	</div>
						<div id="passwordDiv" class="col-12 form-group"style="display: flex;">
							<input id="password" type="password" class="form-control loginInput" autocomplete="new-password">
							<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" style="margin-left: -25px; padding-top: 11px; "></span>
						</div>
						<div id="passwordDiv2"  style="display: flex;">
							<input id="password2" type="password" class="form-control loginInput" style="display: none;" autocomplete="new-password">
						</div>
					</div>

					<div id="promoCodeSection">
						<div id="promoCodeLabelDiv" class="col-12 form-group">
	                		<label id="promotionCodeLabel" style="width: 50%; text-align: left;"><?php echo $translations["M01543"][$language]; /*Promotion Code*/ ?> &#9650;</label>
	                		<label class="promoCodeDisclaimer" style="width: 50%; text-align: right; color: #51C2DB;"><?php echo $translations["M01544"][$language]; /*Get $10 Free*/ ?></label>
	                	</div>
						<div id="promoCodeDiv" class="col-12 form-group" style="display: flex;">
							<input id="promoCode" type="text" class="form-control loginInput">
						</div>
						<div id="promoCodeDiv2" class="col-12 form-group" style="height: 10px; display: none;">
						</div>
					</div>

					<div class="col-12 form-group" style="margin-top: 7px;">
						<button id="signupBtn" type="button" class="btn primaryBtn"><?php echo $translations["M01545"][$language]; /*SIGN UP*/ ?></button>
						<?php if($sys['isWhitelabel'] != 1){ echo '<span style="margin-top:10px; font-size:11px;">'.$translations["M01546"][$language].' <a href="'.$sys['domain'].'/tnc">'.$translations["M01547"][$language].'</a> '.$translations['M01559'][$language]/* and*/.'  <a href="'.$sys['domain'].'/privacypolicy">'.$translations["M01558"][$language] /* Privacy Policy.*/.'</a> </span>';
						}?>
					</div>

					<div id="alreadySignupDiv" class="col-12 form-group" style="margin-top: 10px;">
						<p><?php echo $translations["M01582"][$language]; /* Already sign up? */ ?> <a class="loginSignUpBtn" href="login.php" style="color: #51C2DB;"><?php echo $translations["M01499"][$language]; /* Login */ ?></a></p>
					</div>
                </div>
			</div>
		</div>
	</div>


	<div id="loginFooter">
		<p>Copyright ©<?php echo date("Y"); ?> • <?php echo $sys['companyName']; ?> • <?php echo $translations["M00299"][$language]; ?><!-- All Rights Reserved. --> </p>
	</div>

	<?php include('floatedWhatsapp.php'); ?>
</body>


<div class="modal fade" id="slideToOTPModal" role="dialog" style="margin: auto; width: 90%;">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header" style="padding-top:5px;padding-bottom:5px;">

				<div class="modalAmount mt-2 col-12">
					<?php echo $translations["M01560"][$language]; /*Security Verification*/ ?>
				</div>
				<div class="close"></div>

			</div>
			<div class="modal-body  col-12" style="padding-bottom:15px;">
				<div id="sliderButton" class="col-12 form-group">
					<div id="button-background">
						<span id="sliderText" class="otp-slide-text"><?php echo $translations["M01524"][$language]; /*Slide to get OTP*/ ?></span>
						<div id="slider">
							<i id="locker" class="fa fa-arrow-right material-icons"></i>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="slideToOTPModal2" role="dialog" style="margin: auto; width: 90%;">
	<div class="modal-dialog modal-dialog-centered" style="width: 100%; max-width: 314px;">
		<div class="modal-content">
			<div class="modal-header" style="padding-top:5px;padding-bottom:5px;">

				<div class="modalAmount mt-2 col-12">
					<?php echo $translations["M01560"][$language]; /*Security Verification*/ ?>
				</div>
				<div class="close"></div>

			</div>
				<div class="slidercaptcha card">
  					<div class="card-header">
    					<span>Complete the security check</span>
  					</div>
  					<div class="card-body">
    					<div id="captcha"></div>
  					</div>

			</div>
		</div>
	</div>
</div>
<script src="js/longbow.slidercaptcha.js"></script>
<script>
	var captcha = sliderCaptcha({
		id: 'captcha',
		onSuccess: function () {
			hideMessageDiv();
			showCanvas();
			var handler = setTimeout(function () {
			var email = $('#email').val();
			var password = $('#password').val();
			var mobileNumber = $('#mobileNumber').val();
			var countryCode = $('#countryCode').val();
			var promoCode = $('#promoCode').val();

			if(promoCode!='') {
				getResellerMode = "submit";
				getResellerDetails('', promoCode);
			} else {
				requestOTP(email, password, mobileNumber, countryCode, '');
			}

			window.clearTimeout(handler);
			}, 500);

			$('#slideToOTPModal2').modal('hide');
		},
		
		// or use local images instead
		localImages: function () {
		return 'images/Pic' + Math.round(Math.random() * 4) + '.jpg';
		}
	});

	var captcha = sliderCaptcha({
		width: 280,
		maxWidth: 100,
		height: 155,
		PI: Math.PI,
		sliderL: 42,
		sliderR: 9,
		offset: 5, 
		loadingText: 'Loading...',
		failedText: 'Try It Again',
		barText: 'Slide the Puzzle',
		repeatIcon: 'fa fa-repeat',
		maxLoadCount: 3
	});
</script>
<?php include 'sharejsDashboard.php'; ?>  

<script>
	
	var getResellerMode = "";
	var showPromo = true;
	var accountType = "email";

	
	var post_reseller_username = "<?php echo $_GET['reseller_username']?>";
	var code = "<?php echo $_GET['code'];?>";
    var post_countryNumber = "<?php echo $_POST['countryNumber']; ?>";
    var post_phoneNumber = "<?php echo $_POST['phoneNumber']; ?>";
    var post_email = "<?php echo $_POST['email']; ?>";
    var post_countryCode = "<?php echo $countryCode; ?>";
    var post_payeeEmail = "<?php echo $_POST['payeeEmail']; ?>";
    var post_payeeMobileNumber = "<?php echo $_POST['payeeMobileNumber']; ?>";
    var post_payeeDialingArea = "<?php echo $_POST['payeeDialingArea']; ?>";
    var countryCode     = "<?php echo $countryCode; ?>";
    var defaultCountryCode = "";
	var from_send_fund = "<?php echo $_POST['fromSendFund'];?>";
	var send_fund_param = <?php $sendFundParam = $_POST['sendFundParam']; echo json_encode($sendFundParam, true);?>;
	var transaction_token = "<?php echo $_GET['transaction_token'];?>";
	
    
	$(document).ready(function(){

		utmTracking('','','','SignUp Page track referral link',0);

		$('#countryCode').find('option').each(function(){
			if (post_countryCode != "ZZ") {
				if ($(this).attr("data-countrycode") == post_countryCode) {
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


    	function format(val) {
            return val.id;
        }
        $('#countryCode').select2({
            dropdownAutoWidth : true,
            templateSelection: format,
            width: 80
        });

		$('#promoCodeLabelDiv').click(function() {

			if(showPromo) {
				$('#promoCodeDiv').hide();
				$('#promoCodeDiv2').show();
				$('#promotionCodeLabel').html('<?php echo $translations["M01543"][$language]; /*Promotion Code*/ ?> &#9660;');
				showPromo = false;
			} else {
				$('#promoCodeDiv').show();
				$('#promoCodeDiv2').hide();
				$('#promotionCodeLabel').html('<?php echo $translations["M01543"][$language]; /*Promotion Code*/ ?> &#9650;');
				showPromo = true;
			}

		});

        if(code!="") {
        	getResellerMode = "post";
			getResellerDetails('', '', code);
//        	getResellerDetails(post_reseller_username, '');
        }

        if(post_countryCode!="") {
        	switchAccountType('mobile');
        } else if(post_email!="") {
    		switchAccountType('email');
    		$('#email').val(post_email);
    	} else if(post_payeeEmail!="") {
    		switchAccountType('email');
    		$('#email').val(post_payeeEmail);
    	} else if(post_countryNumber!="" && post_phoneNumber!="") {
    		switchAccountType('mobile');
    		$('#mobileNumber').val(post_phoneNumber);
    		$('#countryCode').find('option').each(function(){
                if ($(this).attr("value") == post_countryNumber) {
                    $(this).parent().val(this.value).trigger('change');
                    defaultCountryCode = this.value;
                }
            });
    	} else if(post_payeeDialingArea!="" && post_payeeMobileNumber!="") {
    		switchAccountType('mobile');
    		$('#mobileNumber').val(post_payeeMobileNumber);
    		$('#countryCode').find('option').each(function(){
                if ($(this).attr("value") == post_payeeDialingArea) {
                    $(this).parent().val(this.value).trigger('change');
                    defaultCountryCode = this.value;
                }
            });
    	}

		$('#email').keypress(function(e) {
			if (e.which == 13) {
				$('#password').focus();
			}
		});

		$('#mobileNumber').keypress(function(e) {
			if (e.which == 13) {
				$('#password').focus();
			}
		});

		$('#password').keypress(function(e) {
			if (e.which == 13) {
				$('#promoCode').focus();
			}
		});

		$('#promoCode').keypress(function(e) {
			if (e.which == 13) {
				$('#promoCode').blur();
				$('#signupBtn').trigger('click');
			}
		});


		$(".toggle-password").click(function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $($(this).attr("toggle"));
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
		$('#mobileNumber').on('focus', function(e) {

            var tmpPhoneNumber = $('#mobileNumber').val();
            
            if(tmpPhoneNumber=="") {
                $('#mobileNumber').val(defaultCountryCode.substring(1));
            }

            $('#mobileNumber').attr("placeholder", "");
            $('#countryCodeTmp').text('+');

            $('#mobileNumber').caretToEnd();
        });

        $('#mobileNumber').on('blur', function(e) {

            var tmpPhoneNumber = $('#mobileNumber').val();

            if(tmpPhoneNumber=="" || "+"+tmpPhoneNumber==defaultCountryCode) {
                $('#mobileNumber').val('');
                $('#countryCodeTmp').text(defaultCountryCode);
            }
            
            $('#mobileNumber').attr("placeholder", "      <?php echo $translations["M01522"][$language]; /*Mobile nyumber*/ ?>");
        });
        $("#mobileNumber").blur();
		
				
		if(from_send_fund == '1'){
			switchAccountType(send_fund_param.sender_type);
			if(send_fund_param.sender_type == 'email'){
				$('#email').val(send_fund_param.sender_email_address);
			}
			else if(send_fund_param.sender_type == 'mobile'){
                $('#countryCodeTmp').text('+');
				$('#mobileNumber').val(send_fund_param.sender_mobile_number);
				
			}
			$('#promoCode').val(send_fund_param.promo_code);
		}
		else{
			switchAccountType('email');
		}

	});

	function loadResellerDetails(data, message){

		if(getResellerMode=="post") {
			if(data.data.referral_code != ""){
				post_reseller_username = data.data.reseller_username;
				$('#promoCode').val(data.data.referral_code);
				$("#promoCode").attr("disabled", true);
			}
		} else if(getResellerMode=="submit") {

			if(data.data.referral_code != ""){

				var email = sanitize($('#email').val());
				var password = sanitize($('#password').val());
				var mobileNumber = sanitize($('#mobileNumber').val());
				var countryCode = sanitize($('#countryCode').val());
				var promoCode = sanitize($('#promoCode').val());

				requestOTP(email, password, mobileNumber, countryCode, promoCode);

			} else {
				hideCanvas();
				showMessageDiv(false, 'Invalid promotion code.');
				utmTracking('', email,'','Sign Up Page promotionCode_invalid', 0);
			}
		
		}

		
	}

	function switchAccountType(t) {

		hideMessageDiv();
		
		if(t=="mobile") {
			$('#mobileSection').show();
			$('#emailSection').hide();
			$('#emailButton').removeClass('active');
			$('#mobileButton').addClass('active');
			$('#mobileNumber').val('');
			$('#email').val('');
			accountType = "mobile";

		} else {
			$('#mobileSection').hide();
			$('#emailSection').show();
			$('#emailButton').addClass('active');
			$('#mobileButton').removeClass('active');
			$('#mobileNumber').val('');
			$('#email').val('');
			accountType = "email";

		}
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

	$('#signupBtn').click(function() {

		var email = sanitize($('#email').val());
		var password = sanitize($('#password').val());
		var mobileNumber = sanitize($('#mobileNumber').val());
		var countryCode = sanitize($('#countryCode').val());
		var promoCode = sanitize($('#promoCode').val());
		
		if(accountType=="email") {
			if(email=='') {
				showMessageDiv(false, '<?php echo $translations["M01584"][$language]; /* Please enter your Email Address.*/ ?>');
				utmTracking('', email,'','Sign Up Page email_empty', 0);

				$('.text-danger').hide();
                $('input#email').after('<span class="text-danger" style="text-align: left;display: block;"><?php echo $translations["M01584"][$language]; /* Please enter your Email Address. */ ?></span>');
                $('html, body').animate({
                    scrollTop: $("#email").offset().top-120
                }, 500);
                $('input#email').focus();
				return;
			} else if(!validateEmail(email)) {
				showMessageDiv(false, '<?php echo $translations["M01585"][$language]; /* Please enter a valid email address. */ ?>');
				utmTracking('', email,'','Sign Up Page email_invalid', 0);

				$('.text-danger').hide();
				$('input#email').after('<span class="text-danger" style="text-align: left;display: block;"><?php echo $translations["M01585"][$language]; /* Please enter a valid email address. */ ?></span>');
                $('html, body').animate({
                    scrollTop: $("#email").offset().top-120
                }, 500);
                $('input#email').focus();

				return;
			} else if (!ValidateEmail2(email)){
				showMessageDiv(false, '<?php echo $translations["M01585"][$language]; /* Please enter a valid email address. */ ?>');
				utmTracking('', email,'','Sign Up Page email_invalid', 0);

				$('.text-danger').hide();
				$('input#email').after('<span class="text-danger" style="text-align: left;display: block;"><?php echo $translations["M01585"][$language]; /* Please enter a valid email address. */ ?></span>');
                $('html, body').animate({
                    scrollTop: $("#email").offset().top-120
                }, 500);
                $('input#email').focus();

				return;
			// }else if(!ValidateEmail3(email)) {
			// 	showMessageDiv(false, '<?php echo $translations["M01585"][$language]; /* Please enter a valid email address. */ ?>');
			// 	utmTracking('', email,'','Sign Up Page email_invalid', 0);

			// 	$('.text-danger').hide();
			// 	$('input#email').after('<span class="text-danger" style="text-align: left;display: block;"><?php echo $translations["M01585"][$language]; /* Please enter a valid email address. */ ?></span>');
            //     $('html, body').animate({
            //         scrollTop: $("#email").offset().top-120
            //     }, 500);
            //     $('input#email').focus();

			// 	return;
			}else{
				$('.text-danger').hide();
			}


		} else {
			if(mobileNumber=='' || countryCode=='') {
				showMessageDiv(false, '<?php echo $translations["M01586"][$language]; /* Please enter your Mobile Number. */ ?>');
				utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')),'','Sign Up Page mobileNumber_empty', 0);
				
				$('.text-danger').hide();
				$('input#mobileNumber').after('<span class="text-danger" style="text-align: left;display: block;"><?php echo $translations["M01586"][$language]; /* Please enter your Mobile Number. */ ?></span>');
                $('html, body').animate({
                    scrollTop: $("#mobileNumber").offset().top-120
                }, 500);
                $('input#mobileNumber').focus();

				return;
			}else{
				$('.text-danger').hide();
			}
		}

		if(password=='') {
			showMessageDiv(false, '<?php echo $translations["M01587"][$language]; /* Please enter your Password. */ ?>');
			
			$('.text-danger').hide();
			$('input#password2').after('<span class="text-danger" style="text-align: left;display: block; margin-top: -10px; margin-left: 15px;"><?php echo $translations["M01587"][$language]; /* Please enter your Password. */ ?></span>');
			$('html, body').animate({
				scrollTop: $("#password2").offset().top-120
			}, 500);
			$('input#password').focus();

			if(accountType=="email") {
				utmTracking('', email,'','Sign Up Page password_empty', 0);
			} else {
				utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')),'','Sign Up Page password_empty', 0);
			}

			return;
		} else if(password.length<8) {
			showMessageDiv(false, '<?php echo $translations["M01588"][$language]; /* Password cannot be less than 4 characters. */ ?>');

			$('.text-danger').hide();
			$('input#password2').after('<span class="text-danger" style="text-align: left;display: block; margin-top: -10px; margin-left: 15px;"><?php echo $translations["M01588"][$language]; /* Password cannot be less than 4 characters. */ ?></span>');
			$('html, body').animate({
				scrollTop: $("#password2").offset().top-120
			}, 500);
			$('input#password').focus();

			if(accountType=="email") {
				utmTracking('', email,'','Sign Up Page password_less_than_4_character', 0);
			} else {
				utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')),'','Sign Up Page password_less_than_4_character', 0);
			}

			return;
		}else{
			$('.text-danger').hide();
		}

		captcha.reset();
		$('#slideToOTPModal2').modal('show');


	});

	$('.close').click(function() {
		$('#slideToOTPModal2').modal('hide');
		captcha.reset();
	});

	var initialMouse = 0;
	var slideMovementTotal = 0;
	var mouseIsDown = false;
	var slider = $('#slider');

	slider.on('mousedown touchstart', function(event) {
		mouseIsDown = true;
		slideMovementTotal = $('#button-background').width() - $(this).width() + 10;
		initialMouse = event.clientX || event.originalEvent.touches[0].pageX;
	});


	//Request OTP
	$(document.body, '#slider').on('mouseup touchend', function(event) {
		if (!mouseIsDown)
			return;
		mouseIsDown = false;
		var currentMouse = event.clientX || event.changedTouches[0].pageX;
		var relativeMouse = currentMouse - initialMouse;

		if (relativeMouse < slideMovementTotal) {
			$('.slide-text').fadeTo(300, 1);
			slider.animate({
				left: "-10px"
			}, 300);

			return;
		} else {
			
			$('.slide-text').fadeTo(300, 1);
			slider.animate({
				left: "-10px"
			}, 300);

			$('#slideToOTPModal').modal('hide');
			hideMessageDiv();
			showCanvas();

			var email = $('#email').val();
			var password = $('#password').val();
			var mobileNumber = $('#mobileNumber').val();
			var countryCode = $('#countryCode').val();
			var promoCode = $('#promoCode').val();

			if(promoCode!='') {
				getResellerMode = "submit";
        		getResellerDetails('', promoCode);
			} else {
				requestOTP(email, password, mobileNumber, countryCode, '');
			}

		}

		setTimeout(function() {
			slider.on('click tap', function(event) {
				if (!slider.hasClass('unlocked'))
					return;
				slider.removeClass('unlocked');
				slider.off('click tap');
			});
		}, 0);

	});

	$(document.body).on('mousemove touchmove', function(event) {
		if (!mouseIsDown)
			return;

		var currentMouse = event.clientX || event.originalEvent.touches[0].pageX;
		var relativeMouse = currentMouse - initialMouse;
		var slidePercent = 1 - (relativeMouse / slideMovementTotal);

		$('.slide-text').fadeTo(0, slidePercent);

		if (relativeMouse <= 0) {
			slider.css({
				'left': '-10px'
			});
			return;
		}
		if (relativeMouse >= slideMovementTotal + 10) {
			slider.css({
				'left': slideMovementTotal + 'px'
			});
			return;
		}
		slider.css({
			'left': relativeMouse - 10
		});
	});

	function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

	function ValidateEmail2(email)
	{
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

	function ValidateEmail3(email)
	{
		var validDomains = ["gmail.com", "yahoo.com", "hotmail.com", "outlook.com"];
		
		var emailParts = email.split("@");
    	var domain = emailParts[1];
		if (validDomains.indexOf(domain) !== -1) {
			return true;
		} else {
			return false;
		}
	}

	function getResellerDetails(username, referralCode, code) {

		var method = 'POST';
		var debug = 0;
		var bypassBlocking = 0;
		var bypassLoading = 1;

		var formData = {
			command: "getResellerDetails",
			username: username,
			referral_code: referralCode,
			promo_code: code,
			type: "reseller"
		};

		fCallback = loadResellerDetails;
		ajaxSend('<?php echo $sys['domain']?>/scripts/reqLogin.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	}

	function requestOTP(email, password, mobileNumber, countryCode, promoCode) {

       	var url     =   '<?php echo $sys['domain']?>/scripts/reqRegister.php';
        var formData        = {
            command: 'verifyPhone',
            //phoneNumber: (countryCode + mobileNumber.replace(/^0+/, '')),
            phoneNumber: (mobileNumber.replace(/^0+/, '')),
            email: email,
            'mode': accountType,
        };

        $.ajax({
            type: method,
            url: url,
            data: formData,
            dataType: 'text',
            encode: true
        })
        .done(function(data) {

            var obj = JSON.parse(data);

            if(obj.code == 1){
                hideCanvas();
                
                var timeout = obj.timeout;

                if(accountType=="email") {
					utmTracking('', email,'','Sign Up Page OTP Success', 0);
				} else {
					utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')),'','Sign Up Page OTP Success', 0);
				}

                $.redirect("newSignupOtpVerify.php?code="+promoCode, { email: email, password: password, mobileNumber: mobileNumber, countryCode: "", promoCode: promoCode, timeout: timeout, accountType: accountType, fromSendFund: from_send_fund, sendFundParam: send_fund_param, transaction_token: transaction_token} );

            } else if(obj.errorCode == -101) {



            	hideCanvas();
                
                var timeout = obj.timeout;

                if(accountType=="email") {
					utmTracking('', email,'','Sign Up Page OTP Failed - ' + obj.message, 0);
				} else {
					utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')),'','Sign Up Page OTP Failed - ' + obj.message, 0);
				}

				$.redirect("newSignupOtpVerify.php?code="+promoCode, { email: email, password: password, mobileNumber: mobileNumber, countryCode: countryCode, promoCode: promoCode, timeout: timeout, accountType: accountType, fromSendFund: from_send_fund , sendFundParam: send_fund_param, transaction_token: transaction_token} );

            } else {

                hideCanvas();

                if (obj.error_message) {

                    var error_message="";

                    $.each(obj.error_message, function(k, v) {
                        error_message+=v+"<br>";
                    });

                    showMessage(obj.message_d+"<br><?php echo $translations["M01165"][$language]; ?><br>"+error_message, 'warning', obj.message, 'warning', '')

                    if(accountType=="email") {
						utmTracking('', email,'','Sign Up Page Error - ' + obj.message, 0);
					} else {
						utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')),'','Sign Up Page Error - '+obj.message, 0);
					}

                } else {
                    showMessage(obj.message_d, 'warning', obj.message, 'warning', '');

                    if(accountType=="email") {
						utmTracking('', email,'','Sign Up Page Error - ' + obj.message, 0);
					} else {
						utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')),'','Sign Up Page Error - '+obj.message, 0);
					}

                }

            }

        });

	}


	if (history.pushState != undefined) {
		history.pushState(null, null, location.href);
	}
	history.back();
	history.forward();
	window.onpopstate = function () {
		history.go(1);
	};


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
