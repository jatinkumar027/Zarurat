<?php 
require_once('includes/connection.php');
if(isset($_SESSION['shopid'])){


	if(sizeof($_SESSION['shopid'])==0){
		?>
		<div class="empty-cart-image-container">
			<img  src="public/images/cart/empty-cart.png">
		</div>
		<?php
	}

	$shopid = $_SESSION['shopid'];
	$i=0;
	$j=0;
	foreach($shopid as $sID){
		$sql = "SELECT * FROM seller_shop JOIN shop_category on seller_shop.shop_category_id=shop_category.shop_category_id WHERE shop_id='$sID'";
		$result = mysqli_query($con,$sql);
		$row = $result->fetch_assoc();
		$shopCategoryName = $row['shop_category_name'];
		?>
			<div class="cart-shop-with-items">
				<label class="cart-shop-name"><?php echo $row['shop_name'];?></label>
		<?php
		$key = 's'.$sID;
		foreach($_SESSION[$key] as $optionID){
			$sql="SELECT * FROM product_seller_edit JOIN shop_inventory JOIN products JOIN product_wt_unit on product_seller_edit.shop_inventory_id=shop_inventory.shop_inventory_id AND products.product_id=shop_inventory.product_id AND product_seller_edit.product_wt_unit_id=product_wt_unit.product_wt_unit_id  WHERE option_id='$optionID'";
			$result = mysqli_query($con,$sql);
			$row = $result->fetch_assoc();
		?>
				<div class="cart-shop-products">
					<div class="cart-product-card">
						<span class="remove-item-from-cart"><i class="fa fa-close"></i></span>
						<script type="text/javascript">
							$(document).ready(function(){
								$(".remove-item-from-cart").eq(<?php echo $i;?>).click(function(){
									$("#cart-items").load('add_to_cart.php',{
										shopid : <?php echo $sID;?>,
										optionid : <?php echo $optionID;?>,
										remove : true
									});
									document.getElementsByClassName('cart-product-card')[<?php echo $i;?>].remove();
									return;
								});
							});
						</script>
						<div class="cart-product-thumbnail-container">
							<img src="public/images/<?php echo $shopCategoryName;?>/<?php echo $row['product_thumb'];?>">
						</div>
						<div class="cart-product-details">
							<?php
                                $discount = 100*(($row['product_mrp'] - $row['product_sp'])/$row['product_mrp']);
                                $discount = (int)$discount;  
							?>
							<div class="discount-mass-container">
								<label style="margin-bottom: 5px;" class="discount"><?php echo $discount."% Off";?></label>
								<label class="mass"><?php echo $row['product_mass']; ?>&nbsp;<?php echo $row['product_wt_unit_name'];?></label>
							</div>
							<label class="cart-product-name"><?php echo $row['product_name'];?></label>
							<div class="cart-price-quantity-container">
								<label>
									<?php 
									$sellingPrice = "'".$row['product_sp']."'";
									?>
									<i  class="fa fa-minus-square cart-minus-icon"></i>
									<span class="cart-product-quantity">
										<?php 
										$key = 'Q'.$optionID;
										echo $_SESSION[$key];
										?>
									</span>
									<i  class="fa fa-plus-square cart-plus-icon"></i>
								</label>


									<script type="text/javascript">
										$(document).ready(function(){
											$(".cart-minus-icon").eq(<?php echo $i;?>).click(function(){
												var url = 'increase_decrease_quantity_of_cart_products.php';
												$(".cart-product-quantity").eq(<?php echo $i;?>).load(url,{
													decrease : true,
													optionid : <?php echo $optionID;?>,
													price : <?php echo $row['product_sp'];?>,
													index : <?php echo $i; ?>
												});
												var Q = document.getElementsByClassName('cart-product-quantity')[<?php echo $i;?>].innerHTML;
												if(Q=='2'){
													document.getElementsByClassName('cart-minus-icon')[<?php echo $i;?>].style.color = '#bdc3c7';
												}
												else {
													document.getElementsByClassName('cart-plus-icon')[<?php echo $i;?>].style.color = '#2ecc71';
												}
											});
										});
									</script>

									<script type="text/javascript">
										$(document).ready(function(){
											$(".cart-plus-icon").eq(<?php echo $i;?>).click(function(){
												var url = 'increase_decrease_quantity_of_cart_products.php';
												$(".cart-product-quantity").eq(<?php echo $i;?>).load(url,{
													increase : true,
													optionid : <?php echo $optionID;?>,
													price : <?php echo $row['product_sp'];?>,
													index : <?php echo $i; ?>
												});
												var Q = document.getElementsByClassName('cart-product-quantity')[<?php echo $i;?>].innerHTML;
												if(Q=='9'){
													document.getElementsByClassName('cart-plus-icon')[<?php echo $i;?>].style.color = '#bdc3c7';
												}
												else{
													document.getElementsByClassName('cart-minus-icon')[<?php echo $i;?>].style.color = '#e74c3c';
												}
											});
										});
									</script>

								<label style="width: 150px;display: flex;justify-content: space-evenly;align-items: center;">
									<span class="multiplty-icon">X</span>
									<span class="pro-sp"><?php echo $row['product_sp']."₹&nbsp;";?></span>
									<span class="pro-mrp"><?php echo $row['product_mrp']."₹";?></span>
								</label>
								<span class="net-pro-price">
									<?php 
									$key = 'Q'.$optionID;
									$quantity = $_SESSION[$key];
									$netProPrice = $quantity*$row['product_sp'];
									echo $netProPrice."₹";
									?>
									</span>
							</div>
						</div>
					</div>
			

		<?php
		$i++;
		}
		$j++;
		?>
				</div>
					<div class="shop-total">
						<div class="sub-total-container">
							<label>Sub Total</label>
							<label class="sub-total-price"></label>
						</div>
						<div class="total-savings-container">
							<label>Total Savings</label>
							<label class="total-savings">
								<span class="net-mrp"></span>
								<span>-</span>
								<span class="net-sp"></span>
								<span>=</span>
								<span class="you-saved"></span>
							</label>
						</div>
						<div class="delivery-charge-container">
							<label>Delivery Charges</label>
							<label class="delivery-charge"></label>
						</div>
						<div class="proceed-to-checkout-container">
							<button class="proceed-to-checkout-btn">
							<span>Proceed to Checkout</span>
							<span>	
								<span class="total-price-on-btn"></span>
								<span><i class="fa fa-angle-right"></i></span>
							</span>
							</button>
						</div>
					</div>
			</div>
		<?php
	}
}
?>
<script type="text/javascript">setAllThumbnailsOfCart();</script>






