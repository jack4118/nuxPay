<?php include 'include/config.php'; ?>

<?php
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
$_SESSION['lastVisited'] = $thisPage;
// if ($_SESSION['paymentGatewayStatus']==0 || !$_SESSION['paymentGatewayStatus']) {
//  header("Location: paymentGatewayCheckStatus.php");
// }
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
													<div class="col-12 mb-4">
														<div class="requestPaymentLink">
														    <div class="row">
														        <div class="col-6 col-md-3 col-lg-2">
														            <img class="paymentIcon" src="images/nuxPay/paymentIcon.png" alt="" width="80%">
														        </div>
														        <div class="col-lg-10">
														            <span class="d-block">A payment link has been created successfully. Send it to payer and request for payment.</span>
														            <div class="row mt-3">
											            	            <div class="col-md-6 d-flex mb-2 mb-md-0">
											            	                <input id="urlInput" type="text" class="form-control requestInput rounded-0" value="<?php echo $_POST['url']; ?>" readonly>
											            	                <button id="copyBtn" class="btn btnRequest col rounded-0 btnCopy"><i class="fa fa-copy"></i> Copy</button>
											            	            </div>
											            				<!--   -->
														            </div>
														        </div>
														    </div>
														</div>
													</div>
													<div class="col-12 mb-2">
														<p class="montserratRegularFont" style="text-transform: uppercase; font-size: 15px;">PAYER INFO</p>
														<hr>
													</div>
													<div class="col-12">
														<div class="row mx-0">
															<div class="col-md-3 font-weight-bold">Payer Name :</div>
															<div class="col" id="payerName"><?php echo $_POST['payerName']; ?></div>
														</div>
														<div class="row mx-0 mt-2">
															<div class="col-md-3 font-weight-bold">Payer Email :</div>
															<div class="col" id="payerEmail"><?php echo $_POST['payerEmail']; ?></div>
														</div>
														<div class="row mx-0 mt-2">
															<div class="col-md-3 font-weight-bold">Payer Mobile Number</div>
															<div class="col" id="payerMobileNumber"><?php echo $_POST['payerCountryCode']; ?><?php echo $_POST['payerMobileNumber']; ?></div>
														</div>
													</div>
													<div class="col-12 mt-5 mb-2">
														<p class="montserratRegularFont" style="text-transform: uppercase; font-size: 15px;">Payment Details</p>
														<hr>
													</div>
													<div class="col-12">
														<div class="row mx-0">
															<div class="col-md-3 font-weight-bold">Amount To Pay :</div>
															<div class="col" id="amount"><?php echo $_POST['amount']; ?> USDT</div>
														</div>
														<div class="row mx-0 mt-2">
															<div class="col-md-3 font-weight-bold">Payment Description :</div>
															<div class="col wrapText" id="paymentDescription"><?php echo $_POST['paymentDescription']; ?></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-12 mt-5">
										<button id="submitBtn" class="btn searchBtn mx-2 my-4" type="button">New Request</button>
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

	$(document).ready(function(){

		$("#urlInput").click(function(){
		    $("#copyBtn").click();
		});

		$("#copyBtn").click(function(){
			var text = $("#urlInput").val();

			var $temp = $("<input>");
			$("body").append($temp);
			$temp.val(text).select();
			document.execCommand("copy");
			$temp.remove();
			// $("#inputTick").show();
			swal.fire({
				position:"center",
				type:"success",
				title:"Copied to clipboard",
				showConfirmButton:!1,
				timer:1500
			})
		});
		
		$("#submitBtn").click(function(){
			$.redirect('requestFundAfterLogin.php');
		});

		if (window.history.pushState) {
			//Chrome and modern browsers
			window.history.pushState(null, document.title, location.href);
			window.addEventListener('popstate', function (event) {
				$.redirect('requestFundAfterLogin.php');
			});
		}
	});
</script>
