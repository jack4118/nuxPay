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
									<i class="fa fa-user-circle" style="font-size: 30px; margin-top: 5px;"></i>
									<!-- <img src="images/dashboard/transactionIcon.svg" style="width: 30px; margin-top: 5px;" /> -->
								</div>
								<div class="dashboardTitleWidth2">
									<div class="row">
										<div class="col-12 dashboardTitle">
											My Profile
										</div>
										<div class="col-12 dashboardTitleDesc">
											You can view and edit your profile details here
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
										<div class="text-center">
											<div class="profileImgDiv m-auto">
												<img id="profileImgSrc" class="profileStyle" src="">
											</div>

											<div class="mt-3">
												<p id="userName" class="montserratMediumsFont" style="font-size:20px;"></p>
											</div>

											<div class="">
												<button class="btn resetBtn mx-2 my-2" type="button" data-toggle="modal" data-target="#deleteProfilePicture">Delete Profile Picture</button>
												<button id="changePic" class="btn searchBtn mx-2 my-2" type="button">Change Profile Picture</button>
												<input type="file" id="fileUpload" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName(this)">
												<input type="hidden" id="storeFileData">
											</div>
										</div>
									</div>

									<div class="col-12 mt-5">
										<p class="montserratRegularFont" style="text-transform: uppercase; font-size: 15px;">BASIC INFO</p>
										<hr>
										<div class="row m-form">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label class="capitalStyle">Business Name</label>
													<input id="businessName" type="text" class="form-control" disabled>
												</div>
											</div>

											<div class="col-12 col-md-6">
												<div class="form-group">
													<label class="capitalStyle">Business ID</label>
													<input id="businessID" type="text" class="form-control" disabled>
												</div>
											</div>

											<div class="col-12 col-md-6">
												<div class="form-group">
													<label class="capitalStyle">Business Email</label>
													<i data-toggle="m-tooltip" data-direction="left" data-width="auto" class="m-form__heading-help-icon descMsg flaticon-info m--icon-font-size-lg" title="" data-html="true" data-original-title="<p align='left' class='mb-0'>Example: sample@gmail.com</p>"></i>
													<input id="businessEmailAddress" type="text" class="form-control">
												</div>
											</div>

											<div class="col-12 col-md-6">
												<div class="form-group">
													<label class="capitalStyle">Website</label>
													<i data-toggle="m-tooltip" data-direction="left" data-width="auto" class="m-form__heading-help-icon descMsg flaticon-info m--icon-font-size-lg" title="" data-html="true" data-original-title="<p align='left' class='mb-0'>Example: https://www.sample.com</p>"></i>
													<input id="businessWebsite" type="text" class="form-control">
												</div>
											</div>

											<div class="col-12 col-md-6">
												<div class="form-group">
													<label class="capitalStyle">Country</label>
													<select class="form-control" name="" id="businessCountry">
														<?php include 'countryList.php'; ?>
													</select>
												</div>
											</div>

											<div class="col-12">
												<div class="form-group">
													<label class="capitalStyle">Description</label>
													<i data-toggle="m-tooltip" data-direction="left" data-width="auto" class="m-form__heading-help-icon descMsg flaticon-info m--icon-font-size-lg" title="" data-html="true" data-original-title="<p align='left' class='mb-0'>Max 120 Character</p>"></i>
													<textarea id="businessInfo" type="text" class="form-control" rows="5"></textarea>
												</div>
											</div>
										</div>

										<p class="mt-5 montserratRegularFont" style="text-transform: uppercase; font-size: 15px;">Private Info</p>
										<hr>
										<div class="row m-form">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label class="capitalStyle">Company Phone Number</label>
													<input id="businessPhone" type="text" class="form-control">
												</div>
											</div>

											<div class="col-12 col-md-6">
												<div class="form-group">
													<label class="capitalStyle">Company Size</label>
													<select class="form-control" id="companySizeRange">
														<option value="">Select your company size</option>
														<option value="1 - 50">1 - 50</option>
														<option value="51 - 100">51 - 100</option>
														<option value="101 - 300">101 - 300</option>
														<option value="301 - 500">301 - 500</option>
														<option value="501 - 1000">501 - 1000</option>
													</select>
												</div>
											</div>

											<div class="col-12 col-md-6">
												<div class="form-group">
													<label class="capitalStyle">Address Line 1</label>
													<input id="businessAddress1" type="text" class="form-control">
												</div>
											</div>

											<div class="col-12 col-md-6">
												<div class="form-group">
													<label class="capitalStyle">Address Line 2</label>
													<input id="businessAddress2" type="text" class="form-control">
												</div>
											</div>

											<div class="col-12 col-md-6">
												<div class="form-group">
													<label class="capitalStyle">City</label>
													<input id="businessCity" type="text" class="form-control">
												</div>
											</div>

											<div class="col-12 col-md-6">
												<div class="form-group">
													<label class="capitalStyle">State</label>
													<input id="businessState" type="text" class="form-control">
												</div>
											</div>

											<div class="col-12 col-md-6">
												<div class="form-group">
													<label class="capitalStyle">Postal</label>
													<input id="businessPostal" type="text" class="form-control">
												</div>
											</div>
										</div>
									</div>

									<div class="col-12">
										<div class="text-center">
											<button id="saveBtn" class="btn searchBtn mx-2 my-2" type="button">Save</button>
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

