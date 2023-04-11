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
                    <div class="row justify-content-center customPaddingSendReceive1" style="">
                        <div class="col-11">
                            <div class="row">
                                <div class="col-12 row">

                                    <div id="nuxPaySection01Content01" class="col-sm-12 col-md-12 col-lg-7" >    
                                        <div class="row h-50 d-flex align-items-end">
                                            <h1>
                                                <?php echo $translations["M01757"][$language]; /*  Receive payments globally */ ?>
                                            </h1>
                                        </div>     
                                        <div class="row">
                                            
                                            <button type="button" class="btn custonButtonSend" style="margin-top:25px;"  onclick="openReceiveVideo()">
                                                <img src="images/sendandreceive/video-icon.png"> &nbsp &nbsp <?php echo $translations["M01758"][$language]; /*  See how we receive fund */ ?>
                                            </button>
                                        
                                        </div>   
                                    </div>
                                                                    
                                    <!-- <div id="nuxPaySection01Content01" class="col-sm-12 col-md-12 col-lg-7" >                                    
                                        <div class="customSendReceiveLeft"  style="">
                                            <h1>
                                                <?php echo $translations["M01757"][$language]; /*  Receive payments globally */ ?>
                                            </h1>
                                            <button type="button" class="btn custonButtonSend" style="margin-top:25px;" onclick="openReceiveVideo()">
                                                <img src="images/sendandreceive/video-icon.png"> </img> &nbsp &nbsp <?php echo $translations["M01758"][$language]; /*  See how we receive fund */ ?>
                                            </button>
                                        </div>
                                            
                                    </div> -->
                                    <div class="col-sm-12 col-md-12 col-lg-5" id="nuxPaySection01ImgDiv2">                                                                            
                                        
                                    <!-- Request Reedem -->
                                    <?php if($_SESSION['access_token'] != '') {?>
                                        <div class="row" style="padding-bottom:40px">                                    


                                        <?php if($_POST['redeem_code'] != '') {?>
                                            <!-- Request -->
                                            <div class="col-sm-6 receiveNotSelect">
                                                <a href="receiveFund.php" style="color:black;">
                                                    <div class="row justify-content-center">
                                                        <span>                                                
                                                            <?php echo $translations["M00160"][$language]; /*  Request */ ?>
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
                                        <?php } else {?>
                                            <!-- Request -->
                                            <div class="col-sm-6 receiveSelect">
                                                <a href="receiveFund.php">
                                                    <div class="row justify-content-center">
                                                        <span>                                                
                                                            <?php echo $translations["M00160"][$language]; /*  Request */ ?>
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- Request -->

                                            <!-- Redeem -->
                                            <div class="col-sm-6 receiveNotSelect" style="">
                                                <a>                                        
                                                    <div class="row justify-content-center">
                                                        <span> 
                                                            <?php echo $translations["M01759"][$language]; /*  Redeem */ ?>
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- Redeem -->
                                        <?php } ?>
                                            
                                        </div>
                                    <?php } ?>
                                    <!-- Request Reedem -->

                                        <div id="successDiv" class="row justify-content-center" style="padding-bottom:20px; display:none;"> 
                                            <img src="images/sendandreceive/success-icon.png"> </img>
                                        </div>

                                        <div id="reviewDiv" class="row justify-content-center " style="padding-bottom:20px; padding-top: 20px">
                                            <h2 class="customColor">
                                                <?php if($_POST['redeem_code'] != '') {?>
                                                    <?php echo $translations["M01795"][$language]; /*  Review details of your redemption */ ?>
                                                <?php } else { ?>
                                                    <?php echo $translations["M01767"][$language]; /*  Review details of your transaction */ ?>
                                                <?php } ?>                                                
                                            </h2>
                                        </div>

                                        <div id="submitSuccessDiv" class="row justify-content-center" style="padding-bottom:20px; margin: 0 15px; text-align:center;display:none">
                                            <h2 class="" style="color:green">
                                            <?php if($_POST['redeem_code'] != '') {?>
                                                <?php echo $translations["M01796"][$language]; /*  Redemption Successful! */ ?>!                                                
                                            <?php } else {?>
                                                <?php echo $translations["M01768"][$language]; /*  Your request has been submitted successfully */ ?>
                                            <?php } ?>
                                            </h2>
                                        </div>
                                        

                                        <!-- transaction details -->
                                        <div class='container-fluid' style="border:1px solid #dee2e6; padding:10px 20px; background-color:white">                                        

                                            <div id="urlDiv" style="display:none;">
                                                <div style="padding-bottom:10px;">
                                                    <div class="input-group">
                                                        
                                                    <input type="text" id="urlInput" class="form-control requestInput" aria-label="Text input with dropdown button" placeholder="" value="" readonly>
                                                    
                                                    <div class="input-group-append" style="min-width: 70px;">
                                                        <button id="copyBtn" class="btn btnRequest col rounded-0 " style="margin-top:19px;padding: 0 19px ;" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="tetherusd"> <?php echo $translations["M01590"][$language]; /*  Copy */ ?> </button>                                                            
                                                    </div>
                                                </div>
                                                    
                                                   
                                                    
                                                    <!-- Facebook -->
                                                    <a id="FB" target="_blank"  href=""><img src="images/share icon/fb.png" style="width:25px;height:25px;"> </a>
                                                    <!-- Twitter -->
                                                    <a id="TW" target="_blank" href=""><img src="images/share icon/twitter.png" style="width:25px;height:25px;"> </a>
                                                    <!-- Whatsapp -->
                                                    <a id="WS"target="_blank" href="" data-action="share/whatsapp/share"><img src="images/share icon/whatsapp.png" style="width:25px;height:25px;"> </a>
                                                    <!-- Weibo -->
                                                    <a id="WB"target="_blank" href=""><img src="images/share icon/weibo.png" style="width:25px;height:25px;"> </a>
                                                    <!-- Telegram -->
                                                    <a id="TG"target="_blank" href=""><img src="images/share icon/telegram.png" style="width:25px;height:25px;"> </a>

                                                </div>

                                                <hr style="">
                                            </div>


                                            <div class="row justify-content-between" style="padding:10px 0px">
                                                <div class="col-sm customLighter">
                                                    <?php echo $translations["M01769"][$language]; /*  Transaction details */ ?>
                                                </div>
                                                <div class="col-sm" style="text-align:right">
                                                    <?php if($_POST['redeem_code'] != '') {?>

                                                    <?php } else {?>
                                                        <div class="edit">
                                                            <a class="" href="#">
                                                                <?php echo $translations["M01162"][$language]; /*  Edit */ ?>
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div id="yourNameDiv" class="row justify-content-between customReviewRow" style="">
                                                <div class=" col-sm-4">
                                                <?php echo $translations["M01511"][$language]; /*  Your name */ ?>
                                                </div>
                                                <div class="col-sm-8" style="text-align:right;" >                                                    
                                                    <?php echo $_POST['payeeName']; ?>
                                                </div>
                                            </div>


                                            <?php if($_POST['redeem_code'] != '') {?>
                                                
                                                <!-- Redemption PIN -->
                                                <div id="redeemPinDiv" class="row justify-content-between customReviewRow" style="">
                                                    <div class=" col-sm-4">
                                                    <?php echo $translations["M01794"][$language]; /*  Redemption PIN */ ?>
                                                    </div>
                                                    <div class="col-sm-8" style="text-align:right;" >                                                    
                                                        <?php echo $_POST['redeem_code']; ?>
                                                    </div>
                                                </div>
                                                <!-- Redemption PIN -->
                                            <?php } else {?>
                                                <!-- Your mobile -->
                                                <div id="payeeMobileDiv" class="row justify-content-between customReviewRow" style="">
                                                    <div class=" col-sm-4">
                                                        <?php echo $translations["M01770"][$language]; /*  Your mobile */ ?>
                                                    </div>
                                                    <div class="col-sm-8" style="text-align:right;" >                                                    
                                                        <?php echo $_POST['payee_mobile_phone']; ?>
                                                    </div>
                                                </div>
                                                <!-- Your mobile -->

                                                <!-- Your email -->
                                                <div id="payeeEmailDiv" class="row justify-content-between customReviewRow" style="">
                                                    <div class=" col-sm-4">
                                                        <?php echo $translations["M01771"][$language]; /*  Your email */ ?>
                                                    </div>
                                                    <div class="col-sm-8" style="text-align:right;" >
                                                        <?php echo $_POST['payee_email_address']; ?>
                                                    </div>
                                                </div>
                                                <!-- Your email -->
                                            <?php } ?>

                                            <div id="receiveDiv" class="row justify-content-between customReviewRow" style="">
                                                <div class=" col-sm-4">
                                                    <?php echo $translations["M01772"][$language]; /*  Amount to receive */ ?>
                                                </div>
                                                <div id="receiveAmount" class="col-sm-8" style="text-align:right; color:black; font-weight:500" >
                                                    <?php echo $_POST['payment_amount']; ?>
                                                </div>
                                            </div>
                                            <div id="descriptionDiv" class="row justify-content-between customReviewRow" style="padding-bottom:10px">
                                                <div class=" col-sm-5">
                                                    <?php echo $translations["M01571"][$language]; /*  Payment description */ ?>
                                                </div>
                                                <div class="col-sm-7" style="text-align:right;" >
                                                    <?php echo ($_POST['payment_description']); ?>
                                                </div>
                                            </div>
                                            <hr style="">
                                            
                                            <div class="row justify-content-between customReviewRow" style="padding-top:10px">
                                                <div class=" col-sm customLighter">
                                                    <?php echo $translations["M01773"][$language]; /*  Payer details */ ?>
                                                </div>
                                                <div class="col-sm" style="text-align:right">
                                                <?php if($_POST['redeem_code'] != '') {?>

                                                <?php } else {?>
                                                    <div class="edit">
                                                        <a class="" href="#">
                                                            <?php echo $translations["M01162"][$language]; /*  Edit */ ?>
                                                        </a>
                                                    </div>
                                                <?php } ?>
                                                </div>
                                            </div>

                                            <div class="row justify-content-between customReviewRow" style="">
                                                <div class="col-sm">
                                                    <?php echo $translations["M01774"][$language]; /*  Name */ ?>
                                                </div>
                                                <div class="col-sm customThickerFont" style="text-align:right">
                                                    <?php echo $_POST['payer_name']; ?>
                                                </div>
                                            </div>

                                            <div id="payerEmailDiv" class="row justify-content-between customReviewRow" style="">
                                                <div class="col-sm">
                                                    <?php echo $translations["M00169"][$language]; /*  Email */ ?>
                                                </div>
                                                <div class="col-sm customThickerFont" style="text-align:right">
                                                    <?php echo $_POST['payer_email_address']; ?>
                                                </div>
                                            </div>
                                            <div id="payerMobileDiv" class="row justify-content-between customReviewRow" style="">
                                                <div class="col-sm">
                                                    <?php echo $translations["M01522"][$language]; /*  Mobile */ ?>
                                                </div>
                                                <div class="col-sm customThickerFont" style="text-align:right">
                                                    <?php echo $_POST['payer_country_code']; ?><?php echo $_POST['payer_mobile_phone']; ?>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        
                                                           

                                        <button id="confirmBtn" type="button" onclick="goToInvoice()" class="btnRequest btn btn-primary btn-block mt-5"><span style="customThickerFont"><?php echo $translations["M01011"][$language]; /*  Confirm */ ?></span></button>
                                        <div id="newDiv" style="display:none">

                                            <?php if($_POST['redeem_code'] != '') {?>
                                                <button id="newBtn" type="button" onclick="newRedemption()" class="btnRequest btn btn-primary btn-block mt-5"><span style="customThickerFont"><?php echo $translations["M01777"][$language]; /*  New Transaction */ ?></span></button>
                                            <?php } else {?>

                                                <?php if($_SESSION['access_token'] != '') {?>
                                                    <button id="newBtn" type="button" onclick="newTransaction()" class="btnRequest btn btn-primary btn-block mt-5"><span style="customThickerFont"><?php echo $translations["M01777"][$language]; /*  New Transaction */ ?></span></button>
                                                    <p class="customColor" style="padding-top:10px">                                                                                             
                                                <?php } else { ?>
                                                    <button id="newBtn" type="button" onclick="newTransaction()" class="btnRequest btn btn-primary btn-block mt-5"><span style="customThickerFont"><?php echo $translations["M01777"][$language]; /*  New Transaction */ ?></span></button>
                                                    <p class="customColor" style="padding-top:10px">                                             
                                                    <?php echo $translations["M01775"][$language]; /*  A temporary password has been sent to your email */ ?>.
                                                    <a href="login.php"><?php echo $translations["M00418"][$language]; /*  Login */ ?></a> 
                                                    <?php echo $translations["M01776"][$language]; /*  now to receive fund */ ?>.</p>
                                                <?php }  ?>
                                            <?php } ?>
                                            
                                        </div>
                                        <?php if($_POST['redeem_code'] != '') {?>
                                            <div class="row justify-content-center" style="padding-top:15px;">
                                                <a class="edit" href="#">
                                                    < <?php echo $translations["M01797"][$language]; /*  Back */ ?>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        

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

<?php include 'sharejsDashboard.php'; ?>
<script>

    var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var payeeType;
    var payerType;

    var payment_url;
    var payeeName = '<?php echo $_POST['payee_name']; ?>';
    var payeeEmail = '<?php echo $_POST['payee_email_address']; ?>';
    var payeeMobileNumber = '<?php echo ($_POST['payee_mobile_phone']) ? $_POST['payee_mobile_phone'] : ''; ?>';
    var payerName = '<?php echo $_POST['payer_name']; ?>';
    var payerEmail = '<?php echo $_POST['payer_email_address']; ?>';
    var payerMobileNumber = '<?php echo $_POST['payer_mobile_phone']; ?>';
    var payerCountryCode = '<?php echo $_POST['payer_country_code']; ?>';
    var amount = '<?php echo $_POST['payment_amount']; ?>';
    var paymentDescription = '<?php echo $_POST['payment_description']; ?>';
    var payeeDialingArea = '<?php echo $_POST['payeeDialingArea']; ?>';
    var phoneNumber = '<?php echo $_POST['payeeMobileNumber']; ?>';
    var referralCode = '<?php echo $_POST['referral_code']; ?>';
    var userCode = '<?php echo $_POST['userCode']; ?>';
	var walletType = '<?php echo $_POST['walletType']?>';
    var symbol = '<?php echo $_POST['symbol']?>'; 
    var redeemCode = '<?php echo $_POST['redeem_code']?>';
    var toggle_new_address = '<?php echo $_POST['toggle_new_address']?>';

    $('#receiveAmount').text('<?php echo $_POST['payment_amount']; ?> ' + symbol);    

    $(document).ready(function () {
				console.log('<?php echo json_encode($_POST, true);?>');
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
        
        if(payerEmail==""){
        $('#payerEmailDiv').hide();
        payerType = "mobile";
        }
        if(payerMobileNumber==""){
            $('#payerMobileDiv').hide();
            payerType = "email";
        }
        if(payeeEmail==""){
            $('#payeeEmailDiv').hide();
            payeeType = "mobile";
        }
        if(payeeMobileNumber==""){
            $('#payeeMobileDiv').hide();
            payeeType = "email";
        }

    });    
    
    $('.edit').click(function() {

        if (redeemCode) {
            $.redirect('redeemFund.php', {                
                redeem_code: redeemCode
            });
        } else {            
            $.redirect('receiveFund.php', {
                payeeName: payeeName,
                payeeEmail: payeeEmail,
                payeeMobileNumber: payeeMobileNumber,
                payerName: payerName,
                payerEmail: payerEmail,
                payerMobileNumber: (payerCountryCode+payerMobileNumber).substring(1),
                payerCountryCode: payerCountryCode,
                amount: amount,
                paymentDescription: paymentDescription,
                countryNumber : payeeDialingArea,
                phoneNumber : phoneNumber,
                referralCode : referralCode,
                isBack: 'yes',
                userCode: userCode
            });
        }        
    });

    function goToInvoice() {
        if (redeemCode) {
            formData = {
                command : 'webpayredeempin',
                redeem_code : redeemCode                
            };

            fCallback = confirmationSuccess;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $(".btnRequest").prop('disabled', true);
            $(".btnRequest").addClass('unclickable');

            setInterval(function(){
                $(".btnRequest").prop('disabled', false);
                $(".btnRequest").removeClass('unclickable');
            },10000);
        } else {
            paymentItemList = [];	
                paymentItemList.push({
                    "item_name" : paymentDescription,
                    "unit_price" : amount,
                    "unit_quantity" : "1"
                });
            formData = {
                command : 'requestFundConfirmation',
                currency: walletType,
                payee_name : payeeName,
                payee_email_address : payeeEmail,
                payee_mobile_phone : payeeMobileNumber,
                payer_name : payerName,
                payer_email_address : payerEmail,
                payer_dialing_area : payerCountryCode,
                payer_mobile_phone : payerMobileNumber,
                payment_amount : amount,
                payment_description : paymentDescription,
                payee_type : payeeType,
                payment_item_list : paymentItemList,
                payer_type : payerType,
                referral_code : referralCode,
                toggle_new_address: toggle_new_address,
                signup_type : 'requestFund',
            };

            fCallback = confirmationSuccess;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $(".btnRequest").prop('disabled', true);
            $(".btnRequest").addClass('unclickable');

            setInterval(function(){
                $(".btnRequest").prop('disabled', false);
                $(".btnRequest").removeClass('unclickable');
            },10000);
        }        
    }


    function confirmationSuccess(data,message) {

        if (redeemCode) {
            $('#successDiv').show();
            $('#submitSuccessDiv').show();
            $('#confirmBtn').hide();
            $('#newDiv').show();
            $('#reviewDiv').hide();
        } else {
            var payeeName = data.data.payeeName; 
            var payeeEmail = data.data.payeeEmail;
            var payeeMobileNumber = data.data.payeeMobileNumber;
            var payerName = data.data.payerName; 
            var payerEmail = data.data.payerEmail;
            var payerMobileNumber = data.data.payerMobileNumber;
            var payerCountryCode = data.data.payerCountryCode;
            var amount = data.data.amount;
            var paymentDescription = data.data.paymentDescription;
            var payeeDialingArea = data.data.payeeDialingArea;
            var phoneNumber = data.data.payeeMobileNumber;
            var url = data.data.shorten_url;
            var newBusiness = data.data.newBusiness;

            $('#urlInput').val(url);  
            $('#FB').attr("href", "http://www.facebook.com/sharer.php?u="+url+"");      
            $('#TW').attr("href", "http://twitter.com/share?text=Visit the link &url="+url+"");
            //$('#WS').attr("href", "https://web.whatsapp.com://send?text="+url+"");   
            $('#WS').attr("href","https://web.whatsapp.com://send?url="+url+"");   
            $('#WB').attr("href", "http://service.weibo.com/share/share.php?url="+url+""); 
            $('#TG').attr("href", "https://t.me/share/url?url="+url+"");  
            //$('#IN').attr("href", "http://www.linkedin.com/shareArticle?mini=true&url="+url+"");   
            //$('#EM').attr("href", "mailto:? cc= yfan0901@gmail.com &subject=Payment Info &body="+url+"");   
            $('#successDiv').show();
            $('#urlDiv').show();
            
            $('#reviewDiv').hide();
            $('#submitSuccessDiv').show();
            $('.edit').hide();
            
            $('#confirmBtn').hide();
            $('#newDiv').show();
        }                
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
//On click to copy the URL
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


    
    function newTransaction(){
        $.redirect('receiveFund.php');
    }

    function newRedemption(){
        $.redirect('redeemFund.php');
    }
	
	function openReceiveVideo(){
		$('#videoModal').modal('toggle');
	}
</script>
