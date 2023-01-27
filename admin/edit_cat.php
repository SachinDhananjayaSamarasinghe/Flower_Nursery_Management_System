<?php

if (!isset($_SESSION['admin_email'])) {

	echo "<script>window.open('login.php','_self')</script>";

} else{

?>

<?php

if (isset($_GET['edit_cat'])) {

	$edit_cat_id = $_GET['edit_cat'];

	$edit_cat_query = "select * from supplier where cat_id='$edit_cat_id'";

	$run_edit = mysqli_query($con,$edit_cat_query);

	$row_edit = mysqli_fetch_array($run_edit);

	$cat_id = $row_edit['cat_id'];

	$cat_title = $row_edit['category'];

	$cat_size = $row_edit['size'];

	$cat_price = $row_edit['unit_price'];


}

?>

<div class="row">

	<div class="col-lg-12">

		<ol class="breadcrumb">

			<li>

				<i class="fa fa-dashboard"></i> Dashboard /  Edit Category
				
			</li>
			
		</ol>
		
	</div>
	
</div>

<div class="row">

	<div class="col-lg-12">

		<div class="panel panel-default">

			<div class="panel-heading">

				<h3 class="panel-title">

				<i class="fa fa-pencil fa-fw"></i> Edit Category
					
				</h3>
				
			</div>

			<div class="panel-body">

				<form action="" class="form-horizontal" method="post">

					<div class="form-group">

						<label for="" class="control-label col-md-3">

							Category
							
						</label>

						<div class="col-md-6">

							<input type="text" name="cat_title" class="form-control" value="<?php echo $cat_title; ?>">
							
						</div>
						
					</div>

					<div class="form-group">

						<label for="" class="control-label col-md-3">

							Size
							
						</label>

						<div class="col-md-6">

							<input type="text" name="cat_size" class="form-control" value="<?php echo $cat_size; ?>">
							
						</div>
						
					</div>

					<div class="form-group">

						<label for="" class="control-label col-md-3">

							Unit Price
							
						</label>

						<div class="col-md-6">

							<input type="text" name="cat_price" class="form-control" value="<?php echo $cat_price; ?>">
							
						</div>
						
					</div>

					<div class="form-group">

						<label for="" class="control-label col-md-3">
							
						</label>

						<div class="col-md-6">

							<input value="Update" name="update" type="submit" class="form-control btn btn-primary">
							
						</div>
						
					</div>
					
				</form>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<?php 

	if (isset($_POST['update'])) {

		$cat_title = $_POST['cat_title'];

		$cat_size = $_POST['cat_size'];

		$cat_price= $_POST['cat_price'];

		$update_cat = "update supplier set category='$cat_title',size='$cat_size',unit_price='$cat_price' where cat_id='$cat_id'";

		$run_cat = mysqli_query($con,$update_cat);

		if ($run_cat) {

			echo "<script>alert('Category price updatd Successfully')</script>";

			echo "<script>window.open('index.php?view_cats','_self')</script>";
		}
	}

?>

<?php } ?>