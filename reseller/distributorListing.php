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
                                                    Agent Username
                                                </label>
                                                <input id="distributorUsername" type="text" class="form-control" dataName="distributor" dataType="text">
                                            </div>
                                            
                                            <div class="col-md-4 form-group">
                                                <label class="control-label">
                                                    Agent Name
                                                </label>
                                                <input id="distributorName" type="text" class="form-control" dataName="distributor" dataType="text">
                                            </div>
                                            
                                            <div class="col-md-4 form-group">
                                                <label class="control-label">
                                                    Email
                                                </label>
                                                <input id="distributorEmail" type="text" class="form-control" dataName="distributor" dataType="text">
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <label class="control-label">
                                                    Mobile Number
                                                </label>
                                                <input id="distributorMobile" type="text" class="form-control" dataName="distributor" dataType="text">
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

                <div class="row">

                    <div class="col-xs-12">
                        <button type="button" onclick="window.location.href='createDistributor.php'" id="1" class="btn btn-primary waves-effect waves-light">Create Agent</button>
                    </div>
                    
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <div class="p-b-0">
                            <form>
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="alert" style="display: none;"></div>
                                        <div id="adminListDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center" style="">
                                            <ul class="pagination pagination-md" id="pagerDistributorListing">
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
    var divId = 'adminListDiv';
    var tableId = 'adminListTable';
    var pagerId = 'pagerDistributorListing';
    var btnArray = Array('edit');
    var thArray = Array(
        'Agent Username',
        'Agent Name',
        'Mobile Number',
        'Email',
        'Total Reseller',
        'Total Merchant'
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
    var distributorUsername, distributorName, distributorEmail, distributorMobile, site, page_size;
    // var distributor = "";

    $(document).ready(function() {

        var tableNo = '';

        var formData = {
            command: 'distributorListing',
            username:   distributorUsername,
            name:       distributorName,
            email:      distributorEmail,
            mobile:     distributorMobile,
            site:       site,
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

        distributorUsername         = $('#distributorUsername').val();
        distributorName             = $('#distributorName').val();
        distributorEmail            = $('#distributorEmail').val();
        distributorMobile           = $('#distributorMobile').val();
        site                        = $('#site').val();

        var formData = {
            command: "distributorListing",
            page: pageNumber,
            username:   distributorUsername,
            name:       distributorName,
            email:      distributorEmail,
            mobile:     distributorMobile,
            site:       site,

        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        
            var distributorListing = data.distributor_listing;
            var tableNo;

            if (distributorListing) {
                var newList = [];
                $.each(distributorListing, function(k, v) {

                    var rebuildData = {
                        username:        v['distributor_username'],
                        name:            v['distributor_name'],
                        mobile:          v['distributor_mobile'],
                        email:           v['distributor_email'],
                        total_reseller:  v['total_reseller'],
                        total_merch:     v['total_merch'],

                    };
                    newList.push(rebuildData);
                });
            }else{
                newList = "";
                message = "No result.";

            }

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);    

            if(distributorListing){
                $.each(distributorListing, function(k, v) {
                    $('#' + tableId).find('tr#' + k).attr('data-th', v['distributor_id']);
                });

            }
        
     }
    
     function tableBtnClick(btnId) {
        var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#' + btnId).parent('td').parent('tr');
        var tableId = $('#' + btnId).closest('table');

        if (btnName == 'edit') {
            var id = tableRow.attr('data-th');
            $.redirect("editDistributorDetails.php", {
                id: id
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
