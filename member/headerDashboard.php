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
						<a href="index.php" class="m-brand__logo-wrapper">
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

			<div id="headerRow" class="m-stack__item m-brand m-brand--skin-dark headerBackground">
				<div class="text-white d-flex justify-content-end mt-3">
					<!--<div id="basicAccDiv" class="text-right" style="text-align:right;padding-right: 13px;">
						Basic Account
						<div class="text-right">
							<a href="upgradeToPremium.php" id="accountUpgrade"><?php echo $translations["M01699"][$language]; /* Upgrade */ ?> </a>
						</div>
					</div>
					<div id="premiumAccDiv" class="text-right" style="text-align:right;padding-right: 13px;display:none; padding-top: 12px">						
						<?php echo $translations["M01711"][$language]; /* Premium Account */ ?> 
					</div>
					<div class="vertical-line"></div>-->

					<div id="totalRefundCreditDiv" class="text-right" style="text-align:right;padding-right: 13px;">			<span><?php echo $translations["M01871"][$language]; /*  My Credit */ ?></span><br>
						<i class="fa fa-exclamation-circle"  data-toggle="tooltip" data-placement="bottom" title="<?php echo $translations["M01872"][$language]; /*  Your credit will used for processing fee and miner fee. */ ?>"></i>
					
						<span>$</span>
						<span class="refundCreditBalance">0.00 USD</span>

					</div>
					<div class="vertical-line"></div>
					
					<div class="dropdown">
						<div class="text-right" style="padding-right: 13px">
							<?php echo $translations["M01710"][$language]; /* My Assets */ ?> 
						</div>
					 	<a href="javascript:;" class="dropdown-toggle text-white d-inline-flex align-items-center" data-toggle="dropdown" id="balanceTitle1">
						   	<!-- <img src="images/cryptocurrencies/usdt.png" width="15px" class="mr-2"> 1,123,000.00 USDT -->
						</a>
					  	<div class="dropdown-menu dropdown-menu-right currencyDropdown" id="balanceList1">
						    
					  	</div>
					</div>

					<?php if($_SESSION['fund_in_address_list']!="") { ?>
						<div class="d-flex" style="margin-left: 20px; padding: 0 0 5px 0;">
							<button id="navFundInBtn" class="btn primaryBtn" style="font-size: 14px;"><?php echo $translations["M01976"][$language]; /* Fund In */?></button>
						</div>
					<?php } ?>

					<div class="d-flex" style="margin-left: 20px; padding: 0 0 5px 0;">
						<button id="navBuyCrypto" class="btn buyCryptoBtn" style="font-size: 14px;"><?php echo $translations["M01975"][$language]; /* Buy Crypto */?></button>
					</div>

					<div class="btn-group d-flex justify-content-center align-items-center" style="border-left: 1px solid #fff; margin-left: 20px;" >
						<span type="" class="dropdown-toggle kt-menu__link-text <?php echo $changeBlackPage; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer; color: white;font-size: 14px;padding: 0px 20px;font-weight: 400;"><?php echo $translations['M01432'][$language]; /* LANGUAGES */ ?>                                              
						</span>
						<div class="dropdown-menu dropdown-menu-right dropdown_language" x-placement="bottom-end" style="position: absolute; top: 0px; left: 30px; transform: translate3d(-20px, 38px, 0px);overflow: hidden;">
							<?php
								$languageArr = $sys["languages"];
								foreach($languageArr as $key => $value) {
							?>
								<a class="dropdown-item changeLanguage" href="javascript:;" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>"><?php echo $languageArr[$key]['displayName']; ?></a>
							<?php
								}
							?>
						</div>
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
					<span class="m-menu__link-text headerBtnText">
						<?php echo $translations["M00171"][$language]; /* Getting Started */ ?>
					</span>
				</a>
			</li>
