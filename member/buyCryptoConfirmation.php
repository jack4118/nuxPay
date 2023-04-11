<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body class="">
	<div class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed kt-page--loading">
		

		<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

				<div class="col-12">
					<div class="row">
						<div class="col-md-6 col-12 d-flex align-items-center text-center">
							<div class="row ">
								<div class="col-12">
									<img src="" class="confirmationProviderImg">
								</div>
								<div class="col-12 my-5">
									<img src="images/nuxPay/cross.png">
								</div>
								<div class="col-12 ">
									<img src="
											  <?php $httpHost = $_SERVER['HTTP_HOST'];
											  if(strpos($httpHost, 'nuxpay.com') !== false)
											  {
												 echo $sys['loginLogo'];
											  }
											  else if(strpos($httpHost, 'nuxpay.co') !== false){
												 echo $sys['loginLogoNuxpayCo'];

											  }
											   else if(strpos($httpHost, 'nuxpay.net') !== false){
												 echo $sys['loginLogoNuxpayNet'];

											  }
											   else if(strpos($httpHost, 'nuxpay.io') !== false){
												 echo $sys['loginLogoNuxpayIo'];

											  }
											  else{
												  echo $sys['loginLogo'];

											  }
											  ?>" height="100px;">
								</div>
							</div>
							
						</div>
						
						<div class="col-md-6 col-12 vh-100 shadow  bg-white rounded align-items-center" id="paymentSummaryDiv"> 
							<h2 class="text-center"><?php echo $translations["M01969"][$language]; /* Payment Summary */?></h2>
							
							<h4 style="margin-top:50px;"><?php echo $translations["M01979"][$language]; /* You Buy */?></h4>
							<img src="<?php echo $_POST['coinImage']?>" class="currencyLogo">&nbsp;<span id="buyAmount"><?php echo $_POST['amount'] ?> <?php echo $_POST['symbol'];?></span>
							<br><br>
							<!--<h4 id="estimatedPriceID"><?php echo $translations["M01972"][$language]; /* Estimated Price */?></h4>-->
<!--
							<span id="estimatedPrice">$<?php echo $_POST['estimatePriceUSD'] ?></span>
							<br><br>
-->
							<h4 id="estimatedAmountToPayID"><?php echo $translations["M01973"][$language]; /* Estimated Amount To Pay(USD) */?></h4>
							<span id="estimatedAmountToPay"><?php echo $_POST['estimateAmountPayUSD'].' '.strtoupper($_POST['fiatSymbol']);?> </span>
							<br><br>
							<hr>
							
                            
							<h3 class="mt-5"><?php echo $translations["M01941"][$language]; /* Disclaimer */?></h3>
							<div><?php $provider_name = $_POST['providerName']; $translations_message = "You will now leave %%companyName%% and be take to ".$provider_name." Services relating to payments are provided by ".$provider_name.". Please read and agress to ".$provider_name."'s Terms of Use before using their service. For any questions relating to payments, please contact %%supportEmail%%";
								$return_message = str_replace('%%companyName%%', $sys['companyName'], $translations_message);
								$return_message1 = str_replace('%%supportEmail%%', $sys['supportEmail'], $return_message);
								
								echo $return_message1;
								?></div>
							
							<div class="mt-3">
								<input type="checkbox" id="tncCheckBox">&nbsp; <span class="margin-left:20px;">I have read and agree to the <a href="tnc.php">Terms of Use</a></span>
							</div>

							<button class="btn primaryBtn mt-5 w-100" id="proceedBtn" disabled>Proceed</button>
							
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<form id='payment_form' action='#{payment_post_url}' method='POST' target='_self'>
		<input type='hidden' name='version' value='1'>
		<input type='hidden' name='partner' value='#{partner_name}'>
		<input type='hidden' name='payment_flow_type' value='wallet'>
		<input type='hidden' name='return_url_success' value='#{return_url}'>
		<input type='hidden' name='return_url_fail' value='#{return_url}'>
		<input type='hidden' name='payment_id' value='#{data.transaction_details.payment_details.payment_id}'>
	</form>
</div>
</div>

</div>

<?php include('floatedWhatsapp.php'); ?>

</body>



</html>

