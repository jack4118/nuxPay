<?php 
    session_start();
    include 'include/config.php';
    include 'headHomepage.php';
?>

<body>
    <div class="affiliatePage">
        <div class="affiliatePageBg"></div>
        <?php include 'headerAffiliate.php'; ?>
        <div class="affiliateContainer">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="affiliateTextSection">
                        <div class="affiliateTitle"><?php echo $translations["M02159"][$language] /* Receive Payment Easier */ ?></div>
                        <div class="affiliateDescription"><?php echo $translations['M02160'][$language] /* NuxPay is your preferred payment option with secured and encrypted transactions */ ?></div>
                        <div class="affiliateContent">
                            <div class="affiliateDetails">
                                <div class="affiliateDetailsTitle">300%</div>
                                <div class="affiliateDetailsDescription"><?php echo $translations['M02161'][$language] /* Increase Conversions by */ ?></div>
                            </div>
                            <div class="affiliateDetails">
                                <div class="affiliateDetailsTitle">20+ Types</div>
                                <div class="affiliateDetailsDescription"><?php echo $translations['M02162'][$language] /* Currencies Accepted Worldwide */ ?></div>
                            </div>
                            <div class="affiliateDetails">
                                <div class="affiliateDetailsTitle">0.5%</div>
                                <div class="affiliateDetailsDescription"><?php echo $translations['M02163'][$language] /* Minimal Transaction Fee */ ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="affiliateFormSection">
                        <div class="affiliateFormHeader"></div>
                        <div class="affiliateFormBody">
                            <div class="affiliateFormBodyTitle"><?php echo $translations['M02165'][$language] /* Contact Us */ ?></div>
                            <div class="affiliateFormInputGroup">
                                <label for="name"><?php echo $translations['M02166'][$language] /* Full Name */ ?>*</label>
                                <input type="text" id="name" name="name" placeholder="Anson Lim">
                            </div>
                            <div class="affiliateFormInputGroup">
                                <label for="name"><?php echo $translations['M02167'][$language] /* Phone Number */ ?>*</label>
                                <input type="text" id="phoneNo" name="phoneNo" placeholder="+60123456789" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                            <div class="affiliateFormBtnGroup">
                                <button type="submit" class="submitBtn" id="submitBtn"><?php echo $translations['M02168'][$language] /* Submit */ ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footerAffiliate.php') ?>
    </div>
</body>

<link href="<?php echo $config['domain']?>/css/landingPage.css?ts=<?php echo filemtime('css/landingPage.css'); ?>" rel="stylesheet" type="text/css" />

</html>

<?php include 'sharejsHomepage.php'; ?>

<script defer>
	AOS.init({
		once: true
	});
</script>

<script defer>
	window.ajaxEnabled = true;

	var url             = 'scripts/reqLanding.php';
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 1;
	var formData        = "";
	var fCallback       = "";
    
    $(document).ready(function() {
        if(window.innerWidth < 768) {
            $('.affiliateMobileView').css('display', 'flex');
            $('.affiliateWebView').css('display', 'none');
        } else {
            $('.affiliateWebView').css('display', 'flex');
            $('.affiliateMobileView').css('display', 'none');
        }
    });

	$('#submitBtn').click(function(){
		$('.error-danger').remove();

		if($('input#name').val() == ''){
			$('input#name').after('<span class="error-danger"><?php echo $translations["M01258"][$language]; /* Please enter your name. */ ?></span>');
			$('html, body').animate({
				scrollTop: $("#name").offset().top-120
			}, 500);
			$('input#name').focus();
		} else if($('input#phoneNo').val() == '') {
			$('input#phoneNo').after('<span class="error-danger"><?php echo $translations["M02170"][$language]; /* Please enter your phone number. */ ?></span>');
			$('html, body').animate({
				scrollTop: $("#phoneNo").offset().top-120
			}, 500);
			$('input#phoneNo').focus();
		} else{
			var name = sanitize($("#name").val());
			var phoneNo = sanitize($("#phoneNo").val());

            var utm_campaign = 'NuxPay Affiliate';
            setCookie("utm_campaign", utm_campaign, '<?php echo time() + (86400 * 30) ?>', "/");

            var success = utmTracking(name, phoneNo,'','Submit','affiliate');

            if(success) {
                $('input#name').val('');
                $('input#phoneNo').val('');
                showMessage('<?php echo $translations['M02171'][$language] /* Submit Successfully. */ ?>', 'success', '<?php echo $translations["M01173"][$language]; /* Success */ ?>', "check-circle-o", '');
            } else {
                showMessage('<?php echo $translations['M02172'][$language] /* Submit Unsuccessfully. */ ?>', 'error', '<?php echo $translations['M00166'][$language] /* Error */ ?>', "check-circle-o", '');
            }
		}
	});
</script>