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

                                         <div class="col-sm-4 form-group">
                                            <label class="control-label" for="">
                                                Client Name
                                            </label>
                                            <input type="text" class="form-control" dataName="clientName" dataType="text">
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label" for="">
                                                Client Email
                                            </label>
                                            <input type="text" class="form-control" dataName="clientEmail" dataType="text">
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label" for="">
                                                Client Phone/Mobile
                                            </label>
                                            <input type="text" class="form-control" dataName="clientPhone" dataType="text">
                                        </div>

                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">
                                                Status
                                            </label>
                                            <select id="status" class="form-control" dataName="status" dataType="select">
                                            </select>
                                        </div>

                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">
                                                Assignee
                                            </label>
                                            <select id="assignee" class="form-control" dataName="assigneeID" dataType="select">
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
                                <div id="actionBtn" style="display: none;">
                                    <button id="updateBtn" type="button" dataName="" class="btn btn-primary waves-effect waves-light" style="display: none;">
                                        Update Selected
                                    </button>
                                    <button id="internalSwitchButton" type="button" dataName="" class="btn btn-primary waves-effect waves-light" style="">
                                        Internal Ticket
                                    </button>
                                    <button id="emailSwitchButton" type="button" dataName="" class="btn btn-primary waves-effect waves-light" style="">
                                        Email
                                    </button>
                                    <button id="ticketDelete" type="button" dataName="" class="btn btn-primary waves-effect waves-light">
                                        Delete Selected
                                    </button>
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
    // Initialize all the id in this page
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array (
        '',
        '',
        '',
        'Subject',
        'From',
        'Updated At',
        'Assignee',
        'Status',
        'Priority'
        );

    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqTicket.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;

    $(document).ready(function() {
        var formData  = {command : "getTicket", pageNumber : pageNumber};
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#resetBtn').click(function() {
            $("#searchForm")[0].reset();
        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#ticketDelete').click(function() {
            // alert($(".checkbox input:checked").length);
            var selected = [];
            $('.checkbox input:checked').each(function() {
                selected.push($(this).val());
            });

            var formData = {
                command   : "deleteTicket",
                ticketIDs : selected
            };
            fCallback = deleteTicket;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);    
        });
        $('#internalSwitchButton').click(function(){
            var selected = [];
            $('.checkbox input:checked').each(function() {
                selected.push($(this).val());
            });
            // console.log(selected);
            formData  = {
                command :       "updateTicket",
                internal:       1,
                ticketIDs:      selected
            };
            fCallback = updateColumn;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
        $('#emailSwitchButton').click(function(){
            var selected = [];
            $('.checkbox input:checked').each(function() {
                selected.push($(this).val());
            });
            // console.log(selected);
            formData  = {
                command :       "updateTicket",
                internal:       0,
                ticketIDs:      selected
            };
            fCallback = updateColumn;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    function loadDefaultListing(data, message) {

        if(data.ticketList) {

            $('#actionBtn').show();

            var rebuild = Array ();

            $.each(data.ticketList, function(key, value) {
                var admin="", status="", priority="";

                if(data.ticketSelectOption) {

                    if(data.ticketSelectOption.admin) {
                        admin = '<select class="form-control">';

                        $('#assignee').empty();
                        $('#assignee').append($('<option>', {
                            value: "",
                            text: "All"
                        }));

                        $.each(data.ticketSelectOption.admin, function(k, v) {
                            $('#assignee').append($('<option>', {
                                value: v['id'],
                                text: v['name']
                            }));

                            if(value['assignee_id'] == v['id'])
                                admin = admin+'<option value="'+v['id']+'" columnName="assigneeID" selected>'+v['name']+'</option>';
                            else
                                admin = admin+'<option value="'+v['id']+'" columnName="assigneeID">'+v['name']+'</option>';
                        });

                        admin = admin+'</select>';
                    }

                    if(data.ticketSelectOption.status) {
                        status = '<select class="form-control">';

                        $('#status').empty();
                        $('#status').append($('<option>', {
                            value: "",
                            text: "All"
                        }));

                        $.each(data.ticketSelectOption.status, function(k, v) {
                            $('#status').append($('<option>', {
                                value: v['value'],
                                text: v['text']
                            }));

                            if(value['status'] == v['value'])
                                status = status+'<option value="'+v['value']+'" columnName="status" selected>'+v['text']+'</option>';
                            else
                                status = status+'<option value="'+v['value']+'" columnName="status">'+v['text']+'</option>';
                        });

                        status = status+'</select>';
                    }

                    if(data.ticketSelectOption.priority) {
                        priority = '<select class="form-control">';

                        $.each(data.ticketSelectOption.priority, function(k, v) {
                            if(value['priority'] == v['value'])
                                priority = priority+'<option value="'+v['value']+'" columnName="priority" selected>'+v['text']+'</option>';
                            else
                                priority = priority+'<option value="'+v['value']+'" columnName="priority">'+v['text']+'</option>';
                        });

                        priority = priority+'</select>';
                    }
                }

                if(value['last_status'] == "new") {
                    var iconCol = '<div class="iconOrange">NEW</div>';
                }
                else if(value['last_status'] == "response") {
                    var iconCol = '<div class="iconBlue">RESPONSE</div>';
                }
                else{
                    var iconCol = "";
                }

                rebuild.push({
                    id : value['id'],
                    checkboxCol : '<div class="checkbox checkbox-primary"><input type="checkbox" value="'+value['id']+'"><label></label></div>',
                    iconCol : iconCol,
                    subject : value['subject'],
                    from : value['client_name']+'<br>('+value['client_email']+')',
                    createdAt : value['created_at'],
                    assignee : admin,
                    status : status,
                    priority : priority
                });
            });

            var tableNo;
            buildTable(rebuild, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('#'+tableId+' th:nth-child(1), td:nth-child(1)').hide();

            $('#'+tableId+' tbody tr').each(function() {
                $(this).find('td:eq(1)').click(function(e) {
                    e.stopPropagation();
                    if ($(this).find('input:checkbox[type=checkbox]').is(":checked")) {
                        $(this).find('input:checkbox[type=checkbox]').attr("checked", false);
                    }
                    else {
                        $(this).find('input:checkbox[type=checkbox]').prop("checked", true);
                    }
                });
            });

            $('#'+tableId+' tbody tr').each(function() {
                $(this).find('td:eq(3)').addClass('subjectTicket');
                $(this).find('td:eq(4)').addClass('fromTicket');
                $(this).find('td:eq(6)').addClass('selectTicket');
                $(this).find('td:eq(7)').addClass('selectTicket');
                $(this).find('td:eq(8)').addClass('selectTicket');
            });

            $('#'+tableId+' thead tr').each(function() {
                $(this).find('th:eq(3)').addClass('subjectTicket');
                $(this).find('th:eq(4)').addClass('fromTicket');
                $(this).find('th:eq(6)').addClass('selectTicket');
                $(this).find('th:eq(7)').addClass('selectTicket');
                $(this).find('th:eq(8)').addClass('selectTicket');
            });

            $('#'+tableId+' tbody tr').click(function() {
                var id = $(this).attr('data-th');
                
                $.redirect("ticketInfo.php", {id: id, previousPage: "allTicket.php"});
            });

            $('#'+tableId+' tbody tr select').click(function(e) {
                e.stopPropagation();
            });

            $('#'+tableId+' tbody tr select').change(function() {
                var ticketIDs = {};
                var id = $(this).closest('tr').attr('data-th');
                ticketIDs[0] = id;

                var columnName = $(this).find('option:selected').attr('columnName');
                var columnValue = $(this).val();
                
                var formData = {};
                formData['command'] = "updateTicket";
                formData['ticketIDs'] = ticketIDs;
                formData[columnName] = columnValue;

                fCallback = updateColumn;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

            $('#'+tableId+' tbody tr input').click(function(e) {
                e.stopPropagation();
            });

            $('#'+tableId+' tbody tr').hover(function() {
                $(this).css('cursor', 'pointer');
            });

        } else {
            $('#actionBtn').hide();
            
            var tableNo;
            buildTable(data.ticketList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        }
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>Search successful.</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);

        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command    : "getTicket",
            searchData : searchData,
            pageNumber : pageNumber
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function updateColumn(data, message) {
        showMessage('Successfully updated.', 'success', 'Update Ticket', 'edit', 'allTicket.php');
    }

    function deleteTicket(data, message) {
        showMessage('Successfully deleted.', 'success', 'Delete Ticket', 'trash', 'allTicket.php');
    }
</script>
</body>
</html>
