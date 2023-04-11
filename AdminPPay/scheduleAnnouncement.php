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
                                                <label class="control-label">Date Created</label>
                                                <div class="input-group input-daterange" id="m_datepicker_5">
                                                    <input id="fromDate" type="text" class="form-control input-daterange-from" placeholder="From" dataName="date_from_created" dataType="dateRange" autocomplete="off" name="start"/>
                                                    <span class="input-group-addon">
                                                        To
                                                    </span>
                                                    <input id="toDate" type="text" class="form-control input-daterange-to" placeholder="To" dataName="date_to_created" dataType="dateRange" autocomplete="off" name="end"/>
                                                </div>
                                            </div>


                                            <div class="col-md-4 form-group" style="height: 62px;">
                                                <label class="control-label">Date Created</label>
                                                <div class="input-group input-daterange" id="m_datepicker_5">
                                                    <input id="fromDate2" type="text" class="form-control input-daterange-from" placeholder="From" dataName="date_from_scheduled" dataType="dateRange" autocomplete="off" name="start2"/>
                                                    <span class="input-group-addon">
                                                        To
                                                    </span>
                                                    <input id="toDate2" type="text" class="form-control input-daterange-to" placeholder="To" dataName="date_from_scheduled" dataType="dateRange" autocomplete="off" name="end2"/>
                                                </div>
                                            </div>


                                        <div class="col-sm-4 form-group">
                                            <label class="control-label">
                                                Title
                                            </label>
                                            <input id="titleText" type="text" class="form-control" dataName="title" dataType="text">
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label class="control-label" for="">
                                                Button Type
                                            </label>
                                            <select id="buttonType" class="form-control">
                                              <option value="">All</option>
                                              <option value="action">Action</option>
                                              <option value="normal">Normal</option>
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
                                <div id="announcementListDiv" class="table-responsive">
                                    <!-- <table class="table table-striped table-bordered no-footer m-0">
                                        <thead>
                                            <tr>
                                                <th>Date Created</th>
                                                <th>Schedule Date</th>
                                                <th>Title</th>
                                                <th>Button Type</th>
                                                <th>Number of Audiences</th>
                                                <th>Valid Days</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                               <tr>
                                                <td>28/8/2019 12:00PM</td>
                                                <td>13/9/2019 12:00 AM</td>
                                                <td>Happy Mid-Autumn Festival</td>
                                                <td>Action</td>
                                                <td>4</td>
                                                <td>10</td>
                                                <td><a href="editAnnouncement.php" data-toggle="tooltip" title="" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit"><i class="fa fa-edit"></i></a><a data-toggle="modal" data-target=".viewImage" title="" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit"><i class="fa fa-eye"></i></a> <a data-toggle="modal" data-target="" title="" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>28/8/2019 12:00PM</td>
                                                <td>25/12/2019 12:00 AM</td>
                                                <td>Merry Christmas</td>
                                                <td>Action</td>
                                                <td>4</td>
                                                <td>10</td>
                                                <td><a href="editAnnouncement.php" data-toggle="tooltip" title="" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit"><i class="fa fa-edit"></i></a><a data-toggle="modal" data-target=".viewImage" title="" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit"><i class="fa fa-eye"></i></a>
                                                    <a data-toggle="modal" data-target="" title="" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table> -->
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
<input type="hidden" id="storeID">

