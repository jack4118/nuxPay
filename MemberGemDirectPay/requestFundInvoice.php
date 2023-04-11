<?php include 'include/config.php'; ?>
<?php include 'headLogin.php'; ?>


<body>
    <div class="col-12">
        <div class="row requestFundFullWrapper">
            <?php include 'requestFundSide.php'; ?>
            <div class="col-md-8 requestFundRight">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-10">
                                <span class="requestRightTitle">Request fund from your customer</span>
                                <div class="d-block mt-1">
                                    <div class="stepProgress">
                                        <span class="active"></span>
                                        <span class="active"></span>
                                        <span class="active"></span>
                                    </div>
                                    <span class="d-inline-block ml-2" style="vertical-align: middle;">
                                        Success
                                    </span>
                                </div>

                                <div class="d-block mt-5 ">
                                    <div class="requestPaymentLink">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <img class="paymentIcon" src="images/nuxPay/paymentIcon.png" alt="" width="100%">
                                            </div>
                                            <div class="col-lg-9">
                                                <span class="d-block">The request has been created and sent to the payer successfully.</span>
                                                <div class="d-flex align-items-end">
                                                    <input id="urlInput" type="text" class="form-control requestInput rounded-0" value="<?php echo $_POST['url']; ?>" readonly>
                                                    <button id="copyBtn" class="btn btnRequest col rounded-0"><i class="fa fa-copy"></i> Copy</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="d-flex">
                                        <a href="javascript:;" class="btn btn-media facebook"><i class="fa fa-facebook"></i></a>
                                        <a href="javascript:;" class="btn btn-media whatsapp"><i class="fa fa-whatsapp"></i></a>
                                        <a href="javascript:;" class="btn btn-media telegram"><i class="fa fa-telegram"></i></a>
                                        <a href="javascript:;" class="btn btn-media wechat"><i class="fa fa-wechat"></i></a>
                                    </div> -->
                                </div>

                                <div class="d-block mt-5">
                                    <div><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 451.15 12.94"><defs><style>.cls-1{fill:none;stroke:#e8e8e8;stroke-miterlimit:10;stroke-width:2px;}</style></defs><title>Untitled-1</title><polyline class="cls-1" points="450.57 11.72 435.57 1.22 420.57 11.72 405.57 1.22 390.57 11.72 375.57 1.22 360.57 11.72 345.57 1.22 330.57 11.72 315.57 1.22 300.57 11.72 285.57 1.22 270.57 11.72 255.57 1.22 240.57 11.72 225.57 1.22 210.57 11.72 195.57 1.22 180.57 11.72 165.57 1.22 150.57 11.72 135.57 1.22 120.57 11.72 105.57 1.22 90.57 11.72 75.57 1.22 60.57 11.72 45.57 1.22 30.57 11.72 15.57 1.22 0.57 11.72"/></svg> </div>

                                    <div class="requestConfirmationInvoice">

                                        <div class="d-block requestDetailSuccess">
                                            <table>
                                                <tr><th>Your Name:</th><td><?php echo $_POST['payeeName']; ?></td></tr>
                                                <tr><th>Your Email:</th><td><?php echo $_POST['payeeEmail']; ?></td></tr>
                                                <tr><th>Your Mobile Phone:</th><td><?php echo $_POST['payeeDialingArea']; ?><?php echo $_POST['payeeMobileNumber']; ?></td></tr>
                                            </table>
                                        </div>

                                        <div class="d-block mt-4 requestDetailSuccess">
                                            <table>
                                                <tr><th>Payer Name:</th><td><?php echo $_POST['payerName']; ?></td></tr>
                                                <tr><th>Payer Email:</th><td><?php echo $_POST['payerEmail']; ?></td></tr>
                                                <tr><th>Payer Mobile Phone:</th><td><?php echo $_POST['payerCountryCode']; ?><?php echo $_POST['payerMobileNumber']; ?></td></tr>
                                            </table>
                                        </div>

                                        <div class="d-block mt-4 requestDetailSuccess">
                                            <table>
                                                <tr><th>Amount to Pay:</th><td><?php echo $_POST['amount']; ?> USDT</td></tr>
                                                <tr><th>Payment Description:</th><td class="wrapText"><?php echo $_POST['paymentDescription']; ?></td></tr>
                                            </table>
                                        </div>
                                    </div>

                                    
                                </div>

                                <div class="d-block mt-3">
                                    <a href="requestFund.php" class="btn btnRequest">New Request</a>
                                </div>

                                <div class="d-block mt-2 text-center">
                                    <span>Manage your fund? <a href="login.php?type=loginPage">Login Here</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php include 'sharejsDashboard.php'; ?>

<script src="js/general.js"></script>
<script>

    $("#urlInput").click(function(){
        $("#copyBtn").click();
    });

    $("#copyBtn").click(function(){
        var text = $("#urlInput").val();

        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(text).select();
        document.execCommand("copy");
        $temp.remove();
        // $("#inputTick").show();
        swal.fire({
			position:"center",
			type:"success",
			title:"Copied to clipboard",
			showConfirmButton:!1,
			timer:1500
		})
    });

    if (history.pushState) {
		//Chrome and modern browsers
		history.pushState(null, document.title, location.href);
		window.addEventListener('popstate', function (event) {
			$.redirect('requestFund.php');
		});
	}
</script>

</body>


</html>
