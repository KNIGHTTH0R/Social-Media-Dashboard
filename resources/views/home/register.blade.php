@extends('layouts.master')

@section('content')
<div class="container">
	<h1>Register</h1>
	<form actin="/register" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<input type="text" name="name" class="form-control" placeholder="Name">
		</div>
		<div class="form-group">
			<input type="email" name="email" class="form-control" placeholder="Email">
		</div>
		<div class="form-group">
			<input type="password" name="password" class="form-control" placeholder="Password">
		</div>
		<div class="form-group">
			<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
		</div>
		<input type="submit" class="btn btn-success">
		@include('errors/forms')
	</form>
	<a href="/login">Already have an acccount? Login.</a>
</div>
@endsection