<?php
$login=false;
?>

<?php include 'include/config.php'; ?>
<?php include 'headLogin.php'; ?>


<body>
    <section class="resellerSignupPage">
        <div class="kt-container">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-12 col-xl-4 col-xl-4 mb-lg-5 mb-xl-0 text-center text-lg-left align-self-center">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="<?php echo $sys['loginLogo'];?>" class="resellerSignupPageLogo">
                            </div>
                            <div class="col-12 mt-3 mt-md-5 mt-lg-5 mt-xl-3 text-center">
                                <div class="row">
                                    <div class="resellerFormBox" style="padding-top: 20px;">
                                        <div class="col-12 pageTitle text-left">
                                            Create Reseller Account
                                        </div>
                                        <div class="resellerFormDivider">
                                        </div>
										
										<div class="col-12 form-group">
											<div class="row">
												<div class="col-12">
													<div id="signUpError" class="alert alert-danger" style="display: none;">
													</div>
												</div>
											</div>
										</div>
                                        <div class="col-12 form-group">
                                            <input id="name" placeholder="Name" type="text" class="form-control contactInput">
                                        </div>
<!--
                                        <div class="col-12 form-group">
                                            <input id="resellerUsername" placeholder="Username" type="text" class="form-control contactInput">
                                        </div>
-->
                                        <!-- <div class="col-12 form-group">
                                                <select id="country" class="form-control contactInput">
                                                    <?php include 'phoneList.php'; ?>
                                                </select>
                                        </div> -->
                                        <div class="col-12 form-group" style="display: flex;">
                                            <div class="countryContactBox">
                                                <select id="countryCode2" class="form-control contactInput">
                                                    <?php include 'phoneList.php'; ?>
                                                </select>
                                            </div>
                                            <input id="username_S" placeholder="Mobile" type="text" class="form-control contactInput" onchange="inputLinkModal(this.value,'confirmEmail');">
                                        </div>
                                        <div class="col-12 form-group">
                                            <input id="email" placeholder="Email" type="email" class="form-control contactInput">
                                        </div>
<!--
                                        <div class="col-12 form-group">
                                            <input id="teamCode" placeholder="Promotion Code" type="text" class="form-control contactInput">
                                        </div>
-->
                                        <div class="col-12 mt-1 form-group">
                                            <button id="signUpBtn" type="button" class="btn primaryBtn">Sign Up</button>
                                        </div>
                                        <!-- <div class="resellerFormDivider" style="margin-top: 10px">
                                        </div>
                                        <div class="col-12">
                                            Already have an account? <a href="resellerLogin.php" style="color: #51C2DB;">Login.</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-6 offset-xl-1 align-self-center mt-5 mt-xl-0">
                        <div class="row">
                            <div class="col-12 resellerSignupText01">
                                BUILD YOUR OWN RESELLER NETWORK HASSLE-FREE
                            </div>
                            <div class="col-12 resellerSignupText02 mt-4">
                                One reseller link for everything   
                            </div>
                            <div class="col-12 resellerSignupText03 mt-4">
                                Get Commission from every transaction made by your merchant as their payment volumes grow 
                            </div>
                            <div class="col-12 mt-5">
                                <div class="row align-items-top align-items-md-center">
                                    <div class="col-1">
                                        <img src="images/nuxPay/resellerSignupIcon1.png" class="resellerSignupIcon">
                                    </div>
                                    <div class="col resellerSignupText04">
                                        <span>Generate Link</span> - That earns you passive income from every solution that our company provides.
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-5">
                                <div class="row align-items-top align-items-md-center">
                                    <div class="col-1">
                                        <img src="images/nuxPay/resellerSignupIcon2.png" class="resellerSignupIcon">
                                    </div>
                                    <div class="col resellerSignupText04">
                                        <span>Use referral management dashboard</span> - To monitor your merchant activity, keep track of the performance and accumulated income.
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-5">
                                <div class="row align-items-top align-items-md-center">
                                    <div class="col-1">
                                        <img src="images/nuxPay/resellerSignupIcon3.png" class="resellerSignupIcon">
                                    </div>
                                    <div class="col resellerSignupText04">
                                        <span>Receive Payouts</span> - On-demand and straight to a wallet of your choice.
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

