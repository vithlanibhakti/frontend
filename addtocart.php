<?php
session_start();
include("config.php");
if(isset($_SESSION["email"]))
{
$email = $_SESSION['email'];
//echo "<script>alert('$email');</script>";
}
else{
    $email = "guest";
}
$fetch="SELECT  `id`,`username`,`mobile`,`addressline1`,`addressline2` FROM `users` WHERE email='$email' ";
$result = mysqli_query($con,$fetch);

if($result === FALSE)
{
die("Query Failed!".mysqli_error().$result);
}
while($row=mysqli_fetch_assoc($result))
	{
$uid=$row['id'];
$username=$row['username'];
$mobile=$row['mobile'];
$addressline1=$row['addressline1'];
$addressline2=$row['addressline2'];
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
$city=$row['city'];
//echo "<script>alert('$city')</script>"; 

        }
    }
//session_start();
include("config.php");
//include("header.php");
//echo "<script>alert('$email');</script>";
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
				echo '<script>window.location="addtocart.php"</script>';
			}
		}
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
    <link rel="stylesheet" href="assets/css/addtocart.css">
</head>
<div id="root">
    <div class="default-main-header" id="top-of-page">
        <div class="col-lg-10 col-md-10 col-sm-8 offset-lg-0 offset-md-1 offset-sm-1" style="display: flex;">
        
                <img src="img/websitelogo.png"
                    class="img-fluid"></a><span class="right-span-text"> Complete Your Purchase </span></div>
    </div>
    <div class="checkout-container">
        <div class="col-md-10 col-sm-10 col-12 offset-md-1 offset-sm-1 offset-0">
            <div class="row" style="height: 3rem;"></div>
            <div class="row">
                <div class="p-0 pl-3 pr-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="container">
                        <div class="header"><span>Shipping Details</span></div>
                        <div class="content-container" style="margin-bottom: 2rem;">
                            <div class="form-group">
                                <label for="SelectedStore">Selected Store</label>
                                <div>
                                    <select id="SelectedStore" name="SelectedStore" class="custom-select" disabled="">
                                        <option value="1">
                                    <?php echo $city; ?>
                                    </option>
                                    </select></div>
                            </div>
                            <div class="form-group"><label for="Shipping Method">
                            <?php echo $method; ?>
                            </label>
                                <div><input id="ShippingMethod" name="ShippingMethod" placeholder="Shipping Method"
                                        type="text" class="form-control" disabled="" value="Delivery"></div>
                            </div>
                            <div class="form-group"><label for="FirstName">Name</label>
                            <input id="FirstName" name="FirstName" placeholder="First Name" type="text" class="form-control"
                                    disabled="" value="<?php echo $username; ?>"></div>
                            <div class="form-group"><label for="MobileNumber">Phone Number (Default)</label><input
                                    id="MobileNumber" name="MobileNumber" placeholder="Phone Number (Default)"
                                    type="text" class="form-control" disabled="" value="<?php echo $mobile; ?>"></div>
                            <div class="form-group" id="contact-number-focus">
                                    <label for="RecipientName">Recipient
                                    Name</label><input id="RecipientName" name="RecipientName"
                                    placeholder="Recipient Name" type="text" class="form-control" value=""></div>
                            <div class="form-group" id="contact-number-focus">
                                <label for="ContactNumber">Recipient
                                    Mobile No *</label><input id="ContactNumber" name="ContactNumber"
                                    placeholder="Recipient Contact Number *" type="text" class="form-control"
                                    maxlength="10" value="<?php echo $mobile; ?>">
                                    <span class="form-text text-muted"></span></div>
                            <div class="form-group" id="address-focus">
                                <label>Shipping Address</label><br><span
                                    class="d-flex justify-content-center"></span>
                                <div class=" css-2b097c-container" id="ShippingAddress">
                                    <div class=" css-7j0ejt-control">
                                        <div class=" css-1hwfws3">
                                            <div class=" css-1uccc91-singleValue">Primary | <?php echo  $addressline1; echo $addressline2; ?>
                                            </div>
                                            <div class="css-1g6gooi">
                                                <div class="" style="display: inline-block;"><input
                                                        autocapitalize="none" autocomplete="off" autocorrect="off"
                                                        id="react-select-3-input" spellcheck="false" tabindex="0"
                                                        type="text" aria-autocomplete="list" value=""
                                                        style="box-sizing: content-box; width: 2px; background: 0px center; border: 0px; font-size: inherit; opacity: 1; outline: 0px; padding: 0px; color: inherit;">
                                                    <div
                                                        style="position: absolute; top: 0px; left: 0px; visibility: hidden; height: 0px; overflow: scroll; white-space: pre; font-size: 12px; font-family: Foco; font-weight: 400; font-style: normal; letter-spacing: normal; text-transform: none;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" css-1wy0on6"><span class=" css-1okebmr-indicatorSeparator"></span>
                                            <div aria-hidden="true" class=" css-tlfecz-indicatorContainer"><svg
                                                    height="20" width="20" viewBox="0 0 20 20" aria-hidden="true"
                                                    focusable="false" class="css-19bqh2r">
                                                    <path
                                                        d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z">
                                                    </path>
                                                </svg></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"><label for="AddressLine1">House No or Lane *</label><input
                                    maxlength="100" id="AddressLine1" name="AddressLine1"
                                    placeholder="House No or Lane *" type="text" class="form-control" value="<?php echo  $addressline1; ?>"></div>
                            <span class="form-text text-muted d-none">Please enter the house no or lane</span>
                            <div class="form-group"><label for="AddressLine2">Street Name *</label><input
                                    maxlength="100" id="AddressLine2" name="AddressLine2" placeholder="Street Name *"
                                    type="text" class="form-control" value="<?php echo $addressline2; ?>"></div><span
                                class="form-text text-muted d-none">Please enter the street name</span>
                            <div class="form-group"><label for="City">City *</label><input maxlength="100" id="City"
                                    name="City" placeholder="City *" type="text" class="form-control" value="<?php echo  $city; ?> ">
                            </div><span class="form-text text-muted d-none">Please enter the city</span>
                            <div class="form-group"><label for="Notes">Notes</label><textarea id="Notes" name="Notes"
                                    placeholder="Add a Note" type="text" class="form-control"></textarea></div>
                        </div>
                    </div>
                </div>
                <div class="p-0 pl-3 pr-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="container mb-3" id="payment-method-focus">
                        <div class="header"><span>Payment Method</span></div>
                        <div class="content-container">
                            <div class="payment-mode-radios row">
                                <div class="custom-control custom-radio custom-control-inline"><input
                                        name="radio_payment_methods" id="radio_3" type="radio"
                                        class="custom-control-input" value="Card Payment" checked=""><label
                                        for="radio_3" class="custom-control-label">Card Payment</label></div><span
                                    class="form-text text-muted d-none">Please select a payment option</span>
                            </div>
                            <div class="justify-content-center row">
                                <div class="cc-container">
                                    <div class="cc-box "><img
                                            src="https://essstr.blob.core.windows.net/uiimg/PaymentMethods/visa.svg"
                                            width="63" height="55"></div>
                                    <div class="cc-box "><img
                                            src="https://essstr.blob.core.windows.net/uiimg/PaymentMethods/amex.svg"
                                            width="63" height="55"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container mb-3" id="refund-focus">
                        <div class="header"><span>Refund Options</span></div>
                        <div class="content-container">
                            <div class="payment-mode-radios row"><span>Incase some of the products are out of stock,
                                    please tell us how you wish to receive the refund</span></div>
                            <div class="payment-mode-radios row">
                                <div>
                                    <div class="custom-controls-stacked">
                                        <div class="custom-control custom-radio"><input name="radio_refund"
                                                id="radio_refund_2" type="radio" class="custom-control-input"
                                                value="2"><label for="radio_refund_2"
                                                class="custom-control-label">Refund amount by Cash (Immediate
                                                refund)</label></div>
                                    </div>
                                    <div class="custom-controls-stacked">
                                        <div class="custom-control custom-radio"><input name="radio_refund"
                                                id="radio_refund_3" type="radio" class="custom-control-input"
                                                value="3"><label for="radio_refund_3"
                                                class="custom-control-label">Transfer refund amount to card (Refunded in
                                                5 working days)</label></div>
                                    </div>
                                </div>
                            </div>
                            <div class="justify-content-center row"><span class="form-text text-muted d-none">Please
                                    select a refund option</span></div>
                        </div>
                    </div>
                </div>
                <div class="p-0 pl-3 pr-3 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="container">
                        <div class="header"><span>Order Review</span></div>
                        <div class="content-container">
                            <div class="product-columns" style="margin-bottom: 1rem;">
                                <div class="order-review-header order-review-header-product"><span>Product Name</span>
                                </div>
                                <div class="order-review-header order-review-header-price"><span>Price</span></div>
                                <div class="order-review-header order-review-header-qty"><span>Qty</span></div>
                                <div class="order-review-header-qty"></div>
                            </div>
                            
                            <div class="scrollable-items mb-2">
                            <?php
                                    if(!empty($_SESSION["shopping_cart"]))
                                    {
                                        $total = 0;
                                        foreach($_SESSION["shopping_cart"] as $keys => $values)
                                        {
                                    ?>
                                       
                                <div class="product-columns">
                                <div class="product-labels">
                                        <span   class="product-name"><?php echo $values["item_name"]; ?>
                                    </span>
                            
                                </div>
                                    <div lg="4" class="product-labels">
                                        <span class="product-price">
                                        Rs. <?php echo $values["item_price"]; ?></span></div>
                                    <div class="product-labels" style="align-items: center;">
                                    <i class="fa fa-minus product-btn" aria-hidden="true"></i><span
                                            style="flex: 1 1 0%; text-align: center;"><?php echo $values["item_quantity"]; ?></span><i
                                            class="fa fa-plus product-btn" aria-hidden="true"></i></div>
                                    <div class="product-labels" style="align-items: center;">
                                    <a href="addtocart.php?action=delete&p_id=<?php echo $values["item_id"]; ?>">
                                    <span class="text-danger"><i class="fa fa-times product-btn product-remove" aria-hidden="true" id="21719"></i></span></a>
                                    
                                </div>
                                        </div>
                                        <?php 
                                          $total = $total + ($values["item_quantity"] * $values["item_price"]);    

                                        }

                        }
                          ?>
                                
                                
                                <hr>
                            </div>
                            <?php if(!empty($_SESSION["shopping_cart"]))
                            {
                                ?>
                            <div class="product-summary product-summary-top">
                                <div class="product-summary-line row">
                                    <div class="col"><span>Item Count</span></div>
                                    <div class="product-summary-right col"><span><?php $a= count($_SESSION['shopping_cart']); echo $a; ?></span></div>
                                </div>
                                <hr>
                                <div class="product-summary-line row">
                                    <div class="col"><span>Subtotal</span></div>
                                    <div class="product-summary-right col"><span>Rs. <?php echo $total; ?></span></div>
                                </div>
                                <hr>
                                <div class="product-summary-line row">
                                    <div class="col"><span>Delivery Charges</span></div>
                                    <?php 
                                    
if($method == "pickup" )
{
$d=0;
}
else 
{
    $d=150;
}
?>
                                    <div class="product-summary-right col"><span>Rs.<?php echo $d; ?></span></div>
                                </div>
                                <hr>
                                <div class="product-summary-line row">
                                    <div class="col"><span>Total Nexus Discounts</span></div>
                                    <div class="product-summary-right col"><span>Rs. 0.00</span></div>
                                </div>
                                <hr>
                                <div class="product-summary-line row">
                                    <div class="col"><span>Total Keells Discounts</span></div>
                                    <div class="product-summary-right col"><span>Rs. 0.00</span></div>
                                </div>
                                <hr>
                                <div class="product-summary-line row">
                                    <div class="col"><span>Total Discounts</span></div>
                                    <div class="product-summary-right col"><span>Rs. 0.00</span></div>
                                </div>
                            </div>
                            <div class="summary-est_total"><span id="summary-column-name">Total</span><span
                                    id="summary-column-value">Rs.   <?php $final=$d + $total; echo number_format($final, 2);?></span></div>
                        
                            <div class="product-summary-line mb-3">
                                <div class="input-group"><input autocomplete="off" id="cartTemplateName"
                                        name="cartTemplateName" placeholder="Cart Name" type="text"
                                        class="form-control no-right-radius no-right-border" value="">
                                    <div class="input-group-append"><button class="new-btn  
  new-btn-primary new-btn-sm   no-left-radius" type="button"> Save</button></div>
                                </div>

                        
                            </div>
                            <?php } ?>
                            <div class="product-summary-line"><button class="new-btn  
  new-btn-secondary   bnt-proceed margin-bottom" type="button"> Continue Shopping</button></div>
                            <div class="product-summary-line"><button class="new-btn  
  new-btn-warning   bnt-proceed" type="button"> Proceed to Payment</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="full-width-div" style="display: none;">
        <div class="sk-cube-grid" style="height: 100px; width: 100px;"><img
                src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAzADMDAREAAhEBAxEB/8QAdgABAQEBAQAAAAAAAAAAAAAAAAQBBQYBAQADAAMAAAAAAAAAAAAAAAABAgMEBQYQAAIABAQDCQAAAAAAAAAAAAABEQISBCExQQUDExRhscEyQlIVBhYRAQABAwIHAAAAAAAAAAAAAAABEQIDMTLwQXHBEzME/9oADAMBAAIRAxEAPwD2O6bpebnecS6uuJNPPPM2k3hKtJZVokeLzZrsl03XS6W++bprKMyVAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAHe8EgNaabTUGs08wMABAqNc+2rwCQIAl1vqfL/QWdfTx5io6uuiMfTRhX7asDk/FTyxWmvPjVph3R3T75D5vcIUw6ifyRpz0iU+j2XdVcm6UJiq//2Q=="
                class="sk-cube sk-cube1" alt="cube1"
                style="padding: 1px; border-radius: 4px; background-color: transparent;"><img
                src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAzADMDAREAAhEBAxEB/8QATwABAQAAAAAAAAAAAAAAAAAAAAYBAQEBAQAAAAAAAAAAAAAAAAABBQYQAQEAAAAAAAAAAAAAAAAAAAAhEQEAAAAAAAAAAAAAAAAAAAAA/9oADAMBAAIRAxEAPwClcMwwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACoj//Z"
                class="sk-cube sk-cube2" alt="cube2" style="padding: 1px; background-color: transparent;"><img
                src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAzADMDAREAAhEBAxEB/8QAbgABAQEBAAAAAAAAAAAAAAAAAAEFBgEBAQADAQAAAAAAAAAAAAAAAAEDBAUGEAEAAQMBBwUAAAAAAAAAAAAAARExEhQhQWGBwSITcoIDBRYRAQABAQkAAAAAAAAAAAAAAAARAfAxQVGhAgMTFP/aAAwDAQACEQMRAD8A6V4ZwwAAAFiZiYmJpMWmAbH6z7zxYar5K6fS55TXHyZ5eqnbW9G17eSImt0a2oy927PBjNViAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIw33459AJ504Ii9m6/u67FVAAAAf/Z"
                class="sk-cube sk-cube3" alt="cube3"
                style="padding: 1px; border-radius: 4px; background-color: transparent;"><img
                src="data:image/jpeg;base64,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"
                class="sk-cube sk-cube4" alt="cube4" style="padding: 1px; background-color: transparent;"><img
                src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAzADMDAREAAhEBAxEB/8QAmQAAAQUBAQAAAAAAAAAAAAAABwACAwQGAQUBAAEFAQAAAAAAAAAAAAAAAAUAAQIEBgMQAAEDAgQDBAcFCQAAAAAAAAECAwQAERITBQYhMRRBUSIHYYGxMkJSFXFiI4NkkcHhcqKTdDUWEQACAQIDBQUIAwEAAAAAAAAAAQIRAzESBCFBYTIFUYGhExRxkbHBIoIzFUJSYjT/2gAMAwEAAhEDEQA/ANLWGAYqQhUhCpCFSETwIhmTo8QHCZDiG8XcFGxP7Knbhmko9rHiqtILv/Cbcw4elTbIyO35sWPn71+2tR+us9m6gU9NDsA2SAbHge48PbWTBIqccVIQgQTYcT3Dj7KYY5iF7X493bSEelt3/f6d/kN+2rGl/LH2nS1zr2hzrZBkqytK02U0WpEVpxCuYUkVznZhJUaRFwTxQN967HRpbZ1HTrmDf8Zk8S3ftB+X2Vn9f0/y1nhy/AH6jT5dqwH7L2IjUWUalqYIiK4sRxwLg+ZX3aloOneYs8+Xcu0exp822WARY2labFaDUeK02hPIJSKPQswiqJIvqCWCIdR2/o2oMlqXEbWDyUEgKHpBFQu6a3NUkkNK1GWKB5M2m9oO6dMU2ouwH5KAy4eaTe+BX7jQK5onZvRpti5FCVnJNdlQp1pAkDLaCN56XqjKHYklWnvKwSG3ASlIPxi/K1Z3RLUW5qqlleIOseZGWDoEmTHZkx3I7yQtl1JQ4g8ilQsRWgnFSTTwYQaqqMc002y0lttIS2gBKUjkAOQp0klRCSoC7c6d6atqTykw5aYTaymM0hKkpwg2Cj3lXOs5q1qLs39Msu4HXvMk8HQ9rYTm6oslUHVIz/QqQVNOvA/hqHw3PYqrfTXfi8s08vE7abOnSS2GxmwWJjaEOi+W4h1B7QpBuDRa5bUltLUoplipkjHnzR24Pgkf2/40K/b2uPuKvrIEzPmHpTr8RoRpLaZi0oZdcRgQcRte5qcepwbSpL6h1qotrY9pqqJFky0zzG0CJKeivJkB5hZQ4nLPNJtQ2fVLUZOLrVcCtLVRToQHzR26OSJB/LqH7i1x9w3rIcRyvMOM5qEXT2IbyJEhxCFdQnLwpUfet28Kd9TTmoqLq3vF6pVSSNdRQtGTheWm3Y7wcdzZWE3CHVDD6wkJvQy30m1F1dWVY6SC4nfMT6eztooUUtPoW30KU2CgtKh7gHcml1TKrNN+4fVUUPgXNobnj61p6ApQTPZATJZ7bj4h6DXXQ6tXof6WJKxeU1xHa9svRdZe6iQlTUm1i80cKiByxAgg0+p0Fu66vY+A9yxGe14kGk7A2/pz6ZAQqS8jihT5CgD3hIATULHTbVt1xfEjDTRi6lHeRhK3DoCUlJnCSMQHvBrnx9F+Vcdfl823/bN4EL9M8e2psqLFsgkZuUrDm4rcMvLxerFwqEq03+BFgg3pm/Vxm9bmWN+vy7/l5Xgt9lZbX18zbm+6nhTYC7/Nv7yhoOL6uxh6nF8PRWz7+jF4bfbXDTc65vtxIW+bf3Bn03qOmTm9Ti/U5GZ68rhWttVptzd9PkFoVpvFqXUdKrK6nF+myMz1ZvhpXa02Zu6nzFOtN4L9Gv8A97HxZ2LNN+utnXwK54fD/LbhWcsf9Sxx/liDrf5V8wt+L739NagJn//Z"
                class="sk-cube sk-cube5" alt="cube5" style="padding: 1px; background-color: transparent;"><img
                src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAzADMDAREAAhEBAxEB/8QAmQAAAgIDAQEAAAAAAAAAAAAABQcEBgABAwIIAQACAwEBAAAAAAAAAAAAAAADBAIFBgEAEAABAgQDAwkGBAcAAAAAAAABAgMAEQQFEhMGITEiQVFhkXMUFTYHsUKywjUWgaFigsEyUiNToyQRAAIBAgQEAwcFAAAAAAAAAAABAhEDMTIEBSFxgRJhEzPwQZGhwVIUUbEiorL/2gAMAwEAAhEDEQA/APpuupKRm31JaYbQUNLKZISJSSeiA3IRUHRLAhKKSZWPTzTluFmauVQwh6qqipYW4ArCmZkEg7orts0sPLU2qyYvpbS7avFnT1KaZa03/abSjE82CUpAMsXREt1ilZ4L3o9q1SArIzZXGR48ZHjxkePD7uf02r7Fz4DG1vZHyZdTwYK0L5TtvZ/MYW270I8genyIH+p/lsdu37YBu/o9UD1eQVMxOU9vNyxmSsNlDgEyhYHOUql7I7RnTQIO4zjhwyOnR93P6bV9i58Bja3sj5Mup4MF6F8p23s/mMLbd6EeQPT5Ee9VWJy90LVEleWgvIW65yhCTMy6YlrNO70VHxPXrfeqHa16YsdsaCKWlQFS4nVgKWrpJMSs6S3bX8UShZjHBE8tUs8BQif9Mh7IPSJOiK9q3SlnrLZU1IZQxVsNqcQ+gBJ4BOSpbwYR1ujtzg3SkksQF+zFpv3ifxn8pxlalUP26fTKvsXPgMba9kfJl3PBgvQvlO29l8xhbbvQjyB6fIg7MdcOhjjWsuP0jzLTpZccQUodTvSSNhEQuRbi0nQ5JVQq670+1ZTqU4gisltLjbhCj0yUZxm7m2X48c3UrJaaa8QTUXTUlIy7bap+oabWMLlO9OcuicKyvXopwk2vBg3Oa4OoLkObohYEPu6fTKvsXPgMba9kfJl3PBgvQ3lO29l8xhbb/QjyB6fIiF6i1tTRWZmqpnC0+3UNlCxybYFulxwtqSdHVENVJqNV+oHtfqqnAlF0pDiGwvsbQenCdsKWd4+9fAFDWfci0WfWFhu72RSVH/RKYZcBQogb5AxZWNdauukXxGIX4y4IlXux0F4ol01U2CSDlOy4kK5CkwTUaeN2NJErltTVGJvwOsnKfF3vuMv1ynPqjKfjy/t2lV5b+dB03dSUWmtUoySGHCT+wxrb7pCXJlvPKwdogEaTtk/8IPWTANv9CPIHp8iClZSUNWlLNW0h5JM0tuAEEgcxhmcIy4SVQkop4lar/TPT9QsrYLtIT7rapp6lBUV1zabUuKrEXlpIvDgdbDoC12iuTWh1yoqGwQ0VyCUz2EySBtiem22FqXdVtnbemjF1LFWVlPR0rlVULDbLSSpajzCHrk1CLbwQxKSSqxNfcPFiwmfiPf8A9uHDLqjJ/lf77ip8396jI13m/bNbLvGHBxZOXu/XPbh58O2NBuNfJlj0oP6jI8Sbpif29b5bshEsuWHdyT2wXSelHkTtZEV/Wmd43aZeIfzqwd1yt+H3J+9z49koR19fMhn6U9viA1GZY9C10Of3dGZn4pbc/Jx/jl8MWdutONetPoNRrQkHFLZi/DD/ABgh0XPqNn5ac3xDDj4M7J7r/q4p82KKDdK049/Wnb8hDVV8foUSKYSP/9k="
                class="sk-cube sk-cube6" alt="cube6" style="padding: 1px; background-color: transparent;"><img
                src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAzADMDAREAAhEBAxEB/8QAcwABAAMBAQAAAAAAAAAAAAAAAAECAwUGAQEBAAIDAAAAAAAAAAAAAAAAAQMEAgUGEAACAQMBBwUBAAAAAAAAAAAAAQIRMRIDIVGxMhMEFIHBQlIVBhEBAQACAAcBAAAAAAAAAAAAAAERMfBBkQIyAxME/9oADAMBAAIRAxEAPwD08NXVhyTlCt8ZNcDw8tmnR5J6mpPnnKdLZNviS23ZlUB7WCNJ6/cakFDU1ZzgrQlJtL0bLe63dW2s2k7qpxRbOf3lal3bcXNXKoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAlpptNUa2NAQAAAAAADsf1nS/c7rDx69SWfi9TGtflnsy347Km1+3H0uMb5Z46Mvu8rpxzVYgAAAAAP/9k="
                class="sk-cube sk-cube7" alt="cube7"
                style="padding: 1px; border-radius: 4px; background-color: transparent;"><img
                src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAzADMDAREAAhEBAxEB/8QAYgABAAMBAAAAAAAAAAAAAAAAAAECAwYBAQEBAQAAAAAAAAAAAAAAAAABBQYQAQEBAAICAQUAAAAAAAAAAAACARFRsQOh0ZJTBBQRAQEBAQEBAAAAAAAAAAAAAAABETFREv/aAAwDAQACEQMRAD8A6e/Z7Lzi7q86rd3y4a23rD1UQFTFVG8xWxvc7ueCXOBdVe83W3vdbu+S3ehNVO8zWzXebxvwSi/9P7P5vZ99fVfu+02s0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAH/2Q=="
                class="sk-cube sk-cube8" alt="cube8" style="padding: 1px; background-color: transparent;"><img
                src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAzADMDAREAAhEBAxEB/8QAdgABAQEBAQAAAAAAAAAAAAAAAAECBgMBAQEBAQEBAAAAAAAAAAAAAAABAgUEBhAAAgIBAgQEBwAAAAAAAAAAAAERAgMhEjFRsQRhgZEUoWKCJGQVRREBAQABAgUFAAAAAAAAAAAAAAERMWFRAhIyQvAhIlJi/9oADAMBAAIRAxEAPwDpr3vdzezu+dm31PhrbdXDbXcdwlCzZEuSvaOpeq8TNYbbbbct8W9WQXHfJjc472xv5G69BLZoSt37rurqL58l1ytezXxZq8/NdbVzXkklw0MMhVAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABdlomHETPhMT6jAgAAAAAWsblMROszHnGog7P7L2X8yP1n5W3b7r13T9W7wOt8enw7P19vW+dnr9sePbvxf/9k="
                class="sk-cube sk-cube9" alt="cube9"
                style="padding: 1px; border-radius: 4px; background-color: transparent;"></div>
    </div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>