<?php ob_start();
session_start();
include "../config.php";
include "secure.php";
extract($_POST);
extract($_GET);
$title=mysql_fetch_array(mysql_query("select * from `title`"));
$login=mysql_fetch_array(mysql_query("select * from `login` where `guid`='$_SESSION[loginid]'"));

$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($login[key]), base64_decode($login[password]), MCRYPT_MODE_CBC, md5(md5($login[key]))), "\0");
if(isset($_POST) && $_POST['Submit']=="Update")
{
	if($decrypted==$oldpassword)
{
		
		$key = uniqid();
		
		
		$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $newpassword, MCRYPT_MODE_CBC, md5(md5($key))));
		//$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
		
			mysql_query("UPDATE `login` set `key`='$key',`password`='$encrypted'");
		
		
		?>
        <script type="text/javascript">
		alert("Password Updated");
		window.location="changepassword.php";
		</script>
        <?php
}
else
{
	?>
    <script type="text/javascript">
	alert("Old Password Wrong");
	window.location="changepassword.php";
	</script>
    <?php
}
}

?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.startbootstrap.com/flex-admin-v1.2/advanced-tables.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 03 Apr 2014 13:06:21 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title['name']; ?></title>

    <!-- PACE LOAD BAR PLUGIN - This creates the subtle load bar effect at the top of the page. -->
   <?php include "topscripts.php"; ?>

    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
 <script type="text/javascript">
 function valid()
 {
	if(document.form1.newpassword.value!=document.form1.repassword.value) 
	{
		alert("New Password and Repeat Passwords Mismatch");
		document.form1.newpassword.focus();
		return false;
	}
	 return true;
	 
	 
 }
 
 </script>

</head>

<body>

    <div id="wrapper">

        <!-- begin TOP NAVIGATION -->
        <?php include "header.php"; ?>
        <!-- /.navbar-top -->
        <!-- end TOP NAVIGATION -->

        <!-- begin SIDE NAVIGATION -->
        <?php include "sidemenu.php"; ?>
        <!-- /.navbar-side -->
        <!-- end SIDE NAVIGATION -->

        <!-- begin MAIN PAGE CONTENT -->
        <div id="page-wrapper">

            <div class="page-content">

                <!-- begin PAGE TITLE ROW -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>Change Password
                                
                            </h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-dashboard"></i>  <a href="changepassword.php">Change Password</a>
                                </li>
                                
                            </ol>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE ROW -->

                <!-- begin ADVANCED TABLES ROW -->
             
                <div class="row">

                    <div class="col-lg-6">

                        <div class="portlet portlet-green">
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4>Change Password</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive">
                                   <form name="form1" method="post" action="" onSubmit="return valid();">
				  
                      <table class="table table-bordered table-hover">
                      
                      <tbody>
                      
                         <tr>
                         
                          <td width="25%">Old Password</td>
                          <td width="5%">:</td>
                          <td width="70%"><input type="password" name="oldpassword" class="form-control"  required> </td>
                          
                        </tr>
                         <tr>
                         
                          <td width="25%">New Password</td>
                          <td width="5%">:</td>
                          <td width="70%"><input type="password" name="newpassword" class="form-control"  required> </td>
                          
                        </tr>
                         <tr>
                         
                          <td width="25%">Repeat Password</td>
                          <td width="5%">:</td>
                          <td width="70%"><input type="password" name="repassword" class="form-control"  required> </td>
                          
                        </tr>
                        <tr>
                          <td colspan="3" align="center"><input type="submit" name="Submit" value="Update" class="btn btn-primary"></td>
                          
                        </tr>
                       
                        
                       <tr><td height="60" colspan="3">&nbsp;</td></tr>
                        
                                                         
                      </tbody>
                    </table>
</form>                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.portlet-body -->
                        </div>
                        <!-- /.portlet -->

                    </div>
                    <!-- /.col-lg-12 -->

                </div>
                <!-- /.row -->
			
            </div>
            <!-- /.page-content -->

        </div>
        <!-- /#page-wrapper -->
        <!-- end MAIN PAGE CONTENT -->

    </div>
    <!-- /#wrapper -->

    <!-- GLOBAL SCRIPTS -->
   <?php include "bottoumscripts.php"; ?>

</body>


<!-- Mirrored from themes.startbootstrap.com/flex-admin-v1.2/advanced-tables.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 03 Apr 2014 13:06:22 GMT -->
</html>
