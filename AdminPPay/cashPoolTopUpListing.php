<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    if(!isset ($_SESSION['access'][$thisPage]))
        echo '<script>window.location.href="accessDenied.php";</script>';
    $_SESSION['lastVisited'] = $thisPage;
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
                                                        Phone Number
                                                    </label>
                                                    <input id="phoneNumber" type="text" class="form-control" dataName="phoneNumber" dataType="text">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Business Name
                                                    </label>
                                                    <input id="businessName" type="text" class="form-control" dataName="businessName" dataType="text">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Status
                                                    </label>
                                                    <select id="status" class="form-control" dataName="domainName" dataType="text">
                                                        <option class= "" value="" href="javascript:void(0)">All</option>
                                                        <option class= "" value="Pending" href="javascript:void(0)">Pending</option>
                                                        <option class= "" value="Processing" href="javascript:void(0)">Processing</option>
                                                        <option class= "" value="Success" href="javascript:void(0)">Success</option>
                                                        <option class= "" value="Failed" href="javascript:void(0)">Failed</option>
                                                    </select>
                                                </div>
                                            </form>

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
                        <div class="col-lg-12">
                          
                                <form>
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="alert" style="display:none"></div>
                                            <div id="businessesListDiv" class="table-responsive">
                                            </div>
                                            <span id="paginateText"><!-- Showing 1 - 1 of 1 records. --></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pagerBusinessesList">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                           
                        </div>
                    </div><!-- End row -->

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
    <div class="modal fade in" id="statusModal" role="dialog" style="padding-right: 16px; background: rgba(0, 0, 0, 0.5);">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 0px;">
                <button type="button" class="close" data-dismiss="modal" id="closeIconModal">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title text-center"><i class="fa fa-3x fa-"></i><span style="">Successfully Updated</span></h4>
            </div>
            <div class="modal-body">
                <div id="canvasAlertMessage" class="alert text-center"><span id="printStatusText"></span></div>
            </div>
      <div class="modal-footer text-center" style="border-top: 0;">
        <button id="closeStatusModal" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
    </div>

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

    <script>
    var divId    = 'businessesListDiv';
    var tableId  = 'businessesListTable';
    var pagerId  = 'pagerBusinessesList';
    var btnArray = Array('view','approve','reject');
    var thArray  = Array('Created At',
                         'Business Name',
                         'Phone Number',
                         'Bank Name',
                         'Bank Account',
                         'Fiat Currency',
                         'Topup Amount',
                         'Status'
                        );
        
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var date_from, date_to;

    $(document).ready(function() {

        var fCallback = loadDefaultListing;
        formData  = {
            command: 'adminCashpoolTopupList'
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


        $('#closeStatusModal').click(function() {
            $('#statusModal').toggle();
            location.reload();
        }); 
        $('#closeIconModal').click(function() {
            $('#statusModal').toggle();
            location.reload();
        }); 
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 

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
    });

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

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
        var status   = $("#status").val();
        var mobile   = $("#phoneNumber").val();
        var businessName   = $("#businessName").val();

        var formData   = {
            command       : "adminCashpoolTopupList",
            page          : pageNumber,
            date_from     : date_from,
            date_to       : date_to,
            status        : status,
            mobile        : mobile,
            business_name : businessName 
        };
            
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {

        var cashPoolList = data.data;
        var tableNo;

        if(cashPoolList){
            var newList = [];
            $.each(cashPoolList, function(k,v){
                if (!v['created_at']){
                   v['created_at'] ="-"; 
                }
                if (!v['updated_at']){
                   v['updated_at'] ="-"; 
                }
                if (!v['bank_name']){
                   v['bank_name'] ="-"; 
                }
                if (!v['account_number']){
                   v['account_number'] ="-"; 
                }
                if (!v['fiat_currency_id']){
                   v['fiat_currency_id'] ="-"; 
                }
                if (!v['topup_amount']){
                   v['topup_amount'] ="-"; 
                }
                if (!v['status']){
                   v['status'] ="-"; 
                }

                var rebuildData ={
                    createdAt     : v['created_at'],
                    businessName  : v['business_name'],
                    mobile        : v['mobile'],
                    bankName      : v['bank_name'],
                    bankAccount   : v['account_number'],
                    fiatCurrency  : v['fiat_currency_id'],
                    topUpAmount   : v['topup_amount'],
                    status        : v['status']
                };
                newList.push(rebuildData);
            });
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(cashPoolList) {
            $.each(cashPoolList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-id', v['id']);
                $('#'+tableId).find('tr#'+k).attr('data-image', v['bankslip_url']);
                $('#'+tableId).find('tr#'+k).attr('data-status', v['status']);
            });
        }

        $('#'+tableId).find('tbody tr').each(function(k,v){
            var status = $('#'+tableId).find('tr#'+k).attr('data-status');

            if (status == 'Failed' || status == "Success") 
            {
                $(this).find("#approve"+this.id+"").hide();
                $(this).find("#reject"+this.id+"").hide();
            }
            else if (status == 'Pending')
            {
                $(this).find("td:eq(8)").html('');
            }
        });
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'approve') {
            var getDataId = tableRow.attr('data-id');
            var canvasBtnArray = Array('Approve');
            var message = 'Are you sure you want to approve this cash pool top up?';
            showMessage(message, 'warning', 'Confirmation Message', '', '', canvasBtnArray);

            $('#canvasApproveBtn').click(function() {
                var fCallback = showMessageApprove;
                formData  = {
                    command: 'adminApproveCashpoolTopup',
                    id     : getDataId,
                    status : 'success'
                };
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        }else if(btnName == 'reject'){
            var getDataId = tableRow.attr('data-id');
            var canvasBtnArray = Array('Reject');
            var message = 'Are you sure you want to reject this cash pool top up?';
            showMessage(message, 'warning', 'Confirmation Message', '', '', canvasBtnArray);

            $('#canvasRejectBtn').click(function() {
                var fCallback = showMessageDecline;
                formData  = {
                    command: 'adminApproveCashpoolTopup',
                    id     : getDataId,
                    status : 'failed'
                };
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        }
        else
        {
            var dataImage = tableRow.attr('data-image');
            var canvasBtnArray = {};

            if(dataImage == "")
            {
                var message = 'Currently user does not upload their bank slip';
                showMessage(message, 'warning', 'Bank Slip Image', '', '', canvasBtnArray);
            }
            else
            {
                var message = '<img src="'+dataImage+'" style="width: 88%;"/>';
                showMessage(message, '', 'Bank Slip Image', '', '', canvasBtnArray);
            }
        }
    }

    
    function loadSearch(data, message) {
        // console.log(data);
        if(!data){
            $('#alertMsg').addClass('alert-success').html('<span>'+message+'</span>').show();
            $('#businessesListDiv').hide();
            $('#paginateText').hide();
            $('#pagerBusinessesList').hide();
            // console.log(data, message);
        }else if(data){
            loadDefaultListing(data, message);
            $('#businessesListDiv').show();
            $('#paginateText').show();
            $('#pagerBusinessesList').show();
        }
        
        $('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);

    }

    function showMessageApprove(data, message) {
        $('#printStatusText').text('You had approved this top up cash pool');
        $('#statusModal .alert').addClass('alert-success');
        $('#statusModal').toggle();
    }
    function showMessageDecline(data, message) {
        $('#printStatusText').text('You had rejected this top up cash pool');
        $('#statusModal .alert').addClass('alert-warning');
        $('#statusModal').toggle();
    }
   
</script>

</body>
</html>
