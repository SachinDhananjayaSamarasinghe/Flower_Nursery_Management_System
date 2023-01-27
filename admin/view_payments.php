<?php

if (!isset($_SESSION['admin_email'])) {

	echo "<script>window.open('login.php','_self')</script>";

} else{

?>

<div class="row">

	<div class="col-lg-12">

		<ol class="breadcrumb">

			<li class="active">

				<i class="fa fa-dashboard"></i> Dashboard / View Payments
				
			</li>
			
		</ol>
		
	</div>
	
</div>

<div class="row">

	<div class="col-lg-12">

		<div class="panel panel-default">

			<div class="panel-heading">

				<h3 class="panel-title">

					<i class="fa fa-money"></i> View Payments
					
				</h3>
				
			</div>

			<div class="panel-body">

				<div class="table-responsive">

					<table class="table table-hover">

						<thead>

							<tr>

								<th> No: </th>
								<th> Invoice No: </th>
								<th> Amount Paid: </th>
								<th> Paid Bank: </th>
								<th> Paid Bank Branch <br>(Only for bank slip payments): </th>
								<th> Branch Code/Online Ref. No.<br>(For online bank payments): </th>
								<th> Payment Date: </th>
								<th> Delete Payment: </th>
								
							</tr>
							
						</thead>

						<tbody>

							<?php

							$i=0;

							$get_payments = "select * from payments";

							$run_payments = mysqli_query($con,$get_payments);

							while($row_payments=mysqli_fetch_array($run_payments)){

								$payment_id = $row_payments['payment_id'];

								$invoice_no = $row_payments['invoice_no'];

								$paid_amount = $row_payments['paid_amount'];

								$paid_bank =$row_payments['paid_bank'];

								$paid_branch = $row_payments['paid_branch'];

								$branch_code = $row_payments['branch_code'];

								$payment_date = $row_payments['payment_date'];

								$i++;
						
							?>

							<tr>

								<td> <?php echo $i; ?> </td>
								<td> <?php echo $invoice_no; ?> </td>
								<td> <?php echo $paid_amount; ?> LKR </td>
								<td> <?php echo $paid_bank; ?> </td>
								<td> <?php echo $paid_branch; ?> </td>
								<td> <?php echo $branch_code; ?> </td>
								<td> <?php echo $payment_date; ?> </td>
								<td> 
									<a class="btn btn-danger" href="index.php?delete_payment=<?php echo $payment_id; ?>">
									
									<i class="fa fa-trash-o"></i> Delete

								</a> 

								</td>
								
								
							</tr>

							<?php  }  ?>
							
						</tbody>
						
					</table>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<?php } ?>