<div class="modal fade in viewImage" id="viewAnnoucementBox" role="dialog" style="padding-right: 16px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
      </button>
      <h4 class="modal-title">
          <i class="fa fa-3x fa-"></i>
          <span style="">View Annoucement</span>
      </h4>
  </div>
  <div class="modal-body p-0">
   <div id="searchForm" role="form" class="text-left col-sm-12" style="padding: 10px; padding-bottom: 30px">
       <div class="col-sm-12 form-group pb-5">
        <div id="viewImageDiv" class="col-sm-8" style="float: none; margin: auto">
            
        </div>
    </div>
    <div class="col-sm-12 form-group">
        <label class="col-sm-5 control-label">Date Created</label>
        <div class="col-sm-7 text-left">
            <p id="viewDate" class="form-control-static" style="padding-top: 0"></p>
        </div>
    </div>
    <div class="col-sm-12 form-group">
        <label class="col-sm-5 control-label">Title</label>
        <div class="col-sm-7 text-left">
            <p id="viewTitle" class="form-control-static" style="padding-top: 0"></p>
        </div>
    </div>
    <div class="col-sm-12 form-group">
        <label class="col-sm-5 control-label">Audience</label>
        <div class="col-sm-7 text-left">
            <p id="viewAudience" class="form-control-static" style="padding-top: 0"></p>
        </div>
    </div>
    <div class="col-sm-12 form-group">
        <label class="col-sm-5 control-label">Button Type</label>
        <div class="col-sm-7 text-left">
            <p id="viewAction" class="form-control-static" style="padding-top: 0"></p>
        </div>
    </div>
    <div class="col-sm-12 form-group">
        <label class="col-sm-5 control-label">Button URL</label>
        <div class="col-sm-7 text-left">
            <p id="viewUrl" class="form-control-static" style="padding-top: 0"></p>
        </div>
    </div>
     <div class="col-sm-12 form-group">
        <label class="col-sm-5 control-label">Valid Days</label>
        <div class="col-sm-7 text-left">
            <p id="viewDays" class="form-control-static" style="padding-top: 0"></p>
        </div>
    </div>
    <div class="col-sm-12 form-group">
        <label class="col-sm-5 control-label">Description</label>
        <div class="col-sm-7 text-left">
            <p id="viewDescription" class="form-control-static" style="padding-top: 0;"></p>
        </div>
    </div>
</div>
</div>
<div class="modal-footer">
    <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>


<div class="modal fade in viewImage" id="deleteAnnoucementBox" role="dialog" style="padding-right: 16px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
      </button>
      <h4 class="modal-title">
          <i class="fa fa-3x fa-"></i>
          <span style="">Delete</span>
      </h4>
  </div>
  <div class="modal-body p-0">
   <div id="searchForm" role="form" class="text-left col-sm-12" style="padding: 10px; padding-bottom: 30px">
    <div class="col-sm-12 form-group">
        <input type="hidden" id="storeAnnoucementID">
        <span>Are you sure wanna delete this annoucement ?</span>
    </div>
</div>
</div>
<div class="modal-footer">
    <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Close</button>
    <button id="confirmDeleteBtn"  type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Confirm</button>
</div>
</div>
</div>
</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>
<script>
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


    $('#fromDate2').daterangepicker({
        autoApply: true,
        autoUpdateInput: false,
        locale: {
            format: 'DD/MM/YYYY'
        }
    }, function(start, end, label) {
        $("#fromDate2").val(start.format('DD/MM/YYYY'));
        $("#toDate2").val(end.format('DD/MM/YYYY'));
    });
    $('#toDate2').click(function() {
        $('#fromDate2').trigger('click');
    });
    $('input[name="start2"]').on('apply.daterangepicker', function (ev, picker) {
        $('#fromDate2').val(picker.startDate.format('DD/MM/YYYY'));
        $('#toDate2').val(picker.endDate.format('DD/MM/YYYY'));
    });
</script>

