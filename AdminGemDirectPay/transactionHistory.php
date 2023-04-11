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
                        Transaction History
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
                                            <div class="col-md-4 form-group">
                                                <label class="control-label">
                                                    Business ID
                                                </label>
                                                <input id="businessID" type="text" class="form-control" dataName="name" dataType="text">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label class="control-label">
                                                    Business Name
                                                </label>
                                                <input id="businessName" type="text" class="form-control" dataName="username" dataType="text">
                                            </div>
                                            <!-- <div class="col-md-4 form-group">
                                                <label class="control-label">
                                                    Phone Number
                                                </label>
                                                <input id="phoneNumber" type="text" class="form-control" dataName="phonenumber" dataType="text">
                                            </div> -->
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" data-th="disabled">
                                                    Currency
                                                </label>
                                                <select id="coinType" class="form-control" dataname="cointype" dataType="select">
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label class="control-label" for="" data-th="email">
                                                    Tx Hash
                                                </label>
                                                <input id="hashCode" type="text" class="form-control" dataType="text">
                                            </div>
                                            <!-- <div class="col-sm-4 form-group">
                                                <label class="control-label" data-th="disabled">
                                                    Status
                                                </label>
                                                <select id="status" class="form-control" dataName="disabled" dataType="select">
                                                    <option value="">All</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="success">Success</option>
                                                    <option value="failed">Failed</option>
                                                </select>
                                            </div> -->
                                            <div class="col-md-4 form-group">
                                                <label class="control-label" for="" data-th="email">
                                                    Reseller
                                                </label>
                                                <input id="reseller" type="text" class="form-control" dataType="text">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label class="control-label" for="" data-th="email">
                                                    Distributor
                                                </label>
                                                <input id="distributor" type="text" class="form-control" dataType="text">
                                            </div>
                                            <!-- <div class="col-md-4 form-group">
                                                <label class="control-label" for="" data-th="email">
                                                    Site
                                                </label>
                                                <input id="site" type="text" class="form-control" dataType="text">
                                            </div> -->
                                            <div class="col-md-4 form-group">
                                                <label class="control-label">
                                                    Paid To
                                                </label>
                                                <input id="address" type="text" class="form-control" dataName="address" dataType="text">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label class="control-label">
                                                    Paid From
                                                </label>
                                                <input id="senderAddress" type="text" class="form-control" dataName="senderaddress" dataType="text">
                                            </div>
                                            <!-- <div class="col-md-4 form-group">
                                                <label class="control-label">
                                                    Destination Address
                                                </label>
                                                <input id="destinationAddress" type="text" class="form-control" dataName="destinationaddress" dataType="text">
                                            </div> -->
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

                <div class="row">
                    <div class="col-xs-12" style ="margin: 10px">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="dashboardTitle">Transaction Summary</h4>
                            </div>
                            <div class="col-md-12 dashboardBox" style = "margin-top:10px">
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
                            <div class="col-md-12 dashboardBox">
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
                            <!--
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <div class="dashboardBox">
                                        <div id="transactionSummary" class="row"></div>
                                    </div>
                                </div>
