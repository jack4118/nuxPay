<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">
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
			</div>



			<div class="m-content">
				<div class="row">
                    <div class="col-md-12">
                        <div class="m-accordion m-accordion--default m-accordion--solid" id="m_accordion_3" role="tablist">
                            <div class="m-accordion__item">
                                <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_3_item_1_head" data-toggle="collapse" href="#m_accordion_3_item_1_body" aria-expanded="false">
                                    <span class="m-accordion__item-title"><?php echo $translations["M00318"][$language]; /* Search */ ?></span>
                                    <span class="m-accordion__item-mode"></span>
                                </div>

                                <div class="m-accordion__item-body collapse" id="m_accordion_3_item_1_body" role="tabpanel" aria-labelledby="m_accordion_3_item_1_head" data-parent="#m_accordion_3" style="">
                                    <div class="m-accordion__item-content" style="padding-left:  0; padding-right:  0;">
                                        <form id="searchTransaction" class="m-form m-form--fit m-form--label-align-right ">
                                            <div class="m-portlet__body">

                                                <div class="form-group m-form__group row" style="padding-bottom: 15px;">
                                                    <div class="col-lg-4">
                                                        <label><?php echo $translations["M00322"][$language]; /* Status */ ?>:</label>
                                                        <select class="form-control m-input" id="status">
                                                            <option class= "" value="" href="javascript:void(0)">All</option>
                                                            <option class= "" value="success" href="javascript:void(0)"><?php echo $translations["M01488"][$language]; /* Paid */ ?></option>
                                                            <option class= "" value="pending" href="javascript:void(0)"><?php echo $translations["M01487"][$language]; /* Waiting for Payment */ ?></option>
                                                            <option class= "" value="short_paid" href="javascript:void(0)"><?php echo $translations["M01489"][$language]; /* Short-Paid */ ?></option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Date:</label>
                                                        <div class="input-daterange input-group" id="m_datepicker_5">
                                                            <input id="firstDate" type="text" class="form-control m-input" name="start" data-date-format="YYYY MM DD" autocomplete="off">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                                            </div>
                                                            <input id="lastDate" type="text" class="form-control" name="end" data-date-format="YYYY MM DD" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Payer Name:</label>
                                                        <input class="form-control m-input" id="payerName">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Payer Mobile Phone:</label>
                                                        <input class="form-control m-input" id="payerPhone">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Payer Email Address:</label>
                                                        <input class="form-control m-input" id="payerEmail">
                                                    </div>
                                                    <!-- <div class="col-lg-4">
                                                        <label>See All:</label>
                                                        <div>
                                                        	<input type="checkbox" id="seeAll">
                                                        </div>
                                                    </div> -->
                                                </div>

                                            </div>   
                                            <div class="form-group m-form__group ">
                                               <a id="searchTransactionBtn" href="#" class="btn resetBtn mx-2 my-2" style="" role="button"><?php echo $translations["M00326"][$language]; /* Search */ ?></a>
                                                <a id="resetTransactionBtn" href="#" class="btn searchBtn mx-2 my-2" role="button"><?php echo $translations["M00327"][$language]; /* Reset */ ?></a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                     
                </div>

                <div class="col-xl-12 px-0" id="showErrorMsg" style="display: none">
					<div class="m-portlet m-portlet--tab">
	                    <div class="m-portlet__body">
	                        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
						 		<div class="col-12">                           		
							    	<div class="row justify-content-center">

							    		<div class="col-8">
							    			<div class="row">
										    	<div class="col-xl-2 col-lg-2 col-md-12 col-12 text-center" style="margin: auto;">
										    		<img src="images/dashboard/noDateKeyIcon.png" style="width: 30px;"/>
										    	</div>
										    	<div class="col-xl-10 col-lg-10 col-md-12 col-12 text-left noDataTitleSpacing">
										    		<div class="row">
												    	<div class="col-12 montserratBoldFont" style="font-size: 16px">
												    		You have no any invoice yet.
												    	</div>
												    	<div class="col-12 montserratRegularFont" style="font-size: 14px;">
												    		Request fund and view invoices here.
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

				<div class="col-xl-12 px-0" id="showresultListing" style="display: block;">
					<div class="m-portlet m-portlet--tab">
	                    <div class="m-portlet__body">
	                        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
	                            <div class="table-responsive" id="transactionHistoryListDiv"></div>
	                            <div class="m-datatable__pager m-datatable--paging-loaded clearfix m-t-rem3">
	                                <ul class="m-datatable__pager-nav" id="transactionHistoryPager">
	                                </ul>
	                                <div class="m-datatable__pager-info">
	                                    <span class="m-datatable__pager-detail"></span>
	                                </div>
	                            </div>   
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
    // $("#m_datepicker_5").datepicker({
    //     format: 'yyyy-mm-dd',
    //     orientation:"bottom",
    //     todayHighlight:!0,
    //     templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}
    // });
   
    var divId    = 'transactionHistoryListDiv';
    var tableId  = 'transactionHistoryListTable';
    var pagerId  = 'transactionHistoryPager';
    var btnArray = {};
    var thArray  = Array(
	        'Date',
	        'Payer Name',
	        'Payer Email Address',
	        'Payer Mobile Phone',
	        'Amount(USDT)',
			'Status',
			// 'Processing Fee',
			'Paid(USDT)',
	        ''
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
    var walletType = "<?php echo $_POST['walletType']; ?>";
    var displayName = "<?php echo $_POST['displayName']; ?>";
    var coinType;
    var dropdownFake;

    $(document).ready(function(){ 

        $("#transactionDate").datepicker({
            format      : 'dd/mm/yyyy',
            orientation : 'bottom auto',
            autoclose   : true
        });

        fCallback = loadTransactionListing;
        formData  = {
            command: 'getInvoiceList',
            page: pageNumber,
            payee_mobile_phone: '<?php echo $_SESSION['mobile']; ?>'
        };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#searchTransactionBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#resetTransactionBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $("#coinType").val("");
            $("#status").val("");
            $('#searchTransaction').find('input').each(function() {
               $(this).val(''); 
           	});
        });

        $('#firstDate').daterangepicker({
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        }, function(start, end, label) {
            $("#firstDate").val(start.format('DD/MM/YYYY'));
            $("#lastDate").val(end.format('DD/MM/YYYY'));
        });

        $('#lastDate').click(function() {
            $('#firstDate').trigger('click');
        });
        $('input[name="start"]').on('apply.daterangepicker', function (ev, picker) {
            $('#firstDate').val(picker.startDate.format('DD/MM/YYYY'));
            $('#lastDate').val(picker.endDate.format('DD/MM/YYYY'));
        });

    });

    function pagingCallBack(pageNumber, fCallback){

        var searchId   = 'searchTransaction';
        var searchData = buildSearchDataByType(searchId);
        var date_from, date_to;

        var payee_mobile_phone = '<?php echo $_SESSION['mobile']; ?>';
        var status = $("#status").val();
        var payer_name = $("#payerName").val();
        var payer_mobile_phone = $("#payerPhone").val();
        var payer_email_address = $("#payerEmail").val();
        var see_all = $("#seeAll").is(":checked") ? '1':'0';

        if ($("#firstDate").val()) {
            date_from = dateToTimestamp($("#firstDate").val() + " 00:00:00");
        }else{
            date_from="";
        }
        if ($("#lastDate").val()) {
            date_to = dateToTimestamp($("#lastDate").val() + " 23:59:59");
        }else{
            date_to="";
        }


        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command : 'getInvoiceList',
            payer_name : payer_name,
            payee_mobile_phone : payee_mobile_phone,
            status : status,
            date_from : date_from,
            date_to : date_to,
            payer_mobile_phone : payer_mobile_phone,
            payer_email_address : payer_email_address,
            page: pageNumber,
            see_all : see_all
        };

        if(!fCallback)
            fCallback = loadTransactionListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadTransactionListing(data, message) {
		var tableNo;
        var invoiceList = data.data.invoice_listing;

        if(invoiceList && invoiceList.length > 0) {
        	$('#showErrorMsg').hide();
        	$('#showresultListing').show();

            var newList = [];
            $.each(invoiceList, function(k, v) {

                var btn = `<button class="btn btn-default" onclick="goToDetails('${v['transaction_token']}')"><i class="fa fa-eye"></i></button>`;

                var new_status = v['status'];
                if(new_status == "pending"){
                    new_status = "Waiting for Payment";
                }
                else if(new_status == "success"){
                    new_status = "Paid";
                }
                else if(new_status == "short_paid"){
                    new_status = "Short-Paid";
                }
                
                var rebuildData = {
                	created_at : v['created_at'],
                	payer_name : v['payer_name'],
                	payer_email_address : v['payer_email_address'],
                	payer_mobile_phone : v['payer_mobile_phone'],
                	payment_amount : v['payment_amount'],
                	status : new_status,
					// processing_fee : v['transaction_fee'] + ' ' + v['currency_unit'],
					amount_receive : v['total_paid'] + ' ' + v['currency_unit'],
					btn: btn
                };

                newList.push(rebuildData);
            });
        }
        else
        {
        	$('#showErrorMsg').show();
        	$('#showresultListing').hide();
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.data.pageNumber, data.data.totalPage, data.data.totalRecord, data.data.numRecord);

       	$('#'+tableId).find('tbody tr').each(function(){
            $(this).addClass("removeBackgorundColor");
        });
       	if(invoiceList) {
        	$.each(invoiceList, function(k, v) {
          		$('#'+tableId).find('tr#'+k).attr('data-token', v['transaction_token']);
        	});
      	}
       	/*$('#'+tableId).find('tbody tr').click(function()
    	{
    		var getToken = $(this).attr("data-token");
    		$.redirect('viewInvoice.php', {
    			token: getToken
    		});
    	});*/
    }

    function goToDetails(token) {
        $.redirect('viewInvoice.php', {
            token: token
        });
    }

    function dateTimeToDateFormat(dateTimeValue)
    {
    	// Set variable to current date and time
		const now = new Date(dateTimeValue);
		return moment(now).format('LLL');
    }

    function copyToClipboard(val){
        // console.log(val);
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

    function loadSearch(data, message) {
        loadTransactionListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations["M00334"][$language]; /* Search Successful */ ?>.</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function runModal() {
		$('#openCoin').modal();
	}

</script>
