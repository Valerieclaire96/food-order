
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Food</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <?php include('partials/menu.php')?>
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Food</h1>
                <br/>
                <?php
                if(isset($_SESSION['add'])) //checing if the session is set or not
                {
                    echo $_SESSION['add']; //dispaly the session message if set
                    unset($_SESSION['add']); //remove session message
                }
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
                <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn primary">Add Food</a>
                <br/>
                <br/>
                <table class="tbl-full">
                    <tr>
                        <th>ID:</th>
                        <th>Title:</th>
                        <th>Image:</th>
                        <th>Category:</th>
                        <th>Featured:</th>
                        <th>Active:</th>
                        <th>Actions:</th>
                    </tr>
                    <?php
                    // Query to get all admin
                        $sql = "SELECT * FROM tbl_food";
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
                                    $description = $rows['description'];
                                    $price = $rows['price'];
                                    $image_name = $rows['image_name'];
                                    $category_id = $rows['category_id'];
                                    $featured = $rows['featured'];
                                    $active = $rows['active'];

                                // display the values in our table 
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?>.</td>
                                        <td> <?php echo $title; ?> </td>
                                        <td>
                                        <?php if($image_name != "")
                                        {
                                            ?>
                                                <img src="<?php echo $image_name; ?>" width="100px" > 
                                                <?php                                       
                                            }else 
                                            {
                                                echo "<div class='error'>Image not Added.</div>";
                                            }
                                            ?>
                                            </td>
                                        <td> <?php echo $category_id; ?> </td>
                                        <td> <?php echo $featured; ?> </td>
                                        <td> <?php echo $active; ?> </td>

                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn secondary">Update Food</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>" class="btn danger">Delete Food</a>
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
