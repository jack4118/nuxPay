<?php include('floatedWhatsapp.php'); ?>

<!-- begin::Footer -->
<footer id="footerID" class="m-grid__item m-footer">
	<div class="m-container m-container--fluid m-container--full-height m-page__container">
		<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
			<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
				<span class="m-footer__copyright" style="font-size: 13px;">
					Copyright &copy; <?php echo date("Y"); ?> <?php echo $sys['companyName']?>. All Rights Reserved.
					<!-- Copyright ©<?php echo date("Y"); ?> • NuxPay.com • <?php echo $translations['M00191'][$language]; //All Rights Reserved?>. --><?php if($sys['isWhitelabel'] != 1){ echo '<a href= "'.$sys['domain'].'/tnc">Terms & Conditions</a> | <a href="'.$sys['domain'].'/privacypolicy">Privacy Policy</a>';}?>
				</span>
			</div>
		</div>
	</div>
</footer>
<!-- end::Footer -->