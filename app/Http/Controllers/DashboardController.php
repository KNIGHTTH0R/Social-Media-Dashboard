<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Twitter;
use App\GitHub;
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

    	return view('dashboard', compact('latestTweet', 'latestCommit'));
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
}
