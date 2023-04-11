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
                                                <!-- <div class="col-md-4 form-group" style="height: 62px;">
                                                    <label class="control-label">Created On</label>
                                                    <div class="input-group input-daterange" id="m_datepicker_5">
                                                        <input id="fromDate" type="text" class="form-control input-daterange-from" placeholder="From" dataName="startDate" dataType="dateRange" autocomplete="off" name="start" value="<?php echo $_POST['searchfromDate']; ?>" />
                                                        <span class="input-group-addon">
                                                            To
                                                        </span>
                                                        <input id="toDate" type="text" class="form-control input-daterange-to" placeholder="To" dataName="endDate" dataType="dateRange" autocomplete="off" name="end" value="<?php echo $_POST['searchtoDate']; ?>" />
                                                    </div>
                                                </div> -->
                                                <div class="col-md-4 form-group">
                                                    <label class="control-label">
                                                        Business ID
                                                    </label>
                                                    <input id="businessID" type="text" class="form-control" dataName="name" dataType="text" value="<?php echo $_POST['searchBusinessID']; ?>">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label class="control-label">
                                                        Business Name
                                                    </label>
                                                    <input id="businessName" type="text" class="form-control" dataName="username" dataType="text" value="<?php echo $_POST['searchBusinessName']; ?>">
                                                </div>
                                                <div class="col-md-4 form-group" id="siteDiv">
                                                    <label class="control-label" id="siteLabel">
                                                        Site
                                                    </label>
                                                    <input id="site" type="text" class="form-control" dataName="site" dataType="text" value="<?php echo $_POST['searchSite']; ?>">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label class="control-label">
                                                        Email
                                                    </label>
                                                    <input id="email" type="text" class="form-control" dataName="email" dataType="text" value="<?php echo $_POST['searchEmail']; ?>">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label class="control-label">
                                                        Phone Number
                                                    </label>
                                                    <input id="phoneNumber" type="text" class="form-control" dataName="phoneNumber" dataType="text" value="<?php echo $_POST['searchPhoneNumber']; ?>">
                                                </div>
                                                <div class="col-md-4 form-group" id="distributorDiv">
                                                    <label class="control-label" id="distributorLabel">
                                                        Distributor Username
                                                    </label>
                                                    <input id="distributorUsername" type="text" class="form-control" dataName="distributorUsername" dataType="text" value="<?php echo $_POST['searchDistributorUsername']; ?>">
                                                </div>
                                                <div class="col-md-4 form-group" id="resellerDiv">
                                                    <label class="control-label" id="resellerLabel">
                                                        Reseller Username
                                                    </label>
                                                    <input id="resellerUsername" type="text" class="form-control" dataName="resellerUsername" dataType="text" value="<?php echo $_POST['searchResellerUsername']; ?>">
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

                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-12">
                            <div class="p-b-0">
                                <form>
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="alert" style="display: none;"></div>
                                            <div id="freezeListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center" style="">
                                                <ul class="pagination pagination-md" id="pagerMerchantListing">
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
    var divId    = 'freezeListDiv';
    var tableId  = 'freezeListTable';
    var pagerId  = 'pagerMerchantListing';
    var btnArray = Array('view');
    var thArray  = Array('Site',
                         'Merchant ID',
                         'Merchant Name',
                         'Country',
                         'Mobile Number',
                         'Email',
                         'Reseller Username',
                         'Distributor Username',
                         'Created On',
                         'Total Transaction',
                         'Total Transaction Amount (USD)',
                         'Total Commission Contributed Amount (USD)'
                        );
    var searchId = 'searchForm';
        
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqBusinesses.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var businessID, businessName, page_size;
    var login_ID        = "<?php echo $_SESSION['userType']; ?>";

    $(document).ready(function() {
        var tableNo = '';
        newList = "";
        message = "Please enter your search criteria.";
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);

        if(login_ID == "siteadmin"){
            $('#siteDiv').hide();
        }

        if(login_ID == "distributor"){
            $('#siteDiv').hide();
            $('#distributorDiv').hide();
        }

        if(login_ID == "reseller"){
            $('#siteDiv').hide();
            $('#distributorDiv').hide();
            $('#resellerDiv').hide();
        }

        // $('#fromDate').daterangepicker({
        //     autoApply: true,
        //     autoUpdateInput: false,
        //     locale: {
        //         format: 'DD/MM/YYYY'
        //     }
        // }, function(start, end, label) {
        //     $("#fromDate").val(start.format('DD/MM/YYYY'));
        //     $("#toDate").val(end.format('DD/MM/YYYY'));
        // });
        // $('#toDate').click(function() {
        //     $('#fromDate').trigger('click');
        // });
        // $('input[name="start"]').on('apply.daterangepicker', function(ev, picker) {
        //     $('#fromDate').val(picker.startDate.format('DD/MM/YYYY'));
        //     $('#toDate').val(picker.endDate.format('DD/MM/YYYY'));
        // });

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
        // if ($("#fromDate").val()) {
        //     fromDateTime = dateToTimestamp($("#fromDate").val() + " 00:00:00");
        // } else {
        //     fromDateTime = "";
        // }
        // if ($("#toDate").val()) {
        //     toDateTime = dateToTimestamp($("#toDate").val() + " 23:59:59");
        // } else {
        //     toDateTime = "";
        // }

        businessID      = $('#businessID').val();
        businessName    = $('#businessName').val();
        phoneNumber     = $('#phoneNumber').val();
        site            = $('#site').val();
        email           = $('#email').val();
        distributorUsername = $('#distributorUsername').val();
        resellerUsername    = $('#resellerUsername').val();

        if(pageNumber > 1) bypassLoading = 1;

        var formData   = {
            command     : "adminNuxpayMerchantList",
            page            : pageNumber,
            // date_from       : fromDateTime,
            // date_to         : toDateTime,
            business_id      : businessID,
            business_name    : businessName,
            phone_number     : phoneNumber,
            business_site    : site,
            email            : email,
            distributor_username : distributorUsername,
            reseller_username    : resellerUsername
        };
            
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

      function loadDefaultListing(data, message) {
        var merchantListing = data.merchant_listing;
        var tableNo;

        if (merchantListing) {
            var newList = [];
            $.each(merchantListing, function(k,v){
                if (v['business_owner_name'] == "" || v['business_owner_name'] == "") {
                    var business_owner_name = "-";
                } else {
                    var business_owner_name = v['business_owner_name'];
                }
                var rebuildData ={
                    site : v['business_register_site'],
                    id : v['business_id'],
                    name : v['business_name'],
                    country : v['business_country'],
                    phone : v['business_main_mobile'],
                    email : v['business_email'],
                    resellerUsername : v['business_reseller_username'],
                    distributorUsername : v['business_distributor_username'],
                    date : v['business_created_at'],
                    total : v['total_transaction'],
                    totalAmount : formatNumber(v['total_transaction_usd'],2,1),
                    totalComission : formatNumber(v['total_commission_usd'],2,1),
                    // serviceCharge : v['business_service_charge'],
                    // registerThrough : v['business_register_through'],
                    // businessOwnerName: business_owner_name
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if (merchantListing) {
            $.each(merchantListing, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-th', v['business_id']);
            });
        }    
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');


        
        if (btnName == 'view') {
            var searchBusinessID = $("#businessID").val();
            var searchBusinessName = $("#businessName").val();
            var businessID = tableRow.attr('data-th');
            $.redirect("merchantListingDetails.php",{
                businessID: businessID,
                searchBusinessID : searchBusinessID,
                searchBusinessName : searchBusinessName
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
   


    </script>