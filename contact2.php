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
        $complaints =$_GET['complaints'];
        $message =$_GET['message'];
		//echo $firstName,$lastName,$mobileNumber,$address,$complaints,$email,$message;


        $sql="INSERT INTO `users_complaints`(`complaints`, `firstname`, `lastname`, `address`, `mobilenumber`, `email`, `message`) VALUES
        ('$complaints','$firstName','$lastName','$address','$mobileNumber','$email','$message')";
       
           }
           if(mysqli_query($con,$sql))
           {
            echo "<script>
            alert('Record inserted Sucessfully');
            window.location.href='contactus.php';
            </script>";
          } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
          
       

    }
    ?>