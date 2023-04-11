<?php 

include 'include/config.php';
include 'headLogin.php'; 

?>

<link href="<?php echo $config['domain']?>/css/customLogin.css?ts=<?php echo filemtime('css/customLogin.css'); ?>" rel="stylesheet" type="text/css" />

<body>
	
	<div id="loginContainer">

		<div id="loginHeader">
			<a href='index.php'><img id="loginHeaderLogo" src="<?php echo $dashboardLogo; ?>"></a>
		</div>

		<div id="loginMessage"></div>

		<div id="loginContent">
			
			<div id="accountBox">

				<div id="createTitle"><?php echo $translations["M01561"][$language]; /* Reset Login Password */?></div>
				<div id="createSubTitle"></div>

                <div id="accountType">
                   
                    <nav class="nav">
                    	<a class="nav-link active" id="emailButton" href="javascript:switchAccountType('email');"><?php echo $translations["M01523"][$language]; /*Email*/ ?></a>
                    	<a class="nav-link" id="mobileButton" href="javascript:switchAccountType('mobile');"><?php echo $translations["M01522"][$language]; /*Mobile*/ ?></a>
                    </nav>

                    <hr>
                </div>
                

                <div class="row">

                	<div id="mobileSection" style="display: block;">
                		<div id="mobileLabelDiv" class="col-12 form-group" >
	                		<label><?php echo $translations["M01562"][$language]; /*Enter the account details to reset the password. */?></label>
	                	</div>
	                	<div class="col-12 form-group" style="display: flex;">

                            <div id="countryCodeTmp" class="phoneNumberPrefix" style="line-height: 36px;font-size: 15px;text-align: left;">+</div>
                            <div class="nuxPaySection01Part02">

                                <input type="text" id="mobileNumber" style="padding-left: 16px;padding-right: 8px;" class="form-control loginInput " placeholder="      <?php echo $translations["M01542"][$language]; /*Mobile Number */?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $_POST['phoneNumber']; ?>">
                            </div>

                        </div>
	                	<div id="dialingArea" class="col-12 form-group" style="display: none;" >
							<div class="loginCountryBox">
								<select id="countryCode" class="selectOption form-control loginInput">
									<?php include 'phoneList.php'; ?>
								</select>
							</div>
							<!--<input id="mobileNumber" type="text" class="form-control loginInput" spellcheck="false" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">-->
						</div>

                	</div>

					<div id="emailSection" style="display: none;">
						<div id="emailLabelDiv" class="col-12 form-group" >
	                		<label><?php echo $translations["M01562"][$language]; /*Enter the account details to reset the password. */?></label>
	                	</div>
						<div id="emailDiv" class="col-12 form-group">
							<input id="email" type="text" class="form-control loginInput">
						</div>
					</div>
					
					<div class="col-12 form-group" style="margin-top: 7px;">
						<button id="forgotNext" type="button" class="btn primaryBtn"><?php echo $translations["M01566"][$language]; /*NEXT */?></button>
					</div>

                </div>

			</div>

		</div>

		<div id="loginFooter">
			<p>Copyright ©<?php echo date("Y"); ?> • <?php echo $sys['companyName']; ?> • <?php echo $translations["M00299"][$language]; ?><!-- All Rights Reserved. --> </p>
		</div>
	</div>

	<?php include('floatedWhatsapp.php'); ?>
</body>


<div class="modal fade" id="slideToOTPModal" role="dialog" style="margin: auto; width: 90%;">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header" style="padding-top:5px;padding-bottom:5px;">

				<div class="modalAmount mt-2 col-12">
					<?php echo $translations["M01560"][$language]; /*Security Verification*/ ?>
				</div>
				<div class="close"></div>

			</div>
			<div class="modal-body  col-12" style="padding-bottom:15px;">
				<div id="sliderButton" class="col-12 form-group">
					<div id="button-background">
						<span id="sliderText" class="otp-slide-text"><?php echo $translations["M01524"][$language]; /*Slide to get OTP*/ ?></span>
						<div id="slider">
							<i id="locker" class="fa fa-arrow-right material-icons"></i>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<?php include 'sharejsDashboard.php'; ?>  

