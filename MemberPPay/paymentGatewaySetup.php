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

              
      <div class="m-content">
        
        <div class="row">
          <div class="col-xl-12">
           
            <div class="m-portlet m-portlet--tab">
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide">
                      <i class="la la-gear"></i>
                    </span>
                    <h1 class="m-portlet__head-text" style="font-size:15pt;">
                      <?php echo $translations["M00130"][$language]; /* Payment Gateway */ ?>
                    </h1>
                  </div>
                </div>
              </div>
              <div class="m-portlet__body" align="center">
                <h2 class="customFontColor"><?php echo $translations["M00301"][$language]; /* A */ ?><b> <?php echo $translations["M00302"][$language]; /* Simply */ ?></b> &<b> <?php echo $translations["M00303"][$language]; /* Secure */ ?></b> <?php echo $translations["M00304"][$language]; /* way to accept cryptocurrencies payment from your customers */ ?></h2>

                <div id="coinDIV" class="row mt-5">

                </div>
                <h2 class="customFontColor mt-5"><b><?php echo $translations["M00305"][$language]; /* You haven't setup payment gateway */ ?></b></h2>
                <h6><?php echo $translations["M00306"][$language]; /* Setup now to receive cryptocurrency settlement with  */ ?> <?php echo $sys['companyName'] ?> <?php echo $translations["M00307"][$language]; /* Payment Gateway  */ ?> </h6>

                <a id="setupBtn" href="javascript:;" class="waves-effect waves-light btn m-btn--pill m-btn--air btn-outline-metal btn-sm m-btn m-btn--custom theme-green-button mt-4" style="" role="button"><?php echo $translations["M00308"][$language]; /* Setup now  */ ?> </a>

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
  var url = 'scripts/reqPaymentGateway.php';
  var method = 'POST';
  var debug = 0;
  var bypassBlocking = 0;
  var bypassLoading = 0;

  $(document).ready(function(){

    fCallback = getWalletType;

    formData  = {
      command: 'getWalletType'
    };    
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    $('#setupBtn').click(function(){

      $.redirect("paymentGatewaySettings.php", {firstTime: 1});

    });

  });

  function getWalletType(data,message){
    
    var wallets = data.result.wallet_types;
    var walletActive ='';

    if (!wallets) {
            showMessage('<?php echo $translations["M00309"][$language]; /* An internal error has occured. Please contact to our support team.  */ ?> ', 'danger', '<?php echo $translations["M00310"][$language]; /* Failed  */ ?> ', 'times-circle-o', 'dashboard.php');
    }

    $.each(wallets,function(k,v){
      

      walletActive ='<div class="col col-lg-2 mt-3">';
      walletActive +='  <img src="images/cryptocurrencies/'+v+'.svg" width="50">';
      walletActive +='</div>';
      
      $('#coinDIV').append(walletActive);
    });
  }

</script>