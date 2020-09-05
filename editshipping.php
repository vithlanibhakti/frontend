<!-- 
<script>
// debugger;

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const premium_pro_plan = urlParams.get('firstName')
//alert(premium_pro_plan);
const gold_pro_plan = urlParams.get('lastName')
//alert(gold_pro_plan);
const silver_pro_plan = urlParams.get('dob')
//alert(silver_pro_plan);

</script> -->
<?php 

include("config.php"); 
include("header.php"); 
session_start();
//echo $email;
//echo "<script>alert('$email')</script>"; 
include 'config.php';
echo "<br>";
$fullName = $_GET["fullName"];
//echo $fullName;
$addressLine1 = $_GET["addressLine1"];
//echo $addressLine1;

echo "<br>";
 $addressLine2 = $_GET["addressLine2"];
 $city = $_GET["city"];
 //echo $addressLine2;

$fetch="SELECT  `id` FROM `users` WHERE username='$email' ";
$result = mysqli_query($con,$fetch);

if($result === FALSE)
{
die("Query Failed!".mysqli_error().$result);
}
while($row=mysqli_fetch_assoc($result))
	{
$uid=$row['id'];
echo "<script>alert('$uid')</script>"; 
 $sql =  "UPDATE `shipping` SET `city` = '$city' WHERE `shipping`.`uid` = '$uid';";

 $result = mysqli_query($con,$sql);
    }

$sql =  "UPDATE `users` SET `username` = '$fullName', `addressLine1` = '$addressLine1', `addressLine2` = '$addressLine2',`city` = '$city' WHERE `users`.`username` = '$email';";
  //$sql =  "UPDATE `users` SET `firstName` = '$firstName', `lastName` = '$lastName', `mobile` = '$phoneNumber', `dob` = '$dob', `updated_at` = NULL, `optionalphone` = '$contactNumber' WHERE `users`.`email` = '$email';";
  $result = mysqli_query($con,$sql);

  if ($result === TRUE) {
      echo "<script>
      alert('Record Updated Sucessfully');
      window.location.href='shippingdetails.php';
      </script>";
    } else {
      echo "Error updating record: " . $con->error;
    }
    mysqli_close($con);
  ?>
