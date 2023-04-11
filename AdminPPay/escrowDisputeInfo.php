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
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>

                                            <div class="col-sm-12 m-t-rem1">
                    <a href="javascript:void(0);">
                        <div class="ticketInfo mb-3 col-sm-3 col-md-2 text-center menuActive active">
                            <span>
                                Ticket Info
                            </span>
                        </div>
                    </a>
                    <a href="javascript:void(0);">
                        <div class="ticketInbox mb-3 col-sm-3 col-md-2 text-center menuActive ">
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
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default bx-shadow-none">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    Escrow Dispute Info                               </h4>
                            </div>

                            <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-12 px-0 form-group">
                                                <div class="col-sm-6 mb-3">
                                                    <span>
                                                        Report date :
                                                    </span>
                                                    <b id="reportDate" class="ml-2"></b>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <span>
                                                        Report by :
                                                    </span>
                                                    <b id="reportBy" class="ml-2"></b>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <span>
                                                        Date of transaction :
                                                    </span>
                                                    <b id="dateOfTransaction" class="ml-2"></b>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <span>
                                                        Sender display name :
                                                    </span>
                                                    <b id="senderDN" class="ml-2"></b>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <span>
                                                        Sender phone number :
                                                    </span>
                                                    <b id="senderPM" class="ml-2"></b>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <span>
                                                        Receiver display name :
                                                    </span>
                                                    <b id="receiverDN" class="ml-2"></b>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <span>
                                                        Receiver phone number :
                                                    </span>
                                                    <b id="receiverPM" class="ml-2"></b>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <span>
                                                        Transaction currency :
                                                    </span>
                                                    <b id="transactionCurrency" class="ml-2"></b>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <span>
                                                        Transaction amount :
                                                    </span>
                                                    <b id="transactionAmount" class="ml-2"></b>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <span>
                                                        Description :
                                                    </span>
                                                    <b id="description" class="ml-2"></b>
                                                </div>
                                              </div>
                                            <div class="col-sm-12" style="">
                                              <button id="declineBtn" type="button" class="btn btn-decline waves-effect waves-light" data-toggle="modal" data-target="#paswordModal">
                                                Decline
                                              </button>
                                              <button id="approveBtn" type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#paswordModal">
                                                Approve
                                              </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        </div>
                    </div><!-- End row -->

                </div> <!-- container -->



            </div> <!-- content -->

            <div id="paswordModal" class="modal fade" role="dialog" style="display: none;">
              <div class="modal-dialog modalWidth" style="">

                <!-- Modal content-->
                <div class="modal-content" style="padding: 15px 20px;">
                  <div class="modal-body" style="padding-bottom: 0px;">
                    <button type="button" class="close" data-dismiss="modal" style="position: absolute; right: 0; top: 0;">&times;</button>
                    <label class="control-label" for="">Password</label>
                    <input type="password" class="form-control" dataName="date" dataType="text" id="passwordCheck">
                    <span id="errorMessage" class="customError text-danger"></span>
                    <div class="text-right mt-3">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button id="confirmApprove" type="button" class="btn btn-primary waves-effect waves-light" style="display: none;">Approve</button>
                      <button id="confirmDecline" type="button" class="btn btn-decline waves-effect waves-light" style="display: none;">Decline</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

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
        var action = "";

        $(document).ready(function(){
            var formData  = {command: 'adminGetSpecificDisputeDetails', id : ticketID};
            var fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('.ticketInbox').click(function() {
                $.redirect("escrowDisputeInbox.php", {id: ticketID, status: receiveStatus, previousPage: previousPage});
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

            $('#approveBtn').click(function(){
                $('#confirmApprove').show();
                $('#confirmDecline').hide();
                $('#errorMessage').html('');
                $('#passwordCheck').val('');
                action = "approved";
            });

            $('#declineBtn').click(function(){
                $('#confirmDecline').show();
                $('#confirmApprove').hide();
                $('#errorMessage').html('');
                $('#passwordCheck').val('');
                action = "declined";
            });

            $("#confirmApprove").click(function(){
                var password = $('#passwordCheck').val();
                if(password == "")
                {
                    $('#errorMessage').html("Please Enter Your Password");
                }
                else
                {
                    var formData={
                        command  : 'adminDisputeActionPerform',
                        type     : 'POST',
                        id       : ticketID,
                        password : password,
                        action   : action
                    };
                    var fCallback = successApproved;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                    $('#paswordModal').hide();
                }
            });

            $("#confirmDecline").click(function(){
                var password = $('#passwordCheck').val();
                if(password == "")
                {
                    $('#errorMessage').html("Please Enter Your Password");
                }
                else
                {
                    var formData={
                        command  : 'adminDisputeActionPerform',
                        type     : 'POST',
                        id       : ticketID,
                        password : password,
                        action   : action
                    };
                    var fCallback = declineApproved;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                    $('#paswordModal').hide();
                }   
            });
        });
        function successApproved(data, message)
        {
            $('#paswordModal').hide();
            showMessage('This tickect had approved', 'success', 'Ticket Approved' , '', 'escrowDisputeListing.php');
        }
        function declineApproved(data, message)
        {
            $('#paswordModal').hide();
            showMessage('This tickect had declined', 'warning', 'Ticket Declined' , '', 'escrowDisputeListing.php');
        }
        function loadDefaultListing(data, message) {
            if(data.result) {
                $('#reportDate').text(data.result.report_date);
                $('#dateOfTransaction').text(data.result.date_of_transaction);
                $('#reportBy').text(data.result.report_by);
                $('#senderPM').text(data.result.sender_phone);
                $('#senderDN').text(data.result.sender_name);
                $('#receiverPM').text(data.result.recipient_phone);
                $('#receiverDN').text(data.result.recipient_name);
                $('#transactionCurrency').text(data.result.transaction_currency);
                $('#transactionAmount').text(data.result.transaction_amount);
                $('#description').text(data.result.description);
            }

            if ($('#reportDate').text() == '')
            {
                $('#reportDate').text("-");
            }
            if ($('#dateOfTransaction').text() == '')
            {
                $('#dateOfTransaction').text("-");
            }
            if ($('#reportBy').text() == '')
            {
                $('#reportBy').text("-");
            }
            if ($('#senderPM').text() == '')
            {
                $('#senderPM').text("-");
            }
            if ($('#senderDN').text() == '')
            {
                $('#senderDN').text("-");
            }
            if ($('#receiverPM').text() == '')
            {
                $('#receiverPM').text("-");
            }
            if ($('#receiverDN').text() == '')
            {
                $('#receiverDN').text("-");
            }
            if ($('#transactionCurrency').text() == '')
            {
                $('#transactionCurrency').text("-");
            }
            if ($('#transactionAmount').text() == '')
            {
                $('#transactionAmount').text("-");
            }
            if ($('#description').text() == '')
            {
                $('#description').text("-");
            }
        }
    </script>
</body>
</html>
