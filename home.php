<?php
require_once "header.php";
require_once "config.php";

					 $fetch="SELECT  `id`,`username` FROM `users` WHERE username='$email' ";
                     $result = mysqli_query($con,$fetch);

                        if($result === FALSE)
                         {
                         die("Query Failed!".mysqli_error().$result);
                         }
                        while($row=mysqli_fetch_assoc($result))
                            {
                         $uid=$row['id'];
                             }
$member_id = $uid; // you can your integerate authentication module here to get logged in member
require_once "DBController.php";
class ShoppingCartd extends DBController
{

    function getAllProduct()
    {
       // $idc=$_GET['id'];
        //echo $idc;  
        $query = "SELECT adminproducts.*,p2s.quantity_in_stock, p2s.sell_price as sell_price, p2s.purchase_price as purchase_price FROM adminproducts LEFT JOIN admin_product_to_store p2s ON (adminproducts.p_id = p2s.product_id) GROUP BY adminproducts.p_id HAVING  quantity_in_stock != '' LIMIT 5";                
        $query = "SELECT bestsellers.*,p2s.quantity_in_stock, p2s.sell_price as sell_price, p2s.purchase_price as purchase_price FROM bestsellers LEFT JOIN bestsellers_product p2s ON (bestsellers.p_id = p2s.product_id) GROUP BY bestsellers.p_id HAVING  quantity_in_stock != '' LIMIT 5";
        $query = "SELECT featureproducts.*,p2s.quantity_in_stock, p2s.sell_price as sell_price, p2s.purchase_price as purchase_price FROM featureproducts LEFT JOIN feature_product_to_storeayments p2s ON (featureproducts.p_id = p2s.product_id) GROUP BY featureproducts.p_id HAVING  quantity_in_stock != '' LIMIT 5";

        $productResult = $this->getDBResult($query);
        return $productResult;
    }

    function getMemberCartItem($member_id)
    {
        $query = "SELECT adminproducts.*,admin_product_to_store.*, tbl_cart.id as cart_id,tbl_cart.quantity FROM adminproducts, tbl_cart,admin_product_to_store WHERE adminproducts.p_id = tbl_cart.product_id AND adminproducts.p_id = admin_product_to_store.product_id AND  tbl_cart.member_id = ? ";
        $query = "SELECT bestsellers.*,bestsellers_product.*, tbl_cart.id as cart_id,tbl_cart.quantity FROM bestsellers, tbl_cart,bestsellers_product WHERE bestsellers.p_id = tbl_cart.product_id AND bestsellers.p_id = bestsellers_product.product_id AND  tbl_cart.member_id = ? ";
        $query = "SELECT featureproducts.*,feature_product_to_storeayments.*, tbl_cart.id as cart_id,tbl_cart.quantity FROM featureproducts, tbl_cart,feature_product_to_storeayments WHERE featureproducts.p_id = tbl_cart.product_id AND featureproducts.p_id = feature_product_to_storeayments.product_id AND  tbl_cart.member_id = ? ";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        
        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }

    function getProductByCode($product_code)
    {
        $query = "SELECT * FROM bestsellers WHERE p_code=?";
        $query = "SELECT * FROM featureproducts WHERE p_code=?";
        $query = "SELECT * FROM adminproducts WHERE p_code=?";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $product_code
            )
        );
        
        $productResult = $this->getDBResult($query, $params);
        return $productResult;
    }

    function getCartItemByProduct($product_id, $member_id)
    {
        $query = "SELECT * FROM tbl_cart WHERE product_id = ? AND member_id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        
        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }

    function addToCart($product_id, $quantity, $member_id)
    {
        $query = "INSERT INTO tbl_cart (product_id,quantity,member_id) VALUES (?, ?, ?)";
        

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        
        $this->updateDB($query, $params);
    }

    function updateCartQuantity($quantity, $cart_id)
    {
        $query = "UPDATE tbl_cart SET  quantity = ? WHERE id= ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );
        
        $this->updateDB($query, $params);
    }

    function deleteCartItem($cart_id)
    {
        $query = "DELETE FROM tbl_cart WHERE id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );
        
        $this->updateDB($query, $params);
    }

    function emptyCart($member_id)
    {
        $query = "DELETE FROM tbl_cart WHERE member_id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        
        $this->updateDB($query, $params);
    }
}


