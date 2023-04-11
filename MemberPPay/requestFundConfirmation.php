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
                                <span class="requestRightTitle">Confirmation</span>
                                <div class="d-block mt-1">
                                    <div class="stepProgress">
                                        <span class="active"></span>
                                        <span class="active"></span>
                                        <span></span>
                                    </div>
                                    <span class="d-inline-block ml-2" style="vertical-align: middle;">
                                        Confirm Your Payment Details
                                    </span>
                                </div>

                                <div class="d-block mt-5 requestConfirmationDetails grey">
                                    <table>
                                        <tr><th>Your Name:</th><td><?php echo $_POST['payee_name']; ?></td></tr>
                                        <tr><th>Your Email:</th><td><?php echo $_POST['payee_email_address']; ?></td></tr>
                                        <tr><th>Your Mobile Phone:</th><td><?php echo $_POST['payee_mobile_phone']; ?></td></tr>
                                    </table>
                                </div>

                                <div class="d-block mt-4 requestConfirmationDetails">
                                    <table>
                                        <tr><th>Payer Name:</th><td><?php echo $_POST['payer_name']; ?></td></tr>
                                        <tr><th>Payer Email:</th><td><?php echo $_POST['payer_email_address']; ?></td></tr>
                                        <tr><th>Payer Mobile Phone:</th><td><?php echo $_POST['payer_country_code']; ?><?php echo $_POST['payer_mobile_phone']; ?></td></tr>
                                    </table>
                                </div>

                                <div class="d-block mt-4 requestConfirmationDetails grey">
                                    <table>
                                        <tr><th>Amount to Pay:</th><td><?php echo $_POST['payment_amount']; ?> USDT</td></tr>
                                        <tr><th>Payment Description:</th><td class="wrapText"><?php echo $_POST['payment_description']; ?></td></tr>
                                    </table>
                                </div>

                                <!--<div>
                                    <pre>
                                        <?php print_r($_POST); ?>
                                    </pre>
                                </div>-->

                                <div class="d-flex mt-5 align-items-center">
                                    <button class="btn btnDefault mr-2" id="back">Back</button>
                                    <button class="btn btnRequest" onclick="goToInvoice()">Confirm</button>
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
    var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 1;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";

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
            phoneNumber : phoneNumber
        });
    });

    function goToInvoice() {
        formData = {
            command : 'requestFundConfirmation',
            currency: "tetherusd",
            payee_name : payeeName,
            payee_email_address : payeeEmail,
            payee_mobile_phone : payeeMobileNumber,
            payer_name : payerName,
            payer_email_address : payerEmail,
            payer_dialing_area : payerCountryCode,
            payer_mobile_phone : payerMobileNumber,
            payment_amount : amount,
            payment_description : paymentDescription
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

    function confirmationSuccess(data, message) {
        $.redirect("requestFundInvoice.php", {
            payeeName: payeeName,
            payeeEmail: payeeEmail,
            payeeMobileNumber: payeeMobileNumber,
            payerName: payerName,
            payerEmail: payerEmail,
            payerCountryCode: payerCountryCode,
            payerMobileNumber: payerMobileNumber,
            amount: amount,
            paymentDescription: paymentDescription,
            url: data.shorten_url
        });
        // console.log(data.data);
        
        $(".btnRequest").prop('disabled', false);
        $(".btnRequest").removeClass('unclickable');
    }

</script>

</body>


</html>
