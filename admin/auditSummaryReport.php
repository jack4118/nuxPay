<?php
session_start();

// Get current page name
$thisPage = basename($_SERVER["PHP_SELF"]);

// Check the session for this page
// if(!isset ($_SESSION['access'][$thisPage]))
//     echo '<script>window.location.href="accessDenied.php";</script>';
// $_SESSION['lastVisited'] = $thisPage;
?>
<!DOCTYPE html>
<html>
<?php include "head.php"; ?>
<!-- Begin page -->
<div id="wrapper">
	<!-- Top Bar Start -->
	<?php include "topbar.php"; ?>
	<!-- Top Bar End -->

	<!-- ========== Left Sidebar Start ========== -->
	<?php include "sidebar.php"; ?>
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
						Transaction History
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
													<input id="fromDate" type="text" class="form-control input-daterange-from" placeholder="From" dataName="transationDate" dataType="dateRange" autocomplete="off" name="start" value="<?php echo date("d/m/Y"); ?>" />
													<span class="input-group-addon">
														To
													</span>
													<input id="toDate" type="text" class="form-control input-daterange-to" placeholder="To" dataName="transactionDate" dataType="dateRange" autocomplete="off" name="end" value="<?php echo date("d/m/Y"); ?>" />
												</div>
											</div>
											<div class="col-md-4 form-group">
												<label class="control-label">
													Business ID
												</label>
												<input id="businessID" type="text" class="form-control" dataName="name" dataType="text">
											</div>
											<div class="col-sm-4 form-group">
												<label class="control-label" data-th="disabled">
													Type
												</label>
												<select id="type" class="form-control" dataName="disabled" dataType="select">
                                                <!--<option value="">Please Select</option>-->
													<option value="pg_fundout">Payment Gateway Fund Out</option>
													<option value="marketer_fundout">Marketer Fund Out</option>
													<option value="blockchain_fundout">Blockchain Fund Out</option>
												</select>
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
                <!-- fund in -->
                <div class="row">
                    <div class="col-lg-12">
                            <div class="col-md-12">
                                <h4 class="dashboardTitle">Fund In Transaction Summary</h4>
                            </div>
                            <div class="col-md-12 dashboardBox" style = "margin-top:10px">
                                <div class="p-b-0">
                                    <form>
                                        <div id="basicwizard" class="pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                <div id="alertMsg" class="alert" style="display: none;"></div>
                                                <div id="fundInTransactionSummaryDiv" class="table-responsive"></div>
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
                                                <div id="fundInTransactionStatusDiv" class="table-responsive"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>

                <!-- fund out -->
				<div class="row">
					<div class="col-lg-12">
							<div class="col-md-12">
								<br>
								<h4 class="dashboardTitle">Fund Out/Batch Transfer Transaction Summary</h4>
							</div>
							<div class="col-md-12 dashboardBox" style="margin-top:10px">
								<div class="p-b-0">
									<form>
										<div id="basicwizard" class="pull-in">
											<div class="tab-content b-0 m-b-0 p-t-0">
												<div id="alertMsg" class="alert" style="display: none;"></div>
												<div id="fundOutTransactionSummaryDiv" class="table-responsive"></div>
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
												<div id="fundOutTransactionStatusDiv" class="table-responsive"></div>
											</div>
										</div>
									</form>
								</div>
							</div>
					</div>
				</div>
                <!-- withdrawal history2 -->
                <div class="row">
					<div class="col-lg-12">
                        <div class="col-md-12">
								<br>
								<h4 class="dashboardTitle">Withdrawal History Summary</h4>
							</div>
							<div class="col-md-12 dashboardBox" style="margin-top:10px">
								<div class="p-b-0">
									<form>
										<div id="basicwizard" class="pull-in">
											<div class="tab-content b-0 m-b-0 p-t-0">
												<div id="alertMsg" class="alert" style="display: none;"></div>
												<div id="withdrawalHistoryCurrencySummaryDiv" class="table-responsive"></div>
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
												<div id="withdrawalHistoryTransactionSummaryDiv" class="table-responsive"></div>

											</div>
										</div>
									</form>
								</div>
							</div>
					</div>
				</div>

                <!-- End Search for Miner Fee Report-->

				<div class="row" style="padding:10px">
                    <div class="col-md-12">
						<br>
                        <h4 class="dashboardTitle">Miner Fee Report</h4>
						<br>
                    </div>
					<div class="col-md-12 dashboardBox">
						<div class="p-b-0">
							<form>
								<div id="basicwizard" class="pull-in">
									<div class="tab-content b-0 m-b-0 p-t-0">
										<div id="alertMsg" class="alert" style="display: none;"></div>
										<div id="minerFeeReportSummaryDiv" class="table-responsive"></div>
									</div>
								</div>
							</form>
						</div>
					</div>
                </div>
			</div>
		</div>
		<?php include "footer.php"; ?>
	</div>

