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


                <div class="col-6 pageHeader mb-5 px-0">
                    <?php echo $translations["M01919"][$language]; /* Swap */ ?>
                </div>                                       
                <div class="col-6 pageHeader mb-5 px-0" style="text-align: right;">
                    <a href="swapHistory.php"> 
                        <div class="btn" style="background-color:#35C4CF; color: white"> 
                            <?php echo $translations["M01930"][$language]; /* History  */ ?>
                        </div> 
                    </a>
                </div>                                       

                <div class="col-12 text-center my-5" id="showErrorMsg" style="display: none">
                    <div class="row">
                        <div class="col-12">
                            <img src="<?php echo $sys['source'] == 'FTAG' ?  'images/whitelabel/ftag/no-withdrawal.png' :  'images/nuxPay/newDesign/noWalletIcon.png'?>">
                        </div>
                        <div class="col-12 mt-3 bigText">                                                        
                            <?php echo $translations["M01931"][$language]; /* No Swaps Available  */ ?>
                        </div>
<!--
                        <div class="col-12">
                            
                            <?php echo $translations["M01619"][$language]; /* Use one of our payment tools or API integration to request payments. */?>
                        </div>
-->
                    </div>
                </div>

				<div class="col-xl-12 px-0" id="showresultListing" style="display: block;">
                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                        <div class="table-responsive shadow p-3 mb-5 bg-white rounded" id="transactionHistoryListDiv"></div>
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

