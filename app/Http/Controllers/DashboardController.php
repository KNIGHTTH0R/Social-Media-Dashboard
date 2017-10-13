<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Twitter;
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

    	return view('dashboard', compact('latestTweet'));
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
}
