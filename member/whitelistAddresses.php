<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">
			
			<div class="m-subheader marginTopHeader">



<!--			<div class="m-subheader marginTopHeader">
				<div class="d-flex align-items-center">
                    <div class="col-12">
                        <div class="d-flex border-bottom justify-content-between">
                            <nav class="nav">
                            <a class="nav-link active" id="successBtn" href="javascript:void(0)">
                                <?php echo $translations["M01656"][$language]; /* Whitelisting */?>
                            </a>
                              <a class="nav-link" id="pendingBtn" href="whitelistAddressHistory.php">
                                <?php echo $translations["M01657"][$language]; /* History */?>
                              </a>
                            </nav>

                        </div>
                    </div>

				</div>
			</div>-->



			<div class="m-content">
				

                <div class="col-12" id="profileSection">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="row d-flex justify-content-between" style="margin-bottom: 10px;">

								<div class="col-6 pageHeader" style="margin-left: 10px;">				    
                					<?php echo $translations["M01845"][$language]; /* Settings */ ?>
                				</div>
								<div class="" style="margin-right: 25px;">
									<a href="whitelistAddressHistory.php"><button class="btn primaryBtn btn-block">                                <?php echo $translations["M01657"][$language]; /* History */?></button></a>
								</div>

							</div>
			
                           

                                <div class="d-flex align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex border-bottom justify-content-between">
                                            <nav class="nav">
                                              <a class="nav-link" id="profileBtn" href="settings.php" style="font-size: 15px;"><?php echo $translations["M01876"][$language]; /* Profile */ ?></a>
                                              <a class="nav-link" id="securityBtn" href="settingsChangePassword.php" style="font-size: 15px;"><?php echo $translations["M01703"][$language]; /* Security */ ?></a>
                                              <a class="nav-link" id="coinBtn" href="settingsAddWallet.php" style="font-size: 15px;"><?php echo $translations["M02074"][$language]; /* Payment Currencies */ ?></a>
                                              <a class="nav-link" id="coinBtn1" href="settingsAddWalletCurrency.php" style="font-size: 15px;"><?php echo $translations["M02071"][$language]; /* Personal Wallet */ ?></a>
                                              <a class="nav-link active" id="whitelistBtn" href="javascript:void(0)" style="font-size: 15px;"><?php echo $translations["M01713"][$language]; /* Whitelist Addresses */ ?></a>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="mt-4 col-12">
                                    <div class="m-portlet">
                                        <div class="m-portlet__body">
                                            <div class="row m-form">

                                                <div class="col-6 col-md-6">
                                                    <div class="col-12 font-weight-normal" style="margin-left: -10px;">No. </div>
                                                    <?php  for($i=1; $i<=$sys['maxWhitelistAddressRow']; $i++) { ?>

                                                        <div class ="col-12" style="margin-left: -1px; margin-bottom: -12px;">
                                                            <div class = "row" >
                                                                <div class="form-group mt-2 col-12" style="display:flex; flex-direction: row;">
                                                                    <label style="color:gray; width: 8px; align-items: left; margin-top:8px; margin-right: 10px;" for="textField" class="font-weight-light numberFont"><?php echo $i; ?>. </label>
                                                                    <input placeholder="<?php echo $translations["M01645"][$language]; /* Key in wallet address */?>" style="padding-right: 5px;" class ="whitelistAddressText textbox" name="textField_<?php echo $i;?>" id="textField_<?php echo $i;?>" type="text"/>
                                                                    <select class="whitelistWalletType" style="min-width: 75px; padding-left: 5px;" name="walletType_<?php echo $i;?>" id="walletType_<?php echo $i;?>">
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php } ?>

                                                </div>

                                                <div class ="col-md-6">
                                                    <div class="seperator"></div>
                                                    <div class="col-12 font-weight-normal">
                                                    
                                                        <?php echo $translations["M01640"][$language]; /* Uploading whitelist addresses in bulk.  */?>
                                                    </div>
                                                    <div class="col-12 mt-3 small font-weight-light" style="color: gray;">                                                     
                                                        <?php echo $translations["M01641"][$language]; /* You can upload whitelist addresses in bulk if you have all of your addresses in a single file. */?>
                                                    </div>
                                                    <div class="col-12 mt-3 small font-weight-light" style="color: gray;">                                                     
                                                        <?php echo $translations["M01642"][$language]; /* The file must be in excel workbook (xlsx) format, and the header of the file must be this string exactly: "No, Address". */?>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="row col-12">
                                                            <a class="col-4.5 small font-weight-light" href="batchWhitelistAddress.xlsx">
                                                                <?php echo $translations["M02082"][$language]; /* Download sample file */?>
                                                            </a>
                                                            <div class="col-7.5 small font-weight-light" style="color: gray;">&nbsp;
                                                                <?php echo $translations["M02083"][$language]; /* for reference */?>.
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <form role="form" enctype="multipart/form-data">
                                                    <div class="col-md-12 mt-5">
                                                        <div class="row col-md-12">
                                                            <div class="font-weight-normal" style="width: 130px; margin-top: 5px; ">
                                                            <?php echo $translations["M01643"][$language]; /* Type of address */?>:
                                                            </div>
                                                            <select class="whitelistWalletType" name="walletType_upload" id="walletType_upload">
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 mt-3">
                                                        <div class="row col-12">
                                                            <input type='file' name='excel' id='excel' accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12 mt-3">
                                                        <div class="row col-12">
                                                            <button id="uploadBtn" class="col-1 btn searchBtn my-2" type="button" onClick="onUpload();">
                                                                <?php echo $translations["M01644"][$language]; /* Upload */?>
                                                            </button>

                                                        </div>
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button id="submitBtn" class="btn whitelistBtn my-2" type="button" onClick="onSubmit()";>
                            <?php echo $translations["M01419"][$language]; /* Submit */?>
                            </button>
                        </div>
                    </div>

                </div>

			</div>

			</div>

		</div>
	    <?php include 'footerDashboard.php'; ?>
