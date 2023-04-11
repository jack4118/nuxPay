<?php 
	$login=false;
?>

<?php include 'include/config.php'; ?>
<?php include 'headLogin.php'; ?>

<body class="navSignUpBtn m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default f-17"  style="background-image: url('images/qrImg/qrSectionBg.png'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">

	
	<div class="m-grid m-grid--hor m-grid--root m-page">


		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(images/bg-3-1.jpg);">
			<div class="m-grid__item m-grid__item--fluid m-login__wrapper changePadding">
				<div class="m-login__container qrDIV" style="">

					<!-- <div id="displayLanding" class="col-12 text-center" style="margin-top: 50px;">
						<div class="row">
							<div class="col-12">
								<img class="fade-in nuxpayQRLogo" src="images/thenuxBlackLatest_Pay_logo.svg">
							</div>
							<div class="col-12 px-0 displayLandingFont" style="margin-top: 10px;">
								<span id="text1" class="textColor">No.1 </span>
								<span id="text2" class="textColor">Crypto </span>
								<span id="text3" class="textColor">Payment </span>
								<span id="text4" class="textColor">Solution</span>
							</div>
						</div>
						
					</div> -->

					<div id="displayContent" class="col-12">
						<div class="row justify-content-center">
							<div class="col-xl-8 col-lg-8">

								<div class="row">

									<div class="col-12 qrTitle1 text-center">
										Scan to pay
									</div>
									<!-- <div class="col-12 text-center marginBottom1">
										<img src="images/qrImg/footerLogoSmall.svg" width="16px" style="margin-right: 6px" />
										<span class="qrTitle2">COMPANY</span>
									</div> -->
									<div class="col-12 text-center marginBottom2">
										<div id="qrcode" class=""></div>
									</div>
									<!-- <div class="col-12 text-center marginBottom3">
										<span class="qrTitle3">Timeout In: 04:12</span>
									</div> -->

								</div>

								<div class="row marginBottom4">

									<div class="col-12 px-0">
										<div class="input-group">
											<input id="address" type="text" class="form-control" placeholder="" aria-describedby="basic-addon2" disabled>
											<div class="input-group-append">
												<span id="copy" class="input-group-text copyBtnDesign" id="basic-addon2"><img src="images/qrImg/copyIcon.svg" width="16px" style="margin-right: 6px" /> Copy</span>
											</div>
										</div>
									</div>

								</div>


								<div class="row infoDetailsBg">

									<div class="col-12">
										<div class="row">
											<div class="qrTitle5 widthInner1" style="width: 55%; margin-top: 3px;">
												Summary Of Transaction
											</div>
											<div class="widthInner2" style="width: 45%;">
												<hr style="border-top: 2px solid #2F56F7">
											</div>
										</div>
									</div>

									<div class="col-12 px-0 mt-0 mt-md-4">
										<div class="row">
											<div id="type" class="col-xl-4 col-lg-4 col-md-6 col-12 qrTitle6 mt-0">
												Currency :
											</div>
											<div id="currency" class="col-xl-8 col-lg-8 col-md-6 col-12 qrTitle7" style="text-transform: uppercase;">
											</div>
										</div>
										<div id="amountDIV" class="row mt-1" style="display: none;">
											<div class="col-xl-4 col-lg-4 col-md-6 col-12 qrTitle6">
												Amount :
											</div>
											<div class="col-xl-8 col-lg-8 col-md-6 col-12 qrTitle8 amount">
											</div>
										</div>
										<div class="row mt-1">
											<div class="col-xl-4 col-lg-4 col-md-6 col-12 qrTitle6">
												Pay To :
											</div>
											<div id="company" class="col-xl-8 col-lg-8 col-md-6 col-12 qrTitle8 ">
											</div>
										</div>
										<!-- <div class="row mt-1">
											<div class="col-xl-4 col-lg-4 col-md-6 col-12 qrTitle6">
												Payment of :
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-12 qrTitle8">
												ABC Goods and Services
											</div>
										</div> -->
										<div class="row mt-1">
											<div class="col-xl-4 col-lg-4 col-md-6 col-12 qrTitle6">
												Reference No :
											</div>
											<div id="payment_id" class="col-xl-8 col-lg-8 col-md-6 col-12 qrTitle8">
											</div>
										</div>
									</div>

								</div>

								<div class="row" style="margin-top: 20px;margin-bottom: 20px;">
									<div class="col-md-6 col-4 text-right align-self-center poweredBy px-0">
										powered by
									</div>
									<div class="col-md-6 col-8 align-self-center">
										<img class="qrPaymentLogo" src="images/qrPayLogo.png">
									</div>
								</div>

								<div class="row backMerchant">
									<button class="btn primaryBtn" id="backMerchantBtn">Back to Merchant Site</button>
								</div>

							</div>
						</div>
					</div>

				</div>	
			</div>
		</div>	

	</div>
	
	<?php include 'sharejsDashboard.php'; ?>   
	<script src="js/jquery.qrcode.js" type="text/javascript"></script>
