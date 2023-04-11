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
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

				<section class="paymentBannerWrapper">
					<div class="paymentBanner">
						<img src="images/nuxPay/paymentBanner.jpg" alt="" width="100%">
					</div>
					<div class="paymentTitleWrapper">
						<h1 class="paymentTitle">Payment</h1>
					</div>
				</section>

				<section class="payeeInfoWrapper">
					<div class="kt-container payeeInfo">
						<div class="row justify-content-between">
							<div>
								<p class="mb-1">Payee: <b id="payeeName">&nbsp;</b></p>
								<p class="my-0" id="payeePhoneNumber">&nbsp;</p>
							</div>
							<div>
								<table>
									<tr><td>Payment No </td><th id="paymentNo">: &nbsp;</th></tr>
									<tr><td>Payment Status </td><th id="paymentStatus">: &nbsp;</th></tr>
									<tr><td>Total Paid </td><th id="totalPaid">: &nbsp;</th></tr>
								</table>
							</div>
						</div>
					</div>
				</section>

				<section class="paymentDescriptionWrapper">
					<div class="kt-container">
						<div class="row">
							<div class="col-md-3 left">
								<div class="d-flex align-items-center">
									<img src="images/nuxPay/payment1.png" alt="" class="mr-3" width="35px">
									<div>
										<b class="d-block">Payer: </b>
										<span class="d-block" id="payerName">&nbsp;</span>
									</div>
								</div>
								<div class="d-flex align-items-center mt-5">
									<img src="images/nuxPay/payment2.png" alt="" class="mr-3" width="35px">
									<div>
										<b class="d-block">Mobile Phone: </b>
										<span class="d-block" id="payerPhone">&nbsp;</span>
									</div>
								</div>
								<div class="d-flex align-items-center mt-5">
									<img src="images/nuxPay/payment3.png" alt="" class="mr-3" width="35px">
									<div>
										<b class="d-block">Email: </b>
										<span class="d-block" id="payerEmail">&nbsp;</span>
									</div>
								</div>
							</div>
							<div class="col-md-9 right">
								<div class="paymentDescriptionBlock">
									<div class="row mx-0 py-2">
										<div class="col-6"><b>Description</b></div>
										<div class="col-6 text-right"><b>Amount to Pay</b></div>
									</div>
									<div class="row mx-0 paymentDescription py-2 mt-2">
										<div class="col-6 wrapText" id="paymentDescription">&nbsp;</div>
										<div class="col-6 text-right pr-2" id="paymentAmount">&nbsp;</div>
									</div>
									<div class="row mx-0 py-2 my-2">
										<div class="col-12 text-right pr-2">Grand Total: <b id="grandTotal">&nbsp; USDT</b></div>
									</div>
								</div>

								<div id="paymentBtnWrapper" class="row">
									<div class="col-12 text-right my-3">
										<a href="javascript:;" id="paymentBtn">
											<img src="images/nuxPay/paymentBtn.png" alt="" width="150px">
										</a>
									</div>
								</div>

								<!-- <div id="paymentSuccessWrapper" class="row" style="display: none">
									<div class="col-lg-5 my-3">
										<div class="py-3">
											<b>Payment Info:</b>
										</div>
										<div class="d-flex align-items-center">
											<span class="paymentInfoTitle">Status: </span>
											<span class="paymentInfoContent" id="paymentSuccessStatus">Success</span>
										</div>
										<div class="d-flex align-items-center mt-2">
											<span class="paymentInfoTitle">Amount: </span>
											<span class="paymentInfoContent" id="paymentSuccessAmount">1,000 USD</span>
										</div>
										<div class="d-flex align-items-center mt-2">
											<span class="paymentInfoTitle">To: </span>
											<span class="paymentInfoContent" id="paymentSuccessTo">0xb832aa3...34e8d872</span>
											<a class="copyBtn ml-2" href="javascript:;" onclick="copyTxt('paymentSuccessTo')"><i class="fa fa-copy"></i></a>
										</div>
										<div class="d-flex align-items-center mt-2">
											<span class="paymentInfoTitle">From: </span>
											<span class="paymentInfoContent" id="paymentSuccessFrom">0xeaf4c81...0ba5b736</span>
											<a class="copyBtn ml-2" href="javascript:;" onclick="copyTxt('paymentSuccessFrom')"><i class="fa fa-copy"></i></a>
										</div>
										<div class="d-flex align-items-center mt-2">
											<span class="paymentInfoTitle">Transaction Hash: </span>
											<span class="paymentInfoContent" id="paymentSuccessHash">0x690b79d...eda44732</span>
											<a class="copyBtn ml-2" href="javascript:;" onclick="copyTxt('paymentSuccessHash')"><i class="fa fa-copy"></i></a>
										</div>
									</div>
								</div> -->
								
							</div>
						</div>
					</div>
				</section>

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
<?php include 'footerHomepage.php'; ?>
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

	$(document).ready(function() {

		formData = {
			command : 'getPaymentDetails',
			transaction_token : getToken
		};
		fCallback = loadPaymentDetails;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		$("#paymentBtn").click(function() {
			$.redirect('qrPayment.php', {
				transaction_token: getToken
			});
		});

	});

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

		var inv = data.data.invoice_detail;
		var total_paid;
		if(!inv.total_paid){
			total_paid = 0;
		}else{
			total_paid = inv.total_paid;
		}

		$("#payeeName").text(inv.payee_name);
		$("#payeePhoneNumber").text(inv.payee_mobile_phone);
		$("#paymentNo").text(": "+inv.id);
		$("#paymentStatus").html(`: <span class="paymentStatus ${inv.status}">${inv.status=="pending"?"Waiting for payment":(inv.status=="success"?"Paid":"Short-Paid")}</span>`);
		$("#totalPaid").html(": " + total_paid + " USDT");
		$("#payerName").text(inv.payer_name);
		$("#payerPhone").text(inv.payer_mobile_phone);
		$("#payerEmail").text(inv.payer_email_address);
		$("#paymentDescription").text(inv.payment_description);
		$("#paymentAmount").text(inv.payment_amount + " USDT");
		$("#grandTotal").text(inv.payment_amount + " USDT");

		if(inv.status != "success"){
			$("#paymentBtnWrapper").show();
		}else{
			$("#paymentBtnWrapper").hide();
		}
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
