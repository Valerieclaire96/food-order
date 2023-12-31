<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <?php include('partials/menu.php')?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Category</h1>

            <br />
            <?php
    // 1. get the id of the admin to be updated
                $id = $_GET['id'];

                // creat sql query to get the details
                $sql = "SELECT * FROM tbl_category WHERE id=$id";
                
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

                        $title = $rows['title'];
                        $image_name = $rows['image_name'];
                        $featured = $rows['featured'];
                        $active = $rows['active'];

                    }
                    else{
                        //redirect to manage admin page
                        header('location:'.SITEURL.'/admin/manage-category.php');
                        
                    };
                    
                }
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" placeholder="<?php echo $title; ?>" value="<?php echo $title; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Image Url: </td>
                        <td>
                            <input type="text" name="image_url" value="<?php echo $image_name; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="Yes"/>Yes
                            <input type="radio" name="featured" value="No"/>No
                        </td>
                    </tr>
                    <tr>
                        <td>Active: </td>
                        <td>
                            <input type="radio" name="active" value="Yes"/>Yes
                            <input type="radio" name="active" value="No"/>No
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Category" class="btn secondary" />
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
            $title = $_POST['title'];
            $image_name = $_POST['image_name'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            // create a sql query to update the admin
            $sql = "UPDATE tbl_category SET 
            title = '$title',
            image_name = '$image_name',
            featured = '$featured',
            active = '$active'
            WHERE id = '$id'
            ";

            // execute the sql query
            $res = mysqli_query($conn, $sql);
            // check if the query executed successfully
            if($res == true)
            {
                // query executed successfully and admin updated            
                $_SESSION['update'] = "<div class='success'>Cateogy was Updated Successfully</div>";
                header('location:'.SITEURL.'/admin/manage-category.php');
            }
            else
            {
                $_SESSION['update'] = "<div class='error'>Failed to Update Cateogy. Try again later.</div>";
                header('location:'.SITEURL.'/admin/manage-category.php');
            }
        };
    ?>

    <?php include('partials/footer.php'); ?>
</body>

</html>