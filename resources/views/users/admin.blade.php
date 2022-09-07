
@extends('home.index')
	@section ('container')
	<h3>{{$title}}</h3>
	<!-- <form method="post" action="/logout">
		@csrf
		<button type="submit">Logout</button>
	</form> -->
	<!-- <a href="/detailsewa/{{auth()->user()->id}}">Detail sewa</a> -->
	@endsection