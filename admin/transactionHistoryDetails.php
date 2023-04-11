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
                        <a href="javascript:;" onclick="backToList()" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            Back
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 page-title">
                        Transaction History Details
                    </div>
                </div>

                <div class="row dashboardBox">
                    <div class="col-xs-12">
                        Transacted Amount:<span id="transactedAmount"></span>
                    </div>
                    <div class="col-xs-12">
                        Service Fee %:<span id="serviceFeePercent"></span>
                    </div>
                    <div class="col-xs-12">
                        Service Fee:<span id="serviceFee"></span>
                    </div>
                    <div class="col-xs-12">
                        From Business:<span id="businessName"></span>
                    </div>
                    <div class="col-xs-12">
                        From Business ID:<span id="businessID"></span>
                    </div>
                    <div class="col-xs-12">
                        Status:<span id="status"></span>
                    </div>
                    <div class="col-xs-12">
                        Tx Hash:<span id="txHash"></span>
                    </div>
                    <div class="col-xs-12">
                        Address:<span id="address"></span>
                    </div>
                    <div class="col-xs-12">
                        Destination Address:<span id="destinationAddress"></span>
                    </div>
             <!--        <div class="col-xs-12">
                        Miner Fee:<span id="minerFee"></span>
                    </div>
                    <div class="col-xs-12">
                        Miner Fee Value(USD):<span id="minerFeeValue"></span>
                    </div>
                    <div class="col-xs-12">
                        Miner Fee Exchange Rate:<span id="minerFeeExchangeRate"></span>
                    </div> -->


                </div>

                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <div class="p-b-0">
                            <form>
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="alert" style="display: none;"></div>
                                        <div id="freezeListDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center" style="">
                                            <ul class="pagination pagination-md" id="pagerFreezeList">
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
    var divId = 'freezeListDiv';
    var tableId = 'freezeListTable';
    var pagerId = 'pagerFreezeList';
    var btnArray = {};
    var thArray = Array('Date Created',
        'Username',
        'Amount Received',
        'Miner Fee',
        'Miner Fee Wallet Type',
        'Miner Fee Value(USD)',
        'Recipient Type',
        'Status',
        'Tx Hash'
        );
    var searchId = 'searchForm';

    // Initialize the arguments for ajaxSend function
    var url = 'scripts/reqBusinesses.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var formData = "";
    var fCallback = "";
    var businessID, businessName, email, mobileNo, country;
    var hashCode = "<?php echo $_POST['hashCode']; ?>";

    $(document).ready(function() {

        var formData = {
            command: 'adminNuxpayTransactionHistoryDetails',
            transaction_hash: hashCode
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);



    });

    function backToList() {
        $.redirect("transactionHistory.php", {
            searchfromDate: "<?php echo $_POST['searchfromDate']; ?>",
            searchtoDate: "<?php echo $_POST['searchtoDate']; ?>",
            searchbusinessID: "<?php echo $_POST['searchbusinessID']; ?>",
            searchbusinessName: "<?php echo $_POST['searchbusinessName']; ?>",
            searchhashCode: "<?php echo $_POST['searchhashCode']; ?>",
            searchstatus: "<?php echo $_POST['searchstatus']; ?>"
        });
    }

    function pagingCallBack(pageNumber, fCallback) {

        if (pageNumber > 1) bypassLoading = 1;

        var formData = {
            command: "adminNuxpayTransactionHistoryDetails",
            page: pageNumber,
            transaction_hash: hashCode
        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        var freezeList = data.tx_data;
        var tableNo;
        $('#transactedAmount').empty().text(data.transacted_amount + data.symbol);
        $('#serviceFeePercent').empty().text(data.service_charge_rate);
        $('#serviceFee').empty().text(data.service_fee);
        $('#businessID').empty().text(data.business_id);
        $('#businessName').empty().text(data.business_name);
        $('#status').empty().text(data.status);
        $('#txHash').empty().text(data.tx_hash);
        $('#address').empty().text(data.address);
        $destinationAddress = data.recipient_internal != "" ? data.recipient_internal : data.recipient_external; 
        $('#destinationAddress').empty().text($destinationAddress);
        // $('#minerFee').empty().text(data.miner_fee);
        // $('#minerFeeWalletType').empty().text(data.miner_fee_wallet_type);
        // $('#minerFeeExchangeRate').empty().text(data.miner_fee_exchange_rate);


        if (freezeList) {
            if (freezeList) {
                var newList = [];
                $.each(freezeList, function(k, v) {

                    if (v['username'] == "" || v['username'] == null) {
                        var username = "-";
                    } else {
                        var username = v['username'];
                    }

                    if (v['nickname'] == "" || v['nickname'] == null) {
                        var realName = "-";
                    } else {
                        var realName = v['nickname'];
                    }

                    var rebuildData = {
                        date: v['created_at'],
                        username: username,
                        amount: formatNumber(v['amount'], 8, 1),
                        minerFee: v['fee'],
                        minerFeeWalletType: v['miner_fee_wallet_type'],
                        minerFeeValue: v['miner_fee_value'],
                        type: v['recipient_type'],
                        status: v['status'],
                        txHash: v['transaction_hash']
                    };
                    newList.push(rebuildData);
                });
            } else if (!freezeList) {
                newList = "";
                message = "No result.";
            }
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

</script>
