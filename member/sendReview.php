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
                                    <div class="col-sm-12 col-md-12 col-lg-5 customPaddingSendReceive1" id="nuxPaySection01ImgDiv2">                                    
                                        
                                        <div class="row justify-content-center" style="padding-bottom:20px">
                                            <h2 class="customColor"><?php echo $translations["M01781"][$language]; /* Review details of your transaction*/ ?></h2>
                                        </div>

                                        <!-- transaction details -->
                                        <div class='container-fluid' style="border:1px solid #dee2e6; padding:10px 20px">                                        
                                            <div class="row justify-content-between" style="padding:10px 0px">
                                                <div class="col-sm customLighter">
                                                    <?php echo $translations["M01782"][$language]; /* Transaction details*/ ?>
                                                </div>
                                                <div class="col-sm" style="text-align:right">
                                                    <a href="#" class='editBtn'><?php echo $translations["M01789"][$language]; /* Edit */ ?></a>
                                                </div>
                                            </div>

											<div class="row justify-content-between" style="padding-top:10px; padding-bottom:10px; display:none;" id="currencyID">
												<div id="type" class="col-4 mt-0 d-flex align-items-center">
													Currency
												</div>
<!--
												<div id="currency" class="col-xl-8 col-lg-8 col-md-6 col-12 qrTitle7" style="text-transform: uppercase;">
												</div>
