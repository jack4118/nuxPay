<?php 
session_start();

    // Get current page name
$thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    if(!isset ($_SESSION['access'][$thisPage]))
        echo '<script>window.location.href="pageLogin.php";</script>';
    $_SESSION['lastVisited'] = $thisPage;
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
                                            Create New Ticket
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="createTicket" role="form">
                                            <div class="col-sm-12 form-group">
                                                <div id="ticketType" class="m-b-20" style="margin-top: 10px">
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" name="radioInline" value="0" id="inlineRadio1" checked>
                                                        <label for="inlineRadio1">
                                                            Email Ticket
                                                        </label>
                                                    </div>

                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" name="radioInline" value="1" id="inlineRadio2">
                                                        <label for="inlineRadio2">
                                                            Internal Ticket
                                                        </label>
                                                    </div>
                                                    <div id="emailTicketT" class="f-12 mt-3" style="">
                                                        The email will be sent to the client and will be logged as a ticket.
                                                    </div>
                                                    <div id="internalTicketT" class="f-12 mt-3" style="display: none;" >
                                                        The ticket is for internal communication only. No email notification will be sent to the client.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="control-label">
                                                    Client Email

                                                </label>
                                                <input id="clientEmail" type="text" class="form-control" maxlength="225" required/>
                                                <span id="clientEmail" class="customError text-danger"></span>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="control-label">
                                                    Client Name

                                                </label>
                                                <input id="clientName" type="text" class="form-control" maxlength="225" required/>
                                                <span id="clientName" class="customError text-danger"></span>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="control-label">
                                                    Client Phone/Mobile Number

                                                </label>
                                                <input id="clientMobile" type="text" class="form-control" maxlength="225" required/>
                                                <span id="clientMobileError" class="customError text-danger"></span>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="control-label">
                                                    Subject

                                                </label>
                                                <input id="subject" type="text" class="form-control" maxlength="225" required/>
                                                <span id="subjectError" class="customError text-danger"></span>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label class="control-label">
                                                    Status
                                                </label>
                                                <select class="form-control" id="statusOptions">
                                                          <!-- <option>Open</option>
                                                          <option>Close</option>
                                                          <option></option> -->
                                                      </select>
                                                  </div>
                                                  <div class="col-sm-6 form-group">
                                                    <label class="control-label">
                                                        Type
                                                    </label>
                                                    <select class="form-control" id="typeOptions">
                                                          <!-- <option>Open</option>
                                                          <option>Close</option>
                                                          <option></option> -->
                                                      </select>
                                                  </div>
                                                  <div class="col-sm-6 form-group">
                                                    <label class="control-label">
                                                        Priority

                                                    </label>
                                                    <select class="form-control" id="priorityOptions">
                                                         <!--  <option>Low</option>
                                                          <option>High</option>
                                                          <option></option> -->
                                                      </select>
                                                  </div>
                                                  <div class="col-sm-6 form-group">
                                                    <label class="control-label">
                                                        Department
                                                    </label>
                                                    <select class="form-control" id="departmentOptions">
                                                          <!-- <option>-</option>
                                                          <option></option>
                                                          <option></option> -->
                                                      </select>
                                                  </div>
                                                  <div class="col-sm-6 form-group">
                                                    <label class="control-label">
                                                        Assignee

                                                    </label>
                                                    <select class="form-control" id="assigneeOptions">
                                                          <!-- <option>-</option>
                                                          <option></option>
                                                          <option></option> -->
                                                      </select>
                                                  </div>

                                                  <div class="col-sm-12 form-group">
                                                    <label class="control-label">
                                                        Content

                                                    </label>
                                                    <textarea id="content" name="content" rows="4" cols="50" class="form-control" required></textarea>
                                                    <span id="contentError" class="customError text-danger"></span>
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                    <label>
                                                        Upload
                                                    </label>
                                                    <input id="attachment" type="file"/>
                                                </div>


                                            </form>
                                            <!-- hidden -->
                                            <!-- <form id="adminType" role="form" style="display:none;">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="name">Admin Type</label>
                                                    <input type="text" class="form-control" value="Admin">
                                                </div>
                                            </form> -->

                                            <div class="col-sm-12 m-t-rem1">
                                                <button id="add" type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Submit
                                                </button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



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
    var url            = 'scripts/reqTicket.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var role           = [];

    var fCallback = loadFormDropdown;

    $(document).ready(function() {

        $('input:radio[name="radioInline"]').change(function(){
            if ($(this).val() == '0') {
                $('#emailTicketT').show();
                $('#internalTicketT').hide();
            }
            else {
                $('#internalTicketT').show();
                $('#emailTicketT').hide();
            }
        });

        var formData = {
            command        : "getTicketDefaultData"
        };

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
        $('#add').click(function() {
            // console.log($('#attachment'));
            var validate = $('#createTicket').parsley().validate();
            if(validate) {
                showCanvas();
                var internal       = $('#ticketType input[name=radioInline]:checked').val();
                var clientEmail    = $('#clientEmail').val();
                var clientName     = $('#clientName').val();
                var clientPhone   = $('#clientMobile').val();
                var subject        = $('#subject').val();
                var content        = $('#content').val();
                var status         = $('#statusOptions option:selected').val();
                var priority       = $('#priorityOptions option:selected').val();
                var assigneeID       = $('#assigneeOptions option:selected').val();
                var assigneeName       = $('#assigneeOptions option:selected').text();
                var type           = $('#typeOptions option:selected').val();
                var department     = $('#departmentOptions option:selected').val();
                var attachment     = $('#attachment')[0].files[0];
                
                var form = new FormData();
                form.append('command', 'addTicket');
                form.append('clientEmail', clientEmail);
                form.append('clientName', clientName);
                form.append('clientPhone', clientPhone);
                form.append('subject', subject);

                form.append('type', type);
                form.append('status', status);
                form.append('priority', priority);
                form.append('department', department);
                form.append('assigneeID', assigneeID);

                form.append('assigneeName', assigneeName);
                form.append('internal', internal);

                form.append('content', content);
                form.append('attachment', attachment);

                fCallback = sendNew;
                ajaxSend(url, form, method, fCallback, debug, bypassBlocking, bypassLoading, 1);
            }
        }); 
    });
    
    function loadFormDropdown(data, message) {
        // console.log(data);
        statusData = data.status;
        priorityData = data.priority;
        assigneeData = data.admin;
        typeData = data.type;
        departmentData = data.department;

        $.each(statusData, function(key,value) {
            $('#statusOptions').append('<option value="' + value['value'] + '">' + value['text'] + '</option>');
        });

        $.each(priorityData, function(key,value) {
            $('#priorityOptions').append('<option value="' + value['value'] + '">' + value['text'] + '</option>');
        });

        $.each(assigneeData, function(key,value) {
            $('#assigneeOptions').append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
        });

        $.each(typeData, function(key,value) {
            $('#typeOptions').append('<option value="' + value['value'] + '">' + value['text'] + '</option>');
        });

        $.each(departmentData, function(key,value) {
            $('#departmentOptions').append('<option value="' + value['value'] + '">' + value['text'] + '</option>');
        });
    }
    
    function sendNew(data, message) {
        showMessage('Successfully created ticket', 'success', 'New Ticket' , 'check', 'allTicket.php');
    }
</script>

</body>
</html>
