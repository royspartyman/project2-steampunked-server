<?php
// File: gcm.php

$pdo = pdo_connect();
$sql = "select token, username from gcm";
$stmt = $pdo->prepare($sql);
$stmt->execute(array());

$gcmIds = array();
$gcmusername = arra();
foreach($stmt as $row) {
    echo $row['token'];
    $gcmIds[] = $row['token'];
    $gcmusername[] = $row['username'];
}

// Open connection
$url = 'https://android.googleapis.com/gcm/send';
$ch = curl_init($url);
curl_setopt( $ch, CURLOPT_POST, true );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

// Create the HTTP header
$apiKey = "AIzaSyCrHfhrz_l-z8P2av4Hptd-zqVyhgBf8AY";
$headers[0] = 'Authorization: key=' . $apiKey;
$headers[1] = 'Content-Type: application/json';
curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);

// Message to send and ID's are POST data
$data['message'] = "turn";

$fields['registration_ids'] = $gcmIds;
$fields['data'] = $data;
echo '<pre>';
print_r($fields);

curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );

// Execute HTTP post
$result = curl_exec($ch);
print_r($result);
echo '</pre>';

// Close connection
curl_close($ch);



function pdo_connect() {
    try {
        // Production server
        $dbhost="mysql:host=mysql-user.cse.msu.edu;dbname=elhazzat";
        $user = "elhazzat";
        $password = "superstudent";
        return new PDO($dbhost, $user, $password);
    } catch(PDOException $e) {
        die( "Unable to select database");
    }
}
