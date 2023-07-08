<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Category</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <?php include('partials/menu.php')?>
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Category</h1>
                <br/>
                <?php
                if(isset($_SESSION['add'])) //checing if the session is set or not
                {
                    echo $_SESSION['add']; //dispaly the session message if set
                    unset($_SESSION['add']); //remove session message
                }
                // if(isset($_SESSION['upload']))
                // {
                //     echo $_SESSION['upload'];
                //     unset($_SESSION['upload']);
                // }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update']; //displaying session message
                    unset($_SESSION['update']); //removeing session message
                }
                ?>
                <br />
                <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn primary">Add Category</a>
                <br/>
                <br/>
                <table class="tbl-full">
                    <tr>
                        <th>ID Number:</th>
                        <th>Title:</th>
                        <th>Featured:</th>
                        <th>Active:</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    // Query to get all admin
                        $sql = "SELECT * FROM tbl_category";
                        //Execute the Query
                        $res = mysqli_query($conn, $sql);

                        //Check if the query is executed or not
                        if($res==true)
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
                                    $title = $rows['title'];
                                    $image_name = $rows['image_name'];
                                    $featured = $rows['featured'];
                                    $active = $rows['active'];

                                // display the values in our table 
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?>.</td>
                                        <td> <?php echo $title; ?> </td>
                                        <td> <?php echo $featured; ?> </td>
                                        <td> <?php echo $active; ?> </td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn secondary">Update Category</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>" class="btn danger">Delete Category</a>
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
    <?php include('partials/footer.php')?>
</body>
</html>
