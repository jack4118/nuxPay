<div class="footerBG">
	<div class="kt-container" style="<?php echo $sys['isWhitelabel'] ? 'display:none' : 'display:block' ?>">
		<div class="col-12">
		<div class="row">
			<div class="col-xl-1 col-12"></div>
			<div class="col-12" style="margin-top: 30px;">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-xs-3 col-12 footerTextAlignLogo text-center">

						<a class="kt-header__brand-logo headerLink" href="homepage.php" data-name="Homepage">
							<img alt="Logo" src="<?php echo $sys['homepageFooterLogo'] ?>" class="footerLogoSize">
						</a>
					</div>
					<div class="col-lg-4 col-md-4 col-xs-6 col-12 footerTextAlignTitle" style="<?php echo $sys['isWhitelabel'] ? 'display:none' : 'display:block' ?>">
						<div class="row">
							<div class="col-12 footerTitle">
								<i class="fa fa-map-marker" aria-hidden="true" style="margin-right: 10px; font-size: 20px"></i>
								<?php echo $translations["M01516"][$language]; /*  Address */ ?>
							</div>
							<div class="col-12 footerAddress" style="margin-top: 10px;">
								<?php echo $sys['companyAddress'];?>
							</div>
							<div class="col-12 footerTitle" style="margin-top: 20px;">
								<i class="fa fa-envelope" aria-hidden="true" style="margin-right: 5px; font-size: 16px"></i>
								<?php echo $translations["M01517"][$language]; /*  Email */ ?>
							</div>
							<div class="col-12 footerAddress" style="margin-top: 10px;">
								support@nuxpay.com
							</div>
						</div>
					</div>

<div class="col-lg-4 col-md-4 col-xs-6 col-12 footerTextAlignTitle" style="<?php echo $sys['isWhitelabel'] ? 'display:none' : 'display:block' ?>">
						<div class="row">
							<div class="col-12 footerTitle">
								<i class="fa fa-phone-square" aria-hidden="true" style="margin-right: 10px; font-size: 20px"></i>
								<?php echo $translations["M01498"][$language]; /*  Contact Us */ ?>
							</div>
							<div class="col-12 footerAddress" style="margin-top: 10px;">
								<a id="mobileNumberA" href="tel:6017-317 7319">+6017-317 7319 (<?php echo $translations["M01946"][$language]; /*  Asia Pacific */ ?> )</a>
							</div>
							<div class="col-12 footerTitle mt-4">
									<div class="row">
										<div class="col-md-6 col-12"> <?php echo $translations["M01518"][$language]; /*  Connect With Us */ ?> 		<div class="mt-2">
												<img onclick="window.location.href = 'https://www.facebook.com/NuxPay';" src="images/footerIcon1.png" class="footerIconSize">
												<img onclick="window.location.href = 'https://www.linkedin.com/company/nuxpay/about';" 	src="images/footerIcon2.png" class="footerIconSize"></div>
											</div>
										<div class="col-md-6 col-12 mt-md-0 mt-4"> <?php echo $translations["M01984"][$language]; /*  We Accept */ ?>  
											<div class="mt-2">
												<img src="images/nuxPay/visamastercardpic.png" height="30px">
												<img src="images/nuxPay/xanpool.jpg" height="30px">
												<img src="images/nuxPay/simplex.jpg" height="30px">
												<img src="images/nuxPay/duitnow.jpg" height="30px">
											</div>
										</div>
										
									</div>
									
                             </div>
<!--
							<div class="col-12" style="margin-top: 10px">
								<div class="row">
									<div class='col-md-6 col-12'>
										
									</div>
									<div class='col-md-6 col-12'>
										
										
									</div>
								</div>
							</div>
-->
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

	<div class="col-12 px-0" style="<?php echo $sys['isWhitelabel'] ? 'display:none' : 'display:block' ?>">
		<hr class="footerHR">
	</div>

	<div class="kt-container">
		<div class="col-12">
		<div class="row">
			<div class="col-12 text-center footerCopyRight" style="margin-bottom: 10px;">
			<?php echo $translations["M01943"][$language]; /* Copyright */ ?> © <?php echo date("Y");?> <?php echo $sys['companyName']?>. <?php echo $translations["M00299"][$language]; /* All Rights Reserved */ ?> 	<?php if($sys['isWhitelabel'] != 1){ $terms_conditions = '<a href= "'.$sys['domain'].'/tnc">%%Terms & Conditions%%</a> | <a href="'.$sys['domain'].'/privacypolicy">%%Privacy Policy</a>'; 
				$terms_conditions1 = str_replace('%%Terms & Conditions%%', $translations["M01547"][$language], $terms_conditions);
				$privacy_policy = str_replace('%%Privacy Policy', $translations["M01558"][$language], $terms_conditions1);
				echo $privacy_policy;}?>
			</div>
		</div>
		</div>
	</div>
</div>

