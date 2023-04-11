<?php
session_start();

    // Get current page name
$thisPage = basename($_SERVER['PHP_SELF']);

include("include/config.php");

if ( !in_array($_SESSION['userID'], $config['specialAccess'], true ) ) {
  echo '<script>window.location.href="businesses.php";</script>';
}
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
                                                    <label class="control-label">
                                                        User Name
                                                    </label>
                                                    <input id="username" type="text" class="form-control" dataName="" dataType="text">
                                                </div>
                                                 <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Phone Number
                                                    </label>
                                                    <input id="mobile" type="text" class="form-control" dataName="" dataType="text">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="email">
                                                        Country
                                                    </label>
                                                    <input id="country" type="text" class="form-control" dataName="" dataType="text">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        First Name
                                                    </label>
                                                    <input id="firstName" type="text" class="form-control" dataName="" dataType="text">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Last Name
                                                    </label>
                                                    <input id="lastName" type="text" class="form-control" dataName="" dataType="text">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        ID Number
                                                    </label>
                                                    <input id="idNo" type="text" class="form-control" dataName="" dataType="text">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                  <label class="control-label" for="">
                                                    Type of Image
                                                  </label>
                                                  <select id="imgType" class="form-control">
                                                    <option value="">All</option>
                                                    <option value="ic">IC</option>
                                                    <option value="passport">Passport Number</option>
                                                    <option value="driverslicense">Driving License</option>
                                                    <option value="other">Other</option>
                                                  </select>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                  <label class="control-label" for="">
                                                    Status
                                                  </label>
                                                  <select id="status" class="form-control">
                                                    <option value="">All</option>
                                                    <option value="success">Success</option>
                                                    <option value="failed">Failed</option>
                                                    <option value="pending">Pending</option>
                                                  </select>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                  <label class="control-label" for="">
                                                    Risk Level
                                                  </label>
                                                  <select id="level" class="form-control">
                                                    <option value="">All</option>
                                                    <option value="Low">Low</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="Hight">High</option>
                                                  </select>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">Submitted at</label>
                                                    <div class="input-group input-daterange" data-date-format="dd/mm/yyyy" data-date-end-date="0d" data-date-today-highlight="true" data-date-orientation="auto">
                                                        <input id="fromDate" type="text" class="form-control" placeholder="From" dataName="fromDate" dataType="dateRange" autocomplete="off" />
                                                        <span class="input-group-addon">
                                                            To
                                                        </span>
                                                        <input id="toDate" type="text" class="form-control" placeholder="To" dataName="" dataType="dateRange" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">Updated at</label>
                                                    <div class="input-group input-daterange" data-date-format="dd/mm/yyyy" data-date-end-date="0d" data-date-today-highlight="true" data-date-orientation="auto">
                                                        <input id="upFromDate" type="text" class="form-control" placeholder="From" dataName="" dataType="dateRange" autocomplete="off" />
                                                        <span class="input-group-addon">
                                                            To
                                                        </span>
                                                        <input id="upToDate" type="text" class="form-control" placeholder="To" dataName="" dataType="dateRange" autocomplete="off" />
                                                    </div>
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
                                            <div id="kycListingDiv" class="table-responsive">
                                            </div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                              <ul class="pagination pagination-md" id="pagerKycListing">
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

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>
var divId    = 'kycListingDiv';
var tableId  = 'kycListingTable';
var pagerId  = 'pagerKycListing';
var btnArray = {};
var thArray  = Array('User Name',
   'Phone Number',
   'Country',
   'First Name',
   'Last Name',
   'ID Number',
   'Type of Image',
   'Image',
   'Status',
   'Risk Level',
   'Submitted At',
   'Updated At'
);
var searchId = 'searchForm';

// Initialize the arguments for ajaxSend function
var url             = 'scripts/reqKyc.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;
var formData        = "";
var fCallback       = "";

  $(document).ready(function()
  {
    // Initialize date picker
    $('.input-daterange input').each(function() {
        $(this).datepicker({
            format      : 'dd/mm/yyyy',
            autoclose   : true
        });
        $(this).val('');
    });

    fCallback = loadDefaultListing;
    formData  = {
        command: 'adminGetKYCList',
        pageNumber: pageNumber
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

      // Search
      var username = $('#username').val();
      var mobile = $('#mobile').val();
      var country = $('#country').val();
      var firstName = $('#firstName').val();
      var lastName = $('#lastName').val();
      var idNo = $('#idNo').val();
      var imgType = $('#imgType').val();
      var status = $('#status').val();
      var level = $('#level').val();

      var fromDate = $('#fromDate').val();
      var toDate = $('#toDate').val();
      var upFromDate = $('#upFromDate').val();
      var upToDate = $('#upToDate').val();

      if ($("#fromDate").val()) {
          fromDate = dateToTimestamp($("#fromDate").val() + " 00:00:00");
      }else{
          fromDate="";
      }
      if ($("#toDate").val()) {
          toDate = dateToTimestamp($("#toDate").val() + " 23:59:59");
      }else{
          toDate="";
      }

      if ($("#upFromDate").val()) {
          upFromDate = dateToTimestamp($("#upFromDate").val() + " 00:00:00");
      }else{
          upFromDate="";
      }
      if ($("#upToDate").val()) {
          upToDate = dateToTimestamp($("#upToDate").val() + " 23:59:59");
      }else{
          upToDate="";
      }

      var formData   = {
          command     : "adminGetKYCList",
          username: username,
          phoneNumber: mobile,
          country : country,
          firstName: firstName,
          lastName: lastName,
          idNumber: idNo,
          typeOfImage: imgType,
          status: status,
          riskLevel: level,
          pageNumber: pageNumber,

          fromDate: fromDate,
          toDate: toDate,
          upToDate : upToDate,
          upFromDate : upFromDate


      };

      if(!fCallback)
          fCallback = loadDefaultListing;
      ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
  }

  function loadDefaultListing(data, message) {
      console.log(data);
      var userList = data.data;
      var tableNo;

      if(userList){
          var newList = [];
          $.each(userList, function(k,v){
            console.log(v);
              $.each(v, function(key,value){
                  if (!value) {
                      v[key]="-";
                  }
              });

              var rebuildData ={
                  userName : v['nickname'],
                  phoneNumber : v['username'],
                  country : v['country'],
                  firstName : v['first_name'],
                  lastName : v['last_name'],
                  idNumber : v['document_id'],
                  typeOfImage : v['document_type'],
                  viewImage : '<a data-toggle="tooltip" title="" id="downloadImage" onclick="downloadImage(\''+v['s3_link']+'\')" class="btn btn-icon waves-effect waves-light btn-primary text-center" data-original-title="Download Image"><i class="fa fa-download"></i></a>',
                  status : v['status'],
                  riskLevel : v['risk_level'],
                  submittedAt : v['created_at'],
                  updatedAt : v['updated_at']
              };
              newList.push(rebuildData);
          });
      }

      buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
      pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

      $('#'+tableId).find('tbody tr').each(function(){
          var viewImage = $(this).find("td:eq(7)").text();

          if (status=="failed") {
              $(this).find("td:eq(8)").html('');
          }
      });
  }

  function loadSearch(data, message) {
      loadDefaultListing(data, message);
      $('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
      setTimeout(function() {
          $('#searchMsg').removeClass('alert-success').html('').hide();
      }, 3000);
  }

  function downloadImage(imageLinks)
  {
    window.location=imageLinks;
  }
</script>

</body>
</html>
