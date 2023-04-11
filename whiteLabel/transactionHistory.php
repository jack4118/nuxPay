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
											Transaction History
										</div>
										<div class="col-12 dashboardTitleDesc">
											You can view all the transactions here after your customers made payment
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
														<label><?php echo $translations["M00325"][$language]; /* Transaction Date */ ?>:</label>
														<div class="input-daterange input-group" id="m_datepicker_5">
															<input id="firstDate" type="text" class="form-control m-input" name="start" autocomplete="off">
															<div class="input-group-append">
																<span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
															</div>
															<input id="lastDate" type="text" class="form-control" name="end" autocomplete="off">
														</div>
													</div>
                                                    <div class="col-lg-4">
                                                        <label><?php echo $translations["M00319"][$language]; /* Coin */ ?>:</label>
                                                        <select class="form-control m-input" id="coinType">
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label><?php echo $translations["M00322"][$language]; /* Status */ ?>:</label>
                                                        <select class="form-control m-input" id="status">
                                                            <option class= "" value="" href="javascript:void(0)"><?php echo $translations["M01486"][$language]; /* All */ ?></option>
                                                            <option class= "" value="Success" href="javascript:void(0)"><?php echo $translations["M00323"][$language]; /* Success */ ?></option>
                                                            <option class= "" value="failed" href="javascript:void(0)"><?php echo $translations["M00324"][$language]; /* Failed */ ?></option>
                                                            <option class= "" value="pending" href="javascript:void(0)"><?php echo $translations["M01485"][$language]; /* Pending */ ?></option>
                                                        </select>
                                                    </div>
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
												    		You have no any transaction yet.
												    	</div>
												    	<div class="col-12 montserratRegularFont" style="font-size: 14px;">
												    		Receive payment from your customer and view transactions here.
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

<div class="modal fade systemMsg" id="openCoin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog transactionModalSize" role="document">
		<div class="modal-content">
			<div class="modal-header text-center pb-3">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body text-center py-0 px-0">
				<div class="col-12">
					<img src="" style="width: 40px;" alt="" id="modalImageIcon">
				</div>
				<div class="col-12 modalCoinName" style="margin-top: 10px;" id="modalAmountFee">
					
				</div>
				<div class="col-12" style="margin-top: 10px;">
					<div class="" bis_skin_checked="1" id="addClassStatus">
						<div class="transactionStatusBoxText" bis_skin_checked="1" id="modalStatusText">
	
						</div>
					</div>
				</div>
				<div class="col-12 modalTransactionDate" style="margin-top: 5px;" id="modalCreatedDate">
					
				</div>
				<div class="col-12" style="margin-top: 20px; margin-bottom: 20px;">
					<hr class="dashboardHR">
				</div>
				<div class="col-12 text-left">
					<div class="row">
						<div class="col-md-4 col-12 modalTransactionTitle">
							Transaction Hash :
						</div>
						<div class="col-md-6 col-10 modalTransactionContent" id="modalTransactionId">
							
						</div>
						<div class="col-md-2 col-2">
							<img src="images/dashboard/copyIcon.svg" class="modalCopyIcon" id="copyUrlAddress1">
						</div>
					</div>
				</div>

				<div class="col-12 text-left" style="margin-top: 10px;">
					<div class="row">
						<div class="col-md-4 col-12 modalTransactionTitle">
							To :
						</div>
						<div class="col-md-6 col-10 modalTransactionContent" id="modalSenderInternal">
							
						</div>
						<div class="col-md-2 col-2">
							<img src="images/dashboard/copyIcon.svg" class="modalCopyIcon" id="copyUrlAddress2">
						</div>
					</div>
				</div>
				<div class="col-12 text-left" style="margin-top: 10px;">
					<div class="row">
						<div class="col-md-4 col-12 modalTransactionTitle">
							From :
						</div>
						<div class="col-md-6 col-10 modalTransactionContent" id="modalSenderExternal">
							
						</div>
						<div class="col-md-2 col-2">
							<img src="images/dashboard/copyIcon.svg" class="modalCopyIcon" id="copyUrlAddress3">
						</div>
					</div>
				</div>
				
				<div class="col-12 text-left" style="margin-top: 10px;">
					<div class="row">
						<div class="col-md-4 col-12 modalTransactionTitle">
							Minor Fee :
						</div>
						<div class="col-md-6 col-12 modalTransactionContent" id="modalMinorFee">
							
						</div>
					</div>
				</div>

				<div class="col-12 text-left" style="margin-top: 10px;">
					<div class="row">
						<div class="col-md-4 col-12 modalTransactionTitle">
							Processing Fee :
						</div>
						<div class="col-md-6 col-12 modalTransactionContent" id="modalProcessingFee">
							
						</div>
					</div>
				</div>

				<div class="col-12 text-left" style="margin-top: 10px;">
					<div class="row">
						<div class="col-md-4 col-12 modalTransactionTitle">
							You Receive :
						</div>
						<div class="col-md-6 col-12 modalTransactionContent" id="modalReciveFee">
							
						</div>
					</div>
				</div>
				<div class="col-12" style="margin-top: 20px; margin-bottom: 20px;">
					<hr class="dashboardHR">
				</div>
