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

		<div id="loginMessage" style="margin-top:0"></div>

		<div id="loginContent">
			
			<div id="accountBox">

				<div id="createTitle"><?php echo $translations["M01499"][$language]; /* Login */ ?></div>
				<div id="createSubTitle"></div>

                <div id="accountType">
                    <nav class="nav">
                    	<a class="nav-link active" id="emailButton" href="javascript:switchAccountType('email');"><?php echo $translations["M01523"][$language]; /* Email */?></a>   
					  	<a class="nav-link" id="mobileButton" href="javascript:switchAccountType('mobile');"><?php echo $translations["M01522"][$language]; /*Mobile */?></a>   
                    </nav>
                    <hr>
                </div>
                
                <div class="row">
                	<div id="mobileSection" style="display: none;">
                		<div id="mobileLabelDiv" class="col-12 form-group" >
	                		<label><?php echo $translations["M01522"][$language]; /*Mobile */?></label>
	                	</div>
	                	<div class="col-12 form-group" style="display: flex;">
                            <div id="countryCodeTmp" class="phoneNumberPrefix" style="line-height: 36px;font-size: 15px;text-align: left;">+</div>
                            <div class="nuxPaySection01Part02">
                                <input type="text" id="mobileNumber" style="padding-left: 16px;padding-right: 8px;" class="form-control loginInput " placeholder="<?php echo $translations["M01542"][$language]; /*Mobile Number */?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $_POST['phoneNumber']; ?>">
                            </div>
                        </div>
	                	<div id="dialingArea" class="col-12 form-group" style="display: none;" >
							<div class="loginCountryBox">
								<select id="countryCode" class="selectOption form-control loginInput">
									<?php include 'phoneList.php'; ?>
								</select>
							</div>
						</div>
                	</div>

					<div id="emailSection">
						<div id="emailLabelDiv" class="col-12 form-group" >
	                		<label><?php echo $translations["M01523"][$language]; /*Email */?></label>
	                	</div>
						<div id="emailDiv" class="col-12 form-group">
							<input id="email" type="text" class="form-control loginInput"  placeholder="<?php echo $translations["M01523"][$language]; /* Email */?>">
						</div>
					</div>
					
					<div id="passwordSection">
						<div id="passwordLabelDiv" class="col-12 form-group" >
	                		<label><?php echo $translations["M00154"][$language]; /* Password */?></label>
	                	</div>
						<div id="passwordDiv" class="col-12 form-group" style="display: flex;">
							<input id="password" type="password" class="form-control loginInput" autocomplete="new-password">
							<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" style="margin-left: -25px; padding-top: 11px; "></span>
						</div>
						<div id="passwordDiv2"  style="display: flex;">
							<input id="password2" type="password" class="form-control loginInput" style="display: none;" autocomplete="new-password">
						</div>
					</div>

					<div class="col-12 form-group" style="margin-top: 7px;">
						<button id="loginBtn" type="button" class="btn primaryBtn"><?php echo $translations["M01540"][$language]; /* LOGIN */ ?></button>
					</div>

					<div id="signupForgotDiv" class="col-12 form-group">
                		<label style="width: 50%; text-align: left;"><a href="newForgotPassword.php" style="color: #000000;"><?php echo $translations["M00156"][$language]; /* Forgot Password? */ ?></a></label>
                		<label style="width: 50%; text-align: right;"><a class ="loginSignUpBtn" href="newsignup.php?transaction_token=<?php echo $_GET['transaction_token'];?>" style="color: #51C2DB;"><?php echo $translations["M00248"][$language]; /* Sign Up now */ ?></a></label>
                	</div>
					<!-- 	<div class="col-8" id="switchPGDiv"  style="display:none;">
						<a href ="" id="switchPaymentGateway"><button class="btn primaryBtn">Switch to Payment Gateway</button></a>

					</div> -->
                </div>
			</div>
		</div>
		<div id = "paymentGateway" style="display:none;">
			<div class="col-12" id="innerPaymentGateway">
				<div class="row">
					<div class="col-12" id="switchPGDiv"  style="margin-top:0px";>
						<a href ="" id="switchPaymentGateway"><button class="btn primaryBtn"><?php echo $translations["M02005"][$language]; /* Pay With Payment Gateway */ ?></button></a>
					</div>
					<div class="col-12" style="width: 50%; text-align:left; font-size: 13px;;">
						*<?php echo $translations["M02007"][$language]; /*Process Fee May Apply */ ?>
					</div>
				</div>
			</div>
		</div>
	
		<div id="loginFooter" style="bottom:0; position:relative; text-align:center;">
			<p>Copyright ©<?php echo date("Y"); ?> • <?php echo $sys['companyName']; ?> • <?php echo $translations["M00299"][$language]; ?><!-- All Rights Reserved. --> </p>
		</div>
	</div>

	<?php include('floatedWhatsapp.php'); ?>

