<?php include 'include/config.php'; ?>
<?php include 'headHomepage.php'; ?>

<?php

 ?>

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default" style="background-color:#f9f9fc !important;">
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<div id="checkoutHeader" class="py-2">
			<a href='index.php'><img id="checkoutHeaderLogo" src="<?php echo $dashboardLogo; ?>"></a>
		</div>
		<div class="m-grid__item m-grid__item--fluid m-wrapper mb-5">

			<div class="row m-content marginTopHeader" style="">
				<div class="col-12 p-5">
					<div class="col-12 row justify-content-between align-items-center">
						<div class="pageHeader px-0">
							Buy Crypto
						</div>

						<div class="col-12 mt-5">
							<div class=" row justify-content-between">
								<div class="col-lg-5 col-12 mt-lg-0 mt-md-3">
									<div class="row">
										<div id="paymentChnDiv" class="col-12 row">

											<div class="bigText">
												Payment Channel
											</div>

											<div id="paymentmethodDiv" class="w-100 d-none">


												<div class="col-12 bg-white rounded py-2 mt-2" id="simplexDiv" style=" display:none;">
													<div class="row" >

														<div id="radDiv" class="pl-4 d-flex align-items-center" style="width:10%; transform:scale(1.2, 1.2);">
															<input type="radio" id="paymentRadioBtn" name="paymentRadio" value="Simplex">
														</div>

														<div class="d-flex justify-content-between" style="width:90%;">

															<div class="pl-4 d-flex align-items-center" style="position:relative;">
																<img id="imgSimplexIcon" src="./images/buycrypto/visamastercardpic.png" style="height:35px; ">

															</div>

															<div class="pl-4 d-flex align-items-center" style="">
																<img id="imgSimplex" src="./images/buycrypto/simplex.png" style="">
															</div>

														</div>

													</div>

												</div>
												<div class="col-12 bg-white rounded py-2 mt-2" id="xanpoolDiv" style=" display:none;">
													<div class="row">
													
														<div id="radDiv" class="pl-4 d-flex align-items-center" style="width:10%; transform:scale(1.2, 1.2);">
															<input type="radio" id="paymentRadioBtn" name="paymentRadio" value="Xanpool">
														</div>

														<div class="d-flex justify-content-between" style="width:90%;">

															<div class="pl-4 d-flex align-items-center" style="">
																<img id="imgXanpoolIcon" class="hideShowPaymentLogo MYR" src="./images/buycrypto/duitnow.png" style="height: 40px;">
																<img id="imgXanpoolIcon" class="hideShowPaymentLogo HKD" src="./images/buycrypto/FPS.png" style="height: 40px;">
																<img id="imgXanpoolIcon" class="hideShowPaymentLogo IDR" src="./images/buycrypto/Gojek.png" style="height: 40px;">
																<img id="imgXanpoolIcon" class="hideShowPaymentLogo INR" src="./images/buycrypto/UPI.png" style="height: 35px;">
																<img id="imgXanpoolIcon" class="hideShowPaymentLogo NZD" src="./images/buycrypto/bankTransfer.png" style="height: 40px;">
																<img id="imgXanpoolIcon" class="hideShowPaymentLogo PHP" src="./images/buycrypto/InstaPay.png" style="height: 30px;">
																<img id="imgXanpoolIcon" class="hideShowPaymentLogo SGD" src="./images/buycrypto/PayNow.png" style="height: 40px;">
																<img id="imgXanpoolIcon" class="hideShowPaymentLogo THB" src="./images/buycrypto/PromptPay.png" style="height: 35px;">
																<img id="imgXanpoolIcon" class="hideShowPaymentLogo VND" src="./images/buycrypto/ViettelPay.png" style="height: 40px;">
																<img id="imgXanpoolIcon" class="hideShowPaymentLogo AUD" src="./images/buycrypto/PayId.png" style="height: 40px;">
															</div>

															<div class="pl-4 d-flex align-items-center" style="">
																<img id="imgXanpool" src="./images/buycrypto/xanpool.png" style="">
															</div>

														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="fiatCurrencyDiv" class="col-12 row mt-5">

											<div class="input-group">
												<input id="fiatAmount" type="text" class="form-control rounded-left" aria-label="Text input with dropdown button" placeholder="<?php echo $translations["M00331"][$language]; /* Amount */?>" autocomplete="no" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" >

												<select class="searchDesign" id="fiatCurrency" style="width: 120px;"></select>

											</div>
											<div class="alertError" style="color:red; font-size:12px;"></div>
											<div class="alertCryptoError" style="color:red; font-size:12px;"></div>

											<div class="col-12">
												<div class="row estimateReceiveAmount">
													<span>&#8776;</span>
													<span id="estimateReceiveAmount"></span>
												</div>
											</div>


											<!--
											<div class="col-12">
												<div class="row">
													<span>&#8776;</span>
													<span id="estimateReceiveAmount"></span>
												</div>
											</div>
