<div class="box">

	<?php

	$session_email = $_SESSION['customer_email'];

	$select_customer = "select * from customers where customer_email='$session_email'";

	$run_customer = mysqli_query($con,$select_customer);

	$row_customer = mysqli_fetch_array($run_customer);

	$customer_id = $row_customer['customer_id'];

	 ?>

	<h1 class="text-center"> Payment Options </h1>

	<br>

	<p class="lead text-center">
		
		<a style="text-decoration: none;" href="order.php?c_id=<?php echo $customer_id ?>"> Proceed Checkout </a>

	</p>

	<center>

		<p class="lead">

			<a style="text-decoration: none;" href="bank_details.php">

				Bank Details

				<img class="img-responsive" src="images/banks.jpg" alt="banks">
				
			</a>
			
		</p>
		
	</center>
	
</div>