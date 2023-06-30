<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // 1. get the id of the admin to be deleted
    $id = $_GET['id'];

    // 2. create sql query to delete the admin
    $sql ="DELETE FROM tbl_admin WHERE id=$id";

    // Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check whethere the query executed successfully or not
    if($res==TRUE)
    {
        // query executed successfully and admin was deleted
        // create session varibale to display message
        $_SESSION['delete'] = "<div class='success'>Admin was Deleted Successfully</div>";
        // redirect to manage admin
        header('location:'.SITEURL.'/admin/manage-admin.php');
    }else {
        // failed to delete admin
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try again later.</div>";
        header('location:'.SITEURL.'/admin/manage-admin.php');
    }

    // 3. redirect the manager admin page with message (success/error)
    ?>
</body>
</html>