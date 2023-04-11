<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<?php

    $searchData = $_POST['searchData'];
    $searchVal = $_POST['newSearchVal'];
    if($searchData) {
        $arrSearchData = json_decode($searchData);
        $searchWalletType = $arrSearchData->wallet_type;
        $searchPageNumber = $arrSearchData->page_number;
    }
?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">
				<div class="row d-flex justify-content-between">
					<div class="col-6 bigText" style="margin-left: 10px;">
                        <?php echo $translations["M01657"][$language]; /* History */?>
					</div>
					<div class="" style="margin-right: 25px;">
						<a href="whitelistAddresses.php"><button class="btn primaryBtn btn-block"><?php echo $translations["M01637"][$language]; /* Whitelist Wallet Address */?> </button></a>
					</div>

				</div>

                <div class="d-flex align-items-center mt-3 mb-3">
                    <div class="col-12">
                        <div class="d-flex border-bottom justify-content-between">
                            <nav class="nav">
                              <a class="nav-link " id="profileBtn" href="settings.php" style="font-size: 15px;"><?php echo $translations["M01876"][$language]; /* Profile */ ?></a>
                              <a class="nav-link" id="securityBtn" href="settingsChangePassword.php" style="font-size: 15px;"><?php echo $translations["M01703"][$language]; /* Security */ ?></a>
                              <a class="nav-link" id="coinBtn" href="settingsAddWallet.php" style="font-size: 15px;"><?php echo $translations["M02074"][$language]; /* Payment Currencies */ ?></a>
                              <a class="nav-link" id="coinBtn1" href="settingsAddWalletCurrency.php" style="font-size: 15px;"><?php echo $translations["M02071"][$language]; /* Personal Wallet */ ?></a>
							  <a class="nav-link active" id="whitelistBtn" href="javascript:void(0)" style="font-size: 15px;"><?php echo $translations["M01713"][$language]; /* Whitelist Addresses */ ?></a>
                            </nav>
                             <div>
                                <a id="searchTransactionBtn" href="#" class="btn btnSearch mx-2 my-2" style="" role="button"><i class="fa fa-search"></i></a>

                            </div>
                        </div>
                    </div>
                </div>

<!--
				<div class="d-flex align-items-center">
                    <div class="col-12">
                        <div class="d-flex border-bottom justify-content-between">
                            <nav class="nav">
                              <a class="nav-link" id="successBtn" href="whitelistAddresses.php">Whitelisting</a>
                              <a class="nav-link active" id="pendingBtn" href="whitelistAddressHistory.php">History</a>
                            </nav>

                            <div>
                                <a id="searchTransactionBtn" href="#" class="btn btnSearch mx-2 my-2" style="" role="button"><i class="fa fa-search"></i></a>

                            </div>

                        </div>
                    </div>

				</div>
-->
			</div>


			<div class="m-content">
			

                <div class="col-xl-12 px-0" id="searchSection">
                    <div class="form-group searchBox seacrhWalletBox">
                        <select class="searchDesign" id="walletType"></select>
                    </div>
                    
                </div>

                <div class="col-xl-12 px-0" id="showErrorMsg" style="display: none">
					<div class="m-portlet m-portlet--tab">
	                    <div class="m-portlet__body">
	                        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
						 		<div class="col-12">                           		
							    	<div class="row justify-content-center">

							    		<div class="col-8">
							    			<div class="row">
										    	<div class="col-xl-2 col-lg-2 col-md-12 col-12 text-center" style="margin: auto;">
										    		<img src="images/dashboard/noDateKeyIcon.png" style="width: 30px;"/>
										    	</div>
										    	<div class="col-xl-10 col-lg-10 col-md-12 col-12 text-left noDataTitleSpacing">
										    		<div class="row">
												    	<div class="col-12 montserratBoldFont" style="font-size: 16px">
                                                            <?php echo $translations["M02105"][$language]; /* You do not have any whitelist address yet */ ?>.
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

				<div class="col-xl-12 px-0" id="showresultListing" style="display: none;">
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
                    
				</div>
			</div>

			</div>

		</div>
	<?php include 'footerDashboard.php'; ?>
</div>

<!-- 2FA START -->
<div class="modal fade" id="twoFactorModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b justify-content-center">
                <div class="modal-title hasSub">
                    <h5><?php echo $translations["M01673"][$language]; /* Enable 2-Factor Authentication */?></h5>
                    <p class="my-0 enableStep1"><?php echo $translations["M02104"][$language]; /* An SMS with OTP code has been sent to your mobile number */?><br> <?php echo $_SESSION['mobile']?></p>

                    <div class="enableStep2" style="display: none;">
