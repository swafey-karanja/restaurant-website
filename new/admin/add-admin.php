<?php include('partials/header.php'); ?>


<div class="main">

    
   <div class="wrapper">

   <h1>Add admin</h1>

   <?php
   
   if(isset($_SESSION['add']))

   {
      echo $_SESSION['add'];//displaying the session message
      unset($_SESSION['add']);//removing the session message
   }
   
   ?>


       <form action="" method="POST">
          <table class="tbl-30">
             <tr>
                 <td>Full name:</td>
                 <td><input type="text" name="full_name"></td>
             </tr>

             <tr>
                 <td>Username:</td>
                 <td><input type="text" name="username"></td>
             </tr><br>

             <tr>
                 <td>Password:</td>
                 <td><input type="password" name="password" ></td>
             </tr>

             <tr>
                 <td colspan="3">
                     <input type="submit" name="submit" value="submit" class="btn-add">
                 </td>
             </tr>

          </table>

       </form>

   </div>
</div>


<?php include('partials/footer.php');?>


<?php

    //process the information submitted through the form and submit to database

   //check if the submit button has been clicked

    if(isset($_POST['submit']))
    {
        //get data from the form

       $full_name = $_POST['full_name'];
       $username = $_POST['username'];
       $password = md5($_POST['password']);//md5=password encription
   
       //sql query to save data to database

       $sql= "INSERT INTO tbl_admin SET
   
         full_name = '$full_name',
         username = '$username',
         password = '$password'
   
      ";
      
      //execute query and save data in database

      $conn = mysqli_connect ('localhost', 'root', '') or die(mysqli_error());//database connection
      $db_select= mysqli_select_db($conn, 'food-order') or die(mysqli_error());//database select

      $res = mysqli_query($conn,$sql) or die(mysqli_error());

      //checking whether data bhas been inserted to database

      if($res==TRUE)
      {

        //create a session variable to display a message if admin is added succesfully
         $_SESSION['add'] = "Admin addition succesful";
         //redirect page to manage admin
         header("location:".'http://localhost/new/admin/manage.php');
      }

      else
      {

         //create a session variable to display a message if admin is not added succesfully
         $_SESSION['add'] = "Admin addition unsuccesful";
         //redirect p[age to add admin
         header("location:".'http://localhost/new/admin/add-admin.php');
      }

    }

?>
