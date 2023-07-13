<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Food</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <?php include('partials/menu.php')?>

    <!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Food</h1>
            <?php
                if(isset($_SESSION['add'])) //checing if the session is set or not
                {
                    echo $_SESSION['add']; //dispaly the session message if set
                    unset($_SESSION['add']); //remove session message
                }
            ?>
            <br/>
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" placeholder="Enter Title"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Description: </td>
                        <td>
                            <textarea  name="description" placeholder="Enter Description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Price: </td>
                        <td>
                            <input type="number" name="price" placeholder="Enter Price"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Image: </td>
                        <td>
                            <input type="text" name="image_name" placeholder="Enter image URL"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Category: </td>
                        <td>
                            <input type="text" name="category_id" placeholder="Enter Cateogry ID"/>
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
                            <input type="submit" name="submit" value="Add Food" class="btn secondary"/>
                        </td>
                    </tr>
                </table>
            </form>
           
        </div>
    </div>
    <!-- Main Content Section Ends -->

    <?php 
    include('partials/footer.php');
    ?>
    <?php
        // Process value from form and save it in DB
        // Check whether the submit button is clicked or not  
        if(isset($_POST['submit'])){
            //1. Get Data from form
                //1. Get the Data from form
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price']; 
            $image_name = $_POST['image_name']; 
            $category_id = $_POST['category_id']; 

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
                        }


            //2. SQL Query to Save the data into database
            $sql = "INSERT INTO tbl_food SET 
                title='$title',
                description='$description',
                price='$price',
                image_name='$image_name',
                category_id='$category_id',
                featured='$featured',
                active='$active'
            ";
    
            //3. Executing Query and Saving Data into Datbase
            $res = mysqli_query($conn, $sql) or die(mysqli_error());
            // Check whether the (query is executed) data is inserted or not and display appropriate message
            if($res == true)
                {
                    //Data inserted
                    // Creat a session variable to display message
                    $_SESSION['add'] = "<div class='success'>Food Added Successfully</div>";
                    //Redirect page to manage admin page
                    header("location:".SITEURL."admin/manage-food.php");
                }
                else{
                    //failed to insert data
                    $_SESSION['add'] = "<div class='error'>Failed to add Food</div>";
                    //Redirect page to manage admin page
                    header("location:".SITEURL."admin/add-food.php");
                };
        }
        
        
    ?>
</body>
</html>