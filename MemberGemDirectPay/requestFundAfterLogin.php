<?php include 'include/config.php'; ?>
<?php include 'storeAds.php' ?>;

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
									<i class="fa fa-money" style="font-size: 30px; margin-top: 5px;"></i>
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
														<p class="montserratRegularFont" style="text-transform: uppercase; font-size: 15px;">PAYER INFO</p>
														<hr>
													</div>

													<div class="col-12">
														<div class="row">
															<div class="form-group col-md-6">
																<label class="capitalStyle">Payer Name</label>
																<input type="text" class="form-control" id="payerName" value="<?php echo $_POST['payerName']; ?>">
															</div>
															<div class="form-group col-md-6">
																<label class="capitalStyle">Payer Email</label>
																<input type="text" class="form-control" id="payerEmail" value="<?php echo $_POST['payerEmail']; ?>">
															</div>
															<div class="form-group col-md-6">
																<label class="capitalStyle">Payer Mobile Number</label>
																<div class="row">
																    <div class="col-3 align-self-end">
																        <select name="" id="payerDialingArea" class="selectOption form-control requestInput">
																            <?php include 'phoneList.php'; ?>
																        </select>
																    </div>
																    <div class="col-9 pl-0">
																        <input type="text" class="form-control requestInput" id="payerMobileNumber" value="<?php echo $_POST['payerMobileNumber']; ?>">
																    </div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 mt-5 mb-2">
														<p class="montserratRegularFont" style="text-transform: uppercase; font-size: 15px;">Payment Details</p>
														<hr>
													</div>
													<div class="col-12">
														<div class="row">
															<div class="form-group col-md-6">
																<label class="capitalStyle">Amount To Pay</label>
																<div class="input-group">
																  <input type="text" class="form-control" id="amount" value="<?php echo $_POST['amount']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
																  <div class="input-group-append">
																    <span class="input-group-text">USDT</span>
																  </div>
																</div>
															</div>
															<div class="form-group col-md-12">
																<label class="capitalStyle">Payment Description</label>
																<textarea maxlength="1000" name="" id="paymentDescription" class="form-control" rows="5"><?php echo $_POST['paymentDescription']; ?></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-12">
										<button onclick="goToConfirmation()" id="submitBtn" class="btn searchBtn mx-2 my-4" type="button">Submit</button>
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
	var phoneNumber = "<?php echo $_POST['phoneNumber']; ?>";
    var countryNumber = "<?php echo $_POST['payerCountryCode']; ?>";
	var countryCode     = "<?php echo $countryCode; ?>";

	$(document).ready(function(){

		if(countryNumber && countryNumber != "") {
			$("#payerDialingArea").val(countryNumber);
			$("#payerDialingArea").parent().val(this.value).trigger('change');
		}else{
			$('#payerDialingArea').find('option').each(function(){
				if (countryCode != "ZZ") {
					if ($(this).attr("data-countrycode") == countryCode) {
						$(this).parent().val(this.value).trigger('change');
					}
				}else{
					if ($(this).attr("data-countrycode") == "US") {
						$(this).parent().val(this.value).trigger('change');
					}
				}
			});
		}

        
        $('.selectOption').select2({
            dropdownAutoWidth : true,
            templateSelection: format,
			width: 80
		});

		$('#payerMobileNumber').on('input', function (event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

	});

	function format(val) {
        return val.id;
	}

	function goToConfirmation() {
        var payerName = $("#payerName").val();
        var payerEmail = $("#payerEmail").val();
        var payerDialingArea = $("#payerDialingArea").val();
        var payerMobileNumber = $("#payerMobileNumber").val();
        var amount = $("#amount").val();
        var paymentDescription = $("#paymentDescription").val();
		var regex = "/^[A-Za-z0-9 ]+$/";

        if (payerName == '') {
			var message = "Please enter Payer Name";
            errorOutput(message);
            return false;
        }else{
			if(/[^a-zA-Z., ]/.test(payerName)){
				var message = "Special character or number is not allowed for Payer Name";
				errorOutput(message);
				return false;
			}
		}
        if (payerEmail == '') {
			var message = "Please enter Payer Email";
            errorOutput(message);
            return false;
        }
        if (payerDialingArea == '') {
			var message = "Please enter Payer Dialing Area";
            errorOutput(message);
            return false;
        }
        if (payerMobileNumber == '') {
			var message = "Please enter Payer Mobile Number";
            errorOutput(message);
            return false;
        }else{
			if(/[^0-9.]/.test(payerMobileNumber)){
				var message = "Only numbers and symbols are allowed for mobile number";
				errorOutput(message);
				return false;
			}
		}
        if (amount == '') {
			var message = "Please enter amount";
            errorOutput(message);
            return false;
        }else{
			if(/[^0-9.]/.test(amount)){
				var message = "Only numbers and symbols are allowed for amount";
				errorOutput(message);
				return false;
			}
		}

        formData = {
            command : 'requestFundVerification',
            currency: "tetherusd",
			// payee_name : payeeName,
			payee_name : "<?php echo $_SESSION["name"]; ?>",
			// payee_email_address : payeeEmail,
			payee_email_address : "<?php echo $_SESSION["email"]; ?>",
            // payeeDialingArea : payeeDialingArea,
			// payee_mobile_phone : payeeDialingArea+payeeMobileNumber,
			payee_mobile_phone : "<?php echo $_SESSION["mobile"]; ?>",
            payer_name : payerName,
            payer_email_address : payerEmail,
            // payerDialingArea : payerDialingArea,
            payer_dialing_area : payerDialingArea,
            payer_mobile_phone : payerMobileNumber,
            payment_amount : amount,
            payment_description : paymentDescription
        };
        fCallback = verifiedSuccess;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function verifiedSuccess(data, message) {
        $.redirect("requestFundConfirmationAfterLogin.php", data.data);
	}
	
	function errorOutput(message){
		showMessage(message, 'warning', '', 'warning', '');
	}
</script>
