<?php include 'include/config.php'; ?>
<?php include 'headLogin.php'; ?>


<body style="overflow-x: hidden; display: flex;">
	<div class="memberLandingPage">
		<section class="memberLandingPageSection1 nuxPaySectionLandingPageReseller01">
			<div class="kt-container">
				<div class="row">
				<div class="col-6 text-center text-md-left">
					<a href="homepage.php" data-name="Homepage">
						<img alt="Logo" src="<?php echo $landingPageLogo; ?>" class="memberLandingPageLogo">
					</a>
				</div>
		
				<div class="btn-group kolLanguageDropdown">
								<span type="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;"><?php echo $translations['M01432'][$language]; /* LANGUAGES */ ?>                                              
								</span>
								<div class="dropdown-menu dropdown-menu-right dropdown_language" x-placement="bottom-end" style="position: absolute; top: 0px; left: 0px; transform: translate3d(-20px, 38px, 0px);overflow: hidden;">
								  <?php
									  $languageArr = $sys["languages"];
									  foreach($languageArr as $key => $value) {
								  ?>
										<a class="dropdown-item changeLanguage" href="javascript:;" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>"><?php echo $languageArr[$key]['displayName']; ?></a>
								  <?php
									  }
								  ?>
								</div>
							</div>
				</div>


				<div class="col-lg-12 col-offset-6 centered blueContainer">
				</div>
				<div class="row" style="margin:0; width:100%">

					<div class="col-xl-7 col-lg-12 col-12 landingPageContainerMargin blueContainerMobile">
						<div class="row landingPageContainer">
							<div class="col-6 px-0">
								<img src="<?php echo $sys['domain'] ?>/images/LandingElements/kol-davidhooi.png" class="kolImage">

							</div>

							<div class="col-6 landingPageDetails">
								<span class="kolName">David Hooi</span>
								<div class="kolDescription">
									<div class="memberLandingPageSection1Title kolReview">Cryptocurrency is the biggest trend in the future of the world. It not only got chances to increase it's value, but also helps you expand your customer base to a international level!</div>

									<div class="memberLandingPageSection1Title kolReview cnTestimonial">加密货币是未来很大的交易趋势，收藏它不仅是一种投资，也能帮助你拓宽到全球各地的客源！</div>
								</div>



							</div>
						</div>

					</div>

					<div class="col-xl-5 col-lg-12 col-12" style="padding: 20px; margin-top:-50px">
						<div class="col-12 mt-3 mt-md-5 mt-lg-5 mt-xl-3 text-center">
							<div class="row justify-content-center">
								<div class="signUpFormBox">
									<div class="col-12 text-center landingPageQuote">
										<p style="font-size:22px; font-weight:600; color:grey;"><?php echo $translations["M01491"][$language]; /*  Accept BTC/USDT */ ?></p>
										<p style="font-size:16px"><?php echo $translations["M01521"][$language]; /*  With Phone or Email */ ?></p>

									</div>
									<!--  I want to receive / send fund-->
									<div class="col-12 " style="margin-top: 70px; ">
																						
										<h6 class='' style='display: inline-block' >
										<?php echo $translations["M01804"][$language]; /*  I want to  */ ?>
										</h6>
										<span  style="margin-left: 25px" class="customButtonBorder">
											<a>
												<div class='d-inline'>
													<h3 id='receiveButton' class='d-inline  customButtonOnClick' style='display: inline-block; padding-right: 15px'>
													<?php echo $translations["M01792"][$language]; /*  Receive  */ ?>
													</h3>
												</div>
											</a>
											<a>
												<div class='d-inline'>
													<h3 id='sendButton' class='d-inline customButtonOffClick' style='display: inline-block; padding-left: 15px'>
													<?php echo $translations["M01791"][$language]; /*  Send  */ ?>
													</h3>
												</div>
											</a>
											<!-- <button type="button" class="btn btn-primary btn-sm text-secondary customButtonOnClick"><h5>Small button</h5></button>
											<button type="button" class="btn btn-secondary btn-sm text-muted customButtonOffClick"><h5>Small button</h5></button> -->
										</span>												
									</div>

									<!--  I want to receive / send fund-->

									<div class="col-12" style="margin-top: 20px; margin-left: 30px; padding: 0;">

										<div style="display: none;" class="nuxPaySection01Part01" id="country_code">
											<select id="countryCode" class="form-control nuxPaySection01Dropdown">
												<?php include 'phoneList.php'; ?>
											</select>
										</div>

										<div class="row" style="width: 100%;">

											<!-- <div class="col-xl-6 col-lg-7 col-md-10 col-12"> -->
												
												<div class="col-12" id="mobileSection" style="width:100%;">
													

													<div class="row" id="phoneOption">

														<div class="phoneNumberPrefix" style="margin-top: 10px;"></div>
														<div class="nuxPaySection01Part02">
															<input id="phoneNumber" type="text" class="form-control nuxPaySection01Input" placeholder="        <?php echo $translations["M01513"][$language]; /*  Your Mobile Number  */ ?>">
														</div>

													</div>

													<button id="sendPhoneNumber" type="button" class="btn homepageRequestFundBtn" style="width:100% !important;"> <?php echo $translations["M01792"][$language]; /*  Receive*/ ?> </button>
													
													
													<div class= "col-12 mt-2 form-group" style="text-align:center; text-decoration: underline; margin-left: -10px;">
														<a style="background: transparent;" id="switchEmail" href="#"><?php echo $translations["M01495"][$language]; /*  Switch to email */ ?></a>
                                                		
                                            		</div>
												</div>

												<div class="col-12" id="emailSection" style="width:100%; display: none;">

													<div class="col-12" id="emailOption" style="display: none;">
														<div class="nuxPaySection01Part02email">
															<input id="emailInput" type="text" class="form-control nuxPaySection01Input2" placeholder="<?php echo $translations["M01512"][$language]; /*  Your Email Address" */ ?>">
														</div>
														
													</div>

													<button id="sendEmail" type="button" class="btn homepageRequestFundBtn" style="width:100% !important;"> <?php echo $translations["M01792"][$language]; /*  Receive*/ ?> </button>
														
													<div class= "col-12 mt-2 form-group" style=" text-decoration: underline; margin-left: -10px;">
														<a style="background: transparent;" id="switchMobile" href="#"><?php echo $translations["M01496"][$language]; /*  Switch to mobile */ ?></a>
	                                            		
													</div>

												</div>
												

											<!-- </div> -->

										</div>
									</div>

									<!--<div class="col-12">
										<div class="d-flex align-items-center emailMobileTab">
											<div class="col-12">
												<div class="d-flex border-bottom justify-content-between">
													<nav class="nav">
														<a class="nav-link active" id="mobileBtn" href="javascript:void(0)"><?php echo $translations["M01522"][$language]; /*Mobile*/ ?></a>
														<a class="nav-link" id="emailBtn" href="javascript:void(0)"><?php echo $translations["M01523"][$language]; /*Email*/ ?></a>
														

													</nav>
												</div>
											</div>
										</div>

										<div class="col-12 form-group">
											<div class="row">
												<div class="col-12">
													<div id="signUpError" class="alert alert-danger" style="display: none;">
													</div>
												</div>
											</div>
										</div>


										<!--
										<div class="col-12 form-group">
											<input id="name" placeholder="Name" type="text" class="form-control contactInput">
										</div>
										<div class="col-12 form-group text-left" style="display:none;" id="emailDiv">
											<input id="email" placeholder="<?php echo $translations["M01512"][$language]; /*  Your Email Address" */ ?>" type="text" class="form-control contactInput">

										</div>

										<div class="col-12 form-group"  style="display: flex;" id="mobileDiv">

											<div class="countryContactBox" style="display:none;">
												<select id="countryCode2" class="form-control contactInput">
													<?php include 'phoneList.php'; ?>
												</select>
											</div>


											<div class="phoneNumberPrefix" style="margin-top: 10px;"></div>
											<div class="nuxPaySection01Part02">
												<input id="phoneNumber" type="text" class="form-control nuxPaySection01Input" placeholder="        <?php echo $translations["M01513"][$language]; /*  Your Mobile Number  */ ?>" spellcheck="false" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
											</div>

										</div>


									</div>
									<div class="col-12 mt-5 form-group">
										<button id="requestFundBtn" type="button" class="btn primaryBtn">
											<?php echo $translations["M01494"][$language]; /*  Request Fund */ ?>
										</button>

									</div> !-->

									<div id="signupForgotDiv" class="" style="bottom:0px;position:absolute;left: 50%;transform: translate(-50%, -50%);">
				                		<label style="width: 100%; text-align: center;"><a class ="loginSignUpBtn" style="color: #51C2DB;"><?php echo $translations["M00248"][$language]; /* Sign Up now */ ?></a></label>
				                	</div>
									
								</div>

							</div>
							<div class="slideToOTPContainer" style="display:none;">
								<label style="font-size: 24px;"><?php echo $translations["M01527"][$language]; /* Account Verification */ ?></label>


								<div id="sliderButton" class="col-12 form-group">
									<div id="button-background">
										<span id="sliderText" class="slide-text"><?php echo $translations["M01524"][$language]; /*  Slide to get OTP */ ?></span>
										<div id="slider">
											<i id="locker" class="fa fa-arrow-right material-icons"></i>
										</div>
									</div>


								</div>
								<div id="changeRegisterDiv">
									<a class="returnToSignUp"><u>&#10216 <?php echo $translations["M01526"][$language]; /*  Change Another Email */ ?></u></a>
								</div>
							</div>

							<div class="verifyOTPBox" style="display:none;">
								<label style="font-size: 24px;"><?php echo $translations["M01527"][$language]; /* Account Verification */ ?></label>
								<div class="otpDescDiv">
									<label id="lblOTPDescription" style="font-size: 12px;"><?php echo $translations["M01528"][$language]; /* Please enter the 5-digit OTP that was sent to */ ?></label>
								</div>
								<div id="otpDiv">

									<span class="otpPosition">OTP:</span>
									<form method="get" class="digit-group" data-group-name="digits" data-autosubmit="false" autocomplete="off">

										<input type="text" inputmode="numeric" pattern="[0-9]*" id="digit-1" name="digit-1" data-next="digit-2" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
										<input type="text" inputmode="numeric" pattern="[0-9]*" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" maxlength="1"oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
										<input type="text" inputmode="numeric" pattern="[0-9]*" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
										<input type="text" inputmode="numeric" pattern="[0-9]*" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
										<input type="text" inputmode="numeric" pattern="[0-9]*" id="digit-5" name="digit-5" data-previous="digit-4" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
										<!--											<input type="text" id="digit-6" name="digit-6" data-previous="digit-5" />-->
									</form>

								</div>
								<div id="resendOtpDiv">
									<span class="resendText"><?php echo $translations["M01529"][$language]; /*  Resend Email in */ ?></span><span id="timer"></span><span class="seconds">s</span>
									<a id="resendBtn"><u>Resend OTP</u></a>
								</div>
								<div id="changeRegisterDiv">
									<a class="returnToSignUp"><u>&#10216 <?php echo $translations["M01526"][$language]; /*  Change Another Email */ ?></u></a>
								</div>
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
</body>

