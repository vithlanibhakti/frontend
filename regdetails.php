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
<form id="regform" method="post" name="reg" action="reg2.php">
    <div class="justify-content-center d-flex">
        <div class="registration-container col-lg-10 col-md-10 col-sm-10 col-12">
            <div class="first-section">
                <div class="col"><img src="data:image/png;base64,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"
                        class="img-fluid"> <br> <br><span class="small-title white">Profile <b>Creation</b></span><br> <br><span class="description green"><div class="mb-3 description white" style="text-align: left;">Please verify your details and update the password.</div><span class="description white">Have trouble logging in? Call us on <a href="tel:+940112303500" style="color: rgb(100, 191, 71);">0112303500</a> (Daily operating hours 8.00a.m to 8.00p.m)</span></span>
                    <div>
                        <div class="back-btn mt-5"><i class="fas fa-chevron-circle-left"></i> <span class="ml-2">Back</span></div>
                    </div><br> <br><span class="registration-bg-color">Important: Note that only the last 5 carts shopped on http://pos.gitl.lk/ in the last 2 years will be reflected on the new site.</span></div>
            </div>
            <div class="second-section pr-3 pl-3">
                <div class="row-view row">
                    <div class="col-5 col-5-view">
                        <div class="row">
                            <div class="mb-2 col-md-3 col-sm-12 col-12">
                                <div class="form-group"><label for="FirstName" class="white">Title</label>
                                    <div class="dropdown">
                                    <!-- <button aria-haspopup="true" aria-expanded="false" type="button" class="dropdown-toggle btn btn-">Title</button> -->
                                    <select name="title" id="title">
  <option value="Ms">Ms</option>
  <option value="Mrs">Mrs</option>
  <option value="Miss">Miss</option>
  <option value="Mr">Mr</option>
</select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                  <label for="FirstName" class="white" >First Name</label>
                                  <input id="FirstName" name="FirstName" placeholder="First Name" type="text" class="form-control" value="" require></div>
                            </div>
                        </div><span class="form-text text-muted d-none"> First name is required.</span><span class="form-text text-muted d-none"> Please select title.</span></div>
                    <div class="col-5 col-5-view">
                        <div class="form-group"><label for="LastName" class="white">Last Name</label>
                          <input id="LastName" name="LastName" placeholder="Last Name" type="text" class="form-control" value=""><span class="form-text text-muted d-none"> Last name is required.</span></div>
                    </div>
                </div>
                <div class="row-view row">
                    <div class="col-5 col-5-view">
                        <div class="form-group"><label class="white" for="AddressLine1">House No or Lane *</label>
                          <input maxlength="100" id="AddressLine1" name="AddressLine1" placeholder="House No or Lane *" type="text" class="form-control" value=""></div>
                        <span class="form-text text-muted d-none"> House No or Lane is required.</span></div>
                    <div class="col-5 col-5-view">
                        <div class="form-group"><label for="AddressLine2" class="white">Street Name *</label>
                          <input maxlength="100" id="AddressLine2" name="AddressLine2" placeholder="Street Name *" type="text" class="form-control" value=""><span class="form-text text-muted d-none"> Street Name * is required.</span></div>
                    </div>
                </div>
                <div class="row-view row">
                    <div class="col-5 col-5-view">
                        <div class="form-group"><label for="City" class="white">City *</label>
                          <!-- <input maxlength="100" id="City" name="City" placeholder="City *" type="text" class="form-control" value=""></div><span class="form-text text-muted d-none"> City is required.</span></div> -->
                          <?php 
include("config.php");
$query  = "SELECT id, city FROM city ";
$result = mysqli_query($con, $query);

?>
<select name="City" class="form-control" required>
	<option>Select City</option>
	<?php while($row = mysqli_fetch_array($result)) { ?>
	<option value=<?php echo $row['city']?>><?php echo $row['city']?></option>
	<?php } ?>
