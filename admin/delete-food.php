
<?php
            include('../config/constraints.php'); 
            // 1. get the id of the admin to be deleted
            $id = $_GET['id'];

            // creat sql query to get the details
            $sql = "DELETE FROM tbl_food WHERE id=$id";
            
            // Execute the Query
            $res = mysqli_query($conn, $sql) or die(mysqli_error());

            // Check whethere the query executed successfully or not
            if($res == true)
            {
                // query executed successfully and admin was deleted
                // create session varibale to display message
                $_SESSION['delete'] = "<div class='success'>Food was Deleted Successfully</div>";
                // redirect to manage admin
                header('location:'.SITEURL.'/admin/manage-food.php');
            }
            else
            {
                // failed to delete admin
                $_SESSION['delete'] = "<div class='error'>Failed to Delete Food. Try again later.</div>";
                header('location:'.SITEURL.'/admin/manage-food.php');
            }

    // 3. redirect the manager admin page with message (success/error)
    ?>