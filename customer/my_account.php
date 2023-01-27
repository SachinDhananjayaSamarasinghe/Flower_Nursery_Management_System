<?php

session_start();

if(!isset($_SESSION['customer_email'])){

  echo "<script>window.open('../checkout.php','_self')</script>";

}else{



include("includes/db.php");
include("functions/functions.php");

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
               
               <a href="../index.php" class="navbar-brand home">
                   
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
                       
                       <li>
                           <a href="../index.php">Home</a>
                       </li>
                       <li>
                           <a href="../shop.php">Shop</a>
                       </li>
                       <li  class="active">
                           <a href="#">My Orders</a>
                       </li>
                       <li>
                           <a href="../cart.php">Cart</a>
                       </li>
                       <li>
                           <a href="../contact_us.php">Contact Us</a>
                       </li>

                        <li>
                       <a href="../checkout.php">
                         
                         <?php

                           if(!isset($_SESSION['customer_email'])){

                            echo "<a href='checkout.php'> Login </a>";

                           } else{

                            echo "<a style='margin-top: -30px;' href='logout.php'> Log Out </a>";

                           }

                           ?>

                       </a>
                   </li>
                       
                   </ul>
                   
               </div>

           </div>
           
       </div>
       
   </div>

 <div id="content">

    <div class="container">

      <div class="col-md-12">

        <div class="box">

          <?php

          if (isset($_GET['my_orders'])) {
            include("my_orders.php");
          }

          ?>
          
        </div>
        
      </div>

      </div>
     
   </div>

      <?php

   include("includes/footer.php");

   ?>

  <script src="js/jquery-331.min.js"></script>
  <script src="js/bootstrap-337.min.js"></script>
</body>
</html>

<?php

}

?>