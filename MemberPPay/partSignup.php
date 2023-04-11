<div class="col-12" id="partSignup">
	<div class="row pPayLoginHeight">
		<div class="col-xl-4 col-lg-6 col-12 order-lg-1 order-2 pPayloginSection2Box">
			<div class="row">
				<div class="loginContainer">
					<div class="row">
						<div class="col-12 text-center">
							<a class="kt-header__brand-logo headerLink" href="homepage.php" data-name="Homepage">
								<img alt="Logo" src="<?php echo $sys['newHomepageLogoBlack2'] ?>" style="" class="logoWidth">
							</a>
						</div>
						<div class="col-12 text-center pPayLoginFormMargin2">
							<div class="row">
								
								<div class="col-12 form-group">
									<div class="row">
										<div class="col-12">
											<div id="signUpError" class="alert alert-danger" style="display: none;">
											</div>
										</div>
									</div>
								</div>

								<div class="col-12 form-group" style="display: flex;">
									<div class="countryContactBox">
										<select id="countryCode2" class="form-control contactInput">
											<?php include 'phoneList.php'; ?>
										</select>
									</div>
									<input id="username_S" placeholder="Mobile Number" type="text" class="form-control contactInput" onchange="inputLinkModal(this.value,'confirmEmail');">
									<i class="fa fa-question-circle-o pPayBtnSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="Example: 14081111111"></i>
								</div>

								<div id="sliderButton" class="col-12 form-group pPaySignUpFormPadding">
									<div id="button-background">
										<span class="slide-text">Slide to get SMS Code</span>
										<div id="slider">
											<i id="locker" class="fa fa-arrow-right material-icons"></i>
										</div>
									</div>
								</div>

								<div id="sendPhoneCode" class="col-12 pPaySignUpFormPadding" style="display: none;">
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



								<div class="col-12 form-group" style="display: flex;">
									<input id="signInBusinessName" placeholder="Business Name" type="text" class="form-control contactInput">
									<i class="fa fa-question-circle-o pPayBtnSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="Max 25 Character"></i>
								</div>

								<div class="col-12 form-group" style="display: flex">
									<input id="password_S" placeholder="Password" type="password" class="form-control contactInput">
									<i class="fa fa-question-circle-o pPayBtnSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="Min 4 characters"></i>
								</div>

								<div class="col-12 form-group pPaySignUpFormPadding">
									<input id="retypePassword" placeholder="Re-type Password" type="password" class="form-control contactInput">
								</div>

								<div class="col-12 form-group pPaySignUpFormPadding">
									<button id="signUpBtn" type="button" class="btn primaryBtn">SIGN UP</button>
								</div>

								<div class="col-12 text-center loginCopyRight2">
									Copyright © 2020 <?php echo $sys['companyName'];?>. All Rights Reserved.
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-8 col-lg-6 col-12 order-lg-2 order-1 pPayLoginBox2 pPaySignupBG">
			<div class="row">
				<div class="col-12 pPayLoginObjectPosition2">
					<img class="pPayLoginObject2" src="/images/login/pPayLoginObject.png">
				</div>
				<div class="col-10 align-self-center">
					<div class="row">
						<div class="col-12 pPayTitle">
							Welcome To <?php echo $sys['companyName'];?>
						</div>
						<div class="col-12 pPayDesc">
							Start getting payment from around the world.
						</div>
						<div class="col-12 pPayNoAccount">
							Already have account? <span id="loginHere" class="pPayBtnSignUp text-light-blue">Login here</span>
						</div>
					</div>
				</div>

				<div class="col-2 align-self-center">
					<div id="partSignupOpen" class="row pPaySideButton2">
						<div class="col-12 pPaySideButtonText">
							LOGIN
							<i class="fa fa-arrow-right" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		

	</div>
</div>



