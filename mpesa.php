<?php
if (isset($_POST['submit'])) {
    // $phone = $_POST['phone'];
    $phone = '254702482705';


    $ch = curl_init('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Basic cFJZcjZ6anEwaThMMXp6d1FETUxwWkIzeVBDa2hNc2M6UmYyMkJmWm9nMHFRR2xWOQ==']);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    $accessToken = json_decode($response)->access_token;
    // echo $accessToken;
    $timestamp = '20' . date("ymdhis");
    $BusinessShortCode = '174379';
    $LipaNaMpesaPasskey = "passkey";


    $password = base64_encode($BusinessShortCode . $LipaNaMpesaPasskey . $timestamp);



    $ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $accessToken,
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{
        "BusinessShortCode": 174379,
        "Password": "' . $password . '",
        "Timestamp": "' . $timestamp . '",
        "TransactionType": "CustomerPayBillOnline",
        "Amount": 1,
        "PartyA": ' . $phone . ',
        "PartyB": 174379,
        "PhoneNumber": ' . $phone . ',
        "CallBackURL": "https  callback url",
        "AccountReference": "CompanyXLTD",
        "TransactionDesc": "Payment of X" 
    }');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
}
else {

}
echo $response;


?>