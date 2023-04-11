

<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>
<?php include 'headerLogin.php'; ?>



<body class="navLogoutBtn m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default f-16" style="background: #F6F7F9;">

	
	<div class="m-grid m-grid--hor m-grid--root m-page">


		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(images/bg-3-1.jpg);">
			<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
				<div class="m-login__container">
					
					<div class="m-login__signin">
						<div class="m-login__head">
							<h3 class="m-login__title">Verify your phone number</h3>
							<div class="m-login__desc">Please select your country code and enter the phone number. We will send you a OTP to complete verification.</div>
						</div>
						<div class="linkPhone signInLinkForm m-login__form m-form" action="#">
							<div id="errorMsg" class="alert alert-danger" style="display: none;"></div>
							<div class="form-group m-form__group">
								
									<select id="countryCode" name="country" class="form-control m-input" placeholder="Country Code" style="padding-right: 10px; background: #fff; border: 1px solid #ebedf2; height: 50px;" required>
										<option disabled selected hidden style=""><?php echo $translations["M00448"][$language]; ?><!-- Country Code -->*</option>
										<?php include 'phoneList.php';?>
										
									</select>
								
							</div>
							<div class="form-group m-form__group">
								<div class="input-group mt-4">
									<div class="input-group-prepend">
										<span class="input-group-text" id="countryCodeNo" style="display: none; background-color: #fff; font-size: 17px;"></span>
									</div>
									<input id="linkPhoneNumber" name="linkPhoneNumber" class="form-control m-input m-login__form-input--last mt-0" placeholder="<?php echo $translations["M00449"][$language]; //Phone Number ?>*" type="text" value="" onkeypress="return isNumberKey(event);">
								</div>
								
							</div>
							
							<div id="linkCodeForm" class="form-group m-form__group" style="display: none;">
								<div class="row m-0">
									<div class="col-md-8 p-0">
										<input id="linkCode" name="linkCode" class="form-control m-input m-login__form-input--last" placeholder="<?php echo $translations["M00450"][$language]; //5 Digit Code ?>" maxlength="5" type="text" onkeypress="return isNumberKey(event);">
									</div>

									
									<div id="timerDiv" class="col-md-4 p-r-0 text-center linkCode2">
										<div id="linkCode2" name="linkCode2" class="form-control" placeholder="" disabled>
											<span id="timer" name="timer" style="text-align: center;"></span>
										</div>
									</div>

									
									<div class="col-md-4 p-r-0 text-center" id="resendDiv" style="display: none;">
										<button id="resendBtn" style="border-radius: 40px; border: 1px solid #DE2128; padding: 0.9rem 0; margin-top: 1.5rem; background: #fff; color: #DE2128; width: 128.33px; cursor: pointer;"><?php echo $translations["M00451"][$language]; ?><!-- Resend --></button>
									</div>

								</div>
							</div>

							<div class="m-login__form-action">
								<button id="sendBtn" class="btn btn-focus m-btn--pill m-btn--air btn-outline-metal btn-sm m-btn m-btn--custom theme-login-button mt-2" style=""><?php echo $translations["M00444"][$language]; ?><!-- Next --></button>
							</div>

							<div class="m-login__form-action" id="nextDIV" style="display: none;">
								<button id="nextBtn" type="button" class="btn btn-focus m-btn--pill m-btn--air btn-outline-metal btn-sm m-btn m-btn--custom theme-login-button mt-2" style=""><?php echo $translations["M00444"][$language]; ?><!-- Next --></button>
							</div>


							

						</div>
					</div>
				</div>	
			</div>
		</div>
	


