<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<!-- <div class="m-subheader marginTopHeader">
				<div class="d-flex align-items-center">
					<div class="mr-auto">
						<div class="col-12">
							<div class="row">
								<div class="dashboardTitleWidth">
									<img src="images/dashboard/transactionIcon.svg" style="width: 30px; margin-top: 5px;" />
								</div>
								<div class="dashboardTitleWidth2">
									<div class="row">
										<div class="col-12 dashboardTitle">
											Invoice Listing
										</div>
										<div class="col-12 dashboardTitleDesc">
											You can view all the invoices here for request fund
										</div>
									</div>
								</div>
							</div>      
						</div>
					</div>  
				</div>
			</div> -->



			<div class="m-content marginTopHeader">

				<div class="col-12 pageHeader px-0">
				<?php echo $translations["M01627"][$language]; /* Withdrawal  */?>
				</div>

				<div class="col-12 mt-3 mb-5 px-0">
					<a href="personalWallet.php" style="font-size: 16px;">
						<i class="fa fa-angle-left"></i>
						<span class="ml-2" style="text-decoration: underline;">
						<?php echo $translations["M01797"][$language]; /* Back  */?>
						</span>
					</a>
        		</div>
				
				

                <div class="col-xl-12 px-0" id="showErrorMsg">

                	<div class="row">
						<div class="col-12 mb-3">
                			<div class="row">
                				<div class="col-12 bigText">
									<?php echo $translations["M01986"][$language]; /* Withdraw From  */?>
									
                				</div>
                				
								<div class="col-lg-5 col-12">
									<div class="row">
										<div class="radio radio-info radio-inline col-lg-6 col-md-3 col-6">
											<input type="radio" name="balance" value="available" id="" checked="">
											<label for="">
												<?php echo $translations["M01987"][$language]; /* Available Balance  */?>
												
											</label>
										</div>

										<div class="radio radio-info radio-inline col-lg-6 col-md-3 col-6">
											<input type="radio" name="balance" value="withholding" id="">
											<label for="">
												<?php echo $translations["M01988"][$language]; /* Withholding Balance  */?>
												
											</label>
										</div>
									</div>
								</div>
                			</div>
                		</div>
                		<div class="col-12">
                			<div class="row">
                				<div class="col-12 bigText">
								<?php echo $translations["M01834"][$language]; /* Crypto Currency  */?>
                				</div>
                				<div class="col-12 smallTxt">
								<?php echo $translations["M01835"][$language]; /* Select currency that you'd like to withdraw.  */?>
                				</div>
								<div class="align-self-center text-center walletTypeDropdown" style="margin-left: 0px; min-width: 240px;">			
									<div class="col-md-3 mt-3">
										<select id="coinTypeDropdown" class="full-width selectValue"></select>
									</div>
								</div>
                			</div>
                		</div>

                		<div class="col-12 mt-5 mt-md-4">
                			<div class="row">
                				<div class="col-12 bigText">
									<?php echo $translations["M02065"][$language]; /* Withdrawal To  */?>
                				</div>
                				<div class="col-12 smallTxt">
								<?php echo $translations["M02066"][$language]; /* Select or key in an address below to withdraw to */?>
                				</div>
                				<div class="col-12 mt-3">
                					<div class="m-portlet">
                						<div class="m-portlet__body">
		                					<div class="row">
		                						<div class="col-12">
		                							<div class="row m-form">
		                								<div class="col-12">
		                									<div class="row">
		                										<!-- <div class="col-12 col-md-6 align-self-center">
		                											<div class="row">
		                												<div class="col-12">
		                													Withdraw to TheNux Wallets No miner fee!
		                												</div>
		                												<div class="col-12 col-md-10 col-lg-9 mt-3">
		                													<div class="connectWalletButton">
		                													    <img src="images/nuxPay/newDesign/connectIcon.png">Connect with TheNux Wallets
		                													</div>
		                												</div>
		                											</div>
		                										</div> -->
		                										<div class="col-12 col-md-6 mt-5 mt-md-0 align-self-center">
		                											<div class="row" id="radioDiv">
                														<!-- <div class="col-12">
                															<div class="row">
                																<div class="col-1 px-0 align-self-center">
                																	<input type="radio" id="radioWallet1" name="radioWallet" value="">
                																</div>
                																<div class="col-11 px-0 align-self-center">
                																	<div class="row">
                																		<div class="col-12">
                																			John USDT Wallet
                																		</div>
                																		<div class="col-12 boldAddress text-truncate">
                																			0x4e6fdc0e3d68c65d13d74f9fd28c4c2bfbfa0e
                																		</div>
                																	</div>
                																</div>
                															</div>
																		</div> -->
																		<!-- <div class="col-12 mt-4">
                															<div class="row">
                																<div class="col-1 px-0 align-self-center">
                																	<input type="radio" id="radioWallet1" name="radioWallet" value="">
                																</div>
                																<div class="col-11 px-0 align-self-center">
                																	<div class="row">
                																		<div class="col-12 boldTxt">
                																			Other Wallet
                																		</div>
                																		<div class="col-12">
                																			<input class="form-control" placeholder="Key in your wallet address">
                																		</div>
                																	</div>
                																</div>
                															</div>
                														</div> -->
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

                		<div class="col-12">
							<!-- <button onclick="window.location.href='withdrawalConfirmation.php'" id="nextBtn" class="btn searchBtn" type="button">Next</button> -->
								<button id="nextBtn" class="btn searchBtn " type="button">
								<?php echo $translations["M01566"][$language]; /* Next */?></button>
								<button onclick="window.location.href='dashboard.php'" class="btn backBtn ml-0 ml-md-3" type="button">
								<?php echo $translations["M01797"][$language]; /* Back  */?></button>
								
							
							
                		</div>

                		
                	</div>
					
				</div>
			</div>

		</div>

	</div>
	<?php include 'footerDashboard.php'; ?>
