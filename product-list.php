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

    <div class="main-content-holder">            
<div class="product-container">
<div class="m-0 row-cols-2 row-cols-xs-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-5 row">
    
    <?php
    
    $query = "SELECT adminproducts.p_id,adminproducts.p_image,adminproducts.p_code,adminproducts.p_name,p2s.quantity_in_stock, p2s.sell_price as sell_price, p2s.purchase_price as purchase_price FROM adminproducts LEFT JOIN admin_product_to_store p2s ON (adminproducts.p_id = p2s.product_id) GROUP BY adminproducts.p_id ";
    $product_array = $shoppingCart->getAllProduct($query);
	
    if (! empty($product_array)) {
		
        foreach ($product_array as $key => $value) {
			  
            ?>
    
        <form method="post" action="qty.php?action=add&code=<?php echo $product_array[$key]["p_code"]; ?>" onsubmit="myFunction()">
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
                                                <input type="text" name="quantity" value="1"
                        size="2" class="input-cart-quantity" />
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