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
                        <a href="merchantListing.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            Back
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 page-title">
                        Merchant Listing Details
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboardBox">
                            <div class="row">
                                <div class="col-xs-12" style="margin-top: 10px">
                                    <h4 class="dashboardTitle">Business Owner</h4>
                                </div>
                                <div class="col-xs-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label>Business Owner Phone Number</label>
                                        </div>
                                        <div id="ownerPhone" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label>Business Owner Email Address</label>
                                        </div>
                                        <div id="ownerEmail" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label>Business Owner Name</label>
                                        </div>
                                        <div id="ownerName" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label>Reseller</label>
                                        </div>
                                        <div id="reseller" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>
                                    </div>
                                </div>

                                <div class="col-xs-12" style="margin-top: 30px;">
                                    <h4 class="dashboardTitle">Business Profile</h4>
                                </div>
                                <div class="col-xs-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label>Business ID</label>
                                        </div>
                                        <div id="businessID" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label>Business Name</label>
                                        </div>
                                        <div id="businessName" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label>Business Website</label>
                                        </div>
                                        <div id="businessWeb" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label>Country</label>
                                        </div>
                                        <div id="country" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label>Business Phone Number</label>
                                        </div>
                                        <div id="businessPhone" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label>Company Size</label>
                                        </div>
                                        <div id="companySize" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label>Company Address</label>
                                        </div>
                                        <div id="companyAddress" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label>Created On</label>
                                        </div>
                                        <div id="date" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>
                                    </div>
                                </div>

                                <div class="col-xs-12" style="margin-top: 30px;">
                                    <h4 class="dashboardTitle">Transaction Details</h4>
                                </div>
                                <div class="col-xs-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label>Total Transactions</label>
                                        </div>
                                        <div id="totalTran" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label></label>
                                        </div>
                                        <div id="statusList" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label>Total Transacted Amount (USD)</label>
                                        </div>
                                        <div id="totalAmount" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label></label>
                                        </div>
                                        <div id="totalAmountList" class="col-sm-4 col-xs-12" style="margin-left: 10px"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label>Total Commission Contributed Amount</label>
                                        </div>
                                        <div id="totalCommi" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label></label>
                                        </div>
                                        <div id="totalCommissionList" class="col-lg-4 col-md-5 col-sm-6 col-xs-12" style="margin-left: 10px"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label>Commission %</label>
                                        </div>
                                        <div id="cPercent" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>
                                    </div>
                                </div>
<!--
                                <div class="col-xs-12" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                                            <label>Transacted Currency</label>
                                        </div>
                                        <div id="currency" class="col-lg-8 col-md-7 col-sm-6 col-xs-12"></div>
                                    </div>
                                </div>
-->


                            </div>
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
        'Name',
        'Amount Received',
        'Currency',
        'Service Charge Amount',
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
    var businessID = "<?php echo $_POST['businessID']; ?>";
    $(document).ready(function() {                

        var formData = {
            command: 'resellerNuxpayMerchantDetails',
            business_id: businessID
        };
        fCallback = loadDefaultListing;
        
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);



    });

    function loadDefaultListing(data, message) {

        if(data.reseller == "") {
            $('#reseller').text("-");
        } else {
            $('#reseller').text(data.reseller);
        }
        
        if (data.owner_mobile == "") {
            $('#ownerPhone').text("-");
        } else {
            $('#ownerPhone').text(data.owner_mobile);
        }

        if (data.owner_email == "") {
            $('#ownerEmail').text("-");
        } else {
            $('#ownerEmail').text(data.owner_email);
        }

        if (data.owner_name == "") {
            $('#ownerName').text("-");
        } else {
            $('#ownerName').text(data.owner_name);
        }

        if (data.business_id == "") {
            $('#businessID').text("-");
        } else {
            $('#businessID').text(data.business_id);
        }

        if (data.name == "") {
            $('#businessName').text("-");
        } else {
            $('#businessName').text(data.name);
        }

        if (data.website == "") {
            $('#businessWeb').text("-");
        } else {
            $('#businessWeb').text(data.website);
        }

        if (data.country == "") {
            $('#country').text("-");
        } else {
            $('#country').text(data.country);
        }

        if (data.phone_number == "") {
            $('#businessPhone').text("-");
        } else {
            $('#businessPhone').text(data.phone_number);
        }

        if (data.company_size == "") {
            $('#companySize').text("-");
        } else {
            $('#companySize').text(data.company_size);
        }

        if (data.address == "") {
            $('#companyAddress').text("-");
        } else {
            $('#companyAddress').text(data.address);
        }

        if (data.created_at == "") {
            $('#date').text("-");
        } else {
            $('#date').text(data.created_at);
        }

        if (data.total_transaction == "") {
            $('#totalTran').text("-");
        } else {
            $('#totalTran').text(data.total_transaction);
        }

        if (data.total_transaction_usd == "") {
            $('#totalAmount').text("-");
        } else {
            $('#totalAmount').text(formatNumber(data.total_transaction_usd, 2, 1) + ' USD');
        }

        if (data.total_commission == "") {
            $('#totalCommi').text("-");
        } else {
            $('#totalCommi').text(formatNumber(data.total_commission, 2, 1) + ' USD');
        }

        if (data.commission_rate == "") {
            $('#cPercent').text("-");
        } else {
            $('#cPercent').text(data.commission_rate + '%');
        }

        if (data.transacted_symbol == "" || data.transacted_symbol == null) {
            $('#currency').text("-");
        } else {
            $('#currency').text(data.transacted_symbol);
        }

        transactionByStatus = data.total_transaction_by_status
        if(transactionByStatus) {
            $listSelector = $("#statusList")
            $.each(transactionByStatus, function(i, obj) {

                $listSelector.append(`<div class="row">` +
                    obj + ' ' + i
                )

            })
        }
        

        transactionAmountPerCoin = data.total_transaction_amount_per_coin
        if(transactionAmountPerCoin) {
            $listSelector = $("#totalAmountList")
            $.each(transactionAmountPerCoin, function(i, obj) {

                $listSelector.append(`<div class="row">` +
                    obj.total_amount + ' ' + obj.symbol + ` ( ` + obj.total_amount_usd + ` USD )</div>
                                    `)

            })
        }
        

        totalCommissionPerCoin = data.total_commission_per_coin
        if(totalCommissionPerCoin) {
            $listSelector1 = $("#totalCommissionList")
            $.each(totalCommissionPerCoin, function(i, obj) {

                $listSelector1.append(`<div class="row">` +
                    obj.total_commission_amount + ' ' + obj.symbol + ` ( ` + obj.total_commission_amount_usd + ` USD )</div>
                                    `)
            })
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
