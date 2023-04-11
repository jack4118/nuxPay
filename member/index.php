<?php include 'include/config.php'; ?>
<?php include 'headHomepage.php'; ?>

<?php
if((isset($_POST['access_token']) && $_POST['access_token'] != "")) {
		$_SESSION["access_token"] = $_POST['access_token'];
		$_SESSION["business"]["uuid"] = $_POST['businessID'];
}
?>

<body class="">
	<div class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed kt-page--loading">

		<?php include 'headerHomapage.php'; ?>

		<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
				<section class="newNuxPaySection001BG">
					<div class="newNuxPaySection001BG-container">
						<div class="newNuxPaySection001BG-smallSection newNuxPaySection001BG-mobileSection">
							<span class="landing_phone">+6010 700 3400</span>
						</div>
						<div class="newNuxPaySection001BG-smallSection">
							<span class="landing_title">
							<?php echo $translations["M02174"][$language]; /* Payment Solutions for All Industries */ ?>
								<!-- <?php echo $translations["M02019"][$language]; /* Accepting */ ?></span> &nbsp;<span class="landing_title newNuxPaySection001BG-title"><?php echo $translations["M02020"][$language]; /* Credit Card, DuitNow, BTC and USDT */ ?> -->
							</span> 
						</div>
						<div class="newNuxPaySection001BG-smallSection">
							<p class="landing_text newNuxPaySection001BG-text">
							<?php echo $translations['M02132'][$language] /* Accept crypto payments in your business with the lowest fee in the market. Buy, sell & swap cypto via NuxPay up to 20 cryptocurrencies */ ?>
								<!-- <?php echo $translations["M01982"][$language]; /* Buy Bitcoin and other cryptocurrencies using a wide range of payment options, including credit or debit card, and swap. Our trusted partners give you a secure and seamless crypto-buying experience. */ ?> -->
							</p>
						</div>
						<div class="newNuxPaySection001BG-smallSection newNuxPaySection001BG-mobileSection d-flex">
							<div class="newNuxPaySection001BG-icondiv" >
								<img alt="NuxPay-payment" src="images/landing/sec01/visa.png" class="newNuxPaySection001BG-icon" >
							</div>
							<div class="newNuxPaySection001BG-icondiv" >
								<img alt="NuxPay-payment" src="images/landing/sec01/master.png" class="newNuxPaySection001BG-icon" >
							</div>
							<div class="newNuxPaySection001BG-icondiv" >
								<img alt="NuxPay-payment" src="images/landing/sec01/duit.png" class="newNuxPaySection001BG-icon2">
							</div>
							<div class="newNuxPaySection001BG-icondiv" >
								<img alt="NuxPay-payment" src="images/landing/sec01/btc.png" class="newNuxPaySection001BG-icon" >
							</div>
							<div class="newNuxPaySection001BG-icondiv" >
								<img alt="NuxPay-payment" src="images/landing/sec01/usdt.png" class="newNuxPaySection001BG-icon" >
							</div>
						</div>
						<div class="newNuxPaySection001BG-smallSection">
							<button type="button" onclick="<?php if($_SESSION['access_token'] != '') { ?> window.location.href='dashboard.php' <?php } else { ?> window.location.href='newsignup.php' <?php } ?>" class="newNuxPaySection001BG-button startNowBtn">
							<?php echo $translations['M02133'][$language] /* Start Now */ ?>
							</button>
						</div>
					</div>
				</section>

				<section class="newNuxPaySection006BG">
					<div class="row d-flex justify-center align-center">
						<div class="col-md-4 d-flex flex-column">
							<span class="newNuxPaySection006BG-smallTitle">
							<?php echo $translations['M02134'][$language] /* Increase conversion rate by */ ?>
							</span>
							<span class="newNuxPaySection006BG-textContainer">
								300%
							</span>
						</div>
						<div class="col-md-4 d-flex flex-column">
							<span class="newNuxPaySection006BG-smallTitle">
							<?php echo $translations['M02135'][$language] /* Accepts major currencies from BTC, ETH */ ?>
							</span>
							<span class="newNuxPaySection006BG-textContainer">
								20+ <?php echo $translations['M02136'][$language] /* Coins */ ?>
							</span>
						</div>
						<div class="col-md-4 d-flex flex-column">
							<span class="newNuxPaySection006BG-smallTitle">
							<?php echo $translations['M02137'][$language] /* Minimal transaction fees only at */ ?>
							</span>
							<span class="newNuxPaySection006BG-textContainer">
								0.5%
							</span>
						</div>
					</div>
				</section>

				<!-- <section class="newNuxPaySection002BG">
					<div id="cryptoPricingTable"></div>
				</section> -->

				<section class="newNuxPaySection004BG">
					<div class="newNuxPaySection004BG-container">
						<!-- <div class="newNuxPaySection004BG-smallTitle">
							<?php echo $translations["M01501"][$language]; /*  Global Scale */ ?>
						</div> -->
						<div class="newNuxPaySection004BG-title landing_title">
							<?php echo $translations["M02111"][$language]; /*  The Backbone For Every Business */ ?>
						</div>
						<div class="newNuxPaySection004BG-textContainer landing_text">
							<?php echo $translations["M01503"][$language]; /*  Offer your customer and start using NuxPay as a payment option! It helps your business to stand out against competitors with our service. */ ?>
						</div>
						<div class="row justify-content-center" style="width:110%;text-align: center">
							<div class="col-md-3">
							<img alt="NuxPay-payment" src="images/batch-transfer.png" class="newNuxPaySection001BG-icon resDiv" >
								<p class="newNuxPaySection004BG-divTitle"><?php echo $translations['M02138'][$language] /* Batch Transfer */ ?></p></p>
								<p class="newNuxPaySection004BG-divText"><?php echo $translations['M02139'][$language] /* Release crypto to multiple addresses all at once up to 80 crypto addresses */ ?></p>
							</div>
							<div class="col-md-3">
							<img alt="NuxPay-payment" src="images/reduce-payment-cancellation.png" class="newNuxPaySection001BG-icon resDiv" >
								<p class="newNuxPaySection004BG-divTitle"><?php echo $translations['M02140'][$language] /* Reduce Payment Cancellation */ ?></p>
								<p class="newNuxPaySection004BG-divText">
								<?php echo $translations['M02141'][$language] /* Minmise payment cancelling in the midst of making payment due to unsuported currencies */ ?>
									<!-- <?php echo $translations["M01505"][$language]; /*  Countries availability from all around the world */ ?> -->
								</p>
							</div>
							<div class="col-md-3">
							<img alt="NuxPay-payment" src="images/0-Charge-back.png" class="newNuxPaySection001BG-icon resDiv" >
								<p class="newNuxPaySection004BG-divTitle">0% <?php echo $translations['M02142'][$language] /* Charge back */ ?></p>
								<p class="newNuxPaySection004BG-divText">
								<?php echo $translations['M02143'][$language] /* Prevent fraudulent or misuse of credit card payments via irreversible transactions on Blockchain */ ?>
									<!-- <?php echo $translations["M01506"][$language]; /*  Cryptocurrencies supported */ ?> -->
								</p>
							</div>
							<div class="col-md-3">
							<img alt="NuxPay-payment" src="images/privacy.png" class="newNuxPaySection001BG-icon resDiv" >
								<p class="newNuxPaySection004BG-divTitle"><?php echo $translations['M02144'][$language] /* Privacy */ ?></p>
								<p class="newNuxPaySection004BG-divText">
								<?php echo $translations['M02145'][$language] /* No identity verification needed. Start accepting crypto payments as soon as API integration completed */ ?>
									<!-- <?php echo $translations["M02112"][$language]; /*  Users have bought using NuxPay */ ?> -->
								</p>
							</div>
						</div>
					</div>
				</section>
				<section class="newNuxPaySection007BG">
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6 pb-3">
								    <div class="newNuxPaySection004BG-divTitle newNuxPaySection007BG-text" >20M+ <br> <div class="newNuxPaySection007BG-text2"><?php echo $translations['M02153'][$language] /* Transactions */ ?></div></div>
									<p class="newNuxPaySection004BG-divText " style="margin: auto; padding-bottom: 10px;">
									<?php echo $translations['M02146'][$language] /* Transactions completely processed */ ?>
								<!-- <?php echo $translations["M01505"][$language]; /*  Countries availability from all around the world */ ?> -->
								</p>	
								</div>
								<div class="col-md-6">
								    <!-- <p class="newNuxPaySection004BG-divTitle" style="text-align:unset;margin-left: 15%;">20M+</p> -->
								</div>
								<!-- <div calss="col-md-12">
								
								</div> -->
								<div class="col-md-6 offset-md-6 pb-3">
								<div class="newNuxPaySection004BG-divTitle newNuxPaySection007BG-text"  >150+ <br> <div class="newNuxPaySection007BG-text2"><?php echo $translations['M02154'][$language] /* Countries */ ?></div></div>
								<p class="newNuxPaySection004BG-divText" style="margin: auto; padding-bottom: 10px;">
								<?php echo $translations['M02147'][$language] /* countries availability around the world */ ?>
								<!-- <?php echo $translations["M01505"][$language]; /*  Countries availability from all around the world */ ?> -->
								</p>	
							</div>
								<div class="col-md-6 pb-3">
								<div class="newNuxPaySection004BG-divTitle newNuxPaySection007BG-text" >20+ <br> <div class="newNuxPaySection007BG-text2"><?php echo $translations['M02155'][$language] /* Currencies */ ?></div></div>
								<p class="newNuxPaySection004BG-divText" style="margin: auto; padding-bottom: 10px;">
								<?php echo $translations["M01506"][$language]; /*  Cryptocurrencies supported */ ?>
								</p>
								</div>
								<div class="col-md-6">
								<!-- <p class="newNuxPaySection004BG-divTitle" >20+</p>
								<?php echo $translations["M01506"][$language]; /*  Cryptocurrencies supported */ ?> -->
								</div>
								<div class="col-md-6 offset-md-6">
								<div class="newNuxPaySection004BG-divTitle newNuxPaySection007BG-text" >80%  <br> <div class="newNuxPaySection007BG-text2"><?php echo $translations['M02156'][$language] /* Paid via Nuxpay */?></div></div>
								<p class="newNuxPaySection004BG-divText" style="margin: auto;">
								<?php echo $translations["M02112"][$language]; /*  Users have bought using NuxPay */ ?>
								</p>

								</div>
							</div>
						</div>
						<div class="col-md-6">


					</div>
				</section>
				<section class="newNuxPaySection008BG">
					<div class="newNuxPaySection008BG-title landing_title" style="margin-left:30px">
					<?php echo $translations['M02148'][$language] /* How It Works */ ?>
					</div>
					<div class="row">
						<div class="col-md-5 ">
							<img class="newNuxPaySection008BG-img" src="images/qr code.png" alt="QR Code">
						</div>
						<div class="col-md-7" style="margin:auto;">
							<div class="row justify-content-center">
								<div class="col-md-2 col-3 newNuxPaySection008BG-text">01. </div>
								<div class="col-md-9 col-8 newNuxPaySection008BG-divText"><?php echo $translations['M02149'][$language] /* User scans QR or copy address at NuxPay gateway page to make payment. */ ?></div>
							</div>
							<div class="row mt-5 justify-content-center">
								<div class="col-md-2 col-3 newNuxPaySection008BG-text">02. </div>
								<div class="col-md-9 col-8 newNuxPaySection008BG-divText"><?php echo $translations['M02150'][$language] /* User able to select accepting crypto or other currencies for payment. */ ?></div>
							</div>
							<div class="row mt-5 justify-content-center">
								<div class="col-md-2 col-3 newNuxPaySection008BG-text">03. </div>
								<div class="col-md-9  col-8 newNuxPaySection008BG-divText"><?php echo $translations['M02151'][$language] /* Secured and encrypted gateway for payments. NuxPay verifies the amount paid and release to receiver. Accepting Credit & Debit Cards, Duitnow and more! */ ?></div>
							</div>
							<div class="row mt-5 justify-content-center">
								<div class="col-md-2 col-3 newNuxPaySection008BG-text" >04. </div>
								<div class="col-md-9 col-8 newNuxPaySection008BG-divText"><?php echo $translations['M02175'][$language] /* Receive payment released from NuxPay problem-free! */ ?></div>
							</div>
						</div>

					</div>
				</section>

				<section class="newNuxPaySection005BG" id="newNuxPaySection005BG">
					<div class="newNuxPaySection005BG-container">
						<p class="newNuxPaySection005BG-title landing_title">
							<?php echo $translations["M02113"][$language]; /*  Drop Us A Message */ ?>
						</p>
						<p class="newNuxPaySection005BG-text landing_text">
							<?php echo $translations["M02114"][$language]; /*  If you need our help, have questions about how to use the platform or are experiencing technical difficulties, please do not hesitate to contact us */ ?>
						</p>
						<div class="newNuxPaySection005BG-form">
							<div class="newNuxPaySection005BG-field">
								<label for="Name" class="landing_text"><?php echo $translations["M02115"][$language]; /*  Full Name */ ?>*</label>
								<input placeholder="<?php echo $translations["M01511"][$language]; /* Your Name */ ?>*" type="text" class="form-control newNuxPaySection005BG-input" id="name" name="Name" autocomplete="off">
							</div>
							<div class="newNuxPaySection005BG-field">
								<label for="Email" class="landing_text"><?php echo $translations["M00388"][$language]; /*  Email Address */ ?>*</label>
								<input placeholder="<?php echo $translations["M01512"][$language]; /* Your Email Address */ ?>*" type="text" class="form-control newNuxPaySection005BG-input" id="email" name="Email" autocomplete="off">
							</div>
							<div class="newNuxPaySection005BG-field">
								<label for="Mobile" class="landing_text"><?php echo $translations["M00390"][$language]; /* Mobile Number */ ?></label>
								<input placeholder="<?php echo $translations["M01513"][$language]; /* Your Mobile Number */ ?>" type="text" class="form-control newNuxPaySection005BG-input" id="mobileNo" name="Mobile" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
							</div>
							<div class="newNuxPaySection005BG-largeField">
								<label for="Message" class="landing_text"><?php echo $translations["M02116"][$language]; /* Your Message */ ?>*</label>
								<textarea placeholder="<?php echo $translations["M01514"][$language]; /* Message */ ?>*" id="message" class="newNuxPaySection005BG-input form-control" rows="5" name="<?php echo $translations["M01514"][$language]; /* Message */ ?>"></textarea>
							</div>
							<div class="newNuxPaySection005BG-largeField">
								<button type="button" id="sendContactUs" class="newNuxPaySection005BG-button homeSubmitBtn"><?php echo $translations["M01419"][$language]; /* Submit */ ?></button>
							</div>
						</div>
						<div class="newNuxPaySection005BG-bottomDiv">
							<div class="newNuxPaySection005BG-bottomContainer">
								<img class="newNuxPaySection005BG-icon" src="images/landing/email-icon.png" alt="NuxPay-contactUsIcon">
								<div class="newNuxPaySection005BG-bottomTextContainer">
									<p class="newNuxPaySection005BG-smallTitle">
										<?php echo $translations["M02117"][$language]; /*  Email Us */ ?>
									</p>
									<p class="newNuxPaySection005BG-contactText landing_text">
										<?php echo $translations["M02120"][$language]; /*  Email us for generate queries, including marketing and partnership */ ?>.
									</p>
									<p class="newNuxPaySection005BG-contactDetails">
										<a id="supportEmail" href="mailto:support@nuxpay.io" >support@nuxpay.io</a>
									</p>
								</div>
							</div>
							<div class="newNuxPaySection005BG-bottomContainer">
								<img class="newNuxPaySection005BG-icon" src="images/landing/call-icon.png" alt="NuxPay-contactUsIcon">
								<div class="newNuxPaySection005BG-bottomTextContainer">
									<p class="newNuxPaySection005BG-smallTitle">
										<?php echo $translations["M02118"][$language]; /*  Call Us */ ?>
									</p>
									<p class="newNuxPaySection005BG-contactText landing_text">
										<?php echo $translations["M02121"][$language]; /*  Call us to speak to a member from our team. We are always happy to help */ ?>.
									</p>
									<p class="newNuxPaySection005BG-contactDetails">
										<a id="mobileNumberA" href="tel:+6010-700 3400">+1 760 335 6216 (<?php echo $translations["M01946"][$language]; /*  General */ ?>)</a> <br>
										<a id="mobileNumberA" href="tel:+6010-700 3400">+6010 700 3400 (<?php echo $translations["M02173"][$language]; /*  Asia Pacific */ ?>)</a>
									</p>
								</div>
							</div>
							<!-- <div class="newNuxPaySection005BG-bottomContainer">
								<img class="newNuxPaySection005BG-icon" src="images/landing/find-icon.png" alt="NuxPay-contactUsIcon">
								<div class="newNuxPaySection005BG-bottomTextContainer">
									<p class="newNuxPaySection005BG-smallTitle">
										<?php echo $translations["M02119"][$language]; /*  Find Us */ ?>
									</p>
									<p class="newNuxPaySection005BG-contactText landing_text">
										<?php echo $translations["M02122"][$language]; /*  Visit us at this address. We are open every working day */ ?>.
									</p>
									<p class="newNuxPaySection005BG-contactDetails" id="companyLocation">
										2051 Junction Ave STE 212, San Jose, CA 95131, USA
									</p>
								</div>
							</div> -->
						</div>
					</div>
				</section>

			</div>
		</div>
	</div>
