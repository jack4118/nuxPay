<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>


<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default dashboardPage">
    <div class="m-grid m-grid--hor m-grid--root m-page">
        
        <?php include 'headerDashboard.php'; ?>
        
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <div class="m-content marginTopHeader">
                
                <div class="col-12 pageHeader mb-5 px-0">                    
                    <?php echo $translations["M02026"][$language]; /* API Integration  */?>
                </div>
                
                <!-- Account DIV -->
                <div class="col-12 mb-3">
                    <div class="row">
                        <div class="col-12 p-0 bigText">                					
                            <?php echo $translations["M01877"][$language]; /* Account ID */ ?>
                		</div>
                		<div class="col-12 p-0 smallTxt">                					 
                            <?php echo $translations["M01878"][$language]; /* Your account ID is */ ?>
							<span id="" style="font-weight: bold"><?php echo $_SESSION["business"]["uuid"] ?></span>
                		</div>
                		<div class="col-12 p-0 smallTxt">                					
                            <?php echo $translations["M01879"][$language]; /* Account ID is required for API Integration to access your  */ ?>
							<?php echo $sys['companyName']?> <?php echo $translations["M01692"][$language]; /* account */ ?>.
                		</div>
                	</div>
                </div>
                
                <!-- Callback DIV -->
                <div class="col-12 mt-5 mt-md-5 p-0">
                    <div class="row">
                        <div class="col-12 bigText">                					
                            <?php echo $translations["M01269"][$language]; /* Callback URL */ ?>
                		</div>
                		<div class="col-12 smallTxt">                					
                            <?php echo $translations["M01696"][$language]; /* Get notify when there are transaction done on your payment gateway */ ?>.
                		</div>
                		<div class="col-12 col-md-10 col-lg-8 mt-3">
                            <div class="m-portlet">
                                <div class="m-portlet__body">
                                    <div class="row">
                                        <div class="col-12" style="font-weight: 500; color: #000">		                							
											<?php echo $translations["M01697"][$language]; /* URL */ ?>
		                				</div>
		                				<div class="col-12 mt-3">
                                            <div class="row">
                                                <div class="col-12 col-md-9">
                                                    <div class="d-flex urlBox">
                                                        <input id="urlInput" type="text" class="form-control requestInput rounded-0" placeholder="Example:https//yourdomain.com/callbackurl">
    							        			    <span id="inputTick" style="margin-top: 20px;line-height: 37px;color: green; display: none">
    							        			        <i class="fa fa-check"></i>
    							        			    </span>
    							        			</div>
		                						</div>
		                						<div class="col-12 col-md-3 mt-3 mt-md-0">
                                                    <button onclick="" id="saveBtn" class="btn searchBtn" type="button" style="min-width: 100px"><?php echo $translations["M01820"][$language]; /* Save */ ?> </button>
		                						</div>
		                					</div>
		                				</div>
		                			</div>
                				</div>
	                		</div>
                		</div>
                	</div>
                </div>
                
                <!-- Integration DIV -->
                <div class="col-12 mt-5 mt-md-5">
                    <div class="row">
                        <div class="col-12 p-0 timeline-header">                					
                            <span class="bigText" style="display: flex; justify-content: center; align-items: center; height: 100%">
                                <?php echo $translations["M02027"][$language]; /* Your Integration */ ?>
                            </span>
                            <div class="timeline-container" id="timeline-btn">
                                <button class="timeline-item btn waves-effect waves-light" onclick="requestGraphDataByTimeline('4h')" id="4h"><?php echo $translations["M02096"][$language]; /* 4h */ ?></button>
                                <button class="timeline-item btn waves-effect waves-light" onclick="requestGraphDataByTimeline('12h')" id="12h"><?php echo $translations["M02097"][$language]; /* 12h */ ?></button>
                                <button class="timeline-item btn waves-effect waves-light" onclick="requestGraphDataByTimeline('24h')" id="24h"><?php echo $translations["M02098"][$language]; /* 24h */ ?></button>
                                <button class="timeline-item btn waves-effect waves-light" onclick="requestGraphDataByTimeline('1w')" id="1w"><?php echo $translations["M02099"][$language]; /* 1w */ ?></button>
                                <button class="timeline-item btn waves-effect waves-light" onclick="requestGraphDataByTimeline('1m')" id="1m"><?php echo $translations["M02100"][$language]; /* 1m */ ?></button>
                            </div>
                		</div>
                        
                        <div class="col-12 graph-container">
                            <div class="graph-item">
                                <div id="inRequestGraph"></div>
                            </div>
                            <div class="graph-item">
                                <div id="outRequestGraph"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal fade" id="saveRedirectUpgradeModal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-w border-b" style="border-bottom: 0px solid black">                
                                <div class="modal-title f-16"><?php echo $translations["M01698"][$language]; /* Upgrade to Premium Account to unlock this feature */ ?>!</div>
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body border-b" style="line-height: 25px;">
                                <!-- <span>Click <a href="upgradeToPremium.php">here<a> to upgrade account!</span> -->
                                <a href="upgradeToPremium.php">
                                    <button class="searchBtn btn">
                                        <?php echo $translations["M01699"][$language]; /* Upgrade */ ?> 
                                    </button>
                                </a>      
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
                    
        </div> 
    </div>
    <?php include 'footerDashboard.php'; ?> 
