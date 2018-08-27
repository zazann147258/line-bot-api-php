<?php
$access_token = '54j5YXV6p0OstjUH77O78NUazA6aUH76JAIfa3wShK/+LLudqkplyCvx4W1wVQffyfTEsoM4sHwyUAy/3koVFEC+mS8DKuhzRLeq8WKSTg4yloWnYKWq/WEF5ZY5XAqnDKidepqmx1a0SJtJa9oX+gdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;