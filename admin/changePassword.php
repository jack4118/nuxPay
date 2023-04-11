<?php 
    session_start();

//    include_once("mobileDetect.php");
//    $detect = new Mobile_Detect;
//    
    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    
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
                        <!-- <div class="col-lg-3 col-md-3 visible-xs visible-sm">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapse">
                                                <?php echo $translations['A00280'][$language]; /* Menu */ ?>
                                            </a>
                                        </h4>
                                    </div>

                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="m-b-rem1 menuActive active">
                                                <a>
                                                    <?php echo $translations['A00281'][$language]; /* Edit Profile */ ?>
                                                </a>
                                            </div>
                                            <div class="m-b-rem1 menuActive">
                                                <a>
                                                    <?php echo $translations['A00282'][$language]; /* Password Maintain */ ?>
                                                </a>
                                            </div>
                                            <div class="m-b-rem1 menuActive">
                                                <a>
                                                    <?php echo $translations['A00283'][$language]; /* Referral Diagram */ ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

						<?php 
                           
                                include 'editMemberSideBar.php';
						
                        ?>
					

                        <div class="col-lg-9 col-md-9">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                           Merchant Details
                                        </h4>
                                    </div>

                                    <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-5 col-sm-5">
                                                    <div class="m-b-rem1 col-lg-12">
                                                        <span>
                                                            Name:
														</span>
                                                        <b id="topName" class="m-l-rem1"></b>
                                                    </div>
                                                    <div class="m-b-rem1 col-lg-12">
                                                        <span>
                                                             Username:
                                                        </span>
                                                        <b id="topUsername" class="m-l-rem1"></b>
                                                    </div>
                                                    <div class="m-b-rem1 col-lg-12">
                                                        <span>
                                                            Business ID  :
                                                        </span>
                                                        <b id="topMemberID" class="m-l-rem1"></b>
                                                    </div>
                                                    <!--<div class="m-b-rem1 col-lg-12">
                                                        <span>
                                                            MT4 Account No :
                                                        </span>
                                                        <b id="quantumAcc" class="m-l-rem1"></b>
                                                    </div>-->
                                                </div>

                                              <!--   <div class="col-lg-7 col-sm-7">
                                                    <div class="m-b-rem1 p-t-rem2 col-lg-4 col-sm-4 text-center mobileBorderLess borderMobile" style="border-left: 1px solid #eeeeee;">
                                                        <span>
                                                            <?php echo $translations['A00288'][$language]; /* Unit Tier */ ?>
                                                        </span>
                                                        <h3 style="color: #059607;"><b id="topUnitTier"></b></h3>
                                                    </div>

                                                    <div class="m-b-rem1 col-lg-4 col-sm-4 text-center mobileBorderLess borderMobile" style="border-left: 1px solid #eeeeee;">
                                                        <span style="vertical-align: middle;">
                                                            <?php echo $translations['A00289'][$language]; /* Sponsor Bonus Percentage */ ?>
                                                        </span>
                                                        <h3 style="color: #059607;"><b id="topSponsorBP"></b></h3>
                                                    </div>

                                                    <div class="m-b-rem1 col-lg-4 col-sm-4 text-center mobileBorderLess" style="border-left: 1px solid #eeeeee;">
                                                        <span style="vertical-align: middle;">
                                                            <?php echo $translations['A00290'][$language]; /* Pairing Bonus Percentage */ ?>
                                                        </span>
                                                        <h3 style="color: #059607;"><b id="topPairingBP"></b></h3>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            Change Merchant Password
                                        </h4>
                                    </div>

                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <!-- Content -->
                                                <div class="col-sm-12">
<!--
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="name">
                                                            <?php echo $translations['A00117'][$language]; /* Full Name */ ?> 
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input id="fullName" type="text" class="form-control">
                                                        <span id="fullNameError" class="customError text-danger"></span>
                                                    </div>
