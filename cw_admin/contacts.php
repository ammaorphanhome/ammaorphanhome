<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_POST);
extract($_GET);
?>

<?php
    if(isset($_POST) && $_POST['submit']=='ADD') {
        $today = date("d-m-Y");

    	   if($name !='' && $email != ''){
               $today = date("Y-m-d");

               $name = str_replace("'", "\'", $name);
               $name = str_replace('"', "\"", $name);

               $email = str_replace("'", "\'", $email);
               $email = str_replace('"', "\"", $email);

               $sth = $db->query("INSERT INTO `contacts` (`name`, `email`, `mobile`, `contact_type`, `created_at`, `updated_at`) 
                    VALUES ('$name','$email', '$mobile', '$contactType', '$today', '$today')");
    	       
    	       $insid = $db->lastInsertId();
    	    
    	       if($sth == true)  { ?>
    	    		<script type="text/javascript">
              			alert('Contact details are successfully added');
              			window.location="<?php echo URL; ?>contacts.php";
            		</script>
    	    <?php } else { ?>
    	    		<script type="text/javascript">
      					alert('Contact details are not added, Please try Again');
              			window.location="<?php echo URL; ?>contacts.php";
    		 		</script>
    	    <?php } ?>
    	    
        <?php } else { ?>
                 <script type="text/javascript">
                    alert('Please try Again');
                    window.location="<?php echo URL; ?>contacts.php";
                 </script>
        <?php }

    } else if(isset($_POST) && $_POST['submit'] == 'Email') {

        $file_name = $_FILES['image']['name'];
        if(!empty($file_name)) {

            $file_type = $_FILES['image']['type'];
            $temp_name = $_FILES['image']['tmp_name'];
            $file = $temp_name;
            $content = chunk_split(base64_encode(file_get_contents($file)));
            $uid = md5(uniqid(time()));

            $sth = $db->query ("SELECT * FROM `contacts` where `contact_type` = '$contactType' ORDER BY `updated_at` desc, `guid` DESC");
            $count = $sth->rowCount(); ?>
            <?php
            if($count > 0) {
                $m = 1;
                $prefix = $sentEmailAddrress = $notSentEmailAddrress = '';
                while($row = $sth->fetch()) {
                    $name = $row[name];
                    $body = " 
                    <html> 
                    <body>
                       <table style='border: 0px solid #06F;padding:10px;border-radius:10px;'>
                          <tr>
                              <td width='500'>
                                  <div class='maindiv'>
<pre>Dear $name,

Greetings from Amma Orphan Home!

$msg

</pre>
                                  </div>
                              </td>
                          </tr>
                      </table>
                    </body>
                    </html>";

                    $eol = PHP_EOL;

                    // Basic headers
                    $header = "From: info@ammaorphanhome.org".$eol;
                    $header .= "Reply-To: ".$replyto.$eol;
                    $header .= "MIME-Version: 1.0\r\n";
                    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"";

                    // Put everything else in $message
                    $message = "--".$uid.$eol;
                    $message .= "Content-Type: text/html; charset=ISO-8859-1".$eol;
                    $message .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
                    $message .= $body.$eol;

                    $message .= "--".$uid.$eol;
                    $message .= "Content-Type: ".$file_type."; name=\"".$file_name."\"".$eol;
                    $message .= "Content-Transfer-Encoding: base64".$eol;
                    $message .= "Content-Disposition: attachment; filename=\"".$file_name."\"".$eol;
                    $message .= $content.$eol;
                    $message .= "--".$uid."--";

                    // send the mail
                    if (mail($row[email], $subject, $message, $header)) {
                        $sentEmailAddrress .= $prefix  . $row[email] ;
                        $prefix = ',';
                    } else {
                        $notSentEmailAddrress .= $prefix  . $row[email] ;
                        $prefix = ',';
                    }
                    $m++;
                }
                if(!empty($sentEmailAddrress)){
                    echo "<script>alert('Sent an email to following addresses ==>  $sentEmailAddrress !')</script>";
                }
                if(!empty($notSentEmailAddrress)){
                    echo "<script>alert('Could not send emails to following addresses ==>   $notSentEmailAddrress !')</script>";
                }

                ?>
                <script type="text/javascript">
                    window.location="<?php echo URL; ?>contacts.php";
                </script>
                <?php
            } else {
                header('location:'.URL.'contacts.php');
            }

        } else {

            $stremail = "info@ammaorphanhome.org";

            $headers .= "From:info@ammaorphanhome.org\r\n";
            $headers .= "Content-type: text/html\r\n";

            $sth = $db->query ("SELECT * FROM `contacts` where `contact_type` = '$contactType' ORDER BY `updated_at` desc, `guid` DESC");
            $count = $sth->rowCount(); ?>
            <?php
            if($count > 0) {
                $m = 1;
                $prefix = $sentEmailAddrress = $notSentEmailAddrress = '';
                while($row = $sth->fetch()) {
                    $name = $row[name];
                    $message = " 
                    <html> 
                    <body>
                       <table style='border: 0px solid #06F;padding:10px;border-radius:10px;'>
                          <tr>
                              <td width='500'>
                                  <div class='maindiv'>
<pre>Dear $name,

Greetings from Amma Orphan Home!

$msg

</pre>
                                  </div>
                              </td>
                          </tr>
                      </table>
                    </body>
                    </html>";

                    if (mail($row[email], $subject, $message, $headers)) {
                        $sentEmailAddrress .= $prefix  . $row[email] ;
                        $prefix = ',';
                    } else {
                        $notSentEmailAddrress .= $prefix  . $row[email] ;
                        $prefix = ',';
                    }
                    $m++;
                }
                if(!empty($sentEmailAddrress)){
                    echo "<script>alert('Sent an email to following addresses ==>  $sentEmailAddrress !')</script>";
                }
                if(!empty($notSentEmailAddrress)){
                    echo "<script>alert('Could not send emails to following addresses ==>   $notSentEmailAddrress !')</script>";
                }

                ?>
                <script type="text/javascript">
                    window.location="<?php echo URL; ?>contacts.php";
                </script>
                <?php
            } else {
                header('location:'.URL.'contacts.php');
            }
        }
    } else if(isset($_POST) && $_POST['submit'] == 'SelectedEmail') {

        $file_name = $_FILES['image']['name'];
        if(!empty($file_name)) {

            $file_type = $_FILES['image']['type'];
            $temp_name = $_FILES['image']['tmp_name'];
            $file = $temp_name;
            $content = chunk_split(base64_encode(file_get_contents($file)));
            $uid = md5(uniqid(time()));

            $emailAddr1 = $_POST['emailAddr'];
            $str_arr  = explode(",", $emailAddr1);
            $prefix = $sentEmailAddrress = $notSentEmailAddrress = '';

            foreach($str_arr as $my_Array){
                $body = " 
                <html> 
                <body>
                   <table style='border: 0px solid #06F;padding:10px;border-radius:10px;'>
                      <tr>
                          <td width='500'>
                              <div class='maindiv'>
<pre>Hi $nameAddr[0],

Greetings from Amma Orphan Home!

$msg

</pre>
                              </div>
                          </td>
                      </tr>
                  </table>
                </body>
                </html>";

                $nameAddr  = explode("#", $my_Array);

                $eol = PHP_EOL;

                // Basic headers
                $header = "From: info@ammaorphanhome.org".$eol;
                $header .= "Reply-To: ".$replyto.$eol;
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"";

                // Put everything else in $message
                $message = "--".$uid.$eol;
                $message .= "Content-Type: text/html; charset=ISO-8859-1".$eol;
                $message .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
                $message .= $body.$eol;

                $message .= "--".$uid.$eol;
                $message .= "Content-Type: ".$file_type."; name=\"".$file_name."\"".$eol;
                $message .= "Content-Transfer-Encoding: base64".$eol;
                $message .= "Content-Disposition: attachment; filename=\"".$file_name."\"".$eol;
                $message .= $content.$eol;
                $message .= "--".$uid."--";

                // send the mail
                if (mail($nameAddr[1], $subject, $message, $header)) {
                    $sentEmailAddrress .= $prefix  . $nameAddr[1] ;
                    $prefix = ',';
                } else {
                    $notSentEmailAddrress .= $prefix  . $nameAddr[1] ;
                    $prefix = ',';
                    echo "<script>alert('inside file name ==> 7!');</script>";
                }
            }
            if(!empty($sentEmailAddrress)){
                echo "<script>alert('Sent an email to following addresses ==>  $sentEmailAddrress !')</script>";
            }
            if(!empty($notSentEmailAddrress)){
                echo "<script>alert('Could not send emails to following addresses ==>   $notSentEmailAddrress !')</script>";
            }
            ?>

            <script type="text/javascript">
                window.location="<?php echo URL; ?>contacts.php";
            </script>
            <?php

            // get the extensions of the file
            /*$base = basename($file_name);
            $extension = substr($base, strlen($base)-4, strlen($base));

            // allowed extensions
            $allowed_extensions = array(".doc", "docx", ".pdf", ".zip", ".png", "jpeg", ".jpg", ".JPG" );
            if (in_array($extension, $allowed_extensions)){

            } else {
            }*/
        } else {
            $emailAddr1 = $_POST['emailAddr'];
            $str_arr  = explode(",", $emailAddr1);
            $headers .= "From:info@ammaorphanhome.org\r\n";
            $headers .= "Content-type: text/html\r\n";
            $prefix = $sentEmailAddrress = $notSentEmailAddrress = '';

            foreach($str_arr as $my_Array){
                $nameAddr  = explode("#", $my_Array);

                $message = " 
                    <html> 
                    <body>
                       <table style='border: 0px solid #06F;padding:10px;border-radius:10px;'>
                          <tr>
                              <td width='500'>
                                  <div class='maindiv'>
<pre>Hi $nameAddr[0],

Greetings from Amma Orphan Home!

$msg

</pre>
                                  </div>
                              </td>
                          </tr>
                      </table>
                    </body>
                    </html>";

                if (mail($nameAddr[1], $subject, $message, $headers)) {
                    $sentEmailAddrress .= $prefix  . $nameAddr[1] ;
                    $prefix = ',';
                } else {
                    $notSentEmailAddrress .= $prefix  . $nameAddr[1] ;
                    $prefix = ',';
                }
            }
            if(!empty($sentEmailAddrress)){
                echo "<script>alert('Sent an email to following addresses ==>  $sentEmailAddrress !')</script>";
            }
            if(!empty($notSentEmailAddrress)){
                echo "<script>alert('Could not send email's to following addresses ==>   $notSentEmailAddrress !')</script>";
            }

            ?>
            <script type="text/javascript">
                window.location="<?php echo URL; ?>contacts.php";
            </script>
            <?php
        }

    } else if(isset($_POST) && $_POST['submit']=='Edit') {

        $aid = $_POST['aid'];
        $today = date("Y-m-d");
        if ($name != '' && $email != '') {
            $name = str_replace("'", "\'", $name);
            $name = str_replace('"', "\"", $name);
            $email = str_replace("'", "\'", $email);
            $email = str_replace('"', "\"", $email);
            $today = date("Y-m-d");
            $sth = $db->query("UPDATE `contacts` SET `name`='$name', `email`='$email', `mobile`='$mobile', `contact_type`='$contactType', `updated_at`='$today' WHERE `guid`='$qid'");
            if ($sth == true) { ?>
                <script type="text/javascript">
                    alert('Contact Successfully Updated');
                    window.location = "<?php echo URL; ?>contacts.php";
                </script>
            <?php } else { ?>
                <script type="text/javascript">
                    alert('Please try Again');
                    window.location = "<?php echo URL; ?>contacts.php";
                </script>
            <?php }
        } else { ?>
            <script type="text/javascript">
                alert('Please try Again');
                window.location = "<?php echo URL; ?>contacts.php";
            </script>
        <?php }

    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title><?php echo TITLE; ?></title>

  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <?php include "top_nav.php";?>
      <!-- Side-Nav-->
       <?php include "side_nav.php";?>
      <div class="content-wrapper">
        <div class="page-title">
          <div><h1>Enter Contact Details</h1></div>
		<div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li class="active"><a href="contacts.php">Contact Details </a></li>
            </ul>
          </div>
        </div>

	  <?php

      if(isset($_POST) && $_POST['submit']=='EmailToSelected') {
          if(!empty($_POST['emails'])){
              // Loop to store and display values of individual checked checkbox.
              $prefix = $emailAddrress = '';
              foreach($_POST['emails'] as $selected){
                  $emailAddrress .= $prefix  . $selected ;
                  $prefix = ',';
              }
              ?>

              <a href="<?php echo URL; ?>contacts.php?id=<?php echo $guid; ?>" class="btn btn-info">Back</a>
              <div class="row">
                  <div class="col-md-6">
                      <div class="card">
                          <h3 class="card-title">Send E-mail</h3>
                          <div class="card-body">
                              <form role="form" method="post"
                                    action="<?php echo $_SERVER['PHP_SELF']; ?>"
                                    enctype="multipart/form-data" onsubmit="return validate();">
                                  <div class="form-group">
                                      <label for="message">Selected Emails</label>
                                      <textarea readonly cols="30" rows="3" class="form-control" id="emailNames" name="emailNames"
                                                ><?php echo $emailAddrress;?></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label">Subject</label>
                                      <input class="form-control" type="text" name="subject" id="subject">
                                  </div>
                                  <div class="form-group">
                                      <label for="message">Email Body</label>
                                      <textarea cols="30" rows="10" class="form-control" id="message" name="msg"
                                                placeholder="eg. Enter email content."></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label for="photo" class="control-label">Attachment</label>
                                      <input type="file" class="form-control" id="attach" name="image">
                                  </div>

                                  <div class="clearfix"></div>
                                  <div class="card-footer">
                                      <input type="hidden" name="qid" value="<?php echo $guid; ?>">
                                      <input type="hidden" name="emailAddr" id="emailAddr" value="<?php echo $emailAddrress; ?>">
                                      <button type="submit" name="submit" value="SelectedEmail" class="btn btn-primary icon-btn">
                                          <i class="fa fa-fw fa-lg fa-check-circle"></i>Send Email
                                      </button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>

          <?php
          } else {
          ?>
              <script type="text/javascript">
                  alert("Please select atleast once contact to send email");
                  window.location = "<?php echo URL; ?>contacts.php";
              </script>
              <?php
          }
      }

      if(isset($action) && $action=='add') { ?>
	  		<a href="<?php echo URL; ?>contacts.php" class="btn btn-info">Back</a>
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<h3 class="card-title">Add Contact Details</h3>
						<div class="card-body">
							<form role="form" method="post" id="donations"
                                  action="<?php echo $_SERVER['PHP_SELF']; ?>"
								enctype="multipart/form-data" onsubmit="return validate();">
								
								<div class="form-group">
                                    <label class="control-label">Contact Name</label>
                                    <input type="text" name="name" placeholder="Enter Name" id="name" class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="control-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="eg. contact@gmail.com">
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="mobile" class="control-label">Phone</label>
                                    <input type="text" class="form-control" maxlength="10" pattern="[7-9]{1}[0-9]{9}" id="mobile"
                                           name="mobile" placeholder="eg. 9999999999">
                                </div>

                                <div class="form-group">
                                    <label for="donation_options">Contact Type</label><br/>
                                    <select class="form-control" name="contactType" id="contactType" >
                                        <option value="">-- Select --</option>
                                        <option value="Donor">Donor</option>
                                        <option value="Sponsor">Sponsor</option>
                                        <option value="Visitor">Visitor</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

								<div class="card-footer">
									<button type="submit" name="submit" value="ADD"
										class="btn btn-primary icon-btn">
										<i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
									</button>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		  
       <?php } ?>
        
        
	  <?php  if(isset($action) && $action=='viewDetails') { 
	       $q = $_GET['guid'];
	       $sth = $db->query ('SELECT * FROM `contacts` WHERE `guid`="'.$q.'"');
	       $row = $sth->fetch();
	  ?>
	   
		  <div class="col-md-12">
		  <a href="<?php echo URL; ?>contacts.php" class="btn btn-info">Back</a>
            <div class="card">
              <h3 class="card-title"><?php echo $row[stdname]; ?> Contact Details</h3>
              <div class="card-body">
                  
                  <form method="post" action="<?php echo $_SEVER['PHP_SELF'];?>" enctype="multipart/form-data">
                  
				  <div class="form-group">
                    <label class="control-label">Contact Name</label>
                    <input readonly class="form-control" value=" <?php echo $row[name];?> ">
                  </div>
                 
                 <div class="form-group">
                    <label class="control-label">Email</label>
                    <input readonly class="form-control" value="<?php echo $row[email];?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Phone</label>
                    <input readonly class="form-control" value="<?php echo $row[mobile];?>">
                  </div>

                  <div class="form-group">
                      <label class="control-label">Contact Type</label>
                      <input readonly class="form-control" value="<?php echo $row[contact_type];?>">
                  </div>

				  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
		  <?php
	  } else if(isset($action) && $action=='edit') {
          $sth = $db->query('SELECT * FROM `contacts` WHERE `guid`="' . $guid . '"');
          $row = $sth->fetch();
          ?>
          <a href="<?php echo URL; ?>contacts.php?id=<?php echo $guid; ?>" class="btn btn-info">Back</a>
          <div class="row">
              <div class="col-md-6">
                  <div class="card">
                      <h3 class="card-title">Edit Contact Details</h3>
                      <div class="card-body">
                          <form method="post" action="<?php echo $_SEVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                              <div class="form-group">
                                  <label class="control-label">Contact Name</label>
                                  <input class="form-control" type="text" name="name" id="name"
                                         value=" <?php echo $row[name]; ?> ">
                              </div>
                              <div class="form-group">
                                  <label class="control-label">Email</label>
                                  <input class="form-control" type="email" name="email" id="email"
                                         value="<?php echo $row[email]; ?>">
                              </div>
                              <div class="form-group">
                                  <label class="control-label">Phone</label>
                                  <input class="form-control" type="text" maxlength="10" pattern="[7-9]{1}[0-9]{9}"
                                         id="mobile"
                                         name="mobile" value="<?php echo $row[mobile]; ?>">
                              </div>

                              <div class="form-group">
                                  <label for="donation_options">Contact Type</label><br/>
                                  <select class="form-control"
                                          name="contactType" id="contactType" >
                                      <option value="">-- Select --</option>
                                      <option value="Donor">Donor</option>
                                      <option value="Sponsor">Sponsor</option>
                                      <option value="Visitor">Visitor</option>
                                      <option value="Other">Other</option>
                                  </select>
                              </div>
                              <script>
                                  document.getElementById("contactType").value = '<?php echo $row[contact_type]; ?>';
                              </script>
                              <div class="clearfix"></div>
                              <div class="card-footer">
                                  <input type="hidden" name="qid" value="<?php echo $guid; ?>">
                                  <input type="hidden" name="aid" value="<?php echo $guid; ?>">
                                  <button type="submit" name="submit" value="Edit" class="btn btn-primary icon-btn">
                                      <i class="fa fa-fw fa-lg fa-check-circle"></i>Update
                                  </button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      <?php
      } else if($action == 'deleteData') {
	       $q = $_GET['guid'];
	       $vth = $db->query ("DELETE FROM `contacts` WHERE `guid`='".$q."'" );
	       header('location:'.URL.'contacts.php');

      } else if($action == 'sendEmail') {
          ?>
          <a href="<?php echo URL; ?>contacts.php?id=<?php echo $guid; ?>" class="btn btn-info">Back</a>
          <div class="row">
              <div class="col-md-6">
                  <div class="card">
                      <h3 class="card-title">Send E-mail</h3>
                      <div class="card-body">
                          <form method="post" action="<?php echo $_SEVER['PHP_SELF']; ?>" enctype="multipart/form-data">

                              <div class="form-group">
                                  <label for="donation_options">Contact Type</label><br/>
                                  <select class="form-control"
                                          name="contactType" id="contactType" >
                                      <option value="">-- Select --</option>
                                      <option value="Donor">Donor</option>
                                      <option value="Sponsor">Sponsor</option>
                                      <option value="Visitor">Visitor</option>
                                      <option value="Other">Other</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label class="control-label">Subject</label>
                                  <input class="form-control" type="text" name="subject" id="subject">
                              </div>
                              <div class="form-group">
                                  <label for="message">Email Body</label>
                                  <textarea cols="30" rows="10" class="form-control" id="message" name="msg"
                                            placeholder="eg. Enter email content."></textarea>
                              </div>
                              <div class="form-group">
                                  <label for="photo" class="control-label">Attachment</label>
                                  <input type="file" class="form-control" id="attach" name="image">
                              </div>
                              <div class="clearfix"></div>
                              <div class="card-footer">
                                  <button type="submit" name="submit" value="Email" class="btn btn-primary icon-btn">
                                      <i class="fa fa-fw fa-lg fa-check-circle"></i>Send Email
                                  </button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <?php

      } else { ?>
	  
	  	 <?php if((isset($_POST) && $_POST['submit'] != 'EmailToSelected') &&
            (!isset($action) || isset($action) && $action != 'add') ) { ?>
          <form method="post" action="<?php echo $_SEVER['PHP_SELF']; ?>" enctype="multipart/form-data">


          <div class="col-md-12">
		  <div>
			 <a href="contacts.php?action=add&id=<?php echo $_GET[id];?>"
				class="btn btn-success"><i class="fa fa-lg fa-plus"></i>Add New Contact</a>&nbsp;&nbsp;

              <a href="contacts.php?action=sendEmail&id=<?php echo $_GET[id];?>"
                 class="btn btn-info">Send Bulk Email's</a>&nbsp;&nbsp;

              <button type="submit" name="submit" value="EmailToSelected" class="btn btn-primary icon-btn">
                  <i class="fa fa-fw fa-lg fa-check-circle"></i>Send Email To Selected Contacts
              </button>

          </div>

          <?php
            $sth = $db->query ("SELECT * FROM `contacts` ORDER BY `updated_at` desc, `guid` DESC");
			$count = $sth->rowCount(); ?>
            <div class="card">
              <div class="card-body">
                <table id="sampleTable" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th style="align:center;">Select</th>
                      <th>S No.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Contact Type</th>
                      <th>View Details</th>
					  <th>Edit/Delete</th>
                    </tr>
                  </thead>
				  
                  <tbody>
				  <?php 
					    if($count > 0) { 
						$m = 1;
						 while($row = $sth->fetch()) {
                        ?>
                    <tr>

                      <td style="align:center;"><input type="checkbox" class="checks" name="emails[]" value="<?php echo $row[name];?>#<?php echo $row[email];?>" id="<?php echo $row[email];?>"></td>
                      <td><?php echo $m; ?></td>
                      <td><?php echo $row[name];?> </td>
                      <td><?php echo $row[email]; ?></td>
                      <td><?php echo $row[mobile]; ?></td>
                      <td><?php echo $row[contact_type]; ?></td>
                      <td class="center"><div class="btn btn-xs btn-group-xs"><a href="contacts.php?action=viewDetails&guid=<?php echo $row[0]; ?>"  class="btn btn-warning"><i class="fa fa-eye icon-only"></i></a>  </div></td>
                        <td class="center"><div class="btn btn-xs btn-group-xs">
                                <a href="<?php echo URL; ?>contacts.php?action=edit&guid=<?php echo $row[guid]; ?>" class="btn btn-primary icon-btn">Edit </a>
                                <a href="<?php echo URL; ?>contacts.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> </div></td>

                    </tr>
	  				<?php $m++; } } ?>
                  </tbody>
                </table>
				
              </div>
            </div>
			
          </div>

          </form>
          <?php } ?>
        <?php } ?>
        </div>
      </div>
    </div>
	<?php include "footer.php";?>
    <!-- Javascripts-->

    <script type="text/javascript">
        // to remove from global namespace
    </script>

    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/essential-plugins.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>



	<script>
	function delete1()
	{
		if(window.confirm("Cofirm to delete"))
		{
			return true;
		}else
			return false;
	}
	</script>
  </body>
</html>