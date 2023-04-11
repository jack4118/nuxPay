<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-content marginTopHeader">

				<div class="col-12 pageHeader mb-5 px-0">
					<div class="row d-flex justify-content-between">
						<?php echo $translations["M02038"][$language]; /* Buy/Sell History */ ?>
					</div>
				</div>

				<div class="col-xl-12 px-0" id="searchSection">
					<div class="form-group searchBox seacrhWalletBox">
						<select id="walletType" class="searchDesign" dataname="wallettype" dataType="select">
						</select>
					</div>

					<div class="form-group searchBox">
						<label style="margin:0px"><?php echo $translations["M01805"][$language]; /* Status */ ?>:</label>

						<select id="status" class="searchDesign" dataname="status" dataType="select" style="padding-left: 5px; padding-right: 5px; width: 100px;">
							<option class="" value="" href="javascript:void(0)"><?php echo $translations["M01486"][$language]; /* All */ ?></option>
							<option class="" value="completed" href="javascript:void(0)"><?php echo $translations["M01914"][$language]; /* Completed */ ?></option>
							<option class="" value="cancelled" href="javascript:void(0)"><?php echo $translations["M01915"][$language]; /* Canceled */ ?></option>
							<option class="" value="pending" href="javascript:void(0)"><?php echo $translations["M01485"][$language]; /* Pending */ ?></option>
						</select>
					</div>

					<div class="form-group searchBox" style="">
						<label style="margin:0px"><?php echo $translations["M01024"][$language]; /* Type */ ?>:</label>
						<select class="searchDesign" id="transactionType" style="padding-left: 5px; padding-right: 5px; width: 60px;">
							<option class="" value="" href="javascript:void(0)"><?php echo $translations["M01486"][$language]; /* All */ ?></option>
							<option class="" value="buy" href="javascript:void(0)"><?php echo $translations["M01883"][$language]; /* Buy */ ?></option>
							<option class="" value="sell" href="javascript:void(0)"><?php echo $translations["M01884"][$language]; /* Sell */ ?></option>
						</select>
					</div>

					<div class="form-group searchBox">
						<label class="searchLabel">

							<?php echo $translations["M00602"][$language]; /* From */?>:
						</label>
						<input id="firstDate" type="text" class="searchDesign" />
					</div>

					<div class="form-group searchBox" style="">
						<label class="searchLabel">
							<?php echo $translations["M00603"][$language]; /* To */?>:
						</label>
						<input id="lastDate" type="text" class="searchDesign" />
					</div>

					<!-- <div class="form-group searchBox" style="">
						<label class="searchLabel">
							Provider:
						</label>
						<input id="provider" type="text" class="searchDesign" style="text-align:left !important;"/>
					</div> -->
				</div>

				<div class="col-12 text-center my-5" id="showErrorMsg" style="display: none">
					<div class="row">
						<div class="col-12">
							<img src="<?php echo $sys['source'] == 'FTAG' ?  'images/whitelabel/ftag/no-withdrawal.png' :  'images/nuxPay/newDesign/noWalletIcon.png'?>">
						</div>
						<div class="col-12 mt-3 bigText">

							<?php echo $translations["M01870"][$language]; /* No Transactions */?>
						</div>
					</div>
				</div>

				<div class="col-xl-12 px-0" id="showresultListing" style="display: block;">
					<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
						<div class="table-responsive" id="transactionHistoryListDiv"></div>
						<div class="m-datatable__pager m-datatable--paging-loaded clearfix m-t-rem3">
							<ul class="m-datatable__pager-nav" id="transactionHistoryPager">
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

</body>

</html>

