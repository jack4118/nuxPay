<?php 
$domain = "$_SERVER[REQUEST_SCHEME]://$_SERVER[HTTP_HOST]";
header("Location:".$domain); 
?>