<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>



<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >

    
    <div class="m-grid m-grid--hor m-grid--root m-page">

        <?php include 'headerDashboard.php'; ?>
        

        <div class="m-grid__item m-grid__item--fluid m-wrapper">

           
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <i class="m-nav__link-icon la la-credit-card"></i>
                        <h3 class="m-subheader__title "><?php echo $translations["M00130"][$language]; /* Payment Gateway */ ?></h3>    
                    </div>  
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">

                         <a href="#" class="waves-effect waves-light btn  m-btn--pill m-btn--air btn-sm m-btn m-btn--custom theme-green-button" role="button" onclick="generateAddress()"><?php echo $translations["M00131"][$language]; /* Generate Address */ ?></a>

                     </ul>
                 </div>
             </div>
                      
         <div class="m-content" style="">
           
                        
                        <div class="m-portlet m-portlet--tab">
                            <div class="m-portlet__head">
                               <div class="m-portlet__head-caption" style="display: flex; margin-top: 23px">
                                    <div class="m-portlet__head-title pull-right">
                                         <span class="m-portlet__head-icon m--hide">
                                            <i class="la la-gear"></i>
                                        </span>
                                    </div>
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon m--hide">
                                            <i class="la la-gear"></i>
                                        </span>
                                        <h1 class="m-portlet__head-text" style="font-size:15pt;">
                                            <?php echo $_POST['displayName']; ?> <?php echo $translations["M00132"][$language]; /* (Address Listing) */ ?>
                                        </h1>
                                    </div>
                                    <div class="m-portlet__head-title d-none d-xl-block" style="margin: 0 0 0 auto">
                                         <a href="#" class="waves-effect waves-light btn  m-btn--pill m-btn--air btn-sm m-btn m-btn--custom theme-green-button" role="button" onclick="generateAddress()"><?php echo $translations["M00131"][$language]; /* Generate Address */ ?></a>
                                    </div>
                                </div>
                            </div>
                   
                    <div class="m-portlet__body">
                        <form class="m-form m-form--fit m-form--label-align-right">

                            <div id="alertMsg" class="alert" style="display: none;"></div>


                            <div id="addressListDiv" class="m_datatable m-datatable m-datatable--default m-datatable--loaded table-responsive">
                             
                            </div>

                            <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                                <div class="m-datatable__pager m-datatable--paging-loaded clearfix m-t-rem3">
                                    <ul id="pagerAddressList" class="m-datatable__pager-nav">
                                    </ul>
                                    <div class="m-datatable__pager-info">
                                        <span id="paginateText" class="m-datatable__pager-detail"></span>
                                    </div>
                                </div> 

                               
                            </div>
                        </form>
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
    
    var divId    = 'addressListDiv';
    var tableId  = 'addressListTable';
    var pagerId  = 'pagerAddressList';
    var btnArray = Array('copy');
    var thArray  = Array( 
                        '<?php echo $translations["M00133"][$language]; /* No */ ?>',
                        '<?php echo $translations["M01285"][$language]; /* Address */ ?>',
                        '<?php echo $translations["M00135"][$language]; /* Date */ ?>',
                        );
      

    var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = ""; 

    var walletType = "<?php echo $_POST['walletType']; ?>";
    var displayName = "<?php echo $_POST['displayName']; ?>";

    $(document).ready(function(){ 

        if (!walletType){
            showMessage("<?php echo $translations["M00136"][$language]; /* No result found */ ?>", 'danger', '<?php echo $translations["M01194"][$language]; /* Failed */ ?>', "times-circle-o", 'paymentGatewayCryptocurrencies.php');
        }else{

            fCallback = loadDefaultListing;

            formData  = {
                command: 'getAddressListing',
                page: pageNumber,
                wallet_type : walletType
            };    
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
    });

    function pagingCallBack(pageNumber, fCallback){
      bypassLoading = 0;

      formData = {
        command : 'getAddressListing',
        page: pageNumber,
        wallet_type : walletType
      };
      fCallback = loadDefaultListing;
      ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        var tableNo = {pageNumber : data.result.pageNumber, numRecord : data.result.numRecord};
        var addressList = data.result.addresses;
    
         if (addressList){
             
            var newList = [];
            $.each(addressList, function(k, v) {
                
                var rebuildData = {
                    no : v['crypto_address'],
                    crypto_address : v['crypto_address'],
                    created_at : v['created_at'], 
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        
        pagination(pagerId, data.result.pageNumber, data.result.totalPage, data.result.totalRecord, data.result.numRecord);
         $('#'+tableId).find('tbody tr').each(function(){
            var status = $(this).find("td:eq(1)").text();
            // alert($(this).find("a.btn").attr("id"));
            $(this).find("a.btn").addClass("waves-effect waves-light");
       })

    }

    function addColumn(tableId, data) {
        var rows = $('#' + tableId + ' tr');
        for (var i = 0; i < rows.length; i++) {
            var checkbox = $('<input />', {
                type: 'checkbox',
                id: 'chk' + i,
                value: 'myvalue' + i
            });
            checkbox.wrap('<td style="width : 12px !important;"></td>').parent().prependTo(rows[i]);
        }
        $("#chk0").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    }

     function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('span').parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'copy') {
            var textAddress = tableRow.find("td:eq(1)")[0];
            
            var selection = window.getSelection();        
            var range = document.createRange();
            range.selectNodeContents(textAddress);
            selection.removeAllRanges();
            selection.addRange(range);
            document.execCommand("copy");
            swal({
                position:"center",
                type:"success",
                title:"<?php echo $translations["M00137"][$language]; /* Copy to clipboard */ ?>",
                showConfirmButton:!1,
                timer:1500
            })
        }
    }

    function generateAddress() {
        fCallback = addNewAddress;
            formData  = {
                command: 'generateNewAddress',
                wallet_type : walletType,
            };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }


    function addNewAddress(data,message){
        
        showMessage(message, 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', "check-circle-o", ['paymentGatewayAddressList.php',{displayName:displayName,walletType:walletType}]);
    };
</script>