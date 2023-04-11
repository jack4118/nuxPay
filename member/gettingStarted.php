<?php include 'include/config.php'; ?>

<?php
session_start();

if((isset($_POST['access_token']) && $_POST['access_token'] != "")) {
  $_SESSION["access_token"] = $_POST['access_token'];
  $_SESSION["business"]["uuid"] = $_POST['businessID'];
  $_SESSION["sessionLoginTime"] = $_POST['sessionLoginTime'];
}
?>

<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >


    <div class="m-grid m-grid--hor m-grid--root m-page">

        <?php include 'headerDashboard.php'; ?>


        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            <!--<div class="m-subheader marginTopHeader">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <div class="col-12">
                            <div class="row">
                                <div class="dashboardTitleWidth">
                                    <img src="images/dashboard/rocketIcon.svg" style="width: 30px; margin-top: 5px;" />
                                </div>
                                <div class="dashboardTitleWidth2">
                                    <div class="row">
                                        <div class="col-12 dashboardTitle">
                                            Welcome to NuxPay, <?php echo $_SESSION['name']; ?>
                                        </div>
                                        <div class="col-12 dashboardTitleDesc">
                                            Start to setup currencies and API credentials to receive payment now
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->

            <div class="m-content marginTopHeader">

                <div class="col-12 pageHeader pl-0 mb-5">
                    <!-- Getting Started -->

                    <?php echo $translations["M00171"][$language]; /* Getting Started */?>
                </div>

                <div class="row">
                    <a href="requestFundAfterLogin.php" class="col-lg-6 dashboardBoxGap">
                        <div class="dashboardBox">
                            <div class="row">
                                <div class="col-3 gettingStartedIcon">
                                    <img src="<?php echo $sys['source'] == 'FTAG' ?  'images/whitelabel/ftag/request-fund.png' :  'images/nuxPay/newDesign/d1.png'?>">
                                </div>
                                <div class="col-9">
                                    <b class="d-block">
                                    
                                    <?php echo $translations["M01494"][$language]; /* Request Fund */?>
                                    </b>
                                    <span class="d-block mt-3" style="font-size:12px; line-height:1.7;">
                                        
                                        <?php echo $translations["M01596"][$language]; /* Customize your funding request and send to your customer in a single click. */?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="apiIntegration.php" class="col-lg-6 dashboardBoxGap">
                        <div class="dashboardBox">
                            <div class="row">
                                <div class="col-3 gettingStartedIcon">
                                    <img src="<?php echo $sys['source'] == 'FTAG' ?  'images/whitelabel/ftag/API.png' :  'images/nuxPay/newDesign/d2.png'?>">
                                </div>
                                <div class="col-9">
                                    <b class="d-block">                                    
                                        <?php echo $translations["M01597"][$language]; /* API Integration */?>
                                    </b>
                                    <span class="d-block mt-3" style="font-size:12px; line-height:1.7;">                                        
                                        <?php echo $translations["M01598"][$language]; /* Integrate crypto-currencies payments into your website with */?>
                                        <?php echo $sys['companyName']?>
                                        <?php echo $translations["M01599"][$language]; /*'s simple and powerful API. */?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="fundOutHowItWorks1.php" class="col-lg-6 dashboardBoxGap" id="firstTimeShow">
                        <div class="dashboardBox">
                            <div class="row">
                                <div class="col-3 gettingStartedIcon">
                                    <img src="<?php echo $sys['source'] == 'FTAG' ? 'images/whitelabel/ftag/Fund-out.png' :  'images/fundOut/fund-out-ico.png'?>">
								
                                </div>
                                <div class="col-9">
                                    <b class="d-block">
                                    
                                    <?php echo $translations["M01600"][$language]; /* Fund Out */?>
                                    </b>
                                    <span class="d-block mt-3" style="font-size:12px; line-height:1.7;">
                                        
                                        <?php echo $translations["M01601"][$language]; /* Enabling your applications to send crypto-currencies to your customer. */?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="transferWallet.php" class="col-lg-6 dashboardBoxGap" style="display:none" id="notFirstTimeShow">
                        <div class="dashboardBox">
                            <div class="row">
                                <div class="col-3 gettingStartedIcon">
                                    <img src="<?php echo $sys['source'] == 'FTAG' ? 'images/whitelabel/ftag/Fund-out.png' :  'images/fundOut/fund-out-ico.png'?>">
                                </div>
                                <div class="col-9">
                                    <b class="d-block">                                    
                                        <?php echo $translations["M01600"][$language]; /* Fund Out */?>
                                    </b>
                                    <span class="d-block mt-3" style="font-size:12px; line-height:1.7;">                                        
                                        <?php echo $translations["M01601"][$language]; /* Enabling your applications to send crypto-currencies to your customer. */?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
