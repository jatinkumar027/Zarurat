<?php
    require_once('includes/connection.php');

    if(isset($_GET['shopID'])){
        $shopID = $_GET['shopID'];
        $sql = "SELECT * FROM seller_shop JOIN shop_category on seller_shop.shop_category_id=shop_category.shop_category_id WHERE shop_id='$shopID'";
        $result = mysqli_query($con,$sql);
        $row = $result->fetch_assoc();
        $shopCategory = $row['shop_category_name'];
        $shopCategoryID = $row['shop_category_id'];
        $shopName = $row['shop_name'];
        $shopArea = $row['area'];
        $shopCity = $row['city'];
        $shopPincode = $row['pincode'];
        $shopState = $row['state'];
    }
    else{
        echo "Something Went Wrong!";
        return;
    }
?>
<html>
<head>
    <title>Products | Zarurat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
     function setAllThumbnails(){
        var x = document.getElementsByClassName('thumbnail-container');
        var i,w,h,ratio;
        for(i=0;i<x.length;i++){
            var image = x[i].getElementsByTagName('img');
            w = image[0].width;
            h = image[0].height;

            if(w>h){
                image[0].width = '180';
                ratio = h/w;
                h = 180*ratio;
                image[0].height = h;
            }
            else{
                image[0].height = '180';
                ratio = w/h;
                w =180*ratio;
                image[0].width = w;
                }
            }
    }

     function setAllThumbnailsOfCart(){
        var x = document.getElementsByClassName('cart-product-thumbnail-container');
        var i,w,h,ratio;
        for(i=0;i<x.length;i++){
            var image = x[i].getElementsByTagName('img');
            w = image[0].width;
            h = image[0].height;

            if(w>h){
                image[0].width = '90';
                ratio = h/w;
                h = 90*ratio;
                image[0].height = h;
            }
            else{
                image[0].height = '90';
                ratio = w/h;
                w =90*ratio;
                image[0].width = w;
                }
            }
    }
    function selectLabel(index){
        var x = document.getElementById('option-form'+index).getElementsByClassName('radio-btn');
        var y = document.getElementById('option-form'+index).getElementsByClassName('radio-label');


        var i;
        for(i=0;i<x.length;i++){

            if(x[i].checked){
                y[i].style.border="0.5px solid rgba(250, 130, 49,1)";
                y[i].style.boxShadow = "0px 0px 0px 3px rgba(250, 130, 49,0.5)";
            }
            else{
                y[i].style.border="0.5px solid #bdc3c7";
                y[i].style.boxShadow = "none";
            }
        }
    }

    function disableCartOptions(index){

        var y = document.getElementsByClassName('radio-label');
        var r = document.getElementsByClassName('radio-btn');
        r[index].disabled = true;
        y[index].style.background = "#ecf0f1";
        y[index].style.border = "0.5px solid #bdc3c7";
        document.getElementsByClassName('added-to-cart')[index].style.display = 'block';

    }

    function showProductCategoryInIntro(productCategoryName){
        document.getElementById('product-category-name-in-intro').innerHTML = productCategoryName;
    }

    $(document).ready(function(){
        $("#products-in-cart").click(function(){
            var url = "show_cart.php";
            var shopCategory = <?php echo "'".$shopCategory."'"; ?>;
            $("#cart-items").load(url,{
                shop_category : shopCategory
            });
        });
    });

    function increaseQuantity(index,price,optionID){
        price = parseInt(price);
        var key = 'Q'+optionID;

        var quantity = document.getElementsByClassName('cart-product-quantity')[index].innerHTML;
        quantity++;
        document.getElementsByClassName('cart-product-quantity')[index].innerHTML = quantity;
    }

    </script>
    <style>
    *{
        margin : 0;
        padding: 0;
    }    
    a{
        text-decoration: none;
    }

    .section{
        background: black;
        opacity: 0.5;
        width: 100%;
        height: 100vh;
        position: absolute;
        z-index: 2;
        position: fixed;
        display: none;
    }
    .wrapper{
        padding-top : 50px;
        display : flex;
        justify-content : center;
    }
    .main-container{
        border : 0.5px solid #bdc3c7;
        width : 81%;
        display : flex;
        flex-direction : row;
    }
    .left-container{
        border-right : 0.5px solid #bdc3c7;
        width : 250px;
        height : 100%;
        display: flex;
        flex-direction: column;
    }
    .left-container > label{
        width: 92%;
        height: 35px;
        border-bottom: 0.5px solid #bdc3c7;
        padding: 0px 10px;
        display: flex;
        align-items: center;
    }
    .left-container  > label:nth-child(1){
        height: 100px;
        flex-direction: column;
        justify-content: space-between;
        width: 92%;
    }

    .left-container > label:nth-child(1):hover{
        cursor: default;
        background: none;
    }
    .left-container > label:nth-child(1) > span:nth-child(1){
        font-size: 25px; 
        color : white; 
        background: #3498db;  
        width: 109%;
        display: flex;
        justify-content: center; 
        padding: 15px 0px;
    }
    .left-container label:hover{
        background: #ecf0f1;
        cursor: pointer;
    }
    .right-container{
        display : flex;
        flex-direction : column;
        align-items : center;
        flex : 1;
        height : 100%;
    }
    .intro{
        border-bottom : 0.5px solid #bdc3c7;
        height : 100px;
        width : 100%;
    }
    .intro div:nth-child(1){
        display: flex;
    }

    .intro div:nth-child(1) div:nth-child(1){
        display: flex;
        flex : 0.4;
        height: 55px;
        align-items: flex-start;
        padding: 5px 10px;
        font-size: 23px;
    }
    .intro div:nth-child(1) > div:nth-child(2){
        display: flex;
        flex : 0.6;
        height: 55px;
        padding: 5px 10px;
        justify-content: flex-start;
        flex-direction: column;
    }

    .intro > div:nth-child(3){
        display: flex;
        height: 35px;
        padding: 0px 10px;
        align-items: center;
    }

    .products-container{
        display : flex;
        flex-direction : row;
        justify-content : flex-start;
        flex : 1;
        width : 100%;
        align-items: flex-start;
        flex-wrap : wrap;
    }
    #products-in-cart{
        position: absolute;
        border-radius: 50%;
        height: 50px;
        width: 50px;
        background: #e74c3c;
        color: white;
        right : 25px;
        top : 5px;
        font-size: 19px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .added-to-cart{
        position: absolute;
        right : -8px;
        top : -10px;
        font-size: 17px;
        display: none;
    }
    .left-arrow-container{
        position: absolute;
        font-size: 40px;
        left : 10px;
        top : 132px;
        color :#bdc3c7;
    }   
    .right-arrow-container{
        position: absolute;
        font-size: 40px;
        right : 10px;
        top : 132px;
        color : #bdc3c7;
    }
    .partition-line-container{
        display: flex;
        justify-content: center;
        width: 100%;
    }
    .partition-line{
        width: 97%;
        height: 0.5px;
        background: #bdc3c7;
    }
    /* Inside product-container*/

    .product-card{
        border : 0.5px solid #bdc3c7;
        width : 310px;
        height : 385px;
        margin : 5px;
        border-radius : 5px;
        position: relative;
    }
    .thumbnail-container{
        height : 193px;
        width : 100%;
        display : flex;
        justify-content : center;
        align-items:center;
    }
    .product-name{
        height : 50px;
        width : 100%;
        display : flex;
        justify-content : center;
        align-items:center;
        background: #ecf0f1;
        color : black;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        font-size : 17px;
        border-bottom: 0.5px solid #bdc3c7;
    }
    .product-name label{
        width: 90%;
    }
    .cart-btn-container{  
        display : flex;
        justify-content : space-between;
        align-items : center;
        padding : 5px;
        position: absolute;
        bottom: 0px;
        height: 35px;
        width: 95%;
    }
    .add-to-cart-btn{
       width: 140px;
       height: 30px;
       border-radius: 5px;
       border : 0.5px solid #3498db;
    }
    .add-to-cart-btn:focus{
        outline: none;
    }
    .add-to-cart-btn:hover{
        background: #3498db;
        color: white;
    }
    .products-container a{
        text-decoration : none;
    }
    .product-card:hover{
        border : 0.5px solid rgba(250, 130, 49,1);
        box-shadow : 0px 0px 2px 2px rgba(250, 130, 49,0.5);
    }
    .option-container{
        display : flex;
        width : 96%;
        padding : 0px 5px;
        overflow: scroll;
        height: 100px;
    }
    .option-container form{
        display : flex;
        justify-content : flex-start;
        flex-wrap:wrap;
        padding-top: 5px;
        width: 100%;
    }
    .option-container form > label{
        margin : 2px 4.5px;
    }
    .radio-btn{
        width : 0px;
        height : 0px;
    }
    .radio-btn:checked ~ .radio-label{
        border : 0.5px solid blue;
    }
    .radio-label{
        height : 60px;
        width : 46%;
        border : 0.5px solid #bdc3c7;
        border-radius : 5px;
        display : flex;
        font-size: 15px;
        justify-content : space-between;
        position: relative;
    }
    .wt-vol-discount-container{
        height: 100%;
        display: flex;
        flex-direction : column;
        align-items : center;
        justify-content: space-evenly;
        flex : 0.4;
        padding: 0px 3px;
    }
    .price-container{
        display : flex;
        flex-direction : column;
        align-items : flex-end;
        justify-content: space-evenly;
        flex : 0.6;
        padding : 0px 3px;
        height: 100%;
        font-size: 18px;
    }
    .wt-vol{
        font-size : 16px;
        display : flex;
        align-self : flex-start;
        padding: 1px;
    }
    .discount{
        border-radius : 3px;
        padding : 2px 3px;
        color : white;
        background : #e74c3c;
        font-size: 14px;
        width : 57px;
        display: flex;
        justify-content: center;
    }
    .cover-scroll{
        position: absolute;
        height: 20px;
        background: white;
        width: 100%;
        bottom : 38px;
        box-shadow: 0px -1px 1px 0px #bdc3c7;
    }

    .cover-scroll2{
        position: absolute;
        height: 92px;
        background: white;
        width: 19px;
        bottom : 59px;
        right: 0;
    }
    #no-items-message{
        height: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }
    /* Inside product-container*/

    /* cart */
    #cart{
        position: absolute;
        right : 0px;
        top : 0px;
        width: 500px;
        background: white;
        box-shadow: 0px 0px 3px 0px black;
        z-index: 2;
        display: none;
        font-family: Celias;
    }
    .cart-main-container{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    #cart-intro{
        background: #4b4b4b;
        color : white;
        display: flex;
        justify-content: space-between;
        padding: 0px 10px;
        align-items: center;
        height: 50px;
        font-size: 19px;
        width: 96%;
        position: 500px;
    }
    .empty-cart-image-container{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 250px;
        width: 100%;
        padding-top: 50px; 
    }
    #cart-items{
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        overflow-y: scroll;
        overflow-x: hidden;
        height: 83vh;
    }
    .cart-shop-with-items{
     border-bottom : 0.5px solid #bdc3c7;
     width: 100%;
     margin-top : 5px;
    }
    .cart-shop-name{
        font-size: 18px;
        width: 100%;
        background: #3498db;
        color : white;
        padding-left: 10px;
        display: flex;
        align-items: center;
        height: 30px;
    }
    .cart-product-card{
        border-bottom : 0.5px solid #bdc3c7;
        padding: 5px 10px;
        margin-top: 5px;
        display: flex;
        position: relative;
    }
    .cart-product-details{
        display: flex;
        flex-direction: column;
        width: 370px;
    }
    .cart-product-name{
        font-size: 16px;
        margin-top: 5px;
    }
    .cart-product-thumbnail-container{
        width: 130px;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .discount-mass-container{
        display: flex;
    }
    .cart-price-quantity-container{
        display: flex;
        margin-top: 10px;
        align-items: center;
    }
    .mass{
        margin-left: 10px;
        border-radius : 3px;
        padding : 2px 3px;
        color : white;
        background : #e67e22;
        font-size: 14px;
        width : 57px;
        display: flex;
        justify-content: center;
        margin-bottom: 5px;

    }
    .cart-plus-icon{
        font-size: 25px;
        color: #2ecc71;
    }
    .cart-minus-icon{
        font-size: 25px;
        color : #e74c3c;
    }
    .cart-plus-icon:focus,.cart-minus-icon:focus{
        outline : none;
    }
    .cart-price-quantity-container > label:nth-child(1){
        width: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .cart-product-quantity{
        font-size: 17px;
        width: 30px;
        height: 30px;
        margin : 0px 10px;
        border : 0.5px solid #bdc3c7;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .multiply-icon{
        margin-left: 5px;
        width : 50px;
    }
    .pro-mrp{
        margin-left: 5px;
        font-size: 18px;
        color : #bdc3c7;
        text-decoration: line-through;
    }
    .pro-sp{
        font-size: 17px;
    }
    .net-pro-price{
        display: flex;
        flex : 1;
        justify-content: flex-end;
        font-weight: bold;
        font-size: 19px;
    }
    .cart-end{
        height: 80px;
        background: #4b4b4b;
        width: 100%;
        display: flex;
        justify-content: flex-start;
        padding: 0px 10px;
        align-items: center;
        color : white;
    }
    #place-all-order-btn{
        width: 93%;
        height: 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0px 10px;
        font-size: 17px;
        background: #3498db;
        color: white;
        border-radius: 5px;
        border : none;
    }
    .shop-total{
        display: flex;
        flex-direction: column;
    }
    .sub-total-container{
        display: flex;
        justify-content: space-between;
        padding: 0px 20px;
        height: 30px;
        align-items: center;
        font-weight: bold;
        font-size: 17px;
    }
    .delivery-charge-container{
        display: flex;
        justify-content: space-between;
        padding: 0px 20px;
        height: 30px;
        align-items: center;
        font-weight: bold;
        font-size: 17px;
    }
    .total-savings-container{
        display: flex;
        justify-content: space-between;
        padding: 0px 20px;
        height: 30px;
        align-items: center;
        font-weight: bold;
        font-size: 17px;
    }
    .total-savings{
        width : 170px;
        display: flex;
        justify-content: space-between;
    }
    .proceed-to-checkout-container{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        border-top : 0.5px solid #bdc3c7;
        height: 50px;
    }
    .proceed-to-checkout-btn{
        width: 95%;
        height: 45px;
        border-radius: 5px;
        border : none;
        background: rgba(254, 105, 1,1);
        color: white;
        font-size: 17px;
        display: flex;
        justify-content: space-between;
        padding: 0px 10px;
    }
    .proceed-to-checkout-btn span{
        display: flex;
        align-items: center;
        padding: 0px 10px;
        height: 100%;
    }
    .remove-item-from-cart{
        position: absolute;
        right: 10px;
        top : 5px;
        font-size: 21px;
        color : red;
    }
    /* cart */
    </style>
</head>
<body>
    <div class="section">

    </div>
    <div onclick="document.getElementById('cart').style.display='block'; document.getElementsByTagName('body')[0].style.overflow='hidden';document.getElementsByClassName('section')[0].style.display = 'block';" id="products-in-cart">
        <i class="fa fa-shopping-cart"></i>
    </div>
    <!-- cart -->
    <div id="cart">
        <div class="cart-main-container">
            <div id="cart-intro">
                <label>My Cart<span id="count-of-cart-item"></span></label>
                <label><i onclick="document.getElementById('cart').style.display='none'; document.getElementsByTagName('body')[0].style.overflow='scroll';document.getElementsByClassName('section')[0].style.display = 'none';" class="fa fa-close"></i></label>
            </div>
            <div id="cart-items">
                
            </div>     
        </div>
        <div class="cart-end">
        </div>
    </div>
    <!-- cart -->
    <div class="wrapper">
        <div class="main-container">
            <div class="left-container">
                <label>
                    <span >All Categories</span>
                    <span style="font-size: 18px; color : #3498db; padding: 10px 0px;">Choose Your Category</span>
                </label>
                <?php 
                    $sql = "SELECT * FROM product_category WHERE shop_category_id='$shopCategoryID'";
                    $result = mysqli_query($con,$sql);
                    $i=0;
                    while($row = $result->fetch_assoc()){
                           $productCategoryName = "'".$row['product_category_name']."'";
                        ?>
                            <label onclick="showProductCategoryInIntro(<?php echo $productCategoryName;?>)" class="product-category"><i class="fa fa-angle-right"></i><?php echo "&nbsp;".$row['product_category_name'];?></label>
                            <script type="text/javascript">
                                var shopID = <?php echo $shopID;?>;
                                var url = "buyer_kirana_products.php?shop_id="+shopID;
                                $(document).ready(function(){
                                    $(".product-category").eq(<?php echo $i; ;?>).click(function(){ 
                                        var category = <?php echo $row['product_category_id'];?>;     
                                        $(".products-container").load(url,{
                                            shop_id : shopID,
                                            product_category_id : category 
                                        });
                                    });
                                });
                            </script>
                        <?php
                        $i++;
                    } 
                ?>
            </div>
            <div class="right-container">
                <div class="intro">
                    <div>
                        <div>Shop/<?php echo $shopCategory;?></div>
                        <div>
                            <label>Order From : <?php echo $shopName;?></label>
                            <label>Address : <?php echo $shopArea."&nbsp;".$shopCity."&nbsp;,".$shopState." - ".$shopPincode;?></label>
                        </div>
                    </div>
                    <div class="partition-line-container">
                        <div class="partition-line"></div>
                    </div>
                    <div>
                        <span id="All-category"><a href="buyer_shop_products.php?shopID=<?php echo $shopID;?>">All Category</a></span>&nbsp;<i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>&nbsp;<span id="product-category-name-in-intro"></span></label>
                    </div>
                </div>
                <div class="products-container">
                
                <?php 
                if($shopCategoryID == 1){
                    ?>
                    <script type="text/javascript">
                        var shopID = <?php echo $shopID;?>;
                        var url = "buyer_kirana_products.php?shop_id="+shopID;
                        $(document).ready(function(){
                            var category = 'all';
                            $(".products-container").load(url,{
                                shop_id : shopID,
                                product_category_id : category
                            });
                        });
                    </script>
                    <?php
                }
                ?>

                </div>
            </div>
        </div>
    </div>
    <div id="check"></div>
    <div id="for-load"></div>
</body>
</html>