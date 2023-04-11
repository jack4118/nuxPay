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
                <!--

                <div class="row">
                    <div class="col-sm-4">
                        <a id="addBackBtn" href="news.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
                    </div> end col 
                </div>
-->

                

                <div class="row">
                <div class="col-md-2" style="padding-bottom: 10px">
                    <button class="btn btn-default waves-effect waves-light" id="backBtn"> Back </button>
                </div>
                <div class="row col-md-12">
                    <!-- <div class="col-md-6" style="padding-top:10px; padding-bottom: 20px">
                        <span>
                            Campaign Name:
                        </span>
                        <b style="padding-left: 10px" id="campaign_name"></b>
                    </div>
                    <div class="col-md-6" style="padding-top:10px; padding-bottom: 20px">
                        <span>
                            Long Url:
                        </span>
                        <b style="padding-left: 10px" id="long_url"></b>
                    </div> -->
                    <div class="row">
                        <div class="col-xs-12" style ="margin: 10px">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="dashboardTitle">Sales Details</h4>
                                </div>
                                <!-- <div class="col-md-12 dashboardBox" id="SalesReportDetailSummary" style = "margin-top:10px">
                                    <div class="p-b-0">
                                        <form>
                                            <div id="basicwizard" class="pull-in">
                                                <div class="tab-content b-0 m-b-0 p-t-0">
                                                    <div id="alertMsg" class="alert" style="display: none;"></div>
                                                    <div id="short_url_SummaryDiv" class="table-responsive"></div>

                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div> -->
                                <!-- <div class="col-sm-12 my-4 px-0">
                                    <button id="addCampaignBtn" class="btn btn-primary waves-effect waves-light">Create Short Url</button>
                                </div> -->
                                <!-- <div class="col-md-12 dashboardBox" id="summaryEmpty" style = "margin-top:10px">
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

                                </div> -->
                                <div class="col-md-12 dashboardBox" id="short_url_Summary">
                                    <div class="p-b-0">
                                        <form>
                                            <div id="basicwizard" class="pull-in">
                                                <div class="tab-content b-0 m-b-0 p-t-0">
                                                    <div id="alertMsg" class="alert" style="display: none;"></div>
                                                    <div id="SalesReportDetailSummaryDiv" class="table-responsive"></div>

                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
                </div>
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
        var url = 'scripts/reqSales.php';
        var method = 'POST';
        var debug = 0;
        var bypassBlocking = 0;
        var bypassLoading = 0;
        var pageNumber = 1;
        var formData = "";
        var fCallback = "";
        var transactionDate = '<?php echo $_POST['transactionDate']; ?>';
        var long_url = '<?php echo $_POST['long_url']; ?>';
        var divId = 'SalesReportDetailSummaryDiv';
        var tableNo;
        var tableId = 'SalesReportDetailSummaryTable';
        var pagerId = 'pagerSalesReportDetailSummary';
        var btnArray = {};
        var thArray = Array(
        'Date',
        'Name',
        'Total Transacted Amount (USD)',
        'Total Sales (USD)',
        'Total Marketer Commission',
        );

    var searchId = 'searchForm';
    var tableRowDetails = [];
    
    $(document).ready(function() {
        var tableNo = '';
        var formData = {
            command: 'saleListingDetails',
            transactionDate:   transactionDate
        };

        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function formatNum(data){
        let curFormat = Intl.NumberFormat('en-US');
        return curFormat.format(data);
    }
    function loadDefaultListing(data, message) {
        var SalesListing = data.data;
        var tableNo;
        var tdAttr = {
            0: 'class = "textLeft"',
            1: 'class = "textLeft"',
            2: 'style = "text-align: right;width:200px"',
            3: 'style = "text-align: right;width:200px"',
            4: 'style = "text-align: right;width:200px"',
        };

        if (SalesListing) {
            var newList = [];
            
            $.each(SalesListing, function(k, v) {

                    total_transacted_amount_usd2 = v['total_transacted_amount_usd'];
                    total_transacted_amount_usd_roundoff = parseFloat(total_transacted_amount_usd2).toFixed(2);

                    total_sales_usd2 = v['total_sales_usd'];
                    total_sales_usd_roundoff = parseFloat(total_sales_usd2).toFixed(2);
                    // total_net_profit = v['total_net_profit'];
                    // total_net_profit_roundoff = parseFloat(total_net_profit).toFixed(2);
                    Total_Marketer_commission = v['total_marketer'];
                    Total_Marketer_commission_roundoff = parseFloat(Total_Marketer_commission).toFixed(2);

                    var rebuildData = {
                            date: v['transaction_date'],
                            total_transaction: v['name'],
                            total_transacted_amount_usd: formatNum(total_transacted_amount_usd_roundoff),
                            total_sales_usd: formatNum(total_sales_usd_roundoff),
                            // total_net_profit: total_net_profit_roundoff,
                            Total_Marketer_commission: formatNum(Total_Marketer_commission_roundoff),
                    };
                    newList.push(rebuildData);
            });
        } else{
            newList = "";
            message = "No result.";
        }

        buildTable_data(newList, tableId, divId, thArray, btnArray, message, tableNo, tdAttr);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);    
    }

    function copyToClipboard(val){
        var dummy = document.createElement("input");
        document.body.appendChild(dummy);
        dummy.setAttribute("id", "dummy_id");
        document.getElementById("dummy_id").value=val;
        dummy.select();
        document.execCommand("copy");
        document.body.removeChild(dummy);
        swal.fire({
            position:"center",
            type:"success",
            title:"Copied to clipboard",
            showConfirmButton:!1,
            timer:1000
        })
    }

    function loadEditAdminRole(data,message){

        showMessage(message, 'success', 'Edit Admin Details Successful','' , 'distributorListing.php');
    }

    $('#backBtn').click(function() {
        $.redirect("salesReport.php");
    });

</script>
