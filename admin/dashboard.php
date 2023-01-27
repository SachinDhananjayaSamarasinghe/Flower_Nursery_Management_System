<?php

if (!isset($_SESSION['admin_email'])) {

	echo "<script>window.open('login.php','_self')</script>";

} else{

?>

<div class="row">

	<div class="col-lg-12">

		<h1 class="page-header"> Dashboard </h1>

		<ol class="breadcrumb">

			<li class="active">

				<i class="fa fa-dashboard"></i> Dashboard
				
			</li>
			
		</ol>
		
	</div>
	
</div>

<div class="row">

	<div class="col-lg-3 col-md-6">

		<div class="panel panel-primary">

			<div class="panel-heading">

				<div class="row">

					<div class="col-xs-3">

						<i class="fa fa-tasks fa-5x"></i> 
						
					</div>

					<div class="col-xs-9 text-right">

						<div class="huge"> <?php echo $count_products; ?> </div>

							<div> Products </div>
						
					</div>
					
				</div>
				
			</div>

			<a href="index.php?view_products">

				<div class="panel-footer">

					<span class="pull-left"> 

						View Products 

					</span>

					<span class="pull-right"> 

						<i class="fa fa-arrow-circle-right"></i> 

					</span>

					<div class="clearfix"></div>
					
				</div>

			</a>

			<a href="index.php?insert_product">

				<div class="panel-footer">

					<span class="pull-left"> 

						Insert Product 

					</span>

					<span class="pull-right"> 

						<i class="fa fa-arrow-circle-right"></i> 

					</span>

					<div class="clearfix"></div>
					
				</div>

			</a>
			
		</div>
		
	</div>

	<div class="col-lg-3 col-md-6">

		<div class="panel panel-yellow">

			<div class="panel-heading">

				<div class="row">

					<div class="col-xs-3">

						<i class="fa fa-tags fa-5x"></i> 
						
					</div>

					<div class="col-xs-9 text-right">

						<div class="huge"> <?php echo $count_p_categories; ?> </div>

							<div> Product Categories </div>
						
					</div>
					
				</div>
				
			</div>

			<a href="index.php?view_p_cats">

				<div class="panel-footer">

					<span class="pull-left"> 

						View Product Categories 

					</span>

					<span class="pull-right"> 

						<i class="fa fa-arrow-circle-right"></i> 

					</span>

					<div class="clearfix"></div>
					
				</div>

			</a>

			<a href="index.php?insert_p_cat">

				<div class="panel-footer">

					<span class="pull-left"> 

						Insert Product Category

					</span>

					<span class="pull-right"> 

						<i class="fa fa-arrow-circle-right"></i> 

					</span>

					<div class="clearfix"></div>
					
				</div>

			</a>
			
		</div>
		
	</div>

	<div class="col-lg-3 col-md-6">

		<div class="panel panel-pink">

			<div class="panel-heading">

				<div class="row">

					<div class="col-xs-3">

						<i class="fa fa-edit fa-5x"></i> 
						
					</div>

					<div class="col-xs-9 text-right">

						<div class="huge"> <?php echo $count_slides; ?> </div>

							<div> Slides </div>
						
					</div>
					
				</div>
				
			</div>

			<a href="index.php?view_slides">

				<div class="panel-footer">

					<span class="pull-left"> 

						View Slides 

					</span>

					<span class="pull-right"> 

						<i class="fa fa-arrow-circle-right"></i> 

					</span>

					<div class="clearfix"></div>
					
				</div>

			</a>

			<a href="index.php?insert_slide">

				<div class="panel-footer">

					<span class="pull-left"> 

						Insert Slide 

					</span>

					<span class="pull-right"> 

						<i class="fa fa-arrow-circle-right"></i> 

					</span>

					<div class="clearfix"></div>
					
				</div>

			</a>
			
		</div>
		
	</div>

	

	<div class="col-lg-3 col-md-6">

		<div class="panel panel-orange">

			<div class="panel-heading">

				<div class="row">

					<div class="col-xs-3">

						<i class="fa fa-user fa-5x"></i> 
						
					</div>

					<div class="col-xs-9 text-right">

						<div class="huge"> <?php echo $count_admins; ?> </div>

							<div> Admins </div>
						
					</div>
					
				</div>
				
			</div>

			<a href="index.php?view_users">

				<div class="panel-footer">

					<span class="pull-left"> 

						View Admins 

					</span>

					<span class="pull-right"> 

						<i class="fa fa-arrow-circle-right"></i> 

					</span>

					<div class="clearfix"></div>
					
				</div>

			</a>

			<a href="index.php?insert_user">

				<div class="panel-footer">

					<span class="pull-left"> 

						Insert Admin

					</span>

					<span class="pull-right"> 

						<i class="fa fa-arrow-circle-right"></i> 

					</span>

					<div class="clearfix"></div>
					
				</div>

			</a>
			
		</div>
		
	</div>

	<div class="col-lg-3 col-md-6">

		<div class="panel panel-green">

			<div class="panel-heading">

				<div class="row">

					<div class="col-xs-3">

						<i class="fa fa-users fa-5x"></i> 
						
					</div>

					<div class="col-xs-9 text-right">

						<div class="huge"> <?php echo $count_customers; ?> </div>

							<div> Customers </div>
						
					</div>
					
				</div>
				
			</div>

			<a href="index.php?view_customers">

				<div class="panel-footer">

					<span class="pull-left"> 

						View Customers 

					</span>

					<span class="pull-right"> 

						<i class="fa fa-arrow-circle-right"></i> 

					</span>

					<div class="clearfix"></div>
					
				</div>

			</a>
			
		</div>
		
	</div>

		<div class="col-lg-3 col-md-6">

		<div class="panel panel-red">

			<div class="panel-heading">

				<div class="row">

					<div class="col-xs-3">

						<i class="fa fa-book fa-5x"></i> 
						
					</div>

					<div class="col-xs-9 text-right">

						<div class="huge"> <?php echo $count_pending_orders; ?> </div>

							<div> Orders </div>
						
					</div>
					
				</div>
				
			</div>

			<a href="index.php?view_orders">

				<div class="panel-footer">

					<span class="pull-left"> 

						View Orders 

					</span>

					<span class="pull-right"> 

						<i class="fa fa-arrow-circle-right"></i> 

					</span>

					<div class="clearfix"></div>
					
				</div>

			</a>
			
		</div>
		
	</div>

	<div class="col-lg-3 col-md-6">

		<div class="panel panel-black">

			<div class="panel-heading">

				<div class="row">

					<div class="col-xs-3">

						<i class="fa fa-money fa-5x"></i> 
						
					</div>

					<div class="col-xs-9 text-right">

						<div class="huge"> <?php echo $count_payments; ?> </div>

							<div> Payments </div>
						
					</div>
					
				</div>
				
			</div>

			<a href="index.php?view_payments">

				<div class="panel-footer">

					<span class="pull-left"> 

						View Payments 

					</span>

					<span class="pull-right"> 

						<i class="fa fa-arrow-circle-right"></i> 

					</span>

					<div class="clearfix"></div>
					
				</div>

			</a>
			
		</div>
		
	</div>
	
</div>

<?php

}

?>