-->

			
			
			<!-- <div class="row justify-content-center"  style="text-align:center;">
				<div class= "mr-1" style="width:40%">
						<a href ="receiveFund.php" class="m-menu__link">
							<button id="receiveSidebarBtn" class="btn btn-primary btn-block">
								<img height="20px" src="images/sendandreceive/receive.png"> 
								<span class = "m-menu__link-text receiveText">
									<?php echo $translations["M01792"][$language]; /* Receive */ ?></button></a>
								</span>
				</div>		
				<div class= "ml-1" style="width:40%">
					<a href ="sendFund.php" class="m-menu__link">
						<button id="sendSidebarBtn" class="btn btn-primary btn-block">
							<img height="20px" src="images/sendandreceive/send.png"> 
							<span class = "m-menu__link-text sendText">
								<?php echo $translations["M01791"][$language]; /* Send */ ?></button></a>
							</span>
				</div>
			</div> -->

			<!-- <li class="m-menu__item hideShowbutton" aria-haspopup="true" >
				<a href="receiveFund.php" class="m-menu__link m-menu__toggle">
					<button id="receiveSidebarBtn" class="btn">
						<img src="images/sendandreceive/receive.png" class="m-menu__icon headerIconSize2" style="height: 15px">
					</button>
				</a>
			</li>
			<li class="m-menu__item hideShowbutton" aria-haspopup="true" >
				<a href="sendFund.php" class="m-menu__link m-menu__toggle">
					<button id="sendSidebarBtn" class="btn">
						<img src="images/sendandreceive/send.png" class="m-menu__icon headerIconSize2" style="height: 15px">
					</button>
				</a>
			</li> -->

			<li class="m-menu__item" aria-haspopup="true" >
				<a href="dashboard.php" class="m-menu__link m-menu__toggle">
					<img src="images/header/dashboards.png" class="headerIconSize" style="height: 15px">
					<span class="m-menu__link-text headerBtnText">
						<?php echo $translations["M00170"][$language]; /* Dashboard */ ?>
					</span>
				</a>
			</li>

			<!-- <li class="m-menu__item" aria-haspopup="true" >
				<a href="paymentListing.php" class="m-menu__link m-menu__toggle">
					<img src="images/header/payments.png" class="headerIconSize" style="height: 15px">
					<span class="m-menu__link-text headerBtnText">
						<?php echo $translations["M01807"][$language]; /* Received */ ?>
					</span>
				</a>
			</li> -->


			

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

			<!-- <li class="m-menu__item" aria-haspopup="true" >
				<a href="withdrawalListing.php" class="m-menu__link m-menu__toggle">
					<img src="images/header/withdrawal.png" class="headerIconSize" style="height: 15px">
					<span class="m-menu__link-text headerBtnText">
						<?php echo $translations["M01806"][$language]; /* Sent */ ?>
					</span>
				</a>
			</li> -->

			<!-- <li class="m-menu__item" aria-haspopup="true" >
				<a href="buyCryptoHistory.php" class="m-menu__link m-menu__toggle">
					<img src="images/header/buy-11.png" class="headerIconSize" style="height: 15px">
					<span class="m-menu__link-text headerBtnText">Buy/Sell Crypto History</span>
				</a>
			</li> -->

			<!-- <li class="m-menu__item" aria-haspopup="true" >
				<a href="buyOrder.php" class="m-menu__link m-menu__toggle">
					<img src="images/dashboard/buy-sell.png" class="headerIconSize" style="height: 23px">
					<span class="m-menu__link-text headerBtnText">
						<?php echo $translations["M01907"][$language]; /* Buy/Sell Advertisements */ ?>
					</span>
				</a>
			</li> -->

			<!-- <li id="sideSwapLi" class="m-menu__item" aria-haspopup="true" >
				<a href="swapListing.php" class="m-menu__link m-menu__toggle">
					<img id="sideSwapImg" src="images/swap/swap.png" class="headerIconSize" style="height: 15px">
					<span class="m-menu__link-text headerBtnText">						
						<?php echo $translations["M01919"][$language]; /* Swap */ ?>
					</span>
				</a>
			</li> -->