</div>

<script>
	var resizefunc = [];

</script>
<?php include "shareJs.php"; ?>

</html>

<script>
	var divId = 'fundOutListDiv';
	var tableId = 'fundOutListTable';
	var pagerId = 'pagerFundOutList';
	var btnArray = Array('viewHide');
	var thArray = Array('Date',
		'Currency',
		'Fund Out Amount',
		'Processing Fee',
		'Miner Fee',
		'Status',
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
    var report_type = "<?php echo $_GET["report_type"]; ?>";
	if (report_type) {
		var businessID = "<?php echo $_GET["business_id"]; ?>";
		var fromDateTime = "<?php echo $_GET["from_datetime"]; ?>";
		var toDateTime = "<?php echo $_GET["to_datetime"]; ?>";

		$("#type").val(report_type);

		if (fromDateTime && toDateTime) {
			var from_datetime = timestampToDate(fromDateTime, 0, 0);
			var to_datetime = timestampToDate(toDateTime, 0, 0);

			$('#fromDate').val(from_datetime);
			$('#toDate').val(to_datetime);
		}
		$("#business_id").val(businessID);
	}

	$(document).ready(function() {
        if (report_type) {
			pagingCallBack(pageNumber, loadSearch);
		}
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
		$('input[name="start"]').on('apply.daterangepicker', function(ev, picker) {
			$('#fromDate').val(picker.startDate.format('DD/MM/YYYY'));
			$('#toDate').val(picker.endDate.format('DD/MM/YYYY'));
		});
		
		$('#fromDate').daterangepicker({
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });

		$('#toDate').click(function() {
            $('#fromDate').trigger('click');
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
		report_type = $('#type').val();

		var formData = {
			command: "adminNuxpayAuditSummaryReport",
			datetime_from: fromDateTime,
            datetime_to: toDateTime,
			page: pageNumber,
			report_type: report_type,
		};

		if (!fCallback)
			fCallback = loadDefaultListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		$('#searchBtn').click(function() {
			pagingCallBack(pageNumber, loadSearch);
		});

        $('#viewBtn').click(function() {
            $.redirect("minerFeeDetails.php", {
                from_datetime: fromDateTime,
                to_datetime: toDateTime,
                business_id: businessID,
                report_type: report_type,
            });
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
		status = $('#status').val();
		currency = $('#currency').val();
		report_type = $('#type').val();

		if (pageNumber > 1) bypassLoading = 1;

		var formData = {
			command: "adminNuxpayAuditSummaryReport",
			page: pageNumber,
            datetime_from: fromDateTime,
            datetime_to: toDateTime,
			business_id: businessID,
			report_type: report_type,
		};

		if (!fCallback)
			fCallback = loadDefaultListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

	function loadDefaultListing(data, message) {
		var tableNo;
        var freezeList = data.transaction_history_list;
		if (data) 
		{
            // Reset table
            if(data.overall_total_transaction_fund_out == null)
            {
                txStatusList = "";
                message = "<span>No result.</span>";
                $('#fundOutTransactionSummaryDiv').empty().append(message);
                $("#fundOutTransactionSummaryTable").empty();
            }
            else
            {
                message = "";
                $('#fundOutTransactionSummaryDiv').empty().append(message);
            }

            if(data.summary_listing_fund_out == null)
            {
                newList = "";
                thArray2 = "";
                message = "<span>No result.</span>";
                $('#fundOutTransactionSummaryDiv').empty().append(message);
                $("#fundOutTransactionSummaryTable").empty();
            }
            else
            {
                message = "";
                $('#fundOutTransactionSummaryDiv').empty().append(message);
            }

            if(data.total_transaction_by_status_fund_out == null)
            {
                thArray2 = "";
                newList = "";
                message = "<span>No result.</span>";
                $("#fundOutTransactionStatusTable").empty();
            }
            else{
                message = "";
                $('#fundOutTransactionStatusDiv').empty().append(message);
            }

            if(data.transaction_summary_fund_in == null)
            {
                txStatusList = "";
                message = "<span>No result.</span>";
                $('#fundInTransactionSummaryDiv').empty().append(message);
                $("#fundInTransactionSummaryTable").empty();
                $("#fundInTransactionStatusTable").empty();
            }
            else{
                message = "";
                $('#fundInTransactionSummaryDiv').empty().append(message);
            }
			
			if(data.total_miner_fee_value != null)
            {
                var txSummaryList = [];
                var txStatusList = [];
                var buildSummary = "";
                $.each(data.total_miner_fee_fund_out, function(k, v) {
                
                    var rebuildData = {
                        coin_name: v['coin_name'] + '(' + v.unit.toUpperCase()  + ')',
                        total_amount:formatNumber(v['amount'], 8, 1),
                    };
                    
                    txSummaryList.push(rebuildData);
                });
                if(txSummaryList.length == 0 || txSummaryList == null || txSummaryList === ''){
                    // console.log("total_transaction is equal to 0, null, or empty");
                    txSummaryList = "";
                    data.total_miner_fee_value = null;
                    message = "<br><span>No result.</span>";
                    $('#minerFeeReportSummaryDiv').empty().append(message);
                    $('#minerFeeReportSummaryTable').empty();
                    $('#viewBtn').hide();
                } else {
                    // console.log("total_transaction has a value");
                    message = " ";
                    $('#minerFeeReportSummaryDiv').empty().append(message);
                }
            }

            if((data.currency_summary_withdrawal_history == null)) 
            {
                currSummaryList = "";
                message = "<br><span>No result.</span>";
                $('#withdrawalHistoryCurrencySummaryDiv').empty().append(message);
                $("#withdrawalHistoryCurrencySummaryTable").empty();
                $("#withdrawalHistoryTransactionSummaryTable").empty();
            }
            else
            {
                message = "";
                $('#withdrawalHistoryCurrencySummaryDiv').empty().append(message);
            }

            if(data.transaction_summary_withdrawal_history != null)
            {
                var transSummaryList = [];
				var rebuildData = {
					total_transaction: data.transaction_summary_withdrawal_history['total_transaction'],
					success: data.transaction_summary_withdrawal_history['success'],
					failed: data.transaction_summary_withdrawal_history['failed'],
					pending: data.transaction_summary_withdrawal_history['pending'],
				};

				if(rebuildData.total_transaction == 0 || rebuildData.total_transaction == null || rebuildData.total_transaction === ''){
				    // console.log("total_transaction is equal to 0, null, or empty");
                    transSummaryList = "";
                    data.transaction_summary_withdrawal_history = null;
                    message = "<span>No result.</span>";
                    $('#withdrawalHistoryCurrencySummaryDiv').empty().append(message);
                    $("#withdrawalHistoryTransactionSummaryTable").empty();
				} else {
				    transSummaryList.push(rebuildData);
				    // console.log("total_transaction has a value");
				}
            }

			var fundOutListing = data.summary_listing_fund_out;
            var fundInListing = data.transaction_summary_fund_in;
			var withdrawalHistory = data.transaction_summary_withdrawal_history;
    		var minerFeeReport = data.total_miner_fee_value;
			
			if (fundOutListing) {
                var txSummaryList = [];
                var txStatusList = [];
				var newList = [];
				$.each(fundOutListing, function(k, v) {
					var rebuildData = {
						date: v['created_at'],
						wallet_type: v['wallet_type'],
						amount: v['amount'],
						service_charge_amount: v['service_charge_amount'],
						pool_amount: v['pool_amount'],
						recipient_address: v['recipient_address'],
						tx_hash: v['tx_hash'],
						status: v['status'],
					};
					if (v['tx_hash'] == "" || v['tx_hash'] == null) {
						var tx_hash = "-";
					} else {
						var tx_hash = v['tx_hash'];
					}
					newList.push(rebuildData);
				});
				$.each(data.summary_listing_fund_out, function(k, v) {
				var rebuildData = {
					coin_name: v['coin_name'],
					total_amount: formatNumber(v['total_amount'], 8, 1) + " " + v['coin_name'],
					total_service_fee: formatNumber(v['total_service_fee'], 8, 1) + ' ' + v['coin_name'],
					total_miner_fee: v['total_miner_fee'] + " " + v['coin_name'],
					total_net_amount: formatNumber(v['total_nett_amount'], 8, 1) + " " + v['coin_name'],
				};
				txSummaryList.push(rebuildData);
				});
				var rebuildData = [];
				var thArray2 = ["Total Transaction"];
				var txStatusList = {};
				var txStatusArr = [];

				var divId1 = 'fundOutTransactionSummaryDiv';
				var tableId1 = 'fundOutTransactionSummaryTable';
				var pagerId1 = '';
				var btnArray1 = {};
				var thArray1 = Array('Currency',
					'Total Amount',
					'Total Processing Fee',
					'Total Miner Fee',
					'Total Net Amount',
				);

				var rebuildData = {
					total_transaction: data.total_transaction_by_status_fund_out['total_transaction'],
					success: data.total_transaction_by_status_fund_out['success'],
					failed: data.total_transaction_by_status_fund_out['failed'],
					pending: data.total_transaction_by_status_fund_out['pending'],

				};
				txStatusArr.push(rebuildData);

				buildTable(txSummaryList, tableId1, divId1, thArray1, btnArray1, message, tableNo);

				var divId2 = 'fundOutTransactionStatusDiv';
				var tableId2 = 'fundOutTransactionStatusTable';
				var pagerId2 = '';
				var btnArray2 = {};
				var thArray2 = Array(
                    'Total Transaction',
                    'Success',
                    'Failed',
                    'Pending',
                );

				buildTable(txStatusArr, tableId2, divId2, thArray2, btnArray2, message, tableNo);
			}

            if(fundInListing)
            {
                var txSummaryList = [];
                var txStatusList = [];
                var buildSummary = "";
                $.each(data.transaction_summary_fund_in, function(k, v) {
                    var rebuildData = {
                        coin_name: v['coin_name'],
                        total_amount:formatNumber(v['total_amount'], 8, 1) + " " + v['coin_name'],
						total_transaction: v['total_transaction'],
                    };
                    txSummaryList.push(rebuildData);
                });

                var rebuildData = [];
                txStatusList.total_transaction = data.overall_total_transaction_fund_out

                var txStatusArr = [txStatusList]
                var divId3 = 'fundInTransactionSummaryDiv';
                var tableId3 = 'fundInTransactionSummaryTable';
                var pagerId3 = '';
                var btnArray3 = {};
                var thArray3 = Array('Currency',
                    'Total Amount / Total Received',
					'Total Transaction',
                );
                
                buildTable(txSummaryList, tableId3, divId3, thArray3, btnArray3, message, tableNo);

				// fund in status table
				var transSummaryList = [];
				var rebuildData = {
					total_transaction: data.transaction_status_fund_in['total_transaction'],
					success: data.transaction_status_fund_in['success'],
					failed: data.transaction_status_fund_in['failed'],
					pending: data.transaction_status_fund_in['pending'],

				};
				transSummaryList.push(rebuildData);
				
                var divId8 = 'fundInTransactionStatusDiv';
                var tableId8 = 'fundInTransactionStatusTable';
                var pagerId8 = '';
                var btnArray8 = {};
                var thArray8 = Array(
                    'Total Transaction',
                    'Success',
                    'Failed',
                    'Pending',
                );
                
                buildTable(transSummaryList, tableId8, divId8, thArray8, btnArray8, message, tableNo);
            }

            if(withdrawalHistory){
                var currSummaryList = [];
                $.each(data.currency_summary_withdrawal_history, function(k, v) {
                var rebuildData = {
                    currency: v['coin_name'],
                    total_amount: formatNumber(v['total_amount_receive'], 8, 1) + ' ' + v['coin_name'],
                    total_processing_fee: v['total_processing_fee'] + ' ' + v['coin_name'],
                    total_miner_fee: v['total_miner_fee'] + ' ' + v['coin_name'],
                    total_net_amount: v['total_net_amount'] + ' ' + v['coin_name'],

                };
                currSummaryList.push(rebuildData);
                });

                var divId4 = 'withdrawalHistoryCurrencySummaryDiv';
                var tableId4 = 'withdrawalHistoryCurrencySummaryTable';
                var pagerId4 = '';
                var btnArray4 = {};
                var thArray4 = Array(
                    'Currency',
                    'Total Amount',
                    'Total Processing Fee',
                    'Total Miner Fee',
                    'Total Net Amount',
                );
                buildTable(currSummaryList, tableId4, divId4, thArray4, btnArray4, message, tableNo);
            }

            if(withdrawalHistory){
                var transSummaryList = [];
				var rebuildData = {
					total_transaction: data.transaction_summary_withdrawal_history['total_transaction'],
					success: data.transaction_summary_withdrawal_history['success'],
					failed: data.transaction_summary_withdrawal_history['failed'],
					pending: data.transaction_summary_withdrawal_history['pending'],

				};
				transSummaryList.push(rebuildData);
				
                var divId5 = 'withdrawalHistoryTransactionSummaryDiv';
                var tableId5 = 'withdrawalHistoryTransactionSummaryTable';
                var pagerId5 = '';
                var btnArray5 = {};
                var thArray5 = Array(
                    'Total Transaction',
                    'Success',
                    'Failed',
                    'Pending',
                );

                buildTable(transSummaryList, tableId5, divId5, thArray5, btnArray5, message, tableNo);
			}

            // miner fee report
            var minerFee = "";
			var currencyIndex
            if(minerFeeReport) {
                var txSummaryList = [];
				var thArray6 = Array('Currency', 'Total Miner Fee Value (USD)', 'Total Miner Fee Spent (Tron)', 'Total Miner Fee Collected');

				$.each(data.total_miner_fee_value, function(k, v) {
					var rebuildData = {
						coin_name: v['coin_name'],
						total_amount: formatNumber(v['amount'], 8, 1),
						total_miner_fee_spent: '',
						total_miner_fee_collected: '',
					};
					txSummaryList.push(rebuildData);
				});

				$.each(data.total_miner_fee_fund_out, function(k, v) {
					var currencyIndex = txSummaryList.findIndex(x => x.coin_name === v['coin_name']);
					if (currencyIndex >= 0) {
						txSummaryList[currencyIndex].total_miner_fee_spent = formatNumber(v['amount'], 8, 1);
					} else {
						var rebuildData = {
							coin_name: v['coin_name'],
							total_amount: '',
							total_miner_fee_spent: formatNumber(v['amount'], 8, 1),
							total_miner_fee_collected: '',
						};
						txSummaryList.push(rebuildData);
					}
				});

				$.each(data.total_miner_fee_collected, function(k, v) {
					var currencyIndex = txSummaryList.findIndex(x => x.coin_name === v['coin_name']);
					if (currencyIndex >= 0) {
						txSummaryList[currencyIndex].total_miner_fee_collected = formatNumber(v['amount'], 8, 1);
					} else {
						var rebuildData = {
							coin_name: v['coin_name'],
							total_amount: '',
							total_miner_fee_spent: '',
							total_miner_fee_collected: formatNumber(v['amount'], 8, 1),
						};
						txSummaryList.push(rebuildData);
					}
				});

				var divId6 = 'minerFeeReportSummaryDiv';
				var tableId6 = 'minerFeeReportSummaryTable';
				var pagerId6 = '';
				var btnArray6 = {};
				var buildSummary = "";
				buildTable(txSummaryList, tableId6, divId6, thArray6, btnArray6, buildSummary, 1);

				// console.log(txSummaryList);
                $('#viewBtn').show();
            }

            } else {
                newList = "";
                message = "No result.";
                txSummaryList = "";
                txStatusList = "";
                $("#fundOutTransactionSummaryTable").empty();
                $("#fundOutTransactionStatusTable").empty();
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
