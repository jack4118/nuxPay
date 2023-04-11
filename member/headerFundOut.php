<?php session_start() ?>

<?php

$httpHost = $_SERVER['HTTP_HOST'];
	
if (strpos($httpHost, 'nuxpay.com') !== false) {
    //nuxpay.com
    $dashboardLogo = $sys['dashboardLogo'];
} else if (strpos($httpHost, 'nuxpay.co') !== false) {
    //nuxpay.co
    $dashboardLogo = $sys['dashboardLogoNuxpayCo'];
} else if (strpos($httpHost, 'nuxpay.net') !== false) {
    //nuxpay.net
    $dashboardLogo = $sys['dashboardLogoNuxpayNet'];
} else if (strpos($httpHost, 'nuxpay.io') !== false) {
    //nuxpay.io
    $dashboardLogo = $sys['dashboardLogoNuxpayIo'];
} else {
    //default
    $dashboardLogo = $sys['dashboardLogo'];
}

?>

<header id="m_header" class="m-grid__item m-header "  m-minimize-offset="200" m-minimize-mobile-offset="200" style="z-index: 101;">
	<div class="m-container m-container--fluid m-container--full-height m-header-custom" style="">
		<div class="m-stack m-stack--ver m-stack--desktop">

			<div class="m-stack__item m-brand m-brand--skin-dark ">
				<div class="m-stack m-stack--ver m-stack--general">

					<div class="m-stack__item m-stack__item--middle m-brand__logo">
						<a href="gettingStarted.php" class="m-brand__logo-wrapper">
							<img class="headerLogo" src="<?php echo $dashboardLogo; ?>">
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
            
			<div class="m-stack__item m-brand m-brand--skin-dark headerBackground">
                
				<div class="text-white d-flex justify-content-end mt-3">
                    <div class="" style="padding-top:7px; position: absolute; left:50%;">
                        <h5>Fund Out</h5>
					</div>
					<!--
					<div id="basicAccDiv" class="text-right" style="text-align:right;padding-right: 13px;">
						Basic Account
						<div class="text-right">
							<a href="upgradeToPremium.php">Upgrade</a>
						</div>
					</div>
					<div id="premiumAccDiv" class="text-right" style="text-align:right;padding-right: 13px;display:none; padding-top: 12px;">
						Premium Account
						
					</div>
					<div class="vertical-line"></div>-->
					<div id="totalRefundCreditDiv" class="text-right" style="text-align:right;padding-right: 13px;">			<span><?php echo $translations["M01871"][$language]; /*  My Credit */ ?></span>	
							<br>
						<i class="fa fa-exclamation-circle"  data-toggle="tooltip" data-placement="bottom" title="<?php echo $translations["M01872"][$language]; /*  Your credit will used for processing fee and miner fee. */ ?>"></i>
						<span>$</span>
						<span id="refundCreditBalance">0.00 USD</span>

					</div>

					<div class="vertical-line"></div>

					<div class="dropdown" style="text-align:right;">
						<div class="text-right" style="padding-right: 13px">My Assets</div>
					 	<a href="javascript:;" class="dropdown-toggle text-white d-inline-flex align-items-center" data-toggle="dropdown" id="balanceTitle">
						   	<!-- <img src="images/cryptocurrencies/usdt.png" width="15px" class="mr-2"> 1,123,000.00 USDT -->
						</a>
					  	<div class="dropdown-menu dropdown-menu-right currencyDropdown" id="balanceList">
						    <!-- <span class="dropdown-item">
						    	<img src="images/cryptocurrencies/usdt.png" width="18px" class="mr-3"> 1,123,000.00 USDT
						    </span>
						    <span class="dropdown-item">
						    	<img src="images/cryptocurrencies/usd2.svg" width="18px" class="mr-3"> 0 USD2
						    </span>
						    <span class="dropdown-item">
						    	<img src="images/cryptocurrencies/myr2.svg" width="18px" class="mr-3"> 0 MYR2
						    </span>
						    <span class="dropdown-item">
						    	<img src="images/cryptocurrencies/rmb2.svg" width="18px" class="mr-3"> 0 RMB2
						    </span>
						    <span class="dropdown-item">
						    	<img src="images/cryptocurrencies/ethereum.svg" width="18px" class="mr-3"> 135.898989 ETH
						    </span>
						    <span class="dropdown-item">
						    	<img src="images/cryptocurrencies/bitcoin.svg" width="18px" class="mr-3"> 0.14288532 BTC
						    </span> -->
					  	</div>
					</div>

					<?php if($_SESSION['fund_in_address_list']!="") { ?>
						<div style="margin-left: 20px;">
							<button id="navFundInBtn" class="btn primaryBtn"><?php echo $translations["M01976"][$language]; /* Fund In */?></button>
						</div>
					<?php } ?>

					<div style="margin-left: 20px;">
						<button id="navBuyCrypto" class="btn buyCryptoBtn"><?php echo $translations["M01975"][$language]; /* Buy Crypto */?></button>
					</div>

                </div>
                
			</div>

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

			<li class="m-menu__item m-menu__item--submenu onlyMobile" aria-haspopup="true" m-menu-submenu-toggle="hover">
			  <!-- <a href="javascript:;" class="m-menu__link m-menu__toggle">
					<img src="images/cryptocurrencies/usdt.png" style="height: 15px;">
					<span class="m-menu__link-text headerBtnText" style="width: 73%">My assets</span>
			    	<i class="m-menu__ver-arrow la la-angle-right"></i>
			  </a> -->
			  <!-- <div class="m-menu__submenu " style="display: none; overflow: hidden;">
			    <span class="m-menu__arrow"></span>
				    <ul class="m-menu__subnav" id="balanceDropDown">
				      	<li class="m-menu__item crypto" aria-haspopup="true">
				      		<div class="m-menu__link m-submenu">
				      			<span class="m-menu__link-bullet m-menu__link-bullet--dot">
				      				<img src="images/cryptocurrencies/usdt.png" width="15px">
				      			</span>
					          	<span class="m-menu__link-text">1,123,000.00 USDT</span>
				          	</div>
				      	</li>

				      	<li class="m-menu__item " aria-haspopup="true">
				      		<div class="m-menu__link m-submenu">
				      			<span class="m-menu__link-bullet m-menu__link-bullet--dot">
				          			<img src="images/cryptocurrencies/usd2.svg" width="15px">
				          		</span>
				          		<span class="m-menu__link-text">0 USD2</span>
			          		</div>
				      	</li>

				      	<li class="m-menu__item " aria-haspopup="true">
				      		<div class="m-menu__link m-submenu">
				      			<span class="m-menu__link-bullet m-menu__link-bullet--dot">
					          		<img src="images/cryptocurrencies/myr2.svg" width="15px">
					          	</span>
					          	<span class="m-menu__link-text">0 MYR2</span>
				          	</div>
				      	</li>

				      	<li class="m-menu__item " aria-haspopup="true">
				      		<div class="m-menu__link m-submenu">
				      			<span class="m-menu__link-bullet m-menu__link-bullet--dot">
					          		<img src="images/cryptocurrencies/rmb2.svg" width="15px">
					          	</span>
					          	<span class="m-menu__link-text">0 RMB2</span>
				          	</div>
				      	</li>

				      	<li class="m-menu__item " aria-haspopup="true">
				      		<div class="m-menu__link m-submenu">
				      			<span class="m-menu__link-bullet m-menu__link-bullet--dot">
					          		<img src="images/cryptocurrencies/ethereum.svg" width="15px">
					          	</span>
					          	<span class="m-menu__link-text">135.898989 ETH</span>
				          	</div>
				      	</li>

				      	<li class="m-menu__item " aria-haspopup="true">
				      		<div class="m-menu__link m-submenu">
				      			<span class="m-menu__link-bullet m-menu__link-bullet--dot">
					          		<img src="images/cryptocurrencies/bitcoin.svg" width="15px">
					          	</span>
					          	<span class="m-menu__link-text">0.14288532 BTC</span>
				          	</div>
				      	</li>
				    </ul>
			  </div> -->
			</li>

