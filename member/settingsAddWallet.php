<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<style>
.col-1 >.tooltips{
  position: relative;
  /* display: inline-block; */
}
.col-1  .tooltiptext {
  visibility: hidden;
  width: 150px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.col-1:hover .tooltiptext {
  visibility: hidden;
}
</style>


<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">
  
                <div class="col-12 pageHeader mt-3 mb-5">                    
                    <?php echo $translations["M01845"][$language]; /* Settings */ ?>
                </div>

                
				<div class="d-flex align-items-center">
                    <div class="col-12">
                        <div class="d-flex border-bottom justify-content-between">
                            <nav class="nav">
                              <a class="nav-link" id="profileBtn" href="settings.php" style="font-size: 15px;"> <?php echo $translations["M01876"][$language]; /* Profile */ ?> </a>
                              <a class="nav-link" id="securityBtn" href="settingsChangePassword.php" style="font-size: 15px;"><?php echo $translations["M01703"][$language]; /* Security */ ?></a>
                              <a class="nav-link active" id="coinBtn" href="javascript:void(0)" style="font-size: 15px;"><?php echo $translations["M02074"][$language]; /* Payment Currencies */ ?></a>
                              <a class="nav-link" id="coinBtn1" href="settingsAddWalletCurrency.php" style="font-size: 15px;"><?php echo $translations["M02071"][$language]; /* Personal Wallet */ ?></a>
							  <a class="nav-link" id="whitelistBtn" href="whitelistAddresses.php" style="font-size: 15px;"><?php echo $translations["M01713"][$language]; /* Whitelist Addresses */ ?></a>
                            </nav>
                        </div>
                    </div>
				</div>
			</div>



			<div class="m-content">


                <div class="col-12" id="securitySection">
                    <div class="row">

                        <div class="col-12 mt-3">
                            <div class="row">

                                <div class="col-12 bigText">
                                    <?php echo $translations["M02079"][$language]; /* Allow user to make payment with different currencies */ ?>
                                </div>
                                
                                <div class="col-1" style="padding-left:1%; margin-bottom:10px;">
                                    <label class="toggle">
                                    <input type="checkbox" class="toggle-input switch-currency" style=" float:left;">
                                    <div class="toggle-controller default-success text-center"></div>
                                    <div class="col-1 tooltips" style = "float:right;">
                                        <!-- <span class="tooltiptext">Turning on this setting will enable user to select different type of currency to made payment</span> -->
                                    </div>
                                    </label>
                                </div>

                                
                                <div class="col-12 bigText">
                                    <?php echo $translations["M02080"][$language]; /* Enable currencies that you want to receive */ ?>
                                </div>
                                
                             

                                <div class="mt-4 col-12">
                                    <div class="m-portlet">
                                        <div class="m-portlet__body" style="padding-top: 0px; padding-bottom:0px;">
                                            <!-- <div class="row m-form"> -->
                                                <div class="row-auto m-form" id="buildWalletBalance" style="width:100%; padding-top: 1%; padding-bottom:1%;">
                                                
                                                </div>
                                                <!-- <div class="col-xl-12 px-0" id="showresultListing" style="display: block;">
                                                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                                                        <div class="table-responsive" id="transactionHistoryListDiv"></div>
                                                        <div class="m-datatable__pager m-datatable--paging-loaded clearfix m-t-rem3">
                                                            <ul class="m-datatable__pager-nav" id="transactionHistoryPager">
                                                            </ul>
                                                            <div class="m-datatable__pager-info">
                                                                <span class="m-datatable__pager-detail"></span>
                                                            </div>
                                                        </div>   
                                                    </div>   
                                                </div> -->
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-12">
                                    <div class="m-portlet col-md-6 px-0">
                                        <div class="m-portlet__body">
                                            <div class="row m-form">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">Current Password<span class="text-danger">*</span></label>
                                                        <input id="currentPassword" type="password" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">New Password<span class="text-danger">*</span></label>
                                                            <i data-toggle="m-tooltip" data-direction="left" data-width="auto" class="m-form__heading-help-icon descMsg flaticon-info m--icon-font-size-lg" title="" data-html="true" data-original-title="<p align='left' class='mb-0'>Min 4 characters</p>"></i>
                                                        <input id="newPassword" type="password" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">Confirm New Password<span class="text-danger">*</span></label>
                                                        <input id="confirmPassword" type="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <!-- <div class="col-6 px-2">
                            <button id="changePasswordBtn" class="btn searchBtn mx-2 my-2" type="button">Save</button>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="innerPageTitle">2-Factor Authentication</div>
                            <div class="innerPageSubTitle">Security is critical at <?php echo $sys['companyName']?>. To help keep your account safe, enable authenticator.</div>
                        </div> -->

                        <!-- <div class="col-12 mt-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="m-portlet">
                                        <div class="m-portlet__body">
                                            <div class="row">
                                                <div class="col-12 px-0">
                                                    <div class="m-form">
                                                        <div class="d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <img src="images/ga2.svg" width="50px">
                                                            </div>
                                                            <div>
                                                                <b class="d-block">Authenticator</b>
                                                                <span class="d-block">Time-based one-time 6-digits code</span>
                                                            </div>
                                                            <div class="col text-right">
                                                                <button id="enableBtn" class="btn primaryBtn">Enable</button>
                                                                <button id="unableBtn" class="btn primaryBtn" data-toggle="modal" style="display: none;">Disable</button>
                                                            </div>
                                                        </div>
                                                    </div>
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

<script>

    var url             = 'scripts/reqEditBusiness.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var dropdownFake;
    var status;
    var firstTime       = "<?php echo $_POST['firstTime']; ?>";
    var check = "false";
    var mobileAva = '<?php echo $_SESSION['mobile']?>';
    var emailAva = '<?php echo $_SESSION['email']?>';

    var twoFAMode = "";

	$(document).ready(function() {
		formData = {
			command : 'webpaywalletstatusget',

		};
		fCallback = loadCoinWallet;

		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	});
    
	function loadCoinWallet(data, message){
        var walletBalance = data.data.wallet_list;
        var switchCurrency = data.data.allowSwitchCurrency;
        var buildBalance = '';
        var check;

        if (switchCurrency == 1){
            $('.switch-currency').prop('checked', true);;
        }else{
            $('.switch-currency').prop('checked', false);;
        }

        $('.switch-currency').change(function(){
        switch_currency_status = $(this).is(":checked") ? 1 : 0;
        setSwitchCurrency(switch_currency_status);
        });

        if (walletBalance != "") {
    		$('#buildWalletBalance').show();
    		// $('#noDataReceiveAddress').hide();
    		$.each(walletBalance, function(key, val){
                var name = val['name'];
                var currency_id = val['currency_id'];
                var symbol = val['symbol'].toUpperCase();
                var display_symbol = val['display_symbol'].toUpperCase();
                var image = val['image'];
				var balance = val['balance'];
                var status = val['status'];
                var address = val['address'];

                buildBalance += '<div class="col-12 dashboardNewsBox" id="buildWalletBalance">';
                    buildBalance +=	'<div class="row justify-content-around">';

                        buildBalance +=	'<div class="col-sm-6 col-6">';//
                            buildBalance +=	'<div class="row d-flex justify-content-start">';

                                buildBalance +=	'<div class="col-sm-1 col-6 currencyLogoIcon" style="padding-left:0px;">';
                                buildBalance +=	'<img src="'+image+'" style="width:35px;">';
                                buildBalance +=	'</div>';

                                buildBalance +=	'<div class="col-sm-7 col-6 d-flex align-items-center" style="padding-left:0px;">';
                                buildBalance +=	'<b>'+display_symbol+'</b>';
                                buildBalance +=	'</div>';

                            buildBalance +=	'</div>';
                        buildBalance +=	'</div>';//


                        if (status == 1){
                            buildBalance +=	'<div class="col-sm-1 col-6 float-right align-self-center" style="padding-right:0px">';
                            buildBalance +=' <label class="toggle" style="text-align: right;"> ';
                            buildBalance +=' <input type="checkbox" data-address="'+address+'" data-status="" data-currency_id="'+currency_id+'" data-wallet_type="'+symbol+'" class="toggle-input cryptoBtn" checked> ';
                            buildBalance +=' <div class="toggle-controller default-success text-center"></div> ';
                            buildBalance +=' </label> ';
                            buildBalance +=	'</div>';
                            check = "true";
                        }else{
                            buildBalance +=	'<div class="col-sm-1 col-6 float-right align-self-center" style="padding-right:0px">';
                            buildBalance +=' <label class="toggle" style="text-align: right;"> ';
                            buildBalance +=' <input type="checkbox" data-address="" data-status="" data-currency_id="'+currency_id+'" data-wallet_type="'+symbol+'" class="toggle-input cryptoBtn" > ';
                            buildBalance +=' <div class="toggle-controller default-success text-center"></div> ';
                            buildBalance +=' </label> ';
                            buildBalance +=	'</div>';  
                            check = "false";  
                        }
                        
                    buildBalance +=	'</div>';
                buildBalance +=	'</div>';

                buildBalance += '<div class="col-md-12 px-0 newsLastHR">';
                buildBalance += '<hr class="dashboardHR">';
                buildBalance += '</div>';
                
	    		$('#buildWalletBalance').empty().append(buildBalance); 
                
                $('.cryptoBtn').change(function() {
                    var n = $(".cryptoBtn:input:checked").length;    
                    if(n == 0) {
                        showMessage(data.message_d, 'warning', 'At least one currency must be activated','warning', 'settingsAddWallet.php') 
                    } else {
                        currency_id = $(this).attr('data-currency_id'); 
                        status = $(this).is(":checked") ? 1 : 0;
                        setWallet(currency_id, status);
                    }
                    
                });
                

	    		// if(walletBalance){

                // $.each(walletBalance, function(k, v) {
                //     $('#' + buildBalance).find('tr#' + k).attr('data-th', v['short_url']);
                // });

                // }

			})
        }
	}



    function setSwitchCurrency(switch_currency_status){
        formData = {
            command: 'setswitchcurrency',
            switch_currency_status : switch_currency_status,
            
        };
        fCallback = loadSetSwitch;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    }
    function loadSetSwitch(data,message){

        showMessage(data.message_d, 'success', '<?php echo $translations["B00379"][$language]; /*Switch Currency Status Successfully Updated.*/ ?>', 'check-circle-o', 'settingsAddWallet.php')

    }

	function setWallet(currency_id, status){
        formData = {
            command: 'webpaywalletstatusset',
            currency_id: currency_id,
            status: status
        };
        fCallback = loadSetWallet;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    
    }
    function loadSetWallet(data,message){

        showMessage(data.message_d, 'success', '<?php echo $translations["B00354"][$language]; /*Wallet Status Successfully Updated.*/ ?>', 'check-circle-o', 'settingsAddWallet.php')

    }

</script>