<!--
			<li class="m-menu__item" aria-haspopup="true" >
				<a href="fundOutHistory.php" class="m-menu__link m-menu__toggle">
					<img src="images/fundOut/fund-out-menu.png" class="headerIconSize" style="height: 15px">
					<span class="m-menu__link-text headerBtnText">
						<?php echo $translations["M01633"][$language]; /* Fund Out History */ ?>
					</span>
				</a>
			</li>
-->

		<!-- 	<li class="m-menu__item" aria-haspopup="true" >
				<a href="whitelistAddresses.php" class="m-menu__link m-menu__toggle">
					<img src="images/header/Whitelist.png" class="headerIconSize" style="height: 15px">
					<span class="m-menu__link-text headerBtnText">Whitelist Addresses</span>
				</a>
			</li>
 -->



<!--

			<li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
			  <a href="javascript:;" class="m-menu__link m-menu__toggle">
					<img src="images/header/Whitelist.png" style="height: 15px;">
					<span class="m-menu__link-text headerBtnText" style="width: 73%">
						<?php echo $translations["M01712"][$language]; /* Whitelist Tools */ ?>
					</span>
			    <i class="m-menu__ver-arrow la la-angle-right"></i>
			  </a>
			  <div class="m-menu__submenu ">
			    <span class="m-menu__arrow"></span>
			    <ul class="m-menu__subnav">
			      <li class="m-menu__item " aria-haspopup="true">
			        <a href='whitelistAddresses.php' class="m-menu__link m-submenu">
			          <i class="m-menu__link-bullet m-menu__link-bullet--dot">
			            <span></span>
			          </i>
			          <span class="m-menu__link-text">
					  	<?php echo $translations["M01713"][$language]; /* Whitelist Addresses */ ?>
					  </span>
			        </a>
			      </li>
				  </ul>
			   </div>
				<div class="m-menu__submenu ">
			    <span class="m-menu__arrow"></span>
			    <ul class="m-menu__subnav">
			      <li class="m-menu__item " aria-haspopup="true">
			        <a href='whitelistApiIntegration.php' class="m-menu__link m-submenu">
			          <i class="m-menu__link-bullet m-menu__link-bullet--dot">
			            <span></span>
			          </i>
			          <span class="m-menu__link-text">
					  	<?php echo $translations["M01597"][$language]; /* API Integration */ ?>
					  </span>
			        </a>
			      </li>
				  </ul>
			   </div>
					
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
					<span class="m-menu__link-text headerBtnText" style="width: 73%">
						<?php echo $translations["M01714"][$language]; /* Payment Tools */ ?>
					</span>
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
			          <span class="m-menu__link-text">
					  	<?php echo $translations["M01597"][$language]; /* API Integration */ ?>
					  </span>
			        </a>
			      </li>
				  </ul>
			   </div>
					
			</li>