<script>
    var divId    = 'announcementListDiv';
    var tableId  = 'businessesListTable';
    var pagerId  = 'pagerBusinessesList';
    var btnArray = Array("edit","view","delete");
    var thArray  = Array(
       'Date Created',
       'Schedule Date',
       'Title',
       'Button Type',
       'Audiences',
       'Valid Days'
                         // 'Freeze',
                         // 'Created At',
                         // 'Last Login'
                         );
    var searchId = 'searchForm';

    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAnnoucement.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var businessID, businessName, email, mobileNo, country;

    $(document).ready(function() {

        businessID = $("#businessID").val();
        businessName = $("#businessName").val();
        email = $("#email").val();
        mobileNo = $("#mobileNo").val();
        country = $("#country").val();

        // showMessage("errorMsg", "danger", "Session Time Out","user-times", "pageLogin.php");
        // showMessage("errorMsg", "danger", "Session Time Out","user-times", "pageLogin.php");

        var fCallback = loadDefaultListing;
        formData  = {
            command: 'adminAnnouncementHistory',
            type : "scheduled"
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
        var date_from_created = dateToTimestamp($("#fromDate").val());
        var date_to_created = dateToTimestamp($("#toDate").val()+" 23:59:59");
        var date_from_scheduled = dateToTimestamp($("#fromDate2").val());
        var date_to_scheduled = dateToTimestamp($("#toDate2").val()+" 23:59:59");
        var title = $("#titleText").val();
        var buttonType = $("#buttonType").val();
        // console.log(from_datetime);
        //fix date return false crashing pagination
        if(date_from_created == false){
            date_from_created = "";
        }
        if(date_to_created == false){
            date_to_created = "";
        }
        if(date_from_scheduled == false){
            date_from_scheduled = "";
        }
        if(date_to_scheduled == false){
            date_to_scheduled = "";
        }
        // var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command: 'adminAnnouncementHistory',
            type : "scheduled",
            date_from_created  : date_from_created,
            date_to_created  : date_to_created,
            date_from_scheduled  : date_from_scheduled,
            date_to_scheduled  : date_to_scheduled,
            title : title,
            buttonType : buttonType,
            pageNumber  : pageNumber

        };
        // console.log(formData);

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        // console.log(data)
        var announcementList = data.announcements;
        var tableNo;

        if(announcementList){
            var newList = [];
            $.each(announcementList, function(k,v){
                
             var rebuildData ={
                created_at : v['created_at'],
                start_date : v['start_date'],
                title : v['title'],
                button_type : v['button_type'],
                audience : v['audience'],
                days_active : v['days_active']
                // createdAt : v['business_id'],
                // lastLogin : v['last_login']
            };
            newList.push(rebuildData);
        });

        }


        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(announcementList) {
            $.each(announcementList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-th', v['id']);
            });
        }
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');
        
        if (btnName == 'edit') {
            var announcementID = tableRow.attr('data-th');
            $.redirect("editAnnouncement.php",{announcementID: announcementID});

        }else if (btnName == 'view') {
            var announcementID = tableRow.attr('data-th');
            $("#storeID").val(announcementID);
            var fCallback = viewAnnoucement;
            formData  = {
                command: 'adminAnnouncementHistory',
                type : "scheduled"
            };
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        }else if (btnName == 'delete') {
            var announcementID = tableRow.attr('data-th');
            $("#storeAnnoucementID").val(announcementID);
            $("#deleteAnnoucementBox").modal("show");
        }
    }

    function viewAnnoucement(data, message){
        // console.log(data);

        var storeID = $("#storeID").val();

        var announcementList = data.announcements;
        var tableNo;

        if(announcementList){
            $.each(announcementList, function(k,v){
                if(storeID == v["id"]){
                    $("#viewImageDiv").empty().append('<img src="'+v["image_url"]+'" style="width: 100%">');
                    $("#viewDate").empty().text(v["created_at"]);
                    $("#viewTitle").empty().text(v["title"]);
                    $("#viewAudience").empty().text(v["audience"]);
                    $("#viewAction").empty().text(v["button_type"]);
                    $("#viewUrl").empty().text(v["button_link"]);
                    $("#viewDays").empty().text(v["days_active"]);
                    $("#viewDescription").empty().text(v["description"]);
                }
            });
        }

        
        $("#viewAnnoucementBox").modal("show");
    }
    
    function loadSearch(data, message) {
        // console.log(data);
        if(!data){
            $('#alertMsg').addClass('alert-success').html('<span>'+message+'</span>').show();
            $('#announcementListDiv').hide();
            $('#paginateText').hide();
            $('#pagerBusinessesList').hide();
            // console.log(data, message);
        }else if(data){
            loadDefaultListing(data, message);
            $('#announcementListDiv').show();
            $('#paginateText').show();
            $('#pagerBusinessesList').show();
        }
        
        $('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);

    }

    $("#confirmDeleteBtn").click(function(){
        var ID = $("#storeAnnoucementID").val();

        var fCallback = deleteAnnoucementSuccess;
            formData  = {
                command: 'adminAnnouncementDelete',
                announcement_id : ID
            };
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    })


    function deleteAnnoucementSuccess(data, message){
        // console.log(data);
        showMessage('Successfully delete.', 'success', 'Delete Annoucement', 'edit', 'scheduleAnnouncement.php');
    }

</script>

</body>
</html>
