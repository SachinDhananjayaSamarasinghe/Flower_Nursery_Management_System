<?php

session_start();

include("includes/db.php");
include("functions/functions.php");

?>

<?php

if(isset($_GET['pro_id'])){

  $product_id = $_GET['pro_id'];

  $get_product = "select * from products where product_id='$product_id'";

  $run_product = mysqli_query($con,$get_product);

  $row_product = mysqli_fetch_array($run_product);

  $p_cat_id = $row_product['p_cat_id'];

  $pro_title = $row_product['product_title'];

  $pro_price = $row_product['product_price'];

  $pro_desc = $row_product['product_desc'];

  $pro_img1 = $row_product['product_img1'];

  $pro_img2 = $row_product['product_img2'];

  $pro_img3 = $row_product['product_img3'];

  $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

  $run_p_cat = mysqli_query($con,$get_p_cat);

  $row_p_cat = mysqli_fetch_array($run_p_cat);

  $p_cat_title = $row_p_cat['p_cat_title'];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flower Ordering System</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
   
   <div id="top">
       
       <div class="container">
           
           <div class="col-md-6 offer">
               
              <a href="index.php" class="navbar-brand home">
                   
                   <img src="images/site.png" alt="Logo" class="hidden-xs" height="45" style="margin-left: -50px;">
                   <img src="images/mobile.png" alt="Logo Mobile" class="visible-xs">
                   
               </a>
               
           </div>
           
       </div>
       
   </div>
   
   <div id="navbar" class="navbar navbar-default">
       
       <div class="container">
           
           <div class="navbar-header">
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
           </div>
           
           <div class="navbar-collapse collapse" id="navigation">
               
               <div class="padding-nav">
                   
                   <ul class="nav navbar-nav left" style="margin-left: 343px;">
                       
                       <li class="<?php if($active=='Home') echo"active"; ?>">
                           <a href="index.php">Home</a>
                       </li>
                       <li class="<?php if($active=='Shop') echo"active"; ?>">
                           <a href="shop.php">Shop</a>
                       </li>
                       <li class="<?php if($active=='Account') echo"active"; ?>">
                           
                           <?php 

                           if(!isset($_SESSION['customer_email'])){

                            echo "<a href='checkout.php'>My Orders</a>";

                           } else{

                            echo"<a href='customer/my_account.php?my_orders'>My Orders</a>";

                           }

                            ?>

                       </li>
                       <li class="<?php if($active=='Cart') echo"active"; ?>">
                           <a href="cart.php">Cart</a>
                       </li>
                       <li class="<?php if($active=='Contact') echo"active"; ?>">
                           <a href="contact_us.php">Contact Us</a>
                       </li>
                       
                   </ul>
                   
               </div>
               
           </div>
           
       </div>
       
   </div>

 </body>

 </html>