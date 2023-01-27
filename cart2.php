<?php

session_start();

error_reporting(E_PARSE | E_ERROR);

$active='Cart';

include("includes/db.php");
include("functions/functions.php");


?>

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
                           <a href="contact.php">Contact Us</a>
                       </li>
                       
                   </ul>
                   
               </div>
               
           </div>
           
       </div>
       
   </div>

   <div id="content">

    <div class="container">

      <div id="cart" class="col-md-12">

        <div class="box">

          <form action="cart.php" method="post" enctype="multipart/form-data">

            <h1> Cart &nbsp

              <a href="cart.php" class="btn navbar-btn btn-danger right">
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php items(); ?> Items In Your Cart</span>
                   
               </a>

            </h1>

            <?php

            $ip_add = getRealIpUser();

            $select_cart = "select * from cart where ip_add='$ip_add'";

            $run_cart = mysqli_query($con,$select_cart);

            $count = mysqli_num_rows($run_cart);

             ?>

            <div class="table-responsive">

              <table class="table">

                <thead>

                  <tr>

                    <th colspan="2">Product</th>
                    <th>Quantity</th>
                    <th>Unit Prize</th>
                    <th colspan="1">Delete</th>
                    <th colspan="2">Sub-Total</th>
                    
                  </tr>
                  
                </thead>

                <tbody>

                  <?php

                  $total = 0;

                  while($row_cart = mysqli_fetch_array($run_cart)){

                    $pro_id = $row_cart['p_id'];

                    $pro_qty = $row_cart['qty'];

                    $get_products = "select * from products where product_id='$pro_id'";

                    $run_products = mysqli_query($con,$get_products);

                    while($row_products = mysqli_fetch_array($run_products)){

                      $product_title = $row_products['product_title'];

                      $product_img1 = $row_products['product_img1'];

                      $only_price = $row_products['product_price'];

                      $sub_total = $row_products['product_price']*$pro_qty;

                      $_SESSION['pro_qty'] = $pro_qty;

                      $total += $sub_total;

                  ?>

                  <tr>
                    
                    <td>
                      
                      <img class="img-responsive" src="admin/product_images/<?php echo $product_img1; ?>" alt="Flower 1">

                    </td>

                    <td>

                      <a href="details.php?pro_id=<?php echo $pro_id; ?> "><?php echo $product_title; ?></a>
                      
                    </td>

                    <td>

                    <input type="text" name="quantity" data-product_id="<?php echo $pro_id; ?>" value="<?php echo $_SESSION['pro_qty']; ?>" 
                      class="quantity form-control">
                      
                    </td>

                    <td>

                    Rs. <?php echo $only_price; ?>
                      
                    </td>

                    <td>

                      <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                      
                    </td>

                    <td>
                      
                    Rs.  <?php echo $sub_total; ?> 

                    </td>

                  </tr>

                  <?php } } ?>
                  
                </tbody>

                <tfoot>

                  <tr>

                    <th colspan="5">Total</th>
                    <th colspan="2">Rs. <?php echo $total; ?> </th>
                        
                  </tr>
                  
                </tfoot>
                
              </table>
              
            </div>

            <div class="box-footer">

              <div class="pull-left">

                <a href="shop.php" class="btn btn-default">
                  
                  <i class="fa fa-chevron-left"></i> Continue Shopping

                </a>
                
              </div>

              <div class="pull-right">

                <button type="submit" name="update" value="Update Cart" class="btn btn-default">
                  
                  <i class="fa fa-refresh"></i> Update Cart

                </button>

                <a href="checkout.php" class="btn btn-warning">
                  
                  Proceed Checkout <i class="fa fa-chevron-right"></i>

                </a>

              </div>
              
            </div>
            
          </form>
          
        </div>

        <?php

        function update_cart(){

          global $con;

          if(isset($_POST['update'])){

            foreach($_POST['remove'] as $remove_id){

              $delete_product = "delete from cart where p_id='$remove_id'";

              $run_delete = mysqli_query($con,$delete_product);

              if($run_delete){

                echo"<script>window.open('cart.php','_self')</script>";

              }

            }

          }

        }

        echo @$up_cart = update_cart();

        ?>
        
      </div>

      </div>
     
   </div>

      <?php

   include("includes/footer.php");

   ?>

  <script src="js/jquery-331.min.js"></script>
  <script src="js/bootstrap-337.min.js"></script>

  <script>

    $(document).ready(function(data){

      $(document).on('keyup','.quantity',function(){

        var id = $(this).data("product_id");

        var quantity = $(this).val();

        if(quantity !=''){

          $.ajax({

            url: "cart3.php",
            method: "POST",
            data:{id:id, quantity:quantity},

            success:function(){
              $("body").load("cart2.php");
            }

          });
        } 

      });

    });
    
  </script>

</body>