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
                     <a id="backbtn" href="javascript:void(0);" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
                 </div><!-- end col -->
             </div>

             <div class="row">


                <div class="col-lg-12 col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default bx-shadow-none">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    Edit Category
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">

                                   <form id="customPrice" role="form">
                                    <div class="col-sm-6 px-0">
                                     <div id="telcoError" class="alert alert-danger" style="display: none;"></div>
                                     <div class="col-sm-12 form-group">
                                        <label class="control-label" for="" data-th="#">Category Name</label>
                                        <input id="tag" type="text" class="form-control" dataName="" dataType="text" disabled>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label class="control-label" for="" data-th="#">Add Team Member</label>
                                        <div id="employee_mobile_empty" class="employeeEmpty" style="display: none;">
                                            <span>Please add this business employee first. <a href='javascript:$.redirect("businessesAddTeamMember.php",{id:<?php echo $_POST['id']; ?>});'>Add Now</a></span>
                                        </div>
                                        <div id="employeeDIV" style="display: none;">
                                            <select id="employee_mobile" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Select a team member">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label class="control-label" for="" data-th="#">Working Hours</label>
                                        <div class="input-daterange input-group" id="date-range">
                                            <input id="working_hour_from" type="text" class="form-control timeFrom" name="start" />
                                            <span class="input-group-addon bg-primary b-0">To</span>
                                            <input id="working_hour_to" type="text" class="form-control" name="end" />
                                        </div>
                                    </div>

                                    <div class="col-sm-12 form-group">
                                        <label class="control-label" for="" data-th="#">Sorting Order <span class="text-danger">*</span></label>
                                        <input id="order" type="text" class="form-control" dataName="" dataType="text" maxlength="3">
                                    </div>

                                    <div class="col-sm-12 form-group">
                                        <label class="control-label" for="" data-th="#">Description</label>
                                        <textarea id="tag_description" class="form-control"></textarea>
                                    </div>

                                    <div class="col-sm-12 form-group">
                                        <div class="checkbox">
                                            <input type="checkbox" id="clicker">
                                            <label for="remember-1" > Forward URL </label>
                                        </div>
                                        <input id="callback_url" type="text" class="form-control" dataName="" dataType="text" disabled>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 my-4 px-0">
                <button id="editCategoriesBtn" type="button" class="btn btn-primary waves-effect waves-light">Save</button>
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

<script>
    $(".select2").select2();
</script>

