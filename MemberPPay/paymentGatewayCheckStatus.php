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
   
    var url             = 'scripts/reqPaymentGateway.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var page			= "<?php echo $_POST['page']; ?>";

    $(document).ready(function(){
            var formData = {
                command          : 'getDestinationAddress'
            };

            var fCallback      = loadDestinationAddress;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function loadDestinationAddress(data, message) {
        var status = data.result.destination_addresses;

        if (status==null) {
        	$.redirect("paymentGatewaySetup.php");
            $.post("scripts/reqPaymentGatewayStatus.php", {"status": 0});
        }else{
        	if (page) {
        		$.redirect(page,{status: 1});
                $.post("scripts/reqPaymentGatewayStatus.php", {"status": 1});
        	}else{
        		$.redirect("<?php echo $_SESSION['lastVisited']; ?>",{status: 1});
                $.post("scripts/reqPaymentGatewayStatus.php", {"status": 1});
        	}
        	
        }
    }

</script>