<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">


			<div class="m-content marginTopHeader">

				<div class="col-12 pageHeader mb-5 px-0">
				    
					<?php echo $translations["M01597"][$language]; /* API Integration */?>
				</div>

                <div class="col-xl-12 px-0">

                	<div class="row">

                		<div class="col-12 mt-4 mt-md-4">
                			<div class="row">
                                <div class="col-12 bigText">
                                    
									<?php echo $translations["M00139"][$language]; /* API Keys */?>
                                </div>
                				<div class="col-12 smallTxt">
								
								<?php echo $translations["M01658"][$language]; /* Add new or revoke  */?>
                					<?php echo $sys['companyName']?> 
									<?php echo $translations["M01659"][$language]; /* API access key  */?>.									
									
                				</div>
                				<div class="col-12 smallTxt">
								<?php echo $translations["M01660"][$language]; /* The key is required for API integration to whitelisting wallet address. Read our API documentation  */?>.
                					 <a href="paymentGateway.php#whitelistSection">
									 <?php echo $translations["M01661"][$language]; /* here  */?>.
									 </a>.

                				</div>

                				<div class="col-12 mt-3" id="showErrorMsg" style="display: none">
                					<div class="m-portlet">
                						<div class="m-portlet__body">
		                					<div class="row">
		                						<div class="col-12">
		                							<div class="row m-form">
		                								<div class="col-12">
		                									<div class="row">
		                										<div class="col-4 text-right">
		                											<img src="images/nuxPay/apiKeyIcon.png">
						                						</div>
						                						<div class="col-md-8">
						                							<div class="row">
						                								<div class="col-12" style="font-weight: 500; color: #000">
						                									
																			<?php echo $translations["M01661"][$language]; /* No API Key  */?>!
						                								</div>
						                								<div class="col-12">
						                									
																			<?php echo $translations["M01662"][$language]; /* Get started via creating an API key to integrate with   */?>
																			<?php echo $sys['companyName']?> 
																			<?php echo $translations["M01663"][$language]; /* whitelisting wallet address system*/?>.
																			
						                								</div>
						                								<div class="col-12 mt-3">
						                									<button onclick="" id="generateNewApiKeyWL1" class="btn searchBtn" type="button">+ <?php echo $translations["M01664"][$language]; /* New API Key */?>
																				
																			</button>
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


    							<div class="col-12 mt-3" id="showresultListingWL" style="display: none;">
    								<div class="m-portlet m-portlet--tab">
    				                    <div class="m-portlet__body">
    				                        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
    				                            <div class="table-responsive" id="apiKeysDivListWL"></div>
    				                            <div class="m-datatable__pager m-datatable--paging-loaded clearfix m-t-rem3">
										            <ul class="m-datatable__pager-nav" id="apiKeysPager"></ul>
										            <div class="m-datatable__pager-info">
										                <span class="m-datatable__pager-detail"></span>
										            </div>
										        </div>  
    				                        </div>     
    				                    </div>
    								</div>
    								<div class="col-3 px-0">
    									<button onclick="" id="generateNewApiKeyWL" data-toggle="modal" data-target="#generateApiModalWL" class="btn searchBtn" type="button" style="min-width: 100px; margin-top: -10px">+ New API Key</button>
    								</div>
    							</div>

    							
                			</div>
                		</div>




                	</div>
					
				</div>
			</div>

		</div>

	</div>
	<?php include 'footerDashboard.php'; ?>
</div>


