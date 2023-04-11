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

          <div class="p-b-0">
            <a id="addTeamMember" href="javascript:void(0);" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20">
              New Team Member
            </a>
            <form>
              <div id="basicwizard" class="pull-in">
                <div class="tab-content b-0 m-b-0 py-0">
                  <div id="alertMsg" class="alert" style="display: none;"></div>
                  <div id="teamMemberDiv" class="table-responsive">
                  </div>

                  <span id="paginateText"></span>
                  <div class="text-center">
                    <ul class="pagination pagination-md" id="pagerTeamMemberList">
                    </ul>
                  </div> 
                  <div id="deleteDiv" class="col-sm-12 pl-0 m-t-10" style="padding-bottom: 30px;text-align: left; display: none;">
                    <button id="deleteBtn" type="button" class="btn btn-primary waves-effect waves-light">Delete</button>

                    <button id="deleteAllBtn" type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".deleteAllModal">Delete All</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
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

<!-- delete modal -->
<div class="modal fade in deleteModal" id="canvasMessage" role="dialog" style="padding-right: 16px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">
          <i class="fa fa-3x fa-"></i>
          <span style="">Are you sure?</span>
        </h4>
      </div>
      <div class="modal-body">
        <div id="canvasAlertMessage" class="alert alert-warning">
          <span>Team member(s) will be remove from your team member list.</span>
        </div>
      </div>
      <div class="modal-footer">
        <button id="deleteConfirmBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Delete</button>
        <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade in deleteAllModal" id="canvasMessage" role="dialog" style="padding-right: 16px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">
          <i class="fa fa-3x fa-"></i>
          <span style="">Are you sure?</span>
        </h4>
      </div>
      <div class="modal-body">
        <div id="canvasAlertMessage" class="alert alert-warning">
          <span>All team member will be remove from your team member list.</span>
        </div>
      </div>
      <div class="modal-footer">
        <button id="deleteAllConfirmBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Delete</button>
        <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- END delete modal -->


<script>
  var resizefunc = [];
</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

