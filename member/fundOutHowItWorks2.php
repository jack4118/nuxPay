<?php include 'include/config.php'; ?>

<?php
session_start();

if((isset($_POST['access_token']) && $_POST['access_token'] != "")) {
  $_SESSION["access_token"] = $_POST['access_token'];
  $_SESSION["business"]["uuid"] = $_POST['businessID'];
  $_SESSION["sessionLoginTime"] = $_POST['sessionLoginTime'];
}
?>

<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >

    
        <div class="m-grid m-grid--hor m-grid--root m-page">

            <?php include 'headerDashboard.php'; ?>


            <div class="m-grid__item m-grid__item--fluid m-wrapper">

                <!--<div class="m-subheader marginTopHeader">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <div class="col-12">
                                <div class="row">
                                    <div class="dashboardTitleWidth">
                                        <img src="images/dashboard/rocketIcon.svg" style="width: 30px; margin-top: 5px;" />
                                    </div>
                                    <div class="dashboardTitleWidth2">
                                        <div class="row">
                                            <div class="col-12 dashboardTitle">
                                                Welcome to NuxPay, <?php echo $_SESSION['name']; ?>
                                            </div>
                                            <div class="col-12 dashboardTitleDesc">
                                                Start to setup currencies and API credentials to receive payment now
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
                <div class="m-content marginTopHeader">
                    <div class="col-md-12" style="text-align:center; padding-bottom: 8px">
                        <h4>How It Works</h4>
                    </div>
                    <div class="col-md-12" style="text-align:center">
                        
                            <img src="<?php echo $sys['source'] == 'FTAG' ?  'images/whitelabel/ftag/Fund-Out-2.png' :  'images/fundOut/how-it-work-2.png'?>" style="width:100%; max-width: 371px;">
                           
                    </div>
                    <div class="col-md-12" style="text-align:center; padding-top: 100px;">
                        <p>Your customer withdraw fund from your application or website.</p>
                    </div>
                    <div class="col-md-12" style="text-align:center">
                    <a href="fundOutHowItWorks1.php" style="padding-right: 15px">< Previous</a>
                    <a href="fundOutHowItWorks3.php">Next ></a>
                    </div>
                </div>
            </div>

        </div>
    

    <?php include 'footerDashboard.php'; ?>

</div>



<?php include 'sharejsDashboard.php'; ?>

</body>


</html>

<script>

    var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var dateToday       = new Date();
    var firstTime       = "<?php echo $_POST['firstTime']; ?>";
    var walletType;

    $(document).ready(function(){


    

    });

    

    

    

</script>
