<!-- <script type="text/javascript">window.location.href = "login.php";
</script> -->


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

				<section class="homepageSec1">
					<div class="kt-container w-100 px-0">
						<div class="col-12">
							<div class="row pb-4">
								<div class="col-md-6 homepageTitle">
									<h1>
										One Goal, <br>
										One Passion<br>
										No. 1 Crypto <br>
										Payment Solution
									</h1>
									<p class="d-flex mt-4">
										<span class="tickIco">
											<i class="fa fa-check"></i>
										</span>
										<span class="col text-grey normalText">
											We provide the technology and solutions to accept payments from around the world.
										</span>
									</p>

									<!-- <div class="mt-5 pt-5">
										<a class="mt-5 normalText" href="#">Looking for the Ppay Card or Wallet? <span class="d-inline-block ml-3">
											<i class="fa fa-arrow-right"></i>
										</span> </a>
									</div> -->

									<div class="mt-5 pt-3">
										<a href="login.php?type=signupPage" class="btn btn-primary mr-3">
											Get Started
										</a>
										<!-- <button type="button" class="btn btn-default">
											Contact Sales
										</button> -->
									</div>
								</div>
								<div class="col-md-6 pr-0">
									<img src="images/ppay/homepage01.png" alt="" width="100%">
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="homepageSec2">
					<div class="kt-container w-100 px-0">
						<div class="col-12">
							<div class="row align-items-center">
								<div class="col-md-5 pl-0 position-relative">
									<img src="images/ppay/homepage02.png" alt="" width="90%">
									<div class="homepageComment normalText">
										<p class="text-grey pb-3 border-bottom">
											<span class="d-block quoteIco mb-2"><i class="fa fa-quote-left"></i></span>
											PPay is an excellent, well-managed payment gateway. The gateway provide the technology and solutions to accept payments from around the world.
										</p>
										<b class="d-block">
											Mark Cuban
										</b>
										<span class="d-block">
											User
										</span>
									</div>
								</div>
								<div class="col-md-6 offset-md-1 py-4 py-md-0">
									<div>
										<h2 class="bigText mb-5">Why <span class="text-blue">Ppay?</span></h2>

										<div class="d-flex align-items-center mb-4">
											<span class="tickIco">
												<i class="fa fa-check"></i>
											</span>
											<div class="col normalText">
												<b class="d-inline-flex align-items-center">World Wide <img class="ml-3" src="images/ppay/ico_world.png" width="30px"></b>
												<span class="d-block mt-1 text-grey">
													Receive funds directly to your bank account with zero price volatility or risk
												</span>
											</div>
										</div>

										<div class="d-flex align-items-center mb-4">
											<span class="tickIco">
												<i class="fa fa-check"></i>
											</span>
											<div class="col normalText">
												<b class="d-inline-flex align-items-center">Easy Implemetation <img class="ml-3" src="images/ppay/ico_implement.png" width="30px"></b>
												<span class="d-block mt-1 text-grey">
													Fast setup and get your business ready in matter of minutes by following few easy steps with our easy API Documentation.
												</span>
											</div>
										</div>

										<div class="d-flex align-items-center mb-4">
											<span class="tickIco">
												<i class="fa fa-check"></i>
											</span>
											<div class="col normalText">
												<b class="d-inline-flex align-items-center">Access Anytime, Anywhere <img class="ml-3" src="images/ppay/ico_anytime.png" width="30px"></b>
												<span class="d-block mt-1 text-grey">
													Mobile Accessible & get instant notification with PPay App no matter where you go and what time it is
												</span>
											</div>
										</div>

										<div class="d-flex align-items-center mb-4">
											<span class="tickIco">
												<i class="fa fa-check"></i>
											</span>
											<div class="col normalText">
												<b class="d-inline-flex align-items-center">FinTech Expert <img class="ml-3" src="images/ppay/ico_fintech.png" width="30px"></b>
												<span class="d-block mt-1 text-grey">
													With more than 10 years’ experience in FinTech, PPay Payment Solution is suitable for all business type.
												</span>
											</div>
										</div>

										<div class="d-flex align-items-center mb-4">
											<span class="tickIco">
												<i class="fa fa-check"></i>
											</span>
											<div class="col normalText">
												<b class="d-inline-flex align-items-center">Accept All Business Type <img class="ml-3" src="images/ppay/ico_business.png" width="30px"></b>
												<span class="d-block mt-1 text-grey">
													There’s no restriction on what type of business it is, grab this opportunity and let others know more about your business.
												</span>
											</div>
										</div>

										<div class="d-flex align-items-center mb-4">
											<span class="tickIco">
												<i class="fa fa-check"></i>
											</span>
											<div class="col normalText">
												<b class="d-inline-flex align-items-center">One Reconciliation <img class="ml-3" src="images/ppay/ico_statistic.png" width="30px"></b>
												<span class="d-block mt-1 text-grey">
													Receive one report for all your settlements, transactions and markets.
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="homepageSec3 position-relative">
					<div class="kt-container w-100 px-0 pt-5">
						<div class="col-12 text-center mb-4">
							<h2 class="bigText">About <span class="text-blue">Ppay</span></h2>
						</div>
						<div class="col-12">
							<div class="row justify-content-center">
								<div class="homepageAbtBlock normalText">
									<img src="images/ppay/ico_total.png" width="40px">
									<div>Total</div>
									<div class="bigTxt">20,000,000+</div>
									<div class="mt-2">Transactions</div>
								</div>
								<div class="homepageAbtBlock normalText">
									<img src="images/ppay/ico_process.png" width="40px">
									<div>We’ve processed over</div>
									<div class="bigTxt">$ 50 million</div>
									<div class="mt-2">Yearly</div>
								</div>
								<div class="homepageAbtBlock normalText">
									<img src="images/ppay/ico_available.png" width="40px">
									<div>Available in more than</div>
									<div class="bigTxt">153</div>
									<div class="mt-2">Countries</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="homepageSec4">
					<div class="kt-container w-100">
						<div class="col-12">
							<div class="row align-items-center">
								<div class="col-md-4 offset-md-1">
									<div>
										<h2 class="bigText mb-5">How<br>We <span class="text-blue border-blue-bottom">Deliver?</span></h2>

										<div class="d-flex align-items-center mb-4">
											<span class="tickIco">
												<i class="fa fa-check"></i>
											</span>
											<div class="col text-grey normalText">
												PPay is expert in FinTech by providing professional service to help company to reach their potential markets around the world by using the perfect payment solution for their business.
											</div>
										</div>

										<div class="d-flex align-items-center mb-4">
											<span class="tickIco">
												<i class="fa fa-check"></i>
											</span>
											<div class="col text-grey normalText">
												Excellent communication between PPay and clients are the key to our success. If you’re interested in high level of reliable payment solution, you have come to the right place. PPay is the right payment solution for you.
											</div>
										</div>

										<div class="my-5">
											<a class="mt-5" href="#">See how it works <span class="d-inline-block ml-3">
												<i class="fa fa-arrow-right"></i>
											</span> </a>
										</div>
									</div>
								</div>
								<div class="col-md-5 offset-md-1">
									<img src="images/ppay/homepage03.jpg" alt="" width="100%">
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="homepageSec5 py-3">
					<div class="kt-container w-100 px-0">
						<div class="col-12">
							<div class="row align-items-center">
								<div class="col-md-7 pl-0 position-relative">
									<img src="images/ppay/homepage04.png" alt="" width="100%">
								</div>
								<div class="col-md-5">
									<div>
										<h2 class="bigText">Ppay Merchants Solution</h2>

										<p class="py-1 text-grey normalText">Offer your customers and start using PPay as a payment option! It helps your business to stand out against competitors with our service.</p>

										<div class="d-flex align-items-center mb-4 normalText">
											<span class="tickIco">
												<i class="fa fa-check"></i>
											</span>
											<div class="col">
												<span class="text-grey">
													No Hidden Charges
												</span>
											</div>
										</div>

										<div class="d-flex align-items-center mb-4 normalText">
											<span class="tickIco">
												<i class="fa fa-check"></i>
											</span>
											<div class="col">
												<span class="text-grey">
													0.5% processing fees
												</span>
											</div>
										</div>

										<div class="d-flex align-items-center mb-4 normalText">
											<span class="tickIco">
												<i class="fa fa-check"></i>
											</span>
											<div class="col">
												<span class="text-grey">
													Real Time Transaction Balance & History
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<!-- <section class="pPaySection03BG">
					<div class="kt-container">
						<div class="row justify-content-center">
							<div class="col-10">
								<div class="row">

									<div class="col-lg-4 col-md-6 col-12 pPaySection03Totalspacing pPaySection03MobileSpace">
										<img src="images/ppay/pPaySection03Icon01.png" class="pPaySection03Icon">
										<div class="row">
											<div class="col-12 pPaySection03Text">
												Total
											</div>
											<div class="col-12 pPaySection03spacing">
												<span class="pPaySection03Number">20,000,000+ </span>
											</div>
											<div class="col-12 pPaySection03spacing3">
												<span class="pPaySection03Text">transactions</span>
											</div>
										</div>
									</div>

									<div class="col-lg-4 col-md-6 col-12 pPaySection03Totalspacing pPaySection03MobileSpace">
										<img src="images/ppay/pPaySection03Icon02.png" class="pPaySection03Icon2">
										<div class="row">
											<div class="col-12 pPaySection03Text">
												We’ve processed over
											</div>
											<div class="col-12 pPaySection03spacing">
												<span class="pPaySection03Number">$ 50 million</span>
											</div>
											<div class="col-12 pPaySection03spacing2">
												<span class="pPaySection03Text">yearly</span>
											</div>
										</div>
									</div>

									<div class="col-lg-4 col-md-6 col-12 pPaySection03Totalspacing pPaySection03IpadSpace pPaySection03MobileSpace">
										<img src="images/ppay/pPaySection03Icon03.png" class="pPaySection03Icon3">
										<div class="row">
											<div class="col-12 pPaySection03Text">
												Available in more than
											</div>
											<div class="col-12">
												<span class="pPaySection03Number">153</span>
											</div>
											<div class="col-12" style="margin-top: -5px;">
												<span class="pPaySection03Text">countries</span>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</section> -->

				<!-- <section class="pPaySection06BG">
					<div class="kt-container">
						<div class="row justify-content-center">
							<div class="col-11">
								<div class="row justify-content-center">
									<div class="col-12 pPaySection06Title">
										Please contact us for any inquiries.
									</div>
									<div class="col-12 pPaySection06Title">
										We’re happy to hear from you.
									</div>

									<div class="col-12">
										<div class="contactLine col-md-3 col-7"></div>
									</div>
									<div class="col-xl-8 col-lg-10 col-12" style="margin-top: 50px;">
										<div class="row">
											<div class="col-md-6 col-12 form-group">
												<input placeholder="Your Name*" type="text" class="form-control contactInput" id="name" name="Name" autocomplete="off">
											</div>
											<div class="col-md-6 col-12 form-group">
												<input placeholder="Email Address*" type="text" class="form-control contactInput" id="email" name="Email" autocomplete="off">
											</div>
										</div>
									</div>

									<div class="col-xl-8 col-lg-10 col-12 pPaySection06Margin">
										<div class="row">
											<div class="col-md-6 col-12 form-group">
												<select id="country" class="form-control homepageContactUsFormInput">
													<?php include 'countryList.php'; ?>
												</select>
											</div>
											<div class="col-md-6 col-12 form-group ">
												<input placeholder="Phone Number*" type="text" class="form-control contactInput" id="mobileNo" name="Email" autocomplete="off">
											</div>
										</div>
									</div>

									<div class="col-xl-8 col-lg-10 col-12 pPaySection06Margin">
										<div class="row">
											<div class="col-12 form-group">
												<textarea placeholder="Message*" id="message" class="contactInput form-control" rows="5" name="Message"></textarea>
											</div>
										</div>
									</div>

									<div class="col-xl-8 col-lg-10 col-12" style="margin-top: 10px;">
										<button type="button" id="sendContactUs" class="btn btn-primary mr-3">Send</button>
										<button type="button" class="btn btn-default">Cancel</button>
									</div>

								</div>
							</div>
						</div>
					</div>
				</section> -->

				<!-- <section class="homepageSec6">
					<div class="kt-container">
						<div class="row align-items-center justify-content-center">
							<div class="col-md-5 offset-md-1">
								<h1 class="text-white">We are here to help</h1>
							</div>
							<div class="col-md-5 normalText">
								<p class="text-white">
									We’ll contact you within 2 business days via the email provided in the form. For urgent issues, please contact <a class="text-light-blue" href="mailto:support@ppay.com">support@ppay.com</a>
								</p>

								<div class="mt-3">
									<a class="text-light-blue" href="#">Contact Us <span class="d-inline-block ml-3">
										<i class="fa fa-arrow-right"></i>
									</span> </a>
								</div>
							</div>
						</div>
					</div>
				</section> -->

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

	var url             = 'scripts/reqHomepage.php';
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 1;
	var pageNumber      = 1;
	var formData        = "";
	var fCallback       = "";
	var countryCode 	= "<?php echo $countryCode; ?>";

	if (!countryCode) {
		countryCode = "US";
	}

	$(document).ready(function() {

		formData = {
			command : 'homepageTable'
		};
		fCallback = loadDefaultListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		$('#phoneNumber').on('input', function (event) {
			this.value = this.value.replace(/[^0-9]/g, '');
		});

		$('#sendPhoneNumber').click(function(){
			var phoneNumber = $('#phoneNumber').val();
			var countryNumber = $('#countryCode').val();
			utmTracking('',countryNumber+phoneNumber,'','Home Get Started button');
			$.redirect("login.php?type=signupPage", {
				countryNumber : countryNumber,
				phoneNumber : phoneNumber
			});

		});

		function format(val) {
			return val.id;
		}

		$('#countryCode').select2({
			dropdownAutoWidth : true,
			templateSelection: format
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
			}else if( $('select#country option:selected').val() == ''){
				$('select#country').after('<span class="error-danger"><?php echo $translations["M01261"][$language]; /* Please select your country. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#country").offset().top-120
				}, 500);
				$('select#country').focus();
			}else if( $('input#mobileNo').val() == ''){
				$('input#mobileNo').after('<span class="error-danger"><?php echo $translations["M01262"][$language]; /* Please enter your mobile number. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#mobileNo").offset().top-120
				}, 500);
				$('input#mobileNo').focus();
			}else if( $('input#companyName').val() == ''){
				$('input#companyName').after('<span class="error-danger"><?php echo $translations["M01263"][$language]; /* Please enter your company name. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#companyName").offset().top-120
				}, 500);
				$('input#companyName').focus();
			}else if( $('input#subject').val() == ''){
				$('input#subject').after('<span class="error-danger"><?php echo $translations["M01264"][$language]; /* Please enter your subject. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#subject").offset().top-120
				}, 500);
				$('input#subject').focus();
			}else if(!$('textarea#message').val()){
				$('textarea#message').after('<span class="error-danger"><?php echo $translations["M01265"][$language]; /* Please enter your message. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#message").offset().top-120
				}, 500);
				$('textarea#message').focus();
			}else{

				var name = $("#name").val();
				var email = $("#email").val();
				var country = $("#country").val();
				var mobileNo = $("#mobileNo").val();
				var companyName = $("#companyName").val();
				var subject = $("#subject").val();
				var message = $("#message").val();
				var keyword = window.location.search;

				formData        = {
					command : 'contactUs',
					name : name,
					email : email,
					country : country,
					mobileNo : mobileNo,
					companyName : companyName,
					subject : 'PPay Homepage Contact Us',
					message : message,
					keyword : keyword
				};
				fCallback = sendContactSuccess;
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

function loadDefaultListing(data,message){

	// if (dataHasReturnNumber) {
	// 	var numAddComma = numberWithCommas(21222238);
	// 	var num = numAddComma;
	// 	var digits = num.toString().split('');
	// 	var realDigits = digits;
	// 	var numberAddComal = 0;
	// 	var totalTransaction = "";

	// 	$.each(realDigits,function(k,v){

	// 		if (v == ",") {
	// 			totalTransaction = '<div class="pPaySection02NumberBox">';
	// 			totalTransaction += '<div class="pPaySection02NumberBoxNoColor">';
	// 			totalTransaction += ''+ v +'';
	// 			totalTransaction += '</div>';
	// 			totalTransaction += '</div>';

	// 		} else {
	// 			totalTransaction = '<div class="pPaySection02NumberBox">';
	// 			totalTransaction += '<div class="pPaySection02NumberBox2">';
	// 			totalTransaction += ''+ v +'';
	// 			totalTransaction += '</div>';
	// 			totalTransaction += '</div>';
	// 		}

	// 		$('#totalTransaction').append(totalTransaction);
	// 	});
	// }

	if (data.data.transaction_listing) {

		$.each(data.data.transaction_listing,function(k,v){
			runTimer(v['created_at'], k);
			var buildHomeTable = "";
			var transactionID = v['transaction_id'];
			var createDateTime = dateTimeToTimestamp(v['created_at']);

			buildHomeTable = '<tr>';

			if (v['transaction_type'] == "external") {

				buildHomeTable += '<td onclick="goNewPage(this)" name="'+transactionID+'" class="pPaySection02TableText" style="cursor:pointer">';
				buildHomeTable += ''+ transactionID +'';
				buildHomeTable += '</td>';
			} else {
				buildHomeTable += '<td class="pPaySection02TableText">';
				buildHomeTable += ''+ v['transaction_id'] +'';
				buildHomeTable += '</td>';
			}

			buildHomeTable += '<td class="pPaySection02TableText2">';
			buildHomeTable += ''+ v['wallet_type'] +'';
			buildHomeTable += '</td>';

			buildHomeTable += '<td class="pPaySection02TableText2" id="'+k+'">';
			// buildHomeTable += ''+ createDateTime +'';
			buildHomeTable += '</td>';
			buildHomeTable += '<td class="pPaySection02TableText2">';
			buildHomeTable += ''+ v['amount'] +'';
			buildHomeTable += '</td>';
			buildHomeTable += '</tr>';

			$('#addHomeTable').append(buildHomeTable);
		});
	}
}

function goNewPage (n) {
	var domainName = '<?php echo $sys['txDomain']; ?>';
	var domainTransaction = $(n).attr('name');

	$.redirect(domainName+domainTransaction);
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

	var calcNewYear = setInterval(function(){
		date_future = new Date();
		date_now = new Date(sendTimeHere);


		seconds = Math.floor((date_future - (date_now))/1000);
		minutes = Math.floor(seconds/60);
		hours = Math.floor(minutes/60);
		days = Math.floor(hours/24);

		hours = hours-(days*24);
		minutes = minutes-(days*24*60)-(hours*60);
		seconds = seconds-(days*24*60*60)-(hours*60*60)-(minutes*60);

		if (days <= 0 && hours <= 0) {
			$("#"+k).text(minutes + " min, " + seconds + " secs " + " ago ");
		} else if (days <= 0) {
			$("#"+k).text(hours + " hour, " + minutes + " mins " + " ago ");
		} else {
			$("#"+k).text(days + " day, " + hours + " hours " + " ago ");
		}


	},1000);

}

</script>
