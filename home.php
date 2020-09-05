<?php 
//session_start();
include("config.php");
include("header.php");
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
			'item_id'			=>	$_GET["p_id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
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
				echo '<script>window.location="home.php"</script>';
			}
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
                        include 'config.php';
                        
                                    $result1 = mysqli_query($con,"SELECT  `p_id`,`p_name`, `p_image` FROM `adminproducts` LIMIT 0,6");        
                                    while($row1 = mysqli_fetch_array($result1)) 
                                    {
                                        $p_name= $row1['p_name'];   
                                        $p_id= $row1['p_id'];   
                                        $p_image= $row1['p_image'];   
                                        $result2 = mysqli_query($con,"SELECT  `product_id`, `sell_price` FROM `admin_product_to_store` where `product_id` = $p_id  LIMIT 6");                                    
                                        while($row2 = mysqli_fetch_array($result2)) 
                                        {
                                            $sell_price= $row2['sell_price'];   
                                            //  echo $sell_price."<br>"; 
                                              $product_id= $row2['product_id'];   
                                            // echo $product_id."<br>"; 
                                        ?>
        <form method="post" action="home.php?action=add&p_id=<?php echo $row["p_id"]; ?>">   
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
                                        </form>
                                            </div>
                                        </div>
                                    </div>

<?php
                                        }


                                    }
                        
                        ?>
                                    
                                    
                                </div>
                                <div class="switcher-main-button-holder row">
                                    <div class="input-group">
                                        <div class="btn-full">
                                        <a href="deals.php" class="btn-inside new-btn-sm ">View All Nexus Deals</a>


                                            <div class="input-group-append">
                                                <div class="input-group-text append"><i class="fas fa-angle-right"></i></div>
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
                        include 'config.php';
                        
                                    $result1 = mysqli_query($con,"SELECT  `p_id`,`p_name`, `p_image` FROM `bestsellers` LIMIT 0,6");        
                                    while($row1 = mysqli_fetch_array($result1)) 
                                    {
                                        $p_name= $row1['p_name'];   
                                        $p_id= $row1['p_id'];   
                                        $p_image= $row1['p_image'];   
                                        $result2 = mysqli_query($con,"SELECT  `product_id`, `sell_price` FROM `bestsellers_product` where `product_id` = $p_id  LIMIT 6");                                    
                                        while($row2 = mysqli_fetch_array($result2)) 
                                        {
                                            $sell_price= $row2['sell_price'];   
                                            //  echo $sell_price."<br>"; 
                                              $product_id= $row2['product_id'];   
                                        
                                              // echo $product_id."<br>"; 
                                        ?>


                                        <div class="col" style="padding-bottom: 15px;">
                                            <div class="product-card-container">
                                                <div class="row">
                                                    <div class="product-card-image-container col-md-12">
                                                    <img class="img-fluid" src="<?php  echo $p_image; ?>"></div>
                                                    <div class="product-card-name col-md-12"><?php  echo $p_name; ?></div>
                                                    <div class="product-card-price-container col-md-12">
                                                        <div class="product-card-final-price"><?php  echo $sell_price; ?></div>
                                                    </div>
                                                    <div class="product-card-button-container col-md-12">
                                                        <button type="button" class="product-card-button-add btn btn-primary btn-block" onclick="display()">
                                                        <i class="fas fa-shopping-cart"></i>Add to Cart</button></div>
                                                </div>
                                            </div>
                                        </div>
                                       <?php }}
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
                        include 'config.php';
                        
                                    $result1 = mysqli_query($con,"SELECT  `p_id`,`p_name`, `p_image` FROM `featureproducts` LIMIT 0,8");        
                                    while($row1 = mysqli_fetch_array($result1)) 
                                    {
                                        $p_name= $row1['p_name'];   
                                        $p_id= $row1['p_id'];   
                                        $p_image= $row1['p_image'];   
                                        $result2 = mysqli_query($con,"SELECT  `product_id`, `sell_price` FROM `feature_product_to_storeayments` where `product_id` = $p_id  LIMIT 0,8");                                    
                                        while($row2 = mysqli_fetch_array($result2)) 
                                        {
                                            $sell_price= $row2['sell_price'];   
                                            //  echo $sell_price."<br>"; 
                                              $product_id= $row2['product_id'];   
                                              // echo $product_id."<br>"; 
                                        ?>

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
                                            <button type="button" class="product-card-button-add btn btn-primary btn-block" onclick="display()>
                                            <i class="fas fa-shopping-cart"></i>Add to Cart</button></div>
                                    </div>
                                </div>
                            </div>
                                        <?php }} ?>
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
    <a href='dynamic.php?id=<?php echo $id0;?>' style="display:block;width:100px;height:20px;">&nbsp;</a>
</div>

                            <div class="">
                                <div class="slide">
                                <a href='dynamic.php?id=<?php echo $id1;?>'><img src="<?php echo $image1; ?>"  style="width: 100%; height: auto;">
                            </div>
                            </div></a>
                            <div class="nested ">
                                <div class="to-bottom tile3-cat">
                                <a href='dynamic.php?id=<?php echo $id2;?>'><img src="<?php echo $image2; ?>"  style="width: 100%; height: auto;">
                                </div></a>
                                <div class="to-bottom tile4-cat">
                                <a href='dynamic.php?id=<?php echo $id3;?>'><img src="<?php echo $image3; ?>"  style="width: 100%; height: auto;"></div>
                            </div></a>
                            <div class="nested">
                                <div class="to-bottom tile5-cat">
                                <a href='dynamic.php?id=<?php echo $id4;?>'><img src="<?php echo $image4; ?>"  style="width: 100%; height: auto;"></a></div>
                                
                                <div class="to-bottom tile6-cat">
                                <a href='dynamic.php?id=<?php echo $id5;?>'><img src="<?php echo $image5; ?>"  style="width: 100%; height: auto;"></a></div>
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
         
    
</script>