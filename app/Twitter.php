<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Facades\DB;

class Twitter extends Model
{
    public static function index($screen_name){
    	$consumerKey = env('TWITTER_CONSUMER_KEY');
		$consumerSecretKey = env('TWITTER_SECRET_KEY');
		$accessToken = env('TWITTER_ACCESS_TOKEN');
		$accessTokenSecret = env('TWITTER_ACCESS_TOKEN_SECRET');

    	$connection = new TwitterOAuth($consumerKey, $consumerSecretKey, $accessToken, $accessTokenSecret);
		$content = $connection->get("statuses/user_timeline", ['screen_name' => $screen_name, 'count' => 1]);
		return $content;
    }

    public static function addAccount($data){
    	$twitter = DB::table('users')
            ->where('id', Auth::id())
            ->update(['twitter_screen_name' => $data['screen_name']]);
		return $twitter;
    }
}