<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">
				<div class="d-flex align-items-center">
					<div class="" style="width: 100%">

						<div class="col-12">
							<div class="row">

								<div class="col-xl-10 col-lg-10 col-md-8 col-12">
									<div class="row">
										<div class="dashboardTitleWidth">
											<img src="images/dashboard/apiKeyIcon.svg" style="width: 30px; margin-top: 5px;" />
										</div>
										<div class="dashboardTitleWidth2">
											<div class="row">
												<div class="col-12 dashboardTitle">
													Api Keys History
												</div>
												<div class="col-12 dashboardTitleDesc">
													You can view all the api keys here
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-2 col-lg-2 col-md-4 col-12 gntBtnApiKey pr-0">
                                	<span class="m-portlet__head-icon m--hide">
                                		<i class="la la-gear"></i>
                               		</span>
                                	<button class="btn addApiBtnStyle" id="generateNewApiKey" data-toggle="modal" data-target="#generateApiModal">
                                    	<i class="fa fa-plus mr-1" style="font-size: 8px;"></i>
                                    	<span class="montserratRegularFont">New Api Key</span>
                                	</button>
								</div>

							</div>      
						</div>
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
                                                        <label><?php echo $translations["M00322"][$language]; /* Status */ ?>:</label>
                                                        <select class="form-control m-input" id="status">
                                                            <option class= "" value="" href="javascript:void(0)">All</option>
                                                            <option class= "" value="active" href="javascript:void(0)">Active</option>
                                                            <option class= "" value="expired" href="javascript:void(0)">Expired</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Created Date:</label>
                                                        <div class="input-daterange input-group" id="m_datepicker_5">
                                                            <input id="firstDate" type="text" class="form-control m-input" name="start" dataType="dateRange" autocomplete="off">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                                            </div>
                                                            <input id="lastDate" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>   
                                            <div class="form-group m-form__group ">
                                               <a id="searchTransactionBtn" href="#" class="btn resetBtn mx-2 my-2" style="" role="button"><?php echo $translations["M00326"][$language]; /* Search */ ?></a>
                                                <a id="resetTransactionBtn" href="#" class="btn searchBtn mx-2 my-2" role="button"><?php echo $translations["M00327"][$language]; /* Reset */ ?></a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                     
                </div>

                <div class="col-xl-12 px-0" id="showErrorMsg" style="display: none">
					<div class="m-portlet m-portlet--tab">
	                    <div class="m-portlet__body">
	                        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
						 		<div class="col-12">                           		
							    	<div class="row justify-content-center">

							    		<div class="col-8">
							    			<div class="row">
										    	<div class="col-xl-2 col-lg-2 col-md-12 col-12 text-center" style="margin: auto;">
										    		<img src="images/dashboard/noDateKeyIcon.png" style="width: 30px;"/>
										    	</div>
										    	<div class="col-xl-10 col-lg-10 col-md-12 col-12 text-left noDataTitleSpacing">
										    		<div class="row">
												    	<div class="col-12 montserratBoldFont" style="font-size: 16px">
												    		You have no any api keys yet.
												    	</div>
												    	<div class="col-12 montserratRegularFont" style="font-size: 14px;">
												    		Generate api keys at the top button
												    	</div>
											    	</div>
										    	</div>
										    </div>
										</div>

							    	</div>
						    	</div>
	                        </div>
	                    </div>
					</div>
				</div>

				<div class="col-xl-12 px-0" id="showresultListing" style="display: block;">
					<div class="m-portlet m-portlet--tab">
	                    <div class="m-portlet__body">
	                        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
	                            <div class="table-responsive" id="apiKeysDivList"></div>
	                            <div class="m-datatable__pager m-datatable--paging-loaded clearfix m-t-rem3">
	                                <ul class="m-datatable__pager-nav" id="apiKeysPager">
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

		</div>
	<?php include 'footerDashboard.php'; ?>
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
<?php include 'sharejsDashboard.php'; ?>

</body>
</html>