</div>
</div>
</div>
</body>

<link href="<?php echo $config['domain']?>/css/landingPage.css?ts=<?php echo filemtime('css/landingPage.css'); ?>" rel="stylesheet" type="text/css" />

</html>
<?php include 'footerHomepage.php'; ?>
<?php include 'sharejsHomepage.php'; ?>

<script defer>
	AOS.init({
		once: true
	});
</script>

<script defer>
	window.ajaxEnabled = true;

	var url             = 'scripts/reqHomepage.php';
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 1;
	var pageNumber      = 1;
	var formData        = "";
	var fCallback       = "";
	var countryCode 	= "<?php echo $countryCode; ?>";
	var checkUser;
	var defaultCountryCode = "";
	var senderType = 'mobile';
	var common_symbol	= "";
	var event_name		= "";
	var ethGraphData = [];
	var btcGraphData = [];
	var maxLength = 17;
	var original = 17;
	var tableId = 'cryptoPricingTableId';
	var divId = 'cryptoPricingTable';
	var thArray = Array(
		'#',
		'<?php echo $translations["M00387"][$language]; /* Name */ ?>',
		'<?php echo $translations["M01004"][$language]; /* Price */ ?>',
		'<?php echo $translations["M02125"][$language]; /* Change */ ?>',
		'<?php echo $translations["M02127"][$language]; /* Trade */ ?>'
	);
	var btnArray = Array();
	var message;
	var tableNo;
	var isLoggedIn = '<?php echo $_SESSION['access_token']; ?>' != '';

	if (!countryCode) {
		countryCode = "US";
	}

	$('#navLargeLogo').attr("src", "<?php echo $sys['loginLogo']; ?>");
    $('#navSmallLogo').attr("src", "<?php echo $sys['loginLogo']; ?>");

	$(document).ready(function() {
		utmTracking('','','','Homepage');
		tracking();
		
		formData = {
			command : 'getCryptoPricing'
		};
		fCallback = loadDefaultListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


		$('.headerLink').click(function(){
			utmTracking('','','','Home headerLink ('+$(this).attr('data-name')+')');
		});

		$('.footerLink').click(function(){
			utmTracking('','','','Home footerLink ('+$(this).attr('data-name')+')');
		});

		$('#sendContactUs').click(function(){
			$('.error-danger').remove();

			if( $('input#name').val() == ''){
				$('input#name').after('<span class="error-danger"><?php echo $translations["M01258"][$language]; /* Please enter your name. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#name").offset().top-120
				}, 500);
				$('input#name').focus();
			}else if( $('input#email').val() == ''){
				$('input#email').after('<span class="error-danger"><?php echo $translations["M01259"][$language]; /* Please enter your email. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#email").offset().top-120
				}, 500);
				$('input#email').focus();
			}else if(!validateEmail($("#email").val())){
				$('input#email').after('<span class="error-danger"><?php echo $translations["M01260"][$language]; /* Your email address is invalid. Please enter a valid email address. */ ?></span>');
				$('input#email').focus();
			}else if(!$('textarea#message').val()){
				$('textarea#message').after('<span class="error-danger"><?php echo $translations["M01265"][$language]; /* Please enter your message. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#message").offset().top-120
				}, 500);
				$('textarea#message').focus();
			}else{
				var name = sanitize($("#name").val());
				var email = sanitize($("#email").val());
				var country = "MY";//$("#country").val();
				var mobileNo = sanitize($("#mobileNo").val());
				var companyName = "";//$("#companyName").val();
				var message = sanitize($("#message").val());
				var keyword = window.location.search;

				formData        = {
					command : 'contactUs',
					name : name,
					email : email,
					country : country,
					mobileNo : mobileNo,
					companyName : companyName,
					subject : 'Nuxpay Homepage Contact Us',
					message : message,
					keyword : keyword
				};
				fCallback = sendContactSuccess;
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
				// Example success message : {"status":"ok","code":"1","statusMsg":"Thank you for contacting us, our support will reply to you within 1 working day","data":""}

			}
			
		});

		$('#companyLocation').click(function() {
			window.open('https://www.google.com/maps/place/2051+Junction+Ave+STE+212,+San+Jose,+CA+95131,+USA', '_blank');
		});

        if (typeof(window.location.hash) !== 'undefined' && window.location.hash.length > 0) {
            $('html,body').animate({
                scrollTop: $(window.location.hash).offset().top + 300
            }, 800);
        }

	});

