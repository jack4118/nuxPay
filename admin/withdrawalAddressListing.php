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
                                            Merchant Withdrawal Address
                                        </h4>
                                    </div>

                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <!-- Content -->
                                                <div class="col-sm-12">
													

                                                
                                                <div class="col-12 mt-3 px-0" id="showWithdrawalAddressListing">
                                                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                                                        <div id="alertMsg" class="alert" style="display: none;"></div>
                                                        <div class="table-responsive" id="withdrawalAddressListDiv"></div>
                                                        <div class="m-datatable__pager m-datatable--paging-loaded clearfix " style="padding-bottom: 10px">
                                                            <div class="m-datatable__pager-info">
                                                                <span class="m-datatable__pager-detail"></span>
                                                            </div>
                                                        </div>   
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
        var divId    = 'withdrawalAddressListDiv';
        var tableId  = 'withdrawalAddressListTable';
        var pagerId  = 'withdrawalAddressPager';
        var btnArray = {};
        var thArray  = Array(
	        'Currency',
	        'Withdrawal Address'
	    );
        var pageNumber = 1;
        var formData = "";
        var fCallback = "";
        var businessID 	   = "<?php echo $_POST['businessID']?>";
        $(document).ready(function() {

            var formData  = {
                command : "adminNuxpayMerchantDetails",
                businessID : businessID
            };
            var fCallback = loadDefaultData;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
            var formData  = {
                command : "adminWithdrawalAddress",
                business_id : businessID
            };
            var fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('input#passport').keypress(function( e ) {
                if(e.which === 32) 
                return false;
            });

            $('#withdrawalAddressListing').parent().addClass('active');

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

        function loadDefaultListing(data, message) {
        
            var adminWithdrawalAddressList = data.withdrawalAddress;
            var tableNo;
            var sameSymbol = [];
            var uniqueNames = [];
            if (adminWithdrawalAddressList) {
                var newList = [];
                
                $.each(adminWithdrawalAddressList, function(k, v) {
            
                    var address1 =         v['addressList'] + '';
                    var brk = address1.split(',');
                    var res = brk.join(" <br> ");
                    var rebuildData = {
                        symbol:         v['mercSymbol'],
                        address:        res
                        
                        
                     };
                    newList.push(rebuildData);
                });
            }else{
                newList = "";
                message = "No result.";

            }
                buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
                pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            

    
        }
     
    </script>
</body>
</html>
