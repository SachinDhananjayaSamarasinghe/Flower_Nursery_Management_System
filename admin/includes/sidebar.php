<?php

if (!isset($_SESSION['admin_email'])) {

	echo "<script>window.open('login.php','_self')</script>";

} else{

?>

<nav class="navbar navbar-inverse navbar-fixed-top">

	<div class="navbar-header">

		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		
			<span class="sr-only">Toggle Navigation</span>

			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>

		</button>
		
	</div>

	<ul class="nav navbar-left top-nav">

		<li class="dropdown">

			<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background: #fbe4e4;">

			<i class="fa fa-user"></i> <?php echo $admin_name; ?> <b class="caret"></b>

			</a>

			<ul class="dropdown-menu">

				<li>

				<a href="index.php?user_profile=<?php echo $admin_id; ?>">
					
					<i class="fa fa-fw fa-pencil"></i> Profile

				</a> 
					
				</li>

				<li class="divider"></li>

				<li>

				<a href="logout.php">
					
					<i class="fa fa-fw fa-power-off"></i> Log Out

				</a> 
		
				</li>
				
			</ul>
			
		</li>			
		
	</ul>
	
</nav>

<?php

}

?>