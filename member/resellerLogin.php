<?php
$login=false;
?>

<?php include 'include/config.php'; ?>
<?php include 'headLogin.php'; ?>


<body>
    <section class="resellerLoginPage">
        <div class="kt-container">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-7 col-lg-7 col-xl-4 ml-0 ml-md-4">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="images/nuxPay/resellerPageLogo.png" class="resellerPageLogo">
                            </div>
                            <div class="col-12 mt-3 mt-md-5 mt-lg-5 mt-xl-3 text-center">
                                <div class="row">
                                    <div class="resellerFormBox">
                                        <div class="col-12 pageTitle text-left">
                                            Reseller Account Login
                                        </div>
                                        <div class="resellerFormDivider">
                                        </div>
                                        <div class="col-12 form-group">
                                            <input id="resellerUsername" placeholder="Username" type="text" class="form-control contactInput">
                                        </div>
                                        <div class="col-12 form-group">
                                            <input id="password" placeholder="Password" type="text" class="form-control contactInput">
                                        </div>
                                        <div class="col-12 mt-5 form-group">
                                            <button id="pageLoginBtn" type="button" class="btn primaryBtn mb-4">Login</button>
                                        </div>
                                        <div class="resellerFormDivider" style="margin-top: 50px">
                                        </div>
                                        <div class="col-12">
                                            Don't have a reseller account? <a href="resellerSignup.php" style="color: #51C2DB;">Sign Up!</a>
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

    var countryNumber = "<?php echo $_POST['countryNumber']; ?>";
    var phoneNumber = "<?php echo $_POST['phoneNumber']; ?>";
    var countryCode     = "<?php echo $countryCode; ?>";
    var verifyPhoneNumber;

    $(document).ready(function () {

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

        $('button#pageLoginBtn').on("click", function (event) {
            showCanvas();
            $('#loginError').hide();
            $('#loginError').text();

            if($('input#username').val() == ""){
                $('#loginError').show();
                $('#loginError').text("Please enter your Phone Number.");
                $('input#username').focus();
                hideCanvas();
            }

            else if($('input#password').val() ==""){
                $('#loginError').show();
                $('#loginError').text("<?php echo $translations["M00163"][$language]; /* Please enter your Password. */ ?>");
                $('input#password').focus();
                hideCanvas();
            }else if($('input#captcha').val() ==""){
                $('#loginError').show();
                $('#loginError').text("<?php echo $translations["M00164"][$language]; /* Please enter Security Code. */ ?>");
                $('input#password').focus();
                hideCanvas();
            }

            else {
                var loginPhoneNumber = $('#countryCode3').val() + $('input#username').val().replace(/^0+/, '');

                // console.log(loginPhoneNumber);
                var timezoneOffset = getOffsetSecs();
                var formData = {
                    'command': 'memberLogin',
                    'username': loginPhoneNumber,
                    'password': $('input#password').val(),
                    'time_zone' : timezone,
                    'time_zone_offset' : timezoneOffset,
                    'captcha' : $('input#captcha').val()
                };
                var url = 'scripts/reqLogin.php';
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
                            if(!obj.user.mobile) {
                                window.location.href = "signInLink.php";
                            }
                            else{
                                window.location.href = "gettingStarted.php";
                            }
                        }else{
                            hideCanvas();
                            $('input#captcha').val("");
                            $("#captchaImage").attr("src", "captcha.php?" + Math.round(new Date().getTime() / 1000));


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

            var verify_code = $('#linkCode').val();

            document.getElementById("signUpBtn").disabled = true;
            if ($('input#username_S').val() == ''){
                hideCanvas();
                utmTracking(businessName,username,'','Normal Sign Up phoneNumber_empty',0);
                $('#signUpError').hide();
                $('#signUpError').show();
                $('html, body').animate({
                    scrollTop: $("#username_S").offset().top-200
                }, 500);
                $('#signUpError').text('Please fill in your phone number.');
                $('input#username_S').focus();
                document.getElementById("signUpBtn").disabled = false;
            }

            else if (verifyPhoneNumber != 1) {
                hideCanvas();
                utmTracking(businessName,username,'','Normal Sign Up code_empty',0);
                $('#signUpError').hide();
                $('#signUpError').show();
                $('html, body').animate({
                    scrollTop: $("#linkCode").offset().top-200
                }, 500);
                $('#signUpError').text('Please verify your phone number.');
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
                var url     =   'scripts/reqRegister.php';
                var formData        = {
                    command: 'memberRegister',
                    business_email: username,
                    business_password: $('input#password_S').val(),
                    business_retypePassword: $('input#retypePassword').val(),
                    business_name: $('input#signInBusinessName').val(),
                    verify_code : verify_code,
                    reseller: $('input#resellerUsername').val()
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
                            showMessage(obj.message_d, 'success', '<?php echo $translations["M01164"][$language]; /* Congratulations */ ?>', 'check-circle-o', 'gettingStarted.php')
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

        if ($('input#username_S').val() == ''){
            hideCanvas();
            $('#signUpError').hide();
            $('#signUpError').show();
            $('html, body').animate({
                scrollTop: $("#username_S").offset().top-200
            }, 500);
            $('#signUpError').text('Please fill in your phone number.');
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




</script>

</body>


</html>
