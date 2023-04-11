<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">

                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">   
                    <div class="row justify-content-between">
						<div class="pageHeader"><?php echo $translations["M01881"][$language]; /* Advertisements */?></div>
						<div class="createAdsButtonDiv" >
							<button id="createAdsButton" class="btn searchBtn" type="button">+ <?php echo $translations["M01882"][$language]; /* Create Advertisement */?></button>
						</div>
					</div>
                </div>

				<div class="d-flex align-items-center">
                    <div class="col-12">
                        <div class="d-flex border-bottom justify-content-between">
                            <nav class="nav">
							  <a class="nav-link" id="buyAdsBtn" href="buyAds.php"><?php echo $translations["M01883"][$language]; /* Buy */?></a>
                              <a class="nav-link active" id="sellAdsBtn" href="javascript:void(0)"><?php echo $translations["M01884"][$language]; /* Sell */?></a>
                              <a class="nav-link" id="myAdsBtn" href="myAds.php"><?php echo $translations["M01885"][$language]; /* My Ads */?></a>
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
//            '',
            '<?php echo $translations["M01889"][$language]; /* Buyer */?>',   
            '<?php echo $translations["M01888"][$language]; /* Description */?>'       
//            '<?php echo $translations["M01887"][$language]; /* Amount */?>'   
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

    if (hasChangedPassword == 0){
        $.redirect('firstTimeLogin.php');
    }

    $(document).ready(function(){ 

        formData  = {
            command     : 'nuxpayadvestimentlistingget',
            type        : 'sell',
            page        : pageNumber
        };

        fCallback = loadAdvertisementlListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
 

        $('#createAdsButton').click(function(){
             $.redirect('createAds.php');
        });

    });

    function pagingCallBack(pNumber, fCallback){

        pageNumber = pNumber;

        formData  = {
            command     : 'nuxpayadvestimentlistingget',
            type        : 'sell',
            page        : pageNumber
        };

        fCallback = loadAdvertisementlListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    }

    function loadAdvertisementlListing(data, message) {

        var tableNo;
        var listing = data.data.listing;

        if(listing && listing.length > 0) {
            $('#showErrorMsg').hide();
            $('#showresultListing').show();

            var newList = [];
            $.each(listing, function(k, v) {

                var buildCurrencyIcon = '<img src="'+v['image']+'" class="currencyLogo">';
                
                var rebuildData = {
//                    currency : buildCurrencyIcon,
                    seller : v['name'],
                    description: v['content'],
//                    amount: (v['amount'] == 0 ? '-' : v['amount'])

      
                };

                newList.push(rebuildData);
            });

        } else {
            $('#showErrorMsg').show();
            $('#showresultListing').hide();
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.data.pageNumber, data.data.totalPage, data.data.totalRecord, data.data.numRecord);
		
		$('#'+tableId+' tr').find('th:last').css('text-align', 'left');
		
		 if(listing) {
            $.each(listing, function(k, v) {
				 $('#'+tableId+' tr#'+k).find('td:last').css('text-align', 'left');
           
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
    width: calc(100% - 240px); 
    text-align: right;
}

@media (max-width: 600px){
 
    .createAdsButtonDiv {
        width: 100%; 
        text-align: left;
    }
}

</style>