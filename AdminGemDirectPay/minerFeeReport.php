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
						Miner Fee Report
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
											<div class="col-sm-4 form-group">
												<label class="control-label" data-th="disabled">
													Type
												</label>
												<select id="type" class="form-control" dataName="disabled" dataType="select">
<!--													<option value="">Please Select</option>-->
													<option value="pg_fundout">Payment Gateway Fund Out</option>
													<option value="marketer_fundout">Marketer Fund Out</option>
													<option value="blockchain_fundout">Blockchain Fund Out</option>
												</select>
											</div>
<!--
											<div class="col-md-4 form-group" id="businessIDDiv" style="display:none;">
												<label class="control-label">
													Business ID
												</label>
												<input id="businessID" type="text" class="form-control" dataName="name" dataType="text">
											</div>
-->

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

				<!-- End Search -->

				<div class="row" style="padding:10px">

					<div class="col-md-12 dashboardBox" style="margin-top:10px">
						<div class="p-b-0">

							<div id="totalMinerFeeValue"></div>
							<div id="totalMinerFeeFundOut"></div>
							<div id="totalMinerFeeCollected"></div>
							<button class="btn btn-primary btn-md waves-effect waves-light m-b-20" id="viewBtn" style="display:none; margin-left:15px;">View Details</button>


						</div>

					</div>
				</div>

				<!-- Table -->
				<!--
				<div class="row" style="margin-top: 20px;">
					<div class="col-md-12">
						<div class="p-b-0">
							<form>
								<div id="basicwizard" class="pull-in">
									<div class="tab-content b-0 m-b-0 p-t-0">
										<div id="alertMsg" class="alert" style="display: none;"></div>
										<div id="minerListDiv" class="table-responsive"></div>
										<span id="paginateText"></span>
										<div class="text-center" style="">
											<ul class="pagination pagination-md" id="pagerMinerList">
											</ul>
										</div>
									</div>
								</div>
							</form>

						</div>

					</div>
				</div>
-->

			</div>

		</div>
		<?php include("footer.php"); ?>
	</div>
</div>

<script>
	var resizefunc = [];

</script>
<?php include("shareJs.php"); ?>

</body>

</html>

<script>
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
	var businessID, businessName, email, mobileNo, country;
	var tableNo;
	var fromDateTime = '';
	var toDateTime = '';
	var report_type = "<?php echo $_GET['report_type'];?>";
	if (report_type) {
		var businessID = "<?php echo $_GET['business_id'];?>";
		var fromDateTime = "<?php echo $_GET['from_datetime'];?>";
		var toDateTime = "<?php echo $_GET['to_datetime'];?>";

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

	function loadDefaultListing(data, message) {

		var minerFee = "";

		if (data == '' || data == null) {
			message = "<span>No result.</span>";
			$('#totalMinerFeeValue').empty().append(message);
			$('#totalMinerFeeFundOut').empty();
			$('#totalMinerFeeCollected').empty();
			$('#viewBtn').hide();

		} else {
			minerFee += '<div class="col-md-12" style="padding:15px">';
			minerFee += '<table class="table-responsive" style="border:0px;">';
			minerFee += '<thead>';
			minerFee += '<tr>';
			minerFee += '<th style="text-align: left!important; font-size: 16px;">Total Miner Fee Value(USD)</th>';
			minerFee += '</tr>';
			minerFee += '</thead>';

			minerFee += '<tbody>';
			$.each(data.total_miner_fee_value, function(k, v) {
				minerFee += '<tr>';
				minerFee += '<td>' + k + ' : ' + v + ' </td>';
				minerFee += '</tr>';
			});
			minerFee += '</tbody>';
			minerFee += '</table>';
			minerFee += '</div>';
			$('#totalMinerFeeValue').empty().append(minerFee);


			var minerFee = '';
			minerFee += '<div class="col-md-12" style="padding:15px">';
			minerFee += '<table class="table-responsive" style="border:0px;">';
			minerFee += '<thead>';
			minerFee += '<tr>';
			minerFee += '<th style="text-align: left!important; font-size: 16px;">Total Miner Fee Spent</th>';
			minerFee += '</tr>';

			minerFee += '</thead>';

			minerFee += '<tbody>';
			$.each(data.total_miner_fee_fund_out, function(k, v) {
				minerFee += '<tr>';
				minerFee += '<td>' + k + ' : ' + v + ' </td>';
				minerFee += '</tr>';
			});
			minerFee += '</tbody>';
			minerFee += '</table>';
			minerFee += '</div>';
			$('#totalMinerFeeFundOut').empty().append(minerFee);

			var minerFee = '';
			minerFee += '<div class="col-md-12" style="padding:15px">';
			minerFee += '<table class="table-responsive" style="border:0px;">';
			minerFee += '<thead>';
			minerFee += '<tr>';
			minerFee += '<th style="text-align: left!important; font-size: 16px;">Total Miner Fee Collected</th>';
			minerFee += '</tr>';
			minerFee += '</thead>';

			minerFee += '<tbody>';
			$.each(data.total_miner_fee_collected, function(k, v) {
				minerFee += '<tr>';
				minerFee += '<td>' + k + ' : ' + v + ' </td>';
				minerFee += '</tr>';
			});
			minerFee += '</tbody>';
			minerFee += '</table>';
			minerFee += '</div>';
			$('#totalMinerFeeCollected').empty().append(minerFee);
			$('#viewBtn').show();
		}




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

		businessID = $('#businessID').val();
		report_type = $('#type').val();

		if (pageNumber > 1) bypassLoading = 1;

		var formData = {
			command: "resellerNuxpayGetMinerFeeReport",
			date_from: fromDateTime,
			date_to: toDateTime,
//			business_id: businessID,
			report_type: report_type,

		};
		if (!fCallback)
			fCallback = loadDefaultListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

	function loadSearch(data, message) {
		loadDefaultListing(data, message);
		$('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
		setTimeout(function() {
			$('#searchMsg').removeClass('alert-success').html('').hide();
		}, 3000);
	}

</script>
