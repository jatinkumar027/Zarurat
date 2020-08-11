<div class="header">
    <div class="header-left">
        <a href="index.php">Zarurat.in</a> | 
        <a href="seller_home.php?home=true">Home &nbsp; <i class="fa fa-home"></i></a>
    </div>
    <div class="header-right">
		<?php if(isset($_SESSION['seller_email'])){?>
		<a href="seller_dashboard.php?register=true">Register New Shop</a> | 
		
		<a href="seller_view_shops.php">View Shops</a>  | 
		<?php }?>
        <label>
            <?php if(isset($_SESSION['seller_name'])) echo $_SESSION['seller_name']."&nbsp;<i class='fa fa-caret-down'></i>";
			 else if(isset($_SESSION['shop_user_name'])) echo $_SESSION['shop_user_name']."&nbsp;<i class='fa fa-caret-down'></i>";?>
			<ul>
				<li onclick="show_change_password_popup()"><i class="fa fa-lock"></i>&nbsp;Change Password</li>
				<?php if(isset($_SESSION['seller_id']))
				{
				?>
				<li><i class="fa fa-user-circle-o"></i>&nbsp;Update Profile</li>
				<?php 
				}
				?>
                <a href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
            </ul>
        </label>
    </div>
</div>

<div class="change-password-popup">
	<div class="cancel-icon-container">
		<label>Change Password</label>
		<label><i onclick="hide_change_password_popup()" class="fa fa-close"></i></label>
	</div>
	<form>				
		<input type="Password" name="old_pass" placeholder="Old Password">
		<input type="Password" name="old_pass" placeholder="New Password">
		<input type="Password" name="old_pass" placeholder="Re-enter Password">
		<input type="submit" value="Update" id="update-btn">
	</form>
</div>

<div class="success-pop-up">
	<?php 
	if(isset($_SESSION['message']))
		{
            echo $_SESSION['message'];
        }
	?>
</div>

<script>

function show_change_password_popup()
{
	document.getElementsByClassName('change-password-popup')[0].style.display='block';
}	
function hide_change_password_popup()
{
	document.getElementsByClassName('change-password-popup')[0].style.display='none';
}	


var interval;
var top_value = 50;
function timer_on()
{
	interval=setInterval(Timer,100);
}
function Timer()
{     
	document.getElementsByClassName("success-pop-up")[0].style.transition="background 3000ms linear";
	document.getElementsByClassName("success-pop-up")[0].style.background="transparent";
				
	top_value = top_value+1;
	var temp = top_value+"%";
	document.getElementsByClassName("success-pop-up")[0].style.top=temp;

	if(top_value == 70)
	{
	clearTimeout(interval);
	document.getElementsByClassName("success-pop-up")[0].style.display="none";
	}

	
} 
function show_success(color)
{
	var x = document.getElementsByClassName("success-pop-up");
	x[0].style.display="block";
	x[0].style.background = color;
}

</script>