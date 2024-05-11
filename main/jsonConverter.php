<?php

$txt = 'data.txt';

$json = 'data.json';

$data = file_get_contents($txt);

$lines = explode("\n", $data);

$jsonData = array();
foreach ($lines as $line) {
    if (empty($line) || strpos($line, ':') === false) {
        continue;
    }
    $pieces = explode(":", $line);
    if (count($pieces) < 2) {
        continue;
    }
    
    $username = trim($pieces[0]);
    $password = trim($pieces[1]);
    $jsonData[$username] = $password;
}
file_put_contents($json, json_encode($jsonData, JSON_PRETTY_PRINT));

echo "JSON dosyası oluşturuldu: $json";
