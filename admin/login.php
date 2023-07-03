<?php include('../config/constraints.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Login</title>
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br/>
        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['not-logged-in']))
        {
            echo $_SESSION['not-logged-in'];
            unset($_SESSION['not-logged-in']);
        }
        ?>
        <br/>
        <!-- login form starts here -->
        <form action="" method="post" class="text-center">
            <h5>Username</h5>
            <input type="text" name="username" placeholder="Enter Username"/>
            <br/>
            <br/>
            <h5>Password</h5>
            <input type="password" name="password" placeholder="Enter Password"/>
            <br/>
            <br/>
            <input type="submit" name="submit" value="login" class="btn primary"/>
        </form>
        <br/>
        <br/>
        <!-- login form ends here -->
        <p class="text-center">Create by <a href="https://github.com/Valerieclaire96" target="_blank">Valerie Dubach</a></p>
    </div>
</body>
</html>

<?php

// check if submit button has been clicked
if(isset($_POST['submit']))
{
    // process the form
    // get the data from login form
    $username = $_POST['username'];
    $password = md5($_POST['password']); //Password Encryption with MD5

    // sql to check if the user with username and password exist
    $sql = "SELECT * FROM tbl_admin
    WHERE username = '$username' 
    AND password = '$password'
    ";

    // execute the query
    $res = mysqli_query($conn, $sql);

    // count row to check if the user exist or not
    $count = mysqli_num_rows($res); // Function to get all the rows in database

    if($count == 1)
    {
        // user available and login was successful
        $_SESSION['login'] = "<div class='success'>Login Successful</div>";
        $_SESSION['user'] = $username; //to check if user is logged in or not

        // direct user to dashboard
        header("location:".SITEURL."admin");
    }
    else
    {
        // user not available and login failed
        $_SESSION['login'] = "<div class='error'>Username or Password did not match</div>";
        header("location:".SITEURL."admin/login.php");


    };
};

?>