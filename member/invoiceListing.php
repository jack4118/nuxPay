<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">

                <div class="col-12 pageHeader mt-3 mb-5">
                    Request Fund History
                </div>

                <div class="d-flex align-items-center">
                    <div class="col-12">
                        <div class="d-flex border-bottom justify-content-between">
                            <nav class="nav">
                              <a class="nav-link" href="requestFundAfterLogin.php">Request</a>
                              <a class="nav-link active" href="#">History</a>
                            </nav>

                            <div>
                                <a id="searchTransactionBtn" href="#" class="btn btnSearch mx-2 my-2" style="" role="button">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



			<div class="m-content">
				<!--<div class="row">
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
                </div>-->



                <div class="col-xl-12 px-0" id="searchSection">
                    <div class="form-group searchBox" style="width: 250px">
                        <label class="searchLabel">Status: </label>
                        <select class="searchDesign" id="status" ></select>
                        <!-- <select class="searchDesign" id="status">
                            <option class= "" value="" href="javascript:void(0)">All</option>
                            <option class= "" value="success" href="javascript:void(0)"><?php echo $translations["M01488"][$language]; /* Paid */ ?></option>
                            <option class= "" value="pending" href="javascript:void(0)"><?php echo $translations["M01487"][$language]; /* Waiting for Payment */ ?></option>
                            <option class= "" value="short_paid" href="javascript:void(0)"><?php echo $translations["M01489"][$language]; /* Short-Paid */ ?></option>
                        </select> -->
                    </div>

                    <div class="form-group searchBox" style="width: 90px">
                        <label class="searchLabel" style="margin-right:0px">From: </label>
                        <input id="firstDate" type="text" class="searchDesign" style="width: 40px"/>
                    </div>

                    <div class="form-group searchBox" style="width: 90px">
                        <label class="searchLabel">To: </label>
                        <input id="lastDate" type="text" class="searchDesign" style="width: 40px"/>
                    </div>
                    
                    <div class="form-group searchBox" style="width: 140px">
                        <label class="searchLabel">Name: </label>
                        <input id="payerName" type="text" class="searchDesign" style="width: 50px; text-align:left;"/>
                    </div>

                    <div class="form-group searchBox" style="width: 140px">
                        <label class="searchLabel">Email: </label>
                        <input id="payerEmail" type="text" class="searchDesign" style="width: 50px; text-align:left;"/>
                    </div>

                    <div class="form-group searchBox" style="width: 140px">
                        <label class="searchLabel">Mobile: </label>
                        <input id="payerPhone" type="text" class="searchDesign" style="width: 50px; text-align:left;" />
                    </div>
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
                
                <div class="col-12 text-center my-5" id="showErrorMsg" style="display: none">
                    <div class="row">
                        <div class="col-12">
                            <img src="<?php echo $sys['source'] == 'FTAG' ?  'images/whitelabel/ftag/No-invoice.png' :  'images/RequestFund.png'?>">
                        </div>
                        <div class="col-12 mt-3 bigText">
                            No Invoices
                        </div>
                        <div class="col-12">
                            Get started with request fund and get paid from your customers.
                        </div>
                    </div>
                </div>

				<div class="col-xl-12 px-0 mt-4" id="showresultListing" style="display: block;">
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
                                    <!-- <span>
                                        <img src="images/dashboard/newCopyIcon.png" style="width: 25px; padding-left:5px" id="modalCopyWithdrawTo">
                                    </span> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                                <div class="col-2" style="margin-left: -15px; margin-top: 15px;">
                                    <button class="btn searchBtn" id="updateButton" style="line-height:0.75;">Update
                                    </button>
                                </div>
                        </div>
                        <!-- <div class="col-12 mt-4 text-center">
                            <a href="javascript:;" target="_blank" id="modalURL">Go to Etherscan for more details</a>
                        </div> -->
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
            '',
	        'Date, Time',
	        'Name',
	        'Email Address',
	        'Mobile Phone',
	        'Actual Amount',
			'Paid Amount',
            '',
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
    var payee_mobile_phone = '<?php echo $_SESSION['mobile']; ?>';
    var payee_email_address = '<?php echo $_SESSION['email']; ?>';
    var invoiceDetailId;
    var transactionHash;
    var invoice_detail_id;

    $(document).ready(function(){ 

        $("#transactionDate").datepicker({
            format      : 'dd/mm/yyyy',
            orientation : 'bottom auto',
            autoclose   : true
        });

        $('#status').select2({
            dropdownAutoWidth : true,
            
        });
        
        $("#status").append('<option class= "" value="" href="javascript:void(0)">All</option>');
        $("#status").append('<option class= "" value="success" href="javascript:void(0)"><?php echo $translations["M01488"][$language]; /* Paid */ ?></option>');
        $("#status").append('<option class= "" value="pending" href="javascript:void(0)"><?php echo $translations["M01487"][$language]; /* Waiting for Payment */ ?></option>');
        $("#status").append('<option class= "" value="short_paid" href="javascript:void(0)"><?php echo $translations["M01489"][$language]; /* Short-Paid */ ?></option>');
        
        if(`<?php echo $_POST['searchData'] ?>` != "") {
            searchCallBack();
        } else{
            fCallback = loadTransactionListing;
            formData  = {
                command: 'getInvoiceList',
                page: pageNumber,
                payee_mobile_phone: payee_mobile_phone,
                payee_email_address: payee_email_address
            };
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        $("#searchSection .searchDesign").change(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#searchTransactionBtn').click(function() {
            // pagingCallBack(pageNumber, loadSearch);
            var myUrl = "<?php echo basename($_SERVER['PHP_SELF']);?>";

            var date_from, date_to;

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
                payee_email_address : payee_email_address,
                payee_mobile_phone : payee_mobile_phone,
                status : status,
                date_from : date_from,
                date_to : date_to,
                payer_mobile_phone : payer_mobile_phone,
                payer_email_address : payer_email_address,
                page: pageNumber,
                see_all : see_all
            };

            $.redirect("searchField.php", {
                url: myUrl,
                searchData: JSON.stringify(formData)
            });
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

        $("#searchButton").click(function(){
            searchTransactionHash();
        });

        $("#updateButton").click(function(){
            updateTransaction();
        });

    });

    function pagingCallBack(pageNumber, fCallback){

        var searchId   = 'searchSection';
        var searchData = buildSearchDataByType(searchId);
        var from, to;

        var status = $("#status").val();
        var payer_name = $("#payerName").val();
        var payer_mobile_phone = $("#payerPhone").val();
        var payer_email_address = $("#payerEmail").val();
        var see_all = $("#seeAll").is(":checked") ? '1':'0';

        if ($("#firstDate").val()) {
            from = $("#firstDate").val();
            from = moment(from).format('DD/MM/YYYY');
            from = dateToTimestamp(from + " 00:00:00");
        }else{
            from="";
        }
        if ($("#lastDate").val()) {
            to = $("#lastDate").val();
            to = moment(to).format('DD/MM/YYYY');
            to = dateToTimestamp(to + " 23:59:59");
        }else{
            to="";
        }


        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command : 'getInvoiceList',
            payer_name : payer_name,
            payee_mobile_phone : payee_mobile_phone,
            payee_email_address : payee_email_address,
            status : status,
            date_from : from,
            date_to : to,
            payer_mobile_phone : payer_mobile_phone,
            payer_email_address : payer_email_address,
            page: pageNumber,
            see_all : see_all
        };

        if(!fCallback)
            fCallback = loadTransactionListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function searchCallBack(pageNumber, fCallback){

        var searchId   = 'searchSection';
        var searchData = JSON.parse(`<?php echo $_POST['searchData'] ?>`);

        // alert("searchCallBack");


        if(pageNumber > 1) bypassLoading = 1;

        var formData = searchData;
        formData["searchParam"] = "<?php echo $_POST['newSearchVal'] ?>";

        $("#firstDate").val(moment.unix(formData['date_from']).format("DD/MM/YYYY"));
        $("#lastDate").val(moment.unix(formData['date_to']).format("DD/MM/YYYY"));
        $("#status").val(formData['status']);

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

                var viewBtn = `<button class="btn searchBtn" style="min-width:50px" onclick="goToDetails('${v['transaction_token']}')"><i class="fa fa-eye"></i></button>`;
                var updateBtn = '<button id="updateBtn" class="col-1 btn searchBtn my-2" data-id="'+v['id']+'" onclick="updateOnClick(this)">Update Transaction</button>'
                
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

                


                var buildCurrencyIcon = `
                <img src="${v['image']}" class="currencyLogo">

                `;

                
                var rebuildData = {
                    currency : buildCurrencyIcon,
                	created_at : dateTimeToDateFormat(v['created_at']),
                	payer_name : v['payer_name'],
                	payer_email_address : `<p style="text-align:center; margin-top:unset; margin-bottom:unset;">${v['payer_email_address'] == '' ? '-' : v['payer_email_address']}</p>`,
                	payer_mobile_phone : `<p style="text-align:center; margin-top:unset; margin-bottom:unset;">${v['payer_mobile_phone'] == '' ? '-' : v['payer_mobile_phone']}</p>`,
                	payment_amount : v['payment_amount'],
                    paid_amount: v['total_paid'],
                    button: updateBtn,
                    viewBtn: viewBtn 
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

        $('#'+tableId).find('thead tr').each(function(){
            $(this).find('th:eq(1)').css('white-space', "nowrap");
        });

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find('td:eq(1)').css('white-space', "nowrap");
        });

       	if(invoiceList) {
        	$.each(invoiceList, function(k, v) {
          		$('#'+tableId).find('tr#'+k).attr('data-token', v['transaction_token']);
        	});
      	}
       	// $('#'+tableId).find('tbody tr').click(function()
    	// {
        //     var getToken = $(this).attr("data-token");
    	// 	$.redirect('viewInvoice.php', {
    	// 		token: getToken
    	// 	});
        // });
    }

    function updateOnClick(elem){
        invoice_detail_id = $(elem).attr('data-id');
        $('#updateTxModal').modal();
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
		return moment(now).format('lll');
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
            title:"<?php echo $translations["M00137"][$language]; /* Copied to clipboard  */?>",
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
        showMessage(data.message_d, 'success', '', 'check-circle-o', 'invoiceListing.php')

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
        width: 250px;
    }

    .searchBox.seacrhWalletBox {
        border: 1px solid #dedede;
        padding: 0px;
        background-color: #fff;
        display: inline-flex;
        align-items: center;
        margin-right: 5px;
        height: 32px;
        width: 250px;
    }

</style>