$shoppingCart = new ShoppingCartd();
if (! empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (! empty($_POST["quantity"])) {
                
                $productResult = $shoppingCart->getProductByCode($_GET["code"]);
                
                $cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["p_id"], $member_id);
                
                if (! empty($cartResult)) {
                    // Update cart item quantity in database
                    $newQuantity = $cartResult[0]["quantity"] + $_POST["quantity"];
                    $shoppingCart->updateCartQuantity($newQuantity, $cartResult[0]["id"]);
                } else {
                    $shoppingCart->addToCart($productResult[0]["p_id"], $_POST["quantity"], $member_id);
                }
             
                
            }
            break;
        case "remove":
            // Delete single entry from the cart
            $shoppingCart->deleteCartItem($_GET["id"]);
            break;
        case "empty":
            // Empty cart
            $shoppingCart->emptyCart($member_id);
            break;
    }
}
$cartItem = $shoppingCart->getMemberCartItem($member_id);
if (! empty($cartItem)) {
    $item_quantity = 0;
    $item_price = 0;
    if (! empty($cartItem)) {
        foreach ($cartItem as $item) {

            $item_quantity = $item_quantity + $item["quantity"];
            $item_price = $item_price + ($item["sell_price"] * $item["quantity"]);
           

        }
    }
}
?>
    <html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="assets/css/slide.css">
      </head>
