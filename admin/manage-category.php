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
                <?php
                    if(isset($_SESSION['add'])) //checing if the session is set or not
                    {
                        echo $_SESSION['add']; //dispaly the session message if set
                        unset($_SESSION['add']); //remove session message
                    }
                ?>
                <br />
                <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn primary">Add Category</a>
                <table class="tbl-full">
                    <tr>
                        <th>Serial Number</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Valerie Dubach</td>
                        <td>ValerieClaire96</td>
                        <td>
                            <a href="#" class="btn secondary">Update Category</a>
                            <a href="#" class="btn danger">Delete Category</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Valerie Dubach</td>
                        <td>ValerieClaire96</td>
                        <td>
                            <a href="#" class="btn secondary">Update Category</a>
                            <a href="#" class="btn danger">Delete Category</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Valerie Dubach</td>
                        <td>ValerieClaire96</td>
                        <td>
                            <a href="#" class="btn secondary">Update Category</a>
                            <a href="#" class="btn danger">Delete Category</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    <?php include('partials/footer.php')?>
</body>
</html>
