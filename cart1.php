<?php
require_once "DBController.php";
class ShoppingCart extends DBController
{
    function getMemberCartItem($member_id)
    {

     //$query = "SELECT adminproducts.*,admin_product_to_store.*, tbl_cart.id as cart_id,tbl_cart.quantity FROM adminproducts, tbl_cart,admin_product_to_store WHERE adminproducts.p_code = tbl_cart.product_id AND adminproducts.p_id = admin_product_to_store.product_id AND  tbl_cart.member_id = ? ";
       $query = "SELECT products.*,product_to_store.*, tbl_cart.id as cart_id,tbl_cart.quantity FROM products, tbl_cart,product_to_store WHERE products.p_code = tbl_cart.product_id AND products.p_id = product_to_store.product_id AND  tbl_cart.member_id = ? ";
     //$query = "SELECT bestsellers.*,bestsellers_product.*, tbl_cart.id as cart_id,tbl_cart.quantity FROM bestsellers, tbl_cart,bestsellers_product WHERE bestsellers.p_code = tbl_cart.product_id AND bestsellers.p_id = bestsellers_product.product_id AND  tbl_cart.member_id = ? ";
     //   $query = "SELECT featureproducts.*,feature_product_to_storeayments.*, tbl_cart.id as cart_id,tbl_cart.quantity FROM featureproducts, tbl_cart,feature_product_to_storeayments WHERE featureproducts.p_id = tbl_cart.product_id AND featureproducts.p_id = feature_product_to_storeayments.product_id AND  tbl_cart.member_id = ? ";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );

        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;

        //$query = "SELECT products.*,product_to_store.*, tbl_cart.id as cart_id,tbl_cart.quantity FROM products, tbl_cart,product_to_store WHERE products.p_id = tbl_cart.product_id AND products.p_id = product_to_store.product_id AND  tbl_cart.member_id = ? ";
        // $params = array(
        //     array(
        //         "param_type" => "i",
        //         "param_value" => $member_id
        //     )
        // );

        // $cartResult = $this->getDBResult($query, $params);
        // return $cartResult;

    }

    function getProductByCode($product_code)
    {
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
?>
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
                        //echo "<script>alert('$uid')</script>";
                            }
$member_id = $uid; // you can your integerate authentication module here to get logged in member

$shoppingCart = new ShoppingCart();
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
                    // Add to cart table

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
?>
<?php
include 'config.php';
$result1 = mysqli_query($con,"SELECT  `product_id`,`id` FROM `tbl_cart` WHERE `member_id`=$member_id;");
            while($row1 = mysqli_fetch_array($result1))
            {
                $product_id= $row1['product_id'];
                $c_id= $row1['id'];
  //              echo "<script>alert('productid ==' + '$product_id')</script>";

                $ar = [$product_id];
                $str= implode(', ', $ar);
//                echo "<script>alert('implod ==' + '$str')</script>";
                $resul1 = mysqli_query($con,"SELECT  `alert_quantity` FROM `admin_product_to_store` WHERE `product_id`=$str;");
                while($row = mysqli_fetch_array($resul1))
                {
                    $alert_quantity= $row['alert_quantity'];
                    $aar = [$alert_quantity];
                }
            }
            
?>
<html lang="en">
<head>

<link rel="stylesheet" href="assets/css/productcart.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="jquery-3.2.1.min.js"></script>
<script>
debugger;
function increment_quantity(cart_id, sell_price) {

    $.ajax({
			url: "increment.php",
			type: "POST",
			data:{
				cart_id: cart_id,
                sell_price : sell_price
			},
			success: function(dataResult){
		//		alert("Updated");
				//alert(dataResult);
        var inputQuantityElement = $("#input-quantity-"+cart_id);
     //  alert("stock" +dataResult);
       //alert("cr" +inputQuantityElement.val());
    if($(inputQuantityElement).val() < dataResult)
    {
   //     alert("d");
    var newQuantity = parseInt($(inputQuantityElement).val()) + 1;
    var newPrice = newQuantity * sell_price;
    save_to_db(cart_id, newQuantity, newPrice);
    }
    else{
        alert("out of stock");
    }
			}
			
		});

//     //alert(cart_id);
//     var inputQuantityElement = $("#input-quantity-"+cart_id);
// //alert(val);
// if($(inputQuantityElement).val() <= val)
// {
//     var newQuantity = parseInt($(inputQuantityElement).val())+1;
//     var newPrice = newQuantity * sell_price;
//     save_to_db(cart_id, newQuantity, newPrice);
// }
}

function decrement_quantity(cart_id, sell_price) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    if($(inputQuantityElement).val() > 1)
    {
    var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
    var newPrice = newQuantity * sell_price;
    save_to_db(cart_id, newQuantity, newPrice);
    }
}

function save_to_db(cart_id, new_quantity, newPrice) {
	var inputQuantityElement = $("#input-quantity-"+cart_id);
	var priceElement = $("#cart-price-"+cart_id);
    $.ajax({
		url : "update_cart_quantity.php",
		data : "cart_id="+cart_id+"&new_quantity="+new_quantity,
		type : 'post',
		success : function(response) {
			$(inputQuantityElement).val(new_quantity);
            $(priceElement).text("$"+newPrice);
            var totalQuantity = 0;
            $("input[id*='input-quantity-']").each(function() {
                var cart_quantity = $(this).val();
                totalQuantity = parseInt(totalQuantity) + parseInt(cart_quantity);
            });
            $("#total-quantity").text(totalQuantity);
            var totalItemPrice = 0;
            $("div[id*='cart-price-']").each(function() {
                var cart_price = $(this).text().replace("$","");
                totalItemPrice = parseInt(totalItemPrice) + parseInt(cart_price);
            });
            $("#total-price").text(totalItemPrice);
		}
	});
}
</script>

