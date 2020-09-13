<html lang="en">
<head>

<meta charset="utf-8">         
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

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
    <link rel="stylesheet" href="assets/css/payment.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/homepage.css">
</head>
<?php include("header.php"); ?>
    <div class="main-content-holder">
        <div class="page-header-area" style="background-image: url(&quot;https://essstr.blob.core.windows.net/uiimg/PageHeader/UtilityPageHeader.jpg&quot;);">
            <div id="page-header">
                <div class="row" style="margin: 0px;">
                    <div class="col-md-10 col-12 offset-md-1">
                        <div class="page-header-breadcrumb"><a class="page-header-breadcrumb-link" href="/home">Home</a><i class="fas fa-caret-right"></i>
                            <div><a>Utility Payments</a></div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin: 0px;">
                    <div class="col-md-10 col-12 offset-md-1"><span>Pay your utility bills at the comfort of your home</span></div>
                </div>
            </div>
        </div>
        <div class="mt-5 mb-5 col-lg-10 col-md-12 offset-lg-1">
            <div class="m-0 align-items-center tab-control-row row">
                <div class="col-lg-4 col-md-12">Now your bill payments are just a click away. Select the type of bill you want to pay and follow the instructions. Utility payments cannot be added to the cart and need to be paid separately. </div>
                <div class="col-lg-8 col-md-12">
                    <div class="m-0 d-flex float-right row"><button class="new-btn  
  new-btn-primary   mr-2 no-right-radius" type="button"> Utility Bill Payment</button><button class="new-btn  
  new-btn-light-gray   no-left-radius " type="button"> My Templates</button></div>
                </div>
            </div><br><br>
            <div class="m-0 align-items-top row">
                <div class="col-xl-8 col-lg-12">
                    <div class="m-0 row">
                        <div class="m-0 p-0 col-lg-auto">
                            <div class="mb-3">Select your Bill Payment</div>
                            <div>
                                <div id="1" class="category-button-container mb-3">
                                    <div id="C11" class="category-button curve-top ">
                                        <div><i class="fas fa-signal"></i></div>
                                        <div>Telecommunication</div>
                                    </div>
                                    <div id="C21" class="d-none green-icon pl-2"><i class="fas fa-chevron-right fa-2x"></i></div>
                                </div>
                                <div id="2" class="category-button-container mb-3">
                                    <div id="C12" class="category-button  ">
                                        <div><i class="fas fa-shield-alt"></i></div>
                                        <div>Insurance</div>
                                    </div>
                                    <div id="C22" class="d-none green-icon pl-2"><i class="fas fa-chevron-right fa-2x"></i></div>
                                </div>
                                <div id="3" class="category-button-container mb-3">
                                    <div id="C13" class="category-button  ">
                                        <div><i class="fas fa-tint"></i></div>
                                        <div>Water</div>
                                    </div>
                                    <div id="C23" class="d-none green-icon pl-2"><i class="fas fa-chevron-right fa-2x"></i></div>
                                </div>
                                <div id="4" class="category-button-container mb-3">
                                    <div id="C14" class="category-button  curve-bottom">
                                        <div><i class="fas fa-bolt"></i></div>
                                        <div>Electricity</div>
                                    </div>
                                    <div id="C24" class="d-none green-icon pl-2"><i class="fas fa-chevron-right fa-2x"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="m-0 p-0 col-lg col">
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="m-0 row">
                        <div class="col-md-12">
                            <div class="mb-3 col">My Payments</div>
                        </div>
                        <div class="col-md-12">
                            <div class="product-cart-summary m-0">
                                <div class="detail-section">
                                    <div><span id="summary-column-name">Item Count</span><span id="summary-column-value">0</span></div>
                                    <div style="border: 0px;"><span id="summary-column-name">Subtotal</span><span id="summary-column-value">Rs. 0.00</span></div>
                                </div>
                                <div class="summary-est_total"><span id="summary-column-name">Total</span><span id="summary-column-value">Rs. 0.00</span></div><br>
                                <div class="container">
                                    <div class="header"><span>Payment Method</span></div>
                                    <div class="content-container">
                                        <div class="payment-mode">
                                            <div class="justify-content-center row">
                                                <div class="cc-container">
                                                    <div class="cc-box"><img src="https://essstr.blob.core.windows.net/uiimg/PaymentMethods/visa.svg" width="63" height="55"></div>
                                                    <div class="cc-box"><img src="https://essstr.blob.core.windows.net/uiimg/PaymentMethods/amex.svg" width="63" height="55"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-checkout-button">Proceed to Payment</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>