<?php include 'include/config.php'; ?>
<?php include 'storeAds.php'; ?> 

<?php
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
$_SESSION['lastVisited'] = $thisPage;
// if ($_SESSION['paymentGatewayStatus']==0 || !$_SESSION['paymentGatewayStatus']) {
//  header("Location: paymentGatewayCheckStatus.php");
// }
?>

<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">

				<div class="col-12 pageHeader mt-3 mb-5">				    
					<?php echo $translations["M01494"][$language]; /* Request Fund */ ?>
				</div>

				<div class="d-flex align-items-center">
					<div class="col-12">
						<div class="d-flex border-bottom">
							<nav class="nav">
							  <a class="nav-link active" href="#">
							  	<?php echo $translations["M00160"][$language]; /* Request */ ?>	
							  </a>
							  <a class="nav-link" href="invoiceListing.php">
							  	<?php echo $translations["M01657"][$language]; /* History */ ?>	
							  </a>
							</nav>
						</div>
					</div>
				</div>
			</div>

			<div class="m-content">

				<div class="col-12 px-0" id="payeeInfoDiv">
					<div class="innerPageTitle">
						<?php echo $translations["M01554"][$language]; /* Your Info */ ?>	
					</div>
				</div>

				<div class="mt-3" id="payeeInfoDiv2" style="display: none;">

					<div class="col-xl-12 px-0" style="">
						<div class="m-portlet m-portlet--tab">
							<div class="m-portlet__body">

								<div class="row">
									<div class="col-12">
										<div class="row m-form">
											<div class="col-12">
												<div class="row">
													<div class="col-12">
														<div class="row">
															<div class="form-group col-md-6">
																<label class="capitalStyle">
																	<?php echo $translations["M00268"][$language]; /* Name */ ?>
																</label>
																<input type="text" class="form-control" id="payeeName" value="">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>



				<div class="col-12 px-0">
					<div class="innerPageTitle">
						<?php echo $translations["M01556"][$language]; /* Payer Info */ ?>
					</div>
					<div class="innerPageSubTitle">
						<?php echo $translations["M01675"][$language]; /* The person who you requested money from */ ?>
					</div>
				</div>

				<div class="mt-3">

					<div class="col-xl-12 px-0" style="">
						<div class="m-portlet m-portlet--tab">
							<div class="m-portlet__body">

								<div class="row">
									<div class="col-12">
										<div class="row m-form">
											<div class="col-12">
												<div class="row">
													<div class="col-12">
														<div class="row">
															<div class="form-group col-md-6">
																<label class="capitalStyle">Name</label>
																<input type="text" class="form-control" id="payerName" value="<?php echo $_POST['payerName']; ?>">
															</div>
														</div>
														<div class="row">
															<!-- <div class="form-group col-md-6">
																<label class="capitalStyle">Email</label>
																<input type="text" class="form-control" id="payerEmail" value="<?php echo $_POST['payerEmail']; ?>">
															</div> -->
															<div class="form-group col-md-6">
																<label id="lblMobile" class="capitalStyle">
																	<?php echo $translations["M00390"][$language]; /* Mobile Number */ ?>
																</label>
																<div class="row">
																    <div class="col-3 align-self-end" id="payerCountryCode">
																        <select name="" id="payerDialingArea" class="selectOption form-control requestInput">
																            <?php include 'phoneList.php'; ?>
																        </select>
																    </div>
																    <div id="payerMobNumber" class="col-9 pl-0">
																        <input type="text" class="form-control requestInput" id="payerMobileNumber" value="<?php echo $_POST['payerMobileNumber']; ?>">
																    </div>

																	<div id="switchEmail" class= "col-12 mt-2 form-group" style="display:flex; text-decoration: underline;">
																		<a href="#">
																			<?php echo $translations["M01495"][$language]; /* Switch to Email */ ?>
																		</a>
																	</div>

																	<div id="lblEmail" class="col-12 form-group" style="display: none;">
																		<label class="capitalStyle">
																			<?php echo $translations["M01523"][$language]; /* Email */ ?>
																		</label>
																        <input type="text" class="form-control requestInput" id="payerEmail" value="<?php echo $_POST['payerMobileNumber']; ?>">
																    </div>

																	<div id="switchMobile" class= "col-12 form-group" style="display:none; text-decoration: underline; margin-top: -6px;">
																		<a href="#">
																			<?php echo $translations["M01676"][$language]; /* Switch to Mobile Number */ ?>
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>

				<div class="col-12 px-0">
					<div class="row align-items-end">
						<div class="col">
							<div class="innerPageTitle">
								<?php echo $translations["M01677"][$language]; /* Payment Info */ ?>
							</div>
							<div class="innerPageSubTitle">
								<?php echo $translations["M01678"][$language]; /* Set payment amount and describe about this payment */ ?>
							</div>
						</div>
						<div class="px-3">
							<a id="switchMode" class="txtLightBlue" href="javascript:void(0);" data-mode="lite"><u>
								<?php echo $translations["M01679"][$language]; /* Switch to Advance Mode */ ?>
							</u></a>
						</div>
					</div>
				</div>

				<div class="mt-3">

					<div class="col-xl-12 px-0" style="">
						<div class="m-portlet m-portlet--tab">
							<div class="m-portlet__body">

								<div class="row">
									<div class="col-12">
										<div class="row m-form">
											<div class="col-12">
												<div class="row">
													<!--<div class="col-12 mt-5 mb-2">
														<p class="montserratRegularFont" style="text-transform: uppercase; font-size: 15px;">Payment Details</p>
														<hr>
													</div>-->
													<div id="liteVer" class="col-12">
														<div class="row">
															<div class="form-group col-md-6">
																<label class="capitalStyle">
																	<?php echo $translations["M01680"][$language]; /* Amount To Pay */ ?>
																</label>
																<div class="input-group">
																  <!-- <input type="text" class="form-control" id="amount" value="<?php echo $_POST['amount']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"> -->
																  <input type="text" class="form-control amountToPay" id="amount" value="<?php echo $_POST['amount']; ?>" oninput="inputFunc(this)">
																  <div class="align-self-center text-center walletTypeDropdown1">
																	<select id="walletDropdownGraph" class="full-width selectValue" style="width:80px !important">
																		<option value="tetherusd">
																			<?php echo $translations["M01681"][$language]; /* USDT */ ?>	
																		</option>
																		<option value="bitcoin">
																			<?php echo $translations["M01682"][$language]; /* BTC */ ?>	
																		</option>
																		<option value="ethereum">
																			<?php echo $translations["M01683"][$language]; /* ETH */ ?>	
																		</option>
																	</select>
																</div>
																</div>
															</div>
															<div class="form-group col-md-12">
																<label class="capitalStyle">
																	<?php echo $translations["M01571"][$language]; /* Payment Description */ ?>	
																</label>
																<textarea maxlength="1000" name="" id="paymentDescription" class="form-control" rows="5"><?php echo $_POST['paymentDescription']; ?></textarea>
															</div>
														</div>
													</div>

													<div id="advanceVer" class="col-12" style="display: none;">
														<div class="row">
															<div class="col-12">
																<div class="requestAdvanceBlock">
																	<div class="requestAdvanceContent head">
																		<span class="requestAdvanceItem"></span>
																		<span class="requestAdvanceItem">Item</span>
																		<span class="requestAdvanceItem">Price</span>
																		<span class="requestAdvanceItem" style="word-wrap: break-word">
																			<?php echo $translations["M01025"][$language]; /* Quantity */ ?>	
																		</span>
																		<span class="requestAdvanceItem">
																			<?php echo $translations["M00991"][$language]; /* Total  */ ?>	(<?php echo $translations["M01681"][$language]; /* USDT */ ?>	)
																		</span>
																	</div>
																	<div id="addReqBtn" class="requestAdvanceContent addReqBtn">
																		<div class="requestAdvanceItem">
																			<i class="fa fa-plus-circle"></i>
																		</div>
																		<div class="requestAdvanceItem">
																			<?php echo $translations["M01684"][$language]; /* Add Item */ ?>	
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>	

									
								</div>

							</div>
						</div>

						<div id="grandTotalBox" class="grandTotalBox" style="display: none">
							<div class="row">
								<div class="col-8">									
									<?php echo $translations["M01685"][$language]; /* Grand Total */ ?>	
								</div>
								<div class="col-4 reqGrandTotal text-right">
								</div>
							</div>
						</div>

						<div class="col-12 px-0 my-2">
							<button onclick="goToConfirmation()" id="submitBtn" class="btn searchBtn" type="button">
								<?php echo $translations["M01419"][$language]; /* Submit */ ?>	
							</button>
						</div>
					</div>

				</div>
			</div>
		</div>