</html>
<?php include 'sharejsDashboard.php'; ?>

<!--
<div class="modal fade" id="slideToOTPModal" role="dialog" style="margin: auto; width: 90%;">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header" style="padding-top:5px;padding-bottom:5px;">

				<div class="modalAmount mt-2 col-12">
					Security Verification
				</div>
				<div class="close"></div>


			</div>
			<div class="modal-body  col-12" style="padding-bottom:15px;">
				<div id="sliderButton" class="col-12 form-group">
					<div id="button-background">
						<span id="sliderText" class="slide-text">Slide to get OTP</span>
						<div id="slider">
							<i id="locker" class="fa fa-arrow-right material-icons"></i>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
-->

<script src="<?php echo $sys['domain']?>/js/general.js"></script>
<script>
	var mode = "mobile";
	var shortCode = "<?php echo $_GET['shortCode']; ?>";
	var userName = "<?php echo $_GET['username']; ?>";
	var countryCode = "<?php echo $countryCode; ?>";
	var countryNumber = "<?php echo $_POST['countryNumber']; ?>";
	var countryCodeSet = 0;

	var fCallBack = "";
	var pageNumber = 1;
	var referralCode;
	var return_referral_code = 1;
	var senderType = 'mobile';

	var verify_code = '';

	$(document).ready(function() {

	
		utmTracking('', '', '', 'KOL Landing Page');

		$('.close').click(function() {
			$('#slideToOTPModal').modal('toggle');
		});
		

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

				if (e.keyCode === 8 || e.keyCode === 37) {
					var prev = parent.find('input#' + $(this).data('previous'));

					if (prev.length) {
						$(prev).select();

					}
				} else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105) ||  e.keyCode == 37) {
					var next = parent.find('input#' + $(this).data('next'));

					if (!next.length) {
						
						var digit1 = $('#digit-1').val();
						var digit2 = $('#digit-2').val();
						var digit3 = $('#digit-3').val();
						var digit4 = $('#digit-4').val();
						var digit5 = $('#digit-5').val();
						verify_code = digit1+digit2+digit3+digit4+digit5;

						if(verify_code.length==5) {
							$(this).blur();
							signUp();
						}
						
					}

				} else if(e.keyCode==undefined) {

					var str = $(this).val();

					if(str.length==5) {
						$('#digit-1').val(str.substring(0,1));
						$('#digit-2').val(str.substring(1,2));
						$('#digit-3').val(str.substring(2,3));
						$('#digit-4').val(str.substring(3,4));
						$('#digit-5').val(str.substring(4,5));

						verify_code = str;
						
						$(this).blur();
						signUp();
					}
				}

			});
		});


		$('#signUpBtn').click(function(e) {
			//			$('#slideToOTPModal').modal();
			if (mode == "mobile" && $('input#username').val() == '') {
				hideCanvas();
				//				$('#slideToOTPModal').modal('toggle');
				$('#signUpError').hide();
				$('#signUpError').show();
				$('html, body').animate({
					scrollTop: $("#username").offset().top - 200
				}, 500);
				$('#signUpError').text('<?php echo $translations["M01531"][$language]; /* Please fill in your Mobile number.*/ ?>');
				$('input#username').focus();

				document.getElementById("signUpBtn").disabled = false;
			} else if (mode == "email" && $('input#email').val() == '') {
				hideCanvas();
				//				$('#slideToOTPModal').modal('toggle');
				$('#signUpError').hide();
				$('#signUpError').show();
				$('html, body').animate({
					scrollTop: $("#email").offset().top - 200
				}, 500);
				$('#signUpError').text('<?php echo $translations["M01532"][$language]; /* Please fill in your email.*/ ?>');
				$('input#email').focus();
				document.getElementById("signUpBtn").disabled = false;
			} else {
				//				$('#slideToOTPModal').modal();
				$('.signUpFormBox').css('display', 'none');
				$('.slideToOTPContainer').css('display', 'block');
				if (mode == 'mobile') {

					$('.returnToSignUp').text('\u27E8 <?php echo $translations["M01525"][$language]; /*  Change Another Mobile */ ?>');
					$('.resendText').text('<?php echo $translations["M01533"][$language]; /* >Resend SMS in */ ?> ');
					$('.seconds').text('s');
					$('#lblOTPDescription').text('<?php echo $translations["M01528"][$language]; /* Please enter the 5-digit OTP that was sent to  */ ?> ' + loginPhoneNumber);

				} else if (mode == 'email') {
					$('.returnToSignUp').text('\u27E8 <?php echo $translations["M01526"][$language]; /*  Change Another Email */ ?>');
					$('.resendText').text('<?php echo $translations["M01529"][$language]; /*  Resend Email in */ ?>');
					$('.seconds').text('s');
					$('#lblOTPDescription').text('<?php echo $translations["M01528"][$language]; /* Please enter the 5-digit OTP that was sent to  */ ?> ' + $('input#email').val());
				}

			}

		});

		$('.returnToSignUp').click(function(e) {
			if ($('.verifyOTPBox').css('display') == 'block') {
				$('.verifyOTPBox').css('display', 'none');
			}

			if ($('.slideToOTPContainer').css('display') == 'block') {
				$('.slideToOTPContainer').css('display', 'none');
			}

			$('.signUpFormBox').css('display', 'block');

		});

		$('#emailOption').hide();
        $('#switchMobile').hide();
		$('#sendEmail').hide();
		$('#emailInput').hide();
		$('#emailSection').hide();

		$('#receiveButton').click(function() {			
			var $this = $(this);
			var $other = $('#sendButton')
			if ($this.hasClass('customButtonOffClick')) {
				$this.removeClass('customButtonOffClick');
				$this.addClass('customButtonOnClick');
				
				$other.removeClass('customButtonOnClick');
				$other.addClass('customButtonOffClick');
			} 

			// $('#sendPhoneNumber').text('Request');
			// $('#sendEmail').text('Request');
			$('#sendPhoneNumber').text('<?php echo $translations["M01792"][$language]; /*  Receive*/ ?>');
			$('#sendEmail').text('<?php echo $translations["M01792"][$language]; /*  Receive*/ ?>');
		});

		$('#sendButton').click(function() {			
			var $this = $(this);
			var $other = $('#receiveButton')
			if ($this.hasClass('customButtonOffClick')) {
				$this.removeClass('customButtonOffClick');
				$this.addClass('customButtonOnClick');
				
				$other.removeClass('customButtonOnClick');
				$other.addClass('customButtonOffClick');
			} 
			$('#sendPhoneNumber').text('<?php echo $translations["M01791"][$language]; /*  Send  */ ?>');
			$('#sendEmail').text('<?php echo $translations["M01791"][$language]; /*  Send  */ ?>');
		});

        $('#switchEmail').click(function () {
			$('#phoneOption').hide();			
			$('#phoneNumber').hide();
            // $('#country_code').hide();
            $('#switchEmail').hide();
			$('#sendPhoneNumber').hide();
			$('#sendEmail').show();
            $('#switchMobile').show();
            $('#emailOption').show();
			$('#emailInput').show();
			$('#emailSection').show();
            $('#mobileSection').hide();
			senderType = 'email';
		});

		$('#switchMobile').click(function () {
			$('#phoneOption').show();			
			$('#phoneNumber').show();
            // $('#country_code').show();
            $('#switchEmail').show();
			$('#sendPhoneNumber').show();
			$('#sendEmail').hide();
            $('#switchMobile').hide();
			$('#emailOption').hide();
            $('#emailInput').hide();
            $('#emailSection').hide();
            $('#mobileSection').show();
			senderType = 'mobile';
		});



				$('#phoneNumber').on('input', function (event) {
			this.value = this.value.replace(/[^0-9]/g, '');
		});

		$('#phoneNumber').on('keypress',function(e) {
		    if(e.which == 13) {
		        $('#sendPhoneNumber').click();
		    }
		});

		$('#emailInput').on('keypress',function(e) {
		    if(e.which == 13) {
		        $('#sendEmail').click();
		    }
		});
		

		$('#sendPhoneNumber').click(function(){
			var phoneNumber = $('#phoneNumber').val();
			// var countryNumber = $('#countryCode').val();

			if($('#receiveButton').hasClass('customButtonOnClick')) {
				// payee_mobile = countryNumber+phoneNumber;
				payee_mobile = "+"+phoneNumber;

				var url     =   'scripts/reqHomepage.php';

				var formData        = {
					command: 'requestfundcheckuserexist',
					payee_mobile: payee_mobile,
					
				};

				var method  =   'POST';
				var debug   =   0;
				var bypassBlocking  = 0;
				var bypassLoading   = 0;

				$.ajax({
						type: method, // define the type of HTTP verb we want to use (POST for our form)
						url: url, // the url where we want to POST
						data: formData, // our data object
						dataType: 'text', // what type of data do we expect back from the server
						encode: true,
						})
						.done(function(data) {

							var obj = JSON.parse(data);
							var detCountryCode = obj.mobileData.countryCode;
							var detMobileNumber = obj.mobileData.mobileNumber;
							var detMobileValid = obj.mobileData.validMobile;

							if(detMobileValid) {

								checkUser = obj.code;

								if (obj.code == 1){
									
									var phoneNumber = $('#phoneNumber').val();
									// var countryNumber = $('#countryCode').val();
									// utmTracking('',countryNumber+phoneNumber,'','Home Get Started button');
									utmTracking('',"+"+phoneNumber,'','Home Get Started button');
									
									$.redirect("receiveFund.php", {
										countryNumber : detCountryCode,
										phoneNumber : detMobileNumber,
										code : checkUser,
										referralCode: referralCode

									});
								}else {
									var nickname = obj.data.nickname;
									var phoneNumber = $('#phoneNumber').val();
									// var countryNumber = $('#countryCode').val();
									// utmTracking('',countryNumber+phoneNumber,'','Home Get Started button');
									utmTracking('',"+"+phoneNumber,'','Home Get Started button');
									
									// $.redirect("requestFund.php", {
									$.redirect("receiveFund.php", {
										countryNumber : detCountryCode,
										phoneNumber : phoneNumber,
										payeeNickname: nickname,
										referralCode: referralCode
									});
								}

							} else {
								// var message = "Invalid mobile number.";
								// errorOutput(message);

								var phoneNumber = $('#phoneNumber').val();
								utmTracking('',"+"+phoneNumber,'','Home Get Started button');

								// $.redirect("requestFund.php", {
								$.redirect("receiveFund.php", {
									countryNumber : '',
									phoneNumber : phoneNumber,
									payeeNickname: '',
									code: 1,
									referralCode: referralCode
								});
							}
							
						})
			}

			if($('#sendButton').hasClass('customButtonOnClick')) {								
				$.redirect('sendFund.php', {'phoneNumber': phoneNumber, 'sender_type': senderType });
			}			

		});

		$('#sendEmail').click(function(){
			var payeeEmail = $('#emailInput').val();
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			
			if(!emailReg.test(payeeEmail)) {

				if($('#receiveButton').hasClass('customButtonOnClick')) {

					utmTracking('',payeeEmail,'','Home Get Started button');	
	
					$.redirect("receiveFund.php", {
						payeeEmail : payeeEmail,
						payeeNickname: '',
						code: 1,
						referralCode: referralCode
					});
				} else {
					$.redirect("sendFund.php", {'payeeEmail':payeeEmail, 'sender_type': senderType});
				}

				// var message = "Please enter a valid email.";
				// errorOutput(message);
				// return false;
			}else if(payeeEmail=='') {

				if($('#receiveButton').hasClass('customButtonOnClick')) {
					utmTracking('',payeeEmail,'','Home Get Started button');	
	
					$.redirect("receiveFund.php", {
						payeeEmail : payeeEmail,
						payeeNickname: '',
						code: 1,
						referralCode: referralCode
					}); 
				} else {
					$.redirect("sendFund.php", {});
				}


				// var message = "Email address cannot be empty.";
				// errorOutput(message);
				// return false;
			} else {
				

				if($('#receiveButton').hasClass('customButtonOnClick')) {
					var url     =   'scripts/reqHomepage.php';
					
					var formData        = {
						command: 'requestfundcheckuserexist',
						payee_email: payeeEmail,
						
					};
	
					var method  =   'POST';
					var debug   =   0;
					var bypassBlocking  = 0;
					var bypassLoading   = 0;
	
					$.ajax({
							type: method, // define the type of HTTP verb we want to use (POST for our form)
							url: url, // the url where we want to POST
							data: formData, // our data object
							dataType: 'text', // what type of data do we expect back from the server
							encode: true,
							})
							.done(function(data) {
	
								var obj = JSON.parse(data);
								
								checkUser = obj.code;
	
								if (obj.code == 1){
									// var phoneNumber = $('#phoneNumber').val();
									// var countryNumber = $('#countryCode').val();
									utmTracking('',payeeEmail,'','Home Get Started button');
	
									$.redirect("receiveFund.php", {
										payeeEmail : payeeEmail,
										code : checkUser,
										referralCode: referralCode
									});
	
								}else {
									var nickname = obj.data.nickname;
									var phoneNumber = $('#phoneNumber').val();
									// var countryNumber = $('#countryCode').val();
									utmTracking('',payeeEmail,'','Home Get Started button');	
	
									$.redirect("receiveFund.php", {
										payeeEmail : payeeEmail,
										payeeNickname: nickname,
										referralCode: referralCode
									});
	
								}
							})
				} else {
					$.redirect('sendFund.php', {'payeeEmail': payeeEmail, 'sender_type': senderType});					
				}

			}
			
				
						
		// var payeeEmail = $('#emailInput').val();
		// var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		// if(!emailReg.test(payeeEmail)) {
		// 	var message = "Please enter a valid email.";
		// 	errorOutput(message);
		// 	return false;
		// }else {

		// 	utmTracking('',payeeEmail,'','Home Get Started button');
		// 	$.redirect("requestFund.php", {
		// 		payeeEmail : payeeEmail
		// 	});
		// }
		});


		// getLandingPageDetails();
		loadLandingPageDetails();

		if (countryCodeSet == 0) {
			if (countryNumber != "") {
				$('#countryCode2').val(countryNumber);
			} else {
				$('#countryCode2,#countryCode3').find('option').each(function() {

					if (countryCode && countryCode != "ZZ") {
						if ($(this).attr("data-countrycode") == countryCode) {
							$(this).parent().val(this.value).trigger('change');
						}
					} else {
						if ($(this).attr("data-countrycode") == "US") {
							$(this).parent().val(this.value).trigger('change');
						}
					}

				});
			}
		}

		$('#countryCode2').select2({
			dropdownAutoWidth: true,
			templateSelection: format,
			width: 80
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


		$('#phoneNumber').on('focus', function(e) {

			var tmpPhoneNumber = $('#phoneNumber').val();
			
			if(tmpPhoneNumber=="") {
				$('#phoneNumber').val(defaultCountryCode.substring(1));
			}

			$('#phoneNumber').attr("placeholder", "");
			$('.phoneNumberPrefix').text('+');

			$('#phoneNumber').caretToEnd();
			
		});

		$('#phoneNumber').on('blur', function(e) {

			var tmpPhoneNumber = $('#phoneNumber').val();

			if(tmpPhoneNumber=="" || "+"+tmpPhoneNumber==defaultCountryCode) {
				$('#phoneNumber').val('');
				$('.phoneNumberPrefix').text(defaultCountryCode);
			}
			
			$('#phoneNumber').attr("placeholder", "         <?php echo $translations["M01513"][$language]; /*  Your Mobile Number  */ ?>");
		});


		//			$('#switchMobile').hide();
		//
		//		$('#switchEmail').click(function(e) {
		//			mode = "email";
		//			$('#mobileDiv').hide();
		//			$('#switchEmail').hide();
		//			$('#emailDiv').show();
		//			$('#switchMobile').show();
		//			$('#username_S').val("");
		//
		//		});
		//
		//		$('#switchMobile').click(function(e) {
		//			mode = "mobile";
		//			$('#mobileDiv').show();
		//			$('#switchEmail').show();
		//			$('#emailDiv').hide();
		//			$('#switchMobile').hide();
		//			$('#email_S').val("");
		//
		//		});

		$('#mobileBtn').click(function(e) {
			mode = "mobile";
			$('#mobileDiv').show();
			$('#emailDiv').hide();
			$('#mobileDiv').css('display', 'flex');
			$('#email').val("");
			$('#mobileBtn').addClass('active');
			$('#emailBtn').removeClass('active');
			e.preventDefault();
			$('#sliderText').text("<?php echo $translations["M01524"][$language]; /*  Slide to get OTP */ ?>");

		});

		$('#emailBtn').click(function(e) {
			mode = "email";
			$('#emailDiv').show();
			$('#mobileDiv').hide();
			$('#username').val("");
			$('#emailBtn').addClass('active');
			$('#mobileBtn').removeClass('active');
			e.preventDefault();
			$('#sliderText').text("<?php echo $translations["M01524"][$language]; /*  Slide to get OTP */ ?>");

		});

		$('#requestFundBtn').click(function() {
			var payeeEmail = $('#email').val();
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

			var payeeMobile = '+' + $('#phoneNumber').val();

			if (!emailReg.test(payeeEmail)) {
				var message = "<?php echo $translations["M01534"][$language]; /* Please enter a valid email. */ ?>";
				errorOutput(message);
				return false;
			} else {
				var url = 'scripts/reqHomepage.php';

				var formData = {
					command: 'requestfundcheckuserexist',
					payee_email: mode == 'email' ? payeeEmail : '',
					payee_mobile: mode == 'mobile' ? payeeMobile : ''

				};

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

						var checkUser = obj.code;

						if (mode == 'mobile') {
							var detCountryCode = obj.mobileData.countryCode;
							var detMobileNumber = obj.mobileData.mobileNumber;
							var detMobileValid = obj.mobileData.validMobile;


							if (detMobileValid) {
								if (obj.code == 1) {
									// var phoneNumber = $('#phoneNumber').val();
									// var countryNumber = $('#countryCode').val();
									utmTracking(payeeMobile, '', '', 'Home Get Started button');

									$.redirect("requestFund.php", {
										countryNumber: mode == 'mobile' ? detCountryCode : '',
										phoneNumber: mode == 'mobile' ? detMobileNumber : '',
										code: checkUser
									});
								} else {

									utmTracking(payeeMobile, '', '', 'Home Get Started button');

									$.redirect("requestFund.php", {
										countryNumber: mode == 'mobile' ? detCountryCode : '',
										phoneNumber: mode == 'mobile' ? detMobileNumber : '',

									});
								}
							} else {

								var message = "<?php echo $translations["M01535"][$language]; /* Invalid mobile number. */ ?>";
								errorOutput(message);

							}
						} else if (mode == 'email') {
							console.log('email');
							console.log(payeeEmail);
							if (obj.code == 1) {
								// var phoneNumber = $('#phoneNumber').val();
								// var countryNumber = $('#countryCode').val();
								utmTracking('', payeeEmail, '', 'Home Get Started button');

								$.redirect("requestFund.php", {
									payeeEmail: payeeEmail,
									code: checkUser
								});
							} else {

								utmTracking('', payeeEmail, '', 'Home Get Started button');

								$.redirect("requestFund.php", {
									payeeEmail:  payeeEmail ,


								});
							}

						}




					})

			}

		});

		function errorOutput(message) {
			showMessage(message, 'warning', '', 'warning', '');
		}

		function format(val) {
			return val.id;
		}



	});

	//End of doc.ready
	function loadLandingPageDetails(pageNumber, fCallback) {
		var url = '<?php echo $sys['domain'] ?>/scripts/reqLanding.php';
		var method = 'POST';
		var debug = 0;
		var bypassBlocking = 0;
		var bypassLoading = 0;

		var formData = {
			command: "webpaylandingpagedetailsget",
			short_code: shortCode,
			username: userName,
			return_referral_code: return_referral_code
		};

		$.ajax({
				type: method, // define the type of HTTP verb we want to use (POST for our form)
				url: url, // the url where we want to POST
				data: formData, // our data object
				dataType: 'text', // what type of data do we expect back from the server
				encode: true,

			})
			.done(function(data) {
				var obj = JSON.parse(data);


				if (obj.code == 0) {
					var referral_code = obj.data;
					referralCode = referral_code;

					$('#referralCode').val(referralCode);
					var signupUrl = "<?php echo $sys['domain'];?>/newsignup.php?code="+referral_code;

					$(".loginSignUpBtn").attr("href", signupUrl);

					//keep cookie
					var days = 30;
					var date = new Date();
					date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
					var expires = date.toUTCString();
					document.cookie = "utm_promoCode" + "=" + referralCode + "; expires=" + expires + "; path=/";
				}
			});

	}


	// function inputLinkModal(value, linkID) {
	// 	var countryCode = $('#countryCode2').val();
	// 	value = value.replace(/^0+/, '');
	// 	$('#' + linkID).text(countryCode + value);
	// }


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
			showCanvas();
			$('.slide-text').fadeTo(300, 1);
			slider.animate({
				left: "-10px"
			}, 300);

			if (mode == "mobile" && $('input#username').val() == '') {
				hideCanvas();
				//				$('#slideToOTPModal').modal('toggle');
				$('#signUpError').hide();
				$('#signUpError').show();
				$('html, body').animate({
					scrollTop: $("#username").offset().top - 200
				}, 500);
				$('#signUpError').text('<?php echo $translations["M01531"][$language]; /* Please fill in your Mobile number.*/ ?>');
				$('input#username').focus();

				document.getElementById("signUpBtn").disabled = false;
			} else if (mode == "email" && $('input#email').val() == '') {
				hideCanvas();
				//				$('#slideToOTPModal').modal('toggle');
				$('#signUpError').hide();
				$('#signUpError').show();
				$('html, body').animate({
					scrollTop: $("#email").offset().top - 200
				}, 500);
				$('#signUpError').text('<?php echo $translations["M01532"][$language]; /* Please fill in your email.');*/ ?>');
				$('input#email').focus();
				document.getElementById("signUpBtn").disabled = false;
			} else {
				//				$('#slideToOTPModal').modal('toggle');
				var loginPhoneNumber = $('#countryCode2').val() + $('input#username').val().replace(/^0+/, '');

				var method = 'POST';
				var debug = 0;
				var bypassBlocking = 0;
				var bypassLoading = 0;

				var url = 'scripts/reqRegister.php';

				var formData = {
					command: 'verifyPhone',
					phoneNumber: loginPhoneNumber,
					email: $('input#email').val(),
					'mode': mode,
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


						if (obj.code == 1) {
							hideCanvas();
							//							showMessage(obj.message_d, 'success', '<?php echo $translations["M01164"][$language]; /* Congratulations */ ?>', 'check-circle-o', '')
							if (mode == 'mobile') {
								$('.returnToSignUp').text('\u27E8 <?php echo $translations["M01525"][$language]; /*  Change Another Mobile */ ?>');
								$('.resendText').text('<?php echo $translations["M01533"][$language]; /* >Resend SMS in */ ?> ');
								$('.seconds').text('s');
								$('#lblOTPDescription').text('<?php echo $translations["M01528"][$language]; /* Please enter the 5-digit OTP that was sent to  */ ?> ' + loginPhoneNumber);

							} else if (mode == 'email') {
								$('.returnToSignUp').text('\u27E8 <?php echo $translations["M01526"][$language]; /*  Change Another Email */ ?>');
								$('.resendText').text('<?php echo $translations["M01529"][$language]; /*  Resend Email in */ ?> ');
								$('.seconds').text('s');
								$('#lblOTPDescription').text('<?php echo $translations["M01528"][$language]; /* Please enter the 5-digit OTP that was sent to  */ ?> ' + $('input#email').val());
							}

							$('.signUpFormBox').css('display', 'none');
							$('.slideToOTPContainer').css('display', 'none');
							$('.verifyOTPBox').css('display', 'block');



							//							$('#username').prop("disabled", true);
							//							$('#countryCode2').prop("disabled", true);
							//							$('#sliderButton').fadeOut();
							$('#sendPhoneCode').fadeIn();


							var countDownDate = obj.timeout;

							document.getElementById("timer").innerHTML = countDownDate;
							startTimer();

							function startTimer() {
								$('#timerDiv').show();
								$('#timer').show();
								$('.resendText').show();
								$('.seconds').show();

								$('#resendBtn').hide();

								var presentTime = document.getElementById('timer').innerHTML;

								var s = checkSecond((presentTime - 1));

								if (s <= "00") {

									$('#timerDiv').hide();
									$('#timer').hide();
									$('.resendText').hide();
									$('.seconds').hide();
									$('#resendBtn').show();

								} else {
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
							$('#signUpError').hide();
							verifyPhoneNumber = 1;
							verifyEmail = 1;

						} else {
							hideCanvas();
							if (obj.error_message) {
								var error_message = "";
								$.each(obj.error_message, function(k, v) {
									error_message += v + "<br>";
								});
								showMessage(obj.message_d + "<br><?php echo $translations["M01165"][$language]; ?><br>" + error_message, 'warning', obj.message, 'warning', '')
							} else {
								showMessage(obj.message_d, 'warning', obj.message, 'warning', '')
							}


						}


					});

				return;
			}
		}

		// slider.addClass('unlocked');


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



	function registerPhoneMsg(data, message) {
		$('#signUpError').hide();
		var countDownDate = data.timeout;

		document.getElementById("timer").innerHTML = countDownDate;
		startTimer();

		function startTimer() {
			$('#timerDiv').show();
			$('#timer').show();
			$('.resendText').show();
			$('.seconds').show();
			$('#resendBtn').hide();

			var presentTime = document.getElementById('timer').innerHTML;

			var s = checkSecond((presentTime - 1));

			if (s <= "00") {

				$('#timerDiv').hide();
				$('#timer').hide();
				$('.resendText').hide();
				$('.seconds').hide();
				$('#resendBtn').show();

			} else {
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
	}

</script>

<style>
	.center {

		margin: auto;
		width: 100%;
		padding: 10px;
		text-align: center;
	}

	.center_grey {

		/* margin: auto; */
		width: 100%;
		padding: 10px;
		text-align: center;
		background-color: #e6e6e6;
		height: 100%;



	}

	.center_signup {
		margin: auto;
		width: 50%;
		padding: 10px;
		text-align: center;
	}

	.contact_details {
		text-align: left;

	}

	.footer {
		margin: auto;
		width: 100%;
		padding: 10px;
		text-align: center;
		background-color: #666666;
	}

	.subtitle {
		font-size: 18;
		margin: auto;
		width: 60%;
		padding: 10px;
		text-align: center;
	}

	.line_space {
		line-height: 1.6;
		margin: auto;
		width: 60%;
		padding: 10px;
		text-align: center;
	}

	.title {
		display: block;
		font-size: 2em;
		margin-top: 0.67em;
		margin-bottom: 0.67em;
		margin-left: 0;
		margin-right: 0;
		font-weight: 500;

		margin: auto;
		width: 60%;
		padding: 10px;
		text-align: center;
	}

	/*New Style*/

	@font-face {
		font-family: 'Montserrat';
		font-weight: 300;
		src: url('<?php echo $sys['domain']?>/css/fonts/Montserrat/Montserrat-Regular.ttf');
	}

	@font-face {
		font-family: 'Montserrat';
		font-weight: 400;
		src: url('<?php echo $sys['domain']?>/css/fonts/Montserrat/Montserrat-Medium.ttf');
	}

	@font-face {
		font-family: 'Montserrat';
		font-weight: 500;
		src: url('<?php echo $sys['domain']?>/css/fonts/Montserrat/Montserrat-SemiBold.ttf');
	}

	@font-face {
		font-family: 'Montserrat';
		font-weight: 600;
		src: url('<?php echo $sys['domain']?>/css/fonts/Montserrat/Montserrat-Bold.ttf');
	}

	.nuxPaySectionLandingPageReseller01 {
		background-image: url(../images/LandingElements/landingPageBackground.png);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: top;
		/*
    padding-top: 80px;
    padding-bottom: 80px;
*/
		min-height: 100vh;
		/* display: flex; */
		align-items: center;
	}

	body {
		font-family: 'Montserrat' !important;
		font-weight: 300;
		color: #000 !important;
		background-color: #fff !important;
	}

	body.modal-open {
		position: unset;
	}

	.form-control {
		font-family: 'Montserrat' !important;
	}


	.memberLandingPage {
		/* color: #000; */
		padding-top: 0px;
	}

	.memberLandingPageLogo {
		width: 300px;
		margin-left: 50px;
		margin-top: 20px;
	}

	.memberLandingPageAnchor {
		color: #000;
		text-decoration: none;
		margin: 30px 30px;
		font-size: 12px;
		transition: color .3s;
	}

	.memberLandingPageAnchor:hover {
		text-decoration: none;
		color: #51C2DB;
	}

	.memberLandingPageSection1Title {
		font-size: 27px;
		font-weight: 200;
		margin-top: 0;
	}

	.memberLandingPageSection1Subtitle {
		font-size: 15px;
		margin-top: 25px;
	}

	.memberLandingPageSection1Content {
		margin-top: 40px;
		font-weight: 100;
		padding: 0 250px;
	}

	.memberLandingPageSection1Image {
		margin-top: 50px;
	}

	.memberLandingPageSection1Image img {
		width: 100%;
	}

	.memberLandingPageSection2 {
		margin-top: 0px;
	}

	.memberLandingPageSection2Title {
		font-size: 35px;
		font-weight: 400;
	}

	.memberLandingPageSection3 {
		background-color: #e6e6e6;
		padding: 40px;
		margin-top: 50px;
	}

	.memberLandingPageSection3Title {
		font-size: 35px;
		font-weight: 400;
		margin-bottom: 20px;
	}

	.memberLandingPageSection3Content {
		margin-top: 20px;
		width: 100%;
		margin-left: auto;
		margin-right: auto;
	}

	.memberLandingPageSection3Content div div i {
		margin-right: 3px;
	}

	.memberLandingPageSection3Content div div:first-child {
		font-weight: 500;
		padding-left: 110px;
		width: 220px;
	}

	.memberLandingPageSection3Content div div:last-child {
		width: 220px;
	}

	.memberLandingPageFooter {
		padding: 15px;
		background-color: #454545;
		color: #d5d5d5;
		text-align: center;
	}

	.landingPageResellerLabel {
		margin-top: 150px;
		font-size: 30px;
		margin-left: 100px;
		margin-bottom: 10px;
	}

	.landingPageResellerLabel2 {
		margin-left: 100px;
		font-size: 17px;
	}

	.coinGif {
		margin-top: 40px;
	}

	.primaryBtn,
	.primaryBtn.hover,
	.primaryBtn:active {
		background-color: #29397b !important;
	}

	.nav-link.active {
		border-bottom: 2px solid #29397b;
	}

	.landingPageQuote {
		padding: 0 80px;
	}

	.kolReview {
		color: #fff;
		font-size: 14px;
		/*		text-align: left;*/
	}

	#sliderButton {
		margin-top: 170px;
		margin-bottom: 170px;
	}

	body {
		font-size: 16px;
	}

	input[type="text"] {
		font-size: inherit;
	}

	/* Chrome, Safari, Edge, Opera */
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}

	/* Firefox */
	input[type=number] {
		-moz-appearance: textfield;
	}

	.landingPageDetails {
		margin-top: 10%;
		padding-left: 5px;
	}

	.cnTestimonial {
		margin-top: 20px;
	}

	.blueContainer {
		top: 30%;
	}

	@media (min-width: 320px) and (max-width: 767px) {

		.memberLandingPageLogo {
			width: 250px;
			margin: 50px auto;
		}

		.blueContainer {
			top: 35%;
			height: 500px;
		}

		.landingPageQuote {
			padding: 0 20px;
		}

		.memberLandingPageSection1Content {
			padding: 0 40px;
		}

		.memberLandingPageSection3 {
			padding: 40px 20px;
		}

		.memberLandingPageSection3Content {
			text-align: center;
		}

		.memberLandingPageSection3Content div div:first-child {
			font-weight: 500;
			padding-left: 0px;
			width: 200px;
		}

		.memberLandingPageSection3Content div div:last-child {
			width: 200px;
		}

		.landingPageResellerLabel {
			margin-top: 70px;
			font-size: 30px;
			margin-left: 30px;
			margin-bottom: 10px;
		}

		.landingPageResellerLabel2 {
			margin-left: 30px;
			font-size: 17px;
		}

		#slideToOTPModal {
			position: fixed !important;
			width: 80%;
			text-align: center;
		}

		.close:before,
		.close:after {
			left: 50px;
		}

		.kolImage {
			width: 160px;
		}

		.kolName {
			font-size: 18px;
		}

		.kolReview {
			font-size: 12px;
		}

		.blueContainer {
			top: 22%;
			height: 186px;
		}

		.landingPageDetails {
			margin-top: 10px;
			padding-left: 5px;
		}

		.blueContainerMobile {
			background-image: linear-gradient(#29397b, #17214a);
			padding-top: 10px;
			padding-bottom: 10px;
		}

		.blueContainer {
			display: none;
		}

		html,
		body {
			overflow-x: hidden;
		}

		#sliderButton {
			margin-top: 100px;
			margin-bottom: 120px
		}


	}

	.nuxPaySection01Input,
	.nuxPaySection01Input:focus {
		padding-left: 30px;
	}

	@media (min-width: 768px) and (max-width: 990px) {
		.blueContainer {
			top: 15%;
		}

		.landingPageDetails {
			padding-left: 0 !important;
			margin-top: 5% !important;
			padding-right: 50px;
		}
	}

	@media (min-width: 991px) and (max-width: 1199px) {
		.blueContainer {
			top: 20%;
		}

		.landingPageDetails {
			margin-top: 8%;
			padding-right: 10%;
		}

		.kolImage {
			margin-top: 0 !important;
		}

		.landingPageContainerMargin {
			margin-top: 0 !important;
		}
	}

</style>
