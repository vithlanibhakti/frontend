<?php

session_start();
include("config.php");
if(!isset($_SESSION['email']))
{
    $email = 'guest';
}
else
{	
    $email = $_SESSION['email'];

       
}
if($email != 'guest')
{
$fetch="SELECT  `username` FROM `users` WHERE email='$email' ";
$result = mysqli_query($con,$fetch);

if($result === FALSE)
{
die("Query Failed!".mysqli_error().$result);
}
while($row=mysqli_fetch_assoc($result))
	{
$email=$row['username'];
        }
    }



    $fetch="SELECT  `id`,`username` FROM `users` WHERE username='$email' ";
$result = mysqli_query($con,$fetch);

if($result === FALSE)
{
die("Query Failed!".mysqli_error().$result);
}
while($row=mysqli_fetch_assoc($result))
	{
$uid=$row['id'];
// echo "<script>alert('$uid')</script>"; 
        


     $fetch="SELECT * FROM shipping WHERE id = (SELECT MAX(id) FROM shipping WHERE uid = '$uid')";
$result = mysqli_query($con,$fetch);

if($result === FALSE)
{
die("Query Failed!".mysqli_error().$result);
}
while($row=mysqli_fetch_assoc($result))
{
$method=$row['method'];
$city=$row['city'];
//echo "<script>alert('$city')</script>"; 
if($city == '')
{

$city=$row['state'];
}
//echo "<script>alert('$id')</script>"; 
        }
    }
?>

<html lang="en">

<head>
    <meta charset="utf-8">
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    <!-- Including our scripting file. -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="script.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script> 

    <title>GIT Lanka Online</title>
     <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/homepage.css">
    <link rel="stylesheet" href="assets/css/privacy.css"> 
</head>
<style>

.nav-container {
    display: grid;

    grid-template-columns: max-content max-content max-content max-content max-content auto;
    grid-column-gap: 2rem;
}
</style>


<?php
require_once "DBController.php";
class ShoppingCartc extends DBController
{
    function getMemberCartItem($member_id)
    {

        //$query = "SELECT adminproducts.*,admin_product_to_store.*, tbl_cart.id as cart_id,tbl_cart.quantity FROM adminproducts, tbl_cart,admin_product_to_store WHERE adminproducts.p_id = tbl_cart.product_id AND adminproducts.p_id = admin_product_to_store.product_id AND  tbl_cart.member_id = ? ";
        $query = "SELECT products.*,product_to_store.*, tbl_cart.id as cart_id,tbl_cart.quantity FROM products, tbl_cart,product_to_store WHERE products.p_code = tbl_cart.product_id AND products.p_id = product_to_store.product_id AND  tbl_cart.member_id = ? ";
        //$query = "SELECT bestsellers.*,bestsellers_product.*, tbl_cart.id as cart_id,tbl_cart.quantity FROM bestsellers, tbl_cart,bestsellers_product WHERE bestsellers.p_code = tbl_cart.product_id AND bestsellers.p_id = bestsellers_product.product_id AND  tbl_cart.member_id = ? ";
        //$query = "SELECT featureproducts.*,feature_product_to_storeayments.*, tbl_cart.id as cart_id,tbl_cart.quantity FROM featureproducts, tbl_cart,feature_product_to_storeayments WHERE featureproducts.p_id = tbl_cart.product_id AND featureproducts.p_id = feature_product_to_storeayments.product_id AND  tbl_cart.member_id = ? ";
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

                            if($email == "guest")
                            {
$uid =0;                                
                            }
$member_id = $uid; // you can your integerate authentication module here to get logged in member

$shoppingCart = new ShoppingCartc();
?>
<!-- <?php
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
                $resul1 = mysqli_query($con,"SELECT  `alert_quantity` FROM `admin_product_to_store` WHERE `p_code`=$str;");
                while($row = mysqli_fetch_array($resul1))
                {
                    $alert_quantity= $row['alert_quantity'];
                    $aar = [$alert_quantity];
                }
            }
            
?> -->
<html lang="en">

<head>

    <link rel="stylesheet" href="assets/css/productcart.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="jquery-3.2.1.min.js"></script>
    <script>
    debugger;

    function increment_quantity(cart_id, sell_price) {
alert(cart_id);
        $.ajax({
            url: "increment.php",
            type: "POST",
            data: {
                cart_id: cart_id,
                sell_price: sell_price
            },
            success: function(dataResult) {
               	alert("Updated");
                //alert(dataResult);
                var inputQuantityElement = $("#input-quantity-" + cart_id);
                //alert("stock" +dataResult);
                //alert("cr" +inputQuantityElement.val());
                if ($(inputQuantityElement).val() < dataResult) {
                    //     alert("d");
                    var newQuantity = parseInt($(inputQuantityElement).val()) + 1;
                    var newPrice = newQuantity * sell_price;
                    save_to_db(cart_id, newQuantity, newPrice);
                } else {
                    alert("out of stock");
                }
            }

        });

        //     //alert(cart_id);
        //     var inputQuantityElement = $("#input-quantity-"+cart_id);
        //     var val = "<?php echo $alert_quantity ?>";
        // //alert(val);
        // if($(inputQuantityElement).val() <= val)
        // {
        //     var newQuantity = parseInt($(inputQuantityElement).val())+1;
        //     var newPrice = newQuantity * sell_price;
        //     save_to_db(cart_id, newQuantity, newPrice);
        // }
    }

