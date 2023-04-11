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
                        <div class="col-md-2" style="padding-bottom: 10px">
                            <button class="btn btn-default waves-effect waves-light" id="backBtn"> Back </button>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            Create Short Url
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">

                                                <div class="col-sm-12 px-0">
                                                    <div class="col-sm-6 px-0">

                                                        <div id="blogDIV">

                                                            <div class="col-sm-12 form-group">
                                                                <label class="control-label">Reference Name</label>
                                                                <span class="text-danger">*</span>

                                                                <input id="reference_name" type="text" class="form-control" autocomplete="off">
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-12 my-4 px-0">
                                    <button type="button" id="addShortUrlBtn" class="btn btn-primary waves-effect waves-light">Create</button>
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
        var source = '<?php echo $config["companyName"];?>';
        var campaign_name = '<?php echo $_POST['campaign_name']; ?>';
        var long_url = '<?php echo $_POST['long_url']; ?>';
        
        $(document).ready(function() {
			$("body").keyup(function (event) {
				if (event.keyCode == 13) {
					$("#addShortUrlBtn").click();
				}
			});

        });

        $('#addShortUrlBtn').click(function() {
            url_reference_name = $("#reference_name").val();
                
                formData = {
                    command: 'createShortUrl',
                    url_reference_name: url_reference_name,
                    source: source,
                    campaign_id: campaign_id
                };
                
                fCallback = loadCreateShortlUrl;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        function loadCreateShortlUrl(data, message) {
            showMessage(message, 'success', '<?php echo $translations["B00331"][$language]; /* Short Url has been created successfully. */ ?>', 'check-circle-o',  ['landingPageCampaign.php', {campaign_id: campaign_id, campaign_name: "<?php echo $_POST['campaign_name'];?>", long_url: "<?php echo $_POST['long_url'];?>"}]);

//            $.redirect("landingPageCampaign.php", {
//                campaign_id: campaign_id
//            });
        };

        $('#backBtn').click(function() {
        $.redirect("landingPageCampaign.php", {
                campaign_id: campaign_id,
                campaign_name: campaign_name,
                long_url: long_url
            });
    });
</script>