<div class="modal fade systemMsg" id="deleteProfilePicture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header text-center pb-3">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body text-center py-0">
				<i class="la la-check-circle text-warning" style="font-size: 70px;color: #f8bb86;"></i>
				<div class="modal-title my-2 f-16" id="exampleModalLabel" style=""><?php echo $translations["M00361"][$language]; /* Delete Business Photo */ ?></div>
				<p><?php echo $translations["M00362"][$language]; /* Are you sure you want to delete your image? */ ?></p>
		</div>
		<div class="modal-footer text-center">
			<a href="" class="btn btn btn m-btn--pill m-btn--air  btn-outline-secondary btn-sm m-btn m-btn--custom" style="color: black;min-width: 100px;" data-dismiss="modal" role="button"><?php echo $translations["M00363"][$language]; /* Cancel */ ?></a>
			<a href="#" class="btn btn btn m-btn--pill m-btn--air btn-sm m-btn m-btn--custom ml-2 theme-button deleteBtn" style="color:white;min-width: 100px;" onclick="testdelete()" data-dismiss="modal" role="button"><?php echo $translations["M00364"][$language]; /* Delete */ ?></a>

		</div>
	</div>
</div>
</div>

<?php include 'sharejsDashboard.php'; ?>
</body>
</html>

<script>
	var url             = 'scripts/reqEditBusiness.php';
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 0;
	var pageNumber      = 1;
	var formData        = "";
	var fCallback       = "";

	$(document).ready(function(){
		formData  = {
			command: 'getProfileData'
		};
		fCallback = loadData;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		var countryValue = "<?php echo $_SESSION["business"]["business_country"]; ?>";
		var companySizeRange =  "<?php echo $_SESSION["business"]["business_company_size"]; ?>";
		$('#businessCountry').val(countryValue);
		$('#companySizeRange').val(companySizeRange);

		$("#changePic").click(function(){
			$("#fileUpload").click();
		});

		$("#saveBtn").click(function(){
			$('.text-danger').hide();
			// showCanvas();

			if (validateEmail($('#businessEmailAddress').val())== false && $('#businessEmailAddress').val()!="")
			{
				hideCanvas();
				$('#businessEmailAddress').after('<span class="text-danger"><?php echo $translations["M00365"][$language]; /* Your email address is invalid. Please enter a valid email address. */ ?>.</span>');
				$('html, body').animate({
					scrollTop: $("#businessEmailAddress").offset().top-120
				}, 500);
				$('#businessEmailAddress').focus();
			}
			else
			{
				var formData ={
					'command' : 'editBusinessConfirm',
					'business_name' : $("#businessName").val(),
					'business_email_address' : $("#businessEmailAddress").val(),
					'business_website' : $("#businessWebsite").val(),
					'business_country' : $("#businessCountry").val(),
					'business_info' : $("#businessInfo").val(),
					'business_phone_number' : $("#businessPhone").val(),
					'business_company_size' : $("#companySizeRange").val(),
					'business_address1' : $("#businessAddress1").val(),
					'business_address2' : $("#businessAddress2").val(),
					'business_city' : $("#businessCity").val(),
					'business_state' : $("#businessState").val(),
					'business_postal' : $("#businessPostal").val()
				};


				fCallback = updateSuccess;
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
			}
		});
	});

	function updateSuccess(data, message)
	{
		showMessage(message, 'success', "Success", "check-circle-o", 'myProfile.php');
	}

	function testdelete() {
		var businessImageDelete = "";
		var formData ={
			'command' : 'editProfileImage',
			'business_profile_picture' : businessImageDelete
		};

		fCallback = updateSuccess;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

	function validateEmail(sEmail) {
		var sEmail = sEmail.trim();
		var filter = /^([\w-\.]+)@/;
		if (filter.test(sEmail)) {
			return true;
		}
		else {
			return false;
		}
	}

	function displayFileName(n)
	{
		if (n.files && n.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$("#storeFileData").val(reader["result"]);

				var picData = $("#storeFileData").val();

				var formData ={
					'command' : 'editProfileImage',
					'business_profile_picture' : picData
				};
				fCallback = updateSuccess;
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
			};
			reader.readAsDataURL(n.files[0]);
		}
	}

	function loadData(data, message) {
		var profileData = data.xun_business;
		$("#userName").html(profileData.business_name);
		$("#profileImgSrc").attr("src", profileData.business_profile_picture);
		$("#businessName").val(profileData.business_name);
		$("#businessID").val(data.business_id);
		$("#businessEmailAddress").val(profileData.business_email_address);
		$("#businessWebsite").val(profileData.business_website);
		$("#businessCountry").val(profileData.business_country);
		$("#businessInfo").val(profileData.business_info);
		$("#businessPhone").val(profileData.business_phone_number);
		$("#companySizeRange").val(profileData.business_company_size);
		$("#businessAddress1").val(profileData.business_address1);
		$("#businessAddress2").val(profileData.business_address2);
		$("#businessCity").val(profileData.business_city);
		$("#businessState").val(profileData.business_state);
		$("#businessPostal").val(profileData.business_postal);
	}
</script>
