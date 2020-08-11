<?php
    require_once('includes/connection.php');
   
    if(isset($_COOKIE['seller_email']) && !isset($_GET['home']))
    {
        $_SESSION['seller_email'] = $_COOKIE['seller_email'];
        $_SESSION['seller_id'] = $_COOKIE['seller_id'];
        $_SESSION['seller_name'] = $_COOKIE['seller_name'];
        header('Location: seller_dashboard.php');
    }
?>
<html>
<head>
    <title>Seller Home | Zarurat.in</title>
    <script src="public/javascript/seller_home.js"></script>
    <link rel="stylesheet" type="text/css" href="public/css/seller_home.css">   <!-- seller page CSS -->
    <link rel="stylesheet" type="text/css" href="public/css/seller_headers.css"> <!-- seller header CSS -->
    <link rel="stylesheet" type="text/css" href="public/css/seller_footer.css"> <!-- seller footer CSS -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php require 'includes/seller_header.php'; ?>  <!-- header -->
    <!-- form popup -->  
<div class="seller-signin-signup-popup">
                <div class="close-icon-container">
                    <i onclick="closeFormPopup();" id="seller-form-close-icon" style="font-size: 27px;" class="fa fa-close"></i>
                </div>
                <div class="popup-intro">
                    <label id="register-label"  onclick="showRegistrationForm()">Register</label>
                    <label id="login-label"  onclick="showLoginForm()">Sign In</label>
                </div>
                <div class="register-form-container">
                    <form action="" method="post">
                        <div class="form-field-container">
                            <input class="input-style" type="text" name="name" placeholder="Name" required="true">
                        
                            <input class="input-style" type="number" name="contact" placeholder="Contact" required="true">
                        
                            <input class="input-style" type="Email" name="email" placeholder="Email" required="true">
                        
                            <input class="input-style" type="text" name="house" placeholder="Flat, House no., Building, Company, Apartment: " required="true">
                        
                            <input class="input-style" type="text" name="area" placeholder="Area, Colony, Street, Sector, Village:" required="true">
                        
                            <input class="input-style" type="text" name="landmark" placeholder="Landmark e.g. near apollo hospital:" required="true">
                        
                        
                            <input class="input-style" type="text" name="city" placeholder=" Town/City:" required="true">
                        
                            <select class="select-field" name="state" required="true" >
                                <option value disabled selected>--Select State--</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                        
                            <input class="input-style" type="number" name="pincode" placeholder="Pincode" required="true">
                        
                            <input class="input-style" type="text" name="pan" placeholder="Pan Number" required="true">
                        
                            <input class="input-style" id="password" type="password" name="password" placeholder="Password" required="true">
                        
                            <input class="input-style" id="confirm_password" type="password" name="confpassword" placeholder="Confirm Password" required="true">
                        
                            <input class="submit-style" type="submit" value="Sign Up" name="signup">
                        </div>
                    </form>
                </div>
                <div class="login-form-container">
                    <form action="" method="post">
                        <div class="form-field-container">
                            <div class="signin-intro">Sign In as Owner</div>
                            <input class="input-style" name="signinemail-mobile" type="text" placeholder="E-mail/Mobile Number">
                            <input class="input-style" name="signinpass" type="password" placeholder="Password">
                            <div class="checkbox-container">
                                <div style="display : flex;flex-direction : row; align-items : center;"><input style="margin-right : 10px;" type="checkbox" name="remember"> Remember me </div>
                                <a href="" style="font-size : 15px; color : blue;">Forgot Password?</a>
                            </div>
                            <input name="signin" type="submit" class="submit-style" value="Sign In">
                        </div>  
                    </form>

                    <form action="" method="post">
                        <div class="form-field-container">
                            <div class="signin-intro">Sign In as User</div>
                            <input class="input-style" name="username" type="text" placeholder="Username">
                            <input class="input-style" name="password" type="password" placeholder="Password">
                            <div class="checkbox-container">
                                <div style="display : flex;flex-direction : row; align-items : center;"><input style="margin-right : 10px;" type="checkbox" name="remember"> Remember me </div>
                                <a href="" style="font-size : 15px; color : blue;">Forgot Password?</a>
                            </div>
                            <input name="signin-user" type="submit" class="submit-style" value="Sign In">
                        </div>
                    </form>

                    <div class="quotes">
                        <label>Successfull people Never worry about what others are doing.</label>
                    </div>    
                    
                </div>
                <label id="form-message">
                    <?php
                        if(isset($_SESSION['failure']))
                        {
                            echo $_SESSION['failure'];
                            unset($_SESSION['failure']);
                        }
                    ?>
                </label>
                
        </div>
        <!-- form popup -->
    <div class="wrapper">  <!-- wrapper -->
        <div class="intro-banner">
            <div class="intro-banner-left">
                <label>Sell your products to Thousands of customers across Your City</label>
                <button>Start Selling</button>
            </div>
            <div class="intro-banner-right">
                <img src="images/rupee_bag.png" alt="">
                <label>Expand your business with Zarurat.in</label>
            </div>
        </div>
      
        <div class="banner-benefits-intro">Seller Benefits</div>
	    <div class="banner-benefits">
		    <div class="inner-benefits">
                <div class="one">
                    <label>Secure Payments, Regularly</label>
                    <img src="images/payment.png" alt="">
                    <label class="benefit-info">Funds are safely deposited directly to your bank account</label>
                </div>
                <div class="two">
                    <label for="">Ship Your Orders strees-Free</label>
                    <i style="font-size : 120px" class="fa fa-truck"></i>
                    <label class="benefit-info">Whether you choose Fulfillment by Zarurat (FBA) or Easy Ship, let us take care of delivering your products.</label>
                </div>
                <div class="three">
                    <label for="">Services to Help you through every step</label>
                    <i style="font-size : 120px" class="fa fa-gear"></i>
                    <label class="benefit-info">Get paid support from Zarurat empanlled third party professionals for product photography, account management and much more</label>
                </div>
		    </div>
        </div>

        <div class="how-to-sell-intro"><label>How selling on Zarurat works</label></div>
        <div class="selling-procedure">
            <div class="procedure-details">
                <div class="up">
                    <div>
                        <label>Become a seller and list your products on zarurat</label>
                        <img src="images/laptop.jpg" alt="">
                        <span>It only takes 15 minutes to set up your seller account, which has a host of selling benefits</span>
                    </div>
                    <div>
                        <label>Customers & businesses place orders for your products</label>
                        <img src="images/order.jpg" alt="">
                        <span>We have a range of options to help you kick-start your business, whether it's advertising or support for Zarurat sellers</span>
                    </div>
                </div>
                <div class="down">
                    <div>
                        <label>Deliver your product to the customer</label>
                        <img src="images/delivery.png" alt="">
                        <span>With FBA and Easy Ship, Zarurat handles delivery. You can also deliver the product yourself to nearby pincodes & unlock Local Shops benefits. Learn about delivering Zarurat orders</span>
                    </div>
                    <div>
                        <label>You get paid for your sales</label>
                        <img src="images/get_paid.png" alt="">
                        <span>Funds from your sales will be deposited in your bank account (deducting Zarurat fees) every 7 days. Try calculating your profitability</span>
                    </div>
                </div>
            </div>
        </div>

      
    </div> <!-- wrapper end -->
    
    <?php require 'includes/seller_footer.php'; ?>  <!-- footer -->
