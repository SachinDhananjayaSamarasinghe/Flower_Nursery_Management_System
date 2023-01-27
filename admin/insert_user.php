<?php

$errors = array();

?>

<?php

if (!isset($_SESSION['admin_email'])) {

	echo "<script>window.open('login.php','_self')</script>";

} else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insert User</title>
</head>
<body>

	<div class="row">

		<div class="col-lg-12">

			<ol class="breadcrumb">

				<li class="active">

					<i class="fa fa-dashboard"></i> Dashboard / Insert User
					
				</li>
				
			</ol>
			
		</div>
		
	</div>

	<div class="row">

		<div class="col-lg-12">

			<div class="panel panel-default">

				<div class="panel-heading">

					<h3 class="panel-title">

						<i class="fa fa-user fa-fw"></i> Insert User
						
					</h3>
					
				</div>

				<div class="panel-body">

					<form method="post" class="form-horizontal" enctype="multipart/form-data">

						<?php include('errors.php'); ?>

						<div class="form-group">

							<label class="col-md-3 control-label"> Username </label>

							<div class="col-md-6">

									<input name="admin_name" type="text" class="form-control" required>
					
								</div>
								
							</div>

							<div class="form-group">

							<label class="col-md-3 control-label"> E-mail </label>

							<div class="col-md-6">

									<input name="admin_email" type="email" class="form-control" required>
					
								</div>
								
							</div>

							<div class="form-group">

							<label class="col-md-3 control-label"> Password </label>

							<div class="col-md-6">

							<input name="admin_pass1" type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and one lowercase letter, and at least 8 or more characters" placeholder=" At least 8 characters with a number, an uppercase and lowercase letter" required>		
					
								</div>
								
							</div>

							<div class="form-group">

                			<label class="col-md-3 control-label">Confirm Password</label>

                			<div class="col-md-6">

                			<input type="password" class="form-control" name="admin_pass2" required>
                
           					   </div>

           					</div>

							<div class="form-group">

							<label class="col-md-3 control-label"> Country </label>

							<div class="col-md-6">

									<input name="admin_country" type="text" class="form-control" required>	
					
								</div>
								
							</div>

							<div class="form-group">

							<label class="col-md-3 control-label"> Contact </label>

							<div class="col-md-6">

									<input name="admin_contact" type="text" class="form-control" required>
					
								</div>
								
							</div>

							<div class="form-group">

							<label class="col-md-3 control-label"> Job </label>

							<div class="col-md-6">

									<input name="admin_job" type="text" class="form-control" required>
					
								</div>
								
							</div>

							<div class="form-group">

							<label class="col-md-3 control-label"> Image </label>

							<div class="col-md-6">

									<input name="admin_image" type="file" class="form-control" required>
					
								</div>
								
							</div>

							<div class="form-group">

							<label class="col-md-3 control-label"> About </label>

							<div class="col-md-6">

									<textarea name="admin_about" class="form-control" rows="3"></textarea>
					
								</div>
								
							</div>

							<div class="form-group">

							<label class="col-md-3 control-label"> </label>

							<div class="col-md-6">

									<input type="submit" name="submit" value="Insert User" class=" btn btn-warning form-control">
					
								</div>
								
							</div>
						
					</form>
					
				</div>
				
			</div>
			
		</div>
		
	</div>

	<script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>

</body>
</html>

<?php

if (isset($_POST['submit'])) {

	$errors = array();
	
	$user_name = $_POST['admin_name'];
	$user_email = $_POST['admin_email'];
	$user_pass1 = $_POST['admin_pass1'];
	$user_pass2 = $_POST['admin_pass2'];
	$user_country = $_POST['admin_country'];
	$user_contact = $_POST['admin_contact'];
	$user_job = $_POST['admin_job'];

	$user_image = $_FILES['admin_image']['name'];

	$temp_admin_image = $_FILES['admin_image']['tmp_name'];

	$user_about = $_POST['admin_about'];

 if ($user_pass1 != $user_pass2) {

    array_push($errors, "Two passwords do not match");

    echo "<script>alert('Two passwords do not match')</script>";
  }


  $sqli = mysqli_query($con,"select * from admins where admin_email='".$user_email."'");

  if (mysqli_num_rows($sqli)==1) {

    array_push($errors,"Email is not available for registration");

    echo "<script>alert('Email is not available for registration')</script>";
  }

	move_uploaded_file($temp_admin_image, "admin_images/$user_image");

	if(count($errors) == 0){

  	$user_pass = $user_pass1;

	$insert_user = "insert into admins (admin_name,admin_email,admin_pass,admin_country,admin_contact,admin_job,admin_image,admin_about) 
					values ('$user_name','$user_email','$user_pass','$user_country','$user_contact','$user_job','$user_image','$user_about')";

	$run_user = mysqli_query($con,$insert_user);

	if($run_user){
		echo "<script>alert('New user added successfully')</script>";
		echo "<script>window.open('index.php?view_users','_self')</script>";
	}

}

}

?>

<?php } ?>