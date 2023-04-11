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
                    <div class="col-lg-12">
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

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">Date Range</label>
                                                <div class="input-group input-daterange" data-date-format="dd/mm/yyyy" data-date-end-date="0d" data-date-today-highlight="true" data-date-orientation="auto">
                                                    <input id="fromDate" type="text" class="form-control" placeholder="From" dataName="transactionDate" dataType="dateRange" autocomplete="off"/>
                                                    <span class="input-group-addon">
                                                        To
                                                    </span>
                                                    <input id="toDate" type="text" class="form-control" placeholder="To" dataName="transactionDate" dataType="dateRange" autocomplete="off"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    Business Name
                                                </label>
                                                <input id="businessName" type="text" class="form-control" dataName="username" dataType="text">
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="" data-th="email">
                                                    Email
                                                </label>
                                                <input id="email" type="text" class="form-control" dataName="email" dataType="text">
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="">
                                                    Mobile Number
                                                </label>
                                                <input id="mobileNo" type="number" class="form-control" dataName="username" dataType="text">
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="">
                                                    Payment Method
                                                </label>
                                                <select id="paymentMethod" class="form-control">
                                                  <option value="">All</option>
                                                  <option value="Stripe">Stripe</option>
                                              </select>

                                          </div>

                                      </form>
                                      <!-- hidden -->
                                            <!-- <form id="adminType" role="form" style="display:none;">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="name">Admin Type</label>
                                                    <input type="text" class="form-control" value="Admin">
                                                </div>
                                            </form> -->

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

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-b-0">
                                <form>
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="alert" style="display: none;"></div>
                                            <div id="topUpHistoryListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center" style="">
                                                <ul class="pagination pagination-md" id="pagerTopUpHistoryList">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <?php include("footer.php"); ?>

        </div>
        <!-- End content-page -->


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>
    <!-- END wrapper -->

    <script>
        var resizefunc = [];

    </script>

    <script>
        var divId    = 'topUpHistoryListDiv';
        var tableId  = 'topUpHistoryListTable';
        var pagerId  = 'pagerTopUpHistoryList';
        var btnArray = Array ("view");
        var thArray  = Array('Transaction Date',
         'Invoice',
         'Business Name',
         'Email',
         'Mobile Number',
         'Top up Amount',
         'Payment Method',
         'Status'
         );
        var searchId = 'searchForm';

    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqTopUpHistory.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";  

    $(document).ready(function() {

        fCallback = loadDefaultListing;
        formData  = {command: 'adminGetTopupHistory'};
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var businessName = $("#businessName").val();
        var email = $("#email").val();
        var mobileNo = $("#mobileNo").val();
        var paymentMethod = $("#paymentMethod").val();
        var from_datetime = dateToTimestamp($("#fromDate").val());
        var to_datetime = dateToTimestamp($("#toDate").val());

        //fix date return false crashing pagination
        if(from_datetime == false){
            from_datetime = 0;
        }
        if(to_datetime == false){
            to_datetime = 0;
        }
        // var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "adminGetTopupHistory",
            page  : pageNumber,
            businessName  : businessName,
            email  : email,
            mobileNo  : mobileNo,
            paymentMethod  : paymentMethod,
            to_datetime   : to_datetime,
            from_datetime   : from_datetime
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    //load and rebuild table data arrangement//
    function loadDefaultListing(data, message) {
        // console.log(data)
        var topUpHistoryList = data.data;
        var tableNo;

        if (topUpHistoryList) {
            var newList = [];
            $.each(topUpHistoryList, function(k,v){
                if (v['billing_total'] ==""){
                   v['billing_total'] ="-"; 
                }else{
                    v['billing_total'] = "$ "+ v['billing_total']; 
                }
                var rebuildData ={
                    transactionDate : v['billing_date'],
                    invoice : v['billing_invoice'],
                    businessName : v['business_name'],
                    email : v['business_email'],
                    mobileNumber : v['mobile'],
                    topUpAmount : v['billing_total'],
                    paymentMethod : v['payment_method'],
                    status : v['billing_status']
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(topUpHistoryList) {
            $.each(topUpHistoryList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-th', v['billing_invoice']);
            });
        }

        if(topUpHistoryList) {
            $.each(topUpHistoryList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-businessID', v['business_id']);
            });
        }

        $('#'+tableId).find('tbody tr').each(function(){
            var status = $(this).find("td:eq(7)").text();
            // if (status!="" || status != null) {
            //     $(this).find("td:eq(6)").html('<span class="m-badge m-badge--success m-badge--wide">'+ status +'</span>');
            // }
            if (status=="failed") {
                $(this).find("td:eq(8)").html('');
            }
        });

        $('#'+tableId).find('tbody tr').each(function(){
           $(this).find("td:eq(5)").digits();
        });
    }

        function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');
        
        if (btnName == 'view') {
            var invoiceID = tableRow.attr('data-th');
            var businessID = tableRow.attr('data-businessID');
            $.redirect("invoice.php",{invoiceID: invoiceID,id:businessID});
        }
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
