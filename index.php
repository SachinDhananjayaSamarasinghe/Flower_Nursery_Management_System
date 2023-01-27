<?php

 $active='Home';
include("includes/header.php");

?>

<!DOCTYPE html>
<html>
<body>

<div class="container" id="slider">

   <div class="col-md-3">

         <?php

   include("includes/sidebar.php");

   ?>
        
      </div>



      <div class="col-md-8" style="margin-top: 35px;">

         <?php

   include("includes/sidebar2.php");

   ?>
        
      </div>

   	<div class="col-md-8" style="margin-top: 50px; height: 250">

   		<div class="carousel slide" id="myCarousel" data-ride="carousel">

   			<ol class="carousel-indicators">

   				<li class="active" data-target="#myCarousel" data-slide-to="0"></li>
   				<li data-target="#myCarousel" data-slide-to="1"></li>
   				<li data-target="#myCarousel" data-slide-to="2"></li>
   				<li data-target="#myCarousel" data-slide-to="3"></li>
   				
   			</ol>

   			<div class="carousel-inner">

   				<?php

   				$get_slides = "select * from slider LIMIT 0,1";

   				$run_slides = mysqli_query($con,$get_slides);

   				while ($row_slides = mysqli_fetch_array($run_slides)) {

   					$slide_name = $row_slides['slide_name'];
   					$slide_image = $row_slides['slide_image'];

   					echo "

   					<div class='item active'>

   					<img src='admin/slides_images/$slide_image'>

   					</div>

   					";
   				}

   				$get_slides = "select * from slider LIMIT 1,3";

   				$run_slides = mysqli_query($con,$get_slides);

   				while ($row_slides = mysqli_fetch_array($run_slides)) {

   					$slide_name = $row_slides['slide_name'];
   					$slide_image = $row_slides['slide_image'];

   					echo "

   					<div class='item'>

   					<img src='admin/slides_images/$slide_image'>

   					</div>

   					";
   				}

   				?>
   				
   			</div>

   			<a href="#myCarousel" class="left carousel-control" data-slide="prev">
   				
   				<span class="glyphicon glyphicon-chevron-left"></span>
   				<span class="sr-only">Previous</span>

   			</a>

   			<a href="#myCarousel" class="right carousel-control" data-slide="next">
   				
   				<span class="glyphicon glyphicon-chevron-right"></span>
   				<span class="sr-only">Next</span>

   			</a>
   			
   		</div>
   		
   	</div>

   </div>

      <br><br>

   <div class="testimonials page_section">
      <div class="testimonials_background_container prlx_parent">
         <div class="testimonials_background prlx" style="background-image:url(images/flower2.jpg)"></div>
      </div>
      <div class="container">

         <div class="row">
            <div class="col">
               <div class="section_title text-center">
                  <h1>A BIT FROM US</h1>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-lg-10 offset-lg-1">
               
               <div >               
                  <div class="owl-carousel  testimonials_slider">                
                     <div class="owl-item">
                        <div class="testimonials_item text-center">
                           <div class="quote" style="margin-left: 180px;">“</div>
                           <p class="testimonials_text" style="margin-left: 165px;">Kandurata flower nursery is a huge flower nursery in Nuwara Eliya district.<br>
                           In this nursery provide different types of flowers for there customers. Some types of flowers are differnt types of Roses, Anthurium, Dahlias, different types of Lily, African Daisy. Customers oreder these types of flowers in occations of Aniversary, Weddings, Birthdays, Congratulations, Love and Romans and Chritsmas.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

<br><br><br>

   <div id="hot">

   	<div class="box2">

   		<div class="container">

   			<div class="col-md-12">

   				<h2>
   					Shop With Us
   				</h2>
   				
   			</div>
   			
   		</div>
   		
   	</div>
   	
   </div>
   
   <br>

   <div style="text-align: center;">

      <div style="margin: 2%;width: 80%;margin-left: 5%;margin-left: 10%;">

      <div class="row option">

      <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12">
      <div style="height: 75%;text-align: center;">
      <img style="height: 48px" src="images/lorry1.jpg" alt="delivery icon" title="Island wide Delivery" />
      <p style="font-size: large;">Island wide Delivery</p>
      <p style="font-size: small"> Same Day Delivery & Express Delivery is available for
      selected products & Regions</p>
      </div>
      </div>

      <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 ">
      <div style="height: 75%;text-align: center;">
      <img style="height: 48px" src="images/card.png" alt="payment icon" title="Multiple Payment Options" />
      <p style="font-size: large;">Multiple Payment Options</p>
      <p style="font-size: small"> Bank Transfer, Cash Deposit & Cash on
       Delivery is available</p>
      </div>
      </div>

      <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 ">
      <div style="height: 75%;text-align: center;">
      <img style="height: 48px" src="images/shield1.png" alt="secure payment icon" title="Secured Payments" />
      <p style="font-size: large;">Secured Payments</p>
      <p style="font-size: small"> Payments are secured by Commercial Bank, Sampath Bank &
      Nations Trust Bank</p>
      </div>
      </div>

      <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 ">
      <div style="height: 75%;text-align: center;">
      <img style="height: 48px" src="images/network1.png" alt="network icon" title="Branch Network" />
      <p style="font-size: large;">Branch Network</p>
      <p style="font-size: small"> Nuwara Eliya, Kandy
      </p>
      </div>
      </div>
      
      </div>
      </div>
   </div>

   <?php

   include("includes/footer1.php");

   ?>

	<script src="js/jquery-331.min.js"></script>
	<script src="js/bootstrap-337.min.js"></script>
</body>
</html>