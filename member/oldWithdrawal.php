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
					<div class="col-12">
						<div class="d-flex border-bottom">
							<nav class="nav">
							  <a class="nav-link active" href="#">Withdrawal</a>
							  <!-- <a class="nav-link" href="withdrawalListing.php">History</a> -->
							</nav>
						</div>
					</div>
				</div>
			</div>

			<div class="m-content">

				<div class="col-12 px-0">
					<div class="innerPageTitle">Withdrawal Info</div>
				</div>

				<div class="mt-3">

					<div class="col-xl-12 px-0" style="">
						<div class="m-portlet m-portlet--tab col-md-6 px-0">
							<!-- Remove the [col-md-6] and [px-0] then it will become full width -->
							<div class="m-portlet__body">

								<div class="row">
									<div class="col-12">
										<div class="row m-form">
											<div class="col-12">
												<div class="row">
													<div class="col-12">
														<div class="row">
															<div class="form-group col-md-12">
																<label class="capitalStyle">Currency<span class="text-danger">*</span></label>
																<select id="coinType" class="form-control">
																	<option value="tetherusd">USDT</option>
																</select>
															</div>
															<div class="form-group col-md-12">
																<label class="capitalStyle">Withdrawable Balance</label>
																<div class="input-group">
																  <input type="text" class="form-control" id="balance" value="0" disabled>
																  <div class="input-group-append">
																    <span class="input-group-text" id="balanceCoin">usd2</span>
																  </div>
																</div>
															</div>
															<div class="form-group col-md-12">
																<label class="capitalStyle">Destination Address<span class="text-danger">*</span></label>
																<input type="text" class="form-control" id="destinationAdd">
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="col-12">
												<div class="text-left">
													<button id="submitBtn" class="btn searchBtn mx-2 my-4" type="button">Submit</button>
												</div>
											</div>
										</div>
									</div>
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
	var walletType = "<?php echo $_POST['walletType']; ?>";
	var coinType;
    var dropdownFake;

	$(document).ready(function(){
		
		// fCallback = loadWithdrawalBalance;
        // formData  = {
        //     command: 'getWithdrawalBalance',
        //     walletType: coinType
        // };
		// ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		
		// fCallback = getWalletType;
        // formData  = {
		// 	command: 'getWalletType',
		// 	walletType: coinType
        // };    
		// ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		coinType = $("#coinType").val();
		fCallback = loadWithdrawalBalance;
		formData = {
			command: 'getWithdrawalBalance',
			walletType: coinType
		};
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		
		// $('#coinType').change(function(){
		// 	coinType = $("#coinType").val();

		// 	fCallback = loadWithdrawalBalance;
		// 	formData = {
		// 		command: 'getWithdrawalBalance',
		// 		walletType: coinType
		// 	};
		// 	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		// });

		$('#submitBtn').click(function(){

			if( $('input#destinationAdd').val() == ''){
				$('.text-danger').hide();
    			$('input#destinationAdd').after('<span class="text-danger"><?php echo $translations["E00153"][$language]; /* Destination Address cannot be empty. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#destinationAdd").offset().top-120
				}, 500);
				$('input#destinationAdd').focus();
			}else{
                $('.text-danger').hide();
				var walletType = $("#coinType").val();
				var withdrawalBalance = $('#balance').val();
				var destinationAddress = $('input#destinationAdd').val();

				if(/[^a-zA-Z0-9]/.test(destinationAddress)){
					$('input#destinationAdd').after('<span class="text-danger">No Symbol and Space allowed</span>');
					$('html, body').animate({
						scrollTop: $("#destinationAdd").offset().top-120
					}, 500);
					$('input#destinationAdd').focus();
				}else{
					formData  = {
						command: 'createWithdrawal',
						wallet_type: walletType,
						withdrawal_balance: withdrawalBalance,
						destination_address: destinationAddress
					};
					fCallback = createWithdrawal;
					ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
				}
			}
		});


		// function changePasswordCB(data,message){
        // 	console.log(data);
        // 	showMessage(message, 'success', 'Success', "check-circle-o", 'changePassword.php');
        // };

	});
	
	function createWithdrawal(data, message) {
  
        showMessage(message, 'success', '<?php echo $translations["M01173"][$language]; /* Success */ ?>', 'check-circle-o', 'withdrawal.php');
    }

	function loadWithdrawalBalance(data, message){
		var withdrawalBalance = data.data.withdrawal_balance;
		var currencyUnit = data.data.currency_unit;
		document.getElementById("balanceCoin").textContent=currencyUnit;
		if(withdrawalBalance) {
        	$('#showErrorMsg').hide();
			$('#balance').val(withdrawalBalance); 
			// document.getElementById("balance").textContent=withdrawBalance;
		}
		else
        {
        	$('#showErrorMsg').show();
			$('#showresultListing').hide();
			$('#balance').val("0"); 
		}
	}

	function getWalletType(data,message){
		$walletTypes = data.result.wallet_types;
		coinType = $walletTypes[0];
    	if($walletTypes && dropdownFake !=1) {
            $('#coinType').empty();
			// $('#coinType').append('<option value="">'+ $walletTypes[0] +'</option>');
			// $walletTypes.shift();
            $.each($walletTypes, function(key, val) {
                $('#coinType').append('<option value="'+ val+'">'+ val +'</option>');
            });
			dropdownFake = 1;
        }

		$('#coinType').val($walletTypes[0]);
		
		fCallback = loadWithdrawalBalance;
		formData = {
			command: 'getWithdrawalBalance',
			walletType: coinType
		};
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}
</script>
