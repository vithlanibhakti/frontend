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
                <div class="row-view row">
                    <div class="col-5 col-5-view">
                        <div class="row">
                            <div class="mb-2 col-md-3 col-sm-12 col-12">
                                <div class="form-group">
                                
                                    <div class="dropdown">
                                <!-- <button aria-haspopup="true" aria-expanded="false" type="button" class="dropdown-toggle btn btn-">Title</button> -->
                               <select name="title"  id="title" required>
  <option label="Ms" >Ms</option>
  <option value="Mrs">Mrs</option>
  <option value="Miss">Miss</option>
  <option value="Mr">Mr</option>
</select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                  
                                  <input id="FirstName" name="FirstName" placeholder="First Name" type="text" class="form-control" value="" require></div>
                            </div>
                        </div>
                        </div>
                    <div class="col-5 col-5-view">
                        <div class="form-group">
                            
                          <input id="LastName" name="LastName" placeholder="Last Name" type="text" class="form-control" value=""><span class="form-text text-muted d-none"> Last name is required.</span></div>
                    </div>
                </div>
                <div class="row-view row">
                    <div class="col-5 col-5-view">
                        <div class="form-group">
                          <input maxlength="100" id="AddressLine1" name="AddressLine1" placeholder="House No or Lane *" type="text" class="form-control" value="">
                        </div>
                        </div>
                    <div class="col-5 col-5-view">
                        <div class="form-group">
                          <input maxlength="100" id="AddressLine2" name="AddressLine2" placeholder="Street Name *" type="text" class="form-control" value="">
                        </div>
                    </div>
                </div>
                
                <div class="row-view row">
                    <div class="col-5 col-5-view">
                        <div class="form-group">
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
    </div>
                
                <div class="hr col"></div>
                
                <div class="row-view row">
                    <div class="col-5 col-5-view">
                        <div class="form-group">
                          <input id="Email" maxlength="100" name="Email" placeholder="Email" type="email" class="form-control" required value="">
                        </div>
                    </div>
                          <div class="col-5 col-5-view">
                        <div class="form-group">
                          <input id="username" name="username" maxlength="100" placeholder="username" type="text" class="form-control" value=""></div>
                          </div>
                
                        </div>
                <div class="row-view row">
                    <div class="col-5 col-5-view">
                        <div class="form-group">
                            
                            <input id="registerConfirmPassword" name="ConfirmPassword" placeholder="Confirm Password" type="password" class="form-control " value="" required>
                            <a href="javascript:myFunction2();"><i id="register_cpw_visible_icon" class="fas fa-eye-slash"></i>
                            
                            </a>
                        </div>
                        </div>
                    <div class="col-5 col-5-view">
                        <div class="form-group">
                          
                            <input id="registerPassword" name="Password" placeholder="Password" type="password" class="form-control" value="" required>
                            <a href="javascript:myFunction1();"><i id="register_pw_visible_icon" class="fas fa-eye-slash"></i></a></div>
                        </div><span class="form-text text-muted"></span></div>
                
                <!-- <div class="registrationFormAlert" style="color:green;" id="CheckPasswordMatch"> -->
                
                <div class="row-view row">
                    <div class="col-10 col-10-view">
                        <div class="form-group">
                            <div class="custom-controls-stacked">
                                <div class="custom-control custom-checkbox p-0 pl-1">
                                    <div class="accordion">
                                        <div>
                                            <div class="border-0 pt-0 pb-0 card-header" for="checkbox_0" style="background: transparent none repeat scroll 0% 0%;">
                                            <input name="checkbox" id="checkbox_0"  type="checkbox" class="custom-control-input" value="agreed" >
                                            <label for="checkbox_0" class="custom-control-label black condition-label">I agree to the terms and conditions</label></div>
                                            <div for="checkbox_0" class="collapse">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="row-view row">
                    <div class="col-10 col-10-view">
                        <div class="form-group">
                            <button class="new-btn  
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


function myFunction2() {
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