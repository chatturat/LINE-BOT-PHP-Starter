<?php
  $access_token = 'M9Pw1qYEBelMCEVn6MS1+0WlJ9XW4nlbBTEFmBaxDDFnjzIDmthTe1CGctmxkz+OWOL0IWWjWr1FLxn0F5zXir06qyn0fINVLkYcl81CqGS5vw8gQL4H4GFr1JnsqAmX50AJfZzffjlU935B3oikzAdB04t89/1O/w1cDnyilFU=';
  // Get POST body content
  $content = file_get_contents('php://input');
  // Parse JSON
  $events = json_decode($content, true);
  $events[] = "Content-Type: application/json"; //เพิ่ม
  $events[] = "Authorization: Bearer {$accessToken}";//เพิ่ม

  $message = $events['events'][0]['message']['text'];//เพิ่ม
  // Validate parsed JSON data
  if (!is_null($events['events'])) {	
    // Loop through each event	
    foreach ($events['events'] as $event) {		
      // Reply only when message sent is in 'text' format		
      if ($event['type'] == 'message' && $event['message']['type'] == 'text') {			
        // Get text sent			
        $text = $event['message']['text'];
        // Get replyToken			
        $replyToken = $event['replyToken'];			
        // Build message to reply back			
        $messages = [	'type' => 'text',	'text' => $text	];
        $messsage = [ 'type' => 'text', 'text' => "Hello"];
        // Make a POST Request to Messaging API to reply to sender			
        $url = 'https://api.line.me/v2/bot/message/reply';			
        $data = ['replyToken' => $replyToken,'messages' => [$messages]];			
        $post = json_encode($data);			
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
