<?php include('partials/header.php') ?>

 <!--main section starts here-->
 <div class="main">
     <div class="wrapper">
        <h1>order-manage</h1>

        <?php 
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
           ?>

        <table class="table"> 
          <tr>
            <th>sn</th>
            <th>food</th>
            <th>price</th>
            <th>qty</th>
            <th>total</th>
            <th>name</th>
            <th>email</th>
            <th>contact</th>
            <th>address</th>
            <th>status</th>
            <th>actions</th>
          </tr>

          <?php

          ini_set('display_errors', '1');
          ini_set('display_startup_errors', '1');
          error_reporting(E_ALL);

          $host = "localhost";
          $user = "root";
          $pwd = "";
          $db = "food-order";

          $conn = mysqli_connect ('localhost', 'root', '','food-order') or die(mysqli_error());//database connection
          $db_select= mysqli_select_db($conn, 'food-order') or die(mysqli_error());//database select


          $sql = "SELECT * FROM tbl_order ORDER BY id DESC";

          $res = mysqli_query($conn,$sql);

          $count = mysqli_num_rows($res);

          $sn=1;

          if($count>0)
          {
              while($row=mysqli_fetch_assoc($res))
              {
                $id = $row['id'];
                $food = $row['food'];
                $price = $row['price'];
                $qty = $row['qty'];
                $total = $row['total'];
                $customer_name = $row['customer_name'];
                $customer_contact = $row['customer_contact'];
                $customer_email = $row['customer_email'];
                $customer_address = $row['customer_address'];
                $status = $row['status'];

                ?>

                  <tr>
                        <td><?php echo $sn++; ?>. </td>
                        <td><?php echo $food; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $qty; ?></td>
                        <td><?php echo $total; ?></td>
                        <td><?php echo $customer_name; ?></td>
                        <td><?php echo $customer_email; ?></td>
                        <td><?php echo $customer_contact; ?></td>
                        
                        <td><?php echo $customer_address; ?></td>
                        <td>
                            <?php 
                                 
                                 // Ordered, On Delivery, Delivered, Cancelled

                                 if($status=="Ordered")
                                 {
                                     echo "<label>$status</label>";
                                 }
                                 elseif($status=="On Delivery")
                                 {
                                     echo "<label style='color: blue;'>$status</label>";
                                 }
                                 elseif($status=="Delivered")
                                 {
                                     echo "<label style='color: brown;'>$status</label>";
                                 }
                                 elseif($status=="Cancelled")
                                 {
                                     echo "<label style='color: red;'>$status</label>";
                                 }
                             ?>
                            
                        </td>

                        <td>
                        <a href="<?php echo 'http://localhost/new/'; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-delete">Update Order</a>
                        </td>
                    </tr>

                <?php

                
              }
          }
          else
          {
             echo "orders not available";
          }
          
          
          
          ?>

        </table>


      <div class="clearfix"></div>
    
     </div>
</div>
<!--main section ends here-->



<?php include('partials/footer.php') ?>