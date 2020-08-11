<?php
    require_once('includes/connection.php');
    if(isset($_SESSION['login_time']))
    {
        $login_time = $_SESSION['login_time'];
        $current_time = time();
        if($current_time - $login_time > 3000)
        header('Location: logout.php'); // session timeout
    }
    else header('Location: logout.php');

if(isset($_POST['createshop']))
{
  // Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.
	$shopcategory = $_POST['shopcategory'];
	$shopcategory = mysqli_real_escape_string($con, $shopcategory);

  $shopName = $_POST['shopName'];
  $shopName = mysqli_real_escape_string($con, $shopName);

  $shopNumber = $_POST['shopNumber'];
  $shopNumber = mysqli_real_escape_string($con, $shopNumber);

  $area = $_POST['area'];
  $area = mysqli_real_escape_string($con, $area);

  $city = $_POST['city'];
  $city = mysqli_real_escape_string($con, $city);

  $state = $_POST['state'];
  $state = mysqli_real_escape_string($con, $state);

  $pincode = $_POST['pincode'];
  $pincode = mysqli_real_escape_string($con, $pincode);

  $gstNumber = $_POST['gstNumber'];
  $gstNumber = mysqli_real_escape_string($con, $gstNumber);

  $openHour = $_POST['openHour'];
  $openHour = mysqli_real_escape_string($con, $openHour);

  $closeHour = $_POST['closeHour'];
  $closeHour = mysqli_real_escape_string($con, $closeHour);
  
  $openMin = $_POST['openMin'];
  $openMin = mysqli_real_escape_string($con, $openMin);

  $closeMin = $_POST['closeMin'];
  $closeMin = mysqli_real_escape_string($con, $closeMin);

  $openClock = $_POST['openClock'];
  $openClock = mysqli_real_escape_string($con, $openClock);

  $closeClock = $_POST['closeClock'];
  $closeClock = mysqli_real_escape_string($con, $closeClock);
  
  $openTime = $openHour.":".$openMin." ".$openClock;
  $closeTime = $closeHour.":".$closeMin." ".$closeClock; 

  $bankName = $_POST['bankName'];
  $bankName = mysqli_real_escape_string($con, $bankName);
  
  $ifscCode = $_POST['ifscCode'];
  $ifscCode = mysqli_real_escape_string($con, $ifscCode);
  
  $accHolderName = $_POST['accHolderName'];
  $accHolderName = mysqli_real_escape_string($con, $accHolderName);
  
  $accNumber = $_POST['accNumber'];
	$accNumber = mysqli_real_escape_string($con, $accNumber);

  //getting seller id from session
  $sellerid=$_SESSION['seller_id'];

  $query = "INSERT INTO `seller_shop` (`shop_id`, `seller_id`, `shop_category_id`, `shop_name`, `shop_number`, `area`, `city`, `state`, `pincode`, `gst_number`, `open_time`, `close_time`, `bank_name`, `ifsc_code`, `account_holder_name`, `account_number`) VALUES (NULL, '$sellerid', '$shopcategory', '$shopName', '$shopNumber', '$area', '$city', '$state', '$pincode', '$gstNumber', '$openTime', '$closeTime', '$bankName', '$ifscCode', '$accHolderName', '$accNumber')";
  mysqli_query($con, $query) or die(mysqli_error($con));
  $user_id = mysqli_insert_id($con);
  header('location: seller_view_shops.php');
	//if values inserted correctly seller redirected to view shops page
}
?>

<html>
<head>
    <title>Dashboard | Zarurat.in</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/dashboard_header.css">
    <link rel="stylesheet" type="text/css" href="public/css/seller_footer.css">
    <link rel="stylesheet" type="text/css" href="public/css/seller_dashboard.css">
    <script src="public/javascript/seller_dashboard.js"></script>
