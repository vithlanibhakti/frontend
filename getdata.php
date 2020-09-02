<?php
	include 'config.php';
    $getValue=$_POST["getValue"];
    // echo json_encode($getValue);
    
    // echo json_encode(array($getValue));
		
	$sql = "SELECT * FROM `products` WHERE p_id='$getValue'";
	if (mysqli_query($con, $sql)) {
		//echo json_encode(array("statusCode"=>200));
	} 
	else {
		//echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($con);
?>