</body>
        
        
        </html>
        <?php include 'sharejsDashboard.php'; ?>
        <script src="js/jquery.qrcode.js" type="text/javascript"></script>
        <script src="https://www.amcharts.com/lib/4/core.js"></script>
        <script src="https://www.amcharts.com/lib/4/charts.js"></script>
        <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
        
        <script>
            var url             = 'scripts/reqPaymentGateway.php';
            var method          = 'POST';
            var debug           = 0;
            var bypassBlocking  = 0;
            var bypassLoading   = 0;
            var formData        = "";
    var fCallback       = ""; 
    var firstTime       = "<?php echo $_POST['firstTime']; ?>";
    var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';
	var accountType = "<?php echo $_SESSION['account_type']; ?>";
    var accountID = "<?php echo $_SESSION["business"]["uuid"] ?>";
	var checkWalletStatus = 1;

    if (hasChangedPassword == 0){
		$.redirect('firstTimeLogin.php');
    }
    
    if (hasChangedPassword == 2){
        
        if(!document.cookie.includes('firstLogin=visited')) {
            $.redirect("firstTimeLogin.php");
        } 
    }
    

    $(document).ready(function(){		
        requestGraphDataByTimeline("12h")

        fCallback = getCallbackData;
        formData  = {
            command: 'getCallbackURL'
        };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#saveBtn').click(function(){
            if(accountType == "basic"){
                $('#saveRedirectUpgradeModal').modal('show');
            }else{
                if ($('#urlInput').val() != ''){
                    fCallback = loadSetCallbackUrl;
                    formData  = {
                        command : 'setCallbackURL',
                        callbackURL : $('#urlInput').val()
                    };
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                } else {
                    showMessage('Callback URL cannot be empty', 'warning', 'Error', "warning", '');
                }
		    }
		
	    });
    });

    function requestGraphDataByTimeline(time) {
        // change active class
        $('#timeline-btn').children('button').each(function() {
            $(this).removeClass('active');
        });
        $('#'+time).addClass('active');

        // get graph data
        formData  = {
			command: 'getDeveloperData',
            userID: accountID,
            time: time,
        };
        fCallback = loadDeveloperGraph; 
        ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDeveloperGraph(data, message) {
        var chartDataIn = data.result.inRequest;
        var chartDataOut = data.result.outRequest;
        // console.log(data.result.debug);

        buildGraph(chartDataIn, 'inRequestGraph');
        buildGraph(chartDataOut, 'outRequestGraph');
    }

    function buildGraph(data, chartId) {
        var graphTitle = (chartId == 'inRequestGraph') 
            ? "<?php echo $translations["M02028"][$language]; /* API Requests */ ?>" 
            : "<?php echo $translations["M02029"][$language]; /* Callbacks */ ?>";

        am4core.ready(function() {
            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create(chartId, am4charts.XYChart);

            // Add data
            chart.data = data;

            // Set input format for the dates
            chart.dateFormatter.inputDateFormat = "yyyy-MM-dd HH:mm:ss";

            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.minGridDistance = 50;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

            var series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.valueY = "value";
            series.dataFields.dateX = "date";
            series.strokeWidth = 2;
            series.minBulletDistance = 10;
            series.tooltipText = "[bold]Timeline:[/]\n{date}";
            series.tooltip.pointerOrientation = "vertical";

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.xAxis = dateAxis;
            series.fill = am4core.color("#FFF");

            var title = chart.titles.create();
            title.text = graphTitle;
            title.fontSize = 16;
            title.align = "left";
            title.marginBottom = 30;

        }); // end am4core.ready()
        $("defs").remove();
    }

    function loadSetCallbackUrl(data, message){
		if (data.code == 1){
			showMessage(message, 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', "check-circle-o", 'apiIntegrationStatistic.php');
		}	
	}

    function getCallbackData(data,message){
        $('#urlInput').val(data.result.callback_url);
    }

 
</script>
<style type="text/css">
.timeline-container {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.btn.active {
    background-color: #51C2DC;
    color: #fff;
}

.timeline-item {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 65px;
    height: 35px;
    color: #51C2DC;
    font-weight: bold;
    background: #fff;
}

.graph-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #fff;
    margin-top: 30px;
}

#inRequestGraph {
    width: 100%;
    height: 100%;
}

#outRequestGraph {
    width: 100%;
    height: 100%;
}

.graph-item {
    width: 50%;
    height: 350px;
    padding: 20px;
}

.timeline-header {
    display: flex; 
    justify-content: space-between;
}
@media (max-width: 550px) {
    .timeline-header {
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }
    .timeline-item {
        max-width: 50px;
    }
}
@media (max-width: 900px) {
    .graph-container {
        flex-direction: column;
        justify-content: center;
    }
    .graph-item {
        width: 100%;
    }
}
</style>


            


