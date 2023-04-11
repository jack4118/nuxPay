<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    // if(!isset ($_SESSION['access'][$thisPage]))
    //     echo '<script>window.location.href="accessDenied.php";</script>';
    // $_SESSION['lastVisited'] = $thisPage;
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<!-- Begin page -->
<div id="wrapper">
	<!-- Top Bar Start -->
	<?php include("topbar.php"); ?>
	<!-- Top Bar End -->

	<!-- ========== Left Sidebar Start ========== -->
	<?php include("sidebar.php"); ?>
	<!-- Left Sidebar End -->

	<!-- ============================================================== -->
	<!-- Start right Content here -->
	<!-- ============================================================== -->
	<div class="content-page">
		<!-- Start content -->
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 page-title">
						Fund Out Listing
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default bx-shadow-none">
								<div class="panel-heading" role="tab" id="headingOne">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
											Search
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
										<div id="searchMsg" class="text-center alert" style="display: none;"></div>
										<form id="searchForm" role="form">

											<div class="col-md-4 form-group" style="height: 62px;">
												<label class="control-label">Date Range</label>
												<div class="input-group input-daterange" id="m_datepicker_5">
													<input id="fromDate" type="text" class="form-control input-daterange-from" placeholder="From" dataName="transationDate" dataType="dateRange" autocomplete="off" name="start" />
													<span class="input-group-addon">
														To
													</span>
													<input id="toDate" type="text" class="form-control input-daterange-to" placeholder="To" dataName="transactionDate" dataType="dateRange" autocomplete="off" name="end" />
												</div>
											</div>
											<div class="col-md-4 form-group">
												<label class="control-label">
													Business ID
												</label>
												<input id="businessID" type="text" class="form-control" dataName="name" dataType="text">
											</div>

											<div class="col-md-4 form-group">
                                                <label class="control-label">
                                                    Business Name
                                                </label>
                                                <input id="businessName" type="text" class="form-control" dataName="username" dataType="text">
                                            </div>
											<div class="col-md-4 form-group">
												<label class="control-label" for="" data-th="tx_hash">
													Tx Hash
												</label>
												<input id="hashCode" type="text" class="form-control" dataType="text">
											</div>
											<div class="col-md-4 form-group">
												<label class="control-label" for="" data-th="email">
													Recipient Address
												</label>
												<input id="recipientAddress" type="text" class="form-control" dataType="text">
											</div>
											<div class="col-sm-4 form-group">
												<label class="control-label" data-th="disabled">
													Status
												</label>
												<select id="status" class="form-control" dataName="disabled" dataType="select">
													<option value="">All</option>
													<option value="pending">Pending</option>
													<option value="failed">Failed</option>
													<option value="confirmed">Confirmed</option>
												</select>
											</div>
											<div class="col-md-4 form-group">
												<label class="control-label" for="" data-th="">
													Agent Username
												</label>
												<input id="distributor" type="text" class="form-control" dataType="text">
											</div>
											<div class="col-md-4 form-group">
												<label class="control-label" for="" data-th="">
													Reseller Username
												</label>
												<input id="reseller" type="text" class="form-control" dataType="text">
											</div>
											<div class="col-md-4 form-group">
												<label class="control-label" for="" data-th="">
													Currency
												</label>
												<input id="currency" type="text" class="form-control" dataType="text">
											</div>


										</form>
										<!-- hidden -->

										<div class="col-sm-12 m-t-rem1">
											<button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">
												Search
											</button>
											<button id="resetBtn" type="submit" class="btn btn-default waves-effect waves-light">
												Reset
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12" style="margin: 10px">
						<div class="row">
							<div class="col-md-12">
								<h4 class="dashboardTitle">Transaction Summary</h4>
							</div>
							<div class="col-md-12 dashboardBox" style="margin-top:10px">
								<div class="p-b-0">
									<form>
										<div id="basicwizard" class="pull-in">
											<div class="tab-content b-0 m-b-0 p-t-0">
												<div id="alertMsg" class="alert" style="display: none;"></div>
												<div id="transactionSummaryDiv" class="table-responsive"></div>

											</div>
										</div>
									</form>

								</div>

							</div>
							<div class="col-md-12 dashboardBox">
								<div class="p-b-0">
									<form>
										<div id="basicwizard" class="pull-in">
											<div class="tab-content b-0 m-b-0 p-t-0">
												<div id="alertMsg" class="alert" style="display: none;"></div>
												<div id="transactionStatusDiv" class="table-responsive"></div>

											</div>
										</div>
									</form>

								</div>

							</div>

						</div>
					</div>

				</div>
				<!-- Table -->
				<div class="row" style="margin-top: 20px;">
					<div class="col-md-12">
						<div class="p-b-0">
							<form>
								<div id="basicwizard" class="pull-in">
									<div class="tab-content b-0 m-b-0 p-t-0">
										<div id="alertMsg" class="alert" style="display: none;"></div>
										<div id="fundOutListDiv" class="table-responsive"></div>
										<span id="paginateText"></span>
										<div class="text-center" style="">
											<ul class="pagination pagination-md" id="pagerFundOutList">
											</ul>
										</div>
									</div>
								</div>
							</form>

						</div>

					</div>
				</div>



			</div>
		</div>
		<?php include("footer.php"); ?>
	</div>

