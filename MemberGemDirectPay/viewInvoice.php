<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<!-- <div class="m-subheader marginTopHeader">
				<div class="d-flex align-items-center">
					<div class="mr-auto">
						<div class="col-12">
							<div class="row">
								<div class="dashboardTitleWidth">
									<img src="images/dashboard/transactionIcon.svg" style="width: 30px; margin-top: 5px;" />
								</div>
								<div class="dashboardTitleWidth2">
									<div class="row">
										<div class="col-12 dashboardTitle">
											Invoice Listing
										</div>
										<div class="col-12 dashboardTitleDesc">
											You can view all the invoices here for request fund
										</div>
									</div>
								</div>
							</div>      
						</div>
					</div>  
				</div>
			</div> -->



			<div class="m-content marginTopHeader">

                <div class="col-xl-12" id="showErrorMsg">
                	<div class="invoiceBlock">
                		<div class="requestPaymentLink">
                		    <div class="row">
                		        <div class="col-lg-1 col-md-3">
                		            <img class="paymentIcon" src="images/nuxPay/paymentIcon.png" alt="" width="100%">
                		        </div>
                		        <div class="col-lg-11 col-md-8">
                		        	<div class="row align-items-center">
                		        		<div class="col-12">
                		        			<span class="d-block">An invoice has been created successfully. Send it to payer and request for payment.</span>
                		        		</div>
                		        		<div class="col-12 mt-2">
                		        			<div class="row">
                		        				<div class="col-lg-6 col-md-12">
                		        					<div class="d-flex">
                		        					    <input id="urlInput" type="text" class="form-control requestInput rounded-0" disabled>
                		        					    <span id="inputTick" style="margin-top: 20px;line-height: 37px;color: green; display: none">
                		        					        <i class="fa fa-check"></i>
                		        					    </span>
                		        					    <button id="copyBtn" class="btn btnRequest col rounded-0"><i class="fa fa-copy"></i> Copy</button>
                		        					</div>
                		        				</div>
                		        				<div class="col-lg-8 col-md-12">
                		        				    <!-- <div class="d-flex">
                		        				        <a href="javascript:;" class="btn btn-media facebook"><i class="fa fa-facebook"></i></a>
                		        				        <a href="javascript:;" class="btn btn-media whatsapp"><i class="fa fa-whatsapp"></i></a>
                		        				        <a href="javascript:;" class="btn btn-media telegram"><i class="fa fa-telegram"></i></a>
                		        				        <a href="javascript:;" class="btn btn-media wechat"><i class="fa fa-wechat"></i></a>
                		        				    </div> -->
                		        				</div>
                		        			</div>
                		        		</div>
                		        	</div>
                		        </div>
                		        
                		    </div>
                		</div>

    		        	<div class="row justify-content-center align-items-center mt-4">
    		        		<div class="col-11 border-bottom py-2">
    		        			<span class="d-block bigText">PAYER INFO</span>
    		        		</div>
    		        	</div>

    		        	<div class="row justify-content-center align-items-center mt-3">
    		        		<div class="col-11">
    		        			<table class="invoiceTable" width="100%">
    		        				<tr>
    		        					<th>Payer Name</th>
    		        					<td id="payerName"></td>
    		        				</tr>
    		        				<tr>
    		        					<th>Payer Mobile Phone</th>
    		        					<td id="payerEmail"></td>
    		        				</tr>
    		        				<tr>
    		        					<th>Payer Email</th>
    		        					<td id="payerPhone"></td>
    		        				</tr>
    		        			</table>
    		        		</div>
    		        	</div>

    		        	<div class="row justify-content-center align-items-center mt-4">
    		        		<div class="col-11 border-bottom py-2">
    		        			<span class="d-block bigText">PAYMENT DETAILS</span>
    		        		</div>
    		        	</div>

    		        	<div class="row justify-content-center align-items-center my-3">
    		        		<div class="col-11">
    		        			<table class="invoiceTable" width="100%">
    		        				<tr>
    		        					<th>Amount to Pay</th>
    		        					<td id="paymentAmount"></td>
    		        				</tr>
    		        				<tr>
    		        					<th>Payment Description</th>
    		        					<td id="paymentDescription"></td>
    		        				</tr>
    		        				<tr>
    		        					<th>Status</th>
    		        					<td id="paymentStatus"></td>
    		        				</tr>
    		        				<tr>
    		        					<th>Total Paid</th>
    		        					<td id="grandTotal"></td>
    		        				</tr>
    		        			</table>
    		        		</div>
    		        	</div>
                		
                	</div>
					<!-- <div class="m-portlet m-portlet--tab">
						                    <div class="m-portlet__body">
						                        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
						 		<div class="col-12">                           		
							    	<div class="invoiceBlock"></div>
						    	</div>
						                        </div>
						                    </div>
					</div> -->
				</div>

				<div class="col-xl-12 mt-3" id="showresultListing">
					<div class="m-portlet m-portlet--tab">
	                    <div class="m-portlet__body p-0 border">
	                        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
	                            <div class="table-responsive" id="transactionHistoryListDiv"></div>
	                           <!--  <div class="m-datatable__pager m-datatable--paging-loaded clearfix m-t-rem3">
	                                <ul class="m-datatable__pager-nav" id="billingPager">
	                                </ul>
	                                <div class="m-datatable__pager-info">
	                                    <span class="m-datatable__pager-detail"></span>
	                                </div>
	                            </div>  -->  
	                        </div>
	                                
	                    </div>
					</div>
				</div>
			</div>

			</div>

		</div>
	<?php include 'footerDashboard.php'; ?>
