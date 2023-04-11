<?php
    /**
     * @author TtwoWeb Sdn Bhd.
     * This file is contains the functions related to Admin user.
     * Date  19/05/2018.
    **/
    session_start();
// echo "????";

include(dirname(__FILE__)."/../include/config.php");
// include($_SERVER["DOCUMENT_ROOT"]."/language/lang_all.php");
include(dirname(__FILE__)."/../include/class.general.php");
include(dirname(__FILE__)."/../include/class.post.php");
// include($_SERVER["DOCUMENT_ROOT"]."/include/class.globalSettings.php");
    
    $post = new post();
    $general = new general();

    $command = $_POST['command'];

    $username   = $_SESSION['username'];
    $userId     = $_SESSION['userID'];
    $sessionID  = $_SESSION['sessionID'];

    if($_POST['type'] == 'logout'){
        session_destroy();
    }
    else{
        switch($command) {
            
           case "memberForgotPassword";

            $params = array(
                'emailMobile' => $_POST['emailMobile']
            );
            // print_r($params);
            $result = $post->curl_post_pass("/xun/web/pay/forgotpassword", $params);
                    // print_r($result);

        // $result = json_decode($result,true);

        // $result = json_encode($result);
        echo $result;
        break;


        case "resendEmail";

            $params = array(
          'business_email' => $_POST['business_email']
          );
            // print_r($params);
        $result = $post->curl_post_pass("/xun/business/register/resend-email", $params);
                    // print_r($result);

        // $result = json_decode($result,true);

        // $result = json_encode($result);
        echo $result;
        break;

    }
}

?>
