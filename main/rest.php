<?php

$url = 'http://localhost:3000/login'; 
$dataSource = 'data.json';

$data = file_get_contents($dataFile);

$userinformation = json_decode($data, true);

foreach ($userinformation as $username => $password) {
    $data = [
        "insta" => [
            'username' => $username,
            'password' => $password
        ],
        'username' => "YOUR_USERNAME"
    ];

    $postData = json_encode($data);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $response = json_decode($response, true);
    if ($httpCode != 200) {
        
        echo $response["message"] .  " => $username" . "\n";
    } else {
        echo $response["message"] .  " => $username" . "\n";
    }

    curl_close($ch);
}
