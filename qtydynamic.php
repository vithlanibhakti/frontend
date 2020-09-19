<html lang="en">
<head>
<meta charset="utf-8">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="script.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>GIT Lanka Online</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/homepage.css">
</head>
<body>
<br>
<?php
$idc=$_GET['id'];
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
                        //echo "<script>alert('$uid')</script>"; 
                             }
$member_id = $uid; // you can your integerate authentication module here to get logged in member
require_once "DBController.php";
class ShoppingCartd extends DBController
{

    function getAllProduct()
    {
        $idc=$_GET['id'];
        //echo $idc;  
                
        $query = "SELECT products.*,p2s.quantity_in_stock, p2s.sell_price as sell_price, p2s.purchase_price as purchase_price FROM products LEFT JOIN product_to_store p2s ON (products.p_id = p2s.product_id) GROUP BY products.p_id HAVING quantity_in_stock != '' AND category_id = '$idc' ";
        
        $productResult = $this->getDBResult($query);
        return $productResult;
    }

    function getMemberCartItem($member_id)
    {
        
        $query = "SELECT products.*,product_to_store.*, tbl_cart.id as cart_id,tbl_cart.quantity FROM products, tbl_cart,product_to_store WHERE products.p_id = tbl_cart.product_id AND products.p_id = product_to_store.product_id AND  tbl_cart.member_id = ? ";
        
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
        $query = "SELECT * FROM products WHERE p_code=?";
        
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
        $query = "INSERT INTO tbl_cart (product_id,quantity,member_id) VALUES (?, ?,?)";
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
            // ,
            // array(
            //     "param_type" => "i",
            //     "param_value" => $p_code
            // )
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
                
                $cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["p_code"], $member_id);
                
