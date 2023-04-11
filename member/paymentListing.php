<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<!-- <div class="m-subheader marginTopHeader">
			      <div class="d-flex align-items-center">
                     <div class="col-12">
                        <div class="d-flex border-bottom justify-content-between">
                             <nav class="nav">
                              <a class="nav-link active" id="successBtn" href="javascript:void(0)"><?php echo $translations["M00224"][$language]; /* Success */ ?></a>
                              <a class="nav-link" id="pendingBtn" href="javascript:void(0)"><?php echo $translations["M01485"][$language]; /* Pending */ ?> </a>
                            </nav> 

                            <div>
                                <a id="searchTransactionBtn" href="#" class="btn btnSearch mx-2 my-2" style="" role="button">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                        </div>
                    </div>

					<div class="mr-auto">
						<div class="col-12">
							<div class="row">
								<div class="dashboardTitleWidth">
									<img src="images/dashboard/transactionIcon.svg" style="width: 30px; margin-top: 5px;" />
								</div>
								<div class="dashboardTitleWidth2">
									<div class="row">
										<div class="col-12 dashboardTitle">
											Withdrawal Listing
										</div>
										<div class="col-12 dashboardTitleDesc">
											You can view all the withdrawal history here
										</div>
									</div>
								</div>
							</div>      
						</div>
					</div> 
				</div>
			</div> -->



			<div class="m-content marginTopHeader">

                <div class="col-12 pageHeader mb-5 px-0">     
					<div class="row d-flex justify-content-between">
                    	<?php echo $translations["M01807"][$language]; /* Received */?>
						<div class="form-group exportBtn">
                        <button id="exportBtn" class="col-1 btn searchBtn my-2" onClick="onExport()" type="button">
                            <?php echo $translations["M01634"][$language]; /* Export CSV */?>
                        </button>
					</div>
                </div>
				
					
				  
                    </div>

				<!-- <div class="row">
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
                                                            <option class= "" value="success" href="javascript:void(0)"><?php echo $translations["M00323"][$language]; /* Success */ ?></option>
                                                            <option class= "" value="pending" href="javascript:void(0)"><?php echo $translations["M00218"][$language]; /* Pending */ ?></option>
                                                            <option class= "" value="failed" href="javascript:void(0)"><?php echo $translations["M00168"][$language]; /* Failed */ ?></option>
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
                </div> -->
                <div class="col-xl-12 px-0" id="searchSection">
                    <!-- <div class="form-group searchBox">
                        <label class="searchLabel"><?php echo $translations["M01328"][$language]; /* Currency */ ?>: </label>
                        <select class="searchDesign" id="currency">
                            <option class="" value="" href="javascript:void(0)">All</option>
                            <option class="" value="usdt" href="javascript:void(0)">USDT</option>
                            <option class="" value="pending" href="javascript:void(0)">BTC</option>
                            <option class="" value="short_paid" href="javascript:void(0)">ETH</option>
                        </select>
                    </div> -->
                    <div class="form-group searchBox seacrhWalletBox">
                        <select id="walletType" class="searchDesign" dataname="wallettype" dataType="select">
                        </select>
                    </div>
					
					<div class="form-group searchBox">
                        <select id="status" class="searchDesign" dataname="status" dataType="select" style="width: 100px;">
							<option class= "" value="" href="javascript:void(0)"><?php echo $translations["M01486"][$language]; /* All */ ?></option>
							<option class= "" value="Transferred" href="javascript:void(0)"><?php echo $translations["M01990"][$language]; /* Transferred */ ?></option>
							<option class= "" value="Received" href="javascript:void(0)"><?php echo $translations["M01807"][$language]; /* Received */ ?></option>
							<option class= "" value="Hold" href="javascript:void(0)"><?php echo $translations["M01992"][$language]; /* Hold */ ?></option>
							<option class= "" value="Failed" href="javascript:void(0)"><?php echo $translations["M00168"][$language]; /* Failed */ ?></option>
                        </select>
                    </div>


                    <!-- <div class="dashboardBoxWidth3 align-self-center text-center walletTypeDropdown">
		                	<select id="walletDropdownGraph" class="full-width selectValue"></select>
			         </div> -->
                    <div class="form-group searchBox">
                        <label class="searchLabel">
                        
                        <?php echo $translations["M00602"][$language]; /* From */?>:
                        </label>
                        <input id="firstDate" type="text" class="searchDesign" />
                    </div>

                    <div class="form-group searchBox" style="">
                        <label class="searchLabel">
                        <?php echo $translations["M00603"][$language]; /* To */?>:
                        </label>
                        <input id="lastDate" type="text" class="searchDesign" />
                    </div>
					
					<div class="form-group searchBox" style="">
						<label class="searchLabel">
							<?php echo $translations["M01774"][$language]; /* Name */?>:
						</label>
						<input id="searchName" type="text" class="searchDesign" style="text-align:left !important;"/>
					</div>
					<div class="form-group searchBox" style="">
						<label class="searchLabel">
							<?php echo $translations["M01786"][$language]; /* Email */?>:
						</label>
						<input id="searchEmail" type="text" class="searchDesign" style="text-align:left !important;"/>
					</div>
					<div class="form-group searchBox" style="">
						<label class="searchLabel">
							<?php echo $translations["M01522"][$language]; /* Mobile */?>:
						</label>
						<input id="searchMobileNumber" type="text" class="searchDesign" style="text-align:left !important;"/>
					</div>