<div class="modal fade" id="generateApiModalWL" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b">
                <div class="modal-title f-16"><?php echo $translations["M00138"][$language]; /* Generate API Key */ ?></div>
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div id="errorMsgAuto" class="alert alert-danger" style="display: none;"></div>
                <div class="form-group m-form__group">
					<label for="reference" style="padding-top: 10px;">
						<?php echo $translations["M01665"][$language]; /* Reference Name */?>
					</label>
					<input class="form-control col-md-12" name="apiReference" id="reference" maxlength="50" autocomplete="off">
                    <!-- <label for="expiryDate" style="padding-top: 10px;"><?php echo $translations["M00141"][$language]; /* Expiry Date */ ?><span class="text-danger">*</span></label> -->
					<label for="expiryDate" style="padding-top: 10px;"><?php echo $translations["M00141"][$language]; /* Expiry Date */ ?><span> 
						(<?php echo $translations["M01666"][$language]; /* optional */?>)
					</span></label>
                     <input class="form-control col-md-12" type="datepicker" name="apiExpiry" id="expiryDate" data-date-format="YYYY MMMM DD" autocomplete="off" placeholder ="YYYY-MM-DD">
                </div>                          

            </div>

            <div class="modal-footer bg-w">
                <a href="javascript:void(0)" class="btn btn btn m-btn--pill m-btn--air  btn-outline-secondary btn-sm m-btn m-btn--custom theme-button"  style="color: black;"  data-dismiss="modal" role="button"><?php echo $translations["M00142"][$language]; /* Cancel */ ?></a>
                <a href="javascript:void(0)" id="generateBtn" class="btn btn btn m-btn--pill m-btn--air btn-outline-metal btn-sm m-btn m-btn--custom theme-green-button"  style=""><?php echo $translations["M00143"][$language]; /* Generate */ ?></a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="showApiDetailModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b">
                <div class="modal-title f-16">
				
					<?php echo $translations["M01667"][$language]; /* API key details */?>
				</div>
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div id="errorMsgAuto" class="alert alert-danger" style="display: none;"></div>
                <div class="form-group m-form__group">
                	<div class="row">
                		<label class="f-14" style="margin-left: 14px;"> 
							<?php echo $translations["M01668"][$language]; /* API Key */?>:
						</label>
                		<label id="modalApiKey" style="margin-left: 10px;"></label>
                		<span>
                            <img src="images/dashboard/newCopyIcon.png" style="width: 25px; padding-left:5px" id="modalCopyTxId">
                        </span>
                	</div>

                	<div class="row">
                		<label class="f-14" style="margin-left: 14px;"> 
						<?php echo $translations["M01669"][$language]; /* Reference */?>:
						</label>
                		<label id="modalReference" style="margin-left: 10px;"></label>
                	</div>

                	<div class="row">
                		<label class="f-14" style="margin-left: 14px;">
						<?php echo $translations["M01026"][$language]; /* Status */?>:
						</label>
                		<label id="modalStatus" style="margin-left: 10px;"></label>
                	</div>

                	<div class="row">
                		<label class="f-14" style="margin-left: 14px;">
							<?php echo $translations["M01670"][$language]; /* Created At */?>:
						</label>
                		<label id="modalCreatedAt" style="margin-left: 10px;"></label>
                	</div>

                	<div class="row">
                		<label class="f-14" style="margin-left: 14px;">
							<?php echo $translations["M01671"][$language]; /* Expired At */?>:
						</label>
                		<label id="modalExpiredAt" style="margin-left: 10px;"></label>
                	</div>

                	<div class="row">
                		<label class="f-14" style="margin-left: 14px;"> 
							<?php echo $translations["M01672"][$language]; /* Last Updated At */?>:
						</label>
                		<label id="modalLastUpdatedAt" style="margin-left: 10px;"></label>
                	</div>

                </div>                          

            </div>

            
        </div>
    </div>
</div>

<!-- 2FA START -->
<div class="modal fade" id="twoFactorModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b justify-content-center">
                <div class="modal-title hasSub">
                    <h5>
						<?php echo $translations["M01673"][$language]; /* Enable 2-Factor Authentication */?>
					</h5>
                    <p class="my-0 enableStep1">
					
					<?php echo $translations["M01674"][$language]; /* The OTP code has been sent to your verified contact method */?>:					
					<br><span id="mobileAvailable"><?php echo $translations["M00459"][$language]; /* Mobile Number */?>: <?php echo $_SESSION['mobile']?><br>

					</span><span id="emailAvailable"> <?php echo $translations["M00958"][$language]; /* Email */?>: <?php echo $_SESSION['email']?>
					</span></p>

                    <div class="enableStep2" style="display: none;">
