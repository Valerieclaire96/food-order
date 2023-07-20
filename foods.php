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
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    
    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                // create SQL query to display caregories from database
                $sql = "SELECT * FROM tbl_food WHERE active='Yes' ";
                // execute SQL query
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
                                    <a href="<?php echo SITEURL; ?>/order.php" class="btn btn-primary">Order Now</a>
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
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php')?>

</body>
</html>