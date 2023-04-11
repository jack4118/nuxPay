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
<!--

                <div class="row">
                    <div class="col-sm-4">
                        <a id="addBackBtn" href="news.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
                    </div> end col 
                </div>
-->

                <div class="row">


                    <div class="col-lg-12 col-md-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        Change Password
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">

                                        <form id="customPrice" role="form">
                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-6 px-0">

                                                    <div id="blogDIV">
                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Old Password</label>
                                                            <span class="text-danger">*</span>
                                                            <input id="currentPassword" type="password" class="form-control" value="">
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">New Password</label>
                                                            <span class="text-danger">*</span>
                                                            <input id="newPassword" type="password" class="form-control">
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label">Re-type New Password</label>
                                                            <span class="text-danger">*</span>
                                                            <input id="confirmPassword" type="password" class="form-control">
                                                        </div>


                                                        <div class="form-group m-form__group">
                                                            <a id="changePasswordBtn" href="javascript:void(0);" class="btn btn-primary waves-effect waves-light" style="" role="button"><?php echo $translations["M01419"][$language]; /* Submit */ ?></a>
                                                        </div>





                                                    </div>

                                                </div>

                                            </div>
                                    </div>
                                    </form>
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
<script>
    var resizefunc = [];

</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

<script>
    // Initialize the arguments for ajaxSend function
    var url = 'scripts/reqChangePassword.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var formData = "";
    var fCallback = "";

    $(document).ready(function() {
        
        $('#changePasswordBtn').click(function(){

			if( $('input#currentPassword').val() == ''){
				$('.text-danger').hide();
    			$('input#currentPassword').after('<span class="text-danger"><?php echo $translations["M00377"][$language]; /* Please fill in your current password. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#currentPassword").offset().top-120
				}, 500);
				$('input#currentPassword').focus();
			}else if( $('input#newPassword').val() == ''){
				$('.text-danger').hide();
    			$('input#newPassword').after('<span class="text-danger"><?php echo $translations["M00378"][$language]; /* Please fill in your new password. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#newPassword").offset().top-120
				}, 500);
				$('input#newPassword').focus();
			}else if( $('input#confirmPassword').val() == ''){
				$('.text-danger').hide();
    			$('input#confirmPassword').after('<span class="text-danger"><?php echo $translations["M00379"][$language]; /* Please fill in your confirm password. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#confirmPassword").offset().top-120
				}, 500);
				$('input#confirmPassword').focus();
			}else if($('input#newPassword').val() != $('input#confirmPassword').val()){
				$('.text-danger').hide();
    			$('input#confirmPassword').after('<span class="text-danger"><?php echo $translations["M00380"][$language]; /* The passwords you entered do not match. Please retype your password. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#confirmPassword").offset().top-120
				}, 500);
				$('input#confirmPassword').focus();
			}else{
                $('.text-danger').hide();
				var currentPassword = $('input#currentPassword').val();
				var newPassword = $('input#newPassword').val();
				var confirmPassword = $('input#confirmPassword').val();

				fCallback = changePasswordCB;
				formData  = {
					command: 'resellerChangePassword',
					current_password: currentPassword,
					new_password: newPassword,
					confirm_password: confirmPassword
				};
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

			}
		});
        
        function changePasswordCB(data,message){
        	//console.log(data);
        	showMessage(message, 'success', 'Success', "check-circle-o", 'dashboard.php');
        };



    });

</script>