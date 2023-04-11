<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-pink m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
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

                <div class="col-xl-12" id="showErrorMsg">

                	<div class="row">
                		<div class="col-12">
                			<div class="row">
                				<div class="col-12 bigText">                					
									<?php echo $translations["M01716"][$language]; /* Crypto Currency */ ?>
                				</div>
                				<div class="col-12 smallTxt">                					
									<?php echo $translations["M01717"][$language]; /* Select currency that you'd like to receive payment from your customers */ ?>
                				</div>
                				<div class="col-3 mt-3">
<!--
                					<select id="coinType" class="form-control">
                						<option value="tetherusd">USDT</option>
                					</select>
-->
									<select id="walletDropdown" class="full-width selectValue"></select>
                				</div>
                			</div>
                		</div>

                		<div class="col-12 mt-5 mt-md-4">
                			<div class="row">
                				<div class="col-12 bigText">                					
									<?php echo $translations["M01718"][$language]; /* Wallet Information */ ?>
                				</div>
                				<div class="col-12 smallTxt">                					
									<?php echo $translations["M01719"][$language]; /* Set withdrawal wallet address to receive payments */ ?>.
                				</div>
                				<div class="col-12 mt-3">
                					<div class="m-portlet">
                						<div class="m-portlet__body">
		                					<div class="row">
		                						<div class="col-12">
		                							<div class="row m-form">
		                								<div class="col-12">
		                									<div class="row">
		                										<div class="col-6 form-group">
						                							<label class="capitalStyle">
																		<?php echo $translations["M01720"][$language]; /* Wallet Address */ ?>.
																	</label>
						                							<input type="text" class="form-control textbox" id="walletAddressID" value="">
						                						</div>
						                						<div class="col-6 form-group">
						                							<label class="capitalStyle"> 
																		<?php echo $translations["M01721"][$language]; /* Wallet Name */ ?> (<?php echo $translations["M01722"][$language]; /* Optional */ ?>)
																	</label>
						                							<input type="text" class="form-control" id="walletNameID" value="">
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
                			<button onclick="" id="saveBtn" class="btn searchBtn" type="button">Save</button>
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
                    <p class="my-0 enableStep1">The OTP code has been sent to your verified contact method:<br><span id="mobileAvailable">Mobile Number: <?php echo $_SESSION['mobile']?><br></span><span id="emailAvailable"> Email: <?php echo $_SESSION['email']?></span></p>

                    <div class="enableStep2" style="display: none;">
