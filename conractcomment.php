<?php 
session_start();
include('config.php');
if(isset($_GET['submit'])) 
 {
     
        $firstName = $_GET['firstName'];
        $lastName = $_GET['lastName'];
        $address = $_GET['address'];
        $mobileNumber =$_GET['mobileNumber'];
        $email =$_GET['email'];
        $comments =$_GET['comments'];
        $message =$_GET['message'];
		//echo $firstName,$lastName,$mobileNumber,$address,$comments,$email,$message;

$sql="INSERT INTO `users_comments`(`comments`, `firstname`, `lastname`, `address`, `mobilenumber`, `email`, `message`) VALUES
 ('$comments','$firstName','$lastName','$address','$mobileNumber','$email','$message')";

    }if(mysqli_query($con,$sql))
    {
        echo "<script>
        alert('Record inserted Sucessfully');
        window.location.href='contactus.php';
        </script>";
   } else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
   }
    ?>