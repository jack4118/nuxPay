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
                     <a href="businesses.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                        <i class="md md-add"></i>
                        Back
                      </a>
                 </div><!-- end col -->
             </div>

             <div class="row">

                <?php include("businessesSidebar.php"); ?>

                <div class="col-lg-12 col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default bx-shadow-none">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    Live Chat Settings
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">

                                    <form id="customPrice" role="form">
                                        <!-- <div class="col-sm-6 px-0"> -->
                                         <div id="telcoError" class="alert alert-danger" style="display: none;"></div>
                                         <div class="col-sm-12 form-group">
                                            <div class="col-sm-12 px-0">
                                                <label class="control-label" for="" data-th="#">Website URL</label>
                                            </div>
                                            <div class="col-sm-6 px-0">
                                                <input id="websiteURL" type="text" class="form-control" dataName="" dataType="text" value="" placeholder="Eg: https://thenux.com">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-12 px-0">
                                                <label class="control-label" for="" data-th="#">Contact Us URL</label>
                                            </div>
                                            <div class="col-sm-6 px-0">
                                                <input id="contactUsURL" type="text" class="form-control" dataName="" dataType="text" value="" placeholder="Eg: https:/thenux.com/contactUsWeb.php">
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-12 form-group" style="display: none;">
                                            <div class="col-sm-12 px-0">
                                                <label class="control-label" for="" data-th="#">No Agent Pick Up Message</label>
                                            </div>
                                            <div class="col-sm-6 px-0">
                                                <textarea class="form-control" id="noAgentPickUpMsg" rows="4" placeholder="Eg: Please wait for a support personnel to accept the chat."></textarea>
                                            </div>  
                                            <div class="col-sm-6">
                                                <label for="example-text-input ">Add Contact Us URL</label>
                                                <div class="input-group">
                                                    <input type="text" id="example-input2-group2" name="example-input2-group2" class="form-control" value="Click Here">
                                                    <span class="input-group-btn">
                                                    <button type="button" class="btn waves-effect waves-light btn-primary">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                    </span>
                                                </div>
                                            </div>   
                                        </div>
                                        <div class="col-sm-12 form-group" style="display: none;">
                                            <div class="col-sm-12 px-0">
                                                <label class="control-label" for="" data-th="#">After Working Hour Message</label>
                                            </div>
                                            <div class="col-sm-6 px-0">
                                                <textarea class="form-control" id="afterWorkingHrsMsg" rows="4" placeholder="Eg: We are sorry, all our agents are not available. Please leave us a message here and we'll get back to you right away."></textarea>
                                            </div>  
                                            <div class="col-sm-6">
                                                <label for="example-text-input ">Add Contact Us URL</label>
                                                <div class="input-group">
                                                    <input type="text" id="example-input2-group2" name="example-input2-group2" class="form-control" value="Click Here">
                                                    <span class="input-group-btn">
                                                    <button type="button" class="btn waves-effect waves-light btn-primary">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                    </span>
                                                </div>
                                            </div>                                               
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-12 px-0">
                                                <label class="control-label" for="" data-th="#">Live Chat First Message</label>
                                            </div>
                                            <div class="col-sm-6 px-0">
                                                <textarea class="form-control" id="firstMsg" rows="4" placeholder="Eg: Hello, thanks for contacting us. How may I help you today?"></textarea>
                                            </div>   
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-12 px-0">
                                                <label class="control-label" for="" data-th="#">Prompt</label>
                                            </div>
                                            <div class="col-sm-6 px-0">
                                                <input id="prompCheck" type="checkbox" data-color="#00b19d"/>
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-12 px-0">
                                                <label class="control-label" for="" data-th="#">Info to fill up before start a live chat <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-6 px-0">
                                                <input type="text" id="firstColumn" name="example-text-input" class="form-control" placeholder="Eg: Name">
                                            <input type="text" id="secondColumn" name="example-text-input" class="form-control mt-2" placeholder="Eg: Email">
                                            </div>  
                                        </div>
                                    <!-- </div> -->

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 my-4 px-0">
                    <button id="edit" type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                </div>
            </div>
        </div>
        <!-- End row -->

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

<!-- <script>
    $(".select2").select2();

    //Date range picker
    jQuery('#date-range').datepicker({
                toggleActive: true
    });
</script> -->

