    <?php include('partials-front/menu.php');?>

    <!-- Food Seach Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

            <form action="<?php echo SITEURL; ?>/food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Food Seach Section Ends Here -->
    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>
    <!-- Categories Section Starts Here -->
        <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
                // create SQL query to display caregories from database
                $sql = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 3";
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
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
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
                                            <img  height="200;" src="<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>
                        <?php
                        }
                    }
                        else 
                        {
                            // categories not avaibale
                            echo "<div class='error'>Category not Found.</div>";
                        };
                    ?>
                

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Food Menu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            
            <?php
                 $sql = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";
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
                                <img height="125px;" src="<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                            <?php
                        }
                    ?>
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php $title; ?></h4>
                                <p class="food-price"><?php $price; ?></p>
                                <p class="food-detail">
                                <?php $description; ?>
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
                    echo "<div class='error'>Food not Found.</div>";
                }
            ?>
   
            <div class="clearfix"></div>



        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL; ?>/foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php include('partials-front/footer.php');?>