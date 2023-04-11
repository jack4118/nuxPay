<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<?php
if((isset($_POST['access_token']) && $_POST['access_token'] != "")) {
		$_SESSION["access_token"] = $_POST['access_token'];
		$_SESSION["business"]["uuid"] = $_POST['businessID'];
}
 ?>

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="row m-content marginTopHeader" style="">
				<div class="col-12 d-flex justify-content-between align-items-center mb-5">
					<div class="pageHeader px-0">
						<?php echo $translations["M01975"][$language]; /* Buy Crypto */?>
					</div>
					<div>
						<a href="sellCrypto.php"><?php echo $translations["M02085"][$language]; /* Sell Crypto */?> ></a>
					</div>

					
				</div>

				<div class="col-12 w-100 p-0" >
					<div class="row m-0 p-0">
						<div class="col-md-6 col-xs-12 paymentChnDiv">
							<div class="bigText w-100">
								<?php echo $translations["M01970"][$language]; /* Payment Channel */?>
							</div>

							<!-- SIMPLEX DIV -->
							<div class="bg-white rounded d-flex w-100 p-3" id="simplexDiv" style="display: none;">
								<div id="radDiv" class="d-flex justify-content-center align-items-center p-3">
									<input type="radio" id="paymentRadioBtn" name="paymentRadio" value="Simplex">
								</div>

								<div class="d-flex justify-content-start align-items-center w-100">

									<div class="d-flex align-items-center" style="position:relative;">
										<img id="imgSimplexIcon" src="./images/buycrypto/visamastercardpic.png" style="height:35px; ">

									</div>

									<div class="d-flex align-items-center w-100 justify-content-end" style="position: relative;">
										<img id="imgSimplex" src="./images/buycrypto/simplex.png" style="height: 35px;">
									</div>

								</div>
							</div>
							
							<!-- XANPOOL DIV -->
							<div class="bg-white rounded d-flex w-100 p-3" id="xanpoolDiv" style="display: none;">
													
								<div id="radDiv" class="d-flex justify-content-center align-items-center p-3">
									<input type="radio" id="paymentRadioBtn" name="paymentRadio" value="Xanpool">
								</div>

								<div class="d-flex justify-content-start align-items-center w-100">

									<div class="d-flex align-items-center" id="paymentLogoContainer">
										
									</div>

									<div class="d-flex align-items-center justify-content-end w-100">
										<img alt="NuxPay-payment" id="imgXanpool" src="./images/buycrypto/xanpool.png" style="height: 15px;">
									</div>	
								</div>

							</div>

							<!-- FIAT CURRENCY DIV -->
							<div id="fiatCurrencyDiv" class="mt-3">

								<div class="input-group">
									<input id="fiatAmount" type="text" class="form-control rounded-left" aria-label="Text input with dropdown button" placeholder="<?php echo $translations["M00331"][$language]; /* Amount */?>" autocomplete="no" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
									<select class="searchDesign" id="fiatCurrency" style="width: 110px;"></select>
								</div>

								<div class="alertError" style="color:red; font-size:12px;"></div>
								<div class="alertCryptoError" style="color:red; font-size:12px;"></div>

								<div class="w-100">
									<div class="estimateReceiveAmount d-flex">
										<span>&#8776;</span>
										<span id="estimateReceiveAmount"></span>
									</div>
								</div>

							</div>

							<!-- AMOUNT DIV -->
							<div id="amountDiv" class="mt-3">
								<div class="input-group">
									<input id="amount" type="hidden" class="form-control rounded-left" aria-label="Text input with dropdown button" placeholder="" autocomplete="no" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
									<select class="searchDesign" id="walletType" style="width: 100% !important;"></select>
								</div>
							</div>

						</div>

						<div class="col-md-6 col-xs-12">
							<div id="summaryDiv">
								<div class="shadow bg-white rounded p-4" id="">
									<div class="bigText mb-3">
										<?php echo $translations["M01969"][$language]; /* Payment Summary */?>
									</div>

									<div class="d-flex justify-content-between align-items-center mb-2">
										<span><?php echo $translations["M01970"][$language]; /* Payment Channel */?></span>
										<span>
											<img src='images/buycrypto/simplex.png' style="width: 100px;" class="paymentChannelImg">
										</span>
									</div>

									<div class="d-flex justify-content-between align-items-center mb-3" id="amountToBuyID">
										<span style=""><?php echo $translations["M01565"][$language]; /* Amount to Pay */?></span>
										<span id="estimatedPayAmountUSD2" style="text-align: right; color: grey;"></span>
									</div>

									<div class="d-flex justify-content-between align-items-center mb-3" id="estimateAmountPayID">
										<span id="estimatedPayAmountUSD" style=""><?php echo $translations["M02086"][$language]; /* Estimated Receivable Amount */?></span>
										<span id="amountBuy" style="text-align: right; color: grey;"></span>
									</div>

									<div class="" style="margin-left: 2px; margin-top: 40px;">
										<button id="btnCreate" class="btn searchBtn" type="button" style="width: 100%;" disabled><?php echo $translations["M01974"][$language]; /* Continue */?></button>
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
	var divId = 'transactionHistoryListDiv';
	var tableId = 'transactionHistoryListTable';
	var pagerId = 'transactionHistoryPager';
	var btnArray = {};
	var thArray = Array();


	var url = 'scripts/reqPaymentGateway.php';
	var method = 'POST';
	var debug = 0;
	var bypassBlocking = 0;
	var bypassLoading = 0;
	var pageNumber = 1;
	var formData = "";
	var fCallback = "";
	var dropdownFake;
	var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';
	var selectedRate = "";
	var selectedFiatRate = "";
	var selectedUSDRate = "";
	var selectedSymbol = "";
	var calBuyAmount = "";
	var calBuyCryptoAmount = "";
	var walletTypeImage = [];
	var minAmount = "";
	var maxAmount = "";
	var minCryptoAmount = "";
	var maxCryptoAmount = "";
	var quoteID = "";
	var cryptoAmount = "";
	var currencySettingData = "";
	var userCurrency = "";

	var setting_data = "";
	
	if (hasChangedPassword == 0) {
		$.redirect('firstTimeLogin.php');
	}

	$(document).ready(function() {

		formData = {
			command: 'getBuyCryptoSetting',
			provider: Array('simplex', 'xanpool')
		};

		fCallback = getBuyCryptoSetting;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		$("#amount").keyup(function(event) {

			var inputAmount = this.value;
			var amount_parts = inputAmount.toString().split(".");

			if (inputAmount == ".") {
				this.value = "";
			} else if (amount_parts.length == 3) {
				inputAmount = amount_parts[0] + "." + amount_parts[1];
				this.value = inputAmount;
			}

			showSummary();
		});

		$("#fiatAmount").keyup(function(event) {
			var selectedCurrency = $('#fiatCurrency').find(':selected').val().toUpperCase();
			var selectedWalletSymbol = $('#walletType').find(':selected').data('symbol');
			var inputAmount = this.value;
			var amount_parts = inputAmount.toString().split(".");
			var fiatSymbol = $('#fiatCurrency').val();

			if (inputAmount == ".") {
				this.value = "";
			} else if (amount_parts.length == 3) {
				inputAmount = amount_parts[0] + "." + amount_parts[1];
				this.value = inputAmount;
			}

			if (inputAmount != "") {
				minAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_amount'];
				maxAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_amount'];

				minCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_crypto_amount'];
				maxCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_crypto_amount'];
				
				selectedRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['crypto_converted_amount'];
				var selectedFiatCurrencyRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['fiat_converted_amount'];

				var minCryptoFiatAmount = (minCryptoAmount * selectedRate);
				
				if (parseFloat(inputAmount) < DecimalPrecision.ceil(minCryptoFiatAmount,2)) {
					// if (parseFloat(minAmount) > DecimalPrecision.ceil(minCryptoFiatAmount,2)) {
					// 	$('.alertError').text('Requires minimum purchase of ' + DecimalPrecision.ceil(minAmount,2) + ' ' + fiatSymbol.toUpperCase());
					// } else {
						$('.alertError').text('Requires minimum purchase of ' + DecimalPrecision.ceil(minCryptoFiatAmount,2) + ' ' + fiatSymbol.toUpperCase());

					// }
					$('.alertError').show();
					$(".estimateReceiveAmount").hide();
					$('#btnCreate').prop("disabled", true);


				} else if (parseFloat(inputAmount) > DecimalPrecision.floor(maxAmount,2)) {
					$('.alertError').text('Limit exceeded! Maximum limit per transaction is ' + DecimalPrecision.floor(maxAmount,2) + ' ' + fiatSymbol.toUpperCase());
					$('.alertError').show();
					$(".estimateReceiveAmount").hide();
					$('#btnCreate').prop("disabled", true);

				} else {
					$('.alertError').hide();
					$(".estimateReceiveAmount").show();
					$('#btnCreate').prop("disabled", false);


				}

			} else {
				$('.alertError').hide();
				$(".estimateReceiveAmount").show();
				$('#btnCreate').prop("disabled", true);



			}
			showFiatSummary();
		});


		$('#btnCreate').click(function() {

			var amount = sanitize($('#amount').val());
			var coinImage = walletTypeImage[$('#walletType').val()];
			var providerName = $('input[name="paymentRadio"]:checked').val();
			var selectedWalletType = $('#walletType').val();
			var fiatAmount = sanitize($('#fiatAmount').val());
			var selectedFiatCurrency = $('#fiatCurrency').val();



			if (amount == "" || amount == 0) {

				showMessage('<?php echo $translations["M01966"][$language]; /* Amount cannot be empty. */?>', 'warning', '', 'warning', '');

			} else {

				var providerName = $('input[name="paymentRadio"]:checked').val();

				if (providerName == 'Simplex') {
					//					formData = {
					//						command: 'getSimplexQuote',
					//						wallet_type: selectedWalletType,
					//						fiat_currency: selectedFiatCurrency,
					//						requested_currency: selectedFiatCurrency,
					//						requested_amount: fiatAmount,
					//						transaction_type: 'buy',
					//						payment_method_type: Array('credit_card'),
					//
					//
					//					};
					//
					//
					//					fCallback = getSimplexQuote;
					//					ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

					$.redirect('buyCryptoConfirmation.php', {
						symbol: selectedSymbol,
						amount: cryptoAmount,
						fiatSymbol: selectedFiatCurrency,
						estimatePriceUSD: selectedRate,
						estimateAmountPayUSD: fiatAmount,
						coinImage: coinImage,
						providerName: providerName,
						quoteID: quoteID,
						walletType: selectedWalletType
					});

				} else if (providerName == 'Xanpool') {
					formData = {
						command: 'getXanpoolQuote',
						wallet_type: selectedWalletType,
						fiat_currency: selectedFiatCurrency,
						requested_currency: selectedFiatCurrency,
						fiat_amount: fiatAmount,
						transaction_type: 'buy'

					};


					fCallback = getXanpoolQuote;
					ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
				}


			}


		});

		$('#walletType').change(function() {
			//			$('#amountToBuyID').hide();
			//			$('#estimateAmountPayID').hide();
			$('#btnCreate').prop("disabled", true);
			$('#fiatAmount').keyup();
			
			getConversionRate();
			showFiatSummary();
		});

		$('#fiatCurrency').change(function() {
			var selectedCurrency = $('#fiatCurrency').val();
			selectedCurrency = selectedCurrency.toUpperCase();
			$('#estimatedPrice').text('Estimated Price(' + selectedCurrency + ')');
			//			$('#estimatedPayAmountUSD').text('Estimated Amount to Pay (' + selectedCurrency + ')');
			$('#fiatAmount').keyup();

			getConversionRate();
			showFiatSummary();

		});

		$('#fiatCurrency').on('change', function() {
			var provider = $("input[name='paymentRadio']:checked").val();
			var selectedCurrency = $('#fiatCurrency').val();
			var child;
			selectedCurrency = selectedCurrency.toUpperCase();
			// <img id="imgXanpoolIcon" class="hideShowPaymentLogo MYR" src="./images/buycrypto/duitnow.png" style="height: 40px;">
			// 							<img id="imgXanpoolIcon" class="hideShowPaymentLogo HKD" src="./images/buycrypto/FPS.png" style="height: 40px;">
			// 							<img id="imgXanpoolIcon" class="hideShowPaymentLogo IDR" src="./images/buycrypto/Gojek.png" style="height: 40px;">
			// 							<img id="imgXanpoolIcon" class="hideShowPaymentLogo INR" src="./images/buycrypto/UPI.png" style="height: 35px;">
			// 							<img id="imgXanpoolIcon" class="hideShowPaymentLogo NZD" src="./images/buycrypto/bankTransfer.png" style="height: 40px;">
			// 							<img id="imgXanpoolIcon" class="hideShowPaymentLogo PHP" src="./images/buycrypto/InstaPay.png" style="height: 30px;">
			// 							<img id="imgXanpoolIcon" class="hideShowPaymentLogo SGD" src="./images/buycrypto/PayNow.png" style="height: 40px;">
			// 							<img id="imgXanpoolIcon" class="hideShowPaymentLogo THB" src="./images/buycrypto/PromptPay.png" style="height: 35px;">
			// 							<img id="imgXanpoolIcon" class="hideShowPaymentLogo VND" src="./images/buycrypto/ViettelPay.png" style="height: 40px;">
			// 							<img id="imgXanpoolIcon" class="hideShowPaymentLogo AUD" src="./images/buycrypto/PayId.png" style="height: 40px;">
			if (selectedCurrency == 'MYR') {
				child = '<img id="imgXanpoolIcon" class="hideShowPaymentLogo MYR" src="./images/buycrypto/duitnow.png" style="height: 40px;">';
			} else if (selectedCurrency == 'HKD') {
				child = '<img id="imgXanpoolIcon" class="hideShowPaymentLogo HKD" src="./images/buycrypto/FPS.png" style="height: 40px;">';
			} else if (selectedCurrency == 'IDR') {
				child = '<img id="imgXanpoolIcon" class="hideShowPaymentLogo IDR" src="./images/buycrypto/Gojek.png" style="height: 40px;">';
			} else if (selectedCurrency == 'INR') {
				child = '<img id="imgXanpoolIcon" class="hideShowPaymentLogo INR" src="./images/buycrypto/UPI.png" style="height: 35px;">';
			} else if (selectedCurrency == 'NZD') {
				child = '<img id="imgXanpoolIcon" class="hideShowPaymentLogo NZD" src="./images/buycrypto/bankTransfer.png" style="height: 40px;">';
			} else if (selectedCurrency == 'PHP') {
				child = '<img id="imgXanpoolIcon" class="hideShowPaymentLogo PHP" src="./images/buycrypto/InstaPay.png" style="height: 30px;">';
			} else if (selectedCurrency == 'SGD') {
				child = '<img id="imgXanpoolIcon" class="hideShowPaymentLogo SGD" src="./images/buycrypto/PayNow.png" style="height: 40px;">';
			} else if (selectedCurrency == 'THB') {
				child = '<img id="imgXanpoolIcon" class="hideShowPaymentLogo THB" src="./images/buycrypto/PromptPay.png" style="height: 35px;">';
			} else if (selectedCurrency == 'VND') {
				child = '<img id="imgXanpoolIcon" class="hideShowPaymentLogo VND" src="./images/buycrypto/ViettelPay.png" style="height: 40px;">';
			} else if (selectedCurrency == 'AUD') {
				child = '<img id="imgXanpoolIcon" class="hideShowPaymentLogo AUD" src="./images/buycrypto/PayId.png" style="height: 40px;">';
			}
			
			if(provider == 'Xanpool'){
				$('#paymentLogoContainer').empty().append(child);
				// $('.hideShowPaymentLogo').hide();
				// $("." + selectedCurrency).show();
			} 
			else if(provider == 'Simplex'){
				$('#paymentLogoContainer').empty().append(child);
				// $('.hideShowPaymentLogo').hide();
				// $(".MYR").show();
				// $("." + selectedCurrency).show();
			}
		});

		$('input[name=paymentRadio]').change(function() {
			var provider = $("input[name='paymentRadio']:checked").val();
			$('.alertError').hide();
			$(".estimateReceiveAmount").show();
			$('.alertCryptoError').hide();
			$('#fiatAmount').val('');
			if (provider == 'Simplex') {
				$('.paymentChannelImg').prop('src', 'images/buycrypto/simplex.png');
				//				$('#amountToBuyID').hide();
				//				$('#estimateAmountPayID').hide();
				$('#btnCreate').prop("disabled", true);
			} else if (provider == 'Xanpool') {
				$('.paymentChannelImg').prop('src', 'images/buycrypto/xanpool.png');
			}

			formData = {
				command: 'getSupportedCurrenciesAndWalletType',
				provider: $('input[name="paymentRadio"]:checked').val(),
			}

			fCallback = getSupportedCurrenciesAndWalletType;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

			// formData = {
			// 	command: 'getSupportedCurrencies',
			// 	provider: $('input[name="paymentRadio"]:checked').val(),
			// };

			// fCallback = getSupportedCurrencies;
			// ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


			// formData = {
			// 	command: 'getWalletType',
			// 	provider: $('input[name="paymentRadio"]:checked').val(),
			// };

			// fCallback = getWalletType;
			// ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
					 

		});

		$('#simplexDiv').click(function() {
			$("input[name=paymentRadio][value='Simplex']").prop("checked", true);
			$("#paymentRadioBtn").trigger("change");
		});

		$('#xanpoolDiv').click(function() {
			$("input[name=paymentRadio][value='Xanpool']").prop("checked", true);
			$("#paymentRadioBtn").trigger("change");
		});

		$("#fiatAmount").focus(function() {
			var fiatValue = $("#fiatAmount").val();
			if (fiatValue == '0') {
				$("#fiatAmount").val("");
			}
		});

	});

	function getCurrentProvider() {
		var provider = $('input[name="paymentRadio"]:checked').val();

		if (provider == 'Simplex') {
			$('.paymentChannelImg').prop('src', 'images/buycrypto/simplex.png');
			//			$('#amountToBuyID').hide();
			//			$('#estimateAmountPayID').hide();
			$('#btnCreate').prop("disabled", true);
		} else if (provider == 'Xanpool') {
			$('.paymentChannelImg').prop('src', 'images/buycrypto/xanpool.png');


		}

		formData = {
			command: 'getSupportedCurrencies',
			provider: $('input[name="paymentRadio"]:checked').val(),
		};

		fCallback = getSupportedCurrencies;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


		formData = {
			command: 'getWalletType',
			provider: $('input[name="paymentRadio"]:checked').val(),
		};

		fCallback = getWalletType;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		
		var selectedDefaultCurrency = setting_data[provider.toLowerCase()]['default_currency'];

	}

	function getConversionRate() {
		var selectedWalletType = $('#walletType').val();
		var selectedFiatCurrency = $('#fiatCurrency').val();
		$('.alertSymbol').text(selectedFiatCurrency);

		if (selectedWalletType != null && selectedFiatCurrency != null) {
			formData = {
				command: 'getconversionrate',
				amount: 1,
				wallet_type: selectedWalletType,
				fiat_currency_id: selectedFiatCurrency,
				provider: $('input[name="paymentRadio"]:checked').val(),
				type : 'buy',


			};

			fCallback = getConversionRateReturn;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


			//			$.ajax({
			//				type: 'POST',
			//				url: 'scripts/reqPaymentGateway.php',
			//				data: formData,
			//				success: function(result) {
			//					var obj = JSON.parse(result);
			//					getConversionRateReturn(obj, obj.message);
			//				},
			//				error: function(result) {
			//
			//				}
			//			});
		}


	}

	function getConversionRateReturn(data, message) {

		selectedRate = data.data.crypto_converted_amount;
		selectedFiatRate = data.data.fiat_converted_amount;
		selectedUSDRate = data.data.usd_converted_amount;
		selectedSymbol = data.data.currency_unit;
		minAmount = data.data.min_amount;
		maxAmount = data.data.max_amount;
		minCryptoAmount = data.data.min_crypto_amount;
		maxCryptoAmount = data.data.max_crypto_amount;
		currencySettingData = data.data.currency_setting_data;
		var selectedFiatCurrency = $('#fiatCurrency').val();
		var amount = $('#fiatAmount').val();

		var calBuyCryptoAmount = (amount * selectedFiatRate).toFixed(8);

		if (amount != '') {
			$('#estimateReceiveAmount').text(calBuyCryptoAmount + ' ' + selectedSymbol);
			$('#amountBuy').text(calBuyCryptoAmount + ' ' + selectedSymbol);
			$('#estimatedPayAmountUSD2').text(amount + ' ' + selectedFiatCurrency.toUpperCase());
		} else {
			$('#estimateReceiveAmount').text(' 0.00000000 ' + selectedSymbol);
			$('#amountBuy').text("0.00");
			// $('#amountBuy').text("<?php echo $translations["M02087"][$language]; /* Amount too low */?>");
			// $('#estimatedPayAmountUSD2').text('0.00 ');
		}

		//		$('#fiatAmount').keyup();

		//		$('#alertMinAmount').text(minAmount);
		//		$('#alertMaxAmount').text(maxAmount);
		// $('#alertSymbol').text(selectedSymbol);

		//		showFiatSummary();
	}

	function showSummary() {

		var amount = sanitize($('#amount').val());
		var selectedCurrency = $('#fiatCurrency').find(':selected').val().toUpperCase();

		if (amount == "") {
			amount = 0;
		}
	}

	function showFiatSummary() {
		var amount = sanitize($('#fiatAmount').val());
		var selectedCurrency = $('#fiatCurrency').find(':selected').val().toUpperCase();
		var coinImage = walletTypeImage[$('#walletType').val()];
		var providerName = $('input[name="paymentRadio"]:checked').val();
		var selectedWalletType = $('#walletType').val();
		var selectedWalletSymbol = $('#walletType').find(':selected').data('symbol');
		calBuyAmount = amount;
		calBuyCryptoAmount = (amount * selectedFiatRate).toFixed(8);
		if (amount != "") {
			if (providerName == 'Simplex') {
				if (parseFloat(amount) >= parseFloat(minAmount) && parseFloat(amount) <= parseFloat(maxAmount)) {
					formData = {
						command: 'getSimplexQuote',
						wallet_type: selectedWalletType,
						fiat_currency: selectedCurrency,
						fiat_amount: amount,
						transaction_type: 'buy',
						payment_method_type: Array('credit_card'),

					};

					fCallback = getSimplexQuote;
					ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
				} else {
					//				$('#amountToBuyID').hide();
					//				$('#estimateAmountPayID').hide();
					// $('#amountBuy').text(thousands_separators(calBuyCryptoAmount) + " " + selectedSymbol);
					if (parseFloat(amount) < parseFloat(minAmount)) {
						$('#amountBuy').text("<?php echo $translations["M02087"][$language]; /* Amount too low */?>");
					} 
					else if (parseFloat(amount) > parseFloat(maxAmount)) {
						$('#amountBuy').text("<?php echo $translations["M02088"][$language]; /* Amount too high */?>");
					}
					else if (parseFloat(amount) == 0){
						$('#amountBuy').text("0.00");
					}
					$('#estimateReceiveAmount').text(thousands_separators(calBuyCryptoAmount) + " " + selectedSymbol);
					$('#estimatedPayAmountUSD2').text(calBuyAmount + ' ' + selectedCurrency);
					$('#btnCreate').prop("disabled", true);

				}
			} else {
				if (amount == "") {
					amount = 0;
				}
				//		$('#estimatedUnitPriceUSD').text("$"+thousands_separators(selectedRate));
				
				minAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_amount'];
				maxAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_amount'];

				minCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_crypto_amount'];
				maxCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_crypto_amount'];
				
				selectedRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['crypto_converted_amount'];
				var selectedFiatCurrencyRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['fiat_converted_amount'];
						
				calBuyAmount = amount;
				calBuyCryptoAmount = (amount / selectedRate).toFixed(8);
				
				var minCryptoFiatAmount = (minCryptoAmount / selectedFiatCurrencyRate).toFixed(2);

				$('#amountBuy').text(thousands_separators(calBuyCryptoAmount) + " " + selectedSymbol);
				$('#estimateReceiveAmount').text(thousands_separators(calBuyCryptoAmount) + " " + selectedSymbol);
				$('#estimatedPayAmountUSD2').text(calBuyAmount + ' ' + selectedCurrency);
				$('#amount').val(calBuyCryptoAmount);

				if ($(".alertError").is(":visible")) {
					//				alert("The paragraph  is visible.");
					if (parseFloat(calBuyCryptoAmount) < parseFloat(minCryptoAmount) || parseFloat(amount) < parseFloat(minAmount)) {
						$('#amountBuy').text("<?php echo $translations["M02087"][$language]; /* Amount too low */?>");
					} 
					else if (parseFloat(calBuyCryptoAmount) > parseFloat(maxCryptoAmount)) {
						$('#amountBuy').text("<?php echo $translations["M02088"][$language]; /* Amount too high */?>");
					}
					else if (parseFloat(calBuyCryptoAmount) == 0 || parseFloat(amount) == 0){
						$('#amountBuy').text("0.00");
					}
					$(".estimateReceiveAmount").hide();
					$('.alertCryptoError').hide();
//					$('#fiatAmount').keyup();

				} else {

					if (parseFloat(amount) < DecimalPrecision.ceil(minCryptoFiatAmount,2)) {

						if (parseFloat(minAmount) > parseFloat(minCryptoFiatAmount)) {

							$('.alertCryptoError').text('Requires minimum purchase of ' + DecimalPrecision.ceil(minAmount,2) + ' ' + selectedCurrency.toUpperCase());
						} else {
							$('.alertCryptoError').text('Requires minimum purchase of ' + DecimalPrecision.ceil(minCryptoFiatAmount,2) + ' ' + selectedCurrency.toUpperCase());

						}
						$(".estimateReceiveAmount").hide();
						$('.alertCryptoError').show();
						$('#btnCreate').prop("disabled", true);

					} else if (parseFloat(amount) > DecimalPrecision.floor(maxAmount,2)) {
						$('.alertCryptoError').text('Limit exceeded! Maximum limit per transaction is ' + DecimalPrecision.floor(maxAmount,2) + ' ' + selectedCurrency.toUpperCase());
						$('.alertCryptoError').show();
						$('#btnCreate').prop("disabled", true);

					} else {
						$('.alertCryptoError').hide();
						$('#amountToBuyID').show();
						$('#estimateAmountPayID').show();
						$('#btnCreate').prop("disabled", false);

					}
				}

			}
		} else {
			$('.alertCryptoError').hide();
			$('#btnCreate').prop("disabled", true);
		}




	}

	function thousands_separators(num) {
		var num_parts = num.toString().split(".");
		num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		return num_parts.join(".");
	}

	function getBuyCryptoSetting(data, message) {

		setting_data = data.setting_data;
		var return_data = data.data;
	
		$.each(setting_data, function(key, val) {
			$.each(val, function(key1, val1) {
				if (key == 'simplex') {
					if (key1 == 'isEnabled') {
						if (val1 == '1') {
							$('#simplexDiv').show();

						} else {
							$('simplexDiv').hide();
							$('input[name=paymentRadio][value=Simplex]').attr("disabled", true);

						}
					}
				} else if (key == 'xanpool') {
					if (key1 == 'isEnabled') {
						if (val1 == '1') {
							$('#xanpoolDiv').show();


						} else {
							$('xanpoolDiv').hide();
							$('input[name=paymentRadio][value=Xanpool]').attr("disabled", true);


						}
					}
				}


			});
		});
		$("input[name=paymentRadio][disabled!=disabled]:first").attr('checked', true);
		
		getCurrentProvider();
		
		


	}

	function getWalletType(data, message) {

		var dropdownFake = 0;
		if (data.data.currency_list && dropdownFake != 1) {
			$('#walletType').empty();

			$.each(data.data.currency_list, function(key, val) {
				$('#walletType').append('<option data-image="' + val['image'] + '" data-symbol="' + val['symbol'].toUpperCase() + '" value="' + val['currency_id'] + '">' + val['name'] + '</option>');

				walletTypeImage[val['wallet_type']] = val['image'];


			});
			dropdownFake = 1;
		}


		function formatState(method) {
			if (!method.id) {
				return method.text;
			}

			var optimage = $(method.element).attr('data-image')
			if (!optimage) {
				return method.text;
			} else {
				var $opt = $(
					'<span><img src="' + optimage + '" class="walletTypeIcon" /> <span style="vertical-align: middle;">' + method.text + '</span></span>'
				);
				return $opt;
			}
		};


		$('#walletType').select2({
			dropdownAutoWidth: true,
			templateResult: formatState,
			templateSelection: formatState
		});
		getConversionRate();

	}



	function getSupportedCurrencies(data, message) {

		if (data.data.country_list) {
			$('#fiatCurrency').empty();
			$.each(data.data.country_list, function(key, val) {
				$('#fiatCurrency').append('<option data-image="' + val['image'] + '" value="' + val['currency_id'] + '">' + val['name'] + '</option>');

			});
			//            dropdownFake = 1;

		}

		function formatState(method) {
			if (!method.id) {
				return method.text;
			}

			var optimage = $(method.element).attr('data-image')
			if (!optimage) {
				return method.text;
			} else {
				var $opt = $(
					'<span><img src="' + optimage + '" class="walletTypeIcon" /> <span style="vertical-align: middle;">' + method.text + '</span></span>'
				);
				return $opt;
			}
		};

		$('#fiatCurrency').select2({
			dropdownAutoWidth: true,
			templateResult: formatState,
			templateSelection: formatState
		});

		getConversionRate();
		var selectedCurrency = $('#fiatCurrency').find(':selected').val().toUpperCase();
		$('#estimatedPrice').text('Estimated Price (' + selectedCurrency + ')');
		//		$('#estimatedPayAmountUSD').text('Estimated Amount to Pay (' + selectedCurrency + ')');
		
		var provider = $('input[name="paymentRadio"]:checked').val();
		
		var selectedDefaultCurrency = setting_data[provider.toLowerCase()]['default_currency'];

		$('#fiatCurrency').val(selectedDefaultCurrency).trigger('change');

	}

	function getSupportedCurrenciesAndWalletType(data, message){
		if (data.data.country_list) {
			$('#fiatCurrency').empty();
			$.each(data.data.country_list, function(key, val) {
				$('#fiatCurrency').append('<option data-image="' + val['image'] + '" value="' + val['currency_id'] + '">' + val['name'] + '</option>');

			});
			//            dropdownFake = 1;

		}
		
		var dropdownFake = 0;
		if (data.data.currency_list && dropdownFake != 1) {
			$('#walletType').empty();

			$.each(data.data.currency_list, function(key, val) {
				$('#walletType').append('<option data-image="' + val['image'] + '" data-symbol="' + val['symbol'].toUpperCase() + '" value="' + val['currency_id'] + '">' + val['name'] + '</option>');

				walletTypeImage[val['wallet_type']] = val['image'];


			});
			dropdownFake = 1;
		}

		function formatState(method) {
			if (!method.id) {
				return method.text;
			}

			var optimage = $(method.element).attr('data-image')
			if (!optimage) {
				return method.text;
			} else {
				var $opt = $(
					'<span><img src="' + optimage + '" class="walletTypeIcon" /> <span style="vertical-align: middle;">' + method.text + '</span></span>'
				);
				return $opt;
			}
		};

		$('#walletType').select2({
			dropdownAutoWidth: true,
			templateResult: formatState,
			templateSelection: formatState
		});

		$('#fiatCurrency').select2({
			dropdownAutoWidth: true,
			templateResult: formatState,
			templateSelection: formatState
		});

		getConversionRate();
		var selectedCurrency = $('#fiatCurrency').find(':selected').val().toUpperCase();
		$('#estimatedPrice').text('Estimated Price (' + selectedCurrency + ')');
		//		$('#estimatedPayAmountUSD').text('Estimated Amount to Pay (' + selectedCurrency + ')');
		
		var provider = $('input[name="paymentRadio"]:checked').val();
		
		var selectedDefaultCurrency = setting_data[provider.toLowerCase()]['default_currency'];

		$('#fiatCurrency').val(selectedDefaultCurrency).trigger('change');

	}

	function getSimplexQuote(data, message) {
		quoteID = data.data.quote_id;

		var amount = sanitize($('#amount').val());
		var coinImage = walletTypeImage[$('#walletType').val()];
		var providerName = $('input[name="paymentRadio"]:checked').val();
		var selectedWalletType = $('#walletType').val();
		var selectedFiatCurrency = $('#fiatCurrency').val().toUpperCase();

		//		var estimateAmountoPay = data.data.requested_amount;
		var estimateAmountToPay = data.data.requested_amount;
		cryptoAmount = data.data.crypto_amount;
		selectedSymbol = data.data.symbol;
		//		$.redirect('buyCryptoConfirmation.php', {
		//			symbol: selectedSymbol,
		//			amount: cryptoAmount,
		//			fiatSymbol: selectedFiatCurrency,
		//			estimatePriceUSD: selectedRate,
		//			estimateAmountPayUSD: estimateAmountToPay,
		//			coinImage: coinImage,
		//			providerName: providerName,
		//			quoteID: quoteID,
		//			walletType: selectedWalletType
		//		});

		$('#amountBuy').text(thousands_separators(cryptoAmount) + " " + selectedSymbol);
		$('#estimateReceiveAmount').text(thousands_separators(cryptoAmount) + " " + selectedSymbol);
		$('#estimatedPayAmountUSD2').text(estimateAmountToPay + ' ' + selectedFiatCurrency);
		$('#amount').val(cryptoAmount);

		$('#amountToBuyID').show();
		$('#estimateAmountPayID').show();
		$('#btnCreate').prop("disabled", false);
		if ($(".alertError").is(":visible")) {
            $('#btnCreate').prop("disabled", true);
        }
	}

	function getXanpoolQuote(data, message) {

		var amount = sanitize($('#amount').val());
		var coinImage = walletTypeImage[$('#walletType').val()];
		var providerName = $('input[name="paymentRadio"]:checked').val();
		var selectedWalletType = $('#walletType').val();
		var selectedFiatCurrency = $('#fiatCurrency').val();

		$.redirect('buyCryptoConfirmation.php', {
			symbol: selectedSymbol,
			amount: amount,
			fiatSymbol: selectedFiatCurrency,
			estimatePriceUSD: selectedRate,
			estimateAmountPayUSD: calBuyAmount,
			coinImage: coinImage,
			providerName: providerName,
			walletType: selectedWalletType
		});


	}

	var DecimalPrecision = (function() {
		if (Math.sign === undefined) {
			Math.sign = function(x) {
				return ((x > 0) - (x < 0)) || +x;
			};
		}
		if (Math.trunc === undefined) {
			Math.trunc = function(v) {
				return v < 0 ? Math.ceil(v) : Math.floor(v);
			};
		}
		var decimalAdjust = function myself(type, num, decimalPlaces) {
			if (type === 'round' && num < 0)
				return -myself(type, -num, decimalPlaces);
			var shift = function(value, exponent) {
				value = (value + 'e').split('e');
				return +(value[0] + 'e' + (+value[1] + (exponent || 0)));
			};
			var n = shift(num, +decimalPlaces);
			return shift(Math[type](n), -decimalPlaces);
		};
		return {
			// Decimal round (half away from zero)
			round: function(num, decimalPlaces) {
				return decimalAdjust('round', num, decimalPlaces);
			},
			// Decimal ceil
			ceil: function(num, decimalPlaces) {
				return decimalAdjust('ceil', num, decimalPlaces);
			},
			// Decimal floor
			floor: function(num, decimalPlaces) {
				return decimalAdjust('floor', num, decimalPlaces);
			},
			// Decimal trunc
			trunc: function(num, decimalPlaces) {
				return decimalAdjust('trunc', num, decimalPlaces);
			},
			// Format using fixed-point notation
			toFixed: function(num, decimalPlaces) {
				return decimalAdjust('round', num, decimalPlaces).toFixed(decimalPlaces);
			}
		};
	})();



