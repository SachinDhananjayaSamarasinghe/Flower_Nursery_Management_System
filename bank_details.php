<?php

$active='Account';
include("includes/header.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plant Ordering System</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

	<div id="content">

    <div class="container" style="margin-left: 390px;">

		 <div class="col-md-6">

		    <div class="box">

		<center>

			<h1> Bank Details </h1>

			<p class="text-muted">

				Proceed Checkout <a style="text-decoration: none;" href="checkout.php">Now</a>
				
			</p>
			
		</center>

		<hr>

		<div class="table-responsive">

			<table class="table table-hover" style="border-collapse: collapse;">

				<thead>

					<tr>

						<th> Bank </th>
						<th> Account No. </th>
						
					</tr>
					
				</thead>

				<tbody>

					<td> <p class="text-muted"> <img src="images/bank1.jpg" alt="Manager" style="width:50.5%;"> </td>
					<td style="vertical-align: middle;"> 145-500-400-750 </td>
					
				</tbody>

				<tbody>

					<td> <p class="text-muted"> <img src="images/bank2.jpg" alt="Manager" style="width:50.5%;">  </td>
					<td style="vertical-align: middle;"> 780-1050-801-87569 </td>
					
				</tbody>

				<tbody>

					<td> <p class="text-muted"> <img src="images/bank3.jpg" alt="Manager" style="width:50.5%;"> </td>
					<td style="vertical-align: middle;"> 21-8754-524-47851 </td>
					
				</tbody>
				
			</table>
			
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