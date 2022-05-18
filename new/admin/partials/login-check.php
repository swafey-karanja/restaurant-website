<?php

//session_start();


//authorization check-access control
if(!isset($_SESSION['user']))//if session is not set
{
    //redirect to log in page if user is not logged in
    $_SESSION['usernotloggedin'] = "<div class='text-align'> please log in </div>";

    //redirect
    header("location:".'http://localhost/new/admin/log-in.php');

}


?>