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
                    <div class="col-sm-4">
                         <a href="adminGetStoryListing.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            Back
                        </a>
                    </div><!-- end col -->
                </div>

                <div class="row">

                    <?php include("storyListingSideBar.php"); ?>

                    <div class="col-xs-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                            Search
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchForm" role="form">
                                            <div class="col-md-4 form-group" style="height: 62px;">
                                                <label class="control-label">Created Date</label>
                                                <div class="input-group input-daterange" data-date-format="dd/mm/yyyy" data-date-end-date="0d" data-date-today-highlight="true" data-date-orientation="auto">
                                                    <input id="fromDate" type="text" class="form-control input-daterange-from" placeholder="From" dataName="transationDate" dataType="dateRange" autocomplete="off" />
                                                    <span class="input-group-addon">
                                                        To
                                                    </span>
                                                    <input id="toDate" type="text" class="form-control input-daterange-to" placeholder="To" dataName="transactionDate" dataType="dateRange" autocomplete="off"/>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="">
                                                    Status
                                                </label>
                                                <select id="status" class="form-control">
                                                  <option value="">Pending</option>
                                                  <option value="">Verified</option>
                                                  <option value="">Verified with changes</option>
                                                  <option value="">Reject</option>
                                                </select>
                                            </div>

                                        </form>
                                        <!-- hidden -->

                                        <div class="col-sm-12 m-t-rem1">
                                            <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                Search
                                            </button>
                                            <button id="resetBtn" type="submit" class="btn btn-default waves-effect waves-light">
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-b-0">
                            <form>
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="alert" style="display: none;"></div>
                                        <div id="appUserListDiv" class="table-responsive">
                                            <table id="appUserListTable" class="table table-striped table-bordered no-footer m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Created Date</th>
                                                        <th>Story Actvity</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr id="0" data-th="15924">
                                                        <td>2020-01-13 12:06:40</td>
                                                        <td>Example A</td>
                                                    </tr>
                                                    <tr id="1" data-th="15920">
                                                        <td>2020-01-13 11:41:48</td>
                                                        <td>Example B</td>
                                                    </tr>
                                                </tbody>
                                            </table>
    
                                        </div>
                                        <span id="paginateText"></span>
                                        <div class="text-center" style="">
                                            <ul class="pagination pagination-md" id="pagerAppUserList">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div><!-- End row -->
                <!-- Table -->

            </div> <!-- container -->

        </div> <!-- content -->

        <?php include("footer.php"); ?>

    </div>
    <!-- End content-page -->


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

</body>
</html>


<script>
    
    var divId    = 'appUserListDiv';
    var tableId  = 'appUserListTable';
    var pagerId  = 'pagerAppUserList';
    var btnArray = {};
    var thArray  = Array(
       'Created Date',
       'Story Actvity'
    );
    var searchId = 'searchForm';

    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAppUser.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var businessID = "<?php echo $_POST['dataID']; ?>";  

    $(document).ready(function() {
        // Initialize date picker
        $('.input-daterange input').each(function() {
            $(this).datepicker({
                format      : 'dd/mm/yyyy',
                autoclose   : true
            });
            $(this).val('');
        });


        // fCallback = loadDefaultListing;
        // formData  = {
        //     command: 'adminGetUserList',
        //     pageNumber: pageNumber
        // };
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        if (!businessID) {
            window.ajaxEnabled = false;
            showMessage("Business Not Found, Please try again. ", 'danger', 'Some error occured', "", 'adminGetStoryListing.php');
        }

        $('.storyDetails').click(function() {
            $.redirect("storyListingDetails.php", {dataID: businessID});
        });
        $('.storyUpdate').click(function() {
            $.redirect("storyListingUpdate.php", {dataID: businessID});
        });
        $('.storyTransaction').click(function() {
            $.redirect("storyListingTransaction.php", {dataID: businessID});
        });
        $('.storyActivity').click(function() {
            $.redirect("storyListingActivity.php", {dataID: businessID});
        });
        $('.storyComment').click(function() {
            $.redirect("storyListingComment.php", {dataID: businessID});
        });

        //reset to default search
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input').each(function() {
                $(this).val(''); 
            });
            $('#searchForm').find('select').each(function() {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 
    });

    // function pagingCallBack(pageNumber, fCallback){
    //     if(pageNumber > 1) bypassLoading = 1;

    //     mobile = $('#mobile').val();
    //     nickname = $('#nickname').val();
    //     masterDealerUsername = $('#masterDealerUsername').val();
    //     referralUsername = $('#referralUsername').val();
    //     if ($("#fromDate").val()) {
    //         date_from = dateToTimestamp($("#fromDate").val() + " 00:00:00");
    //     }else{
    //         date_from="";
    //     }
    //     if ($("#toDate").val()) {
    //         date_to = dateToTimestamp($("#toDate").val() + " 23:59:59");
    //     }else{
    //         date_to="";
    //     }

    //     var formData   = {
    //         command     : "adminGetUserList",
    //         pageNumber: pageNumber,
    //         mobile: mobile,
    //         nickname: nickname,
    //         masterDealerUsername: masterDealerUsername,
    //         referralUsername: referralUsername,
    //         from_datetime: date_from,
    //         to_datetime: date_to
    //     };

    //     if(!fCallback)
    //         fCallback = loadDefaultListing;
    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    // }
    
    // function loadDefaultListing(data, message) {
    //     // console.log(data);
    //     var userList = data.data;
    //     var tableNo = {pageNumber : data.pageNumber, numRecord : data.numRecord};

    //     if(userList){
    //         var newList = [];
    //         $.each(userList, function(k,v){
    //             $.each(v, function(key,value){
    //                 if (!value) {
    //                     v[key]="-";
    //                 }
    //             });
               
    //             var rebuildData ={
    //                 no : v['id'],
    //                 created_at : v['created_at'],
    //                 country : v['country'],
    //                 username : v['username']
    //             };
    //             newList.push(rebuildData);
    //         });
    //     }

    //     buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
    //     pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    // }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }
</script>