</body>


</html>

<script>
	var url             = 'scripts/reqPaymentGateway.php';
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 0;
	var fCallback = "";
	var transactionToken = "<?php echo $_POST['transaction_token'] ?>";

	$(document).ready(function(){

		// setTimeout(function() {
		//     $('#text1').addClass("changeTextColor");
		//     $("#text1").addClass("fade-in");
		// }, 1000);

		// setTimeout(function() {
		//     $('#text2').addClass("changeTextColor");
		//     $("#text2").addClass("fade-in");
		// }, 1800);

		// setTimeout(function() {
		//    	$('#text3').addClass("changeTextColor");
		//     $("#text3").addClass("fade-in");
		// }, 2600);

		// setTimeout(function() {
		//     $('#text4').addClass("changeTextColor");
		//     $("#text4").addClass("fade-in");
		// }, 3400);

		// setTimeout(function() {
		//    $("#displayLanding").hide();
		//    $("#displayContent").show();
		// }, 4500);

		fCallback = getPgTransactionDetails;

	    formData  = {
	      command: 'getPgTransactionDetails',
	      transactionToken : transactionToken
	    };    
	    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	    $('#copy').click(function(){
	    	copyToClipboard($('#address').val())
	    });


	});

	function copyToClipboard(val){
	    var dummy = document.createElement("input");
	    document.body.appendChild(dummy);
	    // $(dummy).css('display','none');
	    dummy.setAttribute("id", "dummy_id");
	    document.getElementById("dummy_id").value=val;
	    dummy.select();
	    document.execCommand("copy");
	    document.body.removeChild(dummy);
	    swal.fire({
	        position:"center",
	        type:"success",
	        title:"Copied to clipboard",
	        showConfirmButton:!1,
	        timer:1000
	    })
	}

	function getPgTransactionDetails(data,message){

		

		transactionDetails = data.data
		var amount = transactionDetails.amount;
		/*if (amount == 0) {
			var qrAddress = transactionDetails.currency+":"+transactionDetails.address;
			$("#currency").text(transactionDetails.currency);
		}else{
			$('#amountDIV').show();
			var qrAddress = transactionDetails.currency+":"+transactionDetails.address+"?amount="+transactionDetails.amount;
			$(".amount").text(transactionDetails.amount+" "+transactionDetails.currency);
		}*/
		var qrAddress = transactionDetails.address;
		$("#company").text(transactionDetails.business_name);
		$("#payment_id").text(transactionDetails.payment_id);
		$("#address").val(transactionDetails.address);
		$("#currency").text(transactionDetails.currency);

		var profile_picture_url = transactionDetails.profile_picture_url;

		if(transactionDetails.profile_picture_url == ""){
			profile_picture_url = 'images/logo-270.png';
		}

		$('#qrcode').qrcode({
		    render: "canvas", 
		    text: qrAddress,
		    width: 200,
		    height: 200,
		    background: "#ffffff",
		    foreground: "#000000",
		    src: profile_picture_url,
		    imgWidth: 40,
		    imgHeight: 40,
		});

		$('#backMerchantBtn').click(function(){
	    	formData  = {
		      command: 'getPgTransactionCheckStatus',
		      transactionToken : transactionToken
		    };    
		    $.ajax({
		        type: method,
		        url: url,
		        data: formData,
		        success : function(result) {
		          var obj = JSON.parse(result);
		          if ( (obj.data.status=="success" && obj.data.exchange_rate!=null) || obj.data.status=="failed") {
		          	$.redirect(obj.redirect_url, obj.data);
		          } else if (obj.data.status=="cancelled"){
		        	$.redirect(obj.redirect_url, obj.data);
		          }
		        },
		        error   : function(result) {

		        }
		     });


	  	});


		setInterval(function(){
		    formData  = {
		      command: 'getPgTransactionCheckStatus',
		      transactionToken : transactionToken
		    };    
		    $.ajax({
		        type: method,
		        url: url,
		        data: formData,
		        success : function(result) {
		          var obj = JSON.parse(result);
		          if ( obj.data.transaction_id!=null) {
				obj.data.transaction_status = obj.data.status;
				obj.data.status = "success";
		          	$.redirect(obj.redirect_url, obj.data);
		          }
		        },
		        error   : function(result) {
		        }
		     });
		}, 3000);

	}

</script>
