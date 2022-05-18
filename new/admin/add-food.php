<?php include('partials/header.php');?>

<div class="main">         

    <div class="wrapper">
       <h1>add-food</h1>

       <?php
   
   if(isset($_SESSION['food']))

   {
      echo $_SESSION['food'];//displaying the session message
      unset($_SESSION['food']);//removing the session message
   }

   ?>

       <form action="" method="POST" enctype="multipart/form-data">


       <table class="table">
           <tr>
               <td>Title:</td>
               <td>
                   <input type="text" name="title" >
               </td>
           </tr>

           <tr>
               <td>Description:</td>
               <td>
                   <textarea name="description" cols="30" rows="5"></textarea>
               </td>
           </tr>

           <tr>
               <td>Price:</td>
               <td>
                   <input type="number" name="price">
               </td>
           </tr>

           <tr>
               <td>Select image</td>
               <td>
                   <input type="file" name="image_name">
               </td>
           </tr>

           <tr>
               <td>Category:</td>
               <td>
                   <select name="category" >

                   <?php

                    $host = "localhost";
                    $user = "root";
                    $pwd = "";
                    $db = "food-order";

                    $conn = mysqli_connect ('localhost', 'root', '','food-order') or die(mysqli_error());//database connection
                    $db_select= mysqli_select_db($conn, 'food-order') or die(mysqli_error());//database select

                   //create sql query to display categories from database
                   $sql = "SELECT * FROM category WHERE active='yes'";

                   //executing query
                   $res = mysqli_query($conn,$sql);

                   //count the rows
                   $count = mysqli_num_rows($res);

                   if($count>0)
                   {
                       while($row=mysqli_fetch_assoc($res))
                       {

                        //fetch category details
                        $id = $row['id'];
                        $title=$row['title'];
                        ?>

                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                        <?php
                       }

                   }
                   else
                   {
                       ?>
                       <option value="1">no category found</option>
                       <?php
                   }
                   
                   ?>

                       <option value="1">food</option>
                       <option value="2">food</option>
                       <option value="3">food</option>
                   </select>
               </td>
           </tr>

           <tr>
               <td>Featured:</td>
               <td>
                 <select name="featured" >
                     <option value="yes">yes</option>
                     <option value="no">no</option>
                 </select>
               </td>
           </tr>

           <tr>
               <td>Active:</td>
               <td>
                 <select name="active" >
                     <option value="yes">yes</option>
                     <option value="no">no</option>
                 </select>
               </td>
           </tr>

           <tr>
               <td colspan="2">
                   <input type="submit" name="submit" value="submit" class="btn-delete">
               </td>
           </tr>

       </table>
       </form>

       <?php

       $msg="";
       
       if(isset($_POST['submit']))
       {
           //echo "clicked";

           //1.get data from the form
           $title = $_POST['title'];
           $description = $_POST['description'];
           $price = $_POST['price'];
           $category = $_POST['category'];
           $featured = $_POST['featured'];
           $active = $_POST['active'];

           //2.check whether the image has been posted or not
           if(isset($_FILES['image_name']['name']))
           {
            //upload the image
            //to upload an image the source path and destination path are necessary
            $image_name=$_FILES['image_name']['name'];

            if($image_name!="")
            {
                //get the extension of the selected image
                $ext=end(explode('.',$image_name));

                //renaming the image

                $image_name="food_category_".rand(0000,9999).'.'.$ext;

                //upload the image
                //get the source and destination paths
                $src = $_FILES['image_name']['tmp_name'];

                $dst = "images/".$image_name;

                //upload the image

                $upload=move_uploaded_file($src,$dst);
                 
                if($upload==true)
                {
                    $msg="image uploaded";
                }
                else
                {
                    $msg="image not uploaded";
                }
            }
 
            
         }
        else
        {
            //dont upload the image and set the value to blank
            $image_name="";
 
        }

        //insert data into the database
        //create query

        $sql2 = "INSERT INTO tbl_food SET 
        title = '$title',
        description = '$description',
        price = $price,
        image_name = '$image_name',
        category_id = $category,
        featured = '$featured',
        active = '$active'

        ";

        $res2 = mysqli_query($conn,$sql2 );

        //check whether the data has been inserted to database or not

        if($res2==true)
        {
            //data succesfully inserted
            $_SESSION['food']= "food added succesfully";
            header("location:".'http://localhost/new/admin/food-manage.php');
        }
        else
        {
            //food not added
            $_SESSION['food']= "food not added ";
            header("location:".'http://localhost/new/admin/add-food.php');

        }


       }
       
       ?>

    <div class="clearfix"></div>
    
    </div>
</div>


<?php include('partials/footer.php') ?>