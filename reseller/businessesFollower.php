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
                                                <form>
                                                    <div id="basicwizard" class="pull-in">
                                                        <div class="tab-content b-0 m-b-0 py-0">
                                                            <div class="form-group" style="">
                                                                <b id="totalFollower"></b>
                                                            </div>
                                                            <div id="alertMsg" class="alert" style="display: none;"></div>
                                                            <div id="followerDiv" class="table-responsive">
                                        
                                                            </div>

                                                <span id="paginateText">Showing 1 - 10 of 10 records.</span>
                                                <div class="text-center">
                                                    <ul class="pagination pagination-md" id="pagerFollower">
  
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
  var divId    = 'followerDiv';
  var tableId  = 'followerTable';
  var pagerId  = 'pagerFollower';
  var btnArray = {};
  var thArray  = Array('Name',
   'Mobile Number',
   );

  // var businessID = "<?php echo $_POST['id']; ?>";  

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
            command: 'adminGetUserFollow',
            businessID: businessID
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
            command     : "adminGetUserFollow",
            page  : pageNumber,
            businessID : businessID
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        // console.log(data)
        var followerList = data.data;
        var tableNo;

        if (followerList) {
            var newList = [];
            $.each(followerList, function(k,v){
              
                 var rebuildData ={
                    name : v['user_username'],
                    mobileNumber : v['business_phone_number'],
                };
                newList.push(rebuildData);
            });

        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }
    
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }
   


    </script>


</body>
</html>