                if (! empty($cartResult)) {
                    // Update cart item quantity in database
                    $newQuantity = $cartResult[0]["quantity"] + $_POST["quantity"];
                    $shoppingCart->updateCartQuantity($newQuantity, $cartResult[0]["id"]);
                   // echo '<script>alert("Item Added successfully")</script>';
                } else {
                    // Add to cart table
                    $shoppingCart->addToCart($productResult[0]["p_code"], $_POST["quantity"], $member_id);
               //     echo '<script>alert("Item Added successfully")</script>';
                    //$idc=$_GET['id'];
                    //echo '<script>alert('$idc')</script>';
                    //echo "<script type=\"text/javascript\">\n";
                    //echo "var foo = ${idc};\n";
//                    echo "alert('value is:' + foo);\n";
//                     echo "</script>\n";

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
?>
<?php
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
    <!-- <div id="shopping-cart"> -->
        <!-- <div class="txt-heading">
            <div class="txt-heading-label">Shopping Cart</div>

            <a id="btnEmpty" href="qtydynamic.php?action=empty"><img
                src="empty-cart.png" alt="empty-cart" title="Empty Cart"
                class="float-right" /></a>
            <div class="cart-status">
                <div>Total Quantity: <span id="total-quantity"><?php echo $item_quantity; ?></span></div>
                <div>Total Price: <span id="total-price"><?php echo $item_price; ?></span></div>
            </div>
        </div>
<?php
if (! empty($cartItem)) {
    ?>
<div class="shopping-cart-table">
            <div class="cart-item-container header">
                <div class="cart-info title">Title</div>
                <div class="cart-info">Quantity</div>
                <div class="cart-info price">Price</div>
            </div>
<?php
    foreach ($cartItem as $item) {
        ?>
				<div class="cart-item-container">
                <div class="cart-info title">
                    <?php echo $item["p_name"]; ?>
                    
                  
                </div>

                <div class="cart-info quantity">
                    <div class="btn-increment-decrement" onClick="decrement_quantity(<?php echo $item["cart_id"]; ?>, '<?php echo $item["sell_price"]; ?>')">-</div>
                    <input class="input-quantity"
                        id="input-quantity-<?php echo $item["cart_id"]; ?>" value="<?php echo $item["quantity"]; ?>">
                        <div class="btn-increment-decrement"
                        onClick="increment_quantity(<?php echo $item["cart_id"]; ?>, '<?php echo $item["sell_price"]; ?>')">+</div>
                </div>

                <div class="cart-info price" id="cart-price-<?php echo $item["cart_id"]; ?>">
                        <?php echo "$". ($item["sell_price"] * $item["quantity"]); ?>
                    </div>


                <div class="cart-info action">
                    <a
                        href="qtydynamic.php?action=remove&id=<?php echo $item["cart_id"]; ?>"
                        class="btnRemoveAction"><img
                        src="icon-delete.png" alt="icon-delete"
                        title="Remove Item" /></a>
                </div>
            </div>
				<?php
    }
    ?>
</div>
  <?php
}
?> 
</div> -->
    
<div class="main-content-holder">
        <div>
            <div class="page-header-area" style="background-image: url(&quot;https://essstr.blob.core.windows.net/uiimg/PageHeader/ProductListingPageHeader.png&quot;);">
                <div id="page-header">
                    <div class="row" style="margin: 0px;">
                        <div class="col-md-10 col-12 offset-md-1">
                            <div class="page-header-breadcrumb"><a class="page-header-breadcrumb-link" href="/home">Home</a><i class="fas fa-caret-right"></i>
                                <div><a>All Relevant</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin: 0px;">
                        <div class="col-md-10 col-12 offset-md-1"><span>Snacks</span></div>
                    </div>
                </div>
            </div>
             <div class="row mt-3">
                <div class="sorting-holder 
                     col-md-2 offset-md-9"><span>
                         <div class="dropdown">Sort by:
                         <select id="foo" class="item-order-sort-link dropdown-toggle btn btn-primary">
    <option value="">Relevant</option>
    <option value="sortname.php?id=<?php echo $idc;?>">Name (A- Z)</option>
    <option value="sortprice.php?id=<?php echo $idc;?>">Price</option>
</select>
                        </div></span>
                        </div>
            </div> 
            <div class="row" style="margin: 0px;">
                <div class="row col-md-10 col-12 offset-md-1">
                    <div class="col-md-3 col-12"><span class="category-title"> Shop by <strong>Category</strong></span>
                        <hr>
                        <div class="category-container mb-1">
                     
                        <?php 
                        include 'config.php';
                        //echo "<script>alert('$idc')</script>";                        
                                    $result1 = mysqli_query($con,"SELECT  `category_name`,`sub_id` FROM `sub_categorys` WHERE `category_id`=$idc;");                                    
                                    while($row1 = mysqli_fetch_array($result1)) 
                                    {
                                        $category_name= $row1['category_name'];   
                                        $sub_id= $row1['sub_id'];   
                                      
                     ?>
                            <div class="mb-1 category-item">
                            <span><a href='subdynamic.php?id=<?php echo $sub_id;?>&proid=<?php echo $idc; ?>''>      <?php echo $category_name; ?></a></span>
                            <i class="fas fa-angle-right"></i></div>
                            <?php } ?>

                        </div><span class="category-title"><strong>Brands</strong>
                        </span>
                           
                        <hr>
                        <div class="category-brand-container mb-3 mt-3 pl-1">
                        
                        <?php 
                        include 'config.php';
                        //echo "<script>alert('$idc')</script>";                        
                                    $result1 = mysqli_query($con,"SELECT  `brand_name`,`brand_id` FROM `brands` WHERE `category_id`=$idc;");                                    
                                    while($row1 = mysqli_fetch_array($result1)) 
                                    {
                                        $brand_name= $row1['brand_name'];   
                                        $brand_id= $row1['brand_id'];   
                                      
                     ?>
                            <div class="custom-controls-stacked">
                                <div class="custom-control custom-radio mb-2">
                                <!-- <input name="rdoBrands" id="rdoBrands" type="radio" class="custom-control-input" value="<?php echo $brand_name;?>"> -->
                                <input type='radio' name='radiburdoBrandstton' value='<?php echo $brand_id;?>'>
                                
                                 <?php echo $brand_name;?>
                                </div>
                            </div>
                                    <?php } ?>
                        </div>
                        <!-- <span class="category-title"><strong>Price</strong></span>
                        <hr> -->
                        <div class="mt-5">
                            <!-- <div aria-disabled="false" class="input-range"><span class="input-range__label input-range__label--min"><span class="input-range__label-container">0</span></span>
                                <div class="input-range__track input-range__track--background">
                                    <div class="input-range__track input-range__track--active" style="left: 0%; width: 100%;"></div><span class="input-range__slider-container" style="position: absolute; left: 0%;"><span class="input-range__label input-range__label--value"><span class="input-range__label-container">0</span></span>
                                    <div aria-valuemax="5000"
                                        aria-valuemin="0" aria-valuenow="0" class="input-range__slider" draggable="false" role="slider" tabindex="0"></div>
                                    </span><span class="input-range__slider-container" style="position: absolute; left: 100%;"><span class="input-range__label input-range__label--value"><span class="input-range__label-container">5000</span></span>
                                    <div aria-valuemax="5000"
                                        aria-valuemin="0" aria-valuenow="5000" class="input-range__slider" draggable="false" role="slider" tabindex="0"></div>
                                    </span>
                                </div><span class="input-range__label input-range__label--max"><span class="input-range__label-container">5000</span></span>
                            </div><span class="price-range-text mt-3 d-flex"><strong>Price&nbsp;</strong> Rs. 0 - Rs. 5000</span></div> -->
                            </div>
                            </div>
         <div class="col-md-9 col-12">
                        <div class="m-0 row-cols-2 row-cols-xs-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row">
         

    <?php
    //echo $idc;
    $query = "SELECT products.*,p2s.quantity_in_stock, p2s.sell_price as sell_price, p2s.purchase_price as purchase_price FROM products LEFT JOIN product_to_store p2s ON (products.p_id = p2s.product_id) GROUP BY products.p_id HAVING quantity_in_stock != '' AND category_id = '$idc'";
    $product_array = $shoppingCart->getAllProduct($query);

    if (! empty($product_array)) {
		
        foreach ($product_array as $key => $value) {
			  
            ?>
    
        <form method="post" action="qtydynamic.php?action=add&code=<?php echo $product_array[$key]["p_code"]; ?>&id=<?php echo $idc; ?>" onsubmit="myFunction()">
        <div class="col" style="padding-bottom: 15px;">
                        <div class="product-card-container">
                                       <div class="row">
                                                <div class="product-card-image-container col-md-12">
                                                <img class="img-fluid" src="<?php echo $product_array[$key]["p_image"]; ?>">
                                                </div>
                                                <div class="product-card-name col-md-12"><?php echo $product_array[$key]["p_name"]; ?></div>
                                                <div class="product-card-price-container col-md-12">
                                                    <div class="product-card-final-price"><?php echo $product_array[$key]["sell_price"]; ?></div>
                                                    <!-- <div class="product-card-final-price">Rs 138.00 / Unit</div> -->
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
    else{
        ?>
       <div><h1>Product out of stock</h1></div>
<?php
    }
    ?>
</div>
</div>

<script>
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
<?php //require_once "product-listd.php"; ?>
    
</BODY>
</HTML>
 <script>
$(document).ready(function() {
//     setTimeout(function(){
//    window.location.reload(1);
// }, 5000);

$('input[type=radio]').click(function(e) {
		var gender = $(this).val(); 
        //alert(gender);
        
  var url = "branddata.php?id=" + encodeURIComponent(gender);
        window.location.href = url;
		
    });});
    document.getElementById("foo").onchange = function() {
        if (this.selectedIndex!==0) {
            window.location.href = this.value;
        }        
    };
</script> 