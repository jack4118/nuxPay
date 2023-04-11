<?php include 'include/config.php'; ?>
<?php include 'headHomepage.php'; ?>

<?php
if((isset($_POST['access_token']) && $_POST['access_token'] != "")) {
        // $_SESSION["access_token"] = $_POST['access_token'];
        // $_SESSION["business"]["uuid"] = $_POST['businessID'];
}
 ?>

<body class="">
    <div class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed kt-page--loading">

        <?php include 'headerHomapage.php'; ?>

        <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor paymentBG">

                <section class="paymentHeader">
                    <div class="text-center">
                        <h1 class="paymentTitle"><?php echo $translations["M02008"][$language]; /* Receipt  */?></h1>
                    </div>
                </section>

                <div class="paymentWhiteForm">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="row justify-content-md-between">
                                    <div class="col-md-12" style="margin-bottom: 10px;">
                                        <div class="row">
                                            <div class="requestByCss">
                                            <?php echo $translations["M02009"][$language]; /* Request By  */?>
                                            </div>
                                            <div class="col-xl-11 col-lg-7 col-8">
                                                <div class="row">
                                                    <div class="col-12" id="payeeName">
                                                        -
                                                    </div>
                                                    <div class="col-12" id="payeePhone">
                                                        -
                                                    </div>
                                                    <div class="col-12" id="payeeEmail">
                                                        -
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12 pl-10 mt-4 mt-md-0">
                                        <div class="row">
                                            <div class="col-xl-1 col-lg-1 col-4 px-0 paymentBold">
                                                Reference No:
                                            </div>
                                            <div class="col-xl-11 col-lg-11 col-8" id="paymentNo">
                                                12345678
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-1 col-lg-1 col-4 px-0 paymentBold">
                                                Status:
                                            </div>
                                            <div class="col-xl-11 col-lg-11 col-8" id="paymentStatus">
                                                Waiting for Payment
                                            </div>
                                        </div>
                                        <div class="row" id="totalPaidRow">
                                            <div class="col-xl-1 col-lg-1 col-4 px-0 paymentBold">
                                                Paid Amount:
                                            </div>
                                            <div class="col-xl-11 col-lg-11 col-8" id="totalPaid">
                                                0.00
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-12 mt-5 px-0 paymentTitle">
                                            <?php echo $translations["M02010"][$language]; /* Payment Info */?>
                            </div>
                            <!-- YF1 -->
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
                            <!-- YF2 -->
                            <div class="col-12 mt-3 px-0" id="showresultListing"></div>
                                <!--  <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                                    <div class="table-responsive" id="transactionHistoryListDiv"></div>
                                   <div class="m-datatable__pager m-datatable--paging-loaded clearfix " style="padding-bottom: 10px">
                                        <div class="m-datatable__pager-info">
                                            <span class="m-datatable__pager-detail"></span>
                                        </div>
                                    </div>-->   
                                <!-- </div>  -->

                            <!-- </div> -->
                            
                            <!-- <div class="col-12 px-0 mt-1">
                                <div class="row">
                                    <div class="col-md-8 order-2 order-md-1">
                                        <div class="row">
                                            <div class="col-12 paymentTitle py-0 mt-5">
                                                Your Info
                                            </div>
                                            <div class="col-12 mt-5">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-xl-1 col-lg-1 col-4 paymentBold">
                                                                Name:
                                                            </div>
                                                            <div class="col-xl-11 col-lg-11 col-8" id="payerName">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-xl-1 col-lg-1 col-4 paymentBold">
                                                                Email:
                                                            </div>
                                                            <div class="col-xl-11 col-lg-11 col-8" id="payerEmail">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-xl-2 col-lg-2 col-4 pr-0 paymentBold">
                                                                Mobile Number:
                                                            </div>
                                                            <div class="col-xl-10 col-lg-10 col-8" id="payerPhone">
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="col-12 paymentBtn">
                                                        <button class="btn btnRequest" id="editDetails">Save Changes</button>
                                                    </div> -->
                                                <!-- </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-md-right text-center mt-2 mt-md-5 order-1 order-md-2" id="paymentBtnWrapper">
                                        <a href="" id="paymentNext" target="_self">
                                            <?php if($sys['isWhitelabel'] != 1){
                                                echo '<img src="'.$sys['paymentBtnImage'].'" class="paymentNuxBtn">';
                                            }
                                            else{
                                                echo '<button class="btn btn-primary waves-effect waves-light paymentNuxBtn">Pay with '.$sys['companyName'].'</button>';
                                            }
                                            ?>
                                        </a>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-12 px-0">

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

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal body -->
      <div class="modal-body paymentModalBody">
            <div class="row justify-content-center paymentModalContent">
                <div class="col-12 text-center py-4">
                    <img src="images/nuxPay/paymentSuccessIcon.png" alt="" width="200px">
                </div>
                <div class="col-12 text-center py-3">                       
                    <b class="d-block"><?php echo $translations["M02011"][$language]; /* Your payment is successful  */?></b>
                    <span class="d-block text-grey mt-1"><?php echo $translations["M02012"][$language]; /* Thank you for your payment. Please check invoice for transaction details.  */?></span>
                </div>
                <div class="col-lg-3 col-md-4 text-center">
                    <button class="btn btnRequest" data-dismiss="modal"><?php echo $translations["M02013"][$language]; /* Done  */?></button>
                </div>
            </div>
      </div>

    </div>
  </div>
