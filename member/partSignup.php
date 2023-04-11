<div class="col-12" id="partSignup">
	<div class="row nuxPayLoginHeight">
		<div class="col-xl-4 col-lg-6 col-12 order-lg-1 order-2 nuxPayloginSection2Box">
			<div class="row">
				<div class="loginContainer">
					<div class="row">
						<div class="col-12 text-center">
							<a class="kt-header__brand-logo headerLink" href="homepage.php" data-name="Homepage">
								<img alt="Logo" src="<?php echo $sys['domain']?>/<?php echo $sys['loginLogo'] ?>" class="logoWidth">
							</a>
						</div>
						<div class="col-12 text-center nuxPayLoginFormMargin2">
							<div class="row">
								
								<div class="col-12 form-group">
									<div class="row">
										<div class="col-12">
											<div id="signUpError" class="alert alert-danger" style="display: none;">
											</div>
										</div>
									</div>
								</div>

								<div class="col-12 form-group" style="display: flex;" id="mobileDiv">
									<div class="countryContactBox">
										<select id="countryCode2" class="form-control contactInput">
											<?php include 'phoneList.php'; ?>
										</select>
									</div>
									<input id="username_S" placeholder="Mobile Number" type="text" class="form-control contactInput" onchange="inputLinkModal(this.value,'confirmMobile');">
									<i class="fa fa-question-circle-o nuxPayBtnSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="Example: 14081111111"></i>
									
								</div>
								
								<div class="col-12 form-group" id="emailDiv" style="display: flex;">
									<input id="email_S" placeholder="Email" type="text" class="form-control contactInput" onchange="inputLinkModal(this.value,'confirmEmail');">
									<i class="fa fa-question-circle-o nuxPayBtnSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="Example: abc@gmail.com"></i>
								</div>

								

								<div id="sliderButton" class="col-12 form-group nuxPaySignUpFormPadding">
									<div id="button-background">
										<span id="sliderText" class="slide-text">Slide to get SMS Code</span>
										<div id="slider">
											<i id="locker" class="fa fa-arrow-right material-icons"></i>
										</div>
									</div>
								</div>

								

								<div id="sendPhoneCode" class="col-12 nuxPaySignUpFormPadding" style="display: none;">
									<div class="row">

										<div class="col-7 form-group pr-0">
											<input id="linkCode" name="linkCode" class="form-control m-input m-login__form-input--last contactInput" placeholder="<?php echo $translations["M00450"][$language]; //5 Digit Code?>" maxlength="5" type="text" onkeypress="return isNumberKey(event);">
										</div>

										<div class="col-5 text-center">
											<div id="timerDiv" class="col-md-4 text-center linkCode2" style="margin-top: 10px;">
												<div id="linkCode2" name="linkCode2" class="" placeholder="" disabled>
													<span id="timer" name="timer" style="text-align: center;"></span>
												</div>
											</div>
											<button type="button" class="btn primaryBtn" id="resendBtn" style="display: none;"><?php echo $translations["M00451"][$language]; //Resend ?></button>
										</div>


									</div>
								</div>
								<div id="switchMobile" class= "col-12 form-group" style="display:flex; text-decoration: underline;">
									<a href="#">Switch to Mobile Number</a>
								</div>

								<div id="switchEmail" class= "col-12 form-group" style="display:flex; text-decoration: underline;">
									<a href="#">Switch to Email</a>
								</div>
								
								

								<div class="col-12 form-group" style="display: flex;">
									<input id="signInBusinessName" placeholder="Name" type="text" class="form-control contactInput">
									<i class="fa fa-question-circle-o nuxPayBtnSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="Max 25 Character"></i>
								</div>

								<div class="col-12 form-group" style="display: flex">
									<input id="password_S" placeholder="Password" type="password" class="form-control contactInput">
									<i class="fa fa-question-circle-o nuxPayBtnSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="Min 4 characters"></i>
								</div>

								<div class="col-12 form-group nuxPaySignUpFormPadding">
									<input id="retypePassword" placeholder="Re-type Password" type="password" class="form-control contactInput">
								</div>

								<div class="col-12 form-group nuxPaySignUpFormPadding">
									<input id="referralCode" placeholder="Promotion Code" type="text" class="form-control contactInput">
									
								</div>

								<div class= "col-12 form-group" style="display:flex">
									<span class="promoCodeSpan">Enter promotion code to get $10 for free</span>
								</div>
								<div class="col-12 form-group nuxPaySignUpFormPadding">
									<button id="signUpBtn" type="button" class="btn primaryBtn">SIGN UP</button>
								</div>

								<div class="col-12 text-center loginCopyRight2">
									Copyright © <?php echo date("Y")?> <?php echo $sys['companyName']?>. All Rights Reserved.
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
					<img class="nuxPayLoginObject2" src="<?php echo $sys['domain']?>/images/login/nuxPayLoginObject.png">
				</div>
				<div class="col-10 align-self-center">
					<div class="row">
						<div class="col-12 nuxPayTitle">
							Welcome To <?php echo $sys['companyName']?>
						</div>
						<div class="col-12 nuxPayDesc">
							Start getting payment from around the world.
						</div>
						<div class="col-12 nuxPayNoAccount">
							Already have account? <span id="loginHere" class="nuxPayBtnSignUp">Login here</span>
						</div>
					</div>
				</div>

				<div class="col-2 align-self-center">
					<div id="partSignupOpen" class="row nuxPaySideButton2">
						<div class="col-12 nuxPaySideButtonText">
							LOGIN
							<i class="fa fa-arrow-right" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		

	</div>
</div>

<?php include 'sharejsDashboard.php'; ?>
<script>

	var mode = "mobile";

	$(document).ready(function() {
			// if($('#username_S').val()==""){
			// 	mode = "email";

			// 	$('#emailDiv').show();
			// 	$('#switchMobile').show();
			// 	$('#mobileDiv').hide();
			// 	$('#switchEmail').hide();
			// 	console.log("hi");
			// }
			// if($('#email_S').val()==""){
			// 	mode = "mobile";

			// 	$('#emailDiv').hide();
			// 	$('#switchMobile').hide();
			// 	$('#mobileDiv').show();
			// 	$('#switchEmail').show();
			// 	console.log("lollll");
			// }
			// $('#emailDiv').hide();
			// $('#switchMobile').hide();

			$('#switchEmail').click(function (e) {
				mode = "email";
				$('#mobileDiv').hide();
				$('#switchEmail').hide();
				$('#emailDiv').show();
				$('#switchMobile').show();
				$('#username_S').val("");
				e.preventDefault();
				$('#sliderText').text("Slide to get email code");
			});

			$('#switchMobile').click(function (e) {
				mode = "mobile";
				$('#mobileDiv').show();
				$('#switchEmail').show();
				$('#emailDiv').hide();
				$('#switchMobile').hide();
				$('#email_S').val("");
				e.preventDefault();
				$('#sliderText').text("Slide to get SMS code");
			});
		
	});


</script>

