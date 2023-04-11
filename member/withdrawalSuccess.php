<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<!-- <div class="m-subheader marginTopHeader">
				<div class="d-flex align-items-center">
					<div class="mr-auto">
						<div class="col-12">
							<div class="row">
								<div class="dashboardTitleWidth">
									<img src="images/dashboard/transactionIcon.svg" style="width: 30px; margin-top: 5px;" />
								</div>
								<div class="dashboardTitleWidth2">
									<div class="row">
										<div class="col-12 dashboardTitle">
											Invoice Listing
										</div>
										<div class="col-12 dashboardTitleDesc">
											You can view all the invoices here for request fund
										</div>
									</div>
								</div>
							</div>      
						</div>
					</div>  
				</div>
			</div> -->



			<div class="m-content marginTopHeader">

                <div class="col-12">
                	<div class="row">
                		<div class="col-12 text-center">
                			<img src="<?php echo $sys['source'] == 'FTAG' ?  'images/whitelabel/ftag/API-key.png' :  'images/nuxPay/newDesign/withdrawalSuccessIcon.png'?>">
                		</div>
                		<div class="col-12 text-center bigText mt-2">
                			Your withdrawal has been confirmed.
                		</div>
                	</div>
                </div>

                <div class="col-12 mt-3"  style="<?php echo $_POST['withdraw_type'] == 'withholding' ?  'display:none;' : 'display:block;'?>">
                	<div class="m-portlet">
                		<div class="m-portlet__body">
                			<div class="row">
                				<div class="col-12">
                					<div class="row justify-content-center">
                						<div class="col-2 text-right boldTxt">
                							Transaction ID:
                						</div>
                						<div class="col-3" id="txID">
                							-
                						</div>
                						<div class="col-1" data-fullTxt="0x4e6fdc0e3d68c65d13d74f9fd28c4c2bfbfa0e">
                							<a href="javascript:;" id="modalTxID">
                								<img src="images/dashboard/newCopyIcon.png" style="width: 23px;">
                							</a>
                						</div>
                					</div>
                				</div>
                				<div class="col-12 mt-3">
                					<div class="row justify-content-center">
                						<div class="col-2 text-right boldTxt">
                							Actual Amount:
                						</div>
                						<div class="col-4" id="actualAmountID">
                							0 USDT
                						</div>
                					</div>
                				</div>
                				<div class="col-12 mt-3">
                					<div class="row justify-content-center">
                						<div class="col-2 text-right boldTxt">
                							Miner Fee:
                						</div>
                						<div class="col-4" id="minerFeeAmountID">
                							0 USDT
                						</div>
                					</div>
                				</div>
                				<div class="col-12 mt-3">
                					<div class="row justify-content-center">
                						<div class="col-2 text-right boldTxt">
                							Nett Amount:
                						</div>
                						<div class="col-4" id="nettAmountID">
                							0 USDT
                						</div>
                					</div>
                				</div>
                				<div class="col-12 mt-3">
                					<div class="row justify-content-center">
                						<div class="col-2 text-right boldTxt">
                							Withdraw to:
                						</div>
                						<div class="col-3" id="destinationAdd">
                							-
                						</div>
                						<div class="col-1" data-fullTxt="0x4e6fdc0e3d68c65d13d74f9fd28c4c2bfbfa0e">
                							<a href="javascript:;" id="modalDestinationAdd">
                								<img src="images/dashboard/newCopyIcon.png" style="width: 23px;">
                							</a>
                						</div>
                					</div>
                				</div>
                			</div>
                		</div>
                	</div>
                </div>

                <div class="col-12 mt-2 text-center">
            	<button onclick="window.location.href='withdrawalListing.php'" id="nextBtn" class="btn searchBtn" type="button" data-toggle="modal" data-target="#twoFactorModal">View Withdrawal History</button>
                </div>
			</div>

		</div>

	</div>
	<?php include 'footerDashboard.php'; ?>
</div>




</div>



<?php include 'sharejsDashboard.php'; ?>

<script src="js/jquery.qrcode.js" type="text/javascript"></script>

</body>
</html>

<script>
	var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
	var withdraw_type 	= "<?php echo $_POST['withdraw_type'] ?>";

	$(document).ready(function(){

		var getSenderAdd = $("#senderAdd").text().trim();
		$("#senderAdd").text(encrypt(getSenderAdd));

		var getDestinationAdd = $("#destinationAdd").text().trim();
		$("#destinationAdd").text(encrypt(getDestinationAdd));
		
		if(withdraw_type != 'withholding'){
				formData = {
					command : 'getWithdrawalDetails',
					withdrawal_id : '<?php echo $_POST['withdrawal_id']?>'


				};
				fCallback = loadGetWithdrawalDetails;
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);	
		}
	
		
	});
	
	function encrypt(w) {
        return w.substring(0, 6)+"..."+w.substr(w.length-6);
    }
	
	function loadGetWithdrawalDetails(data, message){
		var obj = data.data;
		console.log(data);
		if(data.code == 1){
			console.log(obj);
			$('#txID').html(encrypt(obj.transaction_hash, 10));
			$('#actualAmountID').html(obj.withdrawal_amount + ' ' + obj.symbol.toUpperCase());
			$('#minerFeeAmountID').html(obj.miner_fee + ' ' + obj.symbol.toUpperCase());
			$('#nettAmountID').html(obj.amount_receive +  ' ' + obj.symbol.toUpperCase());
			$('#destinationAdd').html(encrypt(obj.destination_address, 10));
			$('#modalTxID').attr('data-id', obj.transaction_hash);
			$('#modalDestinationAdd').attr('data-id', obj.destination_address);
			
		}
	}
	
	$('#modalTxID').click(() =>
		copyToClipboard($('#modalTxID').attr("data-id"))
	);

	$('#modalDestinationAdd').click(() =>
		copyToClipboard($('#modalDestinationAdd').attr("data-id"))
	);

	function encrypt(w, n) {
		return w.substring(0, n)+"..."+w.substr(w.length-n);
	} 

	function copyTxt(n) {
		var text = $(n).parent().attr('data-fullTxt');

		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val(text).select();
		document.execCommand("copy");
		$temp.remove();
	}

	function copyToClipboard(val){
		console.log('var');
		console.log(val);
        var dummy = document.createElement("input");
        document.body.appendChild(dummy);
        dummy.setAttribute("id", "dummy_id");
        document.getElementById("dummy_id").value=val;
        dummy.select();
        document.execCommand("copy");
        document.body.removeChild(dummy);
        swal.fire({
            position:"center",
            type:"success",
            title:"<?php echo $translations["M00137"][$language]; /* Copied to clipboard  */?>",
            showConfirmButton:!1,
            timer:1000
        })
    }
   

</script>
