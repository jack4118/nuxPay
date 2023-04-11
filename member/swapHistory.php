<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">
				<div class="row d-flex justify-content-between">
					<div class="col-6 pageHeader mt-3 mb-5 pl-3">                    
                    <?php echo $translations["M01875"][$language]; /* Swap History */ ?>
					</div>
				</div>		
			</div>
                
			<div class="m-content">
	                        
							<div class="form-group searchBox">
								<label class="searchLabel">
								<?php echo $translations["M00602"][$language]; /* From */?>:
								</label>
								<input id="firstDate" type="text" class="searchDesign" />
							</div>

							<div class="form-group searchBox" style="width: 190px">
								<label class="searchLabel">
									<?php echo $translations["M00603"][$language]; /* To */?>:
								</label>
								<input id="lastDate" type="text" class="searchDesign" />
                            </div>
                            
							
							<div class="form-group searchBox" style="width:175px">
								<label style="margin:0px"><?php echo $translations["M00322"][$language]; /* Status */ ?>:</label>
								<select class="searchDesign" id="status">
									<option class= "" value="" href="javascript:void(0)">All</option>
									<option class= "" value="processing" href="javascript:void(0)"><?php echo $translations["M01913"][$language]; /* Processing*/ ?></option>
									<option class= "" value="completed" href="javascript:void(0)"><?php echo $translations["M01914"][$language]; /* Completed */ ?></option>
									<option class= "" value="canceled" href="javascript:void(0)"><?php echo $translations["M01915"][$language]; /* Canceled */ ?></option>
								</select>
							</div>
						
                    
                                         <!-- </div> -->

                                

                <div class="col-12 text-center my-5" id="showErrorMsg" style="display: none">
                    <div class="row">
                        <div class="col-12">
                            <img src="<?php echo $sys['source'] == 'FTAG' ?  'images/whitelabel/ftag/no-withdrawal.png' :  'images/nuxPay/newDesign/noWalletIcon.png'?>">
                        </div>
                        <div class="col-12 mt-3 bigText">
                         	<?php echo $translations["M01870"][$language]; /*No Transactions*/ ?>
                        </div>

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
			
			'<?php echo $translations["M01620"][$language]; /* Date, Time */?>',            
            '<?php echo $translations["M01910"][$language]; /* Swap From */?>', 
            '<?php echo $translations["M01911"][$language]; /* Swap To */?>', 
            '<?php echo $translations["M01912"][$language]; /* Exchange Rate */?>', 
            '<?php echo $translations["M00322"][$language]; /* Status */?>',            
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


    var url             = 'scripts/reqSwap.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var dropdownFake;
    var status;
    var tableRowDetails = [];
    var img_list;
    var symbol_list;
    var searchTab;
    var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';
    var checkWalletStatus = 1;
    
    if (hasChangedPassword == 0){
        $.redirect('firstTimeLogin.php');
    }

    $(document).ready(function(){ 
        // $("#transactionDate").datepicker({
        //     format      : 'dd/mm/yyyy',
        //     orientation : 'bottom auto',
        //     autoclose   : true
        // });


        $("#sideSwapLi").addClass('activeNav');        
        $("#sideSwapImg").attr("src", "images/swap/swap-onselect.png");

        if('<?php echo $_POST['searchData'] ?>' != "") {
            searchCallBack();
        } else{
            formData  = {
                command     : 'getSwapList',
                status      : status,
                page        : pageNumber
            };

            fCallback = loadWithdrawalListing;
            ajaxSend('scripts/reqSwap.php' ,formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
//once change some error occurs
        formData  = {
            // command: 'getWalletType'
            command: 'getWalletBalance',
            wallet_status: checkWalletStatus
        };  
        fCallback = getWalletType;  
        ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $("#successBtn").click(function(){
            status = "completed";
            searchTab = "Request Fund";
            // var formData = {
            //     command : 'getWithdrawalList',
            //     status : status,
            // };

            // fCallback = loadWithdrawalListing;
            // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            pagingCallBack();
            $("#successBtn").addClass("active");
            $("#pendingBtn").removeClass("active");
        });

        $("#pendingBtn").click(function(){
            status = "processing";
            searchTab = "API Integration";

            // var formData = {
            //     command : 'getWithdrawalList',
            //     status : status,
            // };

            // fCallback = loadWithdrawalListing;
            // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            pagingCallBack();
            $("#pendingBtn").addClass("active");
            $("#successBtn").removeClass("active");
        });


        $("#resendRedeemCode").click(function(){

             var formData = {
                 command : 'getSwapList',
                 redeem_code : status,
                 page        : pageNumber
             };

             fCallback = loadWithdrawalListing;
             ajaxSend('scripts/reqSwap.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            pagingCallBack();
            $("#successBtn").addClass("active");
            $("#pendingBtn").removeClass("active");
        }); 


        $("#searchSection .searchDesign").change(function() {
			console.log('change');
            pagingCallBack(status, loadSearch);
        });

//button change function
        $(".searchDesign").change(function() {
			console.log('change');
            pagingCallBack(pageNumber, loadSearch);
        });


        $('#searchTransactionBtn').click(function() {
            // pagingCallBack(pageNumber, loadSearch);

            var myUrl = "<?php echo basename($_SERVER['PHP_SELF']);?>";

            var date_from, date_to;
            var date_from = sanitize($("#firstDate").val());
            var date_to = sanitize($("#lastDate").val());

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
                command : 'getSwapList',
                page: pageNumber,
                status : status,
                date_from : date_from,
                date_to : date_to
            };
			console.log('search tab');
			console.log(searchTab);

            $.redirect("searchField.php", {
                url: myUrl,
                searchData: JSON.stringify(formData),
				searchTab: searchTab
            });
        });

        $('#resetTransactionBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
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

            pagingCallBack();
        });

        $('#lastDate').click(function() {
            $('#firstDate').trigger('click');
        });
        $('input[name="start"]').on('apply.daterangepicker', function (ev, picker) {
            $('#firstDate').val(picker.startDate.format('DD/MM/YYYY'));
            $('#lastDate').val(picker.endDate.format('DD/MM/YYYY'));
        });

    });

        
//joe ingore
    /* function resendRedeemCode(){
		  var formData = {
			 command : 'webpayredeempinresend',
			 redeem_code : $('#modalRedeemCode').text(),
		 };
		console.log(formData);

		 fCallback = 	loadResendRedeemCode;
		 ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	} 
	*/
	
    $('#walletType').change(function() {
           pagingCallBack(pageNumber, loadSearch);
    }); 

    function encrypt(w, n) {
        return w.substring(0, n)+"..."+w.substr(w.length-n);
    }


    //From to Pick//
    function pagingCallBack(pageNumber, fCallback){

        var searchId   = 'searchTransaction';
        var searchData = buildSearchDataByType(searchId);
        var date_from, date_to;
        var date_from = sanitize($("#firstDate").val());
        var date_to = sanitize($("#lastDate").val()); 
        var status = sanitize($('select#status option:selected').val());
        console.log(status);
   //joeignore
     /* var wallet_type = $('select#walletType option:selected').val();
        var name = $("#searchName").val(); 
        var email = $("#searchEmail").val(); 
        var mobileNumber = $("#searchMobileNumber").val(); */
		

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


        if(pageNumber > 1) bypassLoading = 1;

        //if touched swapcoin not found
        //or fixed calendar and swapcoin in webservices
        
//        if (searchTab == "Request Fund"){
//here ah
                var formData = {
                command : 'getSwapList',
                date_from : from,
                date_to : to,
                status : status,
                page        : pageNumber
            };

            if(!fCallback)
                fCallback = loadWithdrawalListing;

            ajaxSend('scripts/reqSwap.php',formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0); 
//        } else if (searchTab == "API Integration"){
//            var formData = {
//                command: 'payment_gatewayapiwithdrawallistget',
//                page: pageNumber,
//                status : status,
//                date_from : from,
//                date_to : to,
//                wallet_type: wallet_type
//            }
//
//            if(!fCallback)
//                fCallback = loadWithdrawalListing;
//
//            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
//        }

    }

    function searchCallBack(pageNumber, fCallback){

        var searchId   = 'searchSection';
        var searchData = JSON.parse('<?php echo $_POST['searchData'] ?>');

        // alert("searchCallBack");


        if(pageNumber > 1) bypassLoading = 1;

        var formData = searchData;
        formData["searchParam"] = "<?php echo $_POST['newSearchVal'] ?>";
		var tab = "<?php echo $_POST["searchTab"]?>";
		console.log('tab');
		console.log(tab);

		if(formData['date_from']){
			  $("#firstDate").val(moment.unix(formData['date_from']).format("DD/MM/YYYY"));
		}
      
		if(formData['date_to']){
			 $("#lastDate").val(moment.unix(formData['date_to']).format("DD/MM/YYYY"));
		}
       

        if(tab == 'Request Fund') {
            $("#successBtn").addClass("active");
            $("#pendingBtn").removeClass("active");
        }else if(tab == 'API Integration'){
            $("#pendingBtn").addClass("active");
            $("#successBtn").removeClass("active");
        }

        if(!fCallback)
            fCallback = loadWithdrawalListing;

        ajaxSend('scripts/reqSwap.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    //joe ignore
	 function loadResendRedeemCode(data, message){
		if(data.code == 1){
			showMessage(data.message_d, 'success', 'Success', 'check-circle-o');
		}
		
	} 
	
    function loadWithdrawalListing(data, message) {
        
        
        var tableNo;
        var swapList = data.data.swapHistory;
        

        if(swapList && swapList.length > 0) {
        	$('#showErrorMsg').hide();
        	$('#showresultListing').show();

            var newList = [];
            tableRowDetails = [];
            $.each(swapList, function(k, v) {
//                v['wallet_type'] = v['wallet_type'].toLowerCase();
//                if (searchTab == "API Integration"){
//                    v['destination_address'] = v['recipient_external'] ? v['recipient_external'] : v['recipient_internal'];
//                }
                tableRowDetails.push(v);

 //               var buildCurrencyIcon = `
 //               <img src=${img_list[v['wallet_type']]} class="currencyLogo">

//                `;

                var rebuildData = {
                    
 //                   currency : buildCurrencyIcon,
                    
                    created_at : dateTimeToDateFormat(v['created_at']),
//                   destination_address : encrypt(v['destination_address'], 6),
                    swap_from: v['from_amount'] +' '+ (v['from_display_symbol'].toUpperCase()),
                    swap_to: v['to_amount_display'] +' '+ (v['to_display_symbol'].toUpperCase()),
                    exchange_rate : '1' +' '+ (v['from_display_symbol'].toUpperCase()) + ' : ' + v['exchange_rate_display'] +' '+ (v['to_display_symbol'].toUpperCase()),
					status: v['status']
//                    miner_fee: v['miner_fee'],
//                	nett_amount : v['amount']
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
            $(this).click(runModal);

           });

        $('#'+tableId).find("tr:eq(1)").find('td:eq(0)').each(function(){
            $(this).addClass("center");
        });
        
        $('#'+tableId).find("tr:eq(2)").find('td:eq(0)').each(function(){
            $(this).addClass("center");
        });
            $('#'+tableId).find("tr:eq(3)").find('td:eq(0)').each(function(){
            $(this).addClass("center");
        });

        $('#'+tableId).find("tr:eq(4)").find('td:eq(0)').each(function(){
            $(this).addClass("center");
        });
        
        
      
        



        // This part below for data table extend row in mobile view

        // $('#'+tableId+' th:nth-child(1)').before('<th></th>');
        // $('#'+tableId+' td:nth-child(1)').before('<td style="width:30px;"></td>');


        // $('#'+tableId).DataTable({
        //     "paging":   false,
        //     "ordering": false,
        //     "info":     false,
        //     "bFilter": false,
        //     "language": {
        //         "zeroRecords": "", 
        //         "emptyTable": ""
        //     },
        //     responsive: {
        //         details: {
        //             type: 'column',
        //             target: 'tr'
        //         }
        //     },
        //     buttons: [
        //     'colvis'
        // ],
        //     columnDefs: [
        //         { className: 'control', orderable: false, targets: 0 },
        //         { responsivePriority: 1, targets: 1 },
        //         { responsivePriority: 2, targets: 2 },
        //         { responsivePriority: 3, targets: 3 },
        //     ]
        // });

        //End of data table mobile view
        }


        //date pick//
 /*  function dateTimeToDateFormat(dateTimeValue)
    {
    	// Set variable to current date and time
		const now = new Date(dateTimeValue);
		return moment(now).format('lll');
    }*/
//joe ignore

/*    function copyToClipboard(val){
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
            title:"Copied to clipboard",
            showConfirmButton:!1,
            timer:1000
        })
    } */

    function loadSearch(data, message) {
        loadWithdrawalListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations["M00334"][$language]; /* Search Successful */ ?>.</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

   function runModal() { 
        var tableRowID = $(this).attr("id");
        var currentRow = tableRowDetails[tableRowID];
//        var currentSymbol = symbol_list[currentRow["wallet_type"]].toUpperCase()
//        $('#modalCoinImg').attr('src', img_list[currentRow["wallet_type"]]);
        $('#modalTitleNettAmount').html(currentRow["amount"] + ' ' + currentSymbol);
        $('#modalCreatedDate').html("<?php echo $translations["M01610"][$language]; /* Created on */?> " + dateTimeToDateFormat(currentRow["created_at"]));
        $('#modalTxId').html(encrypt(currentRow["transaction_hash"], 10));
        $('#modalActualAmount').html(currentRow["withdrawal_amount"] + ' ' + currentSymbol);
        $('#modalMinerFee').html(currentRow["miner_fee"] + ' ' + currentSymbol);
        $('#modalNettAmount').html(currentRow["amount"] + ' ' + currentSymbol);
        $('#modalWithdrawTo').html(encrypt(currentRow["destination_address"], 10));
        // $('#modalURL').attr('href', `<?php echo $sys["txDomain"]?>` + currentRow["transaction_hash"]);
		$('#modalPaidTo').html(encrypt(currentRow['destination_address'],10));
		$('#modalPaidFrom').html(encrypt(currentRow['sender_address'],10));
		
        $('#modalName').html(currentRow['recipient_name']);

//joe ignore 
	/*	if(currentRow['recipient_mobile_number'] != '-'){
			console.log('emtpy');
			$('#modalEmailMobile').html(currentRow["recipient_mobile_number"]);
		}
		else{
			$('#    ').html(currentRow["recipient_email_address"]);
		} */ 
//joe ignore
	
//joe ignore    
	/*	$('#modalDescription').html(currentRow["description"]);
		console.log(currentRow['transaction_type']);
		$('#redeemCodeDiv').hide();
		if(currentRow['transaction_type']== 'send_fund'){
			$('#redeemCodeDiv').show();
		}
		$('#modalRedeemCode').html(currentRow["redeem_code"]);
		$('#modalStatus').html(currentRow['status']); */
//joe ignore

//joe ignore modal status
/*		if(currentRow['status'] == 'Pending'){
			console.log('status');
			$('#modalStatus').addClass('pending');
			$('#modalStatus').removeClass('success');
		}
		else if(currentRow['status'] == 'Failed'){
			$('#modalStatus').addClass('failed');
			$('#modalStatus').removeClass('success');
		}
		else{
			$('#modalStatus').addClass('success');
		}   */
		
//joe ignore		

//ignore thene wont load
        $('#modalCopyTxId').click(function() {
            copyToClipboard(currentRow["transaction_hash"])
        });

        $('#modalCopyWithdrawTo').click(function() {
            copyToClipboard(currentRow["destination_address"])
        });

        $('#withdrawalDetailsModal').modal();
	} 

    
    function dateTimeToDateFormat(dateTimeValue)
    {
    	// Set variable to current date and time
		// const now = new Date(dateTimeValue);
		// console.log("date time value = " + moment(dateTimeValue).format('LLL'));
		return moment(dateTimeValue).format('LLL');
    } 


    function getWalletType(data, message){
        // if(data.result.coin_data && dropdownFake !=1) {
        if(data.data && dropdownFake !=1) {
            $('#walletType').empty();
            $('#walletType').append('<option value=""><?php echo $translations["M01486"][$language]; /* All */?></option>');
            $.each(data.data, function(key, val) {
                $('#walletType').append('<option data-image="'+val['image']+'" value="'+ val['currency_id'] +'">'+ val['symbol'] +'</option>')
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

</script>

<style>
   .center{
         text-align: center;
                } 
    .right{
         text-align: right;
    }
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
</style>

