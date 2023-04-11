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
							Sell Crypto
						</div>

                        <div class="col-12 row mt-5 justify-content-center">
                            <div class="col-md-4 col-12">
                                <div class="col-12 mt-3">
                                    <div class="row mt-lg-0 mt-md-3">
                                        <span class="w-100">I want to sell</span>
                                        <br>
                                        <div id="amountDiv">
                                            <div class="input-group">
                                                <input id="amount" value= "" class="form-control rounded-left" aria-label="Text input with dropdown button" placeholder="" autocomplete="no" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">

                                                <select class="searchDesign" id="walletType" style="width: 150px;"></select>

                                            </div>
                                        </div>


                                        <div class="alertError" class="w-100" style="color:red; font-size:12px;"></div>

                                        <!-- <div class="w-100 mt-2">
                                            <span>Available:</span>
                                            <span id="coinBalance">-</span>
                                        </div> -->
                                    </div>
                                </div>

                                <div class="col-12 mt-5">
                                    <div class="row mt-lg-0 mt-md-3">
                                        <div id="fiatCurrencyDiv">
                                            <span class="w-100">You will receive</span>
                                            <div class="input-group">
                                                <input id="fiatAmount" type="text" class="form-control rounded-left" aria-label="Text input with dropdown button" placeholder="<?php echo $translations["M00331"][$language]; /* Amount */?>" autocomplete="no" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" disabled style="border-color:#ccc;">


                                                <select class="searchDesign" id="fiatCurrency" style="width: 150px;"></select>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div id="summaryDiv" class="col-lg-8 col-md-8 col-sm-12 mt-md-0 mt-5" style="">

                                <div class="col-12 shadow bg-white rounded" id="" style="padding-top: 30px; padding-bottom: 30px;">

                                    <div class="col-12 bigText">
                                        Summary
                                    </div>


									<div class="col-12 row mt-5" style="margin-left: 2px;">
										<span style="width: 130px;"><?php echo $translations["M01970"][$language]; /* Payment Channel */?></span>
										<span style="text-align: right; width: calc(100% - 130px);">
											<img src='images/buycrypto/xanpool.png' style="width: 100px;" class="paymentChannelImg">
										</span>
									</div>

									<div class="col-12 row mt-5" style="margin-left: 2px;">
										<span style="width: 130px;"><?php echo $translations["M02018"][$language]; /* Payment Method */?></span>
										<span style="text-align: right; width: calc(100% - 130px);">
											<img id="imgXanpoolIcon" class="hideShowPaymentLogo MYR" src="./images/buycrypto/duitnow.png" style="height: 40px;">
											<img id="imgXanpoolIcon" class="hideShowPaymentLogo HKD" src="./images/buycrypto/FPS.png" style="height: 40px;">
											<img id="imgXanpoolIcon" class="hideShowPaymentLogo IDR" src="./images/buycrypto/Gojek.png" style="height: 40px;">
											<img id="imgXanpoolIcon" class="hideShowPaymentLogo INR" src="./images/buycrypto/UPI.png" style="height: 20px;">
											<img id="imgXanpoolIcon" class="hideShowPaymentLogo NZD" src="./images/buycrypto/bankTransfer.png" style="height: 40px;">
											<img id="imgXanpoolIcon" class="hideShowPaymentLogo PHP" src="./images/buycrypto/InstaPay.png" style="height: 20px;">
											<img id="imgXanpoolIcon" class="hideShowPaymentLogo SGD" src="./images/buycrypto/PayNow.png" style="height: 40px;">
											<img id="imgXanpoolIcon" class="hideShowPaymentLogo THB" src="./images/buycrypto/PromptPay.png" style="height: 40px;">
											<img id="imgXanpoolIcon" class="hideShowPaymentLogo VND" src="./images/buycrypto/ViettelPay.png" style="height: 40px;">
											<img id="imgXanpoolIcon" class="hideShowPaymentLogo AUD" src="./images/buycrypto/PayId.png" style="height: 40px;">
										</span>
									</div>
									
                                    <div class="col-12 row mt-4 justify-content-between" style="margin-left: 2px;" id="amountToSellID">
                                        <div style="width: 130px;">Amount to Sell</div>
                                        <div id="amountSell" style="text-align: right;  color: grey;">-</div>
                                    </div>



                                    <div class="col-12 row mt-3 justify-content-between" style="margin-left: 2px;" id="estimateAmountPayID">
                                        <div id="estimatedPayAmountUSD" style="">Estimated Receivable Amount</div>
                                        <div id="estimatedPayAmountUSD2" style="text-align: right; color: grey;">-</div>
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

	<?php include 'sharejsDashboard.php'; ?>

