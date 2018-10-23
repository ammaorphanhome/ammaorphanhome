<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";$date=date('d-m-Y');extract($_GET);
if(isset($_POST) && $_POST['SaveEdit'] == 'Update') {
	//$date = date('Y-m-d');
	if($_POST['password']==$_POST['newpassword']){
		$sth = $db->prepare("SELECT * FROM login WHERE `guid`='$_SESSION[logInUser]'");
		$sth->execute();
		$row = $sth->fetch(PDO::FETCH_ASSOC);
    $oldpassword = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($row[securitykey]), $_POST['oldpassword'], MCRYPT_MODE_CBC, md5(md5($row[securitykey]))));
		$bth = $db->prepare("SELECT * FROM login WHERE `guid`='$_SESSION[logInUser]' AND password = '$oldpassword'");
		$bth->execute(array(':username' => $_POST['username'], ':password' => $password)); 
		$count = $bth->rowCount();
		if($count > 0 ) {
	$securitykey = uniqid();
	$password = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($securitykey), $_POST['password'], MCRYPT_MODE_CBC, md5(md5($securitykey))));
	$uth = $db->exec ("UPDATE `login` SET `password`='$password',`securitykey`='$securitykey'  WHERE `guid`='$_SESSION[logInUser]'");
	$post_msg = '<h4 style="color: green;">Password Successfully Updated</h4>';	
	header('location:'.URL.'change_password.php?post_msg='.$post_msg);
	} else { 
	$post_msg = '<h4 style="color: red;">Your Old Password is Incorrect</h4>';	
	header('location:'.URL.'change_password.php?post_msg='.$post_msg);
	}
} else {
	
	$post_msg = '<h4 style="color: red;">New Password and Confirm Password is Mismatch</h4>';	
	header('location:'.URL.'change_password.php?post_msg='.$post_msg);
	
}

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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <?php include "top_nav.php";?>
      <!-- Side-Nav-->
      <?php include "side_nav.php";?>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i> Change Password</h1>
            
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
             
              <li><a href="#">Change Password</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
			<?php if(!empty($post_msg)) { ?>
        <div class="page-header"> <?php echo $post_msg; ?> </div>
        <?php 
             }// $count;
			 ?>
              <h3 class="card-title">Change Password</h3>
              <div class="card-body">
                <form method="post" action="<?php echo $_SEVER['PHP_SELF'];?>" >
                  <div class="form-group">
                    <label class="control-label">Old Password</label>
                    <input type="password" name="oldpassword" placeholder="Old Password" class="form-control" required="">
                  </div>
                  <div class="form-group">
                    <label class="control-label">New Password</label>
                    <input type="password" name="password" placeholder="New Password" class="form-control" required="">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Confirm Password</label>
                    <input type="password" name="newpassword" placeholder="Confirm Password" class="form-control" required="">
                  </div>
				  
                  <div class="card-footer">
                <button type="submit" name="SaveEdit" value="Update" class="btn btn-primary icon-btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-warning"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
              </div>
                </form>
              </div>
             
            </div>
          </div>
          
          <div class="clearix"></div>
         
        </div>
      </div>
    </div>
	<?php include "footer.php";?>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/essential-plugins.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>