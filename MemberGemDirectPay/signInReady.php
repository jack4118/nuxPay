<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>
<?php include 'headerLogin.php'; ?>


<body class="navNoBtn m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default f-17" style="background: #F6F7F9;">

	
	<div class="m-grid m-grid--hor m-grid--root m-page">


		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(images/bg-3-1.jpg);">
			<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
				<div class="m-login__container">
					
					<div class="m-login__signin">
						<div class="m-login__head">
							<h3 class="m-login__title"><?php echo $translations["M00463"][$language]; ?><!-- Ready to Go --></h3>
							<div class="m-login__desc">Your NuxPay account has been successfully created. You can access your dashboard to monitor and manage your NuxPay.</div>
						</div>
						<div class="m-login__form m-form">
							<div class="m-login__form-action">
								<button id="m_login_signin_submit" class="btn btn-focus m-btn--pill m-btn--air btn-outline-metal btn-sm m-btn m-btn--custom theme-login-button mt-2" style="" onclick="window.location.href='dashboard.php'"><?php echo $translations["M00465"][$language]; ?><!-- Go to Dashboard --></button>
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