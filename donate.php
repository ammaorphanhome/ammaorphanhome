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

    if(empty($purpose) || $purpose == '' || $purpose == 'Others' ){
        $purpose = 'Donation for Amma Home';
    }

    $name = str_replace("'", "\'", $name);
    $name = str_replace('"', "\"", $name);

    $email = str_replace("'", "\'", $email);
    $email = str_replace('"', "\"", $email);

    $msg = str_replace("'", "\'", $msg);
    $msg = str_replace('"', "\"", $msg);

    $sth = $db->query("INSERT INTO `orders`(`name`,`email`,`price`,`image`,`note`,`mobile`, `location`, `donation_option`) VALUES ('$name','$email','$amount','$image','$msg','$mobile','$wishToSee', '$purpose')");
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
                        <form action="" method="post" id="donations" enctype="multipart/form-data" class="probootstrap-form">
                            <div class="probootstrap-cause-inner probootstrap-cause" >
                                <h3>Help Us - To Feed More</h3>
                            </div>

                            <div class="form-group">
                                <label for="name">Full Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required="required" placeholder="eg. Raj Kumar">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required="required"
                                       placeholder="eg. info@ammaorphanhome.org">
                            </div>

                            <div class="form-group">
                                <label for="email">Phone:</label>
                                <input type="text" class="form-control" maxlength="10" pattern="[7-9]{1}[0-9]{9}" id="email" required="required"
                                       name="mobile" placeholder="eg. 9999999999">
                            </div>

                            <div class="form-group">
                                <label for="donation_options">Donation Options to Sponsor at Amma Orphan Home:</label><br/>
                                <!--<select class="form-control" style="-webkit-appearance: menulist;" name="donationOption" id="donationOption" onchange="price(this.value)">
                                    <option value="">-- Select --</option>
                                    <option value="24000">Child's Education for an Year - Rs.24,000/-</option>
                                    <option value="10000">Child's Maintenance for an Year - Rs.10,000/-</option>
                                    <option value="15000">Home Maintenance for a Month - Rs.15,000/-</option>
                                    <option value="15000">Elder's Maintenance for an Year - Rs.15,000/-</option>
                                    <option value="7500">Sponsor Full Day Meals - Rs.7,500/-</option>
                                    <option value="3000">Sponsor Lunch or Dinner for a Day - Rs.3,000/-</option>
                                    <option value="1000">Sponsor Breakfast for a Day - Rs.1,000/-</option>
                                    <option value="500">Sponsor Snacks for a Day - Rs.500/-</option>
                                    <option value="Others">Others</option>
                                </select>-->
                                <input type="radio" id="sponsorForYear" name="donationOption" value="35000">
                                    <label for="sponsorForYear">Adopt a Child for an Year - ₹ 35,000</label>
                                </input> <br/>
                                <input type="radio" id="sponsorForMonth" name="donationOption" value="3000">
                                    <label for="sponsorForMonth">Adopt a Child for a Month - ₹ 3,000</label>
                                </input> <br/>
                                <input type="radio" id="educationForYear" name="donationOption" value="24000">
                                    <label for="educationForYear">A Child's Education for an Year - ₹ 24,000</label>
                                </input> <br/>
                                <input type="radio" id="maintenanceForYear" name="donationOption" value="10000">
                                    <label for="maintenanceForYear">A Child's Maintenance for an Year - ₹ 10,000</label>
                                </input> <br/>
                                <input type="radio" id="homeForMonth" name="donationOption" value="15000">
                                    <label for="homeForMonth">Home Maintenance for a Month - ₹ 15,000</label>
                                </input> <br/>
                                <input type="radio" id="eldersForYear" name="donationOption" value="24000">
                                    <label for="eldersForYear">An Elder's Maintenance for an Year - ₹ 24,000</label>
                                </input> <br/>
                                <input type="radio" id="fullMealForDay" name="donationOption" value="7500">
                                    <label for="fullMealForDay">Full Day Meals at Amma Home - ₹ 7,500</label>
                                </input> <br/>
                                <input type="radio" id="lunchForDay" name="donationOption" value="3000">
                                    <label for="lunchForDay">Lunch/Dinner for a Day - ₹ 3,000</label>
                                </input> <br/>
                                <input type="radio" id="breakfastForDay" name="donationOption" value="1000">
                                    <label for="breakfastForDay">Breakfast for a Day - ₹ 1,000</label>
                                </input> <br/>
                                <input type="radio" id="snacksForDay" name="donationOption" value="500">
                                    <label for="snacksForDay">Snacks for a Day - ₹ 500</label>
                                </input> <br/>
                                <input type="radio" id="others" name="donationOption" value="Others">
                                    <label for="others">Other Cause</label>
                                </input> <br/>
                                <input type="hidden" id="purpose" name="purpose"/>
                            </div>

                            <div class="form-group">
                                <label for="amount">Amount:</label>
                                <input type="number" min="1"  class="form-control" id="amount" required="required" name="amount" onchange="amountChange(this.value)" placeholder="eg. ₹1000.00">
                            </div>

                            <div class="form-group">
                                <label for="amount">Upload Donar Photo:</label>
                                <input type="file" class="form-control" id="amount" name="image">
                            </div>

                            <div class="form-group">
                                <label for="wishToSee">Do you wish see your donation in donations page?</label> <br/>
                                <input type="radio" name="wishToSee" value="Yes" checked>Yes
                                <input type="radio" name="wishToSee" value="No">No
                            </div>

                            <div class="form-group">
                                <label for="message">Notes:</label>
                                <textarea cols="30" rows="5" class="form-control" id="message" name="msg"
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
                                <span>Includes all the maintenance of child like food, clothing, education, health etc.</span><br><br>
                                <span><b>₹ 35,000/-</b></span>
                            </div>
                        </div>

                        <div class="probootstrap-image-text-block probootstrap-cause" >
                            <div class="probootstrap-cause-inner" style="border:1px solid #e6e5e5;">
                                <span style="color:orangered;"><b>Adopt a Child for a Month</b></span> <br>
                                <span>Includes all the maintenance of child like food, clothing, education, health etc.</span><br><br>
                                <span><b>₹ 3,000/-</b></span>
                            </div>
                        </div>

                        <div class="probootstrap-image-text-block probootstrap-cause" >
                            <div class="probootstrap-cause-inner" style="border:1px solid #e6e5e5;">
                                <span style="color:orangered;"><b>Sponsor a Child Education for an Year</b></span> <br>
                                <span>Includes books, stationery, transport etc.</span><br><br>
                                <span><b>₹ 24,000/-</b></span>
                            </div>
                        </div>
                        <div class="probootstrap-image-text-block probootstrap-cause" >
                            <div class="probootstrap-cause-inner" style="border:1px solid #e6e5e5;">
                                <span style="color:orangered;"><b>Sponsor a Child Maintenance for an Year</b></span> <br>
                                <span>Includes food, clothing, medications, etc.</span><br><br>
                                <span><b>₹ 10,000/-</b></span>
                            </div>
                        </div>
                        <div class="probootstrap-image-text-block probootstrap-cause" >
                            <div class="probootstrap-cause-inner" style="border:1px solid #e6e5e5;">
                                <span style="color:orangered;"><b>Sponsor Home Maintenance for a Month</b></span> <br>
                                <span>Includes groceries, vegetables, milk etc.</span><br><br>
                                <span><b>₹ 15,000/-</b></span>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-3 col-md-push-1 probootstrap-animate">

                        <div class="probootstrap-image-text-block probootstrap-cause" >
                            <div class="probootstrap-cause-inner" style="border:1px solid #e6e5e5;">
                                <span style="color:orangered;"><b>Sponsor an Elder at Old Age Home for an Year</b></span> <br>
                                <span>Includes food, clothing, medication, maintenance etc.</span><br><br>
                                <span><b>₹ 24,000/-</b></span>
                            </div>
                        </div>

                        <div class="probootstrap-image-text-block probootstrap-cause" >
                            <div class="probootstrap-cause-inner" style="border:1px solid #e6e5e5;">
                                <span style="color:orangered;"><b>Sponsor Full Day Meals at Amma Home</b></span> <br>
                                <span>Includes breakfast, lunch, dinner and snacks for day.</span><br><br>
                                <span><b>₹ 7,500/-</b></span>
                            </div>
                        </div>

                        <div class="probootstrap-image-text-block probootstrap-cause" >
                            <div class="probootstrap-cause-inner" style="border:1px solid #e6e5e5;">
                                <span style="color:orangered;"><b>Sponsor Lunch or Dinner at Amma Home</b></span> <br>
                                <span>Includes lunch or dinner for a day.</span><br><br>
                                <span><b>₹ 3,000/-</b></span>
                            </div>
                        </div>
                        <div class="probootstrap-image-text-block probootstrap-cause" >
                            <div class="probootstrap-cause-inner" style="border:1px solid #e6e5e5;">
                                <span style="color:orangered;"><b>Sponsor Breakfast and Snacks at Amma Home</b></span> <br>
                                <span>Includes breakfast and milk for a day.</span><br><br>
                                <span><b>₹ 1,500/-</b></span>
                            </div>
                        </div>

                        <div class="probootstrap-image-text-block probootstrap-cause" >
                            <div class="probootstrap-cause-inner" style="border:1px solid #e6e5e5;">
                                <span style="color:orangered;"><b>Others</b></span> <br>
                                <span>Include any cause & any amount</span><br><br>
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
            </div>
        </section>



        <?php include('footer.php'); ?>

        <script type="text/javascript">
            // to remove from global namespace
            (function() {
                // onclick vs. onchange
                var options = document.forms['donations'].elements['donationOption'];
                for (var i=0, len=options.length; i<len; i++) {
                    options[i].onclick = function() {
                        setAmount(this);
                    };
                    options[i].onchange = function() {
                        setAmount(this);
                    };
                    setAmount = function(current) {
                        var str  = current.value;
                        if(str == 'Others' || str == '' ){
                            document.getElementById("amount").value = '';
                            document.getElementById("amount").readOnly = false;
                            document.getElementById("purpose").value = "Donation for Amma Home";
                        } else {
                            var selector = 'label[for=' + current.id + ']';
                            var label = document.querySelector(selector);
                            var text = label.innerHTML;

                            text = text.substr(0, text.indexOf("-") - 1);
                            document.getElementById("purpose").value = text;
                            document.getElementById("amount").value = str;
                            document.getElementById("amount").readOnly = true;
                        }
                    };
               }
            }());
        </script>

        <script type="text/javascript">
            function price(str) {
                if(str == 'Others' || str == '' ){
                    document.getElementById("amount").value = '';
                    document.getElementById("amount").readOnly = false;
                    document.getElementById("purpose").value = "Donation for Amma Home";
                } else {
                    var el = document.getElementById('donationOption');
                    var text = el.options[el.selectedIndex].innerHTML;
                    text = text.substr(0, text.indexOf("-") - 1);

                    document.getElementById("purpose").value = text;
                    document.getElementById("amount").value = str;
                    document.getElementById("amount").readOnly = true;
                }
            }
            function amountChange(str) {
                var options = document.forms['donations'].elements['donationOption'];
                var valueSet = false;
                for (var i=0, len=options.length; i<len; i++) {
                    if(options[i].checked){
                        valueSet = true;
                    }
                }
                if(!valueSet) {
                    document.getElementById("others").checked = true;
                }
            }
        </script>
        <script src="js/scripts.min.js"></script>
        <script src="js/main.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>