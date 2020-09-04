
<?php 
//session_start();
include("config.php");
include("header.php");
//echo "<script>alert('$email');</script>";
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "p_id");
		if(!in_array($_GET["p_id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["p_id"],
                'item_name'			=>	$_POST["hidden_name"],
                'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
            echo '<script>alert("Item Added successfully")</script>';
        }
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'p_id'			=>	$_GET["p_id"],
			'p_name'			=>	$_POST["hidden_name"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["p_id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}

?> 
<html lang="en">

<head>

<meta charset="utf-8">
<link rel="stylesheet" href="assets/css/product.css">
<link rel="stylesheet" href="assets/css/productcart.css">
<body>

<form id="addtocart" method="post" name="addtocart" action="addtocart.php">
    <div class="main-content-holder">
    <div class="col-md-10 offset-md-1">
        <div style="padding-top: 2.5rem; padding-bottom: 1.5625rem; margin: 0px;" class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <br><br>
                <div class="product-cart">
                    <div class="product-cart-detail">
                        <div class="header-section">
                            <div id="product-name">Product Name</div>
                            <div id="product-price">Price</div>
                            <div id="product-quantity">Qty</div>
                            <div id="product-discount">Discount</div>
                            <div id="product-total">Total</div>
                            <div id="product-action">Action</div>
                        </div>
                        
                        <?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
                        <div class="detail-section">
                           
                            <div class="detail-row">
                                <div id="product-column">
                                    
                                    <span><?php echo $values["item_name"]; ?> <br><span class="out-of-stock" style="display: none;"></span></span>
                                </div>
                                <div id="price-column">Rs.  <?php echo $values["item_price"]; ?></div>
                                <div><i class="fa fa-minus cart-qty-minus-btn" aria-hidden="true" style="cursor: pointer;">
                                    </i>
                                <span><?php echo $values["item_quantity"]; ?></span>
                                <i class="fa fa-plus cart-qty-plus-btn" aria-hidden="true" style="cursor: pointer;"></i></div>
                                <div id="discount-column" style="color: rgb(90, 188, 58);">Rs. 0.00</div>
                                <div id="total-column">Rs. <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></div>
                                <div><a href="cart.php?action=delete&p_id=<?php echo $values["item_id"]; ?>">
                                <span class="text-danger"><i class="fa fa-times cart-item-remove-btn" aria-hidden="true" id="69049"></i></span></a>
                                    </div>
                            </div>
                        

                        </div>
                        <?php
                $total = $total + ($values["item_quantity"] * $values["item_price"]);    
                }
                }
					?>
					



                    </div>
                    <div class="product-cart-summary">
                    <?php
					if(!empty($_SESSION["shopping_cart"]))
					{

                        $a= count($_SESSION['shopping_cart']);

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
                    }


if($method == "pickup" )
{
$d=0;
}
else 
{
    $d=150;
}
?>

<div class="detail-section">
                            
                            <div><span id="summary-column-name">Item Count</span>
                            <span id="summary-column-value"><?php echo $a; ?></span></div>
                            <div><span id="summary-column-name">Subtotal</span>
                            <span id="summary-column-value">Rs. <?php echo number_format($total, 2); ?>
                        
                       
                        </span></div>

                            <div><span id="summary-column-name">Delivery Charges</span>
                            
                            <span id="summary-column-value">Rs.<?php echo $d; ?></span></div>
                            <div><span id="summary-column-name">Total Nexus Discounts</span>
                            <span id="summary-column-value">Rs. 0.00</span></div>
                            <div><span id="summary-column-name">Total Keells Discounts</span>
                            <span id="summary-column-value">Rs. 0.00</span></div>
                            <div style="border: 0px none;">
                            <span id="summary-column-name">Total Discounts</span>
                            <span id="summary-column-value">Rs. 0.00</span></div>
                        </div>

                        
                        <div class="summary-est_total">
                            <span id="summary-column-name">Total</span>
                            <span id="summary-column-value">Rs.      <?php $final=$d + $total; echo number_format($final, 2);?></span></div>
                            
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
                    
                </div>
            </div>
        </div>
    </div>
</div>
                </form>
<?php include("footer.html"); ?>