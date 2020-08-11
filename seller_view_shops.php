<!-- Model -->

<?php
	require_once('includes/connection.php');
	//Logged out user redirected to home page
	$seller_id = $_SESSION['seller_id'];
	//getting all the value of a shop
	$sql = "SELECT * FROM seller_shop JOIN shop_category on seller_shop.shop_category_id=shop_category.shop_category_id WHERE seller_id='$seller_id'";
	$result = mysqli_query($con,$sql);
?>

<!-- View -->

<!DOCTYPE html>
<html>
<head>
	<title>Seller View All Shops | Zarurat.in</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/dashboard_header.css">
	<link rel="stylesheet" type="text/css" href="public/css/seller_view_shops.css">
	<link rel="stylesheet" type="text/css" href="public/css/seller_footer.css">
	<script type="text/javascript">
		function shopDeletionConfirmation()
		{
			var x = confirm("Are you sure !");
			if(x)
				return true;
			else return false;
		}
		function showEmptyLabel(num){
			document.getElementsByClassName('empty-shop')[num].style.display = "block";
		}
		function hideEmptyLabel(num){
			document.getElementsByClassName('empty-shop')[num].style.display = "none";
		}
		function showAssignLabel(num){
			document.getElementsByClassName('assign-shop')[num].style.display = "block";
		}
		function hideAssignLabel(num){
			document.getElementsByClassName('assign-shop')[num].style.display = "none";
		}
		function showAssignShopPopup(shopID,shopName,name,username,password)
		{
			document.getElementsByClassName('assign-shop-popup')[0].style.display = 'block';
			document.getElementById('assign-shopID').value = shopID;
			document.getElementById('shopName').innerHTML = shopName;
			document.getElementsByClassName('section')[0].style.display = 'block';
			var x = document.getElementById('assign-shop-form').getElementsByTagName('input');
			x[0].value = name;
			x[1].value = username;
			x[2].value = password;
			if(name=='' && username=='' && password ==''){
				document.getElementById('remove-user').style.display = 'none';
			}
			else{
				document.getElementById('remove-user').style.display = 'block';
			}
		}
		function hideAssignShopPopup(){
			document.getElementsByClassName('assign-shop-popup')[0].style.display = 'none';
			
			document.getElementsByClassName('section')[0].style.display = 'none';

		}
		function submitAssignForm(){

			var x = document.getElementById('assign-shop-form').getElementsByTagName('input');
			var control = 1;
			for(var i=0;i<x.length;i++){
				if(x[i].value == ''){
					control = 0;
					break;
				}
			}
			if(control == 1)
				document.getElementById('assign-shop-form').submit();
			else alert('Enter username and password !');
		}
		function removeShopUser(){
			var shopID = document.getElementById('assign-shopID').value;
			var url = 'seller_view_shops.php?removeuser=true&shopID='+shopID;

			var control = confirm('Are you sure!');
			if(control)
			location.href=url;
			
		}
		function confirmShopEmpty(){
			var t = confirm('Are you sure!');
			if(t)
				return true;
			else return false;
		}
		function showUpdateShopDetailsPopup(shopID,name,number,area,city,state,pincode,otime,ctime,bankName,ifsc,holderName,accNumber){
			document.getElementsByClassName('update-shop-popup')[0].style.display = 'block';
			document.getElementsByClassName('section')[0].style.display = 'block';
			var x = document.getElementById('update-shop-form').getElementsByTagName('input');
			x[0].value = shopID;
			x[1].value = name;
			x[2].value = number;
			x[3].value = area;
			x[4].value = city;
			x[5].value = state;
			x[6].value = pincode;
			x[7].value = otime;
			x[8].value = ctime;
			x[9].value = bankName;
			x[10].value = ifsc;
			x[11].value = holderName;
			x[12].value = accNumber;
		}
		function hideUpdateShopDetailsPopup(){
			document.getElementsByClassName('update-shop-popup')[0].style.display = 'none';
			document.getElementsByClassName('section')[0].style.display = 'none';
		}
	</script>
