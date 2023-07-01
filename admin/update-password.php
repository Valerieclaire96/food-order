<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website - Home Page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <?php include('partials/menu.php')?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Change Password</h1>

            <br />
            <?php
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                }
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Current Password: </td>
                        <td>
                            <input type="password" name="current_password" placeholder="Enter your password"/>
                        </td>
                    </tr>
                    <tr>
                        <td>New Password: </td>
                        <td>
                            <input type="password" name="new_password" placeholder="Enter your password"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Confrim Password: </td>
                        <td>
                            <input type="password" name="confirm_password" placeholder="Re-enter your password"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                           <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                            <input type="submit" name="submit" value="Change Password" class="btn secondary" />
                        </td>
                    </tr>
                </table>
            </form>

        </div>
    </div>
    <!-- Main Content Section Ends -->

    <?php
        // Check wheter the submit button is clicked or not
        if(isset($_POST['submit']))
        {
            //echo "Button CLicked";
            //Get all the values from form to update
            $id = $_POST['id'];
            $current_password = md5($_POST['current_password']); //Password Encryption with MD5
            $new_password = md5($_POST['new_password']); //Password Encryption with MD5
            $confirm_password = md5($_POST['confirm_password']); //Password Encryption with MD5

            
            // create a sql query to update the admin
            $sql = "SELECT *
            FROM tbl_admin  
            WHERE id = '$id' AND
            password = '$current_password'
            ";

            // execute the sql query
            $res = mysqli_query($conn, $sql);
            // check if the query executed successfully
            if($res == true)
            {
                $count=mysqli_num_rows($res);
                if($count == 1){

                        // user exist and pass can be changed
                        // check if the new password and the confirm match
                        if($new_password == $confirm_password){

                            $sql2 = 
                            "UPDATE tbl_admin 
                            SET password = '$new_password' 
                            WHERE id = '$id'
                            ";

                            $res2 = mysqli_query($conn, $sql2);

                            if($res2 == true)
                            {
                                // display Success message
                                $_SESSION['pw-changed'] = "<div class='success'>Password was Updated Successfully</div>";
                                header('location:'.SITEURL.'/admin/manage-admin.php');
                            }
                            else
                            {
                                // display Error message
                                $_SESSION['pw-changed'] = "<div class='success'>Password was not Updated Successfully</div>";
                                header('location:'.SITEURL.'/admin/manage-admin.php');
                            }
                            
                    
                        }
                        else
                        {
                            $_SESSION['pws-dont-match'] = "<div class='error'>Password and Conformation Password do not Match.</div>";
                            header('location:'.SITEURL.'/admin/manage-admin.php');
                        }
                }
              
            }
            else
            {
                $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
                header('location:'.SITEURL.'/admin/manage-admin.php');
            }
        };
    ?>

    <?php include('partials/footer.php'); ?>
</body>

</html>