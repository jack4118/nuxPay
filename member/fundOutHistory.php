<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>



<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">
			<div class="m-subheader marginTopHeader">
                <div class="col-12 pageHeader mt-3 mb-5 pl-3">
                    <?php echo $translations["M02046"][$language]; /* Batch Transfer */ ?>
                </div>

				<div class="d-flex align-items-center">
                    <div class="col-12">
                        <div class="d-flex border-bottom justify-content-between">
                            <nav class="nav">
                                <a class="nav-link active" id="successBtn" href="javascript:void(0)">
                                    <?php echo $translations["M00323"][$language]; /* Success */?>
                                </a>
                                <a class="nav-link" id="pendingBtn" href="javascript:void(0)">
                                <?php echo $translations["M01485"][$language]; /* Pending */?>
                                </a>
                                <a class="nav-link" id="failedBtn" href="javascript:void(0)">
                                    <?php echo $translations["M00168"][$language]; /* Failed */?>
                                </a>
                            </nav>

                            <!-- <div>
                                <a id="searchTransactionBtn" href="#" class="btn btnSearch mx-2 my-2" style="" role="button">
                                    <img src="images/search.png" class="headerIconSize" style="height: 15px">
                                </a>
                            </div>  -->
                        </div>
                    </div>
				</div>
			</div>



			<div class="m-content">
                <div class="col-xl-12 px-0" id="searchSection">
                    <div class="form-group searchBox searchWalletBox">
                        <select class="searchDesign" id="walletType"></select>
                    </div>

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

                    <div class="form-group exportBtn">
                        <button id="exportBtn" class="col-1 btn searchBtn my-2" onClick="onExport()" type="button">
                            <?php echo $translations["M01634"][$language]; /* Export CSV */?>
                        </button>
                    </div>
                    
                </div>

                <div class="col-12 text-center my-5" id="showErrorMsg" style="display: none">
                    <div class="row">
                        <div class="col-12">
                            <img src="<?php echo $sys['source'] == 'FTAG' ?  'images/whitelabel/ftag/no-withdrawal.png' :  'images/nuxPay/newDesign/noWalletIcon.png'?>">
                        </div>
                        <div class="col-12 mt-3 bigText">
                            
                            <?php echo $translations["M01635"][$language]; /* No Fund Out History */?>
                        </div>
                        <div class="col-12">                            
                            <?php echo $translations["M01636"][$language]; /* Make fund out transaction to have fund out history. */?>
                        </div>
                    </div>
                </div>

				<div class="col-xl-12 px-0" id="showresultListing" style="display: block;">
                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                        <div class="table-responsive" id="fundOutHistoryListDiv"></div>
                        <div class="m-datatable__pager m-datatable--paging-loaded clearfix m-t-rem3">
                            <ul class="m-datatable__pager-nav" id="fundOutHistoryPager">
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

