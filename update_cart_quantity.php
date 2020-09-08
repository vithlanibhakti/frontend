<?php
require_once "ShoppingCart.php";

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
 
$shoppingCart->updateCartQuantity($_POST["new_quantity"], $_POST["cart_id"]);
                
?>