<body>
        <div class="main-content-holder">
            <div>
                    <div class="slideshow-container">

                        <div class="mySlides fade">
                            <div class="numbertext">1 / 3</div>
                            <img src="img/slide1.jpg" alt="slide-image" style="width: 100%; height: 100%;">
                            <div class="text"> One </div>
                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">2 / 3</div>
                            <img src="img/slide2.jpg" alt="slide-image" style="width: 100%; height: 100%;">
                            <div class="text"> Two</div>
                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">3 / 3</div>
                            <img src="img/slide3.jpg" alt="slide-image" style="width: 100%; height: 100%;">
                            <div class="text"> Three</div>
                        </div>

                    </div>
                    <br>

                    <div style="text-align:center">
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>

                    <script>
                        var slideIndex = 0;
                        showSlides();

                        function showSlides() {
                            var i;
                            var slides = document.getElementsByClassName("mySlides");
                            var dots = document.getElementsByClassName("dot");
                            for (i = 0; i < slides.length; i++) {
                                slides[i].style.display = "none";
                            }
                            slideIndex++;
                            if (slideIndex > slides.length) {
                                slideIndex = 1
                            }
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" active", "");
                            }
                            slides[slideIndex - 1].style.display = "block";
                            dots[slideIndex - 1].className += " active";
                            setTimeout(showSlides, 2000); // Change image every 2 seconds
                        }
                    </script>


                    <div>
                        <div class="item-container1">
                            <div class="item1"><i class="fa fa-clock"></i> Delivery within 48 Hours</div>
                            <div class="item1"><i class="fa fa-paper-plane"></i>Deliver to Doorstep</div>
                            <div class="item1"><i class="fa fa-check-circle"></i>Freshness Guaranteed</div>
                            <div class="item1"><i class="fa fa-hand-pointer"></i>Click and Collect</div>
                            <div class="item1"><i class="fa fa-thumbs-up"></i>Amazing Deals</div>
                        </div>
                    </div>

                    <div>
                        <div class="p-0 m-0 row">
                            <div class="full-width-bannner-item col-lg-6 col-md-12 col-12">
                            <a href="utilityPayment.php"> <div class="slide">
                                    <img src="img/slide5.jpg" style="width: 100%; height: 100%;">
                                </div>
                    </a>
                            </div>
                            <div class="bannerSpace col-12">&nbsp;</div>
                            <div class="full-width-bannner-item col-lg-6 col-md-12 col-12">
                            <a href="gift.php">   <div class="slide">
                                <img src="img/slide6.jpg" style="width: 100%; height: 100%;"></div>
                    </a>
                            </div>
                        </div>
                    </div>
                    <div class="all-container">
                        <div class="switcher-container col-md-10 col-12 offset-md-1">
                            <div class="switcher">
                                <div class="switcher-controls-container">
                                <!-- <button type="submit" class="btn btn-success ClickCheck" id="Create " name="but_prev"> <i class="fa fa-arrow-left"></i></button> -->
                                <div class="switcher-control-nexus switcher-control-active">Nexus Deals</div>
                                    <div class="switcher-control-keells">GIT Lanka Deals</div>
                                    <!-- <button type="submit" class="btn btn-success ClickCheck" id="Create " name="but_prev"> <i class="fa fa-arrow-right"></i></button> -->

                                   </div>
                            </div>
                            <div class="product-container">
                                <div class="m-0 row-cols-2 row-cols-xs-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-5 row">
                               
    <?php
    $query = "SELECT adminproducts.*,p2s.quantity_in_stock, p2s.sell_price as sell_price, p2s.purchase_price as purchase_price FROM adminproducts LEFT JOIN admin_product_to_store p2s ON (adminproducts.p_id = p2s.product_id) GROUP BY adminproducts.p_id HAVING quantity_in_stock != '' LIMIT 5";
    $product_array = $shoppingCart->getAllProduct($query);
    if (! empty($product_array)) {
        foreach ($product_array as $key => $value) {
            ?>
    
        <form method="post" action="feature.php?action=add&code=<?php echo $product_array[$key]["p_code"]; ?>" onsubmit="myFunction()">
<div class="col" style="padding-bottom: 15px;">
                                        <div class="product-card-container">
                                            <div class="row">
                                                <div class="product-card-image-container col-md-12">
                                                <img class="img-fluid" src="<?php echo $product_array[$key]["p_image"]; ?>">
                                                    <div class="product-card-promotion-badge">
                                                        <div class="product-card-promotion-badge-nexus">
                                                            <!-- <img class="img-fluid" src="/static/media/Nexus.0af60875.png"> -->
                                                        </div>
                                                        <div class="product-card-promotion-badge-single-line">
                                                            <div class="product-card-promotion-badge-percentage">29</div>
                                                            <div>
                                                                <div class="product-card-promotion-badge-suffix">%</div>
                                                                <div class="product-card-promotion-badge-suffix">Off</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card-name col-md-12"><?php echo $product_array[$key]["p_name"]; ?></div>
                                                <div class="product-card-price-container col-md-12">
                                                    <div class="product-card-original-price"><?php echo $product_array[$key]["sell_price"]; ?></div>
                                                    <div class="product-card-final-price">Rs 138.00 / Unit</div>
                                                </div>
                                                <div class="product-card-button-container col-md-12">
                                                    <!-- <button type="button" onclick="display()" class="product-card-button-add btn btn-primary btn-block">
                                                    <i class="fas fa-shopping-cart"></i>Add to Cart</button> -->
                                                    <input type="hidden" name="quantity" value="1" size="2" class="input-cart-quantity" />
                        <input type="image" src="add-to-cart.png" class="btnAddAction" />
                                           
                                                </div>
                          	</div>
                              </div>
				</form>    
</div>
			<?php
                                }
                }
                
            ?>                            
                                </div>
                                <div class="switcher-main-button-holder row">
                                    <div class="input-group">
                                        <div class="btn-full">
                                        <a href="qty.php" class="btn-inside new-btn-sm ">View All Nexus Deals</a>
                           <div class="input-group-append">
                                                <div class="input-group-text append">
                                                <i class="fas fa-angle-right"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin: 0px;">
                        <div class="col-md-10 col-12 offset-md-1">
                            <div class="section-title">
                                <div class="section-title-line"></div>
                                <div class="section-title-text"><span>Best <strong>Sellers</strong></span></div>
                                <div class="section-title-line"></div>
                            </div>
                        </div>
                    </div>
                    <div class="best-seller-slider">
                        <div class="slide" style="transform: translateX(0%);">
                            <div class="row" style="margin: 0px; padding-bottom: 1.5625rem;">
                                <div class="col-md-10 col-12 offset-md-1">
                                    <div class="m-0 row-cols-2 row-cols-xs-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-5 row">
                    <?php
    $query = "SELECT bestsellers.*,p2s.quantity_in_stock, p2s.sell_price as sell_price, p2s.purchase_price as purchase_price FROM bestsellers LEFT JOIN bestsellers_product p2s ON (bestsellers.p_id = p2s.product_id) GROUP BY bestsellers.p_id HAVING quantity_in_stock != '' LIMIT 5";
    $product_array = $shoppingCart->getAllProduct($query);
    if (! empty($product_array)) {
        foreach ($product_array as $key => $value) {
            ?>

<form method="post" action="home.php?action=add&code=<?php echo $product_array[$key]["p_code"]; ?>" onsubmit="myFunction()">
<div class="col" style="padding-bottom: 15px;">
                                        <div class="product-card-container">
                                            <div class="row">
                                                <div class="product-card-image-container col-md-12">
                                                <img class="img-fluid" src="<?php echo $product_array[$key]["p_image"]; ?>">
                                                    <div class="product-card-promotion-badge">
                                                        <div class="product-card-promotion-badge-nexus">
                                                            <!-- <img class="img-fluid" src="/static/media/Nexus.0af60875.png"> -->
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                <div class="product-card-name col-md-12"><?php echo $product_array[$key]["p_name"]; ?></div>
                                                <div class="product-card-price-container col-md-12">
                                                    <div class="product-card-final-price"><?php echo $product_array[$key]["sell_price"]; ?></div>
                                                    </div>
                                                <div class="product-card-button-container col-md-12">
                                                    <!-- <button type="button" onclick="display()" class="product-card-button-add btn btn-primary btn-block">
                                                    <i class="fas fa-shopping-cart"></i>Add to Cart</button> -->
                                                    <input type="hidden" name="quantity" value="1" size="2" class="input-cart-quantity" />
                        <input type="image" src="add-to-cart.png" class="btnAddAction" />
                                                </div>
                          	</div>
                              </div>
				</form>    
</div>
			<?php
                    }
                }
                
                
            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide" style="transform: translateX(0%);">
                            <div class="row" style="margin: 0px; padding-bottom: 1.5625rem;">
                                <div class="col-md-10 col-12 offset-md-1">
                                    <div class="m-0 row-cols-2 row-cols-xs-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-5 row">
                                        <!-- <div class="col" style="padding-bottom: 15px;">
                                            <div class="product-card-container">
                                                <div class="row">
                                                    <div class="product-card-image-container col-md-12"><img class="img-fluid" src="https://essstr.blob.core.windows.net/essimg/350x/Small/Pic952001.jpg"></div>
                                                    <div class="product-card-name col-md-12">GIT Lanka Hamburger Buns 2S</div>
                                                    <div class="product-card-price-container col-md-12">
                                                        <div class="product-card-final-price">Rs 65.00 / Unit</div>
                                                    </div>
                                                    <div class="product-card-button-container col-md-12">
                                                        <button type="button" class="product-card-button-add btn btn-primary btn-block" onclick="display()">
                                                        <i class="fas fa-shopping-cart"></i>Add to Cart</button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col" style="padding-bottom: 15px;">
                                            <div class="product-card-container">
                                                <div class="row">
                                                    <div class="product-card-image-container col-md-12"><img class="img-fluid" src="https://essstr.blob.core.windows.net/essimg/350x/Small/Pic952002.jpg"></div>
                                                    <div class="product-card-name col-md-12">GIT Lanka Hot Dog Bun 2S</div>
                                                    <div class="product-card-price-container col-md-12">
                                                        <div class="product-card-final-price">Rs 65.00 / Unit</div>
                                                    </div>
                                                    <div class="product-card-button-container col-md-12"><button type="button" class="product-card-button-add btn btn-primary btn-block"><i class="fas fa-shopping-cart"></i>Add to Cart</button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col" style="padding-bottom: 15px;">
                                            <div class="product-card-container">
                                                <div class="row">
                                                    <div class="product-card-image-container col-md-12"><img class="img-fluid" src="https://essstr.blob.core.windows.net/essimg/Small/Default.jpg"></div>
                                                    <div class="product-card-name col-md-12">GIT Lanka Sandwich Bread 750g</div>
                                                    <div class="product-card-price-container col-md-12">
                                                        <div class="product-card-final-price">Rs 185.00 / Unit</div>
                                                    </div>
                                                    <div class="product-card-button-container col-md-12"><button type="button" class="product-card-button-add btn btn-primary btn-block"><i class="fas fa-shopping-cart"></i>Add to Cart</button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col" style="padding-bottom: 15px;">
                                            <div class="product-card-container">
                                                <div class="row">
                                                    <div class="product-card-image-container col-md-12"><img class="img-fluid" src="https://essstr.blob.core.windows.net/essimg/Small/Default.jpg"></div>
                                                    <div class="product-card-name col-md-12">French Bread</div>
                                                    <div class="product-card-price-container col-md-12">
                                                        <div class="product-card-final-price">Rs 120.00 / Unit</div>
                                                    </div>
                                                    <div class="product-card-button-container col-md-12"><button type="button" class="product-card-button-add btn btn-primary btn-block"><i class="fas fa-shopping-cart"></i>Add to Cart</button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col" style="padding-bottom: 15px;">
                                            <div class="product-card-container">
                                                <div class="row">
                                                    <div class="product-card-image-container col-md-12"><img class="img-fluid" src="https://essstr.blob.core.windows.net/essimg/350x/Small/Pic914006.jpg"></div>
                                                    <div class="product-card-name col-md-12">Big Onions</div>
                                                    <div class="product-card-price-container col-md-12">
                                                        <div class="product-card-final-price">Rs 130.00 / KG</div>
                                                    </div>
                                                    <div class="product-card-button-container col-md-12"><button type="button" class="product-card-button-add btn btn-primary btn-block"><i class="fas fa-shopping-cart"></i>Add to Cart</button></div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div><button id="best-seller-slider-goLeft"><i class="fas fa-chevron-left"></i></button><button id="best-seller-slider-goRight"><i class="fas fa-chevron-right"></i></button></div>
                    <div>
                        <div class="p-0 m-0 row">
                            <div class="full-width-bannner-item col-lg-6 col-md-12 col-12">
                                <a href="vegetables.php"><div class="slide"><img src="https://essstr.blob.core.windows.net/uiimg/BannerSections/BannerSection2A.jpg" style="width: 100%; height: 100%;">
                    </a>
                            </div>
                            </div>
                            <div class="bannerSpace col-12">&nbsp;</div>
                            <div class="full-width-bannner-item col-lg-6 col-md-12 col-12">
                                <div class="slide"><img src="https://essstr.blob.core.windows.net/uiimg/BannerSections/BannerSection2B.jpg" style="width: 100%; height: 100%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin: 0px;">
                        <div class="col-md-10 col-12 offset-md-1">
                            <div class="section-title">
                                <div class="section-title-line"></div>
                                <div class="section-title-text"><span>Featured <strong>Products</strong></span></div>
                                <div class="section-title-line"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-12 offset-md-1">
                        <div class="m-0 row-cols-2 row-cols-xs-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-5 row">
                      
    <?php
    $query = "SELECT featureproducts.*,p2s.quantity_in_stock, p2s.sell_price as sell_price, p2s.purchase_price as purchase_price FROM featureproducts LEFT JOIN feature_product_to_storeayments p2s ON (featureproducts.p_id = p2s.product_id) GROUP BY featureproducts.p_id HAVING quantity_in_stock != '' LIMIT 5";
    $product_array = $shoppingCart->getAllProduct($query);
    if (! empty($product_array)) {
        foreach ($product_array as $key => $value) {
            ?>

<form method="post" action="home.php?action=add&code=<?php echo $product_array[$key]["p_code"]; ?>" onsubmit="myFunction()">
<div class="col" style="padding-bottom: 15px;">
                                        <div class="product-card-container">
                                            <div class="row">
                                                <div class="product-card-image-container col-md-12">
                                                <img class="img-fluid" src="<?php echo $product_array[$key]["p_image"]; ?>">
                                                    <div class="product-card-promotion-badge">
                                                        <div class="product-card-promotion-badge-nexus">
                                                            <!-- <img class="img-fluid" src="/static/media/Nexus.0af60875.png"> -->
                                                        </div>
                                                        <div class="product-card-promotion-badge-single-line">
                                                            <div class="product-card-promotion-badge-percentage">29</div>
                                                            <div>
                                                                <div class="product-card-promotion-badge-suffix">%</div>
                                                                <div class="product-card-promotion-badge-suffix">Off</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card-name col-md-12"><?php echo $product_array[$key]["p_name"]; ?></div>
                                                <div class="product-card-price-container col-md-12">
                                                    <div class="product-card-original-price"><?php echo $product_array[$key]["sell_price"]; ?></div>
                                                    <div class="product-card-final-price">Rs 138.00 / Unit</div>
                                                </div>
                                                <div class="product-card-button-container col-md-12">
                                                <input type="hidden" name="quantity" value="1" size="2" class="input-cart-quantity" />
                        <input type="image" src="add-to-cart.png" class="btnAddAction" />
                        
                                                </div>
                          	</div>
                              </div>
				</form>    
</div>
			<?php
                    }
                
                }
                
            ?>
                        </div>
                    </div>
                    <div class="row" style="margin: 0px;">
                        <div class="col-md-10 col-12 offset-md-1">
                            <div class="section-title">
                                <div class="section-title-line"></div>
                                <div class="section-title-text"><span>Shop By <strong>Category</strong></span></div>
                                <div class="section-title-line"></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count=0;
                    $image=[];
                    
                    $c=0;
                    $id=[];
