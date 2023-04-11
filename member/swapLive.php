<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<?php
if((isset($_POST['access_token']) && $_POST['access_token'] != "")) {
		$_SESSION["access_token"] = $_POST['access_token'];
		$_SESSION["business"]["uuid"] = $_POST['businessID'];
}
 ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="row m-content marginTopHeader" style="padding-bottom:0;">

                <div id="logoHeader" class="col-md-6 col-12 pageHeader mb-0 px-0">
                <img src="https://s3-ap-southeast-1.amazonaws.com/com.thenux.image/assets/xchange/currency/cryptocurrency/bitcoin.png" class="currencyLogo">  </img> &nbsp BTC
                </div>                                       

                <div class="col-12 ml-0 pl-0 pt-2 pb-5" style="display: block">
                    <div class="">
                        <a href="swapListing.php"> < Back </a>
                    </div>
                </div>                          

				<div class="row px-0 whiteBackgroundColor shadow mb-5 pb-5" id="showresultListing" style="">
                    
                    
                    
                        <div class="col-8 col-md-8 col-sm-12 col-12" style="border-right: 1px solid #ebedf2;">

                            <div class="row pt-2 pb-4 px-5 px-xl-0 pt-4">
                                <div class="col-sm-12 col-md-3 pb-md-0 pb-4 align-self-center text-center customSwapBoldBig">
                                    $<span id="last_price"><?php echo number_format($_POST['selectedObj']['last_price'],2);?></span>
                                </div>

                                <div class="col-xl-3 col-md-3 col-4">
                                    <div class="row customSwapSmall">
                                    <?php echo $translations["M01922"][$language]; /* 24H Change */ ?>
                                    </div>
                                    <div id="change_percent" class="row customSwapSmall">
                                        <?php echo number_format($_POST['selectedObj']['change_percent'],2);?>%
                                    </div>
                                </div>

                                <div class="col-xl-3 col-md-3 col-4">
                                    <div class="row customSwapSmall">
                                    <?php echo $translations["M01923"][$language]; /* 24H High */ ?>
                                    </div>
                                    <div class="row customSwapSmall">
                                        $<span id="high"><?php echo number_format($_POST['selectedObj']['high'],2);?></span>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-md-3 col-4">
                                    <div class="row customSwapSmall">
                                    <?php echo $translations["M01924"][$language]; /* 24H Low */ ?>
                                    </div>
                                    <div class="row customSwapSmall">
                                        $<span id="low"><?php echo number_format($_POST['selectedObj']['low'],2);?></span>
                                    </div>
                                </div>

                                
                            </div>  

                            <div class="btn-group pl-3" role="group" aria-label="First group">
                                <button type="button" class="btn btn-secondary customBtnLive">
                                    1H 
                                </button>
                                <button type="button" class="btn btn-secondary customBtnLiveActive customBtnLive">
                                    24H
                                </button>
                                <button type="button" class="btn btn-secondary customBtnLive">
                                    1W
                                </button>
                                <button type="button" class="btn btn-secondary customBtnLive">
                                    1M
                                </button>
                                <button type="button" class="btn btn-secondary customBtnLive">
                                    1Y
                                </button>
                            </div>

                            <div class="row p-0" >
                                <div class="col-12" style="border-bottom: 1px solid #ebedf2;">
                                </div>
                            </div>

                            <div class="row pl-4 pr-4">
                                <div id="chartdiv" class="col-12 p-0 my-1" style="width: 100%; height: 500px;">
                                    
                                </div>
                            </div>

                            <div class="row px-4 pt-4 pb-1 pl-5 pr-4 customSwapHeading" >                            
                                About BTC                            
                            </div>

                            <div class="row px-4 py-1 pl-5  pr-5 text-justify customSwapParagraph">                            
                                The world's first cryptocurrency, Bitcoin is stored and exchanged securely on the internet through a digital ledger
                                known as blockchain. Bitcoins are divisible into smaller units known as satoshi - each satoshi is worth 0.00000001 bitcoin.                 
                            </div>

                        </div>     
                        
                        <div class="col-xl-4"> 
                            <div class="px-3 pt-4">
                                <div class="row" style="font-weight:500; font-size: 18px">
                                    <?php echo $translations["M01919"][$language]; /* Swap */ ?>
                                </div>
                            </div>

                            <div class="row justify-content-between pt-5 px-3">
                                <div class="col-3 text-left p-0 customSwapBoldSmall">
                                    <?php echo $translations["M00602"][$language]; /* From */ ?>
                                </div>
                                <div class="col-9 text-right customSwapSmall">
                                    <?php echo $translations["M01932"][$language]; /* Available */ ?>: <span id="balance" class="customSwapBold"  > 0 </span>
                                </div>
                            </div>

                            <!-- amount to swap -->
                            <div class="row justify-content-between pt-2 px-3 customSwapSmall">
                                <div class="input-group">
                                    <input id="fromAmountInput" type="text" class="form-control rounded-left" aria-label="Text input with dropdown button" placeholder="Enter amount to swap">
                                    <div id="dropdownFromUp" class="input-group-append">
                                        <button id="dropdownFromBottom" class="btn customSwapButton rounded-right" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:95px" value="tetherusd">
                                            <img class="walletTypeIconSmall" src="https://s3-ap-southeast-1.amazonaws.com/com.thenux.image/assets/xchange/currency/cryptocurrency/tetherusd.png"></img> 
                                                USDT
                                        </button>                                        
                                    </div>
                                </div>                            
                            </div>

                            <div class="row justify-content-between pt-3 px-3">
                                <div class="col-3 text-left p-0 customSwapBoldSmall">
                                    <?php echo $translations["M01933"][$language]; /* To */ ?>
                                </div>                                
                            </div>

                            <!-- amount to swap -->
                            <div class="row justify-content-between pt-2 px-3 customSwapSmall">
                                <div class="input-group">
                                    <input id="fromAmountInput" type="text" class="form-control rounded-left" aria-label="Text input with dropdown button" placeholder="Enter amount to receive">
                                    <div id="dropdownFromUp" class="input-group-append">
                                        <button id="dropdownFromBottom" class="btn customSwapButton rounded-right" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:95px" value="tetherusd">
                                            <img class="walletTypeIconSmall" src="https://s3-ap-southeast-1.amazonaws.com/com.thenux.image/assets/xchange/currency/cryptocurrency/bitcoin.png"></img> 
                                                BTC
                                        </button>                                        
                                    </div>
                                </div>                            
                            </div>

                            <div class="row justify-content-between pt-5 px-3">
                                <div class="col-3 text-left p-0 customSwapBoldSmall">
                                    Swap
                                </div>
                                <div class="col-9 text-right customSwapSmall">
                                    <span id="balance" class="customSwapLight"> 1 USDT = 0.00002632 BTC </span>
                                </div>
                            </div>

                            <div class="row justify-content-between pt-2 px-3">
                                <div class="col-6 text-left p-0 customSwapBoldSmall">
                                    You will receive
                                </div>
                                <div class="col-6 text-right customSwapSmall">
                                    <span id="balance" class="customSwapLightColor"> 0.00005321 BTC </span>
                                </div>
                            </div>

                            <div class="row justify-content-between pt-3 px-3 pb-4">
                                <div class="col-6 p-0 pr-1">
                                    <button type="button" id="continueBtn" class="btnRequest btn btn-block customSwapContinueButton2 mt-5">
                                        <?php // echo $translations["M01934"][$language]; /* Preview Swap */ ?>
                                        <?php echo "Back" ?>
                                    </button>                                    
                                </div>
                                <div class="col-6 p-0 pl-1">
                                    <button type="button" id="continueBtn" class="btnRequest btn btn-block customSwapContinueButton mt-5">
                                        <?php // echo $translations["M01934"][$language]; /* Preview Swap */ ?>
                                        <?php echo "Preview" ?>
                                    </button>
                                </div>
                            </div>

                        </div>
				</div>
                
			</div>

			</div>

		</div>
	<?php include 'footerDashboard.php'; ?>
    <!-- Resources -->
    <script src="https://cdn.socket.io/socket.io-3.0.1.min.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

