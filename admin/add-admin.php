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

    <!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name: </td>
                        <td>
                            <input type="text" name="full_name" placeholder="Enter your full name"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="user_name" placeholder="Enter your username"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td>
                            <input type="password" name="password" placeholder="Enter your password"/>
                        </td>
                    </tr>
                    <tr colspan="2">
                        <td>
                            <input type="submit" name="submit" value="Add Admin" class="btn secondary"/>
                        </td>
                    </tr>
                </table>
            </form>
           
        </div>
    </div>
    <!-- Main Content Section Ends -->
    <?php include('partials/footer.php')?>
    <?php 
        // Process value from form and save it in DB
        // Check whether the submit button is clicked or not   
        if(isset($_POST['submit'])){
            //Button Clicked
            
            //1. Get Data from form
            $full_name = $_POST["full_name"];
            $username = $_POST["username"];
            $password = $_POST["password"]

            //2. SQL Query to Save the data in the DB
            $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password' "
        }
        echo $sql
    ?>
    

</body>
</html>