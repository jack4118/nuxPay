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
                                                
                                                <div class="col-sm-6 form-group">
                                                    <label class="control-label">Date Created</label>
                                                    <div class="input-group input-daterange" data-date-format="dd/mm/yyyy" data-date-end-date="0d" data-date-today-highlight="true" data-date-orientation="auto">
                                                        <input id="fromDate" type="text" class="form-control" placeholder="From" dataname="transactionDate" datatype="dateRange"  autocomplete="off" name="start">
                                                        <span class="input-group-addon">
                                                            To
                                                        </span>
                                                        <input id="toDate" type="text" class="form-control" placeholder="To" dataname="transactionDate" datatype="dateRange" autocomplete="off" name="end">
                                                    </div>
                                                </div>


                                                
                                            </form>
                                            <!-- hidden -->

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

                   <!-- Table -->
                   <a id="addCategories" href="newNews.php" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20">
                            New News
                        </a>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="p-b-0">
                                <form>
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="alert" style="display: none;"></div>
                                            <div id="blogListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center" style="">
                                                <ul class="pagination pagination-md" id="pagerBlogList">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                                </div>

                            </div>
                        </div><!-- End row -->
                        <!-- Table -->

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

<script>

    var divId    = 'blogListDiv';
    var tableId  = 'blogListTable';
    var pagerId  = 'pagerBlogList';
    var btnArray = Array("edit","delete");
    var thArray  = Array('Date Created',
       'Title',
       'Type'
       );
    var searchId = 'searchForm';

    var url             = 'scripts/reqNews.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var businessID, businessName, email, mobileNo, country;

    $(document).ready(function() {

        $('#fromDate').daterangepicker({
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        }, function(start, end, label) {
            $("#fromDate").val(start.format('DD/MM/YYYY'));
            $("#toDate").val(end.format('DD/MM/YYYY'));
        });
        $('#toDate').click(function() {
            $('#fromDate').trigger('click');
        });
        $('input[name="start"]').on('apply.daterangepicker', function (ev, picker) {
            $('#fromDate').val(picker.startDate.format('DD/MM/YYYY'));
            $('#toDate').val(picker.endDate.format('DD/MM/YYYY'));
        });

        fCallback = loadDefaultListing;
        formData  = {
            command: 'adminGetNewsListing'
        };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
        //reset to default search
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

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;
        var from_datetime = dateToTimestamp($("#fromDate").val());
        var to_datetime = dateToTimestamp($("#toDate").val()+" 23:59:59");
        // console.log(from_datetime);
        //fix date return false crashing pagination
        if(from_datetime == false){
            from_datetime = 0;
        }
        if(to_datetime == false){
            to_datetime = 0;
        }
         // var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "adminGetNewsListing",
            page  : pageNumber,
            from_datetime  : from_datetime,
            to_datetime  : to_datetime
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        // console.log(data);
        var blogList = data.data;
        var tableNo;

        if (blogList) {
            var newList = [];
            $.each(blogList, function(k,v){
                var rebuildData ={
                    created_at : v['created_at'],
                    title : v['title'],
                    type : v['content_type']
                };
            newList.push(rebuildData);
        });
            
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(blogList) {
            $.each(blogList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-th', v['id']);
                $('#'+tableId).find('tr#'+k).attr('data-type', v['content_type']);
            });
        }

    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');
        
        if (btnName == 'edit') {
            var blogID = tableRow.attr('data-th');
            var blogType = tableRow.attr('data-type');
            // var tag = tableRow.find('td:eq(1)').text();
            $.redirect("editNews.php",{blogID: blogID,blogType:blogType});
        }else if(btnName == 'delete'){
            var canvasBtnArray = Array('Delete');
            var message = 'Are you sure you want to delete this blog?';
            showMessage(message, 'warning', 'Delete Blog', '', '', canvasBtnArray);
            $('#canvasDeleteBtn').click(function() {
              // var idArr = [];
              var blogID = tableRow.attr('data-th');
              // idArr.push(blogID);

              var formData = {
                'command': 'adminDeleteBlog',
                'blogID' : blogID
              };
              fCallback = loadDelete;
              ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            });
          }
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function loadDelete(data,message){
            // console.log(data);
           
            showMessage(message, 'success', 'Success', '', '');

            fCallback = loadDefaultListing;

            formData  = {
              command: 'adminGetNewsListing'
            };

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    
</script>