<?php ob_start(); error_reporting(0);
//require "lib/path.php";
require "lib/config.php";
//require "secure.php";
extract($_GET);
extract($_POST);
$date = date('Y-m-d');
if(isset($_POST) && $_POST['Submit']=="updatestatus") {
    
  //echo "UPDATE story SET status='$status' WHERE guid='$guid'"; exit;
  
  $query=$db->query("UPDATE chapters SET status='$status' WHERE guid='$guid'");
  

}