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
           
            <h1>Dashboard</h1>
            <br/>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <br/>
            <div class="col-4 text-center">
                <?php
                // sql query
                $sql1 = "SELECT * FROM tbl_category";
                // execute the sql query
                $res1 = mysqli_query($conn, $sql1);
                // count rows
                $count1 = mysqli_num_rows($res1);
                ?>
                <h1><?php echo $count1; ?></h1>
                <br/>
                Categories
            </div>
            <div class="col-4 text-center">
                <?php
                // sql query
                $sql2 = "SELECT * FROM tbl_food";
                // execute the sql query
                $res2 = mysqli_query($conn, $sql2);
                // count rows
                $count2 = mysqli_num_rows($res2);
                ?>
                <h1><?php echo $count2; ?></h1>
                <br/>
                Food
            </div>
            <div class="col-4 text-center">
                <?php
                // sql query
                $sql3 = "SELECT * FROM tbl_order";
                // execute the sql query
                $res3 = mysqli_query($conn, $sql3);
                // count rows
                $count3 = mysqli_num_rows($res3);
                ?>
                <h1><?php echo $count3; ?></h1>
                <br/>
                Total Orders
            </div>
            <div class="col-4 text-center">
                <?php
                // sql query
                $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
                // execute the sql query
                $res4 = mysqli_query($conn, $sql4);
                // get the value
                $row4= mysqli_fetch_assoc($res4);
                // get total revenue
                $total_revenue = $row4['Total'];
                ?>
                <h1>$<?php echo $total_revenue; ?></h1>
                <br/>
                Total Revenue
            </div>
            <div class="clear-fix"></div>
        </div>
    </div>
    <!-- Main Content Section Ends -->
    <?php include('partials/footer.php')?>


</body>
</html>