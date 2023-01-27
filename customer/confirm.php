<?php

error_reporting(E_PARSE | E_ERROR);

session_start();

if(!isset($_SESSION['customer_email'])){

  echo "<script>window.open('../checkout.php','_self')</script>";

}else{

include("includes/db.php");
include("functions/functions.php");

if(isset($_GET['order_id'])){

  $order_id = $_GET['order_id'];

}

?>

<?php

if (isset($_GET['order_id'])) {

  $edit_order_id = $_GET['order_id'];

  $edit_order_query = "select * from customer_orders where order_id='$edit_order_id'";

  $run_edit = mysqli_query($con,$edit_order_query);

  $row_edit = mysqli_fetch_array($run_edit);

  $invoice= $row_edit['invoice_no'];

  $amount = $row_edit['due_amount'];

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

          <center>

          <h1 align="center">Confirm Your Payment</h1>

         </center>

          <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">

              <label>Invoice No:</label>

              <input type="text" class="form-control" name="invoice_no" value="<?php echo $invoice; ?>" required>
              
            </div>

            <div class="form-group">

              <label>Amount Paid:</label>

              <input type="text" class="form-control" name="paid_amount" value="<?php echo $amount; ?>" required>
              
            </div>

            <div class="form-group">

              <label>Paid Bank:</label>

              <select name="paid_bank" class="form-control">

                <option>Select Paid Bank</option>
                <option>Commercial Bank</option>
                <option>Sampath Bank</option>
                <option>Nations Trust Bank</option>
                
              </select>
              
            </div>

            <div class="form-group">

              <label>Paid Branch (Only for bank slip payments):</label>

              <input type="text" class="form-control" name="paid_branch">
              
            </div>

            <div class="form-group">

              <label>Paid Branch Code / Online Reference ID (For online bank payments):</label>

              <input type="text" class="form-control" name="branch_code" required>
              
            </div>

            <div class="form-group">

              <label>Payment Date:</label>

              <input type="date" class="form-control" name="payment_date" required>
              
            </div>

            <div class="text-center">

              <button class="btn btn-warning btn-lg" name="confirm_payment">

                <i class="fa fa-user-md"></i> Confirm Payment
                
              </button>
              
            </div>
            
          </form>

          <?php

          if(isset($_POST['confirm_payment'])){

            $update_id = $_GET['update_id'];

            $invoice_no = $_POST['invoice_no'];

            $paid_amount = $_POST['paid_amount'];

            $paid_bank = $_POST['paid_bank'];

            $paid_branch = $_POST['paid_branch'];

            $branch_code = $_POST['branch_code'];

            $payment_date = $_POST['payment_date'];

            $complete = "Complete";

            $insert_payment = "insert into payments (invoice_no,paid_amount,paid_bank,paid_branch,branch_code,payment_date) values  ('$invoice_no','$paid_amount',
            '$paid_bank','$paid_branch','$branch_code','$payment_date')";

            $run_payment = mysqli_query($con,$insert_payment);

            $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";

            $run_customer_order = mysqli_query($con,$update_customer_order);

            $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";

            $run_pending_order = mysqli_query($con,$update_pending_order);

            if($run_pending_order){

              echo "<script>alert('Thank you for purchasing, your order will be completed within 24 hours work')</script>";

              echo "<script>window.open('logout.php','_self')</script>";

            }

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