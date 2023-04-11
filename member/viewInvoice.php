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

				<div class="col-12 col-md-6">
					<div class="row">
						<div class="col-12 col-md-8 pageHeader px-0">
						    Payment Details 
						    
						</div>

						<!-- <div class="col-12 col-md-4 mt-3 mt-md-3 px-0 text-left">
						    <span class ="statusBox" id="statusBox">
							</span>
						</div> -->
					</div>
				</div>
				

				

				<div class="col-12 mt-3 mb-5 px-0">
					<a href="invoiceListing.php" style="font-size: 16px;">
						<i class="fa fa-angle-left"></i>
						<span class="ml-2" style="text-decoration: underline;">Back</span>
					</a>
        		</div>

                <div class="col-xl-12 px-0" id="showErrorMsg">

                	<div class="row">
                		<div class="col-12">
                			<div class="row">
                				<div class="col-12 bigText">
                					Sharable Link
                				</div>
                				<div class="col-12">
                					<div class="row">
                						<div class="col-12 col-md-8 col-lg-6 align-self-center">
                							<div class="d-flex urlBox">
                		        			    <input id="urlInput" type="text" class="form-control requestInput rounded-0" disabled>
                		        			    <span id="inputTick" style="margin-top: 20px;line-height: 37px;color: green; display: none">
                		        			        <i class="fa fa-check"></i>
                		        			    </span>
                		        			    <button id="copyBtn" class="btn btnRequest col rounded-0"><i class="fa fa-clone"></i></button>
                		        			</div>
                						</div>
                						<div class="col-12 col-md-4 col-lg-6 text-right align-self-center mt-3 mt-md-0">
                							<span class ="statusBox" id="statusBox">
                								WAITING FOR PAYMENT
                							</span>
                						</div>
                					</div>
                				</div>
                			</div>
                		</div>

                		<div class="col-12 mt-5 mt-md-4">
                			<div class="row">
                				<div class="col-12 bigText">
                					Payer Info
                				</div>
                				<div class="col-12 smallTxt">
                					The person who you requested funds from
                				</div>
                				<div class="col-12 col-md-8 col-lg-6 mt-3">
                					<div class="payerInfoBox">
	                					<div class="row">
	                						<div class="col-md-4 boldTxt">
	                							Name:
	                						</div>
	                						<div class="col-md-8" id="payerName">
	                						</div>
	                						<div class="col-md-4 boldTxt mt-3">
	                							Email:
	                						</div>
	                						<div class="col-md-8 mt-md-3" id="payerEmail">
	                						</div>
	                						<div class="col-md-4 boldTxt mt-3">
	                							Mobile Number:
	                						</div>
	                						<div class="col-md-8 mt-md-3" id="payerPhone">
	                						</div>
	                					</div>
	                				</div>
                				</div>
                			</div>
                		</div>

                		<div class="col-12 mt-5 mt-md-4">
                			<div class="row">
                				<div class="col-12 bigText">
                					Payment Info
                				</div>
                				<div class="col-12 smallTxt">
									Purpose of the payment
								</div>								
								<div class="col-12 mt-3" id="showresultListing2">
									<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
										<div class="table-responsive" id="transactionHistoryListDiv2"></div>
											<div class="m-datatable__pager m-datatable--paging-loaded clearfix " style="padding-bottom: 10px">
												<div class="m-datatable__pager-info">
													<span class="m-datatable__pager-detail"></span>
												</div>
											</div>   
									</div>
								</div>
                				<!-- <div class="col-12 mt-3">
                					<div class="paymentInfoBox1">
	                					<div class="row">
	                						<div class="col-md-2">
	                							Description:
	                						</div>
	                						<div class="col-md-10" id="paymentDescription">
	                						</div>
	                					</div>
	                				</div>
                				</div>
                				<div class="col-12">
                					<div class="paymentInfoBox2">
	                					<div class="row">
	                						<div class="col-md-3 boldTxt">
	                							Grand Total
	                						</div>
	                						<div class="col-md-9 text-md-right boldTxt" id="paymentAmount">
	                						</div>
	                					</div>
	                				</div>
                				</div> -->
                			</div>
                		</div>

                		

                	</div>




                	<!-- <div class="invoiceBlock">
                		<div class="requestPaymentLink">
                		    <div class="row">

                		        <div class="col-12">
                		        	<div class="row justify-content-center align-items-center mt-4">
                		        		<div class="col-11 py-2">
                		        			<span class="d-block bigText">Sharable Link</span>
                		        		</div>
                		        	</div>

                		        	<div class="row justify-content-center align-items-center mt-3">
                		        		<div class="col-12">
                		        			<div class="d-flex urlBox">
                		        			    <input id="urlInput" type="text" class="form-control requestInput rounded-0" disabled>
                		        			    <span id="inputTick" style="margin-top: 20px;line-height: 37px;color: green; display: none">
                		        			        <i class="fa fa-check"></i>
                		        			    </span>
                		        			    <button id="copyBtn" class="btn btnRequest col rounded-0"><i class="fa fa-copy"></i> Copy</button>
                		        			</div>
                		        		</div>
                		        	</div>
                		        </div>  
                		        
                		    </div>
                		</div>

                		<div class="col-12">
                			<div class="row justify-content-center align-items-center mt-4">
                				<div class="col-11 py-2">
                					<span class="d-block bigText">Payer Info</span>
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
                		</div>
    		        	
                		<div class="col-12">
                			<div class="row justify-content-center align-items-center mt-4">
                				<div class="col-11 py-2">
                					<span class="d-block bigText">Payment Details</span>
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
    		        	
                		
                	</div> -->
					
				</div> 
						<div class="col-12 mt-5 mt-md-4">
                			<div class="row" id="txDetailsDiv">
                				<div class="col-12 bigText">
                					Transaction Details
                				</div>
                				<div class="col-12 smallTxt">
                					Payment made by payer
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
                				<!-- <div class="col-12 mt-3">
                					<div class="paymentInfoBox1">
	                					<div class="row">
	                						<div class="col-md-2">
	                							Description:
	                						</div>
	                						<div class="col-md-10" id="paymentDescription">
	                						</div>
	                					</div>
	                				</div>
                				</div>
                				<div class="col-12">
                					<div class="paymentInfoBox2">
	                					<div class="row">
	                						<div class="col-md-3 boldTxt">
	                							Grand Total
	                						</div>
	                						<div class="col-md-9 text-md-right boldTxt" id="paymentAmount">
	                						</div>
	                					</div>
	                				</div>
                				</div> -->
                			</div>
                		</div>

                		
				</div>

			
			</div>

		</div>

	</div>
	<?php include 'footerDashboard.php'; ?>
