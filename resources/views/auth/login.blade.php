@extends('css.layout')
@if(session()->has('logout'))
	{{session('logout')}}
	@endif
	@section('isi')
	<div class="container">
	<div class="my-3 w-50">
	<h1>Login</h1>
	<form method="post" action="/login" class="">
		@csrf
		<label class="form-label">Username</label>
		<br>
		<input class="form-control" type="text" tabindex="" name="username">
		@error('username')
		<div class="invalid-feedback"></div>
		{{ $message }}
		@enderror
		<br>
		<label class="form-label">Password</label>
		<br>
		<input class="form-control" type="password" tabindex="" name="password">
		@error('password')
		<div class="invalid-feedback"></div>
		{{ $message }}
		@enderror
		<br>
		<button class="btn btn-primary" type="submit">log in</button>
		<p>
		@if(session()->has('login'))
		{{session('login')}} 
		@endif
	</form>
	<a href="/">Back</a>
	</div>
	</div>
	@endsection