</head>
<body>

	<?php require 'includes/dashboard_header.php'; ?>
	<?php
		if(isset($_SESSION['message']) && isset($_SESSION['color']))
		{
			echo "<script>show_success('$_SESSION[color]');timer_on();</script>";
			array_pop($_SESSION);
			array_pop($_SESSION);
		}
	?>
	<div class="section">

	</div>
	<div class="assign-shop-popup">
		<div>
			<label style="font-size : 15px; font-weight : bold;">Assign Shop</label>
			<label style="color : #2ecc71;" id="shopName"></label>
			<label style="font-size : 13px;">Using these Credentials one can access your shop.</label>
			<form id="assign-shop-form" action="" method="post">
			<input type="text" name="name" placeholder="Name" required>
			<input type="text" name="username" placeholder="username" required>
			<input  type="text" name="password" placeholder="password" required>
			<input style="display : none;" id="assign-shopID" name="shopID" type="number" required>
			</form>
			<div>
				<div style="dislay : flex; justify-content : flex-start; flex : 1;">
					<label onclick="removeShopUser()" id="remove-user">Remove</label>
				</div>
				<div>
					<label onclick="hideAssignShopPopup()">Cancel</label>
					<label onclick="submitAssignForm()">Assign</label>
				</div>
			</div>
		</div>
	</div>

	<div class="update-shop-popup">
		<div>
			<div class="update-shop-popup-intro">
				<label>Update Shop Details</label>
				<label><i onclick="hideUpdateShopDetailsPopup()" style="font-size : 20px; cursor:pointer;" class="fa fa-close"></i></label>
			</div>
			<form id="update-shop-form" action="" method="post">	
				<input id="update-shop-id" name="shopID" type="number">
				<div>
					<div>
						<label class="label-style">Shop Name</label>
						<input oninput="this.value = this.value.toUpperCase();" class="input-style" name="shopName" type="text">
					</div>
					<div>
						<label class="label-style">Shop Number</label>
						<input class="input-style" name="shopNumber" type="text">
					</div>
				</div>
				<div>
					<div>
						<label class="label-style">Area</label>
						<input class="input-style" name="shopArea" type="text">
					</div>
					<div>
						<label class="label-style">City</label>
						<input class="input-style" name="shopCity" type="text">
					</div>
				</div>
				<div>
					<div>
						<label class="label-style">State</label>
						<input class="input-style" name="shopState" type="text">
					</div>
					<div>
						<label class="label-style">Pincode</label>
						<input class="input-style" name="shopPincode" type="text">
					</div>
				</div>
				<div>
					<div>
						<label class="label-style">Open Time</label>
						<input oninput="this.value = this.value.toUpperCase();" class="input-style" name="shopOpenTime" type="text">
					</div>
					<div>
						<label class="label-style">Close Time</label>
						<input oninput="this.value = this.value.toUpperCase();" class="input-style" name="shopCloseTime" type="text">
					</div>
				</div>
				<div>
					<div>
						<label class="label-style">Bank Name</label>
						<input oninput="this.value = this.value.toUpperCase();" class="input-style" name="bankName" type="text">
					</div>
					<div>
						<label class="label-style">IFSC Code</label>
						<input class="input-style" name="ifscCode" type="text">
					</div>
				</div>
				<div>
					<div>
						<label class="label-style">Account Holder Name</label>
						<input oninput="this.value = this.value.toUpperCase();" class="input-style" name="holderName" type="text">
					</div>
					<div>
						<label class="label-style">Account Number</label>
						<input class="input-style" name="accNumber" type="text">
					</div>
				</div>
				<div class="submit-btn-container">
					<button type="submit" name="updateShop" value="true">Update</button>
				</div>
			</form>
		</div>
	</div>

   <div class="wrapper">

			<?php
			if($result->num_rows==0)
			{
				header('Location: seller_dashboard.php');
				return ;
			}
			if($result->num_rows>0 && !isset($_GET['register']))
			{
			?>

			<div class="allshops">
			<?php
			$i=0;
			//printing all the details in view shop page. All the data of all the shops of a particular seller will be shown in this page
		    	while($row = $result->fetch_assoc())
			   {
				$shopID = base64_encode($row['shop_id']);
				$shopcategoryID = base64_encode($row['shop_category_id']);
				?>

				<div class="shop-card">
					<div class="container-one">
						<div>
							<label class="shopname"><?php echo strtoupper($row['shop_name']);?></label>
							<label>Open Time  <?php echo $row['open_time']; ?></label>
							<label>Close Time  <?php echo $row['close_time']; ?></label>
						</div>
						<div>
							<label><a onclick="return shopDeletionConfirmation()" href="seller_view_shops.php?shopID=<?php echo $row['shop_id']; ?>">Delete Shop</a></label>
							<?php 
								$updateID = $row['shop_id'];
								$shopName = "'".$row['shop_name']."'";
								$shopNumber = "'".$row['shop_number']."'";
								$shopArea = "'".$row['area']."'";
								$shopCity = "'".$row['city']."'";
								$shopState = "'".$row['state']."'";
								$shopPincode = "'".$row['pincode']."'";
								$otime = "'".$row['open_time']."'";
								$ctime = "'".$row['close_time']."'";
								$bankName = "'".$row['bank_name']."'";
								$ifsc = "'".$row['ifsc_code']."'";
								$holderName = "'".$row['account_holder_name']."'";
								$accNumber = "'".$row['account_number']."'";
							?>
							<label style="cursor : pointer;" onclick="showUpdateShopDetailsPopup(<?php echo $updateID;?>,<?php echo $shopName;?>,<?php echo $shopNumber;?>,<?php echo $shopArea;?>,<?php echo $shopCity;?>,<?php echo $shopState;?>,<?php echo $shopPincode;?>,<?php echo $otime;?>,<?php echo $ctime;?>,<?php echo $bankName;?>,<?php echo $ifsc;?>,<?php echo $holderName;?>,<?php echo $accNumber;?>)">Edit&nbsp;
								<i class="fa fa-edit"></i>
							</label>
						</div>

					</div>
					<div class="container-two">
					<label><a href="orders.php?shopID=<?php echo $shopID;?>"><i class="fa fa-archive"></i>&nbsp;Manage Orders</a></label>
					<label style="font-weight : bold;">
							<?php echo $row['shop_category_name'];?>&nbsp;
							<i class="fa fa-shopping-bag icon-style"></i>
					</label>
					</div>
					<div class="container-three">
						<label><a href="seller_view_all_products_in_shop.php?shopID=<?php echo $shopID; ?>&shopcategoryID=<?php echo $shopcategoryID; ?>"><i class="fa fa-eye icon-style"></i>&nbsp;View Products</a></label>
						<label>
						<?php 
							if($row['shop_category_id'] == 1)
							{
								?>
									<a href="kirana_product_list.php?shopID=<?php echo $shopID; ?>&shopcategoryID=<?php echo $shopcategoryID; ?>">Add more items &nbsp;<i class="fa fa-plus-square icon-style"></i></a>
								<?php
							}
						?>

						</label>
					</div>
					<div class="container-four">
						<?php 
							$sql = "SELECT * FROM shop_user WHERE shop_id='$row[shop_id]'";
							$r = mysqli_query($con,$sql) or die(mysqli_error($con));
							if($r->num_rows>0){
								$Row = $r->fetch_assoc();
								$name = "'".$Row['name']."'";
								$username = "'".$Row['shop_username']."'";
								$password = "'".$Row['shop_password']."'";
							}
							else{
								$name = "''";
								$username = "''";
								$password = "''";
							}
						?>
						<?php $shopName = "'".$row['shop_name']."'";?>
						<label style="font-size : 18px;"><a onclick="return confirmShopEmpty();" href="seller_view_shops.php?emptyshop=true&shopID=<?php echo $row['shop_id'];?>"><i onmouseover="showEmptyLabel(<?php echo $i;?>)"  onmouseout="hideEmptyLabel(<?php echo $i;?>)" class="fa fa-trash-o"></i></a>
							<label style="font-size : 13px; color :white;"  class="empty-shop">Empty shop</label>
						</label>
						<label style="font-size : 18px;"><i onclick="showAssignShopPopup(<?php echo $row['shop_id']; ?>,<?php echo $shopName;?>,<?php echo $name;?>,<?php echo $username;?>,<?php echo $password;?>)" onmouseover="showAssignLabel(<?php echo $i;?>)" onmouseout="hideAssignLabel(<?php echo $i;?>)" class="fa fa-user">
							<?php 
								if($r->num_rows>0){
									echo "&nbsp;".$Row['name'];
								}
							?>
							</i>
							<label style="font-size : 13px; color :white;"  class="assign-shop">Assign shop to User</label>
						</label>
					</div>
				</div>


				<?php
				$i++;
			}
			?>
			</div>
		<?php
		}
		else{
			//if no shops being registered
			?>
			<h1 style="display: flex; justify-content: center; align-items: center; height: 55vh;"class="message">Shop Not Registered</h1>
			<?php
		}
		?>
		</div>
		<div class="info">
			
		</div>
	<?php include 'includes/seller_footer.php'; ?>