<div class="modal fade" id="registerPop" tabindex="-1" role="dialog" style="padding-right:unset!important">

	<div class="modal-dialog modal-lg register" role="dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title f-16" id="exampleModalLabel"><b><?php echo $translations["M00452"][$language]; ?><!-- Number Not Registered. --></b></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-md-12" align="center">
				<h5><?php echo $translations["M00453"][$language]; ?><!-- How to register your number with TheNux --></h5>
			</div>

			<div class="row" style="margin-top: 20px;">

				<div class="col-md-4 box" align="center" style="margin-bottom:10px">

					<h3 class="titleStep"><b><?php echo $translations["M00454"][$language]; ?><!-- Step 1 --></b></h3>
					<img src="images/registerStep1New.png" style="width: 75px; margin-top: 13px;">
					<div class="col-md-12" style="margin-top:22px" align="center">
					<h4 style="text-decoration:underline"><a href="dl.php" target="_blank"><b><?php echo $translations["M00455"][$language]; ?><!-- Download --></b></a></h4>
					<h4><p class="space"><?php echo $translations["M00456"][$language]; ?><!-- TheNux app --></p></h4>
				</div>
				</div>

				<div class="col-md-4 box2" align="center" style="margin-bottom:10px">
					<h3 class="titleStep"><b><?php echo $translations["M00457"][$language]; ?><!-- Step 2 --></b></h3>
					<img src="images/registerStep2New.png" style="width:100px;margin-top: 10px;">
					<div class="col-md-12" style="margin-top:12px" align="center">
					<h4><?php echo $translations["M00458"][$language]; ?><!-- Register Your --></h4>
					<h4><p class="space"><?php echo $translations["M00459"][$language]; ?><!-- Mobile Number --></p></h4>
				</div>
				</div>

				<div class="col-md-4" align="center" style="margin-bottom:10px">
					<h3 class="titleStep"><b><?php echo $translations["M00460"][$language]; ?><!-- Step 3 --></b></h3>
					<img src="images/registerStep3New.png" style="width: 80px;height:88px; margin-top: 13px;">
					<div class="col-md-12" style="margin-top:10px" align="center">
					<h4><?php echo $translations["M00461"][$language]; ?><!-- Create Your --></h4>
					<h4><p class="space"><?php echo $translations["M00462"][$language]; ?><!-- Business Account --></p></h4>
				</div>
				</div>

			</div>

				
			</div>
		</div>
	</div>
</div>



	<?php include 'footerLogin.php'; ?>

	</div>
	
	
	<?php include 'sharejsDashboard.php'; ?>   


</body>

