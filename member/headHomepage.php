<?php
session_start();

include("include/class.general.php");
include("language/lang_all.php");

$language = General::getLanguage();
$languages = $sys['languages'];

include("include/config.php");

include 'storeAds.php';

$currentDomain = $_SERVER['HTTP_HOST'];;

if (strpos($httpHost, 'nuxpay.com') !== false) {
    //nuxpay.com
    $dashboardLogo = $sys['dashboardLogo'];
} else if (strpos($httpHost, 'nuxpay.co') !== false) {
    //nuxpay.co
    $dashboardLogo = $sys['dashboardLogoNuxpayCo'];
} else if (strpos($httpHost, 'nuxpay.net') !== false) {
    //nuxpay.net
    $dashboardLogo = $sys['dashboardLogoNuxpayNet'];
} else if (strpos($httpHost, 'nuxpay.io') !== false) {
    //nuxpay.io
    $dashboardLogo = $sys['dashboardLogoNuxpayIo'];
} else {
    //default
    $dashboardLogo = $sys['dashboardLogo'];
}

// switch ($currentPage) {
	
// 	default:
// 		$sys['title'] = "NuxPay - No.1 Crypto Payment Solution";
// 		$sys['metaDesc'] = "A FinTech expertise that knew well about the needs of new generation. NuxPay is for you if you’re looking for an incredibly reliable and responsive payment solution provider.  153 countries, and still spreading across the global immensely with its high end accessibility.";
// 		$sys['metaKeywords'] = "";
// 	break;

// }

$version = "1.1.5"

?>

<!DOCTYPE html>

<html lang="en" class="headHomepage">

<!-- begin::Head -->
<head>
	<title>NuxPay - Send and Receive USDT like Paypal</title>
	<?php if ($currentDomain=="dev.xun.global") { ?>
		<meta name="robots" content="noindex, nofollow">
	<?php } ?>

	<?php if ($currentDomain=="xun.global") { ?>
		<meta name="robots" content="noindex, nofollow">
	<?php }else{ ?>
		<meta charset="utf-8" />
		<title><?php echo $sys['title']; ?></title>
		<meta name="description" content="<?php echo $sys['metaDesc']; ?>">
		<meta name="keywords" content="<?php echo $sys['metaKeywords']; ?>">
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php } ?>

	<?php if ($currentPage=='blog.php' || $currentPage=='news.php') { ?>
		<meta property="og:url" content="<?php echo $currentURL; ?>">

		<?php if ($currentPage=='news.php') { ?>
			<meta property="og:image" content="<?php echo $resultBlogD['data']['media_url']; ?>">
			<meta property="og:image:secure_url" content="<?php echo $resultBlogD['data']['media_url']; ?>">
		<?php }else{ ?>
			<meta property="og:image" content="<?php echo $resultBlogD['data']['article_content']['media_url']; ?>">
			<meta property="og:image:secure_url" content="<?php echo $resultBlogD['data']['article_content']['media_url']; ?>">
		<?php } ?>

		<meta property="og:image:width" content="1200">
		<meta property="og:image:height" content="627">
		<meta property="og:title" content="<?php echo $sys['title']; ?>">
		<meta property="og:description" content="<?php echo $sys['metaDesc']; ?>">
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="NuxPay">

		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@NuxPay" />
		<meta name="twitter:creator" content="@NuxPay" />
	<?php }else{ ?>
		<meta property="og:url" content="<?php echo $currentURL; ?>">
		<meta property="og:image" content="<?php echo 'https://nuxpay.com/images/nuxPay270.png'; ?>">
		<meta property="og:image:secure_url" content="<?php echo 'https://nuxpay.com/images/nuxPay270.png'; ?>">
		<meta property="og:title" content="<?php echo $sys['title']; ?>">
		<meta property="og:description" content="<?php echo $sys['metaDesc']; ?>">
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="NuxPay">

		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@NuxPay" />
		<meta name="twitter:creator" content="@NuxPay" />

	<?php } ?>

	<link rel="shortcut icon" href="<?php echo $sys['favicon']; ?>">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $sys['GATrackingID']; ?>"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '<?php echo $sys['GATrackingID']; ?>');
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PKV5MVD');</script>
	<!-- End Google Tag Manager -->

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PKV5MVD"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<!--begin::Base Styles -->
	<link href="<?php echo $config['domain']?>/css/vendors.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $config['domain']?>/css/mainHomepage.min.css" rel="stylesheet" type="text/css" />
	
	<style>
	body, html{
/*		overflow-x : hidden;
		overflow-y : scroll;*/
	}
	</style>
	
	<!-- <link href="css/main.css?vs=<?php echo $version; ?>" rel="stylesheet" type="text/css" /> -->
	<!--end::Base Styles -->

	<!--begin::LiveChat Styles -->
	<link href="<?php echo $config['domain']?>/css/_osfont.scss">
	<!--end::LiveChat Styles -->

	<!--begin::Custom Styles -->
	<link href="<?php echo $config['domain']?>/css/customHomepage.css?ts=<?php echo filemtime('css/customHomepage.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo $config['domain']?>/css/theme.css?ts=<?php echo filemtime('css/theme.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo $config['domain']?>/css/aos.css?vs=<?php echo $version; ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo $config['domain']?>/css/dropify.css" rel="stylesheet">
	<link href="<?php echo $config['domain']?>/css/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $sys['customCSSPath'];?>?ts=<?php echo filemtime($sys['customCSSPath']); ?>" rel="stylesheet" type="text/css" />

	<!--end::Custom Styles -->

	<div id="canvasLoader" class="hide">
		<div id="canvasLoaderContainer">
			<div>
				<i class="fa fa-spinner fa-spin fa-5x" style="font-size: 50px"></i>
			</div>
		</div>
	</div>


	<div class="modal fade systemMsg" id="canvasMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header text-center pb-3">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body text-center py-0">
					<div id="canvasAlertIcon" class=""></div>
					<div class="modal-title my-2" id="exampleModalLabel" style="font-size:17px"></div>
					<div id="canvasAlertMessage" class="f-14"></div>
				</div>
				<div id="canvasFooter" class="modal-footer text-center">
					<a id="canvasCloseBtn" class="waves-effect waves-light btn m-btn--pill m-btn--air  btn-outline-secondary btn-sm m-btn m-btn--custom theme-button" style="color:#000;" data-dismiss="modal" role="button"><?php echo $translations["M01246"][$language]; /* Close */ ?></a>
				</div>
			</div>
		</div>
	</div>

	<!-- Facebook Pixel Code -->

	<script>

		!function(f,b,e,v,n,t,s)

		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?

			n.callMethod.apply(n,arguments):n.queue.push(arguments)};

			if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';

			n.queue=[];t=b.createElement(e);t.async=!0;

			t.src=v;s=b.getElementsByTagName(e)[0];

			s.parentNode.insertBefore(t,s)}(window,document,'script',

				'https://connect.facebook.net/en_US/fbevents.js');


			fbq('init', '2575470422684460'); 

			fbq('track', 'PageView');

		</script>

		<noscript>

			<img height="1" width="1" 

			src="https://www.facebook.com/tr?id=2575470422684460&ev=PageView

			&noscript=1"/>

		</noscript>

		<!-- End Facebook Pixel Code -->
	</head>
	<!-- end::Head -->
