<?php
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    if(!isset ($_SESSION['access'][$thisPage]))
        echo '<script>window.location.href="pageLogin.php";</script>';
    $_SESSION['lastVisited'] = $thisPage;
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
				<!-- top merchant service fee, top ten transaction list, total coin transaction list, top ten merchant list -->
				<!--
                <div class="row" style="margin-top: 30px;">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="dashboardTitle">Coin Transaction</h4>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px;">
                                <div class="dashboardBox">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <select id="coinTransactionDate" class="form-control" dataName="domainName" dataType="text">
                                                        <option value="today">Today</option>
                                                        <option value="yesterday">Yesterday</option>
                                                        <option value="dateRange">Date Range</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="dateRangeDisplay1" class="col-xs-12" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-9 form-group">
                                                    <div class="input-group input-daterange" id="m_datepicker_5">
                                                        <input id="fromDate" type="text" class="form-control input-daterange-from" placeholder="From" dataName="transationDate" dataType="dateRange" autocomplete="off" name="start" />
                                                        <span class="input-group-addon">
                                                            To
                                                        </span>
                                                        <input id="toDate" type="text" class="form-control input-daterange-to" placeholder="To" dataName="transactionDate" dataType="dateRange" autocomplete="off" name="end" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 text-right form-group" style="margin-top: 2px;">
                                                    <button onclick="loadCoinTransaction()" type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Search
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 10px;">
                                            <div id="coinTransaction" class="row"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 ipadMarginTop">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="dashboardTitle">Top 10 Transaction</h4>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px;">
                                <div class="dashboardBox">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <select id="topTenTransactionDate" class="form-control" dataType="text">
                                                        <option value="today">Today</option>
                                                        <option value="yesterday">Yesterday</option>
                                                        <option value="customeDate">Date Range</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="dateRangeDisplay2" class="col-xs-12" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-9 form-group">
                                                    <div class="input-group input-daterange">
                                                        <input id="fromDate2" type="text" class="form-control input-daterange-from" placeholder="From" dataName="transationDate" dataType="dateRange" autocomplete="off" name="start2" />
                                                        <span class="input-group-addon">
                                                            To
                                                        </span>
                                                        <input id="toDate2" type="text" class="form-control input-daterange-to" placeholder="To" dataName="transactionDate" dataType="dateRange" autocomplete="off" name="end2" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 text-right form-group" style="margin-top: 2px;">
                                                    <button onclick="loadTopTenTransaction()" type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Search
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12" style="margin-top: 10px;">
                                            <div id="topTenTransaction" class="row"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 30px;">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="dashboardTitle">Top 10 Merchant</h4>
                            </div>


                             <div class="col-xs-12">
                                    <div class="dropdown">
                                        <button class="btn detailBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Details</button>
                                        <div class="dropdown-menu merchantDetailBox" role="menu">
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-xs-12 merchantDetail">
                                                        0.00000 BTC
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <hr>
                                                    </div>
                                                    <div class="col-xs-12 merchantDetail">
                                                        0.00000 BTC
                                                    </div>
                                                    <div class="col-xs-12 last-hidden">
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                            <div><hr></div>
                                        </div>
                                    </div>
                                </div> 

                            <div class="col-md-12" style="margin-top: 10px;">
                                <div class="dashboardBox">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <select id="tenMerchantTransactionDate" class="form-control" dataName="domainName" dataType="text">
                                                        <option value="today">Today</option>
                                                        <option value="yesterday">Yesterday</option>
                                                        <option value="dateRange">Date Range</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="dateRangeDisplay3" class="col-xs-12" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-9 form-group">
                                                    <div class="input-group input-daterange" id="m_datepicker_5">
                                                        <input id="fromDate3" type="text" class="form-control input-daterange-from" placeholder="From" dataName="transationDate" dataType="dateRange" autocomplete="off" name="start3" />
                                                        <span class="input-group-addon">
                                                            To
                                                        </span>
                                                        <input id="toDate3" type="text" class="form-control input-daterange-to" placeholder="To" dataName="transactionDate" dataType="dateRange" autocomplete="off" name="end3" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 text-right form-group" style="margin-top: 2px;">
                                                    <button onclick="loadTenMerchantTransaction()" type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Search
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12" style="margin-top: 10px;">
                                            <form>
                                                <div id="basicwizard" class="pull-in">
                                                    <div class="tab-content b-0 m-b-0 p-t-0 p-b-0">
                                                        <div id="alertMsg" class="alert" style="display:none"></div>
                                                        <div id="businessesListDiv" class="table-responsive"></div>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ipadMarginTop">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="dashboardTitle">Top 10 Merchant Service Fee Contributed</h4>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px;">
                                <div class="dashboardBox">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <select id="tenMerchantServiceTransactionDate" class="form-control" dataName="domainName" dataType="text">
                                                        <option value="today">Today</option>
                                                        <option value="yesterday">Yesterday</option>
                                                        <option value="dateRange">Date Range</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="dateRangeDisplay4" class="col-xs-12" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-9 form-group">
                                                    <div class="input-group input-daterange" id="m_datepicker_5">
                                                        <input id="fromDate4" type="text" class="form-control input-daterange-from" placeholder="From" dataName="transationDate" dataType="dateRange" autocomplete="off" name="start4" />
                                                        <span class="input-group-addon">
                                                            To
                                                        </span>
                                                        <input id="toDate4" type="text" class="form-control input-daterange-to" placeholder="To" dataName="transactionDate" dataType="dateRange" autocomplete="off" name="end4" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 text-right form-group" style="margin-top: 2px;">
                                                    <button onclick="loadTenMerchantServiceTransaction()" type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Search
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12" style="margin-top: 10px;">
                                            <form>
                                                <div id="basicwizard" class="pull-in">
                                                    <div class="tab-content b-0 m-b-0 p-t-0 p-b-0">
                                                        <div id="alertMsg" class="alert" style="display:none"></div>
                                                        <div id="businessesListDiv2" class="table-responsive">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-xs-12">
                                            <button onclick="window.location='transactionHistory.php'" type="submit" class="btn btn-primary waves-effect waves-light" style="width: 100%;">
                                                See All
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
-->
				<div class='row'>
					<div class="col-xs-12" style="margin-right: 25px">
						<div class="row float-right">
							<button type="button" onclick="dateFilterButton(this)" id="1" class="btn btn-dashboard waves-effect waves-light dashboardBtn">Today</button>
							<button type="button" onclick="dateFilterButton(this)" id="2" class="btn btn-dashboard waves-effect waves-light">Yesterday</button>
							<button type="button" onclick="dateFilterButton(this)" id="3" class="btn btn-dashboard waves-effect waves-light">Last 7 Days</button>
							<button type="button" onclick="dateFilterButton(this)" id="4" class="btn btn-dashboard waves-effect waves-light">Last 30 Days</button>
							<button type="button" onclick="dateFilterButton(this)" id="5" class="btn btn-dashboard waves-effect waves-light dashboardBtn">All Time</button>

						</div>
					</div>
					<div class="col-xs-12 dashboardBox2" style="margin-top: 20px; ">
						<div class="row">

							<div class="col-xs-12">
								<div class="row">
									<div class="col-md-3 col-xs-12 totalProfitCoinList">
										<div class="row">
											<div class="col-xs-12">
												<div class="row">
													<div class="col-xs-12 dashboardMiniTitle">
														Total Profit
													</div>
													<div class="col-xs-12 dashboardMiniTotal">
														<span id="totalProfit"></span>
													</div>
												</div>
												<div class="col-xs-12 px-0">
													<hr class="dashboardHR">
												</div>

												<div class="row">
													<div class="col-xs-12" id="profitListing">


													</div>
												</div>
											</div>


										</div>
									</div>
									<div class="col-md-9 col-xs-12">
										<div class="row">
											<div class="col-md-12 amChartSize" id="chartdiv"></div>
										</div>
									</div>

								</div>
							</div>

						</div>
						<div class="col-xs-12 dashboardBox3">
							<div class="row" style="">
								<div class="col-md-6 piechartTitle piechartBox">
									Profit Contribution from Merchants
								</div>

								<div class="col-md-6 piechartTitle piechartBox greyBox">
									Total Fund In Transacted Amount
								</div>

							</div>




							<div class="row">
								<div class="col-md-6 piechartAmount" id="profitContribution">
								</div>
								<div class="col-md-6 piechartAmount greyBox" id="totalTransacted">
								</div>


							</div>
							<div class="row">
								<div class="col-md-6 piechartSize" id="piechart1">
								</div>
								<div class="col-md-6 piechartSize greyBox" id="piechart2">
								</div>



							</div>
						</div>

						<div class="col-xs-12 dashboardBox3">
							<div class="row">

								<div class="col-md-6 piechartTitle greyBox">
									Total Fund In Transaction
								</div>
								<div class="col-md-6 piechartTitle">
									Total Fund Out Transacted Amount
								</div>

							</div>
							<div class="row">
								<div class="col-md-6 piechartAmount greyBox" id="totalTransaction">
								</div>
								<div class="col-md-6 piechartAmount" id="totalFundOutTransacted">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 piechartSize greyBox" id="piechart3">
								</div>
								<div class="col-md-6 piechartSize" id="piechart4">
								</div>
							</div>
						</div>


						<div class="col-xs-12 dashboardBox3">
							<div class="row">

								<div class="col-md-6 piechartTitle">
									Total Fund Out Transaction
								</div>
								<!-- <div class="col-md-6 piechartTitle greyBox">
									Total Withdrawal Transacted Amount
								</div> -->
								<!-- <div class="col-md-6 greyBox" style="height:26px;">
									
								</div> -->
								<!-- <div class="col-md-6 piechartTitle greyBox" id="profitReseller">
									Profit Contribution from Reseller
								</div> -->

							</div>
							<div class="row">
								<div class="col-md-6 piechartAmount" id="totalFundOutTransaction">
								</div>
								<!-- <div class="col-md-6 piechartAmount greyBox" id="totalWithdrawalTransacted">
								</div> -->
								<!-- <div class="col-md-6 greyBox" style="height:25px;">
								</div> -->
								<!-- <div class="col-md-6 piechartAmount greyBox" id="totalContributionReseller">
								</div> -->
							</div>
							<div class="row">
								<div class="col-md-6 piechartSize" id="piechart5">
								</div>
								<!-- <div class="col-md-6 piechartSize greyBox" id="piechart8">
								</div> -->
								<!-- <div class="col-md-6 piechartSize greyBox">
								</div> -->
								<!-- <div class="col-md-6 piechartSize greyBox" id="piechart6">
								</div> -->
							</div>

							<!-- <div class="row">
								<div class="col-md-6 piechartTitle piechartBox " id="fundInReseller">
									Total Fund In Transacted Amount from Reseller
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 piechartAmount " id="totalFundIn">
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 piechartSize " id="piechart7">
								</div>
							</div> -->
						</div>

						<!-- withdrawal part -->

						<!-- <div class="col-xs-12 dashboardBox3">
							<div class="row">
								<div class="col-md-6 piechartTitle greyBox">
									Total Withdrawal Transaction
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 piechartAmount greyBox" id="totalWithdrawalTransaction">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 piechartSize greyBox" id="piechart9">
								</div>
							</div>
						</div> -->
					</div>
				</div>

				<div class="row" style="margin-top: 30px;">
					<div class="col-xs-12">

						<div class="dashboardBox1">
							<h4 class="dashboardTitle">Latest 20 Fund In Transactions</h4>
							<div class="row">
								<div class="col-xs-12" style="margin-top: 10px;">
									<form>
										<div id="basicwizard" class="pull-in">
											<div class="tab-content b-0 m-b-0 p-t-0 p-b-0">
												<div id="alertMsg" class="alert" style="display:none"></div>
												<div id="businessesListDiv3" class="table-responsive">
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="col-xs-12">
									<button onclick="window.location='transactionHistory.php'" type="submit" class="btn btn-primary waves-effect waves-light" style="width: 100%;">
										See All
									</button>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="row" style="margin-top: 30px;">
					<div class="col-xs-12">

						<div class="dashboardBox1">
							<h4 class="dashboardTitle">Latest 20 Fund Out Transactions</h4>
							<div class="row">
								<div class="col-xs-12" style="margin-top: 10px;">
									<form>
										<div id="basicwizard" class="pull-in">
											<div class="tab-content b-0 m-b-0 p-t-0 p-b-0">
												<div id="alertMsg" class="alert" style="display:none"></div>
												<div id="fundOutListingDiv" class="table-responsive">
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="col-xs-12">
									<button onclick="window.location='fundOutListing.php'" type="submit" class="btn btn-primary waves-effect waves-light" style="width: 100%;">
										See All
									</button>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div> <!-- container -->

		</div> <!-- content -->

		<?php include("footer.php"); ?>

	</div>
	<!-- End content-page -->


	<!-- ============================================================== -->
	<!-- End Right content here -->
	<!-- ============================================================== -->

