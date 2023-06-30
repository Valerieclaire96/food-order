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
            <h1>Update Admin</h1>

            <br />
            <?php
    // 1. get the id of the admin to be updated
                $id = $_GET['id'];

                // creat sql query to get the details
                $sql = "SELECT * FROM tbl_admin WHERE id=$id";
                
                // Execute the Query
                $res = mysqli_query($conn, $sql) or die(mysqli_error());

                // Check whethere the query executed successfully or not
                if($res == true)
                {
                    // check whether the data is available or not
                    $count = mysqli_num_rows($res);
                    // check if there is data
                    if($count == 1)
                    {
                        //get the details
                        $row = mysqli_fetch_assoc($res);

                        $full_name = $row['full_name'];
                        $username = $row['username'];
                    }
                    else{
                        //redirect to manage admin page
                        header('location:'.SITEURL.'/admin/manage-admin.php');
                        
                    };
                    
            }
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name: </td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $full_name; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username" value="<?php echo $username; ?>" />
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>Password: </td>
                        <td>
                            <input type="password" name="password" placeholder="Enter your password"/>
                        </td>
                    </tr> -->
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Admin" class="btn secondary" />
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
            $full_name = $_POST['full_name'];
            $username = $_POST['username'];

            // create a sql query to update the admin
            $sql = "UPDATE tbl_admin SET 
            full_name = '$full_name',
            username = '$username'
            WHERE id = '$id'
            ";

            // execute the sql query
            $res = mysqli_query($conn, $sql);
            // check if the query executed successfully
            if($res == true)
            {
                // query executed successfully and admin updated            
                $_SESSION['update'] = "<div class='success'>Admin was Updated Successfully</div>";
                header('location:'.SITEURL.'/admin/manage-admin.php');
            }
            else{
                $_SESSION['update'] = "<div class='error'>Failed to Update Admin. Try again later.</div>";
                header('location:'.SITEURL.'/admin/manage-admin.php');
            }
        };
    ?>

    <?php include('partials/footer.php'); ?>
</body>

</html>