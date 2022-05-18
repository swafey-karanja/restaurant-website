<?php include('partials/header.php');?>

<?php 

    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "food-order";

    $conn = mysqli_connect ('localhost', 'root', '','food-order') or die(mysqli_error());//database connection
    $db_select= mysqli_select_db($conn, 'food-order') or die(mysqli_error());//database select

    
    include('../configure/config.php');

    //echo "Delete Food Page";

    if(isset($_GET['id']) && isset($_GET['image_name'])) //Either use '&&' or 'AND'
    {
        //Process to Delete
        //echo "Process to Delete";

        //1.  Get ID and Image NAme
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //2. Remove the Image if Available
        //CHeck whether the image is available or not and Delete only if available
        if($image_name != "")
        {
            // IT has image and need to remove from folder
            //Get the Image Path
            $path = "../images/".$image_name;

            //REmove Image File from Folder
            $remove = unlink($path);

            //Check whether the image is removed or not
            if($remove==false)
            {
                //Failed to Remove image
                $_SESSION['upload'] = "Failed to Remove Image File.";
                //REdirect to Manage Food
                header('location:'.'http://localhost/new/admin/food-manage.php');
                //Stop the Process of Deleting Food
                die();
            }

        }

        //3. Delete Food from Database
        $sql = "DELETE FROM tbl_food WHERE id=$id";
        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //CHeck whether the query executed or not and set the session message respectively
        //4. Redirect to Manage Food with Session Message
        if($res==true)
        {
            //Food Deleted
            $_SESSION['delete'] = "Food Deleted Successfully";
            header('location:'.'http://localhost/new/admin/food-manage.php');
        }
        else
        {
            //Failed to Delete Food
            $_SESSION['delete'] = "Failed to Delete Food.";
            header('location:'.'http://localhost/new/admin/food-manage.php');
        }

        

    }
    else
    {
        //Redirect to Manage Food Page
        //echo "REdirect";
        $_SESSION['unauthorize'] = "Unauthorized Access.";
        header('location:'.'http://localhost/new/admin/food-manage.php');
    }

?>


<?php include('partials/footer.php');?>