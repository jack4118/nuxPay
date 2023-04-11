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

				<section class="ftagSection01BG">
					<div class="kt-container">
						<div class="row justify-content-center">
							<div class="col-11">
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-12 d-flex h-100 ftagSection01Div">
										<div class="row  justify-content-center align-self-center">
											<div class="col-12 ftagSection01Title">
												Accept Crypto
											</div>
											<div class="col-12 ftagSection01Title">
												for online payments
											</div>
											<br>
											<div class="col-12 ftagSection01Desc">
												<div class="row">
													<div class="col-12">
														Millions of businesses of all sizes-use FTAG software and APIs to accept payments, send payouts, and manage their businesses online.
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6 col-12" style="margin-top: 50px;">
										<div class="row">
											<div class="col-12 text-center">
												<img src="images/whitelabel/ftag/img.png" class="fTagIMGSize">
											</div>

											<div id="ftagPhoneOption" class="col-12">
												<div class="row">
													<div class="ftagSection01Part01 mt-3" id="country_code">
														<select id="countryCode" class="form-control ftagSection01Dropdown">
															<?php include 'phoneList.php'; ?>
														</select>
													</div>
													<div class="ftagSection01Part02 mt-3">
														<input id="phoneNumber" type="text" class="form-control ftagSection01Input" placeholder="Mobile Number">
													</div>
													<div class="ftagSection01Part03 mt-3">
														<button id="sendPhoneNumber" type="button" class="btn primaryBtn">
															Request Fund
														</button>
													</div>
													<div class="col-12 mt-2 form-group" style="display:flex; text-decoration: underline;">
														<a id="switchEmail" href="#">Switch to Email</a>
													</div>
												</div>
											</div>


											<div id="ftagEmailOption" class="col-12" style="display: none;">
												<div class="row">
													<div class="ftagSection01Part02email mt-3">
														<input id="emailInput" type="text" class="form-control ftagSection01Input" placeholder="Email">
													</div>
													<div class="ftagSection01Part03 mt-3">
														<button id="sendEmail" type="button" class="btn primaryBtn">
															Request Fund
														</button>
													</div>
													<div class="col-12 mt-2 form-group" style="display:flex; text-decoration: underline;">
														<a id="switchMobile" href="#">Switch to Mobile Number</a>
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

				<section class="ftagSection03BG">
					<div class="kt-container">
						<div class="row ftagSection03Div">
							<div class="col-12">
								<span class="whyFtagText">Why FTAG</span>
								<h2 class="mt-3">A blockchain technology-first approach to payments finance</h2>
							</div>
							<div class="col-12 ftagSection3Div">
								<div class="row">

									<div class="col-lg-4 col-md-6 col-12 ftagSection03Totalspacing ftagSection03MobileSpace">

										<img src="images/whitelabel/ftag/ico_world.png" style="height:30px;">
										<div class="ftagSection03Title">
											<h4>World Wide</h4>
										</div>
										<p>Receive funds directly to your bank account with zero price votality or rish</p>


									</div>
									<div class="col-lg-4 col-md-6 col-12 ftagSection03Totalspacing ftagSection03MobileSpace">

										<img src="images/whitelabel/ftag/ico_implement.png" style="height:30px;">
										<div class="ftagSection03Title">
											<h4>Easy Implementation</h4>
										</div>
										<p>Fast setup and get your business ready in matter of minutes by following few easy steps with our easy API Documentation.</p>


									</div>
									<div class="col-lg-4 col-md-6 col-12 ftagSection03Totalspacing ftagSection03MobileSpace">

										<img src="images/whitelabel/ftag/ico_anytime.png" style="height:30px;">
										<div class="ftagSection03Title">
											<h4>Access Anytime, Anywhere</h4>
										</div>
										<p>Mobile Accessible & get instant notification with PPay no matter where you go and what time it is</p>


									</div>
									<div class="col-lg-4 col-md-6 col-12 ftagSection03Totalspacing ftagSection03MobileSpace">

										<img src="images/whitelabel/ftag/ico_fintech.png" style="height:30px;">
										<div class="ftagSection03Title">
											<h4>FinTech Expert</h4>
										</div>
										<p>With more than 10 years’ experience in FinTech, PPay Payment Solution is suitable for all business type.</p>


									</div>
									<div class="col-lg-4 col-md-6 col-12 ftagSection03Totalspacing ftagSection03MobileSpace">

										<img src="images/whitelabel/ftag/ico_business.png" style="height:30px;">
										<div class="ftagSection03Title">
											<h4>Accept All Business Type</h4>
										</div>
										<p>RThere’s no restriction on what type of business it is, grab this opportunity and let others know more about your business.</p>


									</div>
									<div class="col-lg-4 col-md-6 col-12 ftagSection03Totalspacing ftagSection03MobileSpace">

										<img src="images/whitelabel/ftag/ico_statistic.png" style="height:30px;">
										<div class="ftagSection03Title">
											<h4>One Reconciliation</h4>
										</div>
										<p>Receive one report for all your settlements, transactions and markets.s</p>


									</div>

								</div>
							</div>
						</div>
					</div>
				</section>


				<section class="ftagSection04BG">
					<div class="kt-container" style="padding: 30px;">
					
							<div class="col-12">
								<div class="row justify-content-center">
									<div class="col-xl-4 col-lg-6 col-md-6">
										<div class="row">
											<div class="col-12 ftagSection04Title" >
												Global Scale
											</div>
											<div class="col-12 ftagSection04Subtitle" style="margin-top: 40px;">
												The backbone for internet business
											</div>
											<div class="col-12 ftagSection04Desc" style="margin-top: 20px">
												Offer your customers and start using FTAG as a payment option! It helps your business to stand out against competitors with our serivce
											</div>
										</div>
									</div>
									<div class="col-xl-7 col-lg-5 col-md-5">
										<img src="images/whitelabel/ftag/world-bg.png" class="ftagSection04Image">
									</div>
								</div>
							</div>
							<div class="col-12 ftagSection04Div">
								<div class="row justify-content-center">
									<div class="col-lg-3 col-md-6 col-12 ftagSection03Totalspacing ftagSection03MobileSpace">
										<div class="ftagSection04H4Title">
											<h3>20M+</h3>
										</div>
										<p class="ftagSection04Desc">transactions completely processed</p>

									</div>
									<div class="col-lg-3 col-md-6 col-12 ftagSection03Totalspacing ftagSection03MobileSpace">
										<div class="ftagSection04H4Title">
											<h3>150+</h3>
										</div>
										<p class="ftagSection04Desc">countries available from all around the world</p>


									</div>
									<div class="col-lg-3 col-md-6 col-12 ftagSection03Totalspacing ftagSection03MobileSpace">
										<div class="ftagSection04H4Title">
											<h3>20+</h3>
										</div>
										<p class="ftagSection04Desc">currencies and payment methods supported</p>


									</div>
									<div class="col-lg-3 col-md-6 col-12 ftagSection03Totalspacing ftagSection03MobileSpace">
										<div class="ftagSection04H4Title">
											<h3>80%</h3>
										</div>
										<p class="ftagSection04Desc">of users have bought from businesses using FTAG</p>


									</div>

								</div>
							</div>

						</div>

					
				</section>

				<section class="ftagSection05BG">
					<div class="kt-container">
						<div class="row justify-content-center">
							<div class="col-12">
								<div class="row">
									<div class="col-lg-4 col-md-4 col-12">
										<img src="images/whitelabel/ftag/logo.png">
									</div>
									<div class="col-lg-4 col-md-4 col-12 ftagSection05Div">
										<p class="ftagSection05Country">Singapore</p>
										<p class="ftagSection05Address">2A Hoot Kiam Road </p>
										<p class="ftagSection05Address">Singapore 249391</p>

									</div>
									<div class="col-lg-4 col-md-4 col-12">
										<p class="ftagSection05Country">USA</p>
										<p class="ftagSection05Address">Suite 200, 2211 Elliott Avenue, World Trade Center </p>
										<p class="ftagSection05Address">Seattle, WA 98121, USA</p>


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
	</div>