-->
													<div class="col-sm-12 form-group">
                                                        <label class="control-label" for="" data-th="name">
                                                            New Password
                                                           
                                                        </label>
                                                        <input id="password" type="text" class="form-control">
                                                       
                                                    </div>
													

                                                <!-- <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            <?php echo $translations['A00104'][$language]; /* Disabled */ ?> 
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label><br>
                                                        <div class="radio radio-info radio-inline">
                                                            <input type="radio" id="disabledNo" name="disabled" value="0"/>
                                                            <label for="disabledNo">
                                                                <?php echo $translations['A00057'][$language]; /* No */ ?>
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <input type="radio" id="disabledYes" name="disabled" value="1"/>
                                                            <label for="disabledYes">
                                                                <?php echo $translations['A00056'][$language]; /* Yes */ ?>
                                                            </label>
                                                        </div><br>
                                                        <span id="disabledError" class="customError text-danger"></span>
                                                    </div>

                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            <?php echo $translations['A01183'][$language]; /* terminated */ ?> 
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label><br>
                                                        <div class="radio radio-info radio-inline">
                                                            <input type="radio" id="terminatedNo" name="terminated" value="0"/>
                                                            <label for="terminatedNo">
                                                                <?php echo $translations['A00057'][$language]; /* No */ ?>
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <input type="radio" id="terminatedYes" name="terminated" value="1"/>
                                                            <label for="terminatedYes">
                                                                <?php echo $translations['A00056'][$language]; /* Yes */ ?>
                                                            </label>
                                                        </div><br>
                                                        <span id="terminatedError" class="customError text-danger"></span>
                                                    </div>
                                                </div> -->
                    

                                                <div class="col-sm-12 m-t-rem1">
                                                    <div class="col-xs-12 col-sm-12">
                                                        <a id="updateBtn" type="button" class="btn btn-primary waves-effect w-md waves-light" onclick="">
                                                            Update
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End row -->
                </div> <!-- container -->
            </div> <!-- content -->

            <?php include("footer.php"); ?>
        </div><!-- End content-page -->

        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div><!-- END wrapper -->

    <script>var resizefunc = [];</script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

    <script>
        var url            = 'scripts/reqAdmin.php';
        var method         = 'POST';
        var debug          = 0;
        var bypassBlocking = 0;
        var bypassLoading  = 0;
        var pageNumber = 1;
        var businessID 	   = "<?php echo $_POST['businessID']?>";
        $(document).ready(function() {
   
            var formData  = {
                command : "adminNuxpayMerchantDetails",
                businessID : businessID
            };
            var fCallback = loadDefaultData;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#updateBtn').click(function() {
                $('.customError').text('');
                var password  = $('#password').val();
                

                var formData = {
                                    command   : "adminChangeMerchantPassword",
                                    business_id : businessID,
                                    new_password  : password

                                };
                var fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

            $('input#passport').keypress(function( e ) {
                if(e.which === 32) 
                return false;
            });

            $('#changePassword').parent().addClass('active');

            $('#backBtn').click(function() {
                $.redirect('member.php');
            });

            $('#editMerchantDetails').click(function() {
                $.redirect('editMerchantDetails.php', {businessID : businessID});
            });
            $('#changePassword').click(function() {
                $.redirect('changePassword.php', {businessID : businessID});
            });
		 	$('#withdrawalAddressListing').click(function() {
                $.redirect('withdrawalAddressListing.php', {businessID : businessID});
            });
            $('#apiCallbackURL').click(function() {
                $.redirect('apiCallbackListing.php', {businessID : businessID});
            });
            $('#apiKeyListing').click(function() {
                $.redirect('apiKeyListing.php', {businessID : businessID});
            });
    
        });

        function loadDefaultData(data, message) {

			$('#topName').text(data.name);
			$('#topMemberID').text(data.business_id);
			$('#topUsername').text(data.owner_mobile);
            
        }

        function submitCallback(data, message){
            showMessage(message, 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', 'check-circle-o', '');
		}
    </script>
</body>
</html>
