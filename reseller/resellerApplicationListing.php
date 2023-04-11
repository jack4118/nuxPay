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
	<?php include("topbar.php"); ?>
	<?php include("sidebar.php"); ?>
	<div class="content-page">
		<div class="content">
			<div class="container">

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

											<div class="col-md-4 form-group">
												<label class="control-label">
													Reseller Username
												</label>
												<input id="resellerUsername" type="text" class="form-control" dataName="reseller" dataType="text">
											</div>

											<div class="col-md-4 form-group">
												<label class="control-label">
													Reseller Name
												</label>
												<input id="resellerName" type="text" class="form-control" dataName="reseller" dataType="text">
											</div>

											<div class="col-md-4 form-group">
												<label class="control-label">
													Email
												</label>
												<input id="resellerEmail" type="text" class="form-control" dataName="reseller" dataType="text">
											</div>

											<div class="col-md-4 form-group">
												<label class="control-label">
													Mobile Number
												</label>
												<input id="resellerMobileNumber" type="text" class="form-control" dataName="reseller" dataType="text">
											</div>

											<div class="col-md-4 form-group">
												<label class="control-label">
													Site
												</label>
												<input id="site" type="text" class="form-control" dataName="reseller" dataType="text">
											</div>



											<div class="col-md-4 form-group">
												<label class="control-label">
													Distributor Username
												</label>
												<input id="distributorUsername" type="text" class="form-control" dataName="distributor" dataType="text">
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


				<div class="row" style="margin-top: 20px;">
					<div class="col-md-12">
						<div class="p-b-0">
							<form>
								<div id="basicwizard" class="pull-in">
									<div class="tab-content b-0 m-b-0 p-t-0">
										<div id="alertMsg" class="alert" style="display: none;"></div>
										<div id="adminListDiv" class="table-responsive"></div>
										<span id="paginateText"></span>
										<div class="text-center" style="">
											<ul class="pagination pagination-md" id="pagerResellerListing">
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

</body>

</html>

<script>
	var divId = 'adminListDiv';
	var tableId = 'adminListTable';
	var pagerId = 'pagerResellerListing';
	var btnArray = Array('approve');
	var thArray = Array(
		// 'Site',
		'Reseller Username',
		'Reseller Name',
		'Mobile Number',
		'Email',
		'Agent Username',
		'Created Date',
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
	var resellerUsername, resellerName, resellerEmail, resellerMobileNumber, distributorUsername, site, page_size;
	// var reseller, distributor = "";

	$(document).ready(function() {

		var tableNo = '';

		var formData = {
			command: 'resellerApplicationListing',
			reseller: resellerUsername,
			reseller_name: resellerName,
			reseller_email: resellerEmail,
			reseller_number: resellerMobileNumber,
			site: site,
			distributor: distributorUsername,


		};
		fCallback = loadDefaultListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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
	});

	function pagingCallBack(pageNumber, fCallback) {

		resellerUsername = $('#resellerUsername').val();
		resellerName = $('#resellerName').val();
		resellerEmail = $('#resellerEmail').val();
		resellerMobileNumber = $('#resellerMobileNumber').val();
		site = $('#site').val();
		distributorUsername = $('#distributorUsername').val();



		// distributor      = $('#distributor').val();


		if (pageNumber > 1) bypassLoading = 1;


		var formData = {
			command: "resellerApplicationListing",
			page: pageNumber,
			reseller: resellerUsername,
			reseller_name: resellerName,
			reseller_email: resellerEmail,
			reseller_number: resellerMobileNumber,
			site: site,
			distributor: distributorUsername

		};

		if (!fCallback)
			fCallback = loadDefaultListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

	function loadDefaultListing(data, message) {
		var resellerApplicationListing = data.reseller_application_listing;
		var tableNo;

		if (resellerApplicationListing) {
			var newList = [];
			$.each(resellerApplicationListing, function(k, v) {

				var rebuildData = {
					// reseller_source: v['source'],
					reseller_username: v['reseller_username'],
					reseller_name: v['name'],
					reseller_mobileNumber: v['phone_number'],
					reseller_email: v['email'],
					reseller_distributorName: v['distributor_username'],
					reseller_created_date: v['created_at'],

				};
				newList.push(rebuildData);
			});
		} else {
			newList = "";
			message = "No result.";
		}

		// buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
		// pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

		buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
		pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

		if (resellerApplicationListing) {
			$.each(resellerApplicationListing, function(k, v) {
				$('#' + tableId).find('tr#' + k).attr('data-th', v['email']);
				$('#' + tableId).find('tr#' + k).attr('data-source', v['source']);
				
			});

		}

	}

	function tableBtnClick(btnId) {
		console.log('button click');
		var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
		var tableRow = $('#' + btnId).parent('td').parent('tr');
		var tableId = $('#' + btnId).closest('table');

		if (btnName == 'approve') {
			var email = tableRow.attr('data-th');
			var source = tableRow.attr('data-source');
			var formData = {
				command: "adminResellerApprove",
				reseller_email: email,
				source: source,
			};
			
			console.log(formData);


			fCallback = loadResellerApprove;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		}
	}

	function loadSearch(data, message) {
		loadDefaultListing(data, message);
		$('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
		setTimeout(function() {
			$('#searchMsg').removeClass('alert-success').html('').hide();
		}, 3000);
	}

	function loadResellerApprove(data, message) {
		showMessage(message, 'success', 'Approval Success', '', 'resellerApplicationListing.php');
	}

</script>
