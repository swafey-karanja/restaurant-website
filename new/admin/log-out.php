<?php
 

 include('..configure/configfiles.php'); 

//1.destroy session
session_destroy();//unsets $_SESSION['user]

//2.redirect

header("location:".'http://localhost/new/admin/log-in.php');

?>