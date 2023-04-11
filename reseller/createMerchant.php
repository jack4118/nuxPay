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
                        <a id="addBackBtn" href="merchantListing.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
                    </div><!-- end col -->
                </div>

                <div class="row">


                    <div class="col-lg-12 col-md-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        Create User
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
                                                            <input id="username" type="text" class="form-control" value="">
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Nickname</label>
                                                            <input id="nickname" type="text" class="form-control">
                                                        </div>

                                                  <!--       <div class="col-sm-12 form-group">
                                                            <label class="control-label">Email(optional)</label>
                                                            <input id="email" type="text" class="form-control">
                                                        </div> -->

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Password</label>
                                                            <input id="password" type="password" class="form-control">
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Re-type Password</label>
                                                            <input id="retype_password" type="password" class="form-control">
                                                        </div>

                                                        <!-- <div class="col-sm-12 form-group">
                                                            <label class="control-label">Role</label>
                                                            <select id="dropdownRole" class="form-control select2 select2-multiple"></select>
                                                        </div> -->

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Status</label>
                                                            <select id="dropdownStatus" class="form-control select2 select2-multiple">
                                                                <option dataName="active" value ="active">Active</option>
                                                                <option dataName="active" value ="disable">Disable</option>
                                                                <!-- <option dataName="active" value ="suspended">Suspend</option> -->
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Reseller</label>
                                                            <?php if($_SESSION['userType']=="reseller") { ?>
                                                            <input id="reseller" type="text" class="form-control" value="<?php echo $_SESSION['username']; ?>" readonly>
                                                            <?php } else { ?>
                                                            <input id="reseller" type="text" class="form-control">
                                                            <?php } ?>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 my-4 px-0">
                            <button id="addAdminBtn" type="submit" class="btn btn-primary waves-effect waves-light">Create</button>
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
        var url = 'scripts/reqAdmin.php';
        var method = 'POST';
        var debug = 0;
        var bypassBlocking = 0;
        var bypassLoading = 0;
        var pageNumber = 1;
        var formData = "";
        var fCallback = "";

        $(document).ready(function() {

            // callAdminRole();

        });


        // function callAdminRole() {
        //     var formData = {
        //         command: 'adminRolesListing',

        //     };

        //     var fCallback = loadRoleListing;

        //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // }

        // function loadRoleListing(data, message) {
        //     var roleListing = data;

        //     $.each(roleListing, function(k, v) {

        //         $('#dropdownRole').append('<option dataName="' + v['name'] + '" value="' + v['id'] + '">' + v['name'] + '</option>')

        //     });

        // }



        $('#addAdminBtn').click(function() {
            var mobile_no = $('#username').val();
            var nickname = $('#nickname').val();
            //var email = $('#email').val();
            var password = $('#password').val();
            var confirm_password = $('#retype_password').val();
            // var role = $('#dropdownRole option:selected').val();
            var status = $('#dropdownStatus option:selected').val();

            var reseller = $('#reseller').val();

            formData = {
                command             : 'resellerCreateMerchant',
                mobile_no            : mobile_no,
                nickname            : nickname,
                //email               : email,
                password            : password,
                confirm_password    : confirm_password,
                // role_id: role,
                status: status,
                reseller: reseller

            };
            // console.log(formData)
            fCallback = loadCreateAdmin;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });
        
        function loadCreateAdmin(data,message){
            // console.log(data);
            showMessage(message, 'success', 'Added User','' , 'merchantListing.php');
        };


    </script>
