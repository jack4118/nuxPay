<?php session_start() ?>

<header id="m_header" class="m-grid__item m-header "  m-minimize-offset="200" m-minimize-mobile-offset="200" style="z-index: 101;">
	<div class="m-container m-container--fluid m-container--full-height m-header-custom" style="">
		<div class="m-stack m-stack--ver m-stack--desktop">

			<div class="m-stack__item m-brand m-brand--skin-dark ">
				<div class="m-stack m-stack--ver m-stack--general">

					<div class="m-stack__item m-stack__item--middle m-brand__logo">
						<a href="homepage.php" class="m-brand__logo-wrapper">
							<?php

							echo "<img src="."images/ppay/ppay_logo_white.png"." alt=\"LOGO\" style=\"height: 35px;\">";

							?>
						</a>
					</div>

					<div class="m-stack__item m-stack__item--middle m-brand__tools">
						<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
							<span></span>
						</a>
						<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
							<span></span>
						</a>
					</div>

				</div>
			</div>

			<div class="m-stack__item m-brand m-brand--skin-dark headerBackground"></div>

			<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

				<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>


			</div>
		</div>
	</div>
</header>

<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">


	<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
	<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
		<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark" m-menu-vertical="1"
		m-menu-scrollable="1" m-menu-dropdown-timeout="500">
		<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow site-nav pt-0 mt-3">

			<li class="m-menu__item" aria-haspopup="true" >
				<a href="gettingStarted.php" class="m-menu__link alignmentMinimizeIcon">
					<i class="m-menu__link-icon whiteIconRocketSvg"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap marginLeftImgIcon">
							<span class="m-menu__link-text">Getting Started</span>
						</span>
					</span>
				</a>
			</li>

			<li class="m-menu__item" aria-haspopup="true" >
				<a href="dashboard.php" class="m-menu__link m-menu__toggle">
					<img src="images/header/headerDashboard.svg" class="headerIconSize">
					<span class="m-menu__link-text headerBtnText">Dashboard</span>
				</a>
			</li>

			<li class="m-menu__item" aria-haspopup="true" >
				<a href="transactionHistory.php" class="m-menu__link m-menu__toggle">
					<img src="images/header/headerTransactionHistory.svg" class="headerIconSize">
					<span class="m-menu__link-text headerBtnText">Transaction History</span>
				</a>
			</li>

			<li class="m-menu__item" aria-haspopup="true" >
				<a href="apiKeysListing.php" class="m-menu__link m-menu__toggle">
					<img src="images/dashboard/apiKeyWhiteIcon.svg" class="headerIconSize" style="height: 10px">
					<span class="m-menu__link-text headerBtnText">Api Keys</span>
				</a>
			</li>

			<li class="m-menu__item" aria-haspopup="true" >
				<a href="paymentGateway.php" class="m-menu__link m-menu__toggle" target="_blank">
					<img src="images/dashboard/documentationsIcon.svg" class="headerIconSize" style="height: 13px">
					<span class="m-menu__link-text headerBtnText">Documentation</span>
				</a>
			</li>

			<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
			  <a href="javascript:;" class="m-menu__link m-menu__toggle">
					<img src="images/dashboard/requestFund.svg" style="height: 15px;">
					<span class="m-menu__link-text headerBtnText" style="width: 73%">Request Fund</span>
			    <i class="m-menu__ver-arrow la la-angle-right"></i>
			  </a>
			  <div class="m-menu__submenu " style="display: none; overflow: hidden;">
			    <span class="m-menu__arrow"></span>
			    <ul class="m-menu__subnav">
			      <li class="m-menu__item " aria-haspopup="true">
			        <a href='requestFundAfterLogin.php' class="m-menu__link m-submenu">
			          <i class="m-menu__link-bullet m-menu__link-bullet--dot">
			            <span></span>
			          </i>
			          <span class="m-menu__link-text">Request</span>
			        </a>
			      </li>

			      <li class="m-menu__item " aria-haspopup="true">
			        <a href='invoiceListing.php' class="m-menu__link m-submenu">
			          <i class="m-menu__link-bullet m-menu__link-bullet--dot">
			            <span></span>
			          </i>
			          <span class="m-menu__link-text">Invoices</span>
			        </a>
			      </li>

			      <li class="m-menu__item " aria-haspopup="true">
			        <a href='withdrawal.php' class="m-menu__link m-submenu">
			          <i class="m-menu__link-bullet m-menu__link-bullet--dot">
			            <span></span>
			          </i>
			          <span class="m-menu__link-text">Withdrawal</span>
			        </a>
			      </li>

			      <li class="m-menu__item " aria-haspopup="true">
			        <a href='withdrawalListing.php' class="m-menu__link m-submenu">
			          <i class="m-menu__link-bullet m-menu__link-bullet--dot">
			            <span></span>
			          </i>
			          <span class="m-menu__link-text">Withdrawal Listing</span>
			        </a>
			      </li>

			    </ul>
			  </div>
			</li>

			<!--<li class="m-menu__item" aria-haspopup="true" >
				<a href="paymentGateway.php" class="m-menu__link m-menu__toggle" target="_blank">
					<img src="images/dashboard/documentationsIcon.svg" class="headerIconSize" style="height: 13px">
					<span class="m-menu__link-text headerBtnText">Documentation</span>
				</a>
			</li>-->

