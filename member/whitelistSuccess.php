<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">
				<div class="d-flex align-items-center">
                    <div class="col-12">
                        <div class="d-flex border-bottom justify-content-between">
                            <nav class="nav">
                            <a class="nav-link active" id="successBtn" href="whitelistAddresses.php">Whitelisting</a>
                              <a class="nav-link" id="pendingBtn" href="whitelistAddressHistory.php">History</a>
                            </nav>

                        </div>
                    </div>

				</div>
			</div>

            <div class="m-content">
                <div class="row">
                    <div class="col-md-12 text-center my-5">
                        <div class="row">
                            <div class="col-12 faCheckIcon">
                                <i class="fa fa-check-circle" style="font-size:80px;" aria-hidden="true"></i>
                            </div>
                            <div class ="col-12 mt-4 font-weight-normal">
                                Your wallet addresses have been submitted for whitelisting.
                            </div>
                            <div class="col-12 mt-3">
                                <button id="whitelistAddBtn" onClick="onBtnClick()" class="btn whitelistBtn my-2" type="button">Whitelist New Addresses</button>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-xl-12 px-0" id="showresultListing">
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

<!-- 
                <div class ="col-12">
                    <div class = "row">
                        
                        <div class="col-1 font-weight-normal">No. </div>
                        <div class="col-5 font-weight-normal">Wallet Address </div>
                        <div class="col-2 font-weight-normal">Status</div>
                        <div class="col-4 font-weight-normal">Remark</div>
                    </div>
                </div>
                
                <?php  for($i=1; $i<=10; $i++) { ?>
                <div class ="col-12">
                    <div class="row">
                        <div class="whitelistTextField mt-2 col-12" style="display:flex; flex-direction: row;">
                            <label class="asLabel col-1"><?php echo $i; ?>. </label>
                            <input class="asLabel col-5" name="textField_<?php echo $i;?>" id="textField_<?php echo $i;?>" type="text" readonly disabled/>
                            <input class="asLabel col-2" name="textField_<?php echo $i;?>" id="textField_<?php echo $i;?>" type="text" readonly disabled/>
                            <input class="asLabel col-4" name="textField_<?php echo $i;?>" id="textField_<?php echo $i;?>" type="text" readonly disabled/>         
                        </div>
                    </div>
                </div>
                <?php } ?> -->



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

    var divId    = 'transactionHistoryListDiv';
    var tableId  = 'transactionHistoryListTable';
    var pagerId  = 'transactionHistoryPager';
    var btnArray = Array();
    var thArray  = Array('No',
                        'Wallet Address',
                        //'Address Type',
                        'Status',
                        'Remark');

    var whitelist_result = '<?php echo $_POST['result']; ?>';

    $(document).ready(function(){ 

        if(whitelist_result=="") {
            $.redirect("whitelistAddresses.php");
        } else {

            var js_result = JSON.parse(whitelist_result);
            var message = "";
            var tableNo;

            var newList = [];
            var cnt = 1;
            $.each(js_result, function(k, v) {

                var rebuildData = {
                    no: cnt,
                    wallet_address : sanitize(v['address']),
                    //wallet_type : v['wallet_type'],
                    status : v['status'],
                    remark: (v['reason']=="Success"?"":v['reason'])
                };

                newList.push(rebuildData);
                cnt++;
            });

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);

        }

    });


    function onBtnClick(){
        
        $.redirect("whitelistAddresses.php");
            
    };



</script>