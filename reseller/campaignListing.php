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
<div id="wrapper">
    <?php include("topbar.php"); ?>
    <?php include("sidebar.php"); ?>
    <div class="content-page">
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
                                            
                                        <div class="col-md-4 form-group">
                                                <label class="control-label">
                                                    Campaign Name
                                                </label>
                                                <input id="campaign_name" type="text" class="form-control" dataName="distributor" dataType="text">
                                            </div>
                                            
                                            <div class="col-md-4 form-group">
                                                <label class="control-label">
                                                    Long URL
                                                </label>
                                                <input id="long_url" type="text" class="form-control" dataName="distributor" dataType="text">
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

                    <div class="col-xs-12">
                        <button type="button" onclick="window.location.href='createDistributor.php'" id="1" class="btn btn-primary waves-effect waves-light">Create Distributor</button>
                    </div>
                    
                </div> -->
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <div class="p-b-0">
                            <form>
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="alert" style="display: none;"></div>
                                        <div id="campaignListDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center" style="">
                                            <ul class="pagination pagination-md" id="pagerCampaignListing">
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
    var divId = 'campaignListDiv';
    var tableId = 'campaignListTable';
    var pagerId = 'pagerCampaignListing';
    var btnArray = Array('view');
    var thArray = Array(
        'Campaign Name',
        'Long URL',
        'Total Click',
        'Created On',
        'No. of Short URL'
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
    // var businessID, businessName, page_size;
    var campaign_name, long_url, page_size;
    // var distributor = "";

    $(document).ready(function() {

        var tableNo = '';

        var formData = {
            command: 'campaignListing',
            campaign_name:   campaign_name,
            long_url:       long_url
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

        if (pageNumber > 1) bypassLoading = 1;

        campaign_name         = $('#campaign_name').val();
        long_url             = $('#long_url').val();

        var formData = {
            command: "campaignListing",
            page: pageNumber,
            campaign_name:   campaign_name,
            long_url:       long_url
        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
            var campaign_listing = data.campaignListing;
            var tableNo;
            if (campaign_listing) {
                var newList = [];
                $.each(campaign_listing, function(k, v) {

                    var rebuildData = {
                        campaign_name:       v['campaign_name'],
                        long_url:            v['long_url'],
                        total_clicks:        v['totalClicks'],
                        created_at:          v['created_at'],
                        number_short_url:    v['numbOfUrl']

                    };
                    newList.push(rebuildData);
                });
            }else{
                newList = "";
                message = "No result.";

            }

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);    

            if(campaign_listing){
                $.each(campaign_listing, function(k, v) {
                    $('#' + tableId).find('tr#' + k).attr('data-th', v['campaign_id']);
                    $('#' + tableId).find('tr#' + k).attr('data-lu', v['long_url']);
                    $('#' + tableId).find('tr#' + k).attr('data-cn', v['campaign_name']);
                });

            }
        
    }
    
    //go to landing page campaign php
    function tableBtnClick(btnId) {
        var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#' + btnId).parent('td').parent('tr');
        var tableId = $('#' + btnId).closest('table');

        if (btnName == 'view') {
            var campaign_id = tableRow.attr('data-th');
            var campaignName         = tableRow.attr('data-cn');
            var longUrl             = tableRow.attr('data-lu');
            $.redirect("landingPageCampaign.php", {
                campaign_id: campaign_id,
                campaign_name:   campaignName,
                long_url:        longUrl
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

</script>