<!-- 			<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
				<a href="javascript:;" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon la la-credit-card"></i>
					<span class="m-menu__link-text"><?php echo $translations['M00184'][$language]; //Payment Gateway?></span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu " style="display: none; overflow: hidden;">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item " aria-haspopup="true">
							<a href='paymentGatewayCryptocurrencies.php' class="m-menu__link m-submenu">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text"><?php echo $translations['M00185'][$language]; //Cryptocurrencies?></span>
							</a>
						</li>

						<li class="m-menu__item " aria-haspopup="true">
							<a href='paymentGatewayAPI.php' class="m-menu__link m-submenu">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text"><?php echo $translations['M00186'][$language]; //API Keys?></span>
							</a>
						</li>

						<li class="m-menu__item " aria-haspopup="true">
							<a href='paymentGatewayTransaction.php' class="m-menu__link m-submenu">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text"><?php echo $translations['M00187'][$language]; //Transaction History?></span>
							</a>
						</li>

						<li class="m-menu__item " aria-haspopup="true">
							<a href='paymentGatewaySettings.php' class="m-menu__link m-submenu">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text"><?php echo $translations['M00176'][$language]; //Settings?></span>
							</a>
						</li>

					</ul>
				</div>
			</li> -->

			<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
			  <a href="javascript:;" class="m-menu__link m-menu__toggle">
					<img src="images/dashboard/settingWhiteIcon.svg" style="height: 15px;">
					<span class="m-menu__link-text headerBtnText" style="width: 73%">Settings</span>
			    <i class="m-menu__ver-arrow la la-angle-right"></i>
			  </a>
			  <div class="m-menu__submenu " style="display: none; overflow: hidden;">
			    <span class="m-menu__arrow"></span>
			    <ul class="m-menu__subnav">
			      <li class="m-menu__item " aria-haspopup="true">
			        <a href='myProfile.php' class="m-menu__link m-submenu">
			          <i class="m-menu__link-bullet m-menu__link-bullet--dot">
			            <span></span>
			          </i>
			          <span class="m-menu__link-text">My Profile</span>
			        </a>
			      </li>

			      <li class="m-menu__item " aria-haspopup="true">
			        <a href='changePassword.php' class="m-menu__link m-submenu">
			          <i class="m-menu__link-bullet m-menu__link-bullet--dot">
			            <span></span>
			          </i>
			          <span class="m-menu__link-text">Change Password</span>
			        </a>
			      </li>
			    </ul>
			  </div>
			</li>

			<li class="m-menu__item" aria-haspopup="true" >
				<a href="javascript:;" onclick="out();" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-logout"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text"><?php echo $translations['M00190'][$language]; //Logout?></span>
						</span>
					</span>
				</a>
			</li>


		</ul>
	</div>
</div>