<!--
                    <a href="paymentButtonAfterLogin.php" class="col-lg-6 dashboardBoxGap">
                        <div class="dashboardBox">
                            <div class="row">
                                <div class="col-3">
                                    <img src="images/nuxPay/newDesign/d3.png" width="100%">
                                </div>
                                <div class="col-9">
                                    <b class="d-block">Payment Buttons Integration</b>
                                    <span class="d-block mt-3">
                                        Enabling your website to accept NuxPay payments as simple as placing the pay button on your site.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="col-lg-6 dashboardBoxGap">
                        <div class="dashboardBox">
                            <div class="row">
                                <div class="col-3">
                                    <img src="images/nuxPay/newDesign/d4.png" width="100%">
                                </div>
                                <div class="col-9">
                                    <b class="d-block">QR Pay</b>
                                    <span class="d-block mt-3">
                                        Quickly generate a QR code to accept crypto-currencies payments.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
-->
                </div>


                <div class="row">
                    <div class="col-lg-12 newTitle">
                        <b>
                        
                        <?php echo $translations["M01602"][$language]; /* To Complete */?>
                        </b>
                    </div>
                    <a href="addWithdrawalAddress.php" class="col-lg-12 dashboardBoxGap smallGap">
                        <div class="dashboardBox nextArrow">
                            <div class="row">
                                <div class="col-12">
                                    <span class="d-block">                                          
                                        <?php echo $translations["M01603"][$language]; /* Want to receive payment instantly? */?>
                                        <span class="txtLightBlue">
                                            <?php echo $translations["M01604"][$language]; /* Add withdrawal wallet */?>
                                        </span>
                                        <?php echo $translations["M01605"][$language]; /* to enable auto-withdrawal. */?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- <a href="#" class="col-lg-12 dashboardBoxGap smallGap">
                        <div class="dashboardBox nextArrow">
                            <div class="row">
                                <div class="col-12">
                                    <span class="d-block">
                                        Do not have crypto wallet? <span class="txtLightBlue">Connect with TheNux</span> wallet to receive payment instantly without miner fee! <span data-toggle="tooltip" title="Title" class="txtLightBlue ml-2"><i class="fa fa-info-circle"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a> -->
                    <a href="settings.php" class="col-lg-12 dashboardBoxGap smallGap">
                        <div class="dashboardBox nextArrow">
                            <div class="row">
                                <div class="col-12">
                                    <span class="d-block">                                        
                                        <?php echo $translations["M01606"][$language]; /* Complete your  */?>
                                        <span class="txtLightBlue">                                            
                                            <?php echo $translations["M01876"][$language]; /* Profile  */?>
                                        </span>.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                </div>


                <div class="row">
                    <div class="col-lg-12 newTitle">
                       <b>                        
                            <?php echo $translations["M01608"][$language]; /* News Center  */?>
                       </b>
                    </div>
                    <div href="#" class="col-lg-12 dashboardBoxGap smallGap">
                        <div class="dashboardBox">
                            <div class="row">
                                <div class="col-12">
                                    <b class="d-block">
                                        <?php echo $translations["M01609"][$language]; /* Welcome Onboard!  */?>
                                    </b>
                                    <span class="d-block smallTxt mb-3" id="newsCenterDate">                                        
                                        <?php echo $translations["M01610"][$language]; /* Created on  */?>
                                        19 Aug 2020, 10:00AM
                                    </span>
                                    <span class="d-block" style="font-size: 12.5px">                                        
                                        <?php echo $translations["M01611"][$language]; /* Well done! Your account has been created successfully. Move ahead with Support section in live chat if you do not know where to start from!  */?>
                                    </span>
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

