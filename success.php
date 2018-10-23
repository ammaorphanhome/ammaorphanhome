<?php //print_r($_GET);
$data = $_POST;
$mac_provided = $data['mac'];
unset($data['mac']);
$ver = explode('.', phpversion());
$major = (int) $ver[0];
$minor = (int) $ver[1];
if($major >= 5 and $minor >= 4){
     ksort($data, SORT_STRING | SORT_FLAG_CASE);
}
else{
     uksort($data, 'strcasecmp');
}
$mac_calculated = hash_hmac("sha1", implode("|", $data), "b2ce61d9aa704437bfe0d363805c5f79");
if($mac_provided == $mac_calculated){
    echo "MAC is fine";

 if($data['status'] == "Credit"){//Payment if SUCCESS
 
    $data =$db->query("UPDATE orders SET payment_id='".$data['payment_id']."', payment_request_id='".$data['payment_request_id']."', payment_status='".$data['status']."' WHERE guid='".$_GET['order_id']."'") or die(mysql_error());
	?>
	<script type="text/javascript">
			alert('Your Pyment is sucess');
			window.location="index.php";
			</script>
	
	
<?php	}else{
	
	 $data = $db->query("UPDATE orders SET payment_id='".$data['payment_id']."', payment_request_id='".$data['payment_request_id']."', payment_status='".$data['status']."' WHERE guid='".$_GET['order_id']."'") or die(mysql_error());
	?>
	<script type="text/javascript">
			alert('Your Pyment is Unsucess');
			window.location="donate.php";
			</script>	
	
<?	
	}
} ?>