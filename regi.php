<html lang="en">

<head>
    <meta charset="utf-8">
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    <!-- Including our scripting file. -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/homepage.css">

    <title>GIT Lanka Online</title>
</head>

     <section id="register-form">
          <!-- Description -->
          <!--Grid row-->
          <div class="row">
        
        
                <!-- Default form register -->
                <form class="text-center border border-light p-5" id="regform" method="post" name="reg" action="reg2.php">
                <!-- 1   -->
                <div class="form-row mb-6">
					<div class="col">
						<!-- First name -->
						<select name="title"  id="title" class="form-control" required>
							<option label="Ms" >Ms</option>
							<option value="Mrs">Mrs</option>
							<option value="Miss">Miss</option>
							<option value="Mr">Mr</option>
						  </select>

					  </div>
                    <div class="col">
                      <!-- First name -->
                      <input id="FirstName" name="FirstName" placeholder="First Name" type="text" class="form-control mb-4 cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" value="" require>
                    </div>
                    <div class="col">
                      <!-- Last name -->
                      <input id="LastName" name="LastName" placeholder="Last Name" type="text" class="form-control mb-4 cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" value="">
                      
                    </div>
                  </div>
		
				<!-- 2   -->

				  <div class="form-row mb-6">
					<div class="col">
						<!-- First name -->
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
                    <div class="col">
                      <!-- First name -->
                      <input maxlength="100" id="AddressLine1" name="AddressLine1" placeholder="House No or Lane *" type="text" class="form-control mb-4 cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" value="">
                      
                    </div>
                    <div class="col">
                      <!-- Last name -->
                      <input maxlength="100" id="AddressLine2" name="AddressLine2" placeholder="Street Name *" type="text" class="form-control mb-4 cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" value="">
                    </div>
                  </div>


                  <!-- 3 -->
                  <div class="form-row mb-6">
		            <div class="col">
                    
                    <input id="Email" maxlength="100" name="Email" placeholder="Email" type="email" class="form-control mb-4 cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" required value="">
                    </div>
                    <div class="col">
                      <!-- Last name -->
                      <input id="username" name="username" maxlength="100" placeholder="Username" type="text" class="form-control mb-4 cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" value="">
                    </div>
                  </div>
        
                  
                  <!-- 4 -->
                  <div class="form-row mb-6">
		            <div class="col">
                    <input id="registerConfirmPassword" name="ConfirmPassword" placeholder="Confirm Password" type="password" class="form-control mb-4 cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border " value="" required>
                            <a href="javascript:myFunction2();"><i id="register_cpw_visible_icon" class="fas fa-eye-slash"></i>
                    </div>
                    <div class="col">
                      <!-- Last name -->
                      <input id="registerPassword" name="Password" placeholder="Password" type="password" class="form-control mb-4 cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" value="" required>
                            <a href="javascript:myFunction1();"><i id="register_pw_visible_icon" class="fas fa-eye-slash"></i></a>
                    </div>
                  </div>
                  
                  <div class="border-0 pt-0 pb-0 card-header" for="checkbox_0" style="background: transparent none repeat scroll 0% 0%;">
                                            <input name="checkbox" id="checkbox_0"  type="checkbox" class="custom-control-input" value="agreed" >
                                            <label for="checkbox_0" class="custom-control-label black condition-label">I agree to the terms and conditions</label></div>
                  <!-- Sign up button -->
                  <br>
                  <br>
                  <button class="form-control mb-4 cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border " type="submit" disabled="true" id="btnSignUp"> Submit</button>
        
                  <!-- Social register -->
                  <!-- <p>or sign up with:</p>
        
                  <a type="button" class="light-blue-text mx-2">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  <a type="button" class="light-blue-text mx-2">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a type="button" class="light-blue-text mx-2">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                  <a type="button" class="light-blue-text mx-2">
                    <i class="fab fa-github"></i>
                  </a>
        
                  <hr>
         -->
                  <!-- Terms of service -->
               </form>
                <!-- Default form register -->
              <!--Section: Live preview-->
        
            <!--Grid column-->
        
            <!--Grid column-->
            <!--Grid column-->
        
          </div>
          <!--Grid row-->
        
        </section>

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