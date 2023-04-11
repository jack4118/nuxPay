<?php include 'include/config.php'; ?>
<?php include 'headLandingPagePreview.php'; ?>


<body>
    <div class="memberLandingPage">
        <section class="memberLandingPageSection1">
            <div class="kt-container">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="javascript:;" data-name="Homepage">
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
                    <img src="<?php echo $sys['domain']?>/images/memberLandingPageSection1Image.png" id="image">
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
                                        <input id="username_S" placeholder="Mobile Number" type="text" class="form-control contactInput" onchange="inputLinkModal(this.value,'confirmMobile');" disabled>
                                        <i class="fa fa-question-circle-o nuxPayBtnSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="Example: 14081111111"></i>
                                        
                                    </div>
                                    
                                    <div class="col-12 form-group" id="emailDiv" style="display: flex;">
                                        <input id="email_S" placeholder="Email" type="text" class="form-control contactInput" onchange="inputLinkModal(this.value,'confirmEmail');">
                                        <i class="fa fa-question-circle-o nuxPayBtnSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="Example: abc@gmail.com"></i>
                                    </div>

                                    

                                    <div id="sliderButton" class="col-12 form-group nuxPaySignUpFormPadding" disabled>
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
                                                <button type="button" class="btn primaryBtn" id="resendBtn" style="display: none;" disabled><?php echo $translations["M00451"][$language]; //Resend ?></button>
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
                                        <input id="signInBusinessName" placeholder="Business Name" type="text" class="form-control contactInput" disabled>
                                        <i class="fa fa-question-circle-o nuxPayBtnSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="Max 25 Character" disabled></i>
                                    </div>

                                    <div class="col-12 form-group" style="display: flex">
                                        <input id="password_S" placeholder="Password" type="password" class="form-control contactInput" disabled>
                                        <i class="fa fa-question-circle-o nuxPayBtnSignUpQuest" aria-hidden="true" data-toggle="m-tooltip" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="Min 4 characters"></i>
                                    </div>

                                    <div class="col-12 form-group nuxPaySignUpFormPadding">
                                        <input id="retypePassword" placeholder="Re-type Password" type="password" class="form-control contactInput" disabled>
                                    </div>
                                    <div class="col-12 form-group nuxPaySignUpFormPadding">
                                        <button id="signUpBtn" type="button" class="btn primaryBtn" disabled>SIGN UP</button>
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
                        <div class="memberLandingPageSection3Content hide" id="showEmail">
                            <div class="row justify-content-center" id="contactUsEmailDiv">
                                <div class="">
                                    <i class="fa fa-envelope"></i> Email
                                </div>
                                <div class=""id ="email">
                                    : wayne@gmail.com
                                </div>
                            </div>
                        </div>
                        <div class="memberLandingPageSection3Content hide" id="showPhone">
                            <div class="row justify-content-center" id="contactUsPhoneDiv">
                                <div class="">
                                    <i class="fa fa-phone"></i> Phone
                                </div>
                                <div class="" id="phoneNo">
                                    : +6012-3456789
                                </div>
                            </div>
                        </div>
                        <div class="memberLandingPageSection3Content hide" id="showWhatsapp">
                            <div class="row justify-content-center" id="contactUsWhatsappDiv">
                                <div class="">
                                    <i class="fa fa-whatsapp"></i> Whatsapp
                                </div>
                                <div class="" id="whatsapp">
                                    : +6012-3456789
                                </div>
                            </div>
                        </div>
                        <div class="memberLandingPageSection3Content hide" id="showTelegram">
                            <div class="row justify-content-center" id="contactUsTelegramDiv">
                                <div class="">
                                    <i class="fa fa-telegram"></i> Telegram
                                </div>
                                <div class="" id="telegram">
                                    : @wayne
                                </div>
                            </div>
                        </div>
						<div class="memberLandingPageSection3Content hide" id="showInstagram">
                            <div class="row justify-content-center" id="contactUsInstagramDiv">
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
            ©2020 · <?php echo $config['companyName']?> · All Rights Reserved
        </section>
    </div>
