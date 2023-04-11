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
                                <span class="requestRightTitle">Request fund from your customer</span>
                                <div class="d-block mt-1">
                                    <div class="stepProgress">
                                        <span class="active"></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <span class="d-inline-block ml-2" style="vertical-align: middle;">
                                        Create Payment
                                    </span>
                                </div>

                                <div class="d-block mt-5">
                                    <div class="requestDescTitle"><span>Your Info</span></div>
                                    <div class="requestInputWrapper mt-4">
                                        <input type="text" class="form-control requestInput" id="payeeName" placeholder="Your name" value="<?php echo $_POST['payeeName']; ?>">
                                        <input type="text" class="form-control requestInput" id="payeeEmail" placeholder="Your email address" value="<?php echo $_POST['payeeEmail']; ?>">
                                        <div class="row">
                                            <div class="col-3 pr-0 dailingCodeInput align-self-end">
                                                <select name="" id="payeeDialingArea" class="selectOption form-control requestInput">
                                                    <?php include 'phoneList.php'; ?>
                                                </select>
                                            </div>
                                            <div class="col-9 pl-0">
                                                <input type="text" class="form-control requestInput" id="payeeMobileNumber" placeholder="Your mobile number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $_POST['phoneNumber']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-block mt-5">
                                    <div class="requestDescTitle"><span>Payer Info</span></div>
                                    <div class="requestInputWrapper mt-4">
                                        <input type="text" class="form-control requestInput" id="payerName" placeholder="Payer name" value="<?php echo $_POST['payerName']; ?>">
                                        <input type="text" class="form-control requestInput" id="payerEmail" placeholder="Payer email address" value="<?php echo $_POST['payerEmail']; ?>">
                                        <div class="row">
                                            <div class="col-3 pr-0 dailingCodeInput align-self-end">
                                                <select name="" id="payerDialingArea" class="selectOption form-control requestInput">
                                                    <?php include 'phoneList.php'; ?>
                                                </select>
                                            </div>
                                            <div class="col-9 pl-0">
                                                <input type="text" class="form-control requestInput" id="payerMobileNumber" placeholder="Payer mobile number" value="<?php echo $_POST['payerMobileNumber']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-block mt-5">
                                    <div class="requestDescTitle"><span>Payment Details</span></div>
                                    <div class="requestInputWrapper mt-4">
                                        <div class="requestAmountInput">
                                            <input type="text" class="form-control requestInput" id="amount" placeholder="Amount to pay" oninput="this.value = this.value.match(/^[0-9]+\.?[0-9]{0,8}/);" value="<?php echo $_POST['amount']; ?>">
                                        </div>
                                        <textarea name="" id="paymentDescription" rows="10" maxlength="1000" class="form-control requestInput"><?php echo $_POST['paymentDescription']; ?></textarea>
                                    </div>
                                </div>

                                <div class="d-block mt-4">
                                    <button onclick="goToConfirmation()" class="btn btnRequest">Next</button>
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
    var phoneNumber = "<?php echo $_POST['phoneNumber']; ?>";
    var countryNumber = "<?php echo $_POST['countryNumber']; ?>";
    var payerCountryCode = "<?php echo $_POST['payerCountryCode']; ?>";
    var countryCode     = "<?php echo $countryCode; ?>";


    $(document).ready(function(){

        if(countryNumber && countryNumber!="") {
            $("#payeeDialingArea").val(countryNumber);
            $("#payeeDialingArea").parent().val(this.value).trigger('change');
            $("#payeeMobileNumber").val(phoneNumber);
        }else{
            $('#payeeDialingArea').find('option').each(function(){
                if (countryCode != "ZZ") {
                    if ($(this).attr("data-countrycode") == countryCode) {
                        $(this).parent().val(this.value).trigger('change');
                    }
                }else{
                    if ($(this).attr("data-countrycode") == "US") {
                        $(this).parent().val(this.value).trigger('change');
                    }
                }
            });
        }

        if(payerCountryCode && payerCountryCode!="") {
            $("#payerDialingArea").val(countryNumber);
            $("#payerDialingArea").parent().val(this.value).trigger('change');
        }else{
            $('#payerDialingArea').find('option').each(function(){
                if (countryCode != "ZZ") {
                    if ($(this).attr("data-countrycode") == countryCode) {
                        $(this).parent().val(this.value).trigger('change');
                    }
                }else{
                    if ($(this).attr("data-countrycode") == "US") {
                        $(this).parent().val(this.value).trigger('change');
                    }
                }
            });
        }
        

        

        // $('#payerDialingArea').find('option').each(function(){
        //     if (countryCode && countryCode != "ZZ") {
        //         if ($(this).attr("data-countrycode") == countryCode) {
        //             $(this).parent().val(this.value).trigger('change');
        //         }
        //     }else{
        //         if ($(this).attr("data-countrycode") == "US") {
        //             $(this).parent().val(this.value).trigger('change');
        //         }
        //     }
        // });
        
        $('.selectOption').select2({
            dropdownAutoWidth : true,
            templateSelection: format,
			width: 80
        });
        
        $('#payerMobileNumber').on('input', function (event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        $('#payeeMobileNumber').on('input', function (event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    });

    function format(val) {
        return val.id;
    }

    function goToConfirmation() {
        var payeeName = $("#payeeName").val();
        var payeeEmail = $("#payeeEmail").val();
        var payeeDialingArea = $("#payeeDialingArea").val();
        var payeeMobileNumber = $("#payeeMobileNumber").val();
        var payerName = $("#payerName").val();
        var payerEmail = $("#payerEmail").val();
        var payerDialingArea = $("#payerDialingArea").val();
        var payerMobileNumber = $("#payerMobileNumber").val();
        var amount = $("#amount").val();
        var paymentDescription = $("#paymentDescription").val();

        if (payeeName == '') {
            var message = "Please enter Payee Name";
            errorOutput(message);
            return false;
        }else{
			if(/[^a-zA-Z., ]/.test(payeeName)){
				var message = "Special character or number is not allowed for Payee Name";
				errorOutput(message);
				return false;
			}
		}
        // if (payeeEmail == '') {
        //     alert("Please enter Payee Email");
        //     return false;
        // }
        if (payeeDialingArea == '') {
            var message = "Please enter Payee Dialing Area";
            errorOutput(message);
            return false;
        }
        if (payeeMobileNumber == '') {
            var message = "Please enter Payee Mobile Number";
            errorOutput(message);
            return false;
        }else{
			if(/[^0-9.+]/.test(payeeMobileNumber)){
                var message = "Only numbers and symbols are allowed for mobile number";
				errorOutput(message);
				return false;
			}
		}
        if (payerName == '') {
            var message = "Please enter Payer Name";
            errorOutput(message);
            return false;
        }else{
			if(/[^a-zA-Z., ]/.test(payerName)){
                var message = "Special character or number is not allowed for Payer Name";
				errorOutput(message);
				return false;
			}
		}
        if (payerEmail == '') {
            var message = "Please enter Payer Email";
            errorOutput(message);
            return false;
        }
        if (payerDialingArea == '') {
            var message = "Please enter Payer Dialing Area";
            errorOutput(message);
            return false;
        }
        if (payerMobileNumber == '') {
            var message = "Please enter Payer Mobile Number";
            errorOutput(message);
            return false;
        }else{
			if(/[^0-9.+]/.test(payerMobileNumber)){
                var message = "Only numbers and symbols are allowed for mobile number";
				errorOutput(message);
				return false;
			}
		}
        if (amount == '') {
            var message = "Please enter amount";
            errorOutput(message);
            return false;
        }else{
			if(/[^0-9.]/.test(amount)){
                var message = "Only numbers and symbols are allowed for amount";
				errorOutput(message);
				return false;
			}
		}

        formData = {
            command : 'requestFundVerification',
            currency: "tetherusd",
            payee_name : payeeName,
            payee_email_address : payeeEmail,
            // payeeDialingArea : payeeDialingArea,
            payee_mobile_phone : payeeDialingArea+payeeMobileNumber,
            payer_name : payerName,
            payer_email_address : payerEmail,
            // payerDialingArea : payerDialingArea,
            payer_dialing_area : payerDialingArea,
            payer_mobile_phone : payerMobileNumber,
            payment_amount : amount,
            payment_description : paymentDescription
        };
        fCallback = verifiedSuccess;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function verifiedSuccess(data, message) {
        var payeeDialingArea = $("#payeeDialingArea").val();
        var payeeMobileNumber = $("#payeeMobileNumber").val();
        var setData = data.data;
        setData['payeeDialingArea'] = payeeDialingArea;
        setData['payeeMobileNumber'] = payeeMobileNumber;

        $.redirect("requestFundConfirmation.php", setData);
        // console.log(data.data);
    }

    function errorOutput(message){
		showMessage(message, 'warning', '', 'warning', '');
	}
</script>

</body>


</html>
