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
                        <form>
                            <div id="basicwizard" class="pull-in">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                <div id="listingDiv" class="table-responsive">
                                    <table id="memberListTable" class="table table-striped table-bordered no-footer m-0">

                                    </table>
                                </div>
                                <div class="" style="margin-top: 10px">
                                    <span id="paginateText"></span>
                                </div>

                                <div class="text-center" style="margin-top: 20px">
                                    <ul class="pagination pagination-md" id="listingPager"></ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- End row -->

            </div> <!-- container -->

        </div> <!-- content -->


        <?php include("footer.php"); ?>

    </div>
    <!-- End content-page -->

</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>


<script>
    /*Table Variables Declaration*/
    var divId = 'listingDiv';
    var tableId = 'listingTable';
    var btnArray = Array('download');
    var thArray = Array(
        'Created At',
        'Type',
        'File Name',
        'Status',
        'Progress %',
        'Start Time',
        'End Time',
        'Error Message'
    );    

    /*ajaxSend Variables Declaration*/
    var url = 'scripts/reqUtm.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var formData = "";
    var fCallback = "";

    /*Page Pagination Variables Declaration*/
    var pageNumber = 1;
    var pagerId  = 'listingPager';
    var fromDateTime, toDateTime, page, page_size, name, phone_number, email, urlLink, ip, country, device;

    $(document).ready(function()
    {
        formData  = {command: 'getExcelReqList'};
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        setInterval(function() {
            formData  = {command : "getExcelReqList", pageNumber : pageNumber};
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }, 60000); 
    });

    function loadDefaultListing(data, message) {
        var list = data.exportList;

        if (data=="" || listingPager.length<=0) {
            var p = 1;
            $('#alertMsg').addClass('alert-success').html("<span><?php echo $translations["A00354"][$language] ?></span>").show();
            setTimeout(function() {
                $('#alertMsg').removeClass('alert-success').html('').hide(); 
            }, 3000);
        }else if(list.length>0) {
            var newList = [];
            $.each(data.exportList, function(k, v) {
                var showCheckBox = v["status"] == 'completed' || v["status"] == 'failed' ? 1 : '';
                var rebuildData = {
                    // checkbox       : showCheckBox,
                    created_at     : v["created_at"],
                    export_type    : v["type"],
                    file_name      : v["file_name"],
                    status         : v["status"],
                    progress       : v["progress"],
                    start_time     : v["start_time"],
                    end_time       : v["end_time"],
                    error_message  : v["error_msg"]
                };
                newList.push(rebuildData);
            });
        }

        var tableNo;
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(data.exportList) {
            $.each(data.exportList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-th', v['attachment_id']);
                $('#'+tableId).find('tr#'+k).attr('downloadFile', v['file_name']);
                if (!v['attachment_id']) {
                    $('#view' + k).hide();
                    $('#delete' + k).hide();
                }

                if(v['status'] != 'Success'){
                    $('#download' + k).hide();
                }
                /*
                if (v['status'] == "scheduled"){
                    $('#delete' + k).hide();
                }
                */
            });
        }

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find('td:eq(1)').css('text-transform', "capitalize");
        });
    }


    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');
        var attachment_id = tableRow.attr('data-th');
        var downloadFile = tableRow.attr('downloadFile');

        if (btnName == 'view') {
            createDownloadFile(attachment_id);
        }
        else if (btnName == 'delete') {
            var canvasBtnArray = Array('Ok');
            var message        = "Are you sure you want to delete this documents?";
            showMessage(message, '', "Delete document request", 'trash', '', canvasBtnArray);
            $('#canvasOkBtn').click(function() {
                var checkedIDs = [];
                checkedIDs.push(attachment_id);
                deleteExcelFile(checkedIDs);
            });
        } else if (btnName == 'download') {
            // $.redirect('<?php echo $config['adminURL'] ?>'+downloadFile);
            window.open('<?php echo $config['adminURL'] ?>'+downloadFile);
        }
    }

    function createDownloadFile(attachmentId) {
        var formData  = {
            command: 'exportExcelDownload',
            attachment_id: attachmentId
        };
        $.redirect('scripts/reqUpload.php', formData);
    }

    function deleteExcelFile(attachmentIdArray) {
        var formData    = {
            'command'              : 'removeExportExcel',
            'attachment_id_array'  : attachmentIdArray
        };
        fCallback = updateCallback;
        ajaxSend('scripts/reqUpload.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00387'][$language]; /* Successful updated documents. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'exportFileListing.php');
    }

</script>

</body>
</html>