<div class="modal fade" id="withdrawalDetailsModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b justify-content-center">
                <div class="row">
                    <div class="modal-title col-12 text-center">
                        <img src="" id="modalCoinImg">
                    </div>
                    <div class="modalAmount mt-2 col-12 text-center" id="modalTitleNettAmount">
                        1,000 USDT
                    </div>
                    <div class="success text-center mt-4 mx-auto" id="modalTitleStatus">                        
                        <?php echo $translations["M00615"][$language]; /* Success */?>
                    </div>
                    <div class="col-12 modalTime text-center mt-2" id="modalCreatedDate">
                        <?php echo $translations["M01610"][$language]; /* Created on */?> Aug 20, 2020, 11:50 AM
                    </div>
                </div>
                
            </div>
            <div class="modal-body withdrawalDetailsModal border-b col-12" style="line-height: 25px; border-bottom-left-radius: .3rem; border-bottom-right-radius: .3rem; padding-bottom: 20px;">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0 text-right">
                                    <?php echo $translations["M01628"][$language]; /* Transaction ID */?>:
                                </div>
                                <div class="col-8">
                                    <span style="word-break: break-all;" id="modalTxId">
                                        0x1fb426209a5...3c021cad52ce32
                                    </span>
                                    <span>
                                        <img src="images/dashboard/newCopyIcon.png" style="width: 25px; padding-left:5px" id="modalCopyTxId">
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0 text-right">
                                    <?php echo "Sender Address"; /* Sender Address */?>:
                                </div>
                                <div class="col-8">
                                    <span style="word-break: break-all;" id="modalSenderAddress">
                                        0x1fb426209a5...3c021cad52ce32
                                    </span>
                                    <span>
                                        <img src="images/dashboard/newCopyIcon.png" style="width: 25px; padding-left:5px" id="modalCopySenderAddress">
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0 text-right">
                                    <?php echo "Recipient Address"; /* Recipient Address */?>:
                                </div>
                                <div class="col-8">
                                    <span style="word-break: break-all;" id="modalRecipientAddress">
                                        0x1fb426209a5...3c021cad52ce32
                                    </span>
                                    <span>
                                        <img src="images/dashboard/newCopyIcon.png" style="width: 25px; padding-left:5px" id="modalCopyRecipientAddress">
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0 text-right">                                    
                                    <?php echo $translations["M00331"][$language]; /* Actual Amount */?>:
                                </div>
                                <div class="col-7" id="modalActualAmount">
                                    995 USDT
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0 text-right">                                    
                                    <?php echo $translations["M01624"][$language]; /* Processing Fee */?>:
                                </div>
                                <div class="col-7" id="modalProcessingFee">
                                    3.55 USDT
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0 text-right">                                    
                                    <?php echo $translations["M01630"][$language]; /* Miner Fee */?>:
                                </div>
                                <div class="col-7" id="modalMinerFee">
                                    3.55 USDT
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0 text-right">                                    
                                    <?php echo $translations["M01631"][$language]; /* Nett Amount */?>:
                                </div>
                                <div class="col-7" id="modalNettAmount">
                                    991.45 USDT
                                </div>
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


