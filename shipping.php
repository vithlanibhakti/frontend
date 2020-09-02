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

    <title>GIT Lanka Online</title>

<link rel="stylesheet" href="assets/css/shipping.css">
    
 <div class="justify-content-center d-flex">
    <div class="login-container col-lg-10 col-md-10 col-sm-10 col-12">
	<div id = "mytable" >
	
	<div class="gray-section">
            <div class="col">
                <div class="mobile-logout"></div><img src="img/websitelogo.png"
                    class="img-fluid"> <br> <br>
                    <span class="description white">Before you start, let us know your shopping preference.</span></div>
		</div>
		
        <div class="white-section">
            <div class="col">
                <div class="row">
                    <div class="form-group col"><span class="description black no-margin font-weight-bold">Select the Shipping Method</span><br><br></div>
					<div><label style="margin-right: 1rem;"> <i class="fas fa-sign-out-alt"></i>
					<a href="logout.php" style="color: rgb(0, 0, 0);"> Log out</a></label></div>
                </div>
                <div class="row">
                    <div class="form-group col d-flex">
                        <div><span class="description black no-margin">Delivery</span><br>
                        <button class="shipping-button" id = "button1">
							<i class="fas fa-truck fa-4x"></i></button></div>
                        <div><span class="description black no-margin">Pickup</span><br>
                        <button class="shipping-button" id = "button2">
							<img src="img/pickup.jpg" class="PickUpButtonImage"></button></div>
                    </div>
				</div><br>
				<form id="shipping_form" name="shipping_form" mehod="post" action="shippingadd.php">
    <div  id = "mytable1">
         <br/>
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 row" style="margin-left: 0.3rem;">
            <div class="container " style="margin-left: -0.02rem; max-width: 100%; background-color: rgb(245, 245, 240);">
                <div class="content-container" style="margin-bottom: 2rem;">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-12">
                            <div class="form-group"><label for="SelectedStore">Select Pickup</label>
                                <div>
                                <?php
include 'config.php';
$result = mysqli_query($con,"SELECT * FROM city");
?>                    <div class="form-group">
		  <select class="form-control" id="Outlet" name="Outlet" required>
		  <option value="">Select Pickup</option>
		    <?php
			while($row = mysqli_fetch_array($result)) {
			?>
				<option value="<?php echo $row["city"];?>"><?php echo $row["city"];?></option>
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
                        <!-- <button class="new-btn mr-2 no-right-radius" type="button" style="background-color: rgb(81, 172, 55);"> Submit Feedback</button> -->
                        <button class="new-btn mr-2 no-right-radius " type="submit" name="submit" style="background-color: rgb(81, 172, 55);">Submit Feedback</button>
											</div>
											
					<div class="col"></div>
					
                </div>
            </div>
        </div>
    </div>
</div>
<div></div>
		</form>
		<form id="shipping_form" name="shipping_form" mehod="post" action="shippingadd2.php">
    <div id = "mytable2" >
	<?php 
include("config.php");
$query  = "SELECT * FROM country";
$result = mysqli_query($con, $query);
?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 row" style="margin-left: 0.3rem;">
            <div class="container " style="margin-left: -0.02rem; max-width: 100%; background-color: rgb(245, 245, 240);">
                <div class="content-container" style="margin-bottom: 2rem;">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-12">
                           
                <div class="form-group"><label for="SelectedStore">Country</label>
                	<select name="country" onChange="getState(this.value)" class="form-control" required>
						<option value="" >Select Country</option>
						<?php while ($row = mysqli_fetch_array($result)) { ?>
						<option value=<?php echo $row['id']?>><?php echo $row['country']?></option>
						<?php } ?>
					</select>
					<div class="form-group"><label for="SelectedStore"> State</label>
                                <div>	<div id="statediv">
			    		<select name="state" class="form-control" required>
							<option>Select State</option>
			        	</select>
			        </div>
					<div class="form-group"><label for="SelectedStore"> city</label>
					<div id="citydiv">
			    		<select name="city" class="form-control"  required>
							<option>Select City</option>
			        	</select>
			        </div>
			    </td>
			  </tr>
			</table>
		</center>
								<div class="row">
                    <div class="col">
					<button class="new-btn  new-btn-primary " id="enter" disabled="true" type="submit" name="submit"> Submit Feedback</button>
					<!-- <button class="new-btn mr-2 no-right-radius" type="submit" style="background-color: rgb(81, 172, 55);"> Submit Feedback</button> -->
					</div>
					<div class="col"></div>
					<div class="row">
						<div class="form-group col d-flex align-items-center"><span class="form-text col">
						<i class="fas fa-info-circle"></i> A delivery fee of Rs.150 will apply to every online order delivered.</span></div></div>
                </div>
            </div>
        </div>
    </div>
</div>
                                        </form>
<div></div>
<script language="javascript" type="text/javascript">

//fuction to return the xml http object
function getXMLHTTP() { 
	var xmlhttp = false;	
	try {
		xmlhttp = new XMLHttpRequest();
	} catch(e) {		
		try {			
			xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
		} catch(e) {
			try {
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e1) {
				xmlhttp = false;
			}
		}
	}
	 	
	return xmlhttp;
}
	
function getState(countryId) {		
	var strURL = "findState.php?country="+countryId;
	var req    = getXMLHTTP();
	if (req) {
		req.onreadystatechange = function() {
			if (req.readyState == 4) {
				// only if "OK"
				if (req.status == 200) {						
					document.getElementById('statediv').innerHTML=req.responseText;
					document.getElementById('citydiv').innerHTML='<select name="city" id="city" required>'+
					'<option>Select City</option>'+
			        '</select>';						
				} else {
					alert("Problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}

function getCity(countryId, stateId) {		
	var strURL = "findCity.php?country="+countryId+"&state="+stateId;
	var req    = getXMLHTTP();
	if (req) {
		req.onreadystatechange = function() {
			if (req.readyState == 4) {
				// only if "OK"
				if (req.status == 200) {						
					document.getElementById('citydiv').innerHTML = req.responseText;
					 $("#enter").prop('disabled',false);//use prop()
				} else {
					alert("Problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);

	}
	
}
         $(document).ready(function(){
        $("#mytable1").show();
     	$("#mytable2").hide();

     	$("#button2").click(function(){
     		$("#mytable2").hide();
     		$("#mytable1").show();
     	});

     	$("#button1").click(function(){
     		$("#mytable1").hide();
     		$("#mytable2").show();
            
     	});

         
});
        </script>  

