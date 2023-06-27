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
            <a href="add-admin.php" class="btn primary">Add Admin</a>
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
                        <a href="#" class="btn secondary">Update Admin</a>
                        <a href="#" class="btn danager">Delete Admin</a>
                    </td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Valerie Dubach</td>
                    <td>ValerieClaire96</td>
                    <td>
                        <a href="#" class="btn secondary">Update Admin</a>
                        <a href="#" class="btn danager">Delete Admin</a>
                    </td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Valerie Dubach</td>
                    <td>ValerieClaire96</td>
                    <td>
                        <a href="#" class="btn secondary">Update Admin</a>
                        <a href="#" class="btn danager">Delete Admin</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <!-- Main Content Section Ends -->
    <?php include('partials/footer.php')?>


</body>
</html>