</select>

                </div>
                
                
                <div class="hr col"></div>
                <div class="row-view row">
                    <div class="col-5 col-5-view">
                        <div class="form-group"><label for="Email" class="white">Email</label>
                          <input id="Email" name="Email" placeholder="Email" type="email" class="form-control" required value="">
                        </div><span class="form-text text-muted d-none"> Email is required.</span><span class="form-text text-muted d-none"> Invalid email address.</span></div>
                          <div class="col-5 col-5-view">
                        <div class="form-group"><label for="username" class="white">Username</label>
                          <input id="username" name="username" placeholder="username" type="text" class="form-control" value=""></div><span class="form-text text-muted d-none"> Email is required.</span><span class="form-text text-muted d-none"> Invalid username address.</span></div>
                
                        </div>
                <div class="row-view row">
                    <div class="col-5 col-5-view">
                        <div class="form-group"><label for="Confirm Password" class="white">Confirm Password</label>
                            <div class="input-group" style="margin-bottom: 0px;">
                            <input id="registerConfirmPassword" name="ConfirmPassword" placeholder="Confirm Password" type="password" class="form-control" value="" required>
                            <a href="javascript:myFunction();"><i id="register_cpw_visible_icon" class="fas fa-eye-slash"></i>
                            </a></div>
                        </div><span class="form-text text-muted d-none"> Confirm password is required.</span><span class="form-text text-muted d-none"> Confirm password does not match</span></div>
                    <div class="col-5 col-5-view">
                        <div class="form-group"><label for="Password" class="white">Password</label>
                            <div class="input-group" style="margin-bottom: 0px;">
                            <input id="registerPassword" name="Password" placeholder="Password" type="password" class="form-control" value="" required>
                            <a href="javascript:myFunction1();"><i id="register_pw_visible_icon" class="fas fa-eye-slash"></i></a></div>
                        </div><span class="form-text text-muted"></span></div>
                </div>
                <!-- <div class="registrationFormAlert" style="color:green;" id="CheckPasswordMatch"> -->
                <div class="row-view row">
                    <div class="col-10 col-10-view col">
                        <div class="form-group text-muted forget-pw-guideline"><i class="fas fa-info-circle"></i> Your password must contain a minimum of 8 characters with 1 Uppercase, Numeric &amp; Special character.</div>
                    </div>
                </div>
                <div class="row-view row">
                    <div class="col-10 col-10-view">
                        <div class="form-group">
                            <div class="custom-controls-stacked">
                                <div class="custom-control custom-checkbox p-0 pl-1">
                                    <div class="accordion">
                                        <div>
                                            <div class="border-0 pt-0 pb-0 card-header" for="checkbox_0" style="background: transparent none repeat scroll 0% 0%;">
                                            <input name="checkbox" id="checkbox_0"  type="checkbox" class="custom-control-input" value="agreed" ><label for="checkbox_0" class="custom-control-label white condition-label">I agree to the terms and conditions</label></div>
                                            <div for="checkbox_0" class="collapse">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="white conditions col">
                                                            <p>I confirm that I will be providing you with my personal data and hereby expressly consent to the use of such data for the purpose of the order placed with you.</p>
                                                            <p>This includes express permission to share the personal data information with your service providers and agents. I also further expressly consent to the use of my personal data to promote products
                                                                and services of your company or brand. I confirm that I have read through your data policy and have understood my rights in relation to the personal data which I am providing to you.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-view row">
                    <div class="col-10 col-10-view">
                        <div class="form-group"><button class="new-btn  
  new-btn-primary  mt-2" type="submit" disabled="true" id="btnSignUp"> Submit</button></div>
                    </div>
                </div>
            </div>
            <div id=my_msg></div>
            </form>
        </div>

    </div>
    <script>
    //Our custom function, which will be called whenever
//the user clicks on the checkbox in question.
// function terms_change(checkbox){
//     //If it is checked.
//     if(checkbox.checked){
//       //  alert('Checkbox has been ticked!');
//         $("#enter").prop('disabled',false)//use prop()
//     }
//     //If it has been unchecked.
//     else{
//         // alert('Checkbox has been unticked!');
//         $("#enter").prop('disabled',true)//use prop()
//     }
// }


function myFunction() {
  var x = document.getElementById("registerConfirmPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

}

function myFunction1() {
  var x = document.getElementById("registerPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

}

function formValidation(oEvent) { 
oEvent = oEvent || window.event; 
var txtField = oEvent.target || oEvent.srcElement; 

var t1ck=true;
var msg=" ";
//alert(document.getElementById("t2").value);

if(document.getElementById("registerConfirmPassword").value != document.getElementById("registerPassword").value){ t1ck=false; msg = msg + "Password not Match<br>";}
if(document.getElementById("registerPassword").value.length < 8 ){ t1ck=false; msg = msg + "Your password should be minimun 8 char length<br>";}
if(document.getElementById("registerConfirmPassword").value.length < 8 ){ t1ck=false; msg = msg + "Your password should be minimun 8 char length<br>";}
if(!document.getElementById("checkbox_0").checked ){ t1ck=false;msg = msg + " You must agree to terms & conditions<br> ";}

//alert(msg + t1ck);

if(t1ck){document.getElementById("btnSignUp").disabled = false;
msg=msg+ " <b> Submit Button is enabled </b>";
 }
else{document.getElementById("btnSignUp").disabled = true; 
msg=msg+ " <b> Submit Button is disabled </b>";
}// end of if checking status of t1ck variable 
document.getElementById('my_msg').innerHTML=msg;
} 


window.onload = function () { 

var btnSignUp = document.getElementById("btnSignUp"); 


var t1 = document.getElementById("registerConfirmPassword");
var t2 = document.getElementById("registerPassword");
var c1=document.getElementById("checkbox_0");
//alert(t1);

var t1ck=false;
document.getElementById("btnSignUp").disabled = true;
t1.onkeyup = formValidation; 
t2.onkeyup = formValidation; 
c1.onclick = formValidation;
btnReset.onclick = resetForm;
}

</script>