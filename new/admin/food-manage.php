<?php include('partials/header.php') ?>

 <!--main section starts here-->
 <div class="main">
    <div class="wrapper">
        <h1>Manage Food</h1>

        <br /><br />

               

                <?php 
                    if(isset($_SESSION['food']))
                    {
                        echo $_SESSION['food'];
                        unset($_SESSION['food']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['unauthorize']))
                    {
                        echo $_SESSION['unauthorize'];
                        unset($_SESSION['unauthorize']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                
                ?>

                <table class="table">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php 

                     $host = "localhost";
                     $user = "root";
                     $pwd = "";
                     $db = "food-order";

                     $conn = mysqli_connect ('localhost', 'root', '','food-order') or die(mysqli_error());//database connection
                     $db_select= mysqli_select_db($conn, 'food-order') or die(mysqli_error());//database select

                        //Create a SQL Query to Get all the Food
                        $sql = "SELECT * FROM tbl_food";

                        //Execute the qUery
                        $res = mysqli_query($conn, $sql);

                        //Count Rows to check whether we have foods or not
                        $count = mysqli_num_rows($res);

                        //Create Serial Number VAriable and Set Default VAlue as 1
                        $sn=1;

                        if($count>0)
                        {
                            //We have food in Database
                            //Get the Foods from Database and Display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //get the values from individual columns
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $title; ?></td>
                                    <td>$<?php echo $price; ?></td>
                                    <td>
                                        <?php  
                                            //CHeck whether we have image or not
                                            if($image_name=="")
                                            {
                                                //WE do not have image, DIslpay Error Message
                                                echo "Image not Added.";
                                            }
                                            else
                                            {
                                                //WE Have Image, Display Image
                                                ?>
                                                <img src="<?php echo 'http://localhost/new/'; ?>images/<?php echo $image_name; ?>" width="100px">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo 'http://localhost/new/'; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-delete">Update Food</a>
                                        <a href="<?php echo 'http://localhost/new/'; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete Food</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            //Food not Added in Database
                            echo " Food not Added Yet.";
                        }

                    ?>

                    
                </table>
    </div>
    <a href="<?php echo 'http://localhost/new/'; ?>admin/add-food.php" class="btn-delete">Add Food</a>
    
</div>
<!--main section ends here-->


<?php include('partials/footer.php') ?>