<?php include 'include/config.php'; ?>
<?php include 'headHomepage.php'; ?>

<?php
if((isset($_POST['access_token']) && $_POST['access_token'] != "")) {
		$_SESSION["access_token"] = $_POST['access_token'];
		$_SESSION["business"]["uuid"] = $_POST['businessID'];
}
 ?>

<body>
<div class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed kt-page--loading">


<?php include 'headerHomapage.php'; ?>

    <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor customSend" style="">
            <section class="nuxPaySection01BG">
                <div class="kt-container ">
                    <div class="row justify-content-center">
                        <div class="col-11">
                            <div class="row">
                                <div class="col-12 row">
                                    <div id="nuxPaySection01Content01" class="col-sm-12 col-md-12 col-lg-7" >                                    
                                        <div class="row h-50 d-flex align-items-end">
                                            <h1>
                                                    <?php echo $translations["M01778"][$language]; /* A simple and faster way to send fund abroad.*/ ?>
                                            </h1>
                                        </div>
                                    <div class="row">
                                        <button type="button" class="btn custonButtonSend" style="margin-top:25px;"  onclick="openSendVideo()">
                                           <img src="images/sendandreceive/video-icon.png"> &nbsp &nbsp <?php echo $translations["M01779"][$language]; /* See how we send fund */ ?>
                                        </button>
                                    </div>
                                        
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-5 customSendReceiveRight" id="nuxPaySection01ImgDiv2">                                    
                                        
                                        <div id="successDiv" class="row justify-content-center" style="padding-bottom:20px; display:<?php if ($_POST['data']['data']['error_code'] == 1) { echo 'show'; } else { echo 'none'; } ?>;">                                            
                                            
                                           	<img src="images/sendandreceive/success-icon.png">
											<h2 class="requestSuccessfulText"><?php echo $translations["M01768"][$language]; /* Your request has been submitted successfully! */ ?></h2>
                                        </div>
                                        
                                        <div id="unsuccessDiv" class="row justify-content-center" style="padding-bottom:20px; padding-top:10px; display:<?php if ($_POST['data']['data']['error_code'] == -103) { echo 'show'; } else { echo 'none'; } ?>;">
                                            <div class="row" style="text-align:right; color:black; font-weight:500; font-size:1.2em">                                                  
                                                <?php echo $_POST['data']['message_d'] ?>
                                            </div>
                                            <div class="row  text-center" style="padding: 0 70px">  
                                                <?php echo $translations["M01918"][$language]; /* Scan QR code to fund in. The fund will be sent to the recipient once there's sufficient balance. */ ?> 
                                            </div>
                                            <div id="qrDiv"  style="margin-top:20px;">  </div>
                                            
                                            <div id="urlDiv" class="col-12" style="">                                                                                                
                                                    <div class="input-group">
                                                        <input type="text" id="urlInput" class="form-control requestInput" aria-label="Text input with dropdown button" placeholder="" value="<?php echo $_POST['data']['data']['external_address']; ?>" readonly>
                                                        <div class="input-group-append">
                                                            <button id="copyBtn" class="btn btnRequest col rounded-0 " style="margin-top:19px;padding: 0 19px ;" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="tetherusd"> <?php echo $translations["M01590"][$language]; /*  Copy */ ?> </button>                                                            
                                                        </div>
                                                    </div>
                                            </div>

                                        </div>



                                        <!-- transaction details -->
                                        <div class='container-fluid' style="border:1px solid #dee2e6; padding:10px 20px">                                        
                                            <div class="row justify-content-between" style="padding:10px 0px">
                                                <div class="col-sm customLighter">
                                                    <?php echo $translations["M01782"][$language]; /* Transaction details*/ ?>
                                                </div>
                                               
                                            </div>

                                            <div class="row justify-content-between" style="padding-top:10px; padding-bottom:10px">
                                                <div class=" col-sm-4">
                                                    <?php echo $translations["M01783"][$language]; /* You send */ ?>
                                                </div>
                                                <div class="col-sm-8" style="text-align:right; color:black; font-weight:500" id="amount" >
                                                    0
                                                </div>
                                            </div>

                                            <div class="row justify-content-between" style="padding-top:10px; padding-bottom:20px; display:<?php if ($_POST['data']['data']['error_code'] != 0) { echo 'show'; } else { echo 'none'; } ?>;">
                                                <div class="col-sm-4">
                                                <?php echo $translations["M00322"][$language]; /* Status */ ?> 
                                                </div>
                                                <div class="col-sm-8" style="text-align:right; color:red; font-weight:500" id="amount">                                                    
                                                    <?php echo $_POST['data']['message_d'] ?>
                                                </div>
                                            </div>
                                            <hr style="">
                                            
                                            <div class="row justify-content-between" style="padding-bottom:10px; padding-top:20px">
                                                <div class=" col-sm customLighter">
                                                    <?php echo $translations["M01784"][$language]; /* Recipient details */ ?>
                                                </div>
                                                
                                            </div>

                                            <div class="row justify-content-between" style="padding:10px 0px">
                                                <div class="col-sm">
                                                    <?php echo $translations["M01785"][$language]; /* Name */ ?>
                                                </div>
                                                <div class="col-sm customThickerFont" style="text-align:right" id="receiverName">
                                                    -
                                                </div>
                                            </div>

                                            <div class="row justify-content-between" style="padding:10px 0px" id="emailDiv">
                                                <div class="col-sm">
                                                    <?php echo $translations["M01786"][$language]; /* Email */ ?>
                                                </div>
                                                <div class="col-sm customThickerFont" style="text-align:right" id="receiverEmail">
                                                    -
                                                </div>
                                            </div>
											
											<div class="row justify-content-between" style="padding:10px 0px; display:none;" id="mobileDiv">
                                                <div class="col-sm">
                                                    <?php echo $translations["M01787"][$language]; /* Mobile Number*/ ?> 
                                                </div>
                                                <div class="col-sm customThickerFont" style="text-align:right" id="receiverNumber">
                                                    -
                                                </div>
                                            </div>
                                        </div> 

                                        <button id="newTxBtn" type="button" class="btnRequest btn btn-primary btn-block mt-5"><span style="customThickerFont">New Transaction</span></button>
										
                                       <div class="col-sm customThickerFont" style="display:<?php if ($_POST['data']['data']['new_user'] == 1) { echo 'show'; } else { echo 'none'; } ?>" id="newUserDescription">
										   	<?php if ($_POST['data']['data']['sender_mobile_number']){
												echo $transaction["M01927"][$language]/*A temporary password has been sent to your mobile number.*/.'<a href="login.php" style="color: #53c2d4;"> '.$translations["M01928"][$language]/*Login*/.'</a> '. $translations["M01929"][$language]/*now*/;
											}
										    else{
												echo $translations["M01775"][$language]./*A temporary password has been sent to your email.*/ ' <a href="login.php" style="color: #53c2d4;">'.$translations["M01928"][$language]/*Login*/.'</a> '. $translations["M01929"][$language]/*now*/;
											}
										   ?>
                                             
                                        </div>
										

                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
	