<div class="modal fade" id="generateApiModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b">
                <div class="modal-title f-16"><?php echo $translations["M00138"][$language]; /* Generate API Key */ ?></div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div id="errorMsgAuto" class="alert alert-danger" style="display: none;"></div>
                <div class="form-group m-form__group">
                    <label for="expiryDate" style="padding-top: 10px;"><?php echo $translations["M00141"][$language]; /* Expiry Date */ ?><span class="text-danger">*</span></label>
                     <input class="form-control col-md-12" type="datepicker" name="apiExpiry" id="expiryDate" data-date-format="YYYY MMMM DD" autocomplete="off">
                </div>

            </div>

            <div class="modal-footer bg-w">
                <a href="javascript:void(0)" class="btn btn btn m-btn--pill m-btn--air  btn-outline-secondary btn-sm m-btn m-btn--custom theme-button"  style="color: black;"  data-dismiss="modal" role="button"><?php echo $translations["M00142"][$language]; /* Cancel */ ?></a>
                <a href="javascript:void(0)" id="generateBtn" class="btn btn btn m-btn--pill m-btn--air btn-outline-metal btn-sm m-btn m-btn--custom theme-green-button"  style=""><?php echo $translations["M00143"][$language]; /* Generate */ ?></a>
            </div>
        </div>
    </div>
</div>

<?php include 'sharejsDashboard.php'; ?>

</body>


</html>