-->

			<li class="m-menu__item" aria-haspopup="true">
				<a class="m-menu__link m-menu__toggle" data-toggle="collapse" data-target="#accordion-dev-wallet">
					<img src="images/header/buy-11.png" class="headerIconSize" style="height: 16px;">
					<span class="m-menu__link-text headerBtnText">
						<?php echo $translations["M01710"][$language]; /* My Wallets */ ?>
					</span>
				</a>
				<div class="collapse" id="accordion-dev-wallet">
					<ul style="margin-left: 23px;">
						<li class="m-menu__item accordion-item" aria-haspopup="true" style="height: 30px;">					
							<a href="personalWallet.php" class="m-menu__link m-menu__toggle" id="personalWallet.php">
								<span class="m-menu__link-text headerBtnText accordion-child">
									<?php echo $translations["M02072"][$language]; /* Personal */ ?>
								</span>
							</a>
						</li>
						<li class="m-menu__item accordion-item" aria-haspopup="true" style="height: 30px;">					
							<a href="paymentWallet.php" class="m-menu__link m-menu__toggle" id="paymentWallet.php">
								<span class="m-menu__link-text headerBtnText accordion-child">
									<?php echo $translations["M01617"][$language]; /* Payments */ ?>
								</span>
							</a>
						</li>
						<li class="m-menu__item accordion-item" aria-haspopup="true" style="height: 30px;">					
							<a href="transferWallet.php" class="m-menu__link m-menu__toggle" id="transferWallet.php">
								<span class="m-menu__link-text headerBtnText accordion-child">
									<?php echo $translations["M02046"][$language]; /* Batch Transfer */ ?>
								</span>
							</a>
						</li>
					<ul>
				</div>
			</li>

			<li class="m-menu__item" aria-haspopup="true">
				<a class="m-menu__link m-menu__toggle" data-toggle="collapse" data-target="#accordion-dev-transaction">
					<img src="images/header/payments.png" class="headerIconSize" style="height: 15px;">
					<span class="m-menu__link-text headerBtnText">
						<?php echo $translations["M02039"][$language]; /* Transactions */ ?>
					</span>
				</a>
				<div class="collapse" id="accordion-dev-transaction">
					<ul style="margin-left: 23px;">
						<li class="m-menu__item accordion-item" aria-haspopup="true" style="height: 30px;">					
							<a href="buyCryptoHistory.php" class="m-menu__link m-menu__toggle" id="buyCryptoHistory.php">
								<span class="m-menu__link-text headerBtnText accordion-child">
									<?php echo $translations["M02038"][$language]; /* Buy/Sell History */ ?>
								</span>
							</a>
						</li>
						<li class="m-menu__item accordion-item" aria-haspopup="true" style="height: 30px;">					
							<a href="paymentListing.php" class="m-menu__link m-menu__toggle" id="paymentListing.php">
								<span class="m-menu__link-text headerBtnText accordion-child">
									<?php echo $translations["M01807"][$language]; /* Received */ ?>
								</span>
							</a>
						</li>
						<li class="m-menu__item accordion-item" aria-haspopup="true" style="height: 30px;">					
							<a href="withdrawalListing.php" class="m-menu__link m-menu__toggle" id="withdrawalListing.php">
								<span class="m-menu__link-text headerBtnText accordion-child">
									<?php echo $translations["M01806"][$language]; /* Sent */ ?>
								</span>
							</a>
						</li>
						<li class="m-menu__item accordion-item" aria-haspopup="true" style="height: 30px;">					
							<a href="fundOutHistory.php" class="m-menu__link m-menu__toggle" id="fundOutHistory.php">
								<span class="m-menu__link-text headerBtnText accordion-child">
									<?php echo $translations["M02046"][$language]; /* Batch Transfer */ ?>
								</span>
							</a>
						</li>
					<ul>
				</div>
			</li>

			<li class="m-menu__item" aria-haspopup="true">
				<a class="m-menu__link m-menu__toggle" data-toggle="collapse" data-target="#accordion-dev-developer" id="accordion-observer">
					<img src="images/dashboard/developers-icon.png" class="headerIconSize" style="height: 13px;">
					<span class="m-menu__link-text headerBtnText">
						<?php echo $translations["M02022"][$language]; /* Developers */ ?>
					</span>
				</a>
				<div class="collapse" id="accordion-dev-developer">
					<ul style="margin-left: 23px;">
						<li class="m-menu__item accordion-item" aria-haspopup="true" style="height: 30px;">					
							<a href="apiIntegrationStatistic.php" class="m-menu__link m-menu__toggle" id="apiIntegrationStatistic.php">
								<span class="m-menu__link-text headerBtnText accordion-child">
									<?php echo $translations["M02023"][$language]; /* API Intergrations */ ?>
								</span>
							</a>
						</li>
						<li class="m-menu__item accordion-item" aria-haspopup="true" style="height: 30px;">					
							<a href="apiKeys.php" class="m-menu__link m-menu__toggle" id="apiKeys.php">
								<span class="m-menu__link-text headerBtnText accordion-child">
									<?php echo $translations["M02024"][$language]; /* API Keys */ ?>
								</span>
							</a>
						</li>
						<li class="m-menu__item accordion-item" aria-haspopup="true" style="height: 30px;">					
							<a href="apiIO.php" class="m-menu__link m-menu__toggle" id="apiIO.php">
								<span class="m-menu__link-text headerBtnText accordion-child">
									<?php echo $translations["M02055"][$language]; /* API I/O */ ?>
								</span>
							</a>
						</li>
						<li class="m-menu__item accordion-item" aria-haspopup="true" style="height: 30px;">					
							<a href="paymentGateway.php#whitelistSection" class="m-menu__link m-menu__toggle" target="_blank">
								<span class="m-menu__link-text headerBtnText accordion-child">
									<?php echo $translations["M02025"][$language]; /* API Docs */ ?>
								</span>
							</a>
						</li>
					<ul>
				</div>
			</li>

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

			<div>
				<li class="m-menu__item" aria-haspopup="true" >
					<div id="totalRefundCreditDiv" class="text-left; content-to-hide" style="text-align:left;padding-left: 30px;color:white;">          <span><?php echo $translations["M01871"][$language]; /*  My Credit */ ?></span> 
							<br>
						<i class="fa fa-exclamation-circle"  data-toggle="tooltip" data-placement="bottom" title="<?php echo $translations["M01872"][$language]; /*  Your credit will used for processing fee and miner fee. */ ?>"></i>
					
						<span>$</span>
						<span class="refundCreditBalance">0.00 USD</span>

					</div>
					</li>
					<li class="m-menu__item; content-to-hide" aria-haspopup="true" >
					<div class="dropdown">
						<div class="text-left" style="padding-left: 30px; color:white;">
						<?php echo "<br>" ?>
							<?php echo $translations["M01710"][$language]; /* My Assets */ ?> 
						</div>
						<a href="javascript:;" class="dropdown-toggle text-white d-inline-flex align-items-center" style="padding-left: 30px"data-toggle="dropdown" id="balanceTitle">
							<!-- <img src="images/cryptocurrencies/usdt.png" width="15px" class="mr-2"> 1,123,000.00 USDT -->
						</a>
						<div class="dropdown-menu dropdown-menu-left currencyDropdown" style="padding-left: 18px" id="balanceList">
							</div>
					</div>
					<?php echo "<br>" ?>
					<?php if($_SESSION['fund_in_address_list']!="") { ?>
						<div style="margin-left: 20px;">
							<button id="navFundInBtn1" class="btn primaryBtn" style="width: 40%; font-size: 14px;"><?php echo $translations["M01976"][$language]; /* Fund In */?></button>
							<button id="navBuyCrypto2" class="btn buyCryptoBtn" style="width: 50%;font-size: 14px; font-size: 14px;"><?php echo $translations["M01975"][$language]; /* Buy Crypto */?></button>
						</div>
					<?php } ?>


				</li>
			</div>

			<!-- <div class="greyNavBox" style="margin-top: 39px">
				<li class="m-menu__item" aria-haspopup="true" >
					<a href="paymentGateway.php" class="m-menu__link m-menu__toggle">
						<img src="images/dashboard/document.png" class="headerIconSize" style="height: 16px; font-size: 18px;">

						<span class="m-menu__link-text headerDivText" style="width: 65%; font-size: 12px">
							<?php echo $translations["M01439"][$language]; /* API Documentation */ ?>
						</span>
						<img src="images/dashboard/link.png" class="m-menu__link-text headerLinkIcon" style="height: 16px; padding-left: 18px">
					</a>
				</li>
			</div> -->
			
			<div class="greyNavBox" style="margin-top: 20px">
				<li class="m-menu__item" aria-haspopup="true" >
					<a href="index.php#nuxPaySection06BG" class="m-menu__link m-menu__toggle">
						<img src="images/dashboard/GS.png" class="headerIconSize" style="height: 16px">
						<!-- <i class="fa fa-file-o" style="color: #b4b9bd; font-size: 18px"></i> -->
						<span class="m-menu__link-text headerDivText" style="width: 65%">
							<?php echo $translations["M01715"][$language]; /* Get Support */ ?>
						</span>
						<img src="images/dashboard/link.png" class="m-menu__link-text headerLinkIcon" style="height: 16px; padding-left: 18px">
					</a>
				</li>
			</div>

			<div class="btn-group content-to-hide" style="padding-left: 30px; margin: 15px 0 15px 0;">
				<span type="" class="dropdown-toggle kt-menu__link-text <?php echo $changeBlackPage; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer; color: white;font-size: 14px;"><?php echo $translations['M01432'][$language]; /* LANGUAGES */ ?>                                              
				</span>
				<div class="dropdown-menu dropdown-menu-right dropdown_language" x-placement="bottom-end" style="position: absolute; top: 0px; left: 30px; transform: translate3d(-20px, 38px, 0px);overflow: hidden;">
					<?php
						$languageArr = $sys["languages"];
						foreach($languageArr as $key => $value) {
					?>
						<a class="dropdown-item changeLanguage" href="javascript:;" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>"><?php echo $languageArr[$key]['displayName']; ?></a>
					<?php
						}
					?>
				</div>
			</div>
		</ul>
	</div>