<script>
   
    var divId    = 'apiKeysDivList';
    var tableId  = 'apiKeysListTable';
    var pagerId  = 'apiKeysPager';
    var btnArray = {};
    var thArray  = Array(
        'Api Keys',
        'Created At',
        'Expired At',
        '',
        ''
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
    var dropdownFake;
    var dateToday       = new Date();   

    $(document).ready(function(){ 

        $("#transactionDate").datepicker({
            format      : 'dd/mm/yyyy',
            orientation : 'bottom auto',
            autoclose   : true
        });

        fCallback = loadApiKeyListing;
        formData  = {
            command : 'getApiKeyListing',
            page: pageNumber
        };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        
        $('#searchTransactionBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#resetTransactionBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $("#coinType").val("");
            $("#status").val("");
            $('#searchTransaction').find('input').each(function() {
               $(this).val(''); 
           	});
        });

        $('#firstDate').daterangepicker({
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        }, function(start, end, label) {
            $("#firstDate").val(start.format('DD/MM/YYYY'));
            $("#lastDate").val(end.format('DD/MM/YYYY'));
        });

        $('#lastDate').click(function() {
            $('#firstDate').trigger('click');
        });
        $('input[name="start"]').on('apply.daterangepicker', function (ev, picker) {
            $('#firstDate').val(picker.startDate.format('DD/MM/YYYY'));
            $('#lastDate').val(picker.endDate.format('DD/MM/YYYY'));
        });

        $("#expiryDate").datepicker({
            format      : 'yyyy-mm-dd 23:59:59',
            orientation : 'bottom auto',
            startDate   : dateToday,
            autoclose   : true
        });
        $('#generateNewApiKey').click(function(){
            $('#generateApiModal').toggle();
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
                    page: pageNumber,
                    expiry_date : expiryDate
                };
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                $('#generateApiModal').modal('hide');

                function addNewApi(data,message){
                    
                    showMessage(message, 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', "check-circle-o", 'apiKeysListing.php');
                };
            }
        });

    });

    function pagingCallBack(pageNumber, fCallback){

        var searchId   = 'searchTransaction';
        var searchData = buildSearchDataByType(searchId);
        var status = $("#status").val();
        var fromDateTime, toDateTime;

        if ($("#firstDate").val()) {
            fromDateTime = dateToTimestamp($("#firstDate").val() + " 00:00:00");
        }else{
            fromDateTime="";
        }
        if ($("#lastDate").val()) {
            toDateTime = dateToTimestamp($("#lastDate").val() + " 23:59:59");
        }else{
            toDateTime="";
        }

        // console.log(fromDateTime);
        // console.log(toDateTime);

        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command       : 'getApiKeyListing',
            page          : pageNumber,
            status        : status,
            from_datetime : fromDateTime,
            to_datetime   : toDateTime
        };

        if(!fCallback)
            fCallback = loadApiKeyListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadApiKeyListing(data, message) {
		var tableNo;
        var apiKeysList = data.result.apikeys;

        if(apiKeysList) {
        	$('#showErrorMsg').hide();
        	$('#showresultListing').show();

            var newList = [];
            var workingHours;
            $.each(apiKeysList, function(k, v) {

            	var status = v['status'];

            	if (status == "1") {
            		var addClassColor = "success";
            		var statusTxt = "Active";
            	} else {
            		var addClassColor = "danger";
            		var statusTxt = "Expired";
            	}

                var rebuildData = {
                    ID               : '<p class="mb-1 montserratRegularFont" style="width: 300px; word-break: break-all;">'+v['apikey']+'</p><span class="py-0 mr-2 f-12 '+addClassColor+'" style="">'+statusTxt+'</span><span class="f-12"><i>Created on '+dateTimeToDateFormat( v['created_at'] )+'</i></span>',
                    createdAt        : moment(v['created_at']).format('DD/MM/YYYY h:mm:ss A'),
                    expiredAt        : moment(v['expired_at']).format('DD/MM/YYYY h:mm:ss A'),
                    coptIcon         : '<img src="images/dashboard/newCopyIcon.png" style="width: 20px; cursor: pointer" class="copyImgClick"/>',
                    deleteApi        : '<div class="deleteApiId mt-1" style="color: red; cursor: pointer">Delete</span>'
                };

                newList.push(rebuildData);
            });
        }
        else
        {
        	$('#showErrorMsg').show();
        	$('#showresultListing').hide();
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        // console.log(data);
        pagination(pagerId, data.result.pageNumber, data.result.totalPage, data.result.totalRecord, data.result.numRecord);

       	$('#'+tableId).find('tbody tr').each(function(){
            $(this).addClass("removeBackgorundColor");
        })
        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find("td:eq(1)").addClass("walletAddressTextEscplise");
            $(this).find("td:eq(2)").addClass("montserratRegularFont");
            $(this).find("td:eq(3)").addClass("montserratRegularFont");
            $(this).find("td:eq(4)").addClass("montserratRegularFont");
        })
       	if(apiKeysList) {
        	$.each(apiKeysList, function(k, v) {
          		$('#'+tableId+' tr#'+k).find('.copyImgClick').attr('data-id', v['id']);
          		$('#'+tableId+' tr#'+k).find('.deleteApiId').attr('data-id', v['id']);
        	});
      	}

       	$('.copyImgClick').click(function()
       	{
       		var getCopyDataId = $(this).attr('data-id');

       		if(apiKeysList) {
	        	$.each(apiKeysList, function(k, v) {
	          		if(getCopyDataId == v['id'])
	          			copyToClipboard(v['apikey']);
	        	});
	      	}
       	});
       	$('.deleteApiId').click(function()
       	{
       		var getDeleteId = $(this).attr('data-id');	

       		var canvasBtnArray = Array('Delete');
            var message = '<?php echo $translations["M00147"][$language]; /* Are ypu sure you want to delete this API Key? */ ?>';
            showMessage(message, 'warning', '<?php echo $translations["M00148"][$language]; /* Delete API Key */ ?>', 'warning', '', canvasBtnArray);
            $('#canvasDeleteBtn').click(function() {
                var formData = {
                    'command'   : 'deleteApiKey',
                    'apikey_id' : getDeleteId
                };
                
                fCallback = loadDelete;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
       	});
    }

    function dateTimeToDateFormat(dateTimeValue)
    {
    	// Set variable to current date and time
		// const now = new Date(dateTimeValue);
		return moment(dateTimeValue).format('LLL');
    }

    function copyToClipboard(val){
        // console.log(val);
        var dummy = document.createElement("input");
        document.body.appendChild(dummy);
        // $(dummy).css('display','none');
        dummy.setAttribute("id", "dummy_id");
        document.getElementById("dummy_id").value=val;
        dummy.select();
        document.execCommand("copy");
        document.body.removeChild(dummy);
        swal.fire({
            position:"center",
            type:"success",
            title:"<?php echo $translations["M00137"][$language]; /* Copied to clipboard  */?>",
            showConfirmButton:!1,
            timer:1000
        })
    }	

    function loadDelete(data,message){
        fCallback = successfulDelete;
        formData  = {
            command: 'getApiKeyListing'
        };    
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);                    
    }
    function successfulDelete(data,message){
        showMessage('<?php echo $translations["M00149"][$language]; /* API key deleted */ ?>', 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', 'check-circle-o', 'apiKeysListing.php');
    }

    function loadSearch(data, message) {
        loadApiKeyListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations["M00334"][$language]; /* Search Successful */ ?>.</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

</script>
