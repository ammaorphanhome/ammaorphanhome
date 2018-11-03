<?php ob_start();
error_reporting(0);
require "cw_admin/lib/config.php";
extract($_POST);
extract($_GET);
if (isset($_POST) && $_POST['submit'] == 'Donate') {

    $filename = $_FILES['image']['name'];
    if (!empty($filename)) {
        $image = time() . $filename;
        move_uploaded_file($_FILES['image']['tmp_name'], "adminupload/" . $image);
    }

    if(empty($donation_option) || $donation_option == 'Other' ){
        $donation_option = 'Donation';
    }

    //echo "INSERT INTO `orders`(`name`,`email`,`price`,`image`) VALUES ('$name','$email','$amount','$image')";exit;
    $sth = $db->query("INSERT INTO `orders`(`name`,`email`,`price`,`image`,`note`,`mobile`, `location`, `payment_mode`) VALUES ('$name','$email','$amount','$image','$msg','$mobile','$wishToSee', '$donation_option')");
    $insid = $db->lastInsertId();
    if ($sth == true) { ?>
        <script type="text/javascript">
            //alert('Data Successfully Inserted');
            window.location = "payment.php?oid=<?php echo $insid;?>";
        </script>
    <?php } else { ?>
        <script type="text/javascript">
            alert('Could not verify the information, Please try Again!');
            window.location = "donate.php";
        </script>
    <?php
    }
}
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
                            <h1 class="probootstrap-heading probootstrap-animate">Donate
                                <span>Together we can make a difference</span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="probootstrap-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 probootstrap-animate">
                        <form action="" method="post" enctype="multipart/form-data" class="probootstrap-form">
                            <div class="probootstrap-cause-inner probootstrap-cause" >
                                <h3>Help Us - To Feed More</h3>
                            </div>

                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="eg. Raj Kumar">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="eg. info@ammaorphanhome.org">
                            </div>

                            <div class="form-group">
                                <label for="email">Phone</label>
                                <input type="text" class="form-control" maxlength="10" pattern="^\d{10}$" id="email"
                                       name="mobile" placeholder="eg. 9999999999">
                            </div>

                            <div class="form-group">
                                <label for="donation_options">Donation Options</label>
                                <select class="form-control" style="-webkit-appearance: menulist;" name="donation_option" id="donation_option" onchange="price(this.value)">
                                    <option value="">-- Select --</option>
                                    <option value="2000">Adopt a Child for One Month</option>
                                    <option value="24000">Adopt a Child for One Year</option>
                                    <option value="1000">For One Day Meals</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" min="1"  class="form-control" id="amount" required="required" name="amount" placeholder="₹1000.00">
                            </div>

                            <div class="form-group">
                                <label for="amount">Upload Donar Photo</label>
                                <input type="file" class="form-control" id="amount" name="image">
                            </div>

                            <div class="form-group">
                                <label for="wishToSee">Do you wish see your donation in donations page?</label> <br/>
                                <input type="radio" name="wishToSee" value="Yes" checked>Yes
                                <input type="radio" name="wishToSee" value="No">No
                            </div>

                            <div class="form-group">
                                <label for="message">Note</label>
                                <textarea cols="30" rows="6" class="form-control" id="message" name="msg"
                                          placeholder="eg. This donation is for the children who needs food."></textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit" value="Donate">
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6 col-md-push-1 probootstrap-animate">
                        <div class="probootstrap-cause-inner probootstrap-cause" >
                            <h3>Donation Causes of Amma Orphan Home </h3>
                        </div>
                    </div>

                    <div class="col-md-3 col-md-push-1 probootstrap-animate">

                        <div class="probootstrap-image-text-block probootstrap-cause" >
                            <div class="probootstrap-cause-inner" style="border:1px solid #e6e5e5;">
                                <span style="color:orangered;"><b>Adopt a Child for an Year</b></span> <br>
                                <span>Includes clothing food, education, maintenance etc.</span><br><br>
                                <span><b>Rs.24,000/-</b></span>
                            </div>
                        </div>
                        <div class="probootstrap-image-text-block probootstrap-cause" >
                            <div class="probootstrap-cause-inner" style="border:1px solid #e6e5e5;">
                                <span style="color:orangered;"><b>Adopt a Child for an Year</b></span> <br>
                                <span>Includes clothing food, education, maintenance etc.</span><br><br>
                                <span><b>Rs.24,000/-</b></span>
                            </div>
                        </div>
                        <div class="probootstrap-image-text-block probootstrap-cause" >
                            <div class="probootstrap-cause-inner" style="border:1px solid #e6e5e5;">
                                <span style="color:orangered;"><b>Adopt a Child for an Year</b></span> <br>
                                <span>Includes clothing food, education, maintenance etc.</span><br><br>
                                <span><b>Rs.24,000/-</b></span>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-3 col-md-push-1 probootstrap-animate">

                        <div class="probootstrap-image-text-block probootstrap-cause" >
                            <div class="probootstrap-cause-inner" style="border:1px solid #e6e5e5;">
                                <span style="color:orangered;"><b>Adopt a Child for an Year</b></span> <br>
                                <span>Includes clothing food, education, maintenance etc.</span><br><br>
                                <span><b>Rs.24,000/-</b></span>
                            </div>
                        </div>
                        <div class="probootstrap-image-text-block probootstrap-cause" >
                            <div class="probootstrap-cause-inner" style="border:1px solid #e6e5e5;">
                                <span style="color:orangered;"><b>Adopt a Child for an Year</b></span> <br>
                                <span>Includes clothing food, education, maintenance etc.</span><br><br>
                                <span><b>Rs.24,000/-</b></span>
                            </div>
                        </div>
                        <div class="probootstrap-image-text-block probootstrap-cause" >
                            <div class="probootstrap-cause-inner" style="border:1px solid #e6e5e5;">
                                <span style="color:orangered;"><b>Adopt a Child for an Year</b></span> <br>
                                <span>Includes clothing food, education, maintenance etc.</span><br><br>
                                <span><b>Rs.24,000/-</b></span>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-6 col-md-push-1 probootstrap-animate">
                        <div class="probootstrap-cause-inner probootstrap-cause" >
                            <div class="probootstrap-image-text-block probootstrap-cause" >
                                <div class="probootstrap-cause-inner" style="border:1px solid #e6e5e5;">
                                    <h3>Bank Account Details: </h3>
                                    <p><b>  Bank Name : Karur Vysya Bank <br>
                                            Account Name : Amma Anadha Sharanalayam <br>
                                            Account No : 4810115000000166 <br>
                                            Branch : Ganesh Basthi Kothagudem <br>
                                            IFSC : KVBL0004810 <br><br>
                                            Mr.Teja (Founder): 8790782983</b>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--<hr/> <br> <br>
                <div class="row mb40">
                    <div class="col-md-5">
                        <div class="probootstrap-image-text-block probootstrap-cause" >
                            <div class="probootstrap-cause-inner" style="border:1px solid #e6e5e5;">
                                <h3>Bank Account Details: </h3>
                                <p><b>  Bank Name : Karur Vysya Bank <br>
                                        Account Name : Amma Anadha Sharanalayam <br>
                                        Account No : 4810115000000166 <br>
                                        Branch : Ganesh Basthi Kothagudem <br>
                                        IFSC : KVBL0004810 <br><br>
                                        Mr.Teja (Founder): 8790782983</b>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-push-1 probootstrap-animate fadeInUp probootstrap-animated">
                        <img src="img/donate.png" class="img-responsive"> <br><br>
                    </div>
                </div>-->
            </div>
        </section>



        <?php include('footer.php'); ?>
        <script type="text/javascript">
            function price(str) {
                if(str == 'Other' || str == '' ){

                } else {
                    document.getElementById("amount").value = str;
                }
            }
        </script>
        <script src="js/scripts.min.js"></script>
        <script src="js/main.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>