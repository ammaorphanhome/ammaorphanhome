<?php ob_start(); error_reporting(0);

require "cw_admin/lib/config.php";
extract($_POST);
extract($_GET);

if(isset($_POST) && $_POST['submit']=='Donate') {
    
    
    $filename = $_FILES['image']['name'];
	if(!empty($filename)) {
	$image = time().$filename;
	move_uploaded_file($_FILES['image']['tmp_name'],"adminupload/".$image); 
	
	}
	//echo "INSERT INTO `orders`(`name`,`email`,`price`,`image`) VALUES ('$name','$email','$amount','$image')";exit;
	
 $sth = $db->query("INSERT INTO `orders`(`name`,`email`,`price`,`image`,`note`,`mobile`) VALUES ('$name','$email','$amount','$image','$msg','$mobile')");

 $insid = $db->lastInsertId();

	if($sth==true)
	{ ?>
	<script type="text/javascript">
			//alert('Data Successfully Inserted');
			window.location="payment.php?oid=<?php echo $insid;?>";
			</script>
	<?php }  else { ?>
	<script type="text/javascript">
			alert('Please try Again');
			window.location="donate.php";
			</script>
	<?php } 
}   
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
                <h1 class="probootstrap-heading probootstrap-animate" style="font-size: 50px;">Donate Now</h1>
              </div>
            </div>
          </div>
        </div>
      </section>
<section class="probootstrap-section">
        <div class="container">
          <div class="row">
          <div class="col-md-5 probootstrap-animate">
            <form action="" method="post" enctype="multipart/form-data" class="probootstrap-form">
              <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="eg. John Doe">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="eg. info@uicookies.com">
              </div>
              
              <div class="form-group">
                <label for="email">Phone</label>
                <input type="text" class="form-control"  maxlength="10" pattern="^\d{10}$" id="email" name="mobile" placeholder="eg. 9999999999">
              </div>
              
              
              <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" placeholder="$1000.00">
              </div>
			  
			  <div class="form-group">
                <label for="amount">Upload Donar Photo</label>
                <input type="file" class="form-control" id="amount" name="image">
              </div>
			  
              <div class="form-group">
                <label for="message">Note</label>
                <textarea cols="30" rows="5" class="form-control" id="message" name="msg" placeholder="eg. This donation is for the children who needs food."></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit" value="Donate">
              </div>
            </form>
          </div>
		  
		  
          <div class="col-md-4 col-md-push-1 probootstrap-animate">
            
			<h3>Account Details : -</h3>
<p><b>Bank Name : Karur Vysya Bank <br>
Account Name : Amma Anadha Sharanalayam <br>
Account No : 4810115000000166 <br>
Branch : Ganesh Basthi Kothagudem, <br>
IFSC : KVBL0004810 <br><br>
Mr.Teja (Founder): 8790782983</b>
</p>
			
			
			
			<img src="img/donate.png" class="img-responsive"/>
			
			
          </div>
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