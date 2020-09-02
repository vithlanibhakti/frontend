<html lang="en">

<head>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>GIT Lanka Online</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<?php include("header.php"); ?>


    <div class="main-content-holder">
        <div class="mt-5 mb-5 col-lg-10 col-md-12 offset-lg-1">
            <div class="m-0 page-heading mb-4 row">
                <div class="col-lg-3 col-sm-12"><span>My <strong>Account</strong></span></div>
                <div class="col-lg-9 col-sm-12"><span style="font-size: 1.12rem; color: rgb(128, 128, 128);"></span></div>
            </div>
            <div class="m-0 row">
                <div class="col-lg-3 col-sm-12">
                    <div class="account-list-item-holder">
                        <div>Profile Edit</div><i class="fas fa-chevron-right"></i></div>
                    <div class="account-list-item-holder">
                        <div>Shipping Details</div><i class="fas fa-chevron-right"></i></div>
                    <div class="account-list-item-holder">
                        <div>Change Password</div><i class="fas fa-chevron-right"></i></div>
                    <div class="account-list-item-holder">
                        <div>Saved Carts</div><i class="fas fa-chevron-right"></i></div>
                    <div class="account-list-item-holder">
                        <div>Past Orders</div><i class="fas fa-chevron-right"></i></div>
                    <div class="account-list-item-holder-active">
                        <div>Track My Order</div><i class="fas fa-chevron-right"></i></div>
                    <div class="account-list-item-holder">
                        <div>Utility Bill Payments</div><i class="fas fa-chevron-right"></i></div>
                </div>
                <div class="col-lg-9 col-sm-12">
                    <div class="account-content-holder">
                        <div>
                            <div class="row">
                                <div class="col-12 section-heading mb-3">Track My Order</div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12"><label for="OrderNumber" class="white">Your Order Number</label>
                                    <div class="input-group"><input id="orderNumber" name="orderNumber" placeholder="Order Number" type="text" class="form-control set-height-55" autocomplete="off" maxlength="10" value=""></div><span id="OrderNumberHelpBlock" class="form-text text-muted-span col "></span>
                                    <div><label class="green-notices" style="margin-top: 5px;">Order number can be found on the order confirmation email</label></div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12"><label for="OrderNumber" class="white" style="margin-top: 5px;">Your Contact Number / Email Address</label>
                                    <div class="input-group"><input id="authorizationField" name="authorizationField" placeholder="Contact Number / Email Address" type="text" class="form-control set-height-55" autocomplete="off" maxlength="100" value=""></div><span id="AuthorizationFieldHelpBlock"
                                        class="form-text text-muted-span col red "></span></div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div><button class="new-btn  
  new-btn-primary " type="button"> Submit</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.html");?>