    function decrement_quantity(cart_id, sell_price) {
        var inputQuantityElement = $("#input-quantity-" + cart_id);
        if ($(inputQuantityElement).val() > 1) {
            var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
            var newPrice = newQuantity * sell_price;
            save_to_db(cart_id, newQuantity, newPrice);
        }
    }

    function save_to_db(cart_id, new_quantity, newPrice) {
        var inputQuantityElement = $("#input-quantity-" + cart_id);
        var priceElement = $("#cart-price-" + cart_id);
        alert(priceElement);
        $.ajax({
            url: "update_cart_quantity.php",
            data: "cart_id=" + cart_id + "&new_quantity=" + new_quantity,
            type: 'post',
            success: function(response) {
                $(inputQuantityElement).val(new_quantity);
                $(priceElement).text("$" + newPrice);
                var totalQuantity = 0;
                $("input[id*='input-quantity-']").each(function() {
                    var cart_quantity = $(this).val();
                    totalQuantity = parseInt(totalQuantity) + parseInt(cart_quantity);
                });
                $("#total-quantity").text(totalQuantity);
                var totalItemPrice = 0;
                $("div[id*='cart-price-']").each(function() {
                    var cart_price = $(this).text().replace("$", "");
                    totalItemPrice = parseInt(totalItemPrice) + parseInt(cart_price);
                });
                $("#total-price").text(totalItemPrice);
            }
        });
    }
    </script>

</HEAD>

<BODY>

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
        <?php if (! empty($cartItem))
{
?> <?php }

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


    <div id="root">
        <div style="overflow: hidden;">

            <div class="default-header-container">
                <div class="default-header-top-bar">

                    <div class="col-md-10 col-12 offset-md-1">
                        <div class="upper-item-container row">
                            <nav class="navbar navbar-expand-md nav-container my1">

                                <div class="collapse navbar-collapse" id="nvbarCollapse">
                                    <div class="navbar-nav">

                                        <div class="nav-item nav-item-divider my-account-redirect col-md-auto col-12"><i
                                                class="fas fa-user"><img
                                                    src="data:image/png;base64,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"
                                                    title="Nexus Member" alt="nexus_icon"
                                                    style="display: none; width: 20px; height: 19px;"></i>Welcome,
                                            <?php if($email == 'guest')
                        {
                            echo $email; 
                            
                        }
                        else
                        {
                            echo "<a href='profile.php'>$email</a>";

                        }
                        ?></div>
                                        <div class="nav-item nav-item-divider col-md-auto col-12"><i
                                                class="fas fa-map-marker-alt"></i>Store Location
                                            <div class="upper-nav-item-dropdown-container">
                                                <?php if($email == 'guest')
                        {
                            echo "delivery"; 
                        }
                        else
                        {
                            echo $city;

                        }
                        ?>

                                            </div>
                                        </div>
                                        <div class="nav-item nav-item-divider col-md-auto col-12"><i
                                                class="fas fa-truck"></i>Shipping Method
                                            <div class="upper-nav-item-dropdown-container">
                                                <?php if($email == 'guest')
                        {
                            echo "Pickup"; 
                        }
                        else
                        {
                            echo $method;

                        }
                        ?>

                                            </div>
                                        </div>
                                        <a href="logout.php">
                                            <div class="nav-item logoutClass col-md-auto col-12"><i
                                                    class="fas fa-sign-out-alt"></i>Log out</div>
                                        </a>
                                    </div>
                                </div>
                        </div>

                    </div>

                    </nav>
                </div>
                <div class="default-header-navbar">
                    <div class="row col-md-10 offset-md-1">
                        <div class="col-lg-2 col-md-3">
                            <a href="http://pos.gitl.lk/">
                                <img src="img/websitelogo.png" class="img-fluid"></a>
                        </div>
                        <div class="pr-0 col-lg-10 col-md-9">
                            <div class="align-items-center navbar-items-container">
                                <div class="nav-container">
                                    <!-- <a href="home.php"><div class="nav-item-navbar nav-item-highlighted">Home</div></a>
                                <div class="nav-item-navbar">Catalogues &amp; Deals</div>
                                <a href="storelocator.php"><div class="nav-item-navbar">Stores</div></a>
                                <a href="contactus.php"><div class="nav-item-navbar">Contact us</div></a>
                                <a href="utilityPayment.php"><div class="nav-item-navbar nav-item-highlighted"><i class="fas fa-receipt"></i>Utility Bill Payment</div></a>
                                <div class="nav-item-navbar cart-box"> -->