<div class="modal fade" id="withdrawalDetailsModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b justify-content-center">
                <div class="row">
                    <div class="modal-title col-12 text-center">
                        <img src="" id="modalCoinImg">
                    </div>
                    <div class="modalAmount mt-2 col-12 text-center" id="modalTitleNettAmount">
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
			<div class="modal-body withdrawDetailsModal	 border-b col-12" style="line-height: 25px; border-bottom-left-radius: .3rem; border-bottom-right-radius: .3rem; padding-bottom: 20px; border-bottom: 1px solid #e9ecef;">
                <div class="col-12">
                    <div class="row">
						<div class="col-12"><h4>
                            <?php echo $translations["M02044"][$language]; /* Receiver Details */?>
						</h4>
						</div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    <?php echo $translations["M01774"][$language]; /* Name */?>:
                                </div>
                                <div class="col-8" style="word-break: break-all;">
                                    <span id="modalName">
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

						<div class="col-12" id="redeemCodeDiv" style="display:none;">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    <?php echo $translations["M01794"][$language]; /* Redemption PIN */?>:
                                </div>
                                <div class="col-4 pr-0" style="word-break: break-all;">
                                    <span id="modalRedeemCode">
                                        -
                                    </span>
                                    
                                </div>
								<div class="col-4 pr-0 text-right">
									<button class="btn primaryBtn" onclick="resendRedeemCode()">Re-send</button>
								</div>
                            </div>
						</div>
                        
                    </div>
                </div>
            </div>
 			<div class="modal-body withdrawDetailsModal border-b col-12" style="line-height: 25px; border-bottom-left-radius: .3rem; border-bottom-right-radius: .3rem; padding-bottom: 20px;">
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

                                <div class="col-7" id="modalFee">
                                    0 USDT

                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    <?php echo $translations["M01630"][$language]; /* Miner Fee */?>
                                </div>

                                <div class="col-7" id="modalMinerFee">
                                    0 USDT

                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    <?php echo $translations["M02049"][$language]; /* Transaction Type */?>
                                </div>

                                <div class="col-7" id="modalTransactionType">
                                    -

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
   
    var divId    = 'fundOutHistoryListDiv';
    var tableId  = 'fundOutHistoryListTable';
    var pagerId  = 'fundOutHistoryPager';
    var btnArray = {};
    var thArray  = Array(
            '',
            '<?php echo $translations["M01620"][$language]; /* Date, Time */?>',
            '<?php echo "Sender address"; /* Sender address */?>',
            '<?php echo $translations["M02095"][$language]; /* Fund out to */?>',
            '<?php echo $translations["M01800"][$language]; /* Amount */?>',
            '<?php echo $translations["M01624"][$language]; /* Processing Fee */?>',
            "<?php echo $translations["M01630"][$language]; /* Miner Fee */?>",
            '<?php echo $translations["M01631"][$language]; /* Nett Amount */?>'
        );

    var divId2    = 'fundOutHistoryListDiv';
    var tableId2  = 'fundOutHistoryListTable';
    var pagerId2  = 'fundOutHistoryPager';
    var btnArray2 = {};
    var thArray2  = Array(
            '',
            '<?php echo $translations["M01620"][$language]; /* Date, Time */?>',
            '<?php echo "Sender address"; /* Sender address */?>',
            '<?php echo $translations["M02095"][$language]; /* Fund out to */?>',
            '<?php echo $translations["M01800"][$language]; /* Amount */?>',
            '<?php echo $translations["M01344"][$language]; /* Remarks */?>'
            
        );



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
    var tableRowDetails = [];
    var img_list;
    var symbol_list;
    var searchTab;
    var wallet_type = '<?php echo $_POST['wallet_type_params']; ?>';
    var coinListArr = [];
    var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';

    if (hasChangedPassword == 0){
        $.redirect('firstTimeLogin.php');
    }

    $(document).ready(function(){ 
        searchTab = "Success";
        status = "confirmed";
        
        // load credit type for dropdown
        loadFundOutCoinListing();

        // load listing
        // if('<?php echo $_POST['searchData'] ?>' != "") {
            // searchCallBack();
        // } else{
            formData  = {
                command     : 'getFundOutListing',
                status      : status,
                wallet_type : wallet_type,
                pageNumber        : pageNumber
            };

            fCallback = loadFundOutListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, 1, 0);
        // }


        $("#successBtn").click(function(){
            status = "confirmed";
            searchTab = "Success";
            
            pagingCallBack();

            $("#successBtn").addClass("active");
            $("#pendingBtn").removeClass("active");
            $("#failedBtn").removeClass("active");
        });

        $("#pendingBtn").click(function(){
            status = "pending";
            searchTab = "Pending";
            
            pagingCallBack();

            $("#pendingBtn").addClass("active");
            $("#successBtn").removeClass("active");
            $("#failedBtn").removeClass("active");

        });

        $("#failedBtn").click(function(){
            status = "failed";
            searchTab = "Failed";
            
            pagingCallBack();

            $("#failedBtn").addClass("active");
            $("#successBtn").removeClass("active");
            $("#pendingBtn").removeClass("active");
        });

        $('#searchTransactionBtn').click(function() {

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
                command : 'getFundOutListing',
                pageNumber: pageNumber,
                status : status,
                wallet_type : wallet_type,
                date_from : date_from,
                date_to : date_to
            };
			
            $.redirect("searchField.php", {
                url: myUrl,
                searchData: JSON.stringify(formData),
				searchTab: searchTab
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


    function encrypt(w, n) {
        return w.substring(0, n)+"..."+w.substr(w.length-n);
    }

    function pagingCallBack(pageNumber, fCallback){

        var searchId   = 'searchTransaction';
        var searchData = buildSearchDataByType(searchId);
        var date_from, date_to;
        var date_from = sanitize($("#firstDate").val());
        var date_to = sanitize($("#lastDate").val()); 
        var wallet_type = $('select#walletType option:selected').val();

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

        if (searchTab == "Success"){
            status = "confirmed";
            formData  = {
                command     : 'getFundOutListing',
                status      : status,
                wallet_type : wallet_type,
                date_from   : from,
                date_to     : to,
                pageNumber  : pageNumber
            };

            if(!fCallback)
                fCallback = loadFundOutListing;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        } else if (searchTab == "Pending"){
            status = "pending";
            formData  = {
                command     : 'getFundOutListing',
                status      : status,
                wallet_type : wallet_type,
                date_from   : from,
                date_to     : to,
                pageNumber  : pageNumber
            };

            if(!fCallback)
                fCallback = loadFundOutListing;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }else if (searchTab == "Failed"){
            status = "failed";
            formData  = {
                command     : 'getFundOutListing',
                status      : status,
                wallet_type : wallet_type,
                date_from   : from,
                date_to     : to,
                pageNumber  : pageNumber
            };

            if(!fCallback)
                fCallback = loadFundOutListing;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

    }

    function loadFundOutListing(data, message) {
		var tableNo, tableNo2;
        var fundOutListing = data.data;
        var paginationData = data.pagination;
        img_list = data.crypto.crypto_img_list;
        symbol_list = data.crypto.crypto_symbol_list;
        console.log(data)

        if(fundOutListing && fundOutListing.length > 0) {
        	$('#showErrorMsg').hide();
        	$('#showresultListing').show();

            var newList = [];
            var newList2 = [];
            tableRowDetails = [];
            if(searchTab == "Success" || searchTab == "Pending"){
                
                $.each(fundOutListing, function(k, v) {
                tableRowDetails.push(v);
                var buildCurrencyIcon = '<img src="'+v['coin_img_url']+'" class="currencyLogo">';
                
                var rebuildData = {
                    coin_img_url : buildCurrencyIcon,
                    created_at : dateTimeToDateFormat(v['created_at']),
                    sender_address : encrypt(v['sender_address'], 6),
                    destination_address : encrypt(v['recipient_address'], 6),
                    amount : v['amount'],
                    service_charge_amount: v['service_charge_amount'],
                    pool_amount: v['pool_amount'],
                    total : v['total']
                };

                newList.push(rebuildData);
                });
            
            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, paginationData.pageNumber, paginationData.totalPage, paginationData.totalRecord, paginationData.numRecord);


            $('#'+tableId).find('tbody tr').each(function(){
            $(this).addClass("removeBackgorundColor");
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


            }else if(searchTab == "Failed"){
                $.each(fundOutListing, function(k, v) {
                // console.log(v);

                tableRowDetails.push(v);
                var buildCurrencyIcon = '<img src="'+v['coin_img_url']+'" class="currencyLogo">';
                
                var rebuildData = {
                    coin_img_url : buildCurrencyIcon,
                    created_at : dateTimeToDateFormat(v['created_at']),
                    sender_address : encrypt(v['sender_address'], 6),
                    destination_address : encrypt(v['recipient_address'], 6),
                    amount : v['amount'],
                    remark: v['remark'],
                    
                };

                newList2.push(rebuildData);
                });
                buildTable(newList2, tableId2, divId2, thArray2, btnArray2, message, tableNo2);
                pagination(pagerId2, paginationData.pageNumber, paginationData.totalPage, paginationData.totalRecord, paginationData.numRecord);

                $('#'+tableId).find('tbody tr').each(function(){
                $(this).addClass("removeBackgorundColor");
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
            
        }
        else
        {
        	$('#showErrorMsg').show();
        	$('#showresultListing').hide();
        }
    }

    function dateTimeToDateFormat(dateTimeValue)
    {
    	// Set variable to current date and time
		const now = new Date(dateTimeValue);
		return moment(now).format('lll');
    }

    function dateTimeToDateFormat(dateTimeValue)
    {
    	// Set variable to current date and time
		// const now = new Date(dateTimeValue);
		// console.log("date time value = " + moment(dateTimeValue).format('LLL'));
		return moment(dateTimeValue).format('LLL');
    }

    function getWalletType(data, message){

        if(data.data && dropdownFake !=1) {
            $('#walletType').empty();
            $('#walletType').append('<option value=""><?php echo $translations["M01843"][$language]; /* All */?></option>');
            $.each(data.data, function(key, val) {
                $('#walletType').append('<option data-image="'+val['image']+'" value="'+ val['wallet_type'] +'">'+ (val['display_symbol']).toUpperCase() +'</option>');
            });

            dropdownFake = 1;
            $('select#walletType').val(wallet_type).trigger('change');

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

        $('#walletType').change(function() {
           pagingCallBack();
        });
    }

    function onExport(){
        // status = "success";
        
        var from = sanitize($("#firstDate").val());
        var to = sanitize($("#lastDate").val()); 
        var wallet_type = $('select#walletType option:selected').val();

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

        if(searchTab == "Success"){
            status = "confirmed"

            var formData  = {
            command    : "/xun/payment_gateway/get/fund/out/listing",
            filename   : "FundOutListReport",
            status     : status,
            currency_id : wallet_type,
            date_from   : from,
            date_to     : to,
            type       : "export"
        };
            $.redirect('exportExcel.php', formData); 

        }else if(searchTab == "Pending"){
            status = "pending"

            var formData  = {
            command    : "/xun/payment_gateway/get/fund/out/listing",
            filename   : "FundOutListReport",
            status     : status,
            currency_id : wallet_type,
            date_from   : from,
            date_to     : to,
            type       : "export"
        };
            $.redirect('exportExcel.php', formData); 

        }else if(searchTab == "Failed"){
            status = "failed"

            var formData  = {
            command    : "/xun/payment_gateway/get/fund/out/listing",
            filename   : "FundOutListReport",
            status     : status,
            currency_id : wallet_type,
            date_from   : from,
            date_to     : to,
            type       : "export"
        };
            $.redirect('exportExcel.php', formData); 
        }
        
    }
    
    function loadFundOutCoinListing(){
        formData = {
            command: 'getFundOutCoinListing',
        };
        fCallback = getWalletType;
        ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function searchCallBack(pageNumber, fCallback){
        console.log('search callback')
        var searchId   = 'searchSection';
        var searchData = JSON.parse('<?php echo $_POST['searchData'] ?>');
        console.log(searchData)

        // alert("searchCallBack");


        if(pageNumber > 1) bypassLoading = 1;

        var formData = searchData;
        formData["searchParam"] = "<?php echo $_POST['newSearchVal'] ?>";
        var tab = "<?php echo $_POST["searchTab"]?>";


        if(formData['date_from']){
            $("#firstDate").val(moment.unix(formData['date_from']).format("DD/MM/YYYY"));
        }

        if(formData['date_to']){
            $("#lastDate").val(moment.unix(formData['date_to']).format("DD/MM/YYYY"));
        }


        if(tab == 'Success') {
            $("#successBtn").addClass("active");
            $("#pendingBtn").removeClass("active");
            $("#failedBtn").removeClass("active");
        }else if(tab == 'Pending'){
            $("#pendingBtn").addClass("active");
            $("#successBtn").removeClass("active");
            $("#failedBtn").removeClass("active");
        }else if(tab == 'Failed'){
            $("#failedBtn").addClass("active");
            $("#successBtn").removeClass("active");
            $("#pendingBtn").removeClass("active");
        }

        if(!fCallback)
            fCallback = loadFundOutListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function runModal() { 
        //var tableRowID = $(this).attr("id");
        var tableRowID = $(this).parent().index();
        var currentRow = tableRowDetails[tableRowID];
        var withdrawalStatus = '';

         console.log(currentRow);
        if (currentRow['status'] == 'confirmed') {
            withdrawalStatus = '<?php echo $translations["M00323"][$language]; /* Success */ ?>';
        } else if (currentRow['status'] == 'received') {
            withdrawalStatus = '<?php echo $translations["M00218"][$language]; /* Pending */ ?>';
        } else if (currentRow['status'] == 'failed') {
            withdrawalStatus = '<?php echo $translations["M00168"][$language]; /* Failed */ ?>';
        }

        console.log(currentRow['status']);
        var currentSymbol = symbol_list[currentRow["wallet_type"]].toUpperCase()
        $('#modalCoinImg').attr('src', img_list[currentRow["wallet_type"]]);
        $('#modalTitleNettAmount').html(currentRow["amount"] + ' ' + currentSymbol);
        $('#modalTitleStatus').html(withdrawalStatus);
        $('#modalCreatedDate').html("<?php echo $translations["M01610"][$language]; /* Created on */?> " + dateTimeToDateFormat(currentRow["created_at"]));
        $('#modalTxId').html(encrypt(currentRow["tx_hash"], 10));
        $('#modalSenderAddress').html(encrypt(currentRow["sender_address"], 10));
        $('#modalRecipientAddress').html(encrypt(currentRow["recipient_address"], 10));
        $('#modalActualAmount').html(currentRow["amount"] + ' ' + currentSymbol);
        $('#modalProcessingFee').html(currentRow["service_charge_amount"] + ' ' + currentSymbol);
        $('#modalMinerFee').html(currentRow["pool_amount"] + ' ' + currentSymbol);
        // $('#modalTransactionType').html(currentRow["transaction_type"]);
        $('#modalNettAmount').html(currentRow["total"] + ' ' + currentSymbol);
        // $('#modalWithdrawTo').html(encrypt(currentRow["destination_address"], 10));

        
        // $('#modalPaidTo').html(encrypt(currentRow['destination_address'],10));
        // if(currentRow['sender_address']) {
        //     var curRowSenderaddress = currentRow['sender_address'];
        //     $('#modalPaidFrom').html(encrypt(curRowSenderaddress,10));
        // } else {
        //     var curRowSenderaddress = '-';
        //     $('#modalPaidFrom').html(curRowSenderaddress);
        // }
        
        // if(currentRow['transaction_fee']) {
        //     var curRowTransactionFee = currentRow['transaction_fee']+' '+currentSymbol;
        //     $('#modalFee').html(curRowTransactionFee);
        // } else {
        //     var curRowTransactionFee = '-';
        //     $('#modalFee').html(curRowTransactionFee);
        // }

        // if(currentRow['miner_fee']) {
        //     var curRowTransactionFee = currentRow['miner_fee']+' '+currentSymbol;
        //     $('#modalMinerFee').html(curRowTransactionFee);
        // } else {
        //     var curRowTransactionFee = '-';
        //     $('#modalMinerFee').html(curRowTransactionFee);
        // }


        // $('#modalCopyTransactionHash').click(function() {
        //     copyToClipboard(currentRow["tx_hash"])
        // });

        // $('#modalCopyPaidTo').click(function() {
        //     copyToClipboard(currentRow["destination_address"])
        // });
        // $('#modalCopyPaidFrom').click(function() {
        //     copyToClipboard(currentRow["sender_address"])
        // });
        

		
		
        // $('#modalName').html(currentRow['recipient_name']);
		
		// if(currentRow['recipient_mobile_number'] != '-'){
		// 	console.log('emtpy');
		// 	$('#modalEmailMobile').html(currentRow["recipient_mobile_number"]);
		// }
		// else{
		// 	$('#modalEmailMobile').html(currentRow["recipient_email_address"]);
		// }
	
		// $('#modalDescription').html('-');

		// console.log(currentRow['transaction_type']);
		// $('#redeemCodeDiv').hide();
		// if(currentRow['transaction_type']== 'send_fund'){
		// 	$('#redeemCodeDiv').show();
		// }
		// $('#modalRedeemCode').html(currentRow["redeem_code"]);
		// $('#modalStatus').html(withdrawalStatus);

		if(currentRow['status'] == 'received'){
			console.log('status');
			$('#modalTitleStatus').addClass('pending');
			$('#modalTitleStatus').removeClass('success');
		}
		else if(currentRow['status'] == 'failed'){
			$('#modalTitleStatus').addClass('failed');
			$('#modalTitleStatus').removeClass('success');
		}
		else{
			$('#modalTitleStatus').addClass('success');
		}
		
        $('#modalCopyTxId').click(function() {
            copyToClipboard(currentRow["tx_hash"])
        });

        $('#modalCopySenderAddress').click(function() {
            copyToClipboard(currentRow["sender_address"])
        });
        
        $('#modalCopyRecipientAddress').click(function() {
            copyToClipboard(currentRow["recipient_address"])
        });

        $('#withdrawalDetailsModal').modal();
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
        height: 35px;
    }

    .searchBox.searchWalletBox {
        border: 1px solid #dedede;
        padding: 0px;
        background-color: #fff;
        display: inline-flex;
        align-items: center;
        margin-right: 5px;
        height: 35px;
        width: 222px;
    }

    .exportBtn {
        float: right;
        display:inline-flex;
        margin-top: -10px;
    }

</style>