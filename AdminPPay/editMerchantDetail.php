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
                                                            <label class="control-label">Distributor</label>
                                                            <select id="dropdownDistributor" class="form-control select2 select2-multiple">
                                                            </select>
                                                        </div>

                                                        <!-- <div class="col-sm-12 form-group">
                                                            <label class="control-label">Role</label>
                                                            <span class="text-danger">*</span>
                                                            <input id="role" type="text" class="form-control" value="" readonly>
                                                        </div> -->

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Status</label>
                                                            <span class="text-danger">*</span>
                                                            <select id="dropdownStatus" class="form-control select2 select2-multiple">
                                                                <option dataName="active" value="active">Active</option>
                                                                <option dataName="active" value="disable">Disable</option>
                                                                <!-- <option dataName="active" value="suspend">Suspend</option> -->
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Reseller</label>
                                                            <select id="dropdownReseller" class="form-control select2 select2-multiple">
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
        var id = <?php echo $_POST['id']; ?>;
        var login_userID =  "<?php echo $_SESSION['userRoleID']; ?>";

        $(document).ready(function() {
            // callAdminRoles()
            getAdminDetails();

            if(login_userID == 8){
                $("#dropdownDistributor").change(function(){
                    var newDistributor = $('#dropdownDistributor option:selected').val();
                    var formData = {
                        command: "loadResellerOptions",
                        id: id,
                        distributor: newDistributor
                    };
                    fCallback = loadResellerOptions;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                });
            }else{
                $("#dropdownDistributor").attr('disabled', true);
            }

            if(login_userID == 6){
                $("#dropdownDistributor").attr('disabled', true);
                $("#dropdownReseller").attr('disabled', true);
            }
        });

        // function callAdminRoles() {
        //     var formData = {
        //         command: 'adminRolesListing',

        //     };

        //     var fCallback = loadRolesListing;

        //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // }

        // function loadRolesListing(data, message) {
        //     var rolesListing = data;

        //     $.each(rolesListing, function(k, v) {

        //         $('#dropdownRoles').append('<option dataName="' + v['name'] + '" value="' + v['id'] + '">' + v['name'] + '</option>')

        //     });
        //     $("#dropdownRoles").val(id);

        // }

        function getAdminDetails() {
            var formData = {
                command: 'resellerGetMerchantDetails',
                id: id,

            };
            var fCallback = loadAdminDetails;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        }

        function loadAdminDetails(data, message) {
            var username = data.username;
            var name = data.nickname;
            var status = data.status;
            var distributor_list = data.distributor_list;
            var reseller_list = data.reseller_list;
            var reseller = data.reseller_name;
            var created_on = data.created_at;

            $("#dropdownDistributor").append($('<option/>', {
                value: "No Distributor",
                html: "No Distributor"
            }));
            for (var val of distributor_list){
                $('<option/>', {
                        id: val.username,
                        html: val.username
                }).appendTo('#dropdownDistributor');
            }
            $("#dropdownDistributor").val(data.distributor);

            if(data.distributor=="No Distributor") {
                $('<option/>', {
                        id: "",
                        html: "No Reseller"
                }).appendTo('#dropdownReseller');
            }

            for (var val of reseller_list){
                $('<option/>', {
                        id: val.username,
                        html: val.username
                }).appendTo('#dropdownReseller');
            }
console.log("####");
console.log(data.reseller_username);
            if(data.reseller_username=="" || data.reseller_username==null) {
                $("#dropdownReseller").val("No Reseller");
            } else {
                $("#dropdownReseller").val(data.reseller_username);
            }

            $("#username").val(username);
            $("#name").val(name);
            $("#dropdownStatus").val(status);    
            $("#reseller").val(reseller);            
            $("#created_on").val(created_on);            


        }

        $('#editAdminBtn').click(function() {
            // var name = $('#name').val();
            // var role_id = $('#dropdownRoles option:selected').val();
            // var status = $('#dropdownStatus option:selected').val();

            var username    = $('#username').val();
            var nickname    = $('#name').val();
            //var role        = $('#role').val();
            //var email       = $('#email').val();
            var status      = $('#dropdownStatus option:selected').val();
            var reseller = $('#dropdownReseller option:selected').val();

            formData = {
                command: 'resellerEditMerchantDetails',
                id : id,
                username: username,
                nickname: nickname,                
                //email: email,
                status: status,
                reseller: reseller
            };

            fCallback = loadEditAdminRole;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
        });

        function loadResellerOptions(data, message){
            var reseller_options = data;

            var newDistributor = $('#dropdownDistributor option:selected').val();

            $("#dropdownReseller").empty();

            if(newDistributor=="No Distributor") {
                $('<option/>', {
                        id: "",
                        html: "No Reseller"
                }).appendTo('#dropdownReseller');
            }

            for (var val of reseller_options){
                $('<option/>', {
                        id: val.username,
                        html: val.username
                }).appendTo('#dropdownReseller');
            }
        }
        
        function loadEditAdminRole(data,message){

            showMessage(message, 'success', 'Edit Admin Details Successful','' , 'merchantListing.php');
        };

    </script>
