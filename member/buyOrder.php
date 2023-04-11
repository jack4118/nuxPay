<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">

                <div class="col-12 row" style="margin-top: 10px; margin-bottom: 10px;">   
                    <div class="pageHeader"><?php echo $translations["M01881"][$language]; /* Advertisements */?></div>
                    <div class="createAdsButtonDiv" >
                        <button id="createAdsButton" class="btn searchBtn" type="button">+ <?php echo $translations["M01882"][$language]; /* Create Advertisement */?></button>
                    </div>
                    
                </div>

				<div class="d-flex align-items-center">
                    <div class="col-12">
                        <div class="d-flex border-bottom justify-content-between">
                            <nav class="nav">
							  <a class="nav-link active" id="buyAdsBtn" href="javascript:void(0)"><?php echo $translations["M01883"][$language]; /* Buy */?></a>
                              <a class="nav-link" id="sellAdsBtn" href="sellOrder.php"><?php echo $translations["M01884"][$language]; /* Sell */?></a>
                              <a class="nav-link" id="myAdsBtn" href="myOrder.php"><?php echo $translations["M01885"][$language]; /* My Ads */?></a>
                            </nav>
                        </div>
                    </div>
				</div>
			</div>



			<div class="m-content">

                <div class="col-12 smallTxt row" id="walletTypeDiv">
                    
                </div>


                <div class="col-12 text-center my-5" id="showErrorMsg" style="display: none">
                    <div class="row">
                        <div class="col-12">
                            <img src="<?php echo $sys['source'] == 'FTAG' ?  'images/whitelabel/ftag/no-withdrawal.png' :  'images/nuxPay/newDesign/noWalletIcon.png'?>">
                        </div>
                        <div class="col-12 mt-3 bigText">
                            <?php echo $translations["M01886"][$language]; /* No Advertisements */?>
                        </div>

                    </div>
                </div>

                <div class="col-xl-12 px-0" id="showresultListing" style="display: block;">
                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                        <div class="table-responsive" id="advertisementListDiv"></div>
                        <div class="m-datatable__pager m-datatable--paging-loaded clearfix m-t-rem3">
                            <ul class="m-datatable__pager-nav" id="advertisementPager">
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


<?php include 'sharejsDashboard.php'; ?>

</body>
</html>



<script>

   
    var divId    = 'advertisementListDiv';
    var tableId  = 'advertisementListTable';
    var pagerId  = 'advertisementPager';
    var btnArray = {};
    var thArray  = Array(
            '',   
            '',
            ''  
        );

    var url             = 'scripts/reqAdvertisement.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
   
    var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';
    var checkWalletStatus = 1;

    var allCheckboxId = [];
    var getWalletListingDone = false;
    var selectedWalletType = ["all"];

    if (hasChangedPassword == 0){
        $.redirect('firstTimeLogin.php');
    }

    $(document).ready(function(){ 

        //
        formData  = {
            command     : 'nuxpaybuyselllistingget',
            type        : 'buy',
            page        : pageNumber,
            currency    : selectedWalletType
        };

        fCallback = loadAdvertisementlListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
 
        $('#createAdsButton').click(function(){
             $.redirect('createOrder.php');
        });
    });

    function getWalletType(coin_data) {

        if(coin_data) {

            $('#walletTypeDiv').empty();

            $('#walletTypeDiv').append('<div><input type="checkbox" id="chkbox_all" name="chkbox_all" value="all"><label style="margin-left: 5px; margin-right: 30px;" for="chkboxAll">All</label></div>');
            
            allCheckboxId.push('chkbox_all'); 

            $.each(coin_data, function(key, val) {
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

                if(!getWalletListingDone) {
                    getWalletListingDone = true;
                } else {

                    // alert('trigger1');
                    checkWalletTypeSelected();

                }
                

            });

            allCheckboxId.forEach(function(entry) {
                if(entry!="chkbox_all") {
                    $('#'+entry).click(function() {
                        if($(this).prop("checked")==false) {
                            $("#chkbox_all").prop("checked", false);
                        }

                        // alert('trigger2');
                        checkWalletTypeSelected();

                    });
                }

            });

            $( "#chkbox_all" ).click();
        }        
    }

    function checkWalletTypeSelected() {

        selectedWalletType = [];

        allCheckboxId.forEach(function(entry) { 
            if($('#'+entry).prop("checked")) {
                selectedWalletType.push($('#'+entry).val());
            }
         });

        pagingCallBack(1, fCallback);
    }

    function pagingCallBack(pNumber, fCallback){

        pageNumber = pNumber;

        formData  = {
            command     : 'nuxpaybuyselllistingget',
            type        : 'buy',
            page        : pageNumber,
            currency    : selectedWalletType
        };


        fCallback = loadAdvertisementlListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    }

    function loadAdvertisementlListing(data, message) {



        var tableNo;
        var listing = data.data.listing;
        var walletTypeListing = data.data.coin_data;

        if(!getWalletListingDone) {
            getWalletType(walletTypeListing);
        }
        
        if(listing && listing.length > 0) {
            $('#showErrorMsg').hide();
            $('#showresultListing').show();

            var newList = [];
            $.each(listing, function(k, v) {

                var nickname = v['name'];
                var messageContent = sanitize(v['content']);
                var joinDate = moment(v['join_at']).format('MMM DD, YYYY');
                var timeAgo = v['time_ago'];
                var tagList = v['display_wallet_type'].join(", ");


                var joinDateStr = '<?php echo str_replace("%%SITE%%", $sys["companyName"],$translations["M01962"][$language]); /* Joined %%SITE%% in %%JOINDATE%% */?>'.replace("%%JOINDATE%%", joinDate);

                var buildProfileImage = '<img src="./images/Escrow/default-pic.png" style="width: 40px; margin-top: 8px; margin-left: 12px;" >';
                
                buildDetail = '<div style="margin-top: 8px;" >';
                buildDetail += '<div class="col-12" style=""><span style="font-size: 14px; font-weight: 500;">'+nickname+'</span></div>';
                buildDetail += '<div class="col-12" style="margin-top: -4px;"><span style="font-size: 10px; font-weight: 200; color: grey;">'+timeAgo+'</span></div>';
                buildDetail += '<div class="col-12" style="margin-top: 8px;">'+messageContent+'</div>';
                buildDetail += '<div class="col-12" style="margin-top: 8px; color: grey;"><img src="./images/contactIcon/tag.png" style="height:16px; margin-right: 10px; margin-top: -5px;">'+tagList+'</div>';
                buildDetail += '</div>';

                
                buildContactInfo = '<div class="contactDiv" style="margin-top: 8px; border-left: 1px solid #C5C5C5; height: 100%;" >';
                buildContactInfo += '<div class="col-12" style=""><span style="font-size: 14px; font-weight: 400;"><?php echo $translations["M01960"][$language]; /* Seller Information */?></span></div>';
                buildContactInfo += '<div class="col-12" style="margin-bottom: 12px;"><span style="font-size: 11px; font-weight: 200; color: grey;">'+joinDateStr+'</span></div>';


                $.each(v['contact'], function(k2, v2) {

                    v2['detail'] = sanitize(v2['detail']);
                    
                    if(v2['type']=="phoneCall") {

                        buildContactInfo += '<div class="col-12" style="color: grey;"><img src="./images/contactIcon/phone-call.png" style="height:14px;"><span style="font-size: 12px; font-weight: 400; margin-left: 10px; height:14px; color: black;"><?php echo $translations["M01954"][$language]; /* Phone Call */?>: </span>'+v2['detail']+'</div>';

                    } else if(v2['type']=="email") {

                        buildContactInfo += '<div class="col-12" style="color: grey;"><img src="./images/contactIcon/email.png" style="height:14px;"><span style="font-size: 12px; font-weight: 400; margin-left: 10px; height:14px; color: black;"><?php echo $translations["M01955"][$language]; /* Email */?>: </span>'+v2['detail']+'</div>';

                    } else if(v2['type']=="whatsApp") {

                        buildContactInfo += '<div class="col-12" style="color: grey;"><img src="./images/contactIcon/whatsapp.png" style="height:14px;"><span style="font-size: 12px; font-weight: 400; margin-left: 10px; height:14px; color: black;"><?php echo $translations["M01956"][$language]; /* WhatsApp */?>: </span>'+v2['detail']+'</div>';

                    } else if(v2['type']=="weChat") {

                        buildContactInfo += '<div class="col-12" style="color: grey;"><img src="./images/contactIcon/wechat.png" style="height:14px;"><span style="font-size: 12px; font-weight: 400; margin-left: 10px; height:14px; color: black;"><?php echo $translations["M01957"][$language]; /* WeChat */?>: </span>'+v2['detail']+'</div>';

                    } else if(v2['type']=="telegram") {

                        buildContactInfo += '<div class="col-12" style="color: grey;"><img src="./images/contactIcon/telegram.png" style="height:14px;"><span style="font-size: 12px; font-weight: 400; margin-left: 10px; height:14px; color: black;"><?php echo $translations["M01958"][$language]; /* Telegram */?>: </span>'+v2['detail']+'</div>';

                    } else if(v2['type']=="others") {

                        buildContactInfo += '<div class="col-12" style="color: grey;"><img src="./images/contactIcon/others.png" style="height:14px;"><span style="font-size: 12px; font-weight: 400; margin-left: 10px; height:14px; color: black;"></span>'+v2['detail']+'</div>';

                    }

                });

                buildContactInfo += '</div>';

                var rebuildData = {
                    profileImg: buildProfileImage,
                    detail: buildDetail,
                    contactInfo: buildContactInfo
                };

                newList.push(rebuildData);
            });

        } else {
            $('#showErrorMsg').show();
            $('#showresultListing').hide();
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.data.pageNumber, data.data.totalPage, data.data.totalRecord, data.data.numRecord);
		// $('#'+tableId+' tr').find('th:last').css('text-align', 'left');
		
		 if(listing) {
            $.each(listing, function(k, v) {
                $('#'+tableId+' tr#'+k).find("td").eq(0).css('vertical-align', 'top');
                $('#'+tableId+' tr#'+k).find("td").eq(0).css('margin', '0');
                $('#'+tableId+' tr#'+k).find("td").eq(0).css('padding', '15px 0 25px 0');

                $('#'+tableId+' tr#'+k).find("td").eq(1).css('vertical-align', 'top');
                $('#'+tableId+' tr#'+k).find("td").eq(1).css('margin', '0');
                $('#'+tableId+' tr#'+k).find("td").eq(1).css('padding', '15px 0 15px 0');
                
                $('#'+tableId+' tr#'+k).find("td").eq(2).css('vertical-align', 'top');
                $('#'+tableId+' tr#'+k).find("td").eq(2).css('margin', '0');
                $('#'+tableId+' tr#'+k).find("td").eq(2).css('padding', '15px 0 15px 0');
                $('#'+tableId+' tr#'+k).find("td").eq(2).css('text-align', 'left');
                $('#'+tableId+' tr#'+k).find("td").eq(2).addClass('contactTd');

                $('#'+tableId+' tr#'+k).css('background', 'white');
                $('#'+tableId+' tr#'+k).css('border-bottom', '12px solid #F1F2F7');

                $('#'+tableId+' tr#'+k).css('height', '1px');
                $('#'+tableId+' tr#'+k).find("td").css('height', 'inherit');

            });
        }

		
				

    }

    function dateTimeToDateFormat(dateTimeValue) {

        return moment(dateTimeValue).format('LLL');
    }


</script>

<style type="text/css">
    
.createAdsButtonDiv {
    margin-top: 5px;
    width: calc(100% - 190px); 
    text-align: right;
}

.contactDiv {
    min-width: 200px;
}

.contactTd {
    width: 35%;
}

@media (max-width: 600px){
 
    .createAdsButtonDiv {
        width: 100%; 
        text-align: left;
    }

    .contactDiv {
        min-width: auto;
    }
}


</style>
