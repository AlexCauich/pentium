<?php
    session_start(); 
    if(!isset($_SESSION["email"])) {
        header("location: ../Pentium/login.html");
        exit();
    }
?>
