<!DOCTYPE html>
<html>
    <?php
    
    include("include/config.php");
    include("include/class.general.php");
    include("language/lang_all.php");
    
    // Get the current selected language
    $language = General::getLanguage();

?>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="" content="">
        <meta name="robots" content="noindex, nofollow">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo $config['favicon']; ?>">
        <link rel="apple-touch-icon" href="images/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="images/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="images/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="images/icon144.png" sizes="144x144">

        <!-- App title -->
        <title><?php echo $config['companyName']; ?> Admin Panel</title>

        <!-- DataTables -->
<!--
        <link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
-->
        <!-- Plugins css-->
        <link href="plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="plugins/select2/dist/css/select2.css" rel="stylesheet" type="text/css">
        <link href="plugins/select2/dist/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
        <link href="plugins/switchery/switchery.min.css" rel="stylesheet" />
        <link href="plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <link href="plugins/select2/dist/css/select2.css" rel="stylesheet">
        <link href="css/dropify.css" rel="stylesheet">

        <link href="js/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">

        <!-- App CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/components.css" rel="stylesheet" type="text/css" />
        <link href="css/icons.css" rel="stylesheet" type="text/css" />
        <link href="css/pages.css" rel="stylesheet" type="text/css" />
        <link href="css/menu.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $config['customCSSPath'];?>?ts=<?php echo filemtime($config['customCSSPath']); ?>" rel="stylesheet" type="text/css" />

        

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        

        <script src="js/modernizr.min.js"></script>
</head>
<body>
<div id="canvasLoader" class="hide">
    <div id="canvasLoaderContainer">
        <div>
            <i class="fa fa-spinner fa-spin fa-5x"></i>
        </div>
    </div>
</div>

<div class="modal fade" id="canvasMessage" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                </h4>
            </div>
            <div class="modal-body">
                <div id="canvasAlertMessage" class="alert">
                </div>
            </div>
            <div class="modal-footer">
                <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <section class="resellerLoginPage">
        <div class="kt-container">
            <div class="col-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-7 col-xl-4 ml-lg-5 ml-0 ml-md-4">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="<?php echo $config['resellerPageLogo']; ?>" class="resellerPageLogo">
                            </div>
                            <div class="col-12 mt-3 mt-md-5 mt-lg-5 mt-xl-3 text-center">
                                <div class="row">
                                    <div class="resellerFormBox">
                                        <div class="col-12 pageTitle text-left">
                                            Forgot Password
                                        </div>
                                        <div class="resellerFormDivider">
                                        </div>
                                        <!-- <div class="col-12 form-group">
                                            <div id="placementPosition" class="kt-radio-inline text-left">
                                                <label class="kt-radio">
                                                    <input type="radio" name="placementPosition" value="1"> SMS
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio ml-3">
                                                    <input type="radio" name="placementPosition" value="2"> Email
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div> -->
                                        <div class="col-12 form-group" id="otpSentNotification">
                                        </div>
                                        <div class="col-12 form-group" style="display: flex;">
                                            <input id="otpCode" placeholder="OTP" type="text" class="form-control contactInput" style="width: 70%">
                                            <div>
                                                <button class="btn btn-primary" id="sendCode" type="button">Send Code</button>
                                                <span id="timer" class="text-center" style="display: none; width: 95px; float: right;">
                                                    <span class="p-3" style="display:block"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 form-group">
                                            <input id="newPassword" placeholder="New Password" type="password" class="form-control contactInput">
                                        </div>
                                        <div class="col-12 form-group">
                                            <input id="retypeNewPassword" placeholder="Retype New Password" type="password" class="form-control contactInput">
                                        </div>
                                        <div class="col-12 mt-5 form-group">
                                            <button id="forgotPasswordConfirmation" type="button" class="btn primaryBtn mb-4">Next</button>
                                        </div>

                                        <div id="loginError" class="alert alert-danger" style="display: none;"></div>
                                        <div class="resellerFormDivider" style="margin-top: 30px">
                                        </div>
                                        <div class="col-12">
                                            <a href="pageLogin.php" class="signupText">Back to Login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
        
    	<script>
            var resizefunc = [];
        </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>
    
    <script type="text/javascript">
        // Initialize the arguments for ajaxSend function
        var url = 'scripts/reqChangePassword.php';
        var method = 'POST';
        var debug = 0;
        var bypassBlocking = 0;
        var bypassLoading = 0;
        var formData = "";
        var fCallback = "";
        var username = "<?php echo $_POST['username'];?>"
        var siteSource = "<?php echo $config['source'];?>"
        var email = "<?php echo $_POST['email']?>"

        $(document).ready(function() {
            $('#otpSentNotification').html(`An OTP has been sent to your email ${email}`);
            countDown('sendCode', 180);

            $("#sendCode").click(getOTP); 

            $('#forgotPasswordConfirmation').click(function(){
                $('#otpSentNotification').hide();
                userOtp = $('#otpCode').val().trim();
                newPassword = $('#newPassword').val().trim();
                confirmPassword = $('#retypeNewPassword').val().trim();

                if (userOtp == ''){
                    showMessage("OTP code cannot be empty", 'warning', 'Error', "", "");

                } else if (newPassword == ''){
                    showMessage("New Password cannot be empty", 'warning', 'Error', "", "");

                } else if (confirmPassword == ''){
                    showMessage("Retype New Password cannot be empty", 'warning', 'Error', "", "");

                } else if (newPassword != confirmPassword){
                    showMessage("New Password and Retype New Password does not match", 'warning', 'Error', "", "");

                } else {
                    formData = {
                        command: 'resellerResetPassword',
                        email: email,
                        user_otp: userOtp,
                        new_password: newPassword,
                        confirm_password: confirmPassword,
                        source: siteSource
                    };

                    var fCallback = passwordCallback;
		            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                }
            });
        });

        function getOTP(){
            formData = {
			        command: 'resellerRequestResetPasswordOTP',
                    email: email,
                    source: siteSource
		    };

            var fCallback = otpCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function otpCallback(data, message, objData){
            if (objData.status == 'ok'){
                $('#otpSentNotification').html(`An OTP has been sent to your email ${objData.email}`);
                countDown('sendCode', 180);
            }
        }

        function passwordCallback(data, message, objData){
            if (objData.status == "ok"){
                showMessage(message, 'success', 'Update Successful', "edit", "pageLogin.php");
            }
        }

        function countDown(id, second){
            var minutes = Math.floor(second/60);
            var seconds = second - (minutes*60);
            if(minutes == 0 && seconds == 0){
                $('#sendCode').show();
                $('#timer').hide();
                return;
            }else if(minutes == 0 && seconds != 0){
                $('#sendCode').hide();
                $('#timer').show();
                $('#timer span').empty().append(seconds+"s");
                setTimeout('countDown(sendCode,'+(second-1)+')',1000);
            }else{
                $('#sendCode').hide();
                $('#timer').show();
                $('#timer span').empty().append(minutes+"m"+" "+seconds+"s");
                setTimeout('countDown(sendCode,'+(second-1)+')',1000);
            }
        }
    </script>
</html>
