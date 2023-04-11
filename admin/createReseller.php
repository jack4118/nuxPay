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

                    <div class="col-lg-12 col-md-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        Create Reseller
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">

                                        <form id="createUserForm" role="form">
                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-6 px-0">

                                                    <div id="blogDIV">

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Username</label>
                                                            <span class="text-danger">*</span>
                                                            <form>
                                                                <input id="username" type="text" class="form-control" autocomplete="off">
                                                            </form>
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Nickname</label>
                                                            <span class="text-danger">*</span>
                                                            <form>
                                                                <input id="nickname" type="text" class="form-control" autocomplete="off">
                                                            </form>
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Email</label>
                                                            <span class="text-danger">*</span>
                                                            <form>
                                                                <input id="email" type="text" class="form-control" autocomplete="off">
                                                            </form>
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Password</label>
                                                            <span class="text-danger">*</span>
                                                            <form>
                                                                <input id="password" type="password" class="form-control" autocomplete="off">
                                                            </form>
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Confirm Password</label>
                                                            <span class="text-danger">*</span>
                                                            <form>
                                                                <input id="confirm_password" type="password" class="form-control" autocomplete="off">
                                                            </form>
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Country</label>
                                                            <span class="text-danger">*</span>
                                                            <form>
                                                                <select id="country" autocomplete="off" class="form-control">
                                                                    <?php include 'countryList.php'; ?>
                                                                </select>
                                                            </form>
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Phone Number</label>
                                                            <span class="text-danger">*</span>
                                                            <div class="input-group">
                                                                <span id="telAddon" class="input-group-addon"></span>
                                                                </span> 
                                                                <input id="mobile" class="form-control" type="text">
                                                            </div>
                                                            <!-- <input id="mobile" type="text" class="form-control" value=""> -->
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Distributor</label>
                                                            <input id="distributor" class="form-control" type="text">
                                                            <!-- <input id="mobile" type="text" class="form-control" value=""> -->
                                                        </div>

                                                        <!--<div class="col-sm-12 form-group">
                                                            <label class="control-label">Mobile_no</label>
                                                            <span class="text-danger">*</span>
                                                            <form>
                                                                <input id="mobile_no" type="text" class="form-control" autocomplete="off">
                                                            </form>
                                                        </div>-->

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Site</label>
                                                            <span class="text-danger">*</span>
                                                            <select id="site" class="form-control"></select>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-12 my-4 px-0">
                                <button id="addUserBtn" class="btn btn-primary waves-effect waves-light">Create</button>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- End row -->

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
        var url = 'scripts/reqUser.php';
        var method = 'POST';
        var debug = 0;
        var bypassBlocking = 0;
        var bypassLoading = 0;
        var pageNumber = 1;
        var formData = "";
        var fCallback = "";



        $(document).ready(function() {

			$('#username').on('keypress', function(e) {
				if (e.which == 32){
					return false;
				}
			});
			
            formData = {
                command: 'adminGetSites'
            };

            fCallback = loadSiteOption;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $("#telAddon").text($("#country").val());

            $("#country").change(function(){
                $("#telAddon").text($(this).val());
            });

        });

        $('#addUserBtn').click(function() {

            var username = $("#username").val();
            var nickname = $("#nickname").val();
            var email = $("#email").val();
            var password = $("#password").val();
            var confirm_password = $("#confirm_password").val();
            var mobile_no = $("#telAddon").text() + $('#mobile').val();
            var site = $("#site").val();
            var distributor = $("#distributor").val();

            formData = {
                command: 'adminResellerCreateReseller',
                username: username,
                nickname: nickname,
                email: email,
                password: password,
                confirm_password: confirm_password,
                distributor: distributor,
                mobile_no: mobile_no,
                site: site
            };

            fCallback = loadCreateUser;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });

        function loadSiteOption(data, message) {
            var option = "";
            $.each(data, function(k, v) {
                option+=`<option value="${v}">${v}</option>`;
            });
            $("#site").html(option);
        }

        function loadCreateUser(data, message) {
            showMessage(message, 'success', 'Added new reseller', '', 'resellerListing.php');
        };

    </script>
