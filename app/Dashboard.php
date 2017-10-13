<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Abraham\TwitterOAuth\TwitterOAuth;

class Dashboard extends Model
{
    public static function getLatestTweet($screen_name){
    	$consumerKey = env('TWITTER_CONSUMER_KEY');
		$consumerSecretKey = env('TWITTER_SECRET_KEY');
		$accessToken = env('TWITTER_ACCESS_TOKEN');
		$accessTokenSecret = env('TWITTER_ACCESS_TOKEN_SECRET');

    	$connection = new TwitterOAuth($consumerKey, $consumerSecretKey, $accessToken, $accessTokenSecret);
		$content = $connection->get("statuses/user_timeline", ['screen_name' => $screen_name, 'count' => 1]);
		return $content;
    }
}
