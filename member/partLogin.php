<div id="partLogin" class="col-12">
	<div class="row nuxPayLoginHeight2">
		<div class="col-xl-8 col-lg-6 col-12 nuxPayLoginBox nuxPayLoginBG">
			<div class="row">
				<div class="col-12 nuxPayLoginObjectPosition">
					<img class="nuxPayLoginObject" src="<?php echo $sys['domain']?>/images/login/nuxPayLoginObject.png">
				</div>
				<div class="col-2 align-self-center">
					<div id="partLoginOpen" class="row nuxPaySideButton">
						<div class="col-12 nuxPaySideButtonText">
							SIGN UP 
							<i class="fa fa-arrow-left" aria-hidden="true"></i>
						</div>
					</div>
				</div>
				<div class="col-10 align-self-center">
					<div class="row">
						<div class="col-12 nuxPayTitle text-right">
							Welcome Back
						</div>
						<div class="col-12 nuxPayDesc text-right">
							Login to manage and view your payment transactions.
						</div>
						<div class="col-12 nuxPayNoAccount text-right">
							No account yet? <span id="signupHere" class="nuxPayBtnSignUp">Sign up here</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-6 col-12 nuxPayloginSection2Box">
			<div class="row">
				<div class="loginContainer">
					<div class="row">
						<div class="col-12 text-center">
							<a class="kt-header__brand-logo headerLink" href="homepage.php" data-name="Homepage">
								<img alt="Logo" src="<?php echo $sys['domain']?>/<?php echo $sys['loginLogo'] ?>" style="" class="logoWidth">
							</a>
						</div>
						<div class="col-12 text-center nuxPayLoginFormMargin">
							<div class="row">
								<div class="col-12 form-group">
									<div class="row">
										<div class="col-12">
											<div id="loginError" class="alert alert-danger" style="display: none;">
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-12 form-group" style="display: flex;" id="mobileDiv2">
									<div class="countryContactBox">
										<select id="countryCode3" class="form-control contactInput">
											<?php include 'phoneList.php'; ?>
										</select>
									</div>
									<input id="username" placeholder="Mobile Number" type="text" class="form-control contactInput">
								</div>

								<div id="switchEmail2" class= "col-12 form-group" style="display:flex; text-decoration: underline;">
									<a href="#">Switch to Email</a>
								</div>

								<div id="email_S2" class="col-12 form-group" id="emailDiv" style="display: flex;">
									<input id="email" placeholder="Email" type="text" class="form-control contactInput">
								</div>
								
								<div id="switchMobile2" class= "col-12 form-group" style="display:flex; text-decoration: underline;">
									<a href="#">Switch to Mobile Number</a>
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

											<img id="captchaImage" src="<?php echo $sys['domain']?>/captcha.php?r=<?php echo rand(); ?>" class="loginScurityCodeSize">
											<i class="fa fa-refresh" style="cursor:pointer;margin-left:5px"></i>
										</div>
									</div>
								</div>

								<div class="col-12 form-group">
									<button id="pageLoginBtn" type="button" class="btn primaryBtn mb-4">LOGIN</button>
									<span>Did You <a href="<?php echo $sys['domain']?>/forgotPassword.php" class="forgotPasswordText">forget your password?</a></span>
								</div>

								<div class="col-12 text-center loginCopyRight">
									Copyright © <?php echo date("Y")?> <?php echo $sys['companyName']?>. All Rights Reserved.
								</div>


							</div>
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
		
		$('#email_S2').hide();
		$('#switchMobile2').hide();

		$('#switchEmail2').click(function (e) {
			mode = "email";
			$('#mobileDiv2').hide();
			$('#switchEmail2').hide();
			$('#email_S2').show();
			$('#switchMobile2').show();
			e.preventDefault();

		});

		$('#switchMobile2').click(function (e) {
			mode = "mobile";
			$('#email_S2').hide();
			$('#switchMobile2').hide();
			$('#mobileDiv2').show();
			$('#switchEmail2').show();
			e.preventDefault();
		});
		
	});

</script>

