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

            <!-- Search -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
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
                                        <form id="searchUsage" role="form">

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">Date Range</label>
                                                <div class="input-group input-daterange" data-date-format="dd/mm/yyyy" data-date-end-date="0d" data-date-today-highlight="true" data-date-orientation="auto">
                                                    <input id="fromDate" type="text" class="form-control input-daterange-from" placeholder="From" dataName="transationDate" dataType="dateRange" autocomplete="off"/>
                                                    <span class="input-group-addon">
                                                        To
                                                    </span>
                                                    <input id="toDate" type="text" class="form-control input-daterange-to" placeholder="To" dataName="transactionDate" dataType="dateRange" autocomplete="off"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    Business ID
                                                </label>
                                                <input type="text" id="businessID" class="form-control" dataName="businessID" dataType="text">
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    Business Name
                                                </label>
                                                <input type="text" id="businessName" class="form-control" dataName="businessName" dataType="text">
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="" data-th="email">
                                                    Email
                                                </label>
                                                <input type="text" id="email" class="form-control" dataName="email" dataType="text">
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="">
                                                    Mobile Number
                                                </label>
                                                <input type="text" id="mobile" class="form-control" dataName="mobileNo" dataType="text">
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
                <!-- Search -->
                <div class="form-group" style="">
                    <label>Total Usage :</label>
                    <b id="totalUsage">-</b>
                </div>
                <!-- Table -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-b-0">
                           <form>
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="alert" style="display: none;"></div>
                                        <div id="usageListDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center" style="">
                                            <ul class="pagination pagination-md" id="pagerUsageList">
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

<script>
    var divId    = 'usageListDiv';
    var tableId  = 'usageListTable';
    var pagerId  = 'pagerUsageList';
    var btnArray = {};
    var thArray  = Array(
        'Business ID',
        'Business Name',
        'Email',
        'Mobile Number',
        'Usage'
        );
    var searchId = 'searchForm';

    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqUsage.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";  

    $(document).ready(function() {

        fCallback = loadDefaultListing;
        formData  = {command: 'adminGetUsageHistory'};
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        //reset to default search
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchUsage').find('input').each(function() {
               $(this).val(''); 
           });
            $('#searchUsage').find('select').each(function() {
                $(this).val('');
                $("#searchUsage")[0].reset();
            });

        });
        
                $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 
    });

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var businessID = $("#businessID").val();
        var businessName = $("#businessName").val();
        var email = $("#email").val();
        var mobile = $("#mobile").val();
        var from_datetime = dateToTimestamp($("#fromDate").val());
        var to_datetime = dateToTimestamp($("#toDate").val());
        // console.log(from_datetime);
        //fix date return false crashing pagination
        if(from_datetime == false){
            from_datetime = 0;
        }
        if(to_datetime == false){
            to_datetime = 0;
        }
        // var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "adminGetUsageHistory",
            page  : pageNumber,
            businessID  : businessID,
            email  : email,
            businessName   : businessName,
            businessID   : businessID ,
            mobile  : mobile,
            from_datetime  : from_datetime,
            to_datetime  : to_datetime

        };
            
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        // console.log (data);
        if (data.totalUsage!="") {
            $("#totalUsage").text(data.totalUsage).digits();
        }else{
            $("#totalUsage").text("-");
        }
        
        var usageList = data.data;
        var tableNo;

        if (usageList) {
            var newList = [];
            $.each(usageList, function(k,v){
       
            var rebuildData ={
                ID : v['business_id'],
                businessName : v['business_name'],
                email : v['business_email'],
                mobileNumber : v['mobile'],
                usage : v['usage']
            };
            newList.push(rebuildData);
        });
        
        }
        
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId).find('tbody tr').each(function(){
           // $(this).find('td:eq(4)').css("text-align", "right");
           $(this).find('td:eq(4)').digits();
        });
        


    }
    

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

</script>

<script>
        // Initialize date picker
        $('.input-daterange input').each(function() {
            $(this).datepicker({
                format      : 'dd/mm/yyyy',
                autoclose   : true
            });
            $(this).val('');
        });
    </script>
</body>
</html>
