<?php include 'include/config.php'; ?>

<?php
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
$_SESSION['lastVisited'] = $thisPage;
?>

<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">
				<div class="d-flex align-items-center">
					<div class="mr-auto">
						<div class="col-12">
							<div class="row">
								<div class="dashboardTitleWidth">
									<!-- <i class="fa fa-money" style="font-size: 30px; margin-top: 5px;"></i> -->
									<img src="images/dashboard/requestFund.svg" style="height: 25px; margin-top: 5px; filter: brightness(0);">
									<!-- <span><i class="fa fa-asterisk" style="font-size: 10px; margin-top: 10px;"></i></span>
									<span><i class="fa fa-asterisk" style="font-size: 10px; margin-top: 10px;"></i></span>
									<span><i class="fa fa-asterisk" style="font-size: 10px; margin-top: 10px;"></i></span> -->
									<!-- <img src="images/dashboard/transactionIcon.svg" style="width: 30px; margin-top: 5px;" /> -->
								</div>
								<div class="dashboardTitleWidth2">
									<div class="row">
										<div class="col-12 dashboardTitle">
											Request Fund
										</div>
										<div class="col-12 dashboardTitleDesc">
											Create an invoice and request for payment from your customer
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="m-content">
				<div class="row">

					<div class="col-xl-12 px-0" style="">
						<div class="m-portlet m-portlet--tab">
							<div class="m-portlet__body">

								<div class="row">
									<div class="col-12">
										<div class="row m-form">
											<div class="col-12">
												<div class="row">
													<div class="col-12 mb-2">
														<p class="montserratRegularFont" style="text-transform: uppercase; font-size: 15px;">PAYEE INFO</p>
														<hr>
													</div>
													<div class="col-12">
														<div class="row mx-0">
															<div class="col-md-3 font-weight-bold">Payer Name :</div>
															<div class="col" id="payerName"><?php echo $_POST['payer_name']; ?></div>
														</div>
														<div class="row mx-0 mt-2">
															<div class="col-md-3 font-weight-bold">Payer Email :</div>
															<div class="col" id="payerEmail"><?php echo $_POST['payer_email_address']; ?></div>
														</div>
														<div class="row mx-0 mt-2">
															<div class="col-md-3 font-weight-bold">Payer Mobile Number</div>
															<div class="col" id="payerMobileNumber"><?php echo $_POST['payer_country_code']; ?><?php echo $_POST['payer_mobile_phone']; ?></div>
														</div>
													</div>
													<div class="col-12 mt-5 mb-2">
														<p class="montserratRegularFont" style="text-transform: uppercase; font-size: 15px;">Payment Details</p>
														<hr>
													</div>
													<div class="col-12">
														<div class="row mx-0">
															<div class="col-md-3 font-weight-bold">Amount To Pay :</div>
															<div class="col-md-7 capitalStyle" id="amount"><?php echo $_POST['payment_amount']; ?> USDT</div>
														</div>
														<div class="row mx-0 mt-2">
															<div class="col-md-3 font-weight-bold">Payment Description :</div>
															<div class="col-md-7 wrapText" id="paymentDescription"><?php echo $_POST['payment_description']; ?></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-12 mt-5">
										<button id="backBtn" class="btn mx-2 my-4" type="button">Back</button>
										<button id="nextBtn" class="btn searchBtn mx-2 my-4" type="button">Next</button>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
</div>
<?php include 'footerDashboard.php'; ?>
</div>
<?php include 'sharejsDashboard.php'; ?>
</body>
</html>

<script>
	var url             = 'scripts/reqPaymentGateway.php';
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 0;
	var formData        = "";
	var fCallback       = "";

	var payerName = '<?php echo $_POST['payer_name']; ?>';
    var payerEmail = '<?php echo $_POST['payer_email_address']; ?>';
    var payerMobileNumber = '<?php echo $_POST['payer_mobile_phone']; ?>';
    var payerCountryCode = '<?php echo $_POST['payer_country_code']; ?>';
    var amount = '<?php echo $_POST['payment_amount']; ?>';
    var paymentDescription = `<?php echo $_POST['payment_description']; ?>`;

	$(document).ready(function(){

		$("#backBtn").click(function(){
			$.redirect('requestFundAfterLogin.php', {
				payerName : payerName,
				payerEmail : payerEmail,
				payerMobileNumber : payerMobileNumber,
				payerCountryCode : payerCountryCode,
				amount : amount,
				paymentDescription : paymentDescription
			});
			// window.history.back();
		});

		$("#nextBtn").click(function(){
			formData = {
				command : 'requestFundConfirmation',
				currency: "tetherusd",
				payee_name : "<?php echo $_SESSION["name"]; ?>",
				payee_email_address : "<?php echo $_SESSION["email"]; ?>",
				payee_mobile_phone : "<?php echo $_SESSION["mobile"]; ?>",
				payer_name : payerName,
				payer_email_address : payerEmail,
				// payer_mobile_phone : payerMobileNumber,
	            payer_dialing_area : payerCountryCode,
	            payer_mobile_phone : payerMobileNumber,
				payment_amount : amount,
				payment_description : paymentDescription
			};

			fCallback = confirmationSuccess;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
				// $.redirect('requestFundInvoiceAfterLogin.php');

	        $(".btnRequest").prop('disabled', true);

	        setInterval(function(){
	            $(".btnRequest").prop('disabled', false);
	        },10000);
		});
	});

	// function goToInvoice() {
    //     formData = {
    //         command : 'requestFundConfirmation',
    //         currency: "tetherusd",
    //         payee_name : payeeName,
    //         payee_email_address : payeeEmail,
    //         payee_mobile_phone : payeeMobileNumber,
    //         payer_name : payerName,
    //         payer_email_address : payerEmail,
    //         payer_mobile_phone : payerMobileNumber,
    //         payment_amount : amount,
    //         payment_description : paymentDescription
    //     };

    //     fCallback = confirmationSuccess;
    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	// }
	
	function confirmationSuccess(data, message) {
        $.redirect("requestFundInvoiceAfterLogin.php", {
            payeeName: "<?php echo $_SESSION["name"]; ?>",
            payeeEmail: "<?php echo $_SESSION["email"]; ?>",
            payeeMobileNumber: "<?php echo $_SESSION["mobile"]; ?>",
            payerName: payerName,
            payerEmail: payerEmail,
            payerCountryCode: payerCountryCode,
            payerMobileNumber: payerMobileNumber,
            amount: amount,
            paymentDescription: paymentDescription,
            url: data.shorten_url
        });
        // console.log(data.data);
    }
</script>
