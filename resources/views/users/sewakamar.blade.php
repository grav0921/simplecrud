@extends('css.layout')
	
@section('isi')
<div class="container my-3">
	<h2>Tambah kamar</h2>
	<form method="post" action="/logout">
		@csrf
		<button type="submit">Logout</button>
	</form>

	<form method="post" action="/sewa/kamar/proses/{{$title}}">
	@csrf
	<div class="w-50">
	<div class="mb-3">
    	<label for="exampleInputEmail1" class="form-label">Nomor kamar</label>
    	<input type="text" class="form-control" name="nomor_kamar" placeholder="{{$title}}" value="{{$title}}">
    	

    	<br>
    	<label for="exampleInputEmail1" class="form-label">Check in</label>
    	<!-- <input type="datetime-local" class="" name="tgl_sewa"> -->
    	<input type="datetime-local" class="" name="check_in">
    	

    	<label for="exampleInputEmail1" class="form-label">Check out</label>
    	<input type="datetime-local" class="" name="check_out">
    	
    	<p>Harga sewa kamar 12 jam : {{$kamar->harga_kamar}}</p>
    	
    	
    	</div>

    	<br>
  	</div>

    	

	
  	<!-- <div class="mb-3 form-check">
    	<input type="checkbox" class="form-check-input" id="exampleCheck1">
    	<label class="form-check-label" for="exampleCheck1">Check me out</label>
  	</div> -->
	<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	@if(session()->has('sewakamar'))
		{{session('sewakamar')}}
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