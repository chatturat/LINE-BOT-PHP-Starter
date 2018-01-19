<?php
$access_token = 'UmFNhzXE0Zc07TRxM/tS1Ob+GL8r+J1g/pbWFRdDEdNdoXXmFE53rSnERCpp9h3DWOL0IWWjWr1FLxn0F5zXir06qyn0fINVLkYcl81CqGRzjC/8I5pvxZzDDIxenqnqpnF8W+6eupIcFpsVQnubdQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
