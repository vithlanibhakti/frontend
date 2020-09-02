
<?php
include("header.php"); 
session_start();
include('config.php');

// echo "<script>alert('$email');</script>";
// echo $email;
$country=$_GET['country'];
$state=$_GET['state'];
$city=$_GET['city'];


$query  = "SELECT city FROM city where id='$city'";
$result = mysqli_query($con, $query);
while($row=mysqli_fetch_assoc($result))
	{
$cityy=$row['city'];
//echo "<script>alert('$cityy');</script>";
}

$query  = "SELECT statename FROM state where id='$state'";
$result = mysqli_query($con, $query);
while($row=mysqli_fetch_assoc($result))
	{
$statename=$row['statename'];
//echo "<script>alert('$statename');</script>";
}

$query  = "SELECT country FROM country where id='$country'";
$result = mysqli_query($con, $query);
while($row=mysqli_fetch_assoc($result))
	{
$countryy=$row['country'];
//echo "<script>alert('$countryy');</script>";
}

$query  = "SELECT id FROM users where username='$email'";
$result = mysqli_query($con, $query);
while($row=mysqli_fetch_assoc($result))
	{
$id=$row['id'];
//echo "<script>alert('$id');</script>";
}

 $sql="INSERT INTO `shipping` (`id`, `uid`, `method`, `city`, `state`, `country`) VALUES (NULL, '$id', 'delivery', '$cityy', '$statename', '$countryy')";
 if ($con->query($sql) === TRUE) {
    echo "<script>
    alert('Record Inserted Sucessfully');
    window.location.href='home.php';
    </script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
 
 
?>