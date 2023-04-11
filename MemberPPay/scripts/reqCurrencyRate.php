<?php

session_start();

include(dirname(__FILE__)."/../include/config.php");
include(dirname(__FILE__)."/../include/class.general.php");
include(dirname(__FILE__)."/../include/class.post.php");

$general = new general();
$language = $general->getLanguage();


$post      = new post();
$command   = $_POST['command'];
$viewType   = $_POST['viewType'];


switch ($command) {
	case 'getLivePrice':
		
		$params = array(
			'currency' => $_POST['currency'],
			'page' => $_POST['page'],
			'page_size' => $_POST['page_size'],
			'order' => $_POST['order'],
			'sort_column' => $_POST['sort_column']
		);

		$result = $post->curl_post("/xun/cryptocurrency/price/list", $params);
		// print_r($result);
		echo $result;

	break;

}

?>