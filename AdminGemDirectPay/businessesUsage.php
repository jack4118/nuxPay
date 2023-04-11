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
                                                        <label class="control-label">Date Range</label>
                                                        <div class="input-group input-daterange" data-date-format="dd/mm/yyyy" data-date-end-date="0d" data-date-today-highlight="true" data-date-orientation="auto">
                                                            <input id="fromDate" type="text" class="form-control" placeholder="From" dataName="date_search" dataType="dateRange"/>
                                                            <span class="input-group-addon">
                                                                To
                                                            </span>
                                                            <input id="toDate" type="text" class="form-control" placeholder="To" dataName="date_search" dataType="dateRange"/>
                                                        </div>
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

                             <div id="totalUsageDiv" class="form-group" style="display: none;">
                                                                <label>Total Usage :</label>
                                                                <b id="totalUsage"></b>
                                                            </div>

                            <div class="" style="margin-bottom: 50px;">

                                                <form>
                                                    <div id="basicwizard" class="pull-in">
                                                        <div class="tab-content b-0 m-b-0 py-0">
                                                            <div id="alertMsg" class="alert" style="display: none;"></div>
                                                            <div id="userUsageListDiv" class="table-responsive">
                                                            </div>

                                                <span id="paginateText"></span>
                                                <div class="text-center">
                                                    <ul class="pagination pagination-md" id="pageruserUsageList">
                                                    </ul>
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

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

<script>
    var divId    = 'userUsageListDiv';
    var tableId  = 'userUsageListTable';
    var pagerId  = 'pageruserUsageList';
    var btnArray = {};
    var thArray  = Array('Date',
                         'Total Usage'
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


//Load table listing and data

    var businessID = "<?php echo $_POST['id']; ?>";  
    // console.log(businessID);

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
    
        // businessID = $("#businessID").val();
        // businessName = $("#businessName").val();
        // email = $("#email").val();
        // mobileNo = $("#mobileNo").val();
        // country = $("#country").val();

        fCallback = loadDefaultListing;
        formData  = {
            command: 'adminGetUserUsageHistory',
            businessID: businessID,
            order: 'descending'
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
        var to_datetime = dateToTimestamp($("#toDate").val());
        //fix date return false crashing pagination
        if(from_datetime == false){
            from_datetime = 0;
        }
        if(to_datetime == false){
            to_datetime = 0;
        }
         // var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "adminGetUserUsageHistory",
            page  : pageNumber,
            businessID : businessID,
            to_datetime   : to_datetime,
            from_datetime   : from_datetime
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        // console.log(data)

        if (data.total_usage!="") {
            $("#totalUsage").text(data.totalUsage).digits();
        }else{
            $("#totalUsage").text("-");
        }

        var usageList = data.data;
        var tableNo;

        if (usageList) {
            $("#totalUsageDiv").show();
            // if(usageList.length>0){
                var newList = [];
                $.each(usageList, function(k,v){
               
                    var rebuildData ={
                                    date : v['datetime'],
                                    totalUsage : v['total_usage'],
                                };
                    newList.push(rebuildData);
                });
            // }
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId).find('tbody tr').each(function(){
           // $(this).find('td:eq(1)').css("text-align", "right");
           $(this).find('td:eq(1)').digits();
        });

    }
    
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }
   


    </script>

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



</body>
</html>
