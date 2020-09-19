<html lang="en">
<head>
<style>
    
    </style>
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
    <link rel="stylesheet" href="assets/css/contact.css">
    
</head>
<?php include("header.php"); ?>
    <div class="main-content-holder">
        <div class="page-header-area" style="background-image: url(&quot;https://essstr.blob.core.windows.net/uiimg/PageHeader/Feedback.png&quot;);">
            <div id="page-header">
                <div class="row" style="margin: 0px;">
                    <div class="col-md-10 col-12 offset-md-1">
                        <div class="page-header-breadcrumb"><a class="page-header-breadcrumb-link" href="/home">Home</a><i class="fas fa-caret-right"></i>
                            <div><a>Your Feedback</a></div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin: 0px;">
                    <div class="col-md-10 col-12 offset-md-1"><span>Your Feedback</span></div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-left: 0.72rem;">
            <div class="mt-2 mb-2  col-lg-10 col-md-12 offset-lg-1">
                <div >
                    <div><br><br><span >Here to</span> <span></span><span >help!</span></div>
                </div>
                <div class="m-0 align-items-center tab-control-row row"><br>
                    <div class="row"> <span class="contactus-Decs-text"> Your feedback and enquiry is important to us, so we will endeavour to respond to you at our earliest. Your feedback will help us continuously improve ourselves to make it better for you and our other valued Customers.</span></div><br>
                    <div
                        class="row"> <span class="contactus-Decs-text">In the meantime if your enquiry is urgent and you require immediate assistance, our Customer Care team is here to assist you (Refer below for other ways to contact us) </span></div>
                <div class="col-lg-8 col-md-12"></div>
            </div>
        </div>
        <?php 
        include('config.php');

        //echo "<script>alert('$email');</script>";
        
        
        $fetch="SELECT * FROM `stores`  ";
        $result = mysqli_query($con,$fetch);
        
        if($result === FALSE)
        {
        die("Query Failed!".mysqli_error().$result);
        }
        while($row=mysqli_fetch_assoc($result))
        {
        $firstName=$row['name'];
        $address=$row['address'];
        $mobile=$row['mobile'];
        $email=$row['email'];
        }
        
        ?>
        <div class="col-md-10 col-12 offset-md-1">
            <div class="static-content-container p-2 mt-3 mb-5 ">
                <div class="d-flex align-items-center bottom-left-radios justify-content-center "><img src="img/websitelogo.png"
                        class="jkhLogo">
                    <div class="d-flex flex-column m-3 ml-5">
                        <span class="head"><strong><?php echo $firstName;?> (Pvt) Ltd</strong>
                    </span><span class="title"><?php echo $address; ?></span>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="col d-flex justify-content-center"><i class="fas fa-phone-alt locator-icon"></i></div>
                    <div class="col d-flex justify-content-center"><span class="title"><?php echo $mobile ?></span></div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="col d-flex justify-content-center"><i class="fas fa-envelope locator-icon"></i></div>
                    <div class="col d-flex justify-content-center"><span class="title"><?php echo $email; ?><br></span></div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center top-right-radios ">
                    <div class="col d-flex justify-content-center">
                    <i class="fas fa-fax locator-icon"></i>
                
                </div>
                    <div class="col d-flex justify-content-center"><span class="title">+94 7777 02339</span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-2 mb-2  col-lg-10 col-md-12 offset-lg-1"><br><br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 row" style="margin-left: 0.3rem; margin-top: -4rem;">
            <div class="m-0 d-flex float-right row">
                <button class="new-btn new-btn-primary   mr-2 no-right-radius " id = "button1" type="button">  
                <i class="far fa-grin"></i>  Comments</button>
            <button class="new-btn  new-btn-light-gray   no-left-radius " type="button" id = "button2">
                 <i class="fas fa-frown"> </i> Complaints</button></div>
                        </div><br><br>
                        
    <div  id = "mytable1">
    <form id="shipping_form" name="shipping_form" mehod="post" action="conractcomment.php">
         <br/>
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 row" style="margin-left: 0.3rem;">
            <div class="container " style="margin-left: -0.02rem; max-width: 100%; background-color: rgb(245, 245, 240);">
                <div class="content-container" style="margin-bottom: 2rem;">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-12">
                            <div class="form-group"><label for="SelectedStore">Comments</label>
                                <div>
                                <?php
