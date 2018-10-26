<?php //print_r($_GET);
require "cw_admin/lib/config.php";
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

        <section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(img/hero_bg_bw_1.jpg)"  data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                            <h1 class="probootstrap-heading probootstrap-animate">Donate <span>Together we can make a difference</span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="probootstrap-section">
            <div class="container">
                <?php //print_r($_GET);

                $pay_id=$_REQUEST['payment_id'];
                $req=$_REQUEST['payment_request_id'];
                //print_r($_REQUEST);
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payments/'.$pay_id.'/');
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:test_5f4292c874a5f602a115c0aa965",
                        "X-Auth-Token:test_7aac381962a51a81aae0776e7c7"));

                $response = curl_exec($ch);
                curl_close($ch);
                $json=json_decode($response,TRUE);

                if($json['success']==true){
                    $payment=$json['payment'];
                    $data =$db->query("UPDATE orders SET payment_id='".$_REQUEST['payment_id']."', date='".$payment['created_at']."' ,payment_request_id='".$_REQUEST['payment_request_id']."', payment_status='".$payment['status']."' WHERE guid='".$_GET['order_id']."'") or die(mysql_error());
                    ?>
                    <div class="row">
                        <div class="col-md-5 probootstrap-animate">
                            <form action="" method="post" enctype="multipart/form-data" class="probootstrap-form">
                                <div class="form-group">
                                    <p><b>Your donation is successful, It means lot to us, Thank you!</b></p>
                                </div>
                                <div class="form-group">
                                    <label for="paymentId">Payment ID: </label>
                                    <span><?php echo $pay_id;?></span>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name of the Donar: </label>
                                    <span><?php echo $payment['buyer_name'];?></span>
                                </div>
                                <div class="form-group">
                                    <label for="amount">Amount: </label>
                                    <span><?php echo $payment['amount'];?></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email: </label>
                                    <span><?php echo $payment['buyer_email'];?></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Phone: </label>
                                    <span><?php echo $payment['buyer_phone'];?></span>
                                </div>
                            </form>
                        </div>
                <?php
                } else{
                    echo "payment failed";
                    $data = $db->query("UPDATE orders SET payment_id='".$_REQUEST['payment_id']."', date='".$payment['created_at']."',  payment_request_id='".$_REQUEST['payment_request_id']."', payment_status='".$payment['status']."'  WHERE guid='".$_GET['order_id']."'") or die(mysql_error());
                    ?>
                    <div class="row">
                        <div class="col-md-5 probootstrap-animate">
                            <form action="" method="post" enctype="multipart/form-data" class="probootstrap-form">
                                <div class="form-group">
                                    <p>Your Payment is Failed, Sorry, Please try again!</p>
                                </div> <br>

                                <div class="form-group">
                                    <label for="name">Following are you payment details:</label>
                                </div>
                                <div class="form-group">
                                    <label for="name">Payment ID: </label>
                                    <span><?php echo $pay_id;?></span>
                                </div>
                                <div class="form-group">
                                    <label for="name">Reason for failure: </label>
                                    <span><?php echo $payment['Failure'].reason;?></span>
                                </div>
                                <div class="form-group">
                                    <label for="amount">Message : </label>
                                    <span><?php echo $payment['Failure'].message;?></span>
                                </div>
                            </form>
                        </div>
                <?php
                }
                ?>
                    <div class="col-md-4 col-md-push-1 probootstrap-animate">
                        <img src="img/thank_you_donate.jpg" class="img-responsive"/> <br/>
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







