<?php
$thisPage = basename($_SERVER['PHP_SELF']);
?>

<?php
$currentPage = basename($_SERVER['PHP_SELF']);
switch($currentPage) {

    case 'paymentGateway.php':
    $changeBlackPage = "changeWhitePage";
    $largeLogo = $sys['newHomepageLogoWhite2'];
    $smallLogo = $sys['newHomepageLogoWhite2'];
    break;

    default:
    $changeBlackPage = "changeBlackPage";
    $largeLogo = $sys['newHomepageLogoWhite2'];
    $smallLogo = $sys['newHomepageLogoWhite2'];
    break;

}
?>

<div class="container-fluid dekstopHeaderViewOnly <?php echo $changeBlackPage; ?>">
    <div class="row px-sm-5 px-1 pt-2">
        <div class="col-4">

            <!-- <div class="dropdown">
                <button class="btn p-0" style="text-transform: uppercase; border-radius: unset;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="choosenLanguage">ENGLISH</span> <span> <i class="fa fa-caret-down"></i> </span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" style="text-transform: uppercase;">Chinese</a>
                    <a class="dropdown-item" href="#" style="text-transform: uppercase;">English</a>
                    <a class="dropdown-item" href="#" style="text-transform: uppercase;">Tradisional Chinese</a>
                </div>
            </div> -->

        </div>
    </div>
</div>

<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed <?php echo $changeBlackPage; ?>">
    <div class="kt-header-mobile__logo">
        <a href="homepage.php" class="headerLink" data-name="Homepage">
            <img alt="Logo" src="<?php echo $smallLogo; ?>" style="width: 150px;">
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler">
            <span class="<?php echo $changeBlackPage; ?>"></span>
        </button>
    </div>
</div>

