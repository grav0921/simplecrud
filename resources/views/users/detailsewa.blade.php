@extends('css.layout')
	
@section('isi')
<div class="container my-3">
	<h3>Detail pemesanan {{$title}}</h3>
	<a href="/user">Tambah sewa</a>
	<br>
	@if(session()->has('hapus'))
				{{session('hapus')}}
				
				@endif
	@php @endphp
	
	<form class="" method="post" action="/bayar/{{auth()->user()->id}}">
		<label class="form-label">Total harga : </label>
		<input type="text" name="total_harga" value="{{$total_harga}}" style="border: none; padding: 0;">
		<br>
		
		<p>saldo anda : {{$saldo->jumlah_saldo}}</p>	
		<button type="submit">Bayar</button>
		@csrf

	</form>
	<!-- {{$id->nama}} -->



<!-- 
	@foreach ($data as $dat)
	{{$dat}}
	@endforeach -->
	<!-- <h4>sss</h4> -->
	<br>
	@if (\Session::has('saldo'))
    <p>{!! \Session::get('saldo') !!} <a href="/isi/saldo/{{auth()->user()->id}}">Isi saldo</a> </p>
    @elseif ((\Session::has('isisaldo')))
    <p>{!! \Session::get('isisaldo') !!}</p>

    @elseif ((\Session::has('saldosuccess')))
    <p>{!! \Session::get('saldosuccess') !!} <a href="/view/transaksi/{{auth()->user()->id}}">view transaksi</a> </p>

    @elseif ((\Session::has('pilih')))
    <p>{!! \Session::get('pilih') !!}</p>
	@endif
	<div class="container">
		<div class="card mt-5">
			<div class="card-body">
				
				<h5 class="text-center my-4">Detail sewa barang</h5>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nama barang</th>
							<th>Jumlah barang</th>
							<th>Tanggal sewa</th>
							<th>Tanggal kembali</th>
							<th>Total harga</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($id->sewa_barang as $a)
						<tr>
							<td>{{ $a->nama_barang }}</td>
							<td>{{ $a->jumlah_barang }}</td>
							<td>{{ $a->tgl_sewa }}</td>
							<td>{{ $a->tgl_kembali }}</td>
							<td>{{ $a->harga }}</td>
							<td><a href="/sewa/edit/barang/{{$a->nama_barang}}">Edit</a>/<a href="/sewa/hapus/barang/{{$a->id}}">Batal</a></td>
							<!-- @if ($transaksi->isEmpty())
							<td><a href="/sewa/edit/barang/{{$a->nama_barang}}">Edit</a>/<a href="/sewa/hapus/barang/{{$a->id}}">Batal</a></td>
							@else

							@foreach ($id->transaksi as $a)

							@if ($a->user_id == $id->id)
							<td>Sudah dibayar</td>
							@endif
							
							@endforeach
							@endif -->
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="card mt-5">
			<div class="card-body">
				
				<h5 class="text-center my-4">Detail sewa kamar</h5>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nomor kamar</th>
							<th>Check in</th>
							<th>Check out</th>
							<th>Total harga</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($id->sewa_kamar as $a)
						<tr>
							<td>{{ $a->nomor_kamar }}</td>
							<td>{{ $a->check_in }}</td>
							<td>{{ $a->check_out }}</td>
							<td>{{ $a->harga }}</td>
							
							<td><a href="/sewa/edit/kamar/{{$a->nomor_kamar}}">Edit</a>/<a href="/sewa/hapus/kamar/{{$a->id}}">Batal</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
@endsection
