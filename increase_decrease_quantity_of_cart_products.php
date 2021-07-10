<?php
session_start();
if(isset($_POST['increase']) && isset($_POST['optionid']) && isset($_POST['price'])){

	$key = 'Q'.$_POST['optionid'];
	if($_SESSION[$key]<10)
		$_SESSION[$key]++;

	echo $_SESSION[$key];
	$newPrice = $_SESSION[$key]*$_POST['price'];
	$newPrice = "'".$newPrice."₹'";
	$index = $_POST['index'];
	?>
	<script type="text/javascript">document.getElementsByClassName('net-pro-price')[<?php echo $index;?>].innerHTML = <?php echo $newPrice;?>;</script>
	<?php

}
else if(isset($_POST['decrease']) && isset($_POST['optionid']) && isset($_POST['price'])){

	$key = 'Q'.$_POST['optionid'];
	if($_SESSION[$key] > 1)
		$_SESSION[$key]--;
	
	echo $_SESSION[$key];
	$newPrice = $_SESSION[$key]*$_POST['price'];
	$newPrice = "'".$newPrice."₹'";
	$index = $_POST['index'];

	?>
	<script type="text/javascript">document.getElementsByClassName('net-pro-price')[<?php echo $index;?>].innerHTML = <?php echo $newPrice;?>;</script>
	<?php
}
?>

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
			var btn = "<button id='place-all-order-btn'><span>Place all Shop Orders</span><span>5700$</span></button>";
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