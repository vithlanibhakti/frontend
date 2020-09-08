<?php 
$cart_id =$_POST['cart_id'];
$sell_price =$_POST['sell_price'];
// echo "<script>alert('$cart_id')</script>";
// echo "<script>alert('$sell_price')</script>";

include 'config.php';
$result1 = mysqli_query($con,"SELECT  `product_id`,`id` FROM `tbl_cart` WHERE `id`=$cart_id;");
            while($row1 = mysqli_fetch_array($result1))
            {
                $product_id= $row1['product_id'];
                $c_id= $row1['id'];
  //             echo "<script>alert('productid ==' + '$product_id')</script>";

                $ar = [$product_id];
                $str= implode(', ', $ar);
//                echo "<script>alert('implod ==' + '$str')</script>";
                $resul1 = mysqli_query($con,"SELECT  `alert_quantity` FROM `admin_product_to_store` WHERE `product_id`=$str;");
                while($row = mysqli_fetch_array($resul1))
                {
                    $alert_quantity= $row['alert_quantity'];
                    echo $alert_quantity;
                 //   $aar = [$alert_quantity];
                }
            }
            
?>
