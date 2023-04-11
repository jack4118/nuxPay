<?php include 'include/config.php'; ?>
<?php include 'headHomepage.php'; ?>

<body class="">
	<div class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed kt-page--loading">

		<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

				<section class="pCryptoBG">
					<div class="kt-container">
						<div class="row justify-content-center">
							
							<div class="col-12">
								<div class="row">
									<div class="col-12 text-center fundRaisingLogo">
										<img onclick="window.location='homepage.php'" src="<?php echo $sys['newHomepageLogo'] ?>" style="height: 100px;cursor: pointer;">
									</div>
								</div>
							</div>

							<div class="col-8 pPayCryptoTitle text-center">
								Get Access to cryptocurrencies like TheNux Coin, Bitcoin, Ethereum, LiteCoin, USDT and many more in Worldwide
							</div>

							<div class="col-10 text-center" style="margin-top: 40px;">
								<div class="row">
									<div class="widthInnerImage">
										<div class="widthInnerBorderCrypto">
											<div class="col-12"><img src="/images/cryptocurrencies/thenuxcoin.svg"></div>
											<div class="col-12 widthInnerTitle">TheNux Coin</div>
											<div class="col-12 widthInnerDes">(TNC)</div>
										</div>
									</div>
									<div class="widthInnerImage">
										<div class="widthInnerBorderCrypto">
											<div class="col-12"><img src="/images/cryptocurrencies/bitcoin.svg"></div>
											<div class="col-12 widthInnerTitle">Bitcoin</div>
											<div class="col-12 widthInnerDes">(BTC)</div>
										</div>
									</div>
									<div class="widthInnerImage">
										<div class="widthInnerBorderCrypto">
											<div class="col-12"><img src="/images/cryptocurrencies/ethereum.svg"></div>
											<div class="col-12 widthInnerTitle">Ethereum</div>
											<div class="col-12 widthInnerDes">(ETH)</div>
										</div>
									</div>
									<div class="widthInnerImage">
										<div class="widthInnerBorderCrypto">
											<div class="col-12"><img src="/images/cryptocurrencies/bitcoincash.svg"></div>
											<div class="col-12 widthInnerTitle">Bitcoin Cash</div>
											<div class="col-12 widthInnerDes">(BCH)</div>
										</div>
									</div>
									<div class="widthInnerImage">
										<div class="widthInnerBorderCrypto">
											<div class="col-12"><img src="/images/cryptocurrencies/usdt.png" width="100%"></div>
											<div class="col-12 widthInnerTitle">Tether USD</div>
											<div class="col-12 widthInnerDes">(USDT)</div>
										</div>
									</div>

									<div class="widthInnerImage widthInnerImageTop">
										<div class="widthInnerBorderCrypto">
											<div class="col-12"><img src="/images/cryptocurrencies/litecoin.svg"></div>
											<div class="col-12 widthInnerTitle">Litecoin</div>
											<div class="col-12 widthInnerDes">(LTC)</div>
										</div>
									</div>
									<div class="widthInnerImage widthInnerImageTop">
										<div class="widthInnerBorderCrypto">
											<div class="col-12"><img src="/images/cryptocurrencies/usd2.svg"></div>
											<div class="col-12 widthInnerTitle">USD2</div>
											<div class="col-12 widthInnerDes">(USD2)</div>
										</div>
									</div>
									<div class="widthInnerImage widthInnerImageTop">
										<div class="widthInnerBorderCrypto">
											<div class="col-12"><img src="/images/cryptocurrencies/myr2.svg"></div>
											<div class="col-12 widthInnerTitle">MYR2</div>
											<div class="col-12 widthInnerDes">(MYR2)</div>
										</div>
									</div>
									<div class="widthInnerImage widthInnerImageTop">
										<div class="widthInnerBorderCrypto">
											<div class="col-12"><img src="/images/cryptocurrencies/hkd2.svg"></div>
											<div class="col-12 widthInnerTitle">HKD2</div>
											<div class="col-12 widthInnerDes">(HKD2)</div>
										</div>
									</div>
									<div class="widthInnerImage widthInnerImageTop">
										<div class="widthInnerBorderCrypto">
											<div class="col-12"><img src="/images/cryptocurrencies/rmb2.svg"></div>
											<div class="col-12 widthInnerTitle">RMB2</div>
											<div class="col-12 widthInnerDes">(RMB2)</div>
										</div>
									</div>
								</div>
							</div>

							

							

						</div>
					</div>
				</section>

			</div>
		</div>
	</div>
	<?php include 'footerHomepage.php';?>
</div>
</div>
</div>
</body>
</html>

<?php include 'sharejsHomepage.php'; ?>

<script>
	$(document).ready(function(){

		$('#trackClick').click(function() {
			$('#dispalyTrack').show();
		});

	});
</script>