</body>
</html>


<?php
  if(isset($_POST['updateShop'])){
	$shopID = $_POST['shopID'];
	$shopID = mysqli_real_escape_string($con, $shopID);
	$shopName = $_POST['shopName'];
	$shopName = mysqli_real_escape_string($con, $shopName);
	$shopNumber = $_POST['shopNumber'];
	$shopNumber = mysqli_real_escape_string($con, $shopNumber);
	$shopArea = $_POST['shopArea'];
	$shopArea = mysqli_real_escape_string($con, $shopArea);
	$shopCity = $_POST['shopCity'];
	$shopCity = mysqli_real_escape_string($con, $shopCity);
	$shopState = $_POST['shopState'];
	$shopState = mysqli_real_escape_string($con, $shopState);
	$shopPincode = $_POST['shopPincode'];
	$shopPincode = mysqli_real_escape_string($con, $shopPincode);
	$shopOpenTime = $_POST['shopOpenTime'];
	$shopOpenTime = mysqli_real_escape_string($con, $shopOpenTime);
	$shopCloseTime = $_POST['shopCloseTime'];
	$shopCloseTime = mysqli_real_escape_string($con, $shopCloseTime);
	$bankName = $_POST['bankName'];
	$bankName = mysqli_real_escape_string($con, $bankName);
	$ifscCode = $_POST['ifscCode'];
	$ifscCode = mysqli_real_escape_string($con, $ifscCode);
	$holderName = $_POST['holderName'];
	$holderName = mysqli_real_escape_string($con, $holderName);
	$accNumber = $_POST['accNumber'];
	$accNumber = mysqli_real_escape_string($con, $accNumber);
	if(!empty($_POST['shopID']) && !empty($_POST['shopName']) && !empty($_POST['shopNumber']) && !empty($_POST['shopArea']) && !empty($_POST['shopCity']) && !empty($_POST['shopState']) && !empty($_POST['shopPincode']) && !empty($_POST['shopOpenTime']) && !empty($_POST['shopCloseTime']) && !empty($_POST['bankName']) && !empty($_POST['ifscCode']) && !empty($_POST['holderName']) && !empty($_POST['accNumber']))
	{
		$sql = "UPDATE seller_shop SET shop_name='$shopName', shop_number='$shopNumber', area='$shopArea', city='$shopCity', state='$shopCity', pincode='$shopPincode', open_time='$shopOpenTime', close_time='$shopCloseTime', bank_name='$bankName', ifsc_code='$ifscCode', account_holder_name='$holderName', account_number='$accNumber' WHERE shop_id='$shopID'";
		mysqli_query($con,$sql) or die(mysqli_error($con));
		$_SESSION['message'] = 'Shop Updated Successfully';
		$_SESSION['color'] = '#2ecc71';

		?>
			<script>location.href='seller_view_shops.php';</script>
		<?php	
	}
	else{
		$_SESSION['message'] = 'Something went Wrong!';
		$_SESSION['color'] = '#e74c3c';
		?>
		<script type="text/javascript">location.href='seller_view_shops.php';</script>
		<?php
	}
  }
  else if(isset($_GET['shopID']) && !isset($_GET['removeuser']) && !isset($_GET['emptyshop']))
  {
    $shopID = $_GET['shopID'];
    $sql = "SELECT * FROM shop_inventory WHERE shop_id='$shopID'";
    $result = mysqli_query($con,$sql);

    while($row = $result->fetch_assoc())
    {
      $sql = "DELETE FROM product_seller_edit WHERE shop_inventory_id='$row[shop_inventory_id]'";
      mysqli_query($con,$sql);
    }
    $sql = "DELETE FROM seller_shop WHERE shop_id='$shopID'";
	mysqli_query($con,$sql);
	$_SESSION['message'] = 'Shop removed Successfully';
	$_SESSION['color'] = '#2ecc71';
    ?>
    <script type="text/javascript">location.href='seller_view_shops.php';</script>
    <?php
  }
  else if(isset($_GET['shopID']) && isset($_GET['emptyshop'])){$shopID = $_GET['shopID'];
    $sql = "SELECT * FROM shop_inventory WHERE shop_id='$shopID'";
    $result = mysqli_query($con,$sql);

    while($row = $result->fetch_assoc())
    {
      $sql = "DELETE FROM product_seller_edit WHERE shop_inventory_id='$row[shop_inventory_id]'";
      mysqli_query($con,$sql);
    }
    $sql = "DELETE FROM shop_inventory WHERE shop_id='$shopID'";
	mysqli_query($con,$sql);
	$_SESSION['message'] = 'Shop empty Successfully';
	$_SESSION['color'] = '#2ecc71';
    ?>
    <script type="text/javascript">location.href='seller_view_shops.php';</script>
    <?php
  }
  else if(isset($_GET['shopID']) && isset($_GET['removeuser'])){
	  $shopID = $_GET['shopID'];
	  $sql = "DELETE FROM shop_user WHERE shop_id='$_GET[shopID]'";
	  mysqli_query($con,$sql) or die(mysqli_error($con));
	  $_SESSION['message'] = 'User removed Successfully';
	  $_SESSION['color'] = '#e74c3c';
	  ?>
	  <script type="text/javascript">location.href='seller_view_shops.php';</script>
	  <?php

  }
  else if(isset($_POST['shopID']) && isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password'])){
	  
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$shopID = $_POST['shopID'];
	$name = mysqli_real_escape_string($con, $name);
	$username = mysqli_real_escape_string($con, $username);
	$password = mysqli_real_escape_string($con, $password);
	$shopID = mysqli_real_escape_string($con, $shopID);
	$sql = "SELECT * FROM shop_user WHERE shop_id='$shopID'";
	$result = mysqli_query($con,$sql) or die(mysqli_error($con));
	if($result->num_rows == 0)
	{
		if(!empty($name) && !empty($password) && !empty($username) && !empty($shopID)){
			$sql = "INSERT INTO `shop_user` (`shop_user_id`, `shop_id`, `name`, `shop_username`, `shop_password`) VALUES (NULL, '$shopID', '$name', '$username', '$password')";
			mysqli_query($con,$sql) or die(mysqli_error($con));
			$_SESSION['message'] = 'User assigned Successfully';
			$_SESSION['color'] = '#2ecc71';
			?>
			<script type="text/javascript">location.href='seller_view_shops.php';</script>
			<?php
		}
		else{
			$_SESSION['message'] = 'Something went Wrong!';
			$_SESSION['color'] = '#e74c3c';
			?>
			<script type="text/javascript">location.href='seller_view_shops.php';</script>
			<?php
			
		}
	}
	else{
		if(!empty($name) && !empty($password) && !empty($username) && !empty($shopID)){
			$sql = "UPDATE shop_user SET shop_username='$username', shop_password='$password', name='$name' WHERE shop_id='$shopID'";
			mysqli_query($con,$sql) or die(mysqli_error($con));
			$_SESSION['message'] = 'User updated Successfully';
			$_SESSION['color'] = '#2ecc71';
			?>
			<script type="text/javascript">location.href='seller_view_shops.php';</script>
			<?php
		}
		else{
			$_SESSION['message'] = 'Something went Wrong!';
			$_SESSION['color'] = '#e74c3c';
			?>
			<script type="text/javascript">location.href='seller_view_shops.php';</script>
			<?php
			
		}
	}
  }
?>