                                    <nav class="navbar navbar-expand-md nav-container my ">

                                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                                            data-target="#navbarCollapse"><i class="fas fa-bars">
                    </button></i>
                                            <!-- <span class="navbar-toggler-icon black"></span> &nbsp; -->
                                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                                data-target="#nvbarCollapse"> <i class="fas fa-user">
                                            </button></i>
                                        </button>
                                        <div class="collapse navbar-collapse black" id="navbarCollapse">
                                            <div class="navbar-nav">
                                                <a href="home.php"
                                                    class="nav-item-navbar nav-item-highlighted">Home</a>&nbsp;&nbsp;&nbsp;
                                                <a href="qty.php" class="nav-item-navbar">Catalogues &amp;
                                                    Deals</a>&nbsp;&nbsp;&nbsp;
                                                <a href="storelocator.php" class="nav-item-navbar">
                                                    Stores</a>&nbsp;&nbsp;&nbsp;
                                                <a href="contactus.php" class="nav-item-navbar"> Contact us
                                                </a>&nbsp;&nbsp;&nbsp;
                                                <a href="utilityPayment.php" class=" nav-item-highlighted">&nbsp;&nbsp;
                                                    <i class="fas fa-receipt"></i>Utility Bill Payment
                                                </a>
                                            </div>
                                        </div>
                                    </nav>

                                    <?php 
if (! empty($cartItem)) {
?>
                                    <a href="cart1.php">
                                        <i class="fas fa-shopping-cart">
                                            <span id="smart-checkout-count" class="badge">
                                                <?php if($email == 'guest')
                                                {
                                                    ?>
                                                <span
                                                    id="total-quantity"><?php  $item_quantity=0; echo $item_quantity; ?></span>
                                                <?php 
                                                }
                                                else
                                                { ?>
                                                <span id="total-quantity"><?php echo $item_quantity; ?></span>
                                                <?php }
                                                ?>
                                            </span>
                                        </i>
                                        <?php if($email == 'guest')
                        {
                            ?>
                                        <span id="total-price"><?php  $item_price=0; echo $item_quantity; ?></span>
                                        <?php 
                        }
                        else
                        { ?>
                                        Rs. <span id="total-price"><?php echo $item_price; ?></span>
                                        <?php }
                        ?>

                                    </a>
                                    <?php 
}
else{
?>
                                    <i class="fas fa-shopping-cart">
                                        <span id="smart-checkout-count" class="badge">
                                            0 </i></span>
                                    <span id="total-price">RS. 0 </span>
                                    <?php } 

if(!isset($_SESSION['email']))
{
    include_once("loginpopup.php");
}

?>
                                   

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-10 offset-md-1">
                    <div class="row" style="margin: 0px;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="product-search">
                                <div class="category_menu_btn_product_search">
                                    <!-- <span>Categories</span> -->
                                    <div class="form-group">
                                        <!-- <label for="sel1">categorys</label> -->
                                        <?php
include 'config.php';
$result = mysqli_query($con,"SELECT * FROM categorys");
?>
                                        <select class="form-control" id="category">
                                            <option value="">Select Category</option>
                                            <?php
			while($row = mysqli_fetch_array($result)) {
			?>
                                            <option value="<?php echo $row["category_id"];?>">
                                                <?php echo $row["category_name"];?></option>
                                            <?php
			}
			?>
 </select>
                                    </div>
                                    <div id="dvPassport" style="display: none">
                                        <div class="form-group show">
                                            <label for="sel1">Sub Category</label>
                                            <select class="form-control " id="sub_category">
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="auto-complete-text">

                                    <div id="main">
                                        <!-- <input type="text" id="search" placeholder="Search" /> -->
                                        <?php include_once ("autosearch.php"); ?>
                                    </div>
                                    <br>

                                    <br />
                                    <!-- Suggestions will be displayed in below div. -->
                                    <div id="display"></div>

                                </div>
                                <button class="product-search-button"><span>SEARCH PRODUCTS </span><i
                                        class="fas fa-search" style="padding-left: 0.625rem;"></i></button>
                            </div>
                            <div id="category_menu_default_header" style="display: none;">
                                <!-- <img src="/static/media/white-close-button.e47a6082.png" alt="menu-close_btn" class="category-menu-default-header-close-btn"> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
        $(document).ready(function() {
            $("#category").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                   
                    if (optionValue != '') {
                        $("#dvPassport").show();
                        //alert("show");
                    } else {
                        $("#dvPassport").hide();
                        //alert("hide");
                    }
                });
            }).change();

            $('#category').on('change', function() {

                var category_id = this.value;
                
                  debugger;
                $.ajax({
                    url: "get_subcat.php",
                    type: "POST",
                    data: {
                        category_id: category_id
                    },
                    cache: false,
                    success: function(dataResult) {
                        
                        $("#sub_category").html(dataResult);
                        
                    }
                });

            });
        });
        </script>