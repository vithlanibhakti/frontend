<?php 
include("header.php"); 
session_start();
include('config.php');

//echo "<script>alert('$email');</script>";
if(isset($_POST['submit'])) 
 {
        $newPassword =mysqli_real_escape_string($con, $_POST['newPassword']);    
		//ECHO $newPassword;
  //      echo "<script>alert('$newPassword');</script>";

     $fetch=" UPDATE `users` SET `password` = '$newPassword', `updated_at` = NULL WHERE `users`.`username` ='$email'; ";
	 $result = mysqli_query($con,$fetch);

if ($result === TRUE) {
    echo "<script>
    alert('Record Updated Sucessfully');
    window.location.href='profile.php';
    </script>";
  } else {
    echo "Error updating record: " . $conn->error;
  }

}
    ?>