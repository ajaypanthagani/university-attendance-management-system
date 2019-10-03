<?php 
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require_once 'vendor/autoload.php'; 
 
use Twilio\Rest\Client; 
 
$sid    = "AC2abe7412595d7a46c53b04d65f99b467"; 
$token  = "b12f88f2ba0bfcd07fc87d2d3ccbab48"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create("+918374460442", // to 
                           array( 
                               "from" => "+19419093643",       
                               "body" => "Your message" 
                           ) 
                  ); 
 
print($message->sid);

