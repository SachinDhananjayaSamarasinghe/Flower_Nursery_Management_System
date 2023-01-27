<?php

include("includes/db.php");

?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$customer_email = "";
$errors = array();

if ($_POST) {
	$customer_email = $_POST['customer_email'];
	$sql = mysqli_query($con,"select * from customers where customer_email = '{$customer_email}'") or die(mysqli_error($con));
	$count = mysqli_num_rows($sql);
	$data = mysqli_fetch_array($sql);

	if ($count>0) {

		// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'xxxxxxxxxxxxxx@gmail.com';                     // SMTP username
    $mail->Password   = 'xxxxxxxxxxxxxx';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('xxxxxxxxxxxxxxx@gmail.com', 'Customer Login Password');
    $mail->addAddress($customer_email, $customer_email);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Forgot Password?';
    $mail->Body    = "Hi $customer_email your password is {$data['customer_pass']}";
    $mail->AltBody = "Hi $customer_email your password is {$data['customer_pass']}";

    $mail->send();
   // array_push($errors,"The password has been sent on your email");
    echo "<script>alert('The password has been sent on your email')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
} 
catch (Exception $e) {
    array_push($errors,"Email could not be sent. Mailer Error: {$mail->ErrorInfo}");
    echo "<script>alert('Email could not be sent')</script>";
    echo "<script>window.open('customerfpw.php','_self')</script>";
}

	}

    else if(empty($customer_email)){
       // array_push($errors, "Email is required");
        echo "<script>alert('Email is required')</script>";
        echo "<script>window.open('customerfpw.php','_self')</script>";
    }

	else{
		//array_push($errors, "Sorry, Email is not available");
        echo "<script>alert('Sorry, Email is not available')</script>";
        echo "<script>window.open('customerfpw.php','_self')</script>";
	}
}

?>

<?php

$active='Account';
include("includes/header.php");

?>

<!DOCTYPE html>
<html>
<body>

  <br><br><br>

   <div id="content">

    <div class="container">

    <div class=" box3 col-md-6" style="margin-left: 297px;">

    <div class="box-header">

    <center>

        <h1> Forgot Password ? </h1>

        <p class="text-muted"></p>
        
    </center>
    
    </div>

    <form method="post" action="">

        <?php include('errors.php'); ?>
    
    <div class="form-group">

        <label></label>

        <input type="email" name="customer_email" class="form-control" placeholder="Enter email address you registered with..." required>
        
    </div>

    <div class="text-center">

        <button type="submit" name="login" value="Login" class="btn btn-warning">

            <i class="fa fa-sign-in"></i> Submit
            
        </button>
        
    </div>

    </form>

    <br>

    <center>

        <a href="customer_register.php" style="text-decoration: none;">
            
            <h4 style="color: black; "> Don't have an account..? Register here..! </h4>

        </a>
        
    </center>

    <center>

        <a href="checkout.php" style="text-decoration: none;">
            
            <h4 style="color: red; "> Login </h4>

        </a>
        
    </center>

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