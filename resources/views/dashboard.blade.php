@extends('layouts.master')

@section('content')
<div class="container">
	<h1>Dashboard</h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h2>Latest Tweet:</h2>
			@if(isset($latestTweet))
				{{ $latestTweet[0]->text }}
			@else
				<a href="/twitter">Connect Twitter Account</a>
			@endif
		</div>

		<div class="col-md-4">
			<h2>Latest Instagram:</h2>
			
		</div>
	</div>

</div>

@endsection