@extends('css.layout')
	
@section('isi')
<div class="container my-3">
	<h2>Ubah barang</h2>
	<form method="post" action="/logout">
		@csrf
		<button type="submit">Logout</button>
	</form>

	<form method="post" action="/sewa/edit/proses/{{$title}}">
	@csrf
	<div class="w-50">
	<div class="mb-3">
    	<label for="exampleInputEmail1" class="form-label">Nama barang</label>
    	<input type="text" class="form-control" name="nama_barang" placeholder="{{$title}}" value="{{$title}}">
    	@error('username')
    	<div class="invalid-feedback"></div>
    	{{$message}}
    	@enderror

    	<br>
    	<label for="exampleInputEmail1" class="form-label">Tanggal sewa</label>
    	<!-- <input type="datetime-local" class="" name="tgl_sewa"> -->
    	<input type="date" class="" name="tgl_sewa" value="{{$sb['tgl_sewa']}}">
    	@error('username')
    	<div class="invalid-feedback"></div>
    	{{$message}}
    	@enderror

    	<label for="exampleInputEmail1" class="form-label">Tanggal kembali</label>
    	<input type="date" class="" name="tgl_kembali" value="{{$sb['tgl_kembali']}}">
    	@error('username')
    	<div class="invalid-feedback"></div>
    	{{$message}}
    	@enderror
    
    	<br><br>
    	<label for="exampleInputEmail1" class="form-label">Jumlah barang : {{$sb->jumlah_barang}}/{{$sb->harga}}</label>
    	<div class="d-flex">
    	
    	<select name="jumlah_barang">
    		@while ($jml <= $barang->stock)
    		<option value="{{$jml}}">{{$jml}}</option>
    		@php $jml++ @endphp
    		@endwhile
    	</select>
    	</div>

    	<br>
    	<p>Harga satuan barang : {{$barang->harga_barang}}</p>
  	</div>

    	

	
  	<!-- <div class="mb-3 form-check">
    	<input type="checkbox" class="form-check-input" id="exampleCheck1">
    	<label class="form-check-label" for="exampleCheck1">Check me out</label>
  	</div> -->
	<button type="submit" class="btn btn-primary">Ubah</button>
	</form>
	@if(session()->has('sewa'))
		{{session('sewa')}}
		<a href="">cek barang</a> 
		@endif
	@if ($errors->any())
	<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
</div>
@endsection