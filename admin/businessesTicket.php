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
          <div class="col-sm-4">
           <a href="businesses.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
            <i class="md md-add"></i>
            Back
          </a>
        </div><!-- end col -->
      </div>

      <div class="row">

        <?php include("businessesSidebar.php"); ?>

        <div class="col-lg-12 col-md-12">

          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default bx-shadow-none">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="collapse">
                    Search
                  </a>
                </h4>
              </div>

              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                <div class="panel-body">
                  <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                  <form id="searchForm" role="form">

                    <div class="col-sm-12 px-0">
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
                        <select class="form-control" id="statusSelect">
                          <option>All</option>
                          <option></option>
                          <option></option>
                        </select>
                      </div>

                    </div>                    
                  </form>
                  <div class="col-sm-12 mt-2">
                    <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">Search</button>
                    <button type="submit" id="resetBtn" class="btn btn-default waves-effect waves-light">Reset</button>
                  </div>
                </div>
              </div>
            </div>
          </div>


                 
                    <form>
                      <div id="basicwizard" class="pull-in">
                        <div class="tab-content b-0 m-b-0 py-0">
                                                            <!-- <div class="form-group" style="">
                                                                <label>Total Follower :</label>
                                                                <b>1</b>
                                                              </div> -->
                                                              <div id="alertMsg" class="alert" style="display: none;"></div>
                                                              <div id="adminListDiv" class="table-responsive">
                                                              <!--   <table id="adminListTable" class="table table-striped table-bordered no-footer m-0">
                                                                 <thead>
                                                                  <tr>
                                                                   <th></th>
                                                                   <th></th>
                                                                   <th>Subject</th>
                                                                   <th>From</th>
                                                                   <th>Create At</th>
                                                                   <th>Asignee</th>
                                                                   <th>Status</th>
                                                                   <th>Priority</th>
                                                                 </tr>
                                                               </thead>
                                                               <tbody>
                                                                 <tr>
                                                                  <td align="center"><input type="checkbox"></td>
                                                                  <td align="center"><div class="iconOrange">NEW</div></td>
                                                                  <td>Welcome to XUN.NET</td>
                                                                  <td>XUN.NET Support Team<br>(xun123@gmail.com)</td>
                                                                  <td>27/9/2018 10:32 AM</td>
                                                                  <td>
                                                                   <select class="form-control">
                                                                    <option>-</option>
                                                                    <option>Member1</option>
                                                                    <option>Member2</option>
                                                                  </select> 
                                                                </td>
                                                                <td>
                                                                  <select class="form-control">
                                                                    <option>Open</option>
                                                                    <option>Close</option>
                                                                    <option></option>
                                                                  </select> 
                                                                </td>
                                                                <td>
                                                                  <select class="form-control">
                                                                    <option>Low</option>
                                                                    <option>High</option>
                                                                    <option></option>
                                                                  </select> 
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table> -->
                                                        </div>

                                                        <span id="paginateText"></span>
                                                        <div class="text-center">
                                                          <ul class="pagination pagination-md" id="pagerAdminList">
                                                           <!-- <li class="active" style="display: inline;"><a href="#" class="pageLink">1</a></li>
                                                           <li style="display: inline;"><a href="#" class="pageLink">2</a></li>
                                                           <li style="display: inline;"><a href="#" class="pageLink">3</a></li>
                                                           <li style="display: inline;"><a href="#" class="pageLink">4</a></li>
                                                           <li style="display: inline;"><a href="#" class="pageLink">5</a></li>
                                                           <li style="display: inline;"><a href="#" class="pageLink">6</a></li>
                                                           <li style="display: inline;"><a href="#" class="pageLink">7</a></li>
                                                           <li style="display: inline;"><a href="#" class="pageLink">8</a></li>
                                                           <li class="link"><a href="#" class="nextLink">»</a></li>
                                                           <li class="link"><a href="#" class="lastLink">Last</a></li> -->
                                                         </ul>
                                                       </div> 
                                                       <div class="" style="margin-bottom: 50px">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                          Update Selected
                                                        </button>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                          Delete Selected
                                                        </button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </form>
                                              </div>
                                            </div>
                                          
                                      
                                  <!-- End row -->

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
       <script>
    var divId    = 'adminListDiv';
    var tableId  = 'adminListTable';
    var pagerId  = 'pagerAdminList';
    var btnArray = {};
    var thArray  = Array('',
                         'Subject',
                         'From',
                         'Create At',
                         'Asignee',
                         'Status',
                         'Priority'
                        
                        );
    var searchId = 'searchForm';
        
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqTicket.php';
    var method          = 'POST';
    var debug           = 1;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";  

    var businessID = "<?php echo $_POST['id']; ?>";  
    // console.log(businessID);

    $(document).ready(function() {

      $('.businessesGeneral').click(function() {
            $.redirect("businessesGeneral.php", {id: businessID});
        });

        $('.businessesUsage').click(function() {
            $.redirect("businessesUsage.php", {id: businessID});
        });

        $('.businessesTopUpHistory').click(function() {
            $.redirect("businessesTopUpHistory.php", {id: businessID});
        });

        $('.businessesCategories').click(function() {
            $.redirect("businessesCategories.php", {id: businessID});
        });

        $('.businessesTeamMember').click(function() {
            $.redirect("businessesTeamMember.php", {id: businessID});
        });

        $('.businessesFollower').click(function() {
            $.redirect("businessesFollower.php", {id: businessID});
        });

        $('.businessesTicket').click(function() {
            $.redirect("businessesTicket.php", {id: businessID});
        });

        $('.businessesLiveChatSettings').click(function() {
            $.redirect("businessesLiveChatSettings.php", {id: businessID});
        });
        
        fCallback = loadDefaultListing;
        formData  = {command: 'getAdminList'};
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

          $('#updateBtn').click(function() {
            var checkedIDs = [];
            $('#'+tableId).find('[type=checkbox]:checked').each(function() {
                var checkboxID = $(this).parent('td').parent('tr').attr('data-th');
                checkedIDs.push(checkboxID);
            });

            if(checkedIDs.length === 0)
                showMessage('No checkbox selected', 'warning', 'Update Status', 'edit', '');
            else {
                var formData   = {
                    command : 'updateBankAccStatusAdmin',
                    checkedIDs : checkedIDs,
                    status : $('#statusSelect').find('option:selected').val()
                };
                fCallback = updateCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });
    });

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getAdminList",
            pageNumber  : pageNumber,
            inputData   : searchData
        };
            
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        // console.log (data);
        var tableNo;
        buildTable(data.adminList, tableId, divId, thArray, btnArray, message, tableNo);
        addColumn(tableId, data,);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        var assigneeOptions = Array('Member1', 'Member2');
        var statusOptions = Array('Open', 'Close');
        var priorityOptions = Array ('Low', 'High');

        $('#'+tableId+' tbody tr').each(function() {
            var selectAssigneeOption = '';
            var selectStatusOption = '';
            var selectpriorityOption = '';
            
            $.each(assigneeOptions, function(k, v) {
                selectAssigneeOption += '<option>'+v+'</option>';
            });

            $.each(statusOptions, function(k, v) {
                selectStatusOption += '<option>'+v+'</option>';
            });

            $.each(priorityOptions, function(k, v) {
                selectpriorityOption += '<option>'+v+'</option>';
            });
            
            var selectAssigneeDiv = '<select class="form-control">'+selectAssigneeOption+'</select>';
            var selectStatusDiv = '<select class="form-control">'+selectStatusOption+'</select>';
            var selectPriorityDiv = '<select class="form-control">'+selectpriorityOption+'</select>';
            


            $(this).append('<td>'+selectAssigneeDiv+'</td>');
            $(this).append('<td>'+selectStatusDiv+'</td>');
            $(this).append('<td>'+selectPriorityDiv+'</td>');
            //$(this).append('<td>'+selectStatusDiv+'</td>');
            // $(this).append('<td>test</td>');
        });

          // $("#adminListTable > tbody > tr").each(function(key, value){

            // $(this).append("<td><select class ='form-control'><option></option></select></td>");

          

        // });

    }
    
    // function tableBtnClick(btnId) {
    //     var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
    //     var tableRow = $('#'+btnId).parent('td').parent('tr');
    //     var tableId  = $('#'+btnId).closest('table');
        
    //     if (btnName == 'edit') {
    //         var editId = tableRow.attr('data-th');
    //         $.redirect("userGeneral.php",{id: editId});
    //     }

          
    // }
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function updateCallback(data, message) {
        showMessage(' Successful updated status.', 'success', ' Update Status', 'edit', 'userTicket.php');
    }
   




    </script>

                        </body>
                        </html>
