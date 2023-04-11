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

                    <div class="col-lg-12 col-md-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        Create Campaign
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">

                                        <form id="createUserForm" role="form">
                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-6 px-0">

                                                    <div id="blogDIV">

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Campaign Name</label>
                                                            <span class="text-danger">*</span>
                                                                <input id="campaign_name" type="text" class="form-control" autocomplete="off">
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Long URL</label>
                                                            <span class="text-danger">*</span>
<!--                                                                <input id="long_url" type="text" class="form-control" autocomplete="off">-->
															
															<select id="long_url" class="form-control">
															</select>
                                   
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-12 my-4 px-0">
                                <button type="button" id="addCampaignBtn" class="btn btn-primary waves-effect waves-light">Create</button>
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
		var userType = "<?php echo $_SESSION["userType"] ?>";
		var referralCode = "<?php echo $_SESSION["referralCode"]?>";
		

        $(document).ready(function() {
			if (userType == "reseller"){
				$('#long_url').val("<?php echo $config['memberSiteURL'] ?>" + "/referralcode=" + referralCode);
			}
			else if(userType == "distributor"){
				$('#long_url').val("<?php echo $config['memberSiteURL'] ?>" + "/agentcode=" + referralCode);
			}
			
			formData = {
				command: 'resellerGetCreateCampaignDetails',
				
			};

			fCallback = loadDropdown;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $("body").keyup(function (event) {
                if (event.keyCode == 13) {
                    $("#addCampaignBtn").click();
                }
            });
            
            var campaign_name;
            var long_url;

            
        });
		
		function loadDropdown(data, message){
			var dropdownVal = data.long_url_list;
            var longUrlVal = $('select#long_url').val();
          
			$('#long_url').empty();
			$.each(dropdownVal, function(k, v) {
				var url = v['url'];

				$('#long_url').append('<option value="'+ v['url'] +'">'+v['name']+'</option>');

			});
                    
		}

        $('#addCampaignBtn').click(function() {
                campaign_name = $("#campaign_name").val();
                long_url = $('#long_url').val();
			console.log('long_url');
			console.log(long_url);
                
                formData = {
                    command: 'createCampaign',
                    campaign_name: campaign_name,
                    long_url: long_url
                };
                
                fCallback = loadCreateCampaign;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        function loadCreateCampaign(data, message) {
            showMessage(message, 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', 'check-circle-o', 'campaignListing.php');
        };

</script>
