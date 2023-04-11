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
                                            Commission Withdrawal
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">

                                                <div class="col-sm-12 px-0">
                                                    <div class="col-sm-6 px-0">

                                                        <div id="blogDIV">

                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-4">
                                                                    <label class="control-label" style="padding-top:7px;">Currency:</label>
                                                                </div>
                                                                <div class="col-md-8 form-group"> 
                                                                    <select id="walletType" class="form-control">
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-4">
                                                                    <label class="control-label" style="padding-top:7px;">Balance:</label>
                                                                </div>
                                                                <div class="col-md-8 form-group"> 
                                                                    <input id="balance" type="text" class="form-control" value="<?php echo $_POST['balance']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-4">
                                                                    <label class="control-label" style="padding-top:7px;">Withdraw To:</label>
                                                                </div>
                                                                <div class="col-md-8 form-group"> 
                                                                    <input id="address" type="text" class="form-control" autocomplete="off">
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
                                    <button type="button" id="nextWithdrawStep" class="btn btn-primary waves-effect waves-light">Next</button>
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
        var campaign_id = '<?php echo $_POST['campaign_id']; ?>';
        var wallet_type = '<?php echo $_POST['wallet_type']; ?>';
        
        $(document).ready(function() {
            
            pagingCallBack(1, "");

        });

        $('#nextWithdrawStep').click(function() {
            requestOtp();
            
        });

        $('#backBtn').click(function() {
            $.redirect("commissionListing.php", {
                
            });
            
        });

        $('#walletType').change(function() {
           pagingCallBack(1, "");
        });

        function requestOtp(){
            var formData = {
            command: "requestCommissionWithdrawalOTP"
            
            };

            if (!fCallback)
                fCallback = loadRequestOTP;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function loadRequestOTP(data, message){
            var withdrawTo = $("#address").val();
            var wallet_type = $('#walletType').val();
            var balance = $("#balance").val();
            
            showMessage(message, 'success', '<?php echo $translations["B00332"][$language]; /*An OTP has been sent to your email %%email%%*/ ?>', 'check-circle-o', ['commissionWithdrawalConfirmation.php', {withdrawTo: withdrawTo, wallet_type: wallet_type, balance: balance}]);
            
        
        }

        function pagingCallBack(pageNumber, fCallback) {

        if (pageNumber > 1) bypassLoading = 1;

        var formData = {
            command: "getCommissionBalance"
            
        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        function loadDefaultListing(data, message) {
            var freezeList = data;
            var walletVal = $('select#walletType').val()
            console.log(walletVal);

            if (freezeList) {
                $('#walletType').empty();
                $.each(freezeList, function(k, v) {
                    var walletType = v['wallet_type'];
                    var balance = v['balance'];
                    $('#walletType').append('<option value="'+ v['wallet_type'] +'">'+v['wallet_type']+'</option>');
                    if(walletVal==walletType){
                        $('#walletType').val(walletType);
                        $("#balance").val(balance);
                    }
                    else{
                        $('#walletType').val(wallet_type);
                    }
                    

                    
                });


            }else {
                    
            }
        
            
        

        }
    //     $('#backBtn').click(function() {
    //     $.redirect("landingPageCampaign.php", {
    //             campaign_id: campaign_id,
    //             campaign_name: campaign_name,
    //             long_url: long_url
    //         });
    // });
</script>
