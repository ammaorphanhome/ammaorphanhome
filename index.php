<?php ob_start(); error_reporting(0);require "cw_admin/lib/config.php";?><!DOCTYPE php><php lang="en"><meta http-equiv="content-type" content="text/php;charset=UTF-8" /><head>    <meta charset="utf-8">    <meta name="viewport" content="width=device-width, initial-scale=1">    <title>Amma Orphanage :: Yours Amma Anadha Sharanalayam</title>    <meta name="description" content="">    <meta name="keywords" content="">        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Montserrat:300,400,700,900" rel="stylesheet">    <link rel="stylesheet" href="css/styles-merged.css">    <link rel="stylesheet" href="css/style.min.css">    <link rel="stylesheet" href="css/custom.css">    <script src="js/highlight.js"></script>  </head>  <body >    <?php include('nav.php');?>      <section class="probootstrap-hero" style="background-image: url(img/hero_bg_bw_1.jpg)"  data-stellar-background-ratio="0.5">        <div class="container">          <div class="row">            <div class="col-md-12">              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">                <h1 class="probootstrap-heading probootstrap-animate">Donate <span>Together we can make a difference</span></h1>                <p class="probootstrap-animate"><a href="donate.php" class="btn btn-primary btn-lg">Donate Now</a></p>              </div>            </div>          </div>        </div>        <div class="probootstrap-service-intro">          <div class="container">            <div class="probootstrap-service-intro-flex">              <div class="item probootstrap-animate" data-animate-effect="fadeIn">                <div class="icon">                  <i class="icon-wallet"></i>                </div>                <div class="text">                  <h2>Donations</h2>                  <p>Donate for a cause and make difference with your donation.</p>                  <p><a href="donate.php">View</a></p>                </div>              </div>              <div class="item probootstrap-animate" data-animate-effect="fadeIn">                <div class="icon">                  <i class="icon-heart"></i>                </div>                <div class="text">                  <h2>Sponsor a child</h2>                  <p>Sponsor and change the world for a child</p>                  <p><a href="contact.php">View</a></p>                </div>              </div>              <div class="item probootstrap-animate" data-animate-effect="fadeIn">                <div class="icon">                  <i class="icon-genius"></i>                </div>                <div class="text">                  <h2>Become Volunteer</h2>                  <p>Be part of amma home, Your support means so much to us.</p>                  <p><a href="contact.php">View</a></p>                </div>              </div>            </div>          </div>        </div>      </section>      <section class="probootstrap-section" style="padding-bottom:0px;">        <div class="container">          <div class="row">            <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">              <h2>Most Popular Causes</h2>            </div>          </div>          <div class="row">            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate" data-animate-effect="fadeIn">              <div class="probootstrap-image-text-block probootstrap-cause">                <figure>                  <img src="img/food_help.jpg"  class="img-responsive">                </figure>                <div class="probootstrap-cause-inner">                    <h2><a href="#">Help Children To Get Food</a></h2>                  <p>Feed the children to end childhood hunger. It's the cause upon which we were founded and the one we continue to fight each day.</p>                  <p><a href="causes.php" class="btn btn-primary btn-black">View Details!</a></p>                </div>              </div>            </div>            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate" data-animate-effect="fadeIn">              <div class="probootstrap-image-text-block  probootstrap-cause">                <figure>                  <img src="img/get_education.jpg" class="img-responsive">                </figure>                <div class="probootstrap-cause-inner">                    <h2><a href="#">Help Children To Get Education</a></h2>                    <p>Education is the only way we can help these kids to develop in their life. We provide good quality education to all our children to achevie thier goals in life and be a better person.</p>                  <p><a href="causes.php" class="btn btn-primary btn-black">View Details!</a></p>                </div>              </div>            </div>            <div class="clearfix visible-sm-block visible-xs-block"></div>            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate" data-animate-effect="fadeIn">              <div class="probootstrap-image-text-block  probootstrap-cause">                <figure>                  <img src="img/childern_health.jpg" class="img-responsive">                </figure>                <div class="probootstrap-cause-inner">                    <h2><a href="#">Help Children To Get Health</a></h2>                    <p>Good heath is very imporant to groom the children physically and mentally  . We give high priority to the health of all our kids and provide hygiene enviroment.</p>                  <p><a href="causes.php" class="btn btn-primary btn-black">View Details!</a></p>                </div>              </div>            </div>          </div>          <div class="row">            <div class="col-md-12">              <p><a href="projects.php">See all Projects</a></p>            </div>          </div>        </div>      </section>                <section class="probootstrap-section probootstrap-bg probootstrap-section-dark" style="background-image: url(img/hero_bg_bw_2.jpg)"  data-stellar-background-ratio="0.5">        <div class="container">          <div class="row">            <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">              <h2>Latest Donations</h2>              <p class="lead">Thank you for your kind donations. Your generosity will directly benefit the children of Amma Orphan Home.</p>            </div>          </div>          <div class="row">              <?php              $sth = $db->query ("SELECT * FROM `orders` where `guid` >= 74 and payment_status = 'Credit' and  location = 'Yes' ORDER BY `guid` DESC  limit 4");              $count = $sth->rowCount();                if($count > 0) {                    $m = 1;                    while($row = $sth->fetch()) {                        ?>                        <div class="col-md-3">                            <div class="probootstrap-donors text-center probootstrap-animate fadeInUp probootstrap-animated">                                <figure class="media">                                    <?php  if (empty($row[image])){  ?>                                        <img src="img/person_6.jpg" class="img-responsive">                                    <?php  } else {  ?>                                        <img src="adminupload/<?php echo $row[image];?>" class="img-responsive">                                    <?php  }  ?>                                </figure>                                <div class="text">                                    <h3><?php echo $row[name]; ?></h3>                                    <p class="donated">Donated <span class="money">₹<?php echo $row[price]; ?>/-</span></p>                                </div>                            </div>                        </div>              <?php $m++; } } ?>          </div>        </div>      </section>            <section class="probootstrap-section  probootstrap-section-colored">        <div class="container">          <div class="row">            <div class="col-md-12 text-center section-heading probootstrap-animate">              <h2>What Our Well Wishers Says</h2>              <p class="lead">Our sponsors, donors and well wishers are the backbone to Amma Orphan Home, Here are the few words from our well wishers.</p>            </div>          </div>          <div class="row">            <div class="col-md-12 probootstrap-animate">              <div class="owl-carousel owl-carousel-testimony owl-carousel-fullwidth">                <div class="item">                  <div class="probootstrap-testimony-wrap text-center">                    <figure>                      <img src="img/wel_wisher_1.jpg" alt="Gallery">                    </figure>                    <blockquote class="quote">&ldquo;I visited Amma orphan home few days back, such an amazing place for kids who needs love and care.  And the kids are just brilliant with lots of talents, I like their discipline and the way they help each other.   I feel like all they need is support from community to grow stronger and achieve their goals in life.&rdquo; <cite class="author"> &mdash; <span>Narendra Sripada</span></cite></blockquote>                  </div>                </div>                <div class="item">                  <div class="probootstrap-testimony-wrap text-center">                    <figure>                      <img src="img/wel_wisher_2.jpg" alt="Gallery">                    </figure>                    <blockquote class="quote">&ldquo;A place where orphans nourish with proper nutrition and education. Selfless service and honest is their strength. I recommend go and visit once.If you can't feed a hundred people, then feed just one.&rdquo; <cite class="author"> &mdash;<span>Harish Dubaguntla</span></cite></blockquote>                  </div>                </div>                <div class="item">                  <div class="probootstrap-testimony-wrap text-center">                    <figure>                      <img src="img/wel_wisher_3.jpg" alt="Gallery">                    </figure>                    <blockquote class="quote">&ldquo;I heard so many good words about Amma Orphan Home. After I have started my journey with foundation I realized Charity sees the need, not the cause.&rdquo; <cite class="author">&mdash; <span>Venkat Sadineni</span></cite></blockquote>                  </div>                </div>              </div>            </div>          </div>        </div>      </section>	  	   <section class="probootstrap-half">        <div class="image">          <div class="image-bg">            <img src="img/img_sq_5_big.jpg">          </div>        </div>        <div class="text">          <div class="probootstrap-animate">            <h3>SUCESS STORIES</h3>            <p align="justify">Amma Orphanage, Known as the "Amma Anadha Saranalayam" is a non profit organisation Founded by Mr. E. Teja with the objective to provide solution to the orphans. This is to be achieved by providing them with free basic school education, healthy home atmosphere, guiding these children towards understanding the need for healthy living and secure a place for them among the rest of the society.			<br><br>			The motto encourages us in working towards promoting "Universal Brotherhood" and creating wellness in physical-mental-spiritual areas for all children under its care in school and orphanage.</p>            <p><a href="about.php" class="btn btn-primary btn-lg">Read More</a></p>          </div>        </div>      </section>     <section class="probootstrap-section">        <div class="container">          <div class="row">            <div class="col-md-3 probootstrap-animate">              <h3>News and Events </h3>              <ul class="probootstrap-news">                <li>                  <span class="probootstrap-date">Sep 25, 2018</span>                  <h3><a href="news_events.php">Picnic and Fun at Park</a></h3>                  <p>Today we all went to a Kothagudem Rudrampor park, there the kids had a lot of fun.</p>                </li>                <li>                  <span class="probootstrap-date">Sep 15, 2017</span>                  <h3><a href="news_events.php">Medical camp at Amma Home</a></h3>                  <p>Respected DMHO arranged a medical camp at our Amma Home and took blood samples for blood tests.</p>                </li>              </ul>              <p><a href="news_events.php" class="btn btn-primary">View all news</a></p>            </div>            <div class="col-md-7 col-md-offset-2 probootstrap-animate">              <h3>Gallery</h3>                <div class="owl-carousel owl-carousel-fullwidth">                    <div class="item">                        <a href="img/gal_1.jpg" class="image-popup">                            <img src="img/save_girl1.jpg" alt="Gallery" class="img-responsive">                        </a>                    </div>                    <div class="item">                        <a href="img/gal_2.jpg" class="image-popup">                            <img src="img/gal_2.jpg" alt="Gallery" class="img-responsive">                        </a>                    </div>                    <div class="item">                        <a href="img/gal_3.jpg" class="image-popup">                            <img src="img/gal_3.jpg" alt="Gallery" class="img-responsive">                        </a>                    </div>                    <div class="item">                        <a href="img/gal_4.jpg" class="image-popup">                            <img src="img/gal_4.jpg" alt="Gallery" class="img-responsive">                        </a>                    </div>                    <div class="item">                        <a href="img/gal_5.jpg" class="image-popup">                            <img src="img/gal_5.jpg" alt="Gallery" class="img-responsive">                        </a>                    </div>                    <div class="item">                        <a href="img/gal_6.jpg" class="image-popup">                            <img src="img/gal_5.jpg" alt="Gallery" class="img-responsive">                        </a>                    </div>                    <div class="item">                        <a href="img/gal_6.jpg" class="image-popup">                            <img src="img/gal_5.jpg" alt="Gallery" class="img-responsive">                        </a>                    </div>                    <div class="item">                        <a href="img/gal_7.jpg" class="image-popup">                            <img src="img/gal_5.jpg" alt="Gallery" class="img-responsive">                        </a>                    </div>                    <div class="item">                        <a href="img/gal_8.jpg" class="image-popup">                            <img src="img/gal_8.jpg" alt="Gallery" class="img-responsive">                        </a>                    </div>                </div>              <p class="text-center"><a href="photos.php" class="btn btn-primary">View all gallery</a></p>            </div>            </div>          </div>        </div>      </section>    <?php include('footer.php');?>    <script src="js/scripts.min.js"></script>    <script src="js/main.min.js"></script>    <script src="js/custom.js"></script>  </body></php>