</HEAD>
<BODY>
<br><br><br><br>
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

    <!-- <div id="shopping-cart">
        <div class="txt-heading">
            <div class="txt-heading-label">Shopping Cart</div>

            <a id="btnEmpty" href="qty.php?action=empty"><img
                src="empty-cart.png" alt="empty-cart" title="Empty Cart"
                class="float-right" /></a>
            <div class="cart-status">

            </div>
        </div> -->
        <form method="post" action="addtocart.php" >
        <div class="main-content-holder">
    <div class="col-md-10 offset-md-1">
        <div style="padding-top: 2.5rem; padding-bottom: 1.5625rem; margin: 0px;" class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <br><br>
            
                <div class="product-cart">
                    <div class="product-cart-detail">
                        <div class="header-section">
                            <div id="product-name">Product Name</div>
                            <div id="product-quantity">Qty</div>
                            <div id="product-price">Price</div>
                            <div id="product-discount">Discount</div>

                            <div id="product-action">Action</div>
                        </div>

<?php
if (! empty($cartItem)) {
    ?>
<?php
    foreach ($cartItem as $item) {
        ?>
	      <div class="detail-section">
                           <div class="detail-row">
                               <div id="product-column">
                                   <span><?php echo $item["p_name"]; ?> <br><span class="out-of-stock" style="display: none;"></span></span>
                               </div>

                               <div class="cart-info quantity">
                    <div class="btn-increment-decrement" onClick="decrement_quantity(<?php echo $item["cart_id"]; ?>, '<?php echo $item["sell_price"]; ?>')">-</div>
                    <input class="input-quantity"  id="input-quantity-<?php echo $item["cart_id"]; ?>" value="<?php echo $item["quantity"]; ?>">
                        
                        <div class="btn-increment-decrement" onClick="increment_quantity(<?php echo $item["cart_id"]; ?>, '<?php echo $item["sell_price"]; ?>')">+</div>
                </div>

                        <div class="cart-info price" id="cart-price-<?php echo $item["cart_id"]; ?>">
                        <?php echo "$". ($item["sell_price"] * $item["quantity"]); ?>
                    </div>

                                <div id="discount-column" style="color: rgb(90, 188, 58);">Rs. 0.00</div>


                               <div><a        href="cart1.php?action=remove&id=<?php echo $item["cart_id"]; ?>"
                        class="btnRemoveAction"><img
                        src="icon-delete.png" alt="icon-delete"
                        title="Remove Item" /></a>
                                   </div>
                           </div>


                       </div>

				<?php
    }
    ?>
</div>
  <?php
}
?>
<div class="product-cart-summary">
<?php
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

                            $fetch="SELECT * FROM shipping WHERE id = (SELECT MAX(id) FROM shipping WHERE uid = '$uid')";
                        $result = mysqli_query($con,$fetch);

                        if($result === FALSE)
                        {
                        die("Query Failed!".mysqli_error().$result);
                        }
                        while($row=mysqli_fetch_assoc($result))
                        {
                        $method=$row['method'];

                        }


if( $email !== "guest")
{
if($method == "pickup" )
{
$d=0;
}
else
{
    $d=150;
}
}
else{
    $d=0;
}

?>

<div class="detail-section">
<?php if (! empty($cartItem))
{
?>
                            <div><span id="summary-column-name">Item Count</span>
                            <span id="total-quantity"><?php echo $item_quantity; ?></span>
                            </div>
                            <div><span id="summary-column-name">Subtotal</span>
                            <span id="total-price"><?php echo $item_price; ?></span></div>
                            <div><span id="summary-column-name">Delivery Charges</span>

                            <span id="summary-column-value">Rs.<?php echo $d; ?></span></div>
                            <div><span id="summary-column-name">Total Nexus Discounts</span>
                            <span id="summary-column-value">Rs. 0.00</span></div>
                            <div><span id="summary-column-name">Total GIT Lanka Discounts</span>
                            <span id="summary-column-value">Rs. 0.00</span></div>
                            <div style="border: 0px none;">
                            <span id="summary-column-name">Total Discounts</span>
                            <span id="summary-column-value">Rs. 0.00</span></div>
                        </div>


                        <div class="summary-est_total">
                            <span id="summary-column-name">Total</span>
                            <span id="summary-column-value">Rs.      <?php $final=$d + $item_price; echo number_format($final, 2);?></span></div>

                        <!-- <div class="mt-2">
                            <div class="input-group"><input autocomplete="off" id="cartTemplateName" name="cartTemplateName" placeholder="Cart Name" type="text" class="form-control no-right-radius no-right-border" value="">
                                <div class="input-group-append"><button class="new-btn
  new-btn-primary new-btn-sm   no-left-radius" type="button"> Save</button></div>
                            </div>
                        </div> -->
                        <?php if($final > '0' )

                        {
                            ?>
                        <button class="summary-checkout-button" id="enter" type="submit" name="submit">Proceed to Checkout</button>
<?php
                    }
                    else{ ?>
                         <button class="summary-checkout-button" id="enter" disabled="true" type="submit" name="submit">Proceed to Checkout</button>
                    <?php }
     }
                    ?>
                        <!-- <div class="summary-checkout-button" >Proceed to Checkout</div> -->
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

    <?php include("footer.php"); ?>
</BODY>
</HTML>
   <script>
//  $(document).ready(function() {
//      setTimeout(function(){
//     window.location.reload(1);
//  }, 3000);
// });
</script> 