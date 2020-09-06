<?php 
//session_start();
include("config.php");
include("header.php");
if(isset($_POST["add_to_cart"]))
{
	if($email != "guest")
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
			'item_id'			=>	$_GET["p_id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}	
	}
else{
	echo "<script>var response = confirm('Do you want to login as guest?');
						if ( response == true )
									{
										window.location = 'login.php';
									}else{
									alert('For order you have to login');
									}
							</script>";
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
				echo '<script>window.location="deals.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
			<br />
			<br />
            <br /><br />
            <div class="main-content-holder">            
<div class="product-container">
                                <div class="m-0 row-cols-2 row-cols-xs-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-5 row">
    
                                <?php
				$query ="SELECT  `p_id`,`p_name`, `p_image` FROM `featureproducts` LIMIT 6";  
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
                        $p_id= $row['p_id'];   
                        $p_name= $row['p_name'];   
                        $p_image= $row['p_image'];   
                                        $result2 = mysqli_query($con,"SELECT  `product_id`, `sell_price` FROM `feature_product_to_storeayments` where `product_id` = $p_id  LIMIT 6");                                    
                                        while($row2 = mysqli_fetch_array($result2)) 
                                        {
                                            $sell_price= $row2['sell_price'];   
                                   //          echo $sell_price."<br>"; 
                                              $product_id= $row2['product_id'];   
                                              // echo $product_id."<br>"; 
				?>
<form method="post" action="deals.php?action=add&p_id=<?php echo $row["p_id"]; ?>">
<div class="col" style="padding-bottom: 15px;">
                                        <div class="product-card-container">
                                            <div class="row">
                                                <div class="product-card-image-container col-md-12">
                                                <img class="img-fluid" src="<?php echo $p_image; ?>">
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
                                                <div class="product-card-name col-md-12"><?php echo $p_name; ?></div>
                                                <div class="product-card-price-container col-md-12">
                                                    <div class="product-card-original-price"><?php echo $sell_price; ?></div>
                                                    <div class="product-card-final-price">Rs 138.00 / Unit</div>
                                                </div>
                                                <div class="product-card-button-container col-md-12">
                                                    <!-- <button type="button" onclick="display()" class="product-card-button-add btn btn-primary btn-block">
                                                    <i class="fas fa-shopping-cart"></i>Add to Cart</button> -->
                                                    <input type="text" name="quantity" value="1" class="form-control" />

<input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>" />
<input type="hidden" name="hidden_price" value="<?php echo $row2["sell_price"]; ?>" />
<input type="submit" name="add_to_cart" style="margin-top:5px;" class="product-card-button-add btn btn-primary btn-block" value="Add to Cart" />

                                                </div>
                          	</div>
                              </div>
				</form>    
</div>
			<?php
                    }
                }
                }
                
            ?>
            </div>    
</div>
			<!-- <div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
                        <td>$ <?php echo $values["item_price"]; ?></td>
                        <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="deals.php?action=delete&p_id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
		</div>
	</div>
	<br /> -->
	<?php include("footer.html"); ?>
	</body>
</html>
