<?php 
$login=false;
?>

<?php include 'include/config.php'; ?>
<?php include 'headLogin.php'; ?>

<body class="navSignUpBtn m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default f-17"  style="background-image: url('images/qrImg/qrSectionBg.png'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">


	<div class="m-grid m-grid--hor m-grid--root m-page">


		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(images/bg-3-1.jpg);">
			<div class="m-grid__item m-grid__item--fluid m-login__wrapper paymentSummaryPadding">
				<div class="m-login__container qrDIV" style="">


					<div class="col-12 text-center">
						<img alt="Logo" src="<?php echo $sys['newHomepageLogoBlack2'] ?>" style="" class="landingLogo">
					</div>

					<div class="col-12" style="margin-top: 30px;">
						<div class="row justify-content-center">
							<div class="col-xl-8 col-lg-8">

								<div class="row paymentSummaryBox">

									<div class="col-12">
										<div class="row">
											<div class="qrTitle5 widthInner1 paymentSummaryTitleWidth">
												Summary Of Transaction
											</div>
											<div class="widthInner2 paymentSummaryTitleWidth2">
												<div class="paymentSummaryLine"></div>
											</div>
										</div>
									</div>

									<div class="col-12 px-0 paymentSummaryMargin">
										<div class="row">
											<div class="col-xl-5 col-lg-5 col-md-6 col-12 qrTitle6 mt-0">
												Status :
											</div>
											<div id="status" class="col-xl-7 col-lg-7 col-md-6 col-12 qrPaymentSummaryDesc" style="text-transform: uppercase;">
											</div>
										</div>
										<div class="row mt-2">
											<div class="col-xl-5 col-lg-5 col-md-6 col-12 qrTitle6">
												Transaction Date :
											</div>
											<div id="transactionDate" class="col-xl-7 col-lg-7 col-md-6 col-12 qrPaymentSummaryText">
											</div>
										</div>
										<div class="row mt-2">
											<div class="col-xl-5 col-lg-5 col-md-6 col-12 qrTitle6">
												Transaction Time :
											</div>
											<div id="transactionTime" class="col-xl-7 col-lg-7 col-md-6 col-12 qrPaymentSummaryText">
											</div>
										</div>
										<div class="row mt-2">
											<div class="col-xl-5 col-lg-5 col-md-6 col-12 qrTitle6">
												Amount :
											</div>
											<div id="amount" class="col-xl-7 col-lg-7 col-md-6 col-12 qrPaymentSummaryText">
											</div>
										</div>
										<!-- <div class="row mt-2">
											<div class="col-xl-5 col-lg-5 col-md-6 col-12 qrTitle6">
												From Address :
											</div>
											<div class="col-xl-7 col-lg-7 col-md-6 col-12 qrPaymentSummaryText">
												12345678787878
											</div>
										</div>
										<div class="row mt-2">
											<div class="col-xl-5 col-lg-5 col-md-6 col-12 qrTitle6">
												To Address :
											</div>
											<div class="col-xl-7 col-lg-7 col-md-6 col-12 qrPaymentSummaryText">
												12345678787878
											</div>
										</div> -->
										<div class="row mt-2">
											<div class="col-xl-5 col-lg-5 col-md-6 col-12 qrTitle6">
												Merchant Name :
											</div>
											<div id="merchantName" class="col-xl-7 col-lg-7 col-md-6 col-12 qrPaymentSummaryText">
											</div>
										</div>
										<div class="row mt-2">
											<div class="col-xl-5 col-lg-5 col-md-6 col-12 qrTitle6">
												Transaction Hash :
											</div>
											<div id="transactionHash" class="col-xl-7 col-lg-7 col-md-6 col-12 qrPaymentSummaryText">
											</div>
										</div>
									</div>

									<div class="col-12 paymentSummaryBtnSpacing text-center">
										<button id="continueBtn" type="button" class="btn paymentSummaryBtn">Continue with Transaction</button>
									</div>

								</div>

							</div>
						</div>
					</div>

				</div>	
			</div>
		</div>	

		<?php include 'footerQr.php'; ?>
	</div>

	<?php include 'sharejsDashboard.php'; ?>   
	<script src="js/jquery.qrcode.js" type="text/javascript"></script>
</body>


</html>

<?php
	 echo "<script>var postData = ".json_encode($_POST)."; </script>";
?>

<script>

	var url             = 'scripts/reqPaymentGateway.php';
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 0;
	var fCallback = "";

	$(document).ready(function(){

		updateDetails(postData);

	});

	function updateDetails(data){
		// console.log(data);
		var dateTime = data.data.transaction_datetime.split(' ');
		showCanvas();
		$('#status').text(data.data.status);
		$('#transactionDate').text(dateTime[0]);
		$('#transactionTime').text(dateTime[1]);
		$('#amount').text(data.data.amount+" "+data.data.currency);
		$('#merchantName').text(data.merchantName);
		$('#transactionHash').text(data.data.transaction_id);
		hideCanvas();

		$('#continueBtn').click(function(){
			$.redirect(data.redirectURL, data.data);
		});
	}

</script>