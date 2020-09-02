<?php
include("header.php"); 
session_start();
include('config.php');

//echo "<script>alert('$email');</script>";
//echo $email;


$Outlet=$_GET["Outlet"];
//echo $Outlet;
$query  = "SELECT id FROM users where username='$email'";
$result = mysqli_query($con, $query);
while($row=mysqli_fetch_assoc($result))
	{
$id=$row['id'];
//echo "<script>alert('$id');</script>";
}

 $sql="INSERT INTO `shipping` (`id`, `uid`, `method`, `city`, `state`, `country`) VALUES (NULL, '$id', 'pickup', '$Outlet', NULL, NULL)";
 if ($con->query($sql) === TRUE) {
 
    echo "<script>
    alert('Record Inserted Sucessfully');
    window.location.href='home.php';
    </script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
 
?>