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
                        Commission Withdrawal History
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12" style ="margin: 10px">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label class="control-label" style="padding-top:7px;">Currency:</label>
                                    </div>
                                    <div class="col-md-4 form-group"> 
                                        <select id="walletType" class="form-control">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                    </div>

                </div>
                <!-- End row -->
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
        var divId = 'freezeListDiv';
        var tableId = 'freezeListTable';
        var pagerId = 'pagerFreezeList';
        var btnArray = {};
        var thArray = Array(
            'Date, Time',
            'Withdrawal Amount',
            'Withdrawn To',
            'Transaction Hash'
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
        var campaign_id = '<?php echo $_POST['campaign_id']; ?>';
        var wallet_type = '<?php echo $_POST['wallet_type']; ?>';
        
        $(document).ready(function() {
            
            loadDropdown(1, "");
            pagingCallBack(pageNumber, "");


        });

        $('#backBtn').click(function() {
            $.redirect("commissionListing.php", {
                
            });
            
        });

        $('#walletType').change(function() {
           pagingCallBack(pageNumber, "");
        });

        function loadDropdown(pageNumber, fCallback) {

            if (pageNumber > 1) bypassLoading = 1;

            var formData = {
                command: "getCommissionBalance"

            };

            if (!fCallback)
                fCallback = loadDropdownValue;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }


        function loadDropdownValue(data, message) {
            var dropdownVal = data;
            var walletVal = $('select#walletType').val()

            if (dropdownVal) {
                $('#walletType').empty();
                $.each(dropdownVal, function(k, v) {
                    var walletType = v['wallet_type'];
                    var balance = v['balance'];
                    $('#walletType').append('<option value="'+ v['wallet_type'] +'">'+v['wallet_type']+'</option>');
                    if(walletVal==walletType){
                        $('#walletType').val(walletType);
                        $("#balance").val(balance);
                    }
                    else{
                        $('#walletType').val(wallet_type);
                    }
                    

                    
                });


            }else {
                    
            }
        
            
        

        }

        function pagingCallBack(pageNumber, fCallback) {

            if (pageNumber > 1) bypassLoading = 1;
            var wallet = $('select#walletType').val()
            if(!wallet){
                wallet = wallet_type;
            }
            var formData = {
                command: "getCommissionWithdrawalHistory",
                wallet_type: wallet,
                page: pageNumber
            };

            if (!fCallback)
                fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
        }

        function loadDefaultListing(data, message) {
        // if(data){
            var freezeList = data.commissionWithdrawals;
            var tableNo;
            var rebuildData = [];
            // var walletVal = $('select#walletType').val()

            if (freezeList.length!=0) {
                var newList = [];
                // $('#walletType').empty();
                $.each(freezeList, function(k, v) {
                    // var walletType = v['wallet_type'];
                    // if(walletType=="tetherUSD"){
                    //     walletType = "tetherusd";
                    // }
                    // console.log(walletType);
                    // if(walletVal==walletType){
                        var rebuildData = {
                            created_at: v['created_at'],
                            amount: v['amount'],
                            recipient_address: v['recipient_address'],
                            transaction_hash: v['transaction_hash'],
                        };
                        newList.push(rebuildData);
                    // }
                    // else{

                    // }
                    

                    
                });


            }else {
                newList = "";
                message = "No result.";
            }
        
            
            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        // }else{
            
        //}
        }
    //     $('#backBtn').click(function() {
    //     $.redirect("landingPageCampaign.php", {
    //             campaign_id: campaign_id,
    //             campaign_name: campaign_name,
    //             long_url: long_url
    //         });
    // });
    
</script>