</html>
<script type="text/javascript">

	var url = 'scripts/reqLogin.php';
	var method = 'POST';
	var debug = 0;
	var bypassBlocking = 0;
	var bypassLoading = 0;
	var countryCode;
	var businessName = "<?php echo $_SESSION[business][business_name]; ?>";
	var username = "<?php echo $_SESSION[business][business_email]; ?>";

	$(document).ready(function(){

		
  		$('body').keypress(function(e){
            if(e.which == 13){//Enter key pressed
            	if ($('#canvasMessage').hasClass('show')) {
            		$('#canvasCloseBtn').click();//Trigger enter button click event
            	}else if($('#sendBtn').css('display') == 'none'){
            		$('#nextBtn').click();//Trigger enter button click event
            	}else{
            		$('#sendBtn').click();//Trigger enter button click event
            	}
            }
        });

		$('input#linkPhoneNumber').on('input propertychange paste', function (e) {
			var reg = /^0+/gi;
			if (this.value.match(reg)) {
				this.value = this.value.replace(reg, '');
			}
		});

		$('select#countryCode').on('change', function (e) {
			countryCode = $(this).val();
			$('#countryCodeNo').show();
			$('#countryCodeNo').text(countryCode);
			$('input#linkPhoneNumber').focus();
			
		});

		$('#sendBtn').click(function() {
			var phoneNo = $("#linkPhoneNumber").val();
            phoneNo = phoneNo.replace(/\b0+/g, '');
            var mobileNo = $("#countryCode").val()+phoneNo;

			$('#errorMsg').hide();
			$('#errorMsg').text();
            
            if($('select#countryCode').val() == null){
            	utmTracking(businessName, mobileNo, username, 'Normal Sign Up linkTheNux countryCode_empty');
            	$('#errorMsg').show();
            	$('#errorMsg').text("<?php echo $translations["M01166"][$language]; /* Please select your Country Code. */ ?>");
            	hideCanvas();
            }else if($('input#linkPhoneNumber').val() ==""){
            	utmTracking(businessName, mobileNo, username, 'Normal Sign Up linkTheNux mobileNumber_empty');
            	$('#errorMsg').show();
            	$('#errorMsg').text("<?php echo $translations["M01167"][$language]; /* Please enter your Mobile No. */ ?>");
            	$('input#linkPhoneNumber').focus();
            	hideCanvas();
            }else{

            	var formData = {
            		command   : "linkPhone",
            		mobile   : mobileNo
            	};
            	fCallback = linkPhoneMsg;

            	showCanvas();

				$.ajax({
					url: url,
					type: method,
					data: formData,
				
				success: function(result){
					var obj = JSON.parse(result);
					
                    if (obj.code == '1') {
                    	utmTracking(businessName, mobileNo, username, 'Normal Sign Up linkTheNux sentVerificationCode');
                    	linkPhoneMsg(obj, obj.message_d, obj);
                    }
                    else if (obj.errorCode == '-100') {
                        $('#registerPop').modal('toggle');
                    }
                    else {
                    	utmTracking(businessName,mobileNo,username,'Normal Sign Up linkTheNux sentVerificationCode_error ('+obj.message_d+')');
                    	errorHandler(obj.code, obj.message, obj.message_d);
                    }
                

		            },
		            error: function(xhr) {
		            	if(debug)
		            		console.log(xhr);
		            	var message = xhr.status + ' ' + xhr.statusText;
		            	showMessage('<?php echo $translations["M01168"][$language]; /* Error loading content. Please check your connection and try again. */ ?>', 'danger', '<?php echo $translations["M01169"][$language]; /* Failed */ ?>', 'times-circle-o', '');
		            },
		            complete: function() {
		            	ajaxBlocking = 0;
		            	if(!bypassLoading)
		            		hideCanvas();
		            }
		        });
            	
            } 
        });

		$('#resendBtn').click(function() {
			var phoneNo = $("#linkPhoneNumber").val();
			var mobileNo = $("#countryCode").val()+phoneNo;
			$('#errorMsg').hide();
			$('#errorMsg').text();
           
            if($('select#countryCode').val() == null){
            	utmTracking(businessName, mobileNo, username, 'Normal Sign Up linkTheNux countryCode_empty');
            	$('#errorMsg').show();
            	$('#errorMsg').text("<?php echo $translations["M01166"][$language]; /* Please select your Country Code. */ ?>");
            	hideCanvas();
            }else if($('input#linkPhoneNumber').val() ==""){
            	utmTracking(businessName, mobileNo, username, 'Normal Sign Up linkTheNux mobileNumber_empty');
            	$('#errorMsg').show();
            	$('#errorMsg').text("<?php echo $translations["M01167"][$language]; /* Please enter your Mobile No. */ ?>");
            	hideCanvas();
            }else{

            	var formData = {
            		command   : "linkPhone",
            		mobile   : mobileNo
            	};
            	fCallback = linkPhoneMsg;

            	showCanvas();

				$.ajax({
					url: url,
					type: method,
					data: formData,
				
				success: function(result){
					var obj = JSON.parse(result);
					
                    if (obj.code == '1') {
                    	utmTracking(businessName, mobileNo, username, 'Normal Sign Up linkTheNux resentVerificationCode');
                    	linkPhoneMsg(obj, obj.message_d, obj);
                    }
                    else if (obj.errorCode == '-100') {
                        $('#registerPop').modal('toggle');
                    }
                    else {
                    	utmTracking(businessName,mobileNo,username,'Normal Sign Up linkTheNux resentVerificationCode_error ('+obj.message_d+')');
                    	errorHandler(obj.code, obj.message, obj.message_d);
                    }
               

		            },
		            error: function(xhr) {
		            	if(debug)
		            		console.log(xhr);
		            	var message = xhr.status + ' ' + xhr.statusText;
		            	showMessage('<?php echo $translations["M01168"][$language]; /* Error loading content. Please check your connection and try again. */ ?>', 'danger', '<?php echo $translations["M01169"][$language]; /* Failed */ ?>', 'times-circle-o', '');
		            },
		            complete: function() {
		            	ajaxBlocking = 0;
		            	if(!bypassLoading)
		            		hideCanvas();
		            }
		        });
            	
            }  
        });

		$('#nextBtn').click(function() {
			var phoneNo = $("#linkPhoneNumber").val();
			phoneNo = phoneNo.replace(/\b0+/g, '');
			var mobileNo = $("#countryCode").val()+phoneNo;
			var verifyCode = $("#linkCode").val();

			$('#errorMsg').hide();
			$('#errorMsg').text();

			if($('select#countryCode').val() == null){
				utmTracking(businessName, mobileNo, username, 'Normal Sign Up linkTheNux countryCode_empty');
				$('#errorMsg').show();
				$('#errorMsg').text("<?php echo $translations["M01166"][$language]; /* Please select your Country Code. */ ?>");
				hideCanvas();
			}else if($('input#linkPhoneNumber').val() ==""){
				utmTracking(businessName, mobileNo, username, 'Normal Sign Up linkTheNux mobileNumber_empty');
				$('#errorMsg').show();
				$('#errorMsg').text("<?php echo $translations["M01167"][$language]; /* Please enter your Mobile No. */ ?>");
				hideCanvas();
			}else if($('input#linkCode').val() ==""){
				utmTracking(businessName, mobileNo, username, 'Normal Sign Up linkTheNux verificationCode_empty');
				$('#errorMsg').show();
				$('#errorMsg').text("<?php echo $translations["M01170"][$language]; /* Please enter your Verify Code. */ ?>");
				hideCanvas();
			}else{
				var formData = {
					command   : "verifyCode",
					mobile   : mobileNo,
					verifyCode: verifyCode
				};
				fCallback = verifyMsg;

				showCanvas();

				$.ajax({
					url: url,
					type: method,
					data: formData,
				
				success: function(result){
					var obj = JSON.parse(result);
					
                    if (obj.code == '1') {
                    	utmTracking(businessName, mobileNo, username, 'Normal Sign Up linkTheNux verifiedAccount');
                    	verifyMsg(obj, obj.message_d, obj);
                    }
                    else if (obj.errorCode == '-100') {
                        $('#registerPop').modal('toggle');
                    }
                    else {
                    	utmTracking(businessName,mobileNo,username,'Normal Sign Up linkTheNux verifiedAccount_error ('+obj.message_d+')');
                    	errorHandler(obj.code, obj.message, obj.message_d);
                    }
                

		            },
		            error: function(xhr) {
		            	if(debug)
		            		console.log(xhr);
		            	var message = xhr.status + ' ' + xhr.statusText;
		            	showMessage('<?php echo $translations["M01168"][$language]; /* Error loading content. Please check your connection and try again. */ ?>', 'danger', '<?php echo $translations["M01169"][$language]; /* Failed */ ?>', 'times-circle-o', '');
		            },
		            complete: function() {
		            	ajaxBlocking = 0;
		            	if(!bypassLoading)
		            		hideCanvas();
		            }
		        });
				
			}
		});

		function linkPhoneMsg(data, message) {
			showMessage(message, 'success', data.message, 'check-circle-o', '');
			var countDownDate;

			
				$('#sendBtn').hide();
				$("#linkCodeForm").removeAttr("style");
				$("#nextDIV").removeAttr("style");

				countDownDate = data.timeout;

				
				countDown(countDownDate)

		  

		    function countDown(){
				if(countDownDate == 0){
					$('#resendDiv').show();
					$('#timerDiv').hide();
					$('#timer').hide();
					return;
				}else{
					$('#resendDiv').hide();
					$('#timerDiv').show();
					$('#timer').show();
					countDownDate=countDownDate-1;
					$('#timer').empty().append(countDownDate);
					setTimeout(countDown,1000);
				}
			}
		}
		
		

		function verifyMsg(data, message) {
			
			showMessage(message, 'success', data.message, 'check-circle-o', 'paymentGatewayCryptocurrencies.php');
		}

		function getCountryList(data, message) {
			

			for(var i=0; i<data.result.length; i++) {
	            $('#countryCode').append('<option value="+'+data.result[i]['phone_code']+'">'+data.result[i]['country_name']+" (+"+data.result[i]['phone_code']+')</option>');
	        };
			
		}

	});
</script>

