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
                       <a id="backBusinesses" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                        <i class="md md-add"></i>
                        Back
                    </a>
                </div>
            </div>

            <div class="row">

                <?php include("businessesSidebar.php"); ?>

                <div class="col-lg-12 col-md-12">
                          

                        

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

<?php include("shareJs.php"); ?>

<script>
    var divId = 'listingDiv';
    var tableId = 'listingTable';
    var btnArray = {};
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

    var url = 'scripts/reqAdmin.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var formData = "";
    var fCallback = "";
    var businessID = "<?php echo $_POST['id']; ?>";  
     var dataID = "<?php echo $_POST['dataID'] ?>";

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

        $('#backBusinesses').click(function() {
          $.redirect("businessesCommissionListing.php", {id: businessID});
        });

    
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
