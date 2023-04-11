<?php include 'include/config.php'; ?>
<?php include 'headLogin.php'; ?>


<body>
    <div class="memberLandingPage">
        <section class="memberLandingPageSection1">
            <div class="kt-container">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="homepage.php" data-name="Homepage">
                                <img alt="Logo" src="<?php echo $sys['domain']?>/images/thenuxblacklogo_small.png" class="memberLandingPageLogo">
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="row justify-content-center">
                                <a class="memberLandingPageAnchor" href="#signupDiv">Sign Up</a>
                                <a class="memberLandingPageAnchor" href="#contactUsDiv" id="contactUsBtn">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center memberLandingPageSection1Title" id="title">
                    Your Title Here
                </div>
                <div class="col-12 text-center memberLandingPageSection1Subtitle" id="subtitle">
                    Your Subtitle Here
                </div>
                <div class="col-12 text-center memberLandingPageSection1Content" id="description">
                    Nuxpay has been proudly providing high quality products and services to the San Francisco area since 2000. What differentiates us from other businesses is our ability to truly connect with our customers, and provide the exceptional, compassionate service they deserve. To learn more, simply browse through our site.
                </div>
                <div class="col-12 px-0 memberLandingPageSection1Image">
                    <img src="<?php echo $sys['domain']?>/images/nuxPay/memberLandingPageSection1Image.png" id="image">
                </div>
            </div>
        </section>

        <section class="memberLandingPageSection2" id="signupDiv">
            <div class="kt-container">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 text-center memberLandingPageSection2Title">
                            Sign Up Now!
                        </div>
                        <div class="col-10 offset-1 col-md-6 offset-md-3 text-center memberLandingPageSection2Content">
                            <div class="col-12 text-center nuxPayLoginFormMargin2">
                                <div class="row">
                                    
                                    <div class="col-12 form-group">
                                        <div class="row">
                                            <div class="col-12">
                                                <div id="signUpError" class="alert alert-danger" style="display: none;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 form-group" style="display: flex;" id="mobileDiv">
                                        <div class="countryContactBox">
                                            <select id="countryCode2" class="form-control contactInput">
                                                <?php include 'phoneList.php'; ?>
                                            </select>
                                        </div>
                                        <input id="username_S" placeholder="Mobile Number" type="text" class="form-control contactInput" onchange="inputLinkModal(this.value,'confirmMobile');">
                                        <i class="fa fa-question-circle-o nuxPayBtnSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="Example: 14081111111"></i>
                                        
                                    </div>
                                    
                                    <div class="col-12 form-group" id="emailDiv" style="display: flex;">
                                        <input id="email_S" placeholder="Email" type="text" class="form-control contactInput" onchange="inputLinkModal(this.value,'confirmEmail');">
                                        <i class="fa fa-question-circle-o nuxPayBtnSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="Example: abc@gmail.com"></i>
                                    </div>

                                    

                                    <div id="sliderButton" class="col-12 form-group nuxPaySignUpFormPadding">
                                        <div id="button-background">
                                            <span id="sliderText" class="slide-text">Slide to get SMS Code</span>
                                            <div id="slider">
                                                <i id="locker" class="fa fa-arrow-right material-icons"></i>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div id="sendPhoneCode" class="col-12 nuxPaySignUpFormPadding" style="display: none;">
                                        <div class="row">

                                            <div class="col-7 form-group pr-0">
                                                <input id="linkCode" name="linkCode" class="form-control m-input m-login__form-input--last contactInput" placeholder="<?php echo $translations["M00450"][$language]; //5 Digit Code?>" maxlength="5" type="text" onkeypress="return isNumberKey(event);">
                                            </div>

                                            <div class="col-5 text-center">
                                                <div id="timerDiv" class="col-md-4 text-center linkCode2" style="margin-top: 10px;">
                                                    <div id="linkCode2" name="linkCode2" class="" placeholder="" disabled>
                                                        <span id="timer" name="timer" style="text-align: center;"></span>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn primaryBtn" id="resendBtn" style="display: none;"><?php echo $translations["M00451"][$language]; //Resend ?></button>
                                            </div>


                                        </div>
                                    </div>
                                    <div id="switchMobile" class= "col-12 form-group" style="display:flex; text-decoration: underline;">
                                        <a href="#">Switch to Mobile Number</a>
                                    </div>

                                    <div id="switchEmail" class= "col-12 form-group" style="display:flex; text-decoration: underline;">
                                        <a href="#">Switch to Email</a>
                                    </div>
                                    
                                    

                                    <div class="col-12 form-group" style="display: flex;">
                                        <input id="signInBusinessName" placeholder="Business Name" type="text" class="form-control contactInput">
                                        <i class="fa fa-question-circle-o nuxPayBtnSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="Max 25 Character"></i>
                                    </div>

                                    <div class="col-12 form-group" style="display: flex">
                                        <input id="password_S" placeholder="Password" type="password" class="form-control contactInput">
                                        <i class="fa fa-question-circle-o nuxPayBtnSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="Min 4 characters"></i>
                                    </div>

                                    <div class="col-12 form-group nuxPaySignUpFormPadding">
                                        <input id="retypePassword" placeholder="Re-type Password" type="password" class="form-control contactInput">
                                    </div>
                                    <div class="col-12 form-group nuxPaySignUpFormPadding">
                                        <button id="signUpBtn" type="button" class="btn primaryBtn">SIGN UP</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="memberLandingPageSection3" id="contactUsDiv">
            <div class="kt-container">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 text-center memberLandingPageSection3Title">
                            Contact Us
                        </div>
                        <div class="memberLandingPageSection3Content" id="contactUsEmailDiv">
                            <div class="row justify-content-center" >
                                <div class="">
                                    <i class="fa fa-envelope"></i> Email
                                </div>
                                <div class=""id ="email">
                                    : wayne@gmail.com
                                </div>
                            </div>
                        </div>
                        <div class="memberLandingPageSection3Content"  id="contactUsPhoneDiv">
                            <div class="row justify-content-center">
                                <div class="">
                                    <i class="fa fa-phone"></i> Phone
                                </div>
                                <div class="" id="phoneNo">
                                    : +6012-3456789
                                </div>
                            </div>
                        </div>
                        <div class="memberLandingPageSection3Content" id="contactUsWhatsappDiv">
                            <div class="row justify-content-center" >
                                <div class="">
                                    <i class="fa fa-whatsapp"></i> Whatsapp
                                </div>
                                <div class="" id="whatsapp">
                                    : +6012-3456789
                                </div>
                            </div>
                        </div>
                        <div class="memberLandingPageSection3Content" id="contactUsTelegramDiv">
                            <div class="row justify-content-center" >
                                <div class="">
                                    <i class="fa fa-telegram"></i> Telegram
                                </div>
                                <div class="" id="telegram">
                                    : @wayne
                                </div>
                            </div>
                        </div>
						<div class="memberLandingPageSection3Content" id="contactUsInstagramDiv">
                            <div class="row justify-content-center" >
                                <div class="">
                                    <i class="fa fa-instagram"></i> Instagram
                                </div>
                                <div class="" id="instagram">
                                    : @wayne
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="memberLandingPageFooter">
            ©2020 · <?php echo $sys['companyName']?> · All Rights Reserved
        </section>
    </div>
