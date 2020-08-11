<?php
    require_once('includes/connection.php');
    if(isset($_POST['pincode'])){
        $pincode = $_POST['pincode'];
        $sql = "SELECT * FROM seller_shop JOIN shop_category JOIN seller_reg_personal on seller_shop.shop_category_id=shop_category.shop_category_id AND seller_shop.seller_id=seller_reg_personal.seller_id WHERE pincode='$pincode'";
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
    }
?>
<html>
<head>
    <title>Buyer Shops | Zarurat</title>
    <style>
        *{
            margin : 0;
            padding  : 0;
        }
        .wrapper{
            display : flex;
            justify-content : space-evenly;
            flex-wrap : wrap;
            align-items : center;
            padding-top : 50px;
        }
        .shop-card{
            border : 0.5px solid #bdc3c7;
            height : 260px;
            width  :  500px;
            border-radius : 15px;
            font-size : 17px;
            position : relative;
            margin-top : 20px;
        }
        .part1{
            background: linear-gradient(270deg, #00D1DB, #077D91);
            padding : 10px;
            border-top-right-radius : 15px;
            border-top-left-radius :  15px;
            color : white;
            display : flex;
            flex-direction : column;
        }
        .part1 > label{
            font-size : 28px;
        }
        .part1-child{
            display : flex;
            flex-direction  : row;
        }
        .part1-child > div{
            display : flex;
            flex-direction : column;
            flex : 1;
        }
        .shop-type{
            width : 100%;
            background : black;
            padding : 5px;
            margin-right : -10px;
            font-size: 19px;
            border-bottom-left-radius : 5px;
            border-top-left-radius :  5px;
            
        }
        .line{
            height : 0.5px;
            width : 38%;
            background : white;
            position : absolute;
            right : 1.8%;
            top : 6px;
        }
        .shop-time-batch{
            height : 60px;
            background: linear-gradient(90deg, #FEC001, #FA990A);
            position : absolute;
            width  : 36%;
            right : 3%;
            top : 6.5px;
            display : flex;
            color : white;
            justify-content : space-evenly;
            align-items : center;
            box-shadow : 1px 1px 3px 0px black;
            border-bottom-left-radius : 10px;
            border-bottom-right-radius : 10px;
            flex-direction : column;
            font-size : 13px;
        }
        .part1-child div label{
            padding : 5px 0px;
        }
        .part3{
            background : ;
            display : flex;
            padding : 3px;
        }
        .part3 > div{
            display : flex;
            justify-content : space-between;
            flex-direction : column;
            flex : 1;
        }
        .part3 div div:nth-child(1){
            display : flex;
            flex-direction : column;
            padding:  0px 10px;
        }
        .part3 div div:nth-child(2){
            display : flex;
            flex-direction : row;
            align-items : center;
            justify-content : space-between;
            border-top : 0.5px solid #bdc3c7;
            padding : 5px 10px;
            padding-top:8px;
        }
        .buy-now-btn{
            display : flex;
            justify-content : center;
            align-items : center;
            height : 35px;
            width : 110px;
            border : 0.5px solid #bdc3c7;
            border-radius : 7px;
            cursor : pointer;
            background : black;
            color : white;
        }
        .buy-now-btn:hover{
            background : linear-gradient(270deg, #00D1DB, #077D91);
            color : white;
        }
        .seller-profile-photo{
            position : absolute;
            right : 30px;
            top : 87px;
            border-radius : 50%;
            width : 80px;
            height : 80px;
            background : white;
            display : flex;
            justify-content : center;
            align-items : center;
        }
        .shop-rating{
            position : absolute;
            right : 24px;
            top : 170px;
            width : 90px;
            height : 30px;
            display : flex;
            justify-content : center;
            align-items : center;
            color : #FA990A;
            padding : 3px;
        }
        .shop-rating i{
            margin : 0px 3px;
        }
    </style>
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="wrapper">
    <?php 
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
    
    ?>
        <div class="shop-card">
            <div class="part1">
                <label><?php echo $row['shop_name'];?></label>
                <div class="part1-child">
                    <div>
                        <label><i class="fa fa-shopping-bag"></i>&nbsp;<?php echo $row['shop_category_name'];?></label>
                        <label><i class="fa fa-user-circle-o"></i>&nbsp;Own By : <?php echo $row['seller_name'];?></label>
                    </div>
                    <label class="line"></label>
                </div>
            </div>
            <div class="part2">
                
            </div>
            <div class="part3">
                <div>
                    <div>
                        <label><i style="font-size : 19px;" class="fa fa-map-marker"></i>&nbsp;Ordering from</label>    
                        <label style="padding-left : 16px;"><?php echo $row['area'].",&nbsp;".$row['city'];?> </label>
                        <label style="padding-left : 16px;"><?php echo $row['state']."&nbsp;-&nbsp;".$row['pincode'];?></label>
                    </div>
                    <div>
                        <label><i class="fa fa-road"></i>&nbsp;Distance : 4 Km</label>
                        <label class="buy-now-btn"><i class="fa fa-cart-arrow-down"></i>&nbsp;Buy Now</label>
                    </div>
                </div>
            </div>
            <div class="shop-time-batch">
                <label><i class="fa fa-clock-o"></i>&nbsp;Open Time <?php echo $row['open_time'];?></label>
                <label><i class="fa fa-clock-o"></i>&nbsp;Close Time <?php echo $row['close_time'];?></label>
                    
            </div>
            <div class="seller-profile-photo">
                <i style="font-size : 81px; color : #bdc3c7;" class="fa fa-user-circle-o"></i>
            </div>
            <div class="shop-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            </div>
        </div>
        <?php
        }
    }
    else{
        echo "No shops registered in your area!";
    }
        ?>
    </div>
</body>
</html>