</div>
<!-- END wrapper -->


<div class="modal fade" id="merchantDetailRate">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">
					Merchant Details
				</h4>
			</div>
			<div class="modal-body">
				<div class="row" id="merchantCryptoList"></div>
			</div>
			<div class="modal-footer text-center">
				<button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>



<script>
	var resizefunc = [];

</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>


<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<script>
	var divId = 'businessesListDiv';
	var tableId = 'businessesListTable';
	var pagerId = 'pagerBusinessesList';
	var btnArray = {};
	var thArray = Array('Merchant',
		'Transaction History (USD)',
		''
	);

	var divId2 = 'businessesListDiv2';
	var tableId2 = 'businessesListTable2';
	var pagerId2 = 'pagerBusinessesList2';
	var btnArray2 = {};
	var thArray2 = Array('Merchant',
		'Service Charge %',
		'Transaction History (USD)',
		'Service Charge Amount (USD)'
	);

	var searchId = 'searchForm';

	var divId3 = 'businessesListDiv3';
	var tableId3 = 'businessesListTable3';
	var pagerId3 = 'pagerBusinessesList3';
	var thArray3 = Array('Date',
		'Amount',
		'Service Fee',
		'From Business',
		'Service Fee %',
		'Status'
	);

	var divId4 = 'fundOutListingDiv';
	var tableId4 = 'fundOutListTable';
	var pagerId4 = 'pagerFundOutList';
	var thArray4 = Array('Date',
		'Amount',
		'Service Fee',
		'From Business',
		'Service Fee %',
		'Status'
	);

	var btnArray3 = {};
	var btnArray4 = {};

	// Initialize the arguments for ajaxSend function
	var url = 'scripts/reqBusinesses.php';
	var method = 'POST';
	var debug = 0;
	var bypassBlocking = 0;
	var bypassLoading = 0;
	var pageNumber = 1;
	var formData = "";
	var fCallback = "";
	var businessID, businessName, email, mobileNo, country;
	var d = new Date();
	var today;
	var endToday;
	var yesterday = "<?php echo strtotime(date("Y-m-d 00:00:00", strtotime("-1 days")));?>";
	var endYesterday = "<?php echo strtotime(date("Y-m-d 23:59:59", strtotime("-1 days")));?>";
	var testArr = [];

	$(document).ready(function() {


		today = "<?php echo strtotime(date('Y-m-d 00:00:00'));?>";
		endToday = "<?php echo strtotime(date('Y-m-d 23:59:59'));?>";
		//        loadCoinTransaction(today, endToday);
		//        loadTopTenTransaction(today, endToday);
		//        loadTenMerchantTransaction(today, endToday);
		//        loadTenMerchantServiceTransaction(today, endToday);
		loadLatest20Transaction();
		loadLatest20FundOutTransaction();
		runGraphData(today, endToday);

		$("#coinTransactionDate").change(function() {
			if ($("#coinTransactionDate").val() == 'today') {
				$("#fromDate").val('');
				$("#toDate").val('');
				$('#dateRangeDisplay1').hide();
				today = "<?php echo strtotime(date('Y-m-d 00:00:00'));?>";
				endToday = "<?php echo strtotime(date('Y-m-d 23:59:59'));?>";
				loadCoinTransaction(today, endToday);

			} else if ($("#coinTransactionDate").val() == 'yesterday') {
				$("#fromDate").val('');
				$("#toDate").val('');
				$('#dateRangeDisplay1').hide();
				today = "<?php echo strtotime(date("Y-m-d 00:00:00", strtotime("-1 days")));?>";
				endToday = "<?php echo strtotime(date("Y-m-d 23:59:59", strtotime("-1 days")));?>";
				loadCoinTransaction(today, endToday);
			} else if ($("#coinTransactionDate").val() == 'dateRange') {
				$("#fromDate").val('');
				$("#toDate").val('');
				$('#dateRangeDisplay1').show();
			}
		});

		$("#topTenTransactionDate").change(function() {
			if ($("#topTenTransactionDate").val() == 'today') {
				$("#fromDate2").val('');
				$("#toDate2").val('');
				$('#dateRangeDisplay2').hide();
				today = "<?php echo strtotime(date('Y-m-d00:00:00'));?>";
				endToday = "<?php echo strtotime(date('Y-m-d 23:59:59'));?>";
				loadTopTenTransaction(today, endToday);

			} else if ($("#topTenTransactionDate").val() == 'yesterday') {
				$("#fromDate2").val('');
				$("#toDate2").val('');
				$('#dateRangeDisplay2').hide();
				today = "<?php echo strtotime(date("Y-m-d 00:00:00", strtotime("-1 days")));?>";
				endToday = "<?php echo strtotime(date("Y-m-d 23:59:59", strtotime("-1 days")));?>";
				loadTopTenTransaction(today, endToday);

			} else if ($("#topTenTransactionDate").val() == 'customeDate') {
				$('#dateRangeDisplay2').show();
				$("#fromDate2").val('');
				$("#toDate2").val('');
			}
		});

		$("#tenMerchantTransactionDate").change(function() {
			if ($("#tenMerchantTransactionDate").val() == 'today') {
				$("#fromDate3").val('');
				$("#toDate3").val('');
				$('#dateRangeDisplay3').hide();
				today = "<?php echo strtotime(date('Y-m-d 00:00:00'));?>";
				endToday = "<?php echo strtotime(date('Y-m-d 23:59:59'));?>";
				loadTenMerchantTransaction(today, endToday);

			} else if ($("#tenMerchantTransactionDate").val() == 'yesterday') {
				$("#fromDate3").val('');
				$("#toDate3").val('');
				$('#dateRangeDisplay3').hide();
				today = "<?php echo strtotime(date("Y-m-d 00:00:00", strtotime("-1 days")));?>";
				endToday = "<?php echo strtotime(date("Y-m-d 23:59:59", strtotime("-1 days")));?>";
				loadTenMerchantTransaction(today, endToday);

			} else if ($("#tenMerchantTransactionDate").val() == 'dateRange') {
				$('#dateRangeDisplay3').show();
				$("#fromDate3").val('');
				$("#toDate3").val('');
			}
		});

		$("#tenMerchantServiceTransactionDate").change(function() {
			if ($("#tenMerchantServiceTransactionDate").val() == 'today') {
				$("#fromDate4").val('');
				$("#toDate4").val('');
				$('#dateRangeDisplay4').hide();
				today = "<?php echo strtotime(date('Y-m-d 00:00:00'));?>";
				endToday = "<?php echo strtotime(date('Y-m-d 23:59:59'));?>";
				loadTenMerchantServiceTransaction(today, endToday);

			} else if ($("#tenMerchantServiceTransactionDate").val() == 'yesterday') {
				$("#fromDate4").val('');
				$("#toDate4").val('');
				$('#dateRangeDisplay4').hide();
				today = "<?php echo strtotime(date("Y-m-d 00:00:00", strtotime("-1 days")));?>";
				endToday = "<?php echo strtotime(date("Y-m-d 23:59:59", strtotime("-1 days")));?>";
				loadTenMerchantServiceTransaction(today, endToday);

			} else if ($("#tenMerchantServiceTransactionDate").val() == 'dateRange') {
				$('#dateRangeDisplay4').show();
				$("#fromDate4").val('');
				$("#toDate4").val('');
			}
		});



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

		$('#fromDate2').daterangepicker({
			autoApply: true,
			autoUpdateInput: false,
			locale: {
				format: 'DD/MM/YYYY'
			}
		}, function(start, end, label) {
			$("#fromDate2").val(start.format('DD/MM/YYYY'));
			$("#toDate2").val(end.format('DD/MM/YYYY'));
		});
		$('#toDate2').click(function() {
			$('#fromDate2').trigger('click');
		});
		$('input[name="start2"]').on('apply.daterangepicker', function(ev, picker) {
			$('#fromDate2').val(picker.startDate.format('DD/MM/YYYY'));
			$('#toDate2').val(picker.endDate.format('DD/MM/YYYY'));
		});


		$('#fromDate3').daterangepicker({
			autoApply: true,
			autoUpdateInput: false,
			locale: {
				format: 'DD/MM/YYYY'
			}
		}, function(start, end, label) {
			$("#fromDate3").val(start.format('DD/MM/YYYY'));
			$("#toDate3").val(end.format('DD/MM/YYYY'));
		});
		$('#toDate3').click(function() {
			$('#fromDate3').trigger('click');
		});
		$('input[name="start3"]').on('apply.daterangepicker', function(ev, picker) {
			$('#fromDate3').val(picker.startDate.format('DD/MM/YYYY'));
			$('#toDate3').val(picker.endDate.format('DD/MM/YYYY'));
		});

		$('#fromDate4').daterangepicker({
			autoApply: true,
			autoUpdateInput: false,
			locale: {
				format: 'DD/MM/YYYY'
			}
		}, function(start, end, label) {
			$("#fromDate4").val(start.format('DD/MM/YYYY'));
			$("#toDate4").val(end.format('DD/MM/YYYY'));
		});
		$('#toDate4').click(function() {
			$('#fromDate4').trigger('click');
		});
		$('input[name="start4"]').on('apply.daterangepicker', function(ev, picker) {
			$('#fromDate4').val(picker.startDate.format('DD/MM/YYYY'));
			$('#toDate4').val(picker.endDate.format('DD/MM/YYYY'));
		});


	});

	function dateFilterButton(elem) {
		 if (elem.id == 1) {
			today = "<?php echo strtotime(date('Y-m-d 00:00:00'));?>";
			endToday = "<?php echo strtotime(date("Y-m-d 23:59:59"));?>";

			dataValue = (today + " - " + endToday);
			runGraphData(today, endToday)
		} else if (elem.id == 2) {
			
			today = "<?php echo strtotime(date('Y-m-d 00:00:00', strtotime("-1 days")));?>";
			endToday = "<?php echo strtotime(date("Y-m-d 23:59:59", strtotime("-1 days")));?>";
			
			dataValue = (today + " - " + endToday);
			runGraphData(today, endToday)

		} else if (elem.id == 3) {
			today = "<?php echo strtotime(date('Y-m-d 00:00:00', strtotime("-6 days")));?>";
			endToday = "<?php echo strtotime(date("Y-m-d 23:59:59"));?>";

			dataValue = (today + " - " + endToday);
			runGraphData(today, endToday)

		} else if (elem.id == 4) {
			today = "<?php echo strtotime(date('Y-m-d 00:00:00', strtotime("-29 days")));?>";
			endToday = "<?php echo strtotime(date("Y-m-d 23:59:59"));?>";
			dataValue = (today + " - " + endToday);
			runGraphData(today, endToday)
		}else if (elem.id == 5) {
			runGraphData()
		}


	}

	function loadDefaultListing(data, message) {
		var businessList = data.data;
		var tableNo;

		if (businessList) {
			var newList = [];
			$.each(businessList, function(k, v) {
				if (!v['business_phone_number']) {
					v['business_phone_number'] = "-";
				}
				if (!v['business_country']) {
					v['business_country'] = "-";
				}
				if (!v['business_email']) {
					v['business_email'] = "-";
				}
				if (!v['last_login']) {
					v['last_login'] = "-";
				}
				var rebuildData = {
					ID: v['business_id'],
					businessName: v['business_name'],
					Mobile: v['business_phone_number'],
					Country: v['business_country'],
					Domain: v['domain'],
					CreatedOn: v['created_at']
				};
				newList.push(rebuildData);
			});

		}
		buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
		pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
	}

	function tableBtnClick(btnId) {
		var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
		var tableRow = $('#' + btnId).parent('td').parent('tr');
		var tableId = $('#' + btnId).closest('table');

		if (btnName == 'edit') {
			var businessID = tableRow.attr('data-th');
			$.redirect("businessesGeneral.php", {
				id: businessID
			});
		}
	}

	function loadSearch(data, message) {
		if (!data) {
			$('#alertMsg').html('<span>' + message + '</span>').show();
			$('#businessesListDiv').hide();
			$('#paginateText').hide();
			$('#pagerBusinessesList').hide();
		} else if (data) {
			loadDefaultListing(data, message);
			$('#businessesListDiv').show();
			$('#paginateText').show();
			$('#pagerBusinessesList').show();
		}

		$('#searchMsg').html('<span>Search Successful</span>').show();
		setTimeout(function() {
			$('#searchMsg').html('').hide();
		}, 3000);

	}

	function pagingCallBack(pageNumber, fCallback) {

		if ($("#fromDate").val()) {
			fromDateTime = dateToTimestamp($("#fromDate").val() + " 00:00:00");
		} else {
			fromDateTime = "";
		}
		if ($("#toDate").val()) {
			toDateTime = dateToTimestamp($("#toDate").val() + " 23:59:59");
		} else {
			toDateTime = "";
		}


		if (pageNumber > 1) bypassLoading = 1;
	}

	function loadCoinTransaction(today, endToday) {
		if ($("#fromDate").val()) {
			fromDateTime = dateToTimestamp($("#fromDate").val() + " 00:00:00");
		} else {
			fromDateTime = today;
		}
		if ($("#toDate").val()) {
			toDateTime = dateToTimestamp($("#toDate").val() + " 23:59:59");
		} else {
			toDateTime = endToday;
		}

		formData = {
			command: 'adminNuxpayTotalCoinTransactionList',
			date_from: fromDateTime,
			date_to: toDateTime
		};

		var fCallback = loadCoinTransactionListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

	function loadCoinTransactionListing(data, message) {

		var coinTransactionList = data.coin_transaction_list;
		var buildCoinTransaction = "";

		if (coinTransactionList) {
			$.each(coinTransactionList, function(k, v) {
				buildCoinTransaction += `
                    <div class="col-xs-12">
                        <div class="row" style="display: flex;">
                            <div class="coinRateWidth">
                                <img src="${v['coin_image_url']}" class="coinRateIcon">
                            </div>
                            <div class="coinRateWidth2">
                                <div class="row">
                                    <div class="col-xs-12 currencyFont">
                                        ${v['name']}
                                    </div>
                                    <div class="col-xs-12 currencyFontBalance">
                                        ${formatNumber(v['amount'],8,1)} ${v['symbol']}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <hr>
                    </div>
                `;
			});


		} else {
			buildCoinTransaction += `
            <div class="col-xs-12">
                    <div class="alert alert-success">${message}</div>
                    </div>
                `;

		}

		$('#coinTransaction').html(buildCoinTransaction);
	}

	function loadTopTenTransaction(today, endToday) {
		if ($("#fromDate2").val()) {
			fromDateTime = dateToTimestamp($("#fromDate2").val() + " 00:00:00");
		} else {
			fromDateTime = today;
		}
		if ($("#toDate2").val()) {
			toDateTime = dateToTimestamp($("#toDate2").val() + " 23:59:59");
		} else {
			toDateTime = endToday;
		}

		formData = {
			command: 'adminNuxpayTopTenTransactionList',
			date_from: fromDateTime,
			date_to: toDateTime
		};

		var fCallback = loadTopTenTransactionListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

	function loadTopTenTransactionListing(data, message) {

		var newList = data;
		var buildListing = "";

		if (newList) {
			$.each(newList, function(k, v) {

				if (v['business_name'] == "" || v['business_name'] == null) {
					v['business_name'] = '-';
				}
				buildListing += `
                    <div class="col-xs-12">
                        <div class="row" style="display: flex;">
                            <div class="coinRateWidth">
                                <img src="${v['business_image_url']}" class="coinRateIcon">
                            </div>
                            <div class="coinRateWidth2">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="row">
                                                    <div class="col-xs-12 currencyFontBalance">
                                                        ${v['business_name']}
                                                    </div>
                                                    <div class="col-xs-12 currencyFont">
                                                         ${v['created_at']}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-xs-12 mobileAlignment">
                                                <div class="row">
                                                    <div class="col-xs-12 currencyFontBalance">
                                                        ${formatNumber(v['amount'],8,1)} ${v['symbol']}
                                                    </div>
                                                    <div class="col-xs-12 currencyFont">
                                                         (${formatNumber(v['usd_amount'],2,1)} USD)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <hr>
                    </div>
                `;
			});


		} else {
			buildListing += `
                    <div class="col-xs-12">
                    <div class="alert alert-success">${message}</div>
                    </div>
                `;
		}

		$('#topTenTransaction').html(buildListing);
	}

	function loadTenMerchantTransaction(today, endToday) {
		if ($("#fromDate3").val()) {
			fromDateTime = dateToTimestamp($("#fromDate3").val() + " 00:00:00");
		} else {
			fromDateTime = today;
		}
		if ($("#toDate3").val()) {
			toDateTime = dateToTimestamp($("#toDate3").val() + " 23:59:59");
		} else {
			toDateTime = endToday;
		}

		formData = {
			command: 'adminNuxpayTopTenMerchantList',
			date_from: fromDateTime,
			date_to: toDateTime
		};

		var fCallback = loadTenMerchantTransactionListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

	function loadTenMerchantTransactionListing(data, message) {
		var businessList = data;
		var tableNo;
		testArr = data;

		if (businessList) {
			var newList = [];
			var detailHtml = "";

			var merchantDetail = [];
			var parsedMerchantDetail = "";

			$.each(businessList, function(k, v) {
				var buildMerchantDetail = {};
				$.each(v['crypto_list'], function(k, v) {
					buildMerchantDetail = {
						amount: v['amount'],
						symbol: v['symbol']
					};

				});

				merchantDetail.push(buildMerchantDetail);

				parsedMerchantDetail = JSON.stringify(v['crypto_list']).trim();

				// merchantDetail = JSON.stringify(v['crypto_list']).trim();

				detailHtml = `
                    <button class="btn detailBtn" type="button" onclick='runModalMerchant2("${v['business_name']}", ${parsedMerchantDetail})'>Details</button>
                `;


				var rebuildData = {
					ID: v['business_name'],
					businessName: formatNumber(v['total_usd_amount'], 2, 1),
					details: detailHtml
				};


				newList.push(rebuildData);
			});

		}
		buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
		pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
	}

	function runModalMerchant2(merchantName, crypto_list) {
		cHtml = '';
		/*var cryptoObj = testArr.filter((obj) => obj.business_name = merchantName);
		var crypto = cryptoObj[0].crypto_list;*/
		cHtml += `
            <div class="col-xs-12 dashboardTitle text-center" style="margin-bottom: 20px;">
                ${merchantName}
            </div>
             <div class="col-xs-12">
            <form>
                    <div class="pull-in">
                        <div class="tab-content b-0 m-b-0 p-t-0 p-b-0">
                            <div class="table-responsive">
                                <table id="businessesListTable" class="table table-striped table-bordered no-footer m-0">
                                    <thead>
                                        <tr>
                                            <th>Amount</th>
                                            <th>Currency</th>
                                        </tr>
                                    </thead>
                                    <tbody>
        `;

		$.each(crypto_list, function(k, v) {
			cHtml += `
                                            <tr>

                                                <td>${formatNumber(v['amount'],8,1)}</td>
                                                <td>${v['symbol']}</td>
                                            </tr>`;
		});

		cHtml += `                   </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            `;

		$("#merchantCryptoList").html(cHtml);

		$('#merchantDetailRate').modal('show');
	}


	function loadTenMerchantServiceTransaction(today, endToday) {
		if ($("#fromDate4").val()) {
			fromDateTime = dateToTimestamp($("#fromDate4").val() + " 00:00:00");
		} else {
			fromDateTime = today;
		}
		if ($("#toDate4").val()) {
			toDateTime = dateToTimestamp($("#toDate4").val() + " 23:59:59");
		} else {
			toDateTime = endToday;
		}

		formData = {
			command: 'adminNuxpayTopMerchantServiceFee',
			date_from: fromDateTime,
			date_to: toDateTime
		};

		var fCallback = loadTenMerchantServiceTransactionListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

	function loadTenMerchantServiceTransactionListing(data, message) {
		var businessList = data;
		var tableNo;

		if (businessList) {
			var newList = [];
			$.each(businessList, function(k, v) {

				var rebuildData = {
					merchant: v['business_name'],
					charge: v['service_charge_rate'] + '%',
					amount: formatNumber(v['total_transaction_amount'], 2, 1),
					percent: formatNumber(v['total_service_charge_amount'], 2, 1)

				};
				newList.push(rebuildData);
			});

		}
		buildTable(newList, tableId2, divId2, thArray2, btnArray2, message, tableNo);
		pagination(pagerId2, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

	}

	function loadLatest20Transaction() {
		formData = {
			command: 'adminNuxpayLatestTransactionList',
			limit: 20,
		};
		var fCallback = loadLatest20TransactionListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

	function loadLatest20TransactionListing(data, message) {
		var latestTransactionList = data;
		var tableNo;

		if (latestTransactionList) {
			var newList = [];
			$.each(latestTransactionList, function(k, v) {

				var rebuildData = {
					date: v['created_at'],
					amount: formatNumber(v['amount'], 8, 1) + ' ' + v['symbol'],
					service_fee: formatNumber(v['service_fee'], 8, 1) + ' ' + v['tx_fee_symbol'],
					merchant: v['business_name'],
					charge: formatNumber(v['service_charge_rate'], 2, 1) + '%',
					status: v['status'],

				};
				newList.push(rebuildData);
			});

		}
		buildTable(newList, tableId3, divId3, thArray3, btnArray3, message, tableNo);
	}

	function loadLatest20FundOutTransaction() {
		formData = {
			command: 'adminNuxpayLatestTransactionList',
			limit: 20,
			tx_type: 'fund_out'
		};
		//console.log(formData);
		var fCallback = loadLatest20FundOutTransactionListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

	function loadLatest20FundOutTransactionListing(data, message) {
		//console.log(data);
		var latestTransactionList = data;
		var tableNo;

		if (latestTransactionList) {
			var newList = [];
			$.each(latestTransactionList, function(k, v) {

				var rebuildData = {
					date: v['created_at'],
					amount: formatNumber(v['amount'], 8, 1) + ' ' + v['symbol'],
					service_fee: formatNumber(v['service_fee'], 8, 1) + ' ' + v['tx_fee_symbol'],
					merchant: v['business_name'],
					charge: formatNumber(v['service_charge_rate'], 2, 1) + '%',
					status: v['status'],

				};
				newList.push(rebuildData);
			});

		}
		buildTable(newList, tableId4, divId4, thArray4, btnArray4, message, tableNo);
	}

	function runGraphData(dateFrom, dateTo) {
		tsFrom = '';
		tsTo = '';
		timeFrom = '';
		timeTo = '';
		i = 0;

		if (dateFrom && dateTo) {
			tsFrom = dateToTimestamp(dateFrom);
			tsTo = dateToTimestamp(dateTo);
		}
		// On the same day, need to format tsTo
		if ((tsFrom == tsTo) && (tsFrom > 0))
			tsTo += 86399;


		formData = {
			command: 'adminNuxpayDashboardStatistics',
			date_from: dateFrom,
			date_to: dateTo
		};
		fCallback = loadGraphData;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}


	function loadGraphData(data, message) {
		//console.log(data);
		if (data != "") {

			$("#profitListing").html("");
			var number = data.total_profit;

			$('#totalProfit').empty().text(Number(number).toLocaleString('en') + ' USD');
			$('#totalTransaction').empty().text(data.total_transaction_by_status_data.total_transaction);
			$('#totalTransacted').empty().text(Number(data.total_transacted_amount_data.total_transacted_amount).toLocaleString('en') + ' USD');
			$('#totalFundOutTransaction').empty().text(data.total_fund_out_tx_by_status_data.total_transaction);
			$('#totalFundOutTransacted').empty().text(Number(data.total_fund_out_transacted_amount_data.total_transacted_amount).toLocaleString('en') + ' USD');
			$('#profitContribution').empty().text(Number(data.total_profit).toLocaleString('en') + ' USD');
			// $('#totalContributionReseller').empty().text(Number(data.sum).toLocaleString('en') + ' USD');
			// $('#totalFundIn').empty().text(Number(data.amount_receive_sum).toLocaleString('en') + ' USD');
			// $('#totalWithdrawalTransaction').empty().text(data.total_withdrawal_tx_by_status_data.total_transaction);
			// $('#totalWithdrawalTransacted').empty().text(Number(data.total_withdrawal_transacted_amount_data.total_transacted_amount).toLocaleString('en') + ' USD');

			$listSelector = $("#profitListing")
			if (data.total_profit_by_coin) {
				profitList = data.total_profit_by_coin;

				$.each(profitList, function(i, obj) {
					formatAmount = Number(obj.amount).toLocaleString('en')
					$listSelector.append(`<div class="row"> 
                                         <div class="col-xs-6">
                                            <div class="row">
                                                <div class = "col-xs-12">
                                                    ` + obj.symbol +
						`</div>
                                                 <div class="col-xs-12">` +
						formatAmount +
						`
                                                USD </div> 
                                            </div>
                                        </div>
                                         
                                         <div class = "col-xs-6" style = "margin-top:15px; text-align:right;">
                                            ` + obj.percentage +
						`%</div>
                                    </div><br>`)


				});
			} else {
				//                 $listSelector.append(`<div class="row"> </div>`)
				$("#profitListing").html("No Result");

			}

			am4core.ready(function() {
				am4core.useTheme(am4themes_animated);

				var chart = am4core.create("chartdiv", am4charts.XYChart);

				if (data.chart_data) {

					chart.data = data.chart_data;

					chart.dateFormatter.inputDateFormat = "yyyy-MM-dd HH:mm:ss";

					var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
					dateAxis.renderer.minGridDistance = 50;

					var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
					valueAxis.min = 0;

					var series = chart.series.push(new am4charts.LineSeries());
					series.dataFields.valueY = "value";
					series.dataFields.dateX = "date";
					series.strokeWidth = 2;
					series.minBulletDistance = 10;
					series.tooltipText = "[bold]Timeline:[/]\n{date.formatDate()}[bold]\n\nVolume:[/]\n{value}";
					series.tooltip.pointerOrientation = "vertical";

					chart.cursor = new am4charts.XYCursor();
					chart.cursor.xAxis = dateAxis;
					series.fill = am4core.color("#FFF");
					// console.log(data.total_profit_by_reseller.length);
					generatePiechart('piechart1', data.total_profit_by_merchant, 'amount', 'name')
					generatePiechart('piechart2', data.total_transacted_amount_data.piechart_data, 'amount', 'symbol')
					generatePiechart('piechart3', data.total_transaction_by_status_data.piechart_data, 'amount', 'status')
					generatePiechart('piechart4', data.total_fund_out_transacted_amount_data.piechart_data, 'amount', 'symbol')
					generatePiechart('piechart5', data.total_fund_out_tx_by_status_data.piechart_data, 'amount', 'status')
					// generatePiechart('piechart6', data.total_profit_by_reseller, 'total_amount', 'reseller_username')
					// generatePiechart('piechart7', data.total_fund_in_by_reseller, 'total_amount_receive_usd', 'reseller_username')
					// generatePiechart('piechart8', data.total_withdrawal_transacted_amount_data.piechart_data, 'amount', 'symbol')
					// generatePiechart('piechart9', data.total_withdrawal_tx_by_status_data.piechart_data, 'amount', 'status')
				}

			});

			if (number == 0) {
				$(".piechartSize").html("No Result.");

			}


		} else {

			$('#totalProfit').text(0);
			//            $('#totalTransVol').text(0);
			//            $('.currencyUnit').text("");
			//            $('#payoutAmount').text(0);

			am4core.ready(function() {

				am4core.useTheme(am4themes_animated);

				var chart = am4core.create("chartdiv", am4charts.XYChart);

				var today = new Date();
				var dd = String(today.getDate()).padStart(2, '0');
				var mm = String(today.getMonth() + 1).padStart(2, '0');
				var yyyy = today.getFullYear();

				today = yyyy + '-' + mm + '-' + dd;


				var dataDate1 = today + " 00:00:00";
				var dataDate2 = today + " 01:00:00";
				var dataDate3 = today + " 02:00:00";

				chart.data = [{
						date: dataDate1,
						value: 0
					},
					{
						date: dataDate2,
						value: 0
					},
					{
						date: dataDate3,
						value: 0
					}
				]

				chart.dateFormatter.inputDateFormat = "yyyy-MM-dd HH:mm:ss";


				var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
				dateAxis.renderer.minGridDistance = 50;

				var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
				valueAxis.min = 0;


				var series = chart.series.push(new am4charts.LineSeries());
				series.dataFields.valueY = "value";
				series.dataFields.dateX = "date";
				series.strokeWidth = 3;
				series.minBulletDistance = 10;
				series.tooltipText = "[bold]Timeline:[/]\n{date.formatDate()}[bold]\n\nVolume:[/]\n{value}";
				series.tooltip.pointerOrientation = "vertical";

				chart.cursor = new am4charts.XYCursor();
				chart.cursor.xAxis = dateAxis;
				series.fill = am4core.color("#FFF");

			});

		}

	}

	function generatePiechart(piechartID, piechartdata, value, category) {
		var piechart1 = am4core.create(piechartID, am4charts.PieChart);
		piechart1.data = piechartdata;


		// Add and configure Series
		var pieSeries = piechart1.series.push(new am4charts.PieSeries());
		pieSeries.dataFields.value = value;
		pieSeries.dataFields.category = category;
		pieSeries.autoMargins = false;
		pieSeries.labels.template.radius = 1;
		//        
		//        pieSeries.slices.template.stroke = am4core.color("#4a2abb");
		//        pieSeries.slices.template.strokeWidth = 2;
		//        pieSeries.slices.template.strokeOpacity = 1;


		// Add a legend
		piechart1.legend = new am4charts.Legend();
		piechart1.legend.maxColumns = 2;
		piechart1.legend.maxRows = 2;
		piechart1.legend.fontSize = 13;
		if (piechartID == 'piechart1' || piechartID == 'piechart2' || piechartID == 'piechart4' || piechartID == 'piechart6'|| piechartID == 'piechart7') {
			piechart1.legend.valueLabels.template.text = "{value.value} USD";
		} else {
			piechart1.legend.valueLabels.template.text = "{value.value}";
		}


		var colorSet = new am4core.ColorSet();
		colorSet.list = ["#1E90FF", "#191970", "#7B68EE", "#FF69B4", "#8E24AA", "#3CB371"].map(function(color) {
			return new am4core.color(color);
		});
		pieSeries.colors = colorSet;

		// piechart1.legendSettings.itemValueText = "{value}%";
		piechart1.radius = am4core.percent(40);



	}

</script>

</body>

</html>