<!--
                     <a id="searchTransactionBtn" href="#" class="btn btnSearch float-right mb-2" role="button">
                        <img src="images/search.png" class="headerIconSize" style="height: 15px">
                    </a> 
-->
                    
                </div>
			

                                <!-- <div class="col-xl-12 px-0 mt-4" id="showErrorMsg" style="display: none">
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
                                </div> -->

                <!-- <div class="col-xl-12 px-0" id="showErrorMsg" style="display: none">
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
												    		You do not have any payment history yet.
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
				</div> -->

                <div class="col-12 text-center my-5" id="showErrorMsg" style="display: none">
                    <div class="row">
                        <div class="col-12">
                            <img src="<?php echo $sys['source'] == 'FTAG' ?  'images/whitelabel/ftag/no-withdrawal.png' :  'images/nuxPay/newDesign/noWalletIcon.png'?>">
                        </div>
                        <div class="col-12 mt-3 bigText">
                            
                            <?php echo $translations["M01870"][$language]; /* No Transactions */?>
                        </div>
<!--
                        <div class="col-12">
                            
                            <?php echo $translations["M01619"][$language]; /* Use one of our payment tools or API integration to request payments. */?>
                        </div>
-->
                    </div>
                </div>

				<div class="col-xl-12 px-0" id="showresultListing" style="display: block;">
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
	<?php include 'footerDashboard.php'; ?>
</div>


<?php include 'sharejsDashboard.php'; ?>

