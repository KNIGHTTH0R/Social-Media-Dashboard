@extends('layouts.master')

@section('content')
<div class="container">
	<a href="/dashboard">< Dashboard</a>
	<h1>Twitter</h1>

	<h2>Connect Twitter Account</h2>
	<form action="/twitter" method="POST">
		{{ csrf_field() }}

		<div class="form-group">
			<input type="text" name="screen_name" class="form-control" placeholder="Twitter Screen Name" required>
		</div>

		<div class="form-group">
			<input type="submit" value="Add" class="btn btn-success">
		</div>
		@include('errors/forms')
	</form>

</div>
@endsection