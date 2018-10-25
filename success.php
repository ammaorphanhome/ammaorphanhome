<?php //print_r($_GET);
require "cw_admin/lib/config.php";

$pay_id=$_REQUEST['payment_id'];
$req=$_REQUEST['payment_request_id'];
//print_r($_REQUEST);
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payments/'.$pay_id.'/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
    array("X-Api-Key:19bf1495dabe8eee14c01fbd14eb3aec",
        "X-Auth-Token:c40bbd668ead7811ac67465f01a8cc09"));

$response = curl_exec($ch);
curl_close($ch);

$json=json_decode($response,TRUE);

if($json['success']==true){
    echo "payment done";
    $payment=$json['payment'];


    $data =$db->query("UPDATE orders SET payment_id='".$_REQUEST['payment_id']."', date='".$payment['created_at']."' ,payment_request_id='".$_REQUEST['payment_request_id']."', payment_status='".$payment['status']."' WHERE guid='".$_GET['order_id']."'") or die(mysql_error());
?>
    <script type="text/javascript">
        alert('Your Payment is sucess');
		window.location="index.php";
	</script>

    <?php
}
else{
    echo "payment failed";
    $data = $db->query("UPDATE orders SET payment_id='".$_REQUEST['payment_id']."', date='".$payment['created_at']."',  payment_request_id='".$_REQUEST['payment_request_id']."', payment_status='".$payment['status']."'  WHERE guid='".$_GET['order_id']."'") or die(mysql_error());
    ?>

    <script type="text/javascript">
        alert('Your Pyment is Unsucess');
			window.location="donate.php";
	</script>
<?php
    }
?>

