<div id="partLogin" class="col-12">
	<div class="row pPayLoginHeight2">
		<div class="col-xl-8 col-lg-6 col-12 pPayLoginBox pPayLoginBG">
			<div class="row">
				<div class="col-12 pPayLoginObjectPosition">
					<img class="pPayLoginObject" src="/images/login/pPayLoginObject.png">
				</div>
				<div class="col-2 align-self-center">
					<div id="partLoginOpen" class="row pPaySideButton">
						<div class="col-12 pPaySideButtonText">
							SIGN UP 
							<i class="fa fa-arrow-left" aria-hidden="true"></i>
						</div>
					</div>
				</div>
				<div class="col-10 align-self-center">
					<div class="row">
						<div class="col-12 pPayTitle text-right">
							Welcome Back
						</div>
						<div class="col-12 pPayDesc text-right">
							Login to manage and view your payment transactions.
						</div>
						<!--<div class="col-12 pPayNoAccount text-right">
							No account yet? <span id="signupHere" class="pPayBtnSignUp">Sign up here</span>
						</div>-->
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-6 col-12 pPayloginSection2Box">
			<div class="row">
				<div class="loginContainer">
					<div class="row">
						<div class="col-12 text-center">
							<a class="kt-header__brand-logo headerLink" href="homepage.php" data-name="Homepage">
								<img alt="Logo" src="<?php echo $sys['newHomepageLogoBlack2'] ?>" style="" class="logoWidth">
							</a>
						</div>
						<div class="col-12 text-center pPayLoginFormMargin">
							<div class="row">
								<div class="col-12 form-group">
									<div class="row">
										<div class="col-12">
											<div id="loginError" class="alert alert-danger" style="display: none;">
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-12 form-group" style="display: flex;">
									<div class="countryContactBox">
										<select id="countryCode3" class="form-control contactInput">
											<?php include 'phoneList.php'; ?>
										</select>
									</div>
									<input id="username" placeholder="Mobile Number" type="text" class="form-control contactInput">
								</div>

								<div class="col-12 form-group">
									<input id="password" placeholder="Password" type="password" class="form-control contactInput">
								</div>

								<div class="col-12 form-group">
									<div class="row">
										<div class="loginSecurityWidth">
											<input id="captcha" placeholder="Security Code" type="text" class="form-control contactInput">
										</div>
										<div class="loginSecurityWidth2" id="basic-addon2">

											<img id="captchaImage" src="captcha.php?r=<?php echo rand(); ?>" class="loginScurityCodeSize">
											<i class="fa fa-refresh" style="cursor:pointer;margin-left:5px"></i>
										</div>
									</div>
								</div>

								<div class="col-12 form-group">
									<button id="pageLoginBtn" type="button" class="btn primaryBtn mb-4">LOGIN</button>
									<span>Did You <a href="forgotPassword.php" style="color: #231917">forget your password?</a></span>
								</div>

								<div class="col-12 text-center loginCopyRight">
									Copyright © 2020 <?php echo $sys['companyName'];?>. All Rights Reserved.
								</div>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>