</script>

<style>
	#radDiv {
		/*		margin-top: 30px;*/
		/*		margin-right: 5px;*/
	}

	#imgBinance {
		width: 180px;
		height: 40px;
		margin-right: 15px;
		/*		margin-top: 22px;*/
	}

	#imgSimplex {
		height: 25px;
		margin-right: 15px;
		/*		margin-top: 22px;*/
	}

	#imgXanpool {
		height: 15px;
		margin-right: 15px;
		/*		margin-top: 22px;*/
	}

	#imgSimplexIcon {
		height: 40px;
		margin-right: 15px;

	}

	#imgXanpoolIcon {
		height: 40px;
		margin-right: 15px;

	}

	#imgMaster {
		width: 67px;
		height: 22px;
		/*		margin-top: 32px;*/
	}

	#summaryDiv {

		padding-left: 0;
		padding-right: 0;
		padding-top: 0;
		padding-bottom: 0;

		margin-left: 0;
		margin-right: 0;
		margin-top: 0;
		margin-bottom: 0;
	}

	#estimatedPayAmountUSD {
		width: 230px;
	}

	#estimatedPayAmountUSD2 {
		width: calc(100% - 230px);
	}

	/*
	#amountDiv {
		padding-right: 10px;
	}
*/

	#paymentmethodDiv {
		/*		padding-right: 10px;*/
		/*		margin-left: 12px;*/
	}

	@media (max-width: 1220px) {

		#radDiv {
			/*			margin-top: 32px;*/
		}

		#imgBinance {
			width: 130px;
			height: 29px;
		}

		#imgSimplex {
			height: 39px;
		}

		#imgXanpool {
			height: 29px;
		}

		#imgSimplexIcon {
			height: 29px;
		}

		#imgXanpoolIcon {
			height: 29px;
		}

		#imgMaster {
			/*			margin-top: 26px;*/
		}
	}

	@media (max-width: 768px) {

		#summaryDiv {
			padding-top: 32px;
		}

		#amountDiv {
			padding-right: 0;
		}

		#paymentmethodDiv {
			padding-right: 0;
		}
	}

	@media (max-width: 500px) {

		#estimatedPayAmountUSD {
			width: 160px;
		}

		#estimatedPayAmountUSD2 {
			width: calc(100% - 160px);
		}
	}

* {
	margin: 0;
	padding: 0;
}
</style>
