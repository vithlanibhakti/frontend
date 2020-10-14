<?php
include("header.php"); 
session_start();
include('config.php');

//echo "<script>alert('$email');</script>";
//echo $email;


$Outlet=$_GET["Outlet"];
//echo "<script>alert('$email');</script>";
//echo "<script>alert('$Outlet');</script>";
echo $Outlet;
$query  = "SELECT id FROM users where username='$email'";
$result = mysqli_query($con, $query);
while($row=mysqli_fetch_assoc($result))
	{
$id=$row['id'];
//echo "<script>alert('$id');</script>";
}


  $sql="INSERT INTO `shipping` ( `uid`, `method`, `city`, `state`, `country`) VALUES ( '$id', 'pickup', '$Outlet', NULL, NULL)";
 
  // if ($con->query($sql) === TRUE) {
  //  echo "<script>
  //   alert('Record Inserted Sucessfully');
  //   window.location.href='home.php';
  //   </script>";
  // } else {
  //   echo "Error: " . $sql . "<br>" . $con->error;
  // }
  if(mysqli_query($con,$sql))
  {
    echo "<script>
       alert('Record Inserted Sucessfully');
       window.location.href='home.php';
       </script>";
 } else{
 echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
 }
 
?>