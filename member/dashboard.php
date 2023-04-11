<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>


<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default dashboardPage">

    
    <div class="m-grid m-grid--hor m-grid--root m-page">

        <?php include 'headerDashboard.php'; ?>

        <!-- swap modal --> 
        <div class="modal fade systemMsg" id="swapCanvas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
            <div class="modal-dialog modal-lg" role="document" >
                <div class="modal-content" >
                    <div class="modal-header text-center pb-3" style="border-bottom: 0.5px solid grey !important;margin-left: 10px;margin-right: 10px;">
                        <h5>Swap Coins</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body text-center py-0" >
                        <div id="canvasAlertIcon" class=""></div>
                        <div class="modal-title my-2" id="exampleModalLabel" style="font-size:17px"></div>
                        <div id="canvasAlertMessage" class="f-14" >
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-12 buildBalanceSymbolDiv">
                                            <img id="swapCoinImageFrom" src="https://s3-ap-southeast-1.amazonaws.com/com.thenux.image/assets/xchange/currency/cryptocurrency/tetherusd.png" style="width: 50px; ">
                                        </div>
                                        <div class="col-12">
                                            <div class="align-self-center text-center swapWalletDropdown" style="margin-left: 0px; margin-top: 10px;">          
                                                <select id="coinTypeDropdownFrom" class="full-width selectValue" ></select>
                                            </div>
                                        </div>
                                        <div class="col-12" style="margin-top: 5px;font-size: 10px;">Balance:</div>
                                        <div id="swapCoinBalanceFrom" class="col-12" style="margin-top: 5px;"></div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div style="margin-top: 40px;">
                                        <!-- <div>Swap To:</div>
                                        <div>Rate</div> -->
                                        <br><div id="swapRate"></div>
                                    </div>

                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-12 buildBalanceSymbolDiv" >
                                            <img id="swapCoinImageTo" src="https://s3-ap-southeast-1.amazonaws.com/com.thenux.image/assets/xchange/currency/cryptocurrency/tetherusd.png" style="width: 50px; ">
                                        </div>
                                        <div class="col-12">
                                            <div class="align-self-center text-center swapWalletDropdown" style="margin-left: 0px; margin-top: 10px;">          
                                                <select id="coinTypeDropdownTo" class="full-width selectValue"></select>
                                            </div>

                                        </div>
                                        <div class="col-12" style="margin-top: 5px;font-size: 10px;">Estimate to get:</div>
                                        <div id="swapCoinBalanceTo" class="col-12" style="margin-top: 5px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="canvasFooter" class="modal-footer text-center">
                        <button id="swapContinueBtn" class="btn primaryBtn" type="button" style="">Confirm</button>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- swap modal END --> 
        <!-- swap confirmation modal --> 
        <div class="modal fade systemMsg" id="swapConfirmationCanvas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
            <div class="modal-dialog modal-md" role="document" >
                <div class="modal-content" >
                    <div class="modal-header text-center pb-3" style="border-bottom: 0.5px solid grey !important;margin-left: 10px;margin-right: 10px;">
                        <h5>Swap Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body text-center py-0" >
                        <div id="canvasAlertIcon" class=""></div>
                        <div class="modal-title my-2" id="exampleModalLabel" style="font-size:17px"></div>
                        <div id="canvasAlertMessage" class="f-14" >
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-12">
                                    <div class="row" style="padding-top: 10px;">
                                        <div class="col-2" style="text-align: left;">From:</div>
                                        <div id="swapConfirmFrom" class="col-10" style="text-align: left;"><img style="width:36px;padding-right: 10px;" src=""><span></span></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row" style="padding-top: 10px;">
                                        <div class="col-2" style="text-align: left;">To:</div>
                                        <div id="swapConfirmTo" class="col-10" style="text-align: left;"><img style="width:36px;padding-right: 10px;" src=""><span></span> </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row" style="padding-top: 10px;">
                                        <div id="" class="col-2" style="text-align: left;">Rate:</div>
                                        <div id="swapConfirmRate" class="col-10" style="text-align: left;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="canvasFooter" class="modal-footer text-center">
                        <button id="swapConfirmationBtn" class="btn primaryBtn" type="button" style="">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- swap confirmation modal END --> 
        <!-- swap confirmed modal --> 
        <div class="modal fade systemMsg" id="swapConfirmedCanvas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center pb-3">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body text-center py-0">
                        <i class="fa fa-3x fa-check-circle" style="font-size:80px;color:#51c2db;" ></i>
                        <div class="modal-title my-2" id="exampleModalLabel" style="font-size:17px;border-bottom: 0.5px solid grey !important;padding-bottom: 20px;">Your Swap Coins has been successfully submitted and processed.</div>
                        <div id="" class="f-14">
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-12">
                                    <div class="row" style="padding-top: 10px;">
                                        <div class="col-2" style="text-align: left;">From:</div>
                                        <div id="swapConfirmedFrom" class="col-10" style="text-align: left;"><img style="width:36px;padding-right: 10px;" src=""><span></span></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row" style="padding-top: 10px;">
                                        <div class="col-2" style="text-align: left;">To:</div>
                                        <div id="swapConfirmedTo" class="col-10" style="text-align: left;"><img style="width:36px;padding-right: 10px;" src=""><span></span> </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row" style="padding-top: 10px;">
                                        <div id="" class="col-2" style="text-align: left;">Rate:</div>
                                        <div id="swapConfirmedRate" class="col-10" style="text-align: left;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="canvasFooter" class="modal-footer text-center">
                        <a id="canvasCloseBtn" class="waves-effect waves-light btn m-btn--pill m-btn--air  btn-outline-secondary btn-sm m-btn m-btn--custom theme-button" style="color:#000;" data-dismiss="modal" role="button"><?php echo $translations["M01246"][$language]; /* Close */ ?></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- swap confirmation modal END --> 
       

        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            
            <!-- <div class="m-subheader marginTopHeader">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <div class="col-12">
                            <div class="row">
                                <div class="dashboardTitleWidth">
                                    <img src="images/dashboard/houseIcon.svg" style="width: 30px; margin-top: 5px;" />
                                </div>
                                <div class="dashboardTitleWidth2">
                                    <div class="row">
                                        <div class="col-12 dashboardTitle">
                                            Dashboard
                                        </div>
                                        <div class="col-12 dashboardTitleDesc">
                                            To view and analysis payment activities from your customers.
                                        </div>
                                    </div>
                                </div>
                            </div>      
                        </div>
                    </div>  
                </div>
            </div> -->

            <div class="m-content marginTopHeader">

                <div class="col-12 pageHeader mb-5 px-0">                    
					<?php echo $translations["M01537"][$language]; /* Dashboard  */?>
                </div>

                <div class="col-12">
                	<div class="row">

                        <div id="shareDiv" class="col-12" >
                            <div class="row">
                                <div class="col-6 px-0 ">
                                    <div class="col-12 px-0 bigText">
                    					<?php echo $translations["M01908"][$language]; /* Your Receive Link  */?>
                                    </div>
                                    <div class="col-12 px-0 smallTxt">
                    					<?php echo $translations["M01909"][$language]; /* Share this link to a friend to receive fund  */?>
                                    </div>
                                </div>
                            </div>

                           

                            <div class="col-12 px-0" style="margin-bottom: 40px;">

                                <div class="row" style="">

                                    <div class="input-group" style="width: 360px;">
                                        <input style="background-color: white;" id="ownReceiveLink" type="text" class="form-control" placeholder="" aria-describedby="basic-addon2" >
                                        <div class="input-group-append">
                                            <span style="background: #51C2DB; color: #FFF; cursor: pointer;" id="copyBtn" class="input-group-text copyBtnDesign" id="basic-addon2"><img src="images/qrImg/copyIcon.svg" width="16px" style="margin-right: 6px" /> <?php echo $translations["M01590"][$language]; /* Copy */?></span>
                                        </div>
                                    </div>

                                    <div style="margin-top: 10px; padding-left: 10px; padding-right: 10px;">
                                        <!-- Facebook -->
                                        <a id="FB" target="_blank"  href=""><img src="images/dashboard/share/fb.png" style="width:25px;height:25px;"> </a>
                                        <!-- Twitter -->
                                        <a id="TW" target="_blank" href=""><img src="images/dashboard/share/tw.png" style="width:25px;height:25px;"> </a>
                                        <!-- Whatsapp -->
                                        <a id="WS"target="_blank" href="" data-action="share/whatsapp/share"><img src="images/dashboard/share/wa.png" style="width:25px;height:25px;"> </a>
                                        <!-- Linkedin -->
                                        <a id="LI"target="_blank" href=""><img src="images/dashboard/share/in.png" style="width:25px;height:25px;"> </a>
                                        <!-- Telegram -->
                                        <a id="TG"target="_blank" href=""><img src="images/dashboard/share/tg.png" style="width:25px;height:25px;"> </a>
                                    </div>

                                </div>
                                
                            </div>

                        </div>

                        <div class="col-12 px-0 bigText" style="margin-bottom:25px;">
                            <?php echo $translations["M02030"][$language]; /* Reports Overview  */?>
                        </div>

                        <div class="col-12" style="margin-bottom: 25px; padding: 0;">
                            <div class="report-top-container">
                                <div class="p-0">
                                    <div class="report-child-container">
                                        <img src="images/dashboard/noOfTxn.png" alt="-" width="40" height="40">
                                        <div class="report-child-item">
                                            <span class="report-small-title">
                                                <?php echo $translations["M02031"][$language]; /* Number of Transactions  */?>
                                            </span>
                                            <span class="report-bold-text" id="numOfTx">0</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-0">
                                    <div class="report-child-container">
                                        <img src="images/dashboard/grossSales.png" alt="-" width="40" height="40">
                                        <div class="report-child-item">
                                            <span class="report-small-title">
                                                <?php echo $translations["M02032"][$language]; /* Gross Sales  */?>
                                            </span>
                                            <span class="report-bold-text" id="grossSales">0.00 USD</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-0">
                                    <div class="report-child-container">
                                        <img src="images/dashboard/netSales.png" alt="-" width="40" height="40">
                                        <div class="report-child-item">
                                            <span class="report-small-title">
                                                <?php echo $translations["M02033"][$language]; /* Net Sales  */?>
                                            </span>
                                            <span class="report-bold-text" id="netSales">0.00 USD</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 dashboardBox1" style="margin-bottom: 30px;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="dashboardBoxWidth3 align-self-center text-center" id="salesDateOption">
		                				    <select id="salesDateOptionContainer" class="full-width selectValue">
                                                <option value="daily"><?php echo $translations["M02034"][$language]; /* Daily */?></option>
                                                <option value="weekly"><?php echo $translations["M02035"][$language]; /* Weekly */?></option>
                                                <option value="monthly"><?php echo $translations["M02036"][$language]; /* Monthly */?></option>
                                                <option value="yearly"><?php echo $translations["M02037"][$language]; /* Yearly */?></option>
                                            </select>
			                            </div>
                                    </div>
                                </div>
                                <div class="col-12 px-0">
		                			<hr class="dashboardHR">
		                		</div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 dashboardBoxLeft">
		                					<div class="row amChartSize" style="width: 100%; height: 100%; margin: 0;">
		                						<div class="col-12" id="salesChartDiv"></div>
		                					</div>
		                				</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                		<div class="col-12 px-0 bigText" style="margin-bottom: 25px">                            
							<?php echo $translations["M01612"][$language]; /* Payment Received  */?>
                        </div>
                        <div class="col-12 dashboardBox1">
                			<div class="row">
                				<div class="col-12">
                					<div class="row">
		                				<div class="dashboardBoxWidth2 align-self-center text-center">
		                					<div style="display: flex;">
	                						<input id='dateSelect' type='text' name="dateSelectOption" class="form-control dateInput" placeholder="Select date" autoComplete = "false" readonly />
	                						<i class="fa fa-angle-down graphDropdownArrow" aria-hidden="true"></i>
	                						</div>

                							<input id='date' type='text' dataName="date_search" dataType="singleDateRange" class="form-control dateHide" placeholder="Select date" autoComplete = "off" passwo />
                						</div>
			                            <div class="dashboardBoxWidth3 align-self-center text-center walletTypeDropdown">
		                					<select id="walletDropdownGraph" class="full-width selectValue"></select>
			                            </div>
                					</div>
                				</div>
                				<div class="col-12 px-0">
		                			<hr class="dashboardHR">
		                		</div>
		                		<div class="col-12">
		                			<div class="row">
		                				<div class="col-12 dashboardBoxLeft">
		                					<div class="row amChartSize" style="width: 100%; height: 100%; margin: 0;">
		                						<div class="col-12" id="chartdiv"></div>
		                					</div>
		                				</div>
		                				<!-- <div class="col-md-4 col-12 dashboardBoxRight">
		                					<div class="row">
		                						<div class="col-12">
		                							<div class="row">
		                								<div class="col-12 dashboardMiniTitle">
		                									Total Transaction
		                								</div>
		                								<div class="col-12 dashboardMiniTotal">
		                									<span id="totalTransaction"></span>
		                								</div>
		                							</div>
		                						</div>

		                						<div class="col-12" style="margin-top: 20px;">
		                							<div class="row">
		                								<div class="col-12 dashboardMiniTitle">
		                									Total Transaction Volume
		                								</div>
		                								<div class="col-12 dashboardMiniTotal">
		                									<span id="totalTransVol"></span> <span class="currencyUnit"></span>
		                								</div>
		                							</div>
		                						</div>

		                						<div class="col-12" style="margin-top: 20px;">
		                							<div class="row">
		                								<div class="col-12 dashboardMiniTitle">
		                									Payout to Destination Address
		                								</div>
		                								<div class="col-12 dashboardMiniTotal">
		                									<span id="payoutAmount"></span> <span class="currencyUnit"></span>
		                								</div>
		                							</div>
		                						</div>

		                						<div class="col-12 btnPadding" style="margin-top: 20px" id="goToTransactionPage">
		                							<button type="button" class="btn btnView">View Details</button>
		                						</div>


		                					</div>
		                				</div> -->
		                			</div>
		                		</div>

                			</div>
                		</div>

                        <!-- <div class="col-12 mt-5">
                            <div class="row">
                                <div class="col-6 px-0 ">
                                    <div class="col-12 px-0 bigText">
                                        
    									<?php echo $translations["M01614"][$language]; /* My Wallet */?>
                                    </div>
                                   
                                </div>
                                <div class="col-6" style="text-align: right;">
                                    <button id="swapBtn" class="btn primaryBtn" type="button" style="margin-left: 5px; width: 140px;">Add Wallet</button>
                                </div>
                                <div class="col-12 dashboardBox1" style="margin-top: 20px;" id="walletAsset">
                                    <div class="row">
                                        
										<div class="col-12">
											<div class="row" id="buildWalletBalance" >
												<div class="col-12 px-0 newsLastHR">
													<hr class="dashboardHR">
												</div>
											</div>
											 <div class="row"  >
												<div class="col-12" id="mobileBuildWalletBalance">
												 </div>
												<div class="col-12 px-0 newsLastHR">
													<hr class="dashboardHR">
												</div>
											</div>

										</div>
                                    
                                    </div>
                        	    </div>

                            </div>
                        </div> -->
                   
                </div>
                               
            </div>  
