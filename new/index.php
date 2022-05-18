<?php include('frontend-partials/head.php');  

session_start();

?>

        <!--food search section starts here-->
        <!--<section class="foodsearch text-center">
            <div class="container">

                <form action="">
                    <input type="search" name="search" placeholder="search">
                    <input type="submit" name="submit" value="search">
                </form>
            </div>
        </section>-->
    
    <!--food search section ends here-->

    <?php
    
    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
    
    ?>
     
        <!-- categories section starts here-->
        <section class="categories">
            <div class="container">
                <h2 class="text-center">CATERING CARTEGORIES</h2>

                <?php
                $host = "localhost";
                $user = "root";
                $pwd = "";
                $db = "food-order";
            
                $conn = mysqli_connect ('localhost', 'root', '','food-order') or die(mysqli_error());//database connection
                $db_select= mysqli_select_db($conn, 'food-order') or die(mysqli_error());//database select

                //craete a query to read data from database

                $sql = "SELECT * FROM category WHERE active='yes' AND featured='yes' LIMIT 3";

                //execute the query

                $res = mysqli_query($conn,$sql);

                //count the number of rows

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the values
                        $id=$row['id'];
                        $title=$row['title'];
                        $image_name=$row['image_name'];

                        ?>

                       <a href="#">
                       <div class="box-3">
                               

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

                               <h3 class="float-text"><?php echo $title; ?></h3>
                          </div>
                       </a>

                        <?php
                    }

                }
                else
                {
                   echo "category not added";
                }
            
                ?>
                
                <div class="clearfix"></div>
            </div>

        </section>
    
    <!--categories section ends here-->

        <!-- food menu section starts here-->
        <section class="foodmenu">
            <div class="container">
                <h2>FOOD MENU </h2>

                <?php
                
                $sql2 = "SELECT * FROM tbl_food WHERE active='yes' AND featured='yes' LIMIT 6";

                //EXECUTE

                $res2 = mysqli_query($conn,$sql2);

                //count the rouws

                $count2 = mysqli_num_rows($res2);

                if($count2>0)
                {
                    while($row=mysqli_fetch_assoc($res2))
                    {

                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description']; 
                        $image_name = $row['image_name'];

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
                           <a href="<?php echo SITEURL; ?>order.php?id=<?php echo $id; ?>" class="btn-style">order now</a>

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