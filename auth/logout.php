<?php
    session_start();
    // Destroy session
    if(session_destroy()) {
        // Redirecting To Home Page

        session_destroy();
        unset($_SESSION['username']);
  
        header("Location: ../login.html");
    }
?>