</body>
</html>

<?php
    if(isset($_POST['signin-user'])){
        $username = $_POST['username'];
        $username = mysqli_real_escape_string($con, $username);
        $password = $_POST['password'];
        $password = mysqli_real_escape_string($con, $password);
        
        if(!empty($username) && !empty($password)){
            $sql = "SELECT * FROM shop_user WHERE shop_username='$username' AND shop_password='$password'";
            $result = mysqli_query($con,$sql) or die(mysqli_error($con));
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                $_SESSION['shop_user_name'] = $row['name'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['shop_id'] = $row['shop_id']; 
                ?>
                <script>location.href="orders.php?shopID=<?php echo base64_encode($row['shop_id']);?>";</script>
                <?php
            }
            else echo "<script>alert('Incorrect username or password!');</script>";
        }

    }
    else if(isset($_POST['signin']))
    {
        ?>
            <script>showSellerSigninSignupPopup(2);</script>
        <?php
        $signinemailmobile = $_POST['signinemail-mobile'];
	    $signinemailmobile = mysqli_real_escape_string($con, $signinemailmobile);

	    $signinpass = $_POST['signinpass'];
	    $signinpass = mysqli_real_escape_string($con, $signinpass);
	    $signinpass = MD5($signinpass);
        
		// Query checks if the email / mobile number and password are present in the database.
	    $query = "SELECT seller_id, seller_email, seller_name FROM seller_reg_personal WHERE (seller_email='" . $signinemailmobile . "' OR seller_contact='" . $signinemailmobile . "') AND seller_password='" . $signinpass . "'";
	    $result = mysqli_query($con, $query)or die(mysqli_error($con));
        $num = mysqli_num_rows($result);
        
        if($num == 1)
        {
            if(isset($_POST['remember']))  // remeber me
            {
                $row = mysqli_fetch_array($result);
                $_SESSION['seller_email'] = $row['seller_email'];
                $_SESSION['seller_id'] = $row['seller_id'];
                $_SESSION['seller_name'] = $row['seller_name'];
                $_SESSION['login_time'] = time();
                setcookie('seller_email',$row['seller_email'],time() + 3600,'/');
                setcookie('seller_id',$row['seller_id'],time() + 3600,'/');
                setcookie('seller_name',$row['seller_name'],time() + 3600,'/');
                ?>
                    <script>location.href='seller_dashboard.php';</script>
                <?php
            }
            else {
                $row = mysqli_fetch_array($result);
                $_SESSION['seller_email'] = $row['seller_email'];
                $_SESSION['seller_id'] = $row['seller_id'];
                $_SESSION['seller_name'] = $row['seller_name'];
                $_SESSION['login_time'] = time();
                ?>
                    <script>location.href='seller_dashboard.php';</script>
                <?php
            }

        }
        else{
            $_SESSION['failure'] = 'Please enter correct E-mail id / Mobile Number or Password';
        }

    }
    else if (isset($_POST['signup'])) {
        ?>
        <script>showSellerSigninSignupPopup(1);</script>
        <?php
      
            if($_POST['password'] != $_POST['confpassword'])
            {
                $_SESSION['failure'] = 'Password not matched';
                header('Location: seller_home.php');
                return ;
            }
      
            $name = $_POST['name'];
            $name = mysqli_real_escape_string($con, $name);
      
            $email = $_POST['email'];
            $email = mysqli_real_escape_string($con, $email);
      
            $password = $_POST['password'];
            $password = mysqli_real_escape_string($con, $password);
            $password = MD5($password);
      
            $contact = $_POST['contact'];
            $contact = mysqli_real_escape_string($con, $contact);
      
            $house = $_POST['house'];
            $house = mysqli_real_escape_string($con, $house);
            
            $area = $_POST['area'];
            $area = mysqli_real_escape_string($con, $area);
      
            $city = $_POST['city'];
            $city = mysqli_real_escape_string($con, $city);
      
            $landmark = $_POST['landmark'];
            $landmark = mysqli_real_escape_string($con, $landmark);
      
            $state = $_POST['state'];
            $state = mysqli_real_escape_string($con, $state);
      
            $pincode = $_POST['pincode'];
            $pincode = mysqli_real_escape_string($con, $pincode);
            
            $pan = $_POST['pan'];
            $pan = mysqli_real_escape_string($con, $pan);
      
            $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
            $regex_num = "/^[6789][0-9]{9}$/";
            $regex_pin = "/^[0-9]{6}$/";
      
            //query checking if user already Exists
            $query = "SELECT * FROM seller_reg_personal WHERE seller_email='$email'";
            $result = mysqli_query($con, $query)or die(mysqli_error($con));
            $num = mysqli_num_rows($result);
      
         //Data Validation and passing error messages
          if ($num != 0) {
                  $_SESSION['failure']="Email Already Exists";
      
        } else if (!preg_match($regex_email, $email)) {
                  $_SESSION['failure']="Not a valid Email Id";
      
        } else if (!preg_match($regex_num, $contact)) {
                  $_SESSION['failure']="Not a valid phone number";
      
        }else if (!preg_match($regex_pin, $pincode)) {
              $_SESSION['failure']="Not a valid pincode";
        } else {
              //Query inserts values into signup page
              $query = "INSERT INTO `seller_reg_personal` (`seller_id`, `seller_name`, `seller_contact`, `seller_email`, `seller_home`, `seller_area`, `seller_landmark`, `seller_city`, `seller_state`, `seller_pincode`, `seller_pan_number`, `seller_password`) VALUES (NULL, '$name', '$contact', '$email', '$house', '$area', '$landmark', '$city', '$state', '$pincode', '$pan', '$password')";
              mysqli_query($con, $query) or die(mysqli_error($con));
              $user_id = mysqli_insert_id($con);
              $_SESSION['email'] = $email;
              $_SESSION['seller_id'] = $user_id;
              $_SESSION['seller_name'] = $name;
              header('location: seller_dashboard.php');
        }
      }
      
?>


        