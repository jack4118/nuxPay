<?php include 'include/config.php'; ?>
<?php include 'headLogin.php'; ?>


<body style="overflow-x: hidden;display: flex">

	<div id="" class="col-12">
		<div class="row pPayLoginHeight">
			<div class="col-xl-8 col-lg-6 col-12 pPayLoginBox pPayLoginBG">
				<div class="row">
					<div class="col-12 pPayLoginObjectPosition">
						<img class="pPayLoginObject" src="/images/login/pPayLoginObject.png">
					</div>

					<div class="col-12 mt-5 align-self-center">
						<div class="row">
							<div class="col-12 pPayTitle text-right">
								Welcome To <?php echo $sys['companyName'];?>
							</div>
							<div class="col-12 pPayDesc text-right">
								<?php echo $translations["M00398"][$language]; ?><!-- Resetting Your Password -->
							</div>
							<div class="col-12 pPayNoAccount text-right">
								Remember your password? 
								<span id="signupHere" class="pPayBtnSignUp">
									<a href="login.php?type=loginPage" style="color: #231917"> 
										Login here
									</a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-12 pPayloginSection2Box">
				<div class="row">
					<div class="loginContainer">
						<div class="row">

							<div class="col-12 text-center">
								<a class="kt-header__brand-logo headerLink" href="homepage.php" data-name="Homepage">
									<img alt="Logo" src="<?php echo $sys['newHomepageLogoBlack2'] ?>" style="" class="logoWidth">
								</a>
							</div>

							<div class="col-12">
								<div id="forgotPasswordError" class="alert alert-danger" style="display: none;"></div>
							</div>
							<div class="col-12 text-center pPayLoginFormMargin">
								<div class="row">

									<div class="col-12 form-group" style="display: flex;">
										<div class="countryContactBox">
											<select id="countryCode" class="form-control contactInput">
												<?php include 'phoneList.php'; ?>
											</select>
										</div>
										<input id="forgotNumber" placeholder="Phone Number" type="text" class="form-control contactInput">
									</div>

									<div class="col-12 form-group">
										<button id="forgotBtn" type="button" class="btn primaryBtn mb-4">SEND</button>
									</div>

									<div class="col-12 text-center loginCopyRight">
										Copyright © 2020 <?php echo $sys['companyName'];?>. All Rights Reserved.
									</div>


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<?php include 'sharejsDashboard.php'; ?>   
</body>


</html>

<script src="js/general.js"></script>
<script>

    var url             = 'scripts/reqForgotPassword.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var formData        = "";
    var fCallback       = "";

    $(document).ready(function(){

    	function format(val) {
            return val.id;
        }
        $('#countryCode').select2({
            dropdownAutoWidth : true,
            templateSelection: format,
            width: 80
        });

        $('#forgotBtn').click(function(){
        	showCanvas();
        	$('#forgotPasswordError').hide();
            $('#forgotPasswordError').text();

            if( $('input#forgotEmail').val() == ''){
            	$('#forgotPasswordError').show();
	            $('#forgotPasswordError').text("Please fill in your phone number.");
	            $('input#forgotEmail').focus();
	            hideCanvas();
            }else{

                var forgotPassword = $('#countryCode').val() + $('input#forgotNumber').val().replace(/^0+/, '');
                console.log(forgotPassword);
                
                fCallback = forgotPasswordCB;
                formData  = {
                    command   : 'memberForgotPassword',
                    mobile    : forgotPassword
                };
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

				hideCanvas();
            }
        });
    });

    function forgotPasswordCB(data,message){
        showMessage(message, 'success', '<?php echo $translations["M01173"][$language]; /* Success */ ?>', "check-circle-o", 'login.php');
    };

</script>