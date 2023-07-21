<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Order</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <?php include('partials/menu.php')?>
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Order</h1>
                <br />
                <?php
                 if(isset($_SESSION['update']))
                 {
                     echo $_SESSION['update']; //displaying session message
                     unset($_SESSION['update']); //removeing session message
                 }
                ?>
                <table class="tbl-full">
                    <tr>
                        <th>Serial Number</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Customer Name</th>
                        <th>Customer Contact</th>
                        <th>Customer Email</th>
                        <th>Customer Address</th>
                        <th>Actions</th>

                    </tr>

                    <?php 
                        // get all orders from the db

                        $sql ="SELECT * FROM tbl_order ORDER BY id DESC"; //dispaly the latest order at top

                        // execute the query
                        $res = mysqli_query($conn, $sql);

                        // count the rows
                        $count = mysqli_num_rows($res);


                        if($count > 0)
                        {
                            // order available
                            while($row = mysqli_fetch_array($res))
                            {
                                // get all the order details
                                $id = $row['id'];
                                $food = $row['food'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];

                                ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $food; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td><?php echo $qty; ?></td>
                                    <td><?php echo $total; ?></td>
                                    <td><?php echo $order_date; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td><?php echo $customer_name; ?></td>
                                    <td><?php echo $customer_contact; ?></td>
                                    <td><?php echo $customer_email; ?></td>
                                    <td><?php echo $customer_address; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn secondary">Update Order</a>
                                    </td>
                                </tr>
                                <?php
                            }

                        }
                        else
                        {
                            // no orders available
                            echo "<tr><td colspan='12' class='error'>No orders available</td></tr>";
                        }
                    ?>
                    
                </table>
            </div>
        </div>
    <?php include('partials/footer.php')?>
</body>
</html>