<script>
	var divId = 'transactionHistoryListDiv';
	var tableId = 'transactionHistoryListTable';
	var pagerId = 'transactionHistoryPager';
	var btnArray = {};
	var thArray = Array(
		'<?php echo $translations["M01620"][$language]; /* Date, Time */?>',
		'<?php echo $translations["M01091"][$language]; /* Provider */?>',
		'<?php echo $translations["M01800"][$language]; /* Amount */?>',
		'<?php echo $translations["M01728"][$language]; /* Crypto Amount */?>',
		'<?php echo $translations["M01024"][$language]; /* Type */ ?>',
		'<?php echo $translations["M01805"][$language]; /* Status */ ?>'

	);

	var url = 'scripts/reqPaymentGateway.php';
	var method = 'POST';
	var debug = 0;
	var bypassBlocking = 0;
	var bypassLoading = 0;
	var pageNumber = 1;
	var formData = "";
	var fCallback = "";
	var dropdownFake;
	var status;
	var walletTypeGraph;
	var walletTypeTransaction;
	var buyCryptoStatus = 1;
	var walletType;
	var dataValue;
	var displayName;
	var tableRowDetails = [];
	var symbol_list = [];
	var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';
	var accessToken = "<?php echo $_SESSION['access_token']; ?>";
	var redirectUrl = "<?php echo $_GET['redirectUrl']?>";
	


	$(document).ready(function() {

			if(redirectUrl != ''){
				$.redirect(redirectUrl);
	
			}
			else{
				if(accessToken == '') {
					// No access token, thus don't allow to call backend
					window.ajaxEnabled = false;
					showMessage('<?php echo $translations["M01176"][$language]; /* You don’t have permission to access. */ ?>', 'danger', '<?php echo $translations["M01177"][$language]; /* Access Denied */ ?>', 'times-circle-o', 'login.php');
					return true;
				}

				if (hasChangedPassword == 0) {
					$.redirect('firstTimeLogin.php');
				}

			}

		

		if ('<?php echo $_POST['searchData'] ?>' != "") {
			//            searchCallBack();
		} else {
			formData = {
				command: 'getBuyCryptoHistory',
				page: pageNumber
			};

			fCallback = loadBuyCryptoListing;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		}



		formData = {
			command: 'nuxpaybuysellwallettypeget',
			buyCrypto: buyCryptoStatus
		};
		fCallback = getWalletType;
		ajaxSend("scripts/reqAdvertisement.php", formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		$("#searchSection .searchDesign").change(function() {
			pagingCallBack(pageNumber, loadSearch);
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

			pagingCallBack(pageNumber, loadSearch);
		});

		$('#lastDate').click(function() {
			$('#firstDate').trigger('click');
		});
		$('input[name="start"]').on('apply.daterangepicker', function(ev, picker) {
			$('#firstDate').val(picker.startDate.format('DD/MM/YYYY'));
			$('#lastDate').val(picker.endDate.format('DD/MM/YYYY'));
		});

	});

	$('#walletType').change(function() {
		pagingCallBack(pageNumber, loadSearch);
	});




	function pagingCallBack(pageNumber, fCallback) {

		var searchId = 'searchTransaction';
		var searchData = buildSearchDataByType(searchId);
		var from, to;
		var from = $("#firstDate").val();
		var to = $("#lastDate").val();
		var wallet_type = $('select#walletType option:selected').val();
		var transaction_type = $('select#transactionType option:selected').val();
		var status = $('select#status option:selected').val();


		if ($("#firstDate").val()) {
			// from = dateToTimestamp($("#firstDate").val() + " 00:00:00");
			from = $("#firstDate").val();
			from = moment(from).format('DD/MM/YYYY');
			from = dateToTimestamp(from + " 00:00:00");
		} else {
			from = "";
		}
		if ($("#lastDate").val()) {
			to = $("#lastDate").val();
			to = moment(to).format('DD/MM/YYYY');
			to = dateToTimestamp(to + " 23:59:59");
		} else {
			to = "";
		}

		walletType = $('select#walletType option:selected').val();
		transactionType = $('select#transactionType option:selected').val();

		//		var name = ($("#provider").val()); 

		if (pageNumber > 1) bypassLoading = 1;

		formData = {
			command: 'getBuyCryptoHistory',
			page: pageNumber,
			status: status,
			wallet_type: walletType,
			from: from,
			to: to,
			transaction_type: transactionType,
			//			provider: provider
		};

		if (!fCallback)
			fCallback = loadBuyCryptoListing;

		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	}
	//
	function searchCallBack(pageNumber, fCallback) {

		var searchId = 'searchSection';
		var searchData = JSON.parse('<?php echo $_POST['searchData'] ?>');

		// alert("searchCallBack");


		if (pageNumber > 1) bypassLoading = 1;

		var formData = searchData;
		formData["searchParam"] = "<?php echo $_POST['newSearchVal'] ?>";

		if (formData['from']) {
			$("#firstDate").val(moment.unix(formData['from']).format("DD/MM/YYYY"));
		}

		if (formData['to']) {
			$("#lastDate").val(moment.unix(formData['to']).format("DD/MM/YYYY"));
		}


		if (formData['status'] == 'success') {
			$("#successBtn").addClass("active");
			$("#pendingBtn").removeClass("active");
		} else {
			$("#pendingBtn").addClass("active");
			$("#successBtn").removeClass("active");
		}

		if (!fCallback)
			fCallback = loadBuyCryptoListing;

		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

	function loadBuyCryptoListing(data, message) {

		var tableNo;
		var buyCryptoList = data.data.buy_crypto_list;
		var pageData = data.data;

		if (buyCryptoList && buyCryptoList.length > 0) {
			$('#showErrorMsg').hide();
			$('#showresultListing').show();

			var newList = [];
			tableRowDetails = [];
			$.each(buyCryptoList, function(k, v) {
				var statusCapitalized = '';
				var typeCapitalized = '';

				if (v['status'] == 'completed') {
					statusCapitalized = '<?php echo $translations["M01914"][$language]; /* Completed */ ?>';
				} else if (v['status'] == 'pending') {
					statusCapitalized = '<?php echo $translations["M01485"][$language]; /* Pending */ ?>';
				} else if (v['status'] == 'cancelled') {
					statusCapitalized = '<?php echo $translations["M01915"][$language]; /* Canceled */ ?>';
				}

				if (v['type'] == 'buy') {
					typeCapitalized = '<?php echo $translations["M01883"][$language]; /* Buy */ ?>';
				} else if (v['type'] == 'sell') {
					typeCapitalized = '<?php echo $translations["M01884"][$language]; /* Sell */ ?>';
				}
				var symbols = (v['symbol']) == null ? '' : (v['symbol'].toUpperCase());
				var provider_id = (v['provider_name']) == null ? '' : (v['provider_name']);
				var rebuildData = {

					created_at: dateTimeToDateFormat(v['created_at']),
					//provider: v['provider_name'],
					provider: provider_id,
					amount: v['payment_amount'] + ' ' + (v['payment_currency'].toUpperCase()),
					// cryptoAmount: v['crypto_amount'] + ' ' + (v['symbol'].toUpperCase()),
					cryptoAmount: v['crypto_amount'] + ' ' + symbols,
					type: typeCapitalized,
					status: statusCapitalized 
				};

				newList.push(rebuildData);
			});
		} else {
			$('#showErrorMsg').show();
			$('#showresultListing').hide();
		}

		buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
		pagination(pagerId, pageData.pageNumber, pageData.totalPage, pageData.totalRecord, pageData.numRecord);
		
		  $('#'+tableId).find('tbody tr').each(function(){
            $(this).addClass("removeBackgorundColor");
	    
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

	function capitalize(string) {
		return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
	}

	function dateTimeToDateFormat(dateTimeValue) {
		// Set variable to current date and time
		//		const now = new Date(dateTimeValue);
		return moment(dateTimeValue).format('lll');
	}


	function loadSearch(data, message) {
		loadBuyCryptoListing(data, message);
		$('#searchMsg').addClass('alert-success').html('<span><?php echo $translations["M00334"][$language]; /* Search Successful */ ?>.</span>').show();
		setTimeout(function() {
			$('#searchMsg').removeClass('alert-success').html('').hide();
		}, 3000);
	}

	// function runModal() {
	// 	$('#openCoin').modal();
	// }


	function getWalletType(data, message) {

		if (data.result && dropdownFake != 1) {
			$('#walletType').empty();
			$('#walletType').append('<option value=""> <?php echo $translations["M01486"][$language]; /* All */?> </option>');
			$.each(data.result.coin_data, function(key, val) {
				$('#walletType').append('<option data-image="' + val['image'] + '" value="' + val['symbol'] + '">' + val['display_symbol'] + '</option>')
			});

			dropdownFake = 1;


		}

		function formatState(method) {
			if (!method.id) {
				return method.text;
			}

			var optimage = $(method.element).attr('data-image')
			if (!optimage) {
				return method.text;
			} else {
				var $opt = $(
					'<span><img src="' + optimage + '" class="walletTypeIcon" /> <span style="vertical-align: middle;">' + method.text + '</span></span>'
				);
				return $opt;
			}
		};


		$('#walletType').select2({
			dropdownAutoWidth: true,
			templateResult: formatState,
			templateSelection: formatState
		});
	}

</script>

<style>
	.select2-container--default .select2-selection--single .select2-selection__rendered {
		position: relative;
		padding: 0px 30px 0px 10px;
		line-height: 30px;
	}

	.select2 {
		width: 222px !important;
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
		height: 32px;
	}

	#status, #transactionType {
		-webkit-appearance: none;
    	-moz-appearance: none;
		appearance: none;
		background: url('data:image/svg+xml;charset=utf8,<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" xml:space="preserve"><path d="M7.41,8.59L12,13.17l4.59-4.58L18,10l-6,6l-6-6L7.41,8.59z"/><path fill="none" d="M0,0h24v24H0V0z"/></svg>');
		background-position: center right;
  		background-repeat: no-repeat;
		width: 100%; 
	}

	.searchBox.seacrhWalletBox {
		border: 1px solid #dedede;
		padding: 0px;
		background-color: #fff;
		display: inline-flex;
		align-items: center;
		margin-right: 5px;
		height: 32px;
	}

</style>
