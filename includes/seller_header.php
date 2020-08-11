<div class="header">
    <div class="header-left">
        <a href="index.php">Zarurat.in</a>
    </div>
    <div class="header-middle">
        <ul>
            <li>Sell...<i class="fa fa-caret-down"></i>
                <ul>
					<li>Benefits of Selling on Zarurat</li>
					<li>Fullfillments by Zarurat</li>
					<li>Local Shops on Zarurat</li>
					<li>Sell to Business</li>
				</ul>
            </li>
            <li>How to...<i class="fa fa-caret-down"></i>
                <ul>
					<li>Sell on Zarurat</li>
					<li>Calculate Profit</li>
					<li>Grow my Business</li>
					<li>Get Help & Support</li>
				</ul>
            </li>
            <li>Learn More<i class="fa fa-caret-down"></i>
                <ul>
					<li>Seller Guide</li>
					<li>Seller Success Stories</li>
					<li>Seller Blogs</li>
				</ul>
            </li>
        </ul>
    </div>
    <div class="header-right">
        <?php 
            if(isset($_SESSION['seller_email']))
            {
               ?>
                <button onclick="location.href='seller_dashboard.php';">Dashboard</button> 
                <button onclick="location.href='logout.php';">Logout</button>   
               <?php
            }
            else if(isset($_SESSION['shop_user_name'])){
                $shopID = base64_encode($_SESSION['shop_id']);
                $url = "orders.php?shopID=".$shopID; 
               ?>
               <button onclick="location.href='<?php echo $url;?>';">Dashboard</button> 
               <button onclick="location.href='logout.php';">Logout</button>   
              <?php
            }
            else {
                ?>
                <button onclick="showSellerSigninSignupPopup(1)">Register / Sign In</button>
                <?php
             }
        ?>
    </div>
</div>









