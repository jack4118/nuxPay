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
                    <div class="col-sm-4">
                       <a href="businesses.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                        <i class="md md-add"></i>
                        Back
                    </a>
                </div>
            </div>

            <div class="row">

                <?php include("businessesSidebar.php"); ?>

                <div class="col-lg-12 col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="collapse">
                                                Search
                                            </a>
                                        </h4>
                                    </div>
                                    
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                                <form id="searchForm" role="form">

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Type
                                                        </label>
                                                        <select id="type" class="form-control" dataName="status" dataType="select">
                                                            <option value="">All</option>
                                                            <option value="send">Send</option>
                                                            <option value="receive">Receive</option>
                                                        </select>
                                                    </div>

                                                    

                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="">
                                                        Phone Number
                                                    </label>
                                                    <input id="phone" type="text" class="form-control" dataName="report" dataType="text">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="">
                                                        Coin Type
                                                    </label>
                                                    <input id="coinType" type="text" class="form-control" dataName="phone" dataType="text">
                                                </div>

                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Status
                                                    </label>
                                                    <select id="status" class="form-control" dataName="status" dataType="select">
                                                        <option value="">All</option>
                                                        <option value="pending">Pending</option>
                                                        <option value="completed">Completed</option>
                                                        <option value="failed">Failed</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-4 form-group">
                                                        <label class="control-label">Date Range</label>
                                                        <div class="input-group input-daterange" data-date-format="dd/mm/yyyy"              data-date-end-date="0d" data-date-today-highlight="true" data-date-orientation="auto">
                                                          <input id="fromDate" type="text" class="form-control" placeholder="From" dataName="transactionDate" dataType="dateRange" autocomplete="off"/>
                                                          <span class="input-group-addon">
                                                              To
                                                          </span>
                                                          <input id="toDate" type="text" class="form-control" placeholder="To" dataName="transactionDate" dataType="dateRange" autocomplete="off"/>
                                                      </div>
                                                  </div>

                                               
                                            </form>
                                            <div class="col-sm-12 mt-2">
                                                <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">Search</button>
                                                <button type="submit" id="resetBtn" class="btn btn-default waves-effect waves-light">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div id="totalUsageDiv" class="form-group" style="display: none;">
                                                                <label>Total Usage :</label>
                                                                <b id="totalUsage"></b>
                                                            </div>

                            <div class="" style="margin-bottom: 50px;">

                              


                                                <form>
                                                    <div id="basicwizard" class="pull-in">
                                                        <div class="tab-content b-0 m-b-0 py-0">
                                                            <div id="alertMsg" class="alert" style="display: none;"></div>
                                                            <div id="listingDiv" class="table-responsive">
                                                            </div>

                                                <span id="paginateText"></span>
                                                <div class="text-center">
                                                    <ul class="pagination pagination-md" id="pageruserUsageList">
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

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

<script>
    /*Table Variables Declaration*/
    var divId = 'listingDiv';
    var tableId = 'listingTable';
    var btnArray = Array("view");
    var thArray = Array(
        'Type',
        'To/From',
        'Amount',
        'Coin Type',
        'Status',
        'Date Created',
        'Updated At'
    );

    /*ajaxSend Variables Declaration*/
    var url = 'scripts/reqBusinesses.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var formData = "";
    var fCallback = "";
    var businessID = "<?php echo $_POST['id']; ?>";  
    // var businessID = 15204;

    /*Page Pagination Variables Declaration*/
    var pageNumber = 1;
    var pagerId  = 'listingPager';
    var fromDateTime, toDateTime, reportBy, mobileNumber, status, page, pageSize;

    $(document).ready(function() {
        if (!businessID) {
            window.ajaxEnabled = false;
            showMessage("Business Not Found, Please try again. ", 'danger', 'Some error occured', "", 'businesses.php');
        }

        $('.businessesGeneral').click(function() {
            $.redirect("businessesGeneral.php", {id: businessID});
        });

        $('.businessesUsage').click(function() {
            $.redirect("businessesUsage.php", {id: businessID});
        });

        $('.businessesTopUpHistory').click(function() {
            $.redirect("businessesTopUpHistory.php", {id: businessID});
        });

        $('.businessesCategories').click(function() {
            $.redirect("businessesCategories.php", {id: businessID});
        });

        $('.businessesTeamMember').click(function() {
            $.redirect("businessesTeamMember.php", {id: businessID});
        });

        $('.businessesFollower').click(function() {
            $.redirect("businessesFollower.php", {id: businessID});
        });

        $('.businessesTicket').click(function() {
            $.redirect("businessesTicket.php", {id: businessID});
        });

        $('.businessesLiveChatSettings').click(function() {
            $.redirect("businessesLiveChatSettings.php", {id: businessID});
        });

        $('.businessesCommissionListing').click(function() {
          $.redirect("businessesCommissionListing.php", {id: businessID});
        });
    
     

        fCallback = loadDefaultListing;
        formData  = {
            command: 'adminGetBusinessCommission',
            businessID: businessID,
            order: 'Desc'
        };

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
        type     = $('#type').val();
        phone      = $('#phone').val();
        coinType   = $('#coinType').val();
        status     = $('#status').val();

        if(pageNumber > 1) bypassLoading = 1;

        var formData   = {
            command             : "adminGetBusinessCommission",
            businessID          : businessID,
            pageNumber          : pageNumber,
            from_datetime       : fromDateTime,
            to_datetime         : toDateTime,
            transaction_username               : phone,
            wallet_type         : coinType,
            status              : status,
            transaction_type    : type,
            pageSize            : pageSize
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
                      type          : v['transaction_type'],
                      from          : v['transaction_username'],
                      amount        : formatNumber(v['amount'],8,1),
                      coinType      : v['wallet_type'],
                      status        : v['status'],
                      dateCreated   : v['created_at'],
                      updatedAt     : v['updated_at']
                    };

                    newList.push(rebuildData);
                });
            }
       
            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            if(!jQuery.isEmptyObject(list))
            {
                $('#'+tableId).find('thead tr').each(function(){
                    $(this).find('th:eq(2)').css('text-align', "center");
                });

                $('#'+tableId).find('tbody tr').each(function(){
                    $(this).find('td:eq(2)').css('text-align', "right");
                    $(this).find('td:eq(2)').addClass('customTdStyle');
                });

                $.each(data.data, function(k, v) {
                    $('#'+tableId).find('tr#'+k).attr('dataID', v['id']);
                });
             }
        }


        function tableBtnClick(btnId) {
            var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
            var tableRow = $('#'+btnId).parent('td').parent('tr');
            var tableId  = $('#'+btnId).closest('table');
            
            if (btnName == 'view') {
                var dataID = tableRow.attr('dataID');

                $.redirect("businessesCommissionListingDetails.php",{
                    dataID:dataID,
                    id: businessID
                });
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
