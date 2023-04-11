<?php 
session_start();

    // Get current page name
$thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    // if(!isset ($_SESSION['access'][$thisPage]))
    //     echo '<script>window.location.href="accessDenied.php";</script>';
    // $_SESSION['lastVisited'] = $thisPage;
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<!-- Begin page -->
<div id="wrapper">
    <!-- Top Bar Start -->
    <?php include("topbar.php"); ?>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    <?php include("sidebar.php"); ?>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="row">
                        <!-- <div class="col-md-2" style="padding-bottom: 10px">
                            <button class="btn btn-default waves-effect waves-light" id="backBtn"> Back </button>
                        </div> -->
                        <div class="col-lg-12 col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            Withdrawal Confirmation
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">

                                                <div class="col-sm-12 px-0">
                                                    <div class="col-sm-8 px-0">

                                                        <div id="blogDIV">

                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-4">
                                                                    <label class="control-label" style="padding-top:7px;">Currency:</label>
                                                                </div>
                                                                <div class="col-md-6 form-group">   
                                                                    <input id="currency" type="text" class="form-control" value="<?php echo $_POST['wallet_type']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-4">
                                                                    <label class="control-label" style="padding-top:7px;">Withdrawal Amount:</label>
                                                                </div>
                                                                <div class="col-md-6 form-group"> 
                                                                    <input id="withdrawalAmount" type="text" class="form-control" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-4">
                                                                    <label class="control-label" style="padding-top:7px;">Withdraw To:</label>
                                                                </div>
                                                                <div class="col-md-8 form-group"> 
                                                                    <input id="address" type="text" class="form-control" value="<?php echo $_POST['withdrawTo']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-4">
                                                                    <label class="control-label" style="padding-top:7px;">OTP:</label>
                                                                </div>
                                                                <div class="col-md-5 form-group"> 
                                                                    <input id="otpCode" type="text" class="form-control" autocomplete="off">
                                                                </div>
                                                                <div class="col-md-2 form-group"> 
                                                                    <button type="button" id="sendOTP" class="btn btn-primary waves-effect waves-light">Sends OTP</button>
                                                                    <span id="timer" name="timer" style="padding-left: 20px;padding-top:7px;"></span>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <div>
                                                                    <p id ="didNotReceiveSms" style ="display:none" >Didn't receive the OTP? <a href="javascript:;" onclick="requestOtp()">Re-send OTP</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-12 my-4 px-0">
                                    <button type="button" id="backBtn" class="btn btn-default waves-effect waves-light" style="margin-right:10px">Back</button>                                
                                    <button type="button" id="nextWithdrawStep" class="btn btn-primary waves-effect waves-light">Confirm</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <?php include("footer.php"); ?>

    </div>
    <!-- End content-page -->
    <script>
        var resizefunc = [];

    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>


    <script>
        // Initialize the arguments for ajaxSend function
        var url = 'scripts/reqAdmin.php';
        var method = 'POST';
        var debug = 0;
        var bypassBlocking = 0;
        var bypassLoading = 0;
        var pageNumber = 1;
        var formData = "";
        var fCallback = "";
        var walletType = '<?php echo $_POST['wallet_type']; ?>';
        var withdrawTo = '<?php echo $_POST['withdrawTo']; ?>';
        var balance = '<?php echo $_POST['balance']; ?>';
        var withdrawAmount;
        $(document).ready(function() {
			$("#sendOTP").hide();
            document.getElementById("timer").innerHTML = 180;
            $("#didNotReceiveSms").hide();
            $("#timer").show();
            startTimer();

        });

        $('#nextWithdrawStep').click(function() {
            loadWithdrawal();
        });

        $('#sendOTP').click(function() {
            requestOtp();
        });
        

        function requestOtp(){
            var formData = {
            command: "requestCommissionWithdrawalOTP"
            
            };

            if (!fCallback)
                fCallback = loadRequestOTP;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function loadWithdrawal() {
            var destination_address = $("#address").val();
            var amount = $("#withdrawalAmount").val();
            var wallet_type = walletType;
            var otp_code = $("#otpCode").val();
            withdrawAmount = amount;  
            formData = {
                command: 'resellerWithdrawal',
                destination_address: destination_address,
                wallet_type: wallet_type,
                amount: amount,
                otp_code: otp_code
            };

            fCallback = loadSuccessPage;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
            
        

        }

        function loadSuccessPage(data, message){console.log(message);
            $.redirect("commissionWithdrawalSuccess.php", {
                message: message,
                withdrawTo: withdrawTo,
                wallet_type: walletType,
                withdrawAmount: withdrawAmount
            });
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

            } else if (s <= "00"){
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

        
        function loadRequestOTP(data, message){
		
            showMessage(message, 'success', '<?php echo $translations["B00332"][$language]; /*An OTP has been sent to your email %%email%%*/ ?>', 'check-circle-o', '');
            $("#sendOTP").hide();
            // if(data) {
    			document.getElementById("timer").innerHTML = 180;
    			$("#didNotReceiveSms").hide();
    			$("#timer").show();
    			startTimer();
            // } else {
            //     showMessage(message, 'danger', '', 'times-circle-o', 'settings.php');
    			
    		// }
        
	    }


        $('#backBtn').click(function() {
        $.redirect("commissionWithdrawal.php", {
                wallet_type: walletType,
                balance: balance
            });
        });
</script>
