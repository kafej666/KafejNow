<?php
session_start();
require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library

$search = isset($_GET['searchterm2'])?$_GET['searchterm2']:'kafej666';
$notweets = 30;
$consumerkey = "8jewDtfYRGUTjuEmw6SmBA";
$consumersecret = "cSWn0F8nHUrIULyzjtdf3O6eBiVmfolO0iRALdqtpc";
$accesstoken = "344763706-UToM2i6iCwNRb4AWCiOYLJhqeIO31WQ43tfO1hcm";
$accesstokensecret = "bhojL1JstOzHrdvrpw4LrQDrC4frOymxrEVNa5lBu28ws";
  
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$search = str_replace("#", "%23", $search);
$tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=".$search."&count=".$notweets);
  
echo json_encode($tweets);
?>