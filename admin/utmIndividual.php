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

                <?php include("utmMenuBar.php"); ?>
                
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
                                                    <input id="fromDate" type="text" class="form-control input-daterange-from" placeholder="From" dataName="transationDate" dataType="dateRange" autocomplete="off" name="start"/>
                                                    <span class="input-group-addon">
                                                        To
                                                    </span>
                                                    <input id="toDate" type="text" class="form-control input-daterange-to" placeholder="To" dataName="transactionDate" dataType="dateRange" autocomplete="off" name="end"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label class="control-label">
                                                    Device ID
                                                </label>
                                                <input id="deviceID" type="text" class="form-control" dataName="name" dataType="text" value="<?php echo $_POST['device_id']; ?>">
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <label class="control-label">
                                                    Action Type
                                                </label>
                                               <select id="actionType" class="form-control" dataName="disabled" dataType="select">
                                                    <option value="">All</option>
                                                    <!-- <option value="GoogleAds">GoogleAds</option> -->
<!--
                                                    <option value="Landing page S1">Landing page S1</option>
                                                    <option value="Landing page S2">Landing page S2</option>
-->
                                                    <option value="Check email">Check email</option>
                                                    <option value="Login page">Login page</option>
                                                    <option value="Home">Home</option>
                                                    <option value="Normal Sign Up (NuxPay account successfully registered.)">Normal Sign Up (NuxPay account successfully registered.)</option>
                                                    <option value="KOL Landing Page">KOL Landing Page</option>
												   
												   
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label class="control-label">
                                                    Domain
                                                </label>
                                                <input id="domain" type="text" class="form-control" dataName="name" dataType="text">
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

                <div align="right">
                    <a id="export" href="javascript:;" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20">
                        Export
                    </a>
                </div>

                <!-- Table -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-b-0">
                            <form>
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="alert" style="display: none;"></div>
                                        <div id="utmListDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center" style="">
                                            <ul class="pagination pagination-md" id="pagerUtmList">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div><!-- End row -->
                <!-- Table -->

            </div> <!-- container -->

        </div> <!-- content -->

        <?php include("footer.php"); ?>

    </div>
    <!-- End content-page -->


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

</body>
</html>

<script>
    var divId    = 'utmListDiv';
    var tableId  = 'utmListTable';
    var pagerId  = 'pagerUtmList';
    var btnArray = {};
    var thArray  = Array('Date Time',
       'Device ID',
       'Action Type',
       'UTM Campaign',
       'Business Name',
       'Mobile Number',
       'Email Address'
       );
    var searchId = 'searchForm';

    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqUtm.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var businessID, businessName, email, mobileNo, country, domain;
    var device_id = "<?php echo $_POST['device_id']; ?>";
    var date_from, date_to;

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
        $('input[name="start"]').on('apply.daterangepicker', function (ev, picker) {
            $('#fromDate').val(picker.startDate.format('DD/MM/YYYY'));
            $('#toDate').val(picker.endDate.format('DD/MM/YYYY'));
        });

        country = $('#country').val();
		
      	device_id = $('#deviceID').val();
        fCallback = loadDefaultListing;
        formData  = {
            command: 'utm_tracking_list',
			device_id: device_id,
        };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        //reset to default search
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

        $('#export').click(function() {

            device_id = $('#deviceID').val();
            actionType = $('#actionType').val();
            domain = $('#domain').val();
            if ($("#fromDate").val()) {
                date_from = dateToTimestamp($("#fromDate").val());
            }else{
                date_from="";
            }
            if ($("#toDate").val()) {
                date_to = dateToTimestamp($("#toDate").val());
            }else{
                date_to="";
            }
           
            var key  = Array (
               'created_at',
               'device_id',
               'action_type',
               'utm_campaign',
               'business_name',
               'mobile_number',
               'email_address'
            );

            var exportParams = {
                domain                : domain,
                action_type           : actionType,
                device_id             : device_id,
                date_from             : date_from,
                date_to               : date_to,
                pageNumber            : pageNumber,
                seeAll                : 1,
                usernameSearchType    : 'like'
            }

            var formData  = {
                command     : "addExcelReq",
                API         : "utm_tracking_list",
                titleKey    : "List",
                params      : exportParams,
                headerAry   : thArray,
                keyAry      : key,
                fileName    : 'utmIndividual'
            };

            fCallback = exportToExcel;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }); 
    });

    function exportToExcel(data, message,obj) {
        showMessage('Excel file has been successfully exported.', "success", "Export Excel File","", "exportExcelListing.php");
    }
    
    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;
        device_id = $('#deviceID').val();
        actionType = $('#actionType').val();
        domain = $('#domain').val();
        if ($("#fromDate").val()) {
            date_from = dateToTimestamp($("#fromDate").val() + " 00:00:00");
        }else{
            date_from="";
        }
        if ($("#toDate").val()) {
            date_to = dateToTimestamp($("#toDate").val() + " 23:59:59");
        }else{
            date_to="";
        }
        // var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "utm_tracking_list",
            domain : domain,
            action_type:actionType,
            device_id: device_id,
            date_from: date_from,
            date_to: date_to,
            pageNumber: pageNumber
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        // console.log(data)
        var utmList = data.List;
        var tableNo;
        
        if(utmList){
            var newList = [];
            $.each(utmList, function(k,v){

                var rebuildData ={
                    dateTime : v["created_at"],
                    deviceID : v["device_id"],
                    actionType : v["action_type"],
                    utmCampaign : v["utm_campaign"],
                    business_name : v["business_name"],
                    mobile_number : v["mobile_number"],
                    email_address : v["email_address"]
                };
                newList.push(rebuildData);
            });

        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId).find('thead tr').each(function(){
           $(this).find('th:eq(6)').addClass("urlWidth");
        });

        $('#'+tableId).find('tbody tr').each(function(){
           $(this).find('td:eq(6)').addClass("urlWidth");
        });
    }



    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }



</script>