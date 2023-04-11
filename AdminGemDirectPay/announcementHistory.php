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
                                                        <input id="fromDate" type="text" class="form-control input-daterange-from" placeholder="From" dataName="transationDate" dataType="dateRange" autocomplete="off" name="start"/>
                                                        <span class="input-group-addon">
                                                            To
                                                        </span>
                                                        <input id="toDate" type="text" class="form-control input-daterange-to" placeholder="To" dataName="transactionDate" dataType="dateRange" autocomplete="off" name="end"/>
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

    <div class="modal fade in viewHistoryModal" id="imageModal" role="dialog" style="padding-right: 16px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">
                        <i class="fa fa-3x fa-"></i>
                        <span style="">View History</span>
                    </h4>
                </div>
                <div class="modal-body p-0">
                    <div id="displayImageBox">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade in viewHistoryModal" id="canvasMessage" role="dialog" style="padding-right: 16px;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title">
              <i class="fa fa-3x fa-"></i>
              <span style="">View History</span>
          </h4>
      </div>
      <div class="modal-body p-0">
         <div id="searchForm" role="form" class="text-left col-sm-12" style="padding: 10px; padding-bottom: 30px">
             <div class="col-sm-12 form-group pb-5">
                <div class="col-sm-8" style="float: none; margin: auto">
                    <img src="images/theNuxIcon.png" style="width: 100%">
                </div>
            </div>
            <div class="col-sm-12 form-group">
                <label class="col-sm-5 control-label">Date Created</label>
                <div class="col-sm-7 text-left">
                    <p class="form-control-static" style="padding-top: 0">26/8/2019</p>
                </div>
            </div>
              <div class="col-sm-12 form-group">
                <label class="col-sm-5 control-label">Title</label>
                <div class="col-sm-7 text-left">
                    <p class="form-control-static" style="padding-top: 0">Happy Chinese New Year</p>
                </div>
            </div>
             <div class="col-sm-12 form-group">
                <label class="col-sm-5 control-label">Audience</label>
                <div class="col-sm-7 text-left">
                    <p class="form-control-static" style="padding-top: 0">Group A, Group B, Group C</p>
                </div>
            </div>
              <div class="col-sm-12 form-group">
                <label class="col-sm-5 control-label">Description</label>
                <div class="col-sm-7 text-left">
                    <p class="form-control-static" style="padding-top: 0;">Hahahahahahahahahhahahahahahahahahahahahahahahahahahahahahaha</p>
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
    <!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>


    <script>
    var divId    = 'announcementListDiv';
    var tableId  = 'businessesListTable';
    var pagerId  = 'pagerBusinessesList';
    var btnArray = Array("list");
    var thArray  = Array('Create time',
                         'Date Sent',
                         // 'Status',
                         'Title',
                         'Description',
                         'Image',
                         'Audience',
                         // 'Number of Audience',
                         'Valid Days',
                         'Button Type',
                         'Button URL'
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


        var fCallback = loadDefaultListing;
        formData  = {
            command: 'adminAnnouncementHistory',
            type : "sent"
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
        var from_datetime = dateToTimestamp($("#fromDate").val()+" 00:00:00");
        var to_datetime = dateToTimestamp($("#toDate").val()+" 23:59:59");
        var title = $("#titleText").val();
        var buttonType = $("#buttonType").val();
        // console.log(from_datetime);
        //fix date return false crashing pagination
        if(from_datetime == false){
            from_datetime = "";
        }
        if(to_datetime == false){
            to_datetime = "";
        }
        // var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command: 'adminAnnouncementHistory',
            type                : "sent",
            date_from_created   : from_datetime,
            date_to_created     : to_datetime,
            title               : title,
            buttonType          : buttonType,
            pageNumber          : pageNumber

        };
        // console.log(formData);

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        // console.log(data);
        var announcementsList = data.announcements;
        var tableNo;

        if(announcementsList){
            var newList = [];
            $.each(announcementsList, function(k,v){
                var rebuildData ={
                    created_at : v['created_at'],
                    start_date : v['start_date'],
                    title : v['title'],
                    description : v['description'],
                    image_url : v['image_url'],
                    audience : v['audience'],
                    days_active : v['days_active'],
                    button_type : v['button_type'],
                    button_link : v['button_link']
                };
                newList.push(rebuildData);
            });
        }


        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(announcementsList) {
            $.each(announcementsList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-th', v['id']);
                $('#'+tableId).find('tr#'+k).attr('data-image', v['image_url']);
            });
        }

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find("td:eq(0)").css("min-width","150px");
            $(this).find("td:eq(1)").css("min-width","150px");
            $(this).find("td:eq(3)").css("min-width","200px");
            $(this).find("td:eq(4)").html('<a data-toggle="tooltip" title="" id="view'+this.id+'" onclick="tableBtnClick(this.id)" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="View"><i class="fa fa-eye"></i></a>');
        })
    }

    function tableBtnClick(btnId) {
        showCanvas();
        $("#displayImageBox").empty();
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');
        
        if (btnName == 'list') {
            var announcementID = tableRow.attr('data-th');
            $.redirect("announcementRecipientListing.php",{id: announcementID});

        }else if (btnName == 'view') {
            var imageData = tableRow.attr('data-image');
            $("#displayImageBox").append('<img src="'+imageData+'" width="100%">');
            $("#imageModal").modal("show");
            hideCanvas();
        }
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
   


    </script>

</body>
</html>
