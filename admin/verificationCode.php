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
                                                <label class="control-label" data-th="disabled">
                                                    Request/Validate Verification Code
                                                </label>
                                                <select id="type" class="form-control" dataName="disabled" dataType="select">
                                                    <option value="">All</option>
                                                    <option value="request">Request</option>
                                                    <option value="validate">Validate</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    Mobile Number
                                                </label>
                                                <input id="mobile" type="text" class="form-control" dataName="ID" dataType="text">
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <label class="control-label">
                                                    Status
                                                </label>
                                                <select id="status" class="form-control" dataName="disabled" dataType="select">
                                                    <option value="">All</option>
                                                    <option value="success">Success</option>
                                                    <option value="failed">Failed</option>
                                                </select>
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

                <!-- Table -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-b-0">
                            <form>
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="alert" style="display: none;"></div>
                                        <div id="verificationCodeDiv" class="table-responsive">
                                           
                                        </div>
                                        <span id="paginateText"></span>
                                        <div class="text-center" style="">
                                            <ul class="pagination pagination-md" id="pagerverificationCode">
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
    
    var divId    = 'verificationCodeDiv';
    var tableId  = 'verificationCodeTable';
    var pagerId  = 'pagerverificationCode';
    var btnArray = {};
    var thArray  = Array('Date Time',
       'Request/Validate Verifcation Code',
       'Mobile Number',
       'Verification Code',
       'Status',
       'Message',
       'SMS Message Content',
       'Devices',
       'OS Version',
       'Phone Model',
       'Country',
       'Type of User'
    );
    var searchId = 'searchForm';

    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqVcode.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";

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

        fCallback = loadDefaultListing;
        formData  = {
            command: 'adminGetUserVerificationCodeListing',
            pageNumber: pageNumber
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
    });
    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        mobile = $('#mobile').val();
        type = $('#type').val();
        status = $('#status').val();
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

        var formData   = {
            command     : "adminGetUserVerificationCodeListing",
            pageNumber: pageNumber,
            mobile: mobile,
            action_type: type,
            status: status,
            from_datetime: date_from,
            to_datetime: date_to
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        var vCode = data.data;
        var tableNo;

        if(vCode){
            var newList = [];
            $.each(vCode, function(k,v){
                $.each(v, function(key,value){
                    if (!value) {
                        v[key]="-";
                    }
                });
               
                var rebuildData ={
                    created_at : v['created_at'],
                    action_type : v['action_type'],
                    mobile : v['mobile'],
                    verification_code : v['verification_code'],
                    status : v['status'],
                    message : v['message'],
                    sms_message_content : v['sms_message_content'],
                    device_os : v['device_os'],
                    os_version : v['os_version'],
                    phone_model : v['phone_model'],
                    country : v['country'],
                    user_type : v['user_type']
                };
                newList.push(rebuildData);
            });
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