<!-- Resources -->
<script src="https://cdn.socket.io/socket.io-3.0.1.min.js"></script>

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
    var common_symbols;

    var socket = io.connect('<?php echo $sys['socketURL'];?>');
    socket.on('connection', function(socket) {    
        
    });

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

        
        if('<?php echo $_POST['searchData'] ?>' != "") {            
            searchCallBack();

        } else{            
            formData  = {
                command     : 'getSwapcoinSupportedCoins',                
            };

            fCallback = loadWithdrawalListing;            
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }                

        formData  = {
            // command: 'getWalletType'
            // page: pageNumber
            command: 'getWalletBalance',
            wallet_status: checkWalletStatus
        };  
        fCallback = getWalletType;  
        ajaxSend("scripts/reqPaymentGateway.php", formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

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
        // console.log("testing");
        // console.log(data);
        var tableNo;
        // img_list = data.result.crypto_img_list;
        // symbol_list = data.result.crypto_symbol_list;                
        withdrawalList = data.data.coinsList;
        supportedCoinList = data.data.walletTypes;
		var pageData = data.data;
        // console.log(pageData);        
        if(withdrawalList && withdrawalList.length > 0) {
        	$('#showErrorMsg').hide();
        	$('#showresultListing').show();
            
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

                
                var iconDiv = '<div class="btn primaryBtn" value="'+k+'" onclick="enterSwap('+k+')"> <?php echo $translations["M01919"][$language]; /* Swap */ ?> </div>'
                
                var buildCurrencyIcon = '<img src="'+v['from_image']+'" class="currencyLogo"></img> <img src="'+v['image']+'" class="currencyLogo"></img>';

                var rebuildData = {
                    currency_icon : buildCurrencyIcon,
                    currency : v['display_from_symbol']+" / "+v['display_symbol'],
                    buy_sell_price : v['last_price'],
                    change_24hr : v['change_percent'],
                    high_24hr : v['high'],
					low_24hr: v['low'],					
                    icon: iconDiv
                };                
                start_socket(v['common_symbol'], k)

                newList.push(rebuildData);
            });
        }
        else
        {
        	$('#showErrorMsg').show();
        	$('#showresultListing').hide();
        }        

        cusBuildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, pageData.pageNumber, pageData.totalPage, pageData.totalRecord, pageData.numRecord);
        // console.log(pageData.pageNumber);
        // console.log(pageData.totalPage);
        // console.log(pageData.totalRecord);
        // console.log(pageData.numRecord);

        $('#transactionHistoryListDiv').css('paddingLeft','30px');
        $('#transactionHistoryListDiv').css('paddingRight','30px');
        
        $('#'+tableId).find('thead').addClass("whiteBackgroundColor");        
    }

    function start_socket(commonSymbol, tableID) {
        

        socket.off(commonSymbol.toLowerCase()+'@kline_1d');        
        socket.on(commonSymbol.toLowerCase()+'@kline_1d', function(data) {                        
            var socketData = data.message;
            var change = (socketData.close - socketData.open) / socketData.close * 100;
            $('#'+tableID+'2').text( thousands_separators(parseFloat(socketData.close).toFixed(6)) )   
            $('#'+tableID+'3').text(thousands_separators(change.toFixed(2))+"%")   
            $('#'+tableID+'4').text( thousands_separators(parseFloat(socketData.high).toFixed(6)) )   
            $('#'+tableID+'5').text( thousands_separators(parseFloat(socketData.low).toFixed(6)) )   

            var color;
            if(change > 0) {
                color = 'green'
            } else if (change < 0){
                color = 'red'
            } else {
                color = 'black'
            }

            $('#'+tableID+'3').css("color", color);            
            // $('#'+tableID+'2').text(parseInt( socketData.last_price ).toLocaleString())   
        }); 
    }
    
    function thousands_separators(num)
    {
        var num_parts = num.toString().split(".");
        num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return num_parts.join(".");
    }

    function cusBuildTable(a, e, t, i, n, l, s) {        
        var d = jQuery.isPlainObject(n) ? 1 : 0;
        if ($("#" + t).find("table#" + e).remove(), $("#" + t).prev().removeClass("alert m-alert--default").html("").hide(), a) {
            var r;
            $("#" + t).append('<table id="' + e + '" class="table table-striped m-table"></table>'), $("#" + t).find("table#" + e).append('<thead class="m-datatable__head"><tr class="m-datatable__row"></tr></thead>'), $("#" + t).find("table#" + e).append('<tbody class="m-datatable__body"></tbody>'), r = Object.keys(a), i.length < 2 && (i = [], r = Object.keys(a), $.each(r, function(a, t) {
                i.push(t.split("_").join(" "))
            })), $.each(i, function(a, t) {
                $("#" + e).find("thead tr").append('<th class="m-datatable__cell">' + t + "</th>")
            }), (0 < n.length || !jQuery.isEmptyObject(n)) && $("#" + e).find("thead tr").append('<th class="m-datatable__cell"></th>');
            var c = 0;
            actionBtnArray = [], $.each(n, function(a, t) {
                d || (a = t), "edit" == a ? actionBtnArray.push("Edit") : "contact" == a ? actionBtnArray.push("Contact") : "view" == a ? actionBtnArray.push("View") : "revoke" == a ? actionBtnArray.push("Revoke") : "delete" == a ? actionBtnArray.push("Delete") : "detail" == a ? actionBtnArray.push("Detail") : "copy" == a && actionBtnArray.push("Copy")
            });
            for (var p = 0; p < a.length;) {
                $("#" + e).find("tbody").append("<tr id=" + p + ' class="m-datatable__row"></tr>');
                for (var f = Object.keys(a[p]), o = 0; o < f.length; o++) {
                    var curVal = a[p][f[o]];    
                    // alert(curVal);                
                    var filter = /\w+\%/g;
                    if (filter.test(curVal)) {
                        curVal = curVal.slice(0, -1)
                        let floatVal = parseFloat(curVal);
                        var color;
                        if(floatVal < 0) {
                            color = 'red';
                        } else if (floatVal == 0) {
                            color = 'black';
                        } else {
                            color = 'green';
                        }
                        $("#" + e).find("tr#" + p).append('<td id="'+p+o+'" class="m-datatable__cell" style="color:'+color+'">' + a[p][f[o]] + "</td>");
                    } else {
                        $("#" + e).find("tr#" + p).append('<td id="'+p+o+'" class="m-datatable__cell">' + a[p][f[o]] + "</td>");
                    }                    
                }
                $("#" + e).find("tr#" + p).attr("data-th", a[p][f[0]]), (0 < n.length || !jQuery.isEmptyObject(n)) && ($("#" + e).find("tr#" + p).append('<td class="m-datatable__cell"></td>'), $("#" + e).find("tr#" + p + " td").last().append('<span style="display: inline-flex;"></span>'), c = 0, $.each(n, function(a, t) {
                    d || (a = t);
                    var i = t.charAt(0).toUpperCase() + t.slice(1);
                    $("#" + e).find("tr#" + p + " td span").append('<a id="' + a + p + '" title="' + i + '" class="btn btn btn m-btn--pill m-btn--air btn-sm m-btn m-btn--custom ml-2 theme-button ' + a + 'Btn" onclick="tableBtnClick(this.id)"  style="" role="button">' + actionBtnArray[c] + "</a>"), c++
                })), p++
            }
            if (s)
                for (var k = s.pageNumber * s.numRecord, h = k - s.numRecord + 1, b = 1; h <= k;) $("#" + e).find("tr:nth-child(" + b + ") td:first-child").html(h), h++, b++;
            $('[data-toggle="tooltip"]').tooltip()
        } else $("#" + t).prev().addClass("alert m-alert--default").html("<span>" + l + "</span>").show()        
        $('#'+e+' th').addClass('text-center');

        $('#'+e+' td').addClass('text-center');        

        $('#'+e+' td:nth-child(3)').removeClass('text-center');
        $('#'+e+' td:nth-child(3)').addClass('text-right');

        $('#'+e+' td:nth-child(5)').removeClass('text-center');
        $('#'+e+' td:nth-child(5)').addClass('text-right');

        $('#'+e+' td:nth-child(6)').removeClass('text-center');
        $('#'+e+' td:nth-child(6)').addClass('text-right');
    }

    function enterSwap(obj){                
        var selectedObj = withdrawalList[obj];           
        // $.redirect("swapDetails.php", {selectedObj:selectedObj, supportedCoinList:supportedCoinList });
        socket.off()
        $.redirect("swapDetailsLive.php", {selectedObj:selectedObj, supportedCoinList:supportedCoinList });
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
                $('#walletType').append('<option data-image="'+val['image']+'" value="'+ val['currency_id'] +'">'+ val['display_symbol'] +'</option>')
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