function loadDefaultListing(data,message){
	var crypto = data.data.crypto;
	var cryptoImage = data.data.image;
	var count = 0;

	buildTable(crypto, tableId, divId, thArray, btnArray, message, tableNo);

	// Modify table
	$('#'+tableId).find('tr').each(function(i, tag) {
		if (i != 0) {
			$(this).find('td').each(function(j, childTag) {
				if (j == 1) {
					var cryptoName = $(this).text();
					var cryptoSpecificImage = '';

					if (cryptoName == 'Polkadot (DOT)') {
						cryptoSpecificImage = 'images/polkadot.gif';
					}
					else if (cryptoName == 'Uniswap (UNI)') {
						cryptoSpecificImage = 'images/uniswap.gif';
					} 
					else {
						cryptoSpecificImage = cryptoImage[count];
					}
					$(this).empty();

					var child = '<div>';
					child += '<img alt="NuxPay-crypto" src="'+ cryptoSpecificImage +'" class="newNuxPaySection002BG-icon" >';
					child += '<span class="newNuxPaySection002BG-iconText">';
					child += cryptoName;
					child += '</span>';
					child += '</div>';
					$(this).append(child);

					count++;
				}
				if (j == 4) {
					var cryptoUnit = $(this).text();
					var child = '';
					if (cryptoUnit == 'btc' || cryptoUnit == 'eth' || cryptoUnit == 'usdt' || cryptoUnit == 'fil' || cryptoUnit == 'ltc') {
						child = '<button class="newNuxPaySection002BG-button" onclick="navigateBuyCrypto()">'+ '<?php echo $translations["M01883"][$language]; /* Buy */ ?>' +'</button>';
					}
					$(this).empty();
					$(this).append(child);
				}
				if (j == 3) {
					var isNegative = ($(this).text().substr(0, 1)) == '-';
					var oriText = $(this).text();
					if (isNegative) {
						$(this).addClass('red-text');
					} else {
						$(this).text('+'+oriText);
						$(this).addClass('blue-text');
					}
				}
				if (j == 2) {
					var oriText = '$'+$(this).text();
					$(this).text(oriText);
				}

				// modify class
				if (j == 0 || j == 3 || j == 4) {
					$(this).addClass('text-center');
				}
				if (j == 2) {
					$(this).addClass('text-right');
				}
			});
		} else {
			$(this).find('th').each(function(k, hTag) {
				if (k == 0 || k == 3 || k == 4) {
					$(this).addClass('text-center');
				}
				if (k == 2) {
					$(this).addClass('text-right');
				}
			});
		}
	});

}

function navigateBuyCrypto() {
	if (isLoggedIn) {
		window.location.href = window.location.origin+'/buyCrypto.php';
	} else {
		window.location.href = window.location.origin+'/login.php';
	}
}

function sendContactSuccess(data, message) {
	showMessage(data.statusMsg, 'success', '<?php echo $translations["M01173"][$language]; /* Success */ ?>', "check-circle-o", 'homepage.php');
}

function validateEmail(sEmail) {
	var sEmail = sEmail.trim();
	var filter = /^([\w-\.]+)@/;
	if (filter.test(sEmail)) {
		return true;
	}
	else {
		return false;
	}
}

$('meta[name="viewport"]').prop('content', 'width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no');

if ($(window).width()<320) {
	$('meta[name="viewport"]').prop('content', 'width=320');
}

$( window ).resize(function() {
    if ($(window).width()<320) {
		$('meta[name="viewport"]').prop('content', 'width=320');
	}
});

</script>