<!--
			<li class="m-menu__item" aria-haspopup="true" >
				 <a href="gettingStarted.php" class="m-menu__link alignmentMinimizeIcon">
					<i class="m-menu__link-icon whiteIconRocketSvg"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap marginLeftImgIcon">
							<span class="m-menu__link-text">Getting Started</span>
						</span>
					</span>
				</a> 
				<a href="gettingStarted.php" class="m-menu__link m-menu__toggle">
					<img src="<?php echo $sys['logoIcon'];?>" class="headerIconSize" style="height: 20px">
					<span class="m-menu__link-text headerBtnText">Getting Started</span>
				</a>
			</li>

-->
			<div class="row justify-content-center"  style="text-align:center;">
				<div class="mr-1" style="width:40%">
					<a href ="receiveFund.php"><button id="receiveSidebarBtn" class="btn btn-primary btn-block"><img height="20px" src="images/sendandreceive/receive.png"> <?php echo $translations["M01792"][$language]; /* Receive */ ?></button></a>
				</div>
				<div class= "ml-1" style="width:40%">
					<a href ="sendFund.php"><button id="sendSidebarBtn" class="btn btn-primary btn-block"><img height="20px" src="images/sendandreceive/send.png"> <?php echo $translations["M01791"][$language]; /* Send */ ?></button></a>
				</div>
			</div>

			<li class="m-menu__item" aria-haspopup="true" >
				<a href="dashboard.php" class="m-menu__link m-menu__toggle">
					<img src="images/header/dashboards.png" class="headerIconSize" style="height: 15px">
					<span class="m-menu__link-text headerBtnText">
						<?php echo $translations["M00170"][$language]; /* Dashboard */ ?>
					</span>
				</a>
			</li>

			<li class="m-menu__item" aria-haspopup="true" >
				<a href="paymentListing.php" class="m-menu__link m-menu__toggle">
					<img src="images/header/payments.png" class="headerIconSize" style="height: 15px">
					<span class="m-menu__link-text headerBtnText">
						<?php echo $translations["M01807"][$language]; /* Received */ ?>
					</span>
				</a>
			</li>

			<!-- <li class="m-menu__item" aria-haspopup="true" >
				<a href="apiIntegration.php" class="m-menu__link m-menu__toggle">
					<img src="images/dashboard/apiKeyWhiteIcon.svg" class="headerIconSize" style="height: 10px">
					<span class="m-menu__link-text headerBtnText">Api Integration</span>
				</a>
			</li> -->

			

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

			<li class="m-menu__item" aria-haspopup="true" >
				<a href="withdrawalListing.php" class="m-menu__link m-menu__toggle">
					<img src="images/header/withdrawal.png" class="headerIconSize" style="height: 15px">
					<span class="m-menu__link-text headerBtnText">
						<?php echo $translations["M01806"][$language]; /* Sent */ ?>
					</span>
				</a>
			</li>