<script>
	
	var accountType = "email";
	var countryCode = "<?php echo $countryCode; ?>";
	var defaultCountryCode = "";
	
	$(document).ready(function(){

		$('#countryCode').find('option').each(function(){
			if (countryCode != "ZZ") {
				if ($(this).attr("data-countrycode") == countryCode) {
					$(this).parent().val(this.value).trigger('change');
					defaultCountryCode = this.value;
				}
			}else{
				if ($(this).attr("data-countrycode") == "US") {
					$(this).parent().val(this.value).trigger('change');
					defaultCountryCode = this.value;
				}
			}
		});

    	function format(val) {
            return val.id;
        }
        $('#countryCode').select2({
            dropdownAutoWidth : true,
            templateSelection: format,
            width: 80
        });


        $('#email').keypress(function(e) {
			if (e.which == 13) {
				$('#email').blur();
				$('#forgotNext').trigger('click');
			}
		});

        $('#mobileNumber').keypress(function(e) {
			if (e.which == 13) {
				$('#mobileNumber').blur();
				$('#forgotNext').trigger('click');
			}
		});

		$('#mobileNumber').on('focus', function(e) {

            var tmpPhoneNumber = $('#mobileNumber').val();
            
            if(tmpPhoneNumber=="") {
                $('#mobileNumber').val(defaultCountryCode.substring(1));
            }

            $('#mobileNumber').attr("placeholder", "");
            $('#countryCodeTmp').text('+');

            $('#mobileNumber').caretToEnd();
        });

        $('#mobileNumber').on('blur', function(e) {

            var tmpPhoneNumber = $('#mobileNumber').val();

            if(tmpPhoneNumber=="" || "+"+tmpPhoneNumber==defaultCountryCode) {
                $('#mobileNumber').val('');
                $('#countryCodeTmp').text(defaultCountryCode);
            }
            
            $('#mobileNumber').attr("placeholder", "      <?php echo $translations["M01542"][$language]; /*Mobile Number */?>");
        });
        $("#mobileNumber").blur();

		switchAccountType('email');
	});

	function switchAccountType(t) {

		hideMessageDiv();
		
		if(t=="mobile") {
			$('#mobileSection').show();
			$('#emailSection').hide();
			$('#emailButton').removeClass('active');
			$('#mobileButton').addClass('active');
			accountType = "mobile";

			// showMessageDiv(true, 'toggle mobile');

		} else {
			$('#mobileSection').hide();
			$('#emailSection').show();
			$('#emailButton').addClass('active');
			$('#mobileButton').removeClass('active');
			accountType = "email";

			// showMessageDiv(false, 'toggle email');

		}
	}

	function hideMessageDiv() {
		document.getElementById("loginContainer").style.gridTemplateRows = "60px 0px auto 60px";
	}

	function showMessageDiv(isSuccess, m) {

		var msg = "";			
		if(isSuccess) {
			msg = "<p><i class='fa fa-check successFa'></i> <span>" + m + "</span></p>";
		} else {
			msg = "<p><i class='fa fa-times failedFa'></i> <span>" + m + "</span></p>";
		}
		
		$('#loginMessage').html(msg);
		document.getElementById("loginContainer").style.gridTemplateRows = "60px 40px auto 60px";

		// setTimeout(function() {
	 //        document.getElementById("loginContainer").style.gridTemplateRows = "60px 0px auto 60px";
	 //    }, 3000);

	}

	$('#forgotNext').click(function() {

		var email = sanitize($('#email').val());
		var mobileNumber = sanitize($('#mobileNumber').val());
		var countryCode = sanitize($('#countryCode').val());

		if(accountType=="email") {
			if(email=='') {
				showMessageDiv(false, '<?php echo $translations["M01584"][$language]; /*Please enter your Email Address.*/?>');
				utmTracking('', '', '', 'Forgot Password email_empty');

				$('.text-danger').hide();
				$('input#email').after('<span class="text-danger" style="text-align: left;display: block;"><?php echo $translations["M01584"][$language]; /*Please enter your Email Address.*/?></span>');
                $('html, body').animate({
                    scrollTop: $("#email").offset().top-120
                }, 500);
                $('input#email').focus();

				return;
			} else if(!validateEmail(email)) {
				showMessageDiv(false, '<?php echo $translations["M01585"][$language]; /* Please enter a valid email address. */ ?>');
				utmTracking('', email,'','Forgot Password email_invalid');

				$('.text-danger').hide();
				$('input#email').after('<span class="text-danger" style="text-align: left;display: block;"><?php echo $translations["M01585"][$language]; /* Please enter a valid email address. */ ?></span>');
                $('html, body').animate({
                    scrollTop: $("#email").offset().top-120
                }, 500);
                $('input#email').focus();

				return;
			} else if (!ValidateEmail2(email)){
				showMessageDiv(false, '<?php echo $translations["M01585"][$language]; /* Please enter a valid email address. */ ?>');
				utmTracking('', email,'','Forgot Password email_invalid');

				$('.text-danger').hide();
				$('input#email').after('<span class="text-danger" style="text-align: left;display: block;"><?php echo $translations["M01585"][$language]; /* Please enter a valid email address. */ ?></span>');
                $('html, body').animate({
                    scrollTop: $("#email").offset().top-120
                }, 500);
                $('input#email').focus();

				return;
			}
		} else {
			if(mobileNumber=='' || countryCode=='') {
				showMessageDiv(false, '<?php echo $translations["M01586"][$language]; /*Please enter your Mobile Number.*/?>');
				utmTracking('', '', '', 'Forgot Password email_invalid');

				$('.text-danger').hide();
				$('input#email').after('<span class="text-danger" style="text-align: left;display: block;"><?php echo $translations["M01585"][$language]; /* Please enter a valid email address. */ ?></span>');
                $('html, body').animate({
                    scrollTop: $("#email").offset().top-120
                }, 500);
                $('input#email').focus();

				return;
			}
		}

		$('#slideToOTPModal').modal('show');


	});

	$('.close').click(function() {
		$('#slideToOTPModal').modal('hide');
	});

	var initialMouse = 0;
	var slideMovementTotal = 0;
	var mouseIsDown = false;
	var slider = $('#slider');

	slider.on('mousedown touchstart', function(event) {
		mouseIsDown = true;
		slideMovementTotal = $('#button-background').width() - $(this).width() + 10;
		initialMouse = event.clientX || event.originalEvent.touches[0].pageX;
	});


	//Request OTP
	$(document.body, '#slider').on('mouseup touchend', function(event) {
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
			
			$('.slide-text').fadeTo(300, 1);
			slider.animate({
				left: "-10px"
			}, 300);


			//showCanvas();
			//$('#slideToOTPModal').modal('toggle');

			var email = sanitize($('#email').val());
			var mobileNumber = sanitize($('#mobileNumber').val());
			var countryCode = sanitize($('#countryCode').val());

			//$.redirect('newResetPassword.php', {'accountType': accountType, 'email': email, 'countryCode': countryCode, 'mobileNumber': mobileNumber});



			//showCanvas();
			//showMessageDiv(true, 'Good');

			$('#slideToOTPModal').modal('hide');


			var url     =   '<?php echo $sys['domain']?>/scripts/reqLogin.php';

	        var formData        = {
	            command: 'resetMerchantPasswordVerifyCode',
	            //mobile: (countryCode + mobileNumber.replace(/^0+/, '')),
	            mobile: ("+" + mobileNumber.replace(/^0+/, '')),
				email: email,
				mode: accountType,
	        };

	        console.log(formData);
	        showCanvas();
	        hideMessageDiv();

	        $.ajax({
	            type: 'POST',
	            url: url,
	            data: formData,
	            dataType: 'text',
	            encode: true
	        })
	        .done(function(data) {

	            var obj = JSON.parse(data);

	            if(obj.code == 1){
	                hideCanvas();
	                
	                var timeout = obj.timeout;

					if(accountType=="email") {
						utmTracking('', email, '', 'Forgot Password Request OTP Success');
					} else {
						utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')), '', 'Forgot Password Request OTP Success');
					}
					console.log({'accountType': accountType, 'email': email, 'countryCode': "+", 'mobileNumber': mobileNumber, 'timeout': timeout});
					$.redirect('newForgotPasswordOtpVerify.php', {'accountType': accountType, 'email': email, 'countryCode': "+", 'mobileNumber': mobileNumber, 'timeout': timeout});


	            } else if(obj.errorCode == -101) {

	            	console.log(obj);
	            	hideCanvas();
	                
	                var timeout = obj.timeout;

	                if(accountType=="email") {
						utmTracking('', email,'','Sign Up Page OTP Failed - ' + obj.message, 0);
					} else {
						utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')),'','Sign Up Page OTP Failed - ' + obj.message, 0);
					}

					$.redirect('newForgotPasswordOtpVerify.php', {'accountType': accountType, 'email': email, 'countryCode': "", 'mobileNumber': mobileNumber, 'timeout': timeout});

	            } else {

	            	console.log(obj);
	                hideCanvas();

	                if (obj.error_message) {

	                    var error_message="";

	                    $.each(obj.error_message, function(k, v) {
	                        error_message+=v+"<br>";
	                    });

	                    showMessage(obj.message_d+"<br><?php echo $translations["M01165"][$language]; ?><br>"+error_message, 'warning', obj.message, 'warning', '')

	                    if(accountType=="email") {
							utmTracking('', email,'','Sign Up Page Error - ' + obj.message, 0);
						} else {
							utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')),'','Sign Up Page Error - '+obj.message, 0);
						}

	                } else {
	                    showMessage(obj.message_d, 'warning', obj.message, 'warning', '');

	                    if(accountType=="email") {
							utmTracking('', email,'','Sign Up Page Error - ' + obj.message, 0);
						} else {
							utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')),'','Sign Up Page Error - '+obj.message, 0);
						}

	                }

	            }

	        });


			// var url = '<?php echo $sys['domain'] ?>/scripts/reqLogin.php';
			// var method = 'POST';
			// var debug = 0;
			// var bypassBlocking = 0;
			// var bypassLoading = 0;

			// var formData = {
			// 	command: "resetMerchantPasswordVerifyCode",
			// 	mobile: (countryCode + mobileNumber.replace(/^0+/, '')),
			// 	email: email,
			// 	mode: accountType,
			// };

			// // console.log('###');
			// // console.log(url);
			// // console.log(formData);

			// fCallback = resetMerchantPasswordRespond;
			// ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		}

		setTimeout(function() {
			slider.on('click tap', function(event) {
				if (!slider.hasClass('unlocked'))
					return;
				slider.removeClass('unlocked');
				slider.off('click tap');
			});
		}, 0);

	});

	$(document.body).on('mousemove touchmove', function(event) {
		if (!mouseIsDown)
			return;

		var currentMouse = event.clientX || event.originalEvent.touches[0].pageX;
		var relativeMouse = currentMouse - initialMouse;
		var slidePercent = 1 - (relativeMouse / slideMovementTotal);

		$('.slide-text').fadeTo(0, slidePercent);

		if (relativeMouse <= 0) {
			slider.css({
				'left': '-10px'
			});
			return;
		}
		if (relativeMouse >= slideMovementTotal + 10) {
			slider.css({
				'left': slideMovementTotal + 'px'
			});
			return;
		}
		slider.css({
			'left': relativeMouse - 10
		});
	});

	// function resetMerchantPasswordRespond(data, message) {

	// 	var timeout = data.timeout;

	// 	var email = $('#email').val();
	// 	var mobileNumber = $('#mobileNumber').val();
	// 	var countryCode = $('#countryCode').val();

	// 	if(accountType=="email") {
	// 		utmTracking('', email, '', 'Forgot Password Request OTP Success');
	// 	} else {
	// 		utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')), '', 'Forgot Password Request OTP Success');
	// 	}
		
	// 	$.redirect('newForgotPasswordOtpVerify.php', {'accountType': accountType, 'email': email, 'countryCode': countryCode, 'mobileNumber': mobileNumber, 'timeout': timeout});

	// 	// console.log('#####');
	// 	// console.log(message);
	// 	// console.log(data);


	// }


	if (history.pushState != undefined) {
		history.pushState(null, null, location.href);
	}
	history.back();
	history.forward();
	window.onpopstate = function () {
		history.go(1);
	};


	function adjustFooter() {

		var windowHeight = $(window).height();
		var loginContentHeight = document.getElementById('loginContent').offsetHeight;
		var loginMessageHeight = document.getElementById('loginMessage').offsetHeight;
		var allHeight = 70 + loginMessageHeight + loginContentHeight + 60;
		var diffHeight = windowHeight - allHeight;

		if(diffHeight > 0) {
			$('#loginFooter').css('padding-top', diffHeight);
		} else {
			$('#loginFooter').css('padding-top', 0);
		}

	}

	function detectIEEdge() {

	    var ua = window.navigator.userAgent;
	    var msie = ua.indexOf('MSIE ');
	    if (msie > 0) {
	        // IE 10 or older => return version number
	        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
	    }

	    var trident = ua.indexOf('Trident/');
	    if (trident > 0) {
	        // IE 11 => return version number
	        var rv = ua.indexOf('rv:');
	        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
	    }

	    var edge = ua.indexOf('Edge/');
	    if (edge > 0) {
	       // Edge => return version number
	       return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
	    }

	    // other browser
	    return "";
	}
	
	if(detectIEEdge()!="") {
		$( window ).resize(function() {
			adjustFooter();
		});

		adjustFooter();
	}

	function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

	function ValidateEmail2(email)
	{
		var mailformat = /^\w+([\.-]?\w+)*@[a-zA-Z]+(-?[a-zA-Z]+)*(\.[a-zA-Z]{2,3})(\.[a-zA-Z]{2,3})?$/;
		// var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		//var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;S
		
		if(email.match(mailformat))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

</script>


</html>
