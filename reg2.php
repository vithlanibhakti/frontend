<?php
include_once 'config.php';
$title=$_POST["title"];
$FirstName=$_POST["FirstName"];

$LastName=$_POST["LastName"];
$AddressLine1=$_POST["AddressLine1"];
$AddressLine2=$_POST["AddressLine2"];
$City=$_POST["City"];
$Email=$_POST["Email"];
$username=$_POST["username"];
$Password=$_POST["ConfirmPassword"];
$ConfirmPassword=$_POST["Password"];
echo $title."<br>";
echo $FirstName."<br>";
echo $LastName."<br>";
echo $AddressLine1."<br>";
echo $AddressLine2."<br>";
echo $City."<br>";
echo $Email."<br>";
//echo $ConfirmPassword."<br>";
echo $Password."<br>";
$sql="INSERT INTO `users` (`username`,`firstName`, `lastName`,`email`, `title`, `addressline1`, `addressline2`, `city`,  `password`)
 VALUES ('$username', '$FirstName', '$LastName', '$Email', '$title', '$AddressLine1', '$AddressLine2', '$City', '$Password')";
  if(mysqli_query($con,$sql))
  {
  header("Location: home.php");
 } else{
 echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
 }
  
?>
