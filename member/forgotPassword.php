<?php include 'include/config.php'; ?>
<?php include 'headLogin.php'; ?>


<body style="overflow-x: hidden;display: flex">

	<div id="" class="col-12">
		<div class="row nuxPayLoginHeight">
			<div class="col-xl-8 col-lg-6 col-12 nuxPayLoginBox nuxPayLoginBG">
				<div class="row">
					<div class="col-12 nuxPayLoginObjectPosition">
						<img class="nuxPayLoginObject" src="/images/login/nuxPayLoginObject.png">
					</div>

					<div class="col-12 mt-5 align-self-center">
						<div class="row">
							<div class="col-12 nuxPayTitle text-right">
								Welcome To <?php echo $sys['companyName'];?>
							</div>
							<div class="col-12 nuxPayDesc text-right">
								<?php echo $translations["M00398"][$language]; ?><!-- Resetting Your Password -->
							</div>
							<div class="col-12 nuxPayNoAccount text-right">
								Remember your password? 
								<span id="signupHere" class="nuxPayBtnSignUp">
									<a href="login.php?type=loginPage" style="color: #51C2DB"> 
										Login here
									</a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-12 nuxPayloginSection2Box">
				<div class="row">
					<div class="loginContainer">
						<div class="row">

							<div class="col-12 text-center">
								<a class="kt-header__brand-logo headerLink" href="homepage.php" data-name="Homepage">
									<img alt="Logo" src="<?php echo $sys['loginLogo'] ?>" style="" class="logoWidth">
								</a>
							</div>

							<div class="col-12">
								<div id="forgotPasswordError" class="alert alert-danger" style="display: none;"></div>
							</div>
							<div class="col-12 text-center nuxPayLoginFormMargin">
								<div class="row">

									<div class="col-12 form-group" style="display: flex;" id="dialingArea">
										<div class="countryContactBox">
											<select id="countryCode" class="selectOption form-control contactInput">
												<?php include 'phoneList.php'; ?>
											</select>
										</div>
										<input id="forgotNumber" placeholder="Phone Number" type="text" class="form-control contactInput">
									</div>

									<div id="switchEmail" class= "col-12 form-group" style="display:flex; text-decoration: underline;">
										<a href="#">Switch to Email</a>
									</div>
									
									<div class="col-12 form-group" id="emailDiv" style="display: flex;">
										<input id="email" placeholder="Email" type="text" class="form-control contactInput">
									</div>

									<div id="switchMobile" class= "col-12 form-group" style="display:flex; text-decoration: underline;">
										<a href="#">Switch to Mobile Number</a>
									</div>

									<div class="col-12 form-group">
										<button id="forgotBtn" type="button" class="btn primaryBtn mb-4">SEND</button>
									</div>

									<div class="col-12 text-center loginCopyRight">
										Copyright © <?php echo date("Y")?> <?php echo $sys['companyName']?>. All Rights Reserved.
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
	var countryCode     = "<?php echo $countryCode; ?>";

	var mode = "mobile";

    $(document).ready(function(){

		$('#emailDiv').hide();
		$('#switchMobile').hide();

		$('#switchEmail').click(function () {

			mode = "email";

			$('#switchEmail').hide();
			$('#dialingArea').hide();
           	$('#forgotNumber').hide();
			$('#switchMobile').show();
			$('#emailDiv').show();
			
		});

		$('#switchMobile').click(function () {

			mode = "mobile";

			$('#switchEmail').show();
			$('#dialingArea').show();
           	$('#forgotNumber').show();
			$('#switchMobile').hide();
			$('#emailDiv').hide();

		});

		$('#countryCode').find('option').each(function(){
			if (countryCode != "ZZ") {
				if ($(this).attr("data-countrycode") == countryCode) {
					$(this).parent().val(this.value).trigger('change');
				}
			}else{
				if ($(this).attr("data-countrycode") == "US") {
					$(this).parent().val(this.value).trigger('change');
				}
			}
		});

    	function format(val) {
            return val.id;
        }
        $('#countryCode').select2({
            dropdownAutoWidth : true,
            templateSelection: format,
            width: 80
        });

		$('#forgotNumber').on('input', function (event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        $('#forgotBtn').click(function(){
        	showCanvas();
        	$('#forgotPasswordError').hide();
            $('#forgotPasswordError').text();

            if( mode == "mobile" && $('input#forgotNumber').val() == ''){
            	$('#forgotPasswordError').show();
	            $('#forgotPasswordError').text("Please fill in your phone number.");
	            $('input#forgotNumber').focus();
	            hideCanvas();
            } else if( mode == "email" && $('input#email').val() == ''){
            	$('#forgotPasswordError').show();
	            $('#forgotPasswordError').text("Please fill in your email address.");
	            $('input#email').focus();
	            hideCanvas();
            } else{

                var forgotPassword = ""
                if(mode=="mobile") {
                	forgotPassword = $('#countryCode').val() + $('input#forgotNumber').val().replace(/^0+/, '');
                } else {
                	forgotPassword = $('input#email').val();
                }
                
                // console.log(forgotPassword);
                
                fCallback = forgotPasswordCB;
                formData  = {
                    command   : 'memberForgotPassword',
                    emailMobile    : forgotPassword
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