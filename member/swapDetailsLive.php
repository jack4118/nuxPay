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
                <img src="<?php echo $_POST['selectedObj']['image'];?>" class="currencyLogo">  </img> &nbsp <?php echo $_POST['selectedObj']['display_symbol'];?>  
                </div>   
                <div id="logoHeader" class="col-md-6 col-12 pageHeader mb-0 px-0">
                </div>                                      

                <div class="col-12 ml-0 pl-0 pt-2 pb-5" style="display: block">
                    <div class="">
                    <a href="swapListing.php"> < <?php echo $translations["M01948"][$language]; /* Back */ ?>  </a>
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

                            <div class="row">
                            
                                <div class="col-md-6 col-12" id="btnInterval">
                                    <div class="btn-group pl-3" role="group" aria-label="First group">
                                        <button id="btn1m" type="button" class="btn btn-secondary customBtnLiveActive customBtnLive" val="1m">
                                            1M 
                                        </button>
                                        <button id="btn5m" type="button" class="btn btn-secondary customBtnLive" val="5m">
                                            5M
                                        </button>
                                        <button id="btn1h" type="button" class="btn btn-secondary customBtnLive" val="1h">
                                            1H
                                        </button>
                                        <button id="btn1d" type="button" class="btn btn-secondary customBtnLive" val="1d">
                                            1D
                                        </button>
                                        <button id="btn1w" type="button" class="btn btn-secondary customBtnLive" val="1w">
                                            1W
                                        </button>
                                        <button id="btn1mt" type="button" class="btn btn-secondary customBtnLive" val="1mt">
                                            1MON
                                        </button>
                                    </div>
                                </div>
                                    <div class="col-md-6 col-12 text-right" id="btnGraph">
                                        <button id="btnKline" type="button" class="btn btn-secondary customBtnLiveActive1 customBtnLive">
                                            Candlestick
                                        </button>
                                        <button id="btnLine" type="button" class="btn btn-secondary customBtnLive">
                                            Line
                                        </button>                                        
                                    </div>
                                </div>

                            

                            <div class="row p-0" >
                                <div class="col-12" style="border-bottom: 1px solid #ebedf2;">
                                </div>
                            </div>

                            <div class="row pl-4 pr-4">
                                <div id="chartdiv" class="col-12 p-0 my-1" style="width: 100%; height: 500px;">
                                    
                                </div>
                            </div>
                            <div class="row px-4 pt-4 pb-1 pl-5 pr-4 customSwapHeading" id = "aboutTitle">   

                            </div>

                            <div class="row px-4 py-1 pl-5  pr-5 text-justify customSwapParagraph" id = "aboutDesc">                                             
                            </div>
                        </div>     
                        
                        <div class="col-xl-4 col-md-4"> 
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
                                    <input id="fromAmountInput" type="text" class="form-control rounded-left" aria-label="Text input with dropdown button" placeholder="Enter amount to swap" onkeyup="calculateToSwap()" autocomplete="no">
                                    <div id="dropdownFromUp" class="input-group-append">
                                        <button id="dropdownFromBottom" class="btn dropdown-toggle customSwapButton rounded-right" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:160px" value="<?php echo $_POST['selectedObj']['from_wallet_type']?>">                                        
                                        <img class="walletTypeIcon" src="<?php echo $_POST['supportedCoinList'][ $_POST['selectedObj']['from_wallet_type'] ]['image']?>"></img> 
                                            <?php echo $_POST['selectedObj']['display_from_symbol']?> &nbsp
                                        </button>   
                                        <div id="dropdownFrom" class="dropdown-menu">                                                                                                                        
                                        </div>                                   
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
                                    <input id="toAmountInput" type="text" class="form-control rounded-left" aria-label="Text input with dropdown button" placeholder="Enter amount to receive" onkeyup="calculateFromSwap()">
                                    <div id="dropdownToUp" class="input-group-append">
                                        <button id="dropdownToBottom" class="btn dropdown-toggle customSwapButton rounded-right" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:160px" value="<?php echo $_POST['selectedObj']['wallet_type']?>">
                                            <img class="walletTypeIcon" src="<?php echo $_POST['selectedObj']['image']?>"></img> 
                                            <?php echo $_POST['selectedObj']['display_symbol']?> &nbsp
                                        </button>     
                                        <div id="dropdownTo" class="dropdown-menu">                                        
                                        
                                        </div>                                   
                                    </div>
                                </div>                            
                            </div>

                            <div class="row justify-content-between pt-5 px-3">
                                <div class="col-3 text-left p-0 customSwapBoldSmall">
                                Price
                                </div>
                                <div class="col-9 text-right customSwapSmall">
                                    <span id="exchangeRate" class="customSwapLight"> 
                                        <!-- 1 USDT = 0.00002632 BTC  -->
                                    </span>
                                </div>
                            </div>

                            <div class="row justify-content-between pt-2 px-3">
                                <div id="divReceiveSpend" class="col-6 text-left p-0 customSwapBoldSmall">
                                    <?php // echo $translations["M01949"][$language]; /* You will receive */ ?>
                                </div>
                                <div class="col-6 text-right customSwapSmall">
                                    <span id="receive" class="customSwapLightColor"> 
                                        <!-- 0.00005321 BTC  -->
                                    </span>
                                </div>
                            </div>

                            <div class="row justify-content-between pt-3 px-3 pb-4">
                                <div class="col-6 p-0 pr-1">
                                    <button type="button" id="continueBtn" class="btnRequest btn btn-block customSwapContinueButton2 mt-5">
                                        <?php // echo $translations["M01934"][$language]; /* Preview Swap */ ?>
                                        <?php echo "Refresh" ?>
                                    </button>                                    
                                </div>
                                <div class="col-6 p-0 pl-1">
                                    <button type="button" id="swapBtn" class="btnRequest btn btn-block customSwapContinueButton mt-5">
                                        <?php // echo $translations["M01934"][$language]; /* Preview Swap */ ?>
                                        <?php echo "Preview" ?>
                                    </button>
                                </div>
                            </div>

                        </div>
				</div>
                
			</div>

			</div>
            <div id="holdCommonSymbol" value="<?php echo $_POST['selectedObj']['common_symbol'];?>">
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


    var url             = 'scripts/reqSwap.php';
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
    var supportedCoinList = JSON.parse('<?php echo json_encode($_POST['supportedCoinList']); ?>');
    var selectedObj = JSON.parse('<?php echo json_encode($_POST['selectedObj']); ?>');
    var withdrawalList;
    var data;
    var common_symbol ="<?php echo $_POST['selectedObj']['common_symbol'];?>";
    var interval = "1m"
    var eventName = common_symbol.toLowerCase()+"@kline_"+interval;    
    var confirmed = 0;    
    var referenceID;
    var first = 0;
    var curRate;
    var cusFrom = 0;
    var cusTo = 0;
    var graphLoad = 0;
    var lastGraphData;
    var oldLineGraphData =[];
    var maxGraphData = 15;
        
    // var socket = io.connect('http://localhost:8079');
    var socket = io.connect('<?php echo $sys['socketURL'];?>');
    socket.on('announcements', function(data) {
                
    });    

    socket.on('connection', function(socket) {    
    });
    var graphData;
       


    if (hasChangedPassword == 0){
        $.redirect('firstTimeLogin.php');
    }

    $(document).ready(function(){         

        socket.on(common_symbol.toLowerCase()+'@ticker', function(data) {            
            graphData = data.message;

            if(oldLineGraphData.length > maxGraphData) {
                oldLineGraphData.pop();
            }
            oldLineGraphData.push( { date: new Date(graphData.time) , value: parseFloat(graphData.last_price) } )            
        }); 
        
        $('#btnInterval').hide()
        $('#btnGraph').removeClass('col-6');
        $('#btnGraph').addClass('col-12');
        $('#btnGraph').removeClass('col-md-6');
        $('#btnGraph').addClass('col-md-12');
        $( ".customBtnLiveActive1" ).removeClass('customBtnLiveActive1');
        $('#btnLine').addClass('customBtnLiveActive1');
        buildGraphLine();

        // buildGraph();    

        $("#sideSwapLi").addClass('activeNav');        
        $("#sideSwapImg").attr("src", "images/swap/swap-onselect.png");

        formData = {
            command: 'getWalletBalance',
            wallet_status: 1
        };
        fCallback = setBalance;
        ajaxSend('<?php echo $sys['domain']?>/scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, 1, 0);        

        var from_wallet_type = $('#dropdownFromBottom').val();
        var to_wallet_type = $('#dropdownToBottom').val();                


        confirmed = 0;
        $('#swapBtn').text('Swap');
        $('#fromAmountInput').val('');        
        $('#fromAmountInput').attr("readonly", false);
        $('#toAmountInput').val('');        
        $('#toAmountInput').attr("readonly", false);        

        var formData = {
            command : 'getSwapPreview',
            from_wallet_type: from_wallet_type.trim(),            
			to_wallet_type: to_wallet_type.trim()
        };
                
        fCallback = loadSwap;
        
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);        

        var fromAmountInput = document.getElementById("fromAmountInput");
        fromAmountInput.oninput = function () {
            document.getElementById("toAmountInput").disabled = this.value != "";
            this.value = this.value.replace(/[^0-9].[^0-9]/g, '').replace(/(\..*)\./g, '$1');
        };

        var fromAmountInput = document.getElementById("toAmountInput");
        fromAmountInput.oninput = function () {
            document.getElementById("fromAmountInput").disabled = this.value != "";
            this.value = this.value.replace(/[^0-9].[^0-9]/g, '').replace(/(\..*)\./g, '$1');
        };

        aboutLable(selectedObj.display_symbol);
        //            
    });
    
    function aboutLable(param) {
        var aboutTitle;
        var aboutDesc;
        if (param == "BTC") {
            aboutTitle = "About BTC";
            aboutDesc = "The world's first cryptocurrency, Bitcoin is stored and exchanged securely on the "+
                        "internet through a digital ledger known as blockchain. Bitcoins are divisible into smaller "+
                        "units known as satoshi - each satoshi is worth 0.00000001 bitcoin.";
        }else if(param == "ETH"){
            aboutTitle = "About ETH";
            aboutDesc = "Ethereum is a decentralized open-source blockchain system that features its own "+
                        "cryptocurrency, Ether. ETH works as a platform for numerous other cryptocurrencies, "+
                        "as well as for the execution of decentralized smart contracts."+
                        "<br><br>"+
                        "Ethereum was first described in a 2013 whitepaper by Vitalik Buterin. Buterin, along with "+
                        "other co-founders, secured funding for the project in an online public crowd sale in the "+
                        "summer of 2014 and officially launched the blockchain on July 30, 2015. "+
                        "<br><br>"+
                        "Ethereum’s own purported goal is to become a global platform for "+
                        "decentralized applications, allowing users from all over the world to write and run software that "+
                        "is resistant to censorship, downtime and fraud.";
        }else if(param == "USDT (ERC20)"){
            aboutTitle = "About USDT (ERC20)";
            aboutDesc = "USDT is a stablecoin (stable-value cryptocurrency) that mirrors the price of the U.S. dollar, "+
                        "issued by a Hong Kong-based company Tether. The token’s peg to the USD is achieved via maintaining "+
                        "a sum of dollars in reserves that is equal to the number of USDT in circulation."+
                        "<br><br>"+
                        "Originally launched in July 2014 as Realcoin, a second-layer cryptocurrency token built on top of "+
                        "Bitcoin’s blockchain through the use of the Omni platform, it was later renamed to USTether, and then, "+
                        "finally, to USDT. In addition to Bitcoin’s, USDT was later updated to work on the Ethereum, EOS, Tron, "+
                        "Algorand, and OMG blockchains."+
                        "<br><br>"+
                        "The stated purpose of USDT is to combine the unrestricted nature of cryptocurrencies — which can be sent "+
                        "between users without a trusted third-party intermediary — with the stable value of the US dollar.";
        }
        else if(param=="FIL"){
            aboutTitle="About Filecoin";
            aboutDesc ="Filecoin is open protocol and backed by a blockchain that records commitments made by the network’s participants, with transactions made using FIL, the blockchain’s native currency. The blockchain is based on both proof-of-replication and proof-of-spacetime.";
        }
        document.getElementById("aboutTitle").innerHTML = aboutTitle;
        document.getElementById("aboutDesc").innerHTML = aboutDesc;
    }

    function start_socket(commonSymbol) {
        

        socket.off(commonSymbol.toLowerCase()+'@kline_1d');        
        socket.on(commonSymbol.toLowerCase()+'@kline_1d', function(data) {                        
            var socketData = data.message;
            var change = (socketData.close - socketData.open) / socketData.close * 100;
            $('#last_price').text( thousands_separators(parseFloat(socketData.close).toFixed(2)) )   
            $('#change_percent').text(thousands_separators(change.toFixed(2))+"%")   
            $('#high').text( thousands_separators(parseFloat(socketData.high).toFixed(2)) )   
            $('#low').text( thousands_separators(parseFloat(socketData.low).toFixed(2)) )   

            var color;
            if(change > 0) {
                color = 'green'
            } else if (change < 0){
                color = 'red'
            } else {
                color = 'black'
            }

            $('#change_percent').css("color", color);            
            // $('#'+tableID+'2').text(parseInt( socketData.last_price ).toLocaleString())   
        }); 
    } 

    function thousands_separators(num)
    {
        var num_parts = num.toString().split(".");
        num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return num_parts.join(".");
    }

    $('#btnKline').click(function () {
            $('#btnInterval').show()
            $('#btnGraph').removeClass('col-12');
            $('#btnGraph').addClass('col-6');
            $('#btnGraph').removeClass('col-md-12');
            $('#btnGraph').addClass('col-md-6');
            $( ".customBtnLiveActive1" ).removeClass('customBtnLiveActive1');
            $('#btnKline').addClass('customBtnLiveActive1');
            buildGraph();
        }) 

        $('#btnLine').click(function () {
            $('#btnInterval').hide()
            $('#btnGraph').removeClass('col-md-6');
            $('#btnGraph').addClass('col-md-12');
            $('#btnGraph').removeClass('col-6');
            $('#btnGraph').addClass('col-12');
            $( ".customBtnLiveActive1" ).removeClass('customBtnLiveActive1');
            $('#btnLine').addClass('customBtnLiveActive1');
            buildGraphLine();
        }) 

        $('#btn1m').click(function () {
            socket.off(common_symbol.toLowerCase()+interval);
            interval = "1m";
            eventName = common_symbol.toLowerCase()+"@kline_"+interval;
            // socket.disconnect();
            $( ".customBtnLiveActive" ).removeClass('customBtnLiveActive');
            $('#btn1m').addClass('customBtnLiveActive');
            buildGraph();
        })

        $('#btn5m').click(function () {
            socket.off(common_symbol.toLowerCase()+interval);
            interval = "5m";
            eventName = common_symbol.toLowerCase()+"@kline_"+interval;
            // socket.disconnect();
            $( ".customBtnLiveActive" ).removeClass('customBtnLiveActive');
            $('#btn5m').addClass('customBtnLiveActive');
            buildGraph();
        })
        
        $('#btn1h').click(function () {
            socket.off(common_symbol.toLowerCase()+interval);
            interval = "1h";
            eventName = common_symbol.toLowerCase()+"@kline_"+interval;
            // socket.disconnect();
            $( ".customBtnLiveActive" ).removeClass('customBtnLiveActive');
            $('#btn1h').addClass('customBtnLiveActive');
            buildGraph();
        })

        $('#btn1d').click(function () {
            socket.off(common_symbol.toLowerCase()+interval);
            interval = "1d";
            eventName = common_symbol.toLowerCase()+"@kline_"+interval;
            // socket.disconnect();
            $( ".customBtnLiveActive" ).removeClass('customBtnLiveActive');
            $('#btn1d').addClass('customBtnLiveActive');
            buildGraph();
        })


        $('#btn1w').click(function () {
            socket.off(common_symbol.toLowerCase()+interval);
            interval = "1w";
            eventName = common_symbol.toLowerCase()+"@kline_"+interval;
            // socket.disconnect();
            $( ".customBtnLiveActive" ).removeClass('customBtnLiveActive');
            $('#btn1w').addClass('customBtnLiveActive');
            buildGraph();
        })

        $('#btn1mt').click(function () {
            socket.off(common_symbol.toLowerCase()+'1M');
            interval = "1mt";
            eventName = common_symbol.toLowerCase()+"@kline_"+interval;            
            $( ".customBtnLiveActive" ).removeClass('customBtnLiveActive');
            $('#btn1mt').addClass('customBtnLiveActive');
            buildGraph();
        })

    function calculateToSwap() { 
        $('#divReceiveSpend').text('<?php echo $translations["M01949"][$language]; /* You will receive */ ?>');
        var userInput = sanitize($('#fromAmountInput').val());
        var to_wallet_type = $('#dropdownToBottom').text().toUpperCase();
        var finalAmount =   (userInput * curRate).toFixed(6);          
        $('#receive').text(finalAmount+" "+to_wallet_type);        
    }

    function calculateFromSwap() {
        $('#divReceiveSpend').text('<?php echo $translations["M01965"][$language]; /* You will spend */ ?>')
        var userInput = sanitize($('#toAmountInput').val());
        var to_wallet_type = $('#dropdownToBottom').text().toUpperCase();
        var from_wallet_Type = $('#dropdownFromBottom').text().toUpperCase();
        var finalAmount =   (userInput / curRate).toFixed(6);          
        $('#receive').text(finalAmount+" "+from_wallet_Type);        
    }

    function preview(){
        var from_wallet_type = $('#dropdownFromBottom').val();
        var to_wallet_type = $('#dropdownToBottom').val();
        
        // $('#exchangeRateDiv').hide();
        // $('#receiveDiv').hide();
        
        confirmed = 0;
        $('#swapBtn').text('Swap');
        $('#fromAmountInput').val('');        
        $('#fromAmountInput').attr("readonly", false);
        $('#toAmountInput').val('');        
        $('#toAmountInput').attr("readonly", false);
        $('#continueBtn').text('Refresh');

        var formData = {
            command : 'getSwapPreview',
            from_wallet_type: from_wallet_type.trim(),            
			to_wallet_type: to_wallet_type.trim()
        };

        fCallback = loadSwap;
        
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);        
    }    

    function loadSwap(data, message) {                
        var swapData = data.data;        
        
        
        // var last_price = (Math.round(swapData.last_price * 100) / 100).toFixed(2);
        // var change_percent = (Math.round(swapData.change_percent * 100) / 100).toFixed(2);
        // var high = (Math.round(swapData.high * 100) / 100).toFixed(2);
        // var low = (Math.round(swapData.low * 100) / 100).toFixed(2);
        var last_price = swapData.last_price;
        var change_percent = swapData.change_percent;
        var high = swapData.high;
        var low = swapData.low;

        $('#last_price').text(last_price);
        $('#change').text(change_percent);
        $('#high').text(high);
        $('#low').text(low);
        
        socket.off(common_symbol.toLowerCase()+'@kline_1d');
        common_symbol = swapData.commonSymbol;

        start_socket(common_symbol)

        // socket.on(common_symbol.toLowerCase()+'@ticker', function(data) {     
        //     lastGraphData = data.message;            
        // })

        eventName = common_symbol.toLowerCase()+"@kline_"+interval;        
        if(graphLoad == 0) {
            graphLoad = 1;
        } else {
            oldLineGraphData =[]
            $('#btnInterval').hide()
            $('#btnGraph').removeClass('col-md-6');
            $('#btnGraph').addClass('col-md-12');
            $('#btnGraph').removeClass('col-6');
            $('#btnGraph').addClass('col-12');
            $( ".customBtnLiveActive1" ).removeClass('customBtnLiveActive1');
            $('#btnLine').addClass('customBtnLiveActive1');
            buildGraphLine();            
        }
        

        var fromWalletType = $('#dropdownFromBottom').text();
        var toWalletType = $('#dropdownToBottom').text();
        var exchangeRateText = "1 "+fromWalletType+" ≈ "+swapData.system_buy_rate+" "+toWalletType+" ";
        $('#exchangeRate').text(exchangeRateText);
        curRate = swapData.system_buy_rate;
        // var excludeWallet = selectedObj.wallet_type;     
        var excludeWallet = $('#dropdownToBottom').val();
        $('#dropdownTo').html('')        
        buildDropDownSpecific(excludeWallet,'dropdownTo', swapData.availableToCurrency); 
        aboutLable((toWalletType).trim());
        
        if (first == 0){
            excludeWallet = selectedObj.from_wallet_type;
            buildDropDown(excludeWallet,'dropdownFrom');
            first = 1;            
        }

        $('#change_percent').css("color", swapData.color);
        
        var logoDiv = '<img src="'+swapData.image+'" class="currencyLogo">  </img> &nbsp '+swapData.symbol.toUpperCase();
        $('#logoHeader').html(logoDiv);

        if(cusFrom == 0){
            $("#dropdownFrom a").on('click', function(){                     
                var newText = $(this).text();                
                var to_wallet_type = $('#dropdownToBottom').text().trim(); 
                if(to_wallet_type == newText.trim() ) {                    

                    // swap places
                    var newValue;
                    var previousWallet;
                    var newCurrencyId;
                    
                    var oldHtml = $("#dropdownFromUp .btn:first-child").html();
                    var oldVal = $("#dropdownFromUp .btn:first-child").val();   

                    var otherHtml = $("#dropdownToUp .btn:first-child").html();
                    var otherVal = $("#dropdownToUp .btn:first-child").val();                                    

                    for (key in supportedCoinList){                
                        var str1 = String(supportedCoinList[key].display_symbol.toUpperCase()).trim();
                        var str2 = String(newText).trim();                
                        if( str1 == str2 ) {
                            previousWallet = supportedCoinList[key].currency_id;
                            newCurrencyId = key;                            
                        }
                    }
                    
                    $("#dropdownFromUp .btn:first-child").html($(this).html());
                    $("#dropdownFromUp .btn:first-child").val( newCurrencyId.trim() );
                    
                    $("#dropdownToUp .btn:first-child").html(oldHtml);
                    $("#dropdownToUp .btn:first-child").val(oldVal );

                    $(this).html(oldHtml);
                    $(this).val(oldVal);
                    const currentWallet = $("#dropdownFromUp .btn:first-child").val();                                                
                                
                    for(key in balanceCopy){
                        var str11 = String(balanceCopy[key].currency_id).trim();
                        var str22 = String(newCurrencyId).trim();    
                        if(str11 == str22) {
                            $('#balance').text(balanceCopy[key].balance);                    
                        }                
                    }    
                    preview();    

                    return '';
                }     
                
                var newValue;
                var previousWallet;
                var newCurrencyId;
                var oldHtml = $("#dropdownFromUp .btn:first-child").html();
                var oldVal = $("#dropdownFromUp .btn:first-child").val();                
                for (key in supportedCoinList){                
                    var str1 = String(supportedCoinList[key].display_symbol.toUpperCase()).trim();
                    var str2 = String(newText).trim();                
                    if( str1 == str2 ) {
                        previousWallet = supportedCoinList[key].currency_id;
                        newCurrencyId = key;
                    }
                }                        
                $("#dropdownFromUp .btn:first-child").html($(this).html());
                $("#dropdownFromUp .btn:first-child").val( newCurrencyId.trim() );
                $(this).html(oldHtml);
                $(this).val(oldVal);
                const currentWallet = $("#dropdownFromUp .btn:first-child").val();                                                
                            
                for(key in balanceCopy){
                    var str11 = String(balanceCopy[key].currency_id).trim();
                    var str22 = String(newCurrencyId).trim();    
                    if(str11 == str22) {
                        $('#balance').text(balanceCopy[key].balance);                    
                    }                
                }    
                preview();    
            });
            cusFrom = 1;
        }

            $("#dropdownTo a").on('click', function(){                        
                var newText = $(this).text();
                var newValue;
                var previousWallet;
    
                var oldHtml = $("#dropdownToUp .btn:first-child").html();
                var oldVal = $("#dropdownToUp .btn:first-child").val();                                
                for (key in supportedCoinList){                
                    var str1 = String(supportedCoinList[key].display_symbol.toUpperCase()).trim();
                    var str2 = String(newText).trim();                
                    if( str1 == str2 ) {
                        previousWallet = supportedCoinList[key].currency_id;
                        newCurrencyId = key;
                    }
                }                        
                $("#dropdownToUp .btn:first-child").html($(this).html());
                $("#dropdownToUp .btn:first-child").val( newCurrencyId.trim() );
                $("#dropdownToBottom").val( newCurrencyId.trim() );
                $(this).html(oldHtml);
                $(this).val(oldVal);
                const currentWallet = $("#dropdownToUp .btn:first-child").val();                                    
                preview();
            });
        
    }

    $('#swapBtn').click(function() {
        var from_wallet_type = $('#dropdownFromBottom').val();
        var to_wallet_type = $('#dropdownToBottom').val();
        var from_amount = sanitize($('#fromAmountInput').val());
        var to_amount = sanitize($('#toAmountInput').val());        
        
        

        $('#continueBtn').text('Refresh');


        if (confirmed == 0) {
            var formData = {
                command : 'estimateSwapcoinRate',
                from_wallet_type: from_wallet_type.trim(),            
                to_wallet_type: to_wallet_type.trim(),
                from_amount: from_amount.trim(),
                to_amount: to_amount.trim()
            };
                    
            fCallback = makeSwap;
            
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);        
        } else {
            var formData = {
                command : 'swapcoinSwap',            
                reference_id : referenceID
            };     
            fCallback = loadCompleteSwap;            
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
    });

    function loadCompleteSwap(data, message) {                        
        $.redirect('swapHistory.php');
    }

    function makeSwap(data, message) {                        
        var dataOut = data.data;
        referenceID = dataOut.referenceID;

            $('#toAmountInput').val(dataOut.toAmount);
            $('#swapBtn').text('<?php echo $translations["M00981"][$language]; /* Confirm */ ?>');
            confirmed = 1;     
            $('#toAmountInput').attr('readonly','readonly');
            $('#fromAmountInput').attr('readonly','readonly');       
            var exchangeRateString = "1 "+dataOut.fromSymbol+" =  "+dataOut.exchangeRate+" "+dataOut.toSymbol;
            $('#exchangeRate').text(exchangeRateString);
            $('#receive').text(dataOut.toAmount+" "+dataOut.toSymbol);
            $('#exchangeRateDiv').show();
            $('#receiveDiv').show();
    }

    $('#continueBtn').click(function(){        

        var from_wallet_type = $('#dropdownFromBottom').val();
        var to_wallet_type = $('#dropdownToBottom').val();

        // $('#exchangeRateDiv').hide();
        // $('#receiveDiv').hide();

        confirmed = 0;
        $('#swapBtn').text('Swap');
        $('#fromAmountInput').val('');        
        $('#fromAmountInput').attr("readonly", false);
        $('#toAmountInput').val('');        
        $('#toAmountInput').attr("readonly", false);
        $('#continueBtn').text('Refresh');
        $('#receive').text('');
        $('#divReceiveSpend').text('')

        document.getElementById("toAmountInput").disabled = this.value != "";
        document.getElementById("fromAmountInput").disabled = this.value != "";        

        var formData = {
            command : 'getSwapPreview',
            from_wallet_type: from_wallet_type.trim(),            
            to_wallet_type: to_wallet_type.trim()
        };
                
        fCallback = loadSwap;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);        
    });


    function buildDropDownSpecific(excludeWallet, selectedId, coinList){
        // $('#'+selectedId).html('');
        for (key in coinList){            
            if(key == excludeWallet){
                continue;
            }
                        
            addDiv = '<a class="dropdown-item" href="#" value="'+key+'" onclick="return false;">';
            addDiv += '<img class="walletTypeIcon" src="'+coinList[key].image+'"></img> ';
            // addDiv += ''+coinList[key].symbol.toUpperCase()+' &nbsp </a>  ';        
            addDiv += ''+coinList[key].display_symbol.toUpperCase()+' &nbsp </a>  ';                
            $('#'+selectedId).append(addDiv);            
            
        }
    }

    function buildDropDown(excludeWallet, selectedId){        
        // $('#'+selectedId).html('');
        for (key in supportedCoinList){
            if(key == excludeWallet){
                continue;
            }
                        
            addDiv = '<a class="dropdown-item" href="#" value="'+key+'" onclick="return false;">';
            addDiv += '<img class="walletTypeIcon" src="'+supportedCoinList[key].image+'"></img> ';
            // addDiv += ''+supportedCoinList[key].symbol.toUpperCase()+' &nbsp </a>  ';              
            addDiv += ''+supportedCoinList[key].display_symbol.toUpperCase()+' &nbsp </a>  ';                
            $('#'+selectedId).append(addDiv);
        }
    }
        
    function setBalance(data, message) {
        balanceCopy = data.data.wallet_list;  
        const currentWallet = $("#dropdownFromUp .btn:first-child").val();
        for(key in balanceCopy){
            var str11 = String(balanceCopy[key].currency_id).trim();
            var str22 = String(currentWallet).trim();    
            if(str11 == str22) {
                $('#balance').text(balanceCopy[key].balance);                                    
            }
                
            }       
        
    }   

    function encrypt(w) {
        return w.substring(0, 6)+"..."+w.substr(w.length-6);
    }    

    function dateTimeToDateFormat(dateTimeValue)
    {
    	// Set variable to current date and time
//		const now = new Date(dateTimeValue);
		return moment(dateTimeValue).format('lll');
    }


    function loadSearch(data, message) {
        loadWithdrawalListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations["M00334"][$language]; /* Search Successful */ ?>.</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }     

    function buildGraphLine() {
        interval = "1m"

        am4core.disposeAllCharts();        
        socket.off('request');
        socket.off(eventName);                
        
        socket.off(common_symbol.toLowerCase()+'@ticker')
        
        // socket.emit('request', {table: 'graph_data_'+interval, common_symbol: common_symbol.toLowerCase()});                

        am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        var chart = am4core.create("chartdiv", am4charts.XYChart);
        chart.hiddenState.properties.opacity = 0;

        chart.padding(0, 0, 0, 0);

        chart.zoomOutButton.disabled = true;

        // var pushData = []
        // var firstLine = true;
            
        // socket.on('request', function(data) {                    
        //     console.log(data.length)
        //     for (var j = 19; j<data.length ; j++){
        //         console.log(pushData);
        //         pushData.push({                    
        //             "date": new Date(data[j].date),                    
        //             "value": data[j].close  
        //         })
        //     }
        //     chart.data = pushData;
        //     socket.off('request');
        //     firstLine = false;
        // });       
        chart.data = oldLineGraphData 

        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
        dateAxis.renderer.grid.template.location = 0;
        dateAxis.renderer.minGridDistance = 30;
        dateAxis.dateFormats.setKey("second", "hh:mm:ss");
        dateAxis.periodChangeDateFormats.setKey("second", "[bold]h:mm a");
        dateAxis.periodChangeDateFormats.setKey("minute", "[bold]h:mm a");
        dateAxis.periodChangeDateFormats.setKey("hour", "[bold]h:mm a");
        dateAxis.renderer.inside = true;
        dateAxis.renderer.axisFills.template.disabled = true;
        dateAxis.renderer.ticks.template.disabled = true;
        dateAxis.gridIntervals.setAll([
            { timeUnit: "second", count: 1 },				
            ]);

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
        series.interpolationDuration = 1000;
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
        
        
        socket.on(common_symbol.toLowerCase()+'@ticker', function(data) {            
            graphData = data.message;     

            if(chart.data.length>maxGraphData){
                chart.addData(
                    { date: new Date(graphData.time) , value: parseFloat(graphData.last_price) },
                    1
                );
            } else {                
                chart.addData(
                    { date: new Date(graphData.time) , value: parseFloat(graphData.last_price) }
                );
            }
            oldLineGraphData = chart.data;
        }); 

        // add data
        // var interval;
        // function startInterval() {
            
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
    }
    
    var oldData;    
    // start of graph
    function buildGraph() {        

        am4core.disposeAllCharts();        
        socket.off('request');
        socket.off(eventName);        
        
        socket.emit('request', {table: 'graph_data_'+interval, common_symbol: common_symbol.toLowerCase()});                
        
        if(interval == '1mt'){
            interval = '1M';
        }        

        am4core.ready(function() {            
            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.paddingRight = 20;

            chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";

            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.grid.template.location = 0;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.tooltip.disabled = true;

            var series = chart.series.push(new am4charts.CandlestickSeries());
            series.dataFields.dateX = "date";
            series.dataFields.valueY = "close";
            series.dataFields.openValueY = "open";
            series.dataFields.lowValueY = "low";
            series.dataFields.highValueY = "high";
            series.simplifiedProcessing = true;
            series.tooltipText = "Open:${openValueY.value}\nLow:${lowValueY.value}\nHigh:${highValueY.value}\nClose:${valueY.value}";

            chart.cursor = new am4charts.XYCursor();

            // a separate series for scrollbar
            var lineSeries = chart.series.push(new am4charts.LineSeries());
            lineSeries.dataFields.dateX = "date";
            lineSeries.dataFields.valueY = "close";
            // need to set on default state, as initially series is "show"
            lineSeries.defaultState.properties.visible = false;

            // hide from legend too (in case there is one)
            lineSeries.hiddenInLegend = true;
            lineSeries.fillOpacity = 0.5;
            lineSeries.strokeOpacity = 0.5;

            // var scrollbarX = new am4charts.XYChartScrollbar();
            // scrollbarX.series.push(lineSeries);
            // chart.scrollbarX = scrollbarX;

            var first = true;
            var chartData = [];
            chart.data = [];
            // chart.data = [  {
            //     "date": new Date(),
            //     "open": "0",
            //     "high": "0",
            //     "low": "0",
            //     "close": "0"    
            // }];             
            

            socket.on('request', function(data) {                                    
                for (var j = 0; j <data.length ; j++){
                    chartData.push({
                        "date": new Date(data[j].date),
                        "open": data[j].open,
                        "high": data[j].high,
                        "low": data[j].low,
                        "close": data[j].close  
                    })
                }
                chart.data = chartData;                
                socket.off('request');
            });                      
            
            
            // socket.on(common_symbol.toLowerCase()+"@kline_1m", function(data) {       
                
            socket.on(eventName, function(data) {    
                                                            
                var currentData = chart.data;
                var lastData = currentData[currentData.length - 1];
                var previousDate = new Date(lastData.date);
                var newDate = new Date(data.message.date);    
                if(previousDate.getTime() == newDate.getTime() || first){
                    currentData.pop();
                    currentData.push({
                        "date": new Date(data.message.date),
                        "open": data.message.open,
                        "high": data.message.high,
                        "low": data.message.low,
                        "close": data.message.close
                    })
                    chart.data = currentData;
                    first = false;
                } else {
                    chart.addData({
                        "date": new Date(data.message.date),
                        "open": data.message.open,
                        "high": data.message.high,
                        "low": data.message.low,
                        "close": data.message.close
                    })
                }
                
            });


        }); // end am4core.ready()
    }
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
