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
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">

                       <a href="#" class="waves-effect waves-light btn  m-btn--pill m-btn--air btn-sm m-btn m-btn--custom theme-green-button" role="button"
                       data-toggle="modal" data-target="#generateApiModal"><?php echo $translations["M00138"][$language]; /* Generate API Key */ ?></a>

                   </ul>
               </div>
           </div>
                   
           <div class="m-content" style="">

            
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                 <div class="m-portlet__head-caption">
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
                       <?php echo $translations["M00139"][$language]; /* API Keys */ ?>
                    </h1>
                </div>
            </div>
        </div>
       
        <div class="m-portlet__body">
            <form class="m-form m-form--fit m-form--label-align-right">

                <div id="alertMsg" class="alert" style="display: none;"></div>


                <div id="apiListDiv" class="m_datatable m-datatable m-datatable--default m-datatable--loaded table-responsive">
           
   </div>

   <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
    <div class="m-datatable__pager m-datatable--paging-loaded clearfix m-t-rem3">
        <ul id="pagerApiList" class="m-datatable__pager-nav">
        </ul>
        <div class="m-datatable__pager-info">
            <span id="paginateText" class="m-datatable__pager-detail"></span>
        </div>
    </div> 

    <div id="deleteDiv" class="form-group m-form__group m-t-rem2" style="padding:0;display: none;">

        <button id="deleteBtn" type="button" class="waves-effect waves-light btn btn-outline-danger m-btn--pill mt-1 theme-button deleteBtn"><?php echo $translations["M00140"][$language]; /* Delete */ ?></button>

      
    </div>
</div>
</form>
</div>

</div>
</div>
</div>
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




<?php include 'footerDashboard.php'; ?> 

</div>

        

<?php include 'sharejsDashboard.php'; ?>

</body>


</html>

<script>
   
    var divId    = 'apiListDiv';
    var tableId  = 'apiListTable';
    var pagerId  = 'pagerApiList';
    var btnArray = Array('copy', 'delete');
    var thArray  = Array(
            '<?php echo $translations["M00134"][$language]; /* API Key */ ?>',
            '<?php echo $translations["M00141"][$language]; /* Expiry Date*/ ?>'
        );


    var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = ""; 
    var dateToday       = new Date();
    
    $(document).ready(function(){ 

        $("#expiryDate").datepicker({
            format      : 'yyyy-mm-dd 23:59:59',
            orientation : 'bottom auto',
            startDate   : dateToday,
            autoclose   : true
        });

        fCallback = loadDefaultListing;

        formData  = {
            command: 'getApiKeyListing'
        };    
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

         
          $('#deleteBtn').click(function(){
            
            $('html, body').animate({scrollTop : 0},500);
            
            var idArr = [];
            $('#'+tableId+" tbody").find('[type=checkbox]:checked').each(function() {
                var transID = $(this).parent('td').parent('tr').attr('data-th');
                idArr.push(transID);
           
            var formData = {
                "command" : "deleteApiKey",
                "apikey_id" : transID
            }
            
            fCallback = loadDelete;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
          

          if (idArr=="") {
               showMessage("<?php echo $translations["M00144"][$language]; /* Please select API Key to delete */ ?>", 'warning', '<?php echo $translations["M00148"][$language]; /* Delete API Key */ ?>', 'warning', '')
            } 
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
                    
                    showMessage(message, 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', "check-circle-o", 'paymentGatewayAPI.php');
                };
            }
        });
 });

    function pagingCallBack(pageNumber, fCallback){
      bypassLoading = 0;

      formData = {
        command : 'getApiKeyListing',
        page: pageNumber
      };

      fCallback = loadDefaultListing;
      ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
       
        var tableNo;
        var apiList = data.result.apikeys;

        $('#deleteDiv').hide();

        if(apiList) {
            $('#deleteDiv').show();
            var newList = [];
            
            $.each(apiList, function(k, v) {
                 
                    
                    var rebuildData = {
                        apikey : v['apikey'],
                        expired_at : v['expired_at']
                    };

                    newList.push(rebuildData);
                   
            });
        }


        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        addColumn(tableId,data);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId).find('tbody tr').each(function(){
            
            $(this).find("a.btn").addClass("waves-effect waves-light");
      
        })

        if(apiList) {
            $.each(apiList, function(k, v) {
                    $('#'+tableId).find('tr#'+k).attr('data-th', v['id']);
            });
        }
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
        
        $('#apiListTable tr td').find('input[type=checkbox]').on('click', function() {
            var numberOfRow = $('#apiListTable tbody').find('tr').length; //exclude first row
            var numberOfChecked = $('#apiListTable tr td').find('input:checked').length; //count number of checkbox checked
           
            if (numberOfChecked == numberOfRow) {
                $('#chk0').prop('checked', this.checked);
            }
        });
    }


    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('span').parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'copy') {
            var textAPI = tableRow.find("td:eq(1)")[0];
            
            var selection = window.getSelection();        
            var range = document.createRange();
            range.selectNodeContents(textAPI);
            selection.removeAllRanges();
            selection.addRange(range);
            document.execCommand("copy");
            swal({
                position:"center",
                type:"success",
                title:"<?php echo $translations["M00146"][$language]; /* Copied to Clipboard */ ?>",
                showConfirmButton:!1,
                timer:1500
            })
        }
        else if (btnName == 'delete') {
            var canvasBtnArray = Array('Delete');
            var message = '<?php echo $translations["M00147"][$language]; /* Are ypu sure you want to delete this API Key? */ ?>';
            showMessage(message, 'warning', '<?php echo $translations["M00148"][$language]; /* Delete API Key */ ?>', 'warning', '', canvasBtnArray);
            $('#canvasDeleteBtn').click(function() {
                    
                    var idArr = [];
                    var transID = tableRow.attr('data-th');
                    
                    idArr.push(transID);

                   
                    var formData = {
                        'command': 'deleteApiKey',
                         'apikey_id' : transID
                    };
                    
                    fCallback = loadDelete;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        }
    }

    function loadDelete(data,message){

        fCallback = successfulDelete;

        formData  = {
            command: 'getApiKeyListing'
        };    
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);     
                   
    }

    function loadDeleteAll(data,message){

        fCallback = successfulDeleteAll;

        formData  = {
            command: 'getApiKeyListing'
        };    
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);                        
    }

    function successfulDelete(data,message){
        showMessage('<?php echo $translations["M00149"][$language]; /* API key deleted */ ?>', 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', 'check-circle-o', 'paymentGatewayAPI.php');
    }

     function successfulDeleteAll(data,message){
        showMessage('<?php echo $translations["M00150"][$language]; /* All API key deleted */ ?>', 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', 'check-circle-o', 'paymentGatewayAPI.php');
    }

    
</script>