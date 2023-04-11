<?php include('floatedWhatsapp.php'); ?>

<div class="footerBG">
	<div class="kt-container" style="<?php echo $sys['isWhitelabel'] ? 'display:none' : 'display:block' ?>">
		<div class="col-12">
			<div class="row">
				<div class="col-xl-1 col-12"></div>
				<div class="col-12" style="margin-top: 30px;">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-xs-3 col-12 mb-3 footerTextAlignLogo">
							<a class="kt-header__brand-logo headerLink" href="homepage.php" data-name="Homepage">
								<img alt="NuxPay-Logo" src="./images/nuxpayLogo4.png" class="footerLogoSize" style="margin: 0">
							</a>
							<div class="col-12 p-0 m-0">
								<div class="mt-2">
									<img alt="NuxPay-contact" onclick="window.location.href = 'https://www.facebook.com/NuxPay';" src="images/landing/facebook.png" class="footerIconSize">
									<a href="https://wa.me/60107003400?text=Hi%2C%20I%20would%20like%20to%20ask%20more%20about%3A%0A%0A1.%20Payment%20gateway%20service%0A2.%20Buy%20%26%20Sell%20Crypto%0A3.%20Register%20as%20Merchant%0A4.%20Become%20a%20Reseller%0A5.%20Others%0A%0AYour%20choice%3A%20" target="_blank"><img src="images/landing/whatsapp.png" class="footerIconSize" alt="NuxPay-contact"></a>
									<!-- <img alt="NuxPay-contact" onclick="window.location.href = 'https://wa.me/60107003400?text=Hi,%20I%20would%20like%20to%20ask%20more%20about:%0a1.%20Payment%20gateway%20service%0a2.%20Buy%20%26%20Sell%20Crypto%0a3.%20Register%20as%20Merchant%0a4.%20Others%0a%0aYour%20choice:%20';" src="images/landing/whatsapp.png" class="footerIconSize"> -->
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-3 col-xs-6 col-12 px-5" style="<?php echo $sys['isWhitelabel'] ? 'display:none' : 'display:block' ?>">
							<p class="footer-text" style="font-weight: 400; font-size: 15px;"><?php echo $translations["M01516"][$language]; /* Address */ ?></p>
							<p class="footer-text" style="font-weight: 500; font-size: 12px; color: #818181; margin-bottom: 0.5rem; ">AZTECH INC.</p>
							<p class="footer-text" style="font-size: 12px; color: #818181;">2051 Junction Ave STE 212, San Jose, CA 95131, USA</p>
						</div>

						<div class="col-lg-3 col-md-3 col-xs-6 col-12 px-5" style="<?php echo $sys['isWhitelabel'] ? 'display:none' : 'display:block' ?>">
							<p class="footer-text" style="font-weight: 400; font-size: 15px;"><?php echo $translations["M01517"][$language]; /* Email */ ?></p>
							<p class="footer-text" style="font-size: 12px; color: #818181;">support@nuxpay.io</p>

							<p class="footer-text" style="font-weight: 400; font-size: 15px; margin-top: 25px;"><?php echo $translations["M00008"][$language]; /* Contact Us */ ?></p>
							<p class="footer-text" style="font-size: 12px; color: #818181;">
								+1 760 335 6216 (<?php echo $translations["M01946"][$language]; /*  General */ ?>) <br>
								+6010 700 3400 (<?php echo $translations['M02173'][$language] /* Asia Pacific */ ?>)
							</p>
						</div>

						<div class="col-lg-3 col-md-3 col-xs-6 col-12 px-5" style="<?php echo $sys['isWhitelabel'] ? 'display:none' : 'display:block' ?>">
							<p class="footer-text" style="font-weight: 400; font-size: 15px;"><?php echo $translations["M01984"][$language]; /*  We Accept */ ?></p>
							<div class="mt-2 footer-icons">
								<img alt="NuxPay-payment" src="images/nuxPay/visamastercardpic.png" height="30px">
								<img alt="NuxPay-payment" src="images/nuxPay/xanpool.jpg" height="30px">
								<img alt="NuxPay-payment" src="images/nuxPay/simplex.jpg" height="30px">
								<img alt="NuxPay-payment" src="images/nuxPay/duitnow.jpg" height="30px">
							</div>
						</div>

						
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- <div class="col-12 px-0" style="<?php echo $sys['isWhitelabel'] ? 'display:none' : 'display:block' ?>">
		<hr class="footerHR">
	</div> -->

	<div class="kt-container mt-3">
		<div class="col-12">
			<div class="row">
				<div class="col-12 text-center footerCopyRight" style="margin-bottom: 10px; font-weight: 400; color: #000000;">
					<?php echo $translations["M01943"][$language]; /* Copyright */ ?> © <?php echo date("Y");?> <?php echo $sys['companyName']?>.io. <?php echo $translations["M00299"][$language]; /* All Rights Reserved */ ?> 	<?php if($sys['isWhitelabel'] != 1){ $terms_conditions = '<a style="font-weight: 400;" href= "'.$sys['domain'].'/tnc">%%Terms & Conditions%%</a> | <a style="font-weight: 400;" href="'.$sys['domain'].'/privacypolicy">%%Privacy Policy</a>'; 
					$terms_conditions1 = str_replace('%%Terms & Conditions%%', $translations["M01547"][$language], $terms_conditions);
					$privacy_policy = str_replace('%%Privacy Policy', $translations["M01558"][$language], $terms_conditions1);
					echo $privacy_policy;}?>
				</div>
			</div>
		</div>
	</div>
</div>