</body>


</html>

<script>
	var url = 'scripts/reqPaymentGateway.php';
	var method = 'POST';
	var debug = 0;
	var bypassBlocking = 0;
	var bypassLoading = 0;
	var pageNumber = 1;
	var formData = "";
	var fCallback = "";
	var selectedWalletType = '';
	var selectedRate = "";
	var selectedFiatRate = "";
	var selectedSymbol = "";
	var calSellAmount = "";
	var calSellCryptoAmount = "";
	var minAmount = "";
	var maxAmount = "";
	var minCryptoAmount = "";
	var maxCryptoAmount = "";
	var userCurrency = "";
	var currencySettingData = "";
    var transactionToken = "<?php echo $_GET['transactionToken']?>";
	var walletType = "";

	var setting_data = "";
    var supportedCoinsList = <?php echo json_encode(array("xanpool"=> array("btc", "eth", "usdt", "ltc", "bch")))?>;
	var tokenFiatCurrency = "";
	

	$(document).ready(function() {
		if(transactionToken != ""){
			formData = {
				command: 'getBuySellTransactionTokenDetails',
				transaction_token: transactionToken,
				type: 'sell'
			};

	//		fCallback = getSellTransactionTokenDetails;
	//		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	//		
			$.ajax({
				type: 'POST',
				url: url,
				data: formData,
							async: false,
				success: function(result) {
					var obj = JSON.parse(result);

					getSellTransactionTokenDetails(obj, obj.message);

				},
				error: function(result) {
					// alert("Error!");
				}
			});
		}
		else{
			showMessage('Access Denied', 'warning', '', 'warning', 'index.php');
			$('#amount').val('0.00');
		}


		formData = {
			command: 'getBuyCryptoSetting',
			provider: Array('xanpool'),
			type: 'sell'
		};

		fCallback = getBuyCryptoSetting;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		formData = {
			command: 'getWalletType',
			provider: 'xanpool',
		};

		//		fCallback = getWalletType;
		//		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		//run the ajax in sync
		$.ajax({
			type: 'POST',
			url: url,
			data: formData,
			//			async: false,
			success: function(result) {
				var obj = JSON.parse(result);

				getWalletType(obj, obj.message);

			},
			error: function(result) {
				// alert("Error!");
			}
		});


		//		$.ajax({
		//			type: 'POST',
		//			url: url,
		//			data: formData,
		////			async: false,
		//			success: function(result) {
		//				var obj = JSON.parse(result);
		//				getSupportedCurrencies(obj, obj.message);
		//			},
		//			error: function(result) {
		//				// alert("Error!");
		//			}
		//		});


		$('#walletType').change(function() {
			selectedWalletType = $('#walletType option:selected').val();

			// formData = {
			// 	command: 'getWalletBalance',
			// 	wallet_status: checkWalletStatus
			// };
			// fCallback = getBalance;
			// ajaxSend('<?php echo $sys['domain']?>/scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, 1, 0);

			getConversionRate();
			$('#amount').keyup();
		});


		$('#fiatCurrency').change(function() {
			selectedFiatCurrency = $('#fiatCurrency option:selected').val();

			getConversionRate();
//			$('#amount').keyup();
			

		});

		$('#fiatCurrency').on('change', function() {
			var selectedFiatCurrency = $('#fiatCurrency').val();
			selectedFiatCurrency = selectedFiatCurrency.toUpperCase();


			$('.hideShowPaymentLogo').hide();
			$("." + selectedFiatCurrency).show();

		});
		$("#amount").keyup(function(event) {
			var fiatSymbol = $('#fiatCurrency').find(':selected').val().toUpperCase();
			//console.log(fiatSymbol);
			var cryptoSymbol = $('#walletType').find(':selected').text();
			//console.log(cryptoSymbol);
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
				minAmount = currencySettingData[cryptoSymbol][fiatSymbol.toUpperCase()]['min_amount'];
				maxAmount = currencySettingData[cryptoSymbol][fiatSymbol.toUpperCase()]['max_amount'];

				minCryptoAmount = currencySettingData[cryptoSymbol][fiatSymbol.toUpperCase()]['min_crypto_amount'];
				maxCryptoAmount = currencySettingData[cryptoSymbol][fiatSymbol.toUpperCase()]['max_crypto_amount'];

				selectedRate = currencySettingData[cryptoSymbol][fiatSymbol.toUpperCase()]['crypto_converted_amount'];
				var selectedFiatCurrencyRate = currencySettingData[cryptoSymbol][fiatSymbol.toUpperCase()]['fiat_converted_amount'];

				var minCryptoFiatAmount = (minCryptoAmount / selectedFiatCurrencyRate).toFixed(2);

				if (parseFloat(inputAmount) < parseFloat(minCryptoAmount)) {
					$('.alertError').text('Requires minimum purchase of ' + minCryptoAmount + ' ' + cryptoSymbol.toUpperCase());

					//					if (parseFloat(minAmount) > parseFloat(minCryptoFiatAmount)) {
					//						$('.alertError').text('Requires minimum purchase of ' + minCryptoAmount + ' ' + fiatSymbol.toUpperCase());
					//					} else {
					//						$('.alertError').text('Requires minimum purchase of ' + minCryptoAmount + ' ' + fiatSymbol.toUpperCase());
					//
					//					}
					$('.alertError').show();
					$('#btnCreate').prop("disabled", true);


				} else if (parseFloat(inputAmount) > parseFloat(maxCryptoAmount)) {
					$('.alertError').text('Limit exceeded! Maximum limit per transaction is ' + maxCryptoAmount + ' ' + cryptoSymbol.toUpperCase());
					$('.alertError').show();
					$('#btnCreate').prop("disabled", true);

				} else {
					$('.alertError').hide();
					$('#btnCreate').prop("disabled", false);


				}

			} else {
				$('.alertError').hide();
				$('#btnCreate').prop("disabled", true);



			}

			if (currencySettingData == "") {
				setTimeout(function() {
					showSummary();
				}, 5000);
			} else {
				showSummary();
			}

		});
		// $("#amount").keyup(function(event) {

		// 	var inputAmount = this.value;
		// 	var amount_parts = inputAmount.toString().split(".");
		// 	var fiatSymbol = $('#fiatCurrency').val();
		// 	var cryptoSymbol = $('#walletType').find(':selected').text();
		// 	//fiat min amount converted
		// 	console.log(currencySettingData);
		// 	minAmount = currencySettingData[cryptoSymbol][fiatSymbol.toUpperCase()]['min_amount'];
		// 	maxAmount = currencySettingData[cryptoSymbol][fiatSymbol.toUpperCase()]['max_amount'];

		// 	minCryptoAmount = currencySettingData[cryptoSymbol][fiatSymbol.toUpperCase()]['min_crypto_amount'];
		// 	maxCryptoAmount = currencySettingData[cryptoSymbol][fiatSymbol.toUpperCase()]['max_crypto_amount'];

		// 	var minCryptoConvertedAmount = (minAmount / selectedRate).toFixed(8);
		// 	var minCryptoUSDAmount = (minCryptoAmount * selectedRate).toFixed(2);

		// 	if (inputAmount == ".") {
		// 		this.value = "";
		// 	} else if (amount_parts.length == 3) {
		// 		inputAmount = amount_parts[0] + "." + amount_parts[1];
		// 		this.value = inputAmount;
		// 	}



		// 	showSummary();
		// 	if (inputAmount != "") {
		// 		if (parseFloat(inputAmount) < parseFloat(minCryptoAmount) || parseFloat(inputAmount) < parseFloat(minCryptoConvertedAmount)) {
		// 			if (parseFloat(minCryptoAmount) > parseFloat(minCryptoConvertedAmount)) {
		// 				$('.alertError').text('Requires minimum sell amount of ' + minCryptoAmount + ' ' + cryptoSymbol.toUpperCase());
		// 			} else {
		// 				$('.alertError').text('Requires minimum sell amount of ' + minCryptoConvertedAmount + ' ' + cryptoSymbol.toUpperCase());

		// 			}
		// 			$('.alertError').show();
		// 			$('#btnCreate').prop("disabled", true);

		// 		} else if (parseFloat(inputAmount) > parseFloat(maxCryptoAmount)) {
		// 			$('.alertError').text('Limit exceeded! Maximum sell amount is ' + maxCryptoAmount + ' ' + cryptoSymbol.toUpperCase());
		// 			$('.alertError').show();
		// 			$('#btnCreate').prop("disabled", true);

		// 		} else if (parseFloat(inputAmount) <= parseFloat(maxCryptoAmount)) {
		// 			$('.alertError').hide();
		// 			$('#btnCreate').prop("disabled", false);


		// 		}
		// 	} else {
		// 		$('.alertError').hide();
		// 		$('#btnCreate').prop("disabled", true);
		// 	}
		// });

		$('#btnCreate').click(function() {

			var amount = sanitize($('#amount').val());
			var providerName = $('input[name="paymentRadio"]:checked').val();
			var selectedCurrencyID = $('#walletType').val();
			var fiatAmount = sanitize($('#fiatAmount').val());
			var selectedFiatCurrency = $('#fiatCurrency').val();


			formData = {
				command: 'getXanpoolQuote',
				wallet_type: selectedCurrencyID,
				fiat_currency: selectedFiatCurrency,
				crypto_amount: amount,
				transaction_type: 'sell'

			};



			fCallback = getXanpoolQuote;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


		});


	});
    
    function getSellTransactionTokenDetails(data){
		code = data.code;
		message_d = data.message_d;
		if(code == '0'){
			showMessage(message_d, 'warning', '', 'warning', 'index.php');
		}
		else{
			returnData = data.data;
			
			cryptoAmount = returnData.crypto_amount;
			walletType   = returnData.wallet_type;
			tokenFiatCurrency = returnData.fiat_currency;

			$("#amount").val(cryptoAmount);
			// $('#amount').prop("disabled", true);
			$('#walletType').prop("disabled", true);


			// $('#walletType').append('<option selected="selected" val['walletType']></option>');

			// $('#walletType').change(walletType);
			// document.querySelector('#walletType').value = '';
			// <option selected="selected"> walletType </option>

			// $('walletType[value="walletType"]').attr("selected",true);
			// selectedWalletType = val['walletType'];
			// $('#walletType').append('<option data-image="' + val['image'] + '" value="' + val['currency_id'] + '">' + val['symbol'].toUpperCase() + '</option>');
		}	

    }

	function getBuyCryptoSetting(data, message) {

		setting_data = data.setting_data;
		var return_data = data.data;

		userCurrency = return_data.default_currency;

		if (setting_data['xanpool']['isEnabled'] != "1") {
			showMessage('Sell Crypto Services Unavailable.', 'danger', 'Failed', 'times-circle-o', 'dashboard.php');

		} else {
			formData = {
				command: 'getSupportedCurrencies',
				provider: 'xanpool',
				transaction_type: 'sell'
			};

			fCallback = getSupportedCurrencies;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		}
	}

	function getWalletType(data, message) {
		if (data.data.currency_list) {
			$('#walletType').empty();
			$.each(data.data.currency_list, function(key, val) {
				if (key == 0) {
					selectedWalletType = val['currency_id'];
				}
				$('#walletType').append('<option data-image="' + val['image'] + '" value="' + val['currency_id'] + '">' + val['symbol'].toUpperCase() + '</option>');

				//				walletTypeImage[val['wallet_type']] = val['image'];


			});
							
			if(walletType != ''){
				$('#walletType').val(walletType);
			}

			// formData = {
			// 	command: 'getWalletBalance'
			// };
			// fCallback = getBalance;
			// ajaxSend('<?php echo $sys['domain']?>/scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, 1, 0);

		}

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

	function getSupportedCurrencies(data, message) {
		var return_data = data.data;
		if (data.data.country_list) {
			$('#fiatCurrency').empty();
			$.each(data.data.country_list, function(key, val) {
				$('#fiatCurrency').append('<option data-image="' + val['image'] + '" value="' + val['currency_id'] + '">' + val['name'] + '</option>');

			});

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
//		$('#fiatCurrency').val(userCurrency).trigger('change');

		// var selectedDefaultCurrency = setting_data['xanpool']['default_currency'];
		// $('#fiatCurrency').val(selectedDefaultCurrency).trigger('change');
		$('#fiatCurrency').val(tokenFiatCurrency).trigger('change');
	}


	function getBalance(data, message) {
		var balance = data.data.wallet_list;

		if (balance) {
			$.each(balance, function(k, v) {
				var display_symbol = v['display_symbol'];
				var wallet_type = v['currency_id'];
				var balance = v['balance'];

				if (wallet_type == selectedWalletType) {
					$('#coinBalance').text(balance + ' ' + display_symbol);
				}

			});

		}

	}

	function getConversionRate() {
		var selectedCurrencyID = $('#walletType').val();
		var selectedFiatCurrency = $('#fiatCurrency').val();

		if (selectedCurrencyID != null && selectedFiatCurrency != null) {
			formData = {
				command: 'getconversionrate',
				amount: 1,
				wallet_type: selectedCurrencyID,
				fiat_currency_id: selectedFiatCurrency,
				provider: 'Xanpool',
				type : 'sell',


			};

			fCallback = getConversionRateReturn;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		}




	}

	function getConversionRateReturn(data, message) {
		selectedRate = data.data.crypto_converted_amount;
		selectedFiatRate = data.data.fiat_converted_amount;
		selectedSymbol = data.data.currency_unit;

		minAmount = data.data.min_amount;
		maxAmount = data.data.max_amount;

		minCryptoAmount = data.data.min_crypto_amount;
		maxCryptoAmount = data.data.max_crypto_amount;
		currencySettingData = data.data.currency_setting_data;


		$('#amount').keyup();

	}

	function showSummary() {
		var amount = $('#amount').val();
		var selectedCurrency = $('#fiatCurrency').find(':selected').val().toUpperCase();

		if (amount == "") {
			amount = 0;
		}

		calSellCryptoAmount = amount;
		calSellAmount = thousands_separators((amount * selectedRate).toFixed(2));
		$('#amountSell').text(thousands_separators(calSellCryptoAmount) + " " + selectedSymbol);
		$('#estimatedPayAmountUSD2').text(calSellAmount + ' ' + selectedCurrency);
		$('#fiatAmount').val(calSellAmount);


	}


	function thousands_separators(num) {
		var num_parts = num.toString().split(".");
		num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		return num_parts.join(".");
	}

	function getXanpoolQuote(data, message) {
		var amount = sanitize($('#amount').val());
		var selectedWalletType = $('#walletType').val();
		var selectedFiatCurrency = $('#fiatCurrency').find(':selected').val().toUpperCase();
		var fiat_amount = data.data.fiat_amount;

		formData = {
			command: 'xanpoolCreatePayment',
			crypto_amount: amount,
			fiat_currency: selectedFiatCurrency,
			fiat_amount: fiat_amount,
			wallet_type: selectedWalletType,
			transaction_type: "sell",
			transaction_token: transactionToken

		};

		fCallback = xanpoolCreatePayment;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	}

	function xanpoolCreatePayment(data, message) {
		var symbol = data.data.symbol;
		var destination_address = data.data.destination_address;
		var type = data.data.transaction_type;
		var currency = data.data.fiat_currency;
		var payment_data = data.data.payment_id;
		var api_key = data.data.api_key;
		var amount = data.data.crypto_amount;
		var redirect_url = data.data.redirect_url;
		var fiat_amount = data.data.fiat_amount;
		var checkout_page_url = data.data.xanpool_checkout_page;
		var request_id = data.data.request_id;
		var auto_selling = data.data.auto_selling;

		$.redirect('xanpoolCheckout.php', {
			symbol: symbol,
			cryptoAmount: amount,
			fiatAmount: fiat_amount,
			fiatSymbol: currency,
			type: type,
			apiKey: api_key,
			paymentData: payment_data,
			redirectURL: redirect_url,
			//isAutoSelling: auto_selling,
			isAutoSelling: false
		});

	}

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
		height: 40px;
		margin-right: 15px;
		/*		margin-top: 22px;*/
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
			height: 29px;
		}

		#imgMaster {
			/*			margin-top: 26px;*/
		}
	}

	@media (max-width: 768px) {

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
