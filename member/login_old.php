<?php
$login=false;
?>

<?php include 'include/config.php'; ?>
<?php include 'headLogin.php'; ?>


<body style="overflow-x: hidden;display: flex">
    <?php include 'partSignup.php'; ?>
    <?php include 'partLogin.php'; ?>
</body>

</html>
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
                    <div id="canvasAlertMessage" class="f-14">Please confirm your mobile number <b id="confirmMobile"></b>.</div>
                </div>
                <div class="modal-body text-center py-0">
                    <div id="canvasAlertIcon" class="">
                        <i class="la la-warning text-warning" style="font-size: 70px;"></i>
                    </div>
                    <div class="modal-title my-2" id="exampleModalLabel2" style="font-size:17px"><?php echo $translations["M01160"][$language]; /* Confirmation */ ?></div>
                    <div id="canvasAlertMessage2" class="f-14">Please confirm your email <b id="confirmEmail"></b>.</div>
                </div>
                <div id="canvasFooter" class="modal-footer text-center">
                    <a id="editBtn" class="btn btn btn m-btn--pill m-btn--air  btn-outline-secondary btn-sm m-btn m-btn--custom" style="color:#000;" data-dismiss="modal" role="button"><?php echo $translations["M01162"][$language]; /* Edit */ ?></a>
                    <a id="confirmBtn" class="btn btn btn m-btn--pill btn-outline-success btn-sm m-btn m-btn--custom theme-btn-green" style="color:#000;" data-dismiss="modal" role="button"><?php echo $translations["M01163"][$language]; /* Confirm */ ?></a>
                </div>
            </div>
        </div>
    </div>

