<?php 
	$login=false;
?>
<style>
.row{
	margin:0 !important;
}

</style>
<?php include 'include/config.php'; ?>
<?php include 'headLogin.php'; ?>

<body class="navSignUpBtn m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default f-17"  style="background-image: url('images/qrImg/qrSectionBg.png'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">

	
	<div class="m-grid m-grid--hor m-grid--root m-page">


		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(images/bg-3-1.jpg);">
			<div class="m-grid__item m-grid__item--fluid m-login__wrapper changePadding">
				<div class="m-login__container qrDIV" style="">

					<div id="displayLanding" class="col-12 text-center" style="margin-top: 50px;">
						<div class="row">
							<div class="col-12">
								<img class="fade-in nuxpayQRLogo" src="<?php echo $loginlogo;?>">
							</div>
							<div class="col-12 px-0 displayLandingFont" style="margin-top: 10px; <?php echo $sys['isWhitelabel'] ? 'display:none' : 'display:block' ?>">
								<span id="text1" class="textColor">Send and Receive</span>
								<span id="text2" class="textColor">BTC/USDT</span>
								<span id="text3" class="textColor">like Paypal</span>
<!--								<span id="text4" class="textColor">Solution</span>-->
							</div>
						</div>
						
					</div>


					<div id="displayContent" class="col-12" style="display: none; padding:0;">
						<div class="row justify-content-center" style="">
						<!-- <div class="row justify-content-center" style="margin-left:-15px; margin-right:-15px;"> -->
							<div class="col-xl-12 col-lg-12" style="padding:0;">
							
							<div style="text-align:center;">
								<img id="logoImg" class="qrPaymentLogo" src="" width="" style="width:50%" />
								<!-- <img id="logoImg" class="qrPaymentLogo" src="images/nuxPay/nuxpay_logo.png" width="" style="width:50%" /> -->
							</div>

							<div class="row">

								<div class="input-group-append topBtnDiv">
									<span id="cryptowalletBtn" class="input-group-text topBtn" id="basic-addon2"><img src="images/nuxPay/crypto.png" width="25px" style="margin-right: 6px; image-rendering: -webkit-optimize-contrast;" />Cryptocurrency Wallet</span>
								</div>

							</div>

							<div class="row infoDetailsBg">

									<div class="col-12">
										<div class="row">
											<div class="qrTitle5 widthInner1" style="margin-top: 3px;">
											<?php echo $translations["M01996"][$language]; /* Summary of Transaction */ ?> :
											</div>
											<div class="widthInner2" style="">
												<hr style="border-top: 2px solid #2F56F7">
											</div>
										</div>
									</div>

									<div class="col-12 px-0 mt-0 mt-md-4">
										<div class="row" style="margin-top:10px !important;">
											<div id="type" class="col-xl-4 col-lg-4 col-md-6 col-6 qrTitle6 mt-0">
											<?php echo $translations["M01997"][$language]; /* Currency */ ?> :
											</div>
											<div id="currency" class="col-xl-8 col-lg-8 col-md-6 col-6 qrTitle7" style="text-transform: uppercase; display:block">
											</div>
											
											<div class="col-xl-8 col-lg-8 col-md-6 col-12  walletTypeDropdown2" style="display:none;">
                                                <select id="walletDropdown" class="full-width selectValue" style=""></select>
                                            </div>
										</div>
										<div class="row mt-1" style="margin-top:5px !important;">
											<div class="col-xl-4 col-lg-4 col-md-6 col-6 qrTitle6">
											<?php echo $translations["M01998"][$language]; /* Pay To */ ?> :
											</div>
											<div id="company" class="col-xl-8 col-lg-8 col-md-6 col-6 qrTitle8 ">
											</div>
										</div>
										<div id="amountDIV" class="row mt-1" style="display: none; margin-top:5px !important;">
											<div class="col-xl-4 col-lg-4 col-md-6 col-6 qrTitle6">
											<?php echo $translations["M01999"][$language]; /* Amount To Pay */ ?>:
											</div>
											<div class="col-xl-8 col-lg-8 col-md-6 col-6 qrTitle8 amount">
											</div>
										</div>
										<!-- <div class="row mt-1">
											<div class="col-xl-4 col-lg-4 col-md-6 col-12 qrTitle6">
												Payment of :
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-12 qrTitle8">
												ABC Goods and Services
											</div>
										</div> -->
										<div class="row mt-1" style="margin-top:5px !important;">
											<div class="col-xl-4 col-lg-4 col-md-6 col-6 qrTitle6">
											<?php echo $translations["M02000"][$language]; /* Reference No */ ?> :
											</div>
											<div id="payment_id" class="col-xl-8 col-lg-8 col-md-6 col-6 qrTitle8">
											</div>
										</div><!-- 
										<div class="row mt-1">
											<div class="col-6 qrTitle6">
											
												<a href ="" id="switchZeroFee"><button class="btn primaryBtn">Switch to Zero Fee</button></a>
											</div>
										</div> -->
									</div>

								</div>


								<div id="qrSectionDiv" class="">
									<div class="row">

										<div class="col-12 qrTitle1 text-center">
											Scan and pay with Cryptocurrency Wallet
										<!-- M01994 scan and pay -->
										</div>
										<!-- <div class="col-12 text-center marginBottom1">
											<img src="images/qrImg/footerLogoSmall.svg" width="16px" style="margin-right: 6px" />
											<span class="qrTitle2">COMPANY</span>
										</div> -->
										<div class="col-12 text-center marginBottom2">
											<div id="qrcode" class=""></div>
										</div>
										<!-- <div class="col-12 text-center marginBottom3">
											<span class="qrTitle3">Timeout In: 04:12</span>
										</div> -->

									</div>
									<div class="row marginBottom4">
										<div class="col-12 px-0">
											<div class="input-group" style="width:80%; margin:auto;">
												<input id="address" type="text" class="form-control" placeholder="" aria-describedby="basic-addon2" disabled>
												<div class="input-group-append">
													<span id="copy" class="input-group-text copyBtnDesign" id="basic-addon2"><img src="images/qrImg/copyIcon.svg" width="16px" style="" /></span>
													<!-- <span id="copy" class="input-group-text copyBtnDesign" id="basic-addon2"><img src="images/qrImg/copyIcon.svg" width="16px" style="margin-right: 6px" /><?php echo $translations["M01995"][$language]; /* Copy */ ?></span> -->
												</div>
											</div>
										</div>

									</div>




									<div id="zeroFee">
										<div class="row zeroFee" style="margin-top:10px";>
											<div class="col-md-7 col-12 qrTitle6 innerZeroFee" style="margin-top:10px">
												<?php echo $translations["M02001"][$language]; /* Want to Pay With Zero Fee? */ ?>
											</div>		
											<div class="col-md-5 col-12 qrTitle6 innerZeroFee" >		
												<a href ="" id="switchZeroFee"><button class="btn primaryBtn"><?php echo $translations["M02002"][$language]; /* Login to NuxPay */ ?></button></a>
											</div>
											

											<div class="col-12" id="buyCryptoCointainer">
												<hr class="buyCryptoHR">
												<div class="row">
													<div class="col-md-4 col-12 qrTitle6 mb-md-0 mb-2">
														Buy crypto with
													</div>
													<div class="col-md-4 col-6">
		<!--												<img src="images/buycrypto/simplex.png" id="simplexQrBtn">-->
														<div id="simplexQrBtn"></div>
													</div>
													<div class="col-md-4 col-6 d pt-1">
		<!--												<img src="images/buycrypto/xanpool.png" id="xanpoolQrBtn">-->
														<div id="xanpoolQrBtn"></div>
														
													</div>

												</div>
											</div>
										</div>
										
									</div>
								</div>

								<!-- <div class="row" style="margin-top: 20px;margin-bottom: 20px;">
									<div class="col-md-6 col-4 text-right align-self-center poweredBy px-0">
									<?php echo $translations["M02003"][$language]; /* power by */ ?>
									</div>
									<div class="col-md-6 col-8 align-self-center">
										<img class="nuxpayQRLogoFooter" src="<?php echo $qrLogo; ?>">
									</div>
								</div> -->

								<div class="row backMerchant">
									<button class="btn primaryBtn" id="backMerchantBtn" style="margin:auto; width:auto;"><?php echo $translations["M02004"][$language]; /* Back To Merchant Site */ ?></button>
								</div>

							</div>
						</div>
					</div>

				</div>	
			</div>
		</div>	

	</div>
	
	<?php include 'sharejsDashboard.php'; ?>   
	<script src="js/jquery.qrcode.js" type="text/javascript"></script>
