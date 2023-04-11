<?php
$thisPage = basename($_SERVER['PHP_SELF']);
?>

<?php
$currentPage = basename($_SERVER['PHP_SELF']);
// $httpHost = $_SERVER['HTTP_HOST'];
$httpHost = "nuxpay.io";
$customDomain = "";

$filterSendReceive = array("sendfund.php","sendreview.php","sendcompleted.php", "receivefund.php", "receivereview.php", "redeemfund.php");



if (strpos($httpHost, 'nuxpay.com') !== false) {
    $customDomain = "nuxpay.com";
    //nuxpay.com
    switch($currentPage) {

        case 'paymentGateway.php':
        $changeBlackPage = "changeWhitePage";
        $largeLogo = $sys['homepageHeaderLogo'];
        $smallLogo = $sys['homepageHeaderLogoMobile'];
        $homepageFooterLogo = $sys['homepageFooterLogo'];
        break;
            
        case 'payment.php':
        $changeBlackPage = "changeBlackPage";
        $largeLogo = $sys['homepageHeaderWhiteLogo'];
        $smallLogo = $sys['homepageHeaderLogoMobile'];
        $homepageFooterLogo = $sys['homepageFooterLogo'];
        break;
            
        case 'index.php':
        $changeBlackPage = "changeBlackPage";
        $largeLogo = $sys['homepageHeaderLogo'];
        $smallLogo = $sys['homepageHeaderLogoMobile'];
        $homepageFooterLogo = $sys['homepageFooterLogo'];
        break;

        case 'sendFund.php':
        case 'sendReview.php':
        case 'receiveFund.php':
        case 'redeemFund.php':
        case 'receiveReview.php':
        case 'sendCompleted.php':
        $changeBlackPage = "changeBlackPage";
        $largeLogo = $sys['loginLogo'];
        $smallLogo = $sys['homepageHeaderLogoMobile'];
        $homepageFooterLogo = $sys['homepageFooterLogo'];
        break;
            
        default:
        $changeBlackPage = "changeWhitePage";
        $largeLogo = $sys['homepageHeaderLogo'];
        $smallLogo = $sys['homepageHeaderLogoMobile'];
        $homepageFooterLogo = $sys['homepageFooterLogo'];
        break;

    }

} else if (strpos($httpHost, 'nuxpay.co') !== false) {
    $customDomain = "nuxpay.co";

    //nuxpay.co
    switch($currentPage) {

        case 'paymentGateway.php':
        $changeBlackPage = "changeWhitePage";
        $largeLogo = $sys['homepageHeaderLogoNuxpayCo'];
        $smallLogo = $sys['homepageHeaderLogoMobileNuxpayCo'];
        $homepageFooterLogo = $sys['homepageFooterLogoNuxpayCo'];
        break;
            
        case 'payment.php':
        $changeBlackPage = "changeBlackPage";
        $largeLogo = $sys['homepageHeaderWhiteLogoNuxpayCo'];
        $smallLogo = $sys['homepageHeaderLogoMobileNuxpayCo'];
        $homepageFooterLogo = $sys['homepageFooterLogoNuxpayCo'];
        break;
            
        case 'index.php':
        $changeBlackPage = "changeBlackPage";
        $largeLogo = $sys['homepageHeaderLogoNuxpayCo'];
        $smallLogo = $sys['homepageHeaderLogoMobileNuxpayCo'];
        $homepageFooterLogo = $sys['homepageFooterLogoNuxpayCo'];
        break;

        case 'sendFund.php':
        case 'sendReview.php':
        case 'receiveFund.php':
        case 'redeemFund.php':
        case 'receiveReview.php':
        case 'sendCompleted.php':
        $changeBlackPage = "changeBlackPage";
        $largeLogo = $sys['loginLogoNuxpayCo'];
        $smallLogo = $sys['homepageHeaderLogoMobileNuxpayCo'];
        $homepageFooterLogo = $sys['homepageFooterLogoNuxpayCo'];
        break;
            
        default:
        $changeBlackPage = "changeWhitePage";
        $largeLogo = $sys['homepageHeaderLogoNuxpayCo'];
        $smallLogo = $sys['homepageHeaderLogoMobileNuxpayCo'];
        $homepageFooterLogo = $sys['homepageFooterLogoNuxpayCo'];
        break;

    }

} else if (strpos($httpHost, 'nuxpay.net') !== false) {
    $customDomain = "nuxpay.net";

    //nuxpay.net
    switch($currentPage) {

        case 'paymentGateway.php':
        $changeBlackPage = "changeWhitePage";
        $largeLogo = $sys['homepageHeaderLogoNuxpayNet'];
        $smallLogo = $sys['homepageHeaderLogoMobileNuxpayNet'];
        $homepageFooterLogo = $sys['homepageFooterLogoNuxpayNet'];
        break;
            
        case 'payment.php':
        $changeBlackPage = "changeBlackPage";
        $largeLogo = $sys['homepageHeaderWhiteLogoNuxpayNet'];
        $smallLogo = $sys['homepageHeaderLogoMobileNuxpayNet'];
        $homepageFooterLogo = $sys['homepageFooterLogoNuxpayNet'];
        break;
            
        case 'index.php':
        $changeBlackPage = "changeBlackPage";
        $largeLogo = $sys['homepageHeaderLogoNuxpayNet'];
        $smallLogo = $sys['homepageHeaderLogoMobileNuxpayNet'];
        $homepageFooterLogo = $sys['homepageFooterLogoNuxpayNet'];
        break;

        case 'sendFund.php':
        case 'sendReview.php':
        case 'receiveFund.php':
        case 'redeemFund.php':
        case 'receiveReview.php':
        case 'sendCompleted.php':
        $changeBlackPage = "changeBlackPage";
        $largeLogo = $sys['loginLogoNuxpayNet'];
        $smallLogo = $sys['homepageHeaderLogoMobileNuxpayNet'];
        $homepageFooterLogo = $sys['homepageFooterLogoNuxpayNet'];
        break;
            
        default:
        $changeBlackPage = "changeWhitePage";
        $largeLogo = $sys['homepageHeaderLogoNuxpayNet'];
        $smallLogo = $sys['homepageHeaderLogoMobileNuxpayNet'];
        $homepageFooterLogo = $sys['homepageFooterLogoNuxpayNet'];
        break;

    }

} else if (strpos($httpHost, 'nuxpay.io') !== false) {
    $customDomain = "nuxpay.io";

    //nuxpay.io
    switch($currentPage) {

        case 'paymentGateway.php':
        $changeBlackPage = "changeWhitePage";
        $largeLogo = $sys['homepageHeaderLogoNuxpayIo'];
        $smallLogo = $sys['homepageHeaderLogoMobileNuxpayIo'];
        $homepageFooterLogo = $sys['homepageFooterLogoNuxpayIo'];
        break;
            
        case 'payment.php':
        $changeBlackPage = "changeBlackPage";
        $largeLogo = $sys['homepageHeaderWhiteLogoNuxpayIo'];
        $smallLogo = $sys['homepageHeaderLogoMobileNuxpayIo'];
        $homepageFooterLogo = $sys['homepageFooterLogoNuxpayIo'];
        break;
            
        case 'index.php':
        $changeBlackPage = "changeBlackPage";
        $largeLogo = $sys['homepageHeaderLogoNuxpayIo'];
        $smallLogo = $sys['homepageHeaderLogoMobileNuxpayIo'];
        $homepageFooterLogo = $sys['homepageFooterLogoNuxpayIo'];
        break;
        
        case 'sendFund.php':
        case 'sendReview.php':
        case 'receiveFund.php':
        case 'redeemFund.php':
        case 'receiveReview.php':
        case 'sendCompleted.php':
        $changeBlackPage = "changeBlackPage";
        $largeLogo = $sys['loginLogoNuxpayIo'];
        $smallLogo = $sys['homepageHeaderLogoMobileNuxpayIo'];
        $homepageFooterLogo = $sys['homepageFooterLogoNuxpayIo'];
        break;
            
        default:
        $changeBlackPage = "changeWhitePage";
        $largeLogo = $sys['homepageHeaderLogoNuxpayIo'];
        $smallLogo = $sys['homepageHeaderLogoMobileNuxpayIo'];
        $homepageFooterLogo = $sys['homepageFooterLogoNuxpayIo'];
        break;

    }
} else {
    $customDomain = "";

    //default
    switch($currentPage) {

        case 'paymentGateway.php':
        $changeBlackPage = "changeWhitePage";
        $largeLogo = $sys['homepageHeaderLogo'];
        $smallLogo = $sys['homepageHeaderLogoMobile'];
        $homepageFooterLogo = $sys['homepageFooterLogo'];
        break;
            
        case 'payment.php':
        $changeBlackPage = "changeBlackPage";
        $largeLogo = $sys['homepageHeaderWhiteLogo'];
        $smallLogo = $sys['homepageHeaderLogoMobile'];
        $homepageFooterLogo = $sys['homepageFooterLogo'];
        break;
            
        case 'index.php':        
        $changeBlackPage = "changeBlackPage";
        $largeLogo = $sys['homepageHeaderLogo'];
        $smallLogo = $sys['homepageHeaderLogoMobile'];
        $homepageFooterLogo = $sys['homepageFooterLogo'];
        break;

        case 'sendFund.php':
        case 'sendReview.php':
        case 'receiveFund.php':
        case 'redeemFund.php':
        case 'receiveReview.php':
        case 'sendCompleted.php':
        $changeBlackPage = "changeBlackPage";
        $largeLogo = $sys['loginLogo'];
        $smallLogo = $sys['homepageHeaderLogoMobile'];
        $homepageFooterLogo = $sys['homepageFooterLogo'];
        break;
            
        default:
        $changeBlackPage = "changeWhitePage";
        $largeLogo = $sys['homepageHeaderLogo'];
        $smallLogo = $sys['homepageHeaderLogoMobile'];
        $homepageFooterLogo = $sys['homepageFooterLogo'];
        break;

    }
}

