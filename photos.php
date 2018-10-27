<?php ob_start();
    error_reporting(0);
    require "cw_admin/lib/config.php";
    extract($_POST);
    extract($_GET);
?>

<!DOCTYPE html>

<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <?php include('header.php'); ?>

    <body>
        <?php include('nav.php'); ?>

        <section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(img/hero_bg_bw_3.jpg)"
                 data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn"
                             style="padding-top: 160px;">
                            <h1 class="probootstrap-heading probootstrap-animate" style="font-size: 50px;">Gallery</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="probootstrap-section">
            <div class="container">
                <div class="row probootstrap-gutter10">
                    <?php
                    $sth = $db->query("SELECT * FROM `past_conferences` ORDER BY `guid` DESC");
                    $count = $sth->rowCount();
                    while ($row = $sth->fetch()) {
                    ?>
                        <div class="col-md-3 col-sm-4 col-xs-6 gal-item probootstrap-animate">
                            <form action="album.php" method="post">
                                <button type="submit" class="thumbnail">
                                    <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
                                    <img src="adminupload/<?php echo $row[image]; ?>" class="img-responsive"
                                         style="width:300px;height:150px">
                                    <h4 align="center"
                                        style="margin-top:10px; margin-bottom:10px;"><?php echo $row[name]; ?></h4>
                                </button>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <?php include('footer.php'); ?>

        <script src="js/scripts.min.js"></script>
        <script src="js/main.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>