<script>

    var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var dateToday       = new Date();
    var firstTime       = "<?php echo $_POST['firstTime']; ?>";
    var walletType      = "<?php echo $_POST['walletType']; ?>";
    var hasSetFundOutAddress = '<?php echo $_SESSION['hasSetFundOutAddress']?>';
    var displayDate = '<?php echo date('d M Y, g:i A', strtotime($_SESSION['registerDate'])) ?>';
    var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';

    if (hasChangedPassword == 0){
		$.redirect('firstTimeLogin.php');
	}

    $(document).ready(function(){
        $('#newsCenterDate').html('<?php echo $translations["M01610"][$language]; /* Created on  */?> ' + displayDate);

        if(hasSetFundOutAddress=="false"){
            $("#firstTimeShow").show();
            $("#notFirstTimeShow").hide();
        } else{
            $("#firstTimeShow").hide();
            $("#notFirstTimeShow").show();
        }
        // fCallback = getWalletType;

        // formData  = {
        //     command: 'getWalletType'
        // };
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        fCallback = getCallbackData;
        formData  = {
            command: 'getCallbackURL'
        };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $("#expiryDate").datepicker({
            format      : 'yyyy-mm-dd 23:59:59',
            orientation : 'bottom auto',
            startDate   : dateToday,
            autoclose   : true
        });

        fCallback = loadApiKeyListing;
        formData  = {
            command: 'getApiKeyListing'
        };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#saveSettings').click(function(){
            var callBackData = $('#callBackURL').val();

            if(callBackData == "")
            {
                $('#callBackDisplayError').show();
                $('#callBackDisplayError').text('Please enter a valid url link');
                $('html, body').animate({
                    scrollTop: $("#callBackDisplayError").offset().top-200
                }, 500);
                $('#callBackDisplayError').focus();
            }
            else
            {
                fCallback = setCallbackData;

                formData  = {
                    command: 'setCallbackURL',
                    callbackURL: callBackData
                };
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

        $('#generateNewApiKey').click(function(){
            $('#generateApiModal').toggle();
        });

        $('#generateBtn').click(function(){
           if( $('input#expiryDate').val() == ''){
                $('.text-danger').hide();
                $('input#expiryDate').after('<span class="text-danger"><?php echo $translations["M00145"][$language]; /*Please enter expiry date */ ?></span>');
                $('html, body').animate({
                    scrollTop: $("#expiryDate").offset().top-120
                }, 500);
                $('input#expiryDate').focus();
            }else{
                var expiryDate = $('input#expiryDate').val();

                fCallback = addNewApi;
                formData  = {
                    command: 'generateApiKeys',
                    expiry_date : expiryDate

                };
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                $('#generateApiModal').modal('hide');

                function addNewApi(data,message){

                    showMessage(message, 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', "check-circle-o", 'gettingStarted.php');
                };
            }
        });

    });

    function copyToClipboard(val){
        // console.log(val);
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

    function getWalletType(data,message){
        // console.log(data);
        var wallets = data.result.coin_data;
        var walletActive ='';
        var destinationAddress ='';

        if (!wallets) {
            showMessage('<?php echo $translations["M00309"][$language]; /* An internal error has occured. Please contact to our support team.  */ ?> ', 'danger', 'Failed', 'times-circle-o', 'dashboard.php');
        }

        $.each(wallets,function(k,v){
            var displayName = v['wallet_type'];
            displayName = displayName.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                return letter.toUpperCase();
            });

            destinationAddress =' <div class="col-12 mb-1"> ';
            destinationAddress +=' <div class="row"> ';
            destinationAddress +=' <div class="col-xl-2 col-lg-2 col-md-3 col-6 text-center">';
            destinationAddress +=' <div class="three columns"> ';
            destinationAddress +=' <label class="toggle"> ';
            destinationAddress +=' <input type="checkbox" class="toggle-input cryptoBtn" id="'+v['wallet_type']+'Status" data-type="'+v['wallet_type']+'">';
            destinationAddress +=' <div class="toggle-controller default-success"></div>';
            destinationAddress +=' </label>';
            destinationAddress +=' </div>';
            destinationAddress +=' </div>';

            destinationAddress +=' <div class="col-xl-3 col-lg-3 col-md-3 col-6 imageOpacity'+v['wallet_type']+'" style="margin-left: -30px; opacity: 0.5">';
            destinationAddress +=' <h3 class="m-form__heading-title activeTitle"> ';
            destinationAddress +=' <img class="mr-2" src="'+v['image']+'" width="35">';
            destinationAddress +=' <span style="vertical-align: middle; font-weight: 300; font-size: 15px">'+v['name']+'</span> ';
            destinationAddress +=' </h3> ';
            destinationAddress +=' </div>';

            destinationAddress +=' <div class="col-xl-7 col-lg-7 col-md-6 col-12"> ';
            destinationAddress +=' <div class="form-group m-form__group cryptoSection pb-3 Destination paddingMobileRightInput" style=""> ';
            destinationAddress +=' <input type="text" id="'+v['wallet_type']+'Address" name="example-text-input" class="form-control destinationAddress" placeholder="" disabled>';
            destinationAddress +=' <span id="addressDisplayError" class="montserratRegularFont" style="display: none; color: red"></span> ';
            destinationAddress +=' </div> ';
            destinationAddress +=' </div> ';
            destinationAddress +=' </div> ';
            destinationAddress +=' </div> ';

            $('#destinationDIV').append(destinationAddress);
        });

        action(wallets);
    }

    function action(wallets){

        if (!firstTime) {
            $('.activeDIV').show();
            var formData = {
                command          : 'getDestinationAddress'
            };

            var fCallback      = loadDestinationAddress;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        fCallback = getWalletData;
        formData  = {
            command: 'getWalletData'
        };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('.cryptoBtn').click(function(){
            var walletType = $(this).attr("data-type");
            var walletStatus = $("#"+walletType+"Status").attr('data-status');

            $(this).each(function()
            {
                if($(this).is(':checked')) {
                    $('#'+walletType+'Address').prop('disabled', false);
                    $(".imageOpacity"+walletType).css({ opacity: 1 });
                } else {
                    $('#'+walletType+'Address').prop('disabled', true);
                    $(".imageOpacity"+walletType).css({ opacity: 0.5 });
                }
            });
        });

        $('#saveCoinAddress').click(function(){
            var storeWalletAddress = "";
            var storeWalletAry = [];

            $('.cryptoBtn').each(function()
            {
                var walletType = $(this).attr("data-type");
                var destinationAddress = $('#'+walletType+'Address').val();

                if( $(this).is(':checked') )
                {
                    storeWalletAddress = {
                      wallet_type           : walletType,
                      destination_address   : destinationAddress,
                      status                : 1
                    };

                    storeWalletAry.push(storeWalletAddress);
                }
            });

            // console.log(storeWalletAry);

            var formData = {
                command                  : 'webpaydestinationaddresssetv1',
                crypto_address_details   : storeWalletAry
            };
            var fCallback = setDestinationAddress;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });
    }

    function loadApiKeyListing(data, message) {
        var getApiKeyList = data.result.apikeys;
        var checkApiKeyResult = data.result;
        var printApiKeyList ='';

        if(getApiKeyList)
        {
            var apiListLength = getApiKeyList.length;
            var counter = 1;

            $.each(getApiKeyList,function(k,v){

                if(k < 2)
                {
                    printApiKeyList =' <div class="col-12 eachColumnAddress"> ';
                    printApiKeyList +=' <div class="row"> ';
                    printApiKeyList +=' <div class="col-xl-8 col-lg-8 col-md-6 col-12 marginAddressBottom"> ';
                    printApiKeyList +=' <div class="row"> ';

                    printApiKeyList +=' <div class="col-12 montserratMediumsFont mb-1 specificClickAddress'+k+'" style="font-size: 15px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" id="getActiveAddresss'+k+'">'+v['apikey']+'</div>';
                    printApiKeyList +=' <div class="col-12"> ';

                    if(v['status'] == 1)
                        printApiKeyList +=' <span class="activeBtnStyleActive montserratRegularFont">Active</span> ';
                    else
                        printApiKeyList +=' <span class="activeBtnStyleExpired montserratRegularFont">Expired</span> ';

                    printApiKeyList +=' </div> ';
                    printApiKeyList +=' <div class="col-12 mt-3 montserratRegularFont">'+moment(v['expired_at']).format('DD/MM/YYYY h:mm:ss A')+' </div>';
                    printApiKeyList +=' </div> ';
                    printApiKeyList +=' </div> ';

                    printApiKeyList +=' <div class="col-xl-2 col-lg-2 col-md-3 col-6 text-center" id="'+k+'"> ';
                    printApiKeyList +=' <img src="images/dashboard/newCopyIcon.png" style="width: 20px;cursor: pointer" class="copyImgClick"/>';
                    printApiKeyList +=' </div> ';
                    printApiKeyList +=' <div class="col-xl-2 col-lg-2 col-md-3 col-6 text-center montserratRegularFont getDeleteId'+v['id']+'" style="color: #ea5050" id="'+v['id']+'"> ';
                    printApiKeyList +=' <span class="deleteApiKey mt-1" style="cursor: pointer">Delete</span>';
                    printApiKeyList +=' </div> ';
                    printApiKeyList +=' </div> ';
                    printApiKeyList +=' </div> ';

                    if(counter != 2)
                    {
                        printApiKeyList +=' <div class="col-12 hrMarginTopBottom"> ';
                        printApiKeyList +=' <hr> ';
                        printApiKeyList +=' </div> ';
                    }

                    counter++;
                    $('#printApiKeyList').append(printApiKeyList);
                }
            });
        }
        else
        {
            printApiKeyList =' <div class="col-xl-2 col-lg-2 col-md-2 col-12 text-center" style="margin: auto;"> ';
            printApiKeyList +=' <img src="images/dashboard/noDateKeyIcon.png" style="width: 30px;"/> ';
            printApiKeyList +=' </div> ';
            printApiKeyList +=' <div class="col-xl-10 col-lg-10 col-md-10 col-12"> ';
            printApiKeyList +=' <div class="row"> ';
            printApiKeyList +=' <div class="col-12 montserratSemiBoldFont" style="font-size: 16px">You haven’t created any API keys yet.</div> ';
            printApiKeyList +=' <div class="col-12 mt-3 montserratRegularFont" style="font-size: 14px;">API keys allow you to perform automated actions  on your account</div> ';
            printApiKeyList +=' </div> ';
            printApiKeyList +=' </div> ';

            $('#printApiKeyList').append(printApiKeyList);
        }

        $('.copyImgClick').click(function()
        {
            var getCopyParentId = $(this).parent().attr('id');

            var k = 0;
            $(".eachColumnAddress").each(function()
            {
                var getAllId = $('.specificClickAddress'+k).attr('id');
                var compareSpecificId = 'getActiveAddresss'+getCopyParentId;

                if(getAllId == compareSpecificId)
                     copyToClipboard( $('#getActiveAddresss'+k).text() );

                k++;
            });
        });

        $('.deleteApiKey').click(function()
        {
            var getCopyParentId = $(this).parent().attr('id');

            var canvasBtnArray = Array('Delete');
            var message = '<?php echo $translations["M00147"][$language]; /* Are ypu sure you want to delete this API Key? */ ?>';
            showMessage(message, 'warning', '<?php echo $translations["M00148"][$language]; /* Delete API Key */ ?>', 'warning', '', canvasBtnArray);
            $('#canvasDeleteBtn').click(function() {
                var formData = {
                    'command'   : 'deleteApiKey',
                    'apikey_id' : getCopyParentId
                };

                fCallback = loadDelete;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        });

    }

    function loadDelete(data,message){
        fCallback = successfulDelete;
        formData  = {
            command: 'getApiKeyListing'
        };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    }
    function successfulDelete(data,message){
        showMessage('<?php echo $translations["M00149"][$language]; /* API key deleted */ ?>', 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', 'check-circle-o', 'gettingStarted.php');
    }

    function loadDestinationAddress(data, message) {

        var address = data.result.destination_addresses;

        $.each(address, function(k, v) {
            $('#'+k+"Address").val(v);
            $('#'+k+"CancelBtn").attr("data-address",v);
        });
    }

    function setDestinationAddress(data, message) {
        firstTime="";

        showMessage(message, 'success', '<?php echo $translations["M01173"][$language]; /* Success */ ?>', 'check-circle-o', 'gettingStarted.php');
    }

    function getWalletData(data,message){
        $.each(data.result.wallets, function(k, v) {
            if (v["status"]==1) {
                $("."+v["type"]+"ActiveCrypto").addClass("cryptoBox");
                // $("."+v["type"]+"Active").show();
                $("."+v["type"]+"Destination").show();
                $("#"+v["type"]+"Status").attr('checked', true);
                $("#"+v["type"]+"Status").attr('data-status', '1');

                $("#"+v["type"]+"Address").prop('disabled', false);
                $(".imageOpacity"+v["type"]).css({ opacity: 1 });
            }else{
                $("#"+v["type"]+"Status").attr('checked', false);
                $("#"+v["type"]+"Status").attr('data-status', '0');
            }
        });
    }

    function getCallbackData(data,message){
        $('#callBackURL').val(data.result.callback_url);
    }

    function setCallbackData(data,message){
        // console.log(data);
        showMessage(message, 'success', '<?php echo $translations["M01173"][$language]; /* Success */ ?>', 'check-circle-o', 'gettingStarted.php');
    }

</script>
