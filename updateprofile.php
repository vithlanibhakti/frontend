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
//include("header.php"); 
session_start();
//echo $email;
//echo "<script>alert('$email')</script>"; 
include 'config.php';
 //echo "<br>";
 $contactNumber = $_GET["contactNumber"];
//echo $contactNumber;
$email = $_GET["email"];
//echo $email;
 //echo "<script>alert('$premium')</script>"; 
//echo "<br>";
 $phoneNumber = $_GET["phoneNumber"];
// echo $phoneNumber;

// echo "<br>";
 $firstName = $_GET["firstName"];
//   echo $firstName;
//   echo "<br>";
$lastName = $_GET["lastName"];
//   echo $lastName;
//  echo "<br>";
 
 //$dob = $_GET["dob"];
//  echo $dob;


  $sql =  "UPDATE `users` SET `firstName` = '$firstName', `lastName` = '$lastName', `mobile` = '$phoneNumber', `updated_at` = NULL, `optionalphone` = '$contactNumber' WHERE `users`.`email` = '$email';";
  $result = mysqli_query($con,$sql);

  if ($result === TRUE) {
      echo "<script>
      alert('Record Updated Sucessfully');
      window.location.href='profile.php';
      </script>";
    } else {
      echo "Error updating record: " . $con->error;
    }
    mysqli_close($con);
  ?>
