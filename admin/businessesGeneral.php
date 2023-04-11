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

                <div id="" class="col-lg-12 col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default bx-shadow-none">
                            <div id="" class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    Business Details
                                    <span id="activated" name="1" class="pull-right text-danger"></span>
                                </h4>
                            </div>

                            <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="row">
                                        <div id="" class="col-sm-12">
                                            <!-- <div class="col-sm-6 form-group">
                                                <div class="mb-3">
                                                    <span>Business Name :</span>
                                                    <b id="business_name" class="ml-2"></b>
                                                </div>

                                            </div> -->

                                            <div class="col-sm-6 form-group">
                                                <div class="mb-3">
                                                    <span>Business ID :</span>
                                                    <b id="business_id" class="ml-2"></b>
                                                </div>

                                            </div>

                                            <div class="col-sm-6 form-group">
                                                <div class="mb-3">
                                                    <span>Business Email :</span>
                                                    <b id="business_email" class="ml-2"></b>
                                                </div>

                                            </div>

                                            

                                            <div class="col-sm-6 form-group">
                                                <div class="mb-3">
                                                    <span>Credit Balance :</span>
                                                    <b id="creditBalance" class="ml-2"></b>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 form-group">
                                                <div class="mb-3">
                                                    <span>Device ID :</span>
                                                    <b id="device_id" class="ml-2"></b>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 form-group">
                                                <div class="mb-3">
                                                    <span>Sign Up Through :</span>
                                                    <b id="signUpThrough" class="ml-2"></b>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 form-group utmTracking" style="display: none;">
                                                <div class="mb-3">
                                                    <span>UTM Source :</span>
                                                    <b id="utm_source" class="ml-2"></b>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 form-group utmTracking" style="display: none;">
                                                <div class="mb-3">
                                                    <span>UTM Medium :</span>
                                                    <b id="utm_medium" class="ml-2"></b>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 form-group utmTracking" style="display: none;">
                                                <div class="mb-3">
                                                    <span>UTM Campaign :</span>
                                                    <b id="utm_campaign" class="ml-2"></b>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 form-group utmTracking" style="display: none;">
                                                <div class="mb-3">
                                                    <span>UTM Term :</span>
                                                    <b id="utm_term" class="ml-2"></b>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default bx-shadow-none">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    Basic Info
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div id="searchForm" class="text-center alert" style="display: none;"></div>
                                    <form id="clientProfile" role="form">

                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-6">
                                                <label class="control-label" data-th="#">Business Name</label>
                                                <div class="form-group">
                                                    <div>
                                                        <input id="business_name" dataName="business_name" dataType="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label class="control-label" data-th="#">Mobile Number</label>
                                                <div class="form-group">
                                                    <div>
                                                        <input id="mobile" dataName="mobile" dataType="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-sm-12 px-0">
                                         <!-- <div class="col-sm-6 form-group">
                                            <label class="control-label">Credit Balance</label>
                                            <input id="creditBalance" dataName="creditBalance" dataType="text" class="form-control">
                                        </div> -->
                                        <div class="col-sm-6">
                                            <label class="control-label">Country</label>
                                            <select id="business_country" class="form-control" dataName="business_country" dataType="text">
                                                <option value="">Select a country</option>
                                                <?php include 'countryList.php'; ?>
                                            </select>
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Referral ID</label>
                                            <input id="referral_id" dataName="referral_id" dataType="text" class="form-control">
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default bx-shadow-none">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                Activity
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                <form id="" role="form">
                                    <div class="col-sm-6 px-0">
                                        <div class="col-sm-6 form-group mb-0">
                                            <div class="mb-3">
                                                <span>Sign Up Date :</span>
                                                <b id="created_date" class="ml-2"></b>
                                            </div>
                                            <!-- <div class="mb-3">
                                                <span>Last Login :</span>
                                                <b id="last_login" class="ml-2">-</b>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col-sm-6 px-0">
                                        <div class="col-sm-6 form-group mb-0">
                                            <div class="mb-3">
                                                <span>Last Purchase :</span>
                                                <b id="last_purchase" class="ml-2"></b>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default bx-shadow-none">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                Account Status
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                <form id="accountStatus" role="form">
                                    <div class="col-sm-12 px-0">
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Freeze</label>
                                            <select id="freeze" class="form-control" dataName="freeze" dataType="select">
                                                <option value="true">On</option>
                                                <option value="false">Off</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default bx-shadow-none">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                Remark
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                <form id="clientRemark" role="form">
                                    <div class="col-sm-12 px-0">
                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Description</label>
                                            <textarea id="description" dataName="description" dataType="text"  class="form-control"></textarea>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 my-3 px-0">
                    <button id="updated" type="submit" class="btn btn-primary waves-effect waves-light mt-1">Save Changes</button>
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


</body>
</html>

<script>
  
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

        fCallback = loadDefaultListing;
        formData  = {command: 'adminGetUserDetails',
        businessID : businessID };
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
        
    });


    function loadDefaultListing(data, message) {
        // console.log(data);
        $('#business_name').text(data.business_name);
        $('#business_email').text(data.business_email);
        $('#business_id').text(data.business_id);
        $('#creditBalance').text(data.business_credit).digits();
        $('#created_date').text(data.created_date);
        // $('#last_login').text(data.last_login);
        $('#last_purchase').text(data.last_purchase);
        $('#mobile').val(data.mobile);
        $('#business_country').val(data.business_country);
        $('#referral_id').val(data.referral_id);
        $('#freeze').val(data.freeze);
        $('#description').val(data.description);
        $('#business_name').val(data.business_name);
        if (data.device_id) {
            $('#device_id').text(data.device_id);
        }else{
            $('#device_id').text('-');
        }
        
        if (data.utm_campaign=="-" || !data.utm_campaign) {
            $('#signUpThrough').text("Normal");
           
        }else{
            $('#signUpThrough').text("Landing Page");
            $('#utm_source').text(data.utm_source);
            $('#utm_medium').text(data.utm_medium);
            $('#utm_campaign').text(data.utm_campaign);
            $('#utm_term').text(data.utm_term);
            
            $('.utmTracking').show();
        }
        

    }

    $(document).ready(function(){

        $('#updated').click(function(){
                            //insert input ID and value here

                var mobile = $('input#mobile').val();
                // var creditBalance = $('input#creditBalance').val();
                var referral_id = $('input#referral_id').val();
                var business_country = $('#business_country option:selected').val();
                var freeze = $('#freeze option:selected').val();
                var description = $('textarea#description').val();
                // var businessID = "<?php echo $_POST['id']; ?>";
                var business_name = $('#business_name').val();

                
                //callback function and send ajax
                fCallback = updatedDetails;
                formData  = {
                    command: 'adminEditUser',
                    mobile : mobile,
                    business_country : business_country,
                    referral_id : referral_id,
                    freeze : freeze,
                    description : description,
                    business_id : businessID,
                    business_name : business_name


                };
                // console.log(formData)
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                function updatedDetails(data,message){
                        // console.log(data);
                        showMessage(message, 'success', 'Success!', "", ['businessesGeneral.php', {id: businessID}]);
                    }

            });

    });



</script>
