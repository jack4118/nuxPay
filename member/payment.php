<?php include 'include/config.php'; ?>
<?php include 'headHomepage.php'; ?>

<?php
if((isset($_POST['access_token']) && $_POST['access_token'] != "")) {
		$_SESSION["access_token"] = $_POST['access_token'];
		$_SESSION["business"]["uuid"] = $_POST['businessID'];
}
 ?>

<body class="">
	<div class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed kt-page--loading">

		<?php include 'headerHomapage.php'; ?>

		<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor paymentBG">

				<section class="paymentHeader">
					<div class="text-center">
						<h1 class="paymentTitle">Request Fund</h1>
					</div>
				</section>

				<div class="paymentWhiteForm">
					<div class="col-12">
						<div class="row">
							<div class="col-12">
								<div class="row justify-content-md-between">
									<div class="col-md-12" style="margin-bottom: 10px;">
										<div class="row">
											<div class="col-xl-1 col-lg-1 col-4 px-0 paymentBold">
												Request By:
											</div>
											<div class="col-xl-11 col-lg-11 col-8">
												<div class="row">
													<div class="col-12" id="payeeName">
														Apple Store
													</div>
													<div class="col-12" id="payeePhone">
														+60 15 6940292
													</div>
													<div class="col-12" id="payeeEmail">
														-
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12 pl-10 mt-4 mt-md-0">
										<div class="row">
											<div class="col-xl-1 col-lg-1 col-4 px-0 paymentBold">
												Reference No:
											</div>
											<div class="col-xl-11 col-lg-11 col-8" id="paymentNo">
												12345678
											</div>
										</div>
										<div class="row">
											<div class="col-xl-1 col-lg-1 col-4 px-0 paymentBold">
												Status:
											</div>
											<div class="col-xl-11 col-lg-11 col-8" id="paymentStatus">
												Waiting for Payment
											</div>
										</div>
										<div class="row" id="totalPaidRow">
											<div class="col-xl-1 col-lg-1 col-4 px-0 paymentBold">
												Paid Amount:
											</div>
											<div class="col-xl-11 col-lg-11 col-8" id="totalPaid">
												0.00
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 mt-5 px-0 paymentTitle">
								Payment Info
							</div>
							<div class="col-12 mt-3 px-0" id="showresultListing">
								<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
								    <div class="table-responsive" id="transactionHistoryListDiv"></div>
								    <div class="m-datatable__pager m-datatable--paging-loaded clearfix " style="padding-bottom: 10px">
								        <div class="m-datatable__pager-info">
								            <span class="m-datatable__pager-detail"></span>
								        </div>
								    </div>   
								</div>

							</div>
							<div class="col-12 px-0 mt-1">
								<div class="row">
									<div class="col-md-8 order-2 order-md-1">
										<div class="row">
											<div class="col-12 paymentTitle py-0 mt-5">
												Your Info
											</div>
											<div class="col-12 mt-5">
												<div class="row">
													<div class="col-12">
														<div class="form-group row">
															<div class="col-xl-1 col-lg-1 col-4 paymentBold">
																Name:
															</div>
															<div class="col-xl-11 col-lg-11 col-8" id="payerName">
															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-xl-1 col-lg-1 col-4 paymentBold">
																Email:
															</div>
															<div class="col-xl-11 col-lg-11 col-8" id="payerEmail">
															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-xl-2 col-lg-2 col-4 pr-0 paymentBold">
																Mobile Number:
															</div>
															<div class="col-xl-10 col-lg-10 col-8" id="payerPhone">
															</div>
														</div>
													</div>
													<!-- <div class="col-12 paymentBtn">
														<button class="btn btnRequest" id="editDetails">Save Changes</button>
													</div> -->
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4 text-md-right text-center mt-2 mt-md-5 order-1 order-md-2" id="paymentBtnWrapper">
										<a href="" id="paymentNext" target="_self">
											<?php if($sys['isWhitelabel'] != 1){
												echo '<img src="'.$sys['paymentBtnImage'].'" class="paymentNuxBtn">';
											}
											else{
												echo '<button class="btn btn-primary waves-effect waves-light paymentNuxBtn">Pay with '.$sys['companyName'].'</button>';
											}
											?>
										</a>
									</div>
								</div>
							</div>

							<div class="col-12 px-0">

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

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal body -->
      <div class="modal-body paymentModalBody">
        	<div class="row justify-content-center paymentModalContent">
        		<div class="col-12 text-center py-4">
        			<img src="images/nuxPay/paymentSuccessIcon.png" alt="" width="200px">
        		</div>
        		<div class="col-12 text-center py-3">
        			<b class="d-block">Your payment is successful</b>
        			<span class="d-block text-grey mt-1">Thank you for your payment. Please check invoice for transaction details.</span>
        		</div>
        		<div class="col-lg-3 col-md-4 text-center">
        			<button class="btn btnRequest" data-dismiss="modal">Done</button>
        		</div>
        	</div>
      </div>

    </div>
  </div>
