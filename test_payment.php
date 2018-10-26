<?php
require "cw_admin/lib/config.php";


$data =$db->query("SELECT * FROM `orders` WHERE `guid`='".$_GET['oid']."'");

if($info = $data->fetch()) {


    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER,
        array("X-Api-Key:test_5f4292c874a5f602a115c0aa965",
            "X-Auth-Token:test_7aac381962a51a81aae0776e7c7"));


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
        'redirect_url' => 'http://ammaorphanhome.org/test_success.php?order_id='.$info[guid],
        'send_email' => true,
        'webhook' => 'http://ammaorphanhome.org/test_success.php?order_id='.$info[guid],
        'send_sms' => true,
        'email' => $email,
        'allow_repeated_payments' => false
    );
//print_r($response);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    $response = curl_exec($ch);
    curl_close($ch);

    $json_decode = json_decode($response, true);
    $long_url = $json_decode ['payment_request']['longurl'];
    header('Location:'.$long_url);
    echo $response;
    print_r($response);

}
?>