<!--                        <img id="authenticatorQR" src="images/qrcode.jpg" width="150px" class="my-3">-->
                        <div id="qrcode" class=""></div>
                        <ul class="text-left pl-3">
                            <li>
							<?php echo $translations["M01646"][$language]; /* Install Google Authenticator app on your mobile device. */?>
							</li>
                            <li>
								<?php echo $translations["M01647"][$language]; /* Scan QR code with the authenticator. */?>
							</li>
                            <li>
								<?php echo $translations["M01648"][$language]; /* Enter 6-digits codes from authenticator. */?>
							</li>
                        </ul>
                    </div>
                    
                </div>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div class="col-12 text-center">
                    <p class="enableStep1">
						<?php echo $translations["M01649"][$language]; /* Enter your OTP code */?>
					</p>
                    <p class="enableStep2" style="display: none;">
					<?php echo $translations["M01650"][$language]; /* Enter your 2-factor authenticator code */?>
					</p>
                    <div class="d-inline-flex authenticationBox align-items-center">
                        <div class="mr-2">
                            <img src="images/OTP.png" width="30px">
                        </div>
                        <input class="form-control authenticator" type="" name="" id ="otpCodeID">
                        <span id="timer" name="timer" style="padding-left: 20px"></span>
                    </div>
                    <p id ="didNotReceiveSms" >
					<?php echo $translations["M01651"][$language]; /* Didn't receive the OTP */?>?
					<a href="javascript:;" onclick="requestOTP()">
						<?php echo $translations["M01652"][$language]; /* Re-send OTP */?>
					</a></p>

                </div>
            </div>

            <div class="modal-footer bg-w">
                <div class="col-12 text-center">
                    <a href="javascript:void(0)" id="confirmBtn" class="btn primaryBtn enableStep1" style="">
						<?php echo $translations["M00217"][$language]; /* Confirm */?>
					</a>
                    <a href="javascript:void(0)" id="enableModalBtn" class="btn primaryBtn enableStep2" style=" display: none;">
						<?php echo $translations["M01031"][$language]; /* Enable */?>
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
						<?php echo $translations["M01653"][$language]; /* 2-Factor Authentication */?>
					</h5>
                    <p class="my-0 enableStep1">
						<?php echo $translations["M01654"][$language]; /* Enter authenticator codes to make sure it's really you trying to change settings */?>
					</p>
                </div>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div class="col-12 text-center">
                    <p>
						<?php echo $translations["M01650"][$language]; /* Enter your 2-factor authenticator code */?>
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
						<?php echo $translations["M00981"][$language]; /* Confirm */?>
					</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- 2FA END -->


<?php include 'sharejsDashboard.php'; ?>
<script src="js/jquery.qrcode.js" type="text/javascript"></script>

</body>
</html>

