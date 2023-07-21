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

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
                
                $search = mysqli_real_escape_string($conn, $_POST['search']);

            ?>
            <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 

                //SQL Query to Get foods based on search keyword
                // "SELECT * FROM tbl_food WHERE title like '%%' OR description like '%%'
                // when the query is like this if someone searches for soemthing with quotes it can be a sql security problem because the quote breaks the request
                $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);
                // count row to if the caregory is available or not
                $count = mysqli_num_rows($res);
                
                if($count > 0)
                {
                    // categories avaibale
                    while($row = mysqli_fetch_assoc($res))
                    {
                        // get the values of the categories ex title, image_name, and id
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        $price = $row['price'];
                        $description = $row['description'];
                        ?>
                        
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                <?php 
                                    if($image_name === "")
                                    {
                                        // display message 
                                        echo "<div class='error'>Image not found</div>";
                                    }
                                    else 
                                    {
                                        // image avaible
                                        ?>
                                            <img height="200;" src="<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                 </div>
                                <div class="food-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price">$<?php echo $price; ?></p>
                                    <p class="food-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <br>
                                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                        
                        <?php
                        }
                    }
                        else 
                        {
                            // categories not avaibale
                            echo "<div class='error'>Food not Found.</div>";
                        };
                    ?>

            <div class="clearfix"></div>

        </div>

    </section>
    <!-- Food Menu Section Ends Here -->

    <?php include('partials-front/footer.php')?>


</body>

</html>