</body>
<!-- <body>
    <div class="center">
        <div class="center">
            <a href="homepage.php" data-name="Homepage">
                <img alt="Logo" src="images/TheNuxBlack.png" style="height:75px;width:200px;">
            </a>
        </div>
        
        <form  id="signUpDiv2">
        <div class="center">
            <a class="center">Sign Up</a>
            <a class="center">Contact Us</a>
        </div>
        </form>
        <br></br>
        <span class="title" id="landingPageTitle">Your title Here</span>
        <br></br>
        <span class="subtitle" id="landingPageSubtitle">Your Subtitle here</span>
        <br><br>
        <span class="line_space" id="landingPageDescription">Nuxpay has been proudly providing high quality products and services to the San Francisco area since 2000. What differentiates us from other businesses is our ability to truly connect with our customers, and provide the exceptional, compassionate service they deserve. To learn more, simply browse through our site.</span>
        <br></br>
        <div>
        <img src="" id="media" style="width:1240px;height:400px">
        </div>
        <br></br>
        <span class="title">Sign Up Now!</span>
        
            

                      
    </div>
        <form  id="signUpDiv">

        <div class="center_signup">
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
        </form>
    <div class="center_grey" style="padding-bottom:75px">
        <span class="title">Contact Us</span><br>
            <span id=showEmail style="display:none">
                <i class="fa fa-envelope"></i>
                <span class="contact_details"><b>Email</b>        :</span>
                <span id="email"> abc@gmail.com </span><br>
            </span>
            <span id=showMobile style="display:none">
                <i class="fa fa-phone"></i>
                <span class="contact_details"><b>Phone</b>        :</span>
                <span id="mobile"> 012-3456789 </span><br>
            </span>
            <span id=showWhatsapp style="display:none">
                <i class="fa fa-whatsapp"></i>
                <span class="contact_details"><b>WhatsApp</b>        :</span>
                <span id="whatsapp"> 012-3456789 </span><br>
            </span>
            <span id=showTelegram style="display:none">
                <i class="fa fa-telegram"></i>
                <span class="contact_details"><b>Telegram</b>        :</span>
                <span id="telegram"> @abc </span><br>
            </span>
            <span id=showInstagram style="display:none">
                <i class="fa fa-instagram"></i>
                <span class="contact_details"><b>Instagram</b>        :</span>
                <span id="instagram"> @abc </span><br>
            </span>
    </div>
    
    <div class="footer">
	Copyright © <?php echo date("Y");?> <?php echo $sys['companyName']?>. All Rights Reserved.
	</div>
</body> -->
</html>
<?php include 'sharejsDashboard.php'; ?>
<script>
        var resizefunc = [];

    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>


<script>

	var mode = "mobile";
    var landingPageName;
    var landingPageUrl;
    var landingPageTitle;
    var landingPageSubtitle;
    var landingPageDescription;
    var mobile;
    var telegram;
    var whatsapp;
    var email;
    var instagram;
    var media;
	$(document).ready(function() {
        $("#signUpDiv :input").prop("disabled", true);
        $("#signUpDiv2 :input").prop("disabled", true);
        function qs() {
        var qsparam = new Array(10);
        var query = window.location.search.substring(1);
        var parms = query.split('&');
        for (var i = 0; i < parms.length; i++) {
        var pos = parms[i].indexOf('=');
        if (pos > 0)
        {
                var key = parms[i].substring(0, pos);
                var val = parms[i].substring(pos + 1);
                var new_val = val.replaceAll("%20", " ");

                qsparam[i] = new_val;    
        }                          
                                                }
        landingPageName = qsparam[0];
        landingPageUrl = qsparam[1];
        landingPageTitle = qsparam[2];
        landingPageSubtitle = qsparam[3];
        landingPageDescription = qsparam[4];
        mobile = qsparam[5];
        telegram = qsparam[6];
        whatsapp = qsparam[7];
        email = qsparam[8];
        instagram = qsparam[9];
        media = qsparam[10];
		if(mobile!=""||telegram!=""||whatsapp!=""||email!=""){
			if(mobile!="")
			$("#showPhone").show();
			if(telegram!="")
			$("#showTelegram").show();
			if(whatsapp!="")
			$("#showWhatsapp").show();
			if(email!="")
			$("#showEmail").show();
			if(instagram!="")
			$("#showInstagram").show();
			
		}
		else{
			$("#contactUsDiv").hide();
			$("#contactUsBtn").hide();
		}



        }
        var splitstr = qs();
        $("#landingPageName").text(landingPageName);
        $("#landingPageUrl").text(landingPageUrl);
        $("#title").text(landingPageTitle);
        $("#subtitle").text(landingPageSubtitle);
        $("#description").text(landingPageDescription);
        $("#phoneNo").text(mobile);
        $("#telegram").text(telegram);
        $("#whatsapp").text(whatsapp);
        $("#email").text(email);
        $("#instagram").text(instagram);
        // $("#media").text(media);
        // $("img").onload(function(){
        // Change src attribute of image
        $('#image').attr("src", media);
			$('#emailDiv').hide();
			$('#switchMobile').hide();


        function format(val) {
        return val.id;
        }

        //  $('#countryCode2').select2({
        //     dropdownAutoWidth : true,
        //     templateSelection: format,
        //     width: 80
        // });
		
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
