<?php include('partials/header.php')?>

<div class="main">

    <div class="wrapper">
      <h1>Update admin</h1>


      <br><br>

      <?php
      //connect to the database

      $conn = mysqli_connect ('localhost', 'root', '') or die(mysqli_error());//database connection
      $db_select= mysqli_select_db($conn, 'food-order') or die(mysqli_error());//database select


      //get the id of the admin to be deleted
       $id = $_GET['id'];

       //create query
       $sql = "SELECT * FROM tbl_admin WHERE id=$id";

       //execute query
       $res = mysqli_query($conn,$sql);

       //check whether query has been executed
       if($res==true)
       {
           //check whether data is available or not
           $count = mysqli_num_rows($res);

           //get the details
           if($count==1)
           {
               $row = mysqli_fetch_assoc($res);

               $full_name = $row['full_name'];
               $username = $row['username'];
           }
           else
           {
               //redirect to manage admin page
               header('location:'.'http://localhost/new/admin/manage.php');
           }
       }

      ?>
       
      <form action="" method="POST">

           <table class="tbl-30">
            
               <tr>
                   <td>Full name:</td>
                   <td>
                       <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                   </td>
               </tr>

               <tr>
                   <td>Username:</td>
                   <td>
                       <input type="text" name="username" value=" <?php echo $username; ?>"><br>
                   </td>
               </tr>
               
               
               <tr>
                   
                   <td colspan="2">

                       <input type="hidden" name="id" value="<?php echo $id?>">
                       <input type="submit" name="submit" value="update admin" class="btn-update">
                   </td>

                </tr>
              
           </table>

      </form>

      
    </div>

</div>

<?php 

if(isset($_POST['submit']))
{
    //check whether the submit button has been clicked
    //get the updated values
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    //create query to execute update
    $sql= "UPDATE tbl_admin SET
    full_name= '$full_name',
    username= '$username'
    WHERE id='$id'

    ";

    //execute query
    $res = mysqli_query($conn,$sql);

    //check if query has been executed

    if($res==true)
    {
        $_SESSION['update'] = "<div class='success'>admin updated succesfully.</div>";

        header('location:'.'http://localhost/new/admin/manage.php');
    }
    else
    {
        $_SESSION['update']= "<div class='error'>admin updated succesfully.</div>";

        header('location:'.'http://localhost/new/admin/manage.php');
    }
}

?>

<?php include('partials/footer.php')?>