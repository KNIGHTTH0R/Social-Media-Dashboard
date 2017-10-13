<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{	
	public function __construct(){
		$this->middleware('guest', ['except' => ['logout']]);
	}

    public function index(){
        return view('home/login');
    }

    public function register(){
        return view('home/register');
    }

    public function logout(){
    	Auth::logout();
		return redirect('/');
    }
}
