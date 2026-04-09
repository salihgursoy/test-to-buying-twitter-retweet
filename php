<?php
require "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

// Your app credentials from X Developer Portal
$consumerKey = "YOUR_CONSUMER_KEY";
$consumerSecret = "YOUR_CONSUMER_SECRET";

// User access tokens (must belong to the account that will retweet)
$accessToken = "YOUR_ACCESS_TOKEN";
$accessTokenSecret = "YOUR_ACCESS_TOKEN_SECRET";

// The user ID of the account performing the retweet
$userId = "YOUR_USER_ID";

// The tweet ID you want to retweet
$tweetId = "TWEET_ID_TO_RETWEET";

// Create a connection to X API
$connection = new TwitterOAuth(
    $consumerKey,
    $consumerSecret,
    $accessToken,
    $accessTokenSecret
);

// Send retweet request
$response = $connection->post("users/{$userId}/retweets", [
    "tweet_id" => $tweetId
]);

// Debug output
if ($connection->getLastHttpCode() == 200) {
    echo "Retweet successful!";
} else {
    echo "Retweet failed:\n";
    print_r($response);
}
