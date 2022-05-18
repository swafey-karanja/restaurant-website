<?php

//connecting to the database

$conn = mysqli_connect ('localhost', 'root', '') or die(mysqli_error());//database connection
$db_select= mysqli_select_db($conn, 'food-order') or die(mysqli_error());//database select

//1.get the id of the admin to be deleted

 $id = $_GET['id'];

//2.create an sql query to delete admin

$sql = "DELETE FROM tbl_admin WHERE id=$id";

//executing the query

$res = mysqli_query($conn,$sql);

if($res==TRUE)
{
    //redirect to manage admin page
    $_SESSION['delete'] = "admin deleted succesfully";
    header('location:'.'http://localhost/new/admin/manage.php');
}
else
{
    $_SESSION['delete'] = "failed to delete admin";
    header('location:'.'http://localhost/new/admin/manage.php');
}


?>