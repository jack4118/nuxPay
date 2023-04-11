<?php include 'include/config.php'; ?>
<?php include 'headHomepage.php'; ?>

<?php
if((isset($_POST['access_token']) && $_POST['access_token'] != "")) {
		$_SESSION["access_token"] = $_POST['access_token'];
		$_SESSION["business"]["uuid"] = $_POST['businessID'];
}

    if(  isset($_POST['mobile_phone']) ) {
        $_SESSION["mobile_phone"] = $_POST['mobile_phone'];    
    }

    if(  isset($_POST['email_address']) ) {
        $_SESSION["mobile_phone"] = $_POST['mobile_phone'];    
    }
 ?>

<body>
<div class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed kt-page--loading">
<div class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed kt-page--loading">

<?php include 'headerHomapage.php'; ?>

<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor customSend" style="">
        <section class="nuxPaySection01BG">
            <div class="kt-container ">
                <div class="row justify-content-center customPaddingSendReceive" style="padding-bottom: 250px">
                    <div class="col-11">
                        <div class="row">
                            <div class="col-12 row">
                                <div id="nuxPaySection01Content01" class="col-sm-12 col-md-12 col-lg-7" >                                    
                                    <div class="customSendReceiveLeft"  style="">
                                        <h1>
                                            <?php echo $translations["M01823"][$language]; /*  Receive payments globally */ ?>
                                        </h1>
                                        <button type="button" class="btn custonButtonSend" style="margin-top:25px;"  onclick="openReceiveVideo()">
                                                <img src="images/sendandreceive/video-icon.png"> &nbsp &nbsp <?php echo $translations["M01758"][$language]; /*  See how we receive fund */ ?>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-5" id="nuxPaySection01ImgDiv2">                                                                                                     

                                    <!-- Request Reedem -->
                                    <?php if($_SESSION['access_token'] != '') {?>
                                        <div class="row" style="padding-bottom:25px">                                    

                                            <!-- Request -->
                                            <div class="col-sm-6 receiveNotSelect">
                                                <a href="receiveFund.php" style="color:black;">
                                                    <div class="row justify-content-center">
                                                        <span>                                                                                                            
                                                            <?php echo $translations["M01792"][$language]; /*  Received */ ?>
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- Request -->

                                            <!-- Redeem -->
                                            <div class="col-sm-6 receiveSelect" style="">
                                                <a>                                        
                                                    <div class="row justify-content-center">
                                                        <span> 
                                                            <?php echo $translations["M01759"][$language]; /*  Redeem */ ?>
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- Redeem -->
                                        </div>
                                        <?php } ?>
                                    <!-- Request Reedem -->

                                                                        

                                    <!-- receiver -->
                                    <input type="text" class="form-control requestInput" id="redemptionPin" placeholder="<?php echo $translations["M01798"][$language]; /*  Enter Redemption PIN */ ?>" value="<?php echo $_POST['redeem_code']; ?>">
                                    <!-- receiver -->                       

                                    

                                    <button id="continueButton" onclick="clickContinue()" type="button" class="btnRequest btn btn-primary btn-block mt-5"><?php echo $translations["M01780"][$language]; /*  Continue */ ?></button>

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
</div>

<div class="modal fade" id="videoModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
           
          <div class="modal-body">
			<video id="videoID" width="100%" controls>
				<source src="https://s3-ap-southeast-1.amazonaws.com/com.nuxpay/sendandreceivefund/main_receive.mp4" type="video/mp4" >
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

<?php include 'sharejsHomepage.php'; ?>
<script>

    var code = "<?php echo $_POST['code']; ?>";
    var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 1;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";       
    var accessToken = "<?php echo $_SESSION['access_token']; ?>";                                        

    $(document).ready(function () {
        if(!accessToken){            
            $.redirect("newsignup.php");            
        }
        $('#languageDiv').css('border-style','none');   
		
		$('#videoModal').on('shown.bs.modal', function (e) {
			$('#videoID').trigger('play');
		})
		
		$('#videoModal').on('hidden.bs.modal', function (e) {
			$('#videoID').trigger('pause');
		})
    });   

    //  click continue button
    function clickContinue(e) {             
        var redemptionPin = $('#redemptionPin').val();
        
        if(!redemptionPin) {
            var message = "<?php echo $translations["M01799"][$language]; /*  Please enter redemption PIN */ ?>";
            errorOutput(message);
            return false;
        }

        formData = {
            command : 'webpayredeemcodedetailsget',            
            redeem_code : redemptionPin,
        };        
        
        console.log(formData);
        fCallback = verifiedSuccess;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);                                
    }

    function verifiedSuccess(data, message) {        
        var setData = data.data;        

        setData['payment_amount'] =  data.data.amount;
        setData['payer_email_address'] = data.data.sender_email_address;
        setData['payer_name'] = data.data.sender_name;
        setData['payer_mobile_phone'] = data.data.sneder_mobile_number;
        setData['symbol'] = data.data.symbol;
        setData['redeem_code'] = data.data.redeem_code;
        setData['payment_description'] = data.data.description;
        setData['payeeName'] = data.data.recipient_name;
		
        $.redirect("receiveReview.php", setData);
    }

    function errorOutput(message){        
		showMessage(message, 'warning', '', 'warning', '');
	}
	
	function openReceiveVideo(){
		$('#videoModal').modal('toggle');
	}

</script>