<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" style="padding-top: 0px;" id="kt_wrapper">


            <div id="kt_header" class="kt-header  kt-header--fixed <?php echo $changeBlackPage; ?>" data-ktheader-minimize="on" style="">
                <div class="kt-container">
                    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                    <div class="text-center kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid hidden-lg <?php echo $changeBlackPage; ?>" id="kt_header_menu_wrapper">

                        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile headerMenuStyle <?php echo $changeBlackPage; ?>" style="width: 100%">
                            <ul class="kt-menu__nav">

                                <!-- <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-4">

                                    <a href="paymentGateway.php" class="kt-menu__link headerLink <?php echo $changeBlackPage; ?>" data-name="Company">
                                        <span class="kt-menu__link-text <?php echo $changeBlackPage; ?>" style="font-weight: 400!important;">DEVELOPER</span>
                                    </a>
                                </li> -->

                                <?php if($_SESSION['access_token'] != '') {?>

                                    <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-4">

                                        <a href="gettingStarted.php" class="xlDisplayNone kt-menu__link headerLink <?php echo $changeBlackPage; ?>" data-name="Go to Dashboard">
                                            <span class="kt-menu__link-text <?php echo $changeBlackPage; ?>">Dashboard</span>
                                        </a>
                                    </li>
                                <?php } else { ?>

                                    <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-4">
                                        <a href="login.php?type=signupPage" class="xlDisplayNone kt-menu__link headerLink <?php echo $changeBlackPage; ?>" data-name="Sign Up">
                                            <span class="kt-menu__link-text <?php echo $changeBlackPage; ?>">Sign Up</span>
                                        </a>
                                    </li>
                                    <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-4">
                                        <a href="login.php?type=loginPage" class="xlDisplayNone kt-menu__link headerLink <?php echo $changeBlackPage; ?>" data-name="Login">
                                            <span class="kt-menu__link-text <?php echo $changeBlackPage; ?>">Login</span>
                                        </a>
                                    </li>
                                <?php }?>


                                <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-4">
                                    <a href="paymentGateway.php" class="xlDisplayNone kt-menu__link headerLink <?php echo $changeBlackPage; ?>" data-name="Login">
                                        <span class="kt-menu__link-text <?php echo $changeBlackPage; ?>">Developer</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>


            <div class="kt-header__brand  kt-grid__item" id="kt_header_brand" style="max-width: 80px; margin-left: 55px;">
                <a class="kt-header__brand-logo headerLink" href="homepage.php" data-name="Homepage">
                    <img alt="Logo" src="images/ppay/ppay_logo_brown.png" style="" class="logoWidth">
                </a>
            </div>

            <div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="secondmenu" style="margin-left: 40px; max-width: fit-content;">
                <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile">
                    <ul class="kt-menu__nav ">

                        <!-- <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-4">
                            <?php if($_SESSION['access_token'] != '') {?>
                                <a href="paymentGatewayCryptocurrencies.php" class="kt-menu__link headerLink <?php echo $changeBlackPage; ?>" data-name="Company" style="background: linear-gradient(to right, #51C2C6,#231917); padding: 8px 50px">
                                    <span class="kt-menu__link-text <?php echo $changeBlackPage; ?>">Dashboard</span>
                                </a>
                            <?php } else { ?>
                                <a href="signUp.php" class="kt-menu__link headerLink <?php echo $changeBlackPage; ?> mr-3" data-name="Company" style="    border: 2px solid #231917; padding: 8px 50px">
                                    <span class="kt-menu__link-text <?php echo $changeBlackPage; ?>">SIGN UP</span>
                                </a>

                                <a href="login.php" class="kt-menu__link headerLink <?php echo $changeBlackPage; ?>" data-name="Company" style="background: linear-gradient(to right, #51C2C6,#231917); padding: 8px 50px">
                                    <span class="kt-menu__link-text <?php echo $changeBlackPage; ?>">LOGIN</span>
                                </a>
                            <?php } ?>


                        </li> -->

                    </ul>
                </div>
            </div>
            <div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="secondmenu" style="display: flex;flex-direction: row-reverse;">
                <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile">
                    <ul class="kt-menu__nav ">

                        <!-- <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-4">
                            <?php if($_SESSION['access_token'] != '') {?>
                                <a href="paymentGatewayCryptocurrencies.php" class="kt-menu__link headerLink <?php echo $changeBlackPage; ?>" data-name="Company" style="background: linear-gradient(to right, #51C2C6,#231917); padding: 8px 50px">
                                    <span class="kt-menu__link-text <?php echo $changeBlackPage; ?>">Dashboard</span>
                                </a>
                            <?php } else { ?>
                                <a href="signUp.php" class="kt-menu__link headerLink <?php echo $changeBlackPage; ?> mr-3" data-name="Company" style="    border: 2px solid #231917; padding: 8px 50px">
                                    <span class="kt-menu__link-text <?php echo $changeBlackPage; ?>">SIGN UP</span>
                                </a>

                                <a href="login.php" class="kt-menu__link headerLink <?php echo $changeBlackPage; ?>" data-name="Company" style="background: linear-gradient(to right, #51C2C6,#231917); padding: 8px 50px">
                                    <span class="kt-menu__link-text <?php echo $changeBlackPage; ?>">LOGIN</span>
                                </a>
                            <?php } ?>


                        </li> -->

                        <?php if($_SESSION['access_token'] != '') {?>
                            <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-2">
                                <a href="gettingStarted.php" class="kt-menu__link headerLink headerLoginBtn" data-name="Login">
                                    <!-- <i class="fa fa-dashboard headerSignUpIcon" style="font-size: 18px!important;"></i> -->
                                    <span style="vertical-align: middle;">
                                        Dashboard
                                    </span>
                                </a>
                            </li>
                        <?php  }else{ ?>

                            <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-2">
                                <a href="login.php?type=loginPage" class="kt-menu__link headerLink headerLoginWithoutBg" data-name="Login">
                                    Login
                                </a>
                            </li>
                            
                            <li id="signupButton" class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-2">
                                <!-- <a href="login.php?type=signupPage" class="kt-menu__link headerLink headerSignupBtn" data-name="Sign Up"> -->
                                <a href="login.php?type=signupPage" class="kt-menu__link headerLink headerLoginBtn" data-name="Sign Up">
                                    <!-- <i class="fa fa-edit headerSignUpIcon"></i> -->
                                    <span style="vertical-align: middle;">
                                        Sign Up
                                    </span>
                                </a>
                            </li>


                            <!-- <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--hover px-2">
                                <a href="login.php?type=loginPage" class="kt-menu__link headerLink headerLoginBtn" data-name="Login">
                                    <img src="images/pPay/loginIcon.png" class="loginBtnIcon">
                                    <span style="vertical-align: middle;">
                                        Login
                                    </span>
                                </a>
                            </li> -->
                        <?php  } ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
