@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 ml-auto mr-auto">
			<h1>Social Media Dashboard</h1>
			<p>Display your latest social media activity on your dashboard.</p>

			<h2>Register</h2>
			<form actin="/register" method="POST" class="home-form">
				{{ csrf_field() }}
				<div class="form-group">
					<input type="text" name="name" class="form-control" placeholder="Name" required>
				</div>
				<div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="Email" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Password" required>
				</div>
				<div class="form-group">
					<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success">
				</div>
				@include('errors/forms')
			</form>
			<a href="/login">Already have an acccount? Login.</a>
		</div>
	</div>
</div>
@endsection