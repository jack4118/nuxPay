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
                                        Create User
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">

                                        <form id="createUserForm" role="form">
                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-6 px-0">

                                                    <div id="blogDIV">

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
                                                            <div class="input-group">
                                                                <span id="telAddon" class="input-group-addon"></span>
                                                                </span> 
                                                                <input id="mobile" class="form-control" type="text">
                                                            </div>
                                                            <!-- <input id="mobile" type="text" class="form-control" value=""> -->
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Email</label>
                                                            <form>
                                                                <input id="email" type="text" class="form-control" autocomplete="off">
                                                            </form>
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Business Name</label>
                                                            <span class="text-danger">*</span>
                                                            <form>
                                                                <input id="name" type="text" class="form-control" autocomplete="off">
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
                                                            <label class="control-label">Re-type Password</label>
                                                            <span class="text-danger">*</span>
                                                            <input id="retype_password" type="password" class="form-control">
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Site</label>
                                                            <span class="text-danger">*</span>
                                                            <select id="site" class="form-control"></select>
                                                        </div>


                                                        <?php if ($_SESSION['userType']=="distributor") { ?>
                                                                
                                                            <div class="col-sm-12 form-group">
                                                            <label class="control-label">Distributor Username</label>
                                                            <form>
                                                                <input id="distributor" type="text" class="form-control" autocomplete="off" value="<?php echo $_SESSION['username']; ?>" readonly>
                                                            </form>
                                                            </div>

                                                        <?php } else if($_SESSION['userType']=="reseller") { ?>

                                                            <div class="col-sm-12 form-group">
                                                            <label class="control-label">Distributor Username</label>
                                                            <form>
                                                                <input id="distributor" type="text" class="form-control" autocomplete="off" value="<?php echo $_SESSION['distributor_username']; ?>" readonly>
                                                            </form>
                                                            </div>

                                                        <?php } else { ?>
                                                          
                                                            <div class="col-sm-12 form-group">
                                                            <label class="control-label">Distributor Username</label>
                                                            <form>
                                                                <input id="distributor" type="text" class="form-control" autocomplete="off">
                                                            </form>
                                                            </div>

                                                        <?php } ?>


                                                         <?php if ($_SESSION['userType']=="reseller") { ?>
                                                                
                                                            <div class="col-sm-12 form-group">
                                                            <label class="control-label">Reseller Username</label>
                                                            <form>
                                                                <input id="reseller" type="text" class="form-control" autocomplete="off" value="<?php echo $_SESSION['username']?>" readonly>
                                                            </form>
                                                            </div>

                                                        <?php } else { ?>
                                                          
                                                           <div class="col-sm-12 form-group">
                                                            <label class="control-label">Reseller Username</label>
                                                            <form>
                                                                <input id="reseller" type="text" class="form-control" autocomplete="off">
                                                            </form>
                                                            </div>

                                                        <?php } ?>
                                                        

                                                        

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

            callGetSiteList();

            $("#telAddon").text($("#country").val());

            $("#country").change(function(){
                $("#telAddon").text($(this).val());
            });

        });

        $('#addUserBtn').click(function() {
            var country_code = $("#telAddon").text();
            var mobile = country_code + $('#mobile').val();
            var name = $('#name').val();
            var password = $('#password').val();
            var retype_password = $('#retype_password').val();
            var country = $('#country option:selected').attr('data-text');

            var distributor = $('#distributor').val();
            var reseller = $('#reseller').val();
            var site = $('#site').val();
            var email = $("#email").val();
            
            formData = {
                command: 'adminNuxpayCreateUser',
                mobile: mobile,
                nickname: name,
                pay_password: password,
                pay_retype_password: retype_password,
                country: country,
                distributor: distributor,
                reseller: reseller,
                site: site,
                email: email,
                country_code: country_code
            };
            
            fCallback = loadCreateUser;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });

        function loadCreateUser(data, message) {
            showMessage(message, 'success', 'Added Nuxpay User', '', 'merchantListing.php');
        };

        function callGetSiteList() {

            formData = {
                command: 'adminGetSites',
                site: '<?php echo $config["companyName"];?>'
            };

            fCallback = loadSiteOption;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        }

        function loadSiteOption(data, message) {
            var option = "";
            $.each(data, function(k, v) {
                option+=`<option value="${v}">${v}</option>`;
            });
            $("#site").html(option);
        }

    </script>
