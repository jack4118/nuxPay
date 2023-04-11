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
                    <div class="col-xs-12">
                        <a href="javascript:;" onclick="backToListing()" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            Back
                        </a>
                    </div>
                </div>

				<div class="row">
					<div class="col-xs-12 page-title">
						Fund Out Details
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12" style="margin: 10px">
						<div class="row">
							<div class="col-md-12">
								<h4 class="dashboardTitle"></h4>
							</div>
							<div class="col-md-12 dashboardBox" style="margin-top:10px">
								<div class="p-b-0">
									<form>
										<div id="basicwizard" class="pull-in">
											<div class="tab-content b-0 m-b-0 p-t-0">
												<div id="alertMsg" class="alert" style="display: none;"></div>
												<div id="fundOutSummaryDiv" class="table-responsive"></div>

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
										<div id="adminFundOutDetailsDiv" class="table-responsive"></div>
										<span id="paginateText"></span>
										<div class="text-center" style="">
											<ul class="pagination pagination-md" id="pagerAdminFundOutDetails">
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
	var divId = 'adminFundOutDetailsDiv';
	var tableId = 'adminFundOutDetailsTable';
	var pagerId = 'pagerAdminFundOutDetails';
	var btnArray = {};
	var thArray = Array(
		'Date',
		'Recipient Type',
		'Receivable Amount',
		'Miner Fee',
		'Receiver Address',
		'Tx Hash',
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
	// var businessID, businessName, hashCode, recipientAddress, distributor, reseller, currency, site, email, mobileNo, country;
	var tableNo;
	var previousTxHash = "<?php echo $_POST['tx_hash'] ?>";

	$(document).ready(function() {

		
		var formData = {
			command: "adminFundOutDetails",
			page: pageNumber,
			tx_hash: previousTxHash
		};

		if (!fCallback)
			fCallback = loadDefaultListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		$('#searchBtn').click(function() {
			pagingCallBack(pageNumber, loadSearch);
		});
	});

	function pagingCallBack(pageNumber, fCallback) {

		if (pageNumber > 1) bypassLoading = 1;

		var formData = {
			command: "adminFundOutDetails",
			page: pageNumber,
			// date_from: fromDateTime,
			// date_to: toDateTime,
			// business_id: businessID,
			// business_name: businessName,
			// tx_hash: hashCode,
			// status: status,
			// recipient_address: recipientAddress,
			// site: site,
			// distributor: distributor,
			// reseller: reseller,
			// currency: currency,
		};


		if (!fCallback)
			fCallback = loadDefaultListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

	function backToListing() {
        $.redirect("fundOutListing.php",{
            
        });
    }

	function loadDefaultListing(data, message) {
		var tableNo;
        
        // var txStatusList = [];


		if (data) {
			
			var newList = [];
			$.each(data, function(k, v) {
				if(k == "fundOutDetails"){
					
					var rebuildData = {
						date: v['date'],
						recipient_type: v['address_type'],
						amount:	v['amount'],
						minerFee: v['minerFee'],
						recipient_address: v['recipient_address'],
						transaction_hash: v['transaction_hash']
					};
					newList.push(rebuildData);
				}
			});

			var newList1 = [];
			$.each(data, function(k, v) {
				if(k == "paidAmount"){

					var rebuildData = {
						amount: v['amount'],
						service_charge_rate: v['service_charge_rate'],
						service_charge_amount: v['service_charge_amount']
					};
					newList1.push(rebuildData);
				}
			});

				var divId1 = 'fundOutSummaryDiv';
				var tableId1 = 'fundOutSummaryTable';
				var pagerId1 = '';
				var btnArray1 = {};
				var thArray1 = Array(
					'Paid Amount',
					'Processing Fee Percentages',
					'Processing Fee Amount'
					
				);


			buildTable(newList1, tableId1, divId1, thArray1, btnArray1, message, tableNo);
				
			
		}else {
			newList = "";
			message = "No result.";
		}
		buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
		pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);


	}

	// function loadSearch(data, message) {
	// 	loadDefaultListing(data, message);
	// 	$('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
	// 	setTimeout(function() {
	// 		$('#searchMsg').removeClass('alert-success').html('').hide();
	// 	}, 3000);
	// }

</script>