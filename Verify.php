<?php
$access_token = 'QjIjKdJ+DscdUp2bLlh18TwMlk95YkXco7i5Of4NCJFTm2V/M7KeQ+WBNpzzFdXdWOL0IWWjWr1FLxn0F5zXir06qyn0fINVLkYcl81CqGR4VpXb014DyVQK4E3KFVdMvG7mfT8V56S7vg7+a97lJQdB04t89/1O/w1cDnyilFU=';
$url = 'https://api.line.me/v1/oauth/verify';
$headers = array('Authorization: Bearer ' . $access_token);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);
echo $result;
?>