<!--                        <img id="authenticatorQR" src="images/qrcode.jpg" width="150px" class="my-3">-->
						<div id="qrcode" class=""></div>
                        <ul class="text-left pl-3">
                            <li>
							<?php echo $translations["M01646"][$language]; /* Install Google Authenticator app on your mobile device */ ?>.</li>
                            <li>
							<?php echo $translations["M01647"][$language]; /* Scan QR code with the authenticator */ ?>.</li>
                            <li>
							<?php echo $translations["M01648"][$language]; /* Enter 6-digits codes from authenticator */ ?>.</li>
                        </ul>
                    </div>
                    
                </div>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div class="col-12 text-center">
                    <p class="enableStep1">
						<?php echo $translations["M01649"][$language]; /* Enter your OTP code */ ?>
					</p>
                    <p class="enableStep2" style="display: none;">
						<?php echo $translations["M01655"][$language]; /* Enter your 2-factor authenticator code */ ?>
					</p>
                    <div class="d-inline-flex authenticationBox align-items-center">
                        <div class="mr-2">
                            <img src="images/OTP.png" width="30px">
                        </div>
                        <input class="form-control authenticator" type="" name="" id ="otpCodeID">
						<div id="timerDiv">
							<span id="timer" name="timer" style="padding-left: 20px"></span>
						</div>
                    </div>
                    <p class="enableStep1" id ="didNotReceiveSms" style="display:none;"> 					
					<?php echo $translations["M01651"][$language]; /* Didn't receive the OTP */ ?>?<a href="javascript:;" onclick="requestOTP()"><?php echo $translations["M01652"][$language]; /* Re-send OTP */ ?></a></p>
					
                </div>
            </div>

            <div class="modal-footer bg-w">
                <div class="col-12 text-center">
                    <a href="javascript:void(0)" id="confirmBtn" class="btn primaryBtn enableStep1" style="">
						<?php echo $translations["M00981"][$language]; /* Confirm */ ?>
					</a>
                    <a href="javascript:void(0)" id="enableModalBtn" class="btn primaryBtn enableStep2" style=" display: none;">
						<?php echo $translations["M01031"][$language]; /* Enable */ ?>
					</a>
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
                    <h5>
						<?php echo $translations["M01653"][$language]; /* 2-Factor Authentication */ ?>
					</h5>
                    <p class="my-0 enableStep1">
						<?php echo $translations["M01654"][$language]; /* Enter authenticator codes to make sure it's really you trying to change settings */ ?>
					</p>
                </div>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div class="col-12 text-center">
                    <p>
						<?php echo $translations["M01650"][$language]; /* Enter your 2-factor authenticator code */ ?>
					</p>
                    <div class="d-inline-flex authenticationBox">
                        <img src="images/ga2.svg" width="40px" class="mr-2">
                        <input class="form-control authenticator" type="" name="" id="authCodeID">
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-w">
                <div class="col-12 text-center">
                    <a href="javascript:void(0)" id="confirmUnableBtn" class="btn primaryBtn" style="">
						<?php echo $translations["M01163"][$language]; /* Confirm */ ?>
					</a>
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
    $("#m_datepicker_5").datepicker({
        format: 'yyyy-mm-dd',
        orientation:"bottom",
        todayHighlight:!0,
        templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}
    });
   
    var divId    = 'transactionHistoryListDiv';
    var tableId  = 'transactionHistoryListTable';
    var pagerId  = 'transactionHistoryPager';
    var btnArray = {};
    var thArray  = Array(
    		'',	        
	        '<?php echo $translations["M01670"][$language]; /* Created At */ ?>',			
			'<?php echo $translations["M01557"][$language]; /* Payer Name */ ?>',		
			'<?php echo $translations["M01723"][$language]; /* Payer Email Address */ ?>',
			'<?php echo $translations["M01724"][$language]; /* Payer Mobile Phone */ ?>',			
			'<?php echo $translations["M01725"][$language]; /* Transaction Token */ ?>',		
			'<?php echo $translations["M01726"][$language]; /* Payment Amount */ ?>',
			'<?php echo $translations["M01727"][$language]; /* Payment Currency */ ?>',			
			'<?php echo $translations["M01728"][$language]; /* Crypto Amount */ ?>',
	        '<?php echo $translations["M00322"][$language]; /* Status */ ?>'
        );
	var walletType;
    var dropdownFake;


    /*
	
        "created_at": "2020-06-25 20:18:40"
        "payer_name": "huiwen123",
        "payer_email_address": "huiwen.thenux@gmail.com",
        "payer_mobile_phone": "+60123456789",
		"transaction_token": "cv13lhxkzU7mAyDY",
        "payment_amount": "10.00000000",
        "payment_currency": "tetherusd",
        "crypto_amount": "0.00000000",
        "status": "success",
	
    */


    var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
	var getToken 		= "<?php echo $_POST['token']?>";
    var thArray  = Array(		   
		   '<?php echo $translations["M01729"][$language]; /* Date */ ?>',		   
		   '<?php echo $translations["M00331"][$language]; /* Amount */ ?>',		   
		   '<?php echo $translations["M01730"][$language]; /* Payment Address */ ?>',		   
		   '<?php echo $translations["M00602"][$language]; /* From */ ?>',		   
		   '<?php echo $translations["M01625"][$language]; /* Transaction Hash */ ?>'
        );
	var mobileAva = '<?php echo $_SESSION['mobile']?>';
    var emailAva = '<?php echo $_SESSION['email']?>'
	var check = "false";
	var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';

	if (hasChangedPassword == 0){
		$.redirect('firstTimeLogin.php');
	}



	$(document).ready(function() {
		formData  = {
            command: 'getWalletType',
			setting_type : 'payment_gateway'
        };
        fCallback = getWalletType; 
        ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		$("#enableBtn").click(function(){
			$(".enableStep1").show();
			$(".enableStep2").hide();

			$("#twoFactorModal").modal('show');
		});

		if (mobileAva==""){
        $('#mobileAvailable').hide();
		}
		if (emailAva==""){
			$('#emailAvailable').hide();
		}

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
		
		function callWhitelistAddress() {

			var otp = $('#authCodeID').val();
			if(otp=="") {
				otp = $('#otpCodeID').val();
			}

			formData = {
				command : 'whitelistAddress',
				code : otp,
				wallet_type: $('select#walletDropdown option:selected').val(),
				address: $("#walletAddressID").val()
			};
			fCallback = loadWhitelistAddress;

			ajaxSend('scripts/reqWhitelist.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		}

		function loadWhitelistAddress(data, message){

			var walletName = $("#walletNameID").val();
			formData = {
				command : 'setDestinationAddress',
				wallet_type: $('select#walletDropdown option:selected').val(),
				destination_address: sanitize($("#walletAddressID").val()),
				wallet_name: walletName != '' ? walletName : '',
				status: 1

			};
			fCallback = loadSetDestinationAddress;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		}

		function loadRegister2FA(data, message){
			var obj = data;
			$("#twoFactorModal").modal('hide');

			if(obj.code == 1){
				hideCanvas();

				callWhitelistAddress();

			}
		}
	
		
		$("#copyBtn").click(function(){
			var text = $("#urlInput").val();

			var $temp = $("<input>");
			$("body").append($temp);
			$temp.val(text).select();
			document.execCommand("copy");
			$temp.remove();
			// $("#inputTick").show();
			swal.fire({
				position:"center",
				type:"success",
				title:"<?php echo $translations["M00137"][$language]; /* Copied to clipboard  */?>",
				showConfirmButton:!1,
				timer:1500
			})
		});
		
		$("#saveBtn").click(function(){
			formData = {
				command : 'get2FAStatus',
				
			};
			fCallback = loadGet2FAStatus;
			
			ajaxSend('scripts/reqWhitelist.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
			
			
		});
		
		function loadSetDestinationAddress(data, message){

			if(!data || data=="null"){
				showMessage('<?php echo $translations["M00165"][$language]; ?>', 'danger', '<?php echo $translations["M00166"][$language]; ?>', 'times-circle-o', '');
				if(!bypassLoading){
					hideCanvas();
				}
			}

			var obj = data;

			if(obj.code == 1){
				hideCanvas();
				
				window.location.href = "paymentWallet.php";
				
			}else{
				hideCanvas();
	
					
			}
		}
		

		function loadGet2FAStatus(data, message){
			var obj = data;
			var faStatus = obj.data.status;

			if(faStatus == false){
				formData = {
					command : 'request2FASMSOTP'

				};
				fCallback = loadSendSMSOTP;
				whitelistUrl ='scripts/reqWhitelist.php'
				ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
				 
			}
			else{
				$("#unableModal").modal('show');
				 
			}
		}
		
		function loadSendSMSOTP(data,message){
			

			if(data.code == 1){

				if(data.data) {

					document.getElementById("timer").innerHTML = data.data.countdown_second;
					$("#didNotReceiveSms").hide();
					$("#timerDiv").show();
					startTimer();
					$(".enableStep1").show();
					$(".enableStep2").hide();

					$("#twoFactorModal").modal('show');

				} else {

					showMessage(message, 'danger', '', 'times-circle-o', 'settings.php');

				}
				
			}
		}
		
		function loadRequest2FA(data, message){
			var obj = data;

			if(obj.code == 1){
				
				var qr_data = obj.data.qr_param;
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

				$(".enableStep1").hide();
				$(".enableStep2").show();
				$("#twoFactorModal").modal('show');
			}
		}
		
		function loadValidate2FA(data, message){
			var obj = data;
			
			if(obj.code == 1){
				hideCanvas();
				
				callWhitelistAddress();

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
//				$('#twoFactorModal').modal('show');
				$('#timer').hide();
				$('#otpCodeID').val("");
				$('#timerDiv').hide();
				$("#didNotReceiveSms").hide();
				$(".enableStep1").hide();
				$(".enableStep2").show();
				check = "true";
				document.getElementById('timer').innerHTML = "1";

			}
			else{
				$("#twoFactorModal").modal('hide');
			}

		}

	});

	function copyTxt(n) {
		var text = $(n).parent().attr('data-fullTxt');

		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val(text).select();
		document.execCommand("copy");
		$temp.remove();
	}

	function encrypt(w) {
		return w.substring(0, 6)+"..."+w.substr(w.length-6);
	} 

	function loadPaymentDetails(data, message) {
		// console.log(data.data.invoice_detail);
		var tableNo;
		var inv = data.data.invoice_detail;
		var total_paid;
		if(!inv.total_paid){
			total_paid = 0;
		}
		else{
			total_paid = inv.total_paid;
		}

		if(inv.status=="pending") {
			var paymentStatusStr = "Waiting for Payment";
		} else if(inv.status=="success") {
			var paymentStatusStr = "Paid";
		} else {
			var paymentStatusStr = "Short-Paid";
		}

		$("#payeeName").text(inv.payee_name);
		$("#payeeEmail").text(inv.payee_email_address);
		$("#payeePhoneNumber").text(inv.payee_mobile_phone);
		$("#paymentNo").text(": "+inv.id);
		$("#paymentStatus").html(paymentStatusStr);
		$("#payerName").text(inv.payer_name);
		$("#payerPhone").text(inv.payer_mobile_phone);
		$("#payerEmail").text(inv.payer_email_address);
		$("#paymentDescription").text(inv.payment_description);
		$("#paymentAmount").text(inv.payment_amount + " USDT");
		$("#grandTotal").text(total_paid + " USDT");
		$("#urlInput").val(inv.redirect_url);


		var tl = data.data.transaction_list;
		if(tl.length > 0) {
			$("#paymentSuccessWrapper").show();
			$("#paymentBtnWrapper").hide();

			$("#paymentSuccessStatus").text(tl[0].status);
			$("#paymentSuccessAmount").text(tl[0].amount);

			$("#paymentSuccessTo").html(encrypt(tl[0].recipient_address) + " <i class='fa fa-check inputTick' style='display:none'></i>");
			$("#paymentSuccessTo").attr("data-fullTxt", tl[0].recipient_address);

			$("#paymentSuccessFrom").html(encrypt(tl[0].sender_address) + " <i class='fa fa-check inputTick' style='display:none'></i>");
			$("#paymentSuccessFrom").attr("data-fullTxt", tl[0].sender_address);

			$("#paymentSuccessHash").html(encrypt(tl[0].transaction_hash) + " <i class='fa fa-check inputTick' style='display:none'></i>");
			$("#paymentSuccessHash").attr("data-fullTxt", tl[0].transaction_hash);
		}


		if(tl && tl.length > 0) {
			// $('#showErrorMsg').hide();
			$('#showresultListing').show();

		    var newList = [];
		    $.each(tl, function(k, v) {


		    	

		        var rebuildData = {
		        	created_at: v['created_at'],
		        	amount: v['amount'],
		        	payment_address : '<span data-fullTxt="'+v['payment_address']+'">'+encrypt(v['payment_address'])+' <a class="copyBtn ml-2" href="javascript:;" onclick="copyTxt(this)"><i class="fa fa-copy"></i></a></span>',
		        	sender_address: '<span data-fullTxt="'+v['sender_address']+'">'+encrypt(v['sender_address'])+' <a class="copyBtn ml-2" href="javascript:;" onclick="copyTxt(this)"><i class="fa fa-copy"></i></a></span>',
		        	transaction_hash: '<span data-fullTxt="'+v['transaction_hash']+'">'+encrypt(v['transaction_hash'])+' <a class="copyBtn ml-2" href="javascript:;" onclick="copyTxt(this)"><i class="fa fa-copy"></i></a></span>'
		        };

		        newList.push(rebuildData);

				buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
				pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
		    });
		}
		else
		{
			$('#showErrorMsg').show();
			$('#showresultListing').hide();
		}
	}
	
	 function getWalletType(data,message){

    	var wallets = data.result.coin_data;
    	
    	if (wallets && dropdownFake !=1) {
    		$.each(wallets, function(key, val){
    			$('#walletDropdown').append('<option dataName="'+ val['name'] +'" data-image="'+val['image']+'" value="'+ val['wallet_type'] +'">'+ val['display_symbol'] +'</option>')

    			$('#walletDropdownGraph').append('<option data-image="'+val['image']+'" value="'+ val['wallet_type'] +'">'+ val['name'] +'</option>')

    			$('#transactionDropdown').append('<option data-image="'+val['image']+'" value="'+ val['wallet_type'] +'">'+ val['name'] +'</option>')
    		});
    		dropdownFake = 1;
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
       
    	$('#walletDropdown').select2({
            dropdownAutoWidth : true,
            templateResult: formatState,
    		templateSelection: formatState,
			width : '180px'
        });

        $('#walletDropdownGraph').select2({
            dropdownAutoWidth : true,
            templateResult: formatState,
    		templateSelection: formatState
        });

        $('#transactionDropdown').select2({
            dropdownAutoWidth : true,
            templateResult: formatState,
    		templateSelection: formatState
        });

        $('select#walletDropdown option:selected').val(wallets[0].wallet_type).trigger('change');
    	$('select#walletDropdownGraph option:selected').val(wallets[0].wallet_type).trigger('change');

       
    }
	
	function startTimer() {
		$('#timerDiv').show();
		$('#timer').show();
		$('#didNotReceiveSms').hide();

		var presentTime = document.getElementById('timer').innerHTML;

		var s = checkSecond((presentTime - 1));

		if(s <= "00" && check == "false"){

			$('#timerDiv').hide();
			$('#timer').hide();
			$('#didNotReceiveSms').show();
		}else if (s <= "00" && check == "true"){
            $('#timerDiv').hide();
			$('#timer').hide();
            $('#didNotReceiveSms').hide();
        }
		else {
			document.getElementById('timer').innerHTML = s;
			setTimeout(startTimer, 1000);
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

</script>
<style>

@media only screen and (max-width: 450px) {
	.textbox{
		bottom: 0px;
		position: absolute;
		padding-left: 5px;
		margin-left: 5px;
		width: 111px;
	}
}
</style>