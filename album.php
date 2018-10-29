<?php ob_start();
    error_reporting(0);
    require "cw_admin/lib/config.php";
    extract($_POST);
    extract($_GET);
    $id = $_POST[id];
?>

<!DOCTYPE html>

<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

    <?php include('header.php'); ?>

    <body>
        <?php include('nav.php'); ?>

        <section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(img/hero_bg_bw_3.jpg)"
                 data-stellar-background-ratio="0.5">
            <?php
                $sth = $db->query("SELECT * FROM `past_conferences` where `guid`='$id'")->fetch();
                echo $sth[name];
            ?>
            <div class="container">
                <div class="row mb40">
                    <div class="col-md-12">
                        <h3><?php  echo $sth[name]; ?> - Album</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn"
                             style="padding-top: 160px;">
                            <h1 class="probootstrap-heading probootstrap-animate" style="font-size: 50px;"><?php echo $sth[name]; ?> - Album</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="probootstrap-section">
            <div class="container">
                <div class="row probootstrap-gutter10">
                    <?php $m = 1;
                        $sth = $db->query("SELECT * FROM `album`  WHERE id='$id'");
                        $count = $sth->rowCount();
                        if ($count == 0) {
                    ?>
                        <div class="col-md-12 col-sm-12 col-xs-12 gal-item probootstrap-animate">
                            <h1><a href="photos.php">No Images Here Coming soon..Back to gallery</i></a></h1>
                        </div>

                    <?php } else {
                        while ($row = $sth->fetch()) {
                    ?>

                        <div class="col-md-3 col-sm-4 col-xs-6 gal-item probootstrap-animate">
                            <a href="adminupload/<?php echo $row[image]; ?>" class="image-popup">
                                <img src="adminupload/<?php echo $row[image]; ?>" alt="image" class="img-responsive"
                                     style="width:300px;height:200px">
                            </a>
                        </div>

                    <?php }
                    } ?>
                </div>
            </div>
        </section>

        <?php include('footer.php'); ?>

        <script src="js/scripts.min.js"></script>
        <script src="js/main.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>