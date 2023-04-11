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
                        <a href="adminCommissionListing.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            Back
                        </a>
                    </div>
                    <div class="col-xs-12">
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
    btnArray = {};
    var thArray = Array(
        'Date',
        'Username',
        'Name',
        'Amount',
        'Wallet Type',
        'Recipient Type',
        'Status',
        'Transaction Hash'
    );

    var dataID = "<?php echo $_POST['dataID'] ?>";
    var url = 'scripts/reqAdmin.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var formData = "";
    var fCallback = "";

    var pageNumber = 1;
    var pagerId  = 'listingPager';
    var fromDateTime, toDateTime, reportBy, mobileNumber, status, page, pageSize;

    $(document).ready(function()
    {
        formData  = {command: 'adminGetCommissionDetails',
            dataID : dataID
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

       
     
    });

  


    function loadDefaultListing(data, message) {
            var list = data.tx_data;
            var tableNo;

            if(!jQuery.isEmptyObject(list))
            {
                var newList = [];


                $.each(list, function(k,v){
                  $.each(v, function(key,value){
                    
                  });

                    var rebuildData ={
                      date              : v['created_at'],
                      username          : v['username'],
                      nickname          : v['nickname'],
                      amount            : formatNumber(v['amount'],8,1),
                      walletType        : v['wallet_type'],
                      recipientType     : v['recipient_type'],
                      status            : v['status'],
                      transHash         : v['transaction_hash']
                  };

                    newList.push(rebuildData);
                });
            }
            var tableNo;
            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('#'+tableId).find('thead tr').each(function(){
                $(this).find('th:eq(0)').addClass('customTdStyle');
                $(this).find('th:eq(3)').css('text-align', "center");
            });

            $('#'+tableId).find('tbody tr').each(function(){
                $(this).find('td:eq(3)').css('text-align', "right");
                $(this).find('td:eq(3)').addClass('customTdStyle');
            });

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
