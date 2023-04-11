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
                        <div class="col-sm-4">
                            <a href="escrowDisputeListing.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>
                                Back
                            </a>
                        </div><!-- end col -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                                Menu
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <!-- <div id="searchMsg" class="text-center alert" style="display: none;"></div> -->

                                            <div class="col-sm-12 m-t-rem1">
                    <a href="javascript:void(0);">
                        <div class="ticketInfo mb-3 col-sm-3 col-md-2 text-center menuActive">
                            <span>
                                Ticket Info
                            </span>
                        </div>
                    </a>
                    <a href="javascript:void(0);">
                        <div class="ticketInbox mb-3 col-sm-3 col-md-2 text-center menuActive active">
                            <span>
                                Inbox
                            </span>
                        </div>
                    </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12">

                    <div id="ticketItem" style="" class="card-box">
                      <div class="comment">
                        <div id="contentInbox" class="comment-body">
                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                        </div>
                    </div>
                </div> <!--end div ticket-->

                </div>
                    </div><!-- End row -->

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

    <script>
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqTicket.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;

        var ticketID = "<?php echo $_POST['id']; ?>";
        var receiveStatus = "<?php echo $_POST['status']; ?>";
        // console.log(ticketID);
        // console.log(receiveStatus);

        var previousPage = "<?php echo $_POST['previousPage']; ?>";
        var contentInbox = "";

        $(document).ready(function(){
            var formData  = {command: 'adminGetSpecificEscrowInbox', id : ticketID};
            var fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('.ticketInfo').click(function() {
                $.redirect("escrowDisputeInfo.php", {id: ticketID, status : receiveStatus,previousPage: previousPage});
            });

            if(receiveStatus == "Approved" || receiveStatus == "Declined")
            {
                $('#declineBtn').hide();
                $('#approveBtn').hide();
            }
            else
            {
                $('#declineBtn').show();
                $('#approveBtn').show();
            } 
        });
        
        function loadDefaultListing(data, message) {
            if(data.result) {
                $.each(data.result, function(key, value) {

                    var inboxMessage = value['message'];
                    if (inboxMessage == "") {
                        inboxMessage = "-";
                    }
                    contentInbox += '<div class="comment-text">';
                    contentInbox += '<div class="comment-header">';
                    contentInbox += '<a href="#" title="">'+value['name']+'</a>';
                    contentInbox += '<span>'+value['created_at']+'</span>';
                    contentInbox += '</div>';
                    contentInbox += '<p class="ml-2 mt-3">'+inboxMessage+'</p>';
                    contentInbox += '</div>';
                    contentInbox += '<br>';

                    $('#contentInbox').html(contentInbox);
                });
            }
            else
            {
                $('#searchMsg').addClass('alert-success').html('<span>No Result Found</span>').show();
            }
        }
    </script>

</body>
</html>
