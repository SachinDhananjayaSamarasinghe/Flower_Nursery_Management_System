<?php

if (!isset($_SESSION['admin_email'])) {

  echo "<script>window.open('login.php','_self')</script>";

} else{

?>

   <div class="row">

  <div class="col-lg-12">

    <ol class="breadcrumb">

      <li class="active">

        <i class="fa fa-dashboard"></i> Dashboard / View Categories
        
      </li>
      
    </ol>
    
  </div>
  
</div>

<div class="row">

  <div class="col-lg-12">

    <div class="panel panel-default">

      <div class="panel-heading">

        <h3 class="panel-title">

          <i class="fa fa-book"></i> View Categories
          
        </h3>
        
      </div>

      <div class="panel-body">

        <div class="table-responsive">

          <table class="table table-striped table-bordered table-hover">

            <thead>

              <tr>

                    <th> Category: </th>

                    <th >Size: </th>

                    <th> Unit Price: </th>

                    <th> Delete Category: </th>

                     <th> Edit Price: </th>
                    
                  </tr>
                  
                </thead>

                <tbody>

              <?php

              $get_sup = "select * from supplier";

              $run_sup = mysqli_query($con,$get_sup);

              while($row_sup=mysqli_fetch_array($run_sup)){

                $cat_id = $row_sup['cat_id'];

                $category = $row_sup['category'];

                $size = $row_sup['size'];

                $unit_price = $row_sup['unit_price'];
            
              ?>

              <tr>

                <td> <?php echo $category; ?> </td>
                <td> <?php echo $size; ?> </td>
                <td> <?php echo $unit_price; ?> LKR </td>
                <td> <a href="index.php?delete_cat=<?php echo $cat_id; ?>">
                  
                  <i class="fa fa-trash-o"></i> Delete

                </a> 

              </td>
                <td> 

                  <a href="index.php?edit_cat=<?php echo $cat_id; ?>">
                  
                  <i class="fa fa-pencil"></i> Edit

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