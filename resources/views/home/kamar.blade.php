@extends('css.layout')
	@section('isi')
	<div class="container my-3">
	<h2>Pilih kamar</h2>
	
	
	<h5>{{$cek['nomor_kamar']}}</h5>
	<p>{{$cek->harga_kamar}} / malam</p>
	<p>{{$cek->status}}</p>
	<p>{{$cek->deskripsi}}</p>
	
	@if ($cek->status==="tersedia")
	<a href="/sewa/kamar/{{$cek->nomor_kamar}}">Pesan</a>
	@endif
	
	
	@endsection