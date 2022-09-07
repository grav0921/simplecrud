<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\barang;
use App\Models\jenis_barang;
use App\Models\sewa_barang;
use App\Models\sewa_kamar;
use App\Models\transaksi;
use App\Models\saldo;

class detailsewacontroller extends Controller
{
    public function index(user $id){
    	// $id = $username->id;
    	// return redirect()->back();
    	$data = user::all();
    	$b = barang::all();
    	$barang = sewa_barang::all();
    	// $barang = sewa_barang::where('user_id',2)->get();
    	$sewa_kamar = sewa_kamar::all();
    	// $hargasb = sewa_barang::select('harga')->get();
    	// $hargask = sewa_kamar::select('harga')->get();
    	$hargasb = sewa_barang::where('user_id',$id->id)->sum('harga');
    	$hargasb += sewa_kamar::where('user_id',$id->id)->sum('harga');
    	// $ht = $hargasb + $hargask;

    	$saldo = saldo::where('user_id',$id->id)->first();
    	if (!$saldo) {
    		$saldo = saldo::where('user_id',0)->first();

    	}
    	$transaksi = transaksi::all();
    	// return $saldo->jumlah_saldo;
    	return view('users/detailsewa',[
    		'url'=>'detailsewa',
    		'title'=>auth()->user()->username,
    		'data'=>$data,
    		'id'=>$id,
    		'barang'=>$barang,
    		'total_harga'=>$hargasb,
    		'sewa_kamar'=>$sewa_kamar,
    		'transaksi'=>$transaksi,
    		'saldo'=>$saldo,
    		'jml'=>1
    	]);
    }
}
