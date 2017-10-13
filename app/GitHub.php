<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GitHub extends Model
{
    public static function getLatestCommit(){


    	if(Auth::user()->github_username != null && Auth::user()->github_access_token != null){

	        $username = Auth::user()->github_username;
	        $accessToken = Auth::user()->github_access_token;
	        $url = "https://api.github.com/users/$username/events";

	        $curl = curl_init();
	        curl_setopt_array($curl, array(
	            CURLOPT_RETURNTRANSFER => true,
	            CURLOPT_URL => $url,
	            CURLOPT_USERAGENT => 'aarondunphy',
	            CURLOPT_USERPWD => "$username:$accessToken"
	        ));
	        $output = json_decode(curl_exec($curl));
	        curl_close($curl);

	        $data = [
	        	'repo' => $output[0]->repo->name,
	        	'author' => $output[0]->payload->commits[0]->author->name,
	        	'commit' => $output[0]->payload->commits[0]->message,
	        	'commit_url' => "https://github.com/" . $output[0]->repo->name . "/commit/" . $output[0]->payload->head
	    	];

	    	return $data;
    	}else{
    		return null;
    	}
        
    }

    public static function addAccount($data){
    	$url = "https://api.github.com/users";
    	$userpwd = $data['github_username'] . ":" . $data['github_access_token'];
    	$curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'aarondunphy',
            CURLOPT_USERPWD => $userpwd
        ));
        $output = json_decode(curl_exec($curl));
        curl_close($curl);

        if(isset($output->message)){
        	// failed login authentication
        	return false;
        }else{
        	
	    	$github = DB::table('users')
	            ->where('id', Auth::id())
	            ->update([
	            	'github_username' => $data['github_username'],
	            	'github_access_token' => $data['github_access_token']
	            ]);
			return $github;
		}
    }
}
