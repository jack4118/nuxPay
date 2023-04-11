<nav class="navbar-fixed-top" style="border-bottom: 1px solid #e8eaf1; box-shadow: 0 1px 50px 0 #e8eaf1; padding: 10px 1rem; background: #fff; z-index: 99;">
    

    <!-- NAV Menu Right Site (Language and Account) -->
    <div class="block-option pull-right headerLogin" style="padding-right: 30px; padding-top: 3px;position: relative;top: 5px;">
        <ul class="nav navbar-nav-custom">
            <li id="loginNav" class="headerlist">
                <a href="login.php?type=loginPage" class="" style="vertical-align: middle; font-weight: 600; color: #0D122B;"><?php echo $translations["M00012"][$language]; ?><!-- Log In --></a><span><i class="fa fa-external-link f-20" style="margin-left: 15px; vertical-align: middle; position: relative; top: 1px;"></i></span>
            </li>
            </li>
            <li id="signUpNav"  class="headerlist">
                <a href="login.php?type=signupPage" class="" style="vertical-align: middle; font-weight: 600; color: #0D122B;"><?php echo $translations["M00013"][$language]; ?><!-- Sign Up --></a><span><i class="fa fa-external-link f-20" style="margin-left: 15px; vertical-align: middle; position: relative; top: 1px;"></i></span>
            </li>
            <li id="logoutNav"  class="headerlist">
                <a href="javascript:;" onclick="out();" class="" style="vertical-align: middle; font-weight: 600; color: #0D122B;"><?php echo $translations["M00014"][$language]; ?><!-- Logout --></a><span><i class="fa fa-external-link f-20" style="margin-left: 15px; vertical-align: middle; position: relative; top: 1px;"></i></span>
            </li>
        </ul>
    </div>
    <!-- NAV Menu Right Site (Language and Account) -->

    <div class="container-fluid">
        <div class="navbar-header">
            <ul class="navbar-nav">
                <li style="list-style-type: none; text-align: center;">
                   
                    <?php 
                    
                    if($_SESSION['access_token'] == '' || $_SESSION['isMobileVerified'] == 0) {
                        echo '<a id="linkHomepagePage" class="headerLoginLink" href="homepage.php">';
                    }
                    else{
                        echo '<a id="linkDashboardPage" class="headerLoginLink" href="paymentGatewayCryptocurrencies.php">';
                    }
                    ?>
                        <div style="float: left;">
                        
                            <?php echo "<img src=\"".$sys["newHomepageLogoBlack2"]."\" alt=\"LOGO\" class=\"signUpLogoXun\">";?>
                            <img class="XunLogoOnly" src="<?php echo $sys['logoIcon']; ?>">
                         
                        </div>
                    </a>
                 
                </li>
            </ul>
        </div>
    </div>

</nav>
