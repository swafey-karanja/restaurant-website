<?php include('configure/config.php');?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESTAURANT WEBSITE
    </title>
    <link rel="stylesheet" href="css/styleindex.css">
</head>
<body>
    <!-- navbar section starts here-->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <img src="images/logo.jpg"  alt="logo" height="80" class="img.responsive">
            </div>
        
            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL;?>">Home</a>
                    </li>

                    <li>
                        <a href="<?php echo SITEURL;?>menu.php">Menu</a>
                    </li>

                    <li>
                        <a href="<?php echo SITEURL;?>food-categories.php">Categories</a>
                    </li>
                    
                    <li>
                        <a href="contacts.php">Contacts</a>
                    </li>
                    
                </ul>
            </div>
       
        <div class="clearfix"></div>
    </div>
    </section>
    <!--navbar section ends here-->