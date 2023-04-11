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
				<div class="col-12 pageHeader px-0 mb-3">
					<?php echo $translations["M01574"][$language]; /* Confirmation  */?>
				</div>

                <div class="col-xl-12" id="showErrorMsg">

                	<div class="row">
                		<div class="col-12">
                			<div class="row">
                				<div class="col-12 bigText">
									<?php echo $translations["M01716"][$language]; /* Crypto Currency  */?>
                				</div>
                				<div class="col-12">
                					<div class="textBox">
                						<img src="" style="width: 25px; margin-right: 10px" id="cryptoTextBoxImg"><span id="cryptoTextBox"></span>
                					</div>
                				</div>
                			</div>
                		</div>

                		<div class="col-12 mt-5 mt-md-4">
                			<div class="row">
                				<div class="col-12 bigText">
									<?php echo $translations["M01632"][$language]; /* Withdraw To  */?>
                				</div>
                				<div class="col-12">
                					<div class="textBox">
                						<div class="col-12" id="cryptoWalletName">
                						</div>
                						<div class="col-12 boldAddress" style="word-wrap: break-word" id="cryptoWalletAddress">
                						</div>
                					</div>
                				</div>
                			</div>
                		</div>

                		<div class="col-12 mt-5 mt-md-4">
                			<div class="row">
                				<div class="col-12 bigText">
									<?php echo $translations["M02067"][$language]; /* Estimated Miner Fee */?> <span><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                				</div>
                				<div class="col-12">
                					<div class="textBox" id ="minerFeeAmount">
										0.00
	                				</div>
                				</div>
                			</div>
                		</div>

                		<div class="col-12 mt-5">
                			<button onclick="" id="nextBtn" class="btn searchBtn mr-3" type="button" ><?php echo $translations["M01788"][$language]; /* Confirm */?></button>
                			<button onclick="" id="backBtn" class="btn backBtn" type="button"><?php echo $translations["M01577"][$language]; /* Back */?></button>
                		</div>
                		
                	</div>
					
				</div>
			</div>

		</div>

	</div>
	<?php include 'footerDashboard.php'; ?>
</div>

<div class="modal fade" id="twoFactorModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b justify-content-center">
                <div class="modal-title hasSub">
                    <h5><?php echo $translations["M01673"][$language]; /* Enable 2-Factor Authentication */?></h5>
                    <p class="my-0 enableStep1">
						<?php echo $translations["M02068"][$language]; /* Enter authenticator codes to authorize the withdrawal */?>.
					</p>

                    <div class="enableStep2" style="display: none;">
