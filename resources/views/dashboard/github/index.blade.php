@extends('layouts.master')

@section('content')
<div class="container">
	<a href="/dashboard">< Dashboard</a>
	<h1>GitHub</h1>

	<h2>Connect GitHub Account</h2>
	<form action="/github" method="POST">
		{{ csrf_field() }}

		<div class="form-group">
			<input type="text" name="github_username" class="form-control" placeholder="GitHub Username" required>
		</div>

		<div class="form-group">
			<input type="text" name="github_access_token" class="form-control" placeholder="GitHub Access Token" required>
		</div>

		<div class="form-group">
			<input type="submit" value="Add" class="btn btn-success">
		</div>
		@include('errors/forms')
	</form>

</div>
@endsection