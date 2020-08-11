<?php
    require_once('includes/connection.php');
?>

<html>
<head>
    <title></title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/dashboard_header.css">
    <link rel="stylesheet" type="text/css" href="public/css/seller_footer.css">
    <link rel="stylesheet" type="text/css" href="public/css/order.css">
    <script src="public/javascript/orders.js"></script>
</head>
<body onload="showHide(1,'#fa8231')">
    <?php require 'includes/dashboard_header.php'; ?>
    <div class="wrapper">

        <div class="all-functions-container">
            <div class="orders-op" onclick="showHide(1,'#fa8231')">Live Orders</div>
            <div class="orders-op" onclick="showHide(2,'#2ecc71')">Successfull Orders</div>
            <div class="orders-op" onclick="showHide(3,'#e74c3c')">Rejected Orders</div>
            <div class="orders-op" onclick="showHide(4,'#3498db')">Replace Orders</div>
        </div>

        <div id="live-orders" class="tab">
            live orders
        </div>
        <div id="Successfull Orders" class="tab">
            successfull
        </div>
        <div id="rejected-orders" class="tab">
            rejected
        </div>
        <div id="return-orders" class="tab">
            replace
        </div>

        <div class="banner">
            <div class="left-banner">

            </div>
            <div class="right-banner">
                <div>
                    <img src="images/delivery_icon.png" alt="">
                    <i style="font-size : 100px; color : white;" class="fas fa-shipping-fast"></i>
                </div>
            </div>
        </div>
        
    </div>
    <?php require 'includes/seller_footer.php'; ?>
</body>
</html>