</div>


<?php include 'sharejsDashboard.php'; ?>



</body>
</html>

<script>
    // $("#m_datepicker_5").datepicker({
    //     format: 'yyyy-mm-dd',
    //     orientation:"bottom",
    //     todayHighlight:!0,
    //     templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}
    // });
   
    var divId    = 'transactionHistoryListDiv';
    var tableId  = 'transactionHistoryListTable';
    var pagerId  = 'transactionHistoryPager';
    var btnArray = {};
    var thArray  = Array(
	        // 'Date',
         //    'Currency',
         //    'Withdrawable Amount',
         //    'Destination Address',
         //    'Status'
            '',            
            '<?php echo $translations["M01920"][$language]; /* Currency */?>',            
            '<?php echo $translations["M01921"][$language]; /* Buy/Sell Price */?>',  
            '<?php echo $translations["M01922"][$language]; /* 24h Change */?>',
            '<?php echo $translations["M01923"][$language]; /* 24h High */?>',            
            '<?php echo $translations["M01924"][$language]; /* 24h Low */?>',            
            '',

            // 'You Receive'
        );


    /*
	
        "created_at": "2020-06-25 20:18:40"
        "payer_name": "huiwen123",
        "payer_email_address": "huiwen.thenux@gmail.com",
        "payer_mobile_phone": "+60123456789",
		"transaction_token": "cv13lhxkzU7mAyDY",
        "payment_amount": "10.00000000",
        "payment_currency": "tetherusd",
        "crypto_amount": "0.00000000",
        "status": "success",
	
    */


    var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var dropdownFake;
    var status;
    var walletTypeGraph;
    var walletTypeTransaction;
    var walletType;
    var dataValue;
    var displayName;
    var tableRowDetails = [];
    var symbol_list = [];
    var newList = [];
    var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';
    var supportedCoinList;
    var withdrawalList;
    var data;
        
    var socket = io.connect('<?php echo $sys['socketURL'];?>');
    socket.on('announcements', function(data) {
        console.log('Got announcement:', data.message);
        alert(data.message);
    });    

    socket.on('connection', function(socket) {    

    alert('new connection!');

    // socket.on('ETHBTC', function(data) {
    //     console.log('ETHBTC: ',  data.message);        
    //     socket.broadcast.emit('ETHBTC', data);
    // });
});
    var graphData;
       


    if (hasChangedPassword == 0){
        $.redirect('firstTimeLogin.php');
    }

    $(document).ready(function(){ 

//        status = "success";
        // $("#transactionDate").datepicker({
        //     format      : 'dd/mm/yyyy',
        //     orientation : 'bottom auto',
        //     autoclose   : true
        // });        

        $("#sideSwapImg").attr("src", "images/swap/swap-onselect.png");

        
        // if(`<?php echo $_POST['searchData'] ?>` != "") {            
        //     searchCallBack();

        // } else{            
        //     formData  = {
        //         command     : 'getSwapcoinSupportedCoins',                
        //     };

        //     fCallback = loadWithdrawalListing;            
        //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        // }                

        // formData  = {
        //     // command: 'getWalletType'
        //     // page: pageNumber
        //     command: 'getWalletBalance',
        //     wallet_status: checkWalletStatus
        // };  
        // fCallback = getWalletType;  
        // ajaxSend("scripts/reqPaymentGateway.php", formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $("#successBtn").click(function(){
            status = "success";
            pagingCallBack();
            $("#successBtn").addClass("active");
            $("#pendingBtn").removeClass("active");
        });

        $("#pendingBtn").click(function(){
            status = "pending";
            pagingCallBack();
            $("#pendingBtn").addClass("active");
            $("#successBtn").removeClass("active");
        });



        $("#statusFilter .searchDesign").change(function() {
            pagingCallBack(pageNumber, loadSearch);
        });


        $('#searchTransactionBtn').click(function() {
            // pagingCallBack(pageNumber, loadSearch);
            var myUrl = "<?php echo basename($_SERVER['PHP_SELF']);?>";

            var from, to;
            var from = $("#firstDate").val();
            var to = $("#lastDate").val();

            if ($("#firstDate").val()) {
                from = dateToTimestamp($("#firstDate").val() + " 00:00:00");
            }else{
                from="";
            }
            if ($("#lastDate").val()) {
                to = dateToTimestamp($("#lastDate").val() + " 23:59:59");
            }else{
                to="";
            }

            
            if(pageNumber > 1) bypassLoading = 1;

            var formData = {
                command : 'getTransactionList',
                page: pageNumber,
                status : status,
                from : from,
                to : to
            };

            $.redirect("searchField.php", {
                url: myUrl,
                searchData: JSON.stringify(formData)
            });
        });

        $('#resetTransactionBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $("#status").val("");
            $('#searchTransaction').find('input').each(function() {
               $(this).val(''); 
           	});
        });

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
        $('input[name="start"]').on('apply.daterangepicker', function (ev, picker) {
            $('#firstDate').val(picker.startDate.format('DD/MM/YYYY'));
            $('#lastDate').val(picker.endDate.format('DD/MM/YYYY'));
        });

    });
        
        $('#walletType').change(function() {
           
            // var walletType = $('#walletType').val();
            //coinType = $('#coinType').val();
            pagingCallBack(pageNumber, loadSearch);
        });


    function encrypt(w) {
        return w.substring(0, 6)+"..."+w.substr(w.length-6);
    }

    function pagingCallBack(pageNumber, fCallback){

        var searchId   = 'searchTransaction';
        var searchData = buildSearchDataByType(searchId);
        var from, to;
        var from = $("#firstDate").val();
        var to = $("#lastDate").val();
        var wallet_type = $('select#walletType option:selected').val();

        if ($("#firstDate").val()) {
            // from = dateToTimestamp($("#firstDate").val() + " 00:00:00");
            from = $("#firstDate").val();
            from = moment(from).format('DD/MM/YYYY');
            from = dateToTimestamp(from + " 00:00:00");
        }else{
            from="";
        }
        if ($("#lastDate").val()) {
            // to = dateToTimestamp($("#lastDate").val() + " 23:59:59");
            to = $("#lastDate").val();
            to = moment(to).format('DD/MM/YYYY');
            to = dateToTimestamp(to + " 23:59:59");
        }else{
            to="";
        }

        //walletType = $('#walletType').val();
        walletType = $('select#walletType option:selected').val();
		var name = $("#searchName").val(); 
        var email = $("#searchEmail").val(); 
        var mobileNumber = $("#searchMobileNumber").val(); 

        if(pageNumber > 1) bypassLoading = 1;
        var formData = {
            command : 'getTransactionList',
            page: pageNumber,
            status : status,
            wallet_type: walletType,
            from : from,
            to : to,
			name: name,
			email: email,
			mobile: mobileNumber
        };

        if(!fCallback)
            fCallback = loadWithdrawalListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function searchCallBack(pageNumber, fCallback){

        var searchId   = 'searchSection';
        var searchData = JSON.parse(`<?php echo $_POST['searchData'] ?>`);

        // alert("searchCallBack");


        if(pageNumber > 1) bypassLoading = 1;

        var formData = searchData;
        formData["searchParam"] = "<?php echo $_POST['newSearchVal'] ?>";

		if(formData['from']){
			 $("#firstDate").val(moment.unix(formData['from']).format("DD/MM/YYYY"));
		}
       
		if(formData['to']){
			 $("#lastDate").val(moment.unix(formData['to']).format("DD/MM/YYYY"));
		}
       

        if(formData['status'] == 'success') {
            $("#successBtn").addClass("active");
            $("#pendingBtn").removeClass("active");
        }else{
            $("#pendingBtn").addClass("active");
            $("#successBtn").removeClass("active");
        }

        if(!fCallback)
            fCallback = loadWithdrawalListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadWithdrawalListing(data, message) {
        
        var tableNo;
        // img_list = data.result.crypto_img_list;
        // symbol_list = data.result.crypto_symbol_list;                
        withdrawalList = data.data.coinsList;
        supportedCoinList = data.data.walletTypes;
		// var pageData = data.result;        
        if(withdrawalList && withdrawalList.length > 0) {
        	$('#showErrorMsg').hide();
        	$('#showresultListing').show();
            
            tableRowDetails = [];
            $.each(withdrawalList, function(k, v) {
                // var buildCurrencyIcon = `
                // <img src="images/cryptocurrencies/${v['currency_unit']}.png" class="currencyLogo">

                // `;                
                var buildCurrencyIcon = `
                <img src=${v['image']} class="currencyLogo">
                `;

                var senderAddress = (v['sender_address'] != "") ? v['sender_address'] : '' ;
//                v['sender_address'] = senderAddress;
                tableRowDetails.push(v);

				var payerEmailMobile = '-';
				
				if(v['payer_mobile_phone'] != '-' || v['payer_mobile_phone'] != null){
					payerEmailMobile = v['payer_mobile_phone'];
				}
				else{
					payerEmailMobile = v['payer_email_address'];

                }

                
                var iconDiv = '<div class="btn btn-success" value="'+k+'" onclick="enterSwap('+k+')"> <?php echo $translations["M01919"][$language]; /* Swap */ ?> </div>'
                
                var buildCurrencyIcon = `
                <img src=${v['from_image']} class="currencyLogo"> <img src=${v['image']} class="currencyLogo">`;
                var rebuildData = {
                    currency_icon : buildCurrencyIcon,
                    currency : v['from_symbol']+'-'+v['symbol'],
                    buy_sell_price : v['last_price'],
                    change_24hr : v['change_percent'],
                    high_24hr : v['high'],
					low_24hr: v['low'],					
                    icon: iconDiv
                };

                newList.push(rebuildData);
            });
        }
        else
        {
        	$('#showErrorMsg').show();
        	$('#showresultListing').hide();
        }        

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, pageData.pageNumber, pageData.totalPage, pageData.totalRecord, pageData.numRecord);

        $('#transactionHistoryListDiv').css('paddingLeft','30px');
        $('#transactionHistoryListDiv').css('paddingRight','30px');
        
        $('#'+tableId).find('thead').addClass("whiteBackgroundColor");
        
       	
    }

    function enterSwap(obj){                
        var selectedObj = withdrawalList[obj];           
        $.redirect("swapDetails.php", {selectedObj:selectedObj, supportedCoinList:supportedCoinList });
    }
    

    function redirectEscrowChat(escrow_id) {

        $.redirect('escrowChat.php', {reference_id: escrow_id, type: "receive"});
        
    }

    function dateTimeToDateFormat(dateTimeValue)
    {
    	// Set variable to current date and time
//		const now = new Date(dateTimeValue);
		return moment(dateTimeValue).format('lll');
    }

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

    function loadSearch(data, message) {
        loadWithdrawalListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations["M00334"][$language]; /* Search Successful */ ?>.</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }    


    function getWalletType(data, message){
    	// if(data.result.coin_data && dropdownFake !=1) {

            if(data.data && dropdownFake !=1) {
            $('#walletType').empty();
            $('#walletType').append('<option value=""> <?php echo $translations["M01486"][$language]; /* All */?> </option>');
            $.each(data.data.wallet_list, function(key, val) {
                $('#walletType').append('<option data-image="'+val['image']+'" value="'+ val['currency_id'] +'">'+ val['symbol'] +'</option>')
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

        $('#walletType').select2({
            dropdownAutoWidth : true,
            templateResult: formatState,
            templateSelection: formatState
        });
    }

    // start of graph
    am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    var chart = am4core.create("chartdiv", am4charts.XYChart);
    chart.hiddenState.properties.opacity = 0;

    chart.padding(0, 0, 0, 0);

    chart.zoomOutButton.disabled = true;

    var data = [];
    var visits = 10;
    var i = 0;

    // for (i = 0; i <= 30; i++) {
        // visits -= Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
        console.log('push');
        data.push({ date: new Date(), value: 0.03068500 });        
    // }

    chart.data = data;
    console.log(i);

    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.grid.template.location = 0;
    dateAxis.renderer.minGridDistance = 30;
    dateAxis.dateFormats.setKey("second", "ss");
    dateAxis.periodChangeDateFormats.setKey("second", "[bold]h:mm a");
    dateAxis.periodChangeDateFormats.setKey("minute", "[bold]h:mm a");
    dateAxis.periodChangeDateFormats.setKey("hour", "[bold]h:mm a");
    dateAxis.renderer.inside = true;
    dateAxis.renderer.axisFills.template.disabled = true;
    dateAxis.renderer.ticks.template.disabled = true;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.tooltip.disabled = true;
    valueAxis.interpolationDuration = 500;
    valueAxis.rangeChangeDuration = 500;
    valueAxis.renderer.inside = true;
    valueAxis.renderer.minLabelPosition = 0.05;
    valueAxis.renderer.maxLabelPosition = 0.95;
    valueAxis.renderer.axisFills.template.disabled = true;
    valueAxis.renderer.ticks.template.disabled = true;

    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.dateX = "date";
    series.dataFields.valueY = "value";
    series.interpolationDuration = 500;
    series.defaultState.transitionDuration = 0;
    series.tensionX = 0.8;

    chart.events.on("datavalidated", function () {
        dateAxis.zoom({ start: 1 / 15, end: 1.2 }, false, true);
    });

    dateAxis.interpolationDuration = 500;
    dateAxis.rangeChangeDuration = 500;

    // document.addEventListener("visibilitychange", function() {
    //     if (document.hidden) {
    //         if (interval) {
    //             clearInterval(interval);
    //         }
    //     }
    //     else {
    //         startInterval();
    //     }
    // }, false);

    // add data

    socket.on('ETHBTC', function(data) {        
        graphData = data.message;
        if(chart.data.length>25){
            chart.addData(
                { date: graphData.time , value: graphData.last_price },
                1
            );
        } else {                
            chart.addData(
                { date: graphData.time , value: graphData.last_price }
            );
        }         
    }); 

    // var interval;
    // function startInterval() {
    //     interval = setInterval(function() {
    //         visits =
    //             visits + Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 5);
    //         var lastdataItem = series.dataItems.getIndex(series.dataItems.length - 1);            
    //         if(chart.data.length>50){
    //             chart.addData(
    //                 { date: new Date(lastdataItem.dateX.getTime() + 1000), value: visits },
    //                 1
    //             );
    //         } else {                
    //             chart.addData(
    //                 { date: new Date(lastdataItem.dateX.getTime() + 1000), value: visits }                
    //             );
    //         }            
    //     }, 1000);
    // }

    // startInterval();

    // all the below is optional, makes some fancy effects
    // gradient fill of the series
    series.fillOpacity = 1;
    var gradient = new am4core.LinearGradient();
    gradient.addColor(chart.colors.getIndex(0), 0.2);
    gradient.addColor(chart.colors.getIndex(0), 0);
    series.fill = gradient;

    // this makes date axis labels to fade out
    dateAxis.renderer.labels.template.adapter.add("fillOpacity", function (fillOpacity, target) {
        var dataItem = target.dataItem;
        return dataItem.position;
    })

    // need to set this, otherwise fillOpacity is not changed and not set
    dateAxis.events.on("validated", function () {
        am4core.iter.each(dateAxis.renderer.labels.iterator(), function (label) {
            label.fillOpacity = label.fillOpacity;
        })
    })

    // this makes date axis labels which are at equal minutes to be rotated
    dateAxis.renderer.labels.template.adapter.add("rotation", function (rotation, target) {
        var dataItem = target.dataItem;
        if (dataItem.date && dataItem.date.getTime() == am4core.time.round(new Date(dataItem.date.getTime()), "minute").getTime()) {
            target.verticalCenter = "middle";
            target.horizontalCenter = "left";
            return -90;
        }
        else {
            target.verticalCenter = "bottom";
            target.horizontalCenter = "middle";
            return 0;
        }
    })

    // bullet at the front of the line
    var bullet = series.createChild(am4charts.CircleBullet);
    bullet.circle.radius = 5;
    bullet.fillOpacity = 1;
    bullet.fill = chart.colors.getIndex(0);
    bullet.isMeasured = false;

    series.events.on("validated", function() {
        bullet.moveTo(series.dataItems.last.point);
        bullet.validatePosition();
    });

    }); // end am4core.ready()
    // end of graph
    
</script>

<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        position: relative;
        padding: 0px 30px 0px 10px;
        line-height: 30px;
    }

    .select2 {
        width: 222px!important;
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
