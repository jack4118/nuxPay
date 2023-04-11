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

                <?php include("resellerSidebar.php"); ?>

                <div id="" class="col-lg-12 col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default bx-shadow-none">
                            <div id="" class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    Reseller Details
                                    <span id="activated" name="1" class="pull-right text-danger"></span>
                                </h4>
                            </div>

                            <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="row">
                                        <div id="" class="col-sm-12">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <span>ID: </span>
                                                    <b id="resellerID" class="ml-2">R00001</b>
                                                </div>

                                                <div class="mb-3">
                                                    <span>Business Name: </span>
                                                    <b id="businessName" class="ml-2">MCD</b>
                                                </div>

                                            </div>

                                            <div class="col-sm-6 form-group">
                                                <div class="mb-3">
                                                    <span>Email: </span>
                                                    <b id="resellerEmail" class="ml-2">mcd@hotmail.com</b>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default bx-shadow-none">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    Basic Info
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div id="searchForm" class="text-center alert" style="display: none;"></div>
                                    <form id="clientProfile" role="form">

                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-6">
                                                <label class="control-label" data-th="#">Mobile Number</label>
                                                <div class="form-group">
                                                    <div>
                                                        <input id="mobileNumber" dataName="mobileNumber" dataType="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label class="control-label">Country</label>
                                                <select id="countryList" class="form-control" dataName="countryList" dataType="select">
                                                    <option value="1">All</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-sm-12 px-0">
                                         <div class="col-sm-6 form-group">
                                            <label class="control-label">Credit Balance</label>
                                            <input id="creditBalance" dataName="creditBalance" dataType="text" class="form-control">
                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label class="control-label">Referral ID</label>
                                            <input id="referralId" dataName="referralId" dataType="text" class="form-control">
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default bx-shadow-none">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                Activity
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                <form id="" role="form">
                                    <div class="col-sm-6 px-0">
                                        <div class="col-sm-6 form-group mb-0">
                                            <div class="mb-3">
                                                <b id="signUpDate" class="ml-2"></b>
                                            </div>
                                            <div class="mb-3">
                                                <b id="lastLogin" class="ml-2"></b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 px-0">
                                        <div class="col-sm-6 form-group mb-0">
                                            <div class="mb-3">
                                                <b id="lastPurchase" class="ml-2"></b>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

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
                                            <label class="control-label">Freeze</label>
                                            <select id="freezed" class="form-control" dataName="freezed" dataType="select">
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
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
                                            <label class="control-label">Description</label>
                                            <textarea id="remark" dataName="remark" dataType="text"  class="form-control"></textarea>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 my-3 px-0">
                    <button id="saveChanges" type="submit" class="btn btn-primary waves-effect waves-light mt-1">Save Changes</button>
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
