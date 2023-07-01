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
            <h1>Manage Admin</h1>
            <!-- button to add admin -->
            <br />
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //displaying session message
                    unset($_SESSION['add']); //removeing session message
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete']; //displaying session message
                    unset($_SESSION['delete']); //removeing session message
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update']; //displaying session message
                    unset($_SESSION['update']); //removeing session message
                }
                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found']; //displaying session message
                    unset($_SESSION['user-not-found']); //removeing session message
                }
                if(isset($_SESSION['pws-dont-match']))
                {
                    echo $_SESSION['pws-dont-match']; //displaying session message
                    unset($_SESSION['pws-dont-match']); //removeing session message
                }
                if(isset($_SESSION['pw-changed']))
                {
                    echo $_SESSION['pw-changed']; //displaying session message
                    unset($_SESSION['pw-changed']); //removeing session message
                };
            ?>
            <br/><br/>
            <a href="add-admin.php" class="btn primary">Add Admin</a>
            <br/><br/>
            <table class="tbl-full">
                <tr>
                    <th>Serial Number</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
                <?php
                    // Query to get all admin
                        $sql = "SELECT * FROM tbl_admin";
                        //Execute the Query
                        $res = mysqli_query($conn, $sql);

                        //Check if the query is executed or not
                        if($res==TRUE)
                        {
                            // Count rows to is we have the data in db or not
                            $count = mysqli_num_rows($res); // Function to get all the rows in database

                            $sn = 1; //Create a Variable and Assign the value
                            // Check the num of rows
                            if($count > 0)
                            {
                                // we have data in the db
                                while($rows = mysqli_fetch_assoc($res))
                                {
                                // using while loop to get all data for the db
                                // and while loop will run as long as we have data in the db

                                // get individual data
                                
                                    $id = $rows['id'];
                                    $full_name = $rows['full_name'];
                                    $username = $rows['username'];
                                // display the values in our table 
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?>.</td>
                                        <td> <?php echo $full_name; ?> </td>
                                        <td> <?php echo $username; ?> </td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn primary">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn danger">Delete Admin</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                    }
                                    else
                                    {
                                        //we do NOT have data in the db
                                        // echo "No data available"
                                    }

                                }
                            ?>
               
            </table>
        </div>
    </div>
    <!-- Main Content Section Ends -->
    <?php include('partials/footer.php')?>


</body>
</html>