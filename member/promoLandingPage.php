<?php include 'include/config.php'; ?>
<?php include 'headHomepage.php'; ?>

<body>

		

		<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body"  style="height: 100%;">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

				<section class="landingPageSection01">
					<div class="kt-container">
						<div class="row">
							<div class="col-12 text-center">
								<a class="kt-header__brand-logo headerLink" href="homepage.php?landingpage" data-name="Homepage">
				                    <img alt="Logo" src="<?php echo $sys['newHomepageLogoWhite2'] ?>" class="landingLogo">
				                </a>
							</div>
							<div class="col-12 text-center landingTitleImgPosition">
								<img src="images/landing/firework1.png" class="firework1">
								<img src="images/landing/firework1.png" class="firework2">
								<img src="images/landing/landingTitle.png" class="landingTitleImg">
							</div>
							
							
						</div>
					</div>
				</section>

				<section class="landingPageSection02">
					<div class="kt-container">
						<div class="row">
							<div class="col-12">
								<div class="row justify-content-center">
									<div class="col-12 landingTitle text-center">
										<img src="images/landing/firework2.png" class="firework3">
										<img src="images/landing/firework2.png" class="firework4">
										Enjoy FREE transaction fee for the first 3 MONTHS!
									</div>
									<div class="col-xl-7 col-lg-8 col-md-9 col-12  text-center" style="margin-top: 20px;">
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
												<button id="sendPhoneNumber" type="button" class="btn primaryBtn">Get Started</button>
											</div>
										</div>
									</div>

									<div class="col-12 text-center landingPageOffer">
										*Time Limited Offer
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
