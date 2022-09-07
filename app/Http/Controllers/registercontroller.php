<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\saldo;
use App\Models\transaksi;
use Carbon\Carbon;

class registercontroller extends Controller
{
    public function index(){
    	return view('auth.register',["title"=>"register"]);
    }

    public function register (Request $request){
    	$create = $request->validate([
    		'nama'=>'required|min:3|max:10|',
    		'username'=>'required|unique:users',
    		'email'=>'required|unique:users',
    		'password'=>'required|max:10'
    	]);

        $time = Carbon::now();
        $time->toDateTimeString();

    	// return back()->with('login','Login gagal coba lagi');

        // return $request['nama'];
    	$create['password']=bcrypt($create['password']);
    	$create = ($create+['jenis_user'=>'1','user_id'=>1+User::count()]);
        // return $create;
    	User::create($create);
        saldo::create(['user_id'=>"0",'isi_saldo'=>"0",'jumlah_saldo'=>"0",'keluar_saldo'=>"0"]);
        saldo::where('user_id',$request->id)->update(['user_id'=>"$request->id"]);
        transaksi::create(['user_id'=>"0",'total_harga'=>"0",'waktu_transaksi'=>"$time"]);
        transaksi::where('user_id',$request->id)->update(['user_id'=>"$request->id"]);
    	return redirect('register')->with('register','daftar berhasil');

    }
}
