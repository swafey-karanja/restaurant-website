<?php
session_start();

?>

<html>

<head>

    <title>Admin log in page</title>
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>

    
  
    <div class="log-in">
    <h1 class="text-align">LOG-IN PAGE</h1>

    <?php
    if(isset($_SESSION['log-in']))
    {
        echo $_SESSION['log-in'];
        unset($_SESSION['log-in']);
    }
    if(isset($_SESSION['usernotloggedin']))
    {

        echo $_SESSION['usernotloggedin'];
        unset($_SESSION['usernotloggedin']);
    }
    ?>

    <br><br>

    <!-- log in form-->
    <form action="" method="POST" class="text-align">

    <label for="username">Username:</label><br>
    <input  type="text" name="username" >

    <br><br>

    <label for="password">Passwaad:</label><br>
    <input  type="password" name="password">

    <br> <br>

    <input c type="submit" name="submit" value="log-in" class="btn-add text-align">

    </form>

    <p class="text-align">xxxxxxxxx</p>

    </div>
</body>


</html>

<?php

//check if the submit button has been clicked
if(isset($_POST['submit']))
{

    //1.process the form
   $username = $_POST['username'];
   $password = md5($_POST['password']);

   //2.check whether the user loging in exists

   $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

   //3.execute the query

   $conn = mysqli_connect ('localhost', 'root', '') or die(mysqli_error());//database connection
   $db_select= mysqli_select_db($conn, 'food-order') or die(mysqli_error());//database select

   $res = mysqli_query($conn,$sql);

   //4. count the number of rows to check whether the user exists
   $count = mysqli_num_rows($res);


   if($count==1)
   {
       //user exists and log in success
       $_SESSION['log-in']= "<div class='text-align'>log in successful</div>";
       $_SESSION['user']= $username;//to check whether the user is logged in or not

       //redirect
       header("location:".'http://localhost/new/admin/index.php');
      
   }
   else
   {
       //user doesnt exists and log in unsuccessful
       //user exists and log in success
       $_SESSION['log-in']= "<div class='text-align'>log in failed</div>";
       //redirect
       header("location:".'http://localhost/new/admin/log-in.php');


   }

}


?>