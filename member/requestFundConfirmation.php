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
                                        <span></span>
                                    </div>
                                    <span class="d-inline-block ml-2" style="vertical-align: middle;">
                                        <?php echo $translations["M01574"][$language]; /*  Confirmation */ ?>
                                    </span>
                                </div>

                                <div class="d-block mt-5 requestConfirmationDetails grey">
                                    <table>
                                        <tr><th><?php echo $translations["M01555"][$language]; /*  Your name */ ?>:</th><td><?php echo $_POST['payee_name']; ?></td></tr>
                                        <tr id="payee_email"><th><?php echo $translations["M01512"][$language]; /*  Your email address */ ?>:</th><td><?php echo $_POST['payee_email_address']; ?></td></tr>
                                        <tr id="payee_mobile"><th><?php echo $translations["M01513"][$language]; /*Your Mobile Number*/?>:</th><td><?php echo $_POST['payee_mobile_phone']; ?></td></tr>
                                    </table>
                                </div>

                                <div class="d-block mt-4 requestConfirmationDetails">
                                    <table>
                                        <tr><th><?php echo $translations["M01557"][$language]; /*  Payer Name */ ?>:</th><td><?php echo $_POST['payer_name']; ?></td></tr>
                                        <tr id="payer_email"><th><?php echo $translations["M01575"][$language]; /*  Payer Email */ ?>:</th><td><?php echo $_POST['payer_email_address']; ?></td></tr>
                                        <tr id="payer_mobile"><th><?php echo $translations["M01563"][$language]; /*  Payer Mobile Number */ ?>:</th><td><?php echo $_POST['payer_country_code']; ?><?php echo $_POST['payer_mobile_phone']; ?></td></tr>
                                    </table>
                                </div>

                                <div class="d-block mt-4 requestConfirmationDetails grey">
                                    <table>
                                        <tr><th><?php echo $translations["M01565"][$language]; /*  Amount to pay */ ?>:</th><td id ="payAmount"><?php echo $_POST['payment_amount']; ?> </td></tr>
                                        <tr><th><?php echo $translations["M01571"][$language]; /*  Payment Description */ ?>:</th><td class="wrapText"><?php echo $_POST['payment_description']; ?></td></tr>
                                    </table>
                                </div>

                                <!--<div>
                                    <pre>
                                        <?php print_r($_POST); ?>
                                    </pre>
                                </div>-->

                                <div class="d-flex mt-5 align-items-center">
                                    <button class="btn btnDefault mr-2" id="back"><?php echo $translations["M01577"][$language]; /*  Back */ ?></button>
                                    <!-- <button class="btn btnRequest" onclick="goToInvoice()">Confirm</button> -->
                                    <button class="btn btnRequest" onclick="goToInvoice()" id="submitBtn" type="button"><?php echo $translations["M01576"][$language]; /*  Submit */ ?></button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="requestFundModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b mt-1 mb-1 pb-1 pt-1 justify-content-center">
                <div class="row m-2 p-2">
                    <div class="modalAmount col-12 text-center" id="modalAmountReceive">
                        Share Payment Link
					</div>
                </div>
                
            </div>
            <div class="modal-body requestFund border-b col-12" style="line-height: 25px; border-bottom-left-radius: .3rem; border-bottom-right-radius: .3rem; padding-bottom: 20px;">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
								<div class="col-11 mt-0 pb-3">
									<a href="javascript:;" target="_blank" id="modalURL">https://thenux.com/sh3e3393</a>
								</div>
								<div class="col-1">
									<img src="images/dashboard/newCopyIcon.png" style="width: 23px; padding-right:10px" id="modalCopyFundLink">
								</div>
                            </div>
						</div>
						<div class="col-12">
							<div class="row">
								<div class="col-4 pr-0">
									Payment No:
								</div>
								<div class="col-8" style="word-break: break-all;" id="modalPaymentId">
									#28481020
								</div>
							</div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    Name:
                                </div>
                                <div class="col-8" style="word-break: break-all;" id="modalPayerName">
                                    John Lim
                                </div>
                            </div>
                        </div>
                        <div class="col-12" id="modalPayerEmailDiv">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    Email:
                                </div>
                                <div class="col-8" style="word-break: break-all;" id="modalPayerEmail">
                                    john@gmail.com
                                </div>
                            </div>
                        </div>
                        <div class="col-12" id="modalPayerMobileDiv">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    Mobile Number:
                                </div>
                                <div class="col-8" id="modalPayerMobile">
                                    +60123638494
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    Total Amount
                                </div>
                                <div class="col-8" id="modalTotalAmount">
                                    3,999.0000000 USDT
                                </div>
                            </div>
						</div>
						<div class="col-12">
							<button onclick="runModal()" id="newRequest" class="btn newRequestBtn col-12 mt-4" type="button">New Request</button>
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
    var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var payeeType;
    var payerType;
    
    var payment_url;
    var payeeName = '<?php echo $_POST['payee_name']; ?>';
    var payeeEmail = '<?php echo $_POST['payee_email_address']; ?>';
    var payeeMobileNumber = '<?php echo $_POST['payee_mobile_phone']; ?>';
    var payerName = '<?php echo $_POST['payer_name']; ?>';
    var payerEmail = '<?php echo $_POST['payer_email_address']; ?>';
    var payerMobileNumber = '<?php echo $_POST['payer_mobile_phone']; ?>';
    var payerCountryCode = '<?php echo $_POST['payer_country_code']; ?>';
    var amount = '<?php echo $_POST['payment_amount']; ?>';
    var paymentDescription = `<?php echo $_POST['payment_description']; ?>`;
    var payeeDialingArea = '<?php echo $_POST['payeeDialingArea']; ?>';
    var phoneNumber = `<?php echo $_POST['payeeMobileNumber']; ?>`;
    var referralCode = `<?php echo $_POST['referral_code']; ?>`;
    var userCode = `<?php echo $_POST['userCode']; ?>`;
	var walletType = '<?php echo $_POST['walletType']?>';
	var symbol = '<?php echo $_POST['symbol']?>';

	$('#payAmount').text('<?php echo $_POST['payment_amount']; ?> ' + symbol);
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
    $("#back").click(function(){
        $.redirect('requestFund.php', {
            payeeName: payeeName,
            payeeEmail: payeeEmail,
            payeeMobileNumber: payeeMobileNumber,
            payerName: payerName,
            payerEmail: payerEmail,
            payerMobileNumber: payerMobileNumber,
            payerCountryCode: payerCountryCode,
            amount: amount,
            paymentDescription: paymentDescription,
            countryNumber : payeeDialingArea,
            phoneNumber : phoneNumber,
            referralCode : referralCode,
            isBack: 'yes',
            userCode: userCode
        });
    });

    $('#newRequest').click(function(){
		$('#requestFundModal').modal('hide');
	});

    function goToInvoice() {
        paymentItemList = [];	
			paymentItemList.push({
				"item_name" : paymentDescription,
				"unit_price" : amount,
				"unit_quantity" : "1"
            });
        formData = {
            command : 'requestFundConfirmation',
            currency: walletType,
            payee_name : payeeName,
            payee_email_address : payeeEmail,
            payee_mobile_phone : payeeMobileNumber,
            payer_name : payerName,
            payer_email_address : payerEmail,
            payer_dialing_area : payerCountryCode,
            payer_mobile_phone : payerMobileNumber,
            payment_amount : amount,
            payment_description : paymentDescription,
            payee_type : payeeType,
            payment_item_list : paymentItemList,
            payer_type : payerType,
            referral_code : referralCode,
            signup_type : 'requestFund',
        };

        fCallback = confirmationSuccess;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $(".btnRequest").prop('disabled', true);
        $(".btnRequest").addClass('unclickable');

        setInterval(function(){
            $(".btnRequest").prop('disabled', false);
            $(".btnRequest").removeClass('unclickable');
        },10000);
    }
    
    // function runModal(data) {
    //     payment_info = data.data;

	// 	$('#requestFundModal').modal();
	// 	$('#modalURL').html(payment_info['shorten_url']);
	// 	$('#modalURL').attr('href', payment_info['shorten_url']);
	// 	$('#modalPaymentId').html(payment_info['payment_id']);
	// 	$('#modalPayerName').html(payment_info['payer_name']);
	// 	$('#modalPayerEmail').html(payment_info['payer_email_address']);
	// 	$('#modalPayerMobile').html(payment_info['payer_mobile_phone']);
	// 	$('#modalTotalAmount').html(payment_info['total_amount'] + " " + payment_info['symbol'].toUpperCase());
	// 	$('#modalCopyFundLink').click(() =>
    //         copyToClipboard(payment_info['shorten_url'])
	// 	);

	// 	if(payerType=="mobile") {
	// 		$("#modalPayerMobileDiv").show();
	// 		$("#modalPayerEmailDiv").hide();
	// 	} else {
	// 		$("#modalPayerMobileDiv").hide();
	// 		$("#modalPayerEmailDiv").show();
	// 	}
	// }

    function confirmationSuccess(data, message) {
        payment_info = data.data;
        payment_url = payment_info.shorten_url;
        $.redirect("requestFundInvoice.php", {
            payeeName: payeeName,
            payeeEmail: payeeEmail,
            payeeMobileNumber: payeeMobileNumber,
            payeeDialingArea: payeeDialingArea,
            payerName: payerName,
            payerEmail: payerEmail,
            payerCountryCode: payerCountryCode,
            payerMobileNumber: payerMobileNumber,
            amount: amount,
            paymentDescription: paymentDescription,
            url: payment_url,
            newBusiness: payment_info['new_business'],
        });
        
        $(".btnRequest").prop('disabled', false);
        $(".btnRequest").removeClass('unclickable');
        // runModal(data);
    }

</script>

</body>


</html>
