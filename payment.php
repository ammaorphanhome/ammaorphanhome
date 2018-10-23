<?php 
require "cw_admin/lib/config.php";


$data =$db->query("SELECT * FROM `orders` WHERE `guid`='".$_GET['oid']."'");
	
if($info = $data->fetch()) {
 
 
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:19bf1495dabe8eee14c01fbd14eb3aec",
                  "X-Auth-Token:c40bbd668ead7811ac67465f01a8cc09"));
    
   
    $fullname = $info['name'];
    $amount = $info['price']; 
    $phone = $info['mobile'];
    $email = $info['email'];

    
$payload = Array(
     'status' => 'Pending',

    'purpose' => 'Donation' ,
    'amount' => $amount,
    'phone' => $phone,
    'buyer_name' => $fullname,
    'redirect_url' => 'http://readytolaunchwebsites.com/models/S/ammaorphan.org/success.php?order_id='.$info[guid],
    'send_email' => true,
    'webhook' => 'http://readytolaunchwebsites.com/models/S/ammaorphan.org/success.php?order_id='.$info[guid],
    'send_sms' => true,
    'email' => $email,
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

$json_decode = json_decode($response, true);
$long_url = $json_decode ['payment_request']['longurl'];
header('Location:'.$long_url);
echo $response;

}
?>