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
                                                <label class="control-label" for="">
                                                    Category
                                                </label>
                                                <input id="categoryType" type="text" class="form-control" dataName="categoryType" dataType="text">
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="">
                                                    Phone Number
                                                </label>
                                                <input id="phoneNumber" type="text" class="form-control" dataName="phoneNumber" dataType="text">
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="">
                                                    Email Address
                                                </label>
                                                <input id="emailAddress" type="text" class="form-control" dataName="emailAddress" dataType="text">
                                            </div>
                                            <div class="col-sm-4 form-group">
                                              <label class="control-label" for="">
                                                    Status
                                                </label>
                                                <select id="status" class="form-control">
                                                  <option value="active">Active</option>
                                                  <option value="expired">Expired</option>
                                                  <option value="completed">Completed</option>
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
                    <form>
                        <div id="basicwizard" class="pull-in">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                <div id="listingDiv" class="table-responsive">

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
    var btnArray = Array('edit', 'delete', 'disable');
    var thArray = Array(
        'Title',
        'Created By',
        'Name',
        'Amount to raise (USD)',
        'Duration (days)',
        'Category',
        'Status',
        'Created at',
        'Updated at'
    );

    /*ajaxSend Variables Declaration*/
    var url = 'scripts/reqAdmin.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var formData = "";
    var fCallback = "";

    /*Page Pagination Variables Declaration*/
    var pageNumber = 1;
    var pagerId  = 'listingPager';
    var fromDateTime, toDateTime, page_size, order, id, title, createdBy, categoryType, status;

    $(document).ready(function()
    {
        formData  = {command: 'adminGetStoryListing'};
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

         $('#resetBtn').click(function() {
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

        $('.input-daterange input').each(function() {
            $(this).datepicker('clearDates');
        });

        $("select").change( function() {
            $(this).blur();
        });
        $(document).keypress(function(event) {
            var keycode = event.keyCode || event.which;
            if(keycode == '13') {
                $( "#searchBtn" ).trigger( "click" );
            }
        });
    });

     $('.input-daterange input').each(function() {
        $(this).datepicker({
            format      : 'dd/mm/yyyy',
            autoclose   : true
        });
        $(this).val('');
    });

    function pagingCallBack(pageNumber, fCallback){
        if ($("#fromDate").val()) {
            fromDateTime = dateToTimestamp($("#fromDate").val() + " 00:00:00");
        }else{
            fromDateTime="";
        }
        if ($("#toDate").val()) {
            toDateTime = dateToTimestamp($("#toDate").val() + " 23:59:59");
        }else{
            toDateTime="";
        }
        var title = $('#title').val();
        var createdBy = $('#createdBy').val();
        var categoryType = $('#categoryType').val();
        var status = $('#status').val();

        if(pageNumber > 1) bypassLoading = 1;

        var formData   = {
            command        : "adminGetStoryListing",
            page           : pageNumber,
            page_size      : page_size,
            from_datetime  : fromDateTime,
            to_datetime    : toDateTime,
            order          : order,
            id             : id,
            title          : title,
            username       : createdBy,
            category_type  : categoryType,
            status         : status
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
            var list = data.data;
            var tableNo;

            if(!jQuery.isEmptyObject(list))
            {
                var newList = [];


                $.each(list, function(k,v){
                  $.each(v, function(key,value){
                      if (!value) {
                          v[key]="-";
                      }
                  });

                    var rebuildData ={
                      // no : v['id'],
                      title         : v['title'],
                      createdBy     : v['username'],
                      name          : v['nickname'],
                      fundAmount    : v['fund_amount'],
                      fundPeriod    : v['fund_period'],
                      categoryType  : v['category_type'],
                      status        : v['status'],
                      createdAt     : v['created_at'],
                      updatedAt     : v['updated_at']
                    };

                    newList.push(rebuildData);
                });
            }
            var tableNo;
            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('#'+tableId).find('thead tr').each(function(){
                $(this).find('th:eq(0)').addClass('customTdStyle');
            });

            if(!jQuery.isEmptyObject(list))
            {
                $.each(data.data, function(k, v) {
                    $('#'+tableId).find('tr#'+k).attr('dataID', v['id']);
                });
            }

            // DISPLAY MANAGE BUTTON WHEN ADMIN CREATED
            // var counter = 0;
            // if (list) {
            //     $.each(list, function (key, value) {
            //         if (list[key]['user_type'] == "user") {
            //             $('#edit' + counter).hide();
            //         }
            //         if (list[key]['user_type'] == "admin") {
            //             $('#edit' + counter).show();
            //         }
            //         counter++;
            //     });
            // }

        }


        function tableBtnClick(btnId) {
            var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
            var tableRow = $('#'+btnId).parent('td').parent('tr');
            var tableId  = $('#'+btnId).closest('table');
            
            if (btnName == 'edit') {
                var dataID = tableRow.attr('dataID');
                $.redirect("storyListingDetails.php",{dataID:dataID});
            }
        }

        function loadSearch(data, message) {
            loadDefaultListing(data, message);
            $('#searchMsg').addClass('alert-success').html('<span>Search Successfully!</span>').show();
            setTimeout(function() {
                $('#searchMsg').removeClass('alert-success').html('').hide();
            }, 3000);
        }

</script>

</body>
</html>
