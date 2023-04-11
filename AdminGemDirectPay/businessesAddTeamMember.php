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
                       <a id="addBackBtn" href="javascript:void(0);" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
                   </div><!-- end col -->
               </div>

               <div class="row">


                <div class="col-lg-12 col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default bx-shadow-none">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    Add Team Member
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">

                                    <form id="customPrice" role="form">
                                        <div class="col-sm-6 px-0">
                                           <div id="telcoError" class="alert alert-danger" style="display: none;"></div>
                                           <div class="col-sm-12 form-group">
                                            <label class="control-label" for="" data-th="#">Name <span class="text-danger">*</span></label>
                                            <input id="employee_name" type="text" class="form-control" dataName="" dataType="text">
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label class="control-label" for="" data-th="#">Mobile Number <span class="text-danger">*</span></label>
                                            <input id="mobileNo" type="text" class="form-control" dataName="" dataType="text">
                                        </div>


                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 my-4 px-0">
                    <button id="add" type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
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

<!-- <script>
    $(".select2").select2();

    //Date range picker
    jQuery('#date-range').datepicker({
                toggleActive: true,
                format: 'dd/mm/yyyy'
    });
</script> -->

<script>
    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqBusinesses.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var formData       = "";
    var fCallback      = "";

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
            // var redirectData = employeeID;
            $(this).children().attr({href:"javascript:void(0);", onClick:"redirectBreadcrumb(\""+oldLink+"\");"});
        }
    });

    function redirectBreadcrumb(link,data){
        if (data) {
            $.redirect(link, {id: businessID,employee_id: data});
        }else{
            $.redirect(link, {id: businessID});
        }
    }

    $(document).ready(function() {

        if (!businessID) {
            window.ajaxEnabled = false;
            showMessage("Business Not Found, Please try again. ", 'danger', 'Some error occured', "", 'businesses.php');
        }

        $('#addBackBtn').click(function() {
            $.redirect("businessesTeamMember.php", {id: businessID});
        });

        $("#m_timepicker_1, #m_timepicker_1_modal").timepicker()

        $('#employee_mobile').on('input', function (event) {  
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        $('#add').click(function() {
            // console.log($('.timeFrom').val());

            $('.error-danger').hide();


            if( $('input#employee_name').val() == ''){
                $('input#employee_name').after('<span class="error-danger">Please enter team member name.</span>');
                $('html, body').animate({
                    scrollTop: $("#employee_name").offset().top-160
                }, 500);
                $('input#name').focus();
            }else if( $('input#mobileNo').val() == ''){
                $('input#mobileNo').after('<span class="error-danger">Please enter mobile number.</span>');
                $('html, body').animate({
                    scrollTop: $("#mobileNo").offset().top-160
                }, 500);
                $('input#mobileNo').focus();
            }
            else{
                var employee_name   = $('#employee_name').val();
                var employee_mobile   = "+" + $('#mobileNo').val();

                // var hoursFrom   = $('#hoursFrom').val();
                // var hoursTo   = $('#hoursTo').val();

                var formData = {
                    'command'    : 'adminUserAddTeamMember',
                    'employee_name'  : employee_name,
                    'employee_mobile'  : employee_mobile,
                    'businessID' : businessID
                    
                };

                // console.log(formData);

                fCallback = sendAdd;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });
    });

    function sendAdd(data, message) {
        showMessage(message, 'success', 'Successfully Added', '', ['businessesTeamMember.php', {id: businessID}]);
    }
</script>