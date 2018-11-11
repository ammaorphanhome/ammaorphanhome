<?php ob_start();
error_reporting(0);

require "cw_admin/lib/config.php";
?>

<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

    <?php include('header.php'); ?>

    <body>

    <?php include('nav.php'); ?>

        <section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(img/hero_bg_bw_1.jpg)"
                 data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                            <h1 class="probootstrap-heading probootstrap-animate">Amma Home Needs <span>Together we can make a difference</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="probootstrap-section">
            <div class="container">
                <?php
                $sth = $db->query("SELECT * FROM `causes` ORDER BY date DESC limit 8");
                $count = $sth->rowCount();
                if ($count > 0) {
                    $m = 1;
                    while ($row = $sth->fetch()) {
                        if($m % 2 != 0) { ?>
                            <div class="row mb40">
                                <?php  if (empty($row[image])){  ?>
                                    <div class="col-md-12">
                                        <h2 class="mb0"><?php echo $row[title]; ?></h2>
                                        <?php  if (empty($row[date])) {
                                        } else {
                                            $newDate = date("M jS, Y", strtotime($row[date])); ?>
                                            <p class="probootstrap-news-date"><?php echo $newDate; ?> - by Admin</p>
                                        <?php } ?>
                                        <p><?php echo $row[description]; ?></p>
                                    </div>
                                <?php  } else {  ?>
                                    <div class="col-md-6 col-md-push-6 probootstrap-animate">
                                        <p><img src="adminupload/<?php echo $row[image];?>" class="img-responsive"></p>
                                    </div>

                                    <div class="col-md-5 col-md-pull-6 news-entry probootstrap-animate">
                                        <h2 class="mb0"><?php echo $row[title]; ?></h2>
                                        <?php  if (empty($row[date])) {
                                        } else {
                                            $newDate = date("M jS, Y", strtotime($row[date])); ?>
                                            <p class="probootstrap-news-date"><?php echo $newDate; ?> - by Admin</p>
                                        <?php } ?>
                                        <p><?php echo $row[description]; ?></p>
                                    </div>

                                <?php  }  ?>
                            </div>

                    <?php } else { ?>
                            <div class="row mb40">
                                <?php  if (empty($row[image])){  ?>
                                    <div class="col-md-12">
                                        <h2 class="mb0"><?php echo $row[title]; ?></h2>
                                        <?php  if (empty($row[date])) {
                                        } else {
                                            $newDate = date("M jS, Y", strtotime($row[date])); ?>
                                            <p class="probootstrap-news-date"><?php echo $newDate; ?> - by Admin</p>
                                        <?php } ?>
                                        <p><?php echo $row[description]; ?></p>
                                    </div>
                                <?php  } else {  ?>
                                    <div class="col-md-6 probootstrap-animate">
                                        <p><img src="adminupload/<?php echo $row[image];?>" class="img-responsive"></p>
                                    </div>

                                    <div class="col-md-5 col-md-push-1  news-entry probootstrap-animate">
                                        <h2 class="mb0"><?php echo $row[title]; ?></h2>

                                        <?php  if (empty($row[date])) {
                                        } else {
                                            $newDate = date("M jS, Y", strtotime($row[date])); ?>
                                            <p class="probootstrap-news-date"><?php echo $newDate; ?> - by Admin</p>
                                        <?php } ?>

                                        <p><?php echo $row[description]; ?></p>
                                    </div>

                                <?php  }  ?>
                            </div>
                     <?php }
                        $m++;
                    }
                } ?>
            </div>
        </section>

        <?php include('footer.php'); ?>

        <script src="js/scripts.min.js"></script>
        <script src="js/main.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>