<div class="modal fade" id="videoModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
           
          <div class="modal-body">
			<video id="videoID" width="100%" controls>
				<source src="https://s3-ap-southeast-1.amazonaws.com/com.nuxpay/sendandreceivefund/main_send.mp4" type="video/mp4" >
			 </video>
		  </div>
        </div>
    </div>
</div>
    
    <!-- <div class="container">
            <div class="row">
                <div class="col">
                1 of 2
                </div>
                <div class="col">
                2 of 2
                </div>
            </div>
    </div> -->
</body>
<?php include 'sharejsDashboard.php'; ?>
<script src="js/jquery.qrcode.js" type="text/javascript"></script>
<script>
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 1;
	var pageNumber      = 1;
	var formData        = {};
	var fCallback       = "";
	var accessToken = "<?php echo $_SESSION['access_token'];?>";
	var sendFundParam = <?php $sendFundParam = $_POST['sendFundParam']; echo json_encode($sendFundParam, true);?>;
	var dataParam = <?php $data = $_POST['data']; echo json_encode($data, true);?>;
	var transaction_token = "<?php echo $_POST['transaction_token'];?>";
	var url             = 'scripts/reqPaymentGateway.php';

    $(document).ready(function () {
		
		if(transaction_token != ''){
			setInterval(function(){
				formData  = {
				  command: 'getSendFundTransactionStatus',
				  transactionToken : transaction_token
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
		
        // $('#kt_header').css('padding-bottom', '20px');
        // $('#kt_header').css('border-bottom-style', 'solid');
        // $('#kt_header').css('border-bottom-width', '1px');
        // $('#kt_header').css('border-bottom-color', '#e1e1ef');
        $('#languageDiv').css('border-style','none');
		
		$('#videoModal').on('shown.bs.modal', function (e) {
			$('#videoID').trigger('play');
		})
		
		$('#videoModal').on('hidden.bs.modal', function (e) {
			$('#videoID').trigger('pause');
		})
        
		
		$('#amount').text(sendFundParam.amount + ' ' + sendFundParam.symbol);
			$('#receiverName').text(sendFundParam.receiver_name);
		
		if(sendFundParam.receiver_type == 'email'){
			$('#emailDiv').show();
			$('#mobileDiv').hide();
			
			$('#receiverEmail').text(sendFundParam.receiver_email_address);
			
		}
		else if(sendFundParam.receiver_type == 'mobile'){
			$('#emailDiv').hide();
			$('#mobileDiv').show();
			
			$('#receiverNumber').text('+' + sendFundParam.receiver_mobile_number);			
        }

        var createQRAddress = dataParam.data.wallet_type+':'+dataParam.data.external_address;
        
        
        var toShow = false;
        // if (toShow) {
        //     $('#successDiv').show();
        //     $('#qrDiv').hide();
        // } else {
        //     $('#successDiv').hide();
            if ($(window).width() < 991) {
                $('#qrDiv').qrcode({
                    render: "canvas", 
                    text: createQRAddress,
                    width: 100,
                    height: 100,
                    background: "#ffffff",
                    foreground: "#000000",
                    src: 'images/nuxPay270.png',
                    imgWidth: 40,
                    imgHeight: 40
                });            
            } else {
                $('#qrDiv').qrcode({
                    render: "canvas", 
                    text: createQRAddress,
                    width: 150,
                    height: 150,
                    background: "#ffffff",
                    foreground: "#000000",
                    src: 'images/nuxPay270.png',
                    imgWidth: 40,
                    imgHeight: 40
                });
            }
        // }
        
        // $('#qrDiv').hide();

    });
	
	$('#newTxBtn').click(function(){
		$.redirect("sendFund.php");
						
	});
	
	function openSendVideo(){
		$('#videoModal').modal('toggle');
    }
    
    $("#copyBtn").click(function(){        

        $("#urlInput").select();
        document.execCommand("copy");

        swal.fire({
            position:"center",
            type:"success",
            title:"<?php echo $translations["M00137"][$language]; /*  now to receive fund */ ?>",
            showConfirmButton:!1,
            timer:1500
        })
    });

    $("#urlInput").click(function(){        

        $("#urlInput").select();
        document.execCommand("copy");

        swal.fire({
            position:"center",
            type:"success",
            title:"<?php echo $translations["M00137"][$language]; /*  now to receive fund */ ?>",
            showConfirmButton:!1,
            timer:1500
        })
    });
</script>