<?php 
if(isset($_SESSION['shopid'])){
	$i=0;
	$itemQuantity = 0;
	foreach($_SESSION['shopid'] as $shopid){
		$key = 's'.$shopid;
		$netPrice = 0;
		$netMRP = 0;
		foreach($_SESSION[$key] as $optionid){
			$key = 'Q'.$optionid;
			$quantity = $_SESSION[$key];
			$key = 'P'.$optionid;
			$price = $_SESSION[$key];
			$key = 'MRP'.$optionid;
			$MRP = $_SESSION[$key];
			$netPrice += $price*$quantity;
			$netMRP +=$MRP*$quantity;
			$itemQuantity++;
		}
		$deliveryCharge = 50;
		$totalShopPay = $netPrice + $deliveryCharge;
		$totalSavings = $netMRP - $netPrice;
		$netMRP = "'".$netMRP."₹'";
		$netPrice = "'".$netPrice."₹'";
		$totalSavings = "'".$totalSavings."₹'";
		if($itemQuantity == 1){
			$temp = 'item';
		}else $temp = 'items';
		$myItems = "'(".$itemQuantity."&nbsp;".$temp.")'";
		if($itemQuantity == 0)
			$myItems = '';

		$deliveryCharge = "'"."50₹"."'";
		$totalShopPay = "'".$totalShopPay."₹'";
		?>


		<script type="text/javascript">
			document.getElementsByClassName('sub-total-price')[<?php echo $i;?>].innerHTML = <?php echo $netPrice;?>;
			document.getElementsByClassName('net-mrp')[<?php echo $i;?>].innerHTML = <?php echo $netMRP;?>;
			document.getElementsByClassName('net-sp')[<?php echo $i;?>].innerHTML = <?php echo $netPrice;?>;
			document.getElementsByClassName('you-saved')[<?php echo $i;?>].innerHTML = <?php echo $totalSavings;?>;
			document.getElementsByClassName('delivery-charge')[<?php echo $i;?>].innerHTML = <?php echo $deliveryCharge;?>;
			document.getElementsByClassName('total-price-on-btn')[<?php echo $i;?>].innerHTML = <?php echo $totalShopPay;?>;
			document.getElementById('count-of-cart-item').innerHTML = <?php echo $myItems;?>;
		</script>



		<?php 
		$i++;
	}

	if(sizeof($_SESSION['shopid'])>1){
		?>
		<script type="text/javascript">
			var btn = "<button id='place-all-order-btn'><span>Place all Shop Orders</span><span id='all-orders-amount'>5700$</span></button>";
			document.getElementsByClassName('cart-end')[0].innerHTML = btn;
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
			document.getElementsByClassName('cart-end')[0].innerHTML = "You won’t find it cheaper anywhere.";
		</script>
		<?php
	}
}
?>