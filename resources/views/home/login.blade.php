@extends('layouts.master')
<div class="home-container">
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 ml-auto mr-auto">
			<h1>Social Media Dashboard</h1>
			<p>Display your latest social media activity on your dashboard.</p>

			<h2>Login</h2>
			<form action="/login" method="POST" class="home-form">
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
	</div>
</div>
@endsection
</div>