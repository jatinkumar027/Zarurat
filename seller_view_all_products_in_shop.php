<!-- Model -->

<?php
	require_once('includes/connection.php');
	//Logged out user redirected to home page

	//showing all products in the selected shop
	$encriptedShopcategoryID = $_GET['shopcategoryID'];
	$encriptedShopID = $_GET['shopID'];
	$shopID = base64_decode($_GET['shopID']);
	$sql = "SELECT * FROM shop_inventory JOIN products JOIN product_type on shop_inventory.product_id=products.product_id AND products.product_type_id=product_type.product_type_id WHERE shop_inventory.shop_id='$shopID'";
	$result = mysqli_query($con,$sql);
?>

<!-- View -->

<!DOCTYPE html>
<html>
<head>
	<title>View all products in Shop | Zarurat.in </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="public/javascript/seller_view_all_products_in_shop.js"></script>
	<link rel="stylesheet" type="text/css" href="public/css/seller_view_all_products_in_shop.css">
    <link rel="stylesheet" type="text/css" href="public/css/dashboard_header.css">
	<link rel="stylesheet" type="text/css" href="public/css/seller_footer.css">
</head>
<body>
<?php include 'includes/dashboard_header.php'; ?>
	<?php
		if(isset($_SESSION['message']) && isset($_SESSION['color']))
		{
			echo "<script>show_success('$_SESSION[color]');timer_on();</script>";
			array_pop($_SESSION);
			array_pop($_SESSION);
		}
	?>
	
	<div class="wrapper">
	<?php
	if($result->num_rows>0)
	{
	?> 	
		<div class="product-list-container">
			<!-- product -->
		<table>
			<tr>
				<th>S. No.</th>
				<th>Thumbnail</th>
				<th style="width: 15%;">Name</th>
				<th>Brand</th>
				<th>Type</th>
				<th>
					<div style="border: none;" class="options">
						<label>MRP&nbsp;(₹)</label>
						<label>Selling<br/>Price&nbsp;(₹)</label>
						<label>Quantity</label>
						<label>Weight<br/>Volume</label>
						<label>Unit</label>
						<label>Status</label>
						<label>Toggle<br/>Status</label>
						<label>Update</label>
						<label>Delete</label>
					</div>
				</th>
			</tr>


		
				<?php
				$i=1;
				$num=1;
				while($row = $result->fetch_assoc())
				{
					
				?>
				<tr>
					<td><?php echo $i;?></td>
					<td><img class="thumbnail" src="public/images/kirana/<?php echo $row['product_thumb'];?>"></td>
					<td style="width: 15%;"><?php echo $row['product_name'];?></td>
					<td><?php echo $row['product_brand'];?></td>
					<td><?php echo $row['product_type_name'];?></td>
					<td>
						<?php 
							$sql = "SELECT * FROM product_seller_edit JOIN product_wt_unit on product_seller_edit.product_wt_unit_id=product_wt_unit.product_wt_unit_id WHERE shop_inventory_id='$row[shop_inventory_id]'";
							$result2 = mysqli_query($con,$sql);
							while($row2 = $result2->fetch_assoc())
							{
							?>
						<form id="option-form<?php echo $num;?>"  action="seller_view_all_products_in_shop.php?shopID=<?php echo $_GET['shopID'];?>&update=true&optionID=<?php echo $row2['option_id'];?>&shopcategoryID=<?php echo $encriptedShopcategoryID;?>" method="post">
							<div class="options">
								
								<label>
									<input class="input-style" type="number" value="<?php echo $row2['product_mrp']; ?>" name="mrp" disabled="true">
								</label>
								<label>
									<input class="input-style" type="number" value="<?php echo $row2['product_sp']; ?>" name="sp" disabled="true">
								</label>
								<label>
									<input style="width:100%;"class="input-style" type="number" value="<?php echo $row2['product_quantity']; ?>" name="quantity" disabled="true">
								</label>
								<label>
									<input style="width:100%;"class="input-style" type="number" value="<?php echo $row2['product_mass']; ?>" name="mass" disabled="true">
								</label>
								<label>
									<select style="display:flex; flex:0.6;" class="unit-picker" name="unit" disabled="true">
										<option value="<?php echo $row2['product_wt_unit_id'];?>"><?php echo $row2['product_wt_unit_name'];?></option>
										<?php
										if($row2['product_wt_unit_id']!='1')
											echo "<option value='1'>Kg</option>";
										if($row2['product_wt_unit_id']!='2')
											echo "<option value='2'>g</option>";
										if($row2['product_wt_unit_id']!='3')
											echo "<option value='3'>L</option>";
										if($row2['product_wt_unit_id']!='4')
										 	echo "<option value='4'>mL</option>";
										 ?>
									</select>
								</label>
								<label>
									<?php
										if($row2['product_status']=='0')
										{
											echo "<i style='color:red;' class='icon-style'>Inactive</i>";
										}
										else{
											echo "<i style='color:green;' class='icon-style'>Active</i>";
										}
									?>		
								</label>
								<label>
									<?php
							 		if($row2['product_status']=='1') 
							 		{
							 			?>
							 			<a href="seller_view_all_products_in_shop.php?shopID=<?php echo $_GET['shopID'];?>&status=<?php echo $row2['product_status'];?>&optionID=<?php echo $row2['option_id'];?>&shopcategoryID=<?php echo $encriptedShopcategoryID;?>"><i class="fa fa-toggle-on toggle"></i></a>
							 			<?php
							 		}
							 		else
							 		{
							 			?>
							 			<a href="seller_view_all_products_in_shop.php?shopID=<?php echo $_GET['shopID'];?>&status=<?php echo $row2['product_status'];?>&optionID=<?php echo $row2['option_id'];?>&shopcategoryID=<?php echo $encriptedShopcategoryID;?>"><i class="fa fa-toggle-off toggle"></i></a>
							 			<?php
							 		}
						 			?>
								</label>
								<label>
								<i onclick="enableInputField(<?php echo $num;?>);" class="fa fa-pencil edit-icon"></i>
								<i onclick="return submitOptionForm(<?php echo $num;?>);"  class="fa fa-upload update-icon"></i>
								</label>
								<label>
									<?php
									if($result2->num_rows==1)
									{
										?>
										<a onclick="return productDeletionConfirmation()" href="seller_view_all_products_in_shop.php?shopID=<?php echo $_GET['shopID'];?>&shopInventoryID=<?php echo $row2['shop_inventory_id'];?>&shopcategoryID=<?php echo $encriptedShopcategoryID;?>">
										<i style="color: red; font-size: 20px;" class="fa fa-trash"></i>
										</a>
										<?php
									}
									else
									{
									?>
									<a onclick="return optionDeletionConfirmation()" href="seller_view_all_products_in_shop.php?shopID=<?php echo $_GET['shopID'];?>&optionID=<?php echo $row2['option_id'];?>&shopcategoryID=<?php echo $encriptedShopcategoryID;?>">
									<i style="color: red; font-size: 20px;" class="fa fa-trash"></i>
									</a>
									<?php
									}
									?>
								</label>
							</div>
						</form>
							<?php
							$num++;
							}
						?>
					</td>
				</tr>

				<?php
					$i++;
				}
				?>
				<!-- product -->
			</table>
		</div>
		<?php
		}
		else {
			?>
			<div style="height: 50px;"></div>
			<div class="message">
				<h1>Shop is Empty !</h1>
				<div class="shop-btn">
    			<a href="kirana_product_list.php?shopID=<?php echo $encriptedShopID;?>&shopcategoryID=<?php echo $encriptedShopcategoryID;?>"><button>Add Items to Shop</button></a>
    		</div>
			</div>
			<?php
		}
		?>		

	</div>

	<div class="info">
			
	</div>
