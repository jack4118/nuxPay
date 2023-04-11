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
                    <div class="col-md-6" style="padding-top:10px; padding-bottom: 20px">
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
                    </div>
                    <div class="row">
                        <div class="col-xs-12" style ="margin: 10px">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="dashboardTitle">Landing Page Campaign</h4>
                                </div>
                                <div class="col-md-12 dashboardBox" id="landingPageCampaignSummary" style = "margin-top:10px">
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

                                </div>
                                <div class="col-sm-12 my-4 px-0">
                                    <button id="addCampaignBtn" class="btn btn-primary waves-effect waves-light">Create Short Url</button>
                                </div>
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
                                                    <div id="landingPageCampaignSummaryDiv" class="table-responsive"></div>

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
        var url = 'scripts/reqAdmin.php';
        var method = 'POST';
        var debug = 0;
        var bypassBlocking = 0;
        var bypassLoading = 0;
        var pageNumber = 1;
        var formData = "";
        var fCallback = "";
        var campaign_id = '<?php echo $_POST['campaign_id']; ?>';
        var campaign_name = '<?php echo $_POST['campaign_name']; ?>';
        var long_url = '<?php echo $_POST['long_url']; ?>';
        var divId = 'landingPageCampaignSummaryDiv';
        var tableNo;
        var tableId = 'landingPageCampaignSummaryTable';
        var pagerId = 'pagerLandingPageCampaignSummary';
        var btnArray = Array('view');
        var thArray = Array(
        'Short URL',
        'URL Reference Name',
        'Total Clicks',
        'Campaign Response Rate',
        'Created On'
        );

        var divId1 = 'short_url_SummaryDiv';
        var tableId1 = 'short_url_SummaryTable';
        var pagerId1 = '';
        var btnArray1 = {};
        var thArray1 = Array(
            'Total URL',
            'Total Click',
            'Top Country',
            'Top Referral',
            'Top OS',
            'Top Device',
            'Top Telco'
        );

    var searchId = 'searchForm';
    var tableRowDetails = [];
    
    $(document).ready(function() {
        $("#campaign_name").text(campaign_name);
        $("#long_url").text(long_url);
        var tableNo = '';
        var formData = {
            command: 'campaignListingDetails',
            campaign_id:   campaign_id
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


    });

    function pagingCallBack(pageNumber, fCallback) {

    if (pageNumber > 1) bypassLoading = 1;

    var formData = {
        command: "campaignListingDetails",
        page: pageNumber,
        campaign_id:   campaign_id
    };

    if (!fCallback)
        fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        var campaignListing = data.short_url_details_array;
        var shortUrlSummary = data.summary_arr;

        var tableNo;
        var shortUrlSummary_arr = [];
        var store_short_url = [];
        if (data) {
            
            if (campaignListing) {
                var newList = [];
                
                $.each(campaignListing, function(k, v) {
                    tableRowDetails.push(v);
                    var copyURL = `<img src="images/newCopyIcon.png" style="width: 23px; padding-left:5px; text-align: right;" onclick="copyShortURL(this)">`;
                    var rebuildData = {
                    short_url:                v['short_url'] + copyURL,
                    url_reference_name:       v['url_reference_name'],
                    clicks_per_url:           v['clicks_per_url'],
                    responseRate:             v['responseRate'],
                    created_at:               v['created_at']
                    };
                    store_short_url.push(v['short_url']);
                    newList.push(rebuildData);
                });
            } else{
                newList = "";
                message = "No result.";
            }

            
                $.each(shortUrlSummary, function(k, v) {
                    
                    var rebuildData = {
                            totalUrl:                  v['totalUrl'],
                            totalClicks:               v['totalClicks'],
                            topCountry:                v['topCountry'],
                            topBrowser:                v['topBrowser'],
                            topOS:                     v['topOS'],
                            topDevice:                 v['topDevice'],
                            topTelco:                  v['topTelco']
                    };

                    shortUrlSummary_arr.push(rebuildData);
                });
            
            

			buildTable(shortUrlSummary_arr, tableId1, divId1, thArray1, btnArray1, message, tableNo);

        }else{
            newList = "";
            message = "No result.";

        }

        

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);    

        if(campaignListing){

            $.each(campaignListing, function(k, v) {
                $('#' + tableId).find('tr#' + k).attr('data-th', v['short_url']);
            });

        }
    
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

    function copyShortURL(el){
        var tableRow = $(el).parent('td').parent('tr');
        var short_url = tableRow.attr('data-th');
        copyToClipboard(short_url)

    }

    function tableBtnClick(btnId) {
        var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#' + btnId).parent('td').parent('tr');
        var tableId = $('#' + btnId).closest('table');

        if (btnName == 'view') {
            // var short_url = tableRow.children().first().html();
            var short_url = tableRow.attr('data-th');
            $.redirect("landingPageCampaignDetails.php", {
                short_url: short_url,
                campaign_id: campaign_id,
                campaign_name: campaign_name,
                long_url: long_url
            });

        }
    }
    $('#addCampaignBtn').click(function() {
            $.redirect("createShortUrl.php", {
                campaign_id: campaign_id,
                campaign_name: campaign_name,
                long_url: long_url
            });
    });
    function loadEditAdminRole(data,message){

        showMessage(message, 'success', 'Edit Admin Details Successful','' , 'distributorListing.php');
    }
    $('#backBtn').click(function() {
        $.redirect("campaignListing.php");
    });

</script>
