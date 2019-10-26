<?php
$access_token = 'Vrt2nU13R4ucf2xg6WN5n4Z9+qO4ADuB6GcruFri1Ix3I8gb6MKLBRhQNjgPgJfhssqJcbco3DBJlfQFiP6ryEBlN2ufr552CJyYJWIwdo2fFEfL0TB/mYpTebxOsmwr4EvpUjRpdYAws1WpD2fbOgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