</head>
<body>
    <?php require 'includes/dashboard_header.php'; ?>
    <div class="wrapper">
    <?php
        $sql = "SELECT * FROM seller_shop WHERE seller_id='$_SESSION[seller_id]'";
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        if($result->num_rows > 0 && !isset($_GET['register']))
            header('Location: seller_view_shops.php');
    ?>
            <div class="register-shop-btn">
    			<button  onclick="showShopTypes()">Register your Shop</button>
    		</div>
        
        <div class="main-bar-container">
          <div class="percentage-bar-container">
            <div id="percentage-bar">0%</div>
          </div>
        </div>
        <!-- Radio Buttons-->
            <div class="shop-form-container">
              	<form id="shop-info" method="post">
              		<div class="shop-type-container">
                      <div style="display:flex;justify-content: flex-end;">
                        <i  style="font-size: 20px;" class="fa fa-shopping-bag"></i>&nbsp; Shop Category
                      </div>
                      <div class="shops-type">
                    			<div class="radio-toolbar">
            	    					<input type="radio" id="radiokirana" name="shopcategory" value="1" checked>
            	    						<label for="radiokirana">Kirana</label>

            	    					<input type="radio" id="radiodairy" name="shopcategory" value="2">
            	    						<label for="radiodairy">Dairy</label>

            	    					<input type="radio" id="radiomedicine" name="shopcategory" value="3">
            	    						<label for="radiomedicine">Medical</label>
            					    </div>
                      </div> 
                      <div class="div-btn-container">
                         <div onclick="showShopDetails()" class="div-btn">Next <i class="fa fa-arrow-right"></i></div>
                      </div> 
                  </div>
              		<div class="shop-details">
                      <div style="display:flex;justify-content: space-between;">
                        <label><i id="back-icon" onclick="goBackToShopType()"class="fa fa-arrow-left"></i></label> 
                        <label><i style="font-size: 20px;" class="fa fa-edit"></i> &nbsp;Shop Details</label>
                      </div>
                      <div>
                          <div>
                            <input oninput="checkShopDetails()" class="input-style" type="text" name="shopName" placeholder="Shop Name">
                          </div>
                          <div>
                            <input oninput="checkShopDetails()" class="input-style" type="text" name="shopNumber" placeholder="Shop No" required>
                          </div>
                          <div>
                            <input oninput="checkShopDetails()" class="input-style" type="" name="area" placeholder="Area" required>
                          </div>
                          <div>
                            <input oninput="checkShopDetails()" class="input-style" type="" name="city" placeholder="City" required>
                          </div>
                          <div>
                            <select class="state-select" name="state" required="true" >
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
                          </div>
                          <div>
                            <input oninput="checkShopDetails()" class="input-style" type="number" name="pincode" placeholder="Pincode" required>
                          </div>
                          <div>
                            <input oninput="checkShopDetails()" class="input-style" type="text" name="gstNumber" placeholder="GST Number" required>
                          </div>
                          <div>
                            <div class="time-container">
                              <label>Shop Open Time : &nbsp;</label>
                              <select name="openHour" required>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                              </select>
                              <select name="openMin" required>
                                <option>00</option>
                                <option>30</option>
                              </select>
                              <select name="openClock" required>
                                <option>AM</option>
                                <option>PM</option>
                              </select>
                            </div>
                            <div class="time-container">
                              <label>Shop Close Time : &nbsp;</label>
                              <select name="closeHour" required>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                              </select>
                              <select name="closeMin" required>
                                <option value="00">00</option>
                                <option value="30">30</option>
                              </select>
                              <select name="closeClock" required>
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                              </select>
                            </div>   
                          </div>
                       </div>   
                       <div class="div-btn-container">
                         <div onclick="showBankDetails()" class="div-btn">Next <i class="fa fa-arrow-right"></i></div>
                      </div> 
                  </div>
                  <div class="bank-details">
                    <div>
                      <div style="display:flex;justify-content: space-between;">
                        <label><i id="back-icon" onclick="goBackToShopDetails()"class="fa fa-arrow-left"></i></label>
                        <label><i style="font-size: 20px;" class="fa fa-bank"></i>&nbsp; Bank Details</label>
                      </div>
                      
                      <div>
                          <input oninput="checkBankDetails()" class="input-style" type="text" name="bankName" placeholder="Bank Name" required>
                      </div>
                      <div>
                          <input oninput="checkBankDetails()" class="input-style" type="number" name="ifscCode" placeholder="IFSC code" required>
                      </div>
                      <div>
                          <input oninput="checkBankDetails()" class="input-style" type="text" name="accHolderName" placeholder="Account Holder Name" required>
                      </div>
                      <div>
                          <input oninput="checkBankDetails()" class="input-style" type="number" name="accNumber" placeholder="Account Number" required>
                      </div>
                      <div >
                        <input id="create-button" type="submit" name="createshop" value="Create Shop">
                      </div>
                    </div>
                  </div>
              	</form>
            </div>

    </div>
    <?php require 'includes/seller_footer.php'; ?>
</body>
</html>