include 'config.php';
$result = mysqli_query($con,"SELECT category_image,category_id FROM categorys LIMIT 6;");
			while($row = mysqli_fetch_array($result)) {
            $img= $row['category_image'];
            $idc= $row['category_id'];
            //echo $idc;
$image[$count]=$img;
$count = $count +1;

$id[$c]=$idc;
$c = $c +1;

                        }
                        $image0= $image[0];
                        $image1= $image[1];
                        $image2= $image[2];
                        $image3= $image[3];
                        $image4= $image[4];
                        $image5= $image[5];

                        $id0= $id[0];
                        $id1= $id[1];
                        $id2= $id[2];
                        $id3= $id[3];
                        $id4= $id[4];
                        $id5= $id[5];

                        // $image6= $image[6];
                  //      echo $image0,$image1,$image2,$image3,$image4,$image5;
                //echo $id0,$id1,$id2,$id3,$id4,$id5;
                                    ?>
                    <div class="col">
                        <div class="wrapper">
                        <!-- <div class="tile1-cat" style="background: url(&quot;<?php echo $image0; ?>&quot;);"></div> -->
                        <div class="tile1-cat" style="background: url(&quot;<?php echo $image0; ?>&quot;);">
    <a href='qtydynamic.php?id=<?php echo $id0;?>' style="display:block;width:100px;height:20px;">&nbsp;</a>
