<?php 
$login=false;
?>

<?php include 'include/config.php'; ?>

<?php 

// include 'storeAds.php';
// print_r($_COOKIE);
?>

<?php include 'headLogin.php'; ?>
<?php include 'headerLogin.php'; ?>


<body class="navLoginBtn m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default f-17" style="background: #F6F7F9;">

	
	<div class="m-grid m-grid--hor m-grid--root m-page">


		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(images/bg-3-1.jpg);">
			<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
				<div class="m-login__container">
					
					<div class="">
						<div class="m-login__head">
							<h1 class="m-login__title"><?php echo $translations["M00402"][$language]; ?><!-- Sign Up for Free --></h1>
						
						</div>
						<div class="m-login__form m-form" action="">
							<div id="loginError" class="alert alert-danger" style="display: none;"></div>
							<div class="form-group m-form__group" style="position: relative;">
								<input id="username" name="username" class="form-control m-input" type="text" placeholder="<?php echo $translations["M00403"][$language]; //Email Address?>*" value="" onchange="inputLinkModal(this.value,'confirmEmail');">

								<span data-toggle="m-tooltip" class="portletCustom m-portlet__nav-link m-portlet__nav-link--icon" data-direction="left" data-width="auto" title="" data-original-title="<?php echo $translations["M00404"][$language]; //Your company email address?>" style="position: absolute; top: 10px; right: -25px;">
									<i class="flaticon-info m--icon-font-size-lg3"></i>
								</span>
							</div>

							<div class="form-group m-form__group" style="position: relative;">
								<input value="" id="password" class="form-control m-input" type="password" placeholder="<?php echo $translations["M00405"][$language]; //Password?>*" name="password">
								<span href="javascript:void(0);" data-toggle="m-tooltip" class="portletCustom m-portlet__nav-link m-portlet__nav-link--icon" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="<p align='left' class='mb-0'><?php echo $translations["M00406"][$language]; //Min 4 characters?></p>" style="position: absolute; top: 10px; right: -25px;">
									<i class="flaticon-info m--icon-font-size-lg3"></i>
								</span>
							</div>
							<div class="form-group m-form__group">
								<input value="" id="retypePassword" class="form-control m-input" type="password" placeholder="<?php echo $translations["M00407"][$language]; //Retype Password?>*" name="retypePassword">
							</div>
							<div class="form-group m-form__group" style="position: relative;">
								<input type="text" id="signInBusinessName" name="signInBusinessName" class="form-control m-input" placeholder="Name*" maxlength="25">
								<span href="javascript:void(0);" data-toggle="m-tooltip" class="portletCustom m-portlet__nav-link m-portlet__nav-link--icon" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="<?php echo $translations["M00409"][$language]; //Max 25 Character?>" style="position: absolute; top: 10px; right: -25px;">
									<i class="flaticon-info m--icon-font-size-lg3"></i>
								</span>
							</div>
							<!-- <div class="form-group m-form__group">
								<input value="" id="referralID" class="form-control m-input" type="text" placeholder="<?php echo $translations["M00410"][$language]; //Referral ID?>" name="serviceAgent" >
							</div> -->
							<div class="m-login__form-action">
								<button id="m_login_signup_submit" class="btn btn-focus m-btn--pill m-btn--air btn-outline-metal btn-sm m-btn m-btn--custom theme-login-button mt-2" style=""><?php echo $translations["M00411"][$language]; ?><!-- Create --></button><!-- &nbsp;&nbsp; -->
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
	
	<?php include 'footerLogin.php'; ?>
	</div>
	<?php include 'sharejsDashboard.php'; ?>   

	

	<div class="modal fade systemMsg" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header text-center pb-3">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body text-center py-0">
					<div id="canvasAlertIcon" class="">
						<i class="la la-warning text-warning" style="font-size: 70px;"></i>
					</div>
					<div class="modal-title my-2" id="exampleModalLabel" style="font-size:17px"><?php echo $translations["M01160"][$language]; /* Confirmation */ ?></div>
					<div id="canvasAlertMessage" class="f-14"><?php echo $translations["M01161"][$language]; /* Please confirm your email address */ ?> <b id="confirmEmail"></b>.</div>
				</div>
				<div id="canvasFooter" class="modal-footer text-center">
					<a id="editBtn" class="btn btn btn m-btn--pill m-btn--air  btn-outline-secondary btn-sm m-btn m-btn--custom" style="color:#000;" data-dismiss="modal" role="button"><?php echo $translations["M01162"][$language]; /* Edit */ ?></a>
					<a id="confirmBtn" class="btn btn btn m-btn--pill btn-outline-success btn-sm m-btn m-btn--custom theme-btn-green" style="color:#000;" data-dismiss="modal" role="button"><?php echo $translations["M01163"][$language]; /* Confirm */ ?></a>
				</div>
			</div>
		</div>
	</div>

</body>

