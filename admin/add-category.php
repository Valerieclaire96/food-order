<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Add Category</title>
</head>
<body>
<?php include('partials/menu.php');?>
<div class="main-contnet">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br/>
        <?php
            if(isset($_SESSION['add'])) //checing if the session is set or not
            {
                echo $_SESSION['add']; //dispaly the session message if set
                unset($_SESSION['add']); //remove session message
            }
            // if(isset($_SESSION['upload'])) //checing if the session is set or not
            // {
            //     echo $_SESSION['upload']; //dispaly the session message if set
            //     unset($_SESSION['upload']); //remove session message
            // }
        ?> 
        <!-- add category form starts  -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title"/>
                    </td>
                </tr>
                <tr>
                    <td>Provide Image URL: </td>
                    <td>
                        <input type="text" name="image_name"/>
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
                        <input type="submit" name="submit" value="Add Category" class="btn secondary"/>
                    </td>
                </tr>
            </table>
        </form>
        <!-- add category form ends  -->  
        <?php
                // Process value from form and save it in DB
                // Check whether the submit button is clicked or not  
                if(isset($_POST['submit']))
                {
                        //1. Get Data from form
                            //1. Get the Data from form
                    $title = $_POST['title'];
                    $image_name=$_POST['image_name'];

                    // for radio we have to check it the radio buttons have been selected

                    if(isset($_POST['featured']))
                        {
                            // get the value from the form
                            $featured = $_POST['featured'];
                        }
                        else
                        {
                            // set default value
                            $featured = "No";
                        };

                    if(isset($_POST['active']))
                        {
                            // get the value from the form
                            $active = $_POST['active'];
                        }
                        else
                        {
                            // set default value
                            $active = "No";
                        };

                        // print_r(end(explode('.',($_FILES['image']['name']))));
                        // die();
                    

                    // check if image is selected
                    // if(isset($_FILES['image']['name']))
                    // {
                    //     // upload the image
                    //     // to upload image we need image name, source path and destination path
                    //     $image_name = $_FILES['image']['name'];

                    //     if($image_name != "")
                    //     {
                    //         //Auto Rename our Image
                    //         //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
                    //         $ext = end(explode('.', $image_name));

                    //         //Rename the Image
                    //         $image_name = "Food_Category_".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
                            

                    //         $source_path = $_FILES['image']['tmp_name'];
                    //         print_r($source_path);
                    //         $destination_path = "../images/category/".$image_name;

                    //         //Finally Upload the Image
                            
                    //         $upload = move_uploaded_file($source_path, $destination_path);
                    //         // print_r($upload);
                    //         // die();

                    //         //Check whether the image is uploaded or not
                    //         //And if the image is not uploaded then we will stop the process and redirect with error message
                    
                    //         if($upload == false)
                    //         {
                    //             // set error message
                    //             $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                    //             header("location:".SITEURL."admin/add-category.php");
                    //             // stop the process because if it fails we don't want to insert data into db
                    //             die();
                    //         }
                    //     }
                    // }
                    // else
                    // {
                    //     // dont upload image and set the image_name value as blank
                    //     $image_name = "";   
                    // };

                    //2. SQL Query to Save the data into database
                    $sql = "INSERT INTO tbl_category SET 
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    ";
            
                    //3. Executing Query and Saving Data into Datbase
                    $res = mysqli_query($conn, $sql);
                        // Check whether the (query is executed) data is inserted or not and display appropriate message
                        if($res == true)
                            {
                                //Data inserted
                                // Creat a session variable to display message
                                $_SESSION['add'] = "<div class='success'>Category Added Successfully</div>";
                                //Redirect page to manage category page
                                header("location:".SITEURL."admin/manage-category.php");
                            }
                            else
                            {
                                //failed to insert data
                                $_SESSION['add'] = "<div class='error'>Failed to Add Category</div>";
                                header("location:".SITEURL."admin/add-category.php");
                            };
                };
            ?>
    </div>
</div>
<?php include('partials/footer.php');?>    
</body>
</html>