</div>
<?php include 'footerDashboard.php'; ?>
</div>
<?php include 'sharejsDashboard.php'; ?>

<div class="modal fade" id="requestFundModal" role="dialog">
    <div class="modal-dialog customeEditModal">
        <div class="modal-content" style="width: 400px">
            <div class="modal-header bg-w border-b mt-1 mb-1 pb-1 pt-1 justify-content-center">
                <div class="row m-1 p-1">
                    <div class="modalAmount col-12 text-center" id="modalAmountReceive">                        
						<?php echo $translations["M01686"][$language]; /* Share Payment Link */ ?>	
					</div>
                </div>
                
            </div>
            <div class="modal-body requestFund border-b col-12" style="line-height: 25px; border-bottom-left-radius: .3rem; border-bottom-right-radius: .3rem; padding-left:10px; padding-right:10px; padding-bottom: 20px;">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
								<div class="col-12 mt-0 pb-3">
									<a href="javascript:;" target="_blank" style="font-size:14px; word-wrap:break-word;" id="modalURL">https://thenux.com/</a>
									<img src="images/dashboard/newCopyIcon.png" style="width: 23px; padding-right:10px" id="modalCopyFundLink">
								</div>
								<!-- <div class="col-1">
									<img src="images/dashboard/newCopyIcon.png" style="width: 23px; padding-right:10px" id="modalCopyFundLink">
								</div> -->
                            </div>
						</div>
						<div class="col-12">
							<div class="row">
								<div class="col-4 pr-0">									
									<?php echo $translations["M01687"][$language]; /* Payment No */ ?>:
								</div>
								<div class="col-8" style="word-break: break-all;" id="modalPaymentId">
									
								</div>
							</div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">                                    
									<?php echo $translations["M01706"][$language]; /* Your Name */ ?>:
                                </div>
                                <div class="col-8" style="word-break: break-all;" id="modalPayerName">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-12" id="modalPayerEmailDiv">
                            <div class="row">
                                <div class="col-4 pr-0">                                    
									<?php echo $translations["M00048"][$language]; /* Email */ ?>:
                                </div>
                                <div class="col-8" style="word-break: break-all;" id="modalPayerEmail">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-12" id="modalPayerMobileDiv">
                            <div class="row">
                                <div class="col-4 pr-0">                                    
									<?php echo $translations["M00390"][$language]; /* Mobile Number */ ?>:
                                </div>
                                <div class="col-8" id="modalPayerMobile">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">                                    
									<?php echo $translations["M01688"][$language]; /* Total Amount */ ?>
                                </div>
                                <div class="col-8" id="modalTotalAmount">
                                    
								</div>
                            </div>
						</div>
						<div class="col-12">
							<button onclick="" id="newRequest" class="btn newRequestBtn col-12 mt-4" type="button">
								<?php echo $translations["M01591"][$language]; /* New Request */ ?>
							</button>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<script>
	var url             = 'scripts/reqPaymentGateway.php';
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 0;
	var formData        = "";
	var fCallback       = "";
	var phoneNumber = "<?php echo $_POST['phoneNumber']; ?>";
    var countryNumber = "<?php echo $_POST['payerCountryCode']; ?>";
	var countryCode     = "<?php echo $countryCode; ?>";
	var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';
	var myNickname = "<?php echo $_SESSION["name"]; ?>";

	var mode = "mobile";

	if (hasChangedPassword == 0){
		$.redirect('firstTimeLogin.php');
	}

	$(document).ready(function(){
		
		$('#walletDropdownGraph').select2({
            dropdownAutoWidth : true,
			minimumResultsForSearch: Infinity

            
        });

		$('#payeeName').val(myNickname);

		if(myNickname=="") {
			$('#payeeInfoDiv').show();
			$('#payeeInfoDiv2').show();
		} else {
			$('#payeeInfoDiv').hide();
			$('#payeeInfoDiv2').hide();
		}
		

		$('#addReqBtn').trigger('click');

		$('#payerEmail').hide();
		$('#switchMobile').hide();
		$('#lblEmail').hide();

		$('#switchEmail').click(function (e) {

			mode = "email";

			$('#switchEmail').hide();
			$('#payerCountryCode').hide();
			$('#payerMobNumber').hide();
			$("#lblMobile").hide();
			$('#payerEmail').show();
			$('#switchMobile').show();
			$('#lblEmail').show();
			e.preventDefault()
            
		});

		$('#switchMobile').click(function (e) {

			mode = "mobile";

			$('#switchEmail').show();
			$('#payerCountryCode').show();
			$('#payerMobNumber').show();
			$("#lblMobile").show();
			$('#payerEmail').hide();
			$('#switchMobile').hide();
			$('#lblEmail').hide();
			e.preventDefault()
		});	

		$('#switchMode').attr("data-mode", "lite");

		if(countryNumber && countryNumber != "") {
			$("#payerDialingArea").val(countryNumber);
			$("#payerDialingArea").parent().val(this.value).trigger('change');
		}else{
			$('#payerDialingArea').find('option').each(function(){
				if (countryCode != "ZZ") {
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

        
        $('.selectOption').select2({
            dropdownAutoWidth : true,
            templateSelection: format,
			width: 80
		});

		$('#payerMobileNumber').on('input', function (event) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        $("#switchMode").click(function(){
        	var currentMode = $(this).attr("data-mode");

        	if(currentMode == 'lite') {
        		$("#liteVer").hide();
        		$("#advanceVer").show();
        		$("#grandTotalBox").show();

        		$(this).text("Switch to Lite Mode");
        		$(this).attr("data-mode", 'advance');
        	}else{
        		$("#liteVer").show();
        		$("#advanceVer").hide();
        		$("#grandTotalBox").hide();

        		$(this).text("Switch to Advance Mode");
        		$(this).attr("data-mode", 'lite');
        	}


        });

	});

	$("#addReqBtn").click(function(){
		$(this).before(`
			<div class="requestAdvanceContent userInpReq">
				<span class="requestAdvanceItem" onclick="removeItem(this)">
					<i class="fa fa-minus-circle"></i>
				</span>
				<span class="requestAdvanceItem">
					<input class="reqItem form-control data-payment_item_name" type="text" name="" value="">
				</span>
				<span class="requestAdvanceItem">
					<input class="reqPrice form-control data-payment_unit_price" type="text" name="" oninput="inputFunc(this)" value="">
				</span>
				<span class="requestAdvanceItem">
					<input class="reqQty form-control data-payment_unit_quantity" style="min-width: 39px" type="text" name="" oninput="inputFunc(this)" value="">
				</span>
				<span class="reqTotal requestAdvanceItem" style="word-break: break-all">0</span>
			</div>
		`);

		
	});

	$('#newRequest').click(function(){
		$('#requestFundModal').modal('hide');
		$("#payerName").val("");
        $("#payerEmail").val("");
        // $("#payerDialingArea").val("");
        $("#payerMobileNumber").val("");
        $("#amount").val("");
        $("#paymentDescription").val("");

        $('.userInpReq').remove();
        $('#addReqBtn').trigger('click');


        myNickname = $('#payeeName').val();
        $('#payeeInfoDiv').hide();
		$('#payeeInfoDiv2').hide();

	});

	$("#requestFundModal").on("hidden.bs.modal", function () {
		$('#newRequest').trigger('click');
	});


	function inputFunc(e) {
		 e.value = e.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');

		 var getInd = $(".userInpReq").index($(e).parent().parent());

		 var price = $(".reqPrice").eq(getInd).val();
		 var qty = $(".reqQty").eq(getInd).val();
		 qty = qty==""?0:qty;
		 price = price==""?0:price;

		 var total = qty*price;
		
		$(".reqTotal").eq(getInd).text(parseFloat(total).toFixed(2));

		calcTotal();
	}

	function calcTotal() {
		var grandTotal = 0;

		$(".reqTotal").each(function(){
			 grandTotal += parseFloat($(this).text());
		});

		$(".reqGrandTotal").text(parseFloat(grandTotal).toFixed(2));
	}


	function removeItem(ele) {
		$(ele).parent().remove();
		calcTotal();
	}

	function format(val) {
        return val.id;
	}


    function runModal(data) {
		payment_info = data.data;

		$('#requestFundModal').modal();
		$('#modalURL').html(payment_info['shorten_url']);
		$('#modalURL').attr('href', payment_info['shorten_url']);
		$('#modalPaymentId').html(payment_info['payment_id']);
		$('#modalPayerName').html(payment_info['payer_name']);
		$('#modalPayerEmail').html(payment_info['payer_email_address']);
		$('#modalPayerMobile').html(payment_info['payer_mobile_phone']);
		$('#modalTotalAmount').html(payment_info['total_amount'] + " " + payment_info['symbol'].toUpperCase());
		$('#modalCopyFundLink').click(() =>
            copyToClipboard(payment_info['shorten_url'])
		);

		if(mode=="mobile") {
			$("#modalPayerMobileDiv").show();
			$("#modalPayerEmailDiv").hide();
		} else {
			$("#modalPayerMobileDiv").hide();
			$("#modalPayerEmailDiv").show();
		}
	}

	function goToConfirmation() {
		var currentMode = $("#switchMode").attr("data-mode");
		var paymentItemList = [];
        var payerName = $("#payerName").val();
        var payerEmail = $("#payerEmail").val();
        var payerDialingArea = $("#payerDialingArea").val();
        var payerMobileNumber = $("#payerMobileNumber").val();
        var amount = $("#amount").val();
        var paymentDescription = $("#paymentDescription").val();
		var regex = "/^[A-Za-z0-9 ]+$/";


		var payeeName = $('#payeeName').val();

		if (payeeName == '') {			
			var message = "<?php echo $translations["M01258"][$language]; /* Please enter your name */ ?>.";
            errorOutput(message);
            return false;
        }

        if (payerName == '') {			
			var message = "<?php echo $translations["M01689"][$language]; /* Please enter Payer Name */ ?>";
            errorOutput(message);
            return false;
        }
  //       else{
		// 	if(/[^a-zA-Z., ]/.test(payerName)){
		// 		var message = "Special character or number is not allowed for Payer Name";
		// 		errorOutput(message);
		// 		return false;
		// 	}
		// }
		
        if (mode=="email" && payerEmail == '') {
			var message = "Please enter Payer Email";
            errorOutput(message);
            return false;
        }

        if(mode=="mobile") {

        	if (payerDialingArea == '') {
				var message = "Please enter Payer Dialing Area";
	            errorOutput(message);
	            return false;
	        }
	        if (payerMobileNumber == '') {
				var message = "Please enter Payer Mobile Number";
	            errorOutput(message);
	            return false;
	        }else{
				if(/[^0-9.]/.test(payerMobileNumber)){
					var message = "Only numbers and symbols are allowed for mobile number";
					errorOutput(message);
					return false;
				}
			}

        }
        
		if (currentMode == 'lite'){
			if (amount == '') {
				var message = "Please enter amount";
				errorOutput(message);
				return false;
			}else{
				if(/[^0-9.]/.test(amount)){
					var message = "Only numbers and symbols are allowed for amount";
					errorOutput(message);
					return false;
				}
			}
			paymentItemList = [];	
			paymentItemList.push({
				"item_name" : paymentDescription,
				"unit_price" : amount,
				"unit_quantity" : "1"
			});
		} else {
			paymentItemList = [];
			var payment_item_count = $(".userInpReq").length;

			if (payment_item_count == 0) {
				var message = "Item list cannot be empty";
				errorOutput(message);
				return false;
			}

			for (var i=0; i<payment_item_count; i++){
				var item_name = $('.data-payment_item_name').eq(i).val();
				var item_price = $('.data-payment_unit_price').eq(i).val();
				var item_quantity = $('.data-payment_unit_quantity').eq(i).val();

				if (item_name == ""){
					var message = "Item name cannot be empty";
					errorOutput(message);
					return false;
				}

				if (item_price == "" || item_price == 0){
					var message = "Item price cannot be empty";
					errorOutput(message);
					return false;
				} else {
					if(/[^0-9.]/.test(item_price)){
						var message = "Only numbers and symbols are allowed for price";
						errorOutput(message);
						return false;
					}
				}

				if (item_quantity == "" || item_quantity == 0){
					var message = "Item quantity cannot be empty";
					errorOutput(message);
					return false;
				} else {
					if(/[^0-9]/.test(item_quantity)){
						var message = "Only numbers are allowed for quantity";
						errorOutput(message);
						return false;
					}
				}
				paymentItemList.push({
					"item_name" : item_name,
					"unit_price" : item_price,
					"unit_quantity" : item_quantity
				});
			}
		}

		var payee_type = "mobile";
		if("<?php echo $_SESSION["mobile"]; ?>"=="") {
			payee_type = "email";
		}

		var walletType = $('select#walletDropdownGraph option:selected').val();

        formData = {
            command : 'requestFundConfirmation',
            currency: walletType,
			// payee_name : payeeName,
			// payee_email_address : payeeEmail,
			// payeeDialingArea : payeeDialingArea,
			// payee_mobile_phone : payeeDialingArea+payeeMobileNumber,
			payee_type : payee_type,
			payee_name : payeeName,
			payee_email_address : "<?php echo $_SESSION["email"]; ?>",
			payee_mobile_phone : "<?php echo $_SESSION["mobile"]; ?>",
			payer_type: mode,
            payer_name : payerName,
            payer_email_address : payerEmail,
            payer_dialing_area : payerDialingArea,
            payer_mobile_phone : payerMobileNumber,
            payment_amount : amount,
			payment_description : paymentDescription,
			payment_item_list : paymentItemList,
			set_my_name : (myNickname=="" ? true : false)
        };
        fCallback = verifiedSuccess;
        
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function verifiedSuccess(data, message) {
		runModal(data);
	}
	
	function errorOutput(message){
		showMessage(message, 'warning', '', 'warning', '');
	}

    function copyToClipboard(val){
        var dummy = document.createElement("input");
        document.body.appendChild(dummy);
        dummy.setAttribute("id", "dummy_id");
        document.getElementById("dummy_id").value=val;
        dummy.select();
        document.execCommand("copy");
        document.body.removeChild(dummy);
        swal.fire({
            position:"center",
            type:"success",
            title:"<?php echo $translations["M00137"][$language]; /* Copied to clipboard  */?>",
            showConfirmButton:!1,
            timer:1000
        })
    }
</script>