<script src="<?php echo $sys['domain']?>/js/general.js"></script>
<script>

    var newurl;
    var type = "<?php echo $_GET['type']; ?>";
	var referral_code = "<?php echo $_GET['referral_code']?>";
	var reseller_username = "<?php echo $_GET['reseller_username']?>";
	
    var countryNumber = "<?php echo $_POST['countryNumber']; ?>";
    var phoneNumber = "<?php echo $_POST['phoneNumber']; ?>";
    var email = "<?php echo $_POST['email']; ?>";
    var countryCode     = "<?php echo $countryCode; ?>";
    var requestFundUserEmail = "<?php echo $_POST['payeeEmail']; ?>";
    var requestFundUserMobileNumber = "<?php echo $_POST['payeeMobileNumber']; ?>";
    var requestFundUserDialingArea = "<?php echo $_POST['payeeDialingArea']; ?>";
    var verifyPhoneNumber, verifyEmail;
    var countryCodeSet = 0;

    $(document).ready(function () {
        
        var url = '<?php echo $sys['domain']?>/scripts/reqTracking.php';
        var method = 'POST';
        var formData = {
            command     : "utm_tracking",
            
            
        };
        
        utmTracking('','','','SignUp track referral link',0);

        if (countryCodeSet == 0){
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
        }


        $('#username_S').val(phoneNumber.replace(/^0+/, ''));
        $('#email_S').val(email);

        if($("#username_S").val()==""){
            mode = "email";

				$('#emailDiv').show();
				$('#switchMobile').show();
				$('#mobileDiv').hide();
				$('#switchEmail').hide();
                $('#sliderText').text("Slide to get email code");
        }
        if($("#email_S").val()==""){
            mode = "mobile";

				$('#emailDiv').hide();
				$('#switchMobile').hide();
				$('#mobileDiv').show();
				$('#switchEmail').show();
                $('#sliderText').text("Slide to get SMS code");
        }

        if(mode == "mobile"){
            inputLinkModal($('#username_S').val(),'confirmMobile');
        }
        else if(mode == "email"){
            inputLinkModal($('#email_S').val(),'confirmEmail');
        }

        if (requestFundUserEmail != ''){ 
            $('#switchEmail2').trigger('click');
            $('input#email').val(requestFundUserEmail);
            mode = 'email';
        } 
        if (requestFundUserMobileNumber != ''){
            $('#switchMobile2').trigger('click');
            $('input#username').val(requestFundUserMobileNumber.replace(requestFundUserDialingArea,''));
            $('#countryCode2,#countryCode3').find('option').each(function(){
                if ($(this).attr("value") == requestFundUserDialingArea) {
                    countryCodeSet = 1;
                    $(this).parent().val(this.value).trigger('change');
                }
            });
            mode = 'mobile';
        }


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
            var url = '<?php echo $sys['domain']?>/scripts/reqLogin.php';
            var method = 'POST';
            var debug = 0;
            var bypassBlocking = 0;
            var bypassLoading = 0;

            var formData = {
                command     : "resendOtpPhone",
                mobile      : mobileNo,
                email       : $('input#email_S').val(),
                'mode'      : mode,
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

       if (type == "") {
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

       }

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
			if(reseller_username != ""){

				var method = 'POST';
				var debug = 0;
				var bypassBlocking = 0;
				var bypassLoading = 0;

				var formData = {
					command     : "getResellerDetails",
					username: reseller_username,
//					referral_code  : referral_code,
					type: "reseller"
				};
				fCallback = loadResellerDetails;
				ajaxSend('<?php echo $sys['domain']?>/scripts/reqLogin.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
			}

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
            $("#captchaImage").attr("src", "<?php echo $sys['domain']?>/captcha.php?" + Math.round(new Date().getTime() / 1000));
            $('input#captcha').val("");
        });

        $('button#pageLoginBtn').on("click", function (event) {
            showCanvas();
            $('#loginError').hide();
            $('#loginError').text();

            
            if(mode=="mobile" && $('input#username').val() == ""){
                $('#loginError').show();
                $('#loginError').text("Please enter your Mobile Number.");
                $('input#username').focus();
                hideCanvas();
            } else if(mode=="email" && $('input#email').val() == ""){
                $('#loginError').show();
                $('#loginError').text("Please enter your Email Address.");
                $('input#email').focus();
                hideCanvas();
            } else if($('input#password').val() ==""){
                $('#loginError').show();
                $('#loginError').text("<?php echo $translations["M00163"][$language]; /* Please enter your Password. */ ?>");
                $('input#password').focus();
                hideCanvas();
            }else if($('input#captcha').val() ==""){
                $('#loginError').show();
                $('#loginError').text("<?php echo $translations["M00164"][$language]; /* Please enter Security Code. */ ?>");
                $('input#password').focus();
                hideCanvas();
            } else {

                var loginPhoneNumber = "";
                if(mode=="mobile") {
                    loginPhoneNumber = $('#countryCode3').val() + $('input#username').val().replace(/^0+/, '');
                } else {
                    loginPhoneNumber = $('input#email').val()
                }
                
                var timezoneOffset = getOffsetSecs();
                var formData = {
                    'command': 'memberLogin',
                    'emailMobile': loginPhoneNumber,
                    'password': $('input#password').val(),
                    'time_zone' : timezone,
                    'time_zone_offset' : timezoneOffset,
                    'captcha' : $('input#captcha').val(),
                    'mode' : mode
                };
                var url = '<?php echo $sys['domain']?>/scripts/reqLogin.php';
                var method ='POST';

                utmTracking('',loginPhoneNumber,'','Login page');

                $.ajax({
                    type: method,
                    url: url,
                    data: formData,
                    dataType: 'text',
                    encode: true,

                    success: function(data){

                        if(!data || data=="null"){
                            showMessage('<?php echo $translations["M00165"][$language]; ?>', 'danger', '<?php echo $translations["M00166"][$language]; ?>', 'times-circle-o', '');
                            if(!bypassLoading){
                                hideCanvas();
                            }
                        }

                        var obj = JSON.parse(data);

                        if(obj.code == 1){
                            hideCanvas();
                            document.getElementById("pageLoginBtn").disabled = true;
                            // if(!obj.user.mobile) {
                            //     window.location.href = "signInLink.php";
                            // }
                            // else{
                            window.location.href = "<?php echo $sys['domain']?>/gettingStarted.php";
                            // }
                        }else{
                            hideCanvas();
                            $('input#captcha').val("");
                            $("#captchaImage").attr("src", "<?php echo $sys['domain']?>/captcha.php?" + Math.round(new Date().getTime() / 1000));


                            if (obj.error_code == "-103"){
                                $.redirect("signUpVerfifyPhone.php", { mobileNumber: loginPhoneNumber,fromPage : "login" } );
                            }else{
                                $('#loginError').show();
                                $('#loginError').text(obj.message_d);
                                // $.redirect("signUpVerfifyPhone.php", { mobileNumber: $('input#username').val() } );
                            }
                        }
                    },
                    error: function(xhr) {
                        if(debug)
                            console.log(xhr);
                        var message = xhr.status + ' ' + xhr.statusText;
                        showMessage('<?php echo $translations["M00167"][$language]; /* Error loading content. Please check your connection and try again. */ ?>', 'danger', '<?php echo $translations["M00168"][$language]; /* Failed */ ?>', 'times-circle-o', '');
                    },
                    complete: function() {

                        ajaxBlocking = 0;
                        if(!bypassLoading)
                            hideCanvas();
                    }
                });

                event.preventDefault();
            };

        });

        $('#signUpBtn').click(function(){

            businessName = $('input#signInBusinessName').val();

            username = $('#countryCode2').val() + $('input#username_S').val().replace(/^0+/, '');
            // var switchedMode;
            var verify_code = $('#linkCode').val();

            // if (mode == "mobile"){
            //         switchedMode = "mobile";
            //     } else if (mode =="email"){
            //         switchedMode = "email";
            //     }

            document.getElementById("signUpBtn").disabled = true;
            if (mode=="mobile" && $('input#username_S').val() == ''){
                hideCanvas();
                utmTracking(businessName,username,'','Normal Sign Up phoneNumber_empty',0);
                $('#signUpError').hide();
                $('#signUpError').show();
                $('html, body').animate({
                    scrollTop: $("#username_S").offset().top-200
                }, 500);
                $('#signUpError').text('Please fill in your mobile number.');
                $('input#username_S').focus();
                document.getElementById("signUpBtn").disabled = false;
            }

            else if (mode=="email" && $('input#email_S').val() == ''){
                hideCanvas();
                utmTracking(businessName,username,'','Normal Sign Up email_empty',0);
                $('#signUpError').hide();
                $('#signUpError').show();
                $('html, body').animate({
                    scrollTop: $("#email_S").offset().top-200
                }, 500);
                $('#signUpError').text('Please fill in your email.');
                $('input#email_S').focus();
                document.getElementById("signUpBtn").disabled = false;
            }

            else if (mode=="mobile" && verifyPhoneNumber != 1) {
                hideCanvas();
                utmTracking(businessName,username,'','Normal Sign Up code_empty',0);
                $('#signUpError').hide();
                $('#signUpError').show();
                $('html, body').animate({
                    scrollTop: $("#linkCode").offset().top-200
                }, 500);
                $('#signUpError').text('Please verify your mobile number.');
                $('input#linkCode').focus();
                document.getElementById("signUpBtn").disabled = false;
            }

            else if (mode=="email" && verifyEmail != 1) {
                hideCanvas();
                utmTracking(businessName,username,'','Normal Sign Up code_empty',0);
                $('#signUpError').hide();
                $('#signUpError').show();
                $('html, body').animate({
                    scrollTop: $("#linkCode").offset().top-200
                }, 500);
                $('#signUpError').text('Please verify your email.');
                $('input#linkCode').focus();
                document.getElementById("signUpBtn").disabled = false;
            }


            else if ($('#linkCode').val() == '') {
                hideCanvas();
                utmTracking(businessName,username,'','Normal Sign Up code_empty',0);
                $('#signUpError').hide();
                $('#signUpError').show();
                $('html, body').animate({
                    scrollTop: $("#linkCode").offset().top-200
                }, 500);
                $('#signUpError').text('Please fill in your verify code.');
                $('input#linkCode').focus();
                document.getElementById("signUpBtn").disabled = false;
            }

            else if($('input#signInBusinessName').val() == '') {
                hideCanvas();
                utmTracking(businessName,username,'','Normal Sign Up name_empty',0);
                $('#signUpError').hide();
                $('#signUpError').show();
                $('html, body').animate({
                    scrollTop: $("#password_S").offset().top-200
                }, 500);
                $('#signUpError').text('<?php echo $translations["M01159"][$language]; /* Please fill in your name. */ ?>');
                $('input#signInBusinessName').focus();
                document.getElementById("signUpBtn").disabled = false;
            }
            else if($('input#password_S').val() == '') {
                hideCanvas();
                utmTracking(businessName,username,'','Normal Sign Up password_empty',0);
                $('#signUpError').hide();
                $('#signUpError').show();
                $('html, body').animate({
                    scrollTop: $("#password_S").offset().top-200
                }, 500);
                $('#signUpError').text('<?php echo $translations["M01157"][$language]; /* Please fill in your password. */ ?>');
                $('input#password_S').focus();
                document.getElementById("signUpBtn").disabled = false;
            }
            else if($('input#password_S').val() != $('input#retypePassword').val()) {
                hideCanvas();
                utmTracking(businessName,username,'','Normal Sign Up password_notMatch',0);
                $('#signUpError').hide();
                $('#signUpError').show();
                $('html, body').animate({
                    scrollTop: $("#password_S").offset().top-200
                }, 500);
                $('#signUpError').text('<?php echo $translations["M01158"][$language]; /* The passwords you entered do not match. Please retype your password. */ ?>');
                $('input#retypePassword').focus();
                document.getElementById("signUpBtn").disabled = false;
            }
  
            else {
                showCanvas();
                var url     =   '<?php echo $sys['domain']?>/scripts/reqRegister.php';
                var formData        = {
                    command: 'memberRegister',
                    business_mobile: username,
                    business_email: $('input#email_S').val(),
                    'mode': mode,
                    business_password: $('input#password_S').val(),
                    business_retypePassword: $('input#retypePassword').val(),
                    business_name: $('input#signInBusinessName').val(),
                    verify_code : verify_code,
                    reseller_code: $('input#referralCode').val(),
                    
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


                        if(obj.code == 1){

                            hideCanvas();
                            // var access_token = obj.access_token;

                            utmTracking(businessName,username,'','Normal Sign Up ('+obj.message_d+')',0);
                            showMessage(obj.message_d, 'success', '<?php echo $translations["M01164"][$language]; /* Congratulations */ ?>', 'check-circle-o', '<?php echo $sys['domain']?>/gettingStarted.php')
                        }else{
                            document.getElementById("signUpBtn").disabled = false;
                            hideCanvas();
                            utmTracking(businessName,username,'','Normal Sign Up register ('+obj.message_d+')',0);
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

        if (mode=="mobile" && $('input#username_S').val() == ''){
            hideCanvas();
            $('#signUpError').hide();
            $('#signUpError').show();
            $('html, body').animate({
                scrollTop: $("#username_S").offset().top-200
            }, 500);
            $('#signUpError').text('Please fill in your mobile number.');
            $('input#username_S').focus();
            document.getElementById("signUpBtn").disabled = false;
        }
        else if (mode=="email" && $('input#email_S').val() == ''){
            hideCanvas();
            $('#signUpError').hide();
            $('#signUpError').show();
            $('html, body').animate({
                scrollTop: $("#email_S").offset().top-200
            }, 500);
            $('#signUpError').text('Please fill in your email.');
            $('input#email_S').focus();
            document.getElementById("signUpBtn").disabled = false;
        }
         else {

            var loginPhoneNumber = $('#countryCode2').val() + $('input#username_S').val().replace(/^0+/, '');

            var method  =   'POST';
            var debug   =   0;
            var bypassBlocking  = 0;
            var bypassLoading   = 0;

            var url     =   '<?php echo $sys['domain']?>/scripts/reqRegister.php';
            var formData        = {
                command: 'verifyPhone',
                phoneNumber: loginPhoneNumber,
                email: $('input#email_S').val(),
                'mode': mode,
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
                verifyEmail = 1;

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
			$('#referralCode').val(data.data.referral_code);
			$("#referralCode").attr("disabled", true);
		}
	}




</script>

</body>


</html>
