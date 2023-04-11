<?php 
	$login=false;
?>

<?php include 'include/config.php'; ?>
<?php include 'headLogin.php'; ?>
<?php include 'headerLogin.php'; ?>


<body class="navNoBtn m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default f-17" style="background: #F6F7F9;">

	
	<div class="m-grid m-grid--hor m-grid--root m-page">


		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(images/bg-3-1.jpg);">
			<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
				<div class="m-login__container containerCustom">
					
					<div class="m-login__signin">
						
							<div class="m-login__head">
								<h3 class="m-login__title">Activate your NuxPay account</h3>
								<div class="m-login__desc"><?php echo $translations["M00416"][$language]; ?><!-- Thanks for your signing up. Please check your email address --> <span id="emailActivate" href="" style="color: #DE2128;"><?php echo $_POST['businessEmail']; ?></span> to activate NuxPay account.</div>
							</div>
							<div class="m-login__form m-form">
								<div class="m-login__form-action">
									<button id="checkEmailLoginBtn" type="button" class="btn btn-focus m-btn--pill m-btn--air btn-outline-metal btn-sm m-btn m-btn--custom theme-login-button mt-2" style=""><?php echo $translations["M00418"][$language]; ?><!-- Login --></button>
								</div>
							</div>
					</div>
				</div>	
			</div>
		</div>				
	<?php include 'footerLogin.php'; ?>
	</div>
	

	
	<?php include 'sharejsDashboard.php'; ?>   

</body>

<script>
	$(document).ready(function() {

		$('#checkEmailLoginBtn').click(function() {
    		utmTracking('','','<?php echo $_POST['businessEmail']; ?>','Check email loginButton');
    		$.redirect("login.php");
    	});

		$("#linkHomepagePage,#linkDashboardPage").click(function(){
			utmTracking('','','<?php echo $_POST['businessEmail']; ?>','Check email logo');
		});

	});
</script>

</html>
