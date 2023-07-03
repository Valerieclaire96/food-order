<?php
    include('../config/constraints.php');
    // 1. destroy the session 
    session_destroy(); 
    // unsets $_session[user]

    // 2. redirect to the login page
    header("location:".SITEURL."admin/login.php");

?>