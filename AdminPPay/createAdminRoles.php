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
                        <a id="addBackBtn" href="adminRolesListing.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
                    </div><!-- end col -->
                </div>

                <div class="row">


                    <div class="col-lg-12 col-md-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        Create Admin Roles
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">

                                        <form id="customPrice" role="form">
                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-6 px-0">

                                                    <div id="blogDIV">
                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Role</label>
                                                            <input id="role" type="text" class="form-control" value="">
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Description</label>
                                                            <input id="description" type="text" class="form-control">
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Status</label>
                                                            <select id="dropdownStatus" class="form-control select2 select2-multiple">
                                                                <option dataName="active" value="active">Active</option>
                                                                <option dataName="active" value="disable">Disable</option>
                                                                <option dataName="active" value="suspended">Suspend</option>
                                                            </select>
                                                        </div>

                                                        <!--
                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Role Access</label>
                                                            <div class = "col-sm-offset-0 col-sm-5" id="checkboxDiv"></div>

                                                        </div>
    
-->
                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label" style="text-align:left">Role Access</label>

                                                            <div class="col-sm-offset-0" id="checkboxDiv">


                                                            </div>
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
                            <button id="addRolesBtn" type="submit" class="btn btn-primary waves-effect waves-light">Create</button>
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
        var roleAccess = [];

        $(document).ready(function() {
            callAdminPermission()

        });

        function callAdminPermission() {
            var formData = {
                command: 'adminPermissionListing',

            };
            var fCallback = loadPermissionListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        }

        //        function checkboxFunction() {
        //            if ($('#all').is(":checked")) {
        //                $("input.permission-checkbox").attr("disabled", true);
        //                $("input.permission-checkbox").attr("checked", false);
        //                roleAccess = [];
        //                roleAccess.push($("#all").val());
        //
        //            } else {
        //                $("input.permission-checkbox").removeAttr("disabled");
        //                roleAccess = [];
        //            }
        //
        //
        //        }


        function loadPermissionListing(data, message) {
            var permissionListing = data;

            $.each(permissionListing, function(k, v) {
                var parentID = v['parent_id'];
                var permissionName = v['name'];
                var permissionID = v['id'];


                if (parentID == 0) {
                    var mainMenu = '<div class="checkbox checkbox-primary">' +
                        '<input id="' + permissionID + '" parentID="' + parentID + '" type="checkbox" name="permissions[]" value="' + permissionID + '">' +
                        '<label for="checkbox2">' +
                        permissionName + '</label>' +
                        '</div>';
                    $('#checkboxDiv').append(mainMenu);
                }

                if (parentID != 0) {
                    var childMenu = '<div class="checkbox checkbox-primary">' +
                        '<input id="' + permissionID + '" parentID="' + parentID + '" type="checkbox" name="permissions[]" value="' + permissionID + '">' +
                        '<label for="checkbox2">' +
                        permissionName + '</label>' +
                        '</div>';
                    $('#' + parentID).closest('div').append(childMenu);
                }

                $('input[type="checkbox"]').change(function() {
                    if (this.checked === true) {
                        $('#' + $(this).attr('parentID')).prop('checked', this.checked);

                        if ($('#' + $(this).attr('parentID')).attr('parentID') != 0) {
                            $('#' + $('#' + $(this).attr('parentID')).attr('parentID')).prop('checked', this.checked);
                        }
                    }

                    $('input[parentID="' + this.id + '"]').prop('checked', this.checked);
                });
            });


        }


        $('#addRolesBtn').click(function() {

            var role = $('#role').val();
            var description = $('#description').val();
            var status = $('#dropdownStatus option:selected').val();

            $("input[type='checkbox']").each(function() {
                if ($(this).is(":checked")) {
                    roleAccess.push($(this).val());
                }

            });
          
            formData = {
                command: 'adminCreateRoles',
                name: role,
                description: description,
                status: status,
                role_access: roleAccess,

            };
            fCallback = loadCreateAdminRole;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });

        function loadCreateAdminRole(data, message) {
            showMessage(message, 'success', 'Added Admin Role', '', 'adminRolesListing.php');
        };

    </script>
