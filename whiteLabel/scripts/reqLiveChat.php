<?php
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept,Content-Type, Authorization, X-Requested-With,Access-Control-Allow-Methods,Access-Control-Allow-Origin');

header('Access-Control-Allow-Origin: *');


    /**
     * @author ttwoweb.
     * This file is contains the Webservices for messageAssigned Listing.
     *
    **/
    session_start();
    // echo "????";

    include(dirname(__FILE__)."/../include/config.php");
    // include($_SERVER["DOCUMENT_ROOT"]."/language/lang_all.php");
    include(dirname(__FILE__)."/../include/class.general.php");
    include(dirname(__FILE__)."/../include/class.post.php");
    // include($_SERVER["DOCUMENT_ROOT"]."/include/class.globalSettings.php");

    $general = new general();
    $language = $general->getLanguage();


    $post      = new post();
    $command   = $_POST['command'];
    $viewType   = $_POST['viewType'];

    //echo $sys['domain']."/livechat.php?id=".$_POST["id"];
    echo json_encode(["data"=>file_get_contents($sys['domain']."/livechat.php?id=".$_POST["id"])]);
    
?>