</body>


</html>

<script>
	var url             = 'scripts/reqPaymentGateway.php';
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 0;
	var fCallback = "";
	var transactionToken = "<?php echo $_POST['transaction_token'] ?>";
	if(transactionToken == ""){
		transactionToken = "<?php echo $_GET['transaction_token'] ?>";
	}
    var dropdownFake;     
	var includeWalletDropdownListBusiness = <?php $includeWalletDropdown = $sys['includeWalletDropdownListBusiness']; echo json_encode($includeWalletDropdown); ?>;
	var currentDomain = <?php $currentDomain = $currentDomain; echo json_encode($currentDomain); ?>;
	var ori_amount ="";
	var ori_wallet_type= "";
	//var ori_symbol = "";
	var ori_qrAddress = "";
	var ori_business_id = "";
	var converted_fiat_amount = "";
    var walletTypeImage = [];
	var selectedRate = "";
	var amount = "";
	var provider_name = '';
	// var toggle_new_address = '<?php echo $_POST['toggle_new_address']?>';

	var selectedWalletType = "";
	//var selectedSymbol = "";
	var selectedQrAddress = "";

	var is_direct = 0;
	var direct_url = "";
	var direct_detail = "";
	var payment_channel = "";

	$(document).ready(function(){
		if(currentDomain.includes(".com")){
			var imageSrc = "images/nuxpayLogo1.png";
		}else if(currentDomain.includes(".io")){
			var imageSrc = "images/nuxpayLogo4.png";
		}else if(currentDomain.includes(".net")){
			var imageSrc = "images/nuxpayLogoN.png";
		}else{
			var imageSrc = "images/nuxpayLogo2.png";
		}

		document.getElementById("logoImg").src = imageSrc;

		formData = {
			command: 'getBuyCryptoSetting',
			provider: Array('simplex', 'xanpool')
		};

		fCallback = getBuyCryptoSetting;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		
		$("#simplexQrBtn").click(function(){
			var selectedWalletType = $('select#walletDropdown option:selected').val();
			provider_name = 'Simplex';
			
			getConversionRate();
			
		});

		$("#visaBtn").click(function(){
			var selectedWalletType = $('select#walletDropdown option:selected').val();
			provider_name = 'Simplex';
			
			getConversionRate();

		});

		$("#cryptowalletBtn").click(function(){
			var qrSection = document.getElementById('qrSectionDiv');
			var displaySetting = qrSection.style.display;

    		if (displaySetting == 'block') {
				qrSection.style.display = 'none';
			}else{
				qrSection.style.display = 'block';
			}
			$('#transferAuthorizModal').modal('hide');
		});
		
		$("#xanpoolQrBtn").click(function(){
			var selectedWalletType = $('select#walletDropdown option:selected').val();
			provider_name = 'Xanpool';
			
			getConversionRate();
			
			
		});

		$("#duitnowBtn").click(function(){

			var selectedWalletType = $('select#walletDropdown option:selected').val();
			provider_name = 'Xanpool';
			
			getConversionRate();

		});


		setTimeout(function() {
		    $('#text1').addClass("changeTextColor");
		    $("#text1").addClass("fade-in");
		}, 1000);

		setTimeout(function() {
		    $('#text2').addClass("changeTextColor");
		    $("#text2").addClass("fade-in");
		}, 1800);

		setTimeout(function() {
		   	$('#text3').addClass("changeTextColor");
		    $("#text3").addClass("fade-in");
		}, 2600);

		setTimeout(function() {
		    $('#text4').addClass("changeTextColor");
		    $("#text4").addClass("fade-in");
		}, 3400);

		setTimeout(function() {

			if(is_direct==1 && payment_channel != "crypto_wallet"){
				$.redirect(direct_url, {
					direct_detail: direct_detail,
					payment_channel: payment_channel
				});

			} else {
				$("#displayLanding").hide();
		   		$("#displayContent").show();
			}
		   
		}, 4500);

		fCallback = getPgTransactionDetails;

	    formData  = {
	      command: 'getPgTransactionDetails',
	      transactionToken : transactionToken
	    };    
	    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	    $('#copy').click(function(){
	    	copyToClipboard($('#address').val())
	    });

		$('#walletDropdown').on('change', function (e) {
			var to_wallet_type = $('select#walletDropdown option:selected').val();
			if(to_wallet_type != null){



				formData  = {
				  command: 'getProvider',
				  walletType: to_wallet_type,
				};    
				fCallback = provider;
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


				formData  = {
				  command: 'webpaypaymentaddressdetailget',
				  transactionToken : transactionToken,
				  walletType: to_wallet_type,
				};    
				fCallback = getPaymentAddressDetails;
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);



				// if(ori_amount != ''){
				// 	fCallback = getConversionAmountDetails;

				// 	formData  = {
				// 	  command: 'webpayconversionamountget',
				// 	  amount: ori_amount,
				// 	  walletType: ori_wallet_type,
				// 	  toWalletType: to_wallet_type
				// 	};    
				// 	ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
				// }
			}
			
		
		});
//
		$('#switchZeroFee').attr("href", "<?php echo $sys['domain'];?>/login.php?transaction_token="+transactionToken);
		
	});
	
	function getPaymentAddressDetails(data,message){

		

		var addressDetails = data.data
		var qrAddress = addressDetails.address;
		var walletType = addressDetails.wallet_type;
		$("#address").val(addressDetails.address);
		$("#currency").text(addressDetails.wallet_type);
		var markupAmount = addressDetails.markup_amount;
		var convertedAmount = addressDetails.amount;
		var currencyUnit = addressDetails.currency_unit;
		
		console.log(markupAmount)

		profile_picture_url = "<?php echo $sys['qrLogoIcon']?>";
		$('#qrcode').empty().qrcode({
		    render: "canvas", 
		    text: walletType+':'+qrAddress,
		    width: 200,
		    height: 200,
		    background: "#ffffff",
		    foreground: "#000000",
		    src: profile_picture_url,
		    imgWidth: 40,
		    imgHeight: 40,
		});

		
		selectedWalletType = walletType;
		selectedQrAddress = qrAddress;
		amount = (markupAmount == 0) ? convertedAmount : markupAmount;
		var autoswapText = (markupAmount == 0) ? '' : ' *network fee included ';
		wallet_type = walletType;
		$('.amount').text(amount + ' ' + currencyUnit + " " + autoswapText);
	}
	

	function copyToClipboard(val){
	    var dummy = document.createElement("input");
	    document.body.appendChild(dummy);
	    // $(dummy).css('display','none');
	    dummy.setAttribute("id", "dummy_id");
	    document.getElementById("dummy_id").value=val;
	    dummy.select();
	    document.execCommand("copy");
	    document.body.removeChild(dummy);
	    swal.fire({
	        position:"center",
	        type:"success",
	        title:"<?php echo $translations["M00137"][$language]; /* Copied to clipboard  */?>",
	        showConfirmButton:!1,
	        timer:1000
	    })
	}

	function getPgTransactionDetails(data,message){

		transactionDetails = data.data;
		gateway_type = transactionDetails.gateway_type;
		switch_currency = transactionDetails.switch_currency;
		amount = transactionDetails.amount;
		ori_amount = amount;
		ori_wallet_type = transactionDetails.currency;
		var business_id= transactionDetails.business_id.toString();
		ori_business_id = business_id;

		is_direct = transactionDetails.is_direct;
		direct_url = transactionDetails.direct_url;
		direct_detail = transactionDetails.direct_detail;
		payment_channel = transactionDetails.payment_channel;

		if(switch_currency == '1'){
			if(gateway_type == "BC"){
				formData  = {
					command: 'getWalletType',
					setting_type: 'nuxpay_wallet',
					user_id : business_id
				};
				fCallback = getWalletType; 
				ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

			}

			if(gateway_type == "PG"){
				formData  = {
					command: 'getWalletType',
					setting_type: 'payment_gateway_filter',
					tx_wallet_type: ori_wallet_type,
					user_id : business_id
				};
				fCallback = getWalletType; 
				ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

			}
			$('.walletTypeDropdown2').show();
			$('#currency').hide();
			$('#amountDIV').show();	
			$(".amount").text(transactionDetails.amount+" "+transactionDetails.currency_name);
			
			$('#type').css('display', 'flex');

			var includeWalletDropdown = includeWalletDropdownListBusiness.includes(business_id);
		
			if(includeWalletDropdown == true){
				$('.walletTypeDropdown2').show();
				$('#currency').hide();
				$('#amountDIV').show();	
				$(".amount").text(transactionDetails.amount+" "+transactionDetails.currency_name);
				
				$('#type').css('display', 'flex');
			}
			else{
				$('.innerZeroFee').hide();
				$('.buyCryptoHR').hide();
				updateZeroFeeDivStatus();
			}
		}
		else{
			$('.innerZeroFee').hide();
			$('.buyCryptoHR').hide();
			updateZeroFeeDivStatus();
			$('#amountDIV').show();	
			$(".amount").text(transactionDetails.amount+" "+transactionDetails.currency_name.toUpperCase());
		}

        if(is_direct == 1 && payment_channel == "crypto_wallet"){
            $('#duitnowBtn').hide();
            $('#visaBtn').hide();
            $('#cryptowalletBtn').hide();
            
            var qrSection = document.getElementById('qrSectionDiv');
            var displaySetting = qrSection.style.display;

            if (displaySetting == 'block') {
                qrSection.style.display = 'none';
            }else{
                qrSection.style.display = 'block';
            }
            $('#transferAuthorizModal').modal('hide');

        }else{
            $('#duitnowBtn').show();
            $('#visaBtn').show();
        }

		var qrAddress = transactionDetails.address;
		ori_qrAddress = qrAddress;

		$("#company").text(transactionDetails.business_name);
		$("#payment_id").text(transactionDetails.payment_id);
		$("#address").val(transactionDetails.address);
		$("#currency").text(transactionDetails.currency_name);
		
		$('#walletDropdown').val(transactionDetails.currency).trigger('change');
		$('select#walletDropdown option:selected').val(transactionDetails.currency).trigger('change');
		
		selectedWalletType = transactionDetails.currency;
		//selectedSymbol = transactionDetails.currency_name;
        selectedQrAddress = qrAddress;

//		var profile_picture_url = transactionDetails.profile_picture_url;
//
//		if(transactionDetails.profile_picture_url == ""){
//			
//		}
		profile_picture_url = "<?php echo $sys['qrLogoIcon']?>";
		$('#qrcode').qrcode({
		    render: "canvas", 
		    text: qrAddress,
		    width: 200,
		    height: 200,
		    background: "#ffffff",
		    foreground: "#000000",
		    src: profile_picture_url,
		    imgWidth: 40,
		    imgHeight: 40,
		});

		$('#backMerchantBtn').click(function(){
	    	formData  = {
		      command: 'getPgTransactionCheckStatus',
		      transactionToken : transactionToken
		    };    
		    $.ajax({
		        type: method,
		        url: url,
		        data: formData,
		        success : function(result) {
		          var obj = JSON.parse(result);
		          if ( (obj.data.status=="success" && obj.data.exchange_rate!=null) || obj.data.status=="failed") {
		          	$.redirect(obj.redirect_url, obj.data);
		          } else if (obj.data.status=="cancelled"){
		        	$.redirect(obj.redirect_url, obj.data);
		          }
		        },
		        error   : function(result) {

		        }
		     });


	  	});


		setInterval(function(){
		    formData  = {
		      command: 'getPgTransactionCheckStatus',
		      transactionToken : transactionToken
		    };    
		    $.ajax({
		        type: method,
		        url: url,
		        data: formData,
		        success : function(result) {
		          var obj = JSON.parse(result);
		          if ( obj.data.transaction_id!=null) {
				obj.data.transaction_status = obj.data.status;
				obj.data.status = "success";
		          	$.redirect(obj.redirect_url, obj.data);
		          }
		        },
		        error   : function(result) {
		        }
		     });
		}, 3000);

	}

	function getWalletType(data,message){
		// var wallets = data.result.coin_data;
		
		var wallets = data.result.coin_data;


		if (wallets ) {
			$.each(wallets, function(key, val){
				
//                    if(val['wallet_type'] == 'tetherusd' || val['wallet_type'] == 'ethereum' || val['wallet_type'] == 'bitcoin'){
					$('#walletDropdown').append('<option dataName="'+ val['name'] +'" data-image="'+val['image']+'" data-symbol="'+val['symbol']+'" value="'+ val['wallet_type'] +'">'+ val['display_symbol'] +'</option>')
//                    }/
				
				walletTypeImage[val['wallet_type']] = val['image'];
			});
			dropdownFake = 1;
		}


		$('#walletDropdown').select2({
			dropdownAutoWidth : true,
			width: 'auto',
			minimumResultsForSearch: Infinity,
			templateResult: formatState,
			templateSelection: formatState
		});

		$('#walletDropdown').val(ori_wallet_type).trigger('change');
		$('select#walletDropdown option:selected').val(ori_wallet_type).trigger('change');

		selectedWalletType = ori_wallet_type;
		//selectedSymbol = ori_symbol;
		selectedQrAddress = ori_qrAddress;

	}
	
	function formatState (method) {
		if (!method.id) {
			return method.text;
		} 


		var optimage = $(method.element).attr('data-image')
		if(!optimage){
		return method.text;
		} else {                    
			var $opt = $(
						'<span><img src="'+optimage+'" class="walletTypeIcon" /> <span style="vertical-align: middle; color:black; padding-right:20px;">' + method.text + '</span></span>'
			);
			return $opt;
		}
	}
	
	function getConversionAmountDetails(data, messsage){
		if(data.code == 1){
			var converted_amount = data.data.converted_amount;
			var to_symbol = data.data.to_symbol;
			var to_wallet_type =data.data.to_wallet_type;
			
			amount = converted_amount;
			wallet_type = to_wallet_type;
			$('.amount').text(converted_amount + ' ' +to_symbol);
			
        }     
	}
	
	