<!--
			<li class="m-menu__item" aria-haspopup="true" >
				<a href="fundOutHistory.php" class="m-menu__link m-menu__toggle">
					<img src="images/fundOut/fund-out-menu.png" class="headerIconSize" style="height: 15px">
					<span class="m-menu__link-text headerBtnText">Fund Out History</span>
				</a>
			</li>


			<li class="m-menu__item" aria-haspopup="true" >
				<a href="whitelistAddresses.php" class="m-menu__link m-menu__toggle">
					<img src="images/header/Whitelist.png" class="headerIconSize" style="height: 15px">
					<span class="m-menu__link-text headerBtnText">Whitelist Addresses</span>
				</a>
			</li>
-->


			<!-- <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
			  <a href="javascript:;" class="m-menu__link m-menu__toggle">
					<img src="images/dashboard/requestFund.svg" style="height: 15px;">
					<span class="m-menu__link-text headerBtnText" style="width: 73%">Withdrawal</span>
			    <i class="m-menu__ver-arrow la la-angle-right"></i>
			  </a>
			  <div class="m-menu__submenu " style="display: none; overflow: hidden;">
			    <span class="m-menu__arrow"></span>
			    <ul class="m-menu__subnav">

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
			</li> -->

			<!-- <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
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
			</li> -->
			