</body>
</html>
<?php include 'sharejsDashboard.php'; ?>

<script src="<?php echo $sys['domain']?>/js/general.js"></script>
<script>

	var mode = "mobile";
    var shortCode = "<?php echo $_GET['shortCode']; ?>";
    var userName = "<?php echo $_GET['username']; ?>";
    var countryCode     = "<?php echo $countryCode; ?>";
    var countryNumber = "<?php echo $_POST['countryNumber']; ?>";
    var countryCodeSet = 0;

    var fCallBack = "";
    var pageNumber = 1;
    var referralCode;

	$(document).ready(function() {
            getLandingPageDetails();

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

            $('#emailDiv').hide();
			$('#switchMobile').hide();

			$('#switchEmail').click(function (e) {
				mode = "email";
				$('#mobileDiv').hide();
				$('#switchEmail').hide();
				$('#emailDiv').show();
				$('#switchMobile').show();
				$('#username_S').val("");
				e.preventDefault();
				$('#sliderText').text("Slide to get email code");
			});

			$('#switchMobile').click(function (e) {
				mode = "mobile";
				$('#mobileDiv').show();
				$('#switchEmail').show();
				$('#emailDiv').hide();
				$('#switchMobile').hide();
				$('#email_S').val("");
				e.preventDefault();
				$('#sliderText').text("Slide to get SMS code");
			});


        function format(val) {
        return val.id;
        }

         $('#countryCode2').select2({
            dropdownAutoWidth : true,
            templateSelection: format,
            width: 80
        });

        $('#resendBtn').click(function() {
            var mobileNo = $('#countryCode2').val() + $('input#username_S').val().replace(/^0+/, '');
            var url = '<?php echo $sys['domain'] ?>/scripts/reqLogin.php';
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
                $('#signUpError').text('Please fill in your phone number.');
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
                $('#signUpError').text('Please verify your phone number.');
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
                var url     =   '<?php echo $sys['domain'] ?>/scripts/reqRegister.php';
                var formData        = {
                    command: 'memberRegister',
                    business_mobile: username,
                    business_email: $('input#email_S').val(),
                    'mode': mode,
                    business_password: $('input#password_S').val(),
                    business_retypePassword: $('input#retypePassword').val(),
                    business_name: $('input#signInBusinessName').val(),
                    verify_code : verify_code,
                    reseller_code: referralCode,
                    
                };

                var method  =   'POST';
                var debug   =   0;
                var bypassBlocking  = 0;
                var bypassLoading   = 0;
                // console.log("formdata:");
                // console.log(formData);
                $.ajax({
                        type: method, // define the type of HTTP verb we want to use (POST for our form)
                        url: url, // the url where we want to POST
                        data: formData, // our data object
                        dataType: 'text', // what type of data do we expect back from the server
                        encode: true,
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

    //End of doc.ready

    function getLandingPageDetails(pageNumber, fCallback){
        var url = '<?php echo $sys['domain'] ?>/scripts/reqLanding.php';
        var method = 'POST';
        var debug = 0;
        var bypassBlocking = 0;
        var bypassLoading = 0;

        var formData = {
            command     : "webpaylandingpagedetailsget",
            short_code      : shortCode,
            username    : userName
        };

        $.ajax({
                type: method, // define the type of HTTP verb we want to use (POST for our form)
                url: url, // the url where we want to POST
                data: formData, // our data object
                dataType: 'text', // what type of data do we expect back from the server
                encode: true,
                
                })
                .done(function(data) {
                    // console.log(data);
                var obj = JSON.parse(data);


                if(obj.code == 0){
                    // console.log(obj);
                    var landingPageDetails = obj.data;
                    // console.log(landingPageDetails.title);
                    $('#title').text(landingPageDetails.title);
                    $('#subtitle').text(landingPageDetails.subtitle);
                    $('#description').text(landingPageDetails.description);
                    $('#image').attr("src", landingPageDetails.image_url);
					if(landingPageDetails.email == '' && landingPageDetails.mobile == '' && landingPageDetails.whatsapp == '-' && landingPageDetails.telegram == '-' && landingPageDetails.instagram == '-'){
						$('#contactUsBtn').hide();
						$('#contactUsDiv').hide();

					}
					else{
							
						if(landingPageDetails.email == ''){
							$('#contactUsEmailDiv').hide();
						}
						else{
							 $('#email').text(landingPageDetails.email);
						}

						if(landingPageDetails.mobile == ''){
							$('#contactUsPhoneDiv').hide();
						}
						else{
							$('#phoneNo').text(landingPageDetails.mobile);
						}

						if(landingPageDetails.whatsapp == '-'){
							$('#contactUsWhatsappDiv').hide();
						}
						else{
							$('#whatsapp').text(landingPageDetails.whatsapp);
						}


						if(landingPageDetails.telegram == '-'){
							$('#contactUsTelegramDiv').hide();
						}
						else{
							 $('#telegram').text(landingPageDetails.telegram);
						}
						
						if(landingPageDetails.instagram == '-'){
							$('#contactUsInstagramDiv').hide();
						}
						else{
							 $('#instagram').text(landingPageDetails.instagram);
						}


					}
                   
                  
                    referralCode = landingPageDetails.referral_code;
                }else{
                   

                }
            });

    }
    




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
                $('#signUpError').text('Please fill in your phone number.');
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

                var url     =   '<?php echo $sys['domain'] ?>/scripts/reqRegister.php';
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

</script>



<style>
.center {
  
  margin: auto;
  width: 100%;
  padding: 10px;
  text-align:center;
}
.center_grey {
  
  /* margin: auto; */
  width: 100%;
  padding: 10px;
  text-align:center;
  background-color:#e6e6e6;
  height: 100%;



}

.center_signup{
    margin: auto;
  width: 50%;
  padding: 10px;
  text-align:center;
}

.contact_details{
    text-align:left;

}

.footer{
    margin: auto;
  width: 100%;
  padding: 10px;
  text-align:center;
    background-color:#666666;
}
.subtitle{
font-size:18;
margin: auto;
  width: 60%;
  padding: 10px;
  text-align:center;
}

.line_space{
    line-height: 1.6;
    margin: auto;
  width: 60%;
  padding: 10px;
  text-align:center;
}

.title {
  display: block;
  font-size: 2em;
  margin-top: 0.67em;
  margin-bottom: 0.67em;
  margin-left: 0;
  margin-right: 0;
  font-weight: 500;

  margin: auto;
  width: 60%;
  padding: 10px;
  text-align:center;
}

/*New Style*/

@font-face {
    font-family: 'Montserrat';
    font-weight: 300;
    src: url('<?php echo $sys['domain']?>/css/fonts/Montserrat/Montserrat-Regular.ttf');
}

@font-face {
    font-family: 'Montserrat';
    font-weight: 400;
    src: url('<?php echo $sys['domain']?>/css/fonts/Montserrat/Montserrat-Medium.ttf');
}

@font-face {
    font-family: 'Montserrat';
    font-weight: 500;
    src: url('<?php echo $sys['domain']?>/css/fonts/Montserrat/Montserrat-SemiBold.ttf');
}

@font-face {
    font-family: 'Montserrat';
    font-weight: 600;
    src: url('<?php echo $sys['domain']?>/css/fonts/Montserrat/Montserrat-Bold.ttf');
}

body {
    font-family: 'Montserrat'!important;
    font-weight: 300;
    color: #000!important;
    background-color: #fff!important;
}

.form-control {
    font-family: 'Montserrat'!important;
}


.memberLandingPage {
    color: #000;
    padding-top: 30px;
}

.memberLandingPageLogo {
    width: 180px;
    margin-right: 30px;
}

.memberLandingPageAnchor {
    color: #000;
    text-decoration: none;
    margin: 30px 30px;
    font-size: 12px;
    transition: color .3s;
}

.memberLandingPageAnchor:hover {
    text-decoration: none;
    color: #51C2DB;
}

.memberLandingPageSection1Title {
    font-size: 35px;
    font-weight: 400;
    margin-top: 80px;
}

.memberLandingPageSection1Subtitle {
    font-size: 21px;
    margin-top: 60px;
}

.memberLandingPageSection1Content {
    margin-top: 40px;
    font-weight: 100;
    padding: 0 250px;
}

.memberLandingPageSection1Image {
    margin-top: 50px;
}

.memberLandingPageSection1Image img{
    width: 100%;
}

.memberLandingPageSection2 {
    margin-top: 50px;
}

.memberLandingPageSection2Title {
    font-size: 35px;
    font-weight: 400;
}

.memberLandingPageSection3 {
    background-color: #e6e6e6;
    padding: 40px;
    margin-top: 50px;
}

.memberLandingPageSection3Title {
    font-size: 35px;
    font-weight: 400;
    margin-bottom: 20px;
}

.memberLandingPageSection3Content {
    margin-top: 20px;
    width: 100%;
    margin-left: auto;
    margin-right: auto;
}

.memberLandingPageSection3Content div div i{
    margin-right: 3px;
}

.memberLandingPageSection3Content div div:first-child {
    font-weight: 500;
    padding-left: 110px;
    width: 220px;
}

.memberLandingPageSection3Content div div:last-child {
    width: 220px;
}

.memberLandingPageFooter {
    padding: 15px;
    background-color: #454545;
    color: #d5d5d5;
    text-align: center;
}

@media (min-width: 320px) and (max-width: 767px) {
    .memberLandingPageSection1Content {
        padding: 0 40px;
    }
    .memberLandingPageSection3 {
        padding: 40px 20px;
    }

    .memberLandingPageSection3Content {
        text-align: center;
    }

    .memberLandingPageSection3Content div div:first-child {
        font-weight: 500;
        padding-left: 0px;
        width: 200px;
    }
    .memberLandingPageSection3Content div div:last-child {
        width: 200px;
    }
}


</style>