<script>
  var divId    = 'teamMemberDiv';
  var tableId  = 'teamMemberListTable';
  var pagerId  = 'pagerTeamMemberList';
  var btnArray = Array("edit","delete");
  var thArray  = Array('Status',
   'Name',
   'Mobile Number',
   'Date',
   );
  var searchId = 'searchForm';

    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqBusinesses.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = ""; 

    var businessID = "<?php echo $_POST['id']; ?>"; 
    // var employeeName, employeeID, employeeMobile;

    var parentLink = $('ul.breadcrumb').children();
    var total = $('ul.breadcrumb').children().length;

    $(parentLink).each(function(k,v){
      if (total>=4 && k==total-2) {
        var oldLink = $(this).children().attr("href");
        $(this).children().attr({href:"javascript:void(0);", onClick:"redirectBreadcrumb(\""+oldLink+"\");"});
        // console.log(oldLink);
      }else if(k==total-1){
        var oldLink = $(this).children().attr("href");
        $(this).children().attr({href:"javascript:void(0);", onClick:"redirectBreadcrumb(\""+oldLink+"\");"});
      }
    });

    function redirectBreadcrumb(link,data){
      if (data) {
        $.redirect(link, {id: businessID,name: data});
      }else{
        $.redirect(link, {id: businessID});
      }
    }


    $(document).ready(function() {

      if (!businessID) {
        window.ajaxEnabled = false;
        showMessage("Business Not Found, Please try again. ", 'danger', 'Some error occured', "", 'businesses.php');
      }

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

      $('.businessesCommissionListing').click(function() {
        $.redirect("businessesCommissionListing.php", {id: businessID});
      });

      $('#addTeamMember').click(function() {
        $.redirect("businessesAddTeamMember.php", {id: businessID});
      });

      fCallback = loadDefaultListing;
      formData  = {
       command: 'adminGetUserTeamMember',
       businessID : businessID

     };
     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

   });

    function pagingCallBack(pageNumber, fCallback){
      if(pageNumber > 1) bypassLoading = 1;

         // var searchData = buildSearchDataByType(searchId);
         var formData   = {
          command     : "adminGetUserTeamMember",
          page  : pageNumber,
          businessID : businessID
        };

        if(!fCallback)
          fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
      }

      function loadDefaultListing(data, message) {
      // console.log (data);

      var teamMemberList = data.data;
      var tableNo;

      $('#deleteDiv').hide();
      
      if (teamMemberList) {
        $('#deleteDiv').show();
        var newList = [];
        $.each(teamMemberList, function(k, v) {

          var rebuildData = {
            status : v['status'],
            name : v['name'],
            mobileNumber : v['mobile'],
            DateTime : v['date']
          };
          newList.push(rebuildData);
        });
      }

      buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
      addColumn(tableId, data,);
      pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

      $('#'+tableId).find('tbody tr').each(function(){
        var status = $(this).find("td:eq(1)").text();
        if (status==1) {
          $(this).find("td:eq(1)").html('<span class="m-badge m-badge--success m-badge--wide">Active</span>');
        }else if(status == 0){
          $(this).find("td:eq(1)").html('<span class="m-badge m-badge--danger m-badge--wide">Inactive</span>');
        }
      });

      if(teamMemberList) {
        $.each(teamMemberList, function(k, v) {
          $('#'+tableId).find('tr#'+k).attr('data-th', v['employee_id']);
        });
      }
    }

    function addColumn(tableId, data) {
      var rows = $('#' + tableId + ' tr');
      for (var i = 0; i < rows.length; i++) {
        var checkbox = $('<input />', {
          type: 'checkbox',
          id: 'chk' + i,
          value: 'myvalue' + i
        });
        checkbox.wrap('<td style="width : 12px !important;"></td>').parent().prependTo(rows[i]);
      }
      $("#chk0").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
      });
    }

    function tableBtnClick(btnId) {
      var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
      var tableRow = $('#'+btnId).parent('td').parent('tr');
      var tableId  = $('#'+btnId).closest('table');

      if (btnName == 'edit') {
        var employeeID = tableRow.attr('data-th');

        $.redirect("businessesEditTeamMember.php",{id: businessID, employee_id: employeeID});
      }else if(btnName == 'delete'){
        var canvasBtnArray = Array('Delete');
        var message = 'Are you sure you want to delete this team member?';
        showMessage(message, 'warning', 'Delete Team Member', '', '', canvasBtnArray);
        $('#canvasDeleteBtn').click(function() {
          var idArr = [];
          var employeeID = tableRow.attr('data-th');
          idArr.push(employeeID);

          var formData = {
            'command': 'adminDeleteUserTeamMember',
            'business_id' : businessID,
            'employee_id' : idArr
          };
          fCallback = loadDelete;
          ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });
      }
    }

    $('#deleteBtn').click(function(){
            // $('html, body').animate({scrollTop : 0},500);
            
            var idArr = [];
            $('#'+tableId+" tbody").find('[type=checkbox]:checked').each(function() {
              var transID = $(this).parent('td').parent('tr').attr('data-th');
              idArr.push(transID);
            });
            if (idArr=="") {
              showMessage("Please select team member to delete", 'warning', 'Delete Team Member', '', '')
            }else{
              $('.deleteModal').modal('toggle');
            // console.log(idArr[0]);
          }
        });

    $('#deleteConfirmBtn').click(function(){
      var idArr = [];

      $('#'+tableId+" tbody").find('[type=checkbox]:checked').each(function() {
        var employeeID = $(this).parent('td').parent('tr').attr('data-th');
        idArr.push(employeeID);
      });

      var formData = {
        'command': 'adminDeleteUserTeamMember',
        'business_id' : businessID,
        'employee_id' : idArr
      };
      fCallback = loadDelete;
      ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    $('#deleteAllConfirmBtn').click(function(){
      var formData = {
        'command': 'adminDeleteAllUserTeamMember',
        'business_id' : businessID
      };
      fCallback = loadDelete;
      ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function loadDelete(data,message){
            // console.log(data);
            // console.log(message);
            // $('#canvasMessage').modal('toggle');
            showMessage(message, 'success', 'Success', '', '');

            fCallback = loadDefaultListing;

            formData  = {
              command: 'adminGetUserTeamMember',
              businessID : businessID
            };

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
          }

        </script>

      </body>
      </html>