</div>

<script>
	var resizefunc = [];

</script>
<?php include("shareJs.php"); ?>

</html>

<script>
	var divId = 'fundOutListDiv';
	var tableId = 'fundOutListTable';
	var pagerId = 'pagerFundOutList';
	var btnArray = Array('viewHide');
	var thArray = Array('Date',
		'Business ID',
		'Business Name',
		'Currency',
		'Fund Out Amount',
		'Processing Fee',
		'Miner Fee',
		'Sender Address',
		'Recipient Address',
		'Tx Hash',
		'Status',
		'Remark',
		// 'Site',
		// 'Distributor',
	);
	var searchId = 'searchForm';

	// Initialize the arguments for ajaxSend function
	var url = 'scripts/reqBusinesses.php';
	var method = 'POST';
	var debug = 0;
	var bypassBlocking = 0;
	var bypassLoading = 0;
	var pageNumber = 1;
	var formData = "";
	var fCallback = "";
	var businessID, businessName, hashCode, recipientAddress, distributor, reseller, currency, site, email, mobileNo, country;
	var tableNo;

	$(document).ready(function() {

		$('#fromDate').daterangepicker({
			autoApply: true,
			autoUpdateInput: false,
			locale: {
				format: 'DD/MM/YYYY'
			}
		}, function(start, end, label) {
			$("#fromDate").val(start.format('DD/MM/YYYY'));
			$("#toDate").val(end.format('DD/MM/YYYY'));
		});
		$('#toDate').click(function() {
			$('#fromDate').trigger('click');
		});
		$('input[name="start"]').on('apply.daterangepicker', function(ev, picker) {
			$('#fromDate').val(picker.startDate.format('DD/MM/YYYY'));
			$('#toDate').val(picker.endDate.format('DD/MM/YYYY'));
		});

		//        var formData  = {
		//            command: 'adminNuxpayTransactionHistoryList'
		//        };
		//        fCallback = loadDefaultListing;
		//        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		//		newList = "";
		//		message = "Please enter your search criteria.";
		//		buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);

		$('#resetBtn').click(function() {
			$('#alertMsg').removeClass('alert-success').html('').hide();
			$('#searchForm').find('input').each(function() {
				$(this).val('');
			});
			$('#searchForm').find('select').each(function() {
				$(this).val('');
				$("#searchForm")[0].reset();
			});

		});
		var formData = {
			command: "resellerGetFundOutListing",
			page: pageNumber,
		};


		if (!fCallback)
			fCallback = loadDefaultListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		$('#searchBtn').click(function() {
			pagingCallBack(pageNumber, loadSearch);
		});
	});

	function pagingCallBack(pageNumber, fCallback) {

		if ($("#fromDate").val()) {
            fromDateTime = $("#fromDate").val() + " 00:00:00";
            fromDateTime = fromDateTime.replaceAll('/', '-');
		} else {
			fromDateTime = "";
		}
		if ($("#toDate").val()) {
			toDateTime = $("#toDate").val() + " 23:59:59";
            toDateTime = toDateTime.replaceAll('/', '-');
		} else {
			toDateTime = "";
		}

		businessID = $('#businessID').val();
		businessName = $('#businessName').val();
		hashCode = $('#hashCode').val();
		status = $('#status').val();
		recipientAddress = $('#recipientAddress').val();
		site = $('#site').val();
		distributor = $('#distributor').val();
		reseller = $('#reseller').val();
		currency = $('#currency').val();



		if (pageNumber > 1) bypassLoading = 1;

		var formData = {
			command: "resellerGetFundOutListing",
			page: pageNumber,
            datetime_from: fromDateTime,
            datetime_to: toDateTime,
			business_id: businessID,
			business_name: businessName,
			tx_hash: hashCode,
			status: status,
			recipient_address: recipientAddress,
			site: site,
			distributor: distributor,
			reseller: reseller,
			currency: currency,
		};


		if (!fCallback)
			fCallback = loadDefaultListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

	function loadDefaultListing(data, message) {
		
		var tableNo;
        var txSummaryList = [];
        var txStatusList = [];


		if (data) {
			var fundOutListing = data.fund_out_listing;
			if (fundOutListing) {
				var newList = [];
				$.each(fundOutListing, function(k, v) {

					if (v['tx_hash'] == "" || v['tx_hash'] == null) {
						var tx_hash = "-";
					} else {
						var tx_hash = v['tx_hash'];

					}
					var rebuildData = {
						date: v['created_at'],
						business_id: v['business_id'],
						business_name: v['business_name'],
						wallet_type: v['wallet_type'],
						amount: v['amount'],
						service_charge_amount: v['service_charge_amount'],
						pool_amount: v['pool_amount'],
						sender_address: v['sender_address'],
						recipient_address: v['recipient_address'],
						tx_hash: v['tx_hash'],
						status: v['status'],
						remark: v['remark'],
						// site: v['site'],
						// currency: v['wallet_type']
						// reseller: v['reseller_name']
						// distributor: v['distributor_name'],
					};
					newList.push(rebuildData);
				});


			}

			$.each(data.summary_listing, function(k, v) {
				var rebuildData = {
					coin_name: v['coin_name'],
					total_service_fee: formatNumber(v['total_service_fee'], 8, 1) + ' ' + v['tx_fee_symbol'],
					total_amount: formatNumber(v['total_amount'], 8, 1),
					total_transaction: v['total_transaction'],
					total_miner_fee: v['total_miner_fee'],

				};
				txSummaryList.push(rebuildData);
			});
			var rebuildData = [];
			var thArray2 = ["Total Transaction"];
			var txStatusList = {}
			txStatusList.total_transaction = data.overall_total_transaction
			$.each(data.total_transaction_by_status, function(k, v) {
				thArray2.push(k);

				if (k == 'Confirmed') {
					txStatusList.Confirmed = v
				} else if (k == 'Failed') {
					txStatusList.Pending = v
				} else if (k == 'Pending') {
					txStatusList.Failed = v
				}

			});
			var txStatusArr = [txStatusList]

			var divId1 = 'transactionSummaryDiv';
			var tableId1 = 'transactionSummaryTable';
			var pagerId1 = '';
			var btnArray1 = {};
			var thArray1 = Array('Currency',
				'Total Processing Fee',
				'Total Amount',
				'Number Of Transaction',
				'Total Miner Fee'
			);


			buildTable(txSummaryList, tableId1, divId1, thArray1, btnArray1, message, tableNo);

			var divId2 = 'transactionStatusDiv';
			var tableId2 = 'transactionStatusTable';
			var pagerId2 = '';
			var btnArray2 = {};


			buildTable(txStatusArr, tableId2, divId2, thArray2, btnArray2, message, tableNo);

		} else {
			newList = "";
			message = "No result.";
			$('#transactionSummaryTable').empty();
			$("#transactionStatusTable").empty();

		}

		buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
		pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

		if(fundOutListing){
			$.each(fundOutListing, function(k, v) {
				$('#'+tableId).find('tr#'+k).attr('data-th', v['tx_hash']);
			});
		}
	

	}

	function tableBtnClick(btnId) {
        var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#' + btnId).parent('td').parent('tr');
        var tableId = $('#' + btnId).closest('table');

        if (btnName == 'viewHide') {
            var tx_hash = tableRow.attr('data-th');
            $.redirect("fundOutDetails.php", {
                tx_hash: tx_hash
            });
        }
    }

	function loadSearch(data, message) {
		loadDefaultListing(data, message);
		$('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
		setTimeout(function() {
			$('#searchMsg').removeClass('alert-success').html('').hide();
		}, 3000);
	}

</script>
