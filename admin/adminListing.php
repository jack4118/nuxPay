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
                        <button type="button" onclick="window.location.href='createAdmin.php'" id="1" class="btn btn-primary waves-effect waves-light">Create User</button>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <div class="p-b-0">
                            <form>
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="alert" style="display: none;"></div>
                                        <div id="adminListDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center" style="">
                                            <ul class="pagination pagination-md" id="pagerAdminListing">
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
    var divId = 'adminListDiv';
    var tableId = 'adminListTable';
    var pagerId = 'pagerAdminListing';
    var btnArray = Array('edit');
    var thArray = Array(
        'Username',
        'Role',
        'Status',
        'Email',
        'Created On',
        'Last Login on',
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
    var businessID, businessName, page_size;

    $(document).ready(function() {

        var tableNo = '';

        var formData = {
            command: 'adminListing'
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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
            command: "adminListing",
            page: pageNumber,

        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        var adminListing = data.admin_listing;
        var tableNo;

        if (adminListing) {
            var newList = [];
            $.each(adminListing, function(k, v) {

                var rebuildData = {
                    username: v['username'],
                    roles: v['roles_name'],
                    status: v['status'],
                    email: v['email'],
                    created_at: v['created_at'],
                    last_login: v['last_login']
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $.each(adminListing, function(k, v) {
            $('#' + tableId).find('tr#' + k).attr('data-th', v['id']);
        });

        
         $('tr').each(function(){
                $(':eq(6)',this).remove().insertBefore($(':eq(0)',this));
        });
    }
    
     function tableBtnClick(btnId) {
        var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#' + btnId).parent('td').parent('tr');
        var tableId = $('#' + btnId).closest('table');



        if (btnName == 'edit') {
            var id = tableRow.attr('data-th');
            $.redirect("editAdminDetails.php", {
                id: id
            });
        }
    }


</script>