<!-- 				<div class="col-12 modalBlockChain">
					<span style="cursor: pointer;">
						Go to Blockchain for more details >
					</span>
				</div> -->




			</div>

		</div>
	</div>
</div>


<?php include 'sharejsDashboard.php'; ?>

</body>
</html>

<script>
    // $("#firstDate").datepicker({
    //     format: 'yyyy-mm-dd',
    //     orientation:"bottom auto",
	// 	todayHighlight:!0,
	// 	autoclose: true,
	// 	templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}
	// });
	
	// $("#lastDate").datepicker({
    //     format: 'yyyy-mm-dd',
    //     orientation:"bottom auto",
	// 	todayHighlight:!0,
	// 	autoclose: true,
	// 	templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}
    // });
   
    var divId    = 'transactionHistoryListDiv';
    var tableId  = 'transactionHistoryListTable';
    var pagerId  = 'transactionHistoryPager';
    var btnArray = {};
    var thArray  = Array(
        '',
        'Transaction Hash',
        'Transaction Amount',
        'Processing Fee',
        'You Receive'
        );


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
            command: 'getTransactionList',
			page: pageNumber,
            walletType: coinType
        };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        fCallback = getWalletType;

        formData  = {
            command: 'getWalletType',
			page: pageNumber
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
                format: 'YYYY-MM-DD'
            }
        }, function(start, end, label) {
            $("#firstDate").val(start.format('YYYY-MM-DD'));
            $("#lastDate").val(end.format('YYYY-MM-DD'));
        });

        $('#lastDate').click(function() {
            $('#firstDate').trigger('click');
        });
        $('input[name="start"]').on('apply.daterangepicker', function (ev, picker) {
            $('#firstDate').val(picker.startDate.format('YYYY-MM-DD'));
            $('#lastDate').val(picker.endDate.format('YYYY-MM-DD'));
        });

    });

    function pagingCallBack(pageNumber, fCallback){

        var searchId   = 'searchTransaction';
        var searchData = buildSearchDataByType(searchId);
        
        var fromDate = $("#firstDate").val();
        var toDate = $("#lastDate").val();
        var status = $("#status").val();
        coinType = $("#coinType").val();

        if (fromDate) {
            fromDate = fromDate + " 00:00:00";
        }

        if (toDate) {
            toDate = toDate + " 23:59:59";
        }


        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command : 'getTransactionList',
			page: pageNumber,
            walletType : coinType,
            status: status,
            from : fromDate,
            to : toDate
        };

        if(!fCallback)
            fCallback = loadTransactionListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadTransactionListing(data, message) {
		var tableNo;
        var transactionList = data.result.transaction_list;
        if(transactionList) {
        	$('#showErrorMsg').hide();
        	$('#showresultListing').show();

            var newList = [];
            var workingHours;
            $.each(transactionList, function(k, v) {

            	var status = v['status'];

            	if (status == "success") {
            		var addClassColor = "success";
            	} else {
            		var addClassColor = "danger";
            	}
            	var getTransHash = v['transaction_id'];
            	var getFirstTransHash = getTransHash.slice(0, 10);
            	var getLastTransHash = getTransHash.slice(getTransHash.length - 10);

                var rebuildData = {
                	image            : '<img src="'+v['image']+'" style="width: 40px;"/>',
                    ID               : '<p class="mb-1 montserratRegularFont" style="width: 300px; word-break: break-all;">'+getFirstTransHash+'...'+getLastTransHash+'</p><span class="py-0 mr-2 f-12 '+addClassColor+'" style="">'+v['status']+'</span><span class="f-12"><i>Created on '+dateTimeToDateFormat( v['created_at'] )+'</i></span>',
                    amount           : v['amount_receive'],
                    transactionsFee  : v['transaction_fee'],
                    amountReceive    : v['amount']
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
		// console.log(data.result);
        pagination(pagerId, data.result.pageNumber, data.result.totalPage, data.result.totalRecord, data.result.numRecord);

       	$('#'+tableId).find('tbody tr').each(function(){
            $(this).addClass("removeBackgorundColor");
        })
        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find("td:eq(1)").addClass("walletAddressTextEscplise");
            $(this).find("td:eq(2)").addClass("montserratRegularFont");
            $(this).find("td:eq(3)").addClass("montserratRegularFont");
            $(this).find("td:eq(4)").addClass("montserratRegularFont");
        })
       	if(transactionList) {
        	$.each(transactionList, function(k, v) {
          		$('#'+tableId).find('tr#'+k).attr('data-id', v['id']);
        	});
      	}
       	$('#'+tableId).find('tbody tr').click(function()
    	{
    		var getLastestDataId = $(this).attr("data-id");
    		// console.log(getLastestDataId);
	        fCallback = loadTransactionDeatilsListing;
	        formData  = {
	            command   : 'getPgTransactionListDetails',
	            id        : getLastestDataId
	        };
	        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    	});
    }

    function loadTransactionDeatilsListing(data, message)
    {
    	runModal();
    	var geTransactionsDeatilsList = data.data;

		$('#modalTransactionId').text(geTransactionsDeatilsList.tx_hash);
		$('#modalSenderInternal').text(geTransactionsDeatilsList.sender_address);
		$('#modalSenderExternal').text(geTransactionsDeatilsList.recipient_address);
		$('#modalMinorFee').text(geTransactionsDeatilsList.miner_fee+' '+ geTransactionsDeatilsList.currency_unit);
		$('#modalProcessingFee').text( geTransactionsDeatilsList.processing_fee +' '+ geTransactionsDeatilsList.currency_unit);
		$('#modalReciveFee').text( geTransactionsDeatilsList.amount_user_receive+' '+geTransactionsDeatilsList.currency_unit);
		$('#modalAmountFee').text( geTransactionsDeatilsList.total_amount+' '+geTransactionsDeatilsList.currency_unit);

		if(geTransactionsDeatilsList.status == 'success')
		{
			$('#modalStatusText').text('Success');
			$('#addClassStatus').addClass('modalTransactionBoxSuccess');
		}
		else
		{
			//$('#modalStatusText').text('Expired');
			$('#modalStatusText').text(geTransactionsDeatilsList.status);
			$('#addClassStatus').addClass('modalTransactionBoxExpired');
		}
		$('#modalCreatedDate').text( dateTimeToDateFormat( geTransactionsDeatilsList.created_at ) );
		$('#modalImageIcon').attr('src', geTransactionsDeatilsList.image);

		$('#copyUrlAddress1').click(function()
    	{
    		$('#openCoin').modal('hide');
    		copyToClipboard(geTransactionsDeatilsList.tx_hash);
    	});
    	$('#copyUrlAddress2').click(function()
    	{
       		$('#openCoin').modal('hide');
        	copyToClipboard(geTransactionsDeatilsList.sender_address);
    	});
    	$('#copyUrlAddress3').click(function()
    	{
    		$('#openCoin').modal('hide');
    		copyToClipboard(geTransactionsDeatilsList.recipient_address);
    	});
    }

    function getWalletType(data,message){
    	if(data.result.wallet_types && dropdownFake !=1) {
            $('#coinType').empty();
            $('#coinType').append('<option value="">All</option>');
            $.each(data.result.wallet_types, function(key, val) {
                $('#coinType').append('<option value="'+ val+'">'+ val +'</option>');
            });
            dropdownFake = 1;
        }

        $('#coinType').val(walletType);
        $('#searchTransactionBtn').trigger('click');
        if( walletType != '')
        {
        	$('.m-accordion__item-body').addClass('show');
        }
    }

    function dateTimeToDateFormat(dateTimeValue)
    {
    	// Set variable to current date and time
		// const now = new Date(dateTimeValue);
		// console.log("date time value = " + moment(dateTimeValue).format('LLL'));
		return moment(dateTimeValue).format('LLL');
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
