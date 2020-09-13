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
  
                // $resul1 = mysqli_query($con,"SELECT  `quantity_in_stock` FROM `best_product_to_store`,`bestsellers` WHERE `p_code`=$product_id;");
                //$resul1=mysqli_query($con,"select quantity_in_stock,product_id,bestsellers.p_code FROM bestsellers_product,bestsellers where bestsellers_product.product_id = bestsellers.p_id AND bestsellers.p_code =$product_id;");
                //$resul1=mysqli_query($con,"select quantity_in_stock,product_id,adminproducts.p_code FROM admin_product_to_store,adminproducts where admin_product_to_store.product_id = adminproducts.p_id AND adminproducts.p_code =$product_id;");
                $resul1=mysqli_query($con,"select quantity_in_stock,product_id,products.p_code FROM product_to_store,products where product_to_store.product_id = products.p_id AND products.p_code =$product_id;");
                //$resul1=mysqli_query($con,"select quantity_in_stock,product_id,adminproducts.p_code FROM admin_product_to_store,adminproducts where admin_product_to_store.product_id = adminproducts.p_id AND adminproducts.p_code =$product_id;");
                while($row = mysqli_fetch_array($resul1))
                {
                $quantity_in_stock= $row['quantity_in_stock'];
                   echo $quantity_in_stock;
                  
                }
            }
            
?>
