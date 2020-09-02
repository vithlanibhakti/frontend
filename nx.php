<html lang="en">
<head>
<meta charset="utf-8">
<style>
.fa-input {
  font-family: FontAwesome;
}
</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<!-- Including our scripting file. -->

<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript" src="script.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <!-- CSS only -->
<!-- 
    
     JS, Popper.js, and jQuery 
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   
    <meta name="viewport" content="width=device-width,initial-scale=1"> -->
    <title>GIT Lanka Online</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/homepage.css">
</head>
        <?php
            include("config.php");

            $rowperpage = 5;
            $row = 0;

            // Previous Button
            if(isset($_POST['but_prev'])){
                $row = $_POST['row'];
                $row -= $rowperpage;
                if( $row < 0 ){
                    $row = 0;
                }
            }

            // Next Button
            if(isset($_POST['but_next'])){
                $row = $_POST['row'];
                $allcount = $_POST['allcount'];

                $val = $row + $rowperpage;
                if( $val < $allcount ){
                    $row = $val;
                }
            }
        ?>
    <div id="content">
    <div class="product-container">
                        <div class="m-0 row-cols-2 row-cols-xs-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-5 row">
        
            <?php
            // count total number of rows
            $sql = "SELECT COUNT(*) AS cntrows FROM adminproducts";
            $result = mysqli_query($con,$sql);
            $fetchresult = mysqli_fetch_array($result);
            $allcount = $fetchresult['cntrows'];

            // selecting rows
            $sql = "SELECT * FROM adminproducts  limit $row,".$rowperpage;
            $result = mysqli_query($con,$sql);
            $sno = $row + 1;


            while($fetch = mysqli_fetch_array($result)){
                $p_name = $fetch['p_name'];
                $p_id= $fetch['p_id'];   
                $p_image = $fetch['p_image'];

                $result2 = mysqli_query($con,"SELECT  `product_id`, `sell_price` FROM `admin_product_to_store` where `product_id` = $p_id");                                    
                                        while($row2 = mysqli_fetch_array($result2)) 
                                        {
                                            $sell_price= $row2['sell_price'];   
                                            //  echo $sell_price."<br>"; 
                                              $product_id= $row2['product_id'];   
                                          // echo $product_id."<br>"; 
                                        
                                        }       
                                        
                ?>
                <div class="col" style="padding-bottom: 15px;">
                                        <div class="product-card-container">
                                            <div class="row">
                                                <div class="product-card-image-container col-md-12">
                                                <img class="img-fluid" src="<?php echo $p_image; ?>">
                                                    <div class="product-card-promotion-badge">
                                                        <div class="product-card-promotion-badge-nexus">
                                                            <!-- <img class="img-fluid" src="/static/media/Nexus.0af60875.png"> -->
                                                        </div>
                                                        <div class="product-card-promotion-badge-single-line">
                                                            <div class="product-card-promotion-badge-percentage">29</div>
                                                            <div>
                                                                <div class="product-card-promotion-badge-suffix">%</div>
                                                                <div class="product-card-promotion-badge-suffix">Off</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card-name col-md-12"><?php echo $p_name; ?></div>
                                                <div class="product-card-price-container col-md-12">
                                                    <div class="product-card-original-price"><?php echo $sell_price; ?></div>
                                                    <div class="product-card-final-price">Rs 138.00 / Unit</div>
                                                </div>
                                                <div class="product-card-button-container col-md-12">
                                                    <button type="button" class="product-card-button-add btn btn-primary btn-block" onclick="display()">
                                                    <i class="fas fa-shopping-cart"></i>Add to Cart</button></div>
                                            </div>
                                        </div>
                                    </div>

            <?php
            
                $sno ++;
            
        }
        
            ?>
        
        <form method="post" action="">
            <div id="div_pagination">
                <input type="hidden" name="row" value="<?php echo $row; ?>">
                <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
<button type="submit" class="btn btn-success ClickCheck" id="Create " name="but_prev"> <i class="fa fa-arrow-left"></i></button>

<button type="submit" class="btn btn-success ClickCheck" id="Create " name="but_next"> <i class="fa fa-arrow-right"></i></button>

            </div>
        </form>
    </div>
    </div>
    </div>
    </body>
</html>