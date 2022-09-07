<!--  -->
@extends('home.index')
	@section ('container')
	<h1>{{$title}}</h1>
	<form method="post" action="/logout">
		@csrf
		<button type="submit">Logout</button>
	</form>
	<a href="/detailsewa/{{auth()->user()->username}}">Detail sewa</a>
	@endsection