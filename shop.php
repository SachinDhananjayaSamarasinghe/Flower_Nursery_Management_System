<?php

error_reporting(E_PARSE | E_ERROR);

$active='Shop';
include("includes/header.php");

?>

<!DOCTYPE html>
<html>
<body>

   <div id="content">

    <div class="container">

      <div class="col-md-12">

         <?php

   include("includes/sidebar3.php");

   ?>
        
      </div>

      <div class="col-md-12">

        <?php

        if(!isset($_GET['p_cat'])){

          if(!isset($_GET['cat'])){

        echo "

        <div>

          <h3></h3>
          
        </div>

        ";

      }

        }

        ?>

        <div id="content1" class="container">

        <div class="row">

          <?php

          if(!isset($_GET['p_cat'])){

          if(!isset($_GET['cat'])){

            $per_page = 8;

            if(isset($_GET['page'])){

              $page = $_GET['page'];

            }

              else{

                $page = 1;

              }

              $start_from = ($page-1) * $per_page;

              $get_products = "select * from products order by 1 DESC LIMIT $start_from , $per_page";

              $run_products = mysqli_query($con,$get_products);

              while($row_products = mysqli_fetch_array($run_products)){

                $pro_id = $row_products['product_id'];

                $pro_title = $row_products['product_title'];

                $pro_price = $row_products['product_price'];

                $pro_img1 = $row_products['product_img1'];

                echo "

                <div class='col-md-4 col-sm-6 center-responsive single'>

                <div class='product'>

                <a href='details.php?pro_id=$pro_id'>

                <img class='img-responsive' src='admin/product_images/$pro_img1'>

                </a>

                <div class='text'>

                <h3>

                <a href='details.php?pro_id=$pro_id'> $pro_title </a>

                </h3>

                <p class='price'>

                Rs. $pro_price (Per Flower)

                </p>

                <p class='button'>

                <a class='btn btn-danger' href='details.php?pro_id=$pro_id'>

                View details

                </a>

                <a class='btn btn-warning' href='details.php?pro_id=$pro_id'>

                <i class='fa fa-shooping-cart'></i> Add to Cart

                </a>

                </p>

                </div>

                </div>

                </div>

                ";
            }

            ?>
          
        </div>

        <center>
          
          <ul class="pagination">

            <?php

            $query = "select * from products";

            $result = mysqli_query($con,$query);

            $total_records = mysqli_num_rows($result);

            $total_pages = ceil($total_records / $per_page);

            echo "

            <li>

            <a href='shop.php?page=1'> ".'First Page'." </a>

            </li>

            ";

            for($i=1; $i<=$total_pages; $i++){

              echo "

              <li>

              <a href='shop.php?page=".$i."'> ".$i." </a>

            </li>

              ";

            };

            echo "

            <li>

            <a href='shop.php?page=$total_pages'> ".'Last Page'." </a>

            </li>

            ";

            }

          }

          ?>
            
          </ul>

        </center>

        <div id="content1" class="container">

        <div class="row">

          <?php

           getpcatpro(); 

           getcatpro();

           ?>

         </div>

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