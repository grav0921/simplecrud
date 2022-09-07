@extends('css.layout')
	
@section('isi')
<div class="container my-3">
	<!-- <h1>Gus Rent</h1> -->
    <h4>Saldo {{auth()->user()->username}}</h4>
	
    <br>
    <form method="post" action="/isi/saldo/proses/{{$id}}">
        @csrf
        <label for="exampleInputEmail1" class="form-label">Input saldo</label>
        @if ($saldo)
        <input type="text" class="form-control w-50" name="isi_saldo" placeholder="saldo saat ini : {{$saldo->isi_saldo}}">
        @else
        <input type="text" class="form-control w-50" name="isi_saldo" placeholder="saldo saat ini : 0">
        @endif
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection