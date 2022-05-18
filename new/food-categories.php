<?php include('frontend-partials/head.php');?>


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

                $sql = "SELECT * FROM category WHERE active='yes' LIMIT 3";

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





<?php include('frontend-partials/footer.php');?>
