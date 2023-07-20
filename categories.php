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

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
                // create SQL query to display caregories from database
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' ";
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
                        
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id;?>">
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

    <?php include('partials-front/footer.php')?>


</body>
</html>