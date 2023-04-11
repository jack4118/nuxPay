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
                <!--

                <div class="row">
                    <div class="col-sm-4">
                        <a id="addBackBtn" href="news.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
                    </div> end col 
                </div>
-->

                <div class="row">


                    <div class="col-lg-12 col-md-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        Edit User Details
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">

                                        <form id="customPrice" role="form">
                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-6 px-0">

                                                    <div id="blogDIV">
                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Username</label>
                                                            <span class="text-danger">*</span>
                                                            <input id="name" type="text" class="form-control" value="">
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Roles</label>
                                                            <select id="dropdownRoles" class="form-control select2 select2-multiple">
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Status</label>
                                                            <span class="text-danger">*</span>
                                                            <select id="dropdownStatus" class="form-control select2 select2-multiple">
                                                                <option dataName="active" value="active">Active</option>
                                                                <option dataName="active" value="disable">Disable</option>
                                                                <option dataName="active" value="suspend">Suspend</option>
                                                            </select>
                                                        </div>


                                                        <div class="form-group m-form__group">
                                                            <a id="editAdminBtn" href="javascript:void(0);" class="btn btn-primary waves-effect waves-light" style="" role="button"><?php echo $translations["M01419"][$language]; /* Submit */ ?></a>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                            <!--                                    </div>-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div> <!-- container -->

        </div> <!-- content -->

        <?php include("footer.php"); ?>

    </div>
    <!-- End content-page -->
    <script>
        var resizefunc = [];

    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

    <script>
        // Initialize the arguments for ajaxSend function
        var url = 'scripts/reqAdmin.php';
        var method = 'POST';
        var debug = 0;
        var bypassBlocking = 0;
        var bypassLoading = 0;
        var pageNumber = 1;
        var formData = "";
        var fCallback = "";
        var id = <?php echo $_POST['id']; ?>;

        $(document).ready(function() {
            callAdminRoles()
            getAdminDetails()

        });

        function callAdminRoles() {
            var formData = {
                command: 'adminRolesListing',

            };

            var fCallback = loadRolesListing;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        }

        function loadRolesListing(data, message) {
            var rolesListing = data;

            $.each(rolesListing, function(k, v) {

                $('#dropdownRoles').append('<option dataName="' + v['name'] + '" value="' + v['id'] + '">' + v['name'] + '</option>')

            });
            $("#dropdownRoles").val(id);

        }


        function getAdminDetails() {
            var formData = {
                command: 'adminGetAdminDetails',
                id: id,

            };
            var fCallback = loadAdminDetails;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        }

        function loadAdminDetails(data, message) {
            var adminDetails = data;
            var name = adminDetails.name;
            var status = adminDetails.status;
            var role_id = adminDetails.role_id;
            
            $("#name").val(name);
            $("#dropdownStatus").val(status);
            $("#dropdownRoles").val(role_id);

        }

        $('#editAdminBtn').click(function() {
            var name = $('#name').val();
            var role_id = $('#dropdownRoles option:selected').val();
            var status = $('#dropdownStatus option:selected').val();
            
            formData = {
                command: 'adminEditAdminDetails',
                id : id,
                name: name,
                role_id: role_id,
                status: status,

            };

            fCallback = loadEditAdminRole;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
        });
        
        function loadEditAdminRole(data,message){

            showMessage(message, 'success', 'Edit Admin Details Successful','' , 'adminListing.php');
        };

    </script>
