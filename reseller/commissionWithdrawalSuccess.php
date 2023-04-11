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
                                            Success Commission Withdrawal
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">

                                                <div class="col-sm-12 px-0">
                                                    <div class="col-sm-8 px-0">

                                                        <div id="blogDIV">

                                                            
                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-4">
                                                                    <label class="control-label" style="padding-top:7px;">Withdrawn Amount:</label>
                                                                </div>
                                                                <div class="col-md-8 form-group"> 
                                                                    <input id="balance" type="text" class="form-control" value="<?php echo $_POST['balance']; ?><?php echo $_POST['wallet_type']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-4">
                                                                    <label class="control-label" style="padding-top:7px;">Withdraw To:</label>
                                                                </div>
                                                                <div class="col-md-8 form-group"> 
                                                                <input id="balance" type="text" class="form-control" value="<?php echo $_POST['withdrawTo']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-12 my-4 px-0">
                                    <button type="button" id="backBtn" class="btn btn-primary waves-effect waves-light">Back</button>
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
        
        var message = '<?php echo $_POST['message']; ?>';
        var withdrawAmount = '<?php echo $_POST['withdrawAmount']; ?>';
        var wallet_type = '<?php echo $_POST['wallet_type']; ?>';
        var withdrawTo = '<?php echo $_POST['withdrawTo']; ?>';
        $(document).ready(function() {
            showMessage(message, 'success', '<?php echo $translations["B00342"][$language]; /* Your Withdrawal is processing */ ?>', 'check-circle-o', '');


        });

        

        

        
        
        $('#backBtn').click(function() {
        $.redirect("commissionListing.php", {
                
            });
    });
</script>
