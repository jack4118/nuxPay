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
                                            <label class="control-label" for="">
                                                Phone Number
                                            </label>
                                            <input id="phone" type="text" class="form-control" dataName="report" dataType="text">
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label" for="">
                                                Coin Type
                                            </label>
                                            <input id="coinType" type="text" class="form-control" dataName="phone" dataType="text">
                                        </div>

                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">
                                                Status
                                            </label>
                                            <select id="status" class="form-control" dataName="status" dataType="select">
                                                <option value="">All</option>
                                                <option value="pending">Pending</option>
                                                <option value="completed">Completed</option>
                                                <option value="failed">Failed</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-4 form-group">
                                            <label class="control-label" for="">
                                                Tx Hash
                                            </label>
                                            <input id="hash" type="text" class="form-control" dataName="report" dataType="text">
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
                                <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                <div id="listingDiv" class="table-responsive">

                                </div>
                                <div class="" style="margin-top: 10px">
                                    <span id="paginateText"></span>
                                </div>

                                <div class="text-center" style="margin-top: 20px">
                                    <ul class="pagination pagination-md" id="listingPager"></ul>
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

</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

<script>
    /*Table Variables Declaration*/
    var divId = 'listingDiv';
    var tableId = 'listingTable';
    var btnArray = Array("view");
    var thArray = Array(
        'Date Created',
        'From',
        'Name',
        'Service Charge',
        'Transfer Amount',
        'Coin Type',
        'Transaction Type',
        'Status',
        'Tx Hash',
    );

    /*ajaxSend Variables Declaration*/
    var url = 'scripts/reqAdmin.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var formData = "";
    var fCallback = "";

    /*Page Pagination Variables Declaration*/
    var pageNumber = 1;
    var pagerId  = 'listingPager';
    var fromDateTime, toDateTime, reportBy, mobileNumber, status, page, pageSize;

    $(document).ready(function()
    {
        formData  = {command: 'adminGetCommissionListing'};
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

         $('#resetBtn').click(function() {
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

        $('.input-daterange input').each(function() {
            $(this).datepicker('clearDates');
        });

        $("select").change( function() {
            $(this).blur();
        });
        $(document).keypress(function(event) {
            var keycode = event.keyCode || event.which;
            if(keycode == '13') {
                $( "#searchBtn" ).trigger( "click" );
            }
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
        if ($("#fromDate").val()) {
            fromDateTime = dateToTimestamp($("#fromDate").val() + " 00:00:00");
        }else{
            fromDateTime="";
        }
        if ($("#toDate").val()) {
            toDateTime = dateToTimestamp($("#toDate").val() + " 23:59:59");
        }else{
            toDateTime="";
        }
        phone      = $('#phone').val();
        coinType   = $('#coinType').val();
        status     = $('#status').val();
        hash       = $('#hash').val();

        if(pageNumber > 1) bypassLoading = 1;

        var formData   = {
            command        : "adminGetCommissionListing",
            pageNumber     : pageNumber,
            fromDateTime   : fromDateTime,
            toDateTime     : toDateTime,
            phone          : phone,
            coinType       : coinType,
            status         : status,
            hash           : hash,
            pageSize       : pageSize
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
            var list = data.data;
            var tableNo;

            if(!jQuery.isEmptyObject(list))
            {
                var newList = [];


                $.each(list, function(k,v){
                  $.each(v, function(key,value){
                      if (!value) {
                          v[key]="-";
                      }
                  });

                    var rebuildData ={
                      // no : v['id'],
                      dateCreated : v['created_at'],
                      from : v['username'],
                      name : v['name'],
                      amount : formatNumber(v['amount'],8,1),
                      transferAmount : formatNumber(v['ori_tx_amount'],8,1),
                      coinType : v['wallet_type'],
                      transactionType : v['service_charge_type'],
                      status : v['status'],
                      Hash : v['transaction_hash']

                    };

                    newList.push(rebuildData);
                });
            }
            var tableNo;
            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('#'+tableId).find('thead tr').each(function(){
                $(this).find('th:eq(0)').addClass('customTdStyle');
                $(this).find('th:eq(3)').css('text-align', "center");
                $(this).find('th:eq(4)').css('text-align', "center");
            });

            $('#'+tableId).find('tbody tr').each(function(){
                $(this).find('td:eq(3)').css('text-align', "right");
                $(this).find('td:eq(3)').addClass('customTdStyle');
                $(this).find('td:eq(4)').css('text-align', "right");
                $(this).find('td:eq(4)').addClass('customTdStyle');
            });

            if(!jQuery.isEmptyObject(list))
            {
                $.each(data.data, function(k, v) {
                    $('#'+tableId).find('tr#'+k).attr('dataID', v['id']);
                });
            }


        }


        function tableBtnClick(btnId) {
            var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
            var tableRow = $('#'+btnId).parent('td').parent('tr');
            var tableId  = $('#'+btnId).closest('table');
            
            if (btnName == 'view') {
                var dataID = tableRow.attr('dataID');
                $.redirect("adminCommissionListingDetails.php",{dataID:dataID});
            }
        }

        function loadSearch(data, message) {
            loadDefaultListing(data, message);
            $('#searchMsg').addClass('alert-success').html('<span>Search Successfully!</span>').show();
            setTimeout(function() {
                $('#searchMsg').removeClass('alert-success').html('').hide();
            }, 3000);
        }

</script>

</body>
</html>
