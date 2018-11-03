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
                            <h1 class="probootstrap-heading probootstrap-animate">Donations <span>Together we can make a difference</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="probootstrap-section">
            <div class="container">
                <div class="col-md-12">
                    <?php
                    $sth = $db->query("SELECT * FROM `orders` where `guid` >= 100 and payment_status = 'Credit' and location = 'Yes' and  MONTH(date) = MONTH(CURDATE()) ORDER BY date DESC");
                    $count = $sth->rowCount(); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="mb0">Donations of this month</h2>
                        </div>

                        <div class="col-md-12 probootstrap-animate">
                            <form action="" method="" class="probootstrap-form">
                                <div class="form-group">
                                    <p><b>Thank you for your kind donations, Your generosity will directly benefit the children of Amma Orphan Home.</b></p>
                                </div>
                            </form>
                        </div>
                    </div>

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
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($count > 0) {
                                    $m = 1;
                                    while ($row = $sth->fetch()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $m; ?></td>
                                            <td><?php echo $row[name]; ?> </td>
                                            <td><?php echo $row[price]; ?></td>
                                            <td><?php echo $row[date]; ?></td>
                                            <td><?php echo $row[note]; ?></td>
                                        </tr>
                                        <?php $m++;
                                    }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include('footer.php'); ?>

        <script src="js/scripts.min.js"></script>
        <script src="js/main.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>