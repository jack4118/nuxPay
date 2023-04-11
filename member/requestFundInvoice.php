<?php include 'include/config.php'; ?>
<?php include 'headLogin.php'; ?>


<body>
    <div class="col-12">
        <div class="row requestFundFullWrapper">
            <?php include 'requestFundSide.php'; ?>
            <div class="col-md-8 requestFundRight">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-10">
                                <span class="requestRightTitle"><?php echo $translations["M01552"][$language]; /*  Request fund from your customer */ ?></span>
                                <div class="d-block mt-1">
                                    <div class="stepProgress">
                                        <span class="active"></span>
                                        <span class="active"></span>
                                        <span class="active"></span>
                                    </div>
                                    <span class="d-inline-block ml-2" style="vertical-align: middle;">
                                        <?php echo $translations["M01593"][$language]; /*  Success */ ?>
                                    </span>
                                </div>

                                <div class="d-block mt-5 ">
                                    <div class="requestPaymentLink">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <img class="paymentIcon" src="images/nuxPay/paymentIcon.png" alt="" width="100%">
                                            </div>
                                            <div class="col-lg-9">
                                                <span class="d-block"><?php echo $translations["M01589"][$language]; /*  The request has been created and sent to the payer successfully. */ ?></span>
                                                <div class="d-flex align-items-end">
                                                    <input id="urlInput" type="text" class="form-control requestInput rounded-0"  readonly>
                                                    <button id="copyBtn" class="btn btnRequest col rounded-0"><i class="fa fa-copy"></i> <?php echo $translations["M01590"][$language]; /*  Copy. */ ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="d-flex">
                                        <a href="javascript:;" class="btn btn-media facebook"><i class="fa fa-facebook"></i></a>
                                        <a href="javascript:;" class="btn btn-media whatsapp"><i class="fa fa-whatsapp"></i></a>
                                        <a href="javascript:;" class="btn btn-media telegram"><i class="fa fa-telegram"></i></a>
                                        <a href="javascript:;" class="btn btn-media wechat"><i class="fa fa-wechat"></i></a>
                                    </div> -->
                                </div>

                                <div class="d-block mt-5">
                                    <div><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 451.15 12.94"><defs><style>.cls-1{fill:none;stroke:#e8e8e8;stroke-miterlimit:10;stroke-width:2px;}</style></defs><title>Untitled-1</title><polyline class="cls-1" points="450.57 11.72 435.57 1.22 420.57 11.72 405.57 1.22 390.57 11.72 375.57 1.22 360.57 11.72 345.57 1.22 330.57 11.72 315.57 1.22 300.57 11.72 285.57 1.22 270.57 11.72 255.57 1.22 240.57 11.72 225.57 1.22 210.57 11.72 195.57 1.22 180.57 11.72 165.57 1.22 150.57 11.72 135.57 1.22 120.57 11.72 105.57 1.22 90.57 11.72 75.57 1.22 60.57 11.72 45.57 1.22 30.57 11.72 15.57 1.22 0.57 11.72"/></svg> </div>

                                    <div class="requestConfirmationInvoice">

                                        <div class="d-block requestDetailSuccess">
                                            <table>
                                                <tr><th><?php echo $translations["M01555"][$language]; /*  Your name */ ?>:</th><td><?php echo $_POST['payeeName']; ?></td></tr>
                                                <tr id="payee_email"><th><?php echo $translations["M01512"][$language]; /*  Your email address */ ?>:</th><td><?php echo $_POST['payeeEmail']; ?></td></tr>
                                                <tr id="payee_mobile"><th><?php echo $translations["M01513"][$language]; /*Your Mobile Number*/?>:</th><td><?php echo $_POST['payeeMobileNumber']; ?></td></tr>
                                            </table>
                                        </div>

                                        <div class="d-block mt-4 requestDetailSuccess">
                                            <table>
                                                <tr><th><?php echo $translations["M01557"][$language]; /*  Payer Name */ ?>:</th><td><?php echo $_POST['payerName']; ?></td></tr>
                                                <tr id="payer_email"><th><?php echo $translations["M01575"][$language]; /*  Payer Email */ ?>:</th><td><?php echo $_POST['payerEmail']; ?></td></tr>
                                                <tr id="payer_mobile"><th><?php echo $translations["M01563"][$language]; /*  Payer Mobile Number */ ?>:</th><td><?php echo $_POST['payerCountryCode']; ?><?php echo $_POST['payerMobileNumber']; ?></td></tr>
                                            </table>
                                        </div>

                                        <div class="d-block mt-4 requestDetailSuccess">
                                            <table>
                                                <tr><th><?php echo $translations["M01565"][$language]; /*  Amount to pay */ ?>:</th><td><?php echo $_POST['amount']; ?> USDT</td></tr>
                                                <tr><th><?php echo $translations["M01571"][$language]; /*  Payment Description */ ?>:</th><td class="wrapText"><?php echo $_POST['paymentDescription']; ?></td></tr>
                                            </table>
                                        </div>
                                    </div>

                                    
                                </div>

                                <div class="d-block mt-3">
                                    <a href="requestFund.php" class="btn btnRequest"><?php echo $translations["M01591"][$language]; /*  New Request */ ?></a>
                                </div>
                                <div class="d-block mt-2 text-center" id="notify">
                                    <span></span>
                                </div>

                                <div class="d-block mt-2 text-center">
                                    <span><span onclick="redirectLogin()" style="color:#53c2da;cursor: pointer;"><?php echo $translations["M01499"][$language]; /*  Login */ ?></span><?php echo $translations["M01592"][$language]; /*  to your account now. */ ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php include 'sharejsDashboard.php'; ?>

