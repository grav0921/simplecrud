@extends('css.layout')
	@section('isi')
	<div class="container my-3">
	<h1>Register</h1>
	<form method="post" action="/register">
	@csrf
	<div class="w-50">
	<div class="mb-3">
    	<label for="exampleInputEmail1" class="form-label">Nama</label>
    	<input type="text" class="form-control" name="nama">
    	@error('nama')
    	<div class="invalid-feedback"></div>
    	{{$message}}
    	@enderror
  	</div>
	<div class="mb-3">
    	<label for="exampleInputEmail1" class="form-label">Username</label>
    	<input type="text" class="form-control" name="username">
    	@error('username')
    	<div class="invalid-feedback"></div>
    	{{$message}}
    	@enderror
  	</div>

	<div class="mb-3">
    	<label for="exampleInputEmail1" class="form-label">Email address</label>
    	<input type="email" class="form-control" name="email">
    	@error('email')
    	<div class="invalid-feedback"></div>
    	{{$message}}
    	@enderror
  	</div>

	<div class="mb-3">
    	<label for="exampleInputPassword1" class="form-label">Password</label>
    	<input type="password" class="form-control" name="password">
    	@error('password')
    	<div class="invalid-feedback"></div>
    	{{$message}}
    	@enderror
  	</div>
  	</div>
  	<!-- <div class="mb-3 form-check">
    	<input type="checkbox" class="form-check-input" id="exampleCheck1">
    	<label class="form-check-label" for="exampleCheck1">Check me out</label>
  	</div> -->
	<button type="submit" class="btn btn-primary">Submit</button>

	</form>
	@if(session()->has('register'))
		{{session('register')}}
		<a href="/login">login</a> 
		@endif
	<br>
	<a href="/">Back</a>
	</div>
	@endsection