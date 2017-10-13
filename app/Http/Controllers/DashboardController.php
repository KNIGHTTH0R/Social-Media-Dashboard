<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dashboard;

class DashboardController extends Controller
{
    public function index(){
    	$screen_name = 'twitter';
    	$latestTweet = Dashboard::getLatestTweet($screen_name);

    	return view('dashboard', compact('latestTweet'));
    }
}
