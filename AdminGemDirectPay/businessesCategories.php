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

                    <div class="" style="margin-bottom: 50px">
                        <a id="addCategories" href="javascript:void(0);" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20">
                            New Category
                        </a>
                        <form>
                            <div id="basicwizard" class="pull-in">
                                <div class="tab-content b-0 m-b-0 py-0">
                                    <div id="alertMsg" class="alert" style="display: none;"></div>
                                    <div id="userCategoriesListDiv" class="table-responsive">

                                    </div>

                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="pageruserCategoriesList">
                                        </ul>
                                    </div> 
                                    <div id="deleteDiv" class="col-sm-12 pl-0 m-t-10" style="padding-bottom: 30px;text-align: left; display: none;">
                                            <button id="deleteBtn" type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal">Delete</button>
                                            <button id="deleteAllTagBtn" type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".deleteAllModal">Delete All</button>
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
      <span>Categories will be remove from your categories list.</span>
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
      <span>All categories will be remove from your categories list.</span>
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

<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

<script>
    var divId    = 'userCategoriesListDiv';
    var tableId  = 'userCategoriesListTable';
    var pagerId  = 'pageruserCategoriesList';
    var btnArray = Array("edit","delete");
    var thArray  = Array(
         // 'Categories',
         'Categories Name',
         'Description',
         'Total Member',
         'Working Hours',
         'Sorting Order',
         'Forward Url',
         'Date Time'
         );

    var searchId = 'searchForm';
    var businessID = "<?php echo $_POST['id']; ?>";  

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

        $('#addCategories').click(function() {
            $.redirect("businessesAddCategories.php", {id: businessID});
        });

        $('.businessesLiveChatSettings').click(function() {
            $.redirect("businessesLiveChatSettings.php", {id: businessID});
        });

        $('.businessesCommissionListing').click(function() {
          $.redirect("businessesCommissionListing.php", {id: businessID});
        });


        fCallback = loadDefaultListing;
        formData  = {
            command: 'adminGetUserCategory',
            businessID: businessID,
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

         // var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "adminGetUserCategory",
            page  : pageNumber,
            businessID : businessID
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

     //load and rebuild table data arrangement//
     function loadDefaultListing(data, message) {
        // console.log(data)
        var categoriesList = data.data;
        var tableNo;

        $('#deleteDiv').hide();

        if (categoriesList) {
            $('#deleteDiv').show();
            var newList = [];
            var workingHours;
            $.each(categoriesList, function(k,v){

               if (v['description'] ==""){
                   v['description'] ="-"; 
               }
               if (v['count'] ==""){
                   v['count'] ="-"; 
               }
               if (v['url'] ==""){
                   v['url'] ="Disable"; 
               }else{
                  v['url'] ="Enable"; 
               }
               if (v['working_hour_from'] =="" && v['working_hour_to'] =="") {
                workingHours = "-";
              }else{
                  workingHours = getUserLocalTime(v['working_hour_from']) +" - "+ getUserLocalTime(v['working_hour_to']);
              }
              var rebuildData ={
                  name : v['name'],
                  description : v['description'],
                  total : v['count'],
                  workingHours : workingHours,
                  order : v['priority'],
                  url : v['url'],
                  date : v['date'],
              };
              newList.push(rebuildData);
            });
            
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        addColumn(tableId, data);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(categoriesList) {
            $.each(categoriesList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-th', v['tag']);
            });
        }

        $('#'+tableId).find('tbody tr').each(function(){
           $(this).find("td:eq(3)").digits();
           $(this).find("td:eq(5)").digits();
        });
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
            var tag = tableRow.attr('data-th');
            // var tag = tableRow.find('td:eq(1)').text();
            $.redirect("businessesEditCategories.php",{id: businessID, name: tag,});
        }else if(btnName == 'delete'){
            var canvasBtnArray = Array('Delete');
            var message = 'Are you sure you want to delete this category?';
            showMessage(message, 'warning', 'Delete Team Member', '', '', canvasBtnArray);
            $('#canvasDeleteBtn').click(function() {
              var idArr = [];
              var categoriesName = tableRow.attr('data-th');
              idArr.push(categoriesName);

              var formData = {
                'command': 'adminDeleteUserCategory',
                'business_id' : businessID,
                'tag' : idArr
              };
              fCallback = loadDelete;
              ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            });
          }
    }

    $('#deleteBtn').click(function(){
            var idArr = [];
            $('#'+tableId+" tbody").find('[type=checkbox]:checked').each(function() {
                var transID = $(this).parent('td').parent('tr').attr('data-th');
                idArr.push(transID);
            });
            if (idArr=="") {
                showMessage("Please select categories to delete", 'warning', 'Delete categories', '', '')
            }else{
                $('.deleteModal').modal('toggle');
            // console.log(idArr[0]);
        }
    });

    $('#deleteConfirmBtn').click(function(){
        var idArr = [];

        $('#'+tableId+" tbody").find('[type=checkbox]:checked').each(function() {
            var categoriesName = $(this).parent('td').parent('tr').attr('data-th');
            idArr.push(categoriesName);
        });

        var formData = {
          'command': 'adminDeleteUserCategory',
          'business_id' : businessID,
          'tag' : idArr
      };
      fCallback = loadDelete;
      ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
  });

    $('#deleteAllConfirmBtn').click(function(){
        var formData = {
          'command': 'adminDeleteAllUserCategory',
          'business_id' : businessID
      };
      fCallback = loadDelete;
      ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
  });

    function loadDelete(data,message){
            // console.log(data);
           
            showMessage(message, 'success', 'Success', '', '');

            fCallback = loadDefaultListing;

            formData  = {
              command: 'adminGetUserCategory',
              businessID : businessID
            };

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }



</script>


</body>
</html>
