<?php //print_r($_GET);
    require "cw_admin/lib/config.php";
?>

<!DOCTYPE html>

<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <?php include('header.php'); ?>

    <body>
        <?php include('nav.php'); ?>

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

                        include('cw_admin/receipt_email.php');

                        generateReceipt($_GET['order_id'], $payment['buyer_name'], $payment['buyer_email'], $payment['amount'], $msg, $payment['buyer_phone'], "Donation to Amma Orphan Home", $payment['created_at']);
                        sendEmail("Donation_" .$_GET['order_id']. ".pdf", $payment['buyer_name'], $payment['buyer_email']);

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

        <?php include('footer.php');?>

        <script src="js/scripts.min.js"></script>
        <script src="js/main.min.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/highlight.js"></script>

    </body>
</html>







