<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>


<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default dashboardPage">
    <div class="m-grid m-grid--hor m-grid--root m-page">

        <?php include 'headerDashboard.php'; ?>

        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <div class="m-content marginTopHeader">

                <div class="col-12 pageHeader px-0">      
                    <?php echo $translations["M02071"][$language]; /* Personal Wallet */ ?>
                </div>

                <div class="col-12">
                	<div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12" style="text-align: right; padding: 0;">
                                    <button id="addWalletBtn" class="btn primaryBtn" type="button" style="width: 140px;">
                                        <?php echo $translations["M02073"][$language]; /* Manage Wallet */ ?>
                                    </button>
                                </div>
                                <div class="col-12 dashboardBox1" style="margin-top: 20px;" id="walletAsset">
                                    <div class="row">   
										<div class="col-12">
											<div class="row" id="buildWalletBalance" >
												<div class="col-12 px-0 newsLastHR">
													<hr class="dashboardHR">
												</div>
											</div>
											<div class="row">
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

<script>
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = ""; 
	var checkWalletStatus = 1;
    var walletBalance;

    $(document).ready(function(){
        formData = {
            command: 'getWalletBalance',
			wallet_status: checkWalletStatus,
            setting_type : 'both'
        };
        fCallback = getWalletBalance;
        ajaxSend('scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $("#addWalletBtn").click(function(){
            $.redirect('settingsAddWalletCurrency.php');
        });
    });

    function getWalletBalance(data, message){
        walletBalance = data.data.wallet_list;
        var buildBalance = '';
        var mobileBuildBalance = '';
		var withholdingBalanceTxt = '<?php echo $translations["M01988"][$language]; /* Withholding Balance  */?>';
        var currentTitle = '<?php echo $translations["M01920"][$language]; /* Currency  */?>';
        var availableBalanceTitle = '<?php echo $translations["M01987"][$language]; /* Available Balance  */?>';
        var withholdTooltipText = '<?php echo $translations["M02047"][$language]; /* The amount that you have received in NuxPay  */?>'
        var availableTooltipText = '<?php echo $translations["M02048"][$language]; /* The amount available to withdraw or swap  */?>'

		var num = 0;
        if (walletBalance != "") {
			buildBalance += '<div class="col-12 dashboardNewsBox" style="cursor:default;">';
    		buildBalance +=	'<div class="row">';
	    	buildBalance +=	'<div class="col-xl-5 col-md-7 col-2 buildBalanceSymbolDiv" style="padding-left: 30px;">';
	    	buildBalance +=	'<span style="font-weight: 400;">'+ currentTitle +'</span>';
	    	buildBalance +=	'</div>';
	    	buildBalance +=	'<div class="col-xl-7 col-md-5 col-10 buildBalanceBalanceDiv">';
	    	buildBalance +=	'<div class="row">';
	    	buildBalance +=	'<div class="col-5">';
	    	buildBalance +=	'<span style="margin-right: 8px; font-weight: 400;">'+withholdingBalanceTxt+' </span>';
			buildBalance += '<i class="fa fa-info-circle" data-toggle="tooltip1" data-placement="top" title="'+ withholdTooltipText +'"></i>';
	    	buildBalance +=	'</div>';
	    	buildBalance +=	'<div class="col-5">';
	    	buildBalance +=	'<span style="margin-right: 8px; font-weight: 400;">' + availableBalanceTitle + '</span>';
			buildBalance += '<i class="fa fa-info-circle" data-toggle="tooltip2" data-placement="top" title="'+ availableTooltipText +'"></i>';
	    	buildBalance +=	'</div>';
            buildBalance +=	'</div>';
            buildBalance +=	'</div>';
            buildBalance +=	'</div>';
            buildBalance +=	'</div>';
            buildBalance += '<div class="col-md-12 px-0 newsLastHR">';
            buildBalance += '<hr class="dashboardHR">';
            buildBalance += '</div>';
			
    		$.each(walletBalance, function(key, val){
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
	    		buildBalance +=	'<div class="col-xl-5 col-md-7 col-2 buildBalanceSymbolDiv" style="padding-left: 30px;">';
	    		buildBalance +=	'<img src="'+image+'" style="width: 32px; margin-right:17px">';
	    		buildBalance +=	'<span>'+display_symbol+'</span>';
	    		buildBalance +=	'</div>';
	    		buildBalance +=	'<div class="col-xl-7 col-md-5 col-10 buildBalanceBalanceDiv">';

	    		buildBalance +=	'<div class="row" style="height: 100%;">';
	    		buildBalance +=	'<div class="col-5" style="display: flex; align-items: center;">';
	    		buildBalance +=	'<span>'+withhold_balance+'</span>';
	    		buildBalance +=	'</div>';
	    		buildBalance +=	'<div class="col-5" style="display: flex; align-items: center;">';
	    		buildBalance +=	'<span>'+balance+'</span>';
	    		buildBalance +=	'</div>';
	    		buildBalance +=	'<div class="col-2" style="display: flex; align-items: center;">';
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
			})

            adjustBalanceSymbolDiv();
        } 
        $('[data-toggle="tooltip1"]').tooltip();
		$('[data-toggle="tooltip2"]').tooltip();
	}
	
	function toNewWithdrawal(cid) {
		$.redirect('withdrawal.php', {
			currency_id: cid
		});
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
@media (max-width: 500px) {
    #addWalletBtn {
        width: 100% !important;
        margin-top: 20px;
    }

    .pageHeader {
        font-size: 24px;
    }
}
</style>


            


