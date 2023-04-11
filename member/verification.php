<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<?php include 'sharejsDashboard.php'; ?>

<script>
	var url             = 'scripts/reqVerify.php';
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 0;
	var pageNumber      = 1;
	var formData        = "";
	var fCallback       = ""; 

	var verifyCode = $.urlParam('verify_code');
	var businessEmail = $.urlParam('business_email');
	var formData = {
		'command': 'verifyAcc',
		'verify': verifyCode
	};

	showCanvas();

	$.ajax({
		type: method,
		url: url,
		data: formData,
		dataType: 'text',
		encode: true
	}).done(function(data) {
		var obj = JSON.parse(data);
		if(obj.code == 1){
			hideCanvas();
			$.redirect("signUpSuccessActivated.php");
		}else{
			hideCanvas();                            
			if (obj.errorCode == "-101"){
				$.redirect("signUpActivateExpired.php", {email: businessEmail});
			}
			else{
				showMessage(obj.message_d, "warning", obj.message,"warning", "login.php");
			}
		}
	});
</script>