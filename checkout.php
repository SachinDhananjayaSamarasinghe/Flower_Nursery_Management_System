<?php

$active='Account';
include("includes/header.php");

?>

<!DOCTYPE html>
<html>
<body>

  <br><br><br>

   <div id="content">

    <div class="container">

       <div class="col-md-6" style="margin-left: 297px;">

       <?php

       if(!isset($_SESSION['customer_email'])){

        include("customer/customer_login.php");

       } else{

        include("choose_options.php");

       }

        ?>

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