<?php

$errors = array();

?>

<?php

$active='Account';
include("includes/header.php");

?>

<!DOCTYPE html>
<html>
<body>

   <div id="content">

    <div class="container">

      <div class="col-md-9" style="margin-left: 150px;">

        <div class="box3">

          <div class="box-header">

            <center>

              <h1> Register</h1>
              
            </center>

            <form action="customer_register.php" method="post" enctype="multipart/form-data">

              <?php include('errors.php'); ?>

              <div class="form-group">

                <label></label>

                <input type="text" class="form-control" name="c_name" placeholder="Your Name" required>
                
              </div>

              <div class="form-group">

                <label></label>

                <input type="email" class="form-control" name="c_email" placeholder="Your Email" required>
                
              </div>

              <div class="form-group">

                <label></label>

                <input type="password" class="form-control" name="c_pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and one lowercase letter, and at least 8 or more characters" placeholder="Your Password: Must be 8 or more characters with at least one number, one uppercase and one lowercase letter " required>
                
              </div>

              <div class="form-group">

                <label></label>

                <input type="password" class="form-control" name="c_pass2" placeholder="Confirm Password" required>
                
              </div>

              <div class="form-group">

                <label></label>

                <input type="text" class="form-control" name="c_contact" placeholder="Your Contact" required>
                
              </div>

              <div class="form-group">

                <label></label>

                <input type="text" class="form-control" name="c_address" placeholder="Your Address" required>
                
              </div>

              <br>

              <div class="text-center">

                <button type="submit" name="register" class="btn btn-warning">
                  
                  <i class="fa fa-user-md"></i> Register

                </button>
                
              </div>
              
            </form>
            
          </div>
          
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

$errors = array();

if(isset($_POST['register'])){

  $c_name = $_POST['c_name'];

  $c_email = $_POST['c_email'];

  $c_pass1 = $_POST['c_pass1'];

  $c_pass2 = $_POST['c_pass2'];

  $c_contact = $_POST['c_contact'];

  $c_address = $_POST['c_address'];

  if ($c_pass1 != $c_pass2) {

    array_push($errors, "Two passwords do not match");

    echo "<script>alert('Two passwords do not match')</script>";
  }


  $sqli = mysqli_query($con,"select * from customers where customer_email='".$c_email."'");

  if (mysqli_num_rows($sqli)==1) {

    array_push($errors,"Email is not available for registration");

    echo "<script>alert('Email is not available for registration')</script>";
  }


  $c_ip = getRealIpUser();

  if(count($errors) == 0){

  $c_pass = $c_pass1;

  $insert_customer = "insert into customers
  (customer_name,customer_email,customer_pass,customer_contact,customer_address,customer_ip) values 
  ('$c_name','$c_email','$c_pass','$c_contact','$c_address','$c_ip')";

  $run_customer = mysqli_query($con,$insert_customer);

  $sel_cart = "select * from cart where ip_add='$c_ip'";

  $run_cart = mysqli_query($con,$sel_cart);

  $check_cart = mysqli_num_rows($run_cart);

  if($check_cart>0){

    $_SESSION['customer_email']=$c_email;

    echo "<script>alert('You have been registered successfully')</script>";

    echo "<script>window.open('checkout.php','_self')</script>";

  } else{

     $_SESSION['customer_email']=$c_email;

    echo "<script>alert('You have been registered successfully')</script>";

    echo "<script>window.open('index.php','_self')</script>";

   }

 }

}

?>