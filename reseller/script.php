<?php 

    include("include/class.post.php");

    $post = new post();

    $params["business_id"] = "1";

    $result = $post->curl("adminGetUserDetails", $params);

    print_r($result);

?>
