<?php 
include_once("config.php");
$subscribeMail = $_POST['subscribeMail'];

echo $subscribeMail;
$sql="INSERT INTO `subscribe`(`email`) VALUES ('$subscribeMail')";
if(mysqli_query($con,$sql))
{
header("Location: home.php");
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

?>