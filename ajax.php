<?php
//Including Database configuration file.
include "config.php";

//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
   $Name = $_POST['search'];
  // echo "<script>alert('$Name')</script>"; 
	$q="SELECT `p_id`, `p_type`, `p_code`, `p_name`, `category_id` FROM `products` WHERE p_name LIKE '%$Name%' ";
	$result=mysqli_query($con,$q);
		 if($result === FALSE)
		{
            die("Query Failed!".mysqli_error().$result);
		}
		
		echo "<table border=3>";
		echo "<center>	
		<th style='padding-left:10px;padding-right:10px;'>p_id</th>
		<th style='padding-left:10px;padding-right:10px;'>p_type</th>
		<th style='padding-left:10px;padding-right:10px;'>p_code</th>
		<th style='padding-left:10px;padding-right:10px;'>category_id</th>
		<th style='padding-left:20px;padding-right:20px;'>p_name</th>
		</center>";
		while($row=mysqli_fetch_assoc($result))
		{
			echo "<tr>";
			foreach($row as $v)
			{
				echo "<td style='padding:5px;'>".$v."</td>";
			}
			echo "</tr>";
		}
        echo "</table>";
    }
		?>
