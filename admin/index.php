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
            <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <h1>Dashboard</h1>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                Categories
            </div>
            <div class="clear-fix"></div>
        </div>
    </div>
    <!-- Main Content Section Ends -->
    <?php include('partials/footer.php')?>


</body>
</html>