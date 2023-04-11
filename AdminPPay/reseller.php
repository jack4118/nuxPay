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
                    <div class="col-lg-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                            Search
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchForm" role="form">
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" data-th="roleID">
                                                    ID
                                                </label>
                                                <input type="text" class="form-control" dataName="roleID" dataType="text">
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" data-th="BusinessName">
                                                    Business Name
                                                </label>
                                                <input type="text" class="form-control" dataName="BusinessName" dataType="text">
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="" data-th="email">
                                                    Email
                                                </label>
                                                <input type="text" class="form-control" dataName="email" dataType="text">
                                            </div>

                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" data-th="mobileNumber">
                                                    Mobile Number
                                                </label>
                                                <input type="text" class="form-control" dataName="mobileNumber" dataType="text">
                                            </div>
                                            
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" data-th="countryName">
                                                    Country
                                                </label>
                                                <select id="countryName" class="form-control" dataName="countryName" dataType="text">
                                                    <option value="">
                                                        All
                                                    </option>
                                                </select>
                                            </div>
                                        </form>

                                        <div class="col-sm-12 m-t-rem1">
                                            <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                Search
                                            </button>
                                            <button id="resetBtn" type="submit" class="btn btn-default waves-effect waves-light">
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <form>
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="ReselleradminListDiv" class="table-responsive">
                                            <table id="adminListTable" class="table table-striped table-bordered no-footer m-0">
                                             <thead>
                                              <tr>
                                               <th>ID</th>
                                               <th>Business Name</th>
                                               <th>Email</th>
                                               <th>Mobile Number</th>
                                               <th>Country</th>
                                               <th>Freeze</th>
                                               <th>Created At</th>
                                               <th>Last Login</th>
                                               <th></th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                          <tr id="0" data-th="5">
                                           <td>1</td>
                                           <td>company1</td>
                                           <td>user@ttwoweb.com</td>
                                           <td>6012345677</td>
                                           <td>Malaysia</td>
                                           <td>off</td>
                                           <td>2018-09-26 16:15:18</td>
                                           <td>2018-09-26 17:00:59</td>
                                           <td>
                                            <a data-toggle="tooltip" title="" id="edit0" onclick="window.location.href='../resellerBasicInfo.php'" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <span id="paginateText"><!-- Showing 1 - 1 of 1 records. --></span>
                        <div class="text-center">
                            <ul class="pagination pagination-md" id="ResellerpagerAdminList">
                            </ul>
                     </div>
                 </div>
             </div>
         </form>
     </div>
 </div>
</div><!-- End row -->

</div> <!-- container -->

</div> <!-- content -->

<?php include("footer.php"); ?>

</div>
<!-- End content-page -->


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

</div>
<!-- jQuery  -->
<?php include("shareJs.php"); ?>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

</body>
</html>
