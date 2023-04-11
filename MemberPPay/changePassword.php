<?php include 'include/config.php'; ?>

<?php
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
$_SESSION['lastVisited'] = $thisPage;
// if ($_SESSION['paymentGatewayStatus']==0 || !$_SESSION['paymentGatewayStatus']) {
//  header("Location: paymentGatewayCheckStatus.php");
// }
?>

<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">
				<div class="d-flex align-items-center">
					<div class="mr-auto">
						<div class="col-12">
							<div class="row">
								<div class="dashboardTitleWidth">
									<!-- <i class="fa fa-user-circle" style="font-size: 30px; margin-top: 5px;"></i> -->
									<span><i class="fa fa-asterisk" style="font-size: 10px; margin-top: 10px;"></i></span>
									<span><i class="fa fa-asterisk" style="font-size: 10px; margin-top: 10px;"></i></span>
									<span><i class="fa fa-asterisk" style="font-size: 10px; margin-top: 10px;"></i></span>
									<!-- <img src="images/dashboard/transactionIcon.svg" style="width: 30px; margin-top: 5px;" /> -->
								</div>
								<div class="dashboardTitleWidth2">
									<div class="row">
										<div class="col-12 dashboardTitle">
											Change Password
										</div>
										<div class="col-12 dashboardTitleDesc">
											You can change your password here
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="m-content">
				<div class="row">

					<div class="col-xl-12 px-0" style="">
						<div class="m-portlet m-portlet--tab">
							<div class="m-portlet__body">

								<div class="row">
									<div class="col-12">
										<div class="row m-form">
											<div class="col-12 col-md-6">
												<div class="row">
													<div class="col-12">
														<div class="form-group">
															<label class="capitalStyle">Current Password<span class="text-danger">*</span></label>
															<input id="currentPassword" type="password" class="form-control">
														</div>
													</div>

													<div class="col-12">
														<div class="form-group">
										          <label class="capitalStyle">New Password<span class="text-danger">*</span></label>
															<i data-toggle="m-tooltip" data-direction="left" data-width="auto" class="m-form__heading-help-icon descMsg flaticon-info m--icon-font-size-lg" title="" data-html="true" data-original-title="<p align='left' class='mb-0'>Min 4 characters</p>"></i>
										          <input id="newPassword" type="password" class="form-control">
										        </div>
													</div>

													<div class="col-12">
														<div class="form-group">
											        <label class="capitalStyle">Confirm New Password<span class="text-danger">*</span></label>
											        <input id="confirmPassword" type="password" class="form-control">
											      </div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-12">
										<div class="text-center">
											<button id="changePasswordBtn" class="btn searchBtn mx-2 my-2" type="button">Change Passowrd</button>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footerDashboard.php'; ?>
</div>
<?php include 'sharejsDashboard.php'; ?>
</body>
</html>

<script>
	var url             = 'scripts/reqChangePassword.php';
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 0;
	var formData        = "";
	var fCallback       = "";

	$(document).ready(function(){

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
					command: 'changePassword',
					current_password: currentPassword,
					new_password: newPassword,
					confirm_password: confirmPassword
				};
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

			}
		});

		function changePasswordCB(data,message){
        	// console.log(data);
        	showMessage(message, 'success', 'Success', "check-circle-o", 'changePassword.php');
        };

	});
</script>