</div>

<script>
var urlBuffer = window.location.href.split('/');
var currentPath = urlBuffer.pop();
var accordionDeveloperDiv = document.getElementById('accordion-dev-developer');
var accordionTransactionDiv = document.getElementById('accordion-dev-transaction');
var accordionWalletDiv = document.getElementById('accordion-dev-wallet');
var accordionObserver = document.getElementById('accordion-observer');

if (currentPath == 'apiIntegrationStatistic.php' || currentPath == 'apiKeys.php' || currentPath == 'apiIO.php') {
	document.getElementById('accordion-dev-developer').classList.add('show');
	document.getElementById(currentPath).childNodes[1].classList.remove('accordion-child');
}

if (currentPath == 'buyCryptoHistory.php' || currentPath == 'paymentListing.php' || currentPath == 'withdrawalListing.php' || currentPath == 'fundOutHistory.php') {
	document.getElementById('accordion-dev-transaction').classList.add('show');
	document.getElementById(currentPath).childNodes[1].classList.remove('accordion-child');
	if (currentPath == 'buyCryptoHistory.php') {
		document.getElementById(currentPath).classList.add('activeNav');
		console.log(document.getElementById(currentPath).childNodes[1])
	}
}

if (currentPath == 'personalWallet.php' || currentPath == 'paymentWallet.php' || currentPath == 'transferWallet.php') {
	document.getElementById('accordion-dev-wallet').classList.add('show');
	document.getElementById(currentPath).childNodes[1].classList.remove('accordion-child');
}