</div>

<?php include 'sharejsDashboard.php'; ?>
<script src="js/jquery.qrcode.js" type="text/javascript"></script>

</body>
</html>

<script>
	var url             = 'scripts/reqDashboard.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = ""; 
	var firstTime       = "<?php echo $_POST['firstTime']; ?>";
	var previousCurrencyId = "<?php echo $_POST['currency_id'] ?>";
	var dropdownFake;
	var walletList;
	var NuxPayWalletList;
	var NuxPayWalletRetrieved = false;
	var symbolList = [];
	var walletRetrieved = false;
	var walletBalanceList;
	var checkWalletStatus = 1;
	
   $(document).ready(function(){

		formData = {
            command: 'getWalletBalance',
			wallet_status: checkWalletStatus,
			setting_type : 'both'
        };
        fCallback = getWalletBalance;
		ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		$('#nextBtn').click(function(){

			var withdraw_type = $('input[type=radio][name=balance]:checked').val();
			var currentWalletType = $('#coinTypeDropdown').val();
			var current_address = $('input[name=radioWallet]:checked').val();
			formData = {
				command: 'validateAddress',
				wallet_type : currentWalletType,
				address : current_address
			};
        	fCallback = validateAddress;
			ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
			// YF2
			/* if(withdraw_type == 'available'){
				var current_balance = symbolList[currentWalletType].balance;
				
				if (current_balance == 0){
					showMessage('Insufficient balance.', 'warning', 'Error', 'warning', '');
				} else if (!current_address){
					showMessage('No address selected.', 'warning', 'Error', 'warning', '');
				} else {
					$.redirect('withdrawalConfirmation.php', {
					image_url: symbolList[currentWalletType].image,
					walletType : currentWalletType,
					walletName: $('input[name=radioWallet]:checked').data('name'),
					address: current_address,
					balance: current_balance,
					symbol : symbolList[currentWalletType].symbol,
					withdrawType: withdraw_type,
				});
				}
			}
			else if(withdraw_type == 'withholding'){
				var current_balance = symbolList[currentWalletType].withhold_balance;
				if (current_balance == 0){
					showMessage('Insufficient balance.', 'warning', 'Error', 'warning', '');
				} else if (!current_address){
					showMessage('No address selected.', 'warning', 'Error', 'warning', '');
				} else {
					$.redirect('withdrawalConfirmation.php', {
					image_url: symbolList[currentWalletType].image,
					walletType : currentWalletType,
					walletName: $('input[name=radioWallet]:checked').data('name'),
					address: current_address,
					balance: current_balance,
					symbol : symbolList[currentWalletType].symbol,
					withdrawType: withdraw_type,
						
				});
				}

			}
			else{
					showMessage('Invalid Withdraw Type.', 'warning', 'Error', 'warning', '');
				
			} */
		});
   });
			// YF1
	$('#coinTypeDropdown').change(function(){
			fund_in_selected_currency = $('select#coinTypeDropdown option:selected').val();
			fund_in_selected_currency_address = fund_in_address_list[fund_in_selected_currency];
		
		if (!NuxPayWalletRetrieved){
			formData = {
				command: 'getNuxPayWalletAddressList',
			};
			fCallback = getNuxPayWalletAddress;
			ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		} else {
			loadWalletAddresses($('#coinTypeDropdown').val());
		}

	   if (!walletRetrieved){
			formData = {
				command: 'getDestinationAddressType',
			};
			fCallback = getDestinationAddress;
			ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	   } else {
			loadWalletAddresses($('#coinTypeDropdown').val());
	   }
   });
	
	$('input[type=radio][name=balance]').change(function() {
	 	loadWalletDropdown(this.value);
   });
	
   function loadWalletDropdown(withdraw_type){

	   if(withdraw_type == 'withholding'){
		    if(walletBalanceList){
					$('#coinTypeDropdown').empty();
				
				$.each(walletBalanceList.wallet_list, function(k,v){

					var name = v['name'];
					var currency_id = v['currency_id'];
					var symbol = v['display_symbol'];
					var image = v['image'];
					var balance = v['withhold_balance'];

					symbolList[currency_id] = {
						symbol: symbol,
						image: image,
						balance: balance
					}; 
					$('#coinTypeDropdown').append('<option dataName="'+ currency_id +'" data-image="'+ image +'" value="'+ currency_id +'">' + balance + ' ' + symbol.toUpperCase() + '</option>')
				})
				dropdownFake = 1;
				$('select#coinTypeDropdown').val(previousCurrencyId).trigger('change');
			}
	   }
	   else if(withdraw_type == 'available'){
		   if(walletBalanceList){
					$('#coinTypeDropdown').empty();
			   
				$.each(walletBalanceList.wallet_list, function(k,v){

					var name = v['name'];
					var currency_id = v['currency_id'];
					var symbol = v['display_symbol'];
					var image = v['image'];
					var balance = v['balance'];

					symbolList[currency_id] = {
						symbol: symbol,
						image: image,
						balance: balance
					}; 
					$('#coinTypeDropdown').append('<option dataName="'+ currency_id +'" data-image="'+ image +'" value="'+ currency_id +'">' + balance + ' ' + symbol.toUpperCase() + '</option>')
				})
				dropdownFake = 1;
				$('select#coinTypeDropdown').val(previousCurrencyId).trigger('change');
			}
	   }
	  
		
	
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
						'<span><img src="'+optimage+'" class="walletTypeIcon" /> <span style="vertical-align: middle;">' + method.text + '</span></span>'
			);
			return $opt;
		}
	};

	$('#coinTypeDropdown').select2({
		dropdownAutoWidth : true,
		templateResult: formatState,
		templateSelection: formatState
	});
   function getWalletBalance(data, message){
		var walletBalance = data.data;
	   walletBalanceList = data.data;

		if(walletBalance && dropdownFake != 1){
            $.each(walletBalance.wallet_list, function(k,v){
				
                var name = v['name'];
                var currency_id = v['currency_id'];
                var symbol = v['display_symbol'];
                var image = v['image'];
				var balance = v['balance'];
				
				symbolList[currency_id] = {
					symbol: symbol,
					image: image,
					balance: balance
				}; 
				$('#coinTypeDropdown').append('<option dataName="'+ currency_id +'" data-image="'+ image +'" value="'+ currency_id +'">' + balance + ' ' + symbol.toUpperCase() + '</option>')
			})
			dropdownFake = 1;
			$('select#coinTypeDropdown').val(previousCurrencyId).trigger('change');
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
		        	        '<span><img src="'+optimage+'" class="walletTypeIcon" /> <span style="vertical-align: middle;">' + method.text + '</span></span>'
		        );
		        return $opt;
		    }
		};

		$('#coinTypeDropdown').select2({
            dropdownAutoWidth : true,
            templateResult: formatState,
			templateSelection: formatState
		});
   }

   function getDestinationAddress(data, message){	   
		walletRetrieved = true;
		walletList = data.result.destination_addresses;
		loadWalletAddresses(previousCurrencyId);
   }

   function getNuxPayWalletAddress(data, message){
		NuxPayWalletRetrieved = true;
		NuxPayWalletList = data.data.wallet_address_list;
		loadWalletAddresses(previousCurrencyId);
   }

   function validateAddress(code, message){

		var withdraw_type = $('input[type=radio][name=balance]:checked').val();
		var currentWalletType = $('#coinTypeDropdown').val();
		var current_address = $('input[name=radioWallet]:checked').val();

		if(withdraw_type == 'available'){
				var current_balance = symbolList[currentWalletType].balance;
				
				if (current_balance == 0){
					showMessage('Insufficient balance.', 'warning', 'Error', 'warning', '');
				} else if (!current_address){
					showMessage('No address selected.', 'warning', 'Error', 'warning', '');
				} else {
					$.redirect('withdrawalConfirmation.php', {
					image_url: symbolList[currentWalletType].image,
					walletType : currentWalletType,
					walletName: $('input[name=radioWallet]:checked').data('name'),
					address: current_address,
					balance: current_balance,
					symbol : symbolList[currentWalletType].symbol,
					withdrawType: withdraw_type,
				});
				}
			}
			else if(withdraw_type == 'withholding'){
				var current_balance = symbolList[currentWalletType].balance;
				if (current_balance == 0){
					showMessage('Insufficient balance.', 'warning', 'Error', 'warning', '');
				} else if (!current_address){
					showMessage('No address selected.', 'warning', 'Error', 'warning', '');
				} else {
					$.redirect('withdrawalConfirmation.php', {
					image_url: symbolList[currentWalletType].image,
					walletType : currentWalletType,
					walletName: $('input[name=radioWallet]:checked').data('name'),
					address: current_address,
					balance: current_balance,
					symbol : symbolList[currentWalletType].symbol,
					withdrawType: withdraw_type,
						
				});
				}

			}
			else{
					showMessage('Invalid Withdraw Type.', 'warning', 'Error', 'warning', '');
				
			}
	}

   function loadWalletAddresses(currency_id){
	var withdraw_type = $('input[type=radio][name=balance]:checked').val();
	var currentWalletType = $('#coinTypeDropdown').val();

	   if(withdraw_type == 'available'){
			var buildList = "";
			var wallet_name;
			var unnamed_wallet_num;
			$('#radioDiv').html("");
			unnamed_wallet_num = 1;
			if (walletList){
					$.each(walletList[currency_id], function(k,v){
						wallet_name = v['wallet_name'] === "" ? v['symbol'] + ' Wallet-' + unnamed_wallet_num++ : v['wallet_name'];

						if (k == 0){
							buildList += '<div class="col-12 mt-0">';
						} else {
							buildList += '<div class="col-12 mt-4">';
						}

						buildList += '<div class="row"><div class="col-1 px-0 align-self-center"><input type="radio" value="'+v['address']+'" name="radioWallet" value="" data-name="'+wallet_name+'"></div><div class="col-11 px-0 align-self-center"><div class="row"><div class="col-12">'+wallet_name+'</div><div class="col-12 boldAddress text-truncate">'+v['address']+'</div></div></div></div></div>';
				});
			}
			if (!buildList){
				buildList += '<div class="col-12 mt-1"><div class="row"><div class="col-1 px-0 align-self-center"><input type="radio" id="radioWalletTextBtn" name="radioWallet" value="" data-name="Other Wallet"></div><div class="col-11 px-0 align-self-center"><div class="row"><div class="col-12 boldTxt"><?php echo $translations["M01838"][$language]; /* Other Wallet  */?></div><div class="col-12"><input class="form-control" placeholder=" <?php echo $translations["M01839"][$language]; /* Key in your wallet address  */?>" id="radioWalletText"></div></div></div></div>';
			}else{
				buildList += '<div class="col-12 mt-4"><div class="row"><div class="col-1 px-0 align-self-center"><input type="radio" id="radioWalletTextBtn" name="radioWallet" value="" data-name="Other Wallet"></div><div class="col-11 px-0 align-self-center"><div class="row"><div class="col-12 boldTxt"><?php echo $translations["M01838"][$language]; /* Other Wallet  */?></div><div class="col-12"><input class="form-control" placeholder=" <?php echo $translations["M01839"][$language]; /* Key in your wallet address  */?>" id="radioWalletText"></div></div></div></div>';
			}
			$('#radioDiv').html(buildList);

			$('#radioWalletText').click(function(){ 
				$('#radioWalletTextBtn').trigger('click');
			});
			$('#radioWalletText').change(function(){
				$('#radioWalletTextBtn').val($(this).val());
			});
	   }
	   	else if(withdraw_type == 'withholding'){
			var buildList = "";
			var wallet_name;
			var unnamed_wallet_num;
			$('#radioDiv').html("");
			unnamed_wallet_num = 1;
			if (NuxPayWalletList){
					$.each(NuxPayWalletList, function(k,v){
						wallet_name = k;
						if(currency_id == k){

						buildList += '<div class="col-12 mt-0"><div class="row"><div class="col-1 px-0 align-self-center"><input type="radio" value="'+v+'" name="radioWallet" value="" data-name="testing"></div><div class="col-11 px-0 align-self-center"><div class="row"><div class="col-12"><?php echo $translations["M01993"][$language]; /* Your NuxPay Wallet  */?></div><div class="col-12 boldAddress text-truncate">'+v+'</div></div></div></div></div>';
					}
					});
			}
			if (walletList){
					$.each(walletList[currency_id], function(k,v){
						wallet_name = v['wallet_name'] === "" ? v['symbol'] + ' Wallet-' + unnamed_wallet_num++ : v['wallet_name'];

						if (k == 0){
							buildList += '<div class="col-12 mt-4">';
						} else {
							buildList += '<div class="col-12 mt-4">';
						}

						buildList += '<div class="row"><div class="col-1 px-0 align-self-center"><input type="radio" value="'+v['address']+'" name="radioWallet" value="" data-name="'+wallet_name+'"></div><div class="col-11 px-0 align-self-center"><div class="row"><div class="col-12">'+wallet_name+'</div><div class="col-12 boldAddress text-truncate">'+v['address']+'</div></div></div></div></div>';
				});
			}
			if (!buildList){
				buildList += '<div class="col-12 mt-1"><div class="row"><div class="col-1 px-0 align-self-center"><input type="radio" id="radioWalletTextBtn" name="radioWallet" value="" data-name="Other Wallet"></div><div class="col-11 px-0 align-self-center"><div class="row"><div class="col-12 boldTxt"><?php echo $translations["M01838"][$language]; /* Other Wallet  */?></div><div class="col-12"><input class="form-control" placeholder=" <?php echo $translations["M01839"][$language]; /* Key in your wallet address  */?>" id="radioWalletText"></div></div></div></div>';
			}else{
				buildList += '<div class="col-12 mt-4"><div class="row"><div class="col-1 px-0 align-self-center"><input type="radio" id="radioWalletTextBtn" name="radioWallet" value="" data-name="Other Wallet"></div><div class="col-11 px-0 align-self-center"><div class="row"><div class="col-12 boldTxt"><?php echo $translations["M01838"][$language]; /* Other Wallet  */?></div><div class="col-12"><input class="form-control" placeholder=" <?php echo $translations["M01839"][$language]; /* Key in your wallet address  */?>" id="radioWalletText"></div></div></div></div>';
			}
			
			$('#radioDiv').html(buildList);
			$('#radioWalletText').click(function(){ 
   				$('#radioWalletTextBtn').trigger('click');
			});
			$('#radioWalletText').change(function(){
				$('#radioWalletTextBtn').val($(this).val());
			});
		   }

	//    $('input[name=radioWallet]').change(function(){
   	//    });
   }
</script>
<style>
@media only screen and (max-width: 1200px){
  .m-portlet .m-portlet__body {
    padding-top: 5px;
  }
}
</style>
