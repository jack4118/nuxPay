<?php include 'include/config.php'; ?>
<?php include 'headLogin.php'; ?>

<html>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="<?php echo $sys['xanpoolCDNUrl'];?>"></script>
	<script>

		var isAutoSelling = "<?php echo $_POST['isAutoSelling'];?>";
		function onWidgetEvent(message) {
			var payloadData = JSON.stringify(message.payload);
			var payload = message.payload;

			var payment_id = "<?php echo $_POST['paymentData'];?>";
			var reference_id = payload.id;
			var destination_address = payload.depositWallet;
			var transaction_type = payload.type;
			var crypto_amount = payload.crypto;
			var fiat_amount = payload.fiat;
			var symbol = payload.cryptoCurrency;
			var fiat_currency = payload.currency;

			// if (transaction_type == 'sell' && isAutoSelling != false) {
			// 	var formData = {
			// 		command: 'transferSellCrypto',
			// 		payment_id: payment_id,
			// 		reference_id: reference_id,
			// 		crypto_amount: crypto_amount,
			// 		symbol: symbol,
			// 		fiat_amount: fiat_amount,
			// 		fiat_currency: fiat_currency,
			// 		destination_address: destination_address

			// 	};

			// 	$.ajax({
			// 		type: 'POST',
			// 		url: 'scripts/reqPaymentGateway.php',
			// 		data: formData,
			// 		async: false,
			// 		success: function(result) {
			// 			var obj = JSON.parse(result);
			// 		},
			// 		error: function(result) {
					
			// 		}
			// 	});
			// }

		}

		function onLoad() {
			var transaction_type = "<?php echo $_POST['type']?>";

			const options = {
				apiKey: "<?php echo $_POST['apiKey'];?>",
				wallet: "<?php echo $_POST['destinationAddress'];?>",
				cryptoCurrency: "<?php echo $_POST['symbol'];?>",
				transactionType: "<?php echo $_POST['type'];?>",
				partnerData: "<?php echo $_POST['paymentData'];?>",
				currency: "<?php echo $_POST['fiatSymbol'];?>",
				redirectUrl: "<?php echo $_POST['redirectURL'];?>",
				fiat: "<?php echo $_POST['fiatAmount'];?>",
				autoSelling: transaction_type == 'sell' && isAutoSelling != "false" ? true : false,
				// autoSelling :false,
			};

			const widget = new XanPoolWidget(
				options, document.getElementById("widgetContainer"), onWidgetEvent
			);


			widget.init();

		}

	

	</script>
	<style type="text/css">
		.widgetContainer {
			width: 600px;
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

	</style>
</head>


<body onload="onLoad()">
	<div id="checkoutHeader" class="py-2">
		<a href='index.php'><img id="checkoutHeaderLogo" src="<?php echo $dashboardLogo; ?>"></a>
	</div>
	<div class="h-100 row align-items-center">
		<div id="widgetContainer" class="widgetContainer m-auto" />

	</div>
	<!-- begin::Footer -->
	<footer id="footerID" class="m-grid__item m-footer">
		<div class="m-container m-container--fluid m-container--full-height m-page__container">
			<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
				<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last text-center">
					<span class="m-footer__copyright">
						Copyright &copy; <?php echo date("Y"); ?> <?php echo $sys['companyName']?>. All Rights Reserved.
						<!-- Copyright ©<?php echo date("Y"); ?> • NuxPay.com • <?php echo $translations['M00191'][$language]; //All Rights Reserved?>. --><?php if($sys['isWhitelabel'] != 1){ echo '<a href= "'.$sys['domain'].'/tnc">Terms & Conditions</a> | <a href="'.$sys['domain'].'/privacypolicy">Privacy Policy</a>';}?>
					</span>
				</div>
			</div>
		</div>
	</footer>

</body>

<!-- end::Footer -->

</html>
