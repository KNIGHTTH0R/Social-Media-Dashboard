<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Instagram extends Model
{
    public static function addInstagramAccount($data){
    	$client_id = env('INSTAGRAM_CLIENT_ID');
        $client_secret = env('INSTAGRAM_SECRET_ID');
        $url = 'https://api.instagram.com/oauth/access_token';
        $code = $data['code'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url,
            CURLOPT_POSTFIELDS => [
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'grant_type' => 'authorization_code',
                'redirect_uri' => 'http://social-media-dashboard.dev/instagram-response',
                'code' => $code

            ]
        ));
        $output = json_decode(curl_exec($curl));
        curl_close($curl);

        if(isset($output->access_token)){
        	$access_token = $output->access_token;
        	
        	$instagram = DB::table('users')
            	->where('id', Auth::id())
            	->update(['instagram_access_token' => $access_token]);

            if($instagram){
            	return true;
            }else{
            	return false;
            }

        }else{
        	// user failed to authenticate
        	return false;
        }
    }

    public static function getLatestInstagram(){
    	$access_token = Auth::user()->instagram_access_token;
    	$url = "https://api.instagram.com/v1/users/self/media/recent/?access_token=$access_token&count=1";

    	$curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url
        ));
        $output = json_decode(curl_exec($curl));
        curl_close($curl);

        $data = [
        	'caption' => $output->data[0]->caption->text,
        	'img_url' => $output->data[0]->images->standard_resolution->url
        ];

        return $data;

    }
}
