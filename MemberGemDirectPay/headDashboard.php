<?php
session_start();

include("include/class.general.php");
include("language/lang_all.php");

// Get the current selected language
$language = General::getLanguage();
$languages = $sys['languages'];

include("include/config.php");

$currentDomain = $_SERVER['HTTP_HOST'];;
$currentPage = basename($_SERVER['PHP_SELF']);
$currentURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

switch ($currentPage) {
	default:
		//$sys['title'] = "NuxPay - No.1 Crypto Payment Solution";
		//$sys['metaDesc'] = "A FinTech expertise that knew well about the needs of new generation. NuxPay is for you if you’re looking for an incredibly reliable and responsive payment solution provider.  153 countries, and still spreading across the global immensely with its high end accessibility.";
		$sys['metaKeywords'] = "";
	break;
}
    
$version = "1.1.4"

?>

<!DOCTYPE html>

<html lang="en" class="afterLogin themeTheNux">

<!-- begin::Head -->
<head>

	<?php if ($currentDomain=="xun.global") { ?>
		<meta name="robots" content="noindex, nofollow">
	<?php }else{ ?>
		<meta charset="utf-8" />

		<title><?php echo $sys["title"]; ?></title>
		<meta name="description" content="<?php echo $sys['metaDesc']; ?>">
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php } ?>

	<link rel="shortcut icon" href="images/favicon.png?vs=<?php echo $version; ?>">
	
	<meta property="og:title" content="<?php echo $sys["title"]; ?>">
	<meta property="og:description" content="<?php echo $sys['metaDesc']; ?>">
	<meta property="og:image" content="images/favicon.png?vs=<?php echo $version; ?>">
	
	<!-- Global Site Tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127173819-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-127173819-1');
	</script>
	<!-- end::Global Site Tag (gtag.js) - Google Analytics -->


	<!--begin::Base Styles -->
	<link href="css/vendors.css?vs=<?php echo $version; ?>" rel="stylesheet" type="text/css" />
	<link href="css/main.css?vs=<?php echo $version; ?>" rel="stylesheet" type="text/css" />
	<!--end::Base Styles -->

	<!--begin::LiveChat Styles -->
	<link href="css/_osfont.scss">
	<!--end::LiveChat Styles -->

	<!--begin::Custom Styles -->
	<link href="css/customDashboard.css?ts=<?php echo filemtime('css/customDashboard.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="css/theme.css?ts=<?php echo filemtime('css/theme.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="css/aos.css?vs=<?php echo $version; ?>" rel="stylesheet" type="text/css" />
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
					<a id="canvasCloseBtn" class="waves-effect waves-light btn m-btn--pill m-btn--air  btn-outline-secondary btn-sm m-btn m-btn--custom theme-button" style="color:#000;" data-dismiss="modal" role="button">Close</a>
				</div>
			</div>
		</div>
	</div>

</head>
    <!-- end::Head -->
