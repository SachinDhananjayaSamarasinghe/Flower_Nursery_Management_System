<?php

if (!isset($_SESSION['admin_email'])) {

	echo "<script>window.open('login.php','_self')</script>";

} else{

?>

<div class="row">

	<div class="col-lg-12">

		<ol class="breadcrumb">

			<li>

				<i class="fa fa-dashboard"></i> Dashboard /  Insert Category
				
			</li>
			
		</ol>
		
	</div>
	
</div>

<div class="row">

	<div class="col-lg-12">

		<div class="panel panel-default">

			<div class="panel-heading">

				<h3 class="panel-title">

				<i class="fa fa-book fa-fw"></i> Insert Category
					
				</h3>
				
			</div>

			<div class="panel-body">

				<form action="" class="form-horizontal" method="post">

					<div class="form-group">

						<label for="" class="control-label col-md-3">

							Category
							
						</label>

						<div class="col-md-6">

							<input type="text" name="cat_title" class="form-control" required>
							
						</div>
						
					</div>

					<div class="form-group">

						<label for="" class="control-label col-md-3">

							Size
							
						</label>

						<div class="col-md-6">

							<input type="text" name="cat_size" class="form-control" required>
							
						</div>
						
					</div>

					<div class="form-group">

						<label for="" class="control-label col-md-3">

							Unit Price
							
						</label>

						<div class="col-md-6">

							<input type="text" name="cat_price" class="form-control" required>
							
						</div>
						
					</div>

					<div class="form-group">

						<label for="" class="control-label col-md-3">
							
						</label>

						<div class="col-md-6">

							<input value="Submit" name="submit" type="submit" class="form-control btn btn-primary">
							
						</div>
						
					</div>
					
				</form>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<?php 

	if (isset($_POST['submit'])) {

		$cat_title = $_POST['cat_title'];

		$cat_size = $_POST['cat_size'];

		$cat_price = $_POST['cat_price'];

		$insert_cat = "insert into supplier (category,size,unit_price) values ('$cat_title','$cat_size','$cat_price')";

		$run_cat = mysqli_query($con,$insert_cat);

		if ($run_cat) {

			echo "<script>alert('New price category added successfully')</script>";

			echo "<script>window.open('index.php?view_cats','_self')</script>";
		}

	}

?>

<?php } ?>