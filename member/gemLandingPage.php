<?php include 'include/config.php'; ?>
<?php include 'headHomepage.php'; ?>

<body class="nuxpayLandingPage" style="overflow-x: hidden;">

		

		<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body"  style="height: 100%;">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

				<section class="landingBG">
					<div class="kt-container">
						<div class="row justify-content-center">
							<div class="col-12">
								<a class="kt-header__brand-logo headerLink" href="homepage.php?landingpage" data-name="Homepage">
				                    <img alt="Logo" src="<?php echo $sys['loginLogo'] ?>" style="" class="landingLogo">
				                </a>
							</div>

							<div class="col-12 landingPageMargin" style="padding-left: 28px;">
								<div class="row">
									<div class="col-12 landingTitle">
										No.1 Crypto Payment Solution
									</div>
									<div class="col-12" style="margin-top: 30px;">
										<img src="images/landing/landing_arrow.png" class="landingArrow itemArrowBlack1">
										<img src="images/landing/landing_arrow.png" class="landingArrow itemArrowBlack2">
										<img src="images/landing/landing_arrow.png" class="landingArrow itemArrowBlack3">
										<img src="images/landing/landing_arrow_green.png" class="landingArrow itemArrow1">
										<img src="images/landing/landing_arrow_green.png" class="landingArrow itemArrow2">
										<img src="images/landing/landing_arrow_green.png" class="landingArrow itemArrow3">

										


										<span class="landingDesc item1">Only 0.5% Processing Fee<br>No Hidden Charges</span>
										<span class="landingDesc item2">We Accept All Account Types</span>
										<span class="landingDesc item3">Real Time Transaction Balance & History</span>
									</div>

									<div class="col-12 leaveNumber">
										<!-- Sign Up Now to get FREE for First Three Month!
										<div class="validDate">*Valid Until 15 Feb 2020</div> -->
									</div>

									<div class="col-12" id="phoneOption">
										<div class="row">
											<div class="col-xl-6 col-lg-7 col-md-10 col-12" style="margin-top: 20px;">
												<div class="row">
													<div class="landingPart01">
														<select id="countryCode" class="form-control nuxPaySection01Dropdown">
															<?php include 'phoneList.php'; ?>
														</select>
													</div>
													<div class="landingPart02">
														<input id="phoneNumber" type="text" class="form-control contactInput" placeholder="Phone Number">
													</div>
													<div class="landingPart03">
														<button id="sendPhoneNumber" type="button" class="btn primaryBtn">Sign Up</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12" id="emailOption">
										<div class="row">
											<div class="col-xl-6 col-lg-7 col-md-10 col-12" style="margin-top: 20px;">
												<div class="row">
													<div class="landingPart02">
														<input id="email" type="email" class="form-control contactInput" placeholder="Email">
													</div>
													<div class="landingPart03">
														<button id="sendEmail" type="button" class="btn primaryBtn">Sign Up</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12" style="padding-top:10px">
									<button class="switchToEmail" id="switchEmail" style="background:none;border:none;">Switch to email</button>
									</div>

								</div>
							</div>
							
						</div>
					</div>
				</section>

				

			</div>
		</div>

</div>
</div>
</div>
</body>

</html>
<?php include 'sharejsHomepage.php'; ?>
<script>
	var countryCode 	= "<?php echo $countryCode; ?>";
	if (!countryCode) {
		countryCode = "US";
	}
	var email;
	var phone;
	
	$(document).ready(function() {
		
		$('#emailOption').hide();
		
		$('#phoneNumber').on('input', function (event) { 
			this.value = this.value.replace(/[^0-9]/g, '');
		});
		email = false;
		phone = true;
		$('#switchEmail').click(function(){
			if(phone == true){
				$('#emailOption').show();
				$('#phoneOption').hide();
				phone = false;
				email = true;
				$('#switchEmail').text("Switch to mobile");
			} else {
				$('#emailOption').hide();
				$('#phoneOption').show();
				phone = true;
				email = false;
				$('#switchEmail').text("Switch to email");
			}
		});

		$('#sendPhoneNumber').click(function(){
			var phoneNumber = $('#phoneNumber').val();
			var countryNumber = $('#countryCode').val();
			utmTracking('',countryNumber+phoneNumber,'','LandingPage Get Started button');
			$.redirect("newsignup.php", {
				countryNumber : countryNumber,
				phoneNumber : phoneNumber
			});

		});

		$('#sendEmail').click(function(){

			var email = $('#email').val();
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			if(!emailReg.test(email)) {
				var message = "Please enter a valid email.";
				errorOutput(message);
				return false;
			}else
    		
			utmTracking('',email,'','LandingPage Get Started button');
			$.redirect("newsignup.php", {
				email : email
			});

		});

		function validateEmail(email) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			if(!emailReg.test(email)) {
				return false;
			}else{
				return true;
			}
		}
		
		function errorOutput(message){
			showMessage(message, 'warning', '', 'warning', '');
		}
		function format(val) {
			return val.id;
		}

		$('#countryCode').select2({
			dropdownAutoWidth : true,
			templateSelection: format,
			width: 90
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

        tracking();

		$('.headerLink').click(function(){
			utmTracking('','','','nuxpayLandingPage headerLink ('+$(this).attr('data-name')+')');
		});

		$('.footerLink').click(function(){
			utmTracking('','','','nuxpayLandingPage footerLink ('+$(this).attr('data-name')+')');
		});
	});
</script>