</div>


<?php include 'sharejsDashboard.php'; ?>

</body>
</html>

<script>
    $("#m_datepicker_5").datepicker({
        format: 'yyyy-mm-dd',
        orientation:"bottom",
        todayHighlight:!0,
        templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}
    });
   
    var divId    = 'transactionHistoryListDiv';
    var tableId  = 'transactionHistoryListTable';
    var pagerId  = 'transactionHistoryPager';
    var btnArray = {};
    var thArray  = Array(
	        'Create At',
	        'Payer Name',
	        'Payer Email Address',
	        'Payer Mobile Phone',
	        'Transaction Token',
	        'Payment Amount',
	        'Payment Currency',
	        'Crypto Amount',
	        'Status'
        );


    /*
	
        "created_at": "2020-06-25 20:18:40"
        "payer_name": "huiwen123",
        "payer_email_address": "huiwen.thenux@gmail.com",
        "payer_mobile_phone": "+60123456789",
		"transaction_token": "cv13lhxkzU7mAyDY",
        "payment_amount": "10.00000000",
        "payment_currency": "tetherusd",
        "crypto_amount": "0.00000000",
        "status": "success",
	
    */


    var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
	var getToken 		= "<?php echo $_POST['token']?>";
    var thArray  = Array(
	       "Date",
	       "Amount",
	       "Payment Address",
	       "From",
	       "Transaction Hash"
        );

	$(document).ready(function() {
		
		$("#copyBtn").click(function(){
			var text = $("#urlInput").val();

			var $temp = $("<input>");
			$("body").append($temp);
			$temp.val(text).select();
			document.execCommand("copy");
			$temp.remove();
			// $("#inputTick").show();
			swal.fire({
				position:"center",
				type:"success",
				title:"Copied to clipboard",
				showConfirmButton:!1,
				timer:1500
			})
		});
		

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

	function copyTxt(n) {
		var text = $(n).parent().attr('data-fullTxt');

		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val(text).select();
		document.execCommand("copy");
		$temp.remove();
	}

	function encrypt(w) {
		return w.substring(0, 6)+"..."+w.substr(w.length-6);
	} 

	function loadPaymentDetails(data, message) {
		// console.log(data.data.invoice_detail);
		var tableNo;
		var inv = data.data.invoice_detail;
		var total_paid;
		if(!inv.total_paid){
			total_paid = 0;
		}
		else{
			total_paid = inv.total_paid;
		}

		$("#payeeName").text(inv.payee_name);
		$("#payeeEmail").text(inv.payee_email_address);
		$("#payeePhoneNumber").text(inv.payee_mobile_phone);
		$("#paymentNo").text(": "+inv.id);
		$("#paymentStatus").html(`${inv.status=="pending"?"Waiting for Payment":(inv.status=="success"?"Paid":"Short-Paid")}`);
		$("#payerName").text(inv.payer_name);
		$("#payerPhone").text(inv.payer_mobile_phone);
		$("#payerEmail").text(inv.payer_email_address);
		$("#paymentDescription").text(inv.payment_description);
		$("#paymentAmount").text(inv.payment_amount + " USDT");
		$("#grandTotal").text(total_paid + " USDT");
		$("#urlInput").val(inv.redirect_url);


		var tl = data.data.transaction_list;
		if(tl.length > 0) {
			$("#paymentSuccessWrapper").show();
			$("#paymentBtnWrapper").hide();

			$("#paymentSuccessStatus").text(tl[0].status);
			$("#paymentSuccessAmount").text(tl[0].amount);

			$("#paymentSuccessTo").html(encrypt(tl[0].recipient_address) + " <i class='fa fa-check inputTick' style='display:none'></i>");
			$("#paymentSuccessTo").attr("data-fullTxt", tl[0].recipient_address);

			$("#paymentSuccessFrom").html(encrypt(tl[0].sender_address) + " <i class='fa fa-check inputTick' style='display:none'></i>");
			$("#paymentSuccessFrom").attr("data-fullTxt", tl[0].sender_address);

			$("#paymentSuccessHash").html(encrypt(tl[0].transaction_hash) + " <i class='fa fa-check inputTick' style='display:none'></i>");
			$("#paymentSuccessHash").attr("data-fullTxt", tl[0].transaction_hash);
		}


		if(tl && tl.length > 0) {
			// $('#showErrorMsg').hide();
			$('#showresultListing').show();

		    var newList = [];
		    $.each(tl, function(k, v) {

		        var rebuildData = {
		        	created_at: v['created_at'],
		        	amount: v['amount'],
		        	payment_address : `<span data-fullTxt="${v['payment_address']}">${encrypt(v['payment_address'])} <a class="copyBtn ml-2" href="javascript:;" onclick="copyTxt(this)"><i class="fa fa-copy"></i></a></span>`,
		        	sender_address: `<span data-fullTxt="${v['sender_address']}">${encrypt(v['sender_address'])} <a class="copyBtn ml-2" href="javascript:;" onclick="copyTxt(this)"><i class="fa fa-copy"></i></a></span>`,
		        	transaction_hash: `<span data-fullTxt="${v['transaction_hash']}">${encrypt(v['transaction_hash'])} <a class="copyBtn ml-2" href="javascript:;" onclick="copyTxt(this)"><i class="fa fa-copy"></i></a></span>`
		        };

		        newList.push(rebuildData);

				buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
				pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
		    });
		}
		else
		{
			$('#showErrorMsg').show();
			$('#showresultListing').hide();
		}
	}
</script>
