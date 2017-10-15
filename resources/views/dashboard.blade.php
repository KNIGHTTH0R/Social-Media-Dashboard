@extends('layouts.master')

@section('content')
<div class="container dashboard-hero">
	<h1>Dashboard</h1>
</div>

<div class="container dashboard-container">
	<div class="row">
		<div class="col-md-4">
			<h2>Twitter</h2>
			@if(isset($latestTweet))
				{{ $latestTweet[0]->text }}
			@else
				<a href="/twitter">Connect Twitter Account</a>
			@endif
		</div>

		<div class="col-md-4">
			<h2>Instagram</h2>
			@if(isset($latestInstagram))
				<img src="{{ $latestInstagram['img_url'] }}" alt="" style="width: 100%;">
				{{ $latestInstagram['caption'] }}
			@else
				<a href="/instagram">Connect Instagram Account</a>
			@endif

		</div>

		<div class="col-md-4">
			<h2>GitHub</h2>
			@if(isset($latestCommit))
			<a href="{{ $latestCommit['commit_url'] }}" target="_blank">
			"{{ $latestCommit['commit'] }}" - {{ $latestCommit['author'] }}

			{{ $latestCommit['repo'] }}
			@else
				<a href="/github">Connect GitHub Account</a>
			@endif
			</a>
		</div>
	</div>

</div>

@endsection