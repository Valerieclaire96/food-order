<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('partials-front/menu.php')?>

    <?php
        // check whether food id is set or not
        if(isset($_GET['food_id']))
        {
                 // food id is set and get the id
                 $food_id = $_GET['food_id'];
                // get the food id from and detail of the selected food
                 $sql = "SELECT *
                 FROM tbl_food WHERE 
                 id = $food_id";

                 // execute SQL query
                 $res = mysqli_query($conn, $sql);
     
                // count the rows
                $count = mysqli_num_rows($res);
                // check if the data is avaible or not 
                if($count === 1)
                {
                    // we have data
                    // GET data from db
                    $row = mysqli_fetch_assoc($res);

                      // get the values of the categories ex title, image_name, and id
                      $title = $row['title'];
                      $image_name = $row['image_name'];
                      $price = $row['price'];
                }
                else
                {
                    // we do not have data
                    // redirect to home page
                    header('location:'.SITEURL);
                }
                }
        else 
        {
            // redirect to home page
            header('location:'.SITEURL);
;
        }
    ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" class="order" method="POST" >
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php
                            if($image_name === "")
                            {
                                // image not avaible
                                echo "<div class='error'>Image not found</div>";
                            }
                            else
                            {
                                // image is available
                                ?>
                                    <img height="200;" src="<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                                <?php
                            }
                        ?>
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php $title; ?>"/>

                        <p class="food-price">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php $price; ?>"/>


                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
                // check if form has been submitted
                if(isset($_POST['submit']))
                {
                    // get all the details from the form
                    $qty = $_POST['qty'];

                    // total price = price times qty
                    $total = $price * $qty;

                    $order_date = date('Y-m-d h:i:s'); //order date

                    $status = "Ordered"; //status options : order, on delievery, delivered, cancelled

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];

                    // save the order in db
                    // create sql to save the data
                     $sql2 = "INSERT INTO tbl_order SET
                        food = '$title',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                     ";
                    // execute the the query
                    $res2 = mysqli_query($conn, $sql2);

                    // check if the query executed successfully

                    if($res2 === true)
                    {
                        // query successful and order saved
                        $_SESSION['order'] = "<div class='success'>Food Ordered Successfully</div>";
                        header("location:".SITEURL);
                    }
                    else
                    {
                        // failed to save order
                        $_SESSION['order'] = "<div class='error'>Failed to Order Food</div>";
                        header("location:".SITEURL);
                    };
                }
            ?>

        </div>
    </section>

    <?php include('partials-front/footer.php')?>


</body>
</html>