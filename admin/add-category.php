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
        ?>
        <!-- add category form starts  -->
        <form actions="" methods="POST">
            <table class="tbl-30">
                <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" placeholder="Category Title"/>
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
       
    </div>
</div>

<?php include('partials/footer.php');?>
 <?php
        // Process value from form and save it in DB
        // Check whether the submit button is clicked or not  
        if(isset($_POST['submit']))
        {
            //1. Get Data from form
                //1. Get the Data from form
        $title = $_POST['title'];

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

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO tbl_category SET 
        title = '$title',
        featured = '$featured',
        active = '$active'
        ";
 
        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
            // Check whether the (query is executed) data is inserted or not and display appropriate message
            if($res == true)
            {
                //Data inserted
                // Creat a session variable to display message
                $_SESSION['add'] = "<div class='success'>Category Added Successfully</div>";
                //Redirect page to manage admin page
                header("location:".SITEURL."admin/manage-category.php");
            }
            else
            {
                //failed to insert data
                $_SESSION['add'] = "<div class='error'>Failed to Add Category</div>";
                //Redirect page to manage admin page
                header("location:".SITEURL."admin/add-category.php");
            };
        };
    ?>
    
</body>
</html>