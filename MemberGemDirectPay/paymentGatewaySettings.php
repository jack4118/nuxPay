<?php include 'include/config.php'; ?>

<?php
session_start();
$firstTime = $_POST['firstTime'];
$thisPage = basename($_SERVER['PHP_SELF']);
$_SESSION['lastVisited'] = $thisPage;
if (!$firstTime && ($_SESSION['paymentGatewayStatus']==0 || !$_SESSION['paymentGatewayStatus'])) {
   header("Location: paymentGatewayCheckStatus.php");
}
?>

<?php include 'headDashboard.php'; ?>


<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default paymentGatewaySettings"  >

    
    <div class="m-grid m-grid--hor m-grid--root m-page">

        <?php include 'headerDashboard.php'; ?>
       

        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <i class="m-nav__link-icon la la-credit-card"></i>
                        <h3 class="m-subheader__title "><?php echo $translations["M00130"][$language]; /* Payment Gateway */ ?></h3>    
                    </div>  
                </div>
            </div>

                    
            <div class="m-content">
                
                <div class="row">
                    <div class="col-xl-12">
                        

                        <div class="m-portlet m-portlet--tab">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon m--hide">
                                            <i class="la la-gear"></i>
                                        </span>
                                        <h1 class="m-portlet__head-text" style="font-size:15pt;">
                                           <?php echo $translations["M00311"][$language]; /* Active Cryptocurrencies */ ?>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <form class="m-form m-form--fit">
                                <div class="m-portlet__body"> 
                                    <div id="destinationDIV" class="row">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="m-portlet m-portlet--tab">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon m--hide">
                                            <i class="la la-gear"></i>
                                        </span>
                                        <h1 class="m-portlet__head-text" style="font-size:15pt;">
                                            <?php echo $translations["M01268"][$language]; /* Settings */ ?>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <form class="m-form m-form--fit m-form--label-align-right">
                                <div class="m-portlet__body"> 
                                        <div class="form-group m-form__group">
                                            <label for="integrationName"> <?php echo $translations["M01269"][$language]; /* Callback URL */ ?></label>
                                            <i data-toggle="m-tooltip" data-direction="left" data-width="auto" class="m-form__heading-help-icon descMsg flaticon-info m--icon-font-size-lg" title="" data-html="true" data-original-title="<p align='left' class='mb-0'><?php echo $translations["M01271"][$language]; /* If you want to get notify when there are transaction done on <br>your Payment Gateway, your developer will need to set the <br>callbackURL and paste it here. */ ?></p>"></i>
