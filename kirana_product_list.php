
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

    $encriptedShopcategoryID = $_GET['shopcategoryID'];
    $encriptedShopID = $_GET['shopID'];
    $shopcategoryID = base64_decode($_GET['shopcategoryID']);
    $shopID = base64_decode($_GET['shopID']);
    if(isset($_POST['product_category']) && $_POST['product_category'] != 'all')
    {
        $sql = "SELECT * FROM products JOIN product_type JOIN shop_category JOIN product_category on products.product_type_id=product_type.product_type_id AND products.shop_category_id=shop_category.shop_category_id AND products.product_category_id=product_category.product_category_id WHERE products.product_category_id='$_POST[product_category]'";
    }
    else {
        $sql = "SELECT * FROM products JOIN product_type JOIN shop_category on products.product_type_id=product_type.product_type_id AND products.shop_category_id=shop_category.shop_category_id WHERE products.shop_category_id=$shopcategoryID";
    }
    $result = mysqli_query($con,$sql) or die(mysqli_error($con));
?>
<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/kirana_product_lists.css">
    <script src="public/javascript/kirana_product_lists.js"></script>
    <link rel="stylesheet" type="text/css" href="public/css/dashboard_header.css">
	<link rel="stylesheet" type="text/css" href="public/css/seller_footer.css">
    
</head>
<body onload="countSelectedItems();disableAllOptions();setAllThumbnails();">


<?php include 'includes/dashboard_header.php'; ?>
<div class="wrapper">
<?php
	if($result->num_rows>0)
	{
	?>
	<div class="page-info">
		<h4>Products - List</h4>
		<div class="left-pad"></div>
		<form class="search-container" method="post">
			<select id="select-category-option" name="product_category">
				<option value="all">All Categories</option>
                <?php
                    $sql = "SELECT * FROM product_category";
                    $obj = mysqli_query($con,$sql);
                    while($r = $obj->fetch_assoc())
                    {
                        ?>
                        <option value="<?php echo $r['product_category_id']?>"><?php echo $r['product_category_name']; ?></option>
                        <?php
                    }
                ?>
			</select>
			<input class="search-box" type="text" placeholder="Search Products here...">
			<button class="search-btn" type="submit" name="search-btn"><i class="fa fa-search"></i></button>
    </form>
		<div class="right-pad"></div>	
		<h4 style="margin-right: 10px;"><label>Selected Items  &nbsp;</label>
		<label id="count-selected-items">0</label>
		</h4>
	</div>
	<?php
	}
	else
	{
		?>
		<div class="message">No Products to Show</div>
		<?php
	}
?>
    <div style="height : 50px;"></div>
    <div class="product-list-container">
    <form action="" method="post">
        <!-- product -->
        <?php
			$i=0;
			while($row = $result->fetch_assoc())
			{
			$sql = "SELECT * FROM shop_inventory WHERE product_id='$row[product_id]' AND shop_id='$shopID'";
			$res = mysqli_query($con,$sql);
		?>
            <div class="product">
                <div><?php echo $i+1;?></div>
                <div class="thumbnail">
                    <img src="public/images/kirana/<?php echo $row['product_thumb'];?>">
                </div>
                <div class="product-details">
                    <div class="product-info">
                        <div style="font-weight : bold;"><?php echo $row['product_name'].",&nbsp;";?></div>
                        <div><?php echo $row['product_brand'].",&nbsp;";?></div>
                        <div><?php echo $row['product_type_name'];?></div>
                    </div>
                    <div class="product-option-container">
                        <div class="product-option">
                            <input type="number" name="mrp[]" placeholder="MRP" required>
                            <input type="number" name="sp[]" placeholder="SP" required>
                            <input type="number" name="quantity[]" placeholder="Quantity" required>
                            <input type="number" name="mass[]" placeholder="wt/vol" required>
                            <select name="unit[]" id="" required>
                                <option value="1">Kg</option>
                                <option value="2">gm</option>
                                <option value="3">L</option>
                                <option value="4">mL</option>
                            </select>
                        </div>
                    </div>
                    <div class="add-sub-container">
                        <i class="fa fa-plus-square add-icon" onclick="addOption(<?php echo $i;?>)"></i>
                        <i class="fa fas fa-minus-square minus-icon" onclick="removeOption(<?php echo $i;?>)"></i>
                    </div>
                </div>
                <div class="checkbox-container">
                    <input class="number-of-options" type="number" name="options[]" value="1">
                    <input class="select-item" type="checkbox" name="productID[]" value="<?php echo $row['product_id']; ?>"onclick="onChecboxSelected(<?php echo $i;?>);countSelectedItems();">
                </div>
                <?php
				if($res->num_rows>0)
				{
				?>
				<div class="product-message">
					<label >Already</label>
					<label >In shop</label>
				</div>
				<?php
				}
				?>
            </div>
        <?php
				$i++;
			}
		?>
        <!-- product -->
            <div>
                <?php 
                if($result->num_rows>0){
                    ?>
                    <input class="add-items-btn" type="submit" value="Add Selected Items to Shop" name="submit">
                    <?php
                }
                ?>
            </div>
        </form>
    </div>

