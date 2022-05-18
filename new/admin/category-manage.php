<?php include('partials/header.php');

session_start();

?>

<?php
   
   if(isset($_SESSION['add-category']))

   {
      echo $_SESSION['add-category'];//displaying the session message
      unset($_SESSION['add-category']);//removing the session message
   }
   
   ?>


 <!--main section starts here-->
 <div class="main">      

      <div class="wrapper">

         <h1>category-manage</h1>


         <table class="table">
           <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Active</th>
              <th>Featured</th>
              <th>Image_name</th>
           </tr>

           <?php

              $host = "localhost";
              $user = "root";
              $pwd = "";
              $db = "food-order";

              $conn = mysqli_connect ('localhost', 'root', '','food-order') or die(mysqli_error());//database connection
              $db_select= mysqli_select_db($conn, 'food-order') or die(mysqli_error());//database select

              //query to select from edatabase
               $sql ="SELECT * FROM category ";

                //execute query
                $res= mysqli_query($conn,$sql);

                //count the rows
                $count = mysqli_num_rows($res);

                //create a number variable and assign its value as 1
                $num=1;

                //check whether we have data in database or nnot
                if($count>0)
                {

                  //we have data in database
                  //fetch the data to be displayed
                  while($row=mysqli_fetch_assoc($res))
                  {

                     $id = $row['id'];
                     $title=$row['title'];
                     $active= $row['active'];
                     $featured= $row['featured'];
                     $image_name=$row['image_name'];

                     ?>

                       <tr>
                            <td><?php echo $num++;?></td>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $active; ?></td>
                            <td><?php echo $featured; ?></td>

                            <td>
                               
                            <?php 
                            if($image_name!="")
                            {
                               //display image
                               ?>

                                <img src="<?php echo 'http://localhost/new/'; ?>images/<?php echo $image_name; ?>" width=100px> 

                               <?php
                            }
                            else
                            {
                               //display error message
                               echo "image not available";
                            }
                            
                            ?>
                           
                           </td>

                       </tr>


                     <?php

                  }

                }
                else
                {

                   //we do not have any data


                }
           

           ?>

        </table><br>

   <a href="category.php" class="btn-add">Add category</a> 


   </div>
</div>


      <div class="clearfix"></div>
    

<!--main section ends here-->



<?php include('partials/footer.php') ?>