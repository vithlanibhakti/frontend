
<?php 
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
                'did'			=>	$_POST["did"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
            echo '<script>alert("Item Added successfully")</script>';
            
$idc=$_GET['did'];

echo "<script type=\"text/javascript\">\n";
echo "var foo = ${idc};\n";
//echo "alert('value is:' + foo);\n";
echo "</script>\n";
echo '<script> window.location.href= "dynamic.php?id=" + foo</script>';

            
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
            'did'			=>	$_POST["did"],
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
				echo '<script>window.location="home.php"</script>';
			}
		}
	}
}

?>

<?php  
$idc=$_GET['id'];

?>
<html lang="en">

<head>
<style>
.product-card-container{transition:box-shadow .3s;background-color:#fff;border-radius:1.875rem 0;padding:.625rem;text-align:center;letter-spacing:.01rem;font-size:1rem}.product-card-container:hover{box-shadow:.625rem .625rem 3.6875rem rgba(0,0,0,.06)}.product-card-name{color:#000;padding-top:.875rem;height:3.75rem;max-height:3.75rem;overflow:hidden;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;text-overflow:ellipsis}.product-card-image-container{position:relative;display:inline-block;cursor:pointer}.product-card-promotion-badge{position:absolute;top:50%;left:1rem;border-radius:1.5625rem 0;background-color:#41c527;color:#fff;font-family:foco-bold;padding:.3125rem .625rem;text-align:center}.product-card-promotion-badge-single-line{display:flex;align-items:center;justify-content:center}.product-card-promotion-badge-percentage{font-size:1.4375rem;height:1.625rem}.product-card-promotion-badge-nexus{max-width:4rem}.product-card-promotion-badge-suffix{font-size:.625rem;height:.625rem;text-align:left}.product-card-price-container{padding-top:.3125rem;display:flex;justify-content:center}.product-card-original-price{color:#b5b5b5;text-decoration:line-through;padding-right:.1875rem}.product-card-final-price{color:#64bf47;font-family:foco-bold}.product-card-button-container{padding-top:1.5625rem}.product-card-button-add{background-color:#fff;color:#000;border-radius:1.5625rem 0;border:.0625rem solid #ebebeb;box-shadow:.4375rem .4375rem .625rem rgba(0,0,0,.03)}.product-card-button-add:hover{background-color:#64bf47;color:#fff;border:.0625rem solid #58b239}.product-card-button-add:hover i{color:#fff}.product-card-button-add:active{background-color:#169747!important;border:.0625rem solid #58b239!important;outline:none!important;box-shadow:none!important}.product-card-button-add:focus{background-color:#64bf47;color:#fff;border:.0625rem solid #58b239;outline:none!important;box-shadow:none!important}.product-card-button-add:focus i{color:#fff}.product-card-button-add:visited{background-color:#fff;border:.0625rem solid #ebebeb;color:#000;outline:none!important;box-shadow:none!important}.product-card-button-add i{color:#a9a9a9;padding-right:.625rem}.product-card-button-quantity-decrementor:active,.product-card-button-quantity-decrementor:focus,.product-card-button-quantity-decrementor:hover,.product-card-button-quantity-decrementor:visited,.product-card-button-quantity-display:active,.product-card-button-quantity-display:focus,.product-card-button-quantity-display:hover,.product-card-button-quantity-display:visited,.product-card-button-quantity-incrementor:active,.product-card-button-quantity-incrementor:focus,.product-card-button-quantity-incrementor:hover,.product-card-button-quantity-incrementor:visited{background-color:#64bf47;border:.0625rem solid #58b239!important;outline:none!important;box-shadow:none!important}.product-card-button-quantity-decrementor,.product-card-button-quantity-display,.product-card-button-quantity-incrementor{background-color:#64bf47;color:#fff;border:.0625rem solid #58b239}.product-card-button-quantity-decrementor:active,.product-card-button-quantity-display:active,.product-card-button-quantity-incrementor:active{background-color:#169747!important}.product-card-button-quantity-decrementor{border-radius:1.5625rem 0 0 0}.product-card-button-quantity-incrementor{border-radius:0 0 1.5625rem 0}.product-card-button-quantity-display{background-color:#169747;pointer-events:none}a:hover{text-decoration:none}.page-header-area{color:#fff;width:100%;height:17.8125em;background-size:cover;background-position:100%;background-repeat:no-repeat}.page-header-area span{font-size:2.25rem;font-family:foco-bold;letter-spacing:-.1125rem;text-shadow:0 0 2.6875rem rgba(0,0,0,.06)}#page-header{padding-top:6.625rem;padding-left:1.125rem}.page-header-breadcrumb{font-size:1rem;letter-spacing:.025rem}.page-header-breadcrumb div{float:left}.page-header-breadcrumb i{float:left;padding:.25rem .9375rem}.page-header-breadcrumb-link{float:left;cursor:pointer;color:#51ac37;font-family:foco-bold}.page-header-breadcrumb-link:hover{color:#51ac37}.sort-menu-btn{font-size:1rem;cursor:pointer;padding:1.125rem .3125rem;text-align:center;letter-spacing:.025rem;background-color:#fff;border-radius:0 1.875rem 0 1.875rem;border:.0625rem solid hsla(0,0%,71%,.32)}.sort-menu-container{min-height:0!important;padding:0;border-style:solid;border-color:#ececec;margin-left:2rem}.sort-menu ul li{border-bottom:.0625rem solid hsla(0,0%,71%,.32)}.sort-menu{background:#fff;line-height:3rem;flex-direction:row;align-items:center;border:.0625rem solid hsla(0,0%,71%,.32)}.sort-menu ul li{text-decoration:none;color:#000;display:block}.sort-menu ul :hover{cursor:pointer}.sort-menu ul li#active{background:#51ac37;height:.5rem}.sorting-holder{color:#6c757d;font-weight:700}.sorting-float-right{float:right}.item-order-sort-link:active,.item-order-sort-link:focus,.item-order-sort-link:hover{text-decoration:underline!important;background:#51ac37!important;color:#fff!important}.item-order-sort-link{margin-left:1rem;color:#51ac37!important;background:0 0;border-color:#51ac37!important}.category-brand-container,.category-item,.price-range-text{font-size:1rem}.category-title{font-size:1.375rem}.category-container{display:flex;flex-direction:column;max-height:50vh;overflow-y:auto}.category-container::-webkit-scrollbar{width:.8333rem}.category-container::-webkit-scrollbar-thumb{background:rgba(81,172,55,.78);border-radius:.8333rem}.category-container::-webkit-scrollbar-thumb:hover{cursor:pointer;background:#51ac37}.category-container::-webkit-scrollbar-track{box-shadow:inset 0 0 .4167rem grey;border-radius:.8333rem}.category-item{display:flex;justify-content:space-between;height:3rem}.category-item:hover{color:#51ac37;cursor:pointer}.category-item:active,.selected{color:#51ac37}.category-brand-container{max-height:50vh;overflow-y:auto}.category-brand-container::-webkit-scrollbar{width:.8333rem}.category-brand-container::-webkit-scrollbar-thumb{background:rgba(81,172,55,.78);border-radius:.8333rem}.category-brand-container::-webkit-scrollbar-thumb:hover{cursor:pointer;background:#51ac37}.category-brand-container::-webkit-scrollbar-track{box-shadow:inset 0 0 .4167rem grey;border-radius:.8333rem}.input-range__slider,.input-range__track--active{background:#51ac37!important}.input-range__slider{border:1px solid #51ac37!important}.input-range__track{height:.1rem}.input-range__label{display:none}@font-face{font-family:foco;src:url(/static/media/Foco-Regular.4c219844.ttf)}@font-face{font-family:foco-bold;src:url(/static/media/Foco-Bold.f4349a07.ttf)}body{font-family:foco}.test{font-size:25px}.form-control{border-top-right-radius:1.375rem!important;
    border-bottom-left-radius:1.375rem!important;
    height:2.8125rem}.form-control:disabled{cursor:not-allowed}.text-box-height{height:calc(1.5em + .875rem)!important}.no-left-radius{border-top-left-radius:0!important;border-bottom-left-radius:0!important}.no-right-radius{border-top-right-radius:0!important;border-bottom-right-radius:0!important}.no-left-border{border-left:0!important}.Toastify__toast{color:#fff;text-align:center;background:rgba(81,172,55,.95);border-radius:0 1.875rem!important}.Toastify__toast i{margin:0 5px;font-size:16px}html{font-size:16px}@media(max-width:320px){html{font-size:10px}}@media(min-width:321px){html{font-size:10px}}@media(min-width:375px){html{font-size:11px}}@media(min-width:768px){html{font-size:11px}}@media(min-width:1200px){html{font-size:12px}}@media(min-width:1400px){html{font-size:14px}}@media(min-width:2000px){html{font-size:20px}}.card,.card-header{border-radius:0 1.3125rem 0 1.3125rem!important}.card-header{background:#fff!important;margin-bottom:1rem!important;border-bottom:0}.card-header-category{background:#dff4d8!important}.main-accordion{background:#51ac37!important;color:#fff}
body{margin:0;font-family:-apple-system,BlinkMacSystemFont,segoe ui,roboto,oxygen,ubuntu,cantarell,fira sans,droid sans,helvetica neue,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}code{font-family:source-code-pro,Menlo,Monaco,Consolas,courier new,monospace}@font-face{font-family:foco;src:url(/static/media/Foco-Regular.4c219844.ttf)}@font-face{font-family:foco-bold;src:url(/static/media/Foco-Bold.f4349a07.ttf)}body{font-family:foco}.test{font-size:25px}.form-control{border-top-right-radius:1.375rem!important;border-bottom-left-radius:1.375rem!important;height:2.8125rem}.form-control:disabled{cursor:not-allowed}
.text-box-height{height:calc(1.5em + .875rem)!important}.no-left-radius{border-top-left-radius:0!important;border-bottom-left-radius:0!important}.no-right-radius{border-top-right-radius:0!important;border-bottom-right-radius:0!important}.no-left-border{border-left:0!important}.Toastify__toast{color:#fff;text-align:center;background:rgba(81,172,55,.95);border-radius:0 1.875rem!important}.Toastify__toast i{margin:0 5px;font-size:16px}html{font-size:16px}@media(max-width:320px){html{font-size:10px}}@media(min-width:321px){html{font-size:10px}}@media(min-width:375px){html{font-size:11px}}@media(min-width:768px){html{font-size:11px}}@media(min-width:1200px){html{font-size:12px}}@media(min-width:1400px){html{font-size:14px}}@media(min-width:2000px){html{font-size:20px}}.full-width-div{position:fixed;width:100%;height:100%;left:0;top:0;align-items:center;display:flex;background:rgba(51,51,51,.7);z-index:10500}.sk-cube{background-color:#51ac37}.sk-cube-grid{width:2.5rem;height:2.5rem;margin:6.25rem auto}.sk-cube-grid .sk-cube{width:33%;height:33%;float:left;-webkit-animation:sk-cubeGridScaleDelay 1.3s ease-in-out infinite;animation:sk-cubeGridScaleDelay 1.3s ease-in-out infinite}.sk-cube-grid .sk-cube1{-webkit-animation-delay:.2s;animation-delay:.2s}.sk-cube-grid .sk-cube2{-webkit-animation-delay:.3s;animation-delay:.3s}.sk-cube-grid .sk-cube3{-webkit-animation-delay:.4s;animation-delay:.4s}.sk-cube-grid .sk-cube4{-webkit-animation-delay:.1s;animation-delay:.1s}.sk-cube-grid .sk-cube5{-webkit-animation-delay:.2s;animation-delay:.2s}.sk-cube-grid .sk-cube6{-webkit-animation-delay:.3s;animation-delay:.3s}.sk-cube-grid .sk-cube7{-webkit-animation-delay:0s;animation-delay:0s}.sk-cube-grid .sk-cube8{-webkit-animation-delay:.1s;animation-delay:.1s}.sk-cube-grid .sk-cube9{-webkit-animation-delay:.2s;animation-delay:.2s}@-webkit-keyframes sk-cubeGridScaleDelay{0%,70%,to{transform:scaleX(1)}35%{transform:scale3D(0,0,1)}}@keyframes sk-cubeGridScaleDelay{0%,70%,to{transform:scaleX(1)}35%{transform:scale3D(0,0,1)}}
</style>

    <meta charset="utf-8">
    <script>
            function display() {
               //alert("Hello World")
               var myvar='<?php echo $email;?>';
//               alert(myvar);
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
         
      </script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Including our scripting file. -->

    <script type="text/javascript" src="script.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- CSS only -->
    <!-- 
    
     JS, Popper.js, and jQuery 
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   
    <meta name="viewport" content="width=device-width,initial-scale=1"> -->
    <title>GIT Lanka Online</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/homepage.css">
</head>


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
                     col-md-2 offset-md-9"><span><div class="dropdown">Sort by:<button aria-haspopup="true" aria-expanded="false" tag="span" data-toggle="dropdown" type="button" class="item-order-sort-link dropdown-toggle btn btn-primary"> Relevant</button></div></span></div>
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
                                    $result1 = mysqli_query($con,"SELECT  `brand_name` FROM `brands` WHERE `category_id`=$idc;");                                    
                                    while($row1 = mysqli_fetch_array($result1)) 
                                    {
                                        $brand_name= $row1['brand_name'];   
                                      
                     ?>
                            <div class="custom-controls-stacked">
                                <div class="custom-control custom-radio mb-2">
                                <input name="rdoBrands" id="ARUNALU" type="radio" class="custom-control-input" value="652">
                                <label for="ARUNALU" class="custom-control-label"><?php echo $brand_name;?></label>
                                </div>
                            </div>
                                    <?php } ?>
                        </div><span class="category-title"><strong>Price</strong></span>
                        <hr>
                        <div class="mt-5">
                            <div aria-disabled="false" class="input-range"><span class="input-range__label input-range__label--min"><span class="input-range__label-container">0</span></span>
                                <div class="input-range__track input-range__track--background">
                                    <div class="input-range__track input-range__track--active" style="left: 0%; width: 100%;"></div><span class="input-range__slider-container" style="position: absolute; left: 0%;"><span class="input-range__label input-range__label--value"><span class="input-range__label-container">0</span></span>
                                    <div aria-valuemax="5000"
                                        aria-valuemin="0" aria-valuenow="0" class="input-range__slider" draggable="false" role="slider" tabindex="0"></div>
                                    </span><span class="input-range__slider-container" style="position: absolute; left: 100%;"><span class="input-range__label input-range__label--value"><span class="input-range__label-container">5000</span></span>
                                    <div aria-valuemax="5000"
                                        aria-valuemin="0" aria-valuenow="5000" class="input-range__slider" draggable="false" role="slider" tabindex="0"></div>
                                    </span>
                                </div><span class="input-range__label input-range__label--max"><span class="input-range__label-container">5000</span></span>
                            </div><span class="price-range-text mt-3 d-flex"><strong>Price&nbsp;</strong> Rs. 0 - Rs. 5000</span></div>
                    </div>
         <div class="col-md-9 col-12">
                        <div class="m-0 row-cols-2 row-cols-xs-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row">
                        <?php 
                        include 'config.php';
                        //echo "<script>alert('$idc')</script>";                        
                                    $result1 = mysqli_query($con,"SELECT  `p_id`,`p_name`, `p_image` FROM `products` WHERE `category_id`=$idc;");                                    
                                    while($row1 = mysqli_fetch_array($result1)) 
                                    {
                                        $p_name= $row1['p_name'];   
                                        $p_id= $row1['p_id'];   
                                        $p_image= $row1['p_image'];   
                                        //echo "<script>alert('$p_name')</script>";    
                                        $result2 = mysqli_query($con,"SELECT  `product_id`, `sell_price` FROM `product_to_store` where `product_id` = $p_id ;");                                    
                                        while($row2 = mysqli_fetch_array($result2)) 
                                        {
                                            $sell_price= $row2['sell_price'];   
                                            //  echo $sell_price."<br>"; 
                                              $product_id= $row2['product_id'];   
                                          // echo $product_id."<br>"; 
                                        ?>
<form method="post" action="dynamic.php?action=add&p_id=<?php echo $p_id; ?>&did=<?php echo $idc; ?>">
<div class="col" style="padding-bottom: 15px;">
                                <div class="product-card-container">
                                    <div class="row">
                                        <div class="product-card-image-container col-md-12">
                                            <img class="img-fluid" src="<?php echo $p_image; ?>"></div>
                                        <div class="product-card-name col-md-12"><?php echo $p_name; ?></div>
                                        <div class="product-card-price-container col-md-12">
                                            <div class="product-card-final-price"><?php echo $sell_price; ?></div>
                                        </div>
                                        <div class="product-card-button-container col-md-12">
                                                <!-- <input type="button" onclick="sayHello()" value="Click" /> -->
                                                <input type="text" name="quantity" value="1" class="form-control" />
                        <input type="hidden" name="did" value="<?php echo $idc; ?>" class="form-control" />
						<input type="hidden" name="hidden_name" value="<?php echo $p_name; ?>" />
                        <input type="hidden" name="hidden_price" value="<?php echo $sell_price; ?>" />
						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="product-card-button-add btn btn-primary btn-block" value="Add to Cart" />
                                                <!-- <input type="button" class="product-card-button-add btn btn-primary btn-block" onclick="display()" value="Add to Cart" /> -->
                                        </input></div>
                                            </div>
                                            </div>
                  	</div>
				</form>    

<?php
                                        }


                                    }
                        
                        ?>

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
                        <td><a href="dynamic.php?action=delete&p_id=<?php echo $values["item_id"]; ?>">
                        <span class="text-danger">Remove</span></a></td>
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
	<br />  -->
	</body>
</html>

                                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
    <script>
// function userValidate(){
//     alert("DD");
//     //    usrid = '<?=$_SESSION['UserName'];?>';
    
//     //    if (UserName=="")
//     //          return true;
//     //    else return false;
// }         
      </script>