<!--
			<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
			  <a href="javascript:;" class="m-menu__link m-menu__toggle">
					<img src="images/dashboard/payment-tools.png" style="height: 15px;">
					<span class="m-menu__link-text headerBtnText" style="width: 73%">Payment Tools</span>
			    <i class="m-menu__ver-arrow la la-angle-right"></i>
			  </a>
			  <div class="m-menu__submenu ">
			    <span class="m-menu__arrow"></span>
			    <ul class="m-menu__subnav">
			      <li class="m-menu__item " aria-haspopup="true">
			        <a href='requestFundAfterLogin.php' class="m-menu__link m-submenu">
			          <i class="m-menu__link-bullet m-menu__link-bullet--dot">
			            <span></span>
			          </i>
			          <span class="m-menu__link-text">Request Fund</span>
			        </a>
			      </li>
				  </ul>
			   </div>
				<div class="m-menu__submenu ">
			    <span class="m-menu__arrow"></span>
			    <ul class="m-menu__subnav">
			      <li class="m-menu__item " aria-haspopup="true">
			        <a href='apiIntegration.php' class="m-menu__link m-submenu">
			          <i class="m-menu__link-bullet m-menu__link-bullet--dot">
			            <span></span>
			          </i>
			          <span class="m-menu__link-text">API Integration</span>
			        </a>
			      </li>
				  </ul>
			   </div>
					
			</li>
-->

			<li class="m-menu__item" aria-haspopup="true" >
				<a href="settings.php" class="m-menu__link m-menu__toggle">
					<img src="images/dashboard/settingBtn.png" class="headerIconSize" style="height: 18px">
					<span class="m-menu__link-text headerBtnText">
						<?php echo $translations["M00176"][$language]; /* Settings */ ?>
					</span>
				</a>
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

			
			<div class="greyNavBox" style="margin-top: 39px">
				<li class="m-menu__item" aria-haspopup="true" >
					<a href="paymentGateway.php" class="m-menu__link m-menu__toggle" target="_blank">
						<img src="images/dashboard/document.png" class="headerIconSize" style="height: 16px; font-size: 18px;">
						<!-- <i class="fa fa-file-o" style="color: #b4b9bd; font-size: 18px"></i> -->
						<span class="m-menu__link-text headerBtnText" style="width: 65%">Documentation</span>
						<img src="images/dashboard/link.png" class="headerIconSize" style="height: 16px; padding-left: 18px">
					</a>
				</li>
			</div>
			<div class="greyNavBox" style="margin-top: 20px">
				<li class="m-menu__item" aria-haspopup="true" >
					<a href="index.php#nuxPaySection06BG" class="m-menu__link m-menu__toggle" target="_blank">
						<img src="images/dashboard/GS.png" class="headerIconSize" style="height: 16px">
						<!-- <i class="fa fa-file-o" style="color: #b4b9bd; font-size: 18px"></i> -->
						<span class="m-menu__link-text headerBtnText" style="width: 65%">Get Support</span>
						<img src="images/dashboard/link.png" class="headerIconSize" style="height: 16px; padding-left: 18px">
					</a>
				</li>
			</div>

		</ul>
	</div>
</div>

<style>
.vertical-line {
 /* Float:left; */
 height:45px;
 width:1px; /* edit this if you want */
 background-color: white;
 margin-right: 30px;
 margin-left: 20px;
} 

</style>
