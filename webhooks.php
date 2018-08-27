<?php
$access_token = '54j5YXV6p0OstjUH77O78NUazA6aUH76JAIfa3wShK/+LLudqkplyCvx4W1wVQffyfTEsoM4sHwyUAy/3koVFEC+mS8DKuhzRLeq8WKSTg4yloWnYKWq/WEF5ZY5XAqnDKidepqmx1a0SJtJa9oX+gdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON 
dataif (!is_null($events['events'])) {	
	// Loop through each event	
	foreach ($events['events'] as $event) {		
		// Reply only when message sent is in 'text' format		
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {			
			// Get text sent			
			$text = $event['message']['text'];			
			// Get replyToken			
			$replyToken = $event['replyToken'];			
			// Build message to reply back			
			$messages = [				'type' => 'text',				'text' => $text			];			
			// Make a POST Request to Messaging API to reply to sender			
			$url = 'https://api.line.me/v2/bot/message/reply';			
			$data = [				'replyToken' => $replyToken,				'messages' => [$messages],			];			$post = json_encode($data);			
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);			
			$ch = curl_init($url);			
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");			
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);			
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);			
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);			
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);			
			$result = curl_exec($ch);			
			curl_close($ch);			
			echo $result . "";		
			}	
			}
			}
			echo "OK";