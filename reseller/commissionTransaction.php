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
                <button type="button" id="backBtn" class="btn btn-default waves-effect waves-light" style="margin-top:10px">Back</button>                                

                <div class="row">
                    <div class="col-xs-12 page-title">
                        Commission / USDT Transaction History
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <label class="mx-5" style="font-size:16px">Balance:</label>
                            <span><?php echo $_POST['balance']; ?></span>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
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

                                            <!-- <div class="col-md-4 form-group" style="height: 62px;">
                                                <label class="control-label">Date Range</label>
                                                <div class="input-group input-daterange" id="m_datepicker_5">
                                                    <input id="fromDate" type="text" class="form-control input-daterange-from" placeholder="From" dataName="transationDate" dataType="dateRange" autocomplete="off" name="start" />
                                                    <span class="input-group-addon">
                                                        To
                                                    </span>
                                                    <input id="toDate" type="text" class="form-control input-daterange-to" placeholder="To" dataName="transactionDate" dataType="dateRange" autocomplete="off" name="end" />
                                                </div>
                                            </div> -->
                                            
                                        <!-- </form> -->
                                        <!-- hidden -->

                                        <!-- <div class="col-sm-12 m-t-rem1">
                                            <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                Search
                                            </button>
                                            <button id="resetBtn" type="submit" class="btn btn-default waves-effect waves-light">
                                                Reset
                                            </button>
                                        </div> -->
                                    <!-- </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="row">
                    <div class="col-xs-12" style ="margin: 10px">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="dashboardTitle">Transaction Summary</h4>
                            </div>
                            <div class="col-md-12 dashboardBox" id="transSummary" style = "margin-top:10px">
                                <div class="p-b-0">
                                    <form>
                                        <div id="basicwizard" class="pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                <div id="alertMsg" class="alert" style="display: none;"></div>
                                                <div id="transactionSummaryDiv" class="table-responsive"></div>

                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
                            <div class="col-md-12 dashboardBox" id="summaryEmpty" style = "margin-top:10px">
                                <div class="p-b-0">
                                    <form>
                                        <div id="basicwizard" class="pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                <div id="alertMsg" class="alert" style="display: none;"></div>
                                                <div id="transactionSummaryEmpty" class="table-responsive">
                                                    <table class="table table-striped table-bordered no-footer m-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Currency</th>
                                                                <th>Total Amount</th>
                                                                <th>Number of Transaction</th>
                                                                <tbody>
                                                                    <tr >
                                                                        <td style="text-align: left" colspan= "3">No Result</td>
                                                                    </tr>
                                                                </tbody>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
                            <div class="col-md-12 dashboardBox" id="transStatus">
                                <div class="p-b-0">
                                    <form>
                                        <div id="basicwizard" class="pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                <div id="alertMsg" class="alert" style="display: none;"></div>
                                                <div id="transactionStatusDiv" class="table-responsive"></div>

                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
                            
                        </div>
                    </div>

                </div> -->

                <!-- Table -->
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <div class="p-b-0">
                            <form>
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="alert" style="display: none;"></div>
                                        <div id="commissionTransactionDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center" style="">
                                            <ul class="pagination pagination-md" id="pagerCommissionTransaction">
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

        <?php include("footer.php"); ?>

    </div>

</div>

<script>
    var resizefunc = [];

</script>
<?php include("shareJs.php"); ?>

</body>

</html>

<script>
    var divId = 'commissionTransactionDiv';
    var tableId = 'commissionTransactionTable';
    var pagerId = 'pagerCommissionTransaction';
    var btnArray = {};
    var thArray = Array(
        'Date, Time',
        'Transaction Type',
        'In',
        'Out',
        
    );
    var searchId = 'searchForm';

    // Initialize the arguments for ajaxSend function
    var url = 'scripts/reqAdmin.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var page_size;
    var formData = "";
    var fCallback = "";
    var businessID, businessName, email, country, phoneNo, address, destinationAddress, senderAddress;
    var tableNo;
    var dropdownFake;
    var $wallet_type = "<?php echo $_POST['wallet_type']; ?>";

    $(document).ready(function() {
        // $('#fromDate').daterangepicker({
        //     autoApply: true,
        //     autoUpdateInput: false,
        //     locale: {
        //         format: 'YYYY/MM/DD'
        //     }
        // }, function(start, end, label) {
        //     $("#fromDate").val(start.format('YYYY/MM/DD'));
        //     $("#toDate").val(end.format('YYYY/MM/DD'));
        // });
        // $('#toDate').click(function() {
        //     $('#fromDate').trigger('click');
        // });
        // $('input[name="start"]').on('apply.daterangepicker', function(ev, picker) {
        //     $('#fromDate').val(picker.startDate.format('YYYY/MM/DD'));
        //     $('#toDate').val(picker.endDate.format('YYYY/MM/DD'));
        // });
        pagingCallBack(pageNumber, "");

            // var formData  = {
            //     command: 'getCommissionTransactionHistory',
            //     wallet_type: $wallet_type,
            // };
            // fCallback = loadDefaultListing;
            // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // $('#resetBtn').click(function() {
        //     $('#alertMsg').removeClass('alert-success').html('').hide();
        //     $('#searchForm').find('input').each(function() {
        //         $(this).val('');
        //     });
        //     $('#searchForm').find('select').each(function() {
        //         $(this).val('');
        //         $("#searchForm")[0].reset();
        //     });

        // });

        // $('#searchBtn').click(function() {
        //     pagingCallBack(pageNumber, loadSearch);
        // });
    });

    function pagingCallBack(pageNumber, fCallback) {

        if (pageNumber > 1) bypassLoading = 1;
        
        var formData = {
            command: "getCommissionTransactionHistory",
            wallet_type: $wallet_type,
            page: pageNumber
        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    }
    
    $('#backBtn').click(function() {
            $.redirect("commissionListing.php", {
                
            });
            
    });

    function loadDefaultListing(data, message) {
        var freezeList = data.commissionTransactions;
        var tableNo;
        
        if (freezeList.length!=0) {
                var newList = [];
                $.each(freezeList, function(k, v) {

                    var rebuildData = {
                        date: v['created_at'],
                        transaction_type: v['transaction_type'],
                        in: v['in_amount'],
                        out: v['out_amount'],
                        
                    };
                    newList.push(rebuildData);
                });

            // buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            // pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        }else {
                newList = "";
                message = "No result.";
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }

    // function tableBtnClick(btnId) {
    //     var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
    //     var tableRow = $('#' + btnId).parent('td').parent('tr');
    //     var tableId = $('#' + btnId).closest('table');


    //     if (btnName == 'view') {
    //         var businessID = tableRow.attr('data-th');
    //         $.redirect("transactionHistoryDetails.php", {
    //             hashCode: businessID
    //         });
    //     }
    // }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    // function getWalletType(data, message){
    // 	if(data.wallet_types && dropdownFake !=1) {
    //         $('#coinType').empty();
    //         $('#coinType').append('<option value="">All</option>');
    //         $.each(data.wallet_types, function(key, val) {
    //             $('#coinType').append('<option value="'+ val+'">'+ val +'</option>');
    //         });
	// 		dropdownFake = 1;
    //     }
    // }

</script>