</div>

                            <div class="">
                                <div class="slide">
                                <a href='qtydynamic.php?id=<?php echo $id1;?>'><img src="<?php echo $image1; ?>"  style="width: 100%; height: auto;">
                            </div>
                            </div></a>
                            <div class="nested ">
                                <div class="to-bottom tile3-cat">
                                <a href='qtydynamic.php?id=<?php echo $id2;?>'><img src="<?php echo $image2; ?>"  style="width: 100%; height: auto;">
                                </div></a>
                                <div class="to-bottom tile4-cat">
                                <a href='qtydynamic.php?id=<?php echo $id3;?>'><img src="<?php echo $image3; ?>"  style="width: 100%; height: auto;"></div>
                            </div></a>
                            <div class="nested">
                                <div class="to-bottom tile5-cat">
                                <a href='qtydynamic.php?id=<?php echo $id4;?>'><img src="<?php echo $image4; ?>"  style="width: 100%; height: auto;"></a></div>
                                
                                <div class="to-bottom tile6-cat">
                                <a href='qtydynamic.php?id=<?php echo $id5;?>'><img src="<?php echo $image5; ?>"  style="width: 100%; height: auto;"></a></div>
                                </div>
                        </div>
                    </div>
                    <div class="row" style="margin: 0px;">
                        <div class="col-md-10 col-12 offset-md-1">
                            <div class="section-title">
                                <div class="section-title-line" style="display: none;"></div>
                                <div class="section-title-text"></div>
                                <div class="section-title-line" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="p-0 m-0 row">
                            <div class="full-width-bannner-item col-lg-6 col-md-12 col-12">
                                <div class="slide">
                                    <img src="https://essstr.blob.core.windows.net/uiimg/BannerSections/BannerSection4A.jpg" style="width: 100%; height: 100%;"></div>
                            </div>
                            <div class="bannerSpace col-12">&nbsp;</div>
                            <div class="full-width-bannner-item col-lg-6 col-md-12 col-12">
                                <div class="slide">
                                    <img src="https://essstr.blob.core.windows.net/uiimg/BannerSections/BannerSection4B.jpg" style="width: 100%; height: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin: 0px;">
                        <div class="col-md-10 col-12 offset-md-1">
                            <div class="section-title">
                                <div class="section-title-line" style="display: none;"></div>
                                <div class="section-title-text"></div>
                                <div class="section-title-line" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
                    <div></div>
            </div>
        </div>
        <?php include("footer.html"); ?>
