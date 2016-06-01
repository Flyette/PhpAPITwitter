<?php
ini_set('display_errors', 1);
require 'vendor/autoload.php';

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => "",
    'consumer_secret' => ""
);

$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";

$requestMethod = "GET";

$getfield = '?screen_name=SehliHayate&count=1';


$twitter = new TwitterAPIExchange($settings);
	 $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();


$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);



if(isset($string["errors"][0]["message"])) {
	echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string["screen_name"][0]["message"]."</em></p>";
	exit();
}
echo '<p id="datetweet">';
$time = $string[0]['created_at'];
echo date('d-m-Y H:i', strtotime($time));

echo '</p>';
echo '<p id="lasttweet">';
echo $string[0]['text'];
echo '</p>';
