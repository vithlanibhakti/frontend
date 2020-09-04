<?php
include("header.php");
include("config.php");
//echo "<script>alert('$email');</script>";
$fetch="SELECT  `id`,`username`,`mobile`,`addressline1`,`addressline2` FROM `users` WHERE username='$email' ";
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
  ?>
    <div class="main-content-holder"><br><br>
        <div class="mt-5 mb-5 col-lg-10 col-md-12 offset-lg-1">
            <div class="m-0 page-heading mb-4 row">
                <div class="col-lg-3 col-sm-12"><span>My <strong>Account</strong></span></div>
                <div class="col-lg-9 col-sm-12"><span style="font-size: 1.12rem; color: rgb(128, 128, 128);"></span></div>
            </div>
            <div class="m-0 row">
                <div class="col-lg-3 col-sm-12">
                    <div class="account-list-item-holder">
                    <div>   <a href="profile.php">Profile Edit <i class="fas fa-chevron-right"></i></div>
                    </a></div>
                <div class="account-list-item-holder">
                    <a href="shippingdetails.php">
                        <div>Shipping Details <i class="fas fa-chevron-right"></i></div>
                    </a></div>
                <div class="account-list-item-holder">
                    <a href="changepassword.php">
                        <div>Change Password
                            <i class="fas fa-chevron-right"></i>
                        </div>

                    </a></div>
                <!-- <div class="account-list-item-holder">
                    <div>Saved Carts<i class="fas fa-chevron-right"></i></div>
                </div>
                <div class="account-list-item-holder">
                    <div>Past Orders<i class="fas fa-chevron-right"></i></div>
                </div> -->
                <div class="account-list-item-holder">
                    <a href="trackorderprofile.php">
                        <div>Track My Order<i class="fas fa-chevron-right"></i></div>
                    </a></div>
                <div class="account-list-item-holder">
                    <a href="utilityPayment.php">
                        <div>Utility Bill Payments <i class="fas fa-chevron-right"></i></div>
                    </a></div>
                </div>
                <div class="col-lg-9 col-sm-12">
                    <div class="account-content-holder">
                        <div class="m-0 row-cols-5 table-header row">
                            <div class="col-md-3">Full Name</div>
                            <div class="col-md-4">Address</div>
                            <div style="text-align: center;" class="col-md-5">Actions</div>
                        </div>
                        <div class="m-0 row-cols-5 table-row mb-2 mt-2 align-items-center row">
                            <div class="col-md-3">
                                <div class="showDetails"><?php echo $username; ?></div>
                                <div class="dontShowDetails"><input id="fullName" name="fullName" placeholder="Full Name" type="text" class="form-control" value="<?php echo $username;?>"><span class="error-span"></span></div>
                            </div>
                            <div class="col-md-4">
                                <div class="showDetails"><label class="label-styles"><b>Primary</b></label>&nbsp;&nbsp;<label class="label-styles"><b>Default</b></label><br><?php echo $addressline1; ?><br><?php echo $addressline2; ?><br><?php echo $city; ?> </div>
                                <div class="dontShowDetails">
                                    <div class="dropdown"><button aria-haspopup="true" aria-expanded="false" type="button" class="dropdown-toggle btn btn-"></button></div><span class="error-span"></span><br>
                                    <input maxlength="100" id="addressLine1" name="addressLine1" placeholder="House No or Lane *"
                                        type="text" class="form-control" value="<?php echo $addressline1; ?>">
                                        <span class="error-span"></span><br>
                                        <input maxlength="100" id="addressLine2" name="addressLine2" placeholder="Street Name *" type="text" class="form-control" value="<?php echo $addressline2; ?>">
                                    <span
                                        class="error-span"></span><br><input maxlength="100" id="city" name="city" placeholder="City *" type="text" class="form-control" value="<?php echo $city; ?>"><span class="error-span"></span><br>
                                        <div class="custom-control custom-checkbox"><input name="checkbox" id="is_default" type="checkbox" class="custom-control-input" value="agreed"><label for="is_default" class="custom-control-label white">Set Default</label></div>
                                </div>
                            </div>
                            <div class="btn-right-styles col-md-5"><button class="new-btn  
  new-btn-secondary new-btn-sm  ml-2" type="button"> Edit</button><button class="new-btn  
   new-btn-sm  ml-2" type="button"> Remove</button></div>
                        </div>
                        <div class="m-0 row-cols-5 table-row mb-2 mt-2 align-items-center btn-right-styles row"><button class="new-btn  
  new-btn-primary " type="button"> Add New Address</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                <?php include("footer.html"); ?>