</div>

</body>

</html>
<?php include 'sharejsHomepage.php'; ?>

<!-- <script>
    AOS.init({
        once: true
    });
</script> -->

<script>


    window.ajaxEnabled = true;

    var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 1;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var getToken        = "<?php echo $_GET['token']?>";
    var payer_id;
    var symbol;
    var searchTab;
    var status;
    var divId    = 'transactionHistoryListDiv';
    var tableId  = 'transactionHistoryListTable';
    var pagerId  = 'transactionHistoryPager';
    var btnArray = {};
    var thArray  = Array(
            '<?php echo $translations["M02015"][$language]; /* Date */?>',            
            '<?php echo $translations["M01625"][$language]; /* Transaction Hash */?>', 
            '<?php echo $translations["M02014"][$language]; /* Payment ID */?>', 
            '<?php echo $translations["M01887"][$language]; /* Amount */?>'
        );

    $(document).ready(function() {

        searchTab = "Request Fund";
        status = "success";

        $('#paymentNext').attr('href', '/qrPayment.php?transaction_token='+getToken);
        // $("#paymentNext").click(function() {
        //  console.log(getToken);
        //  $.redirect('qrPayment.php', {
        //      transaction_token: getToken
        //  });
        // });

        if('<?php echo $_POST['searchData'] ?>' != "") {
            searchCallBack();
        } else{
            // formData  = {
            //     command     : 'getWithdrawalList',
            //     status      : status,
            //     page        : pageNumber
            // };

            // fCallback = loadPaymentDetails;
            // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        formData = {
            command : 'receiptdetailsget',
            transaction_token : getToken
        };
        fCallback = loadReceiptDetails;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    });

    function editBusinessDetails(data, message){
        showMessage(message, 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', 'check-circle-o', '');
    }

    function copyTxt(id) {
        var text = $("#"+id).attr('data-fullTxt');

        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(text).select();
        document.execCommand("copy");
        $temp.remove();

        $("#"+id).find(".inputTick").show();
    }

    function encrypt(w) {
        return w.substring(0, 6)+"..."+w.substr(w.length-6);
    } 
    function dateTimeToDateFormat(dateTimeValue)
    {
        return moment(dateTimeValue).format('lll');
    }

    function loadReceiptDetails(data, message) {
        var tableNo;
        var paymentType = data.data.payment_data_list;
        var paymentTypeCount = Object.keys(paymentType).length;
        var paymentItemList = data.data.payment_data_list.tetherusd;
        var userInform = data.data;
		if (paymentType.length == 0)
        {
            $('#showErrorMsg').show();
            $('#showresultListing').hide();
        }
        else{
            $("#showErrorMsg").hide();
            $("#showresultListing").empty();
            // var newList = [];
            // var tableRowDetails = [];
			var x = "";
			var y = "";
			var i = 0;
	        // var type = Object.keys(paymentType).length;
			var newList = [];
			
            $('#showresultListing').empty();
            $.each(paymentType, function(k, v) {
				var walletType = v['0']['symbol'].bold();
				var walletImage = v['0']['image'];
				var totalAmount = 0;
				var newList = [];
				
                var rebuildData1 = {
                    walletType : k.toUpperCase().bold()
				}
                    // newList.push(rebuildData1);
					x = "transactionHistoryListDiv" + i + "";
					var transactionHistoryTable = "transactionHistoryTable"+i;
					// y = "showresultListing" + i + "";
					i = i+1;
                $.each(v, function(k,d){

					// var newList = [];
					// var tableRowDetails = [];
					var transactionHash = '-';
                
					if(d['transaction_hash'] != '-' && d['transaction_hash'] != null){
							transactionHash = d['transaction_hash'];
						}
					var rebuildData = {
                        date : dateTimeToDateFormat(d['transaction_date']),
                        transactionHash : transactionHash,
                        paymentId : d['payment_id'],
                        amount : d['amount'] + ' ' + d['symbol']/*  + ' ' + d['image'] */
                        // symbol : d['symbol']

					};
					totalAmount += Number(d['amount']);
					totalAmountSymbol = d['symbol'];
                    newList.push(rebuildData);

                    // var date = dateTimeToDateFormat(d['transaction_date']);
                    // var transactionHash = d['transaction_hash'];
                	// var paymentId = d['payment_id'];
                    // var amount = d['amount'] + ' ' + d['symbol'];
					// var symbol = d['symbol'];
					// var image = d['image'];

							// data = ' <div class="col-12 mt-3 px-0" id=""'+y+'""></div> ';
							data = ' <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded"> ';
							// data += ' <div>hahahahaha</div> ';
							data += ' <div class="table-responsive" id="'+x+'"><div><img src="'+walletImage+'" width="20" height="20">&nbsp<span>'+walletType+' </span></div></div> ';
							data += ' <div class="m-datatable__pager m-datatable--paging-loaded clearfix " style="padding-bottom: 10px"> ';
							data += ' <div class="m-datatable__pager-info"> ';
							data += ' <span class="m-datatable__pager-detail"></span> ';
							data += ' </div> ';
							data += ' </div> ';
							data += ' </div> ';
							data += '<div class="row" style="background-color: #000; color: #fff; font-size: 15px; font-weight: 500; vertical-align:middle"><div style="text-align: left; padding: 30px 0px 25px 20px;" class="col-md-3 col-6">Grand Total</div><div class="offset-md-0 col-md-9 col-6"><div class="totalAmountDiv">'+totalAmount+' '+totalAmountSymbol+'</div></div></div><br><br>'
							// data += '<div class="row" style="background-color: #000; color: #fff; font-size: 15px; font-weight: 500; vertical-align:middle"><div style="text-align: left; padding: 30px 0px 25px 20px;" class="col-md-3 col-6">Grand Total</div><div style="text-align: right; padding: 30px 50px 20px 0px;"  class="offset-md-0 col-md-9 col-6">'+totalAmount+' '+totalAmountSymbol+'</div></div><br><br>'
							// data += '<tr style="background-color: #000; color: #fff; font-size: 15px; font-weight: 500"><td style="padding: 25px">Grand Total</td><td></td><td></td><td style="padding: 25px">'+paymentItemList['amount']+'</td></tr>'
				
                });
					$('#showresultListing').append(data);

			buildTable(newList, transactionHistoryTable, x, thArray, btnArray, message, tableNo);
			});
			
        }
     
        
         $("#payeeName").text(userInform['merchant_name']);
         $("#payeePhone").text(userInform['merchant_phone_number']);
         $("#payeeEmail").text(userInform['merchant_email_address']);


        $('#'+tableId).find('tbody tr').each(function(){
            $(this).addClass("removeBackgorundColor");
        });

        $('#'+tableId).find('thead tr').each(function(){
            $(this).find('th:eq(1)').css('text-align', "left");
            $(this).find('th:eq(2)').css('text-align', "left");
            $(this).find('th:eq(3)').css('text-align', "left");
        });

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find('td:eq(1)').css('text-align', "left");
            $(this).find('td:eq(2)').css('text-align', "left");
            $(this).find('td:eq(3)').css('text-align', "left");
        });
    }

</script>