?>

<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed <?php echo $changeBlackPage; ?>">
    <div class="kt-header-mobile__logo">
        <a href="homepage.php" class="headerLink" data-name="Homepage">
            <img id="navSmallLogo" alt="NuxPay-Logo" src="<?php echo $largeLogo; ?>" style="height:30px">
            <img id="navSmallLogoScrolled" alt="NuxPay-Logo" src="<?php echo $smallLogo; ?>" style="height:30px">
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler">
            <span id="navBarHamburger" class="<?php echo $changeBlackPage; ?>"></span>
        </button>
    </div>
</div>

<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" style="padding-top: 0px;" id="kt_wrapper">
            <div id="kt_header" class="kt-header  kt-header--fixed <?php echo $changeBlackPage; ?>" data-ktheader-minimize="on" style="">
                <div class="kt-container" style="padding-left: 0;">
                    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                    <div class="text-center kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid hidden-lg <?php echo $changeBlackPage; ?>" id="kt_header_menu_wrapper">

                        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile headerMenuStyle <?php echo $changeBlackPage; ?>" style="width: 100%">
                            <ul class="kt-menu__nav">

                                <?php if($_SESSION['access_token'] != '') {?>
                                    <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-4">
                                        <a href="dashboard.php" class="xlDisplayNone kt-menu__link headerLink <?php echo $changeBlackPage; ?>" data-name="Go to Dashboard">
                                            <span class="kt-menu__link-text <?php echo $changeBlackPage; ?>"><?php echo $translations['M01537'][$language]; /*Dashboard */ ?></span>
                                        </a>
                                    </li>
                                <?php } else { ?>
                                    <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-4">
                                        <a href="newsignup.php" class="xlDisplayNone kt-menu__link headerLink <?php echo $changeBlackPage; ?>" data-name="Sign Up">
                                            <span class="kt-menu__link-text <?php echo $changeBlackPage; ?>"><?php echo $translations['M01500'][$language]; /*Sign Up */ ?></span>
                                        </a>
                                    </li>
                                    <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-4">
                                        <a href="login.php" class="xlDisplayNone kt-menu__link headerLink <?php echo $changeBlackPage; ?>" data-name="Login">
                                            <span class="kt-menu__link-text <?php echo $changeBlackPage; ?>"><?php echo $translations['M01499'][$language]; /*Login */ ?></span>
                                        </a>
                                    </li>
                                <?php }?>

                                <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-4">
                                    <a href="paymentGateway.php" class="xlDisplayNone kt-menu__link headerLink <?php echo $changeBlackPage; ?>" data-name="Login">
                                        <span class="kt-menu__link-text <?php echo $changeBlackPage; ?>"><?php echo $translations['M01439'][$language]; /* API Documentation */ ?></span>
                                    </a>
                                </li>
								
								<li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-4" style="position:fixed">
									<div class="btn-group mt-3">
										<span type="" class="dropdown-toggle kt-menu__link-text <?php echo $changeBlackPage; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer; color: white;font-size: 16px;padding: 0px 20px;font-weight: 400;"><?php echo $translations['M01432'][$language]; /* LANGUAGES */ ?>                                              
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
								</li>

                            </ul>
                        </div>
                    </div>


            <div class="kt-header__brand  kt-grid__item" id="kt_header_brand" style="max-width: 250px; margin-left: 55px; justify-content:left;">
                <a class="kt-header__brand-logo headerLink" href="homepage.php" data-name="Homepage">
                    <img id="navLargeLogo" alt="NuxPay-Logo" src="<?php echo $largeLogo; ?>" style="" class="logoWidth">
                    <img id="navLargeLogoScrolled" alt="NuxPay-Logo" src="<?php echo $smallLogo; ?>" style="" class="logoWidth">
                </a>                
            </div>

            <div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="secondmenu" style="margin-left: 40px">
                <?php  if (strtolower($thisPage) == 'sendfund.php') { ?>
                    <a href="receiveFund.php" class="kt-menu__link headerLink" data-name="Company" style="color:#c4c4cc; margin-left: 40px; padding: 0 15px;">                        
                    <span class="kt-menu__link-text" style="font-weight: 500; font-size:14px">Receive</span>
                    </a>

                    <a href="sendFund.php" class="kt-menu__link headerLink" data-name="Company" style="color:#74788d; margin-left: 20px; border-bottom-style: solid; padding: 0 15px; border-bottom-color: #51C2DB"> 
                    <span class="kt-menu__link-text" style="font-weight: 500; font-size:14px">Send</span>
                    </a>
                <?php  } else if (strtolower($thisPage) == 'receivefund.php' || strtolower($thisPage) == 'redeemfund.php') {?>
                    <a href="receiveFund.php" class="kt-menu__link headerLink" data-name="Company" style="color:#74788d; margin-left: 20px; border-bottom-style: solid; padding: 0 15px; border-bottom-color: #51C2DB">                        
                    <span class="kt-menu__link-text" style="font-weight: 500; font-size:14px">Receive</span>
                    </a>

                    <a href="sendFund.php" class="kt-menu__link headerLink" data-name="Company" style="color:#c4c4cc; margin-left: 40px; padding: 0 15px;"> 
                    <span class="kt-menu__link-text" style="font-weight: 500; font-size:14px">Send</span>
                    </a>
                <?php  } ?>
            </div>            
            <div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="secondmenu" style="display: flex;flex-direction: row-reverse;">
                <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile">
                    <ul class="kt-menu__nav ">
                        <?php if($_SESSION['access_token'] != '') {?>
                            <?php if(in_array(strtolower($thisPage), $filterSendReceive )) {?>                       
                                <?php } else {?>
                                    <li id='languageLi' class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-2">
                                        <div id='languageDiv' class="btn-group languageDiv">
                                            <span type="" id="languageSpan" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer; font-size: 15px;"><?php echo $translations['M01432'][$language]; /* LANGUAGES */ ?>                                              
                                            </span>
                                            <div class="dropdown-menu dropdown-menu-right dropdown_language" x-placement="bottom-end" style="position: absolute; top: 0px; left: 0px; transform: translate3d(-20px, 38px, 0px);overflow: hidden;">
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
                                    </li>       
                                    <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-2">
                                        <a href="dashboard.php" class="kt-menu__link headerLink headerLoginBtn" data-name="Login">
                                            <i class="fa fa-dashboard headerSignUpIcon" style="font-size: 18px!important;"></i>
                                            <span style="vertical-align: middle;">
                                                <?php echo $translations['M01537'][$language]; /*Dashboard */ ?>
                                            </span>
                                        </a>
                                    </li>
                                <?php } ?>
                            
                        <?php  }else { ?>

                            <?php if($thisPage=="index.php" || $thisPage=="") { ?>

                                <li id='languageLi' class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-2">
                                    <div id='languageDiv' class="btn-group languageDiv">
                                        <span type="" id="languageSpan" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer; font-size: 15px;"><?php echo $translations['M01432'][$language]; /* LANGUAGES */ ?>                                              
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right dropdown_language" x-placement="bottom-end" style="position: absolute; top: 0px; left: 0px; transform: translate3d(-20px, 38px, 0px);overflow: hidden;">
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
                                </li>       

                                <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-2">
                                    <a href="paymentGateway.php" class="kt-menu__link headerLink" data-name="ApiDoc">
                                        <span id="homepageApiDoc" style="vertical-align: middle; color: black; font-size: 15px; font-weight: 300;white-space: nowrap;text-align: center;"><?php echo $translations['M01439'][$language]; /* API Documentation */ ?></span>
                                    </a>
                                </li>

                                <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-2">
                                    <a href="#newNuxPaySection005BG" class="kt-menu__link headerLink" data-name="ContactUs">
                                        <span id="homepageContactUs" style="vertical-align: middle; color: black; font-size: 15px; font-weight: 300;white-space: nowrap;text-align: center;"><?php echo $translations['M01498'][$language]; /* Contact Us */ ?></span>
                                    </a>
                                </li>
                                <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-2">
                                    <a href="https://wa.me/60107003400?text=Hi%2C%20I%20would%20like%20to%20ask%20more%20about%3A%0A%0A1.%20Payment%20gateway%20service%0A2.%20Buy%20%26%20Sell%20Crypto%0A3.%20Register%20as%20Merchant%0A4.%20Become%20a%20Reseller%0A5.%20Others%0A%0AYour%20choice%3A%20" target="_blank" class="kt-menu__link headerLink" data-name="EarnAsReseller">
                                        <span id="homepageEarnAsReseller" style="vertical-align: middle; color: black; font-size: 15px; font-weight: 300;white-space: nowrap;text-align: center;">
                                            <?php echo $translations['M02158'][$language] /* Earn as Reseller */ ?>
                                        </span>
                                    </a>
                                </li>

                                <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-2" style="width: 80px;">
                                    <a href="login.php" class="kt-menu__link headerLink" data-name="Login">
                                        <span id="homepageLogin" style="vertical-align: middle; color: black; font-size: 15px; font-weight: 300;"><?php echo $translations['M01499'][$language]; /*Login */ ?></span>
                                    </a>
                                </li>

                                <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-2" style="width: 80px;">
                                    <a href="newsignup.php" class="kt-menu__link headerLink" data-name="Sign Up">
                                        <span id="homepageSignup" style="vertical-align: middle; color: black; font-size: 15px; font-weight: 300;white-space: nowrap;"><?php echo $translations['M01500'][$language]; /*Sign Up */ ?></span>
                                    </a>
                                </li>

                            <?php } else if (!in_array(strtolower($thisPage), $filterSendReceive)) { ?>

                                <li id="signupButton" class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-2">
                                    <a href="newsignup.php" class="kt-menu__link headerLink headerLoginBtn" data-name="Sign Up">
                                        <i class="fa fa-edit headerSignUpIcon"></i>
                                        <span style="vertical-align: middle;white-space: nowrap;text-align: center;">
                                            <?php echo $translations['M01500'][$language]; /*Sign Up */ ?>
                                        </span>
                                    </a>
                                </li>


                                <li id='loginButton' class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-2">
                                    <a href="login.php" class="kt-menu__link headerLink headerLoginBtn" data-name="Login">
                                        <img src="images/nuxPay/loginIcon.png" class="loginBtnIcon">
                                        <span style="vertical-align: middle;">
                                            <?php echo $translations['M01499'][$language]; /*Login */ ?>
                                        </span>
                                    </a>
                                </li>                            

                            <?php } ?>
                            
                        <?php  } ?>                
                        
                        <?php if(in_array(strtolower($thisPage), $filterSendReceive) && $_SESSION['access_token'] != '') {?>
                            <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover pr-4">
                                    <a href="dashboard.php" class="" data-name="Login">
                                       <img src="images/sendandreceive/close-btn.png">
                                    </a>
                            </li>
                        <?php  } ?>
                            

                    </ul>
                </div>
            </div>
        </div>
    </div>
