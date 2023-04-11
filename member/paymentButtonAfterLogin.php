<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">
                <div class="d-flex align-items-center">
                    <div class="col-12">
                        <h3>
                            Payment button Integration
                        </h3>
                    </div>
                </div>
            </div>



			<div class="m-content">

                            <section class="paymentSection02BG">
                                <div class="kt-container">
                                    <div class="row">

                                        <div class="col-12">
                                            <b class="doc-title" style="color: #262626;">Paste this in your website</b>
                                        </div>


                                        <div class="col-12">
                                            <div class="row align-items-center">
                                                <div class="col-md-9">
                                                    <pre class="code-box prettyprint" style="white-space: pre;">
                                                        <code class="code-bg" id="paymentBtnCode">
&lt;form action="https://bitpay.com/checkout" method="post"&gt;
    &lt;input type="hidden" name="action" value="checkout" /&gt;
    &lt;input type="hidden" name="posData" value="" /&gt;
    &lt;input type="hidden" name="data" value="DZuepjNjizsiu18ZEiceQ9h5e3rDOpBqCw1Rr4BYdixN9ahjWKcSmvvEcBwfHxphL2eqGKHlExmrqgP2K0eOGuW6GpWW0tBUBAKVYbpn6OddsjhHZxJFiy3oljUm5RwqoXV3mO/X6QPCL+GdWHjwfg==" /&gt;
    &lt;input type="image" src="https://bitpay.com/cdn/en_US/bp-btn-pay-currencies.svg" name="submit" style="width: 146px;" alt="BitPay, the easy way to pay with bitcoins."&gt;
&lt;/form&gt;
                                                        </code>
                                                    </pre>
                                                </div>

                                                <div class="col-md-3">
                                                    <div><b>Preview</b></div>
                                                    <img src="images/nuxPay/paymentBtn.svg" width="200px;">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <button id="copyBtn" class="btn btnDefault" style="font-size: 15px;">
                                                <i class="fa fa-copy"></i> <span>Copy Code</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                
			</div>

			</div>

		</div>
	<?php include 'footerDashboard.php'; ?>
</div>


<?php include 'sharejsDashboard.php'; ?>

</body>
</html>

<script src="js/run_prettify.js"></script>

<script type="text/javascript">
    $("#copyBtn").click(function(){
        var text = $("#paymentBtnCode").text();

        var $temp = $("<textarea></textarea>").css('white-space', 'pre-wrap');
        $("body").append($temp);
        $temp.val(text).select();
        document.execCommand("copy");
        $temp.remove();

        swal.fire({
            position:"center",
            type:"success",
            title:"<?php echo $translations["M00137"][$language]; /* Copied to clipboard  */?>",
            showConfirmButton:!1,
            timer:1500
        })
    });
</script>