<script>
	$('#loginError').hide();
	$(document).ready(function(){
		
		var businessName="";
		var username="";
		
		var referralID = "<?php echo $_GET['r']; ?>";

		var pathname = window.location.pathname;

		window.history.pushState("object or string", "Title", pathname);

		if (referralID) {
			$('#referralID').val(referralID);
			document.getElementById("referralID").disabled = true;
		}else{
			document.getElementById("referralID").disabled = false;
		}

		$('body').keypress(function(e){
            if(e.which == 13){//Enter key pressed
            	if ($('#canvasMessage').hasClass('show')) {
            		$('#canvasCloseBtn').click();//Trigger enter button click event
            	}else if ($('#confirmationModal').hasClass('show')) {
            		$('#confirmBtn').click();//Trigger enter button click event
            	}else{
            		$('#m_login_signup_submit').click();//Trigger enter button click event
            	}
            }
        });

		$('#m_login_signup_submit').click(function(){
			
			businessName = $('input#signInBusinessName').val();
			username = $('input#username').val();

			document.getElementById("m_login_signup_submit").disabled = true;
			if ($('input#username').val() == ''){
				utmTracking(businessName,'',username,'Normal Sign Up email_empty',0);
				$('#loginError').hide();
				$('#loginError').show();
				$('html, body').animate({
                    scrollTop: $("#username").offset().top-200
                }, 500);
				$('#loginError').text('<?php echo $translations["M01155"][$language]; /* Please fill in your email. */ ?>');
				$('input#username').focus();
				document.getElementById("m_login_signup_submit").disabled = false;
			}else if(validateEmail($('input#username').val())== false) {
				utmTracking(businessName,'',username,'Normal Sign Up email_notValid',0);
				$('#loginError').hide();
				$('#loginError').show();
				$('html, body').animate({
                    scrollTop: $("#username").offset().top-200
                }, 500);
				$('#loginError').text('<?php echo $translations["M01156"][$language]; /* Your email address is invalid. Please enter a valid email address. */ ?>');
				$('input#username').focus();
				document.getElementById("m_login_signup_submit").disabled = false;
			}
			else if($('input#password').val() == '') {
				utmTracking(businessName,'',username,'Normal Sign Up password_empty',0);
				$('#loginError').hide();
				$('#loginError').show();
				$('html, body').animate({
                    scrollTop: $("#password").offset().top-200
                }, 500);
				$('#loginError').text('<?php echo $translations["M01157"][$language]; /* Please fill in your password. */ ?>');
				$('input#password').focus();
				document.getElementById("m_login_signup_submit").disabled = false;
			}
			else if($('input#password').val() != $('input#retypePassword').val()) {
				utmTracking(businessName,'',username,'Normal Sign Up password_notMatch',0);
				$('#loginError').hide();
				$('#loginError').show();
				$('html, body').animate({
                    scrollTop: $("#password").offset().top-200
                }, 500);
				$('#loginError').text('<?php echo $translations["M01158"][$language]; /* The passwords you entered do not match. Please retype your password. */ ?>');
				$('input#retypePassword').focus();
				document.getElementById("m_login_signup_submit").disabled = false;
			}else if($('input#signInBusinessName').val() == '') {
				utmTracking(businessName,'',username,'Normal Sign Up businessName_empty',0);
				$('#loginError').hide();
				$('#loginError').show();
				$('html, body').animate({
                    scrollTop: $("#password").offset().top-200
                }, 500);
				$('#loginError').text('<?php echo $translations["M01159"][$language]; /* Please fill in your name. */ ?>');
				$('input#signInBusinessName').focus();
				document.getElementById("m_login_signup_submit").disabled = false;
			}
			else {
				utmTracking(businessName,'',username,'Normal Sign Up confirmation',0);
				$('#loginError').hide();
				document.getElementById("m_login_signup_submit").disabled = false;
				
				$('#confirmationModal').modal('toggle');
			}

		});

		$('#confirmBtn').click(function(){
				showCanvas();
				var url 	=	'scripts/reqRegister.php';
				var formData  		= {
					command: 'memberRegister',
					business_email: $('input#username').val(),
					business_password: $('input#password').val(),
					business_name: $('input#signInBusinessName').val()
				};

				var method	=	'POST';
				var debug	=	0;
				var	bypassBlocking 	= 0;
				var bypassLoading   = 0;
				

				$.ajax({
                         type: method, // define the type of HTTP verb we want to use (POST for our form)
                         url: url, // the url where we want to POST
                         data: formData, // our data object
                         dataType: 'text', // what type of data do we expect back from the server
                         encode: true
                        })
                        .done(function(data) {
                            
                          var obj = JSON.parse(data);
                          
                        
                        if(obj.code == 1){
                            hideCanvas();
                            utmTracking(businessName,'',username,'Normal Sign Up ('+obj.message_d+')',0);
                            showMessage(obj.message_d, 'success', '<?php echo $translations["M01164"][$language]; /* Congratulations */ ?>', 'check-circle-o', ['signUpCheckEmail.php', {businessEmail: $('input#username').val()}])
                        }else{
                        	hideCanvas();
                        	utmTracking(businessName,'',username,'Normal Sign Up register ('+obj.message_d+')',0);
                        	if (obj.error_message) {
                        		var error_message="";
                        		$.each(obj.error_message, function(k, v) {
                        			error_message+=v+"<br>";
                        		});
                        		showMessage(obj.message_d+"<br><?php echo $translations["M01165"][$language]; ?><br>"+error_message, 'warning', obj.message, 'warning', '')
                        	}else{
                        		showMessage(obj.message_d, 'warning', obj.message, 'warning', '')
                        	}
                            
                            
                        }                
                    });
		});

	});
	
	function inputLinkModal(value,linkID) {
        $('#'+linkID).text(value);
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

</script>
</html>