</div>
<?php include 'includes/seller_footer.php'; ?>
</body>
</html>

<!-- Insert selected products to shop -->
<?php

if(isset($_POST['submit']))
{
    if(isset($_POST['productID']) && isset($_POST['options']) && isset($_POST['mrp']) && isset($_POST['sp']) && isset($_POST['quantity']) && isset($_POST['mass']) && isset($_POST['unit']))
    {
        $productID = $_POST['productID'];
        $options = $_POST['options'];
        $MRP = $_POST['mrp'];
        $SP = $_POST['sp'];
        $Quantity = $_POST['quantity'];
        $Mass = $_POST['mass'];
        $Unit = $_POST['unit'];
        $control = 0;
        $k = 0;
        for ($i=0; $i<sizeof($productID); $i++)
        {
            $control = 0;
            $proID = $productID[$i];
			$sql = "SELECT * FROM shop_inventory WHERE product_id='$proID' AND shop_id='$shopID'";
            $res = mysqli_query($con,$sql);
            if($res->num_rows >0) //product already exist in shop;
            {
                $control = 1;
                $sql = "SELECT * FROM shop_inventory WHERE product_id='$proID'";
                $res = mysqli_query($con,$sql);
                $row = $res->fetch_assoc();
                $shopInventoryID = $row['shop_inventory_id'];
            }
            else{
                    $sql = "INSERT INTO `shop_inventory` (`shop_inventory_id`, `shop_id`, `product_id`) VALUES (NULL, '$shopID', '$proID')";
					mysqli_query($con,$sql) or die(mysqli_error($con));

					$sql = "SELECT shop_inventory_id FROM shop_inventory ORDER BY shop_inventory_id DESC LIMIT 1";
					$result = mysqli_query($con,$sql);
					$row = $result->fetch_assoc();
					$shopInventoryID = $row['shop_inventory_id'];
            }
            for($j=0; $j<$options[$i]; $j++)
            {
                if(!empty($MRP[$k]) && !empty($SP[$k]) && !empty($Quantity[$k]) && !empty($Mass[$k]) && !empty($Unit[$k]))
                {
                    $sql = "INSERT INTO `product_seller_edit` (`option_id`, `shop_inventory_id`, `product_mrp`, `product_sp`, `product_status`, `product_quantity`, `product_mass`, `product_wt_unit_id`) VALUES (NULL, '$shopInventoryID', '$MRP[$k]', '$SP[$k]', '1', '$Quantity[$k]', '$Mass[$k]', '$Unit[$k]');";
					mysqli_query($con,$sql) or die(mysqli_error($con));
                }
                $k++;
            }
        }
        $_SESSION['message'] = 'Products Added Successfully';
        $_SESSION['color'] = '#2ecc71';
        ?>
		    <script type="text/javascript">location.href='seller_view_all_products_in_shop.php?shopID=<?php echo $encriptedShopID;?>&shopcategoryID=<?php echo $encriptedShopcategoryID;?>';</script>
		<?php
    }
    else{
        ?>
            <script>alert('No Item selected!');</script>
        <?php
    }
}

?>