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
                     <div class="col-sm-4">
                        <a id="addBackBtn" href="announcementHistory.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
                     </div><!-- end col -->
                 </div>
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
                                                    <label class="control-label">Date Created</label>
                                                    <div class="input-group input-daterange" data-date-format="dd/mm/yyyy" data-date-end-date="0d" data-date-today-highlight="true" data-date-orientation="auto">
                                                        <input id="fromDate" type="text" class="form-control" placeholder="From" dataname="date_from" datatype="dateRange">
                                                        <span class="input-group-addon">
                                                            To
                                                        </span>
                                                        <input id="toDate" type="text" class="form-control" placeholder="To" dataname="date_to" datatype="dateRange">
                                                    </div>
                                                </div>
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="">
                                                        Type
                                                    </label>
                                                    <select id="sendType" class="form-control">
                                                      <option value="">All</option>
                                                      <option value="scheduled">Scheduled</option>
                                                      <option value="sent">Sent</option>
                                                    </select>
                                                </div> -->

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
                                            <div id="recipientListDiv" class="table-responsive">
                                                <!-- <table class="table table-striped table-bordered no-footer m-0">
                                                    <thead>
                                                        <tr>
                                                             <th>Name</th>
                                                             <th>Phone Number</th>
                                                             <th>Device</th>
                                                             <th>App Version</th>
                                                             <th>Status</th>
                                                             <th>Button Clicked</th>
                                                             <th>Button Clicked Time</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                           <tr>
                                                            <td>Group A</td>
                                                            <td>012345678</td>
                                                            <td>IOS</td>
                                                            <td>10.0</td>
                                                            <td>Received</td>
                                                            <td>Read More</td>
                                                            <td>10:23:14 GTM +8</td>
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
    // Initialize date picker
    $('.input-daterange input').each(function() {
        $(this).datepicker({
            format      : 'dd/mm/yyyy',
            autoclose   : true
        });
        $(this).val('');
    });
    </script>

    <script>
    var divId    = 'recipientListDiv';
    var tableId  = 'businessesListTable';
    var pagerId  = 'pagerBusinessesList';
    var btnArray = {};
    var thArray  = Array('Name',
                         'Phone Number',
                         'Device',
                         'App Version',
                         // 'Status',
                         'Button Clicked',
                         'Button Clicked Time'
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
    var announcement_id = "<?php echo $_POST['id'] ?>";

    $(document).ready(function() {

        // showMessage("errorMsg", "danger", "Session Time Out","user-times", "pageLogin.php");
        // showMessage("errorMsg", "danger", "Session Time Out","user-times", "pageLogin.php");

        var fCallback = loadDefaultListing;
        formData  = {
            command: 'adminAnnouncementRecipientHistory',
            announcement_id: announcement_id
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
        var from_datetime = dateToTimestamp($("#fromDate").val());
        var to_datetime = dateToTimestamp($("#toDate").val()+" 23:59:59");
        // var type = $("#sendType").val();
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
            command     : "adminAnnouncementRecipientHistory",
            announcement_id: announcement_id,
            pageNumber  : pageNumber,
            // type : type,
            date_from : from_datetime,
            date_to : to_datetime

        };
            
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        // console.log(data);
        var recipientsList = data.recipients;
        var tableNo;

        if(recipientsList){
            var newList = [];

            $.each(recipientsList, function(k,v){

            var rebuildData ={
                nickname : v['nickname'],
                username : v['username'],
                device : v['device'],
                app_version : v['app_version'],
                action : v['action'],
                created_at : v['created_at']
                // Freeze : v['business_id'],
                // createdAt : v['business_id'],
                // lastLogin : v['last_login']
            };
            newList.push(rebuildData);
        });
        
        }


        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');
        
        if (btnName == 'edit') {
            var businessID = tableRow.attr('data-th');
            $.redirect("businessesGeneral.php",{id: businessID});
        }
    }
    
    function loadSearch(data, message) {
        // console.log(data);
        if(!data){
            $('#alertMsg').addClass('alert-success').html('<span>'+message+'</span>').show();
            $('#recipientListDiv').hide();
            $('#paginateText').hide();
            $('#pagerBusinessesList').hide();
            // console.log(data, message);
        }else if(data){
            loadDefaultListing(data, message);
            $('#recipientListDiv').show();
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
