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
                                                    
                                                </div>

                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            Merchant API Key
                                        </h4>
                                    </div>

                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <!-- Content -->
                                                <div id="basicwizard" class="pull-in">
                                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                                        <div id="alertMsg" class="alert" style="display: none;"></div>
                                                        <div id="apiKeyListDiv" class="table-responsive"></div>
                                                        <span id="paginateText"></span>
                                                        <div class="text-center" style="">
                                                            <ul class="pagination pagination-md" id="apiKeyListPager">
                                                            </ul>
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
        var divId    = 'apiKeyListDiv';
        var tableId  = 'apiKeyListTable';
        var pagerId  = 'apiKeyListPager';
        var btnArray = {};
        var thArray  = Array(
	        'API Key',
	        'API Key Created',
            'API Key Expire'
	    );
        var pageNumber = 1;
        var formData = "";
        var fCallback = "";
        var businessID 	   = "<?php echo $_POST['businessID']?>";

        $(document).ready(function() {
            var tableNo = '';
            
            var formData  = {
                command : "adminGetApikeyDetails",
                page: pageNumber,
                business_id : businessID
            };
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            var formData  = {
                command : "adminNuxpayMerchantDetails",
                businessID : businessID
            };
            fCallback = loadDefaultData;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            // $('input#passport').keypress(function( e ) {
            //     if(e.which === 32) 
            //     return false;
            // });

            $('#apiKeyListing').parent().addClass('active');

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
        function pagingCallBack(pageNumber, fCallback) {

            

            if (pageNumber > 1) bypassLoading = 1;

            var formData = {
                command: "adminGetApikeyDetails",
                page: pageNumber,
                business_id: businessID
                
            };


            if (!fCallback)
                fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        
        function loadDefaultListing(data, message) {
            
            var adminApiKeyList = data.apiKeyDetails;
            var tableNo;
    
            if (adminApiKeyList.length!=0) {
                var newList = [];
                $.each(adminApiKeyList, function(k, v) {
                
                    var rebuildData = {
                        apikey:                         v['apikey'],
                        created_at:                     v['created_at'],
                        apikey_expire_datetime:         v['apikey_expire_datetime']
                    };

                    newList.push(rebuildData);
                });
            }else{
                newList = "";
                $("#apiKeyListTable").empty();
                message = "No result.";

        }
            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);



    }

     
    </script>
</body>
</html>
