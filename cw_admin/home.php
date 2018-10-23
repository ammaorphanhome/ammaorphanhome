<?php ob_start(); 
error_reporting(0);
session_start();
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_POST); 
extract($_GET);
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
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <!--p> admin template</p--->
          </div>
          <div>
            <ul class="breadcrumb">
              <li><table width="100%" cellpadding="0" cellspacing="0" border="0">
  <?php $da=date("l F d,Y,"); ?>
  <form name="Tick">
  <?php echo $da ?><input type="text" size="10" name="Clock" style="background:none; color:#376206; font:14px Arial; border:none">
  </form>
  
  </table></li>
			  
            </ul>
          </div>
        </div>
        <div class="row mt-20">
          
          <div class="col-sm-offset-2 col-sm-8">
		  <div class="col-sm-6">
            <div class="widget-small danger"><i class="icon fa fa-photo fa-3x"></i>
              <div class="info">
                <h4>Album Photos</h4>
				<?php $sth=$db->query("SELECT * FROM past_conferences")->rowCount();?>
                <p> <b><?php echo $sth;?></b></p>
              </div>
            </div>
            </div>
         
			
			<div class="col-sm-6">
            <div class="widget-small info"><i class="icon fa fa-film fa-3x"></i>
              <div class="info">
                <h4>Videos</h4>
				<?php $lrow=$db->query("SELECT * FROM events")->rowCount();?>
                <p> <b><?php echo $lrow;?></b></p>
              </div>
            </div>
            </div>
			<!--div class="col-sm-6">
			<div class="widget-small primary coloured-icon"><i class="icon fa fa-star fa-3x"></i>
              <div class="info">
                <h4>Stars</h4>
                <p> <b>0</b></p>
              </div>
            </div>
            </div--->
            
            
          </div>
          <div class="clearfix"></div>
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
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.vmap.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.vmap.world.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.vmap.sampledata.js"></script>
    <script>
<!--
/*By George Chiang (JK's JavaScript tutorial)
http://javascriptkit.com
Credit must stay intact for use*/
function show(){
var Digital=new Date()
var hours=Digital.getHours()
var minutes=Digital.getMinutes()
var seconds=Digital.getSeconds()
var dn="AM"
if (hours>12){
dn="PM"
hours=hours-12
}
if (hours==0)
hours=12
if (minutes<=9)
minutes="0"+minutes
if (seconds<=9)
seconds="0"+seconds
document.Tick.Clock.value=hours+":"+minutes+":"+seconds+" "+dn
setTimeout("show()",1000)
}
show()
//-->
</script>
  </body>
</html>