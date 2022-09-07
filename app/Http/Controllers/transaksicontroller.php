<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use App\Models\User;
use App\Models\barang;
use App\Models\sewa_barang;
use App\Models\kamar;
use App\Models\sewa_kamar;
use App\Models\saldo;
use App\Models\transaksi;
use Carbon\Carbon;

class transaksicontroller extends Controller
{
    public function bayar(Request $request, $id){
        $jml = 0;

        if ($id != $jml) {
            $id_tr = transaksi::where('user_id', $jml)->update(['user_id'=>"$id"]);
        }
        $id_tr = transaksi::where('user_id', $id)->first();
        
    	$create = $request->validate([
    		'total_harga'=>'required'
    	]);
    	$time = Carbon::now();
    	$time->toDateTimeString();
    	$user = auth()->user()->id;
        
        
        if ($request->total_harga == $jml){
            return redirect()->back()->with('pilih','tambah barang dulu');
        }

        if ($id != $jml) {
            $saldo = saldo::where('user_id',$jml)->first();
            
        }
        
        $saldo = saldo::where('user_id',$id)->first();

        if(empty($saldo)){
            return redirect()->back()->with('saldo','saldo kurang');
        }

    	if($saldo->jumlah_saldo < $create['total_harga']){
            
    		return redirect()->back()->with('saldo','saldo kurang');
    	}

    	$isisaldo = $saldo->jumlah_saldo - $create['total_harga'];
        
    	$create = ($create+['waktu_transaksi'=>"$time",'user_id'=>"$user"]);
        $createsaldo = [
            'isi_saldo'=>"0",
            'jumlah_saldo'=>"$isisaldo",
            'keluar_saldo'=>"$create[total_harga]"
        ];
        $id_saldo = saldo::where('user_id',$id)->first();
    	saldo::where('user_id',$user)->update($createsaldo);
        $tr = transaksi::where('user_id',0)->first();

        
        
        
        if ($id_tr->user_id != $id) {
            
            transaksi::where('user_id', $jml)->update($create);
        }
        transaksi::where('user_id', $id)->update([
                'waktu_transaksi'=>"$time",
                'total_harga'=>"$request->total_harga"
            ]);
            return redirect('/detailsewa/'.$id)->with('saldosuccess','transaksi berhasil');
    }

    public function saldo($id){
        
    	$saldo = saldo::where('user_id',$id)->first();
    	return view('users/saldo',[
            'title'=>'saldo',
    		'saldo'=>$saldo,
    		'id'=>$id
    	]);
    }

    public function isisaldo(Request $request, $id){
        $jml = 0;
        
        
    	$create = $request->validate([
    		'isi_saldo'=>'required|numeric|max:100000000|min:10000'
    	]);
        $id = auth()->user()->id;
        
        

        if ($id != $jml) {
            $saldo = saldo::where('user_id',$jml)->update(['user_id'=>"$id"]);
        }
        $saldo = saldo::where('user_id',$id)->first();
        
        $js = $create['isi_saldo']+$saldo->jumlah_saldo;
        
        $create = ($create+[
            'jumlah_saldo'=>"$js",
            'keluar_saldo'=>"0",
        ]);
        
    	
        saldo::where('user_id',$id)->update($create);
        
        return redirect('/detailsewa/'.$id)->with('isisaldo','isi saldo berhasil');
    }
}