// 	function getSimplexQuote(data, message){
//         var quoteID = data.data.quote_id;
		
// //		var amount = $('#amount').val();
// 		var coinImage = walletTypeImage[$('#walletDropdown').val()];
// 		var selectedWalletType = $('#walletDropdown').val();
// //        var selectedFiatCurrency = $('#fiatCurrency').val();	
//         var pg_address = $('#address').val();
// 		var selectedSymbol = $('#walletDropdown').find(':selected').data('symbol');

// 		var estimateAmountToPay = data.data.requested_amount;
// 		var cryptoAmount = data.data.crypto_amount;

// 		$.redirect('buyCryptoRequest.php', {symbol: ori_symbol, amount: cryptoAmount, fiatSymbol:'usd', estimatePriceUSD: selectedRate, estimateAmountPayUSD: estimateAmountToPay, coinImage: coinImage, providerName: "Simplex" , quoteID: quoteID, walletType:ori_wallet_type, destinationAddress: pg_address});

//     }

	 function getConversionRate() {
		//var selectedWalletType = $('select#walletDropdown option:selected').val();
		 
		// formData  = {
		// 	command: 'getconversionrate',
		// 	amount: 1,
		// 	wallet_type: ori_wallet_type,//selectedWalletType,
		// 	fiat_currency_id: provider_name == 'Xanpool' ? 'myr' : 'usd'

		// }; 

		// fCallback = getConversionRateReturn;  
		// ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		formData  = {
			command: 'payment_gatewaymerchantbuysellpaymentrequest',
			account_id: ori_business_id,
			wallet_type: selectedWalletType,
			crypto_amount: amount,
			fiat_currency: provider_name == 'Xanpool' ? 'myr' : 'usd',
			type: "buy",
			destination_address: selectedQrAddress,
			provider: provider_name,
			reference_id: transactionToken

		}; 
		//console.log(formData);
		fCallback = buySellRequestReturn;  
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	}
	
	function buySellRequestReturn(data, message) {

		if (data.code==1) {
			var redirect_url = data.data.redirect_url;
			//console.log('redirect_url: '+redirect_url);

			$.redirect(redirect_url, {});

		}

	}

	// function getConversionRateReturn(data, message) {
	// 	selectedRate = data.data.crypto_converted_amount;
	// 	converted_fiat_amount = (amount * selectedRate).toFixed(2);
	// 	var selectedWalletType = $('#walletDropdown').val();
		
		
	// 	if(provider_name == 'Simplex'){
	// 		formData  = {
	// 			command: 'getSimplexQuote',
	// 			wallet_type: ori_wallet_type,//selectedWalletType,
	// 			fiat_currency: 'usd',
	// 			crypto_amount: amount,
	// 			transaction_type: 'buy',
	// 			payment_method_type: Array('credit_card'),
	// 			destination_address: $('#address').val(),

	// 		}; 

	// 		fCallback = getSimplexQuote;  
	// 		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	// 	}
	// 	else if(provider_name == 'Xanpool'){
	// 		formData = {
	// 			command: 'getXanpoolQuote',
	// 			wallet_type: ori_wallet_type,//selectedWalletType,
	// 			fiat_currency: 'myr',
	// 			requested_currency: 'myr',
	// 			requested_amount: converted_fiat_amount,
	// 			crypto_amount: amount,
	// 			transaction_type: 'buy',
	// 			destination_address: $('#address').val()

	// 		};


	// 		fCallback = getXanpoolQuote;
	// 		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	// 	}


		
	
 //    }
	
	// function getXanpoolQuote(data, message) {

	// 	var amount = $('#amount').val();
	// 	var coinImage = walletTypeImage[$('#walletDropdown').val()];
	// 	var providerName = $('input[name="paymentRadio"]:checked').val();
	// 	var selectedWalletType = $('#walletDropdown').val();
 //        var pg_address = $('#address').val();
	// 	var selectedSymbol = $('#walletDropdown').find(':selected').data('symbol');

	// 	var estimateAmountToPay = data.data.fiat_amount;
	// 	var cryptoAmount = data.data.crypto_amount;

	// 	$.redirect('buyCryptoRequest.php', {
	// 		symbol: ori_symbol,
	// 		amount: cryptoAmount,
	// 		fiatSymbol: 'sgd',
	// 		estimatePriceUSD: selectedRate,
	// 		estimateAmountPayUSD: estimateAmountToPay,
	// 		coinImage: coinImage,
	// 		providerName: 'Xanpool',
	// 		walletType: ori_wallet_type,
	// 		destinationAddress: pg_address
	// 	});


	// }
	
	function getBuyCryptoSetting(data, message){
		var setting_data = data.setting_data;
		
		$.each(setting_data, function(key, val) {	
			$.each(val, function(key1, val1) {
				if(key == 'simplex'){
					if(key1 == 'isEnabled'){
						if(val1 == '1'){
							$('#simplexQrBtnDiv').show();
							$('.visaBtnDiv').show();
						}
						else{
							$('#simplexQrBtnDiv').hide();
							$('.visaBtnDiv').hide();
						}
					}
				}	
				else if(key == 'xanpool'){
					if(key1 == 'isEnabled'){
						if(val1 == '1'){
							$('#xanpoolQrBtnDiv').show();
							$('.duitnowBtnDiv').show();
						}
						else{
							$('#xanpoolQrBtnDiv').hide();
							$('.duitnowBtnDiv').hide();
						}
					}
				}
				
				
			});
		});		
	}

	function provider(data){ 
		simplex = data.result.simplex;
		xanpool = data.result.xanpool;
		 if (simplex != '1'){
			$('#simplexQrBtn').hide();
			$('.visaBtnDiv').hide();
		 }
		 else{
			$('#simplexQrBtn').show();
			$('.visaBtnDiv').show();
		 }

		 if (xanpool != '1'){
			$('#xanpoolQrBtn').hide();
			$('.duitnowBtnDiv').hide();
		 }
		 else {
			$('#xanpoolQrBtn').show();
			$('.duitnowBtnDiv').show();
		}

			if((simplex != '1') && (xanpool != '1')){
				$('#buyCryptoCointainer').hide();
			}else{
				$('#buyCryptoCointainer').show();
			}
			updateZeroFeeDivStatus();
	}

	function updateZeroFeeDivStatus(){
		if ( $('#buyCryptoCointainer').css('display') == 'none' && $('.innerZeroFee').css("display") == "none"){
			$('#zeroFee').hide();
		}else{
			$('#zeroFee').show();
		}
	}


   
</script>
