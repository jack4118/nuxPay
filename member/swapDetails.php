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


                <div id="logoHeader" class="col-6 pageHeader mb-0 px-0">
                    <img src="<?php echo $_POST['selectedObj']['image'];?>" class="currencyLogo">  </img> &nbsp <?php echo $_POST['selectedObj']['symbol'];?>
                </div>                                                       

                <div class="col-12 ml-0 pl-0 pt-2 pb-5" style="display: block">
                    <div class="">
                        <a href="swapListing.php"> < <?php echo $translations["M01948"][$language]; /* Back */ ?>  </a>
                    </div>
                </div>                                                                       
                
				
                <div class="col-xl-8 col-md-10 col-sm-12 px-0 whiteBackgroundColor shadow p-3 mb-5 bg-white rounded" style="display: block;"> 
                    <div class="row pt-2 pb-4 px-5 px-xl-0" style="border-bottom: 1px solid #ebedf2;">
                        <div class="col-sm-12 col-md-3 pb-md-0 pb-4 align-self-center text-center customSwapBoldBig">
                            $<span id="last_price"><?php echo number_format($_POST['selectedObj']['last_price'],2);?></span>
                        </div>

                        <div class="col-xl-3 col-md-3 col-4">
                            <div class="row customSwapSmall">
                            <?php echo $translations["M01922"][$language]; /* 24H Change */ ?>
                            </div>
                            <div id="change_percent" class="row customSwapSmall" style="color: <?php if($_POST['selectedObj']['change_percent'] > 0){echo 'green';} else if($_POST['selectedObj']['change_percent'] == 0){ echo 'black';} else{echo 'red';}?> ">
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

                    <div class="px-5 pt-5 pb-3">
                        <div class="row" style="font-weight:500; font-size: 18px">
                        <?php echo $translations["M01919"][$language]; /* Swap */ ?>
                        </div>

                        <div class="row justify-content-between pt-5">
                            <div class="col-3 text-left p-0 customSwapBold">
                                <?php echo $translations["M00602"][$language]; /* From */ ?>
                            </div>
                            <div class="col-9 text-right">
                                <?php echo $translations["M01932"][$language]; /* Available */ ?>: <span id="balance" class="customSwapBold"  > 0 </span>
                            </div>
                        </div>
                        

                        <!-- amount to swap -->
                        <div class="row justify-content-between pt-1">
                            <div class="input-group">
                                <input id="fromAmountInput" type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Enter amount to swap" onkeyup="calculateToSwap()" autocomplete="no">
                                <div id="dropdownFromUp" class="input-group-append">
                                    <button id="dropdownFromBottom" class="btn dropdown-toggle customSwapButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:120px" value="<?php echo $_POST['selectedObj']['from_wallet_type']?>">
                                        <img class="walletTypeIcon" src="<?php echo $_POST['supportedCoinList'][ $_POST['selectedObj']['from_wallet_type'] ]['image']?>"></img> 
                                            <?php echo $_POST['selectedObj']['from_symbol']?> &nbsp
                                    </button>
                                    <div id="dropdownFrom" class="dropdown-menu">                                                                                                                        
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        
                        <div class="row justify-content-between pt-4">
                            <div class="col-3 text-left p-0 customSwapBold">
                                <?php echo $translations["M01933"][$language]; /* To */ ?>
                            </div>
                            
                        </div>
                        
                        <!-- amount to receive -->
                        <div class="row justify-content-between pt-1">
                            <div class="input-group">
                                <input id="toAmountInput" type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Enter amount to receive" onkeyup="calculateFromSwap()">
                                <div id="dropdownToUp" class="input-group-append">
                                    <button id="dropdownToBottom" class="btn dropdown-toggle customSwapButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:120px" value="<?php echo $_POST['selectedObj']['wallet_type']?>">
                                        <img class="walletTypeIcon" src="<?php echo $_POST['selectedObj']['image']?>"></img> 
                                        <?php echo $_POST['selectedObj']['symbol']?> &nbsp
                                    </button>
                                    <div id="dropdownTo" class="dropdown-menu">                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        

                        <div id="exchangeRateDiv" class="row justify-content-between pt-5" style="">
                            <div class="col-3 text-left p-0 customSwap">
                                Price
                            </div>
                            <div class="col-9 text-right" id="exchangeRate">
                                <!-- 1 USDT &#8776 1BTC -->
                            </div>
                        </div>

                        <div id="receiveDiv" class="row justify-content-between pt-2" style="">
                            <div class="col-3 text-left p-0 customSwap">
                            <?php echo $translations["M01949"][$language]; /* You will receive */ ?>
                            </div>
                            <div class="col-9 text-right" id="exchangeRate">
                                <span id="receive" class="customSwapBold"  >
                                    <!-- 0 BTC -->
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 pl-0 pr-1">
                                <button type="button" id="continueBtn" class="btnRequest btn btn-block customSwapContinueButton mt-5">                                    
                                    <?php echo $translations["M01950"][$language]; /* Refresh */ ?>
                                </button>
                            </div>
                            <div class="col-6 pr-0 pl-1">
                                <button type="button" id="swapBtn" class="btnRequest btn btn-block customSwapContinueButton mt-5">                                                                       
                                    <?php echo $translations["M01947"][$language]; /* Preview */ ?>
                                </button>
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
            ''

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
    var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';
    var postParam = '<?php echo json_encode($_POST); ?>'
    var confirmed = 0;    
    var referenceID;
    var first = 0;
    var curRate;
    var cusFrom = 0;
    var cusTo = 0;

    
    var supportedCoinList = JSON.parse('<?php echo json_encode($_POST['supportedCoinList']); ?>');
    var selectedObj = JSON.parse('<?php echo json_encode($_POST['selectedObj']); ?>');
    var key
    var excludeWallet;
    

    if (hasChangedPassword == 0){
        $.redirect('firstTimeLogin.php');
    }

    function calculateToSwap() { 
        var userInput = $('#fromAmountInput').val();
        var to_wallet_type = $('#dropdownToBottom').text().toUpperCase();
        var finalAmount =   userInput * curRate;          
        $('#receive').text(finalAmount+" "+to_wallet_type);        
    }

    function calculateFromSwap() {
        var userInput = $('#toAmountInput').val();
        var to_wallet_type = $('#dropdownToBottom').text().toUpperCase();
        var finalAmount =   userInput;          
        $('#receive').text(finalAmount+" "+to_wallet_type);        
    }

    $(document).ready(function(){
        // $.dropdownFrom        
        
        // from drop down
        // excludeWallet = selectedObj.from_wallet_type;
        // buildDropDown(excludeWallet,'dropdownFrom');

        // excludeWallet = selectedObj.wallet_type;
        // buildDropDown(excludeWallet,'dropdownTo');        

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
        $('#continueBtn').text('Refresh');

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
    });

    function buildDropDownSpecific(excludeWallet, selectedId, coinList){
        // $('#'+selectedId).html('');
        for (key in coinList){            
            if(key == excludeWallet){
                continue;
            }
                        
            addDiv = '<a class="dropdown-item" href="#" value="'+key+'" onclick="return false;">';
            addDiv += '<img class="walletTypeIcon" src="'+coinList[key].image+'"></img> ';
            addDiv += ''+coinList[key].symbol.toUpperCase()+' &nbsp </a>  ';                
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
            addDiv += ''+supportedCoinList[key].symbol.toUpperCase()+' &nbsp </a>  ';                
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

    $('#swapBtn').click(function() {
        var from_wallet_type = $('#dropdownFromBottom').val();
        var to_wallet_type = $('#dropdownToBottom').val();
        var from_amount = $('#fromAmountInput').val();
        var to_amount = $('#toAmountInput').val();        
        
        

        $('#continueBtn').text('Refresh');


        if (confirmed == 0) {
            var formData = {
                command : 'estimateSwapcoinRate',
                from_wallet_type: from_wallet_type.trim(),            
                to_wallet_type: to_wallet_type.trim(),
                from_amount: from_amount.trim(),
                to_amount: to_amount.trim()
            };
            console.log(formData);
                    
            fCallback = makeSwap;
            
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);        
        } else {
            var formData = {
                command : 'swapcoinSwap',            
                reference_id : referenceID
            };     
            console.log(formData);
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

        // if (confirmed == 0) {
            $('#toAmountInput').val(dataOut.toAmount);
            // $('#toAmountInput').text(dataOut.toAmount);
            $('#swapBtn').text('<?php echo $translations["M00981"][$language]; /* Confirm */ ?>');
            confirmed = 1;     
            $('#toAmountInput').attr('readonly','readonly');
            $('#fromAmountInput').attr('readonly','readonly');       
            var exchangeRateString = "1 "+dataOut.fromSymbol+" =  "+dataOut.exchangeRate+" "+dataOut.toSymbol;
            $('#exchangeRate').text(exchangeRateString);
            $('#receive').text(dataOut.toAmount+" "+dataOut.toSymbol);
            $('#exchangeRateDiv').show();
            $('#receiveDiv').show();
            
        // } 
        // else {
            
        //     var formData = {
        //         command : 'swapcoinSwap',            
        //         reference_id : referenceID
        //     };
                    
        //     fCallback = completeSwap;
        //     alert('here');
        //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);        
        //     alert('done?');
        // }        
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
        console.log(swapData);

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

        var fromWalletType = $('#dropdownFromBottom').text();
        var toWalletType = $('#dropdownToBottom').text();
        var exchangeRateText = "1 "+fromWalletType+" ≈ "+swapData.system_buy_rate+" "+toWalletType+" ";
        $('#exchangeRate').text(exchangeRateText);
        curRate = swapData.system_buy_rate;
        // var excludeWallet = selectedObj.wallet_type;     
        var excludeWallet = $('#dropdownToBottom').val();
        // alert(excludeWallet);
        $('#dropdownTo').html('')
        buildDropDownSpecific(excludeWallet,'dropdownTo', swapData.availableToCurrency);        

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
                var newValue;
                var previousWallet;
                var newCurrencyId;
                var oldHtml = $("#dropdownFromUp .btn:first-child").html();
                var oldVal = $("#dropdownFromUp .btn:first-child").val();                
                for (key in supportedCoinList){                
                    var str1 = String(supportedCoinList[key].symbol.toUpperCase()).trim();
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
                        // $('#balance').text(balanceCopy[key].balance+" "+" "+balanceCopy[key].symbol);                    
                    }                
                }    
                preview();    
            });
            cusFrom = 1;
        }


        // if (cusTo == 0){
            $("#dropdownTo a").on('click', function(){             
                var newText = $(this).text();
                var newValue;
                var previousWallet;
    
                var oldHtml = $("#dropdownToUp .btn:first-child").html();
                var oldVal = $("#dropdownToUp .btn:first-child").val();                
                console.log(oldVal);
                // alert('oldVal '+oldVal);
                for (key in supportedCoinList){                
                    var str1 = String(supportedCoinList[key].symbol.toUpperCase()).trim();
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
        //     cusTo = 1;
        // }
    }

    function searchCallBack(pageNumber, fCallback){

        var searchId   = 'searchSection';
        var searchData = JSON.parse('<?php echo $_POST['searchData'] ?>');

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
        console.log(data);
        var tableNo;
        // img_list = data.result.crypto_img_list;
        // symbol_list = data.result.crypto_symbol_list;                
        var withdrawalList = data.data;
		// var pageData = data.result;        
        if(withdrawalList && withdrawalList.length > 0) {
        	$('#showErrorMsg').hide();
        	$('#showresultListing').show();

            var newList = [];
            tableRowDetails = [];
            $.each(withdrawalList, function(k, v) {
                // var buildCurrencyIcon = `
                // <img src="images/cryptocurrencies/${v['currency_unit']}.png" class="currencyLogo">

                // `;
                var buildCurrencyIcon = '<img src="'+v['image']+'" class="currencyLogo">';

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
                                
                // if (( v['escrow_id'] > 0 ) ) {
                //     if (v['escrow_chat_count'] > 0) {
                //         var iconDiv = '<div class="redCircle">'+v['escrow_chat_count']+'</div>';
                //         iconDiv += '<a href="javascript:redirectEscrowChat('+v['escrow_id']+');"><img src="images/Escrow/chat.png"></a>';
                //     } else {
                //         var iconDiv = '<a href="javascript:redirectEscrowChat('+v['escrow_id']+');"><img src="images/Escrow/chat.png"></a>';
                //     }
                // } else {
                //     var iconDiv =  '';
                // }
                
                var iconDiv = '<div class="btn btn-success"> <?php echo $translations["M01919"][$language]; /* Swap */ ?> </div>'
                
                var buildCurrencyIcon = '<img src="'+v['image']+'" class="currencyLogo">';
                var rebuildData = {
                    currency_icon : buildCurrencyIcon,
                    currency : v['symbol'],
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

       	$('#'+tableId).find('tbody tr').each(function(){
            $(this).addClass("whiteBackgroundColor");
            $(this).css("font-size", "12px");            	        
        });
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
