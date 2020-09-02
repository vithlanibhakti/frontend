<?php
include "config.php";

// $rowid ='0';
//  $rowperpage = '5';


/* Getting post data */
  $rowid = $_POST['rowid'];
  $rowperpage = $_POST['rowperpage'];

/* Count total number of rows */
$query = "SELECT count(*) as allcount FROM adminproducts";
$result = mysqli_query($con,$query);
$fetchresult = mysqli_fetch_array($result);
$allcount = $fetchresult['allcount'];
//echo $allcount;
/* Selecting rows */
$query = "SELECT * FROM adminproducts  limit $rowid,".$rowperpage;

$result = mysqli_query($con,$query);

$employee_arr = array();
$employee_arr[] = array("allcount" => $allcount);

while($row = mysqli_fetch_array($result)){
    $p_id = $row['p_id'];
    $p_name = $row['p_name'];
    $p_image = $row['p_image'];

    $result2 = mysqli_query($con,"SELECT  `product_id`, `sell_price` FROM `admin_product_to_store` where `product_id` = $p_id");                                    
    while($row2 = mysqli_fetch_array($result2)) 
    {
        $sell_price= $row2['sell_price'];   
        //  echo $sell_price."<br>"; 
          $product_id= $row2['product_id'];   
       //echo $product_id."<br>"; 
    
    }       

    $employee_arr[] = array("p_id" => $p_id,"sell_price" => $sell_price,"p_name" => $p_name,"p_image" => $p_image);
}
//echo $employee_arr;
/* encoding array to JSON format */
echo json_encode($employee_arr);