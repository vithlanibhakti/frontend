<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php 
include("header.php"); 
//session_start();
include('config.php');

//echo "<script>alert('$email');</script>";


$fetch="SELECT `username`,`firstName`,`lastName`, `email`, `mobile`, `dob`,`optionalphone` FROM `users` WHERE  username='$email' ";
$result = mysqli_query($con,$fetch);

if($result === FALSE)
{
die("Query Failed!".mysqli_error().$result);
}
while($row=mysqli_fetch_assoc($result))
{
$firstName=$row['firstName'];
$lastName=$row['lastName'];
$mobile=$row['mobile'];
$email=$row['email'];
//$dob=$row['dob'];
$optionalphone=$row['optionalphone'];
// echo "<script>alert('$firstName');</script>";
// echo "<script>alert('$lastName');</script>";
// echo "<script>alert('$email');</script>";

// echo "<script>alert('$mobile');</script>";
// echo "<script>alert('$dob');</script>";
// echo "<script>alert('$optionalphone');</script>";

}


?>

<br><br><?php echo $firstName; ?>
<div class="main-content-holder">
        <div class="mt-5 mb-5 col-lg-10 col-md-12 offset-lg-1">
            <div class="m-0 page-heading mb-4 row">
            
                <div class="col-lg-3 col-sm-12"><span>My <strong>Account</strong></span></div>
                <div class="col-lg-9 col-sm-12"><span style="font-size: 1.12rem; color: rgb(128, 128, 128);"></span></div>
            </div>
            <div class="m-0 row">
                <div class="col-lg-3 col-sm-12">
                    <div class="account-list-item-holder-active">
                        <a href="profile.php"><div>Profile Edit <i class="fas fa-chevron-right"></i></div>
                        
</a></div>
                    <div class="account-list-item-holder">
                    <a href="shippingdetails.php"><div>Shipping Details <i class="fas fa-chevron-right"></i></div>
                       </a></div>
                    <div class="account-list-item-holder">
                    <a href="changepassword.php"><div>Change Password
                    <i class="fas fa-chevron-right"></i>
                    </div>
                        
</a></div>
                    <!-- <div class="account-list-item-holder">
                        <div>Saved Carts<i class="fas fa-chevron-right"></i></div></div>
                    <div class="account-list-item-holder">
                        <div>Past Orders<i class="fas fa-chevron-right"></i></div></div> -->
                    <div class="account-list-item-holder">
                    <a href="trackorderprofile.php"><div>Track My Order<i class="fas fa-chevron-right"></i></div>
                        </a></div>
                    <div class="account-list-item-holder">
                    <a href="utilityPayment.php"><div>Utility Bill Payments <i class="fas fa-chevron-right"></i></div>
                        </a></div>
                </div>
                <div class="col-lg-9 col-sm-12">
                    <div class="account-content-holder">
                        <div class="m-0 row">
                            <div class="col-12 section-heading mb-3">Personal Information</div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group"><label for="firstName" class="white">First Name</label>
                                    <div class="input-group">
                                        <div class="dropdown"><button aria-haspopup="true" aria-expanded="false" type="button" class="dropdown-toggle btn btn-">Mr.</button></div>
                                        <input id="firstName" name="firstName" placeholder="First Name" type="text" pattern="^[a-zA-Z]+$"
                                            class="form-control ml-1" value="<?php echo $firstName; ?>"></div><span class="error-span"></span></div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group"><label for="lastName" class="white">Last Name</label>
                                <input id="lastName" name="lastName" placeholder="Last Name" type="text" pattern="^[a-zA-Z]+$" class="form-control" value="<?php echo $lastName; ?>"><span class="error-span"></span></div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group"><label for="emailAddress" class="white">Email</label><input disabled="" id="emailAddress" name="emailAddress" placeholder="Email" type="email" class="form-control" value="<?php echo $email; ?>"></div>
                            </div>
                            <!-- <div class="col-lg-6 col-sm-12"><label for="DOB" class="white">Birthday (Optional)</label>
                            
                                <div class="form-group"><input id="dob" name="DOB" type="text" placeholder="dd/mm/yyyy" class="form-control disableFuturedate" value="<?php echo $dob; ?>">
                                <span class="error-span"></span></div>
                            </div> -->
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group"><label for="phoneNumber" class="white">Nexus Number or Mobile Number &amp; Click on Verify</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="height: 2.85rem;">
                                            <div class="input-group-text">
                                                <div>
                                                    <div class="flag-select "><button style="font-size: 16px;" class="flag-select__btn" id="select_flag_button" aria-haspopup="listbox" aria-expanded="false" aria-labelledby="select_flag_button"><span class="flag-select__option flag-select__option--placeholder"><img class="flag-select__option__icon" src="/static/media/lk.d5cf9401.svg" alt="LK"></span></button></div>
                                                </div>
                                            </div>
                                        </div><input autocomplete="off" id="phoneNumber" pattern="^[0-9]*$" maxlength="10" name="phoneNumber" placeholder="07XXXXXXXX" type="tel" class="form-control no-left-radius no-right-radius no-right-border" value="<?php echo $mobile; ?>">
                                        <div
                                            class="input-group-append"><span class="input-group-text">Verified</span></div>
                                </div><span class="error-span"></span></div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group"><label for="contactNumber" class="white">Contact Number (Optional)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend" style="height: 2.85rem;">
                                        <div class="input-group-text">
                                            <div>
                                                <div class="flag-select "><button style="font-size: 16px;" class="flag-select__btn" id="select_flag_button" aria-haspopup="listbox" aria-expanded="false" aria-labelledby="select_flag_button"><span class="flag-select__option flag-select__option--placeholder"><img class="flag-select__option__icon" src="/static/media/lk.d5cf9401.svg" alt="LK"></span></button></div>
                                            </div>
                                        </div>
                                    </div><input autocomplete="off" id="contactNumber" name="contactNumber" placeholder="Contact Number" type="tel" pattern="^[0-9]*$" maxlength="10" class="form-control no-left-radius" value="<?php echo $optionalphone; ?>"></div><span class="error-span"></span></div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group mt-2">
                            
                            <a href = "javascript:;" class="new-btn new-btn-primary" onclick = "this.href='updateprofile.php?firstName=' + document.getElementById('firstName').value+'&lastName='+ document.getElementById('lastName').value+'&phoneNumber='+ document.getElementById('phoneNumber').value+'&contactNumber='+ document.getElementById('contactNumber').value+'&email='+ document.getElementById('emailAddress').value">Save</a>
                            

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.html");?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<script>
   $(document).ready(function () {
      var currentDate = new Date();
      $('.disableFuturedate').datepicker({
      format: 'dd/mm/yyyy',
      autoclose:true,
      endDate: "currentDate",
      maxDate: currentDate
      }).on('changeDate', function (ev) {
         $(this).datepicker('hide');
      });
      $('.disableFuturedate').keyup(function () {
         if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9^-]/g, '');
         }
      });
   });
</script>
</body>
</html>