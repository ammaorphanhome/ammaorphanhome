<?php ob_start();error_reporting(0);require "cw_admin/lib/config.php";?>

	<?php include('comments-functions.php'); ?>
    <!DOCTYPE php>
    <html lang="en">
    <meta http-equiv="content-type" content="text/php;charset=UTF-8" />
    <?php include('header.php'); ?>

 	<style>
        form button { margin: 5px 0px; }
        textarea { display: block; margin-bottom: 10px; }
        /*post*/
        .post { border: 1px solid #C5E0FA; margin-top: 10px; }
        /*comments*/
        .comments-section { margin-top: 10px; border: 1px solid #ccc; }
        .comment { margin-bottom: 10px; }
        .comment .comment-name { font-weight: bold; }
        .comment .comment-date {
            font-style: italic;
            font-size: 0.8em;
        }
        .comment .reply-btn, .edit-btn { font-size: 0.8em; }
        .comment-details { width: 91.5%; float: left; }
        .comment-details p { margin-bottom: 0px; }
        .comment .profile_pic {
            width: 35px;
            height: 35px;
            margin-right: 5px;
            float: left;
            border-radius: 50%;
        }
        /*replies*/
        .reply { margin-left: 30px; }
        .reply_form {
            margin-left: 40px;
            display: none;
        }
        #comment_form { margin-top: 10px; }

        .error {
            font-family: sans-serif;
            color: #E70000;
            font-size: 16px;
        }
    </style>
    
        <body>
            <?php include('nav.php'); ?>
                <section class="probootstrap-hero" style="background-image: url(img/hero_bg_bw_1.jpg)" data-stellar-background-ratio="0.5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                                    <h1 class="probootstrap-heading probootstrap-animate">Amma Orphan Home<span>Together we can make a difference</span>                            </h1> </div>
                            </div>
                        </div>
                    </div>
                    <div class="probootstrap-service-intro">
                        <div class="container">
                            <div class="probootstrap-service-intro-flex">
                                <div class="item probootstrap-animate" data-animate-effect="fadeIn">
                                    <div class="icon"> <i class="icon-wallet"></i> </div>
                                    <div class="text">
                                        <h2>Donations</h2>
                                        <p>Donate for a cause and make difference with your donation.</p>
                                        <p><a href="donate.php">View</a></p>
                                    </div>
                                </div>
                                <div class="item probootstrap-animate" data-animate-effect="fadeIn">
                                    <div class="icon"> <i class="icon-heart"></i> </div>
                                    <div class="text">
                                        <h2>Sponsor a child</h2>
                                        <p>Sponsor and change the world for a child</p>
                                        <p><a href="contact.php">View</a></p>
                                    </div>
                                </div>
                                <div class="item probootstrap-animate" data-animate-effect="fadeIn">
                                    <div class="icon"> <i class="icon-genius"></i> </div>
                                    <div class="text">
                                        <h2>Become Volunteer</h2>
                                        <p>Be part of amma home, Your support means so much to us.</p>
                                        <p><a href="contact.php">View</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            <section class="probootstrap-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 probootstrap-animate" data-animate-effect="fadeIn">
                            <div class=text-center>
                                <h2>Needs of Amma Home </h2>
                            </div>
                            <div class="owl-carousel owl-carousel-fullwidth probootstrap-cause ">
                                <?php
                                $sth1 = $db->query("SELECT * FROM `causes` ORDER BY date DESC limit 10");
                                $count1 = $sth1->rowCount();
                                if ($count1 > 0) {
                                    $m1 = 1;
                                    while ($row1 = $sth1->fetch()) { ?>
                                        <div class="item">
                                            <div class="probootstrap-cause-inner probootstrap-image-text-block">

                                                <?php  if (empty($row1[image])) {
                                                } else { ?>
                                                    <figure> <img class="text-center" src="../adminupload/<?php echo $row1[image];?>" alt="image" class="img-responsive"> </figure>
                                                <?php } ?>
                                                <br>

                                                <?php  if (empty($row1[date])) {
                                                } else {
                                                    $newDate1 = date("F jS, Y", strtotime($row1[date])); ?>
                                                    <span class="probootstrap-date" style="margin-bottom:3px; padding-bottom: 3px;"><?php echo $newDate1; ?></span>
                                                <?php } ?>

                                                <h4><a href="news_events.php"><span style="margin-bottom:10px; padding-bottom: 5px;"><?php echo $row1[title]; ?></span></a></h4>
                                                <span style="margin-bottom:3px; padding-bottom: 3px;"><?php echo $row1[short_description]; ?></span>
                                            </div>
                                        </div>
                                        <?php
                                        $m1++;
                                    }
                                } ?>
                            </div>
                            <p class="text-center"><a href="home-needs.php" class="btn btn-primary">View all</a></p>
                        </div>

                        <div class="col-md-5 col-md-push-1 probootstrap-animate" data-animate-effect="fadeIn">
                            <div class=text-center>
                                <h2>Latest News and Events </h2>
                            </div>
                            <div class="owl-carousel owl-carousel-fullwidth probootstrap-cause">
                                <?php
                                $sth = $db->query("SELECT * FROM `news` ORDER BY date DESC limit 10");
                                $count = $sth->rowCount();
                                if ($count > 0) {
                                    $m = 1;
                                    while ($row = $sth->fetch()) { ?>
                                        <div class="item">
                                            <div class="probootstrap-cause-inner">

                                                <?php  if (empty($row[image])) {
                                                } else { ?>
                                                    <figure> <img class="text-center" src="../adminupload/<?php echo $row[image];?>" alt="image" class="img-responsive"> </figure>
                                                <?php } ?>
                                                <br>

                                                <?php  if (empty($row[date])) {
                                                } else {
                                                    $newDate = date("F jS, Y", strtotime($row[date])); ?>
                                                    <span class="probootstrap-date" style="margin-bottom:3px; padding-bottom: 3px;"><?php echo $newDate; ?></span>
                                                <?php } ?>

                                                <h4><a href="news_events.php"><span style="margin-bottom:10px; padding-bottom: 5px;"><?php echo $row[title]; ?></span></a></h4>
                                                <span style="margin-bottom:3px; padding-bottom: 3px;"><?php echo $row[short_description]; ?></span>
                                            </div>
                                        </div>
                                        <?php
                                        $m++;
                                    }
                                } ?>
                            </div>
                            <p class="text-center"><a href="news_events.php" class="btn btn-primary">View all</a></p>
                        </div>
                    </div>
                </div>
            </section>


                <section class="probootstrap-section probootstrap-bg probootstrap-section-dark" style="background-image: url(img/hero_bg_bw_2.jpg)" data-stellar-background-ratio="0.5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
                                <h2>Latest Donations</h2>
                                <p class="lead">Thank you for your kind donations. Your generosity will directly benefit the children of Amma Orphan Home.</p>
                            </div>
                        </div>
                        <div class="row">
                            <?php                    $sth = $db->query("SELECT * FROM `orders` where `guid` >= 74 and payment_status = 'Credit' and  location = 'Yes' ORDER BY date DESC  limit 4");                    $count = $sth->rowCount();                    if ($count > 0) {                        $m = 1;                        while ($row = $sth->fetch()) {                            ?>
                                <div class="col-md-3">
                                    <div class="probootstrap-donors text-center probootstrap-animate fadeInUp probootstrap-animated">
                                        <figure class="media">
                                        <?php if (!empty($row[image])) { ?>
                                            <img src="../adminupload/<?php echo $row[image];?>" style="width: 80px; height:80px;"  alt="image" class="img-responsive">
                                        <?php } else { ?>
                                            <img src="img/person_6.jpg" style="width: 80px; height:80px;" class="img-responsive">
                                        <?php } ?>

                                        </figure>
                                        <div class="text">
                                            <h3><?php echo $row[name]; ?></h3>
                                            <p class="donated">Donated <span class="money">₹<?php echo $row[price]; ?>/-</span> </p>
                                        </div>
                                    </div>
                                </div>
                                <?php $m++;
                            } } ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><a href="donations.php">See All Donations</a></p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="probootstrap-section" style="color: #EEEEEE" ; padding-bottom:0px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
                                <h2>Most Popular Causes</h2> </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate" data-animate-effect="fadeIn">
                                <div class="probootstrap-image-text-block probootstrap-cause">
                                    <figure> <img src="img/food_help.jpg" class="img-responsive"> </figure>
                                    <div class="probootstrap-cause-inner">
                                        <h2><a href="#">Help Children To Get Food</a></h2>
                                        <p>Feed the children to end childhood hunger. It's the cause upon which we were founded and the one we continue to fight each day.</p>
                                        <p><a href="causes.php" class="btn btn-primary btn-black">View Details!</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate" data-animate-effect="fadeIn">
                                <div class="probootstrap-image-text-block  probootstrap-cause">
                                    <figure> <img src="img/get_education.jpg" class="img-responsive"> </figure>
                                    <div class="probootstrap-cause-inner">
                                        <h2><a href="#">Help Children To Get Education</a></h2>
                                        <p>Education is the only way we can help these kids to develop in their life. We provide good quality education to all our children to achevie thier goals in life and be a better person.</p>
                                        <p><a href="causes.php" class="btn btn-primary btn-black">View Details!</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix visible-sm-block visible-xs-block"></div>
                            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate" data-animate-effect="fadeIn">
                                <div class="probootstrap-image-text-block  probootstrap-cause">
                                    <figure> <img src="img/childern_health.jpg" class="img-responsive"> </figure>
                                    <div class="probootstrap-cause-inner">
                                        <h2><a href="#">Help Children To Get Health</a></h2>
                                        <p>Good heath is very imporant to groom the children physically and mentally . We give high priority to the health of all our kids and provide hygiene enviroment.</p>
                                        <p><a href="causes.php" class="btn btn-primary btn-black">View Details!</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><a href="causes.php">See all Causes</a></p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="probootstrap-section  probootstrap-section-colored">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center section-heading probootstrap-animate">
                                <h2>What Our Well Wishers Says</h2>
                                <p class="lead">Our sponsors, donors and well wishers are the backbone to Amma Orphan Home, Here are the few words from our well wishers.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 probootstrap-animate">
                                <div class="owl-carousel owl-carousel-testimony owl-carousel-fullwidth">
                                    <div class="item">
                                        <div class="probootstrap-testimony-wrap text-center">
                                            <figure> <img src="img/wel_wisher_1.jpg" alt="Gallery"> </figure>
                                            <blockquote class="quote">&ldquo;I visited Amma orphan home few days back, such an amazing place for kids who needs love and care. And the kids are just brilliant with lots of talents, I like their discipline and the way they help each other. I feel like all they need is support from community to grow stronger and achieve their goals in life.&rdquo; <cite class="author"> &mdash;                                            <span>Narendra Sripada</span></cite></blockquote>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="probootstrap-testimony-wrap text-center">
                                            <figure> <img src="img/wel_wisher_2.jpg" alt="Gallery"> </figure>
                                            <blockquote class="quote">&ldquo;A place where orphans nourish with proper nutrition and education. Selfless service and honest is their strength. I recommend go and visit once.If you can't feed a hundred people, then feed just one.&rdquo; <cite class="author"> &mdash;<span>Harish Dubaguntla</span></cite></blockquote>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="probootstrap-testimony-wrap text-center">
                                            <figure> <img src="img/wel_wisher_3.jpg" alt="Gallery"> </figure>
                                            <blockquote class="quote">&ldquo;I heard so many good words about Amma Orphan Home. After I have started my journey with foundation I realized Charity sees the need, not the cause.&rdquo; <cite class="author">&mdash;                                            <span>Venkat Sadineni</span></cite></blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>

			<section class="probootstrap-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 probootstrap-animate">
                                <h3>Our Services</h3>
                                 <p><iframe width="475" height="350" allowfullscreen="allowfullscreen"  frameBorder="0" src="https://www.youtube.com/embed/Jb6qk78c6S0"> </iframe></p>
                                
                                <p><a href="about.php" class="btn btn-primary">Learn More</a></p>
                            </div>
                            <div class="col-md-5 probootstrap-animate">
                                <h3>Gallery</h3>
                                <div class="owl-carousel owl-carousel-fullwidth">
                                    <div class="item">
                                        <a href="img/gal_1.jpg" class="image-popup"> <img src="img/save_girl1.jpg" alt="Gallery" class="img-responsive"> </a>
                                    </div>
                                    <div class="item">
                                        <a href="img/gal_2.jpg" class="image-popup"> <img src="img/gal_2.jpg" alt="Gallery" class="img-responsive"> </a>
                                    </div>
                                    <div class="item">
                                        <a href="img/gal_3.jpg" class="image-popup"> <img src="img/gal_3.jpg" alt="Gallery" class="img-responsive"> </a>
                                    </div>
                                    <div class="item">
                                        <a href="img/gal_4.jpg" class="image-popup"> <img src="img/gal_4.jpg" alt="Gallery" class="img-responsive"> </a>
                                    </div>
                                    <div class="item">
                                        <a href="img/gal_5.jpg" class="image-popup"> <img src="img/gal_5.jpg" alt="Gallery" class="img-responsive"> </a>
                                    </div>
                                    <div class="item">
                                        <a href="img/gal_6.jpg" class="image-popup"> <img src="img/gal_6.jpg" alt="Gallery" class="img-responsive"> </a>
                                    </div>
                                    <div class="item">
                                        <a href="img/gal_6.jpg" class="image-popup"> <img src="img/gal_7.jpg" alt="Gallery" class="img-responsive"> </a>
                                    </div>
                                </div>
                                <p class="text-center"><a href="photos.php" class="btn btn-primary">View all gallery</a></p>
                            </div>
                        </div>
                    </div>
                </section>

            <section class="probootstrap-half">
                    <div class="image">
                        <div class="image-bg"> <img src="img/img_sq_5_big.jpg"> </div>
                    </div>
                    <div class="text">
                        <div class="probootstrap-animate">
                            <h3>OUR STORY</h3>
                            <p align="justify">Amma Orphan Home, Known as the "Amma Anadha Saranalayam" is a non profit organisation Founded by Mr. E. Teja with the objective to provide solution to the orphans. This is to be achieved by providing them with free basic school education, healthy home atmosphere, guiding these children towards understanding the need for healthy living and secure a place for them among the rest of the society.
                                <br>
                                <br> The motto encourages us in working towards promoting "Universal Brotherhood" and creating wellness in physical-mental-spiritual areas for all children under its care in school and orphanage.</p>
                            <p><a href="about.php" class="btn btn-primary btn-lg">Read More</a></p>
                        </div>
                    </div>
            </section>

            <section class="probootstrap-half">
                <div class="container">
                    </br>
                    <div class="row">
                        <div class="col-md-6 probootstrap-animate">
                            <div class="col-md-12 probootstrap-animate">
                                <div class="probootstrap-cause-inner probootstrap-cause" >
                                    <h3>Leave a Comment</h3>
                                </div>
                                <!-- if user is not signed in, tell them to sign in. If signed in, present them with comment form -->
                                <form method="post" id="comment_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                                      class="clearfix probootstrap-form">

                                    <div class="error" id="error_comment"></div>
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" class="form-control" maxlength="100" id="name" name="name" required="required" >
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required="required" >
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Comment</label>
                                        <textarea cols="30" rows="4" maxlength="1000" class="form-control" name="comment_text" id="comment_text"  name="comment_text" id="comment_text" required="required" ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <a class="btn btn-primary" id="submit_comment_index" name="sub" >Submit Comment</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-6 probootstrap-animate">
                            <div class="col-md-12 probootstrap-animate">
                                <div class="probootstrap-cause-inner probootstrap-cause" >
                                    <h3>Latest Comments </h3>
                                </div>
                                <!-- comments wrapper -->
                                <div id="comments-wrapper">
                                    <?php if (isset($comments)):
                                        $m1 = 0 ?>
                                        <!-- Display comments -->
                                        <?php foreach ($comments as $comment):
                                        if ($m1 <= 1) {  ?>
                                            <!-- comment -->
                                            <div class="comment clearfix">
                                                <div class="comment-details panel panel-default">
                                                    <div class="panel-heading">
                                                        <span class="comment-name">By <?php echo $comment['name'] ?> On </span>
                                                        <span class="comment-date"><?php echo date("M j, Y h:i A", strtotime($comment["created_at"])); ?></span>
                                                    </div>
                                                    <div class="panel-body"><p><?php echo $comment['body']; ?></p></div>
                                                </div>
                                            </div>
                                            <!-- // comment -->
                                        <?php } $m1 ++;
                                    endforeach ?>
                                    <?php else: ?>
                                        <h2>Be the first to comment on this post</h2>
                                    <?php endif ?>
                                </div><!-- comments wrapper -->
                                <div class="form-group">
                                    <p><a href="comments.php" class="btn btn-primary">View All Comments</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php include('footer.php'); ?>
            
               
               <script src="js/scripts.min.js"></script>
               <script src="js/main.min.js"></script>
               <script src="js/custom.js"></script>
               <script src="js/comments.js"></script>
               
               <script>
                    $('#myCarousel').carousel({
                        interval: 6000
                    })

                    $('.carousel .item').each(function(){
                        var next = $(this).next();
                        if (!next.length) {
                            next = $(this).siblings(':first');
                        }
                        next.children(':first-child').clone().appendTo($(this));

                        if (next.next().length>0) {
                            next.next().children(':first-child').clone().appendTo($(this));
                        }
                        else {
                            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
                        }
                    });

                </script>
        </body>

    </html>