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

<body>
<form id="loginform" method="post" name="login" action="loginaction.php">
    <div id="root">
        <div>
            <div class="login-registration-page-area"></div>
            <div class="justify-content-center d-flex align-items-center col" style="min-height: 100vh;">
                <div class="landing-main-div" style="display: none;">
                            <div class="landing-sub-div col-lg-6 col-md-6 col-sm-12 col-12">
                    </div>
                </div>
                <div class="login-container  col-lg-10 col-md-10 col-sm-12 col-12">
                    <div class="gray-section">
                        <div class="col"><img src="img/websitelogo.png" class="img-fluid"> <br> <br><span class="small-title white"><b>Log In</b></span><br> <br><span class="description white">Shopped with us before? Log in with your details</span></div>

                        <hr><span class="description white">New member?</span><br>
                        <a href="regdetails.php" class="new-btn new-btn-primary  mb-3" style="margin-right: auto;"> Click here to register</a>
                        <span class="description white">Have trouble logging in? Call us on <a href="tel:+940112303500" style="color: rgb(100, 191, 71);">0112303500</a> (Daily operating hours 8.00a.m to 8.00p.m)</span>


                        <div class="col"></div>

                    </div>

                    <div class="white-section">
                        <div class="col">
                            <div class="row">
                                <div class="form-group col"><label for="UserName" class="black">Email</label>
                                    <div class="input-group">
                                        <input id="UserName" name="UserName" placeholder="Email" type="email" class="form-control set-height-55" required>
                                    </div>
                                    <span class="form-text text-muted col d-none"> Email is required.</span>
                                    <span class="form-text text-muted col d-none"> Invalid email address.</span>
                                    <div class="mt-3" style="font-size: 0.97rem;">
                                    <span class="form-group green">
                                        <i class="fas fa-info-circle"></i> 
                                        Hello, first time on our new website? Please login using your email.</span></div>
                                </div>
                                <div class="form-group col"><label for="Password" class="black">Password</label>
                                    <div class="input-group" style="margin-bottom: 0px;">
                                    <input id="Password" name="Password" placeholder="Password" type="password" class="form-control set-height-55" required>
                                    <a href="javascript:myFunction3();">
                                         <i id="pw-visible-icon" class="fas fa-eye-slash"></i></a></div>
                                    <span class="form-text text-muted col d-none">Password is required.</span>
                                    <span class="form-text forget-pwd">Forgot Password?</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- <button class="new-btn new-btn-primary float-right " type="button"> Log In</button> -->
                                <button class="new-btn new-btn-primary float-right " type="submit" name="submit">Login</button>
                                <a href="#" onClick="autoFill(); return false;" class="new-btn new-btn-primary float-right "name="action"><span>Login As Guest</span> </a>
</div>
                        </div>
                        <div class="col">
                            <hr><span class="description black no-margin font-weight-bold">Or log in with your mobile number</span><br><br>
                            <div class="row">
                                <div class="form-group col"><label class="black" for="MobileNumber">Enter your Nexus mobile or Mobile number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend set-height-55" style="">
                                            <div class="input-group-text flag-drop-custom">
                                                <div class="flag-select ">
                                                    <button class="flag-select__btn" id="select_flag_button" aria-haspopup="listbox" aria-expanded="false" aria-labelledby="select_flag_button" style="font-size: 16px;"><span class="flag-select__option flag-select__option--placeholder"><img class="flag-select__option__icon" src="/static/media/lk.d5cf9401.svg" alt="LK"><span class="flag-select__option__label">Sri Lanka</span></span></button></div>
                                            </div>
                                            <li class="custom-border"></li>
                                        </div><input name="MobileNumber" placeholder="07XXXXXXXX" type="text" autocomplete="off" class="form-control right-margin-15 set-height-55 no-left-radius no-left-border" maxlength="10" value=""><button class="new-btn  
                                new-btn-secondary float-right " type="button"> Verify Number</button></div>
                                </div>
                            </div>
                            <div class="row form-group col mt-1"><label class="black" for="OTPNumber">OTP Number</label>
                                <div class="input-group">
                                    <div class="row" style="width: 100%;">
                                        <div class="col-lg-6"><input disabled="" autocomplete="off" maxlength="4" minlength="4" name="OTPNumber" placeholder="OTP Number" type="text" class="form-control right-margin-15 set-height-55" style="margin-bottom: 10px;">
                                            <div>
                                                <div></div>
                                            </div>
                                            <span class="form-text text-muted col-md-12 col-12 d-none">OTP is required</span></div>
                                        <div class="col-lg-6"><button class="new-btn new-btn-secondary " type="button" disabled=""> Submit</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</from>
</body>

</html>

<script>
function myFunction3() {
  var x = document.getElementById("Password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

}


function autoFill() {
    
    document.getElementById('UserName').value = "guest@gmail.com";
    document.getElementById('Password').value = "12345678";
  }
</script>