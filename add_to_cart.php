<?php

require_once('includes/connection.php');
/*  Destroy whole cart (Session)  */
if(isset($_POST['destroy']))
{
	session_destroy();
	header('Location: add_to_bag.php');
}

/* ADD to cart (session) */
if(!isset($_SESSION['shopid']))
	$_SESSION['shopid'] = array();
$control = 1;
if(isset($_POST['add']) && isset($_POST['shopid']) && isset($_POST['optionid']))
{
	foreach ($_SESSION['shopid'] as $key => $value) {
		if($_POST['shopid'] == $value)  // if shopid exist
		{
			$control = 0;
			break;
		}
	}
	if($control == 1)
		array_push($_SESSION['shopid'],$_POST['shopid']); // if shopid doesn't exist
	
	$control = 1;
	$key = 's'.$_POST['shopid'];
	if(!isset($_SESSION[$key]))
	{
		$_SESSION[$key] = array();
	}
	foreach ($_SESSION[$key] as $optionid) {
			if($_POST['optionid'] == $optionid)
			{
				$control = 0;
				break;
			}
		}
	if($control == 1)
	{
		$key = 's'.$_POST['shopid'];
		array_push($_SESSION[$key], $_POST['optionid']);
		$key = 'Q'.$_POST['optionid'];
		$_SESSION[$key] = 1;
	    echo (int)$_POST['count']+1;

	    $sql = "SELECT * FROM product_seller_edit WHERE option_id='$_POST[optionid]'";
	    $result = mysqli_query($con,$sql);
	    $row = $result->fetch_assoc();
	    $key = 'P'.$_POST['optionid'];
	    $_SESSION[$key] = $row['product_sp'];
	    $key = 'MRP'.$_POST['optionid'];
	    $_SESSION[$key] = $row['product_mrp'];
	}
	else echo $_POST['count'];
}

/* Remove option and shop at last from cart (session) */

if(isset($_POST['remove']))
{
	if(isset($_POST['shopid']) && isset($_POST['optionid']) && !empty($_POST['shopid']) && !empty($_POST['optionid']))
	{
		$key = 's'.$_POST['shopid'];
		if(isset($_SESSION[$key]))
		{
			foreach ($_SESSION[$key] as $k => $value)
			{
				if($value == $_POST['optionid'])
				{
					unset($_SESSION[$key][$k]);
					$key2 = 'Q'.$_POST['optionid'];
					unset($_SESSION[$key2]);
					$key2 = 'P'.$_POST['optionid'];
					unset($_SESSION[$key2]);
					$key2 = 'MRP'.$_POST['optionid'];
					unset($_SESSION[$key2]);
				}
			}
			if(sizeof($_SESSION[$key]) == 0)
			{
				unset($_SESSION[$key]);
				foreach($_SESSION['shopid'] as $k => $shopid)
				{
					if($shopid == $_POST['shopid'])
						unset($_SESSION['shopid'][$k]);
				}
			}
		}
	}
}

/* Remove shop*/
if(isset($_POST['removeshop']))
{
	if(isset($_POST['shopid']) && !empty($_POST['shopid']))
	{
		$key = 's'.$_POST['shopid']; 
		foreach($_SESSION['shopid'] as $k => $shopid)
		{
			if($shopid == $_POST['shopid'])
				unset($_SESSION['shopid'][$k]);
		}
		unset($_SESSION[$key]);
	}
}
?>

<?php require_once('show_cart.php');?>
