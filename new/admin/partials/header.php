<?php 

include('configure/config.php'); 
session_start();


//authorization check-access control
//if(!isset($_SESSION['user']))//if session is not set
//{
    //redirect to log in page if user is not logged in
   // $_SESSION['usernotloggedin'] = "<div class='text-align'>please log in </div>";

    //redirect
   // header("location:".'http://localhost/new/admin/log-in.php');

//}


?>

<html>


    <head>
       <title>Food order website management section</title>
       <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
       <!--menu section starts here-->
          <div class="menu">
              <div class="wrapper">
                  <ul>

                      <li><a href="index.php">Home</a></li>
                      <li><a href="manage.php">Admin</a></li>
                      <li><a href="food-manage.php">Food</a></li>
                      <li><a href="category-manage.php">Category</a></li>
                      <li><a href="order-manage.php">Order</a></li>
                      <li><a href="log-out.php">Log-out</a></li>
                    
                  </ul>
              </div>
          </div>
       <!--menu section ends here-->