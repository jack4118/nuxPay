<?php include 'include/config.php'; ?>

<?php
session_start();
if((isset($_POST['access_token']) && $_POST['access_token'] != "")) {
		$_SESSION["access_token"] = $_POST['access_token'];
		$_SESSION["business"]["uuid"] = $_POST['businessID'];
    $_SESSION["sessionLoginTime"] = $_POST['sessionLoginTime'];
}

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
                    <div class="col-xl-12">

                        <div class="m-portlet m-portlet--tab">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon m--hide">
                                            <i class="la la-gear"></i>
                                        </span>
                                        <h1 class="m-portlet__head-text" style="font-size:15pt;">
                                            <?php echo $translations["M00311"][$language]; /* Active CryptoCurrencies  */ ?>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">

                                <div class="m-widget4">
                                    <div id="walletDIV" class="row mx-0">

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
            command: 'getWalletData'
        };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


    });

    function getWalletType(data,message){

        var walletType = data.result.wallets;
        var wallet ='';
        var countActive = 0;

        if (!walletType) {
            showMessage('<?php echo $translations["M00309"][$language]; /* An internal error has occurred. Please contact to our support team. */ ?> ', 'danger', '<?php echo $translations["M01194"][$language]; /* Failed */ ?>', 'times-circle-o', 'dashboard.php');
        }

        $.each(walletType,function(k,v){
            var displayName = v["type"];

            displayName = displayName.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                return letter.toUpperCase();
            });

            countActive += v['status'];

            if (v["status"]=="1") {
                wallet = '<div class="col-md-6 px-0 mt-2">';
                wallet += '    <div class="m-widget4__item mx-1 px-2" style="background-color: #f7f7f7;border-radius: 10px;">';
                wallet += '        <div class="m-widget4__ext">';
                wallet += '            <img src="images/cryptocurrencies/'+v["type"]+'.svg" width="35">';
                wallet += '        </div>';
                wallet += '        <div class="m-widget4__info">';
                wallet += '            <span class="m-widget4__title">';
                wallet += '                '+displayName+'';
                wallet += '            </span> ';
                wallet += '        </div>';
                wallet += '        <span class="m-widget4__ext">';
                wallet += '            <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">';
                wallet += '                <a href="javascript:void(0);" class="m-portlet__nav-link m-dropdown__toggle btn m-btn m-btn--link">';
                wallet += '                    <i class="la la-ellipsis-v"></i>';
                wallet += '                </a>';
                wallet += '                <div class="m-dropdown__wrapper">';
                wallet += '                    <span class="m-dropdown--small m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>';
                wallet += '                    <div class="m-dropdown__inner">';
                wallet += '                        <div class="m-dropdown__body">              ';
                wallet += '                            <div class="m-dropdown__content">';
                wallet += '                                <ul class="m-nav">';
                wallet += '                                    <li class="m-nav__item">';
                wallet += '                                        <a href=\'javascript:$.redirect("paymentGatewayAddressList.php",{displayName:"'+displayName+'",walletType:"'+v["type"]+'"});\' class="m-nav__link">';
                wallet += '                                            <span class="m-nav__link-text"><?php echo $translations["M00314"][$language]; /* Address Listing */ ?></span>';
                wallet += '                                        </a>';
                wallet += '                                    </li>';
                wallet += '                                    <li class="m-nav__item">';
                wallet += '                                        <a href=\'javascript:$.redirect("paymentGatewayTransaction.php",{displayName:"'+displayName+'",walletType:"'+v["type"]+'"});\' class="m-nav__link">';
                wallet += '                                            <span class="m-nav__link-text"><?php echo $translations["M00315"][$language]; /* Transaction History */ ?></span>';
                wallet += '                                        </a>';
                wallet += '                                    </li>';
                wallet += '                                    <li class="m-nav__item">';
                wallet += '                                        <a href=\'javascript:$.redirect("paymentGatewaySettings.php",{walletType:"'+v["type"]+'"});\' class="m-nav__link">';
                wallet += '                                            <span class="m-nav__link-text"><?php echo $translations["M00316"][$language]; /* Destination Address */ ?></span>';
                wallet += '                                        </a>';
                wallet += '                                    </li>';
                wallet += '                                </ul>';
                wallet += '                            </div>';
                wallet += '                        </div>';
                wallet += '                    </div>';
                wallet += '                </div>';
                wallet += '            </div>';
                wallet += '        </span> ';
                wallet += '    </div>';
                wallet += '</div>';

            $('#walletDIV').append(wallet);
            }
        });

        if (countActive==0) {
            showMessage('<?php echo $translations["M00317"][$language]; /* Please active your cryptocurrencies. */ ?>', 'danger', '<?php echo $translations["M01194"][$language]; /* Failed */ ?>', 'times-circle-o', 'paymentGatewaySettings.php');
        }

    }

</script>