</div>

</body>

</html>
<?php include 'sharejsHomepage.php'; ?>

<!-- <script>
	AOS.init({
		once: true
	});
</script> -->

<script>



	window.ajaxEnabled = true;

    var url             = 'scripts/reqPaymentGateway.php';
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 1;
	var pageNumber      = 1;
	var formData        = "";
	var fCallback       = "";
	var getToken 		= "<?php echo $_GET['token']?>";
	var payer_id;
	var symbol;
	var searchTab;
	var status;
	var divId    = 'transactionHistoryListDiv';
	var tableId  = 'transactionHistoryListTable';
	var pagerId  = 'transactionHistoryPager';
	var btnArray = {};
	var thArray  = Array(
	    
	        'Item',
	        'Price',
	        'Quantity',
	        'Total'
	    );

	$(document).ready(function() {

		searchTab = "Request Fund";
		status = "success";

		$('#paymentNext').attr('href', '/qrPayment.php?transaction_token='+getToken);
		// $("#paymentNext").click(function() {
		// 	console.log(getToken);
		// 	$.redirect('qrPayment.php', {
		// 		transaction_token: getToken
		// 	});
		// });

		if('<?php echo $_POST['searchData'] ?>' != "") {
		    searchCallBack();
		} else{
		    // formData  = {
		    //     command     : 'getWithdrawalList',
		    //     status      : status,
		    //     page        : pageNumber
		    // };

		    // fCallback = loadPaymentDetails;
		    // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		}

		formData = {
			command : 'getPaymentDetails',
			transaction_token : getToken
		};
		fCallback = loadPaymentDetails;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	});



	// $('#editDetails').click(function() {

	// 	var new_payer_name = $("#payerName").val();
	// 	var new_payer_mobile = $("#payerPhone").val();
	// 	var new_payer_email = $("#payerEmail").val();
		
	// 	formData = {
	// 		command : "payment_gatewaypayerdetailset",
	// 		invoice_detail_id : payer_id,
	// 		new_payer_name : new_payer_name,
	// 		new_payer_email : new_payer_email,
	// 		new_payer_mobile : new_payer_mobile
	// 	}
	// 	fCallback = editBusinessDetails;
	// 	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	// });

	function editBusinessDetails(data, message){
		showMessage(message, 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', 'check-circle-o', '');
	}

	function copyTxt(id) {
		var text = $("#"+id).attr('data-fullTxt');

		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val(text).select();
		document.execCommand("copy");
		$temp.remove();

		$("#"+id).find(".inputTick").show();
	}

	function encrypt(w) {
		return w.substring(0, 6)+"..."+w.substr(w.length-6);
	} 

	function loadPaymentDetails(data, message) {
		var tableNo;
		var inv = data.data.invoice_detail;
		var paymentItemList = data.data.payment_item_list;
		 var total_paid;
		 if(!inv.total_paid){
		 	total_paid = 0;
		 }else{
		 	total_paid = inv.total_paid;
		 }
		if (paymentItemList && paymentItemList.length > 0){
			$("#showErrorMsg").hide();
			$("#showresultListing").show();
			
			var newList = [];
            tableRowDetails = [];
			$.each(paymentItemList, function(k, v) {
				var rebuildData = {
					item_name : sanitize(v['item_name']),
					unit_price : sanitize(v['unit_price']),
					quantity : sanitize(v['quantity']),
					total_price: sanitize(v['total_price'])
			};
			newList.push(rebuildData);
			});
		}
		else
        {
        	$('#showErrorMsg').show();
        	$('#showresultListing').hide();
        }
		payer_id = inv.id;
		if (inv.status != "pending" && inv.total_paid > 0){
			$('#totalPaidRow').show();
		} else {
			$('#totalPaidRow').hide();
		}
		var symbol = inv.symbol.toUpperCase();
		 $("#payeeName").text(inv.payee_name);
		 $("#payeePhone").text(inv.payee_mobile_phone);
		 $("#payeeEmail").text(inv.payee_email_address);
		 $("#paymentNo").text(inv.payment_id);
		 var paymentStatusMsg = "";
		 if(inv.status=="pending") {
		 	paymentStatusMsg = "Waiting for payment";
		 } else if(inv.status=="success") {
		 	paymentStatusMsg = "Paid";
		 } else {
		 	paymentStatusMsg = "Short-Paid";
		 }
		 $("#paymentStatus").html('<span class="paymentStatus '+inv.status+'">'+paymentStatusMsg+'</span>');
		 $("#totalPaid").html(total_paid + ' '+ symbol );
		 $("#payerName").html(inv.payer_name ? inv.payer_name : '-');
		 $("#payerPhone").html(inv.payer_mobile_phone ? inv.payer_mobile_phone : '-');
		 $("#payerEmail").html(inv.payer_email_address ? inv.payer_email_address : '-');
		symbol = inv.symbol.toUpperCase();
		// $("#paymentDescription").text(inv.payment_description);
		// $("#paymentAmount").text(inv.payment_amount + " USDT");
		 $("#grandTotal").text(inv.payment_amount + " USDT");

		if(inv.status != "success"){
			$("#paymentBtnWrapper").show();
		}else{
			$("#paymentBtnWrapper").hide();
		}

		//EXAMPLE
		// var tableNo;
        // var withdrawalList = data.data.withdrawal_listing;
        // img_list = data.data.crypto_img_list;
        // symbol_list = data.data.crypto_symbol_list;

        // if(withdrawalList && withdrawalList.length > 0) {
        // 	$('#showErrorMsg').hide();
        // 	$('#showresultListing').show();

        //     var newList = [];
        //     tableRowDetails = [];
        //     $.each(withdrawalList, function(k, v) {
        //         v['wallet_type'] = v['wallet_type'].toLowerCase();
        //         if (searchTab == "API Integration"){
        //             v['destination_address'] = v['recipient_external'] ? v['recipient_external'] : v['recipient_internal'];
        //         }
        //         tableRowDetails.push(v);


        //         var rebuildData = {
        //             withdrawal_amount : v['withdrawal_amount'],
        //             miner_fee: v['miner_fee'],
        //         	nett_amount : v['amount'],
        //         	amount : v['amount']
        //         };

        //         newList.push(rebuildData);
        //     });
        // }
        // else
        // {
        // 	$('#showErrorMsg').show();
        // 	$('#showresultListing').hide();
        // }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);

       	$('#'+tableId).find('tbody tr').each(function(){
            $(this).addClass("removeBackgorundColor");
        });

        $('#'+tableId).find('tbody').append('<tr style="background-color: #000; color: #fff; font-size: 15px; font-weight: 500"><td style="padding: 25px">Grand Total</td><td></td><td></td><td style="padding: 25px">'+inv.payment_amount+' '+symbol+'</td></tr>');

        $('#'+tableId).find('thead tr').each(function(){
            $(this).find('th:eq(1)').css('text-align', "right");
            $(this).find('th:eq(2)').css('text-align', "right");
            $(this).find('th:eq(3)').css('text-align', "right");
        });

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find('td:eq(1)').css('text-align', "right");
            $(this).find('td:eq(2)').css('text-align', "right");
            $(this).find('td:eq(3)').css('text-align', "right");
        });

		// var tl = data.data.transaction_list;
		// if(tl.length > 0) {
		// 	$("#paymentSuccessWrapper").show();
		// 	$("#paymentBtnWrapper").hide();

		// 	$("#paymentSuccessStatus").text(tl[0].status);
		// 	$("#paymentSuccessAmount").text(tl[0].amount);

		// 	$("#paymentSuccessTo").html(encrypt(tl[0].recipient_address) + " <i class='fa fa-check inputTick' style='display:none'></i>");
		// 	$("#paymentSuccessTo").attr("data-fullTxt", tl[0].recipient_address);

		// 	$("#paymentSuccessFrom").html(encrypt(tl[0].sender_address) + " <i class='fa fa-check inputTick' style='display:none'></i>");
		// 	$("#paymentSuccessFrom").attr("data-fullTxt", tl[0].sender_address);

		// 	$("#paymentSuccessHash").html(encrypt(tl[0].transaction_hash) + " <i class='fa fa-check inputTick' style='display:none'></i>");
		// 	$("#paymentSuccessHash").attr("data-fullTxt", tl[0].transaction_hash);
		// }
		

		/*
			invoice_detail:
			id: 40
			payee_email_address: "hychong.ttwoweb@gmail.com"
			payee_mobile_phone: "+60173039139"
			payee_name: "kate"
			payer_email_address: "text@b.c"
			payer_mobile_phone: "+60166299613"
			payer_name: "test"
			payment_address: "0x410064a8dd3c392268c0d5cd8833f3964c88b9d8"
			payment_amount: "10.00000000"
			payment_currency: "tetherusd"
			payment_description: "test test"
			status: "pending"
		*/
	}

</script>
