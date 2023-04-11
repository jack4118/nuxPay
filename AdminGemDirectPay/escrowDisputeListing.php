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
                                                Report
                                            </label>
                                            <input id="reportInput" type="text" class="form-control" dataName="report" dataType="text">
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label" for="">
                                                Phone number
                                            </label>
                                            <input id="mobileNumberInput" type="text" class="form-control" dataName="phone" dataType="text">
                                        </div>

                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">
                                                Status
                                            </label>
                                            <select id="status" class="form-control" dataName="status" dataType="select">
                                                <option value="">All</option>
                                                <option value="Open">Open</option>
                                                <option value="Approved">Approved</option>
                                                <option value="Declined">Declined</option>
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
  function record()
  {
    $.redirect('escrowDisputeInfo.php');
  }

 
</script>

<script>
    /*Table Variables Declaration*/
    var divId = 'listingDiv';
    var tableId = 'listingTable';
    var btnArray = {};
    var thArray = Array(
        'Ticket No',
        'Date',
        'Report By',
        'Phone Number',
        'Name',
        'Description',
        'Status'
    );    

    /*ajaxSend Variables Declaration*/
    var url = 'scripts/reqTicket.php';
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

    $(document).ready(function() {
        formData  = {command: 'adminGetDisputeList'};
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
        reportBy     = $('#reportInput').val();
        mobileNumber = $('#mobileNumberInput').val();
        status       = $('#status').val();

        if(pageNumber > 1) bypassLoading = 1;

        var formData   = {
            command        : "adminGetDisputeList",
            pageNumber     : pageNumber,
            fromDateTime   : fromDateTime,
            toDateTime     : toDateTime,
            reportBy       : reportBy,
            mobileNumber   : mobileNumber,
            status         : status,
            pageSize       : pageSize
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
            var list = data.result;

            if(!jQuery.isEmptyObject(list))
            {   
                var newList = [];
               

                $.each(list, function(k,v){

                    var descriptionContent = v['description'];
                    var ticketNo = v['ticket_no'];
                    var createdAt = v['created_at'];
                    var reportBy = v['report_by'];
                    var mobileNumber = v['mobile_number'];
                    var name = v['name'];
                    var status = v['status'];

                    if(descriptionContent == "")
                    {
                        descriptionContent = "-";
                    }
                    if(ticketNo == "")
                    {
                        ticketNo = "-";
                    }
                    if(createdAt == "")
                    {
                        createdAt = "-";
                    }
                    if(reportBy == "")
                    {
                        reportBy = "-";
                    }
                    if(mobileNumber == "")
                    {
                        mobileNumber = "-";
                    }
                    if(name == "")
                    {
                        name = "-";
                    }
                    if(status == "")
                    {
                        status = "-";
                    }

                    var rebuildData ={
                        ticket_no          : ticketNo,
                        created_at         : createdAt,
                        report_by          : reportBy,
                        mobile_number      : mobileNumber,
                        name               : name,
                        description        : descriptionContent,
                        status             : status
                    };
                    newList.push(rebuildData);
                });
            }
            var tableNo;
            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            if(list) {
                $.each(list, function(k, v) {
                    $('#'+tableId).find('tr#'+k).attr('data-th', v['id']);
                    $('#'+tableId).find('tr#'+k).attr('data-status', v['status'])
                    if (v['status']=="Declined") {
                        $('#'+tableId).find('tr#'+k).addClass('declinedTr')
                    }else if (v['status']=="Approved") {
                        $('#'+tableId).find('tr#'+k).addClass('approvedTr')
                    }
                });
            }
            $('#'+tableId+' tbody tr').click(function() {
                var id = $(this).attr('data-th');
                var statusPass = $(this).attr('data-status');

                $.redirect("escrowDisputeInfo.php", {
                    id: id,
                    status : statusPass,
                    previousPage: "escrowDisputeListing.php"
                });
            });
            $('#'+tableId+' tbody tr').hover(function() {
                $(this).css('cursor', 'pointer');
            });
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
