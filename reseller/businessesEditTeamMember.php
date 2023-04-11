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
                       <a id="editBackBtn" href="javascript:void(0);" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
                   </div><!-- end col -->
               </div>

               <div class="row">


                <div class="col-lg-12 col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default bx-shadow-none">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    Edit Team Member
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">

                                    <form id="customPrice" role="form">
                                        <div class="col-sm-6 px-0">
                                           <div id="telcoError" class="alert alert-danger" style="display: none;"></div>
                                           <div class="col-sm-12 form-group">
                                            <label class="control-label" for="" data-th="#">Name <span class="text-danger">*</span></label>
                                            <input id="employee_name" type="text" class="form-control" dataName="" dataType="text" value="">
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label class="control-label" for="" data-th="#">Mobile Number</label>
                                            <input id="employee_mobile" type="text" class="form-control" dataName="" dataType="text" value="" disabled>
                                        </div>


                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 my-4 px-0">
                    <button id="edit" type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
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
                toggleActive: true
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
    var employeeID ="<?php echo $_POST['employee_id']; ?>";
    var businessID = "<?php echo $_POST['id']; ?>";
    var teamMemberid ="<?php echo $_POST['employee_id']; ?>";
    // console.log(businessID);
    // console.log(teamMemberid);

    var parentLink = $('ul.breadcrumb').children();
    var total = $('ul.breadcrumb').children().length;

    $(parentLink).each(function(k,v){
        if (total>=4 && k==total-2) {
            var oldLink = $(this).children().attr("href");
            $(this).children().attr({href:"javascript:void(0);", onClick:"redirectBreadcrumb(\""+oldLink+"\");"});
            // console.log(oldLink);
        }else if(k==total-1){
            var oldLink = $(this).children().attr("href");
            var redirectData = employeeID;
            $(this).children().attr({href:"javascript:void(0);", onClick:"redirectBreadcrumb(\""+oldLink+"\",\""+redirectData+"\");"});
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

        fCallback = loadDefaultListing;
        formData  = {command: 'adminGetTeamMemberDetails',
        businessID : businessID,
        employeeID : employeeID
         };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


    function loadDefaultListing(data, message) {
        // console.log(data);
        $('#employee_name').val(data.employee_name);
        $('#employee_mobile').val(data.employee_mobile);
    }        


        $('#editBackBtn').click(function() {
            $.redirect("businessesTeamMember.php", {id: businessID});
        });

        $("#m_timepicker_1, #m_timepicker_1_modal").timepicker()

        $('#employee_mobile').on('input', function (event) {  
            this.value = this.value.replace(/[^0-9]/g, '');
        });


        $('#edit').click(function() {
            // console.log($('.timeFrom').val());

            $('.error-danger').hide();

            if( $('input#employee_name').val() == ''){
                $('input#employee_name').after('<span class="error-danger">Please enter team member name.</span>');
                $('html, body').animate({
                    scrollTop: $("#employee_name").offset().top-160
                }, 500);
                $('input#name').focus();
            }
            else{
                var employee_name   = $('#employee_name').val();
                var employee_id   = $('#employee_mobile').val();

                var formData = {
                    'command'    : 'adminUserEditTeamMember',
                    'employee_id'  : teamMemberid,
                    'employee_name'  : employee_name,
                    'businessID' : businessID
                };

                // console.log(formData);

                fCallback = sendEdit;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });
    });

    function sendEdit(data, message) {
        showMessage(message, 'success', 'Successfully Editted', '', ['businessesTeamMember.php', {id: businessID}]);
    }
</script>