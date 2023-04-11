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
						Buy and Sell Crypto
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
											<!-- status -->
											<div class="col-sm-4 form-group">
												<label class="control-label" data-th="status">
													Status
												</label>
												<select id="status" class="form-control" dataName="disabled" dataType="select">
													<option value="">All</option>
													<option value="pending">Pending</option>
													<option value="cancelled">Cancelled</option>
													<option value="completed">Completed</option>
													<option value="created">Created</option>
												</select>
											</div>
											<!-- buy or sell type -->
											<div class="col-sm-4 form-group">
												<label class="control-label" data-th="buyselltype">
													Type
												</label>
												<select id="cryptoType" class="form-control" dataName="disabled" dataType="select">
													<option value="">All</option>
													<option value="buy">Buy</option>
													<option value="sell">Sell</option>
												</select>
											</div>
											<!-- provider type -->
											<div class="col-sm-4 form-group">
												<label class="control-label" data-th="provider">
													Provider
												</label>
												<select id="providerId" class="form-control" dataName="disabled" dataType="select">
													<option value="">All</option>
													<option value="simplex">Simplex</option>
													<option value="xanpool">Xanpool</option>
												</select>
											</div>
											


										</form>
										
										<!-- search button -->
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

				<!-- buy sell crypto listing -->
				<div class="row" style="margin-top: 20px;">
					<div class="col-md-12">
						<div class="p-b-0">
							<form>
								<div id="basicwizard" class="pull-in">
									<div class="tab-content b-0 m-b-0 p-t-0">
										<div id="alertMsg" class="alert" style="display: none;"></div>
										<div id="buysellListDiv" class="table-responsive"></div>
										<span id="paginateText"></span>
										<div class="text-center" style="">
											<ul class="pagination pagination-md" id="pagerBuySellList">
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
	var divId = 'buysellListDiv';
	var tableId = 'buySellListTable';
	var pagerId = 'pagerBuySellList';
	var btnArray = Array('approve');
	// var btnArray ='';
	var thArray = Array('Date',
						'Business ID',
						'Fiat Amount',
						'Fiat Currency',
						'Crypto Amount',
						'Crypto Type',
						'Quote Id',
						'Payment Id',
						'Reference Id',
						'Type',
						'Sell Type',
						'Destination Address',
						'Provider Id',
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

	$(document).ready(function() {
		// date search
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

		// search reset button
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
			command: "adminbuySellCryptoListing",
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

		status = $('#status').val();
		type	= $('#cryptoType').val();
		providerId = $('#providerId').val();


		if (pageNumber > 1) bypassLoading = 0;

		var formData = {
			command: "adminbuySellCryptoListing",
			page: pageNumber,
            datetime_from: fromDateTime,
            datetime_to: toDateTime,
			status: status,
			type: type,
			provider_id : providerId,
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
			var buySellCryptoListing = data.buy_sell_crypto_listing;
			
			if (buySellCryptoListing) {
				var newList = [];
		
				$.each(buySellCryptoListing, function(k, v) {

					if(v['provider_id'] == 26){
						provider ="Simplex"
					}
					if(v['provider_id'] == 27){
						provider ="Xanpool"
					}

					var rebuildData = { // construst data int o the same col as header
						date: v['created_at'],
						business_id: v['business_id'],
						fiat_amount: v['fiat_amount'],
						fiat_currency: v['fiat_currency'],
						crypto_amount: v['crypto_amount'],
						wallet_type: v['wallet_type'],
						quote_id: v['quote_id'],
						payment_id: v['payment_id'],
						reference_id: v['reference_id'],
						type: v['type'],
						autosell: v['auto_selling'],
						destination_address: v['destination_address'],
						provider_id: provider,
						status: v['status'],		
					};
					
					newList.push(rebuildData);
				});
			}
		} 
		buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
		pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

		if(buySellCryptoListing){  /// this is to set attr for the row
			$.each(buySellCryptoListing, function(k, v) {
				$('#'+tableId).find('tr#'+k).attr('data-th', v['id']);
			});
		}
	}
	function tableBtnClick(btnId) { // construst sell_crypto api plugin
		var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
		var tableRow = $('#' + btnId).parent('td').parent('tr');	
		var tableId = $('#' + btnId).closest('table');
		if (btnName == 'approve') {
			var id = tableRow.attr('data-th');
			console.log(id);
			return confirmAction(id);
			
		}
    }


	function confirmAction(id) {
        let confirmAction = confirm("Are you sure you want to approve this sell crypto transaction?");

        if (confirmAction) {
			var formData = {
				command: "sellCryptoConfirmation",
				id: id,
			};
			fCallback = reloadApproveList;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);			
          	// alert("Transaction successfully executed");
			//showMessage('Successfully updated.', 'success', 'Update Ticket', 'edit', 'buySellCrypto.php');

			// $.redirect("buySellCrypto.php");
        } 
		
		else {
          	// alert("Transaction cancelled");
        }
    }

	function reloadApproveList(data, message) {
        showMessage('Transaction successfully approved.', 'success', 'Approve Transaction', 'admin', 'buySellCrypto.php');
    }


	function loadSearch(data, message) {
		loadDefaultListing(data, message);
		$('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
		setTimeout(function() {
			$('#searchMsg').removeClass('alert-success').html('').hide();
		}, 3000);
	}

</script>