<?php include 'sharejsDashboard.php'; ?>  

</body>
</html>
<script>
	
	var accountType = "email";

    var post_countryNumber = "<?php echo $_POST['countryNumber']; ?>";
    var post_phoneNumber = "<?php echo $_POST['phoneNumber']; ?>";
    var post_email = "<?php echo $_POST['email']; ?>";
    var post_countryCode = "<?php echo $countryCode; ?>";
    var post_payeeEmail = "<?php echo $_POST['payeeEmail']; ?>";
    var post_payeeMobileNumber = "<?php echo $_POST['payeeMobileNumber']; ?>";
    var post_payeeDialingArea = "<?php echo $_POST['payeeDialingArea']; ?>";
    var defaultCountryCode = "";
	var from_send_fund = "<?php echo $_POST['fromSendFund'];?>";
	var send_fund_param = <?php $sendFundParam = $_POST['sendFundParam']; echo json_encode($sendFundParam, true);?>;
	var transaction_token = "<?php echo $_GET['transaction_token'];?>";
	
	
	$(document).ready(function(){

		if(transaction_token != ""){

			$('#switchPaymentGateway').attr("href", "<?php echo $sys['domain'];?>/qrPayment.php?transaction_token="+transaction_token);
			$('#paymentGateway').show();
			$('#createTitle').text("<?php echo $translations["M02006"][$language]; /* Login to process payment*/ ?>");
				
		}
		$('#countryCode').find('option').each(function(){
			if (post_countryCode != "ZZ") {
				if ($(this).attr("data-countrycode") == post_countryCode) {
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


        if(post_countryCode!="") {
        	switchAccountType('mobile');
        } else if(post_email!="") {
    		switchAccountType('email');
    		$('#email').val(post_email);
    	} else if(post_payeeEmail!="") {
    		switchAccountType('email');
    		$('#email').val(post_payeeEmail);
    	} else if(post_countryNumber!="" && post_phoneNumber!="") {
    		switchAccountType('mobile');
    		$('#mobileNumber').val(post_phoneNumber);
    		$('#countryCode').find('option').each(function(){
                if ($(this).attr("value") == post_countryNumber) {
                    $(this).parent().val(this.value).trigger('change');
                    defaultCountryCode = this.value;
                }
            });
    	} else if(post_payeeDialingArea!="" && post_payeeMobileNumber!="") {
    		switchAccountType('mobile');
    		$('#mobileNumber').val(post_payeeMobileNumber);
    		$('#countryCode').find('option').each(function(){
                if ($(this).attr("value") == post_payeeDialingArea) {
                    $(this).parent().val(this.value).trigger('change');
                    defaultCountryCode = this.value;
                }
            });
    	}


    	$('#email').keypress(function(e) {
			if (e.which == 13) {
				$('#password').focus();
			}
		});

		$('#mobileNumber').keypress(function(e) {
			if (e.which == 13) {
				$('#password').focus();
			}
		});

		$('#password').keypress(function(e) {
			if (e.which == 13) {
				$('#password').blur();
				$('#loginBtn').trigger('click');
			}
		});

		$(".toggle-password").click(function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $($(this).attr("toggle"));
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});


		$('#mobileNumber').on('focus', function(e) {

            var tmpPhoneNumber = $('#mobileNumber').val();
            
            if(tmpPhoneNumber=="") {
                $('#mobileNumber').val(defaultCountryCode.substring(1));
            }

            $('#mobileNumber').attr("placeholder", "    ");
            $('#countryCodeTmp').text('+');

            // $('#mobileNumber').caretToEnd();
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

//		switchAccountType('mobile');	
		if(from_send_fund == '1'){
			switchAccountType(send_fund_param.sender_type);
			if(send_fund_param.sender_type == 'email'){
				$('#email').val(send_fund_param.sender_email_address);
			}
			else if(send_fund_param.sender_type == 'mobile'){
                $('#countryCodeTmp').text('+');
				$('#mobileNumber').val(send_fund_param.sender_mobile_number);
				
			}
			
		}
		else{
			switchAccountType('email');
		}

	});

	function switchAccountType(t) {

		hideMessageDiv();
		
		if(t=="mobile") {
			$('#mobileSection').show();
			$('#emailSection').hide();
			$('#emailButton').removeClass('active');
			$('#mobileButton').addClass('active');
			accountType = "mobile";

		} else {
			$('#mobileSection').hide();
			$('#emailSection').show();
			$('#emailButton').addClass('active');
			$('#mobileButton').removeClass('active');
			accountType = "email";

		}
	}

	function hideMessageDiv() {
		document.getElementById("loginContainer").style.gridTemplateRows = "60px 0px auto 100px";
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

	$('#loginBtn').click(function() {
		document.cookie = "firstLogin= ";
		var email = sanitize($('#email').val());
		var password = sanitize($('#password').val());
		var mobileNumber = sanitize($('#mobileNumber').val());
		var countryCode = sanitize($('#countryCode').val());

		if(accountType=="email") {
			if(email=='') {
				showMessageDiv(false, '<?php echo $translations["M01584"][$language]; /*Please enter your Email Address.*/?>');

				utmTracking('', '', '', 'Login Page email_empty');
				
				$('.text-danger').hide();
                $('input#email').after('<span class="text-danger" style="text-align: left;display: block;"><?php echo $translations["M01584"][$language]; /* Please enter your Email Address. */ ?></span>');
                $('html, body').animate({
                    scrollTop: $("#email").offset().top-120
                }, 500);
                $('input#email').focus();
				return;
			} else if(!validateEmail(email)) {
				showMessageDiv(false, '<?php echo $translations["M01585"][$language]; /* Please enter a valid email address. */ ?>');
				utmTracking('', email,'','Login Page email_invalid');

				$('.text-danger').hide();
				$('input#email').after('<span class="text-danger" style="text-align: left;display: block;"><?php echo $translations["M01585"][$language]; /* Please enter a valid email address. */ ?></span>');
                $('html, body').animate({
                    scrollTop: $("#email").offset().top-120
                }, 500);
                $('input#email').focus();

				return;
			} else if (!ValidateEmail2(email)){
				showMessageDiv(false, '<?php echo $translations["M01585"][$language]; /* Please enter a valid email address. */ ?>');
				utmTracking('', email,'','Login Page email_invalid');

				$('.text-danger').hide();
				$('input#email').after('<span class="text-danger" style="text-align: left;display: block;"><?php echo $translations["M01585"][$language]; /* Please enter a valid email address. */ ?></span>');
                $('html, body').animate({
                    scrollTop: $("#email").offset().top-120
                }, 500);
                $('input#email').focus();

				return;
			}else{
				$('.text-danger').hide();
			}
		} else {
			if(mobileNumber=='' || countryCode=='') {
				showMessageDiv(false, 'Please enter your Mobile Number.');

				utmTracking('', '', '', 'Login Page mobileNumber_empty');

				$('.text-danger').hide();
				$('input#mobileNumber').after('<span class="text-danger" style="text-align: left;display: block;"><?php echo $translations["M01586"][$language]; /* Please enter your Mobile Number. */ ?></span>');
                $('html, body').animate({
                    scrollTop: $("#mobileNumber").offset().top-120
                }, 500);
                $('input#mobileNumber').focus();
				
				return;
			}
		}

		if(password=='') {
			showMessageDiv(false, 'Please enter your Password.');

			$('.text-danger').hide();
			$('input#password2').after('<span class="text-danger" style="text-align: left;display: block; margin-top: -10px; margin-left: 15px;"><?php echo $translations["M01587"][$language]; /* Please enter your Password. */ ?></span>');
			$('html, body').animate({
				scrollTop: $("#password2").offset().top-120
			}, 500);
			$('input#password').focus();

			if(accountType=="email") {
				utmTracking('', email, '', 'Login Page password_empty');
			} else {
				utmTracking('', (countryCode + mobileNumber.replace(/^0+/, '')), '', 'Login Page password_empty');
			}

			return;
		}
		

		var loginPhoneNumber = "";
        if(accountType=="mobile") {
            //loginPhoneNumber = countryCode + mobileNumber.replace(/^0+/, '');
            loginPhoneNumber = "+"+mobileNumber.replace(/^0+/, '');
        } else {
            loginPhoneNumber = email;
        }

		var timezone = moment.tz.guess();
		var timezoneOffset = getOffsetSecs();

        var formData = {
            'command': 'newMemberLogin',
            'emailMobile': loginPhoneNumber,
            'password': password,
            'time_zone' : timezone,
            'time_zone_offset' : timezoneOffset,
            'mode' : accountType
        };

        var url = '<?php echo $sys['domain']?>/scripts/reqLogin.php';
        var method ='POST';



        hideMessageDiv();
        showCanvas();

        $.ajax({
            type: method,
            url: url,
            data: formData,
            dataType: 'text',
            encode: true,

            success: function(data){

                if(!data || data=="null"){

                    showMessage('<?php echo $translations["M00165"][$language]; ?>', 'danger', '<?php echo $translations["M00166"][$language]; ?>', 'times-circle-o', '');

                    utmTracking('', loginPhoneNumber, '', 'Login Page Error - Some error occurred');

                    if(!bypassLoading) {
                        hideCanvas();
                    }
                }

                var obj = JSON.parse(data);

                if(obj.code == 1){
                    hideCanvas();
                    //document.getElementById("pageLoginBtn").disabled = true;

                    utmTracking('', loginPhoneNumber, '', 'Login Page Success');

					if(from_send_fund == 1){
						$.redirect("sendFund.php", {
							fromSendFund: 1,
							sendFundParam: send_fund_param,
							sendFundType: 'confirmation',

						});
					}
					else if(transaction_token != ""){
						$.redirect("sendReview.php", {
							transaction_token: transaction_token
						});
					}
					else{
						 window.location.href = "<?php echo $sys['domain']?>/dashboard.php";
					}
                   

                }else{
                    hideCanvas();

                    showMessageDiv(false, obj.message_d);
                 
                 	utmTracking('', loginPhoneNumber, '', 'Login Page Error ('+obj.message_d+')');

                }
            },
            error: function(xhr) {
                if(debug)

                var message = xhr.status + ' ' + xhr.statusText;
                
                showMessage('<?php echo $translations["M00167"][$language]; /* Error loading content. Please check your connection and try again. */ ?>', 'danger', '<?php echo $translations["M00168"][$language]; /* Failed */ ?>', 'times-circle-o', '');
                
                utmTracking('', loginPhoneNumber, '', 'Login Page Error - Error loading content. Please check your connection and try again.');

            },
            complete: function() {

                ajaxBlocking = 0;
                if(!bypassLoading)
                    hideCanvas();
            }
        });

        event.preventDefault();


	});

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