</div>
</div>
</div>
   

    <?php include 'footerDashboard.php'; ?> 

</div>

<?php include 'sharejsDashboard.php'; ?>
<script src="js/jquery.qrcode.js" type="text/javascript"></script>

</body>


</html>

<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<script>

	var url             = 'scripts/reqDashboard.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = ""; 
    var firstTime       = "<?php echo $_POST['firstTime']; ?>";
    var walletTypeGraph;
    var walletTypeTransaction;
    var walletType;
    var dropdownFake;
    var dataValue;
    var displayName;
    var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';
	var checkWalletStatus = 1;
    var swapReferenceID;
    var salesChart = null;

    var walletBalance;

    var ownReceiveLink = '<?php echo $_SESSION['receive_link']; ?>';

    if (hasChangedPassword == 0){
		$.redirect('firstTimeLogin.php');
    }
    
    if (hasChangedPassword == 2){
        
        if(!document.cookie.includes('firstLogin=visited')) {
            $.redirect("firstTimeLogin.php");
        } 
    }
    

    $(document).ready(function(){
		 $('[data-toggle="tooltip1"]').tooltip();
		 $('[data-toggle="tooltip2"]').tooltip();
		

        $("body").click(function(){
            if ($('.daterangepicker').css('display') == 'block') {
                if ($(window).width() >= 1200) {
                   $(".daterangepicker").css("top", "930px");
                   $(".daterangepicker").css("left", "310px");
               }
              $(".dashboardBoxWidth2 ").addClass("selectBarActive");
          } else if ($('.daterangepicker').css('display') == 'none'){
            $(".dashboardBoxWidth2 ").removeClass("selectBarActive");
          }
        });

    	formData  = {
			// command: 'getWalletType'
			command: 'getWalletBalance',
			wallet_status: checkWalletStatus
        };
        fCallback = getWalletType; 
        ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // formData = {
        //     command: 'getWalletBalance',
		// 	wallet_status: checkWalletStatus,
        //     setting_type : 'both'
        //     // THIS PART NEED TO EDIT IN API
        // };
        // fCallback = getWalletBalance;
        // ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        

        runNewsList();

    	var start = moment().subtract(6, 'days');
        var end = moment();

        // $('#dateSelect').val("Last 7 Days");
        $('#dateSelect').val("<?php echo $translations["M01613"][$language]; /* Last 7 Days */?>");

        $('#date').daterangepicker({
            buttonClasses: ' btn',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',
            autoUpdateInput: true,
            startDate: start,
            endDate: end,
            autoApply: true,
            locale: {
              format: 'DD/MM/YYYY'
            },
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, function(start, end, label) {
            var startTime = start.format('DD/MM/YYYY');
            var endTime = end.format('DD/MM/YYYY');
            $('#date').val(startTime+ " - " + endTime);

            if (label=="Custom Range") {
                $('#dateSelect').val(startTime+ " - " + endTime);

            }else{
                $('#dateSelect').val(label);
            }
            dataValue = $('#date').val();
            runGraphData(dataValue);


        });

        // Sales Graph
        requestSalesGraphData('daily');
        requestOverallSalesData();
        $('#salesDateOptionContainer').select2({
            dropdownAutoWidth : true,
            minimumResultsForSearch: Infinity,
        });
        $('#salesDateOptionContainer').change(function(){
    		salesDate = $('select#salesDateOptionContainer option:selected').val();
            requestSalesGraphData(salesDate);
    	});

        $("#swapBtn").click(function(){
            // loadSwapModal();
            $.redirect('settingsAddWalletCurrency.php');
        });
        $("#swapConfirmationBtn").click(function(){
            confirmSwap();
        });

        

        $('#dateSelect').click(function() {

            
          $('#date').trigger('click');

        });

        $('.graphDropdownArrow').click(function() {
          $('#date').trigger('click');
        });
        

    	$('#viewAllAddress').click(function(){
    		$.redirect("paymentGatewayAddressList.php", {
				walletType : walletType,
                displayName : displayName
			});
    		
    	});

        $('#selectWalletType').click(function(){
            $.redirect("transactionHistory.php", {
                walletType : walletTypeTransaction
            });
            
        });

    	$('#walletDropdownGraph').change(function(){
    		walletTypeGraph = $('select#walletDropdownGraph option:selected').val();
    		dataValue = $('#date').val();
    		runGraphData(dataValue);
    	});

    	$('#walletDropdown').change(function(){
    		walletType = $('select#walletDropdown option:selected').val();
            displayName = $('select#walletDropdown option:selected').attr('dataName');
    		runAddressData();
    	});

    	$('#transactionDropdown').change(function(){
    		walletTypeTransaction = $('select#transactionDropdown option:selected').val();
    		runTransactionList();
    	});
    	
        $('#goToTransactionPage').click(function()
        {
            $.redirect('transactionHistory.php', {walletType : walletTypeGraph});
        });

        $('#coinTypeDropdownFrom').select2({
            dropdownAutoWidth : true,
            //templateResult: formatState,
            //templateSelection: formatState
        }).on('change', function (e) {



            $("#swapCoinImageFrom").attr("src",$(this).find(':selected').data('image'));
            swapOptionChanged();
            
        });
        $('#coinTypeDropdownTo').select2({
            dropdownAutoWidth : true,
            //templateResult: formatState,
            //templateSelection: formatState
        }).on('change', function (e) {
            
            
            swapOptionChanged();
            
        });

        $("#swapContinueBtn").click(function(){
            
            $("#swapCanvas").modal("toggle");
            $("#swapConfirmationCanvas").modal("toggle");


            $("#swapConfirmRate").text($("#swapRate").text());
            $("#swapConfirmFrom").children('img').attr('src', $("#swapCoinImageFrom").attr("src"));
            $("#swapConfirmTo").children('img').attr('src', $("#swapCoinImageTo").attr("src"));
            
            $("#swapConfirmFrom").children('span').text($("#swapCoinBalanceFrom").html());
            $("#swapConfirmTo").children('span').text($("#swapCoinBalanceTo").html());


        });

        if(ownReceiveLink!="") {
            $('#ownReceiveLink').val(ownReceiveLink);
            $('#LI').attr("href", "https://www.linkedin.com/sharing/share-offsite/?url="+ownReceiveLink+""); 
            $('#TW').attr("href", "http://twitter.com/share?text=Visit the link &url="+ownReceiveLink+"");  
            $('#FB').attr("href", "http://www.facebook.com/sharer.php?u="+ownReceiveLink+"");    
            $('#WS').attr("href","https://wa.me/?text="+ownReceiveLink+""); 
            $('#TG').attr("href", "https://t.me/share/url?url="+ownReceiveLink+"");  
            $('#shareDiv').show();

            $("#copyBtn").click(function(){        
                copyToClipboard(ownReceiveLink);
            });
            $("#ownReceiveLink").click(function(){       
                copyToClipboard(ownReceiveLink);
            });

        } else {
            $('#shareDiv').hide();
        }
        
    });


    function copyToClipboard(val){
        var dummy = document.createElement("input");
        document.body.appendChild(dummy);
        // $(dummy).css('display','none');
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

    function confirmSwap(){



        formData  = {
            command: 'swap',
            from_wallet_type: $("#coinTypeDropdownFrom").val(),
            to_wallet_type: $("#coinTypeDropdownTo").val(),
            reference_id : swapReferenceID,
        };
        
        fCallback = confirmSwapCallback; 
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    function confirmSwapCallback(data, messag){
        
        if(data.message == "SUCCESS"){
            $("#swapConfirmationCanvas").modal("toggle");
            $("#swapConfirmedCanvas").modal('toggle');


            $("#swapConfirmedRate").text(data.data.exchangeRate);

            $("#swapConfirmedFrom").children('img').attr('src', $("#swapCoinImageFrom").attr("src"));
            $("#swapConfirmedTo").children('img').attr('src', $("#swapCoinImageTo").attr("src"));
            
            $("#swapConfirmedFrom").children('span').text(data.data.fromAmount);
            $("#swapConfirmedTo").children('span').text(data.data.toAmount);

            
            
            

        }
    }

    function swapOptionChanged(){

        var calling = true;
        if($("#coinTypeDropdownFrom").val() == $("#coinTypeDropdownTo").val()){
            $("#coinTypeDropdownTo > option").each(function() {
                if($("#coinTypeDropdownFrom").val() != $(this).val()){
                    
                    $(this).prop('selected','selected');
                    $('#coinTypeDropdownTo').trigger('change');
                    
                    return false;
                }
            });
            calling = false;
            
        }
        $("#swapCoinImageTo").attr("src",$("#coinTypeDropdownTo").find(':selected').data('image'));
        $("#swapCoinImageFrom").attr("src",$("#coinTypeDropdownFrom").find(':selected').data('image'));

        var fromSymbol = $("#coinTypeDropdownFrom").find(':selected').html();

        $.each(walletBalance, function(key, val){
            
            var name = val['name'];
            var currency_id = val['currency_id'];
            var symbol = val['symbol'];
            var balance = val['balance'];

            if (fromSymbol == symbol) {
                $("#swapCoinBalanceFrom").text(balance + " " + symbol);
            }

        });
        

        if(calling){
            
            getSwapRate();
        }

    }

    function getSwapRate(){

        
        formData  = {
            command: 'swapEstimateRate',
            from_wallet_type: $("#coinTypeDropdownFrom").val(),
            to_wallet_type: $("#coinTypeDropdownTo").val(),
        };
        
        fCallback = loadSwapRate; 
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadSwapRate(data, message){
        
        swapReferenceID = data.data.referenceID;

        var fromSymbol = data.data.fromSymbol;
        var toSymbol = data.data.toSymbol;

        $("#swapRate").text("1 " + fromSymbol + " : " + data.data.exchangeRate + " " + toSymbol);
        $("#swapCoinBalanceTo").text(data.data.toAmount + " "+ toSymbol);

    }
    
    function loadSwapModal(){

        $('#coinTypeDropdownFrom').empty();
        $('#coinTypeDropdownTo').empty();

        var previousBalance = 0;
        var biggestBalance = 0;
        var selected = '';
        var defaultFrom = '';
        var defaultBalance = '';

        $.each(walletBalance, function(key, val){
            
            var name = val['name'];
            var currency_id = val['currency_id'];
            var symbol = val['symbol'];
            var image = val['image'];
            var balance = val['balance'];
            //var biggestBalance = 0;
            selected = '';

            //if(balance > 0){
            // hardcode accepted coin for now
            if(symbol.toUpperCase() == "ETH" || symbol.toUpperCase() == "BTC" || symbol.toUpperCase() == "USDT"){

                biggestBalance = Math.max(balance, biggestBalance);
                if (biggestBalance == balance) {
                    selected = "selected";
                    defaultSymbol = symbol.toUpperCase();
                    defaultBalance = biggestBalance;
                    defaultImage = image;
                }
            
                $('#coinTypeDropdownFrom').append('<option dataName="'+ currency_id +'" data-image="'+ image +'" value="'+ currency_id +'" '+selected+'>' + symbol.toUpperCase() + '</option>');

                $("#swapCoinBalanceFrom").text(defaultBalance + " " + defaultSymbol);
                $("#swapCoinImageFrom").attr("src", defaultImage);

                $('#coinTypeDropdownTo').append('<option dataName="'+ currency_id +'" data-image="'+ image +'" value="'+ currency_id +'">' + symbol.toUpperCase() + '</option>');
            }

            previousBalance = balance;
            
        }); 
        
        swapOptionChanged();       

        $('#swapCanvas').modal('toggle');

        //$("#swapConfirmedCanvas").modal('toggle');

    }

    function getWalletBalance(data, message){
        walletBalance = data.data.wallet_list;
        var buildBalance = '';
        var mobileBuildBalance = '';
		var withholdingBalanceTxt = '<?php echo $translations["M01988"][$language]; /* Withholding Balance  */?>';
		
		var num = 0;
        if (walletBalance != "") {
			
//    		$('#buildWalletBalance').show(); ///!!!! NEED TO UNCOMMENT LATER
			    buildBalance += '<div class="col-12 dashboardNewsBox" style="cursor:default;">';
    			buildBalance +=	'<div class="row">';
	    		buildBalance +=	'<div class="col-xl-8 col-md-7 col-2 buildBalanceSymbolDiv" >';
	    		buildBalance +=	'<span>Currency</span>';
	    		buildBalance +=	'</div>';
	    		buildBalance +=	'<div class="col-xl-4 col-md-5 col-10 buildBalanceBalanceDiv">';
	    		buildBalance +=	'<div class="row">';
	    		buildBalance +=	'<div class="col-5">';
	    		buildBalance +=	'<span>'+withholdingBalanceTxt+' </span>';
				buildBalance += '<i class="fa fa-info-circle"  data-toggle="tooltip1" data-placement="top" title="The amount that you have received in <?php echo $sys['companyName']?>"></i>';
	    		buildBalance +=	'</div>';
	    		buildBalance +=	'<div class="col-6">';
	    		buildBalance +=	'<span>Available Balance </span>';
				buildBalance += '<i class="fa fa-info-circle"  data-toggle="tooltip2" data-placement="top" title="The amount available to withdraw or swap"></i>';
	    		buildBalance +=	'</div>';
                buildBalance +=	'</div>';
                buildBalance +=	'</div>';
                buildBalance +=	'</div>';
                buildBalance +=	'</div>';
                buildBalance += '<div class="col-md-12 px-0 newsLastHR">';
                buildBalance += '<hr class="dashboardHR">';
                buildBalance += '</div>';
			
    		// $('#noDataReceiveAddress').hide();
    		$.each(walletBalance, function(key, val){
				// if(val['status']=="1"){
				// num++;
                var name = val['name'];
                var currency_id = val['currency_id'];
                var symbol = val['symbol'];
                var display_symbol = val['display_symbol'];
                var image = val['image'];
				var balance = val['balance'];
				var receive_balance = val['receivable_balance'];
				var withhold_balance = val['withhold_balance'];
				

                buildBalance += '<div class="col-12 dashboardNewsBox" onclick="toNewWithdrawal(\''+val["currency_id"]+'\')" id="buildWalletBalance">';
    			buildBalance +=	'<div class="row">';
	    		buildBalance +=	'<div class="col-xl-8 col-md-7 col-2 buildBalanceSymbolDiv" >';
	    		buildBalance +=	'<img src="'+image+'" style="width: 32px; margin-right:17px">';
	    		buildBalance +=	'<b>'+display_symbol+'</b>';
	    		buildBalance +=	'</div>';
	    		buildBalance +=	'<div class="col-xl-4 col-md-5 col-10 buildBalanceBalanceDiv">';
	    		buildBalance +=	'<div class="row">';
	    		buildBalance +=	'<div class="col-5">';
	 
	    		buildBalance +=	'<span>'+withhold_balance+'</span>';
	    		buildBalance +=	'</div>';
	    		buildBalance +=	'<div class="col-5">';
	 
	    		buildBalance +=	'<span>'+balance+'</span>';
	    		buildBalance +=	'</div>';
	    		buildBalance +=	'<div class="col-2">';
	    		buildBalance +=	'<i class="fa fa-chevron-right"></i>';
                buildBalance +=	'</div>';
                buildBalance +=	'</div>';
                buildBalance +=	'</div>';
                buildBalance +=	'</div>';
                buildBalance +=	'</div>';
                buildBalance += '<div class="col-md-12 px-0 newsLastHR">';
                buildBalance += '<hr class="dashboardHR">';
                buildBalance += '</div>';
				
				mobileBuildBalance += '<div class="dashboardNewsBox" onclick="toNewWithdrawal(\''+val["currency_id"]+'\')" id="mobileBuildWalletBalance">';
    			mobileBuildBalance +=	'<div class="row">';
	    		mobileBuildBalance +=	'<div class="col-10 buildBalanceSymbolDiv" >';
	    		mobileBuildBalance +=	'<img src="'+image+'" style="width: 32px; margin-right:17px">';
	    		mobileBuildBalance +=	'<b>'+display_symbol+'</b>';

//	    		mobileBuildBalance +=	'<div class="">';
	    		mobileBuildBalance +=	'<div class="row buildBalanceBalanceDiv">';
	    		mobileBuildBalance +=	'<div class="col-12 mb-2 mt-2">';
	 
	    		mobileBuildBalance +=	'<span>'+withholdingBalanceTxt+' : </span><br>';
	    		mobileBuildBalance +=	'<span>'+withhold_balance+'</span>';
				
	    		mobileBuildBalance +=	'</div>';
				
	    		mobileBuildBalance +=	'<div class="col-12 mt-2">';
	 
	    		mobileBuildBalance +=	'<span>Available Balance: </span><br>';
	    		mobileBuildBalance +=	'<span>'+balance+'</span>';
				
	    		mobileBuildBalance +=	'</div>';
				mobileBuildBalance +=	'</div>';
	    
                mobileBuildBalance +=	'</div>';
					
//                mobileBuildBalance +=	'</div>';
				mobileBuildBalance +=	'<div class="col-2 d-flex align-items-center">';
	    		mobileBuildBalance +=	'<i class="fa fa-chevron-right"></i>';
				mobileBuildBalance +=	'</div>';
                mobileBuildBalance +=	'</div>';
         
                mobileBuildBalance += '</div>';
				mobileBuildBalance += '<div class="col-md-12 px-0 newsLastHR">';
                mobileBuildBalance += '<hr class="dashboardHR">';
                mobileBuildBalance += '</div>';
				

	    		$('#buildWalletBalance').empty().append(buildBalance);
	    		$('#mobileBuildWalletBalance').empty().append(mobileBuildBalance);
	    		
	    		// if ($(window).width() < 991) {
	    		// 	$('.qrcode').qrcode({
				// 	    render: "canvas", 
				// 	    text: createQRAddress,
				// 	    width: 100,
				// 	    height: 100,
				// 	    background: "#ffffff",
				// 	    foreground: "#000000",
				// 	    src: 'images/nuxPay270.png',
				// 	    imgWidth: 40,
				// 	    imgHeight: 40,
				// 	});
				// } else {
				// 	$('.qrcode').qrcode({
				// 	    render: "canvas", 
				// 	    text: createQRAddress,
				// 	    width: 150,
				// 	    height: 150,
				// 	    background: "#ffffff",
				// 	    foreground: "#000000",
				// 	    src: 'images/nuxPay270.png',
				// 	    imgWidth: 40,   
				// 	    imgHeight: 40,
				// 	});
				// }
				// }
			})

            adjustBalanceSymbolDiv();

			// if(num==0){
			// 	$("#walletAsset").hide();
			// 	$("#emptyWallet").show();
			// } else{
			// 	$("#walletAsset").show();
			// 	$("#emptyWallet").hide();
			// }
        } 
        // else {

    	// 	$('#buildReceiveAddress').hide();
    	// 	$('#noDataReceiveAddress').show();

    	// 	buildWalletBalance =	'<div class="row">';
    	// 	buildWalletBalance +=	'<div class="col-xl-2 col-lg-2 col-md-12 col-12 text-center" style="margin: auto;">';
    	// 	buildWalletBalance +=	'<img src="images/dashboard/noDateKeyIcon.png" style="width: 30px;"/>';
    	// 	buildWalletBalance +=	'</div>';
    	// 	buildWalletBalance +=	'<div class="col-xl-10 col-lg-10 col-md-12 col-12 text-left noDataTitleSpacing">';
    	// 	buildWalletBalance +=	'<div class="row">';
    	// 	buildWalletBalance +=	'<div class="col-12 montserratSemiBoldFont" style="font-size: 16px">';
    	// 	buildWalletBalance +=	'You haven’t generated any deposit address yet.';
    	// 	buildWalletBalance +=	'</div>';
    	// 	buildWalletBalance +=	'<div class="col-12 montserratRegularFont" style="font-size: 14px;">';
    	// 	buildWalletBalance +=	'Generate deposit address to receive payment from your customer.';
    	// 	buildWalletBalance +=	'</div>';
    	// 	buildWalletBalance +=	'</div>';
    	// 	buildWalletBalance +=	'</div>';
    	// 	buildWalletBalance +=	'<div class="col-xl-2 col-lg-2 col-md-12 col-12"></div>';
    	// 	buildWalletBalance +=	'<div class="col-xl-10 col-lg-10 col-md-12 col-12" style="margin-top: 10px">';
    	// 	buildWalletBalance +=	'<button type="button" class="btn btnGenerate" onclick="generateAddress()">Generate New</button>';
    	// 	buildWalletBalance +=	'</div>';
    	// 	buildWalletBalance +=	'</div>';

    	// 	$('#noDataReceiveAddress').empty().append(buildWalletBalance);

    	// }
	}
	
	function toNewWithdrawal(cid) {
		$.redirect('withdrawal.php', {
			currency_id: cid
		});
	}

    function getWalletType(data,message){

    	// var wallets = data.result.coin_data;
		var wallets = data.data.wallet_list;
		
    	if (wallets && dropdownFake !=1) {
    		$.each(wallets, function(key, val){
    			$('#walletDropdown').append('<option dataName="'+ val['name'] +'" data-image="'+val['image']+'" value="'+ val['currency_id'] +'">'+ val['symbol'] +'</option>')

    			$('#walletDropdownGraph').append('<option data-image="'+val['image']+'" value="'+ val['currency_id'] +'">'+ val['display_symbol'] +'</option>')

    			$('#transactionDropdown').append('<option data-image="'+val['image']+'" value="'+ val['currency_id'] +'">'+ val['display_symbol'] +'</option>')
    		});
    		dropdownFake = 1;
    	}

        function formatState (method) {
		    if (!method.id) {
		        return method.text;
		    } 

		   	var optimage = $(method.element).attr('data-image')
		    if(!optimage){
		       return method.text;
		    } else {                    
		        var $opt = $(
		        	        '<span><img src="'+optimage+'" class="walletTypeIcon" /> <span style="vertical-align: middle;">' + method.text + '</span></span>'
		        );
		        return $opt;
		    }
		};
       
    	$('#walletDropdown').select2({
            dropdownAutoWidth : true,
            templateResult: formatState,
    		templateSelection: formatState
        });

        $('#walletDropdownGraph').select2({
            dropdownAutoWidth : true,
            templateResult: formatState,
    		templateSelection: formatState
        });

        $('#transactionDropdown').select2({
            dropdownAutoWidth : true,
            templateResult: formatState,
    		templateSelection: formatState
        });

        $('select#walletDropdown option:selected').val(wallets[0].currency_id).trigger('change');
    	$('select#walletDropdownGraph option:selected').val(wallets[0].currency_id).trigger('change');
    	runTransactionList();
       
    }

    function loadReceiveAddress(data,message) {
    	var receiveAddress = data.data.address_list;
    	var buildAddress = '';

    	if (receiveAddress != "") {
    		$('#buildReceiveAddress').show();
    		$('#noDataReceiveAddress').hide();
    		$.each(receiveAddress, function(key, val){

    			var createQRAddress = val['address'];



				var date = moment(val['created_at']).format('DD MMM YYYY, hh:mm a')


    			buildAddress =	'<div class="row">';
	    		buildAddress +=	'<div class="col-md-8 col-12 order-md-1 order-2 dashboardRecevieBoxLeft">';
	    		buildAddress +=	'<div class="row">';
	    		buildAddress +=	'<div class="col-12 dashboardRecevieBoxTitle">';
	    		buildAddress +=	'Deposit Address';
	    		buildAddress +=	'</div>';
	    		buildAddress +=	'<div class="col-12 dashboardRecevieBoxCode">';
	    		buildAddress +=	''+val['address']+'';
	    		buildAddress +=	'</div>';
	    		buildAddress +=	'<div class="col-12 dashboardRecevieBoxDate">';
	    		buildAddress +=	'Created on '+date+' ';
	    		buildAddress +=	'</div>';
	    		buildAddress +=	'<div class="col-12" style="margin-top: 10px">';
	    		buildAddress +=	'<button type="button" class="btn btnGenerate" onclick="generateAddress()">Generate New</button>';
	    		buildAddress +=	'</div>';
	    		buildAddress +=	'</div>';
	    		buildAddress +=	'</div>';

	    		buildAddress +=	'<div class="col-md-4 col-12 order-md-2 order-1 dashboardRecevieBoxRight align-self-center">';
	    		buildAddress +=	'<div id="" class="qrcode"></div>';
	    		buildAddress +=	'</div>';

	    		$('#buildReceiveAddress').empty().append(buildAddress);
	    		
	    		if ($(window).width() < 991) {
	    			$('.qrcode').qrcode({
					    render: "canvas", 
					    text: createQRAddress,
					    width: 100,
					    height: 100,
					    background: "#ffffff",
					    foreground: "#000000",
					    src: 'images/nuxPay270.png',
					    imgWidth: 40,
					    imgHeight: 40,
					});
				} else {
					$('.qrcode').qrcode({
					    render: "canvas", 
					    text: createQRAddress,
					    width: 150,
					    height: 150,
					    background: "#ffffff",
					    foreground: "#000000",
					    src: 'images/nuxPay270.png',
					    imgWidth: 40,
					    imgHeight: 40,
					});
				}

			});
    	} else {

    		$('#buildReceiveAddress').hide();
    		$('#noDataReceiveAddress').show();

    		buildAddress =	'<div class="row">';
    		buildAddress +=	'<div class="col-xl-2 col-lg-2 col-md-12 col-12 text-center" style="margin: auto;">';
    		buildAddress +=	'<img src="images/dashboard/noDateKeyIcon.png" style="width: 30px;"/>';
    		buildAddress +=	'</div>';
    		buildAddress +=	'<div class="col-xl-10 col-lg-10 col-md-12 col-12 text-left noDataTitleSpacing">';
    		buildAddress +=	'<div class="row">';
    		buildAddress +=	'<div class="col-12 montserratSemiBoldFont" style="font-size: 16px">';
    		buildAddress +=	'You haven’t generated any deposit address yet.';
    		buildAddress +=	'</div>';
    		buildAddress +=	'<div class="col-12 montserratRegularFont" style="font-size: 14px;">';
    		buildAddress +=	'Generate deposit address to receive payment from your customer.';
    		buildAddress +=	'</div>';
    		buildAddress +=	'</div>';
    		buildAddress +=	'</div>';
    		buildAddress +=	'<div class="col-xl-2 col-lg-2 col-md-12 col-12"></div>';
    		buildAddress +=	'<div class="col-xl-10 col-lg-10 col-md-12 col-12" style="margin-top: 10px">';
    		buildAddress +=	'<button type="button" class="btn btnGenerate" onclick="generateAddress()">Generate New</button>';
    		buildAddress +=	'</div>';
    		buildAddress +=	'</div>';

    		$('#noDataReceiveAddress').empty().append(buildAddress);

    	}
    }

    function generateAddress() {
        
            formData  = {
                command: 'generateNewAddress',
                wallet_type : walletType,
            };
            fCallback = runAddressData;
        ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function runAddressData() {
    	formData  = {
	            command: 'getReceiveAddress',
	            wallet_type : walletType
	        };
	        fCallback = loadReceiveAddress;  
	        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function runGraphData(dataValue) {
    	tsFrom = '';
        tsTo = '';
        timeFrom = '';
        timeTo = '';
        i = 0;

    	if(dataValue){
            var dateArr = dataValue.split(' - ');
            
            tsFrom = dateToTimestamp(dateArr[0]);
            tsTo = dateToTimestamp(dateArr[1]);
        }
        // On the same day, need to format tsTo
        if((tsFrom == tsTo) && (tsFrom > 0))
            tsTo += 86399;


    	formData  = {
            command: 'getGraphData',
            wallet_type : walletTypeGraph,
            from_datetime : tsFrom,
            to_datetime : tsTo
        };
        fCallback = loadGraphData;  
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadGraphData(data,message) {
        if (data.data.chart_data != "") {

            $('#totalTransaction').empty().text(data.data.total_transaction);
            $('#totalTransVol').empty().text(data.data.total_transaction_volume);
            $('.currencyUnit').empty().text(data.data.currency_unit);
            $('#payoutAmount').empty().text(data.data.payout_amount);


            am4core.ready(function() {
                am4core.useTheme(am4themes_animated);

                var chart = am4core.create("chartdiv", am4charts.XYChart);

                chart.data = data.data.chart_data;
                chart.dateFormatter.inputDateFormat = "yyyy-MM-dd HH:mm:ss";
                

                var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                dateAxis.renderer.minGridDistance = 50;

                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

                var series = chart.series.push(new am4charts.LineSeries());
                series.dataFields.valueY = "value";
                series.dataFields.dateX = "date";
                series.strokeWidth = 2;
                series.minBulletDistance = 10;
                series.tooltipText = "[bold]Timeline:[/]\n{date.formatDate()}[bold]\n\nVolume:[/]\n{value} " + data.data.currency_unit;
                series.tooltip.pointerOrientation = "vertical";

                chart.cursor = new am4charts.XYCursor();
                chart.cursor.xAxis = dateAxis;
                series.fill = am4core.color("#FFF");



            });

            $("defs").remove();

        } else {

            $('#totalTransaction').text(0);
            $('#totalTransVol').text(0);
            $('.currencyUnit').text("");
            $('#payoutAmount').text(0);

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

                chart.data = [
                  {date: dataDate1 , value:0},
                  {date: dataDate2 , value:0},
                  {date: dataDate3 , value:0}
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

            $("defs").remove();
        }
        
    }

    function requestSalesGraphData(time) {
        formData  = {
            command: 'getSalesGraphData',
            time: time
        };
        fCallback = loadSalesGraphData;  
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, 1, 0);
    }

    function loadSalesGraphData(data, message) {
        var chartData = data.data.report;

        if (salesChart != null) {
            salesChart.dispose();
        }

        am4core.ready(function() {
            am4core.useTheme(am4themes_animated);

            salesChart = am4core.create("salesChartDiv", am4charts.XYChart);

            salesChart.data = chartData;
            salesChart.dateFormatter.inputDateFormat = "yyyy-MM-dd";
            var dateAxis = salesChart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.minGridDistance = 50;

            var valueAxis = salesChart.yAxes.push(new am4charts.ValueAxis());

            var series = salesChart.series.push(new am4charts.LineSeries());
            series.dataFields.valueY = "value";
            series.dataFields.dateX = "date";
            series.strokeWidth = 2;
            series.minBulletDistance = 10;
            series.tooltipText = "[bold]Timeline:[/]\n{date.formatDate()}[bold]\n\nNet Profit(USD):[/]\n{value} ";
            series.tooltip.pointerOrientation = "vertical";

            salesChart.cursor = new am4charts.XYCursor();
            salesChart.cursor.xAxis = dateAxis;
            series.fill = am4core.color("#FFF");

        });

        $("defs").remove();
    }

    function requestOverallSalesData() {
        formData  = {
            command: 'getOverallSalesData'
        };
        fCallback = loadOverallSalesData;  
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, 1, 0);
    }

    function loadOverallSalesData(data, message) {
        var totalCount = data.data.count;
        var gross = data.data.gross;
        var net = data.data.net;

        if (data.code == 1) {
            $('#numOfTx').text(totalCount);
            $('#grossSales').text(gross + ' USD');
            $('#netSales').text(net + ' USD');
        }
    }

    function runNewsList () {
    	formData  = {
            command: 'getNewsCenter'
        };
        fCallback = getNews; 
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function getNews(data,message) {

    	var getNewsList = data.data.news_list;
    	var buildNewsList = '';


    	if (getNewsList) {
    		$.each(getNewsList, function(key, val){

    			var date = moment(val['created_at']).format('DD MMM YYYY, hh:mm a')

    			buildNewsList =		'<div class="col-12 dashboardNewsBox">';
	    		buildNewsList +=	'<div class="row">';
	    		buildNewsList +=	'<div class="col-12 dashboardMiniTitle">';
	    		buildNewsList +=	''+val['title']+'';
	    		buildNewsList +=	'</div>';
	    		buildNewsList +=	'<div class="col-12 dashboardRecevieBoxTitle textLimitNews" style="margin-top: 10px;">';
	    		buildNewsList +=	''+val['description']+'';
	    		buildNewsList +=	'</div>';
	    		buildNewsList +=	'<div class="col-12 dashboardRecevieBoxDate">';
	    		buildNewsList +=	'Created on '+date+'';
	    		buildNewsList +=	'</div>';
	    		buildNewsList +=	'</div>';
	    		buildNewsList +=	'</div>';
	    		buildNewsList +=	'<div class="col-12 px-0 newsLastHR">';
	    		buildNewsList +=	'<hr class="dashboardHR">';
	    		buildNewsList +=	'</div>';

	    		$('#buildNewsDiv').append(buildNewsList);

			});
    	}
    }

    function runTransactionList () {
    	formData  = {
            command: 'getTransactionList',
            wallet_type : walletTypeTransaction
        };
        fCallback = getTransactionList; 
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function getTransactionList(data,message) {

    	var getTranList = data.data.tx_list;
    	var buildTranList = '';


    	if (getTranList != "") {

    		$('#buildTranDiv').show();
    		$('#transactionNoData').hide();
    		$('#buildTranDiv').empty();

    		$.each(getTranList, function(key, val){

    			var date = moment(val['created_at']).format('DD MMM YYYY, hh:mm a')
    			var hashCode = val['tx_hash'];
    			var status = val['status'];

    			buildTranList =		'<div class="col-12 dashboardNewsBox">';
	    		buildTranList +=	'<div class="row">';
	    		buildTranList +=	'<div class="col-md-8 col-12">';
	    		buildTranList +=	'<div class="row">';
	    		buildTranList +=	'<div class="col-12 dashboardMiniTitle transactionCode">';
	    		buildTranList +=	'<span class="transactionCodeFirstDot">';
	    		buildTranList +=	''+hashCode+'';
	    		buildTranList +=	'</span>';
	    		buildTranList +=	'<span class="transactionCodeLastDot">';
	    		buildTranList +=	''+hashCode+'';
	    		buildTranList +=	'</span>';
	    		buildTranList +=	'</div>';
	    		buildTranList +=	'<div class="col-12" style="margin-top: 5px;display: flex;">';

	    		if (status == "success") {
	    			buildTranList +=	'<div class="transactionStatusBoxSuccess">';
	    		} else if (status == "failed") {
	    			buildTranList +=	'<div class="transactionStatusBoxReject">';
	    		} else if (status == "pending") {
	    			buildTranList +=	'<div class="transactionStatusBoxPending">';
	    		}

	    		buildTranList +=	'<div class="transactionStatusBoxText">';
	    		buildTranList +=	''+status+'';
	    		buildTranList +=	'</div>';
	    		buildTranList +=	'</div>';

	    		buildTranList +=	'<span class="transactionStatusBoxDate">';
	    		buildTranList +=	'Created on '+date+'';
	    		buildTranList +=	'</span>';
	    		buildTranList +=	'</div>';
	    		buildTranList +=	'</div>';
	    		buildTranList +=	'</div>';
	    		buildTranList +=	'<div class="col-md-4 col-12 align-self-center dashboardRecevieBoxTitle text-right">';
	    		buildTranList +=	''+val['amount']+' '+val['symbol']+'';
	    		buildTranList +=	'</div>';
	    		buildTranList +=	'</div>';
	    		buildTranList +=	'</div>';
	    		buildTranList +=	'<div class="col-12 px-0 newsLastHR">';
	    		buildTranList +=	'<hr class="dashboardHR">';
	    		buildTranList +=	'</div>';

	    		$('#buildTranDiv').append(buildTranList);
			});
    	} else {

    		$('#buildTranDiv').hide();
    		$('#transactionNoData').empty();
    		$('#transactionNoData').show();

    		buildTranList =		'<div class="row">';
    		buildTranList +=	'<div class="col-xl-2 col-lg-2 col-md-12 col-12 text-center" style="margin: auto;">';
    		buildTranList +=	'<img src="images/dashboard/noDateKeyIcon.png" style="width: 30px;"/>';
    		buildTranList +=	'</div>';
    		buildTranList +=	'<div class="col-xl-10 col-lg-10 col-md-12 col-12 text-left noDataTitleSpacing">';
    		buildTranList +=	'<div class="row">';
    		buildTranList +=	'<div class="col-12 montserratSemiBoldFont" style="font-size: 16px">';
    		buildTranList +=	'You have no any transaction yet.';
    		buildTranList +=	'</div>';
    		buildTranList +=	'<div class="col-12 montserratRegularFont" style="font-size: 14px;">';
    		buildTranList +=	'Receive payment from your customer and view transactions here.';
    		buildTranList +=	'</div>';
    		buildTranList +=	'</div>';
    		buildTranList +=	'</div>';
    		buildTranList +=	'</div>';

    		$('#transactionNoData').append(buildTranList);
    	}
    }

function adjustBalanceSymbolDiv() {

    if($(window).width() <768) {
        $('#mobileBuildWalletBalance').show();
        $('#buildWalletBalance').hide();

		
    }else{
        $('#buildWalletBalance').show();
        $('#mobileBuildWalletBalance').hide();
		
        
    }
}

$( window ).resize(function() {
    adjustBalanceSymbolDiv();
});

</script>
<style type="text/css">

    .swapWalletDropdown .select2 {
      width: 100px!important;
    }

    .report-top-container {
        display: flex;
    }

    .report-child-container {
        display: flex;
        align-items: center;
        background-color: #fff;
        padding: 10px;
        margin: 0 10px 0 0;
        min-width: 225px;
        width: 30%;
    }

    .report-small-title {
        font-size: 12px;
        color: grey;
    }

    .report-child-item {
        display: flex;
        flex-direction: column;
        margin-left: 10px;
    }

    .report-bold-text {
        font-size: 15px;
        font-weight: 400;
    }

    @media (max-width: 740px) {
        .report-top-container {
            flex-direction: column;
        }

        .report-child-container {
            width: 100%;
        }
    }
    
    @media (max-width: 550px) {
        .dashboardBoxLeft {
            min-height: 250px !important;
            padding: 5px !important;
            margin: 0px !important;
        }

        #salesChartDiv {
            padding: 0;
        }

        #chartDiv {
            padding: 0;
        }
    }
    #salesDateOption {
        padding: 0 !important;
    }

    #salesDateOptionContainer {
        width: 225px !important;
        border: none !important;
    }

    #salesDateOption {
        width: 100% !important;
        border: none !important;
        text-align: left !important;
    }    
    .select2-container--default .select2-selection--multiple, .select2-container--default .select2-selection--single {
        border: 1px solid transparent;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple, .select2-container--default.select2-container--focus .select2-selection--single, .select2-container--default.select2-container--open .select2-selection--multiple, .select2-container--default.select2-container--open .select2-selection--single {
        border: 1px solid transparent;
    }
</style>


            


