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
                                            
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    Mobile Number
                                                </label>
                                                <input id="mobile" type="text" class="form-control" dataName="ID" dataType="text">
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    Nickname
                                                </label>
                                                <input id="nickname" type="text" class="form-control" dataName="ID" dataType="text">
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    Upline Username
                                                </label>
                                                <input id="masterDealerUsername" type="text" class="form-control" dataName="ID" dataType="text">
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    Referral Username
                                                </label>
                                                <input id="referralUsername" type="text" class="form-control" dataName="ID" dataType="text">
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
                                        <div id="appUserListDiv" class="table-responsive">
                                           
                                        </div>
                                        <span id="paginateText"></span>
                                        <div class="text-center" style="">
                                            <ul class="pagination pagination-md" id="pagerAppUserList">
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
    
    var divId    = 'appUserListDiv';
    var tableId  = 'appUserListTable';
    var pagerId  = 'pagerAppUserList';
    var btnArray = {};
    var thArray  = Array('No',
       'Account Created Date',
       'Country',
       'Mobile Number',
       'Nickname',
       'Type of User',
       'Device',
       'Wallet Created Date',
       'Upline',
       'Referral',
       'Match',
       'App Version',
       'Last Login IP'
    );

    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAppUser.php';
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
            command: 'adminGetUserList',
            // export: 1,
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

        $('#export').click(function() {

            mobile = $('#mobile').val();
            nickname = $('#nickname').val();
            masterDealerUsername = $('#masterDealerUsername').val();
            referralUsername = $('#referralUsername').val();
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

            var key  = Array (
               'id',
               'created_at',
               'country',
               'username',
               'nickname',
               'return_type',
               'device',
               'wallet_created_at',
               'master_dealer_username',
               'referrer_username',
               'match',
               'app_version',
               'last_login_ip'
            );
            
            var exportParams = {
                pageNumber             : pageNumber,
                username               : mobile,
                nickname               : nickname,
                master_dealer_username : masterDealerUsername,
                referrer_username      : referralUsername,
                account_from_datetime  : date_from,
                account_to_datetime    : date_to,
                seeAll                 : 1,
                usernameSearchType     : 'like'
            }
            
            var formData  = {
                command     : "addExcelReq",
                API         : "adminGetUserList",
                titleKey    : "data",
                params      : exportParams,
                headerAry   : thArray,
                keyAry      : key,
                fileName    : 'appUserList'
            };

            fCallback = exportToExcel;
            ajaxSend('scripts/reqUtm.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }); 
    });
    function exportToExcel(data, message,obj) {
        showMessage('Excel file has been successfully exported.', "success", "Export Excel File","", "exportExcelListing.php");
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        mobile = $('#mobile').val();
        nickname = $('#nickname').val();
        masterDealerUsername = $('#masterDealerUsername').val();
        referralUsername = $('#referralUsername').val();
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
            command     : "adminGetUserList",
            pageNumber: pageNumber,
            mobile: mobile,
            nickname: nickname,
            masterDealerUsername: masterDealerUsername,
            referralUsername: referralUsername,
            from_datetime: date_from,
            to_datetime: date_to
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        // console.log(data);
        var userList = data.data;
        var tableNo = {pageNumber : data.pageNumber, numRecord : data.numRecord};

        if(userList){
            var newList = [];
            $.each(userList, function(k,v){
                $.each(v, function(key,value){
                    if (!value) {
                        v[key]="-";
                    }
                });
               
                var rebuildData ={
                    no : v['id'],
                    created_at : v['created_at'],
                    country : v['country'],
                    username : v['username'],
                    nickname : v['nickname'],
                    return_type : v['return_type'],
                    device : v['device'],
                    wallet_created_at : v['wallet_created_at'],
                    master_dealer_username : v['master_dealer_username'],
                    referrer_username : v['referrer_username'],
                    match : v['match'],
                    app_version : v['app_version'],
                    last_login_ip : v['last_login_ip']
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }

    // function exportToExcel(data, message,obj) {
    //     console.log(data);

    //     if(data.data){
    //         var newList = [];
    //         $.each(data.data, function(k,v){
    //             $.each(v, function(key,value){
    //                 if (!value) {
    //                     v[key]="-";
    //                 }
    //             });
               
    //             newList.push(v);
    //         });
    //     }

    //     console.log(newList);
    //     $.redirect("exportExcel.php", {obj: newList});
    // }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }
</script>