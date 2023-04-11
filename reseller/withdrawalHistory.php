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
						Withdrawal History
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
                                                <input id="merchantID" type="text" class="form-control" dataName="name" dataType="text">
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <label class="control-label">
													Business Name
                                                </label>
                                                <input id="merchantName" type="text" class="form-control" dataName="name" dataType="text">
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <label class="control-label" data-th="tx_hash">
                                                    Transaction Hash
                                                </label>
                                                <input id="txHash" type="text" class="form-control" dataName="name" dataType="text">
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <label class="control-label">
                                                    Withdrawal Address
                                                </label>
                                                <input id="withdrawalAdd" type="text" class="form-control" dataName="name" dataType="text">
                                            </div>


                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    Status
                                                </label>
                                                <select id="status" class="form-control" dataName="disabled" dataType="select">
                                                    <option value="">All</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="failed">Failed</option>
                                                    <option value="success">Success</option>
                                                </select>
											</div>
                                                <!-- <div class="col-md-4 form-group">
                                                    <label class="control-label" for="">
                                                        Site
                                                    </label>
                                                    <input id="site" type="text" class="form-control" dataType="text">
                                                </div> -->
                                            <div class="col-md-4 form-group">
                                                <label class="control-label" for="" >
                                                    Agent
                                                </label>
                                                <input id="distributor" type="text" class="form-control" dataType="text">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label class="control-label" for="" >
                                                    Reseller
                                                </label>
                                                <input id="reseller" type="text" class="form-control" dataType="text">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label class="control-label" for="">
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
								<h4 class="dashboardTitle">Summary</h4>
							</div>
							<div class="col-md-12 dashboardBox" id="currSummary" style="margin-top:10px">
								<div class="p-b-0">
									<form>
										<div id="basicwizard" class="pull-in">
											<div class="tab-content b-0 m-b-0 p-t-0">
												<div id="alertMsg" class="alert" style="display: none;"></div>
												<div id="currencySummaryDiv" class="table-responsive"></div>

											</div>
										</div>
									</form>

								</div>

							</div>
							<div class="col-md-12 dashboardBox" id="currSummaryEmpty" style = "margin-top:10px">
                                <div class="p-b-0">
                                    <form>
                                        <div id="basicwizard" class="pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                <div id="alertMsg" class="alert" style="display: none;"></div>
                                                <div id="currencySummaryEmpty" class="table-responsive">
                                                    <table class="table table-striped table-bordered no-footer m-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Currency</th>
                                                                <th>Total Amount</th>
                                                                <th>Total Processing Fee</th>
																<th>Total Miner Fee</th>
																<th>Total Nett Amount</th>
                                                                <tbody>
                                                                    <tr >
                                                                        <td style="text-align: left" colspan= "5">No Result</td>
                                                                    </tr>
                                                                </tbody>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
							<div class="col-md-12 dashboardBox" id="transSummaryEmpty" style = "margin-top:10px">
                                <div class="p-b-0">
                                    <form>
                                        <div id="basicwizard" class="pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                <div id="alertMsg" class="alert" style="display: none;"></div>
                                                <div id="transactionSummaryEmpty" class="table-responsive">
                                                    <table class="table table-striped table-bordered no-footer m-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Total Transaction</th>
                                                                <th>Success</th>
                                                                <th>Failed</th>
																<th>Pending</th>
                                                                <tbody>
                                                                    <tr >
                                                                        <td style="text-align: left" colspan= "4">No Result</td>
                                                                    </tr>
                                                                </tbody>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
							<div class="col-md-12 dashboardBox" id="transSummary">
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
										<div id="withdrawalHistoryDiv" class="table-responsive"></div>
										<span id="paginateText"></span>
										<div class="text-center" style="">
											<ul class="pagination pagination-md" id="pagerWithdrawalHistory">
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
	var divId = 'withdrawalHistoryDiv';
	var tableId = 'withdrawalHistoryTable';
	var pagerId = 'pagerWithdrawalHistory';
	var btnArray = Array('viewHidden');
	var thArray = Array(
		'Date',
		'Agent',
		'Reseller',
		'Business ID',
		'Business Name',
		'Currency',
		'Actual Amount',
		'Processing Fee',
		'Miner Fee',
		'Withdraw To',
		'Tx Hash',
		'Status',
	);
	var searchId = 'searchForm';

	// Initialize the arguments for ajaxSend function
	var url = 'scripts/reqAdmin.php';
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
		$('#transSummary').hide();
		$('#currSummary').hide();
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
			command: "resellerGetWithdrawalHistory",
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

		merchantID = $('#merchantID').val();
		merchantName = $('#merchantName').val();
		txHash = $('#txHash').val();
		withdrawalAdd = $('#withdrawalAdd').val();
		status = $('#status').val();
		site = $('#site').val();
		distributor = $('#distributor').val();
		reseller = $('#reseller').val();
		currency = $('#currency').val();

		if (pageNumber > 1) bypassLoading = 1;

		var formData = {
			command: "resellerGetWithdrawalHistory",
			page: pageNumber,
            datetime_from: fromDateTime,
            datetime_to: toDateTime,
			business_id: merchantID,
			business_name: merchantName,
			tx_hash: txHash,
			recipient_address: withdrawalAdd,
			status: status,
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
        var currSummaryList = [];
        var transSummaryList = [];


		if (data) {
			$('#currSummaryEmpty').hide();
			$('#transSummaryEmpty').hide();
			$('#transSummary').show();
			$('#currSummary').show();
			var withdrawalHistory = data.arr_transaction;
			if (withdrawalHistory) {
				var newList = [];
				$.each(withdrawalHistory, function(k, v) {

					// if (v['transaction_hash'] == "" || v['transaction_hash'] == null) {
					// 	var transactionHash = "-";
					// } else {
					// 	var transactionHash = v['transaction_hash'];

					// }
					var rebuildData = {
						date: v['date'],
						distributor: v['distributor'],
						reseller: v['reseller'],
						business_id: v['merchant_id'],
						business_name: v['merchant_name'],
						currency: v['currency'],
						actual_amount: v['actual_amount'],
						processing_fee: v['processing_fee'],
						miner_fee: v['miner_fee'],
						recipient_address: v['recipient_address'],
						tx_hash: v['tx_hash'],
						status: v['status']
					
					};
					newList.push(rebuildData);
				});


			}
			if(withdrawalHistory){

					$.each(data.currency_summary, function(k, v) {
					var rebuildData = {
						currency: v['currency'],
						// total_service_fee: formatNumber(v['total_service_fee'], 8, 1) + ' ' + v['tx_fee_symbol'],
						total_amount: formatNumber(v['total_amount'], 8, 1),
						total_processing_fee: v['total_processing_fee'],
						total_miner_fee: v['total_miner_fee'],
						total_net_amount: v['total_net_amount'],

					};
					currSummaryList.push(rebuildData);
				});
			}
			
			if(withdrawalHistory){
				var rebuildData = {
					total_transaction: data.transaction_summary['total_transaction'],
					success: data.transaction_summary['success'],
					failed: data.transaction_summary['failed'],
					pending: data.transaction_summary['pending'],

				};
				transSummaryList.push(rebuildData);
				
			}

			// });
			// var txStatusArr = [txStatusList]

			var divId1 = 'currencySummaryDiv';
			var tableId1 = 'currencySummaryTable';
			var pagerId1 = '';
			var btnArray1 = {};
			var thArray1 = Array(
				'Currency',
				'Total Amount',
				'Total Processing Fee',
				'Total Miner Fee',
				'Total Nett Amount',
			);


			buildTable(currSummaryList, tableId1, divId1, thArray1, btnArray1, message, tableNo);

			var divId2 = 'transactionSummaryDiv';
			var tableId2 = 'transactionSummaryTable';
			var pagerId2 = '';
			var btnArray2 = {};
			var thArray2 = Array(
				'Total Transaction',
				'Success',
				'Failed',
				'Pending',
			);


			buildTable(transSummaryList, tableId2, divId2, thArray2, btnArray2, message, tableNo);

		} else {
			newList = "";
			message = "No result.";
			$('#transSummary').hide();
			$('#currSummary').hide();
			$('#currSummaryEmpty').show();
			$('#transSummaryEmpty').show();
		}

		buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
		pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

		if(withdrawalHistory){
			$.each(withdrawalHistory, function(k, v) {
            	$('#'+tableId).find('tr#'+k).attr('data-th', v['tx_hash']);
        	});
		}
	
	}

	function tableBtnClick(btnId) {
        var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#' + btnId).parent('td').parent('tr');
        var tableId = $('#' + btnId).closest('table');

        if (btnName == 'viewHidden') {
            var tx_hash = tableRow.attr('data-th');
            $.redirect("withdrawalHistoryDetails.php", {
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