<!--                        <img id="authenticatorQR" src="images/qrcode.jpg" width="150px" class="my-3">-->
                        <div id="qrcode" class=""></div>
                        <ul class="text-left pl-3">
                            <li><?php echo $translations["M01646"][$language]; /* Install Google Authenticator app on your mobile device */ ?>.</li>
                            <li><?php echo $translations["M01647"][$language]; /* Scan QR code with the authenticator */ ?>.</li>
                            <li><?php echo $translations["M01648"][$language]; /* Enter 6-digits codes from authenticator */ ?>.</li>
                        </ul>
                    </div>
                    
                </div>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div class="col-12 text-center">
                    <p class="enableStep1"><?php echo $translations["M01649"][$language]; /* Enter your OTP code */ ?>e</p>
                    <p class="enableStep2" style="display: none;"><?php echo $translations["M01655"][$language]; /* Enter your 2-factor authenticator code */ ?></p>
                    <div class="d-inline-flex authenticationBox align-items-center">
                        <div class="mr-2">
                            <img src="images/OTP.png" width="30px">
                        </div>
                        <input class="form-control authenticator" type="" name="" id ="otpCodeID">
                        <span id="timer" name="timer" style="padding-left: 20px"></span>
                    </div>
                    <p id ="didNotReceiveSms" ><?php echo $translations["M01651"][$language]; /* Didn't receive the OTP */ ?>? <a href="javascript:;" onclick="requestOTP()"><?php echo $translations["M01652"][$language]; /* Re-send OTP */ ?></a></p>

                </div>
            </div>

            <div class="modal-footer bg-w">
                <div class="col-12 text-center">
                    <a href="javascript:void(0)" id="confirmBtn" class="btn primaryBtn enableStep1" style=""><?php echo $translations["M00981"][$language]; /* Confirm */ ?></a>
                    <a href="javascript:void(0)" id="enableModalBtn" class="btn primaryBtn enableStep2" style=" display: none;"><?php echo $translations["M01031"][$language]; /* Enable */ ?></a>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unableModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b justify-content-center">
                <div class="modal-title hasSub">
                    <h5><?php echo $translations["M01653"][$language]; /* 2-Factor Authentication */?></h5>
                    <p class="my-0 enableStep1"><?php echo $translations["M01654"][$language]; /* Enter authenticator codes to make sure it's really you trying to change settings */?></p>
                </div>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div class="col-12 text-center">
                    <p><?php echo $translations["M01650"][$language]; /* Enter your 2-factor authenticator code */?></p>
                    <div class="d-inline-flex authenticationBox">
                        <img src="images/ga2.svg" width="40px" class="mr-2">
                        <input class="form-control authenticator" type="" name="" id="authCodeID">
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-w">
                <div class="col-12 text-center">
                    <a href="javascript:void(0)" id="confirmUnableBtn" class="btn primaryBtn" style=""><?php echo $translations["M01788"][$language]; /* Confirm */?></a>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- 2FA END -->


<?php include 'sharejsDashboard.php'; ?>
<script src="js/jquery.qrcode.js" type="text/javascript"></script>

</body>
</html>

