@extends('css.layout')
	@section('isi')
	<div class="container my-3">
	
	<h3>persediaan alat sewa camping dan penginapan</h3>
	<br>
	@yield('container')
	<!-- @auth
	<form method="post" action="/logout">
		@csrf
		<button type="submit">Logout</button>
	</form>
	@endauth -->

	<!-- @guest
	<a href="/login">login</a>
	<a href="/register">register</a>
	@endguest
	 -->
	<h5>Gear camp list</h5>
	@foreach ($jb as $jb)
	<h5><a href="/kategori/{{$jb->id}}">{{$jb->jenis_barang}}</a></h5>
		<!-- @foreach ($jb->barang as $b)
		<ul><li>
			<a href="/kategori/{{$b->jenis_barang->id}}">{{$b->nama_barang}}</a>
			<p>Harga = {{$b->harga_barang}}/day</p>
		</li></ul>
		@endforeach -->
	
	@endforeach
	<h5>Home stay list</h5>
	@foreach ($kamar as $kamar)
		<h5><a href="/kamar/{{$kamar->id}}">{{$kamar->nomor_kamar}}</a></h5>
			<!-- <ul><li>
				<p class="p-0">Harga = {{$kamar->harga_kamar}}</p>
				<p class="p-0">{{$kamar->deskripsi}}</p>
			</li></ul> -->
	@endforeach
	</div>




	

	@endsection