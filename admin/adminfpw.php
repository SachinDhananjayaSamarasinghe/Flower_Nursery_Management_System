<?php

session_start();
include("includes/db.php");

?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$admin_email = "";
$errors = array();

if ($_POST) {
	$admin_email = $_POST['admin_email'];
	$sql = mysqli_query($con,"select * from admins where admin_email = '{$admin_email}'") or die(mysqli_error($con));
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
    $mail->Username   = 'xxxxxxxxxxxxxxx@gmail.com';                     // SMTP username
    $mail->Password   = 'xxxxxxxxxxxxxxx';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('xxxxxxxxxxxxxxxx@gmail.com', 'Admin Login Password');
    $mail->addAddress($admin_email, $admin_email);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Forget Password?';
    $mail->Body    = "Hi $admin_email your password is {$data['admin_pass']}";
    $mail->AltBody = "Hi $admin_email your password is {$data['admin_pass']}";

    $mail->send();
   // array_push($errors,"The password has been sent on your email");
    echo "<script>alert('The password has been sent on your email')</script>";
    echo "<script>window.open('login.php','_self')</script>";
} 
catch (Exception $e) {
    array_push($errors,"Email could not be sent. Mailer Error: {$mail->ErrorInfo}");
    echo "<script>alert('Email could not be sent')</script>";
}

	}

    else if(empty($admin_email)){
       // array_push($errors, "Email is required");
        echo "<script>alert('Email is required')</script>";
    }

	else{
		//array_push($errors, "Sorry, Email is not available");
        echo "<script>alert('Sorry, Email is not available')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>

 <body>

    <div class="container">

        <form action="" class="form-login" method="post">

            <?php include('errors.php'); ?>

            <h2 class="form-login-heading"><b> Forgot Password? </b> </h2>

            <br>

            <input type="email" class="form-control" placeholder="Enter email address you registered with..." name="admin_email" required>

            <br>

            <button type="submit" class="btn btn-lg btn-success btn-block" name="admin_login" style="background-color: #ba2fe1;">

                Submit

            </button>

            <br>

            <center>

            <p>

            <a style="text-decoration: none; color:black; font-size: 130%;" href="login.php"><b> Login </b></a>

            </p>

            </center>
            
        </form>
        
    </div>
 
 </body>
 
 </html>