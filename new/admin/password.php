<?php include('partials/header.php');

session_start();
?>

<div class="main">

    <div class="wrapper">
      <h1>change password</h1>

    <?php
     
     $host = "localhost";
     $user = "root";
     $pwd = "";
     $db = "food-order";

     $conn = mysqli_connect ('localhost', 'root', '','food-order') or die(mysqli_error());//database connection
     $db_select= mysqli_select_db($conn, 'food-order') or die(mysqli_error());//database select

    
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
    }
    ?>

  <form action="" method="POST">

    <table class="tbl-30">
       <tr>

       <td>Old password:</td>
       <td>
           <input type="password" name="old_password" >
       </td>

       </tr>

       <tr>

        <td>New password:</td>
        <td>
            <input type="password" name="new_password" >
        </td>

       </tr>

       <tr>

       <td>Confirm password:</td>
       <td>
           <input type="password" name="confirm_password" >
       </td>

       </tr>

       <tr>
           <td colspan="2">
               <input type="hidden" name="id" value="<?php echo $id; ?>">
               <input type="submit" name="submit" value="change password" class="btn-update">
           </td>
       </tr>

     </table>


    </form>
     </div>
</div>


      <?php
      
      
      if(isset($_POST['submit']))
      {
          //checking if the submit button has been clicked
          echo "clicked";

          //get tyhe data from the form

          $id = $_POST['id'];
          $old_password =md5 ($_POST['old_password']);
          $new_password = md5($_POST['new_password']);
          $confirm_password =md5 ($_POST['confirm_passowrd']);

          //create query to check whether the data exists.i.e password and ID

          $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$old_password'";

          //execute the query

          $res = mysqli_query($conn,$sql);

          if($res==true)
          {

            $count = mysqli_num_rows($res);

            if($count==1)
            {
               // echo "user found";
                //header('location:'.'http://localhost/new/admin/manage.php');

                if($new_password==$confirm_password)
                {
                    //update password
                    //echo "password updated succesfully";

                    //query to update password
                    $sql2 = "UPDATE tbl_admin SET
                    password='$new_password'
                    WHERE id=$id
                    ";

                    //execute the query

                    $res = mysqli_query($conn,$sql2);

                    //check whether the query has been executed
                    if($res==true)
                      {
                          //display message
                          $_SESSION["success"] = "password updated succesfully.";
                          //redirect
                          header('location:'.'http://localhost/new/admin/manage.php');
                          
                      }
                      else
                      {
                         //display message
                         $_SESSION["success"] = "failed to update.";
                         //redirect
                         header('location:'.'http://localhost/new/admin/manage.php'); 
                      }
                }
                else
                {
                    //redirect

                    $_SESSION['password-mismatch'] = "password mismatch";
                    //redirect
                    header('location:'.'http://localhost/new/admin/manage.php');
                   // echo "password did not match";
                 
                }
            }
            else
            {
                $_SESSION['user-not-found'] = "user not found";
                //redirect
                header('location:'.'http://localhost/new/admin/manage.php');
            }
          }
      }
      
      ?>


<?php include('partials/footer.php');?>