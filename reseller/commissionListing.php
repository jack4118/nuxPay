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
                        Commission Listing
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-xs-12" style ="margin: 10px">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="dashboardTitle">Commission</h4>
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
    var thArray = Array(
        'Currency',
        'Balance',
        '',
        '',
        ''
    );
    var searchId = 'searchForm';

    // Initialize the arguments for ajaxSend function
    var url = 'scripts/reqAdmin.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var formData = "";
    var fCallback = "";
    var businessID, businessName, email, country, phoneNo, address, destinationAddress, senderAddress;
    var tableNo;
    var dropdownFake;

    $(document).ready(function() {
        // fCallback = getWalletType;

        // formData  = {
        //     command: 'adminGetWalletType'
        //     // page: pageNumber
        // };    
        // ajaxSend('scripts/reqBusinesses.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        pagingCallBack(1, "");
    });

    function pagingCallBack(pageNumber, fCallback) {

        if (pageNumber > 1) bypassLoading = 1;

        var formData = {
            command: "getCommissionBalance"
            
        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        console.log(data);
        var freezeList = data;
        var tableNo;
        var txSummaryList = [];
        var txStatusList = [];
        var rebuildData = [];
        

        if (freezeList) {
            var newList = [];
            
            $.each(freezeList, function(k, v) {
                var walletType = v['wallet_type'];
                var balance = v['balance'];
                var viewTransaction = `<span data-wallet="`+walletType+`" data-balance="`+balance+`" class="btn btn-dashboard col-xs-12" onclick="viewTransactionFunc(this)">View Transaction</span>`;
                var withdrawButton = `<span data-wallet="`+walletType+`" data-balance="`+balance+`" class="btn btn-dashboard col-xs-12" onclick="withdrawFunc(this)">Withdraw</button>`;
                var withdrawalHistory = `<span data-wallet="`+walletType+`" class="btn btn-dashboard col-xs-12" onclick="withdrawalHistoryFunc(this)">Withdrawal History</button>`;
                var rebuildData = {
                    transaction_type: v['wallet_type'],
                    in_amount: v['balance'],
                    view_transaction: viewTransaction,
                    withdraw: withdrawButton,
                    withdrawal_history: withdrawalHistory
                };
                newList.push(rebuildData);

                
            });


        }else {
                newList = "";
                message = "No result.";
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        // pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        // if(freezeList){
        //     $.each(freezeList, function(k, v) {
        //         $('#' + tableId).find('tr#' + k).attr('data-th', v['transaction_hash']);
                
                
        //     });
        // }
     
        // $('#' + tableId).find('tbody tr').each(function() {
        //     if ($(this).attr('data-th') == "") {
        //         $(this).find('td:eq(9)').html('');
        //     }
        // });
        
        

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
    function viewTransactionFunc(elem){        
        wallet_type = $(elem).attr('data-wallet');
        balance = $(elem).attr('data-balance');
        $.redirect("commissionTransaction.php", {
            wallet_type: wallet_type,
            balance: balance
        });
    }
    function withdrawFunc(elem){
        wallet_type = $(elem).attr('data-wallet');
        balance = $(elem).attr('data-balance');
        $.redirect("commissionWithdrawal.php", {
            wallet_type: wallet_type,
            balance: balance
        });
    }
    function withdrawalHistoryFunc(elem){
        wallet_type = $(elem).attr('data-wallet');
        $.redirect("commissionWithdrawalHistory.php", {
            wallet_type: wallet_type
        });
    }
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function getWalletType(data, message){
    	console.log(data);
    }
   
</script>
