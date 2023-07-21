<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Document</title>
</head>
<body>
    <?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br/>

        <?php
            // check if id is set or not

            if(isset($_GET['id']))
            {
                // get order details
                $id=$_GET['id'];

                // get details based on id
                $sql = "SELECT * FROM tbl_order WHERE id = $id";

                // execute query
                $res = mysqli_query($conn, $sql);
                // count rows
                $count = mysqli_num_rows($res);

                if($count === 1)
                {
                    // detail available
                    $row = mysqli_fetch_assoc($res);

                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $customer_contact = $row['customer_contact'];
                    $customer_address = $row['customer_address'];
                }
                else
                {
                    // data not available
                    // redirect to manage order
                    headers("location:".SITEURL.'admin/manage-order.php');
                }
            }
            else
            {
                // redirect to manage order page
                headers("location:".SITEURL.'admin/manage-order.php');
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Food</td>
                    <td><?php echo $food; ?></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td>$<?php echo $price; ?></td>
                </tr>

                <tr>
                    <td>Qty</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $qty; ?>"/>
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status === "Ordered"){echo "selected";}?> value="Ordered">Ordered</option>
                            <option <?php if($status === "On Delevery"){echo "selected";}?> value="On Delivery">On Delivery</option>
                            <option <?php if($status === "Delivered"){echo "selected";}?> value="Delivered">Delivered</option>
                            <option <?php if($status === "Canceled"){echo "selected";}?> value="Cancelled">Cancelled</option>
                        </status>
                    </td>
                </tr>
                <tr>
                    <td>Customer Contact</td>
                    <td>
                        <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>"/>
                    </td>
                </tr>

                <tr>
                    <td>Customer Address</td>
                    <td>
                        <textarea name="customer_address" cols="30" rows="5" value="<?php echo $customer_address; ?>"></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="hidden" name="price" value="<?php echo $price; ?>"/>
                        <input type="submit" name="submit" value="Update Order" class="btn-secondary"/>
                    </td>
                </tr>
            </table>
        </form>

        <?php
         if(isset($_POST['submit']))
         {
             //echo "Button CLicked";
             //Get all the values from form to update
             $id = $_POST['id'];
             $qty = $_POST['qty'];
             $status = $_POST['status']; 
             $customer_contact = $_POST['customer_contact']; 
             $customer_address = $_POST['customer_address'];
 
             // create a sql query to update the admin
             $sql2 = "UPDATE tbl_order SET 
             qty='$qty',
             status='$status',
             customer_contact='$customer_contact',
             customer_address='$customer_address'
             WHERE id = '$id'
             ";
 
             // execute the sql query
             $res2 = mysqli_query($conn, $sql2);
             // check if the query executed successfully
             if($res2 == true)
             {
                 // query executed successfully and admin updated            
                 $_SESSION['update'] = "<div class='success'>Order was Updated Successfully</div>";
                 header('location:'.SITEURL.'/admin/manage-order.php');
             }
             else
             {
                 $_SESSION['update'] = "<div class='error'>Failed to Update order. Try again later.</div>";
                 header('location:'.SITEURL.'/admin/manage-order.php');
             }
         };
     ?>
    </div>
</div>

<?php include('partials/footer.php')?>
</body>
</html>

