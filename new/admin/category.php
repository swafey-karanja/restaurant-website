<?php include('partials/header.php');?>

<div class="main">

    
   <div class="wrapper">

   <h1>Add admin</h1>

   <?php
   
   if(isset($_SESSION['add-category']))

   {
      echo $_SESSION['add-category'];//displaying the session message
      unset($_SESSION['add-category']);//removing the session message
   }

   if(isset($_SESSION['upload']))

   {
      echo $_SESSION['upload'];//displaying the session message
      unset($_SESSION['upload']);//removing the session message
   }
   
   ?>

   <form action="" method="POST" enctype="multipart/form-data">
       <table class="tbl-30">
           <tr>
               <td>Title:</td>
               <td>
                   <input type="text" name="title">
               </td>
           </tr>

           <tr>
               <td>Select image:</td>
               <td>
                   <input type="file" name="image_name" >
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
               <td colspan=2>
                   <input type="submit" name="submit" value="submit" class="btn-delete">
               </td>
           </tr>

       </table>
   </form>


   <?php 

   $msg="";

    if(isset($_POST['submit']))
    {
        //checking if the button has been clicked
        //echo "clicked";

        $host = "localhost";
        $user = "root";
        $pwd = "";
        $db = "food-order";

        $conn = mysqli_connect ('localhost', 'root', '','food-order') or die(mysqli_error());//database connection
        $db_select= mysqli_select_db($conn, 'food-order') or die(mysqli_error());//database select


        //1.getting the data from the form
        $title=$_POST['title'];
        $featured=$_POST['featured'];
        $active=$_POST['active'];
        

        //chech whther an image has been selected ans set the value of the image name accordingly
       // print_r($_FILES['image_name']);

       // die();//break the code

       if(isset($_FILES['image_name']['name']))
       {
           //upload the image
           //to upload an image the source path and destination path are necessary
           $image_name=$_FILES['image_name']['name'];

           //auto rename our image

           $ext=end(explode('.',$image_name));

           //rename the image
           $image_name="food_category_".rand(000,999).'.'.$ext;

           $source_path = $_FILES['image_name']['tmp_name'];

           $destination_path = "../images/".$image_name;

           //upload the image to image folder
           $uploadf=(move_uploaded_file($source_path,$destination_path));

           if($upload==true)
           {
               $msg="image uploaded";
           }
           else
           {
               $msg="image not uploaded";
           }
        
        }
       else
       {
           //dont upload the image and set the value to blank
           $image_name="";

       }

        //2.create a query to insert data into the dtabase
        $sql="INSERT INTO category SET 
        title='$title',
        image_name='$image_name',
        featured='$featured',
        active='$active'
        ";

        //3.execute the query
        $res=mysqli_query($conn,$sql);

        
        //4.check whether the query has been executed
        if($res==TRUE)
        {
  
          //create a session variable to display a message if admin is added succesfully
           $_SESSION['add-category'] = "category addition succesful";
           //redirect page to manage admin
           header("location:".'http://localhost/new/admin/category-manage.php');
        }
  
        else
        {
  
           //create a session variable to display a message if admin is not added succesfully
           $_SESSION['add-category'] = "category addition unsuccesful";
           //redirect p[age to add admin
           header("location:".'http://localhost/new/admin/category.php');
        }


    }

   
   ?>

   </div>
</div>





<?php include('partials/footer.php');?>