<script>
    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqBusinesses.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var formData       = "";
    var fCallback      = "";
    var businessID = "<?php echo $_POST['id']; ?>";
    var employeeID ="<?php echo $_POST['employee_id']; ?>";
    var businessID = "<?php echo $_POST['id']; ?>";
    var teamMemberid ="<?php echo $_POST['employee_id']; ?>";
    // console.log(businessID);
    // console.log(teamMemberid);

    var parentLink = $('ul.breadcrumb').children();
    var total = $('ul.breadcrumb').children().length;

    $(parentLink).each(function(k,v){
      if (total>=4 && k==total-2) {
        var oldLink = $(this).children().attr("href");
        $(this).children().attr({href:"javascript:void(0);", onClick:"redirectBreadcrumb(\""+oldLink+"\");"});
        // console.log(oldLink);
      }else if(k==total-1){
        var oldLink = $(this).children().attr("href");
        $(this).children().attr({href:"javascript:void(0);", onClick:"redirectBreadcrumb(\""+oldLink+"\");"});
      }
    });

    function redirectBreadcrumb(link,data){
      if (data) {
        $.redirect(link, {id: businessID,name: data});
      }else{
        $.redirect(link, {id: businessID});
      }
    }

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
        formData  = {command: 'adminLivechatSettingGet',
        business_id : businessID
    };

    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


    function loadDefaultListing(data, message) {
        // console.log(data);

        $("#websiteURL").val(data.websiteUrl);
        $("#contactUsURL").val(data.contactUsURL);
        $("#noAgentPickUpMsg").val(data.liveChatNoAgentMsg);
        $("#afterWorkingHrsMsg").val(data.liveChatAfterWorkingHrsMsg);
        $("#firstMsg").val(data.liveChatFirstMsg);

        if (data.liveChatPromp==1) {
            $("#prompCheck").bootstrapSwitch('state', true);
        }else{
            $("#prompCheck").bootstrapSwitch('state', false);
        }
        // if (data.liveChatPromp==1) {
        //     $("#prompCheck").attr('checked', true);
        // }else{
        //     $("#prompCheck").attr('checked', false);
        // }

        if (data.liveChatInfo) {
            $("#firstColumn").val(data.liveChatInfo[0]);
            $("#secondColumn").val(data.liveChatInfo[1]);
        }
        
    }        

    $('#edit').click(function() {
            // console.log($('.timeFrom').val());

            $('.error-danger').hide();

            if( $('input#firstColumn').val() == ''){
                $('input#firstColumn').after('<span class="error-danger">Please enter your first column info.</span>');
                $('html, body').animate({
                    scrollTop: $("#firstColumn").offset().top-160
                }, 500);
                $('input#firstColumn').focus();
            }else if( $('input#secondColumn').val() == ''){
                $('input#secondColumn').after('<span class="error-danger">Please enter your second column info.</span>');
                $('html, body').animate({
                    scrollTop: $("#secondColumn").offset().top-160
                }, 500);
                $('input#secondColumn').focus();
            }
            else{
                var websiteURL = $("#websiteURL").val();
                var contactUsURL = $('#contactUsURL').val();
                var noAgentPickUpMsg = $('#noAgentPickUpMsg').val();
                var afterWorkingHrsMsg = $('#afterWorkingHrsMsg').val();
                var firstMsg = $('#firstMsg').val();
                if ($('#prompCheck').is(':checked')) {
                    var prompCheck = '1';
                }else{
                    var prompCheck = '0';
                }
                var firstColumn = $('#firstColumn').val();
                var secondColumn = $('#secondColumn').val();
                var liveChatInfo = [];
                liveChatInfo.push(firstColumn,secondColumn);

                var formData  = {
                    command: 'adminLivechatSettingAdd',
                    business_id : businessID,
                    websiteUrl:websiteURL,
                    contactUsURL: contactUsURL,
                    liveChatNoAgentMsg: noAgentPickUpMsg,
                    liveChatAfterWorkingHrsMsg: afterWorkingHrsMsg,
                    liveChatFirstMsg: firstMsg,
                    liveChatPromp: prompCheck,
                    liveChatInfo: liveChatInfo
                };

                // console.log(formData);

                fCallback = sendEdit;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });
});

    function sendEdit(data, message) {
        showMessage(message, 'success', 'Successfully updated', 'file', ['businessesLiveChatSettings.php', {id: businessID}]);
    }
</script>