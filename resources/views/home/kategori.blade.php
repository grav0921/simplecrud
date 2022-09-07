@extends('css.layout')
	@section('isi')
	<div class="container my-3">
	<h2>Pilih barang</h2>
	@foreach ($cek->barang as $jb)
	
	<h5>{{$jb->nama_barang}}</h5>
	<p>{{$jb->harga_barang}} / hari</p>
	@if ($jb->stock > 0)
	<p>{{$jb->stock}}</p>
	@else
	<p>Kosong</p>
	@endif
	<a href="/sewa/{{$jb->nama_barang}}">Pesan</a>
	@endforeach

	@endsection