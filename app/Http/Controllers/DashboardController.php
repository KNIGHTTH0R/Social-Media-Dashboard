<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Twitter;
use App\GitHub;
use App\Instagram;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

    public function index(){
    	$screen_name = Auth::user()->twitter_screen_name;
    	if($screen_name){
    		$latestTweet = Twitter::index($screen_name);
    	}

        $latestCommit = GitHub::getLatestCommit();

        if(Auth::user()->instagram_access_token){
            $latestInstagram = Instagram::getLatestInstagram();
        }

    	return view('dashboard', compact('latestTweet', 'latestCommit', 'latestInstagram'));
    }

    public function twitter(){
    	return view('dashboard/twitter/index');
    }

    public function addTwitterAccount(Request $request){

    	$request->validate([
            'screen_name' => 'required'
    	]);

    	$account = Twitter::addAccount($request->input());
    	if($account){
    		return redirect()->home();
    	}else{
    		return redirect()->back();
    	}
    }

    public function github(){
        return view('dashboard/github/index');
    }

    public function addGitHubAccount(Request $request){

        $request->validate([
            'github_username' => 'required',
            'github_access_token' => 'required'
        ]);

        $account = GitHub::addAccount($request->input());
        if($account){
            return redirect()->home();
        }else{
            return redirect()->back()->withErrors(['badcredentials' => 'Your login details are incorrect']);
        }
    }

    public function instagram(){
        return view('dashboard/instagram/index');
    }


    public function instagramResponse(Request $request){

        $instagram = Instagram::addInstagramAccount($request->input());
        return redirect()->home();
        
    }

}