<div class="modal fade" id="paymentDetailsModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b justify-content-center">
                <div class="row">
                    <div class="modal-title col-12 text-center">
                        <img src="" id="modalCoinImg">
                    </div>
                    <div class="modalAmount mt-2 col-12 text-center" id="modalAmountReceive">
                        1,000 USDT
                    </div>
                    <div class="success text-center mt-4 mx-auto" id="modalStatus">
                        Success
                    </div>
                    <div class="col-12 modalTime text-center mt-2" id="modalCreatedDate">
                        Created on Aug 20, 2020, 11:50 AM
                    </div>
                </div>
                
            </div>
			<div class="modal-body detailsModal border-b col-12" style="line-height: 25px; border-bottom-left-radius: .3rem; border-bottom-right-radius: .3rem; padding-bottom: 20px; border-bottom: 1px solid #e9ecef;">
                <div class="col-12">
                    <div class="row">
						<div class="col-12"><h4>
                            <?php echo $translations["M02043"][$language]; /* Payer Details */?>
						</h4>
						</div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    <?php echo $translations["M01774"][$language]; /* Name */?>:
                                </div>
                                <div class="col-8" style="word-break: break-all;">
                                    <span id="modalPayerName">
                                        -
                                    </span>
                                    
                                </div>
                            </div>
                        </div>
						<div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    <?php echo $translations["M01906"][$language]; /* Email/Mobile */?>:
                                </div>
                                <div class="col-8" style="word-break: break-all;">
                                    <span id="modalEmailMobile">
                                        -
                                    </span>
                                    
                                </div>
                            </div>
                        </div>
						<div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    <?php echo $translations["M01571"][$language]; /* Payment Description */?>:
                                </div>
                                <div class="col-8" style="word-break: break-all;">
                                    <span id="modalDescription">
                                        -
                                    </span>
                                    
                                </div>
                            </div>
						</div>
                        
                    </div>
                </div>
            </div>
            <div class="modal-body detailsModal border-b col-12" style="line-height: 25px; border-bottom-left-radius: .3rem; border-bottom-right-radius: .3rem; padding-bottom: 20px;">
                <div class="col-12">
                    <div class="row">
						<div class="col-12"><h4>
                            <?php echo $translations["M01769"][$language]; /* Transaction Details */?>
						</h4>
						</div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    
                                    <?php echo $translations["M01625"][$language]; /* Transaction Hash */?>:
                                </div>
                                <div class="col-8" style="word-break: break-all;">
                                    <span id="modalTxId">
                                        0x1fb426209a5...3c021cad52ce32
                                            <!--  -->
                                    </span>
                                    <span>
                                        <img src="images/dashboard/newCopyIcon.png" style="width: 35px; padding-right:10px; padding-left:10px" id="modalCopyTransactionHash">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                <?php echo $translations["M00603"][$language]; /* To */?>:
                                </div>
                                <div class="col-8" style="word-break: break-all;">
                                    <span id="modalPaidTo">
                                        0x1fb426209a577bbd58c4fe57dc3c021cad52ce32
                                    </span>
                                    <span>
                                        <img src="images/dashboard/newCopyIcon.png" style="width: 35px; padding-right:10px; padding-left:10px" id="modalCopyPaidTo">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                <?php echo $translations["M00602"][$language]; /* From */?>:
                                </div>
                                <div class="col-8" style="word-break: break-all;">
                                    <span id="modalPaidFrom">
                                        0x1fb426209a577bbd58c4fe57dc3c021cad52ce32
                                    </span>
                                    <span>
                                        <img src="images/dashboard/newCopyIcon.png" style="width: 35px; padding-right:10px; padding-left:10px" id="modalCopyPaidFrom">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    
                                    <?php echo $translations["M01624"][$language]; /* Processing Fee */?>:
                                </div>
                                <div class="col-7" id="modalFee" style="word-break: break-all;">
                                    5 USDT
                                </div>
                            </div>
                        </div>
<!--
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    
                                    <?php echo $translations["M01626"][$language]; /* Receivable Amount */?>:
                                </div>
                                <div class="col-7" id="modalAmount">
                                    995 USDT
                                </div>
                            </div>
                        </div>
-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
	        // 'Date',
         //    'Currency',
         //    'Withdrawable Amount',
         //    'Destination Address',
         //    'Status'
            '',            
            '<?php echo $translations["M01620"][$language]; /* Date, Time */?>',            
//          '<?php echo $translations["M01621"][$language]; /* Paid To */?>',            
//          '<?php echo $translations["M01622"][$language]; /* Paid From */?>',
            '<?php echo $translations["M01785"][$language]; /* Name */?>',            
            '<?php echo $translations["M01991"][$language]; /* Mobile/Email */?>',            
            '<?php echo $translations["M00331"][$language]; /* Amount */?>',
			'<?php echo $translations["M01805"][$language]; /* Status */?>',

