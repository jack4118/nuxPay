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
                    <div class="col-xs-12 page-title">
                        Daily Sales
                    </div>
                </div>

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

                                            <div class="col-md-4 form-group" style="height: 62px;">
                                                <label class="control-label">Date Range</label>
                                                <div class="input-group input-daterange" id="m_datepicker_5">
                                                    <input id="fromDate" type="text" class="form-control input-daterange-from" placeholder="From" dataName="transationDate" dataType="dateRange" autocomplete="off" name="start" />
                                                    <span class="input-group-addon">
                                                        To
                                                    </span>
                                                    <input id="toDate" type="text" class="form-control input-daterange-to" placeholder="To" dataName="transactionDate" dataType="dateRange" autocomplete="off" name="end" />
                                                </div>
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
                                        <div id="salesListingDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center" style="">
                                            <ul class="pagination pagination-md" id="pagerSalesList">
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
    var divId = 'salesListingDiv';
    var tableId = 'salesListTable';
    var pagerId = 'pagerSalesList';
    var btnArray = Array('view');
    //var btnArray = {};
    var thArray = Array(
        'Date',
        'Total Transactions',
        'Total Transacted Amount (USD)',
        'Total Sales (USD)',
        'Total Net Company Profit',
        'Total Marketer Commission',
    );
    var searchId = 'searchForm';

    // Initialize the arguments for ajaxSend function
    var url = 'scripts/reqSales.php';
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

    $(document).ready(function() {
        $('#fromDate').daterangepicker({
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'YYYY/MM/DD'
            }
        }, function(start, end, label) {
            $("#fromDate").val(start.format('YYYY/MM/DD'));
            $("#toDate").val(end.format('YYYY/MM/DD'));
        });
        $('#toDate').click(function() {
            $('#fromDate').trigger('click');
        });
        $('input[name="start"]').on('apply.daterangepicker', function(ev, picker) {
            $('#fromDate').val(picker.startDate.format('YYYY/MM/DD'));
            $('#toDate').val(picker.endDate.format('YYYY/MM/DD'));
        });
        
            var formData  = {
                command: 'getResellerSalesListing',
                pageNumber: 1,
            };
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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

    function pagingCallBack(pageNumber, fCallback) {

        if ($("#fromDate").val()) {
            fromDateTime = $("#fromDate").val() + " 00:00:00";
            fromDateTime = fromDateTime.replaceAll('/', '-');
        } else {
            fromDateTime = "";
        }
        if ($("#toDate").val()) {
            toDateTime = $("#toDate").val() + " 23:59:59";
            toDateTime = toDateTime.replaceAll('/', '-');
        } else {
            toDateTime = "";
        }


        if (pageNumber > 1) bypassLoading = 1;
        var formData = {
            command: "getResellerSalesListing",
            pageNumber: pageNumber,
            date_from: fromDateTime,
            date_to: toDateTime,
            
        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function formatNum(data){
        let curFormat = Intl.NumberFormat('en-US');
        return curFormat.format(data);
    }
    function loadDefaultListing(data, message) {
        var freezeList = data.data;
        var tableNo;
        //var tableNo = {pageNumber : data.pageNumber, numRecord : data.numRecord};
        var tdAttr = {
            0: 'class = "textLeft"',
            1: 'style = "text-align: right"',
            2: 'style = "text-align: right"',
            3: 'style = "text-align: right"',
            4: 'style = "text-align: right"',
            5: 'style = "text-align: right"',
        };

        if (freezeList) {
                var newList = [];
                $.each(freezeList, function(k, v) {
                    
                    total_transacted_amount_usd2 = v['total_transacted_amount_usd'];
                    total_transacted_amount_usd_roundoff = parseFloat(total_transacted_amount_usd2).toFixed(2);

                    total_sales_usd2 = v['total_sales_usd'];
                    total_sales_usd_roundoff = parseFloat(total_sales_usd2).toFixed(2);
                    total_net_profit = v['total_net_profit'];
                    total_net_profit_roundoff = parseFloat(total_net_profit).toFixed(2);
                    Total_Marketer_commission = v['Total_Marketer_commission'];
                    Total_Marketer_commission_roundoff = parseFloat(Total_Marketer_commission).toFixed(2);


                    var rebuildData = {
                        date: v['transaction_date'],
                        total_transaction: v['total_transaction'],
                        total_transacted_amount_usd: formatNum(total_transacted_amount_usd_roundoff),
                        total_sales_usd: formatNum(total_sales_usd_roundoff),
                        total_net_profit: formatNum(total_net_profit_roundoff),
                        Total_Marketer_commission: formatNum(Total_Marketer_commission_roundoff),
                    };
                    newList.push(rebuildData);
                });

            // buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            // pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        }else {
                newList = "";
                message = "No result.";
        }

        buildTable_data(newList, tableId, divId, thArray, btnArray, message, tableNo, tdAttr);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(freezeList){
                $.each(freezeList, function(k, v) {
                    $('#' + tableId).find('tr#' + k).attr('data-th', v['transaction_date']);
                });

            }
    }

    function tableBtnClick(btnId) {
        var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#' + btnId).parent('td').parent('tr');
        var tableId = $('#' + btnId).closest('table');


        if (btnName == 'view') {
             var transactionDate = tableRow.attr('data-th');
            $.redirect("salesReportDetails.php", {
                transactionDate: transactionDate
            });
        }
    }

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