-->

												<div class="walletTypeDropdown2" style="display:block;">
													<select id="walletDropdown" class="full-width selectValue"></select>
												</div>
											</div>
											
                                            <div class="row justify-content-between" style="padding-top:10px; padding-bottom:20px">
                                                <div class=" col-sm-4">
                                                     <?php echo $translations["M01783"][$language]; /* You send */ ?>
                                                </div>
                                                <div class="col-sm-8" style="text-align:right; color:black; font-weight:500" id="amount" >
                                                    0
                                                </div>
                                            </div>
                                            <div class="row justify-content-between" style="padding-top:10px; padding-bottom:20px">
                                                <div class=" col-sm-4">
                                                    Escrow
                                                </div>
                                                <div class="col-sm-8" style="text-align:right; color:black; font-weight:500" id="escrowStatus" >
                                                    0
                                                </div>
                                            </div>
                                            <hr style="">
                                            
                                            <div class="row justify-content-between" style="padding-bottom:10px; padding-top:20px">
                                                <div class=" col-sm customLighter">
                                                     <?php echo $translations["M01784"][$language]; /* Recipient details */ ?>
                                                </div>
                                                <div class="col-sm" style="text-align:right">
                                                    <a href="#"  class='editBtn'><?php echo $translations["M01789"][$language]; /* Edit */ ?></a>
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

                                       
                                        <button type="button" class="btnRequest btn btn-primary btn-block mt-5" id="confirmBtn"><span style="customThickerFont"><?php echo $translations["M01788"][$language]; /* Confirm*/ ?></span></button>

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
<script>
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 0;
	var pageNumber      = 1;
	var formData        = {};
	var fCallback       = "";
	var accessToken = "<?php echo $_SESSION['access_token'];?>";
	var sendFundParam = <?php $sendFundParam = $_POST['sendFundParam']; echo json_encode($sendFundParam, true);?>;
	var transaction_token = "<?php echo $_POST['transaction_token']?>";
	var receiver_name = "";
	var receiver_email_address = "";
	var receiver_mobile_number = "";
	var receiver_type = "";
	var wallet_type = "";
	var amount = "";
	var symbol = "";
	var ori_amount = "";
	var ori_symbol ="";
	var ori_wallet_type ="";
	var includeWalletDropdownListBusiness = <?php $includeWalletDropdown = $sys['includeWalletDropdownListBusiness']; echo json_encode($includeWalletDropdown); ?>;

    $(document).ready(function () {
        // $('#kt_header').css('padding-bottom', '20px');
        // $('#kt_header').css('border-bottom-style', 'solid');
        // $('#kt_header').css('border-bottom-width', '1px');
        // $('#kt_header').css('border-bottom-color', '#e1e1ef');
		
		formData  = {
            command: 'getWalletType'
            // command: 'getWalletBalance',
            // wallet_status: checkWalletStatus
        };
        fCallback = getWalletType; 
        ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        function getWalletType(data,message){
            // var wallets = data.result.coin_data;
            var wallets = data.result.coin_data;

            if (wallets ) {
                $.each(wallets, function(key, val){
					var selected ="";
//                    if(val['wallet_type'] == 'tetherusd' || val['wallet_type'] == 'ethereum' || val['wallet_type'] == 'bitcoin'){
                        $('#walletDropdown').append('<option dataName="'+ val['name'] +'" data-image="'+val['image']+'" value="'+ val['wallet_type'] +'"'+selected+' >'+ val['display_symbol'] +'</option> ')
//                    }/
                    
                });
                dropdownFake = 1;
            }


            $('#walletDropdown').select2({
                 dropdownAutoWidth : true,
				 width: 'auto',
//				width: '200px',
//			    minimumResultsForSearch: Infinity,
                templateResult: formatState,
                templateSelection: formatState
            });


			$('#walletDropdown').val(wallets[0].wallet_type).trigger("change");
			
			selectedWalletType = wallets[0].wallet_type;
			
       

        }
		
		if(transaction_token != ''){
			formData  = {            
                command: 'webpaysendfunddetailsget',
                transaction_token: transaction_token
            };

			fCallback = getSendFundDetails;
			ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		}
		else{
			$('#amount').text(sendFundParam.amount + ' ' + sendFundParam.symbol);
			$('#receiverName').text(sendFundParam.receiver_name);
			$("#escrowStatus").text(sendFundParam.escrow == "1"? "On":"Off");


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
		}
        $('#languageDiv').css('border-style','none');
		
		$('#videoModal').on('shown.bs.modal', function (e) {
			$('#videoID').trigger('play');
		})
		
		$('#videoModal').on('hidden.bs.modal', function (e) {
			$('#videoID').trigger('pause');
		})
		
		
		
		$('#walletDropdown').on('change', function (e) {
			var to_wallet_type = $('select#walletDropdown option:selected').val();
						
			fCallback = getConversionAmountDetails;

			if(ori_amount != ''){
				formData  = {
				  command: 'webpayconversionamountget',
				  amount: ori_amount,
				  walletType: ori_wallet_type,
				  toWalletType: to_wallet_type
				};    
				ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
			}
			
		});
        
    });
	
	function getSendFundDetails(data, messsage){
		if(data.code == 1){
			receiver_name = data.data.receiver_name;
			receiver_type = data.data.receiver_type;
			amount = data.data.amount;
			wallet_type =  data.data.wallet_type;
			symbol = data.data.symbol;
			var business_id = data.data.business_id.toString();
	
			$('#walletDropdown').val(wallet_type).trigger("change");
//			$('select#walletDropdown option:selected').val(wallet_type).trigger("change");
			
			
			ori_amount = amount;
			ori_wallet_type = wallet_type;
			ori_symbol = symbol;
			
			$('.editBtn').hide();
			$('#amount').text(data.data.amount + " " + data.data.symbol);
			$('#receiverName').text(data.data.receiver_name);
			
			var includeWalletDropdown = includeWalletDropdownListBusiness.includes(business_id);
			
			if(includeWalletDropdown == true){
				$('#currencyID').show();
				$('#type').css('display', 'flex');
			}
			
			if(data.data.receiver_type == 'mobile'){
				$('#mobileDiv').show();
				$('#emailDiv').hide();
				$('#receiverNumber').text(data.data.receiver_mobile_number);
				receiver_mobile_number = data.data.receiver_mobile_number;
				
			}else if(data.data.receiver_type == 'email'){
				$('#mobileDiv').hide();
				$('#emailDiv').show();
				$('#receiverEmail').text(data.data.receiver_email_address);
				receiver_email_address = data.data.receiver_email_address;
				
					
			}
			
        }     
	}
	
	$('#confirmBtn').click(function(){
		fCallback = confirmSendFund;
		//
		//		formData  = {
		//			command: 'webpaysendfundrequest',
		//			sender_email_address :$('#payeeEmailAddress').val(),
		//			sender_mobile_number : payeeMobileNumber,
		//			sender_type : payerType,
		//			receiver_name: $('#payeeName').val(),
		//			receiver_email_address :  $('#payerEmailAddress').val(),
		//			receiver_mobile_number :payerMobileNumber,
		//			receiver_type :  payeeType,
		//			amount : $('#amount').val(),
		//			wallet_type :  selectedWalletType,
		//			description :  $('#description').val(),
		//		};
		
		if (parseFloat(sendFundParam.balance) < parseFloat(sendFundParam.amount)){
			showMessage("<?php echo $translations["M01916"][$language]; /*  Insufficient Funds. */ ?>", 'warning', "ERROR", 'warning', '');
            return;
    
		}

		if(transaction_token != ''){
			var sender_email = "<?php echo $_SESSION["email"] ?>";
            var sender_mobile_number = "<?php echo $_SESSION["mobile"] ?>";
            var sender_name = "<?php echo $_SESSION["name"];?>";
			var sender_type = 'mobile';
			if(sender_mobile_number != ''){
				sender_type = 'mobile';
			}
			else{
				sender_type = 'email';
			}
			  formData  = {            
				sender_name: sender_name,
				sender_email_address :sender_email,
				sender_mobile_number : sender_mobile_number,
				sender_type : sender_type,
				receiver_name: receiver_name,
				receiver_email_address :  receiver_email_address,
				receiver_mobile_number :receiver_mobile_number,
				receiver_type :  receiver_type,
				amount : amount,
				wallet_type : wallet_type,
				description :  "",
				escrow : "0",
				symbol: symbol,
				transaction_token: transaction_token
            }; 
			
			sendFundParam = formData;
		}
		else{
			formData = sendFundParam;
			
		}
		formData.command = 'webpaysendfundrequest';

		ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	
	});
	
	$('.editBtn').click(function(){
		$.redirect("sendFund.php", {
			sendFundParam: sendFundParam
		});
	});
	
	function confirmSendFund(data, message){    
		if(data.code == 1){
            if(data.data.error_code == -103) {
                var customStatus = "<?php echo $translations["M01917"][$language]; /* Submitted request successfully*/ ?>";
                showMessage(customStatus, 'success', 'Success', 'check-circle-o', ['<?php echo $sys['domain']?>/sendCompleted.php', {data:data ,sendFundParam: sendFundParam, transaction_token: transaction_token}] );    
            } else {
                showMessage(data.message_d, 'success', 'Success', 'check-circle-o', ['<?php echo $sys['domain']?>/sendCompleted.php', {data:data ,sendFundParam: sendFundParam, transaction_token: transaction_token}] );
            }
			

        }        		
	}
	
	function openSendVideo(){
		$('#videoModal').modal('toggle');
	}
	
	function formatState (method) {
		if (!method.id) {
			return method.text;
		} 


		var optimage = $(method.element).attr('data-image')
		if(!optimage){
		return method.text;
		} else {                    
			var $opt = $(
						'<span><img src="'+optimage+'" class="walletTypeIcon" /> <span style="vertical-align: middle; color:black;">' + method.text + '</span></span>'
			);
			return $opt;
		}
	}
	
	function getConversionAmountDetails(data, messsage){
		if(data.code == 1){
			var converted_amount = data.data.converted_amount;
			var to_symbol = data.data.to_symbol;
			var to_wallet_type =data.data.to_wallet_type;
			
			amount = converted_amount;
			wallet_type = to_wallet_type;
			$('#amount').text(converted_amount + ' ' +to_symbol);	
			
        }     
	}
</script>
