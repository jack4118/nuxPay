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
                                <a href="pageLogin.php">
                                    <img src="<?php echo $config['resellerPageLogo']; ?>" class="resellerPageLogo">
                                </a>
                            </div>
                            <div class="col-12 mt-3 mt-md-5 mt-lg-5 mt-xl-3 text-center">
                                <div class="row">
                                    <div class="resellerFormBox">
                                        <div class="col-12 pageTitle text-left">
                                            Account Login
                                        </div>
                                        <div class="resellerFormDivider">
                                        </div>
<!--
                                        <div class="col-12 form-group">
                                            <input id="userName" placeholder="Username" type="text" class="form-control contactInput">
                                        </div>
-->
										<div class="col-12 form-group">
                                            <input id="email" placeholder="Email" type="text" class="form-control contactInput">
                                        </div>
                                        <div class="col-12 form-group text-left">
                                            <input id="password" placeholder="Password" type="password" class="form-control contactInput">
                                            <div style="text-align: center; margin-top: 5px;">
                                                <a href="forgotPassword.php">Forgot password?</a>
<!--
                                                <span> | </span>
                                                <a href="forgotUsername.php">Forgot username?</a>
-->
                                            </div>
                                        </div>
                                        <div class="col-12 mt-5 form-group">
                                            <button id="pageLoginBtn" type="button" class="btn primaryBtn mb-4" onclick="validateForm();">Login</button>
                                        </div>

                                        <div id="loginError" class="alert alert-danger" style="display: none;"></div>
                                        <!-- <div class="col-12">
                                            Don't have a reseller account? <a href="../member/resellerSignup.php" class="signupText">Sign Up!</a>
                                        </div> -->
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
        $('.wrapper-page').keypress(function(e){
            if(e.which == 13){//Enter key pressed
                $('#pageLoginBtn').click();//Trigger enter button click event
            }
        });

        $('i.fa-refresh').click(function(event) {
            $("#captchaImage").attr("src", "captcha.php?" + Math.round(new Date().getTime() / 1000));
            $('input#captcha').val("");
        });

        function validateForm() {
            showCanvas();
            $('#loginError').css('display', 'none');
//            var userName = $('#userName').val();
            var email = $('#email').val();
			
            var password = $('#password').val();
            var timezoneOffset = getOffsetSecs();
           // var captcha   = $('#captcha').val();
            var formData = {
				'command': 'resellerLogin',
//                'username': userName,
                'email': email,
                'password': password,
                'time_zone_offset' : timezoneOffset,
//                'captcha' : captcha
            };
            // console.log(formData);
            $.ajax({
				type    : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url     : 'scripts/reqLogin.php', // the url where we want to POST
				data    : formData, // our data object
				dataType: 'text', // what type of data do we expect back from the server
				encode  : true
            })
            .done(function(data) {
                var obj = JSON.parse(data);
                hideCanvas();
                // console.log(obj);
				if(obj.status == "ok") {
                    $('#loginError').html('').css('display', 'none');
                    // var permissions = obj.data.permissions;

                    // if (!permissions) {
                    //     $('#loginError').html('<span>You have no permissions to login</span>').css('display', 'block');
                    // }
                    // else {
                        window.location.href = 'dashboard.php';
                        // $.each(permissions, function(key,value){
                        //     if (value['file_path']) {
                        //         window.location.href = value['file_path'];
                        //         return false;
                        //     }
                        // });
                    // }
				}
                else {
                    $('input#captcha').val("");
                    $("#captchaImage").attr("src", "captcha.php?" + Math.round(new Date().getTime() / 1000));
                    var message = 'Invalid credentials';
                    if (obj.statusMsg != '')
                        message = obj.statusMsg;
                    $('#loginError').html('<span>' + message + '</span>').css('display', 'block');
                }
            });
        }
    </script>
</html>
