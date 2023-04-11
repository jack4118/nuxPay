<?php
    $password = $_GET['password'];
    // echo $password;
    if ($password=="Hz@12345") {
        session_start();
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
        echo "<br>";
        echo "<pre>";
        print_r($_COOKIE);
        echo "</pre>";
    }
?>