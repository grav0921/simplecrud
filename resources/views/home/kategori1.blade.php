@extends('css.layout')
	@section('isi')
	<div class="container my-3">
	<!-- <h2>Gus Rent</h2> -->
	@foreach ($cek->barang as $jb)
	<!-- <form class="" method="get" action="/sewa/{{$jb->nama_barang}}"> -->
	<h5>{{$jb->nama_barang}}</h5>
	<p>{{$jb->harga_barang}} / hari</p>
	<p>{{$jb->stock}}</p>
	<!-- <button type="submit">Pesan</button> -->
	<!-- </form> -->
	@if ($jb->sewa_barang->isEmpty())
	<a href="/sewa/{{$jb->nama_barang}}">Pesan</a>
	@endif
	
	@foreach ($jb->sewa_barang as $jba)
	@if($jb->nama_barang != $jba->nama_barang)
	<a href="/sewa/{{$jb->nama_barang}}">Pesan</a>
	@else
	<p> sudah dipesan silahkan edit pemesanan <a href="/detailsewa/{{auth()->user()->id}}">detail pesanan</a></a></p>
	@endif
	@endforeach

	@endforeach
	
	@endsection