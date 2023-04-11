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
                <!--

                <div class="row">
                    <div class="col-sm-4">
                        <a id="addBackBtn" href="news.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
                    </div> end col 
                </div>
-->

                

                <div class="row">
                <div class="col-md-2" style="padding-bottom: 15px">
                    <button class="btn btn-default waves-effect waves-light" id="backBtn"> Back </button>
                </div>
                <!-- <div class="row col-md-12">
                
                <div class ="row">	
					<div id="refDb" class="col-6 dashboardBox1 float-right" style="font-size: 12px">
						<label id="lblRefLink" class="col-12">Short Url Link:</label>
						<label id="referralLink" class="col-12" style="font-weight: lighter"></label>
						<a href="javascript:;" id="modalCopyTxId">
						<img class="col-1" src="images/newCopyIcon.png" style="width: 23px;">
						</a>
					</div>
				</div> -->

                <div class="row">
                    <div class="col-xs-12" style ="margin: 10px; padding-right: 30px">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="dashboardTitle" id="short_url_heading">Landing Page Campaign</h4>
                            </div>
                            <div class="col-md-12 dashboardBox" style = "margin-top:10px">
                                <div class="p-b-0">
                                    <form>
                                        <div id="basicwizard" class="pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                <div id="alertMsg" class="alert" style="display: none;"></div>
                                                <div id="transactionSummaryEmpty" class="table-responsive">
                                                    <table class="table table-striped table-bordered no-footer m-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Total Click</th>
                                                                <th>Top Country</th>
                                                                <th>Top Referral</th>
                                                                <th>Top OS</th>
                                                                <th>Top Device</th>
                                                                <th>Top Telco</th>
                                                                <tbody>
                                                                    <tr >
                                                                        <td style="text-align: left" id="total_clicks">No Result</td>
                                                                        <td style="text-align: left" id="top_country">No Result</td>
                                                                        <td style="text-align: left" id="top_browser">No Result</td>
                                                                        <td style="text-align: left" id="top_os">No Result</td>
                                                                        <td style="text-align: left" id="top_device">No Result</td>
                                                                        <td style="text-align: left" id="top_telco">No Result</td>
                                                                    </tr>
                                                                </tbody>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
                            <div class="col-xs-12" style="margin-right: 25px; padding-right: 20px">
                                <div class="row float-right mt-4">
                                    <button type="button" onclick="dateFilterButton(this)" id="1" class="btn btn-dashboard waves-effect waves-light dashboardBtn">Today</button>
                                    <button type="button" onclick="dateFilterButton(this)" id="2" class="btn btn-dashboard waves-effect waves-light dashboardBtn">Yesterday</button>
                                    <button type="button" onclick="dateFilterButton(this)" id="3" class="btn btn-dashboard waves-effect waves-light">Last 7 Days</button>
                                    <button type="button" onclick="dateFilterButton(this)" id="4" class="btn btn-dashboard waves-effect waves-light">Last 30 Days</button>
                                    <button type="button" onclick="dateFilterButton(this)" id="5" class="btn btn-dashboard waves-effect waves-light">All Time</button>
                                </div>
					        </div>
                            
                            <div class="col-xs-12 dashboardBox2" style="margin-top: 20px; ">
						        <div class="row">
                                    <div class="col-md-12 col-xs-12" style="padding-right:20px">
										<div class="row">
											<div class="col-md-12 amChartSize" style="height: 450px" id="chartdiv"></div>
										</div>
									</div>
                                </div>
                            </div>
                            <div class="col-xs-12 dashboardBox3">
                                <div class="row" style="">
                                    <div class="col-md-6 piechartTitle greyBox" style="font-weight: lighter; font-size: 18px;">
                                        Country
                                    </div>

                                    <div class="col-md-6 piechartTitle " style="font-weight: lighter; font-size: 18px;">
                                        Browser
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-6 piechartAmount" id="country">
                                    </div>
                                    <div class="col-md-6 piechartAmount greyBox" id="browser">
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div id="alertMsg1" class="alert col-md-6 greyBox" style="display: none; text-align: center; padding-top: 125px; padding-bottom:125px;">No Result</div>
                                    <div class="col-md-6 piechartSize greyBox" style="height: 400px" id="piechart1">
                                    </div>
                                    <div id="alertMsg2" class="alert col-md-6" style="display: none; text-align: center; padding-top: 125px; padding-bottom:125px;">No Result</div>
                                    <div class="col-md-6 piechartSize " style="height: 400px" id="piechart2">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 piechartTitle " style="font-weight: lighter; font-size: 18px;">
                                        OS
                                    </div>

                                    <div class="col-md-6 piechartTitle greyBox" style="font-weight: lighter; font-size: 18px;">
                                        Device
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-6 piechartAmount greyBox" id="os">
                                    </div>
                                    <div class="col-md-6 piechartAmount greyBox" id="device">
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div id="alertMsg3" class="alert col-md-6" style="display: none; text-align: center; padding-top: 125px; padding-bottom:125px;">No Result</div>
                                    <div class="col-md-6 piechartSize " style="height: 400px" id="piechart3">
                                    </div>
                                    <div id="alertMsg4" class="alert col-md-6 greyBox" style="display: none; text-align: center; padding-top: 125px; padding-bottom:125px;">No Result</div>
                                    <div class="col-md-6 piechartSize greyBox" style="height: 400px" id="piechart4">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 piechartTitle greyBox" style="font-weight: lighter; font-size: 18px;">
                                        Telco
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-6 piechartAmount greyBox" id="telco">
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div id="alertMsg5" class="alert col-md-6 greyBox" style="display: none; text-align: center; padding-top: 125px; padding-bottom:125px;">No Result</div>
                                    <div class="col-md-6 piechartSize greyBox" style="height: 400px" id="piechart5">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 dashboardBox">
                                <div class="p-b-0">
                                    <form>
                                        <div id="basicwizard" class="pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                <div id="alertMsg" class="alert col-md-2" style="display: none;"></div>
                                                <div id="landingPageCampaignSummaryDiv" class="table-responsive" style="overflow-x: unset;"></div>
                                                <span id="paginateText"></span>
                                                <div class="text-center" style="">
                                                    <ul class="pagination pagination-md" id="pagerLandingPageCampaignSummary">
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
                </div>
                <!-- </div> -->
            </div> <!-- container -->

        </div> <!-- content -->

        <?php include("footer.php"); ?>

    </div>
    <!-- End content-page -->
    <script>
        var resizefunc = [];

    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

    <script>
        // Initialize the arguments for ajaxSend function
        var url = 'scripts/reqAdmin.php';
        var method = 'POST';
        var debug = 0;
        var bypassBlocking = 0;
        var bypassLoading = 0;
        var pageNumber = 1;
        var formData = "";
        var fCallback = "";        
        var short_url = '<?php echo $_POST['short_url']; ?>';
        var campaign_id = '<?php echo $_POST['campaign_id']; ?>';
        var campaign_name = '<?php echo $_POST['campaign_name']; ?>';
        var long_url = '<?php echo $_POST['long_url']; ?>';
        var divId = 'landingPageCampaignSummaryDiv';
        var tableNo;
        var tableId = 'landingPageCampaignSummaryTable';
        var pagerId = 'pagerLandingPageCampaignSummary';
        var btnArray = {};
        var today = "<?php echo date('d/m/Y 00:00:00');?>";
        var endToday = "<?php echo date("d/m/Y 23:59:59");?>";
        var thArray = Array(
        'Date, Time',
        'IP Address',
        'Country',
        'Browser',
        'OS',
        'Device',
        'Telco'
    );
    var searchId = 'searchForm';
    var tableRowDetails = [];
    
    $(document).ready(function() {
        // $("#short_url_text").html(short_url);
        $('#short_url_heading').text(short_url);
        var tableNo = '';
        runGraphData(today, endToday);

        $('#modalCopyTxId').click(function() {
            var copyText = $('#referralLink').text();
			
			var text = document.getElementById('referralLink').innerText;
			var elem = document.createElement("textarea");
			document.body.appendChild(elem);
			elem.value = text;
			elem.select();
			document.execCommand("copy");
			document.body.removeChild(elem);
			

            /* Alert the copied text */
            // alert("Copied to clipboard: " + copyText.value);
            swal.fire({
                    position:"center",
                    type:"success",
                    title:"Copied to clipboard",
                    showConfirmButton:!1,
                    timer:1000
                });

		});
    });
    
    function loadDefaultListing(data, message) {
        total_clicks = data.total_clicks;
        top_country = data.top_country;
        top_browser = data.top_browser;
        top_os = data.top_os;
        top_device = data.top_device;
        top_telco = data.top_telco;
        // $('#loginError').html('<span>' + message + '</span>').css('display', 'block');

        $('#total_clicks').html(total_clicks);
        $('#top_country').html(top_country);
        $('#top_browser').html(top_browser);
        $('#top_os').html(top_os);
        $('#top_device').html(top_device);
        $('#top_telco').html(top_telco);
        
        loadLandingPageCampaignSummaryDivTable(data, message);
    }

    function pagingCallBack(pageNumber, fCallback) {

        if (pageNumber > 1) bypassLoading = 1;

        var formData = {
            command: "campaignGetShortUrlDetails",
            page: pageNumber,
            short_url:   short_url
        };

        if (!fCallback)
            fCallback = loadLandingPageCampaignSummaryDivTable;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadLandingPageCampaignSummaryDivTable(data, message){
        
        var detailsList = data.details_list;
            var tableNo;
            if (detailsList) {
                var newList = [];
                $.each(detailsList, function(k, v) {

                    var rebuildData = {
                        date:          v['created_at'],
                        ip_address:    v['ip_address'],
                        country:       v['country'],
                        browser:       v['browser'],
                        os:            v['os'],
                        device:        v['device'],
                        telco:         v['telco']

                    };
                    newList.push(rebuildData);
                });
            }else{
                newList = "";
                message = "No result.";

            }

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);    

            if(detailsList){
                $.each(detailsList, function(k, v) {
                    $('#' + tableId).find('tr#' + k).attr('data-th', v['id']);
                    
                });

            }
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
			command: 'campaignGetShortUrlDetails',
			date_from: tsFrom,
			date_to: tsTo,
            short_url: short_url
		};
		fCallback = loadGraphData;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	}

    function loadGraphData(data, message) {

        total_clicks = data.total_clicks;
        top_country = data.top_country;
        top_browser = data.top_browser;
        top_os = data.top_os;
        top_device = data.top_device;
        top_telco = data.top_telco;
        // $('#loginError').html('<span>' + message + '</span>').css('display', 'block');

        $('#total_clicks').html(total_clicks);
        $('#top_country').html(top_country);
        $('#top_browser').html(top_browser);
        $('#top_os').html(top_os);
        $('#top_device').html(top_device);
        $('#top_telco').html(top_telco);
        
        loadLandingPageCampaignSummaryDivTable(data, message);

        am4core.ready(function() {
            am4core.useTheme(am4themes_animated);

				var chart = am4core.create("chartdiv", am4charts.XYChart);

                if (data.graph_data) {

                    chart.data = data.graph_data;

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
					series.tooltipText = "[bold]Timeline:[/]\n{date.formatDate()}[bold]\n\nVolume:[/]\n{value} ";//data.symbol;
					series.tooltip.pointerOrientation = "vertical";

					chart.cursor = new am4charts.XYCursor();
					chart.cursor.xAxis = dateAxis;
					series.fill = am4core.color("#FFF");

                    if(data.country_piechart_data.length == 0){
                        $('#piechart1').hide();
                        $("#alertMsg1").show();
                    } else {
                        generatePiechart('piechart1', data.country_piechart_data, 'percentage', 'name');
                        $('#piechart1').show();
                        $("#alertMsg1").hide();
                    }
                    if(data.os_piechart_data.length == 0){
                        $('#piechart2').hide();
                        $("#alertMsg2").show();
                    } else {
                        generatePiechart('piechart2', data.os_piechart_data, 'percentage', 'name');
                        $('#piechart2').show();
                        $("#alertMsg2").hide();
                    }
                    if(data.browser_piechart_data.length == 0){
                        $('#piechart3').hide();
                        $("#alertMsg3").show();
                    } else {
                        generatePiechart('piechart3', data.browser_piechart_data, 'percentage', 'name');
                        $('#piechart3').show();
                        $("#alertMsg3").hide();
                    }
                    if(data.device_piechart_data.length == 0){
                        $('#piechart4').hide();
                        $("#alertMsg4").show();
                    } else {
                        generatePiechart('piechart4', data.device_piechart_data, 'percentage', 'name');
                        $('#piechart4').show();
                        $("#alertMsg4").hide();
                    }
                    if(data.telco_piechart_data.length == 0){
                        $('#piechart5').hide();
                        $("#alertMsg5").show();
                    } else {
                        generatePiechart('piechart5', data.telco_piechart_data, 'percentage', 'name');
                        $('#piechart5').show();
                        $("#alertMsg5").hide();
                    }
                }
        });



    }


    function generatePiechart(piechartID, piechartdata, value, category) {
		var piechart1 = am4core.create(piechartID, am4charts.PieChart);
		
		piechart1.data = piechartdata;

		// Add and configure Series
		var pieSeries = piechart1.series.push(new am4charts.PieSeries());
		// pieSeries.height= 200;
		pieSeries.dataFields.value = value;
		pieSeries.dataFields.category = category;
		pieSeries.autoMargins = false;
		pieSeries.labels.template.radius = 45;
		pieSeries.labels.template.fontSize = 12;
		// pieSeries.labels.template.padding(0,0,0,0);
		// pieSeries.innerRadius = 100;
	
		//        
		//        pieSeries.slices.template.stroke = am4core.color("#4a2abb");
		//        pieSeries.slices.template.strokeWidth = 2;
		//        pieSeries.slices.template.strokeOpacity = 1;


		// Add a legend
		piechart1.legend = new am4charts.Legend();
		piechart1.legend.maxColumns = 2;
		piechart1.legend.maxRows = 5;
		piechart1.legend.fontSize = 12;
		if (piechartID == 'piechart1' || piechartID == 'piechart2' || piechartID == 'piechart3' || piechartID == 'piechart4' || piechartID == 'piechart5') {
			piechart1.legend.valueLabels.template.text = "";//"{value.country_piechart_data} USD";
		} else {
			piechart1.legend.valueLabels.template.text = "";//"{value.value}";
		}


		var colorSet = new am4core.ColorSet();
		colorSet.list = ["#1E90FF", "#191970", "#7B68EE", "#FF69B4", "#8E24AA", "#3CB371"].map(function(color) {
			return new am4core.color(color);
		});
		pieSeries.colors = colorSet;

		// piechart1.legendSettings.itemValueText = "{value}%";
		piechart1.radius = am4core.percent(35);



	}

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>Search Successful</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    $('#backBtn').click(function() {
        $.redirect("landingPageCampaign.php", {
                campaign_id: campaign_id,
                campaign_name: campaign_name,
                long_url: long_url
            });
    });

    function dateFilterButton(elem) {
		if (elem.id == 1) { // Today
            today = "<?php echo date('d/m/Y 00:00:00');?>";
            endToday = "<?php echo date("d/m/Y 23:59:59");?>";
            
            runGraphData(today, endToday)
            
		} else if (elem.id == 2) { // Yesterday
			today = "<?php echo date('d/m/Y 00:00:00', strtotime("-1 days"));?>";
			endToday = "<?php echo date("d/m/Y 23:59:59", strtotime("-1 days"));?>";
			
            runGraphData(today, endToday) 
            
		} else if (elem.id == 3) { // Last 7 Days
			today = "<?php echo date('d/m/Y 00:00:00', strtotime("-6 days"));?>";
            endToday = "<?php echo date("d/m/Y 23:59:59");?>";

            runGraphData(today, endToday)			
            
		} else if (elem.id == 4) { // Last 30 days
			today = "<?php echo date('d/m/Y 00:00:00', strtotime("-29 days"));?>";
            endToday = "<?php echo date("d/m/Y 23:59:59");?>";
            
			runGraphData(today, endToday)

		} else if (elem.id == 5) { // All Time
            runGraphData();
		}

	}
</script>