pPay                                            <input id="callBackURL" type="text" class="form-control m-input col-md-6" placeholder="https://www.gemdirectpay.com/" value="">
                                        </div>
                                        <div class="form-group m-form__group">
                                            <a id="saveSettings" href="#" class="btn btn btn m-btn--pill m-btn--air btn-outline-metal btn-sm m-btn m-btn--custom" style="color:white;border-color:#231917; background-color: #231917"  role="button"> <?php echo $translations["M01270"][$language]; /* Save */ ?></a>
                                        </div>
                                </div>
                            </form>
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


    
    var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var firstTime = "<?php echo $_POST['firstTime']; ?>";
    var walletType = "<?php echo $_POST['walletType']; ?>";
    

    $(document).ready(function(){

        fCallback = getWalletType;

        formData  = {
            command: 'getWalletType'
        };    
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        fCallback = getCallbackData;

        formData  = {
            command: 'getCallbackURL'
        };    
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#saveSettings').click(function(){
            var callBackData = $('#callBackURL').val();

            fCallback = setCallbackData;

            formData  = {
                command: 'setCallbackURL',
                callbackURL: callBackData
            };    
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });

    });

    function getWalletType(data,message){
        // console.log(data);
        var wallets = data.result.wallet_types;
        var walletActive ='';
        var destinationAddress ='';

        if (!wallets) {
            showMessage('<?php echo $translations["M00309"][$language]; /* An internal error has occured. Please contact to our support team.  */ ?> ', 'danger', 'Failed', 'times-circle-o', 'dashboard.php');
        }

        $.each(wallets,function(k,v){
            var displayName = v;
            displayName = displayName.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                return letter.toUpperCase();
            });
            
            destinationAddress ='<div class="col-md-6 mt-3 mt-md-0 cryptoDIV">';
            // if (v["status"]=="1") {
                // destinationAddress +='    <div class="m-form__section m-form__section--first cryptoBox">';
            // }else{
                destinationAddress +='    <div class="m-form__section m-form__section--first '+v+'ActiveCrypto">';
            // }
            destinationAddress +='        <div class="m-form__heading activeBox cryptoSection pt-3">';
            destinationAddress +='            <h3 class="m-form__heading-title activeTitle">';
            destinationAddress +='                <img class="mr-2" src="images/cryptocurrencies/'+v+'.svg" width="35">';
            destinationAddress +='                <b style="vertical-align: middle;">'+displayName+'</b>';
            destinationAddress +='            </h3>';
            destinationAddress +='            <div class="activeDIV '+v+'Active" align="right" style="display:none;">';
            destinationAddress +='                <span class="m-switch m-switch--outline m-switch--icon m-switch--success activeBtn mt-2" style="">';
            destinationAddress +='                    <label class="mb-0" style="vertical-align: middle;">';
            destinationAddress +='                        <input id="'+v+'Status" data-type="'+v+'" type="checkbox" class="cryptoBtn" name="">';
            destinationAddress +='                        <span></span>';
            destinationAddress +='                    </label>';
            destinationAddress +='                </span>';
            destinationAddress +='            </div>';
            destinationAddress +='        </div>';
            // if (v["status"]=="1") {
            
                destinationAddress +='        <div class="form-group m-form__group cryptoSection pb-3 '+v+'Destination" style="">';
                destinationAddress +='            <label for="example_input_full_name"><?php echo $translations["M00468"][$language]; /* Set Destination Address */ ?></label>';

                destinationAddress +='            <div class="input-group">';
                if (v=="bitcoin") {
                    destinationAddress +='                <input type="text" id="'+v+'Address" name="example-text-input" class="form-control destinationAddress" placeholder="<?php echo $translations["M00312"][$language]; /* Eg */ ?>: gPX1NuQ2K0yfeEBr5SpY6hcxDZdLMRqW" disabled>';
                }else if (v=="ethereum") {
                    destinationAddress +='                <input type="text" id="'+v+'Address" name="example-text-input" class="form-control destinationAddress" placeholder="<?php echo $translations["M00312"][$language]; /* Eg */ ?>: 0xade4f9852a30860f01539392247ba545e3a138d9" disabled>';
                }else{
                    destinationAddress +='                <input type="text" id="'+v+'Address" name="example-text-input" class="form-control destinationAddress" placeholder="" disabled>';
                }
                
                destinationAddress +='                <div class="input-group-append">';
                destinationAddress +='                    <button id="'+v+'EditBtn" data-type="'+v+'" class="waves-effect waves-light btn btn-primary theme-green-button destinationEditBtn" type="button" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
                destinationAddress +='                    <button id="'+v+'CancelBtn" data-type="'+v+'" class="waves-effect waves-light btn btn-primary theme-btn-grey destinationCancelBtn" type="button" style="display:none;" title="Cancel"><i class="fa fa-ban" aria-hidden="true"></i></button>';
                destinationAddress +='                    <button id="'+v+'SaveBtn" data-type="'+v+'" class="waves-effect waves-light btn btn-primary theme-green-button destinationSaveBtn" type="button" style="display:none;" title="Save"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>';
                destinationAddress +='                </div>';
                destinationAddress +='            </div>';

                destinationAddress +='        </div>';
            // }
            destinationAddress +='    </div>';
            destinationAddress +='</div>';

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
            var checkboxStatus;
            console.log(walletStatus);
            if (walletStatus==1) {
                checkboxStatus = 0;
            }else{
                checkboxStatus = 1;
            }


            fCallback = setStatus;

            formData  = {
                command: 'setCryptoStatus',
                wallet_type: walletType,
                status: checkboxStatus
            };    
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('.destinationCancelBtn').click(function(){
            // console.log("oldWalletType:"+walletType);
            walletType = $(this).attr("data-type");
            var currentAddress = $(this).attr("data-address");
            $('#'+walletType+"Address").val(currentAddress);
            $('#'+walletType+"EditBtn").show();
            $('#'+walletType+"CancelBtn").hide();
            $('#'+walletType+"SaveBtn").hide();
            $('#'+walletType+'Address').attr("disabled",true);
        });

        $('.destinationEditBtn').click(function(){
            walletType = $(this).attr("data-type");
            $('#'+walletType+"EditBtn").hide();
            $('#'+walletType+"CancelBtn").show();
            $('#'+walletType+"SaveBtn").show();
            $('#'+walletType+'Address').attr("disabled",false);
        });

        $('.destinationSaveBtn').click(function(){
           
            walletType = $(this).attr("data-type");
            var destinationAddress = $('#'+walletType+'Address').val();
            
            if(firstTime){
                var formData = {
                    command          : 'setDestinationAddress',
                    wallet_type      : walletType,
                    status  : 1,
                    destination_address : destinationAddress
                };
            }else{
                var formData = {
                    command          : 'setDestinationAddress',
                    wallet_type      : walletType,
                    destination_address : destinationAddress
                };
            }
            

            var fCallback      = setDestinationAddress;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    }

    function loadDestinationAddress(data, message) {
        
        var address = data.result.destination_addresses;

        $.each(address, function(k, v) {
            $('#'+k+"Address").val(v);
            $('#'+k+"CancelBtn").attr("data-address",v);
        });
    }

    function setDestinationAddress(data, message) {
        // console.log(firstTime);
        firstTime="";

        $('#'+walletType+"EditBtn").show();
        $('#'+walletType+"SaveBtn").hide();
        $('#'+walletType+"CancelBtn").hide();
        $('#'+walletType+'Address').attr("disabled",true)

        showMessage(message, 'success', '<?php echo $translations["M01173"][$language]; /* Success */ ?>', 'check-circle-o', 'paymentGatewaySettings.php');
    }

    function getWalletData(data,message){
        // console.log(data);
        $.each(data.result.wallets, function(k, v) {
            if (v["status"]==1) {
                $("."+v["type"]+"ActiveCrypto").addClass("cryptoBox");
                // $("."+v["type"]+"Active").show();
                $("."+v["type"]+"Destination").show();
                $("#"+v["type"]+"Status").attr('checked', true);
                $("#"+v["type"]+"Status").attr('data-status', '1');
            }else{
                $("#"+v["type"]+"Status").attr('checked', false);
                $("#"+v["type"]+"Status").attr('data-status', '0');
            }
        });
    }

    function setStatus(data,message){
        showMessage(message, 'success', '<?php echo $translations["M01173"][$language]; /* Success */ ?>', 'check-circle-o', 'paymentGatewaySettings.php');
    }

    function getCallbackData(data,message){
        // console.log(data);
        $('#callBackURL').val(data.result.callback_url);
    }

    function setCallbackData(data,message){
        // console.log(data);
        showMessage(message, 'success', '<?php echo $translations["M01173"][$language]; /* Success */ ?>', 'check-circle-o', 'paymentGatewaySettings.php');
    }

</script>