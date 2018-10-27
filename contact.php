<?php
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST"){


$name=$_POST[name];	
$email=$_POST[email];	
$sub=$_POST[subj];	
$msg=$_POST[msg];	
	
	
	
$stremail = "info@ammaorphanhome.org";
$to = $stremail;    
$subject = "Contact-us form details";    
$message = " 
<html> 
<body>
   <table style='border: 2px solid #06F;padding:10px;border-radius:10px;'>
	  <tr>
		  <td width='500'>
			  <div class='maindiv'>
				 
				 <p>Hi, your requested details are,</p>
				 <p>Name          : ".ucfirst($name)."</p>
				 <p>Email         : $email </p>
				 <p>Subject 	  : $sub </p>
				 <p>Message      : $msg </p>
				 
			  </div>
		  </td>
	  </tr>
  </table>
</body>
</html>";

$headers .= "From:ammaorphanhome.org<no-reply@info@ammaorphanhome.org>\r\n"; 			
$headers .= "Content-type: text/html\r\n";	
//echo $message;exit;		
if(mail($to, $subject, $message, $headers)){
	
	echo "<script>alert('Thank you, Our incharge will contact you soon');window.location='contact.php';</script>";

	} else {
	
	echo "<script>alert('Sorry...please try again');window.location='contact.php';</script>";
}	
				
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

    <script src="js/highlight.js"></script>
  </head>
  <body>

    
      <?php include('nav.php');?>
      
       <!--<section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(img/hero_bg_bw_3.jpg)"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn" style="padding-top: 160px;">
                <h1 class="probootstrap-heading probootstrap-animate" style="font-size: 50px;">Contact Us</h1>
              </div>
            </div>
          </div>
        </div>
      </section>-->

      <section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(img/hero_bg_bw_1.jpg)"  data-stellar-background-ratio="0.5">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                          <h1 class="probootstrap-heading probootstrap-animate">Contact Us <span>Together we can make a difference</span></h1>
                      </div>
                  </div>
              </div>
          </div>
      </section>

<section class="probootstrap-section">
        <div class="container">
          <div class="row">
          <div class="col-md-5 probootstrap-animate">
		  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="probootstrap-form">  
		  
          
              <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subj" required>
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea cols="30" rows="10" class="form-control" id="message" name="msg"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-lg" id="submit" name="sub" value="Send Message">
              </div>
            </form>
			
			
			
          </div>
          <div class="col-md-6 col-md-push-1 probootstrap-animate">
            
            
            <h4>Address</h4>
            <ul class="probootstrap-contact-info">
              <li><i class="icon-pin"></i> <span><b>Amma Orphanage</b><br>	#4-133, Hemachandrapuram, Karukonda Gram Panchayat, Kothagudem, Telangana, India.</span></li>
              <li><i class="icon-email"></i><span>info@ammaorphanhome.org</span></li>
              <li><i class="icon-phone"></i><span> +91 87907 82983</span></li>
            </ul>

			<div class="clearfix">&nbsp;</div>
          
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d121747.16400080919!2d80.545156332736!3d17.526651455912013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a3410a556a5bd1d%3A0x9716a9866e772f09!2sKothagudem%2C+Telangana!5e0!3m2!1sen!2sin!4v1537863488574" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
        </div>
      </section>


    <?php include('footer.php');?>

    <script src="js/scripts.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/custom.js"></script>

  </body>
</html>