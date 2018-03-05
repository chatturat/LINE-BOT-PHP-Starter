<?php$access_token = 'QjIjKdJ+DscdUp2bLlh18TwMlk95YkXco7i5Of4NCJFTm2V/M7KeQ+WBNpzzFdXdWOL0IWWjWr1FLxn0F5zXir06qyn0fINVLkYcl81CqGR4VpXb014DyVQK4E3KFVdMvG7mfT8V56S7vg7+a97lJQdB04t89/1O/w1cDnyilFU=';
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
      $data = [				'replyToken' => $replyToken,				'messages' => [$messages],			];			
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
