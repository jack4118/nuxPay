<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">
				<div class="row d-flex justify-content-between">
					<div class="col-6 pageHeader mt-3 mb-2 pl-4">                    
						<?php echo $translations["M02055"][$language]; /* API I/O */ ?>
					</div>
				</div>		
			</div>

			<div class="m-content">
                <div class="col-12" id="searchSection">
					<div class="row d-flex justify-content-between">
						<div>
							<div class="form-group searchBox">
								<label class="searchLabel">
								<?php echo $translations["M00602"][$language]; /* From */?>:
								</label>
								<input id="firstDate" type="text" class="searchDesign" />
							</div>

							<div class="form-group searchBox" style="">
								<label class="searchLabel">
									<?php echo $translations["M00603"][$language]; /* To */?>:
								</label>
								<input id="lastDate" type="text" class="searchDesign" />
							</div>
							
							<div class="form-group searchBox" style="">
								<label style="margin:0px"><?php echo $translations["M02057"][$language]; /* Direction */?>:</label>
								<select class="searchDesign" id="direction" style="padding-left: 5px; padding-right: 5px; width: 100px;">
									<option class= "" value="all" href="javascript:void(0)"><?php echo $translations["M01486"][$language]; /* All */ ?></option>
									<option class= "" value="in" href="javascript:void(0)"><?php echo $translations["M00160"][$language]; /* Request */ ?></option>
									<option class= "" value="out" href="javascript:void(0)"><?php echo $translations["M02064"][$language]; /* Callback */ ?></option>
								</select>
							</div>

                            <div class="form-group searchBox" style="">
								<label class="searchLabel">
                                    <?php echo $translations["M02056"][$language]; /* Command */?>:
								</label>
                                <select class="searchDesign" id="command" style="padding-left: 5px; padding-right: 5px; width: 300px;">
									<option class= "" value="all" href="javascript:void(0)"><?php echo $translations["M01486"][$language]; /* All */ ?></option>
								</select>
							</div>
						</div>
					</div>   
                </div>

                <div class="col-12 text-center my-5" id="showErrorMsg" style="display: none">
                    <div class="row">
                        <div class="col-12">
                            <img src="<?php echo $sys['source'] == 'FTAG' ?  'images/whitelabel/ftag/no-withdrawal.png' :  'images/nuxPay/newDesign/noWalletIcon.png'?>">
                        </div>
                        <div class="col-12 mt-3 bigText">
                         	<?php echo $translations["M01870"][$language]; /* No Transactions */?>
                        </div>
                    </div>
                </div>

				<div class="col-xl-12 px-0" id="showresultListing" style="display: block;">
                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                        <div class="table-responsive" id="developerIODiv"></div>
                        <div class="m-datatable__pager m-datatable--paging-loaded clearfix m-t-rem3">
                            <ul class="m-datatable__pager-nav" id="developerIOPager">
                            </ul>
                            <div class="m-datatable__pager-info">
                                <span class="m-datatable__pager-detail"></span>
                            </div>
                        </div>   
                    </div>
                    
				</div>
			</div>

		</div>

        <div class="modal fade" tabindex="-1" role="dialog" id="dataModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body" id="dataInOutContainer">
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
    var divId    = 'developerIODiv';
    var tableId  = 'developerIOTable';
    var pagerId  = 'developerIOPager';
    var btnArray = Array('view');
    var thArray  = Array(
		'<?php echo $translations["M01729"][$language]; /* Date */?>',            
        '<?php echo $translations["M02056"][$language]; /* Command */?>',           
        '<?php echo $translations["M02057"][$language]; /* Type */?>',            
        '<?php echo $translations["M02058"][$language]; /* Data In / Data Out */?>',
    );

    var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var outputArray     = "";
    var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';

    if (hasChangedPassword == 0){
        $.redirect('firstTimeLogin.php');
    }

    $(document).ready(function(){ 
        // get command list
        formData = {
            command     : 'getDeveloperIOCommandList'
        };
        fCallback = loadCommandList;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // get i/o data
        formData = {
            command     : 'getDeveloperIOData',
            page        : pageNumber,
        };
        fCallback = loadDeveloperIOTable;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, 1, 0);

        $('#firstDate').daterangepicker({
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'MMM DD, YYYY'
            }
        }, function(start, end, label) {
            $("#firstDate").val(start.format('ll'));
            $("#lastDate").val(end.format('ll'));

            pagingCallBack(pageNumber);

        });

        // Date onClick event
        $('#lastDate').click(function() {
            $('#firstDate').trigger('click');
        });
        $('input[name="start"]').on('apply.daterangepicker', function (ev, picker) {
            $('#firstDate').val(picker.startDate.format('DD/MM/YYYY'));
            $('#lastDate').val(picker.endDate.format('DD/MM/YYYY'));
        });

        // Direction input onChange event
        $('#direction').change(function() {
            pagingCallBack(pageNumber)
        });

        // Command input onChange event
        $('#command').change(function() {
            pagingCallBack(pageNumber)
        });

    });

    function loadDeveloperIOTable(data, message) {
        var tableNo;
        var tableData = data.result.data;
        var rebuildData = [];
        outputArray = data.result.output;

        if (tableData.length == 0) {
            $('#showErrorMsg').show();
            $('#showresultListing').hide();
        } else {
            $('#showErrorMsg').hide();
            $('#showresultListing').show();

            for(var record of tableData) {
                var type = '';
                if (record.Type == 'Request') {
                    type = '<?php echo $translations["M00160"][$language]; /* Request */ ?>';
                } else if (record.Type == 'Callback') {
                    type = '<?php echo $translations["M02064"][$language]; /* Callback */ ?>';
                }

                rebuildData.push({
                    Date: record.Date,
                    Command: record.Command,
                    Type: type
                });
            }

            buildTable(rebuildData, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.result.pageNumber, data.result.totalPage, data.result.totalRecord, data.result.numRecord);

            // modify datatable format
            $('#'+tableId).find('tbody tr').each(function(){
                $(this).addClass("removeBackgorundColor");
            });
            $('#'+tableId+' > thead > tr > th').each(function(index, th) {
                if (index == 2 || index == 3) {
                    $(this).addClass('text-center');
                } else {
                    $(this).addClass('text-left');
                }
            });
            $('#'+tableId+' > tbody > tr').each(function(index, tr) {
                $(this).find('td').each(function (i, td) {
                    if (i == 2 || i == 3) {
                        $(this).addClass('text-center');

                        if (i == 3) {
                            $(this).find('a').each(function (j, aTag) {
                                $(this).html('<?php echo $translations["M02063"][$language]; /* View */?>');
                            });
                        }
                    } else {
                        $(this).addClass('text-left');
                    }
                });
            });

            // modify pagination wording
            var paginationHtml = $('#paginateText').text();
            if (paginationHtml) {
                paginationHtml = paginationHtml.replace('Displaying', '<?php echo $translations["M02092"][$language]; /* Displaying */?>');
                paginationHtml = paginationHtml.replace('of', '<?php echo $translations["M02093"][$language]; /* of */?>');
                paginationHtml = paginationHtml.replace('records', '<?php echo $translations["M02094"][$language]; /* records */?>');
                $('#paginateText').text(paginationHtml)
            }
        }

    }

    function loadCommandList(data, message) {
        var commandLists = data.result.data;

        if (commandLists.length != 0) {
            for (var list of commandLists) {
                $('#command').append(new Option(list, list));
            }
        }
    }

    function tableBtnClick(btnId) {
        var btnName = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId = $('#'+btnId).closest('table');
        var dataIn = "";
        var dataOut = "";
        
        if (btnName == 'view') {
            var viewId = btnId.replace('view', '');
            dataIn = outputArray[viewId].dataIn;
            dataOut = outputArray[viewId].dataOut;

            $('#dataInOutContainer').empty();

            $('#dataInOutContainer').append('<h4>'+ '<?php echo $translations["M02061"][$language]; /* Data In */?>' +'</h4>');
            $('#dataInOutContainer').append('<pre>'+ JSON.stringify(JSON.parse(dataIn), undefined, 2) +'</pre>');
            $('#dataInOutContainer').append('<h4>'+ '<?php echo $translations["M02062"][$language]; /* Data Out */?>' +'</h4>');
            $('#dataInOutContainer').append('<pre>'+ JSON.stringify(JSON.parse(dataOut), undefined, 2) +'</pre>');

            $('#dataModal').modal('show');

        }
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchData = buildSearchData();

        if(pageNumber > 1) bypassLoading = 1;

        formData = {
            command : "getDeveloperIOData",
            page: pageNumber,
            search: searchData,
        };

        ajaxSend(url, formData, method, loadDeveloperIOTable, debug, bypassBlocking, bypassLoading, 0);
    }

    function buildSearchData() {
        var date_from = '';
        var date_to = '';
        var direction = '';
        var command = '';
        var returnData = [];

        if (sanitize($("#firstDate").val())) {
            date_from = moment(new Date(sanitize($("#firstDate").val()))).format('YYYY-MM-DD');
            returnData.push({ type: 'start', value: date_from });
        }
        if (sanitize($("#lastDate").val())) {
            date_to = moment(new Date(sanitize($("#lastDate").val()))).format('YYYY-MM-DD'); 
            returnData.push({ type: 'end', value: date_to });
        }
        if ($('#direction').val()) {
            direction = $('#direction').val();
            returnData.push({ type: 'direction', value: direction });
        }
        if ($('#command').val()) {
            command = $('#command').val();
            returnData.push({ type: 'command', value: command });
        }

        pageNumber = 1;

        return returnData;
    }