function menuObserver() {
	if (accordionObserver.offsetWidth < 250) {
		accordionDeveloperDiv.classList.remove('show');
		accordionTransactionDiv.classList.remove('show');
		accordionWalletDiv.classList.remove('show');
	}
	if (accordionObserver.offsetWidth >= 250){
		if (currentPath == 'apiIntegrationStatistic.php' || currentPath == 'apiKeys.php' || currentPath == 'apiIO.php') {
			accordionDeveloperDiv.classList.add('show');
		}
		if (currentPath == 'buyCryptoHistory.php' || currentPath == 'paymentListing.php' || currentPath == 'withdrawalListing.php' || currentPath == 'fundOutHistory.php') {
			accordionTransactionDiv.classList.add('show');
		}
		if (currentPath == 'personalWallet.php' || currentPath == 'paymentWallet.php' || currentPath == 'transferWallet.php') {
			accordionWalletDiv.classList.add('show');
		}
	}
}

new ResizeObserver(menuObserver).observe(accordionObserver);
</script>


<style>
.vertical-line {
 /* Float:left; */
 height:45px;
 width:1px; /* edit this if you want */
 background-color: white;
 margin-right: 30px;
 margin-left: 20px;
} 

@media only screen and (min-width: 1000px) {
	  .content-to-hide {
      display: none;
   }
}

@media (max-width:1024px){
	#headerRow{
		display:none;
	}
}
.collapse.in {
    height: auto !important;
}

.headerBtnText {
	font-size: 15px !important;
}

.accordion-child:hover {
	color: #fff !important;
}
</style>