</html>
<?php include 'footerHomepage.php';?>
<?php include 'sharejsDashboard.php'; ?>

<div class="modal fade systemMsg" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header text-center pb-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center py-0">
                    <div id="canvasAlertIcon" class="">
                        <i class="la la-warning text-warning" style="font-size: 70px;"></i>
                    </div>
                    <div class="modal-title my-2" id="exampleModalLabel" style="font-size:17px"><?php echo $translations["M01160"][$language]; /* Confirmation */ ?></div>
                    <div id="canvasAlertMessage" class="f-14">Please confirm your mobile number <b id="confirmEmail"></b>.</div>
                </div>
                <div id="canvasFooter" class="modal-footer text-center">
                    <a id="editBtn" class="btn btn btn m-btn--pill m-btn--air  btn-outline-secondary btn-sm m-btn m-btn--custom" style="color:#000;" data-dismiss="modal" role="button"><?php echo $translations["M01162"][$language]; /* Edit */ ?></a>
                    <a id="confirmBtn" class="btn btn btn m-btn--pill btn-outline-success btn-sm m-btn m-btn--custom theme-btn-green" style="color:#000;" data-dismiss="modal" role="button"><?php echo $translations["M01163"][$language]; /* Confirm */ ?></a>
                </div>
            </div>
        </div>
    </div>

