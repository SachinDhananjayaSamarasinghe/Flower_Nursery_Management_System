<div style="border: 1px solid #eaeaea;margin: 40px;">
</div>
<div style="width: 100%; background: #e7e7e7; padding: 4%; padding-top: 35px; padding-bottom: 5px; font-family: Verdana, Sans-Serif">
<div class="row">
<div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12">
<img style="height: 50px;" class="img img-responsive" src="images/site3.png" alt="logo" title="Kandurata Flower Nursery" />
<br />
<p>Kandurata Flower Nursery,</p>
<p>Nuwara Eliya,</p>
<p>Sri Lanka.</p>
<br>
<p>+94717854210</p>
<p>kdflowers@gmail.com</p>
<br>
</div>


<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-12">
<p style="margin-bottom: 0%;font-size: large;">User</p>
<br />
<p>
<?php 

           if(!isset($_SESSION['customer_email'])){

            echo "<a class='text-muted' style='text-decoration: none;' href='checkout.php'>Login</a>";

           } else{

            echo"<a class='text-muted' style='text-decoration: none;' href='customer/my_account.php?my_orders'>My Account</a>";

           }

    ?>
</p>
<p>
<a class="text-muted" style="text-decoration: none;" href="customer_register.php">Register</a>
</p>
</div>

<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-12">
<p style="margin-bottom: 0%;font-size: large; margin-left: -25px;">Social Media</p>
<br/>
<p class="social">
<a href="#" class="fa fa-facebook"></a>
</p>
<p class="social">
<a href="#" class="fa fa-instagram"></a>
 </p>
<p class="social">
<a href="#" class="fa fa-twitter"></a>
</p>
</div>

<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12" style="position: relative">
<p style="margin-bottom: 0%;font-size: large">
News Letter

</p>
<br />
<p class="text-muted" style="margin-bottom: 0%;text-align: justify">We offer the best and most delectable range of flowers
 by our own nurseries with years of experience in the industry
and comes with the
guarantee of best quality products and true value for money.</p>
</div>
</div>
</div>
<div class="" style="width: 100%;height: 60px;background: #9a38a8">
</div>