<?php ob_start(); error_reporting(0);

require "cw_admin/lib/config.php";
extract($_POST);
extract($_GET);

$id=$_POST[id];



?>



<!DOCTYPE html>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amma Orphanage :: Yours Amma Anadha Sharanalayam</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Montserrat:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    
     <?php include('nav.php');?>
      
       <section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(img/hero_bg_bw_3.jpg)"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn" style="padding-top: 160px;">
                <h1 class="probootstrap-heading probootstrap-animate" style="font-size: 50px;"><?php 
				
				 $sth = $db->query ("SELECT * FROM `past_conferences` where `guid`='$id'")->fetch();
				 
				 echo $sth[name];
				
				?></h1>
              </div>
            </div>
          </div>
        </div>
      </section>

       <section class="probootstrap-section">
        <div class="container">
          <div class="row probootstrap-gutter10">
		  
		  <?php $m=1;
				
			 $sth = $db->query ("SELECT * FROM `album`  WHERE id='$id'");
			 $count = $sth->rowCount();
			 if($count==0){
			 ?>
		  
		  <div class="col-md-12 col-sm-12 col-xs-12 gal-item probootstrap-animate">
             <h1> <a href="photos.php">No Images Here Coming soon..Back to gallery</i></a></h1>
            </div>
			 <?php } else {
				 
				 
				  while($row = $sth->fetch()) {
				 ?>
			
			<div class="col-md-3 col-sm-4 col-xs-6 gal-item probootstrap-animate">
              <a href="adminupload/<?php echo $row[image];?>" class="image-popup">
			  <img src="adminupload/<?php echo $row[image];?>" alt="image" class="img-responsive" style="width:300px;height:200px">
			  </a>
            </div>
			
			 <?php }  }?>
          </div>
        </div>
      </section>

	  
	  

      <footer class="probootstrap-footer probootstrap-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-4 probootstrap-animate">
              <div class="probootstrap-footer-widget">
                <h3>About Us</h3>
                <p>Amma Orphanage, Known as the "Amma Anadha Saranalayam" is a non profit organisation Founded by Mr. E. Teja with the objective to provide solution to the orphans.</p>
                <ul class="probootstrap-footer-social">
                  <li><a href="#"><i class="icon-twitter"></i></a></li>
                  <li><a href="#"><i class="icon-facebook"></i></a></li>
                  <li><a href="#"><i class="icon-linkedin"></i></a></li>
                  <li><a href="#"><i class="icon-youtube"></i></a></li>
                </ul>
              </div>
            </div>
           
            <div class="col-md-4 probootstrap-animate">
              <div class="probootstrap-footer-widget">
                <h3>Contact Info</h3>
                <ul class="probootstrap-contact-info">
                  <li><i class="icon-location2"></i> <span> #4-133, Hemachandrapuram, 
Karukonda Gram Panchayat, 
Kothagudem, Telangana, 
India.</span></li>
                  <li><i class="icon-mail"></i><span><a href="#" class="__cf_email__"> info@ammaorphanhome.org</a></span></li>
                  <li><i class="icon-phone2"></i><span> +91 87907 82983</span></li>
                </ul>
                
              </div>
            </div>

            <div class="col-md-4 probootstrap-animate">
              <div class="probootstrap-footer-widget">
                <h3>Location</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d121747.16400080919!2d80.545156332736!3d17.526651455912013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a3410a556a5bd1d%3A0x9716a9866e772f09!2sKothagudem%2C+Telangana!5e0!3m2!1sen!2sin!4v1537863488574" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
           
          </div>
          <!-- END row -->
          
        </div>

        <div class="probootstrap-copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-8 text-left">
                <p>&copy; 2018 <a href="#">Amma Orphanage</a>. All Rights Reserved.</p>
              </div>
              <div class="col-md-4 probootstrap-back-to-top">
                <p><a href="#" class="js-backtotop">Back to top <i class="icon-arrow-long-up"></i></a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
<script src="js/scripts.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/custom.js"></script>
    
  </body>
</html>