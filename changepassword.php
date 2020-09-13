<?php include("header.php"); 

//echo "<script>alert('$email');</script>";
$fetch="SELECT  `password` FROM `users` WHERE username='$email' ";
$result = mysqli_query($con,$fetch);

if($result === FALSE)
{
die("Query Failed!".mysqli_error().$result);
}
while($row=mysqli_fetch_assoc($result))
	{
$password=$row['password'];
//echo "<script>alert('$password');</script>";
}


?>
<form id="updateform" method="post" name="update" action="updatepwd.php">
    <div class="main-content-holder"><br><br>
        <div class="mt-5 mb-5 col-lg-10 col-md-12 offset-lg-1">
            <div class="m-0 page-heading mb-4 row">
                <div class="col-lg-3 col-sm-12"><span>My <strong>Account</strong></span></div>
                <div class="col-lg-9 col-sm-12"><span style="font-size: 1.12rem; color: rgb(128, 128, 128);"></span></div>
            </div>
            <div class="m-0 row">
                <div class="col-lg-3 col-sm-12">
                    <div class="account-list-item-holder">
                    <a href="profile.php">
                        <div>Profile Edit <i class="fas fa-chevron-right"></i></div>
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
                        <div class="m-0 row">
                            <div class="col-12 section-heading mb-3">Please Use this form to change your login password</div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label for="currentPassword" class="white">Current Password</label>
                                    <div class="input-group">
                                        <input id="currentPassword" name="currentPassword" placeholder="Current Password" type="password" class="form-control" value="<?php echo $password;?>">
                                        <a href="javascript:myFunction();"><i id="currentPaswordMask" class="pw-visible-icon fas fa-eye-slash"></i></a></div>
                                    <span
                                        class="error-span"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12"></div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group"><label for="newPassword" class="white">New Password</label>
                                    <div class="input-group">
                                        <input id="newPassword" name="newPassword" placeholder="New Password" type="password" class="form-control" value="">
                                        <a href="javascript:myFunction2();"><i id="newPaswordMask" class="pw-visible-icon fas fa-eye-slash"></i>
    </a></div><span class="error-span"></span></div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group"><label for="confirmPassword" class="white">Confirm New Password</label>
                                    <div class="input-group">
                                        <input id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" type="password" class="form-control" value="">
                                        <a href="javascript:myFunction3();"><i id="confirmPasswordMask" class="pw-visible-icon fas fa-eye-slash"></i></a></div>
                                        <span class="error-span"></span></div>
                            </div>
                            </div>
                            <div class="registrationFormAlert" style="color:green;" id="CheckPasswordMatch">
    </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <button class="new-btn  new-btn-primary " id="enter" disabled="true" type="submit" name="submit"> Save Changes</button>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <?php include("footer.php"); ?>
    
<script>
function myFunction() {
  var x = document.getElementById("currentPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

}

function myFunction2() {
  var x = document.getElementById("newPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

}

function myFunction3() {
  var x = document.getElementById("confirmPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

}


function myFunction() {
  var x = document.getElementById("currentPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

}

function checkPasswordMatch() {
        var password = $("#newPassword").val();
        var confirmPassword = $("#confirmPassword").val();
        if (password != confirmPassword)
            //$("#CheckPasswordMatch").html("Passwords does not match!");
            $("#enter").prop('disabled',true)//use prop()
        else
            //$("#CheckPasswordMatch").html("Passwords match.");
            $("#enter").prop('disabled',false)//use prop()

    }
    $(document).ready(function () {
       $("#confirmPassword").keyup(checkPasswordMatch);
    });
</script>
