<?php

session_start();
/*  Destroy whole cart (Session)  */
if(isset($_GET['destroy']))
{
	session_destroy();
	header('Location: add_to_bag.php');
}

/* ADD to cart (session) */
if(!isset($_SESSION['shopid']))
	$_SESSION['shopid'] = array();
$control = 1;
if(isset($_GET['add']))
{
	foreach ($_SESSION['shopid'] as $key => $value) {
		if($_GET['shopid'] == $value)  // if shopid exist
		{
			$control = 0;
			break;
		}
	}
	if($control == 1)
		array_push($_SESSION['shopid'],$_GET['shopid']); // if shopid doesn't exist
	
	$control = 1;
	$key = 's'.$_GET['shopid'];
	if(!isset($_SESSION[$key]))
	{
		$_SESSION[$key] = array();
	}
	foreach ($_SESSION[$key] as $optionid) {
			if($_GET['optionid'] == $optionid)
			{
				$control = 0;
				break;
			}
		}
	if($control == 1)
	{
		$key = 's'.$_GET['shopid'];
		array_push($_SESSION[$key], $_GET['optionid']);
	}
}

/* Remove option and shop at last from cart (session) */

if(isset($_GET['remove']))
{
	if(isset($_GET['shopid']) && isset($_GET['optionid']) && !empty($_GET['shopid']) && !empty($_GET['optionid']))
	{
		$key = 's'.$_GET['shopid'];
		if(isset($_SESSION[$key]))
		{
			foreach ($_SESSION[$key] as $k => $value)
			{
				if($value == $_GET['optionid'])
				{
					unset($_SESSION[$key][$k]);
				}
			}
			if(sizeof($_SESSION[$key]) == 0)
			{
				unset($_SESSION[$key]);
				foreach($_SESSION['shopid'] as $k => $shopid)
				{
					if($shopid == $_GET['shopid'])
						unset($_SESSION['shopid'][$k]);
				}
			}
		}
	}
}

/* Remove shop*/
if(isset($_GET['removeshop']))
{
	if(isset($_GET['shopid']) && !empty($_GET['shopid']))
	{
		$key = 's'.$_GET['shopid']; 
		foreach($_SESSION['shopid'] as $k => $shopid)
		{
			if($shopid == $_GET['shopid'])
				unset($_SESSION['shopid'][$k]);
		}
		unset($_SESSION[$key]);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table
		{
			border : 0.5px solid black;
			border-collapse: collapse;
		}
		th,td
		{
			border : 0.5px solid black;
			padding:10px 30px;
		}
	</style>
</head>
<body>
	<form>
		<input type="text" name="shopid" placeholder="shopid" required="true">
		<input type="text" name="optionid" placeholder="optionid" required="true">
		<input type="submit" value="Add to Session" name="add"> 
	</form>
	<form>
		<input type="text" name="shopid" placeholder="shopid" required="true">
		<input type="text" name="optionid" placeholder="optionid" required="true">
		<input type="submit" value="Remove From Session" name="remove"> 
	</form>
	<form>
		<input type="text" name="shopid" placeholder="shopid" required>
		<input type="submit" name="removeshop" value="Remove Shop">
	</form>
	<form>
		<input type="submit" name="destroy" value="Remove All">
	</form>

	<?php
	if(sizeof($_SESSION['shopid'])!=0)
	{
	?>
	<table>
		<tr>
			<th>Shop id</th>
			<th>option id</th>
		</tr>
		<?php
			foreach ($_SESSION['shopid'] as $shopid)
			{
				?>
					<tr>
						<td><?php echo $shopid; ?></td>
						<td>
							<?php
							$shop = 's'.$shopid;
								foreach ($_SESSION[$shop] as $optionid)
								{
									echo $optionid.', ';
								}
							?>
						</td>
					</tr>
				<?php
			}
		?>

	</table>
	<?php
	}
	?>
</body>
</html>