<!--                        <img id="authenticatorQR" src="images/qrcode.jpg" width="150px" class="my-3">-->
						<div id="qrcode" class=""></div>
                        <ul class="text-left pl-3">
                            <li><?php echo $translations["M01646"][$language]; /* Install Google Authenticator app on your mobile device. */?></li>
                            <li><?php echo $translations["M01647"][$language]; /* Scan QR code with the authenticator. */?></li>
                            <li><?php echo $translations["M01648"][$language]; /* Enter 6-digits codes from authenticator. */?></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div class="col-12 text-center">
                    <p class="enableStep1"><?php echo $translations["M01650"][$language]; /* Enter your 2-factor authenticator code */?></p>
                    <div class="d-inline-flex authenticationBox align-items-center">
                        <div class="mr-2">
                            <img src="images/OTP.png" width="30px">
                        </div>
                        <input class="form-control authenticator" type="" name="" id ="otpCodeID">
						
						<span id="timer" name="timer" style="padding-left: 20px"></span>
						
                    </div>
                    <p class="enableStep1" id ="didNotReceiveSms" style="display:none;">
						<?php echo $translations["M02069"][$language]; /* Didn't receive the SMS? */?>
					 	<a href="javascript:;" onclick="requestOTP()"><?php echo $translations["M02070"][$language]; /* Re-send SMS */?></a>
					</p>
					
                </div>
            </div>

            <div class="modal-footer bg-w">
                <div class="col-12 text-center">
                    <a href="javascript:void(0)" id="confirmBtn" class="btn primaryBtn enableStep1" style=""><?php echo $translations["M01788"][$language]; /* Confirm */?></a>
                    <a href="javascript:void(0)" id="enableModalBtn" class="btn primaryBtn enableStep2" style=" display: none;"><?php echo $translations["M01031"][$language]; /* Enable */?></a>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unableModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b justify-content-center">
                <div class="modal-title hasSub">
                    <h5><?php echo $translations["M01653"][$language]; /* 2-Factor Authentication */?></h5>
                    <p class="my-0 enableStep1"><?php echo $translations["M01654"][$language]; /* Enter authenticator codes to make sure it's really you trying to change settings */?></p>
                </div>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div class="col-12 text-center">
                    <p><?php echo $translations["M01650"][$language]; /* Enter your 2-factor authenticator code */?></p>
                    <div class="d-inline-flex authenticationBox">
                        <img src="images/ga2.svg" width="40px" class="mr-2">
                        <input class="form-control authenticator" type="" name="" id="authCodeID">
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-w">
                <div class="col-12 text-center">
                    <a href="javascript:void(0)" id="confirmUnableBtn" class="btn primaryBtn" style=""><?php echo $translations["M01788"][$language]; /* Confirm */?></a>
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
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
	var coinImageURL 	= "<?php echo $_POST['image_url']?>";
	var balance 		= "<?php echo $_POST['balance']?>";
	var symbol 			= "<?php echo $_POST['symbol']?>";
	var walletType = "<?php echo $_POST['walletType']?>";
	var walletName = "<?php echo $_POST['walletName']?>";
	var address = "<?php echo $_POST['address']?>";
	var withdrawType = "<?php echo $_POST['withdrawType'];?>";
	var faStatus 	    = "";
	
	 $(document).ready(function(){ 
		$('#cryptoTextBoxImg').attr('src', coinImageURL);
		$('#cryptoTextBox').html(balance + " " + symbol);
		$('#cryptoWalletName').html(walletName);
		$('#cryptoWalletAddress').html(address);

		formData = {
			command : 'get2FAStatus',

		};
		fCallback = loadGet2FAStatus;
		ajaxSend('scripts/reqWhitelist.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		
		 
		

		 $("#nextBtn").click(function(){
			// console.log('fastatus');
			//  console.log(faStatus);
			if(faStatus != false){
			
				$("#unableModal").modal('show');

			}
			else{
				
				formData = {
					command : 'request2FASMSOTP'

				};
				fCallback = loadSendSMSOTP;
				whitelistUrl ='scripts/reqWhitelist.php'
				ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

			}
			
		});
		 
		function loadSendSMSOTP(data,message){
			
			if(data.code == 1){
				document.getElementById("timer").innerHTML = data.data.countdown_second;
				$("#didNotReceiveSms").hide();
				$("#timerDiv").show();
				startTimer();
				$(".enableStep1").show();
				$(".enableStep2").hide();

				$("#twoFactorModal").modal('show');
			}
		}
		//
		function backToWithdrawal(wallet, address) {
			$.redirect('withdrawal.php', {
				currency_id: wallet,
				address: address
			});
		}	

		$("#backBtn").click(function(){
			backToWithdrawal(walletType, address)
		});
		// 
		 $("#enableBtn").click(function(){
			$(".enableStep1").show();
			$(".enableStep2").hide();

			$("#twoFactorModal").modal('show');
		});

		$("#confirmBtn").click(function(){ 

			formData = {
				command : 'verify2FASMSOTP',
				otp_code : $('#otpCodeID').val()
	
			};
			fCallback = loadVerifySMSOTP;
			whitelistUrl ='scripts/reqWhitelist.php'
			ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		});
		
		$("#confirmUnableBtn").click(function(){
			$("#unableModal").modal('hide');
			formData = {
				command : 'validate2FA',
				code : $('#authCodeID').val()

			};
			fCallback = loadValidate2FA;

			ajaxSend('scripts/reqWhitelist.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		});

		
		$("#enableModalBtn").click(function(){

			formData = {
				command : 'register2FA',
				code : $('#otpCodeID').val()

			};
			fCallback = loadRegister2FA;
			whitelistUrl ='scripts/reqWhitelist.php'
			ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		});
	 });

	function getEstimatedMinerFee(data, message){
		$('#minerFeeAmount').html(data.txFee + ' ' + symbol);
	}
	
	function loadPgAddressVerification(data, message){
		if(data.errorCode == -100){
			showMessage(data.message_d, 'warning', 'ERROR', 'warning', 'whitelistAddresses.php');

		}
		
		if(data.code == 1){
			var pgAddressList = data.data.pg_address_list;
			
			formData  = {
				command: 'getEstimatedMinerFee',
				sender_address : pgAddressList,
				destination_address: address,
				wallet_type : walletType,
				amount: balance,
				transaction_type: withdrawType
				
			};  
			// console.log(formData);
			fCallback = getEstimatedMinerFee;  
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		}
		
		
		
	}
	
	
	function loadRegister2FA(data, message){
		var obj = data;
		$("#twoFactorModal").modal('hide');

		if(obj.code == 1){
			hideCanvas();
			if(withdrawType == 'available'){
				formData = {
					command : 'createWithdrawal',
					wallet_type : walletType ,
					withdrawal_balance : balance,
					destination_address : address

				};
				fCallback = loadCreateWithdrawal;
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
			}
			else if(withdrawType == 'withholding'){
				formData = {
					command : 'pgAddressWithdraw',
					wallet_type : walletType ,
					destination_address : address

				};
				fCallback = loadPgAddressWithdraw;
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, 0, 0);
			}
			else{
				console.log("ERROR withdraw type");
			}

		}
	}
	
	
	function loadDisabled2FA(data, message){
		var obj = data;
		$("#unableModal").modal('hide');

		if(obj.code == 1){
			hideCanvas();
			location.reload();

		}
	}
	
	function loadGet2FAStatus(data, message){
		// console.log(data);
		var obj = data;
		faStatus = obj.data.status;
		if(withdrawType == 'withholding'){
			
				var url 	=	'scripts/reqPaymentGateway.php';
				var formData  		= {
					command: "pgAddressWithdrawVerification",
					destination_address: address,
					wallet_type : walletType,
					amount: balance,
				};

				var method	=	'POST';
				var debug	=	0;
				var	bypassBlocking 	= 0;
				var bypassLoading   = 0;
				

				$.ajax({
                         type: method, // define the type of HTTP verb we want to use (POST for our form)
                         url: url, // the url where we want to POST
                         data: formData, // our data object
                         dataType: 'text', // what type of data do we expect back from the server
                         encode: true
                        })
                        .done(function(data) {
                            
                          var obj = JSON.parse(data);
                          
                        if(obj.errorCode == -100){
							showMessage(obj.message_d, 'warning', 'ERROR', 'warning', 'whitelistAddresses.php');

						}
					
						if(obj.errorCode == -102){
							showMessage(obj.message_d, 'warning', 'ERROR', 'warning', 'dashboard.php');
							
						}

						if(obj.code == 1){
							var pgAddressList = obj.data.pg_address_list;

							formData  = {
								command: 'getEstimatedMinerFee',
								sender_address : pgAddressList,
								destination_address: address,
								wallet_type : walletType,
								amount: balance,
								transaction_type: withdrawType

							};  
							// console.log(formData);
							fCallback = getEstimatedMinerFee;  
							ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
						}
		         
                    });
			
			
			
		}
		else{
			 formData  = {
				command: 'getEstimatedMinerFee',
				destination_address: address,
				wallet_type : walletType,
				amount: balance,
				transaction_type: withdrawType
			};  
			fCallback = getEstimatedMinerFee;  
			ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		}
		
		
		
	
	}
	
	function loadVerifySMSOTP(data, message){
		if(data.code == 1){			
			var qr_data = data.data.qr_param;
			$('#qrcode').empty();
			$('#qrcode').qrcode({
				render: "canvas", 
				text: qr_data,
				width: 200,
				height: 200,
				background: "#ffffff",
				foreground: "#000000",
//					src: 'images/qrcode.jpg',
				imgWidth: 20,
				imgHeight: 20,
			});

			$('#otpCodeID').val('');
			$("#timerDiv").hide();
			$("#timer").hide();
			$("#didNotReceiveSms").hide();
			$(".enableStep1").hide();
        	$(".enableStep2").show();
			
		}
		else{
			$("#twoFactorModal").modal('hide');
		}
	}
	
	function loadSendSMSOTP(data,message){
		$("#otpCodeID").val('');
		if(data.code == 1){
			document.getElementById("timer").innerHTML = data.data.countdown_second;
			$("#didNotReceiveSms").hide();
			$("#timer").show();
			startTimer();
			$(".enableStep1").show();
			$(".enableStep2").hide();

			$("#twoFactorModal").modal('show');
		}
	}

	function startTimer() {
		$('#timerDiv').show();
		$('#timer').show();
		$('#didNotReceiveSms').hide();

		var presentTime = document.getElementById('timer').innerHTML;

		var s = checkSecond((presentTime - 1));

		if(s <= "00"){

			$('#timerDiv').hide();
			$('#timer').hide();
			$('#didNotReceiveSms').show();

		}
		else {
			document.getElementById('timer').innerHTML = s;
			setTimeout(startTimer, 1000);
		}
	}
	
	function loadValidate2FA(data, message){
		var obj = data;

		if(obj.code == 1){
 
			if(withdrawType == 'available'){

			setTimeout(() => {  
				formData = {
					command : 'createWithdrawal',
					wallet_type : walletType ,
					withdrawal_balance : balance,
					destination_address : address

				};
				fCallback = loadCreateWithdrawal;
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		}, 500);
			}
			else if(withdrawType == 'withholding'){
				setTimeout(() => {  
				formData = {
					command : 'pgAddressWithdraw',
					wallet_type : walletType ,
					destination_address : address

				};
				fCallback = loadPgAddressWithdraw;
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, 0, 0);
			}, 500);
			}
			else{
				console.log("ERROR withdraw type");
			}
		}
	}

	function checkSecond(sec) {
		if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
		if (sec < 0) {sec = "59"};
		return sec;
	}
	
	function requestOTP(){

		formData = {
			command : 'request2FASMSOTP'

		};
		fCallback = loadRequestOTP;
		whitelistUrl ='scripts/reqWhitelist.php'
		ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}
	
	function loadRequestOTP(data, message){
		if(data.code == 1){
			document.getElementById("timer").innerHTML = data.data.countdown_second;
			$("#didNotReceiveSms").hide();
			$("#timer").show();
			startTimer();
			
		}
	}
	
	function loadCreateWithdrawal(data, message){
		
		if(data.code == 1){
			showMessage(data.message_d, 'success', data.message, 'check-circle-o', ['withdrawalListing.php', {withdraw_type: withdrawType}]);
				
		}
		// if(data.code == 1){
		// 	var withdrawal_id = data.data.withdrawal_id;
			
		// 	$.redirect("withdrawalListing.php", {
        //         withdrawal_id: withdrawal_id,
             
        //     });
				
		// }
	}
	
	function loadPgAddressWithdraw(data, message){
		
		if(data.code == 1){
			showMessage(data.message_d, 'success', data.message, 'check-circle-o', ['withdrawalListing.php', {withdraw_type: withdrawType}]);
				
		}
	}
	
//	$("#confirmBtn").click(function(){
//		window.location.href = "withdrawalSuccess.php";
//	});
   

</script>
