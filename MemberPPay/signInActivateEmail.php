<?php 
	$login=false;
?>

<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>
<?php include 'headerLogin.php'; ?>


<body class="navLoginBtn m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default f-17" style="background: #F6F7F9;">

	
	<div class="m-grid m-grid--hor m-grid--root m-page">


		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(images/bg-3-1.jpg);">
			<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
				<div class="m-login__container containerCustom">
					
					<div class="m-login__signin">
						
						<div class="m-login__head">
							<h3 class="m-login__title">Please activate your NuxPay Account</h3>
							<div class="m-login__desc"><span id="emailActivate" href="" style="color: #DE2128;"><?php echo $_POST['username']; ?></span> is not an activated NuxPay Account. Please check your email address to activate NuxPay account.</div>
						</div>
						<div class="m-login__form m-form">
							<div class="m-login__form-action">
								<button id="resendEmailBtn" type="button" class="btn btn-focus m-btn--pill m-btn--air btn-outline-metal btn-sm m-btn m-btn--custom theme-login-button mt-2" style=""><?php echo $translations["M00423"][$language]; ?><!-- Resend Email --></button>
							</div>
						</div>
						
					</div>
				</div>	
			</div>
		</div>				

	</div>
	

	<?php include 'footerLogin.php'; ?>
	<?php include 'sharejsDashboard.php'; ?>   

</body>

</html>

<script>
	var url = 'scripts/reqLogin.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;

	$(document).ready(function() {
		$('#resendEmailBtn').click(function() {
           
            var formData = {
            	command   : "resendEmail",
            	business_email : "<?php echo $_POST['username']; ?>"
            };
            fCallback = resendEmailMsg;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);    
        });

		function resendEmailMsg(data, message) {
			showMessage(message, 'success', '<?php echo $translations["M01173"][$language]; /* Success */ ?>', 'check-circle-o', 'login.php');
		}
	});

</script>