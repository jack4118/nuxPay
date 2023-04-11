<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-content marginTopHeader">

				<div class="col-12 pageHeader mb-3 px-0" id="headerDiv">				    
					<?php echo $translations["M01882"][$language]; /* Create Advertisement */?>
				</div>
				
                <div class="col-xl-12 px-0">

                	<div class="row">

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12">   
                                <a href="javascript:window.history.back();">< <?php echo $translations["M01891"][$language]; /* Back */?></a> 
                                </div>
                                
                            </div>
                        </div>


                		<div class="col-12 mb-3">
                			<div class="row">
                				<div class="col-12 bigText"> 
									<?php echo $translations["M01892"][$language]; /* I want to */?>
                				</div>
                				<div class="col-12 smallTxt">                					 
									<input type="radio" id="radioBuy" name="radioType" value="buy" checked="true">
                                    <lable for="radioBuy" style="padding-left: 10px; padding-right: 20px;"><?php echo $translations["M01883"][$language]; /* Buy */?></lable>
                                    <input type="radio" id="radioSell" name="radioType" value="sell">
                                    <lable for="radioSell" style="padding-left: 10px;"><?php echo $translations["M01884"][$language]; /* Sell */?></lable>
                				</div>
                				
                			</div>
                		</div>

            <!--    		<div class="col-12 mt-4 mt-md-4">
                			<div class="row">
                				<div class="col-12 bigText">  
									<?php echo $translations["M01893"][$language]; /* Crypto Currency */?>
                				</div>
                				<div class="col-12 smallTxt">   
                					<?php echo $translations["M01894"][$language]; /* Select currency that you'd like to buy or sell */?>
                				</div>
                				<div class="col-12 smallTxt" style="margin-top: 10px;">  
                                    <select class="whitelistWalletType" name="walletType_upload" id="walletType_upload"></select>
                				</div>
                			</div>
                		</div>

                		<div class="col-12 mt-4 mt-md-4">
                            <div class="row">
                                <div class="col-12 bigText">                          
                                    <?php echo $translations["M01887"][$language]; /* Amount */?>
                                </div>
                                <div class="col-12 smallTxt">
                                    <?php echo $translations["M01895"][$language]; /* Amount to buy or sell */?>
                                </div>
                                <div class="col-3 smallTxt" style="margin-top: 10px;">  
                                    <input type='text' class='form-control' id='amount' placeholder="Optional" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                                </div>
                            </div>
                        </div>-->

                		<div class="col-12 mt-4 mt-md-4">
                            <div class="row">
                                <div class="col-12 bigText">                          
                                    <?php echo $translations["M01888"][$language]; /* Description */?>
                                </div>
                                <div class="col-12 smallTxt">
                                    <?php echo $translations["M01896"][$language]; /* Say something about your advertisement, contact method and payment method. */?>
                                </div>
                                <div class="col-6 smallTxt" style="margin-top: 10px;"> 
                                    <textarea id="message" class="form-control" rows="5" placeholder="<?php echo $translations["M01926"][$language]; /* I want to buy 10 USDT. My contact number is +1xxxxxxxx. Bank transfer acceptable. */?>"></textarea>
                                </div>
                                <div class="col-12 smallTxt" style="margin-top: 5px;">
                                    <span id="characterCount">0</span> <span><?php echo $translations["M01898"][$language]; /* Character(s). Max */?> 200</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4 mt-md-4">
                            <button id="createAdsButton" class="btn searchBtn" type="button"><?php echo $translations["M01899"][$language]; /* Create */?></button>
                            <button id="SaveAdsButton" class="btn searchBtn" type="button" style="display: none;"><?php echo $translations["M01072"][$language]; /* Save */?></button>
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
    
   
    var divId    = 'apiKeysDivList';
    var tableId  = 'apiKeysListTable';
    var pagerId  = 'apiKeysPager';
    var btnArray = {};
    var thArray  = Array();




    var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var dropdownFake;
    var formData        = "";
    var fCallback       = "";
	var getToken 		= "<?php echo $_POST['token']?>";
	var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';
	var accountType = "<?php echo $_SESSION['account_type']; ?>";
	// var accountType = "basic";

    var ads_id = "<?php echo $_POST['ads_id']; ?>";

	if (hasChangedPassword == 0){
		$.redirect('firstTimeLogin.php');
	}

	$(document).ready(function() {
		
        formData  = {
            command: 'getWalletType'
        };  
        fCallback = getWalletType;  
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


        $('#message').on('keyup', function(e) {
            
            var msgLength = $('#message').val().length;
            if(msgLength>200) {
                $('#message').val($('#message').val().substring(0,200));
                $('#characterCount').text('200');
            } else {
                $('#characterCount').text(msgLength);
            }

        });

        $("#amount").keyup(function(event) {

            var inputAmount = this.value;
            var amount_parts = inputAmount.toString().split(".");

            if (inputAmount==".") {
                this.value = "";
            } else if (amount_parts.length == 3) {
                inputAmount = amount_parts[0]+"."+amount_parts[1];
                this.value = inputAmount;
            } 

        });

        $('#radioBuy').click(function() {
            $('#message').attr("placeholder", "<?php echo $translations["M01926"][$language]; /* I want to buy 10 USDT. My contact number is +1xxxxxxxx. Bank transfer acceptable. */?>");
        });

        $('#radioSell').click(function() {
            $('#message').attr("placeholder", "<?php echo $translations["M01897"][$language]; /* I want to sell 10 USDT. My contact number is +1xxxxxxxx. Bank transfer acceptable. */?>");
        });

        $('#createAdsButton').click(function() {

            var selType = $('input:radio[name="radioType"]:checked').val();
            var selWalletType = $('select#walletType_upload option:selected').val();
            var selAmount = $('#amount').val();
            var selMessage = $('#message').val();

            if(selType=="") {
                showMessage('<?php echo $translations["E00238"][$language]; /* Type cannot be empty. */?>', 'warning', '', 'warning', '');
            } else if(selWalletType=="") {
                showMessage('<?php echo $translations["E00419"][$language]; /* Wallet Type cannot be empty. */?>', 'warning', '', 'warning', '');
            } 
            // else if(selAmount=="") {
            //     showMessage('<?php echo $translations["E00477"][$language]; /* Amount cannot be empty. */?>', 'warning', '', 'warning', '');
            // }  else if(selAmount==0) {
            //     showMessage('<?php echo $translations["E00214"][$language]; /* Invalid amount. */?>', 'warning', '', 'warning', '');
            // } 
            else if(selMessage=="") {
                showMessage('<?php echo $translations["E00318"][$language]; /* Description cannot be empty. */?>', 'warning', '', 'warning', '');
            } else {

                formData  = {
                    command: 'nuxpayadvestimentcreate',
                    type: selType,
                    wallet_type: selWalletType,
                    amount: selAmount,
                    content: selMessage
                };  
                fCallback = nuxpayadvestimentcreateUpdateResult;  
                ajaxSend('scripts/reqAdvertisement.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            }

        });

        $('#SaveAdsButton').click(function() {

            var selAmount = $('#amount').val();
            var selMessage = $('#message').val();

            // if(selAmount=="") {
            //     showMessage('<?php echo $translations["E00477"][$language]; /* Amount cannot be empty. */?>', 'warning', '', 'warning', '');
            // }  else if(selAmount==0) {
            //     showMessage('<?php echo $translations["E00214"][$language]; /* Invalid amount. */?>', 'warning', '', 'warning', '');
            // } else 
            if(selMessage=="") {
                showMessage('<?php echo $translations["E00318"][$language]; /* Description cannot be empty. */?>', 'warning', '', 'warning', '');
            } else {

                formData  = {
                    command: 'nuxpayadvestimentupdate',
                    ads_id: ads_id,
                    amount: selAmount,
                    content: selMessage
                };  
                console.log(formData);
                fCallback = nuxpayadvestimentcreateUpdateResult;  
                ajaxSend('scripts/reqAdvertisement.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            }

        });

        if(ads_id!="") {
            $('#headerDiv').text('<?php echo $translations["M01925"][$language]; /* Edit Advertisement */?>');

            $('input[name=radioType]').attr("disabled",true);
            $('#walletType_upload').attr("disabled",true);
            $('#SaveAdsButton').show();
            $('#createAdsButton').hide();

        } else {

            $('#SaveAdsButton').hide();
            $('#createAdsButton').show();
        }

	});
	
    function nuxpayadvestimentcreateUpdateResult(data, message) {

        var selType = $('input:radio[name="radioType"]:checked').val();

        if(ads_id!="") {
            showMessage(message, 'success', "success", 'check-circle-o', 'myAds.php');
        } else if(selType=="buy") {
            showMessage(message, 'success', "Success", 'check-circle-o', 'buyAds.php');
        } else {
            showMessage(message, 'success', "Success", 'check-circle-o', 'sellAds.php');
        }

    }

	function getWalletType(data, message) {

        if(data.result.coin_data && dropdownFake !=1) {

            $('#walletType_upload').empty();

            $.each(data.result.coin_data, function(key, val) {
                $('#walletType_upload').append('<option data-image="'+val['image']+'" value="'+ val['wallet_type'] +'">'+ val['symbol'] +'</option>')
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

        $('#walletType_upload').select2({
            dropdownAutoWidth : true,
            templateResult: formatState,
            templateSelection: formatState
        });


        if(ads_id!="") {

            formData  = {
                command: 'nuxpayadvestimentdetailget',
                ads_id: ads_id
            };  
            fCallback = nuxpayadvestimentdetailgetResult;  
            ajaxSend('scripts/reqAdvertisement.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        }

        
    }

    function nuxpayadvestimentdetailgetResult(data, message) {

        var detail = data.data;

        if(detail) {

            if(detail.amount>0) {
                var detailAmount = detail.amount;
            } else {
                var detailAmount = "";
            }
            
            if(detail.type=="buy") {
                $('#message').attr("placeholder", "<?php echo $translations["M01926"][$language]; /* I want to buy 10 USDT. My contact number is +1xxxxxxxx. Bank transfer acceptable. */?>");
            } else {
                $('#message').attr("placeholder", "<?php echo $translations["M01897"][$language]; /* I want to sell 10 USDT. My contact number is +1xxxxxxxx. Bank transfer acceptable. */?>");
            }
            var detailContent = detail.content;
            var detailType = detail.type;
            var detailWalletType = detail.wallet_type;

            $('#amount').val(detailAmount);
            $('#message').val(detailContent);
            $('#characterCount').text(detailContent.length);
            $('#walletType_upload').val(detailWalletType).trigger('change');
            $("input[name=radioType][value='"+detailType+"']").prop("checked",true);
        }
    }
	
</script>



<style type="text/css">
    
    .whitelistWalletType {
        color: gray;
        width: 130px; 
        border-color: #e8e8e8; 
        border-style: ridge; 
        box-shadow: none; 
        outline: none; 
        color: gray;
    }

</style>