-->
                        </div>
                    </div>

                </div>

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
    var thArray = Array('Date Created',
        // 'Business ID',
        // 'Business Name',
        // 'Phone Number',
        'Currency',
        'Paid Amount',
        //'Amount in USD',
        // 'Miner Fees',
        // 'Commission',
        // 'Reseller',
        // 'Distributor',
        // 'Site',
        //'Status',
        'Paid To',
        
        //'Destination Address',
        'Paid From',
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
    var businessID, businessName, email, country, phoneNo, address, destinationAddress, senderAddress;
    var tableNo;
    var dropdownFake;

    $(document).ready(function() {

        $('#fromDate').daterangepicker({
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        }, function(start, end, label) {
            $("#fromDate").val(start.format('DD/MM/YYYY'));
            $("#toDate").val(end.format('DD/MM/YYYY'));
        });
        $('#toDate').click(function() {
            $('#fromDate').trigger('click');
        });
        $('input[name="start"]').on('apply.daterangepicker', function(ev, picker) {
            $('#fromDate').val(picker.startDate.format('DD/MM/YYYY'));
            $('#toDate').val(picker.endDate.format('DD/MM/YYYY'));
        });

        //        var formData  = {
        //            command: 'adminNuxpayTransactionHistoryList'
        //        };
        //        fCallback = loadDefaultListing;
        //        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        newList = "";
        message = "Please enter your search criteria.";
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);

        fCallback = getWalletType;

        formData  = {
            command: 'adminGetWalletType'
            // page: pageNumber
        };    
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
            fromDateTime = dateToTimestamp($("#fromDate").val() + " 00:00:00");
        } else {
            fromDateTime = "";
        }
        if ($("#toDate").val()) {
            toDateTime = dateToTimestamp($("#toDate").val() + " 23:59:59");
        } else {
            toDateTime = "";
        }

        businessID = $('#businessID').val();
        businessName = $('#businessName').val();
        phoneNo = $('#phoneNumber').val();
        hashCode = $('#hashCode').val();
        status = $('#status').val();
        address = $('#address').val();
        destinationAddress = $('#destinationAddress').val();
        coinType = $('#coinType').val();
        senderAddress = $('#senderAddress').val();
        reseller = $("#reseller").val();
        distributor = $("#distributor").val();
        site = $("#site").val();

        if (pageNumber > 1) bypassLoading = 1;

        var formData = {
             //command: "adminNuxpayTransactionHistoryList",
            command: "resellerNuxpayTransactionHistoryList",
            page: pageNumber,
            date_from: fromDateTime,
            date_to: toDateTime,
            business_id: businessID,
            tx_hash: hashCode,
            status: status,
            business_name: businessName,
            reseller: reseller,
            distributor: distributor,
            site: site,
            phone_no: phoneNo,
            address : address,
            dest_address: destinationAddress,
            coin_type: coinType,
            sender_address: senderAddress
        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        var freezeList = data.transaction_history_list;
        var tableNo;
        var txSummaryList = [];
        var txStatusList = [];

        if (data) {
            var buildSummary = "";
            $.each(data.transaction_summary, function(k, v) {
                //                buildSummary +=`<div class="col-xs-12 mobileMargin">
                //                                    <div class="row">
                //                                        <div class="col-lg-3 col-sm-4 col-xs-10">
                //                                            ${v['coin_name']}
                //                                        </div>
                //                                        <div class="col-xs-1">
                //                                            :
                //                                        </div>
                //                                        <div class="col-lg-8 col-sm-7 col-xs-12 totalAmountFont">
                //                                            ${formatNumber(v['total_amount'],8,1)}   
                //                                        </div>
                //                                    </div>
                //                                </div>`;
                //            });
                //
                //            $('#transactionSummary').html(buildSummary);
                var rebuildData = {
                    coin_name: v['coin_name'],
                    //total_service_fee: formatNumber(v['total_service_fee'], 8, 1) + ' ' + v['tx_fee_symbol'],
                    total_amount: formatNumber(v['total_amount'], 8, 1),
                    total_transaction: v['total_transaction'],

                };
                txSummaryList.push(rebuildData);
            });
            var rebuildData = [];
            //var thArray2 = ["Total Transaction"];
            var txStatusList = {}
            txStatusList.total_transaction = data.overall_total_transaction
            // $.each(data.total_transaction_by_status, function(k, v) {
            //     thArray2.push(k);

            //     if(k == 'Success'){
            //         txStatusList.Success = v
            //     }else if(k == 'Failed'){
            //         txStatusList.Pending = v
            //     }else if(k == 'Pending'){
            //         txStatusList.Failed = v
            //     }else if(k == 'Received'){
            //         txStatusList.Received = v
            //     }
                
            // });
            var txStatusArr = [txStatusList]

            var divId1 = 'transactionSummaryDiv';
            var tableId1 = 'transactionSummaryTable';
            var pagerId1 = '';
            var btnArray1 = {};
            var thArray1 = Array('Currency',
                //'Service Fee',
                'Total Amount',
                'Number of Transaction',
            );

            
            buildTable(txSummaryList, tableId1, divId1, thArray1, btnArray1, message, tableNo);

            var divId2 = 'transactionStatusDiv';
            var tableId2 = 'transactionStatusTable';
            var pagerId2 = '';
            var btnArray2 = {};


            //buildTable(txStatusArr, tableId2, divId2, thArray2, btnArray2, message, tableNo);

        }



        if (freezeList) {
                var newList = [];
                $.each(freezeList, function(k, v) {

                    if (v['transaction_hash'] == "" || v['transaction_hash'] == null) {
                        var transactionHash = "-";
                    } else {
                        var transactionHash = v['transaction_hash'];
                        transactionHash = transactionHash.slice(0, 6) + '...' + transactionHash.slice(-7,-1);
                    }

                    if (v['transaction_url'] == "-"){
                        var finalTHash = transactionHash;
                    } else {
                        var finalTHash = '<a href=' + v['transaction_url'] + ' target="_blank" >' + transactionHash + '</a>';
                    }
                    
                    var destinationAddress = (v['recipient_internal'] != "") ? v['recipient_internal'] : v['recipient_external'] ;
                    
                    var senderAddress = (v['sender_internal'] != "") ? v['sender_internal'] : v['sender_external'] ;

                    var rebuildData = {
                        date: v['created_at'],
                        // business_id: v['business_id'],
                        // business_name: v['business_name'],
                        // username: v['username'],
                        coin_type: v['wallet_type'],
                        amount: formatNumber(v['amount'], 8, 1) + ' ' + v['symbol'],
                        //amount_in_usd: v['amount_usd'],
                        // miner_fees: v['miner_fee'],
                        // commission: v['transaction_fee'],
                        // reseller: v['reseller'],
                        // distributor: v['distributor'],
                        //site: v['site'],
                        //status: v['status'],
                        address: v['address'],
                        senderAdd: senderAddress,
                        txHash: v['transaction_hash']
                        //destinationAdd: destinationAddress.slice(0, 4) + '...' + destinationAddress.slice(-5,-1),
                        
                    };
                    newList.push(rebuildData);
                });


        }else {
                newList = "";
                message = "No result.";
                $('#transactionSummaryTable').empty();
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(freezeList){
            $.each(freezeList, function(k, v) {
                $('#' + tableId).find('tr#' + k).attr('data-th', v['transaction_hash']);
                
                
            });
        }
     
        $('#' + tableId).find('tbody tr').each(function() {
            if ($(this).attr('data-th') == "") {
                $(this).find('td:eq(9)').html('');
            }
        });

    }

    function tableBtnClick(btnId) {
        var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#' + btnId).parent('td').parent('tr');
        var tableId = $('#' + btnId).closest('table');


        if (btnName == 'view') {
            var businessID = tableRow.attr('data-th');
            $.redirect("transactionHistoryDetails.php", {
                hashCode: businessID
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

    function getWalletType(data, message){
    	if(data.wallet_types && dropdownFake !=1) {
            $('#coinType').empty();
            $('#coinType').append('<option value="">All</option>');
            $.each(data.wallet_types, function(key, val) {
                $('#coinType').append('<option value="'+ val+'">'+ val +'</option>');
            });
			dropdownFake = 1;
        }
    }

</script>
