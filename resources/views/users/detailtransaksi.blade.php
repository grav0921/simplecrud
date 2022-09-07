@extends('css.layout')
	
@section('isi')
<div class="container my-3">
	<!-- <h1>Gus Rent</h1> -->
    <h4>Detail transaksi {{auth()->user()->username}}</h4>
	<a href="/detailsewa/{{auth()->user()->id}}">back</a>
    <br>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                
                <h5 class="text-center my-4">Detail sewa</h5>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Jenis sewa</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($id->sewa_barang as $sb)
                        <tr>
                        <td>{{ $sb->nama_barang }}</td>
                        <td>{{ $sb->harga }}</td>
                        @endforeach
                        </tr>
                        @foreach ($id->sewa_kamar as $sk)
                        <td>{{ $sk->nomor_kamar }}</td>
                        <td>{{ $sk->harga }}</td>
                        @endforeach
                        
                    </tbody>
                </table>
                @foreach ($id->transaksi as $tr)
                <h5>Total harga : {{$tr->total_harga}}</h5>
                <h5>Waktu transaksi : {{$tr->waktu_transaksi}}</h5>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection