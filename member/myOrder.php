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
							  <a class="nav-link" id="buyAdsBtn" href="buyOrder.php"><?php echo $translations["M01883"][$language]; /* Buy */?></a>
                              <a class="nav-link" id="sellAdsBtn" href="sellOrder.php"><?php echo $translations["M01884"][$language]; /* Sell */?></a>
                              <a class="nav-link active" id="myAdsBtn" href="javascript:void(0)"><?php echo $translations["M01885"][$language]; /* My Ads */?></a>
                            </nav>
                        </div>
                    </div>
				</div>
			</div>



			<div class="m-content">

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


    if (hasChangedPassword == 0){
        $.redirect('firstTimeLogin.php');
    }

    $(document).ready(function(){ 

        //
        formData  = {
            command     : 'nuxpaybuyselllistingget',
            type        : 'myorder',
            page        : pageNumber
        };

        fCallback = loadAdvertisementlListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
 
        $('#createAdsButton').click(function(){
             $.redirect('createOrder.php');
        });
    });


    function pagingCallBack(pNumber, fCallback){

        pageNumber = pNumber;

        formData  = {
            command     : 'nuxpaybuyselllistingget',
            type        : 'myorder',
            page        : pageNumber
        };

        fCallback = loadAdvertisementlListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    }

    function loadAdvertisementlListing(data, message) {

        console.log(data);

        var tableNo;
        var listing = data.data.listing;

        if(listing && listing.length > 0) {
            $('#showErrorMsg').hide();
            $('#showresultListing').show();

            var newList = [];
            $.each(listing, function(k, v) {

                var messageContent = sanitize(v['content']);
                var createdDate = moment(v['created_at']).format('MMM DD, YYYY');
                var tagList = v['display_wallet_type'].join(", ");

               var createdDateStr = '<?php echo $translations["M01963"][$language]; /* Created on %%CREATEDATE%% */?>'.replace("%%CREATEDATE%%", createdDate);


                buildDetail = '<div class="detailDiv" style="margin-top: 8px;" >';

                buildDetail += '<div class="col-12" style="margin-top: -4px;"><span style="font-size: 10px; font-weight: 200; color: grey;">'+createdDateStr+'</span></div>';
                buildDetail += '<div class="col-12" style="margin-top: 8px;">'+messageContent+'</div>';
                buildDetail += '<div class="col-12" style="margin-top: 8px; color: grey;"><img src="./images/contactIcon/tag.png" style="height:16px; margin-right: 10px; margin-top: -5px;">'+tagList+'</div>';
                buildDetail += '</div>';


                buildContactInfo = '<div class="contactInfoDiv" style="margin-top: 8px; border-left: 1px solid #C5C5C5; border-right: 1px solid #C5C5C5; height: 100%; width: 100%;" >';
              


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



                buttonDetails = '<div class="buttonDiv" style="margin-top: 8px; text-align: left;" class="row" >';

                isDisable = '';
                if(v['status']!="Active") {
                    isDisable = "disabled";
                } 
                
                buttonDetails += '<button class="btn marketplaceEditBtn" '+isDisable+' ><?php echo $translations["M01142"][$language]; /* Edit */?></button> ';

                buttonDetails += '<button class="btn marketplaceDeleteBtn" '+isDisable+' ><?php echo $translations["M01143"][$language]; /* Delete */?></button>';

                buttonDetails += '</div>';


                var rebuildData = {
                    detail: buildDetail,
                    contactInfo: buildContactInfo,
                    buttonDetail: buttonDetails
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
                $('#'+tableId+' tr#'+k).find("td").eq(0).css('padding', '15px 0 15px 0');
                
                $('#'+tableId+' tr#'+k).find("td").eq(1).css('vertical-align', 'top');
                $('#'+tableId+' tr#'+k).find("td").eq(1).css('margin', '0');
                $('#'+tableId+' tr#'+k).find("td").eq(1).css('padding', '15px 0 15px 0');
                $('#'+tableId+' tr#'+k).find("td").eq(1).css('text-align', 'left');
                $('#'+tableId+' tr#'+k).find("td").eq(1).addClass('contactTd');

                $('#'+tableId+' tr#'+k).find("td").eq(2).css('vertical-align', 'top');
                $('#'+tableId+' tr#'+k).find("td").eq(2).css('margin', '0');
                $('#'+tableId+' tr#'+k).find("td").eq(2).css('padding', '15px 0 15px 0');
                $('#'+tableId+' tr#'+k).find("td").eq(2).addClass('buttonTd');

                $('#'+tableId+' tr#'+k).css('background', 'white');
                $('#'+tableId+' tr#'+k).css('border-bottom', '12px solid #F1F2F7');


                $('#'+tableId+' tr#'+k).find('.marketplaceEditBtn').attr('data-id', v['id']);
                $('#'+tableId+' tr#'+k).find('.marketplaceDeleteBtn').attr('data-id', v['id']);

                $('#'+tableId+' tr#'+k).css('height', '1px');
                $('#'+tableId+' tr#'+k).find("td").css('height', 'inherit');
                
                // console.log(">>> "+$('#'+tableId+' tr#'+k).find('.detailDiv').height);
                // console.log(">>> "+$('#'+tableId+' tr#'+k).find('.contactInfoDiv').height);
                // console.log(">>> "+$('#'+tableId+' tr#'+k).find("td").height);



            });
        }

		$('.marketplaceEditBtn').click(function() {
            var editId = $(this).attr('data-id');  
            $.redirect('createOrder.php', {order_id: editId});
        });

        $('.marketplaceDeleteBtn').click(function() {
            var deletetId = $(this).attr('data-id');  

            formData  = {
                command     : 'nuxpaybuysellorderdelete',
                order_id      : deletetId
            };

            fCallback = nuxpayadvestimentdeleteResult;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
				

    }

    function nuxpayadvestimentdeleteResult(data, message) {

        showMessage(message, 'success', "Success", 'check-circle-o', '');

        pagingCallBack(pageNumber, fCallback);

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

.detailDiv {

}

.contactInfoDiv {
    width: 250px;
}

.buttonDiv {
    width: 155px;
    margin-left: 20px;
}

.buttonTd {
    width: 155px;
}

.contactTd {
    min-width: 250px;
}

.marketplaceEditBtn {
    margin-right: 10px;
    margin-bottom: 0;
}

@media (max-width: 650px){
    
    .detailDiv {

    }
    
    .contactInfoDiv {
        width: auto;
    }

    .contactTd {
        min-width: 150px;
    }

    .buttonDiv {
        width: 80px;
        margin-left: 20px;
    }

    .buttonTd {
        width: 80px;
    }

    .marketplaceEditBtn {
        margin-right: 0;
        margin-bottom: 10px;
    }
}

@media (max-width: 600px){
 
    .createAdsButtonDiv {
        width: 100%; 
        text-align: left;
    }
}

@media (max-width: 450px){
 
    .buttonDiv {
        width: 65px;
        margin-left: 10px;
    }

    .buttonTd {
        width: 65px;
    }

    .contactTd {
        min-width: auto;
    }
}

</style>
