@extends('layouts.master')

@section('content')
<div class="container">
	<h1>Login</h1>
	<form action="/login" method="POST">
		{{ csrf_field() }}

		<div class="form-group">
			<input type="email" name="email" class="form-control" placeholder="Email" required>
		</div>

		<div class="form-group">
			<input type="password" name="password" class="form-control" placeholder="Password" required>
		</div>
		<div class="form-group">
			<input type="submit" value="Login" class="btn btn-success">
		</div>
		@include('errors/forms')
	</form>
	<a href="/register">Not signed up? Register.</a>
</div>
@endsection