<script>
    $("#expiryDate").datepicker({
        format: 'yyyy-mm-dd',
        orientation:"bottom",
        todayHighlight:!0,
        templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}
    });
   
    var WLdivId    = 'apiKeysDivListWL';
    var WLtableId  = 'apiKeysListTableWL';
    var pagerId  = 'apiKeysPager';
    var btnArray = {};
    var thArray  = Array(
		'API Keys',
		'Reference Name',
		'Status',
		'Created On',
		'Expired On',
		'',
		''
    );

    var WLurl           = 'scripts/reqWhitelist.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
	var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';
	
	var twoFaStatus = false;
	var mobileAva = '<?php echo $_SESSION['mobile']?>';
    var emailAva = '<?php echo $_SESSION['email']?>';
    var submitType = "";
    var submitExpiryDate = "";
    var submitReference = "";
    var submitViewId = "";
	var submitRevokeId = "";
	
    if (hasChangedPassword == 0){
		$.redirect('firstTimeLogin.php');
	}


	$(document).ready(function() {
		

		//2FA START
        formData = {
            command : 'get2FAStatus',

        };
        fCallback = loadGet2FAStatus;

        ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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
            ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
           
        });

        $("#enableModalBtn").click(function(){
        
            formData = {
                command : 'register2FA',
                code : $('#otpCodeID').val()

            };
            fCallback = loadRegister2FA;
            ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $("#confirmUnableBtn").click(function(){
        
            var otpCode = $('#authCodeID').val();
            if(otpCode=="") {
                otpCode = $('#otpCodeID').val();;
            }
            
           	callApiAfter2FA(otpCode);

        });
        //2FA End



		fCallback = loadApiKeyListingWL;
		formData  = {
		    command : 'getApiList',
		    pageNumber: pageNumber
		};
		ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);



		$('#generateNewApiKeyWL').click(function(){
		    $('#generateApiModalWL').toggle();
		});
		
		$('#generateNewApiKeyWL1').click(function(){
		     $('#generateApiModalWL').modal('show');
		});
		
		$('#generateWLBtn').click(function(){    
	    
			$('#authCodeID').val('');
            $('#otpCodeID').val('');
        
	    	submitType = "generateAPI";
	    	submitExpiryDate = $('input#expiryDate').val();
			submitReference = $('#reference').val();
		 	console.log('here generate');

	    	if(twoFaStatus) {
	            twoFaOtpView();
	        } else {
	            twoFaRegister();
	        }

	        $('#generateApiModalWL').modal('hide');

		});


		$('#modalCopyTxId').click(function(){
			var apiKeyTxt = $("#modalApiKey").text();
	    	copyToClipboard(apiKeyTxt)
	    });

	});
	
	
	//2FA Start
    function loadGet2FAStatus(data, message){
        twoFaStatus = data.data.status
    }

    function twoFaOtpView() {

    	$(".enableStep1").show();
        $(".enableStep2").hide();

        console.log("twoFaOtpView");

        $("#unableModal").modal('show');
    }

    function twoFaRegister() {

        console.log("twoFaRegister");

        formData = {
            command : 'request2FASMSOTP'

        };
        fCallback = loadSendSMSOTP;
        ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    }

    function loadSendSMSOTP(data,message){
        $("#otpCodeID").val('');
        if(data.code == 1){

            if(data.data) {
                document.getElementById("timer").innerHTML = data.data.countdown_second;
                $("#didNotReceiveSms").hide();
                $("#timer").show();
                startTimer();
                $(".enableStep1").show();
                $(".enableStep2").hide();

                $("#twoFactorModal").modal('show');
            
            } else {

                showMessage(message, 'danger', '', 'times-circle-o', 'settings.php');
            }
        }
    }

    function requestOTP(){

        formData = {
            command : 'request2FASMSOTP'

        };
        fCallback = loadRequestOTP;
        ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadRequestOTP(data, message){
        if(data.code == 1){

            if(data.data) {
                document.getElementById("timer").innerHTML = data.data.countdown_second;
                $("#didNotReceiveSms").hide();
                $("#timer").show();
                startTimer();
            } else {
                showMessage(message, 'danger', '', 'times-circle-o', 'settings.php');
            }
            
        }
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

        } else if (s <= "00" && check == "true"){
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
//                  src: 'images/qrcode.jpg',
                imgWidth: 20,
                imgHeight: 20,
            });

            $('#otpCodeID').val('');
            $("#timerDiv").hide();
            $("#timer").hide();
            $("#didNotReceiveSms").hide();
            $(".enableStep1").hide();
            $(".enableStep2").show();
            check = "true";
            twoFaStatus = true;
            document.getElementById('timer').innerHTML = "1";		
            
        } else{
            $("#twoFactorModal").modal('hide');
        }
    }

    function loadRegister2FA(data, message){
        var obj = data;
        $("#twoFactorModal").modal('hide');

        var otpCode = $('#authCodeID').val();
        if(otpCode=="") {
            otpCode = $('#otpCodeID').val();;
        }

        callApiAfter2FA(otpCode);

    }

    function callApiAfter2FA(code) {

    	if(submitType=="generateAPI") {

    		fCallback = responseGenerateApiKey;
			formData  = {
			    command : 'generateApiKey',
			    code: code,
			    reference: submitReference,
			    expired_at: submitExpiryDate
			};

			console.log(formData);
			ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


    	} else if(submitType=="viewAPI") {

    		fCallback = responseViewAPI;
			formData  = {
			    command : 'getApiDetail',
			    code: code,
			    apiId: submitViewId
			};

			console.log(formData);
			ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    	} else if(submitType=="revokeAPI") {

    		fCallback = responseRevokeAPI;
			formData  = {
			    command : 'revokeApiKey',
			    code: code,
			    apiId: submitRevokeId
			};

			console.log(formData);
			ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    	} else {
    		$("#twoFactorModal").modal('hide');
    		$("#unableModal").modal('hide');

    		showMessage('<?php echo $translations["E00527"][$language]; /* Something went wrong, please try again later. */ ?>', 'warning', 'Failed', "warning", '');
    	}
    	
    }

    function responseGenerateApiKey(data,message){
		
		$("#twoFactorModal").modal('hide');
    	$("#unableModal").modal('hide');  

		pagingCallBackWL(pageNumber, loadApiKeyListingWL); 

	    showMessage(message, 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', "check-circle-o", '');
	};

	function responseRevokeAPI(data,message){

		$("#twoFactorModal").modal('hide');
    	$("#unableModal").modal('hide');  

		pagingCallBackWL(pageNumber, loadApiKeyListingWL); 

	    showMessage(message, 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', "check-circle-o", '');
	};

	function responseViewAPI(data,message){
		
		$("#twoFactorModal").modal('hide');
    	$("#unableModal").modal('hide');  

    	var responseViewAPIKey = data.data.apiKey;
    	var responseViewCreatedAt = dateTimeToDateFormat(data.data.created_at);
    	var responseViewExpiredAt = data.data.expired_at=="-" ? "-" : dateTimeToDateFormat(data.data.expired_at);
    	var responseViewReference = data.data.reference;
    	var responseViewStatus = (data.data.status==1 ? "Active" : "Expired");
    	var responseViewUpdatedAt = dateTimeToDateFormat(data.data.updated_at);

    	$("#modalApiKey").text(responseViewAPIKey);
		$("#modalReference").text(responseViewReference);
		$("#modalStatus").text(responseViewStatus);
		$("#modalCreatedAt").text(responseViewCreatedAt);
		$("#modalExpiredAt").text(responseViewExpiredAt);
		$("#modalLastUpdatedAt").text(responseViewUpdatedAt);
    	$('#showApiDetailModal').modal('show');

	};
    //2FA End



	function pagingCallBackWL(pageNumber, fCallback){

		fCallback = loadApiKeyListingWL;
		formData  = {
		    command : 'getApiList',
		    pageNumber: pageNumber
		};
		ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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
	
	
	
    function loadApiKeyListingWL(data, message) {


    	if(data.data) {

    		var tableNo;
	        var apiKeysListWL = data.data.listing;

	        if(apiKeysListWL) {
	        	$('#showErrorMsg').hide();
	        	$('#showresultListingWL').show();

	            var newList = [];
	            var workingHours;
	            $.each(apiKeysListWL, function(k, v) {

	            	var status = v['status'];

	            	if (status == "1") {
	            		var statusTxt = "Active";
	            	} else {
	            		var statusTxt = "Expired";
	            	}

	                var rebuildDataWL = {
	                    ID               : `<span style="white-space: nowrap">${v['apikey']}</span>`,
	                    reference        : v['reference'],
	                    status 			 : statusTxt,
	                    createdAt        : moment(v['createdAt']).format('DD/MM/YYYY'),
	                    expiredAt        : v['expiredAt'] != '-' ? moment(v['expiredAt']).format('DD/MM/YYYY') : '-',
	                    viewApi        : '<div class="viewApiId mt-1"><button class="btn viewBtn">View</button></div>',
	                    deleteApi        : '<div class="deleteApiId mt-1"><button class="btn revokeBtn" '+(statusTxt=='Expired' ? 'disabled':'')+' >Revoke</button></div>'
	                };

	                newList.push(rebuildDataWL);
	            });
	        }

	        if(newList.length == 0) {
	        	$('#showErrorMsg').show();
	        	$('#showresultListingWL').hide();
	        }

	        buildTable(newList, WLtableId, WLdivId, thArray, btnArray, message, tableNo);
	        // console.log(data);
	        pagination(pagerId, data.data.pageNumber, data.data.totalPage, data.data.totalRecord, data.data.numRecord);

	       	$('#'+WLtableId).find('tbody tr').each(function(){
	            $(this).addClass("removeBackgorundColor");
	        })
	        $('#'+WLtableId).find('tbody tr').each(function(){
	            $(this).find("td:eq(1)").addClass("walletAddressTextEscplise");
	            $(this).find("td:eq(2)").addClass("montserratRegularFont");
	            $(this).find("td:eq(3)").addClass("montserratRegularFont");
	            $(this).find("td:eq(4)").addClass("montserratRegularFont");
	        })
	       	if(apiKeysListWL) {
	        	$.each(apiKeysListWL, function(k, v) {
	          		$('#'+WLtableId+' tr#'+k).find('.deleteApiId').attr('data-id', v['id']);
	          		$('#'+WLtableId+' tr#'+k).find('.viewApiId').attr('data-id', v['id']);
	        	});
	      	}

	       	$('.deleteApiId').click(function() {

	       		$('#authCodeID').val('');
	            $('#otpCodeID').val('');

	   			submitType = "revokeAPI";
	   			submitRevokeId = $(this).attr('data-id');
			 	console.log('Revoke Id: ' + submitRevokeId);

		    	if(twoFaStatus) {
		            twoFaOtpView();
		        } else {
		            twoFaRegister();
		        }


	       	});
	       	$('.viewApiId').click(function() {

	       		$('#authCodeID').val('');
	            $('#otpCodeID').val('');

	       		submitType = "viewAPI";
	   			submitViewId = $(this).attr('data-id');
			 	console.log('View Id: ' + submitViewId);

		    	if(twoFaStatus) {
		            twoFaOtpView();
		        } else {
		            twoFaRegister();
		        }

	       	});

    	} else {
    		showMessage(message, 'danger', '<?php echo $translations["M01597"][$language]; /* API Integration */?>', 'times-circle-o', 'settingsChangePassword.php');
    	}

    }

	function dateTimeToDateFormat(dateTimeValue) {

		return moment(dateTimeValue).format('LLL');
    }

	
</script>
<style>
@media only screen and (max-width: 1200px){
  .m-portlet .m-portlet__body {
    padding-top: 5px;
	padding-left: 5px;
	/* padding-right: 5px; */
  }
}
</style>