</div>

<!-- 2FA START -->
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
                        <?php echo $translations["M01651"][$language]; /* Didn't receive the OTP */?>
                    <a href="javascript:;" onclick="requestOTP()">
                        <?php echo $translations["M01652"][$language]; /* Re-send OTP */?>
                    </a></p>

                </div>
            </div>

            <div class="modal-footer bg-w">
                <div class="col-12 text-center">
                    <a href="javascript:void(0)" id="confirmBtn" class="btn primaryBtn enableStep1" style="">Confirm</a>
                    <a href="javascript:void(0)" id="enableModalBtn" class="btn primaryBtn enableStep2" style=" display: none;">Enable</a>
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
                    <?php echo $translations["M01655"][$language]; /* Enter your 2-factor authenticator code */?>
                    </p>
                    <div class="d-inline-flex authenticationBox">
                        <img src="images/ga2.svg" width="40px" class="mr-2">
                        <input class="form-control authenticator" type="" name="" id="authCodeID">
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-w">
                <div class="col-12 text-center">
                    <a href="javascript:void(0)" id="confirmUnableBtn" class="btn primaryBtn" style="">Confirm</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- 2FA END -->


<?php include 'sharejsDashboard.php'; ?>
<script src="js/jquery.qrcode.js" type="text/javascript"></script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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
    var dropdownFake;
    var status;
    var tableRowDetails = [];
    var img_list;
    var symbol_list;
    var searchTab;

    var twoFaStatus = false;
    var submitType = "";
    var check = "false";
    var mobileAva = '<?php echo $_SESSION['mobile']?>';
    var emailAva = '<?php echo $_SESSION['email']?>';
    var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>'

    if (hasChangedPassword == 0){
		$.redirect('firstTimeLogin.php');
	}

    $(document).ready(function(){ 
    
        formData  = {
            command: 'getWalletType',
            setting_type : 'both'
        };  
        fCallback = getWalletType;  
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);



        //2FA START
        formData = {
            command : 'get2FAStatus',

        };
        fCallback = loadGet2FAStatus;

        ajaxSend('scripts/reqWhitelist.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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

        $("#enableModalBtn").click(function(){
        
            formData = {
                command : 'register2FA',
                code : $('#otpCodeID').val()

            };
            fCallback = loadRegister2FA;
            whitelistUrl ='scripts/reqWhitelist.php'
            ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $("#confirmUnableBtn").click(function(){
        
            var otpCode = $('#authCodeID').val();
            if(otpCode=="") {
                otpCode = $('#otpCodeID').val();;
            }
            
            if(submitType=="onSubmit") {

                var arrAddress = Array();
                for(var i=1; i<=<?php echo $sys['maxWhitelistAddressRow']; ?>; i++) {
                 
                    var walletType = $('select#walletType_'+i+' option:selected').val();
                    var address = sanitize($('#textField_'+i).val());
                    
                    if(address!="") {
                        arrAddress.push({address: address, wallet_type: walletType});
                    }   
                }

                formData = {
                    command : 'whitelistMultiAddress',
                    code: otpCode,
                    address: arrAddress
                };

                fCallback = loadWhitelistAddress;
                whitelistUrl ='scripts/reqWhitelist.php'
                ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            } else {

                var walletType = $('select#walletType_upload option:selected').val();

                var form = new FormData();
                form.append('command', 'batchWhitelistAddress');
                form.append('code', otpCode);
                form.append('wallet_type', walletType);
                form.append('excel', $('#excel')[0].files[0]);

                $.ajax({
                       url : 'scripts/reqWhitelist.php',
                       type : 'POST',
                       data : form,
                       processData: false,
                       contentType: false,
                       success : function(data) {

                            var js = JSON.parse(data);
                            console.log(js);

                            var httpCode = js.code;
                            var httpMessage = js.message;
                            var httpMessageD = js.message_d;

                            if(httpCode==0) {
                                showMessage(httpMessageD, 'warning', httpMessage, 'warning', '');
                            } else {
                                loadWhitelistAddress(js, httpMessageD);
                            }
                            
                       }
                });

            }
           

        });
        //2FA End


    });


    //2FA Start
    function loadGet2FAStatus(data, message){
        twoFaStatus = data.data.status
    }

    function twoFaOtpView() {

        console.log("twoFaOtpView");

        $("#unableModal").modal('show');
    }

    function twoFaRegister() {

        console.log("twoFaRegister");

        formData = {
            command : 'request2FASMSOTP'

        };
        fCallback = loadSendSMSOTP;
        whitelistUrl ='scripts/reqWhitelist.php'
        ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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
        whitelistUrl ='scripts/reqWhitelist.php'
        ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
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

        if(submitType=="onSubmit") {

            var arrAddress = Array();
            for(var i=1; i<=<?php echo $sys['maxWhitelistAddressRow']; ?>; i++) {
             
                var walletType = $('select#walletType_'+i+' option:selected').val();
                var address = sanitize($('#textField_'+i).val());
                
                if(address!="") {
                    arrAddress.push({address: address, wallet_type: walletType});
                }   
            }

            formData = {
                command : 'whitelistMultiAddress',
                code: otpCode,
                address: arrAddress
            };

            fCallback = loadWhitelistAddress;
            whitelistUrl ='scripts/reqWhitelist.php'
            ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        } else {

            var walletType = $('select#walletType_upload option:selected').val();

            var form = new FormData();
            form.append('command', 'batchWhitelistAddress');
            form.append('code', otpCode);
            form.append('wallet_type', walletType);
            form.append('excel', $('#excel')[0].files[0]);

            $.ajax({
                   url : 'scripts/reqWhitelist.php',
                   type : 'POST',
                   data : form,
                   processData: false,
                   contentType: false,
                   success : function(data) {

                        var js = JSON.parse(data);
                        console.log(js);

                        var httpCode = js.code;
                        var httpMessage = js.message;
                        var httpMessageD = js.message_d;

                        if(httpCode==0) {
                            twoFaStatus = true;
                            showMessage(httpMessageD, 'warning', httpMessage, 'warning', '');
                        } else {
                            loadWhitelistAddress(js, httpMessageD);
                        }
                        
                   }
            });

        }

    }

    function loadWhitelistAddress(data, message) {
        hideCanvas();

        var json = JSON.stringify(data);
        var js = JSON.parse(json);
        console.log("#####"+JSON.stringify(js.data));

        $.redirect("whitelistSuccess.php", {
            result: JSON.stringify(js.data)
        });

        //showMessage(message, 'success', "Success", '', 'whitelistAddressHistory.php');
    }
    //2FA End


    function getWalletType(data, message){
        if(data.result.coin_data && dropdownFake !=1) {

            for(var i=1; i<=<?php echo $sys['maxWhitelistAddressRow']; ?>; i++) {
             
                $('#walletType_'+i).empty();

                $.each(data.result.coin_data, function(key, val) {
                    $('#walletType_'+i).append('<option data-image="'+val['image']+'" value="'+ val['wallet_type'] +'">'+ val['display_symbol'] +'</option>')
                });
            }

            $('#walletType_upload').empty();

            $.each(data.result.coin_data, function(key, val) {
                $('#walletType_upload').append('<option data-image="'+val['image']+'" value="'+ val['wallet_type'] +'">'+ val['display_symbol'] +'</option>')
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

        for(var i=1; i<=<?php echo $sys['maxWhitelistAddressRow']; ?>; i++) {

            $('#walletType_'+i).select2({
                dropdownAutoWidth : true,
                templateResult: formatState,
                templateSelection: formatState
            });
            
        }
         
        $('#walletType_upload').select2({
            dropdownAutoWidth : true,
            templateResult: formatState,
            templateSelection: formatState
        });

        
    }

    function onSubmit(){

        submitType = "onSubmit";
        var t1 = document.getElementById("textField_1").value;
        var t2 = document.getElementById("textField_2").value;
        var t3 = document.getElementById("textField_3").value;
        var t4 = document.getElementById("textField_4").value;
        var t5 = document.getElementById("textField_5").value;
        var t6 = document.getElementById("textField_6").value;
        var t7 = document.getElementById("textField_7").value;
        var t8 = document.getElementById("textField_8").value;
        var t9 = document.getElementById("textField_9").value;
        var t10 = document.getElementById("textField_10").value;

	    if(t1 != "" || t2 != "" || t3 != "" || t4 != "" || t5 != "" || t6 != "" || t7 != "" || t8 != "" || t9 != "" || t10 != ""){
            if(twoFaStatus == true) {
                twoFaOtpView();
            } else {
                twoFaRegister();
            }
        }else{
            showMessage("Address cannot be empty", 'warning', "Failed", 'warning', '');
        }

    };

    function onUpload(){

        submitType = "onUpload";
        if (typeof $('#excel')[0].files[0] !== 'undefined'){
            if(twoFaStatus) {
                twoFaOtpView();
            } else {
                twoFaRegister();
            }
        }else
        {
            showMessage("File not found", 'warning', "Failed", 'warning', '');
        }

    }



</script>

<style>

    .seperator {
        background-color: #e8e8e8; 
        margin-left: -15px;
        height: 200px; 
        width: 1px; 
        position: absolute;
    }
    .whitelistWalletType {
        color: gray;
        width: 130px; 
        border-color: #e8e8e8; 
        border-style: ridge; 
        box-shadow: none; 
        outline: none; 
        color: gray;
    }

    .whitelistAddressText {
        color: gray;
        border-color: #e8e8e8;
        border:1px;
        border-style: ridge;
        box-shadow: none;
        outline: none;
        width: 100%;
        padding-left: 10px;
        margin-right: 10px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        position: relative;
        padding: 0px 30px 0px 10px;
        line-height: 30px;
        color: gray;
    }

    .select2 {
        width: 130px!important;
        color: gray;
    }

    .select2-container--default .select2-selection--multiple,
    .select2-container--default .select2-selection--single {
        /*border: unset;*/
        border-style: solid;
        border-color: #e8e8e8;
        color: gray;
    }

    .select2-container--default.select2-container--open .select2-selection--multiple,
    .select2-container--default.select2-container--open .select2-selection--single {
       /* border: unset;
        box-shadow: unset;*/
        border-style: solid;
        border-color: #e8e8e8;
        color: gray;
    }
    @media only screen and (max-width: 400px) {
        .select2 {
        width: 130px!important;
        color: gray;
        min-width: 75px;
        padding-left: 5px;
        }
        .numberFont{
            color:gray;
            width: 8px;
            align-items: left; 
            margin-top:8px; 
            margin-left: 0px; 
            margin-right: 0px;
        }
        .textbox {
           width: 170px; 
        }
    }
    @media only screen and (max-width: 380px) {
        .textbox {
        width: 130px;
        }
    }
    @media only screen and (max-width: 320px) {
        .textbox {
        width: 80px;
        }
    }
    @media only screen and (max-width: 800px) {
        .select2 {
        width: 130px!important;
        color: gray;
        min-width: 75px;
        padding-left: 5px;
        }
        .numberFont{
            color:gray;
            width: 8px;
            align-items: left; 
            margin-top:8px; 
            margin-left: 0px; 
            margin-right: 0px;
        }
        
    }


    .searchBox {
        height: 32px;
    }

    .searchBox.seacrhWalletBox {
        border: 1px solid #dedede;
        padding: 0px;
        background-color: #fff;
        display: inline-flex;
        align-items: center;
        margin-right: 5px;
        height: 32px;
    }

</style>