</body>

</html>
<?php include 'footerHomepage.php'; ?>
<?php include 'sharejsHomepage.php'; ?>

<script>
	AOS.init({
		once: true
	});

</script>

<script>
	window.ajaxEnabled = true;

	var url = 'scripts/reqHomepage.php';
	var method = 'POST';
	var debug = 0;
	var bypassBlocking = 0;
	var bypassLoading = 1;
	var pageNumber = 1;
	var formData = "";
	var fCallback = "";
	var countryCode = "<?php echo $countryCode; ?>";
	var checkUser;

	if (!countryCode) {
		countryCode = "US";
	}

	$(document).ready(function() {
		utmTracking('', '', '', 'Homepage');

		formData = {
			command: 'homepageTable'
		};
		fCallback = loadDefaultListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		$('#ftagEmailOption').hide();
		$('#switchMobile').hide();
		$('#sendEmail').hide();
		$('#emailInput').hide();


		$('#switchEmail').click(function() {
			$('#ftagPhoneOption').hide();
			$('#phoneNumber').hide();
			$('#country_code').hide();
			$('#switchEmail').hide();
			$('#sendPhoneNumber').hide();
			$('#sendEmail').show();
			$('#switchMobile').show();
			$('#ftagEmailOption').show();
			$('#emailInput').show();


		});

		$('#switchMobile').click(function() {
			$('#ftagPhoneOption').show();
			$('#phoneNumber').show();
			$('#country_code').show();
			$('#switchEmail').show();
			$('#sendPhoneNumber').show();
			$('#sendEmail').hide();
			$('#switchMobile').hide();
			$('#ftagEmailOption').hide();
			$('#emailInput').hide();

		});

		$('#phoneNumber').on('input', function(event) {
			this.value = this.value.replace(/[^0-9]/g, '');
		});

		$('#phoneNumber').on('keypress', function(e) {
			if (e.which == 13) {
				$('#sendPhoneNumber').click();
			}
		});

		$('#sendPhoneNumber').click(function() {
			var phoneNumber = $('#phoneNumber').val();
			var countryNumber = $('#countryCode').val();

			payee_mobile = countryNumber + phoneNumber;

			var url = 'scripts/reqHomepage.php';

			var formData = {
				command: 'requestfundcheckuserexist',
				payee_mobile: payee_mobile,

			};

			var method = 'POST';
			var debug = 0;
			var bypassBlocking = 0;
			var bypassLoading = 0;

			$.ajax({
					type: method, // define the type of HTTP verb we want to use (POST for our form)
					url: url, // the url where we want to POST
					data: formData, // our data object
					dataType: 'text', // what type of data do we expect back from the server
					encode: true,
				})
				.done(function(data) {

					var obj = JSON.parse(data);

					checkUser = obj.code;

					if (obj.code == 1) {
						var phoneNumber = $('#phoneNumber').val();
						var countryNumber = $('#countryCode').val();
						utmTracking('', countryNumber + phoneNumber, '', 'Home Get Started button');

						$.redirect("requestFund.php", {
							countryNumber: countryNumber,
							phoneNumber: phoneNumber,
							code: checkUser,
						});
					} else {
						var phoneNumber = $('#phoneNumber').val();
						var countryNumber = $('#countryCode').val();
						utmTracking('', countryNumber + phoneNumber, '', 'Home Get Started button');

						$.redirect("requestFund.php", {
							countryNumber: countryNumber,
							phoneNumber: phoneNumber,
						});
					}
				})

		});

		$('#sendEmail').click(function() {
			var payeeEmail = $('#emailInput').val();
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

			if (!emailReg.test(payeeEmail)) {
				var message = "Please enter a valid email.";
				errorOutput(message);
				return false;
			} else {
				var url = 'scripts/reqHomepage.php';

				var formData = {
					command: 'requestfundcheckuserexist',
					payee_email: payeeEmail,

				};

				var method = 'POST';
				var debug = 0;
				var bypassBlocking = 0;
				var bypassLoading = 0;

				$.ajax({
						type: method, // define the type of HTTP verb we want to use (POST for our form)
						url: url, // the url where we want to POST
						data: formData, // our data object
						dataType: 'text', // what type of data do we expect back from the server
						encode: true,
					})
					.done(function(data) {

						var obj = JSON.parse(data);

						checkUser = obj.code;

						if (obj.code == 1) {
							// var phoneNumber = $('#phoneNumber').val();
							// var countryNumber = $('#countryCode').val();
							utmTracking('', payeeEmail, '', 'Home Get Started button');

							$.redirect("requestFund.php", {
								payeeEmail: payeeEmail,
								code: checkUser,
							});
						} else {
							var phoneNumber = $('#phoneNumber').val();
							var countryNumber = $('#countryCode').val();
							utmTracking('', payeeEmail, '', 'Home Get Started button');

							$.redirect("requestFund.php", {
								payeeEmail: payeeEmail
							});
						}
					})

			}



			// var payeeEmail = $('#emailInput').val();
			// var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			// if(!emailReg.test(payeeEmail)) {
			// 	var message = "Please enter a valid email.";
			// 	errorOutput(message);
			// 	return false;
			// }else {

			// 	utmTracking('',payeeEmail,'','Home Get Started button');
			// 	$.redirect("requestFund.php", {
			// 		payeeEmail : payeeEmail
			// 	});
			// }
		});

		function errorOutput(message) {
			showMessage(message, 'warning', '', 'warning', '');
		}

		function format(val) {
			return val.id;
		}

		$('#countryCode').select2({
			dropdownAutoWidth: true,
			templateSelection: format
		});

		$('#countryCode').find('option').each(function() {
			if (countryCode && countryCode != "ZZ") {
				if ($(this).attr("data-countrycode") == countryCode) {
					$(this).parent().val(this.value).trigger('change');
				}
			} else {
				if ($(this).attr("data-countrycode") == "US") {
					$(this).parent().val(this.value).trigger('change');
				}
			}
		});

		tracking();

		$('.headerLink').click(function() {
			utmTracking('', '', '', 'Home headerLink (' + $(this).attr('data-name') + ')');
		});

		$('.footerLink').click(function() {
			utmTracking('', '', '', 'Home footerLink (' + $(this).attr('data-name') + ')');
		});

		$('#sendContactUs').click(function() {

			$('.error-danger').remove();

			if ($('input#name').val() == '') {
				$('input#name').after('<span class="error-danger"><?php echo $translations["M01258"][$language]; /* Please enter your name. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#name").offset().top - 120
				}, 500);
				$('input#name').focus();
			} else if ($('input#email').val() == '') {
				$('input#email').after('<span class="error-danger"><?php echo $translations["M01259"][$language]; /* Please enter your email. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#email").offset().top - 120
				}, 500);
				$('input#email').focus();
			} else if (!validateEmail($("#email").val())) {
				$('input#email').after('<span class="error-danger"><?php echo $translations["M01260"][$language]; /* Your email address is invalid. Please enter a valid email address. */ ?></span>');
				$('input#email').focus();
			} else if ($('input#subject').val() == '') {
				$('input#subject').after('<span class="error-danger"><?php echo $translations["M01264"][$language]; /* Please enter your subject. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#subject").offset().top - 120
				}, 500);
				$('input#subject').focus();
			} else if (!$('textarea#message').val()) {
				$('textarea#message').after('<span class="error-danger"><?php echo $translations["M01265"][$language]; /* Please enter your message. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#message").offset().top - 120
				}, 500);
				$('textarea#message').focus();
			} else {

				var name = $("#name").val();
				var email = $("#email").val();
				var country = "MY"; //$("#country").val();
				var mobileNo = $("#mobileNo").val();
				var companyName = ""; //$("#companyName").val();
				var subject = $("#subject").val();
				var message = $("#message").val();
				var keyword = window.location.search;

				formData = {
					command: 'contactUs',
					name: name,
					email: email,
					country: country,
					mobileNo: mobileNo,
					companyName: companyName,
					subject: 'Ftag Homepage Contact Us',
					message: message,
					keyword: keyword
				};
				console.log(formData);
				fCallback = sendContactSuccess;
				console.log(url);
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

			}

		});

		$('html,body').animate({
			scrollTop: $(window.location.hash).offset().top + 300
		}, 800);
		if (typeof(window.location.hash) !== 'undefined' && window.location.hash.length > 0) {
			window.location.hash = '';
		}

	});

	function loadDefaultListing(data, message) {

		// if (dataHasReturnNumber) {
		// 	var numAddComma = numberWithCommas(21222238);
		// 	var num = numAddComma;
		// 	var digits = num.toString().split('');
		// 	var realDigits = digits;
		// 	var numberAddComal = 0;
		// 	var totalTransaction = "";

		// 	$.each(realDigits,function(k,v){

		// 		if (v == ",") {
		// 			totalTransaction = '<div class="nuxPaySection02NumberBox">';
		// 			totalTransaction += '<div class="nuxPaySection02NumberBoxNoColor">';
		// 			totalTransaction += ''+ v +'';
		// 			totalTransaction += '</div>';
		// 			totalTransaction += '</div>';

		// 		} else {
		// 			totalTransaction = '<div class="nuxPaySection02NumberBox">';
		// 			totalTransaction += '<div class="nuxPaySection02NumberBox2">';
		// 			totalTransaction += ''+ v +'';
		// 			totalTransaction += '</div>';
		// 			totalTransaction += '</div>';
		// 		}

		// 		$('#totalTransaction').append(totalTransaction);
		// 	});
		// }

		if (data.data.transaction_listing) {

			$.each(data.data.transaction_listing, function(k, v) {
				runTimer(v['created_at'], k);
				var buildHomeTable = "";
				var transactionID = v['transaction_id'];
				var createDateTime = dateTimeToTimestamp(v['created_at']);

				buildHomeTable = '<tr>';

				if (v['transaction_type'] == "external") {

					buildHomeTable += '<td onclick="goNewPage(this)" name="' + transactionID + '" class="nuxPaySection02TableText" style="cursor:pointer">';
					buildHomeTable += '' + transactionID + '';
					buildHomeTable += '</td>';
				} else {
					buildHomeTable += '<td class="nuxPaySection02TableText">';
					buildHomeTable += '' + v['transaction_id'] + '';
					buildHomeTable += '</td>';
				}

				buildHomeTable += '<td class="nuxPaySection02TableText2">';
				buildHomeTable += '' + v['wallet_type'] + '';
				buildHomeTable += '</td>';

				buildHomeTable += '<td class="nuxPaySection02TableText2" id="' + k + '">';
				// buildHomeTable += ''+ createDateTime +'';
				buildHomeTable += '</td>';
				buildHomeTable += '<td class="nuxPaySection02TableText2">';
				buildHomeTable += '' + v['amount'] + '';
				buildHomeTable += '</td>';
				buildHomeTable += '</tr>';

				$('#addHomeTable').append(buildHomeTable);
			});
		}
	}

	function goNewPage(n) {
		var domainName = '<?php echo $sys['txDomain']; ?>';
		var domainTransaction = $(n).attr('name');

		$.redirect(domainName + domainTransaction);
	}


	function sendContactSuccess(data, message) {
		showMessage(data.statusMsg, 'success', '<?php echo $translations["M01173"][$language]; /* Success */ ?>', "check-circle-o", 'homepage.php');
	}

	function validateEmail(sEmail) {
		var sEmail = sEmail.trim();
		var filter = /^([\w-\.]+)@/;
		if (filter.test(sEmail)) {
			return true;
		} else {
			return false;
		}
	}

	function dateTimeToTimestamp(dateTimeValue) {
		const now = new Date(dateTimeValue);
		const getTimeStamp = now.getTime() / 1000;

		return moment.unix(getTimeStamp).fromNow();
	}


	function numberWithCommas(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}

	function runTimer(sendTimeHere, k) {

		// var dateConvert = new Date(Date.parse(sendTimeHere)).getTime() / 1000;
		// var nowTime = moment().unix();
		// var dateCalculation = nowTime - dateConvert;

		var calcNewYear = setInterval(function() {
			date_future = new Date();
			date_now = new Date(sendTimeHere);


			seconds = Math.floor((date_future - (date_now)) / 1000);
			minutes = Math.floor(seconds / 60);
			hours = Math.floor(minutes / 60);
			days = Math.floor(hours / 24);

			hours = hours - (days * 24);
			minutes = minutes - (days * 24 * 60) - (hours * 60);
			seconds = seconds - (days * 24 * 60 * 60) - (hours * 60 * 60) - (minutes * 60);

			if (days <= 0 && hours <= 0) {
				$("#" + k).text(minutes + " min, " + seconds + " secs " + " ago ");
			} else if (days <= 0) {
				$("#" + k).text(hours + " hour, " + minutes + " mins " + " ago ");
			} else {
				$("#" + k).text(days + " day, " + hours + " hours " + " ago ");
			}


		}, 1000);

	}

	if ($(window).width() < 320) {
		$('meta[name="viewport"]').prop('content', 'width=320');
	}

</script>