</div>

<script>
$(document).ready(function() {
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
				$("#dvPassport").show();
            } else{
				$("#dvPassport").hide();
            }
        });
    }).change();

	$('#category').on('change', function() {

			var category_id = this.value;

debugger;
          //  alert(category_id);
			$.ajax({
				url: "get_subcat.php",
				type: "POST",
				data: {
					category_id: category_id
				},
				cache: false,
				success: function(dataResult){
					$("#sub_category").html(dataResult);
         		}
			});


	});
});

function display() {
               //alert("Hello World")
               var myvar='<?php echo $email;?>';
             //  alert(myvar);
               if(myvar== 'guest')
               {
                var response = confirm('Do you want to login as guest?');
                    if ( response == true )
                    {
                        window.location = "login.php";

                  //  alert("A  fine choice!")
                    }else{
                    alert("For order you have to login")
                    }
               }
               else{
                
                alert("Add!")
               }
            }
         
    
function myFunction() {
    
  var myvar='<?php echo $email;?>';
//               alert(myvar);
               if(myvar== 'guest')
               {
                var response = confirm('Do you want to login as guest?');
                    if ( response == true )
                    {
                        // window.location = "login.php";
                        window.open('login.php', '_blank');

                    }
                    else{
                        alert("For order you have to login");
                        return false;

                    }
               }
               else{
                
                alert("Record Inserted!")
               }
}
</script>