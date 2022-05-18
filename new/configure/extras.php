    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "food-order";

    $conn = mysqli_connect ('localhost', 'root', '','food-order') or die(mysqli_error());//database connection
    $db_select= mysqli_select_db($conn, 'food-order') or die(mysqli_error());//database select


    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    <div class="food-menu-box2">
                    <div class="food-menu-img">
                        <img src="images/vegetable.jpg" class="float-img img-curve">
                    </div>

                    <div class="food-menu-desc">
                    <h4>Vegetable package</h4>

                    <p class="package-price">Ksh.1000</p>
                    <p class="package-desc">one large sized pizza with a two litre coke</p>
                    <br>
                    <a href="order.php" class="btn-style">order now</a>


                    </div>
                    <div class="clearfix"></div>
                </div>
                
                

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/burger.jpg" class="float-img img-curve">
                    </div>

                    <div class="food-menu-desc">
                    <h4>Burger package</h4>

                    <p class="package-price">Ksh.1000</p>
                    <p class="package-desc">one large sized pizza with a two litre coke</p>
                    <br>
                    <a href="order.php" class="btn-style">order now</a>


                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="food-menu-box2">
                    <div class="food-menu-img">
                        <img src="images/cake.jpg" class="float-img img-curve">
                    </div>

                    <div class="food-menu-desc">
                    <h4>Cake package</h4>

                    <p class="package-price">Ksh.1000</p>
                    <p class="package-desc">one large sized pizza with a two litre coke</p>
                    <br>
                    <a href="order.php" class="btn-style">order now</a>


                    </div>
                    <div class="clearfix"></div>
                </div> 

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/chicken.jpg" class="float-img img-curve">
                    </div>

                    <div class="food-menu-desc">
                    <h4>Chicken package</h4>

                    <p class="package-price">Ksh.1000</p>
                    <p class="package-desc">one large sized pizza with a two litre coke</p>
                    <br>
                    <a href="order.php" class="btn-style">order now</a>


                    </div>
                    <div class="clearfix"></div>
                </div> 

                <div class="food-menu-box2">
                    <div class="food-menu-img">
                        <img src="images/fried-food.jpg" class="float-img img-curve">
                    </div>

                    <div class="food-menu-desc">
                    <h4>Fries package</h4>

                    <p class="package-price">Ksh.1000</p>
                    <p class="package-desc">one large sized pizza with a two litre coke</p>
                    <br>
                    <a href="order.php" class="btn-style">order now</a>

                    </div>
                    <div class="clearfix"></div>
                </div> 

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/fruits.jpg" class="float-img img-curve">
                    </div>

                    <div class="food-menu-desc">
                    <h4>Fruits package</h4>

                    <p class="package-price">Ksh.1000</p>
                    <p class="package-desc">one large sized pizza with a two litre coke</p>
                    <br>
                    <a href="order.php" class="btn-style">order now</a>


                    </div>
                    <div class="clearfix"></div>
                </div> 

                <div class="food-menu-box2">
                    <div class="food-menu-img">
                        <img src="images/icecream.jpg" class="float-img img-curve">
                    </div>

                    <div class="food-menu-desc">
                    <h4>Icecream package</h4>

                    <p class="package-price">Ksh.1000</p>
                    <p class="package-desc">one large sized pizza with a two litre coke</p>
                    <br>
                    <a href="order.php" class="btn-style">order now</a>

                    </div>
                    <div class="clearfix"></div>
                </div> 

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/pork.jpg" class="float-img img-curve">
                    </div>

                    <div class="food-menu-desc">
                    <h4>Pork package</h4>

                    <p class="package-price">Ksh.1000</p>
                    <p class="package-desc">one large sized pizza with a two litre coke</p>
                    <br>
                    <a href="order.php" class="btn-style">order now</a>

                    </div>
                    <div class="clearfix"></div>
                </div> 

                <div class="food-menu-box2">
                    <div class="food-menu-img">
                        <img src="images/roast-meat.jpg" class="float-img img-curve">
                    </div>

                    <div class="food-menu-desc">
                    <h4>Roasted meat package</h4>

                    <p class="package-price">Ksh.1000</p>
                    <p class="package-desc">one large sized pizza with a two litre coke</p>
                    <br>
                    <a href="order.php" class="btn-style">order now</a>

                    </div>


                    <section class="form-box">
        <div class="order-form ">
          
            <form class="form" action="index.php" method="post" target="_self">

                <label for="food package">Food package:&nbsp;</label>
                      <select size="1.2">
                         <option>pizza package</option>
                         <option>vegetable package</option>
                         <option>burger package</option>
                         <option>cake package</option>
                         <option>chiken package</option>
                         <option>fries package</option>
                         <option>fruits package</option>
                         <option>ice-cream package</option>
                         <option>pork package</option>
                         <option>roasted meat package</option>

         
                      </select><br><br>

                <label for="packages">Number of packages (1-20):</label><br>

                <input type="number" id="packages" name="packages" min="1" max="20" required><br><br>
      
                
                <label  for="firstname">First name</label><br>
                <input type="text" size="50" maxheight="5" name="fname" required><br>

                <label for="lastname">Last name</label><br>
                <input type="text" size="50" name="lname" required><br>

                <label for="emailaddress">Email address</label><br>
                <input type="email"  size="50" name="email" required><br>

                <label for="phonenumber">Phone number</label><br>
                <input type="tel"  size="50" name="phone" required><br>

                <label for="address">Adress</label><br>
                <input type="text" size="50" name="address" ><br><br>

               

                <input class="btn-style" type = "submit" name = "submit" value = "Submit" />
                <input class="btn-style" type = "reset" name = "clear" value = "reset" />
                
             
            </form>

        </div>
    </section>