<script src="js/general.js"></script>
<script>

    var newurl;
    var type = "<?php echo $_GET['type']; ?>";
	var referral_code = "<?php echo $_GET['referral_code']; ?>";
	var distributor_username = "<?php echo $_GET['agent']; ?>";
	var code = "<?php echo $_GET['code']; ?>";
	
    var countryNumber = "<?php echo $_POST['countryNumber']; ?>";
    var phoneNumber = "<?php echo $_POST['phoneNumber']; ?>";
    var countryCode     = "<?php echo $countryCode; ?>";
    var verifyPhoneNumber;

    $(document).ready(function () {
		
		$('#resellerUsername').on('keypress', function(e) {
            if (e.which == 32){
                console.log('Space Detected');
                return false;
            }
        });
		
//		if(distributor_username != ""){
			
			
			var method = 'POST';
			var debug = 0;
			var bypassBlocking = 0;
			var bypassLoading = 0;

			var formData = {
				command     : "getResellerDetails",
//				referral_code      : referral_code,
				promo_code: code,
				type: "distributor"
			};
			fCallback = loadResellerDetails;
			ajaxSend('scripts/reqLogin.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
//		}

        if (countryNumber != "") {
            $('#countryCode2').val(countryNumber);
        } else {
            $('#countryCode2,#countryCode3').find('option').each(function(){

                if (countryCode && countryCode != "ZZ") {
                    if ($(this).attr("data-countrycode") == countryCode) {
                        $(this).parent().val(this.value).trigger('change');
                    }
                }else{
                    if ($(this).attr("data-countrycode") == "US") {
                        $(this).parent().val(this.value).trigger('change');
                    }
                }

            });
        }

        $('#username_S').val(phoneNumber.replace(/^0+/, ''));


        inputLinkModal($('#username_S').val(),'confirmEmail');


        function format(val) {
            return val.id;
        }

         $('#countryCode2').select2({
            dropdownAutoWidth : true,
            templateSelection: format,
            width: 80
        });

          $('#countryCode3').select2({
            dropdownAutoWidth : true,
            templateSelection: format,
            width: 80
        });



          $('#resendBtn').click(function() {
            var mobileNo = $('#countryCode2').val() + $('input#username_S').val().replace(/^0+/, '');
            var url = 'scripts/reqLogin.php';
            var method = 'POST';
            var debug = 0;
            var bypassBlocking = 0;
            var bypassLoading = 0;

            var formData = {
                command     : "resendOtpPhone",
                mobile      : mobileNo
            };
            fCallback = registerPhoneMsg;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });


        $('#username_S,#username').on('input', function (event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        $('#signupHere').click(function() {
            $('#partLoginOpen').trigger('click');
        });


        $('#loginHere').click(function() {
            $('#partSignupOpen').trigger('click');
        });

//       if (type == "") {
//            $('#partLogin').addClass('open');
//            $('#partSignup').removeClass('open');
//            $('#partSignup').removeClass('open2');
//            var windowHeight = window.innerHeight;
//            if (windowHeight <= 600) {
//                 $('.nuxPayLoginHeight2').addClass('lowerHeight');
//            }
//            var getUrl = "loginPage";
//            newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + "?type=" + getUrl;
//            window.history.pushState({ path: newurl }, '', newurl);
//
//       }

        $('#partSignupOpen').click(function (){
            $('#partLogin').addClass('open');
            $('#partSignup').removeClass('open');
            $('#partSignup').removeClass('open2');
            var windowHeight = window.innerHeight;
            if (windowHeight <= 600) {
                 $('.nuxPayLoginHeight2').addClass('lowerHeight');
            }

            var getUrl = "loginPage";
            newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + "?type=" + getUrl;
            window.history.pushState({ path: newurl }, '', newurl);
        });

        $('#partLoginOpen').click(function (){

            $('#partLogin').removeClass('open');
            $('#partLogin').removeClass('open2');
            $('#partSignup').addClass('open');

            var windowHeight = window.innerHeight;
            if (windowHeight <= 500) {
                 $('.nuxPayLoginHeight').addClass('lowerHeight');
            }

            var getUrl = "signupPage";
            newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + "?type=" + getUrl;
            window.history.pushState({ path: newurl }, '', newurl);
        });


        if (type == "loginPage") {
             var windowHeight = window.innerHeight;
            if (windowHeight <= 600) {
                 $('.nuxPayLoginHeight2').addClass('lowerHeight');
            }

            $('#partLogin').addClass('open2');

        } else if (type == "signupPage") {
            var windowHeight = window.innerHeight;
            if (windowHeight <= 500) {
                 $('.nuxPayLoginHeight').addClass('lowerHeight');
            }

            $('#partSignup').addClass('open2');

        }else{

            $('#partLogin').addClass('open2');

        }


        var debug ='0';
        var bypassBlocking = '0';
        var bypassLoading   = 0;
        var timezone = moment.tz.guess();

        $('body').keypress(function(e){
            if(e.which == 13){

              var type = location.search.split('type=')[1]
            //   console.log(type);
                if (type=="loginPage") {
                  $('#pageLoginBtn').click();
                }

                if (type=="signupPage")
                {
                    if ($('#canvasMessage').hasClass('show')) {
                        $('#canvasCloseBtn').click();//Trigger enter button click event
                    }else if ($('#confirmationModal').hasClass('show')) {
                        $('#confirmBtn').click();//Trigger enter button click event
                    }else{
                        $('#signUpBtn').click();//Trigger enter button click event
                    }
                }

            }
        });

        $('i.fa-refresh').click(function(event) {
            $("#captchaImage").attr("src", "captcha.php?" + Math.round(new Date().getTime() / 1000));
            $('input#captcha').val("");
        });

        $('#signUpBtn').click(function(){

            var username = $('input#resellerUsername').val();
			var name = $('input#name').val();
			


            document.getElementById("signUpBtn").disabled = true;
            if ($('input#username_S').val() == ''){
                hideCanvas();
                utmTracking(name,username,'','Normal Sign Up phoneNumber_empty',0);
                $('#signUpError').hide();
                $('#signUpError').show();
                $('html, body').animate({
                    scrollTop: $("#username_S").offset().top-200
                }, 500);
                $('#signUpError').text('Please fill in your mobile number.');
                $('input#username_S').focus();
                document.getElementById("signUpBtn").disabled = false;
            }

            else if ($('#email').val() == '') {
                hideCanvas();
                utmTracking(name,username,'','Normal Sign Up code_empty',0);
                $('#signUpError').hide();
                $('#signUpError').show();
                $('html, body').animate({
                    scrollTop: $("#email").offset().top-200
                }, 500);
                $('#signUpError').text('Please fill in your email.');
                $('input#linkCode').focus();
                document.getElementById("signUpBtn").disabled = false;
            }
//			 else if ($('#resellerUsername').val() == '') {
//                hideCanvas();
//                utmTracking(name,username,'','Normal Sign Up code_empty',0);
//                $('#signUpError').hide();
//                $('#signUpError').show();
//                $('html, body').animate({
//                    scrollTop: $("#resellerUsername").offset().top-200
//                }, 500);
//                $('#signUpError').text('Please fill in your email.');
//                $('input#linkCode').focus();
//                document.getElementById("signUpBtn").disabled = false;
//            }

            else if($('input#name').val() == '') {
                hideCanvas();
                utmTracking(name,username,'','Normal Sign Up name_empty',0);
                $('#signUpError').hide();
                $('#signUpError').show();
                $('html, body').animate({
                    scrollTop: $("#name").offset().top-200
                }, 500);
                $('#signUpError').text('<?php echo $translations["M01159"][$language]; /* Please fill in your name. */ ?>');
                $('input#signInBusinessName').focus();
                document.getElementById("signUpBtn").disabled = false;
            }
            
            else {
                showCanvas();
                var url     =   'scripts/reqRegister.php';
                var formData        = {
                    command: 'resellerRegister',
                    //username: username,
                    username: $('#name').val(),
                    nickname: $('#name').val(),
                    email: $('#email').val(),
                    team_code: $('#teamCode').val(),
                    phone_number : $('#countryCode2').val() + $('input#username_S').val().replace(/^0+/, ''),
                    distributor_username : '<?php echo $_GET['agent']; ?>',
                };

                var method  =   'POST';
                var debug   =   0;
                var bypassBlocking  = 0;
                var bypassLoading   = 0;


                $.ajax({
                         type: method, // define the type of HTTP verb we want to use (POST for our form)
                         url: url, // the url where we want to POST
                         data: formData, // our data object
                         dataType: 'text', // what type of data do we expect back from the server
                         encode: true
                        })
                        .done(function(data) {

                          var obj = JSON.parse(data);
						  console.log('obj');
						  console.log(obj);


                        if(obj.code == 1){

                            hideCanvas();
                            // var access_token = obj.access_token;

                            // Get the current URL parameters as a string
                            const urlParams = window.location.search;

                            utmTracking(name,username,'','Normal Sign Up ('+obj.message_d+')',0);
                            showMessage(obj.message_d, 'success', '<?php echo $translations["M01164"][$language]; /* Congratulations */ ?>', 'check-circle-o', 'resellerSignup.php' + urlParams)
                        }else{
                            document.getElementById("signUpBtn").disabled = false;
                            hideCanvas();
                            utmTracking(name,username,'','Normal Sign Up register ('+obj.message_d+')',0);
                            if (obj.error_message) {
                                var error_message="";
                                $.each(obj.error_message, function(k, v) {
                                    error_message+=v+"<br>";
                                });
                                showMessage(obj.message_d+"<br><?php echo $translations["M01165"][$language]; ?><br>"+error_message, 'warning', obj.message, 'warning', '')
                            }else{
                                showMessage(obj.message_d, 'warning', obj.message, 'warning', '')
                            }


                        }
                    });
            }

        });



});

function inputLinkModal(value,linkID) {
    var countryCode = $('#countryCode2').val();
    value = value.replace(/^0+/, '');
    $('#'+linkID).text(countryCode+value);
}


var initialMouse = 0;
var slideMovementTotal = 0;
var mouseIsDown = false;
var slider = $('#slider');

slider.on('mousedown touchstart', function(event){
    mouseIsDown = true;
    slideMovementTotal = $('#button-background').width() - $(this).width() + 10;
    initialMouse = event.clientX || event.originalEvent.touches[0].pageX;
});


$(document.body, '#slider').on('mouseup touchend', function (event) {
    if (!mouseIsDown)
        return;
    mouseIsDown = false;
    var currentMouse = event.clientX || event.changedTouches[0].pageX;
    var relativeMouse = currentMouse - initialMouse;

    if (relativeMouse < slideMovementTotal) {
        $('.slide-text').fadeTo(300, 1);
        slider.animate({
            left: "-10px"
        }, 300);

        return;
    } else {
        showCanvas();
         $('.slide-text').fadeTo(300, 1);
        slider.animate({
            left: "-10px"
        }, 300);

        if ($('input#username_S').val() == ''){
            hideCanvas();
            $('#signUpError').hide();
            $('#signUpError').show();
            $('html, body').animate({
                scrollTop: $("#username_S").offset().top-200
            }, 500);
            $('#signUpError').text('Please fill in your mobile number.');
            $('input#username_S').focus();
            document.getElementById("signUpBtn").disabled = false;
        } else {

            var loginPhoneNumber = $('#countryCode2').val() + $('input#username_S').val().replace(/^0+/, '');

            var method  =   'POST';
            var debug   =   0;
            var bypassBlocking  = 0;
            var bypassLoading   = 0;

            var url     =   'scripts/reqRegister.php';
            var formData        = {
                command: 'verifyPhone',
                phoneNumber: loginPhoneNumber
            };

            $.ajax({
                type: method,
                url: url,
                data: formData,
                dataType: 'text',
                encode: true
            })
            .done(function(data) {

                var obj = JSON.parse(data);


                if(obj.code == 1){
                    hideCanvas();
                    showMessage(obj.message_d, 'success', '<?php echo $translations["M01164"][$language]; /* Congratulations */ ?>', 'check-circle-o', '')

                    $('#username_S').prop( "disabled", true );
                    $('#countryCode2').prop( "disabled", true );
                    $('#sliderButton').fadeOut();
                    $('#sendPhoneCode').fadeIn();


                    var countDownDate = obj.timeout;

                    document.getElementById("timer").innerHTML = countDownDate;
                    startTimer();

                    function startTimer() {
                        $('#timerDiv').show();
                        $('#timer').show();
                        $('#resendBtn').hide();

                        var presentTime = document.getElementById('timer').innerHTML;

                        var s = checkSecond((presentTime - 1));

                        if(s <= "00"){

                            $('#timerDiv').hide();
                            $('#timer').hide();
                            $('#resendBtn').show();

                        }
                        else {
                            document.getElementById('timer').innerHTML = s;
                            setTimeout(startTimer, 1000);
                        }
                    }

                    function checkSecond(sec) {
                    if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
                    if (sec < 0) {sec = "59"};
                    return sec;
                }
                $('#signUpError').hide();
                verifyPhoneNumber = 1;

                }else{
                    hideCanvas();
                    if (obj.error_message) {
                        var error_message="";
                        $.each(obj.error_message, function(k, v) {
                            error_message+=v+"<br>";
                        });
                        showMessage(obj.message_d+"<br><?php echo $translations["M01165"][$language]; ?><br>"+error_message, 'warning', obj.message, 'warning', '')
                    }else{
                        showMessage(obj.message_d, 'warning', obj.message, 'warning', '')
                    }


                }


            });

            return;
        }
    }

    // slider.addClass('unlocked');


    setTimeout(function(){
        slider.on('click tap', function(event){
            if (!slider.hasClass('unlocked'))
                return;
            slider.removeClass('unlocked');
            slider.off('click tap');
        });
    }, 0);
});

$(document.body).on('mousemove touchmove', function(event){
    if (!mouseIsDown)
        return;

    var currentMouse = event.clientX || event.originalEvent.touches[0].pageX;
    var relativeMouse = currentMouse - initialMouse;
    var slidePercent = 1 - (relativeMouse / slideMovementTotal);

    $('.slide-text').fadeTo(0, slidePercent);

    if (relativeMouse <= 0) {
        slider.css({'left': '-10px'});
        return;
    }
    if (relativeMouse >= slideMovementTotal + 10) {
        slider.css({'left': slideMovementTotal + 'px'});
        return;
    }
    slider.css({'left': relativeMouse - 10});
});



function registerPhoneMsg(data, message) {
    $('#signUpError').hide();
    var countDownDate = data.timeout;

    document.getElementById("timer").innerHTML = countDownDate;
    startTimer();

    function startTimer() {
        $('#timerDiv').show();
        $('#timer').show();
        $('#resendBtn').hide();

        var presentTime = document.getElementById('timer').innerHTML;

        var s = checkSecond((presentTime - 1));

        if(s <= "00"){

            $('#timerDiv').hide();
            $('#timer').hide();
            $('#resendBtn').show();

        }
        else {
            document.getElementById('timer').innerHTML = s;
            setTimeout(startTimer, 1000);
        }
    }

    function checkSecond(sec) {
    if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
    if (sec < 0) {sec = "59"};
    return sec;
}
}
	
function loadResellerDetails(data, message){
	if(data.data.referral_code != ""){
		
		$('#teamCode').val(data.data.referral_code);
		$("#teamCode").attr("disabled", true);
	}
}




</script>

</body>


</html>