<?php include 'sharejsDashboard.php'; ?>
<script>
	var quote_id = "<?php echo $_POST['quoteID'];?>";
	var provider_name = "<?php echo $_POST['providerName'];?>";
	var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var dropdownFake;
	var fiatSymbol 		= "<?php echo strtoupper($_POST['fiatSymbol']);?>";
	
	$(document).ready(function() {
		
		$('#estimatedPriceID').text('Estimated Price ('+fiatSymbol+')');
		$('#estimatedAmountToPayID').text('Estimated Amount to Pay ('+fiatSymbol+')');
		
		$('#proceedBtn').text('Proceed to '+provider_name);

		if(provider_name == 'Simplex'){
			$('.confirmationProviderImg').prop('src', 'images/buycrypto/simplex.png');
		}
		else if(provider_name == 'Xanpool'){
			$('.confirmationProviderImg').prop('src', 'images/buycrypto/xanpool.png');

		}
		$("#proceedBtn").click(function(){
			
//			window.location.href = "<?php echo $sys['binanceURL'];?>/en/buy-sell-crypto";
//		$.redirect('buyCryptoConfirmation.php', {symbol: selectedSymbol, amount: amount, estimatePriceUSD: selectedRate, estimateAmountPayUSD: calBuyAmountInUsd, coinImage: coinImage, providerName: providerName, quoteID: quoteID});
			
			if(provider_name == 'Simplex'){
				formData  = {
					command: 'simplexCreatePayment',
					quote_id: quote_id,
					fiat_currency: fiatSymbol,
					wallet_type: "<?php echo $_POST['walletType'];?>",
					fiat_amount: "<?php echo $_POST['estimateAmountPayUSD'];?>",
					payment_method_type: Array("credit_card"),
					transaction_type: "buy",
					destination_address: "<?php echo $_POST['destinationAddress'];?>",
					crypto_amount: "<?php echo $_POST['amount']?>",
					transaction_token: "<?php echo $_POST['transactionToken'];?>",


				}; 

				fCallback = simplexCreatePayment;  
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
			}
			else if(provider_name == 'Xanpool'){
				formData  = {
					command: 'xanpoolCreatePayment',
					fiat_amount: "<?php echo $_POST['estimateAmountPayUSD']?>",
					fiat_currency: fiatSymbol	,
					wallet_type: "<?php echo $_POST['walletType'];?>",
					crypto_amount: "<?php echo $_POST['amount'];?>",
					transaction_type: "buy",
					destination_address: "<?php echo $_POST['destinationAddress'];?>",
					transaction_token: "<?php echo $_POST['transactionToken'];?>",

				}; 

				fCallback = xanpoolCreatePayment;  
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
			}
			
		 
		});
		
		$("#tncCheckBox").change(function() {
			
			if(this.checked){
				$('#proceedBtn').prop("disabled", false);
				
			}
			else{
				$('#proceedBtn').prop("disabled", true);
				
			}
		});
		
		 
		
		

	});
	
	
	function simplexCreatePayment(data, message){
		var payment_id = data.data.payment_id;
		var partner_name = data.data.partner_name;
		var payment_flow_type = data.data.payment_flow_type;
		var payment_success_url = data.data.payment_success_url;
		var payment_failed_url = data.data.payment_failed_url;
		var payment_checkout_page = data.data.payment_checkout_page;
		
		
//		$('input[name="version"]').val();
		$('input[name="partner"]').val(partner_name);
		$('input[name="payment_flow_type"]').val(payment_flow_type);
		$('input[name="return_url_success"]').val(payment_success_url);
		$('input[name="return_url_fail"]').val(payment_failed_url);
		$('input[name="payment_id"]').val(payment_id);
		
		
		$('#payment_form').attr('action', payment_checkout_page);
		
			
		document.forms["payment_form"].submit();


    }
	
	function xanpoolCreatePayment(data, message){
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
		
		if(symbol == "USDT")
		{
			//var chain = data.data.chain;
			var chain = "tron";
			var xanpool_checkout_url = checkout_page_url +'/?apiKey='+api_key+'&redirectUrl='+redirect_url+'&wallet='+destination_address+'&partnerData='+payment_data+'&fiat='+fiat_amount+'&cryptoCurrency='+symbol+'&currency='+currency+'&transactionType='+type+'&chain='+chain;
		}
		else
		{
			var xanpool_checkout_url = checkout_page_url +'/?apiKey='+api_key+'&redirectUrl='+redirect_url+'&wallet='+destination_address+'&partnerData='+payment_data+'&fiat='+fiat_amount+'&cryptoCurrency='+symbol+'&currency='+currency+'&transactionType='+type;
		}
//		$.redirect('xanpoolCheckout.php', {symbol: symbol, amount: amount, type: type, paymentId: payment_data, destinationAddress: destination_address, apiKey: api_key, redirectURL: redirect_url, fiatAmount: fiat_amount, currency: currency});
		
		// var xanpool_checkout_url = checkout_page_url +'/?apiKey='+api_key+'&redirectUrl='+redirect_url+'&wallet='+destination_address+'&partnerData='+payment_data+'&fiat='+fiat_amount+'&cryptoCurrency='+symbol+'&currency='+currency+'&transactionType='+type;
		window.location.replace(xanpool_checkout_url);
//		$.redirect(xanpool_checkout_url);
    }
	

</script>

