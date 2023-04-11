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
                            <a id="backButton" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>
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
                                    Client Info                                </h4>
                            </div>

                            <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-12 px-0 form-group">
                                                <div class="col-sm-6 mb-3">
                                                    <span>
                                                        Client Email : 
                                                    </span>
                                                    <b id="clientEmail" class="ml-2"></b>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <span>
                                                        Client Name : 
                                                    </span>
                                                    <b id="clientName" class="ml-2"></b>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <span>
                                                        Client Phone/Mobile number :
                                                    </span>
                                                    <b id="clientPhone" class="ml-2"></b>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <span>
                                                        Client ID :
                                                    </span>
                                                    <b id="clientID" class="ml-2"></b>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <span>
                                                        Keyword :
                                                    </span>
                                                    <b id="keyword" class="ml-2" style="word-break: break-all;"></b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default bx-shadow-none">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    Ticket Properties                                
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                    <form id="searchForm" role="form">
                                        <div class="col-sm-12 mb-5">
                                            <span>
                                                Ticket : 
                                            </span>
                                            <b id="internal" class="ml-2">Email Ticket</b>
                                        </div>

                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-6 form-group">
                                                <label class="control-label" for="" data-th="name">
                                                    Status                                                
                                                </label>
                                                <select id="status" class="form-control">
                                                   <!--  <option>Open</option> -->
                                                </select>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="control-label" for="" data-th="username">
                                                    Priority                                                
                                                </label>
                                                <select id="priority" class="form-control">
                                                   <!--  <option>High</option> -->
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-6 form-group">
                                                <label class="control-label" for="" data-th="#">
                                                    Department
                                                </label>
                                                <select id="department" class="form-control">
                                                </select>
                                            </div>

                                            <div class="col-sm-6 form-group">
                                                <label class="control-label" for="" data-th="#">
                                                    Assignee                                                
                                                </label>
                                                <select id="assignee" class="form-control">
                                                    <!-- <option>Tan</option> -->
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-6 form-group">
                                                <label class="control-label" for="" data-th="#">
                                                    Type
                                                </label>
                                                <select id="type" class="form-control">
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- hidden -->
                                            <!-- <form id="adminType" role="form" style="display:none;">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="name">Admin Type</label>
                                                    <input type="text" class="form-control" value="Admin">
                                                </div>
                                            </form> -->

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            Time Tracked                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <div class="col-sm-12 px-0">
                                                    <div class="col-sm-6 mb-3">
                                                        <span>
                                                            Admin last responded : 
                                                        </span>
                                                        <b id="adminLastUpdate" class="ml-2">-</b>
                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <span>
                                                            Client last responded : 
                                                        </span>
                                                        <b id="clientLastUpdate" class="ml-2">-</b>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 px-0" style="padding-bottom: 20px">
                                <button id="updateBtn" type="submit" class="btn btn-primary waves-effect waves-light mt-1">
                                    Update                                </button>
                            </div>

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
        var previousPage = "<?php echo $_POST['previousPage']; ?>";
        // console.log(ticketID);

        $(document).ready(function() {

            var formData  = {command: 'getTicketDetails', ticketID: ticketID};
            var fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('.ticketInbox').click(function() {
                $.redirect("ticketInbox.php", {id: ticketID, previousPage: previousPage});
            });

            $('#backButton').click(function() {
                $.redirect(previousPage);
            });
            
            $('#updateBtn').click(function() {

                var ticketIDs = {};
                ticketIDs[0] = ticketID;

                var formData = {
                    command    : "updateTicket",
                    ticketIDs  : ticketIDs,
                    status     : $('#status option:selected').val(),
                    priority   : $('#priority option:selected').val(),
                    department : $('#department option:selected').val(),
                    assigneeID : $('#assignee option:selected').val(),
                    type       : $('#type option:selected').val()
                };

                fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        });

        function loadDefaultListing(data, message) {

            if(data.ticketSelectOption) {
                $.each(data.ticketSelectOption.priority, function(key, value) {
                    $('#priority').append($('<option>', {
                        value: value['value'],
                        text: value['text']
                    }));
                });

                $.each(data.ticketSelectOption.status, function(key, value) {
                    $('#status').append($('<option>', {
                        value: value['value'],
                        text: value['text']
                    }));
                });

                $.each(data.ticketSelectOption.department, function(key, value) {
                    $('#department').append($('<option>', {
                        value: value['value'],
                        text: value['text']
                    }));
                });

                $.each(data.ticketSelectOption.admin, function(key, value) {
                    $('#assignee').append($('<option>', {
                        value: value['id'],
                        text: value['name']
                    }));
                });

                $.each(data.ticketSelectOption.type, function(key, value) {
                    $('#type').append($('<option>', {
                        value: value['value'],
                        text: value['text']
                    }));
                });
            }

            if(data.ticket) {
                $('#clientEmail').text(data.ticket.clientEmail);
                $('#clientName').text(data.ticket.clientName);
                $('#clientPhone').text(data.ticket.clientPhone);
                $('#clientID').text(data.ticket.clientID);

                $('#adminLastUpdate').text(data.ticket.adminLastUpdate);
                $('#clientLastUpdate').text(data.ticket.clientLastUpdate);

                $('#internal').text(data.ticket.internal);

                $("#status").val(data.ticket.status);
                $("#priority").val(data.ticket.priority);
                $("#department").val(data.ticket.department);
                $("#assignee").val(data.ticket.assigneeID);
                $("#type").val(data.ticket.type);

                var getUrlKeyword = data.ticket.keyword;
                if(getUrlKeyword != "")
                {  
                    /*Count existed variable stirng in an url*/          
                    var matches = getUrlKeyword.match(/[a-z\d]+=[a-z\d]+/gi);
                    var count = matches? matches.length : 0; 

                    /*Set All variable string value*/                    
                    if(count != -1)
                    {
                        /*Split a long string into an array*/
                        getUrlKeyword = getUrlKeyword.split("&");
                        var k = 0;

                        while(k < count)
                        {
                            var getUrlValue = getUrlKeyword[k].split("=")[1];

                            if(k != ( count - 1) )
                                $('#keyword').append(getUrlValue+ ', ');
                            else
                                $('#keyword').append(getUrlValue);

                            k++;
                        }
                    }
                    else
                        $('#keyword').text(getUrlKeyword);
                }
                else
                    $('#keyword').text('-');
            }
        }

        function submitCallback(data, message) {
            // showMessage('Successfully updated', 'success', 'Update Ticket', 'edit', ['ticketInfo.php', {id: ticketID}]);
            showMessage('Successfully updated', 'success', 'Update Ticket', 'edit', 'allTicket.php');
        }

    </script>
</body>
</html>
