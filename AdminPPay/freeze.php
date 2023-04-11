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
                                                <div class="col-md-4 form-group">
                                                    <label class="control-label">
                                                        Business ID
                                                    </label>
                                                    <input id="businessID" type="text" class="form-control" dataName="name" dataType="text">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label class="control-label">
                                                        Business Name
                                                    </label>
                                                    <input id="businessName" type="text" class="form-control" dataName="username" dataType="text">
                                                </div>
                                                 <div class="col-md-4 form-group">
                                                    <label class="control-label" for="" data-th="email">
                                                        Email
                                                    </label>
                                                    <input id="email" type="text" class="form-control" dataName="email" dataType="text">
                                                </div>
                                                 <div class="col-md-4 form-group">
                                                    <label class="control-label">
                                                        Mobile Number
                                                    </label>
                                                    <input id="mobileNo" type="number" class="form-control" dataName="username" dataType="text">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" data-th="disabled">
                                                        Country
                                                    </label>
                                                    <select id="country" class="form-control" dataName="disabled" dataType="select">
                                                        <option value="">All</option>
                                                        <?php include 'countryList.php'; ?>
                                                    </select>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="p-b-0">
                                <form>
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="alert" style="display: none;"></div>
                                            <div id="freezeListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center" style="">
                                                <ul class="pagination pagination-md" id="pagerFreezeList">
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
    var divId    = 'freezeListDiv';
    var tableId  = 'freezeListTable';
    var pagerId  = 'pagerFreezeList';
    var btnArray = Array("edit");
    var thArray  = Array('Business ID',
                         'Business Name',
                         'Email',
                         'Mobile Number',
                         'Country'
                        );
    var searchId = 'searchForm';
        
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqFreeze.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var businessID, businessName, email, mobileNo, country;

    $(document).ready(function() {

        businessID = $("#businessID").val();
        businessName = $("#businessName").val();
        email = $("#email").val();
        mobileNo = $("#mobileNo").val();
        country = $("#country").val();

        fCallback = loadDefaultListing;
        formData  = {
            command: 'adminGetUserFreezedListing',
            businessID: businessID,
            businessName: businessName,
            email: email,
            mobileNo: mobileNo,
            country: country
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

        businessID = $("#businessID").val();
        businessName = $("#businessName").val();
        email = $("#email").val();
        // if ($("#mobileNo").val()!='') {
            // mobileNo = "+" + $("#mobileNo").val();
        // }else{
            mobileNo = $("#mobileNo").val();
        // }
        country = $("#country").val();

        // var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "adminGetUserFreezedListing",
            page: pageNumber,
            email  : email,
            businessName   : businessName,
            country  : country,
            businessID   : businessID ,
            mobileNo  : mobileNo

        };
            
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        // console.log(data)
        var freezeList = data.data;
        var tableNo;

        if (freezeList) {
            if(freezeList){
                var newList = [];
                $.each(freezeList, function(k,v){
                    if (v['business_phone_number'] ==""){
                       v['business_phone_number'] ="-"; 
                        }
                    if (v['business_country'] ==""){
                       v['business_country'] ="-"; 
                        }
                    if (v['business_email'] ==""){
                       v['business_email'] ="-"; 
                        }
                    if (v['last_login'] ==""){
                       v['last_login'] ="-"; 
                        }
                    var rebuildData ={
                        ID : v['business_id'],
                        businessName : v['business_name'],
                        Email : v['business_email'],
                        Mobile : v['business_phone_number'],
                        Country : v['business_country']
                    };
                    newList.push(rebuildData);
                });
            }else if (!freezeList) {
                newList="";
                message="No result.";
            }
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');
        
        if (btnName == 'edit') {
            var businessID = tableRow.attr('data-th');
            $.redirect("businessesGeneral.php",{id: businessID});
        }
    }
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }
   


    </script>