-->

										</div>
										<div id="amountDiv" class="col-12 row mt-3">
											<div class="input-group ">
												<input id="amount" type="hidden" class="form-control rounded-left" aria-label="Text input with dropdown button" placeholder="" autocomplete="no" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" disabled>

												<select class="searchDesign" id="walletType" style="width: 100% !important;" disabled></select>
												<span id="walletTypeStatus" style="color: red;"></span>
											</div>
										</div>

									</div>
								</div>

								<div id="summaryDiv" class="col-lg-7 col-12 mt-5" style="">

									<div class="col-12 shadow bg-white rounded" id="" style="padding-top: 30px; padding-bottom: 30px;">

										<div class="col-12 bigText">
											<?php echo $translations["M01969"][$language]; /* Payment Summary */?>
										</div>

										<div class="col-12 mt-5" style="margin-left: 2px;">
											<div class="row justify-content-between">
												<div class="col-md-6 col-12">
													<span style="width: 130px;"><?php echo $translations["M01970"][$language]; /* Payment Channel */?></span>
												</div>
												<div class="col-md-6 col-12 text-md-right text-sm-left ">

													<img src='images/buycrypto/simplex.png' style="width: 100px;" class="paymentChannelImg">

												</div>
											</div>
										</div>

										<div class="col-12 mt-3" style="margin-left: 2px;" id="amountToBuyID">
											<div class="row justify-content-between">
												<div class="col-md-6 col-12">
													<span style="">Amount to Pay</span>
												</div>
												<div class="col-md-6 col-12 text-md-right text-sm-left">

													<span id="estimatedPayAmountUSD2" style="text-align: right; color: grey;"></span>
												</div>
											</div>
										</div>

										<div class="col-12 mt-3" style="margin-left: 2px;" id="estimateAmountPayID">
											<div class="row justify-content-between">
												<div class="col-md-6 col-12">
													<span id="estimatedPayAmountUSD" style="">Estimated Receivable Amount</span>
												</div>
												<div class="col-md-6 col-12 text-md-right text-sm-left">
													<span id="amountBuy" style="text-align: right; color: grey;"></span>
												</div>
											</div>

										</div>
										
										<div class="col-12 mt-5" style="margin-left: 2px;" id="test">
										<mark><?php echo $translations["M02129"][$language]; /* *Extra charges may applied by your credit card issuer */?></mark>
										</div>


										<div class="col-12 row" style="margin-left: 2px; margin-top: 40px;">
											<button id="btnCreate" class="btn primaryBtn" type="button" style="width: 100%;" disabled><?php echo $translations["M01974"][$language]; /* Continue */?></button>
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
	<footer id="footerID" class="m-grid__item m-footer p-3 w-100" style="background-color:#fff;">
		<div class="m-container m-container--fluid m-container--full-height m-page__container">
			<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
				<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
					<span class="m-footer__copyright">
						Copyright &copy; <?php echo date("Y"); ?> <?php echo $sys['companyName']?>. All Rights Reserved.
						<!-- Copyright ©<?php echo date("Y"); ?> • NuxPay.com • <?php echo $translations['M00191'][$language]; //All Rights Reserved?>. --><?php if($sys['isWhitelabel'] != 1){ echo '<a href= "'.$sys['domain'].'/tnc">Terms & Conditions</a> | <a href="'.$sys['domain'].'/privacypolicy">Privacy Policy</a>';}?>
					</span>
				</div>
			</div>
		</div>
	</footer>
	
	</div>

	<?php include('floatedWhatsapp.php'); ?>
	
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
	var selectedSymbol = "<?php echo $_POST['symbol'] ? $_POST['symbol'] : $_GET['symbol'];?>";
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
	var endUserId = "";
	var businessId = "";
	var destinationAddress = "<?php echo $_POST['destinationAddress'] ? $_POST['destinationAddress'] : $_GET['destinationAddress'];?>";
	var providerName = "<?php echo $_POST['providerName'];?>";
	var transactionToken = "<?php echo $_GET['transactionToken']?>";
	var walletType = "<?php echo $_POST['walletType'] ? $_POST['walletType'] : $_GET['walletType'];?>";
	
	var supportedCoinsList = <?php echo json_encode(array("simplex"=> array("btc", "eth", "usdt", "ltc", "bch", 'trx-usdt'), "xanpool" => array("btc", "eth","usdt")))?>;
	
	var setting_data = "";
	var defaultCurrency = "";

	var tokenFiatAmount = "";
    var tokenCryptoAmount = "";

    var allowEditAmount = false;

	$(document).ready(function() {
		if(transactionToken != ""){
			formData = {
				command: 'getBuySellTransactionTokenDetails',
				transaction_token: transactionToken,
				type: 'buy'
			};

			// fCallback = getBuyTransactionTokenDetails;
			// ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);		
			$.ajax({
				type: 'POST',
				url: url,
				data: formData,
				async: false,
				success: function(result) {
					var obj = JSON.parse(result);
					getBuyTransactionTokenDetails(obj, obj.message);

				},
				error: function(result) {
					// alert("Error!");
				}
			});
		}
		else if(transactionToken == "" && walletType !="" && destinationAddress != "" && selectedSymbol != "" ){
			$('#paymentChnDiv').show();
			$('#amount').val('0.00');

		}
		else{
			$('#paymentChnDiv').show();
			$("input[name=paymentRadio][value='Simplex']").prop("checked", true);
			$('#amount').val('0.00');
			showMessage('Access Denied', 'warning', '', 'warning', 'index.php');
		}

		if(providerName == ""){
			$('#paymentmethodDiv').removeClass("d-none");

			$.each(supportedCoinsList, function(key, val) {
				
				if(selectedSymbol.toLowerCase() == 'trx-usdt'){
					$('#paymentChnDiv').hide();
				}
				if(val.includes(selectedSymbol.toLowerCase())){
					var provider_name = key[0].toUpperCase() + key.slice(1);
					$('input[name=paymentRadio][value=' + provider_name + ']').prop("checked", true);
					return false;
				}
			});
		}
		else{
			$('input[name=paymentRadio][value=' + providerName + ']').prop("checked", true);
		}
		
		// $('#amount').val("<?php echo $_POST['amount'] ? $_POST['amount'] : '0.00';?>");


		formData = {
			command: 'getBuyCryptoSetting',
			provider: Array('simplex', 'xanpool'),
			transactionToken : transactionToken
		};

		fCallback = getBuyCryptoSetting;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		// $("#amount").keyup(function(event) {
		// 	var selectedCurrency = $('#fiatCurrency').find(':selected').val().toUpperCase();
		// 	var selectedWalletSymbol = $('#walletType').find(':selected').data('symbol');

		// 	var inputAmount = this.value;
		// 	var amount_parts = inputAmount.toString().split(".");

		// 	if (inputAmount == ".") {
		// 		this.value = "";
		// 	} else if (amount_parts.length == 3) {
		// 		inputAmount = amount_parts[0] + "." + amount_parts[1];
		// 		this.value = inputAmount;
		// 	}


		// 	//			showSummary();

		// 	if (inputAmount != "") {
		// 		// minAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_amount'];
		// 		maxAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_amount'];

		// 		minCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_crypto_amount'];
		// 		maxCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_crypto_amount'];

		// 		selectedRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['crypto_converted_amount'];
		// 		var selectedFiatCurrencyRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['fiat_converted_amount'];
		// 		var minCryptoFiatAmount = (minCryptoAmount / selectedFiatCurrencyRate).toFixed(2);
		// 		minAmount = minCryptoAmount * selectedRate;
		// 		if (parseFloat(inputAmount) < parseFloat(minCryptoAmount)) {
		// 			$('.alertError').text('Requires minimum purchase of ' + minAmount.toFixed(2) + ' ' + selectedCurrency.toUpperCase());

		// 			//					if (parseFloat(minAmount) > parseFloat(minCryptoFiatAmount)) {
		// 			//						$('.alertError').text('Requires minimum purchase of ' + minCryptoAmount + ' ' + fiatSymbol.toUpperCase());
		// 			//					} else {
		// 			//						$('.alertError').text('Requires minimum purchase of ' + minCryptoAmount + ' ' + fiatSymbol.toUpperCase());
		// 			//
		// 			//					}
		// 			$('.alertError').show();
		// 			$(".estimateReceiveAmount").hide();
		// 			$('#btnCreate').prop("disabled", true);


		// 		} else if (parseFloat(inputAmount) > parseFloat(maxCryptoAmount)) {
		// 			$('.alertError').text('Limit exceeded! Maximum limit per transaction is ' + maxAmount + ' ' + selectedCurrency.toUpperCase());
		// 			$('.alertError').show();
		// 			$(".estimateReceiveAmount").hide();
		// 			$('#btnCreate').prop("disabled", true);

		// 		} else {
		// 			$('.alertError').hide();
		// 			$(".estimateReceiveAmount").show();
		// 			$('#btnCreate').prop("disabled", false);


		// 		}

		// 	} else {
		// 		$('.alertError').hide();
		// 		$(".estimateReceiveAmount").show();
		// 		$('#btnCreate').prop("disabled", true);



		// 	}

		// 	if (currencySettingData == "") {
		// 		setTimeout(function() {
		// 			showSummary();
		// 		}, 5000);
		// 	} else {
		// 		showSummary();
		// 	}

		// });

		$("#fiatAmount").keyup(function(event) {
			//var selectedCurrency = $('#fiatCurrency').find(':selected').val().toUpperCase();
			var selectedWalletSymbol = $('#walletType').find(':selected').data('symbol');
			var selectedCurrency = $('#fiatCurrency').find(':selected').val();
			var xanpoolDefaultCurrency = setting_data['xanpool']['defaultCurrency'];
			if(!selectedCurrency){
					selectedCurrency = xanpoolDefaultCurrency;
			}else{
					selectedCurrency = selectedCurrency.toUpperCase();
			}
			var inputAmount = this.value;
			var amount_parts = inputAmount.toString().split(".");

			if (inputAmount == ".") {
				this.value = "";
			} else if (amount_parts.length == 3) {
				inputAmount = amount_parts[0] + "." + amount_parts[1];
				this.value = inputAmount;
			}


			//			showSummary();

			if (inputAmount != "") {
				// minAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_amount'];
				maxAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_amount'];
				

				minCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_crypto_amount'];
				maxCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_crypto_amount'];

				selectedRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['crypto_converted_amount'];
				var selectedFiatCurrencyRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['fiat_converted_amount'];

				var minFiatAmount = (minCryptoAmount * selectedFiatCurrencyRate).toFixed(2);
				minAmount = minCryptoAmount *selectedRate;
				if (parseFloat(inputAmount) < DecimalPrecision.ceil(minAmount,2) ) {
					$('.alertError').text('Requires minimum purchase of ' + DecimalPrecision.ceil(minAmount,2) + ' ' + selectedCurrency.toUpperCase());

					//					if (parseFloat(minAmount) > parseFloat(minCryptoFiatAmount)) {
					//						$('.alertError').text('Requires minimum purchase of ' + minCryptoAmount + ' ' + fiatSymbol.toUpperCase());
					//					} else {
					//						$('.alertError').text('Requires minimum purchase of ' + minCryptoAmount + ' ' + fiatSymbol.toUpperCase());
					//
					//					}
					$('.alertError').show();
					$(".estimateReceiveAmount").hide();
					$('#btnCreate').prop("disabled", true);


				} else if (parseFloat(inputAmount) > DecimalPrecision.floor(maxAmount,2)) {
					$('.alertError').text('Limit exceeded! Maximum amount per transaction is ' + DecimalPrecision.floor(maxAmount,2) + ' ' + selectedCurrency.toUpperCase());
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
			if (currencySettingData == "") {
				setTimeout(function() {
					showFiatSummary();
				}, 5000);
			} else {
				showFiatSummary();
			}
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
						walletType: selectedWalletType,
						destinationAddress: destinationAddress,
						transactionToken: transactionToken,
					});

				} else if (providerName == 'Xanpool') {
					formData = {
						command: 'getXanpoolQuote',
						wallet_type: selectedWalletType,
						fiat_currency: selectedFiatCurrency,
						requested_currency: selectedFiatCurrency,
						fiat_amount: fiatAmount,
						transaction_type: 'buy',
						destination_address: destinationAddress

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
			getConversionRate();

			if (currencySettingData == "") {
				setTimeout(function() {
					showSummary();
					$('#amount').keyup();
				}, 1000);
			} else {
				showSummary();
				$('#amount').keyup();
			}

		});

		$('#fiatCurrency').change(function() {

			if(allowEditAmount==true) {

				selectedCurrency = $('#fiatCurrency').val();
				// selectedCurrency = selectedCurrency.toUpperCase();
				var xanpoolDefaultCurrency = setting_data['xanpool']['defaultCurrency'];
				if(!selectedCurrency){
					selectedCurrency = xanpoolDefaultCurrency;
					$('#fiatCurrency').val(selectedCurrency);
				}
				else{
					selectedCurrency = selectedCurrency.toUpperCase();
				}
				$('#estimatedPrice').text('Estimated Price(' + selectedCurrency + ')');
					//			$('#estimatedPayAmountUSD').text('Estimated Amount to Pay (' + selectedCurrency + ')');

					getConversionRate();
					// if (currencySettingData == "") {
					// 	setTimeout(function() {
					// 		showSummary();

					// 		$('#amount').keyup();
					// 	}, 1000);
					// } else {
					// 	showSummary();

					// 	$('#amount').keyup();
					// }

			} else {

				selectedCurrency = $('#fiatCurrency').val();
				console.log("debug: "+selectedCurrency);

				showCanvas();

				formData = {
					command: 'getBuySellTransactionTokenDetails',
					transaction_token: transactionToken,
					type: 'buy',
					custom_fiat_currency: selectedCurrency
				};

				$.ajax({
					type: 'POST',
					url: url,
					data: formData,
					async: false,
					success: function(result) {
						hideCanvas();
						var obj = JSON.parse(result);
						getBuyTransactionTokenDetails(obj, obj.message);

					},
					error: function(result) {
						hideCanvas();
						// alert("Error!");
					}
				});


				getConversionRate();
			}

			
		});

		$('#fiatCurrency').on('change', function() {
			var provider = $("input[name='paymentRadio']:checked").val();
			var selectedCurrency = $('#fiatCurrency').val();
			if(selectedCurrency){
				selectedCurrency = selectedCurrency.toUpperCase();
			}else{
				var xanpoolSetCurrency = setting_data['xanpool']['defaultCurrency'];
                selectedCurrency = xanpoolSetCurrency;
		        $('#fiatCurrency').val(selectedCurrency);
			}
			var UserSelectedCurrency;
			if(provider == 'Xanpool'){
				$('.hideShowPaymentLogo').hide();
				$("." + selectedCurrency).show();
			} 
			else if(provider == 'Simplex'){
				$(".hideShowPaymentLogo").each(function(){
					if($(this).hasClass(selectedCurrency)){
							UserSelectedCurrency = selectedCurrency;
					}
				});
				$('.hideShowPaymentLogo').hide();
				if(!UserSelectedCurrency){
						var xanpoolDefaultCurrency = setting_data['xanpool']['defaultCurrency'];
						// console.log(xanpoolDefaultCurrency);
						$("." + xanpoolDefaultCurrency).show();
				}else{  
						$("." + UserSelectedCurrency).show();
				}
				//$("." + selectedCurrency).show();
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
			// var selectedDefaultCurrency = setting_data[provider.toLowerCase()]['default_currency'];
            // defaultCurrency = selectedDefaultCurrency;

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

	function getBuyTransactionTokenDetails(data){
		code = data.code;
		message_d = data.message_d;

		if(code == '0'){
			showMessage(message_d, 'warning', '', 'warning', 'index.php');
			$("input[name=paymentRadio][value='Simplex']").prop("checked", true);
		}
		else{
			returnData = data.data;
			cryptoAmount = returnData.crypto_amount;
			tokenCryptoAmount = cryptoAmount;
			tokenFiatAmount = returnData.fiat_amount;
			walletType   = returnData.wallet_type;
			provider = returnData.provider;
			destinationAddress = returnData.destination_address;
			providerName = returnData.provider;
			selectedSymbol = returnData.crypto_symbol;
			endUserId = returnData.end_user_id;
			businessId = returnData.business_id;

			if(providerName != ''){
				$('#paymentChnDiv').hide();
			}
			if(providerName == 'simplex'){
				$("input[name=paymentRadio][value='Simplex']").prop("checked", true);
			}
			else if(providerName == 'xanpool'){
				$("input[name=paymentRadio][value='Xanpool']").prop("checked", true);
			}

			$('#amount').val(tokenCryptoAmount);
			$('#fiatAmount').val(tokenFiatAmount);
			$('#walletType').prop("disabled", true);

			if(parseFloat(cryptoAmount)>0 || parseFloat(tokenFiatAmount)>0) {
				allowEditAmount = false;
				$('#fiatAmount').attr('readonly', true);

			} else {
				allowEditAmount = true;
				$('#fiatAmount').attr('readonly', false);
			}
		}

    }

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
			command: 'getSupportedCurrenciesAndWalletType',
            provider: $('input[name="paymentRadio"]:checked').val(),
		};

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

		var selectedDefaultCurrency = setting_data[provider.toLowerCase()]['default_currency'];
		defaultCurrency = selectedDefaultCurrency;
	}

	function getConversionRate() {
		var selectedWalletType = $('#walletType').val();
		var selectedFiatCurrency = $('#fiatCurrency').val();
		defaultCurrency = selectedFiatCurrency;
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

		currencySettingData = data.data.currency_setting_data;
		selectedSymbol = data.data.currency_unit;
		var selectedFiatCurrency = $('#fiatCurrency').val();
		var xanpoolDefaultCurrency = setting_data['xanpool']['defaultCurrency'];
		if(!selectedFiatCurrency){
				//selectedFiatCurrency = defaultCurrency.toUpperCase();
				//$('#fiatCurrency').val(xanpoolDefaultCurrency);
				selectedFiatCurrency = xanpoolDefaultCurrency;
				//console.log(xanpoolDefaultCurrency);
		}else{
				selectedFiatCurrency = selectedFiatCurrency.toUpperCase();
		} 

		selectedRate = currencySettingData[selectedSymbol][selectedFiatCurrency]['crypto_converted_amount'];
		selectedFiatRate = currencySettingData[selectedSymbol][selectedFiatCurrency]['fiat_converted_amount'];
		selectedUSDRate = data.data.usd_converted_amount;

		var cryptoAmount = "<?php echo $_POST['amount'];?>";
		var fiatAmount = (cryptoAmount * selectedRate).toFixed(2);
		var amount = $('#amount').val();

		if (amount == "") {
			amount = cryptoAmount;
		}
		var selectedFiatCurrency = $('#fiatCurrency').val();

		var calBuyCryptoAmount = (amount * selectedFiatRate).toFixed(8);
		var providerName = $('input[name="paymentRadio"]:checked').val();


		if (amount != '') {
			// if (providerName != 'Simplex') {
				//				$('#estimateReceiveAmount').text(calBuyCryptoAmount + ' ' + selectedSymbol);
				// $('#amountBuy').text(amount + ' ' + selectedSymbol);
				// $('#estimatedPayAmountUSD2').text(fiatAmount + ' ' + selectedFiatCurrency.toUpperCase());
				// $('#fiatAmount').val(fiatAmount);
				//      $('#amountBuy').text('Amount too low');
            	//      $('#estimatedPayAmountUSD2').text(fiatAmount + ' ' + selectedFiatCurrency.toUpperCase());
                //      $('#fiatAmount').val(fiatAmount);
                //      console.log('low amount: '+fiatAmount);

			// }

		} else {
			//			$('#estimateReceiveAmount').text(' 0.00000000 ' + selectedSymbol);
			// $('#amountBuy').text(amount + ' ' + selectedSymbol);
			// 	$('#estimatedPayAmountUSD2').text(fiatAmount + ' ' + selectedFiatCurrency.toUpperCase());
			// 	$('#fiatAmount').val(fiatAmount);
			$('#amountBuy').text('0.00000000 ' + selectedSymbol);
			$('#estimatedPayAmountUSD2').text('0.00 ');
			$('#fiatAmount').val('0.00');

		}

		if (currencySettingData == "") {
			setTimeout(function() {
				$('#fiatAmount').keyup();
			}, 1000);
		} else {
			$('#fiatAmount').keyup();
		}


		//		$('#alertMinAmount').text(minAmount);
		//		$('#alertMaxAmount').text(maxAmount);
		// $('#alertSymbol').text(selectedSymbol);

		//		showFiatSummary();
	}

	function showSummary() {

		var amount = sanitize($('#amount').val());
		var selectedCurrency = $('#fiatCurrency').find(':selected').val().toUpperCase();
		var coinImage = walletTypeImage[$('#walletType').val()];
		var selectedWalletType = $('#walletType').val();
		var selectedWalletSymbol = $('#walletType').find(':selected').data('symbol') ? $('#walletType').find(':selected').data('symbol') : "<?php echo $_POST['symbol'];?>";
		var providerName = $('input[name="paymentRadio"]:checked').val();

		minAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_amount'];
		maxAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_amount'];

		minCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_crypto_amount'];
		maxCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_crypto_amount'];

		selectedRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['crypto_converted_amount'];
		var selectedFiatCurrencyRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['fiat_converted_amount'];

		calBuyAmount = amount;

		var calFiatAmount = (amount * selectedRate).toFixed(2);
		// var calFiatAmount = (amount * selectedFiatCurrencyRate).toFixed(2);

		if (amount != "") {
			if (providerName == 'Simplex') {
				if (parseFloat(amount) >= parseFloat(minCryptoAmount) && parseFloat(amount) < parseFloat(maxCryptoAmount)) {
					formData = {
						command: 'getSimplexQuote',
						wallet_type: selectedWalletType,
						fiat_currency: selectedCurrency,
						crypto_amount: amount,
						transaction_type: 'buy',
						payment_method_type: Array('credit_card'),
						destination_address: destinationAddress,
						end_user_id: endUserId,
						business_id : businessId,
					};

					//					fCallback = getSimplexQuote;
					//					ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
					showCanvas();

					$.ajax({
						type: 'POST',
						url: 'scripts/reqPaymentGateway.php',
						data: formData,
						async: false,
						success: function(result) {
							var obj = JSON.parse(result);
							getSimplexQuote(obj, obj.message);
						},
						error: function(result) {

						}
					});
				} else {
					//				$('#amountToBuyID').hide();
					//				$('#estimateAmountPayID').hide();
					$('#amountBuy').text(thousands_separators(amount) + " " + selectedSymbol);
					$('#estimateReceiveAmount').text(thousands_separators(amount) + " " + selectedSymbol);
					$('#estimatedPayAmountUSD2').text(calFiatAmount + ' ' + selectedCurrency);
					$('#fiatAmount').val(calFiatAmount);

					$('#btnCreate').prop("disabled", true);

				}
			} else {
				if (amount == "") {
					amount = 0;
				}
				//		$('#estimatedUnitPriceUSD').text("$"+thousands_separators(selectedRate));

				minAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_crypto_amount'];
				maxAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_amount'];

				minCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_crypto_amount'];
				maxCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_crypto_amount'];

				selectedRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['crypto_converted_amount'];
				var selectedFiatCurrencyRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['fiat_converted_amount'];

				calBuyAmount = amount;

				var calFiatAmount = (amount / selectedFiatCurrencyRate).toFixed(2);
				var minCryptoFiatAmount = (minCryptoAmount / selectedFiatCurrencyRate).toFixed(2);
				minAmount = minAmount *selectedRate;
				$('#amountBuy').text(thousands_separators(amount) + " " + selectedSymbol);
				//				$('#estimateReceiveAmount').text(thousands_separators(calBuyCryptoAmount) + " " + selectedSymbol);
				$('#estimatedPayAmountUSD2').text(calFiatAmount + ' ' + selectedCurrency);
				//				$('#amount').val(amount);
				$('#fiatAmount').val(calFiatAmount);


				if ($(".alertError").is(":visible")) {
					//				alert("The paragraph  is visible.");
					$(".estimateReceiveAmount").hide();
					$('.alertCryptoError').hide();
					//					$('#fiatAmount').keyup();

				} else {

					if (parseFloat(amount) < parseFloat(minAmount)) {

						//						if (parseFloat(minAmount) > parseFloat(minCryptoFiatAmount)) {

						$('.alertCryptoError').text('Requires minimum purchase of ' + minAmount.toFixed(2) + ' ' + selectedCurrency.toUpperCase());
						//						} else {
						//							$('.alertCryptoError').text('Requires minimum purchase of ' + minCryptoFiatAmount + ' ' + selectedWalletSymbol.toUpperCase());
						//
						//						}
						$('.alertCryptoError').show();
						$('#btnCreate').prop("disabled", true);

					} else if (parseFloat(amount) > parseFloat(maxAmount)) {
						$('.alertCryptoError').text('Limit exceeded! Maximum amount per transaction is ' + maxCryptoAmount + ' ' + selectedCurrency.toUpperCase());
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
			$('#amountBuy').text(thousands_separators(0) + " " + selectedSymbol);
			$('#estimateReceiveAmount').text(thousands_separators(0) + " " + selectedSymbol);
			$('#estimatedPayAmountUSD2').text('0.00 ' + selectedCurrency);
//			$('#amount').val("0.00");
			$('#fiatAmount').val("0.00");

		}
	}

	function showFiatSummary() {
		var amount = sanitize($('#fiatAmount').val());
		var selectedCurrency = $('#fiatCurrency').find(':selected').val();
		var xanpoolDefaultCurrency = setting_data['xanpool']['defaultCurrency'];
		if(!selectedCurrency){
				selectedCurrency = xanpoolDefaultCurrency;
		}else{
				selectedCurrency = selectedCurrency.toUpperCase();
		}
		var coinImage = walletTypeImage[$('#walletType').val()];
		var selectedWalletType = $('#walletType').val();
		var selectedWalletSymbol = $('#walletType').find(':selected').data('symbol') ? $('#walletType').find(':selected').data('symbol') : "<?php echo $_POST['symbol'];?>";
		var providerName = $('input[name="paymentRadio"]:checked').val();
		minAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_amount'];
		maxAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_amount'];

		minCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_crypto_amount'];
		maxCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_crypto_amount'];

		selectedRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['crypto_converted_amount'];
		var selectedFiatCurrencyRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['fiat_converted_amount'];

		calBuyAmount = amount;

		var calFiatAmount = (amount * selectedFiatCurrencyRate).toFixed(8);

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
						destination_address: destinationAddress,
						end_user_id: endUserId,
						business_id : businessId
					};

					//					fCallback = getSimplexQuote;
					//					ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
					showCanvas();
					$.ajax({
						type: 'POST',
						url: 'scripts/reqPaymentGateway.php',
						data: formData,
						async: false,
						success: function(result) {
							var obj = JSON.parse(result);
							getFiatSimplexQuote(obj, obj.message);
						},
						error: function(result) {

						}
					});
				} else {
					//				$('#amountToBuyID').hide();
					//				$('#estimateAmountPayID').hide();
					if (parseFloat(amount) < parseFloat(minAmount)) {
						$('#amountBuy').text("Amount too low");
					} 
					else if (parseFloat(amount) > parseFloat(maxAmount)) {
						$('#amountBuy').text("Amount too high");
					}
					else{
						
					}
					$('#estimateReceiveAmount').text(thousands_separators(calFiatAmount) + " " + selectedSymbol);
					$('#estimatedPayAmountUSD2').text(amount + ' ' + selectedCurrency);
					// $('#amount').val(calFiatAmount);

					$('#btnCreate').prop("disabled", true);

				}
			} else {
				if (amount == "") {
					amount = 0;
				}
				//		$('#estimatedUnitPriceUSD').text("$"+thousands_separators(selectedRate));

				// minAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_amount'];
				maxAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_amount'];

				minCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_crypto_amount'];
				maxCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_crypto_amount'];

				selectedRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['crypto_converted_amount'];
				var selectedFiatCurrencyRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['fiat_converted_amount'];
				minAmount = minCryptoAmount *selectedRate;
				calBuyAmount = amount;

				var calFiatAmount = (amount * selectedFiatCurrencyRate).toFixed(8);
				// var minCryptoFiatAmount = (minCryptoAmount / selectedFiatCurrencyRate).toFixed(2);

				$('#amountBuy').text(thousands_separators(calFiatAmount) + " " + selectedSymbol);
				$('#estimateReceiveAmount').text(thousands_separators(calFiatAmount) + " " + selectedSymbol);
				$('#estimatedPayAmountUSD2').text(amount + ' ' + selectedCurrency);
				//				$('#amount').val(amount);
				$('#amount').val(calFiatAmount);


				if ($(".alertError").is(":visible")) {
					//				alert("The paragraph  is visible.");
					if (parseFloat(amount) < parseFloat(minAmount)) {
						$('#amountBuy').text("Amount too low");
					} 
					else if (parseFloat(amount) > parseFloat(maxAmount)) {
						$('#amountBuy').text("Amount too high");
					}
					else{
						
					}
					$(".estimateReceiveAmount").hide();
					$('.alertCryptoError').hide();
					//					$('#fiatAmount').keyup();

				} else {

					if (parseFloat(amount) < parseFloat(minAmount)) {

						//						if (parseFloat(minAmount) > parseFloat(minCryptoFiatAmount)) {

						$('.alertCryptoError').text('Requires minimum purchase of ' + minAmount.toFixed(2) + ' ' + selectedCurrency.toUpperCase());
						//						} else {
						//							$('.alertCryptoError').text('Requires minimum purchase of ' + minCryptoFiatAmount + ' ' + selectedWalletSymbol.toUpperCase());
						//
						//						}
						$('.alertCryptoError').show();
						$('#btnCreate').prop("disabled", true);

					} else if (parseFloat(amount) > parseFloat(maxAmount)) {
						$('.alertCryptoError').text('Limit exceeded! Maximum amount per transaction is ' + maxAmount + ' ' + selectedCurrency.toUpperCase());
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
			// $('#amountBuy').text(thousands_separators(0) + " " + selectedSymbol);
			$('#amountBuy').text("Amount too low");
			$('#estimateReceiveAmount').text(thousands_separators(0) + " " + selectedSymbol);
			$('#estimatedPayAmountUSD2').text('0.00 ' + selectedCurrency);
		//			$('#amount').val("0.00");
			$('#amount').val("0.00");

		}
	}

	// function showFiatSummary() {
	// 	var amount = sanitize($('#fiatAmount').val());
	// 	var selectedCurrency = $('#fiatCurrency').find(':selected').val().toUpperCase();
	// 	var coinImage = walletTypeImage[$('#walletType').val()];
	// 	var providerName = $('input[name="paymentRadio"]:checked').val();
	// 	var selectedWalletType = $('#walletType').val();
	// 	var selectedWalletSymbol = $('#walletType').find(':selected').data('symbol') ? $('#walletType').find(':selected').data('symbol') : "<?php echo $_POST['symbol'];?>";
	// 	calBuyAmount = amount;
	// 	calBuyCryptoAmount = (amount * selectedFiatRate).toFixed(8);
	// 	var pgCryptoAmount = "<?php echo $_POST['amount'];?>";

	// 	if (amount == "" && pgCryptoAmount != "" && selectedWalletType != undefined) {
	// 		if (providerName == 'Simplex') {
	// 			formData = {
	// 				command: 'getSimplexQuote',
	// 				wallet_type: selectedWalletType,
	// 				fiat_currency: selectedCurrency,
	// 				crypto_amount: pgCryptoAmount,
	// 				transaction_type: 'buy',
	// 				payment_method_type: Array('credit_card'),
	// 				destination_address: destinationAddress,

	// 			};
	// 			//				fCallback = getSimplexQuote;
	// 			//				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	// 			showCanvas();

	// 			$.ajax({
	// 				type: 'POST',
	// 				url: 'scripts/reqPaymentGateway.php',
	// 				data: formData,
	// 				async: false,
	// 				success: function(result) {
	// 					var obj = JSON.parse(result);
	// 					getSimplexQuote(obj, obj.message);
	// 				},
	// 				error: function(result) {

	// 				}
	// 			});
	// 		} else {
	// 			if (amount == "") {
	// 				amount = 0;
	// 			}
	// 			//		$('#estimatedUnitPriceUSD').text("$"+thousands_separators(selectedRate));

	// 			minAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_amount'];
	// 			maxAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_amount'];

	// 			minCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_crypto_amount'];
	// 			maxCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_crypto_amount'];

	// 			selectedRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['crypto_converted_amount'];
	// 			var selectedFiatCurrencyRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['fiat_converted_amount'];

	// 			calBuyAmount = amount;
	// 			calBuyCryptoAmount = (amount / selectedRate).toFixed(8);

	// 			var minCryptoFiatAmount = (minCryptoAmount / selectedFiatCurrencyRate).toFixed(2);

	// 			$('#amountBuy').text(thousands_separators(calBuyCryptoAmount) + " " + selectedSymbol);
	// 			//				$('#estimateReceiveAmount').text(thousands_separators(calBuyCryptoAmount) + " " + selectedSymbol);
	// 			$('#estimatedPayAmountUSD2').text(calBuyAmount + ' ' + selectedCurrency);
	// 			$('#amount').val(calBuyCryptoAmount);


	// 			if ($(".alertError").is(":visible")) {
	// 				//				alert("The paragraph  is visible.");
	// 				$('.alertCryptoError').hide();
	// 				//					$('#fiatAmount').keyup();

	// 			} else {

	// 				if (parseFloat(calBuyCryptoAmount) < parseFloat(minCryptoAmount) || parseFloat(amount) < parseFloat(minAmount)) {

	// 					if (parseFloat(minAmount) > parseFloat(minCryptoFiatAmount)) {

	// 						$('.alertCryptoError').text('Requires minimum purchase of ' + minAmount + ' ' + selectedCurrency.toUpperCase());
	// 					} else {
	// 						$('.alertCryptoError').text('Requires minimum purchase of ' + minCryptoFiatAmount + ' ' + selectedCurrency.toUpperCase());

	// 					}
	// 					$('.alertCryptoError').show();
	// 					$('#btnCreate').prop("disabled", true);

	// 				} else if (parseFloat(calBuyCryptoAmount) > parseFloat(maxCryptoAmount)) {
	// 					$('.alertCryptoError').text('Limit exceeded! Maximum limit per transaction is ' + maxAmount + ' ' + selectedCurrency.toUpperCase());
	// 					$('.alertCryptoError').show();
	// 					$('#btnCreate').prop("disabled", true);

	// 				} else {
	// 					$('.alertCryptoError').hide();
	// 					$('#amountToBuyID').show();
	// 					$('#estimateAmountPayID').show();
	// 					$('#btnCreate').prop("disabled", false);

	// 				}
	// 			}

	// 		}
	// 	} else if (amount != "") {
	// 		if (providerName == 'Simplex') {
	// 			if (parseFloat(amount) >= parseFloat(minAmount) && parseFloat(amount) < parseFloat(maxAmount)) {
	// 				formData = {
	// 					command: 'getSimplexQuote',
	// 					wallet_type: selectedWalletType,
	// 					fiat_currency: selectedCurrency,
	// 					fiat_amount: amount,
	// 					transaction_type: 'buy',
	// 					payment_method_type: Array('credit_card'),
	// 					destination_address: destinationAddress,

	// 				};
				

	// 				fCallback = getSimplexQuote;
	// 				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	// 			} else {
	// 				//				$('#amountToBuyID').hide();
	// 				//				$('#estimateAmountPayID').hide();
	// 				$('#amountBuy').text(thousands_separators(calBuyCryptoAmount) + " " + selectedSymbol);
	// 				$('#estimateReceiveAmount').text(thousands_separators(calBuyCryptoAmount) + " " + selectedSymbol);
	// 				$('#estimatedPayAmountUSD2').text(calBuyAmount + ' ' + selectedCurrency);
	// 				$('#btnCreate').prop("disabled", true);

	// 			}
	// 		} else {
	// 			if (amount == "") {
	// 				amount = 0;
	// 			}
	// 			//		$('#estimatedUnitPriceUSD').text("$"+thousands_separators(selectedRate));

	// 			minAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_amount'];
	// 			maxAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_amount'];

	// 			minCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['min_crypto_amount'];
	// 			maxCryptoAmount = currencySettingData[selectedWalletSymbol][selectedCurrency]['max_crypto_amount'];

	// 			selectedRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['crypto_converted_amount'];
	// 			var selectedFiatCurrencyRate = currencySettingData[selectedWalletSymbol][selectedCurrency]['fiat_converted_amount'];

	// 			calBuyAmount = amount;
	// 			calBuyCryptoAmount = (amount / selectedRate).toFixed(8);

	// 			var minCryptoFiatAmount = (minCryptoAmount / selectedFiatCurrencyRate).toFixed(2);

	// 			$('#amountBuy').text(thousands_separators(calBuyCryptoAmount) + " " + selectedSymbol);
	// 			//				$('#estimateReceiveAmount').text(thousands_separators(calBuyCryptoAmount) + " " + selectedSymbol);
	// 			$('#estimatedPayAmountUSD2').text(calBuyAmount + ' ' + selectedCurrency);

	// 			if ($(".alertError").is(":visible")) {
	// 				//				alert("The paragraph  is visible.");
	// 				$('.alertCryptoError').hide();
	// 				//					$('#fiatAmount').keyup();

	// 			} else {

	// 				if (parseFloat(calBuyCryptoAmount) < parseFloat(minCryptoAmount) || parseFloat(amount) < parseFloat(minAmount)) {

	// 					if (parseFloat(minAmount) > parseFloat(minCryptoFiatAmount)) {

	// 						$('.alertCryptoError').text('Requires minimum purchase of ' + minAmount + ' ' + selectedCurrency.toUpperCase());
	// 					} else {
	// 						$('.alertCryptoError').text('Requires minimum purchase of ' + minCryptoFiatAmount + ' ' + selectedCurrency.toUpperCase());

	// 					}
	// 					$('.alertCryptoError').show();
	// 					$('#btnCreate').prop("disabled", true);

	// 				} else if (parseFloat(calBuyCryptoAmount) > parseFloat(maxCryptoAmount)) {
	// 					$('.alertCryptoError').text('Limit exceeded! Maximum limit per transaction is ' + maxAmount + ' ' + selectedCurrency.toUpperCase());
	// 					$('.alertCryptoError').show();
	// 					$('#btnCreate').prop("disabled", true);

	// 				} else {
	// 					$('.alertCryptoError').hide();
	// 					$('#amountToBuyID').show();
	// 					$('#estimateAmountPayID').show();
	// 					$('#btnCreate').prop("disabled", false);

	// 				}
	// 			}

	// 		}
	// 	} else {
	// 		$('.alertCryptoError').hide();
	// 		$('#btnCreate').prop("disabled", true);
	// 		$('#amountBuy').text(thousands_separators(0) + " " + selectedSymbol);
	// 		$('#estimateReceiveAmount').text(thousands_separators(0) + " " + selectedSymbol);
	// 		$('#estimatedPayAmountUSD2').text('0.00 ' + selectedCurrency);
	// 		$('#amount').val("0.00");
	// 	}




	// }

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
		//		$("input[name=paymentRadio][disabled!=disabled]:first").attr('checked', true);

		getCurrentProvider();




	}

	function getWalletType(data, message) {

		var dropdownFake = 0;
		if (transactionToken == ""){
			var selectedWalletType = "<?php echo $_POST['walletType'] ? $_POST['walletType'] : $_GET['walletType'];?>";
		}
		if(transactionToken != ""){
			selectedWalletType = walletType;
			$('#walletType').val(selectedWalletType);
		}

		if (data.data.currency_list && dropdownFake != 1) {
			$('#walletType').empty();
			$.each(data.data.currency_list, function(key, val) {
				if (val['currency_id'] == selectedWalletType ) {
					$('#walletType').append('<option data-image="' + val['image'] + '" data-symbol="' + val['symbol'].toUpperCase() + '" value="' + val['currency_id'] + '">' + val['name'] + '</option>');


				}
				

				walletTypeImage[val['wallet_type']] = val['image'];


			});
			dropdownFake = 1;
			//			$('#walletType').disabled();des

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
		//getConversionRate();

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

		//getConversionRate();
		var selectedCurrency = $('#fiatCurrency').find(':selected').val().toUpperCase();
		$('#estimatedPrice').text('Estimated Price (' + selectedCurrency + ')');
		//		$('#estimatedPayAmountUSD').text('Estimated Amount to Pay (' + selectedCurrency + ')');

		var provider = $('input[name="paymentRadio"]:checked').val();
		var selectedDefaultCurrency = setting_data[provider.toLowerCase()]['default_currency'];

		var selectedFiatCurrency = $('#fiatCurrency').val();
		$('#fiatCurrency option').each(function(){
			//console.log(this.value);
			if(this.value == defaultCurrency){
				$('#fiatCurrency').val(defaultCurrency).trigger('change');
			}else{
				$('#fiatCurrency').val(selectedDefaultCurrency).trigger('change');
			}
		});
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
		if (transactionToken == ""){
			var selectedWalletType = "<?php echo $_POST['walletType'] ? $_POST['walletType'] : $_GET['walletType'];?>";
		}
		if(transactionToken != ""){
			selectedWalletType = walletType;
			$('#walletType').val(selectedWalletType);
		}
		if (data.data.currency_list && dropdownFake != 1) {
			var supported = false;
			$('#walletType').empty();
			$.each(data.data.currency_list, function(key, val) {
				if (val['currency_id'] == selectedWalletType ) {
					$('#walletType').append('<option data-image="' + val['image'] + '" data-symbol="' + val['symbol'].toUpperCase() + '" value="' + val['currency_id'] + '">' + val['name'] + '</option>');
					supported = true;
				} 
				walletTypeImage[val['wallet_type']] = val['image'];
			});
			if (!supported) {
				$('#walletTypeStatus').text(selectedWalletType.toUpperCase() + ' type not supported.');
			}
			dropdownFake = 1;
			//			$('#walletType').disabled();des

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
		var xanpoolDefaultCurrency = setting_data['xanpool']['defaultCurrency'];
		xanpoolDefaultCurrency = xanpoolDefaultCurrency.toLowerCase();
		//console.log(selectedDefaultCurrency);
		var selectedFiatCurrency = $('#fiatCurrency').val(xanpoolDefaultCurrency);
		//console.log(selectedFiatCurrency);
		//console.log(defaultCurrency);
		//console.log(selectedDefaultCurrency);
		var exists;
		$('#fiatCurrency option').each(function(){
			//console.log(this.value);
			if(this.value == selectedDefaultCurrency){
					exists = 1;
					return false;
			}
		});
		//console.log(exists);
		if(exists == 1){
			$('#fiatCurrency').val(selectedDefaultCurrency).trigger('change');
		}else{
			$('#fiatCurrency').val(xanpoolDefaultCurrency).trigger('change');
		}
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
		//		$('#amount').val(cryptoAmount);
		$('#fiatAmount').val(estimateAmountToPay);


		$('#amountToBuyID').show();
		$('#estimateAmountPayID').show();
		$('#btnCreate').prop("disabled", false);

		hideCanvas();


	}
	function getFiatSimplexQuote(data, message) {
		quoteID = data.data.quote_id;

		// var amount = sanitize($('#fiatAmount').val());
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
		//		$('#amount').val(cryptoAmount);
		$('#amount').val(cryptoAmount);


		$('#amountToBuyID').show();
		$('#estimateAmountPayID').show();
		$('#btnCreate').prop("disabled", false);

		hideCanvas();


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
			estimateAmountPayUSD: $('#fiatAmount').val(),
			coinImage: coinImage,
			providerName: providerName,
			walletType: selectedWalletType,
			destinationAddress: destinationAddress,
			transactionToken: transactionToken
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

	input[type=radio] {
		position: absolute;
	    height: 1em !important;
	}

	#imgBinance {
		width: 180px;
		height: 40px;
		margin-right: 15px;
		/*		margin-top: 22px;*/
	}

	#imgSimplex {
		height: auto;
		max-height: 25px;
		margin-right: 15px;
		/*		margin-top: 22px;*/
	}

	#imgXanpool {
		height: auto;
		max-height: 20px;
		margin-right: 15px;
		/*		margin-top: 22px;*/
	}

	#imgSimplexIcon {
		height: auto;
		max-height: 35px;
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

		input[type=radio] {
            height: 3em;
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

	@media (-webkit-device-pixel-ratio: 3) {
		input[type=radio] {
			border: 0;
			height: 3em;
			transform: scale(1.5) !important; 
		}
	}

	@media (max-width: 768px) {

		input[type=radio] {
			height: 3em;
		}

		#amountDiv {
			padding-right: 0;
		}

		#paymentmethodDiv {
			padding-right: 0;
		}

	}

	@media (max-width: 500px) {

		input[type=radio] {
			height: 3em;
		}

		#estimatedPayAmountUSD {
			width: 160px;
		}

		#estimatedPayAmountUSD2 {
			width: calc(100% - 160px);
		}
	}

	#checkoutHeader {
		background: #282b2d;
		text-align: center;
	}

	#checkoutHeaderLogo {
		height: 40px;
	}


	#footerID {
		position: fixed;
		bottom: 0;
	}

	.pageHeader {
		color: #000;
		font-weight: 400;
		font-size: 30px;
	}

</style>