<script>
   
    var divId    = 'transactionHistoryListDiv';
    var tableId  = 'transactionHistoryListTable';
    var pagerId  = 'transactionHistoryPager';
    var btnArray = Array('delete');
    var thArray  = Array(
            '',
            '<?php echo $translations["M01720"][$language]; /* Wallet Address */?>',
            '<?php echo $translations["M02102"][$language]; /* Whitelisted On */?>'
        );

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
    var tableRowDetails = [];
    var img_list;
    var symbol_list;
    var searchTab;
    var currencyImage = [];

    var del_address = Array();
    var twoFaStatus = false;
    var searchVal = '<?php echo $searchVal; ?>';
    var searchWalletType = '<?php echo $searchWalletType; ?>';
    var page_number = '<?php echo $searchPageNumber; ?>';

    $(document).ready(function(){ 
      
        //WALLET TYPE
        formData  = {
            command: 'getWalletType',
            setting_type : 'both'
        }; 

        fCallback = getWalletType;  
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


        //2FA START
        formData = {
            command : 'get2FAStatus',

        };
        fCallback = loadGet2FAStatus;

        ajaxSend('scripts/reqWhitelist.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


        $("#confirmBtn").click(function(){
            formData = {
                command : 'verify2FASMSOTP',
                otp_code : $('#otpCodeID').val()

            };
            fCallback = loadVerifySMSOTP;
            whitelistUrl ='scripts/reqWhitelist.php'
            ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
           
        });

        $("#enableModalBtn").click(function(){
        
            formData = {
                command : 'register2FA',
                code : $('#otpCodeID').val()

            };
            fCallback = loadRegister2FA;
            whitelistUrl ='scripts/reqWhitelist.php'
            ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $("#confirmUnableBtn").click(function(){
    
            var walletType = $('select#walletType option:selected').val();
                
            formData = {
                command : 'removeAddress',
                code: $('#authCodeID').val(),
                wallet_type: walletType,
                address: del_address
            };

            fCallback = loadRemoveAddress;
            whitelistUrl ='scripts/reqWhitelist.php'
            ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
           
        });
        //2FA End


        $('#searchTransactionBtn').click(function() {

            var myUrl = "<?php echo basename($_SERVER['PHP_SELF']); ?>";
            var walletType = $('select#walletType option:selected').val();

            var formData = {
                wallet_type: walletType,
                page_number: page_number
            };

            $.redirect("searchField.php", {
                url: myUrl,
                searchData: JSON.stringify(formData)
            });
        });

        $("#walletType").change(function() {
            searchVal = "";
            getAddressHistoryData();
        });

    });


    //2FA Start
    function loadGet2FAStatus(data, message){
        twoFaStatus = data.data.status
    }

    function twoFaOtpView() {

        console.log("twoFaOtpView");

        $("#unableModal").modal('show');
    }

    function twoFaRegister() {

        console.log("twoFaRegister");

        formData = {
            command : 'request2FASMSOTP'

        };
        fCallback = loadSendSMSOTP;
        whitelistUrl ='scripts/reqWhitelist.php'
        ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    }

    function loadSendSMSOTP(data,message){
        $("#otpCodeID").val('');
        if(data.code == 1){
            document.getElementById("timer").innerHTML = data.data.countdown_second;
            $("#didNotReceiveSms").hide();
            $("#timer").show();
            startTimer();
            $(".enableStep1").show();
            $(".enableStep2").hide();

            $("#twoFactorModal").modal('show');
        }
    }

    function requestOTP(){

        formData = {
            command : 'request2FASMSOTP'

        };
        fCallback = loadRequestOTP;
        whitelistUrl ='scripts/reqWhitelist.php'
        ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadRequestOTP(data, message){
        if(data.code == 1){
            document.getElementById("timer").innerHTML = data.data.countdown_second;
            $("#didNotReceiveSms").hide();
            $("#timer").show();
            startTimer();
            
        }
    }

    function startTimer() {
        $('#timerDiv').show();
        $('#timer').show();
        $('#didNotReceiveSms').hide();

        var presentTime = document.getElementById('timer').innerHTML;

        var s = checkSecond((presentTime - 1));

        if(s <= "00"){

            $('#timerDiv').hide();
            $('#timer').hide();
            $('#didNotReceiveSms').show();

        }
        else {
            document.getElementById('timer').innerHTML = s;
            setTimeout(startTimer, 1000);
        }
    }

    function checkSecond(sec) {
        if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
        if (sec < 0) {sec = "59"};
        return sec;
    }

    function loadVerifySMSOTP(data, message){
        if(data.code == 1){         
            var qr_data = data.data.qr_param;
            $('#qrcode').empty();
            $('#qrcode').qrcode({
                render: "canvas", 
                text: qr_data,
                width: 200,
                height: 200,
                background: "#ffffff",
                foreground: "#000000",
//                  src: 'images/qrcode.jpg',
                imgWidth: 20,
                imgHeight: 20,
            });

            $('#otpCodeID').val('');
            $("#timerDiv").hide();
            $("#timer").hide();
            $("#didNotReceiveSms").hide();
            $(".enableStep1").hide();
            $(".enableStep2").show();
            
        } else{
            $("#twoFactorModal").modal('hide');
        }
    }

    function loadRegister2FA(data, message){
        var obj = data;
        $("#twoFactorModal").modal('hide');

        var walletType = $('select#walletType option:selected').val();
                
        formData = {
            command : 'removeAddress',
            code: $('#otpCodeID').val(),
            wallet_type: walletType,
            address: del_address
        };

        fCallback = loadRemoveAddress;
        whitelistUrl ='scripts/reqWhitelist.php'
        ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    }

    function loadRemoveAddress(data, message) {
        hideCanvas();
        showMessage(message, 'success', "Success", '', 'whitelistAddressHistory.php');
    }
    //2FA End


    function getAddressHistoryData() {

        var walletType = $('select#walletType option:selected').val();

        formData = {
            command : 'getWhitelistAddressListing',
            wallet_type: walletType,
            address: searchVal,
            page: page_number
        };

        fCallback = loadWhitelistAddressListing;
        whitelistUrl ='scripts/reqWhitelist.php'
        ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    }

    function loadWhitelistAddressListing(data, message){

        if(data.data) {

            var tableNo;
            var listing = data.data.listing;
            
            if(listing && listing.length > 0) {
                $('#showErrorMsg').hide();
                $('#showresultListing').show();

                var newList = [];
                tableRowDetails = [];
                $.each(listing, function(k, v) {

                    var buildCurrencyIcon = '<img src="'+currencyImage[v['wallet_type']]+'" class="currencyLogo">';

                    var rebuildData = {
                        currency: buildCurrencyIcon,
                        address : sanitize(v['address']),
                        whitelist_on : dateTimeToDateFormat(v['added_at'])
                    };

                    newList.push(rebuildData);
                });

                buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
                pagination(pagerId, data.data.pageNumber, data.data.totalPage, data.data.totalRecord, data.data.numRecord);

                $.each(listing, function(k, v) {
                    $('#'+tableId).find('tr#'+k).attr('data-th', v['address']);
                });

                $('#'+tableId+' > tbody > tr').each(function(index, tr) {
                    $(this).find('td').each(function (i, td) {
                        if (i == 3) {
                            $(this).find('a').each(function (j, aTag) {
                                $(this).text('<?php echo $translations["M00364"][$language]; /* of */?>');
                            });
                        }
                    });
                });

                // modify pagination wording
                var paginationHtml = $('#paginateText').text();
                if (paginationHtml) {
                    paginationHtml = paginationHtml.replace('Displaying', '<?php echo $translations["M02092"][$language]; /* Displaying */?>');
                    paginationHtml = paginationHtml.replace('of', '<?php echo $translations["M02093"][$language]; /* of */?>');
                    paginationHtml = paginationHtml.replace('records', '<?php echo $translations["M02094"][$language]; /* records */?>');
                    $('#paginateText').text(paginationHtml)
                }

            } else {
                $('#showErrorMsg').show();
                $('#showresultListing').hide();
            }

        } else {
            showMessage(message, 'danger', 'Whitelist Addresses', 'times-circle-o', 'settingsChangePassword.php');
        }
        
    }

    function pagingCallBack(pageNumber, fCallback){

        var walletType = $('select#walletType option:selected').val();

        formData = {
            command : 'getWhitelistAddressListing',
            wallet_type: walletType,
            address: searchVal,
            page: pageNumber
        };

        fCallback = loadWhitelistAddressListing;
        whitelistUrl ='scripts/reqWhitelist.php'
        ajaxSend(whitelistUrl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    }

    function tableBtnClick(btnId) {
        var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#' + btnId).parent('span').parent('td').parent('tr');
        var tableId = $('#' + btnId).closest('table');

        if (btnName == 'delete') {
            var delAddress = tableRow.attr('data-th');

            var canvasBtnArray = Array('<?php echo $translations["M01861"][$language]; /* Yes */?>');
            var message        = "<?php echo $translations["M02103"][$language]; /* Are you sure you want to remove wallet address from whitelist */?>?";
            
            showMessage(message, '', "<?php echo $translations["M01574"][$language]; /* Confirmation */?>", '', '', canvasBtnArray);

            $('#canvas'+'<?php echo $translations["M01861"][$language]; /* Yes */?>'+'Btn').click(function() {
  
                del_address = Array(delAddress);

                if(twoFaStatus) {
                    twoFaOtpView();
                } else {
                    twoFaRegister();
                }

            });

            $('#canvasCloseBtn').text('<?php echo $translations["M01246"][$language]; /* Close */?>');

        }
    }

    function dateTimeToDateFormat(dateTimeValue) {
	//const now = new Date(dateTimeValue);
	//return moment(now).format('lll');
	return moment(dateTimeValue).format('LLL');
    }

    function getWalletType(data, message){

        if(data.result.coin_data && dropdownFake !=1) {
            $('#walletType').empty();
            //$('#walletType').append('<option value="">All</option>');

            $.each(data.result.coin_data, function(key, val) {
                $('#walletType').append('<option data-image="'+val['image']+'" value="'+ val['wallet_type'] +'">'+ val['display_symbol'] +'</option>')

                currencyImage[val['wallet_type']] = val['image'];
            });

            dropdownFake = 1;

            if(searchWalletType) {
                $('#walletType').val(searchWalletType);   
            }
            
            getAddressHistoryData();

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
