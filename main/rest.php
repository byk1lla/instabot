<?php

$url = 'http://localhost:3000/login'; 
$dataSource = 'data.json';

$data = file_get_contents($dataSource);

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
        if($httpCode == 0){
            echo "Sunucuya Ulaşılamıyor.";
            exit;
        }
        else{
            echo $response["errorMsg"] . " $username\n";
           
        }
    }
     else {
        if($response["Login"] == true){
            echo "Giriş Başarılı => $username\n";
        }else{
            echo $response["errorMsg"] . " $username\n";
            
        }
    }

    curl_close($ch);
}
