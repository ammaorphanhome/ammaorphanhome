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

    <script src="js/highlight.js"></script>
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




     <?php include('footer.php');?>

<script src="js/scripts.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/custom.js"></script>

    
  </body>
</html>