<?php ob_start(); error_reporting(0);
require "cw_admin/lib/config.php";

?>

<!DOCTYPE html>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amma Orphan Home :: Yours Amma Anadha Sharanalayam</title>
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
                    <h1 class="probootstrap-heading probootstrap-animate">Latest Donations <span>Together we can make a difference</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="probootstrap-section">
    <div class="container">
        <div class="col-md-12">
            <div><!--a href="ysa.php?action=add" class="btn btn-success"><i class="fa fa-lg fa-plus"></i>Add New</a--><!-- <a href="ysa.php?action=edit" class="btn btn-info btn-flat"><i class="fa fa-lg fa-edit"></i></a><a href="#" class="btn btn-warning btn-flat"><i class="fa fa-lg fa-trash"></i></a>--></div>
            <?php
            $sth = $db->query ("SELECT * FROM `orders` where `guid` >= 100 and payment_status = 'Credit' ORDER BY `guid` DESC");
            $count = $sth->rowCount(); ?>
            <div class="card">
                <div class="card-body">
                    <table id="sampleTable" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Donated On</th>
                                <th>Note</th>
                                <th>Donar Photo</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        if($count > 0) {
                            $m = 1;
                            while($row = $sth->fetch()) {
                                ?>
                                <tr>
                                    <td><?php echo $m; ?></td>
                                    <td><?php echo $row[name];?> </td>
                                    <td><?php echo $row[price]; ?></td>
                                    <td><?php echo $row[date]; ?></td>
                                    <td><?php echo $row[note]; ?></td>

                                    <?php  if (empty($row[image])){  ?>
                                        <td></td>
                                    <?php  } else {  ?>
                                        <td><img src="adminupload/<?php echo $row[image];?>" style="width:150px;height:150px"></td>
                                    <?php  }  ?>
                                </tr>
                                <?php $m++; } } ?>
                        </tbody>
                    </table>
                </div>
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