<script>

    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqBusinesses.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = ""; 
    var businessID = "<?php echo $_POST['id']; ?>";
    var tag = "<?php echo $_POST['name']; ?>";

    var parentLink = $('ul.breadcrumb').children();
    var total = $('ul.breadcrumb').children().length;

    $(parentLink).each(function(k,v){
        if (total>=4 && k==total-2) {
            var oldLink = $(this).children().attr("href");
            $(this).children().attr({href:"javascript:void(0);", onClick:"redirectBreadcrumb(\""+oldLink+"\");"});
            // console.log(oldLink);
        }else if(k==total-1){
            var oldLink = $(this).children().attr("href");
            var redirectData = tag;
            $(this).children().attr({href:"javascript:void(0);", onClick:"redirectBreadcrumb(\""+oldLink+"\",\""+redirectData+"\");"});
        }
    });

    function redirectBreadcrumb(link,data){
        if (data) {
            $.redirect(link, {id: businessID,name: data});
        }else{
            $.redirect(link, {id: businessID});
        }
    }

    $(document).ready(function(){

        if (!businessID) {
            window.ajaxEnabled = false;
            showMessage("Business Not Found, Please try again. ", 'danger', 'Some error occured', "", 'businesses.php');
        }

        var formData = {
            command  : "adminGetUserConfirmedMember",
            businessID : businessID
        };
        var fCallback = loadEmployeeList;
        // console.log(formData);

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#backbtn').click(function() {
            $.redirect("businessesCategories.php", {id: businessID});
        });

        $('#clicker').click(function(){
            $("#callback_url").each(function() {
                if ($("#callback_url").attr('disabled')) {
                    $("#callback_url").removeAttr('disabled');
                }
                else {
                    $("#callback_url").attr('disabled', true);
                    $("#callback_url").val('');
                }
            });
        });

        $('#editCategoriesBtn').click(function(){


            if( $('input#order').val() == ''){
                $('.text-danger').hide();
                $('input#order').after('<span class="text-danger">Please enter sorting order.</span>');
                $('html, body').animate({
                    scrollTop: $("#order").offset().top-160
                }, 500);
                $('input#order').focus();
            }else{

                //insert input ID and value here
                if (!$('select#employee_mobile').val()) {
                    var addEmployee = [""];
                }else{
                    var addEmployee = $('select#employee_mobile').val();
                }

                var tag = $('input#tag').val();
                var tag_description = $('textarea#tag_description').val();
                var callback_url = $('input#callback_url').val();
                var order = $('input#order').val();
                var businessID = "<?php echo $_POST['id']; ?>";

                if ($("#working_hour_from").val()) {
                    working_hour_from = getUtcTime(formatTime($("#working_hour_from").val()));
                }else{
                    working_hour_from = $("#working_hour_from").val();
                }

                if ($("#working_hour_to").val()) {
                    working_hour_to = getUtcTime(formatTime($("#working_hour_to").val()));
                }else{
                    working_hour_to = $("#working_hour_to").val();
                }

                fCallback = saveChanges;
                formData  = {
                    command: 'adminUserEditCategory',
                    tag: tag,
                    employee_mobile: addEmployee,
                    tag_description: tag_description,
                    callback_url: callback_url,
                    businessID : businessID,
                    working_hour_from : working_hour_from,
                    working_hour_to : working_hour_to,
                    order : order
                };
                // console.log(formData);
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            }


        });
    });

    function loadEmployeeList(data, message) {
            // console.log(data);

            if (!data) {
                $('#employee_mobile_empty').show();
            }else{
                $('#employeeDIV').show();
                for(var i=0; i<data.length; i++){
                    $("#employee_mobile").append("<option value='"+data[i]["employee_mobile"]+"'>"+data[i]["employee_name"]+"</option>");
                };
            }

            $(".js-example-placeholder-multiple").select2({
                placeholder: "Select an team member"
            });

            fCallback = loadDefaultListing;
            formData  = {
                command    : 'adminGetCategoryDetails',
                businessID : businessID,
                tag        : tag
            };
            // console.log(formData);
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }


        

        function loadDefaultListing(data, message) {
            // console.log(data);

            var currentTimeFrom, currentTimeTo;
            if (data.working_hour_from) {
                currentTimeFrom = data.working_hour_from;
            }else{
                currentTimeFrom='';
            }

            if (data.working_hour_to) {
                currentTimeTo = data.working_hour_to;
            }else{
                currentTimeTo='';
            }

            if (data.callback_url) {
                $('#clicker').prop('checked', true);
                $("#callback_url").attr('disabled', false);
                $('#callback_url').val(data.callback_url);
            }else{
                $('#clicker').prop('checked', false);
                $("#callback_url").attr('disabled', true);
                $('#callback_url').val('');
            }
            
            $('#tag').val(data.tag);
            $('#employee_mobile').val(data.employee_mobile).trigger('change');
            $('#tag_description').val(data.tag_description);
            $('#order').val(data.priority);
            $('#working_hour_from').val(getUserLocalTime(data.working_hour_from));
            $('#working_hour_to').val(getUserLocalTime(data.working_hour_to));

            $("#working_hour_from").timepicker({
                defaultTime : getUserLocalTime(currentTimeFrom),
                showSeconds: true,
                showMeridian: false
            });

            $("#working_hour_to").timepicker({
                defaultTime : getUserLocalTime(currentTimeTo),
                showSeconds: true,
                showMeridian: false
            });
        }

        function saveChanges(data,message){
        //console.log(data);
        showMessage(message, 'success', 'Congratulations!', "", ['businessesCategories.php', {id: businessID}]);
    };

</script>