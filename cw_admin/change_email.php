<?php ob_start(); 
error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
$date=date('d-m-Y');
extract($_GET);
extract($_POST);

if(isset($_POST) && $_POST['SaveEdit'] == 'Update') {
	//$date = date('Y-m-d');
	//echo "UPDATE `login` SET `email`='$email'  WHERE `guid`='$_SESSION[logInUser]'";exit;
	$uth = $db->exec ("UPDATE `login` SET `email`='$email'  WHERE `guid`='$_SESSION[logInUser]'");
	if($uth) {
	$post_msg = '<h4 style="color: green;">Email Successfully Updated</h4>';	
	header('location:'.URL.'change_email.php?post_msg='.$post_msg);
	} else { 
	$post_msg = '<h4 style="color: red;">Sorry Please try Again</h4>';	
	header('location:'.URL.'change_email.php?post_msg='.$post_msg);
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
            <h1><i class="fa fa-edit"></i> Change Email</h1>
            
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              
              <li><a href="#">Change Email</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
			<?php if(!empty($post_msg)) { ?>
        <div class="page-header no-padding-bottom"> <?php echo $post_msg; ?> </div>
        <?php 
								}
								
								
								// $count;
								 ?>
              <h3 class="card-title">Change Email</h3>
              <div class="card-body">
			  <?php
											  $gth = $db->query("SELECT * FROM `login` WHERE `guid`='$_SESSION[logInUser]'");
											  $grow = $gth->fetch();
											   ?>
                <form method="post" action="<?php echo $_SEVER['PHP_SELF'];?>" >
                  
                  <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="email" name="email" value="<?php  echo $grow['email'];?>" placeholder="Enter email address" class="form-control">
                  </div>
                 
                  
                  <div class="card-footer">
                <button type="submit" name="SaveEdit" value="Update" class="btn btn-primary icon-btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;<button type="reset" name="" class="btn btn-warning"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
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