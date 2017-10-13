@extends('layouts.master')

@section('content')
<div class="container">
	<h1>Dashboard</h1>

	<h2>Latest Tweet:</h2>
	{{ $latestTweet[0]->text }}

	<h2>Latest Instagram</h2>
</div>
@endsection