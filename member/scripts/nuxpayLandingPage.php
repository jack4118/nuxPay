<?php include 'include/config.php'; ?>
<?php include 'headHomepage.php'; ?>

<body class="promoLandingPage" style="overflow-x: hidden;">

		

		<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body"  style="height: 100%;">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

				<section class="landingBG">
					<div class="kt-container">
						<div class="row justify-content-center">
							<div class="col-12">
								<a class="kt-header__brand-logo headerLink" href="homepage.php?landingpage" data-name="Homepage">
				                    <img alt="Logo" src="<?php echo $sys['newHomepageLogoBlack2'] ?>" style="" class="landingLogo">
				                </a>
							</div>

							<div class="col-12 landingPageMargin" style="padding-left: 28px;">
								<div class="row">
									<div class="col-12 landingTitle">
										Enjoy FREE Transaction Fee for The First 3 Months!
									</div>
									<div class="col-12" style="margin-top: 30px;">
										<img src="images/landing/landing_arrow.png" class="landingArrow itemArrowBlack1">
										<img src="images/landing/landing_arrow.png" class="landingArrow itemArrowBlack2">
										<!-- <img src="images/landing/landing_arrow.png" class="landingArrow itemArrowBlack3"> -->
										<img src="images/landing/landing_arrow_green.png" class="landingArrow itemArrow1">
										<img src="images/landing/landing_arrow_green.png" class="landingArrow itemArrow2">
										<!-- <img src="images/landing/landing_arrow_green.png" class="landingArrow itemArrow3"> -->

										


										<!-- <span class="landingDesc item1">Only 0.2% Processing Fee<br>No Hidden Charge</span> -->
										<span class="landingDesc item1">We Accept All Business Types & Currencies</span>
										<span class="landingDesc item2">Real Time Transaction Balance & History</span>
									</div>

									<div class="col-12 leaveNumber">
										Sign Up Now to get FREE for First Three Month!
										<div class="validDate">*Valid Until 15 Feb 2020</div>
									</div>

									<div class="col-12">
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

	$(document).ready(function() {

		$('#phoneNumber').on('input', function (event) { 
			this.value = this.value.replace(/[^0-9]/g, '');
		});

		$('#sendPhoneNumber').click(function(){
			var phoneNumber = $('#phoneNumber').val();
			var countryNumber = $('#countryCode').val();
			utmTracking('',countryNumber+phoneNumber,'','LandingPage Get Started button ('+countryNumber+phoneNumber+')');
			$.redirect("newsignup.php", {
				countryNumber : countryNumber,
				phoneNumber : phoneNumber
			});

		});

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
