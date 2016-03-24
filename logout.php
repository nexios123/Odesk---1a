<?php
    include_once 'session.php';
    
    //uničimo sejo
    session_destroy();
    
    //preusmerimo na login
    header("Location:login.php");
?>
