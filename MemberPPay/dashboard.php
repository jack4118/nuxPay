<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>


<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default dashboardPage">

    
    <div class="m-grid m-grid--hor m-grid--root m-page">

        <?php include 'headerDashboard.php'; ?>
       

        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            
            <div class="m-subheader marginTopHeader">
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
            </div>

            <div class="m-content">
                <div class="col-12">
                	<div class="row">

                		<div class="col-12 dashboardBox1">
                			<div class="row">
                				<div class="col-12">
                					<div class="row">
                						<div class="dashboardBoxWidth dashboardBoxTitle">
		                					Transaction Gross Volume
		                				</div>
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
		                				<div class="col-md-8 col-12 dashboardBoxLeft">
		                					<div class="row amChartSize">
		                						<div class="col-12" id="chartdiv"></div>
		                					</div>
		                				</div>
		                				<div class="col-md-4 col-12 dashboardBoxRight">
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
		                				</div>
		                			</div>
		                		</div>

                			</div>
                		</div>

                		<div class="col-md-8 col-12 secondlineBoxPadding" style="margin-top: 20px;">
                			<div class="row">
                				<div class="col-12 dashboardBox1">
                					<div class="row">
		                				<div class="col-12">
		                					<div class="row">
		                						<div class="col-md-6 col-12 dashboardBoxTitle">
				                					Receive
				                				</div>
				                				<div class="col-md-6 col-12 align-self-center receiveBoxTextAlign walletTypeDropdown">
				                					 <select id="walletDropdown" class="full-width selectValue">
				                					 </select>
					                            </div>
		                					</div>
		                				</div>
		                				<div class="col-12 px-0">
				                			<hr class="dashboardHR">
				                		</div>
				                		<div id="noDataReceiveAddress" class="col-12 dashboardNoDataPadding" style="display: none;"></div>
				                		<div id="buildReceiveAddress" class="col-12" style="display: none;"></div>
				                		<div class="col-12 btnPadding" style="margin-top: 20px">
		        							<button id="viewAllAddress" type="button" class="btn btnView">View All Address</button>
		        						</div>
		                			</div>
                				</div>

                				<div class="col-12 dashboardBox1" style="margin-top: 20px;">
                					<div class="row">
		                				<div class="col-12">
		                					<div class="row">
		                						<div class="col-md-6 col-12 dashboardBoxTitle">
				                					Latest Transactions
				                				</div>
				                				<div class="col-md-6 col-12 align-self-center receiveBoxTextAlign walletTypeDropdown">
				                					 <select id="transactionDropdown" class="full-width selectValue">
				                					 	<option value="">All</option>
				                					 </select>
					                            </div>
		                					</div>
		                				</div>

		                				<div class="col-12 px-0">
				                			<hr class="dashboardHR">
				                		</div>

		                				<div id="transactionNoData" class="col-12 noDataPadding" style="display: none;"></div>

	                                    <div class="col-12">
	                                    	<div id="buildTranDiv" class="row" style="display: none;"></div>
	                                    </div>

				                		<div class="col-12 btnPadding">
		        							<button id="selectWalletType" type="button" class="btn btnView">View All Transaction</button>
		        						</div>
		                			</div>
                				</div>
                			</div>
                		</div>
                		
                		<div class="col-md-4 col-12 secondlineBoxPadding2" style="margin-top: 20px;">
                			<div class="row">
                				<div class="col-12 dashboardBox1">
		                			<div class="row">
		                				<div class="col-12">
		                					<div class="row">
		                						<div class="col-12 dashboardBoxTitle">
				                					News Center
				                				</div>
		                					</div>
		                				</div>
		                				<div class="col-12 px-0">
				                			<hr class="dashboardHR">
				                		</div>
				                		<div class="col-12">
				                			<div id="buildNewsDiv" class="row"></div>
				                		</div>
<!-- 				                		<div class="col-12 btnPadding">
		        							<button type="button" class="btn btnView">View All News</button>
		        						</div> -->
		                			</div>
		                		</div>
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


    

    $(document).ready(function(){

    	formData  = {
            command: 'getWalletType'
        };
        fCallback = getWalletType; 
        ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        runNewsList();

    	var start = moment().subtract(6, 'days');
        var end = moment();

        $('#dateSelect').val("Last 7 Days");

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

    });

    function getWalletType(data,message){

    	var wallets = data.result.coin_data;
    	
    	if (wallets && dropdownFake !=1) {
    		$.each(wallets, function(key, val){
    			$('#walletDropdown').append('<option dataName="'+ val['name'] +'" data-image="'+val['image']+'" value="'+ val['wallet_type'] +'">'+ val['name'] +'</option>')

    			$('#walletDropdownGraph').append('<option data-image="'+val['image']+'" value="'+ val['wallet_type'] +'">'+ val['name'] +'</option>')

    			$('#transactionDropdown').append('<option data-image="'+val['image']+'" value="'+ val['wallet_type'] +'">'+ val['name'] +'</option>')
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

        $('select#walletDropdown option:selected').val(wallets[0].wallet_type).trigger('change');
    	$('select#walletDropdownGraph option:selected').val(wallets[0].wallet_type).trigger('change');
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
					    src: 'images/logo-270.png',
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
					    src: 'images/logo-270.png',
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
    		buildAddress +=	'You haven’t genereated any deposit address yet.';
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
	    		} else if (status == pending) {
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


</script>