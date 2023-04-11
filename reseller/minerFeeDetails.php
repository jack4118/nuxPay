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
					<div class="col-sm-4">
						<button class="btn btn-primary btn-md waves-effect waves-light m-b-20" id="backBtn">
							<i class="md md-add"></i>
							Back
						</button>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 page-title">
						Miner Fee Details
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
	var divId = 'minerListDiv';
	var tableId = 'minerListTable';
	var pagerId = 'pagerMinerList';
	var btnArray = {};
	var thArray = Array(
		'Created At',
		'Transacted Amount',
		'Wallet Type',
		'Miner Fee',
		'Miner Fee Value(USD)',
		'Miner Fee Wallet Type',


	);


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
	var fromDateTime = "<?php echo $_POST['from_datetime']; ?>";
	var toDateTime = "<?php echo $_POST['to_datetime']; ?>";
	var businessID = "<?php echo $_POST['business_id']; ?>";
	var report_type = "<?php echo $_POST['report_type']; ?>";

	$(document).ready(function() {

		if (pageNumber > 1) bypassLoading = 1;

		var formData = {
			command: "resellerNuxpayGetMinerFeeDetails",
			date_from: fromDateTime,
			date_to: toDateTime,
			business_id: businessID,
			report_type: report_type,

		};

		if (!fCallback)
			fCallback = loadDefaultListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		$('#backBtn').click(function(){
			$.redirect("minerFeeReport.php", {
                from_datetime: fromDateTime,
				to_datetime: toDateTime,
				business_id: businessID,
				report_type: report_type,
            }, "GET");
		})

	});

	function loadDefaultListing(data, message) {
		var listing = data.listing;
		if (listing) {
			var newList = [];
			$.each(listing, function(k, v) {

				var rebuildData = {
					created_at: v['created_at'],
					amount: v['amount'],
					wallet_type: v['wallet_type'],
					miner_fee: v['miner_fee'],
					miner_fee_value: v['miner_fee_value'],
					miner_fee_wallet_type: v['miner_fee_wallet_type'],
				

				};
				newList.push(rebuildData);
			});


		} else {
			newList = "";
			message = "No result.";
		}

		buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
		pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

	}


	function pagingCallBack(pageNumber, fCallback) {


		if (pageNumber > 1) bypassLoading = 1;

		var formData = {
			command: "resellerNuxpayGetMinerFeeDetails",
			page: pageNumber,
			date_from: fromDateTime,
			date_to: toDateTime,
			business_id: businessID,
			report_type: report_type,

		};

		if (!fCallback)
			fCallback = loadDefaultListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

</script>