</script>

<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        position: relative;
        padding: 0px 30px 0px 10px;
        line-height: 30px;
    }

    .select2 {
        width: 222px!important;
    }

    .select2-container--default .select2-selection--multiple,
    .select2-container--default .select2-selection--single {
        border: unset;
    }

    .select2-container--default.select2-container--open .select2-selection--multiple,
    .select2-container--default.select2-container--open .select2-selection--single {
        border: unset;
        box-shadow: unset;
    }

    .searchBox {
        height: 32px;
    }

    .searchBox.seacrhWalletBox {
        border: 1px solid #dedede;
        padding: 0px;
        background-color: #fff;
        display: inline-flex;
        align-items: center;
        margin-right: 5px;
        height: 32px;
    }

    #direction{
		-webkit-appearance: none;
    	-moz-appearance: none;
		appearance: none;
		background: url('data:image/svg+xml;charset=utf8,<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" xml:space="preserve"><path d="M7.41,8.59L12,13.17l4.59-4.58L18,10l-6,6l-6-6L7.41,8.59z"/><path fill="none" d="M0,0h24v24H0V0z"/></svg>');
		background-position: center right;
  		background-repeat: no-repeat;
		width: 100%; 
	}

    #command{
		-webkit-appearance: none;
    	-moz-appearance: none;
		appearance: none;
		background: url('data:image/svg+xml;charset=utf8,<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" xml:space="preserve"><path d="M7.41,8.59L12,13.17l4.59-4.58L18,10l-6,6l-6-6L7.41,8.59z"/><path fill="none" d="M0,0h24v24H0V0z"/></svg>');
		background-position: center right;
  		background-repeat: no-repeat;
		width: 100%; 
	}

    pre {
        white-space: pre-wrap;
        white-space: -moz-pre-wrap;
        white-space: -pre-wrap;
        white-space: -o-pre-wrap;
        word-wrap: break-word;
    }

</style>
