<?php include('frontend-partials/head.php');?>

     <!-- food menu section starts here-->
     <section class="foodmenu">
        <div class="container">
            <h2>FOOD MENU </h2>

            <?php

                $host = "localhost";
                $user = "root";
                $pwd = "";
                $db = "food-order";

                $conn = mysqli_connect ('localhost', 'root', '','food-order') or die(mysqli_error());//database connection
                $db_select= mysqli_select_db($conn, 'food-order') or die(mysqli_error());//database select

                
                $sql2 = "SELECT * FROM tbl_food WHERE active='yes'  LIMIT 10";

                //EXECUTE

                $res2 = mysqli_query($conn,$sql2);

                //count the rouws

                $count2 = mysqli_num_rows($res2);

                if($count2>0)
                {
                    while($row2=mysqli_fetch_assoc($res2))
                    {

                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description']; 
                        $image_name = $row2['image_name'];

                        ?>

                       <div class="food-menu-box">
                            <div class="food-menu-img">
                            <?php
                                if($image_name=="")
                                {
                                    echo "image not available";
                                }
                                else
                                {
                                    ?>

                                     <img src="<?php echo SITEURL; ?>images/<?php echo $image_name; ?>" class="box-3-img img-curve">

                                    <?php
                                }
                                
                                ?>
                            </div>

                        <div class="food-menu-desc">
                         <h4><?php echo $title;?></h4>

                           <p class="package-price"><?php echo $price;?></p>
                           <p class="package-desc"><?php echo $description;?></p>
                           <br>
                           <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn-style">order now</a>

                        </div>
                    
                       </div>

                        <?php
                        
                    }

                }
                else
                {
                    echo "food not available";
                }
                
                ?>


           
                <div class="clearfix"></div>
            </div>
            

           

        <div class="clearfix"></div>
        </div>

        
    </section>

<!--food menu section ends here-->


    <?php include('frontend-partials/footer.php');?>

    
</body>
</html>