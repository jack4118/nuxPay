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
                       <a href="resellerListing.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                        <i class="md md-add"></i>
                        Back
                    </a>
                </div><!-- end col -->
            </div>

            <div class="row">

                <!-- <?php include("businessesSidebar.php"); ?> -->

                <div id="" class="col-lg-12 col-md-12">
                    <!-- <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default bx-shadow-none">
                            <div id="clientStatus" class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    User Details
                                    <span id="activated" name="1" class="pull-right text-danger"></span>
                                </h4>
                            </div>

                            <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="row">
                                        <div id="clientDetails" class="col-sm-12">
                                            <div class="col-sm-6 form-group">
                                                <div class="mb-3">
                                                    <span>ID :</span>
                                                    <b name="client_id" class="ml-2">0002</b>
                                                </div>
                                                <div class="mb-3">
                                                    <span>Company Name :</span>
                                                    <b name="type" class="ml-2">red red</b>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 form-group">
                                                <div class="mb-3">
                                                    <span>Email :</span>
                                                    <b name="country" class="ml-2">redred@ttwoweb.com</b>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
<!-- 
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default bx-shadow-none">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    Basic Info
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                    <form id="clientProfile" role="form">

                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-6">
                                                <label class="control-label" data-th="#">Mobile Number</label>
                                                <div class="form-group">
                                                    <div>
                                                        <input id="mobileNumber" name="mobileNumber" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label class="control-label" data-th="#">Country</label>
                                                <select id="monthlyVolume" class="form-control">
                                                    <option value="">Malaysia</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-sm-12 px-0">
                                           <div class="col-sm-6 form-group">
                                            <label class="control-label" for="" data-th="#">Credit Balance</label>
                                            <input id="client_email" name="client_email" type="text" class="form-control">
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label class="control-label" for="" data-th="#">Referral ID</label>
                                            <input id="client_phone" name="client_phone" type="text" class="form-control">
                                        </div>
                                    </div>

                        </form>

                    </div>
                </div>
            </div>
        </div> -->

 <!--        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default bx-shadow-none">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        Activity
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                        <form id="clientActivity" role="form">
                            <div class="col-sm-6 px-0">
                                <div class="col-sm-6 form-group mb-0">
                                    <div class="mb-3">
                                        <span>Sign Up Date :</span>
                                        <b name="created_at" class="ml-2">13/08/2018 19:28:53</b>
                                    </div>
                                    <div class="mb-3">
                                        <span>Last Login :</span>
                                        <b name="last_send" class="ml-2">13/08/2018 19:28:53</b>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 px-0">
                                <div class="col-sm-6 form-group mb-0">
                                    <div class="mb-3">
                                        <span>Last Purchase :</span>
                                        <b name="last_login" class="ml-2">13/08/2018 19:28:53</b>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div> -->

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
                                    <label class="control-label" for="" data-th="#">Freeze</label>
                                    <select id="freezed" class="form-control">
                                        <option value="0">On</option>
                                        <option value="1">Off</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
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
                                <div class="col-sm-8 form-group">
                                    <label class="control-label" for="" data-th="#">Description</label>
                                    <textarea id="remark" name="remark" class="form-control"></textarea>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div> -->

        <div class="col-sm-12 my-3 px-0">
            <button id="editClientDetailsBtn" type="submit" class="btn btn-primary waves-effect waves-light mt-1">Save Changes</button>
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
