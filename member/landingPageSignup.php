<?php
    session_start();

    include("include/class.general.php");
	include("language/lang_all.php");

	$language = General::getLanguage();
	$languages = $sys['languages'];

    include("include/config.php");

  	$currentDomain = $_SERVER['HTTP_HOST'];;

  	include 'storeAds.php';
  	
  	$currentPage = basename($_SERVER['PHP_SELF']);
  	$currentURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  //   switch ($currentPage) {
  //   	default:
		// 	$sys['title'] = "NuxPay - Your Way To Enhanced Payment Experience";
		// 	$sys['metaDesc'] = "A FinTech expertise that knew well about the needs of new generation. NuxPay is for you if you’re looking for an incredibly reliable and responsive payment solution provider.  153 countries, and still spreading across the global immensely with its high end accessibility.";
		// 	$sys['metaKeywords'] = "";
		// break;
  //   }

    $version = "1.1.5";

?>

<!DOCTYPE html>

<html lang="en" class="headHomepage">

<head>
	
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
		<meta property="og:image" content="<?php echo $sys['domain'].'/images/icon270New.png'; ?>">
		<meta property="og:image:secure_url" content="<?php echo $sys['domain'].'/images/icon270New.png'; ?>">
		<meta property="og:title" content="<?php echo $sys['title']; ?>">
		<meta property="og:description" content="<?php echo $sys['metaDesc']; ?>">
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="NuxPay">

		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@NuxPay" />
		<meta name="twitter:creator" content="@NuxPay" />

	<?php } ?>

	<link rel="shortcut icon" href="<?php echo $sys['favicon']; ?>">

	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $sys['GATrackingID']; ?>"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '<?php echo $sys['GATrackingID']; ?>');
	</script>
	<link href="css/vendors.css?vs=<?php echo $version; ?>" rel="stylesheet" type="text/css" />
	<link href="css/main.css?vs=<?php echo $version; ?>" rel="stylesheet" type="text/css" />

	<link href="css/_osfont.scss">

	<link href="css/theme.css?ts=<?php echo filemtime('css/theme.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="css/aos.css?vs=<?php echo filemtime('css/aos.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="css/customDashboard.css?ts=<?php echo filemtime('css/customDashboard.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="css/customHomepage.css?ts=<?php echo filemtime('css/customHomepage.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo $sys['customCSSPath'];?>?ts=<?php echo filemtime($sys['customCSSPath']); ?>" rel="stylesheet" type="text/css" />

	<div id="canvasLoader" class="hide">
		<div id="canvasLoaderContainer">
			<div>
				<i class="fa fa-spinner fa-spin fa-5x" style="font-size: 50px"></i>
			</div>
		</div>
	</div>


	<!-- <div class="modal fade systemMsg" id="canvasMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
	</div> -->

</head>
