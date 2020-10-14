<?php 
session_start();
include('config.php');
// if(isset($_POST['submit'])) 
//  {

        $email =mysqli_real_escape_string($con, $_POST['UserName']);
        $Password = mysqli_real_escape_string($con,$_POST['Password']);
		//ECHO $email,$Password;
	$fetch="SELECT * FROM users WHERE email='$email' AND Password='$Password' ";
	 $result = mysqli_query($con,$fetch);
	$count=mysqli_num_rows($result);
    //echo $count;
	 if ($count != "")
	 {
	 $_SESSION['email']=$email;
	 
 //echo "<script>alert('$email');</script>";
   header("Location: shipping.php");
	 }
	 else{
	 header("Location: home.php");}
//    	}
    ?>