//              '<?php echo $translations["M01624"][$language]; /* Processing Fee */?>'
            ''

            // 'You Receive'
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
    var dropdownFake;
    var status;
    var walletTypeGraph;
    var walletTypeTransaction;
    var walletType;
    var dataValue;
    var displayName;
    var tableRowDetails = [];
    var symbol_list = [];
    var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';

    if (hasChangedPassword == 0){
        $.redirect('firstTimeLogin.php');
    }

    $(document).ready(function(){ 

//        status = "success";
        // $("#transactionDate").datepicker({
        //     format      : 'dd/mm/yyyy',
        //     orientation : 'bottom auto',
        //     autoclose   : true
        // });


        if('<?php echo $_POST['searchData'] ?>' != "") {
            searchCallBack();
        } else{
            formData  = {
                command     : 'getTransactionList',
                status      : status,
                page        : pageNumber
            };

            fCallback = loadWithdrawalListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        
        

        formData  = {
            // command: 'getWalletType'
            // page: pageNumber
            command: 'getWalletBalance',
            wallet_status: checkWalletStatus,
            setting_type: 'both'
        };  
        fCallback = getWalletType;  
        ajaxSend("scripts/reqPaymentGateway.php", formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $("#successBtn").click(function(){
            status = "Transferred";
            pagingCallBack();
            $("#successBtn").addClass("active");
            $("#pendingBtn").removeClass("active");
        });

        $("#pendingBtn").click(function(){
            status = "Received";
            pagingCallBack();
            $("#pendingBtn").addClass("active");
            $("#successBtn").removeClass("active");
        });



        $("#statusFilter .searchDesign").change(function() {
            pagingCallBack(pageNumber, loadSearch);
        });


        $('#searchTransactionBtn').click(function() {
            // pagingCallBack(pageNumber, loadSearch);
            var myUrl = "<?php echo basename($_SERVER['PHP_SELF']);?>";

            var from, to;
            var from = $("#firstDate").val();
            var to = $("#lastDate").val();

            if ($("#firstDate").val()) {
                from = dateToTimestamp(sanitize($("#firstDate").val()) + " 00:00:00");
            }else{
                from="";
            }
            if ($("#lastDate").val()) {
                to = dateToTimestamp(sanitize($("#lastDate").val()) + " 23:59:59");
            }else{
                to="";
            }

            
            if(pageNumber > 1) bypassLoading = 1;

            var formData = {
                command : 'getTransactionList',
                page: pageNumber,
                status : status,
                from : from,
                to : to
            };

            $.redirect("searchField.php", {
                url: myUrl,
                searchData: JSON.stringify(formData)
            });
        });

        $('#resetTransactionBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $("#status").val("");
            $('#searchTransaction').find('input').each(function() {
               $(this).val(''); 
           	});
        });

        $("#searchSection .searchDesign").change(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#firstDate').daterangepicker({
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'MMM DD, YYYY'
            }
        }, function(start, end, label) {
            $("#firstDate").val(start.format('ll'));
            $("#lastDate").val(end.format('ll'));

            pagingCallBack(pageNumber, loadSearch);
        });

        $('#lastDate').click(function() {
            $('#firstDate').trigger('click');
        });
        $('input[name="start"]').on('apply.daterangepicker', function (ev, picker) {
            $('#firstDate').val(picker.startDate.format('DD/MM/YYYY'));
            $('#lastDate').val(picker.endDate.format('DD/MM/YYYY'));
        });

    });
        
        $('#walletType').change(function() {
           
            // var walletType = $('#walletType').val();
            //coinType = $('#coinType').val();
            pagingCallBack(pageNumber, loadSearch);
        });


    function encrypt(w) {
        return w.substring(0, 6)+"..."+w.substr(w.length-6);
    }

    function pagingCallBack(pageNumber, fCallback){

        var searchId   = 'searchTransaction';
        var searchData = buildSearchDataByType(searchId);
        var from, to;
        var from = $("#firstDate").val();
        var to = $("#lastDate").val();
        var wallet_type = $('select#walletType option:selected').val();
        var status = $('select#status option:selected').val();
		

        if ($("#firstDate").val()) {
            // from = dateToTimestamp($("#firstDate").val() + " 00:00:00");
            from = $("#firstDate").val();
            from = moment(from).format('DD/MM/YYYY');
            from = dateToTimestamp(from + " 00:00:00");
        }else{
            from="";
        }
        if ($("#lastDate").val()) {
            // to = dateToTimestamp($("#lastDate").val() + " 23:59:59");
            to = $("#lastDate").val();
            to = moment(to).format('DD/MM/YYYY');
            to = dateToTimestamp(to + " 23:59:59");
        }else{
            to="";
        }

        //walletType = $('#walletType').val();
        walletType = $('select#walletType option:selected').val();
		var name = sanitize($("#searchName").val()); 
        var email = sanitize($("#searchEmail").val()); 
        var mobileNumber = sanitize($("#searchMobileNumber").val()); 

        if(pageNumber > 1) bypassLoading = 1;
        var formData = {
            command : 'getTransactionList',
            page: pageNumber,
            status : status,
            wallet_type: walletType,
            from : from,
            to : to,
			name: name,
			email: email,
			mobile: mobileNumber
        };

        if(!fCallback)
            fCallback = loadWithdrawalListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function searchCallBack(pageNumber, fCallback){

        var searchId   = 'searchSection';
        var searchData = JSON.parse('<?php echo $_POST['searchData'] ?>');

        // alert("searchCallBack");


        if(pageNumber > 1) bypassLoading = 1;

        var formData = searchData;
        formData["searchParam"] = "<?php echo $_POST['newSearchVal'] ?>";

		if(formData['from']){
			 $("#firstDate").val(moment.unix(formData['from']).format("DD/MM/YYYY"));
		}
       
		if(formData['to']){
			 $("#lastDate").val(moment.unix(formData['to']).format("DD/MM/YYYY"));
		}
       

        if(formData['status'] == 'success') {
            $("#successBtn").addClass("active");
            $("#pendingBtn").removeClass("active");
        }else{
            $("#pendingBtn").addClass("active");
            $("#successBtn").removeClass("active");
        }

        if(!fCallback)
            fCallback = loadWithdrawalListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadWithdrawalListing(data, message) {
		var tableNo;
        img_list = data.result.crypto_img_list;
        symbol_list = data.result.crypto_symbol_list;
        var withdrawalList = data.result.transaction_list;
		var pageData = data.result;

        if(withdrawalList && withdrawalList.length > 0) {
        	$('#showErrorMsg').hide();
        	$('#showresultListing').show();

            var newList = [];
            tableRowDetails = [];
            $.each(withdrawalList, function(k, v) {
                // var buildCurrencyIcon = `
                // <img src="images/cryptocurrencies/${v['currency_unit']}.png" class="currencyLogo">

                // `;
                var buildCurrencyIcon = "<img src='"+v['image']+"' class=\"currencyLogo\">";

                var senderAddress = (v['sender_address'] != "") ? v['sender_address'] : '' ;
//                v['sender_address'] = senderAddress;
                tableRowDetails.push(v);

				var payerEmailMobile = '-';
				
				if(v['payer_mobile_phone'] != '-' && v['payer_mobile_phone'] != null){
					payerEmailMobile = v['payer_mobile_phone'];
				}
				else if(v['payer_email_address'] != '-' && v['payer_email_address'] != null){
					payerEmailMobile = v['payer_email_address'];

                }
                                
                if (( v['escrow_id'] > 0 ) ) {
                    if (v['escrow_chat_count'] > 0) {
                        var iconDiv = '<div class="redCircle">'+v['escrow_chat_count']+'</div>';
                        iconDiv += '<a href="javascript:redirectEscrowChat('+v['escrow_id']+');"><img src="images/Escrow/chat.png"></a>';
                    } else {
                        var iconDiv = '<a href="javascript:redirectEscrowChat('+v['escrow_id']+');"><img src="images/Escrow/chat.png"></a>';
                    }
                } else {
                    var iconDiv =  '';
                }

                var paymentStatus = '';
                if (v['status'] == 'Transferred') {
                    paymentStatus = '<?php echo $translations["M01990"][$language]; /* Transferred */ ?>';
                } else if (v['status'] == 'Received') {
                    paymentStatus = '<?php echo $translations["M01807"][$language]; /* Received */ ?>';
                } else if (v['status'] == 'Hold') {
                    paymentStatus = '<?php echo $translations["M01992"][$language]; /* Hold */ ?>';
                } else if (v['status'] == 'Failed') {
                    paymentStatus = '<?php echo $translations["M00168"][$language]; /* Failed */ ?>';
                }
                
				
                var rebuildData = {
                    currency : buildCurrencyIcon,
                    created_at : dateTimeToDateFormat(v['created_at']),
//                    address : encrypt(v['receiver_address']),
//                    senderAdd: senderAddress.slice(0, 6) + '...' + senderAddress.slice(-6),
                    payer_name : sanitize(v['payer_name']),
                    payer_mobile_phone : payerEmailMobile,
                    amount_receive : v['amount_receive'],
					status: paymentStatus,					
                    icon: iconDiv
//                    transaction_fee: v['transaction_fee']
                	//amount : v['amount']
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
        pagination(pagerId, pageData.pageNumber, pageData.totalPage, pageData.totalRecord, pageData.numRecord);

       	$('#'+tableId).find('tbody tr').each(function(){
            $(this).addClass("removeBackgorundColor");
            $(this).css("font-size", "12px");
            //$(this).click(runModal);
	    $(this).find("td").eq(0).click(runModal); 
            $(this).find("td").eq(1).click(runModal); 
            $(this).find("td").eq(2).click(runModal); 
            $(this).find("td").eq(3).click(runModal); 
            $(this).find("td").eq(4).click(runModal); 
            $(this).find("td").eq(5).click(runModal); 
        });

        // modify pagination wording
        var paginationHtml = $('#paginateText').text();
        if (paginationHtml) {
            paginationHtml = paginationHtml.replace('Displaying', '<?php echo $translations["M02092"][$language]; /* Displaying */?>');
            paginationHtml = paginationHtml.replace('of', '<?php echo $translations["M02093"][$language]; /* of */?>');
            paginationHtml = paginationHtml.replace('records', '<?php echo $translations["M02094"][$language]; /* records */?>');
            $('#paginateText').text(paginationHtml)
        }
    }

    function redirectEscrowChat(escrow_id) {

        $.redirect('escrowChat.php', {reference_id: escrow_id, type: "receive"});
        
    }

    function dateTimeToDateFormat(dateTimeValue)
    {
    	// Set variable to current date and time
//		const now = new Date(dateTimeValue);
		return moment(dateTimeValue).format('lll');
    }

    function copyToClipboard(val){
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
            title:"<?php echo $translations["M00137"][$language]; /* Copied to clipboard  */?>",
            showConfirmButton:!1,
            timer:1000
        })
    }

    function loadSearch(data, message) {
        loadWithdrawalListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations["M00334"][$language]; /* Search Successful */ ?>.</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    // function runModal() {
	// 	$('#openCoin').modal();
	// }

    function runModal() { 
        //var tableRowID = $(this).attr("id");
        var tableRowID = $(this).parent().index();
        var currentRow = tableRowDetails[tableRowID];

        var paymentStatus = '';
        if (currentRow['status'] == 'Transferred') {
            paymentStatus = '<?php echo $translations["M01990"][$language]; /* Transferred */ ?>';
        } else if (currentRow['status'] == 'Received') {
            paymentStatus = '<?php echo $translations["M01807"][$language]; /* Received */ ?>';
        } else if (currentRow['status'] == 'Hold') {
            paymentStatus = '<?php echo $translations["M01992"][$language]; /* Hold */ ?>';
        } else if (currentRow['status'] == 'Failed') {
            paymentStatus = '<?php echo $translations["M00168"][$language]; /* Failed */ ?>';
        }
        var currentSymbol = currentRow["currency_unit"].toUpperCase();
        $('#modalCoinImg').attr('src', currentRow["image"]);
//        $('#modalAmount').html(currentRow["amount"] + ' ' + currentSymbol);
        $('#modalCreatedDate').html("<?php echo $translations["M01610"][$language]; /* Created on */?> " + dateTimeToDateFormat(currentRow["created_at"]));
        $('#modalTxId').html(encrypt(currentRow["transaction_id"], 27));
        // $('#modalActualAmount').html(currentRow["withdrawal_amount"] + ' ' + currentSymbol);
        // $('#modalMinerFee').html(currentRow["miner_fee"] + ' ' + currentSymbol);
        $('#modalAmountReceive').html(currentRow["amount_receive"] + ' ' + currentSymbol);
        // $('#modalNettAmount').html(currentRow["amount"] + ' ' + currentSymbol);
        $('#modalPaidTo').html(currentRow["receiver_address"]);
        $('#modalPaidFrom').html(currentRow["sender_address"]);
        $('#modalFee').html(currentRow["transaction_fee"]);
		$('#modalStatus').html(paymentStatus);

		if(currentRow['status'] == 'Pending'){

			$('#modalStatus').addClass('pending');
			$('#modalStatus').removeClass('success');
		}
		else if(currentRow['status'] == 'Failed'){
			$('#modalStatus').addClass('failed');
			$('#modalStatus').removeClass('success');
		}
		else{
			$('#modalStatus').addClass('success');
		}
		$('#modalPayerName').html(currentRow["payer_name"]);
		if(currentRow['payer_mobile_phone'] != null && currentRow['payer_mobile_phone'] != '-'){
			$('#modalEmailMobile').html(currentRow["payer_mobile_phone"]);
		}
		else{
			$('#modalEmailMobile').html(currentRow["payer_email_address"]);
		}
		
		
		$('#modalDescription').html(currentRow["description"]);
		
        // $('#modalURL').attr('href', `<?php echo $sys["txDomain"]?>` + currentRow["transaction_hash"]);

        $('#modalCopyTransactionHash').click(function() {
            copyToClipboard(currentRow["transaction_id"])
        });
        
        $('#modalCopyPaidTo').click(function() {
            copyToClipboard(currentRow["receiver_address"])
        });
        $('#modalCopyPaidFrom').click(function() {
            copyToClipboard(currentRow["sender_address"])
        });

        $('#paymentDetailsModal').modal();
	}


    function getWalletType(data, message){
    	// if(data.result.coin_data && dropdownFake !=1) {

            if(data.data && dropdownFake !=1) {
            $('#walletType').empty();
            $('#walletType').append('<option value=""> <?php echo $translations["M01486"][$language]; /* All */?> </option>');
            $.each(data.data.wallet_list, function(key, val) {
                $('#walletType').append('<option data-image="'+val['image']+'" value="'+ val['currency_id'] +'">'+ val['display_symbol'] +'</option>')
            });

			dropdownFake = 1;


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
                            '<span><img src="'+optimage+'" class="walletTypeIcon" /> <span style="vertical-align: middle;">' + method.text + '</span></span>'
                );
                return $opt;
            }
        };


        $('#walletType').select2({
            dropdownAutoWidth : true,
            templateResult: formatState,
            templateSelection: formatState
        });
    }
	
	function onExport(){

		var searchId   = 'searchTransaction';
        var searchData = buildSearchDataByType(searchId);
        var from, to;
        var from = $("#firstDate").val();
        var to = $("#lastDate").val();
        var wallet_type = $('select#walletType option:selected').val();
        var status = $('select#status option:selected').val();
		

        if ($("#firstDate").val()) {
            // from = dateToTimestamp($("#firstDate").val() + " 00:00:00");
            from = $("#firstDate").val();
            from = moment(from).format('DD/MM/YYYY');
            from = dateToTimestamp(from + " 00:00:00");
        }else{
            from="";
        }
        if ($("#lastDate").val()) {
            // to = dateToTimestamp($("#lastDate").val() + " 23:59:59");
            to = $("#lastDate").val();
            to = moment(to).format('DD/MM/YYYY');
            to = dateToTimestamp(to + " 23:59:59");
        }else{
            to="";
        }

        //walletType = $('#walletType').val();
        walletType = $('select#walletType option:selected').val();
		var name = $("#searchName").val(); 
        var email = $("#searchEmail").val(); 
        var mobileNumber = $("#searchMobileNumber").val(); 

        if(pageNumber > 1) bypassLoading = 1;

		var formData  = {
			command    : "/xun/crypto/get/transaction/list/v1",
			page: pageNumber,
            status : status,
            wallet_type: walletType,
            from : from,
            to : to,
			name: name,
			email: email,
			mobile: mobileNumber,
			is_export: 1,
			filename: "received"
		};
		
		$.redirect('exportExcel.php', formData); 
    }

</script>

<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        position: relative;
        padding: 0px 30px 0px 10px;
        line-height: 30px;
    }

    .select2 {
        width: 222px!important;
    }

    .select2-container--default .select2-selection--multiple,
    .select2-container--default .select2-selection--single {
        border: unset;
    }

    .select2-container--default.select2-container--open .select2-selection--multiple,
    .select2-container--default.select2-container--open .select2-selection--single {
        border: unset;
        box-shadow: unset;
    }



    .searchBox {
        height: 32px;
    }

    .searchBox.seacrhWalletBox {
        border: 1px solid #dedede;
        padding: 0px;
        background-color: #fff;
        display: inline-flex;
        align-items: center;
        margin-right: 5px;
        height: 32px;
    }

    #status{
		-webkit-appearance: none;
    	-moz-appearance: none;
		appearance: none;
		background: url('data:image/svg+xml;charset=utf8,<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" xml:space="preserve"><path d="M7.41,8.59L12,13.17l4.59-4.58L18,10l-6,6l-6-6L7.41,8.59z"/><path fill="none" d="M0,0h24v24H0V0z"/></svg>');
		background-position: center right;
  		background-repeat: no-repeat;
		width: 100%; 
	}

</style>
