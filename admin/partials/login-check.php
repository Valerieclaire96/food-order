<?php 
    // authorization of access control
    // check if user is logged in
    if (!isset(($_SESSION['user']))) //if user session is not set
    {
        $_SESSION['not-logged-in'] = "<div class='error text-center'>Please login to access the Admin Panel</div>";
        // redirect to login
        header("location:".SITEURL."admin/login.php");
    }
?>