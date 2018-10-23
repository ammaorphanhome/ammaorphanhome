<?php ob_start(); 
error_reporting(0);
session_start();
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
extract($_POST); 
extract($_GET);
if(isset($_POST) && $_POST['submit'] == 'SIGN IN') {  
     
	 if($_POST['captcha']==$_SESSION['code'])
	 {
		//print_r($_POST); exit;
		$lusername = stripslashes($username);
		$lpassword = stripslashes($password);
       // echo "SELECT * FROM `login` WHERE `username` = '$lusername' AND `status` = 'Active'";
		$sth = $db->query("SELECT * FROM `login` WHERE BINARY `username` = BINARY '$lusername' AND `status` = 'Active'");
		$row = $sth->fetch();
		if(!empty($row['guid'])){
		   //print($row[username]); exit;
        	$encpassword = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($row['securitykey']), $lpassword, MCRYPT_MODE_CBC, md5(md5($row['securitykey']))));
		//echo $encpassword; exit;
		$bth = $db->prepare("SELECT * FROM login WHERE BINARY username = BINARY :username AND password = :password AND status = 'Active'");
		$bth->execute(array(':username' => $lusername, ':password' => $encpassword)); 
		$count = $bth->rowCount();
			if($count > 0 ) {
					//$data = $sth->fetchAll();
					//print_r($row); exit;
					session_start();
					$_SESSION['authenticate'] = true;
					$_SESSION['logInUser'] = $row[guid];
					$_SESSION['loginRole'] = $row[role];;
					header('location: '.URL.'home.php');
			} else { 
					session_start();
					session_destroy();
					$post_msg= 'Username / Password Mismatch';
					header('location: '.URL.'login.php?post_msg='.$post_msg);
			}
		}  else { 

				session_start();
				session_destroy();
				$post_msg= 'Username / Password Mismatch';
				header('location: '.URL.'login.php?post_msg='.$post_msg);
	}

} else { 

				session_start();
				session_destroy();
				$post_msg= 'You Entered Wrong Captcha';
				header('location: '.URL.'login.php?post_msg='.$post_msg);
	}
}
if(isset($_POST) && $_POST['submit'] == 'RESET')
{
		//print_r($_POST); exit;
		$sth = $db->prepare("SELECT * FROM login WHERE BINARY username = '".$_POST['username']."' AND BINARY email = '$email'");
		$sth->execute();
		$row = $sth->fetch(PDO::FETCH_ASSOC);
		//print_r($row); exit;
		//$count = $sth->rowCount();
		if(!empty($row[guid])){
			//print($row[username]); exit;
			//echo rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($row['securitykey']), base64_decode($row['password']), MCRYPT_MODE_CBC, md5(md5($row['securitykey']))), "\0"); exit;
			
  $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($row['securitykey']), base64_decode($row['password']), MCRYPT_MODE_CBC, md5(md5($row['securitykey']))), "\0");
  			$to=$row['email'];
			$subject="Forgot Password Details from ammaorphanhome.org";
			$message="Your Login Details\n
			Username  :  $row[username] \n
			Password  :  $decrypted 
			";
			//echo $message;exit;
			$from = "no-reply@ammaorphan.org";
			$headers = "From:" . $from;
			mail($to,$subject,$message,$headers);
	$post_msg = 'Password Sent Successfully To Mail ID';	
	header('location:'.URL.'login.php?action=for&&post_msg='.$post_msg);
		}else{
				$post_msg= 'Username / Email ID Mismatch';
				header('location: '.URL.'login.php?action=for&&post_msg='.$post_msg);
		
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
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Admin</h1>
      </div>
     
	  
	  
	  <?php if(isset($action) && $action='for') { ?>
	   <div class="login-box">
	   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="col-md-12">
	   <br>
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
		  
		   <center><?php if(!empty($post_msg)) { ?>
      <p class="bigger-110"> <font color="#FF0000"><?php echo $post_msg; ?></font> </p>
      <?php  } ?></center>
		  
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input type="text" name="username" placeholder="Username" class="form-control">
          </div>
		  <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input type="text" name="email" placeholder="Email" class="form-control">
          </div>
          <div class="form-group btn-container">
            <button type="submit" name="submit" value="RESET" class="btn btn-primary btn-block">RESET <i class="fa fa-unlock fa-lg"></i></button>
          </div>
          <div class="form-group mt-20">
            <p class="semibold-text mb-0"><a id="" href="login.php"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
	  </div>
	  <?php } else { ?>
	   <div class="login-box">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="login-form">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
		  <center><?php if(!empty($post_msg)) { ?>
      <p class="bigger-110"> <font color="#FF0000"><?php echo $post_msg; ?></font> </p>
      <?php  } ?></center>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input type="text" placeholder="Username" name="username" class="form-control">
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input type="password" placeholder="Password" name="password" class="form-control">
          </div>
		  <div class="form-group" >
          	<img src="captcha/captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' >
             <a href='javascript: refreshCaptcha();'>Refresh Code</a>
           </div>
		   <div class="form-group">
            <label class="control-label"> ENTER CAPTCHA</label>
                 <input type="text" class="form-control" id="inputCaptcha" placeholder="Enter Code Here" name="captcha" required>
           </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label class="semibold-text">
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div>
              <p class="semibold-text mb-0"><a href="login.php?action=for">Forgot Password ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button type="submit" name="submit" value="SIGN IN" class="btn btn-primary btn-block">SIGN IN <i class="fa fa-sign-in fa-lg"></i></button>
          </div>
        </form>
		</div>
	  <?php } ?>
      
    </section>
  </body>
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/essential-plugins.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins/pace.min.js"></script>
  <script src="js/main.js"></script>
  <script language='JavaScript' type='text/javascript'>
   function refreshCaptcha()
  {
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
  }
  </script>
</html>