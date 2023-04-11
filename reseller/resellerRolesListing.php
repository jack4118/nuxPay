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
<div id="wrapper">
    <?php include("topbar.php"); ?>
    <?php include("sidebar.php"); ?>
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <button type="button" onclick="window.location.href='createAdminRoles.php'" id="1" class="btn btn-primary waves-effect waves-light">Create New Roles</button>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <div class="p-b-0">
                            <form>
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="alert" style="display: none;"></div>
                                        <div id="rolesListDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center" style="">
                                            <ul class="pagination pagination-md" id="pagerRolesListing">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>

            </div>

        </div>

        <?php include("footer.php"); ?>

    </div>

</div>

<script>
    var resizefunc = [];

</script>
<?php include("shareJs.php"); ?>

</body>

</html>

<script>
    var divId = 'rolesListDiv';
    var tableId = 'rolesListTable';
    var pagerId = 'pagerRolesListing';
    var btnArray = Array('edit');
    var thArray = Array(
        'Role',
        'Status',
        
    );
    var searchId = 'searchForm';

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

        var tableNo = '';
        // NO LONGER NEEDED FOR RESELLER
        // var formData = {
        //     command: 'adminRolesListing'
        // };
        // fCallback = loadDefaultListing;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input').each(function() {
                $(this).val('');
            });
            $('#searchForm').find('select').each(function() {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

        });

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });
    });
    
     function pagingCallBack(pageNumber, fCallback) {


        if (pageNumber > 1) bypassLoading = 1;

        var formData = {
            command: "resellerListing",
            page: pageNumber,

        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    
    function loadDefaultListing(data, message) {
        var rolesListing = data;

        var tableNo;

        if (rolesListing) {
            var newList = [];
            $.each(rolesListing, function(k, v) {

                var rebuildData = {
                    roles: v['name'],
                    status: v['status'],
                   
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        
        $.each(rolesListing, function(k, v) {
            $('#' + tableId).find('tr#' + k).attr('data-th', v['id']);
        });

        $('tr').each(function(){
            $(':eq(2)',this).remove().insertBefore($(':eq(0)',this));
        });
    }
    
    function tableBtnClick(btnId) {
        var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#' + btnId).parent('td').parent('tr');
        var tableId = $('#' + btnId).closest('table');



        if (btnName == 'edit') {
            var role_id = tableRow.attr('data-th');
            $.redirect("adminEditRolePermission.php", {
                role_id: role_id
            });
        }
    }

</script>
