
                
                <?php 
                require_once('includes/connection.php');
                if(isset($_POST['shop_id']) && isset($_POST['product_category_id']) && $_POST['product_category_id'] == 'all'){
                    $shopID = $_POST['shop_id'];
                    $sql = "SELECT * FROM seller_shop JOIN shop_category on seller_shop.shop_category_id=shop_category.shop_category_id WHERE shop_id='$shopID'";
                    $result = mysqli_query($con,$sql);
                    $row = $result->fetch_assoc();
                    $shopCategory = $row['shop_category_name'];
                    $sql = "SELECT * FROM shop_inventory JOIN products JOIN product_type on shop_inventory.product_id=products.product_id AND products.product_type_id=product_type.product_type_id WHERE shop_inventory.shop_id='$shopID'";
                    $result = mysqli_query($con,$sql);
                }
                else if(isset($_POST['shop_id']) && isset($_POST['product_category_id'])){
                    $shopID = $_POST['shop_id'];
                    $sql = "SELECT * FROM seller_shop JOIN shop_category on seller_shop.shop_category_id=shop_category.shop_category_id WHERE shop_id='$shopID'";
                    $result = mysqli_query($con,$sql);
                    $row = $result->fetch_assoc();
                    $shopCategory = $row['shop_category_name'];
                    $productCategoryID = $_POST['product_category_id'];
                    $sql = "SELECT * FROM shop_inventory JOIN products JOIN product_type JOIN product_category on shop_inventory.product_id=products.product_id AND products.product_type_id=product_type.product_type_id AND products.product_category_id=product_category.product_category_id WHERE shop_inventory.shop_id='$shopID' AND products.product_category_id='$productCategoryID'";
                    $result = mysqli_query($con,$sql);
                }
                else{
                    echo "Something Went Wrong!";
                    return;
                }
                $i = 0;
                $j = 0;
                if($result->num_rows == 0){
                    echo "<div id='no-items-message'>No items available!</div>";
                }
                while($row = $result->fetch_assoc()){

                ?>
                <!-- product -->
                    <div class="product-card">

                        <div class="product-name">
                            <label><?php echo $row['product_name'];?></label>
                        </div>
                        <div class="thumbnail-container">
                            <img onload="setAllThumbnails()" src="public/images/<?php echo $shopCategory;?>/<?php echo $row['product_thumb'];?>">
                        </div>

                        <?php 
                        $sql = "SELECT * FROM product_seller_edit JOIN product_wt_unit on product_seller_edit.product_wt_unit_id=product_wt_unit.product_wt_unit_id WHERE shop_inventory_id='$row[shop_inventory_id]'";
                        $result2 = mysqli_query($con,$sql);
                        ?>
                        <div class="option-container">
                            <form id="option-form<?php echo $i;?>" action="">
                        <?php

                        while($row2 = $result2->fetch_assoc())
                        {

                            if($row2['product_quantity']>0){
                                $discount = 100*(($row2['product_mrp'] - $row2['product_sp'])/$row2['product_mrp']);
                                $discount = (int)$discount;   

                        ?>
                                    <label onclick="selectLabel(<?php echo $i;?>)" class="radio-label"><input class="radio-btn" type="radio" name="optionID" value="<?php echo $row2['option_id'];?>">
                                        <span class="wt-vol-discount-container">
                                            <span style="color : black;font-weight: bold;" class="wt-vol"><?php echo $row2['product_mass']; ?>&nbsp;<?php echo $row2['product_wt_unit_name'];?></span>
                                            <span class="discount"><?php echo $discount; ?>% Off</span>
                                        </span>
                                        <span class="price-container">
                                            <span style="text-decoration : line-through; color:#bdc3c7;"><?php echo $row2['product_mrp']."₹"; ?></span>
                                            <span style="color : black;font-weight: bold;font-size : 20px;"><?php echo $row2['product_sp']."₹"; ?></span>
                                        </span>

                                        <span class="added-to-cart"><i style="color : green" class="fa fa-check"></i></span>
                                    </label>
                        <?php

                        $optionID = $row2['option_id'];
                                $key = 's'.$shopID;
                                if(isset($_SESSION[$key])){

                                    foreach ($_SESSION[$key] as $optionid) {
                                            if($optionID == $optionid)
                                            {
                                        ?>
                                            <script type="text/javascript">disableCartOptions(<?php echo $j;?>)</script>
                                        <?php
                                                break;
                                            }
                                        }
                                }
                             $j++;
                            }
                        }
                        ?>
                        <script type="text/javascript">
                            
                            $(document).ready(function(){
                                var formID = '#option-form<?php echo $i;?>';

                                $(document).on('submit',formID,function(){ 
                                    var options = document.getElementById('option-form<?php echo $i;?>').getElementsByClassName('radio-btn');
                                var i;
                                var optionID;
                                var shopID = <?php echo $shopID;?>;
                                for(i=0;i<options.length;i++){
                                    if(options[i].checked == true){
                                        optionID = options[i].value;
                                        options[i].checked = false;
                                        options[i].disabled = true;
                                        var parent = options[i].parentNode;
                                        parent.style.background = "#ecf0f1";
                                        parent.style.boxShadow = "none";
                                        parent.style.border = "0.5px solid #bdc3c7";
                                        parent.getElementsByClassName('added-to-cart')[0].style.display = 'block';
                                        
                                        break;
                                    }
                    
                                }
                                <?php 
                                    $itemsCount = 0;
                                    if(isset($_SESSION['shopid'])){
                                        foreach($_SESSION['shopid'] as $shopid){
                                            $temp = 's'.$shopid;
                                            $itemsCount+=sizeof($_SESSION[$temp]);
                                        }
                                    }
                                ?>
                                var num = <?php echo $itemsCount;?>;
                                $("#cart-items").load("add_to_cart.php", {
                                    add : "true",
                                    shopid : shopID,
                                    optionid : optionID,
                                    count : num
                                    });

                                        return false;
                                });
                            });
                        </script>

                        <div class="cart-btn-container">
                                <label style="color : #3498db;">View Details</label>
                                <input class="add-to-cart-btn" type="submit" name="" value="Add to Cart">
                                <input style="display: none;" type="number" name="shopID" value="<?php echo $shopID;?>">
                        </div>
                            </form>
                        </div>
                        <div class="cover-scroll">
                            
                        </div>
                        <?php 
                        if($result2->num_rows<3){

                        ?>
                        <div class="cover-scroll2">
                            
                        </div>
                        <?php
                        }
                        ?>

                        <div class="left-arrow-container">
                            <i class="fa fa-angle-left"></i>
                        </div>
                        <div class="right-arrow-container">
                            <i class="fa fa-angle-right"></i>
                        </div>
                    </div> 
                    <!-- product -->
                <?php

                        $i++;
                }
                ?>
    