<?php include 'includes/seller_footer.php';?>
</body>
</html>

<!-- delete product option or product from shop -->
<?php
	if(isset($_GET['update']) && isset($_GET['optionID']))
	{
		print_r($_POST);
		$sql = "UPDATE product_seller_edit SET product_mrp='$_POST[mrp]', product_sp='$_POST[sp]', product_quantity='$_POST[quantity]', product_mass='$_POST[mass]', product_wt_unit_id='$_POST[unit]' WHERE option_id='$_GET[optionID]'";
		mysqli_query($con,$sql) or die(mysqli_error($con));
		$_SESSION['message'] = 'Updated Successfully';
		$_SESSION['color'] = '#2ecc71';
		?>
<script>location.href='seller_view_all_products_in_shop.php?shopID=<?php echo $encriptedShopID;?>&shopcategoryID=<?php echo $encriptedShopcategoryID;?>'</script>
		<?php
	}
	else if(isset($_GET['status']) && isset($_GET['optionID']) )
	{
		$status=!$_GET['status'];
		$ID=$_GET['optionID'];
		$sql="UPDATE product_seller_edit SET product_status='$status' WHERE option_id='$ID'";
		mysqli_query($con,$sql);
?>
<script>location.href='seller_view_all_products_in_shop.php?shopID=<?php echo $encriptedShopID;?>&shopcategoryID=<?php echo $encriptedShopcategoryID;?>'</script>
<?php
	}
	else if(isset($_GET['optionID']))
	{
		$sql = "DELETE FROM product_seller_edit WHERE option_id='$_GET[optionID]'";
		mysqli_query($con,$sql);
		$_SESSION['message'] = 'Deleted Successfully';
		$_SESSION['color'] = '#e74c3c';
?>
<script>location.href='seller_view_all_products_in_shop.php?shopID=<?php echo $encriptedShopID;?>&shopcategoryID=<?php echo $encriptedShopcategoryID;?>'</script>
<?php		
	}
	else if(isset($_GET['shopInventoryID']))
	{
		$sql = "DELETE FROM shop_inventory WHERE shop_inventory_id='$_GET[shopInventoryID]'";
		mysqli_query($con,$sql);
		$sql = "DELETE FROM product_seller_edit WHERE shop_inventory_id='$_GET[shopInventoryID]'";
		mysqli_query($con,$sql);
		
		$_SESSION['message'] = 'Deleted Successfully';
		$_SESSION['color'] = '#e74c3c';
?>
<script>location.href='seller_view_all_products_in_shop.php?shopID=<?php echo $encriptedShopID;?>&shopcategoryID=<?php echo $encriptedShopcategoryID;?>'</script>
<?php
	}
	mysqli_close($con);
?>