<script src="js/general.js"></script>
<script>
    var payeeName = '<?php echo $_POST['payeeName']; ?>';
    var payeeEmail = '<?php echo $_POST['payeeEmail']; ?>';
    var payeeMobileNumber = '<?php echo $_POST['payeeMobileNumber']; ?>';
    var payerName = '<?php echo $_POST['payerName']; ?>';
    var payerEmail = '<?php echo $_POST['payerEmail']; ?>';
    var payerMobileNumber = '<?php echo $_POST['payerMobileNumber']; ?>';
    var payerCountryCode = '<?php echo $_POST['payerCountryCode']; ?>';
    var amount = '<?php echo $_POST['amount']; ?>';
    var paymentDescription = `<?php echo $_POST['paymentDescription']; ?>`;
    var payeeDialingArea = '<?php echo $_POST['payeeDialingArea']; ?>';
    var phoneNumber = `<?php echo $_POST['payeeMobileNumber']; ?>`;
    var url = `<?php echo $_POST['url']; ?>`;
    var newBusiness = `<?php echo $_POST['newBusiness']; ?>`;
    
    if(payerEmail==""){
        $('#payer_email').hide();
        payerType = "mobile";
    }
    if(payerMobileNumber==""){
        $('#payer_mobile').hide();
        payerType = "email";
    }
    if(payeeEmail==""){
        $('#payee_email').hide();
        payeeType = "mobile";
    }
    if(payeeMobileNumber==""){
        $('#payee_mobile').hide();
        payeeType = "email";
    }
    $("#urlInput").val(url);
    if(payerEmail==""){
        $('#payer_email').hide();
        payerType = "mobile";
    }
    if(payerMobileNumber==""){
        $('#payer_mobile').hide();
        payerType = "email";
    }
    if(payeeEmail==""){
        $('#payee_email').hide();
        payeeType = "mobile";
    }
    if(payeeMobileNumber==""){
        $('#payee_mobile').hide();
        payeeType = "email";
    }
    $("#urlInput").click(function(){
        $("#copyBtn").click();
    });

    $("#copyBtn").click(function(){
        // var text = $("#urlInput").val();

        // var $temp = $("<input>");
        // $("body").append($temp);
        // $temp.val(text).select();
        // document.execCommand("copy");
        // $temp.remove();
        // $("#inputTick").show();

        $("#urlInput").select();
        document.execCommand("copy");

        swal.fire({
			position:"center",
			type:"success",
			title:"<?php echo $translations["M00137"][$language]; /* Copied to clipboard  */?>",
			showConfirmButton:!1,
			timer:1500
		})
    });

    if (history.pushState) {
		//Chrome and modern browsers
		history.pushState(null, document.title, location.href);
		window.addEventListener('popstate', function (event) {
			$.redirect('requestFund.php');
		});
	}

    $(document).ready(function(){
        
        var notifyMessage = 'A temporary password has been sent your ';
        if (payeeType == 'email'){
            notifyMessage += `email.`;
        } else if (payeeType == 'mobile'){
            notifyMessage += `mobile number.`;
        }

        if (newBusiness == 1){
            $('#notify').find('span').html(notifyMessage);
        }
    });

    function redirectLogin(){
        $.redirect('login.php', {
            payeeEmail: payeeEmail,
            payeeMobileNumber: payeeMobileNumber,
            payeeDialingArea: payeeDialingArea,
            phoneNumber: phoneNumber
        });
    }
</script>

</body>


</html>