</div>


<?php include 'sharejsDashboard.php'; ?>
<div class="modal fade" id="updateTxModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-w border-b" style="padding: 15px;">
                <div class="row">
                    
                    <div class="col-12 text-left" id="modalTitleNettAmount">
                        Update Transaction
                    </div>
                    
                </div>
                
            </div>
            <div class="modal-body withdrawalDetailsModal border-b col-12" style="line-height: 25px; border-bottom-left-radius: .3rem; border-bottom-right-radius: .3rem; padding-bottom: 20px;">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="row" style="display:flex;">
                                <div class="col-4 pr-0">
                                    Transaction Hash:
                                </div>
                                <div class="col-5">
                                    <input id="transactionHashInput" class="form-control" type="text" style="height: 28px">
                                    </input>
                                   
                                </div>
                                <div class="col-2">
                                    <button id="searchButton" class="btn searchBtn" style="line-height:0.75;">Search
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" style="margin-top:15px;">
                            <div class="row">
                                <div class="col-4 pr-0 text-left">
                                    Date
                                </div>
                                <div class="col-1" style="margin-right: -55px;">:</div>
                                <div class="col-7"><span id="modalDate">-</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0 text-left">
                                    Paid To
                                </div>
                                <div class="col-1" style="margin-right: -55px;">:</div>
                                <div class="col-7"><span id="modalTo">-</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0 text-left">
                                    From
                                </div>
                                <div class="col-1" style="margin-right: -55px;">:</div>
                                <div class="col-7" ><span id="modalFrom">-</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0 text-left">
                                    Amount
                                </div>
                                <div class="col-1" style="margin-right: -55px;">:</div>
                                <div class="col-7">
                                    <span style="word-break: break-all;" id="modalAmount">-
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                                <div class="col-2" style="margin-left: -15px; margin-top: 15px;">
                                    <button class="btn searchBtn" id="updateButton" style="line-height:0.75;">Update
                                    </button>
                                </div>
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
    		'',
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
		
	var divId2    = 'transactionHistoryListDiv2';
	var tableId2  = 'transactionHistoryListTable2';
	var pagerId2  = 'transactionHistoryPager2';
	var btnArray2 = {};
	var thArray2  = Array(
	    
	        'Item',
	        'Price',
	        'Quantity',
	        'Total (USDT)'
	    );

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
	       "Transaction ID",
	       "Paid To",
	       "Paid From",
	       "Amount (USDT)"
        );
	
	var invoiceDetailId;
    var transactionHash;
	var invoice_detail_id;

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
				title:"<?php echo $translations["M00137"][$language]; /* Copied to clipboard  */?>",
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


		$("#searchButton").click(function(){
            searchTransactionHash();
        });

        $("#updateButton").click(function(){
            updateTransaction();
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
		return w.substring(0, 8)+"..."+w.substr(w.length-8);
	} 

	function loadPaymentDetails(data, message) {
		var item_list = data.data.payment_item_list;
		var tableNo;
		var tableNo2;
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
		$("#statusBox").html(`${inv.status=="pending"?"Waiting for Payment":(inv.status=="success"?"Paid":"Short-Paid")}`);
		$("#payerName").text(inv.payer_name);
		$("#payerPhone").text(inv.payer_mobile_phone == '' ? '-' : inv.payer_mobile_phone);
		$("#payerEmail").text(inv.payer_email_address == '' ? '-' : inv.payer_email_address);
		$("#paymentDescription").text(inv.payment_description);
		$("#paymentAmount").text(inv.payment_amount + " USDT");
		$("#grandTotal").text(total_paid + " USDT");
		$("#urlInput").val(inv.redirect_url);
		invoice_detail_id = inv.id;
	
		if(inv.status == "pending"){
			 $("#statusBox").addClass("pending");
		}
		else if(inv.status == "success"){
			 $("#statusBox").addClass("success");
		}
		else if(inv.status =="failed"){
			$("#statusBox").addClass("failed");
		}
		else{
			$("#statusBox").addClass("shortPaid");
		}

		if(item_list && item_list.length > 0){
			$('#showresultListing2').show();

			var newList = [];
			$.each(item_list, function(k, v){
				var rebuildData = {
					item_name : v['item_name'],
					unit_price : v['unit_price'],
					quantity: v['quantity'],
					total_price: v['total_price']
				}
				newList.push(rebuildData);
			});

			buildTable(newList, tableId2, divId2, thArray2, btnArray2, message, tableNo2);

			// $('#'+tableId2).find('tbody tr').each(function(){
            // 	$(this).addClass("removeBackgorundColor");
			// });

			$('#'+tableId2).find('tbody').append(`
        	<tr style="background-color: #000; color: #fff; font-size: 15px; font-weight: 500">
        		<td>Grand Total</td>
        		<td></td>
        		<td></td>
        		<td>${inv.payment_amount}</td>
        	</tr>
		`);
		
		$('#'+tableId2).find('thead tr').each(function(){
            $(this).find('th:eq(1)').css('text-align', "right");
            $(this).find('th:eq(2)').css('text-align', "right");
            $(this).find('th:eq(3)').css('text-align', "right");
        });

        $('#'+tableId2).find('tbody tr').each(function(){
            $(this).find('td:eq(1)').css('text-align', "right");
            $(this).find('td:eq(2)').css('text-align', "right");
            $(this).find('td:eq(3)').css('text-align', "right");
        });
		
		} else {
			$('#showErrorMsg').show();
			$('#showresultListing2').hide();
		}

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
			$('#txDetailsDiv').show();
			$('#showresultListing').show();
		    var newList = [];
			// console.log(tl);
		    $.each(tl, function(k, v) {


		    	
//
//		        var rebuildData = {
//					transaction_hash: `<span data-fullTxt="${v['transaction_hash']}">${encrypt(v['transaction_hash'])} <a class="copyBtn ml-2" href="javascript:;" onclick="copyTxt(this)"><i class="fa fa-copy"></i></a></span>`,
//					payment_address : `<span data-fullTxt="${v['payment_address']}">${encrypt(v['payment_address'])} <a class="copyBtn ml-2" href="javascript:;" onclick="copyTxt(this)"><i class="fa fa-copy"></i></a></span>`,
//		        	sender_address: `<span data-fullTxt="${v['sender_address']}">${encrypt(v['sender_address'])} <a class="copyBtn ml-2" href="javascript:;" onclick="copyTxt(this)"><i class="fa fa-copy"></i></a></span>`,
//		        	amount: v['amount'],
//		        	
//		        	
//		        };

				//
				
				var datetime = dateTimeToDateFormat(v['created_at']);
				var status = v['status'];
				if(status == 'success'){
					var statusClassColor = 'success';
					
				}
				else if(status == 'failed'){
					var statusClassColor = 'failed';
				}
			
		        var rebuildData = {
					transaction_hash: `<div class ="col-12"><span data-fullTxt="${v['transaction_hash']}">${encrypt(v['transaction_hash'])} </span>`,
					// <div class="row">
					// <div class="col-3 text-center mt-2 mx-auto ` +statusClassColor+` " id="statusBox">
                    //     ${v['status']}
                    // </div>
                    // <div class="col-8 modalTime text-center mt-2" id="modalCreatedDate">
                    //     ${"Created on " +datetime}
                    // </div>
					// </div>
					// </div>`,
					payment_address : `<span data-fullTxt="${v['payment_address']}">${encrypt(v['payment_address'])}</span>`,
		        	sender_address: `<span data-fullTxt="${v['sender_address']}">${encrypt(v['sender_address'])}</span>`,
		        	amount: v['amount'],
		        	
		        	
		        };
			
		        newList.push(rebuildData);

				buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
				pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
				
				$('#'+tableId).find('tbody').append(`
					<tr style="background-color: #fff">
						<td><button id="updateBtn" class="btn searchBtn" onclick="updateTransactionButton()">Update Transaction</button></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				`);
		    });
		}
		else
		{	
			var newList = [];
			buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
			$('#'+tableId).find('tbody').append(`
					<tr style="background-color: #fff">
						<td><button id="updateBtn" class="btn searchBtn" onclick="updateTransactionButton()">Update Transaction</button></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				`);
			// $('#txDetailsDiv').hide();
			// $('#showErrorMsg').show();
			// $('#showresultListing').hide();
		}
	}
	
	 function dateTimeToDateFormat(dateTimeValue)
    {
    	// Set variable to current date and time
		const now = new Date(dateTimeValue);
		return moment(now).format('lll');
    }

	function searchTransactionHash(){
        var transaction_hash_input             = $('#transactionHashInput').val();

        var formData = {
            command: "getInvoiceTransaction",
            transaction_hash: transaction_hash_input
        };

        // if (!fCallback)
            fCallback = loadInvoiceTransaction;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadInvoiceTransaction(data, message){
        $("#modalDate").html(data.data[0].created_at);
        $("#modalTo").html(data.data[0].recipient_address);
        $("#modalFrom").html(data.data[0].sender_address);
        $("#modalAmount").html(data.data[0].amount);
        transactionHash = data.data[0].transaction_hash;
        invoiceDetailId = data.data[0].invoice_detail_id;
    }

    function updateTransaction(){
        var formData = {
            command: "updateTransactionInvoice",
            transaction_hash: transactionHash,
            invoice_detail_id: invoice_detail_id
        };

        // if (!fCallback)
            fCallback = loadUpdateTransaction;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadUpdateTransaction(data, message){
        showMessage(data.message_d, 'success', '', 'check-circle-o', '')

    }
	function updateTransactionButton(){
			$('#updateTxModal').modal();

		};
</script>