include 'config.php';
$result = mysqli_query($con,"SELECT * FROM comments");
?>
                                <div class="form-group">
		  
		  <select class="form-control" id="comments" name="comments">
		  <option value="">Select Comments</option>
		    <?php
			while($row = mysqli_fetch_array($result)) {
			?>
				<option value="<?php echo $row["comments"];?>"><?php echo $row["comments"];?></option>
			<?php
			}
			?>
			
		  </select>
                           </div>
                            </div>
                        </div><span class="form-text text-muted"></span></div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="FirstName">First Name</label>
                            <input id="firstName" name="firstName" placeholder="First Name" required type="text" class="form-control" maxlength="50" value="">
                            <span class="form-text text-muted"></span></div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="FirstName">Last Name</label>
                            <input id="lastName" name="lastName" placeholder="Last Name" required type="text" class="form-control" maxlength="50" value=""><span class="form-text text-muted"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="AddressLine1">Address</label>
                            <input id="address" name="address" placeholder="Address" type="text" required class="form-control" maxlength="70" value=""><span class="form-text text-muted"></span></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label for="MobileNumber">Contact Number</label>
                        <input id="mobileNumber" name="mobileNumber" placeholder="Contact Number" type="text" required class="form-control" maxlength="13" value=""><span class="form-text text-muted"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group"><label for="AddressLine1">Email</label><input id="email" required name="email" placeholder="Email" type="email" class="form-control" maxlength="30" value=""><span class="form-text text-muted"></span></div>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group"><label for="message">Message</label>
                        <textarea id="message" required name="message" class="form-control-Message" maxlength="1000"></textarea><span class="form-text text-muted"></span></div>
                    </div>
                </div>
                <div class="row">

                    <div class="col">
                        <div class="form-group">
                            <div>
                               </div>
                            </div>
                        </div>
                    </div>
                    <div class="col"></div>
                
                <div class="row">
                    <div class="col">
                        <!-- <button class="new-btn mr-2 no-right-radius" type="button" style="background-color: rgb(81, 172, 55);"> Submit Feedback</button> -->
                        <button class="new-btn mr-2  " type="submit" name="submit" style="background-color: rgb(81, 172, 55);">Submit Feedback</button>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div></div>
                                        </form>
    <div id = "mytable2" >
    <form id="shipping_form" name="shipping_form" mehod="post" action="contact2.php">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 row" style="margin-left: 0.3rem;">
            <div class="container " style="margin-left: -0.02rem; max-width: 100%; background-color: rgb(245, 245, 240);">
                <div class="content-container" style="margin-bottom: 2rem;">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-12">
                            <div class="form-group"><label for="SelectedStore">Complaints</label>
                                <div>
                                <?php
include 'config.php';
$result = mysqli_query($con,"SELECT * FROM complaints");
?>
                                <div class="form-group">
		  
		  <select class="form-control" id="complaints" name="complaints" required>
		  <option value="">Select Complaints</option>
		    <?php
			while($row = mysqli_fetch_array($result)) {
			?>
				<option value="<?php echo $row["complaints"];?>"><?php echo $row["complaints"];?></option>
			<?php
			}
			?>
			
		  </select>
                           </div>
                            </div>
                        </div><span class="form-text text-muted"></span></div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group"><label for="FirstName">First Name</label>
                        <input id="firstName" name="firstName" required placeholder="First Name" type="text" class="form-control" maxlength="50" value=""><span class="form-text text-muted"></span></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label for="FirstName">Last Name</label>
                        <input id="lastName" name="lastName" required placeholder="Last Name" type="text" class="form-control" maxlength="50" value=""><span class="form-text text-muted"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group"><label for="AddressLine1">Address</label>
                        <input id="address" name="address" required placeholder="Address" type="text" class="form-control" maxlength="70" value=""><span class="form-text text-muted"></span></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label for="MobileNumber">Contact Number</label>
                        <input id="mobileNumber" required name="mobileNumber" placeholder="Contact Number" type="text" class="form-control" maxlength="13" value=""><span class="form-text text-muted"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group"><label for="AddressLine1">Email</label
                        ><input id="email" name="email" placeholder="Email" type="email" class="form-control" maxlength="30" value="" required><span class="form-text text-muted"></span></div>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group"><label for="message">Message</label>
                        <textarea id="message" name="message" class="form-control-Message" maxlength="1000" required></textarea><span class="form-text text-muted"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col">
                        
                    <button class="new-btn mr-2 no-right-radius " type="submit" name="submit" style="background-color: rgb(81, 172, 55);">Submit Feedback</button>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>
</div>
                                        </form>
<div></div>

<script> 
         $(document).ready(function(){
        $("#mytable1").show();
     	$("#mytable2").hide();

     	$("#button1").click(function(){
     		$("#mytable2").hide();
     		$("#mytable1").show();
     	});

     	$("#button2").click(function(){
     		$("#mytable1").hide();
     		$("#mytable2").show();
            
     	});

         $('#contact_form').submit(function(e) {
            $('#combo').change(function(){
                     $("#category option:selected").text();
                   alert('Value change to ' + $(this).attr('value'));
            });
        var category=document.getElementById('category').value;
        var firstName=document.getElementById('firstName').value;
        var lastName=document.getElementById('lastName').value;
        var address=document.getElementById('address').value;
        var mobileNumber=document.getElementById('mobileNumber').value;
        var email=document.getElementById('email').value;
        var message=document.getElementById('message').value;
//        alert(a);

        
        alert(firstName);
            //  $.ajax({
			// 	url: "get_subcat.php",
			// 	type: "POST",
			// 	data: {
			// 		category_id: category_id
			// 	},
			// 	cache: false,
			// 	success: function(dataResult){
			// 		$("#sub_category").html(dataResult);
                   
			// 	}
			// });
        });
});
        </script>  
