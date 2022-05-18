<?php include('partials/header.php');?>

<?php
//session_start();
?>

  <!--main section starts here-->
  <div class="main">

     <div class="wrapper">
        <h1>admin-manage</h1>

        <?php
        
        if(isset($_SESSION['update']))
        {
           echo $_SESSION['update'];
           unset($_SESSION['update']);
        }

        if(isset($_SESSION["success"]))
        {
           echo $_SESSION["success"];
           unset($_SESSION["success"]);
        }

        
        ?>

        <table class="table">
           <tr>
              <th>ID</th>
              <th>Full name</th>
              <th>User name</th>
              <th>Action</th>
           </tr>
             

           <?php

               $host = "localhost";
               $user = "root";
               $pwd = "";
               $db = "food-order";

               $conn = mysqli_connect ('localhost', 'root', '','food-order') or die(mysqli_error());//database connection
               $db_select= mysqli_select_db($conn, 'food-order') or die(mysqli_error());//database select


           
           $sql = "SELECT * FROM tbl_admin";

           $res = mysqli_query($conn, $sql);

           if($res==TRUE)
           {

            $count = mysqli_num_rows($res);

            if($count>0)
            {
             
               while($rows = mysqli_fetch_assoc($res))
               {
                  //using while loop to get all the data from the database
                   
                  //get the data
                  $id=$rows['id'];
                  $full_name=$rows['full_name'];
                  $username=$rows['username'];
                   
                  //display the data

                  ?>

                      <tr>
                         <td><?php echo $id; ?></td>
                         <td><?php echo $full_name; ?></td>
                         <td><?php echo $username; ?></td>
                         <td>
                        <!-- <a href="<?php echo "http://localhost/new/";?>admin/password.php?id=<?php echo $id;?>" class="btn-update">change password</a>-->
                         <a href="<?php echo "http://localhost/new/";?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-update">update</a>  
                         <a href="<?php echo "http://localhost/new/";?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-delete">delete</a>
                        </td>
                      </tr>
                  
                  <?php
                  
               }
            }
            else
            {

            }
           }
           ?>
           
        </table><br>

   <a href="add-admin.php" class="btn-add">Add admin</a>


     <div class="clearfix"></div>

    
     </div>
</div>
<!--main section ends here-->

<?php include('partials/footer.php') ?>