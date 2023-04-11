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
                                                            <input id="username" type="text" class="form-control" value="" readonly>
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Nickname</label>
                                                            <span class="text-danger">*</span>
                                                            <input id="name" type="text" class="form-control" value="">
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Email</label>
                                                            <input id="email" type="text" class="form-control" value="">
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Distributor</label>
                                                            <select id="dropdownDistributor" class="form-control select2 select2-multiple">
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Created On</label>
                                                            <span class="text-danger">*</span>
                                                            <input id="created_on" type="text" class="form-control" value="" readonly>
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
        var id = "<?php echo $_POST['id']; ?>";

        $(document).ready(function() {
            // callAdminRoles()
            getAdminDetails()

        });

        function getAdminDetails() {
            var formData = {
                command: 'adminResellerGetDetails',
                id: id,

            };
            var fCallback = loadAdminDetails;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        }

        function loadAdminDetails(data, message) {
            var adminDetails = data;
            var username = adminDetails.username;
            var name = adminDetails.name;
            var email = adminDetails.email;
            var created_on = adminDetails.created_at;
            var distributor_username = adminDetails.distributor_username;
            var distributor_list = adminDetails.distributor_list;
            var login_userID =  "<?php echo $_SESSION['userRoleID']; ?>";

            // Don't populate list if user isn't admin
			$("<option/>", {
				value: "null",
				html: "-"
			}).appendTo($("#dropdownDistributor"));

			for(var distributor of distributor_list){
				$("<option/>", {
					value: distributor.username,
					html: distributor.username
				}).appendTo($("#dropdownDistributor"))
			};
           

            $("#dropdownDistributor").val(String(distributor_username));
            $("#username").val(username);
            $("#name").val(name);
            $("#email").val(email);          
            $("#created_on").val(created_on);            


        }

        $('#editAdminBtn').click(function() {

            var username    = $('#username').val();
            var nickname    = $('#name').val();
            var email       = $('#email').val();
            var distributor_username = $('#dropdownDistributor option:selected').val();

            formData = {
                command: 'resellerEditDetails',
                id : id,
                username: username,
                nickname: nickname,                
                email: email,
                distributor_username: distributor_username
            };

            fCallback = loadEditAdminRole;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
        });
        
        function loadEditAdminRole(data,message){

            showMessage(message, 'success', 'Edit Admin Details Successful','' , 'resellerListing.php');
        };

    </script>
