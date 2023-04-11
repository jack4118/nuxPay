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
									<input class="radioType" type="radio" id="radioBuy" name="radioType" value="buy" checked="true">
                                    <lable for="radioBuy" style="padding-left: 10px; padding-right: 20px;"><?php echo $translations["M01883"][$language]; /* Buy */?></lable>
                                    <input class="radioType" type="radio" id="radioSell" name="radioType" value="sell">
                                    <lable for="radioSell" style="padding-left: 10px;"><?php echo $translations["M01884"][$language]; /* Sell */?></lable>
                				</div>
                				
                			</div>
                		</div>

                		<div class="col-12 mt-4 mt-md-4">
                			<div class="row">
                				<div class="col-12 bigText">  
									<?php echo $translations["M01920"][$language]; /* Currency */?>
                				</div>
                				<div class="col-12 smallTxt">   
                					<?php echo $translations["M01894"][$language]; /* Select currency that you'd like to buy or sell */?>
                				</div>

                                <div id="walletTypeDiv" class="col-12 smallTxt row" style="margin-top: 10px; margin-left: 2px;">  

                                </div>

                			</div>
                		</div>

                		<div class="col-12 mt-4 mt-md-4" >
                            <div class="row">
                                <div class="col-12 bigText">                          
                                    <?php echo $translations["M01888"][$language]; /* Description */?>
                                </div>
                                <div class="col-12 smallTxt">
                                    <?php echo $translations["M01896"][$language]; /* Say something about your advertisement, contact method and payment method. */?>
                                </div>
                                <div class="col-12 smallTxt" style="margin-top: 10px;"> 
                                    <textarea id="message" class="form-control" rows="5" placeholder="<?php echo $translations["M01926"][$language]; /* I want to buy 10 USDT. My contact number is +1xxxxxxxx. Bank transfer acceptable. */?>"></textarea>
                                </div>
                                <div class="col-12 smallTxt" style="margin-top: 5px; text-align: right;">
                                    <span id="characterCount">0</span> <span><?php echo $translations["M01898"][$language]; /* Character(s). Max */?> 200</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4 mt-md-4" >
                            <div class="row">
                                <div class="col-12 bigText">                          
                                    <?php echo $translations["M01951"][$language]; /* Contact Information */?>
                                </div>
                                <div class="col-12 smallTxt">
                                    <?php echo $translations["M01952"][$language]; /* Add preferred contact method that allow buyer or seller to reach you */?>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 smallTxt" style="margin-top: 10px;"> 

                                    <table style="width: 100%; background: white;">
                                        <tr style="height: 38px; border-bottom: 1px solid #C5C5C5;">
                                            <td style="width:50px;"></td>
                                            <td style="min-width: 130px; max-width:160px; font-size: 13px; font-weight: 400;"><?php echo $translations["M01953"][$language]; /* Contact Method */?></td>
                                            <td style="font-size: 13px; font-weight: 400;">Info</td>
                                        </tr>

                                        <tr style="height: 38px;">
                                            <td style="text-align: center;"><input type="checkbox" id="chkboxPhoneCall" name="chkboxPhoneCall" value="phoneCall"></td>
                                            <td><?php echo $translations["M01954"][$language]; /* Phone Call */?></td>
                                            <td style="padding-right: 10px;"><input type='text' class='form-control contactMethod' id='txtPhonecall' disabled  maxlength="50"></td>
                                        </tr>

                                        <tr style="height: 38px;">
                                            <td style="text-align: center;"><input type="checkbox" id="chkboxEmail" name="chkboxEmail" value="email"></td>
                                            <td><?php echo $translations["M01955"][$language]; /* Email */?></td>
                                            <td style="padding-right: 10px;"><input type='text' class='form-control contactMethod' id='txtEmail' disabled maxlength="50"></td>
                                        </tr>

                                        <tr style="height: 38px;">
                                            <td style="text-align: center;"><input type="checkbox" id="chkboxWhatsapp" name="chkboxWhatsapp" value="whatsapp"></td>
                                            <td><?php echo $translations["M01956"][$language]; /* WhatsApp */?></td>
                                            <td style="padding-right: 10px;"><input type='text' class='form-control contactMethod' id='txtWhatsapp' disabled maxlength="50"></td>
                                        </tr>

                                        <tr style="height: 38px;">
                                            <td style="text-align: center;"><input type="checkbox" id="chkboxWechat" name="chkboxWechat" value="wechat"></td>
                                            <td><?php echo $translations["M01957"][$language]; /* WeChat */?></td>
                                            <td style="padding-right: 10px;"><input type='text' class='form-control contactMethod' id='txtWechat' disabled maxlength="50"></td>
                                        </tr>

                                        <tr style="height: 38px;">
                                            <td style="text-align: center;"><input type="checkbox" id="chkboxTelegram" name="chkboxTelegram" value="telegram"></td>
                                            <td><?php echo $translations["M01958"][$language]; /* Telegram */?></td>
                                            <td style="padding-right: 10px;"><input type='text' class='form-control contactMethod' id='txtTelegram' disabled maxlength="50"></td>
                                        </tr>

                                        <tr style="height: 38px;">
                                            <td style="text-align: center;"><input type="checkbox" id="chkboxOthers" name="chkboxOthers" value="others"></td>
                                            <td><?php echo $translations["M01959"][$language]; /* Others */?></td>
                                            <td style="padding-right: 10px;"><input type='text' class='form-control contactMethod' id='txtOthers' disabled maxlength="50"></td>
                                        </tr>
                                    </table>


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


    var url             = 'scripts/reqAdvertisement.php';
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

    var allCheckboxId = [];
    var selectedWalletType = [];

    var order_id = "<?php echo $_POST['order_id']; ?>";

	if (hasChangedPassword == 0){
		$.redirect('firstTimeLogin.php');
	}

	$(document).ready(function() {
		
        formData  = {
            command: 'nuxpaybuysellwallettypeget'
        };  
        fCallback = getWalletType;  
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


        $('#message').on('keyup', function(e) {
            
            var msgLength = sanitize($('#message').val()).length;
            if(msgLength>200) {
                $('#message').val($('#message').val().substring(0,200));
                $('#characterCount').text('200');
            } else {
                $('#characterCount').text(msgLength);
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
            var selMessage = sanitize($('#message').val());

            checkWalletTypeSelected();

           
            var contactDetail = [];

            if($('#chkboxPhoneCall').prop("checked")==true) {
                if( $('#txtPhonecall').val()=="") {
                    showMessage('Phone number cannot be empty.', 'warning', '', 'warning', '');
                    return;
                } else {
                    contactDetail.push({type:"phoneCall", detail:sanitize($('#txtPhonecall').val())});
                }
            }

            if($('#chkboxEmail').prop("checked")==true) {
                if( $('#txtEmail').val()=="") {
                    showMessage('Email address cannot be empty.', 'warning', '', 'warning', '');
                    return;
                } else {
                    contactDetail.push({type:"email", detail:sanitize($('#txtEmail').val())});
                }
            }

            if($('#chkboxWhatsapp').prop("checked")==true) {
                if( $('#txtWhatsapp').val()=="") {
                    showMessage('WhatsApp number cannot be empty.', 'warning', '', 'warning', '');
                    return;
                } else {
                    contactDetail.push({type:"whatsApp", detail:sanitize($('#txtWhatsapp').val())});
                }
            }
            
            if($('#chkboxWechat').prop("checked")==true) {
                if( $('#txtWechat').val()=="") {
                    showMessage('WeChat id cannot be empty.', 'warning', '', 'warning', '');
                    return;
                } else {
                    contactDetail.push({type:"weChat", detail:sanitize($('#txtWechat').val())});
                }
            }

            if($('#chkboxTelegram').prop("checked")==true) {
                if( $('#txtTelegram').val()=="") {
                    showMessage('Telegram id cannot be empty.', 'warning', '', 'warning', '');
                    return;
                } else {
                    contactDetail.push({type:"telegram", detail:sanitize($('#txtTelegram').val())});
                }
            }
            
            if($('#chkboxOthers').prop("checked")==true) {
                if( $('#txtOthers').val()=="") {
                    showMessage('Others contact detail cannot be empty.', 'warning', '', 'warning', '');
                    return;
                } else {
                    contactDetail.push({type:"others", detail:sanitize($('#txtOthers').val())});
                }
            }

            if(contactDetail.length==0) {
                showMessage('Contact info cannot be empty.', 'warning', '', 'warning', '');
                
            } else if(selType=="") {
                showMessage('<?php echo $translations["E00238"][$language]; /* Type cannot be empty. */?>', 'warning', '', 'warning', '');
            } else if(selectedWalletType.length==0) {
                showMessage('<?php echo $translations["E00306"][$language]; /* Currency cannot be empty. */?>', 'warning', '', 'warning', '');
            } else if(selMessage=="") {
                showMessage('<?php echo $translations["E00318"][$language]; /* Description cannot be empty. */?>', 'warning', '', 'warning', '');
            }

            formData  = {
                    command: 'nuxpaybuysellordercreate',
                    type: selType,
                    content: selMessage,
                    currency: selectedWalletType,
                    contactInfo: contactDetail,
                    
                };  

            fCallback = nuxpayadvestimentcreateUpdateResult;  
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


        });

        $('#SaveAdsButton').click(function() {

            var selMessage = $('#message').val();

            checkWalletTypeSelected();

           
            var contactDetail = [];

            if($('#chkboxPhoneCall').prop("checked")==true) {
                if( $('#txtPhonecall').val()=="") {
                    showMessage('Phone number cannot be empty.', 'warning', '', 'warning', '');
                    return;
                } else {
                    contactDetail.push({type:"phoneCall", detail:$('#txtPhonecall').val()});
                }
            }

            if($('#chkboxEmail').prop("checked")==true) {
                if( $('#txtEmail').val()=="") {
                    showMessage('Email address cannot be empty.', 'warning', '', 'warning', '');
                    return;
                } else {
                    contactDetail.push({type:"email", detail:$('#txtEmail').val()});
                }
            }

            if($('#chkboxWhatsapp').prop("checked")==true) {
                if( $('#txtWhatsapp').val()=="") {
                    showMessage('WhatsApp number cannot be empty.', 'warning', '', 'warning', '');
                    return;
                } else {
                    contactDetail.push({type:"whatsApp", detail:$('#txtWhatsapp').val()});
                }
            }
            
            if($('#chkboxWechat').prop("checked")==true) {
                if( $('#txtWechat').val()=="") {
                    showMessage('WeChat id cannot be empty.', 'warning', '', 'warning', '');
                    return;
                } else {
                    contactDetail.push({type:"weChat", detail:$('#txtWechat').val()});
                }
            }

            if($('#chkboxTelegram').prop("checked")==true) {
                if( $('#txtTelegram').val()=="") {
                    showMessage('Telegram id cannot be empty.', 'warning', '', 'warning', '');
                    return;
                } else {
                    contactDetail.push({type:"telegram", detail:$('#txtTelegram').val()});
                }
            }
            
            if($('#chkboxOthers').prop("checked")==true) {
                if( $('#txtOthers').val()=="") {
                    showMessage('Others contact detail cannot be empty.', 'warning', '', 'warning', '');
                    return;
                } else {
                    contactDetail.push({type:"others", detail:$('#txtOthers').val()});
                }
            }

            if(contactDetail.length==0) {
                showMessage('Contact info cannot be empty.', 'warning', '', 'warning', '');
                
            } else if(selectedWalletType.length==0) {
                showMessage('<?php echo $translations["E00306"][$language]; /* Currency cannot be empty. */?>', 'warning', '', 'warning', '');
            } else if(selMessage=="") {
                showMessage('<?php echo $translations["E00318"][$language]; /* Description cannot be empty. */?>', 'warning', '', 'warning', '');
            }

            formData  = {
                    command: 'nuxpaybuysellorderupdate',
                    order_id: order_id,
                    content: selMessage,
                    currency: selectedWalletType,
                    contactInfo: contactDetail
                };  

            fCallback = nuxpayadvestimentcreateUpdateResult;  
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


        });

        if(order_id!="") {
            $('#headerDiv').text('<?php echo $translations["M01925"][$language]; /* Edit Order */?>');

            $('input[name=radioType]').attr("disabled",true);
            // $('#walletType_upload').attr("disabled",true);
            $('#SaveAdsButton').show();
            $('#createAdsButton').hide();

        } else {

            $('#SaveAdsButton').hide();
            $('#createAdsButton').show();
        }




        $('#chkboxPhoneCall').click(function() {
            if($(this).prop("checked")==true) {
                $('#txtPhonecall').prop('disabled', false);
            } else {
                $('#txtPhonecall').prop('disabled', true);
                $('#txtPhonecall').val('');
            }
        });

        $('#chkboxEmail').click(function() {
            if($(this).prop("checked")==true) {
                $('#txtEmail').prop('disabled', false);
            } else {
                $('#txtEmail').prop('disabled', true);
                $('#txtEmail').val('');
            }
        });

        $('#chkboxWhatsapp').click(function() {
            if($(this).prop("checked")==true) {
                $('#txtWhatsapp').prop('disabled', false);
            } else {
                $('#txtWhatsapp').prop('disabled', true);
                $('#txtWhatsapp').val('');
            }
        });

        $('#chkboxWechat').click(function() {
            if($(this).prop("checked")==true) {
                $('#txtWechat').prop('disabled', false);
            } else {
                $('#txtWechat').prop('disabled', true);
                $('#txtWechat').val('');
            }
        });

        $('#chkboxTelegram').click(function() {
            if($(this).prop("checked")==true) {
                $('#txtTelegram').prop('disabled', false);
            } else {
                $('#txtTelegram').prop('disabled', true);
                $('#txtTelegram').val('');
            }
        });

        $('#chkboxOthers').click(function() {
            if($(this).prop("checked")==true) {
                $('#txtOthers').prop('disabled', false);
            } else {
                $('#txtOthers').prop('disabled', true);
                $('#txtOthers').val('');
            }
        });

	});
	
    function checkWalletTypeSelected() {

        selectedWalletType = [];

        allCheckboxId.forEach(function(entry) { 
            if(entry!="chkbox_all") {
                if($('#'+entry).prop("checked")) {
                    selectedWalletType.push($('#'+entry).val());
                }
            }
         });

    }

    function nuxpayadvestimentcreateUpdateResult(data, message) {

        var selType = $('input:radio[name="radioType"]:checked').val();

        if(order_id!="") {
            showMessage(message, 'success', "success", 'check-circle-o', 'myOrder.php');
        } else if(selType=="buy") {
            showMessage(message, 'success', "Success", 'check-circle-o', 'buyOrder.php');
        } else {
            showMessage(message, 'success', "Success", 'check-circle-o', 'sellOrder.php');
        }

    }

	function getWalletType(data, message) {



        if(data.result.coin_data) {

            $('#walletTypeDiv').empty();

            $('#walletTypeDiv').append('<div><input type="checkbox" id="chkbox_all" name="chkbox_all" value="all"><label style="margin-left: 5px; margin-right: 30px;" for="chkboxAll">All</label></div>');
            
            allCheckboxId.push('chkbox_all'); 

            $.each(data.result.coin_data, function(key, val) {
                $('#walletTypeDiv').append('<div><input type="checkbox" id="chkbox_'+val['wallet_type']+'" name="chkbox_'+val['wallet_type']+'" value="'+val['wallet_type']+'"><label style="margin-left: 5px; margin-right: 30px;" for="chkbox_'+val['wallet_type']+'">'+val['display_symbol']+'</label></div>');

                allCheckboxId.push('chkbox_'+val['wallet_type']); 
            });

            $('#chkbox_all').click(function() {
                if($(this).prop("checked")==true) {
                    allCheckboxId.forEach(function(entry) {
                        if(entry!="chkbox_all") {
                            $("#"+entry).prop("checked", true);
                        }
                    });
                } else {
                    allCheckboxId.forEach(function(entry) {
                        if(entry!="chkbox_all") {
                            $("#"+entry).prop("checked", false);
                        }
                    });
                }
            });

            allCheckboxId.forEach(function(entry) {
                if(entry!="chkbox_all") {
                    $('#'+entry).click(function() {
                        if($(this).prop("checked")==false) {
                            $("#chkbox_all").prop("checked", false);
                        }

                    });
                }
            });

        }


        if(order_id!="") {

            formData  = {
                command: 'nuxpaybuyselldetailget',
                order_id: order_id
            };  
            fCallback = nuxpayadvestimentdetailgetResult;  
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        }

        
    }

    function nuxpayadvestimentdetailgetResult(data, message) {


        var detail = data.data;

        if(detail) {

            if(detail.type=="buy") {
                $('#message').attr("placeholder", "<?php echo $translations["M01926"][$language]; /* I want to buy 10 USDT. My contact number is +1xxxxxxxx. Bank transfer acceptable. */?>");
            } else {
                $('#message').attr("placeholder", "<?php echo $translations["M01897"][$language]; /* I want to sell 10 USDT. My contact number is +1xxxxxxxx. Bank transfer acceptable. */?>");
            }
            var detailContent = detail.content;
            var detailType = detail.type;

            $('#message').val(detailContent);
            $('#characterCount').text(detailContent.length);
            // $('#walletType_upload').val(detailWalletType).trigger('change');
            $("input[name=radioType][value='"+detailType+"']").prop("checked",true);


            detail.wallet_type.forEach(function(entry) {
                $("#chkbox_"+entry).prop("checked", true);
            });


            $.each(detail.contact, function(key, val) {
                if(val['type']=="phoneCall") {
                    $("#chkboxPhoneCall").prop("checked", true);
                    $('#txtPhonecall').prop('disabled', false);
                    $('#txtPhonecall').val(val['detail']);
                } else if(val['type']=="email") {
                    $("#chkboxEmail").prop("checked", true);
                    $('#txtEmail').prop('disabled', false);
                    $('#txtEmail').val(val['detail']);
                } else if(val['type']=="whatsApp") {
                    $("#chkboxWhatsapp").prop("checked", true);
                    $('#txtWhatsapp').prop('disabled', false);
                    $('#txtWhatsapp').val(val['detail']);
                } else if(val['type']=="weChat") {
                    $("#chkboxWechat").prop("checked", true);
                    $('#txtWechat').prop('disabled', false);
                    $('#txtWechat').val(val['detail']);
                } else if(val['type']=="telegram") {
                    $("#chkboxTelegram").prop("checked", true);
                    $('#txtTelegram').prop('disabled', false);
                    $('#txtTelegram').val(val['detail']);
                } else if(val['type']=="others") {
                    $("#chkboxOthers").prop("checked", true);
                    $('#txtOthers').prop('disabled', false);
                    $('#txtOthers').val(val['detail']);
                }
            });


        }
    }
	
</script>



<style type="text/css">

    .contactMethod {
        height: 30px;
    }

    input[type='radio']:after {
        /*width: 15px;
        height: 15px;
        border-radius: 15px;
        
        position: relative;
        background-color: yellow;
        content: '';
        display: inline-block;
        
        border: 2px solid grey;*/

        /*top: -2px;
        left: -1px;*/
        /*visibility: visible;*/
    }

    input[type='radio']:checked:after {
        /*width: 15px;
        height: 15px;
        border-radius: 15px;
      
        position: relative;
        background-color: #51C2DB;
        content: '';
        display: inline-block;
        
        border: 1px solid grey;*/

        /*  top: -2px;
        left: -1px;*/
        /*visibility: visible;*/
    }


</style>
