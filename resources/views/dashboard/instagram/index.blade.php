@extends('layouts.master')

@section('content')
<div class="container">
	<a href="/dashboard">< Dashboard</a>
	<h1>Instagram</h1>

	<h2>Connect Instagram Account</h2>
	<a href="https://api.instagram.com/oauth/authorize/?client_id=02d56a09921246bf84a034db2a066886&redirect_uri=http://social-media-dashboard.dev/instagram-response&response_type=code">Connect</a>
</div>
@endsection