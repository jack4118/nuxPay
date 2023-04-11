<?php include 'include/config.php'; ?>

<?php
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
$_SESSION['lastVisited'] = $thisPage;
if ($_SESSION['paymentGatewayStatus']==0 || !$_SESSION['paymentGatewayStatus']) {
 header("Location: paymentGatewayCheckStatus.php");
}
?>

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
                   
                </div>
            </div>
            

            <div class="m-content">
               
                <div class="row">
                    <div class="col-md-12">
                        <div class="m-accordion m-accordion--default m-accordion--solid" id="m_accordion_3" role="tablist">
                            <div class="m-accordion__item">
                                <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_3_item_1_head" data-toggle="collapse" href="#m_accordion_3_item_1_body" aria-expanded="false">
                                    <span class="m-accordion__item-title"><?php echo $translations["M00318"][$language]; /* Search */ ?></span>
                                    <span class="m-accordion__item-mode"></span>
                                </div>

                                <div class="m-accordion__item-body collapse" id="m_accordion_3_item_1_body" role="tabpanel" aria-labelledby="m_accordion_3_item_1_head" data-parent="#m_accordion_3" style="">
                                    <div class="m-accordion__item-content" style="padding-left:  0; padding-right:  0;">
                                        <form id="searchTransaction" class="m-form m-form--fit m-form--label-align-right ">
                                            <div class="m-portlet__body">

                                                <div class="form-group m-form__group row" style="padding-bottom: 15px;">
                                                    <div class="col-lg-4">
                                                        <label><?php echo $translations["M00319"][$language]; /* Coin */ ?>:</label>
                                                        <select class="form-control m-input" id="coinType">
                                                            <option class= "" value="" href="javascript:void(0)"><?php echo $translations["M00467"][$language]; /* All */ ?></option>
                                                            <option class= "" value="bitcoin" href="javascript:void(0)"><?php echo $translations["M00320"][$language]; /* Bitcoin */ ?></option>
                                                            <option class= "" value="ethereum" href="javascript:void(0)"><?php echo $translations["M00321"][$language]; /* Ethereum */ ?></option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label><?php echo $translations["M00322"][$language]; /* Status */ ?>:</label>
                                                        <select class="form-control m-input" id="status">
                                                            <option class= "" value="" href="javascript:void(0)">All</option>
                                                            <option class= "" value="Success" href="javascript:void(0)"><?php echo $translations["M00323"][$language]; /* Success */ ?></option>
                                                            <option class= "" value="fail" href="javascript:void(0)"><?php echo $translations["M00324"][$language]; /* Fail */ ?></option>
                                                            <option class= "" value="pending" href="javascript:void(0)">Pending</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label><?php echo $translations["M00325"][$language]; /* Transaction Date */ ?>:</label>
                                                        <div class="input-daterange input-group" id="m_datepicker_5">
                                                            <input id="firstDate" type="text" class="form-control m-input" name="start" data-date-format="YYYY MM DD" autocomplete="off">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                                            </div>
                                                            <input id="lastDate" type="text" class="form-control" name="end" data-date-format="YYYY MM DD" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>   
                                            <div class="form-group m-form__group ">

                                                <a id="searchTransactionBtn" href="#" class="waves-effect waves-light btn  m-btn--pill m-btn--air btn-sm m-btn m-btn--custom theme-green-button" style="" role="button"><?php echo $translations["M00326"][$language]; /* Search */ ?></a>
                                                <a id="resetTransactionBtn" href="#" class="btn btn btn m-btn--pill m-btn--air  btn-outline-secondary btn-sm m-btn m-btn--custom theme-button" role="button" style="color:black"><?php echo $translations["M00327"][$language]; /* Reset */ ?></a>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                     
                </div>
                
                <div class="m-portlet m-portlet--tab">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h1 class="m-portlet__head-text" style="font-size:15pt;">
                                    <?php echo $translations["M00328"][$language]; /* Transaction History */ ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                    
                    <div class="m-portlet__body">
                        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                            <div id="alertMsg" class="alert" style="display: none;"></div>

                            <div class="table-responsive" id="transactionHistoryListDiv"></div>
                            <div class="m-datatable__pager m-datatable--paging-loaded clearfix m-t-rem3">
                                <ul class="m-datatable__pager-nav" id="billingPager">
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
    </div>

   


    <?php include 'footerDashboard.php'; ?> 
    
</div>



<?php include 'sharejsDashboard.php'; ?>

</body>


</html>

<script>
    $("#m_datepicker_5").datepicker({
        format: 'yyyy-mm-dd',
        orientation:"bottom",
        todayHighlight:!0,
        templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}
    });
    
    var divId    = 'transactionHistoryListDiv';
    var tableId  = 'transactionHistoryListTable';
    var pagerId  = 'transactionHistoryPager';
    var btnArray = {};
    var thArray  = Array(
        '<?php echo $translations["M00329"][$language]; /* ID */ ?>',
        '<?php echo $translations["M00330"][$language]; /* Coin */ ?>',
        '<?php echo $translations["M00331"][$language]; /* Amount */ ?>',
        '<?php echo $translations["M00332"][$language]; /* Status */ ?>',
        '<?php echo $translations["M00333"][$language]; /* Transaction Date */ ?>'
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
    var coinType;

    $(document).ready(function(){ 

        $("#transactionDate").datepicker({
            format      : 'dd/mm/yyyy',
            orientation : 'bottom auto',
            autoclose   : true
        });

        if (walletType) {
            $("#coinType").val(walletType);
        }

        coinType = $("#coinType").val();

        fCallback = loadDefaultListing;

        formData  = {
            command: 'getTransactionList',
            walletType: coinType
        };

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#searchTransactionBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#resetTransactionBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchTransaction').find('input').each(function() {
               $(this).val(''); 
           });
        });

    });

    function pagingCallBack(pageNumber, fCallback){

        var searchId   = 'searchTransaction';
        var searchData = buildSearchDataByType(searchId);
        
        var fromDate = $("#firstDate").val();
        var toDate = $("#lastDate").val();
        var status = $("#status").val();
        coinType = $("#coinType").val();

        if (fromDate) {
            fromDate = fromDate + " 00:00:00";
        }

        if (toDate) {
            toDate = toDate + " 23:59:59";
        }


        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command : 'getTransactionList',
            walletType : coinType,
            status: status,
            from : fromDate,
            to : toDate,
            page: pageNumber
        };

        if(!fCallback)
            fCallback = loadDefaultListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        
        var tableNo;
        var transactionList = data.result.transaction_list;

        if(transactionList) {
            var newList = [];
            var workingHours;
            $.each(transactionList, function(k, v) {
                var rebuildData = {
                    ID : v['transaction_id'],
                    coin : v['wallet_type'],
                    Amount : v['amount'],
                    Status : v['status'],
                    Date : v['transaction_date']
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId).find('tbody tr').each(function(){
            
            $(this).find("a.btn").addClass("waves-effect waves-light");
      
        })
        
        if (transactionList) {
            $.each(transactionList, function(k, v) {
                var transactionID = v['transaction_id'];
                $('#'+tableId).find('tr#'+k+" td:eq(0)").html("<a href='"+v['transaction_url']+"' target='_blank'>"+transactionID+"</a>");
            });
        }
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations["M00334"][$language]; /* Search Successful */ ?>.</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

</script>
