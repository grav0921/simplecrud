<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\barang;
use App\Models\sewa_barang;
use App\Models\kamar;
use App\Models\sewa_kamar;
use Carbon\Carbon;


class sewacontroller extends Controller
{
    public function index($id){
    	$data = user::all();
    	$barang = barang::where('nama_barang',$id)->first();
    	return view('users/sewa',[
    		'title'=>$id,
    		'data'=>$data,
    		'barang'=>$barang,
    		'jml'=>1
    	]);
    }
 
     public function inde(){
    	return view('users/sewa',[
    		'title'=>'aa',
    		'jml'=>0
    	]);
    }

    public function sewa(Request $request,$id){
    	$create = $request->validate([
    		'nama_barang'=>'required|min:3|max:10|',
    		'tgl_sewa'=>'required',
    		'tgl_kembali'=>'required',
    		'jumlah_barang'=>'required|max:10'
    	]);
    	$get = barang::where('nama_barang',$create['nama_barang'])->first();
    	$auth = auth()->user()->id;
    	

    	$diff = abs(strtotime($request->tgl_sewa) - strtotime($request->tgl_kembali)); 

		$years   = floor($diff / (365*60*60*24)); 
		$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
		$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    	
    	$hargab = $get['harga_barang'];

    	$harga = $hargab*$days*$request->jumlah_barang;
    	if ($harga==0) {
    		$harga = $hargab*$request->jumlah_barang;
    	}

    	$stock = $get['stock']-$request->jumlah_barang;
		$create = ($create+[
    		"barang_id"=>"$get[id]",
    		"user_id"=>"$auth",
    		"harga"=>"$harga"
    	]);
		
    	
    	$id = barang::where('nama_barang',$id)->first();
    	sewa_barang::create($create);
    	barang::where('nama_barang',$create['nama_barang'])->update(['stock'=>$stock]);
    	return redirect('/detailsewa/'.$auth)->with('sewa','berhasil di pesan');
    }

    public function edit($id){
    	$data = user::all();
    	$sb = sewa_barang::where('nama_barang', $id)->first();
    	$barang = barang::where('nama_barang',$id)->first();
    	return view('users/editsewa',[
    		'title'=>$id,
    		'data'=>$data,
    		'barang'=>$barang,
    		'sb'=>$sb,
    		'jml'=>1
    	]);
    }

    public function update(Request $request,$id){
    	$create = $request->validate([
    		'nama_barang'=>'required|min:3|max:10|',
    		'tgl_sewa'=>'required',
    		'tgl_kembali'=>'required',
    		'jumlah_barang'=>'required|max:10'
    	]);
    	$get = barang::where('nama_barang',$create['nama_barang'])->first();
    	$getsb = sewa_barang::where('nama_barang',$create['nama_barang'])->first();

    	$diff = abs(strtotime($request->tgl_sewa) - strtotime($request->tgl_kembali)); 
		$years   = floor($diff / (365*60*60*24)); 
		$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
		$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    	
    	$hargab = $get['harga_barang'];
    	$jb = $request->jumlah_barang;
    	$sb = $getsb['jumlah_barang'];
    	$sbh = $getsb['harga'];

        $auth = auth()->user()->id;

    	$harga = $hargab*$days*$jb;
    	if ($harga==0) {
    		$harga = $hargab*$jb;
    	}

    	if ($sb>$jb) {
			$sb = $sb-$jb;
			$sb+=$get['stock'];
			
			sewa_barang::where('nama_barang',$create['nama_barang'])->update([
				'nama_barang'=>$create['nama_barang'],
				'tgl_sewa'=>$create['tgl_sewa'],
				'tgl_kembali'=>$create['tgl_kembali'],
				'jumlah_barang'=>$jb,
				'harga'=>$harga
			]);
			barang::where('nama_barang',$create['nama_barang'])->update(['stock'=>$sb]);
			return redirect('/detailsewa/'.$auth)->with('sewa','berhasil di pesan');
    	}
    	$stock = $get['stock']-$request->jumlah_barang;
		
    	
    	$id = barang::where('nama_barang',$id)->first();
    	barang::where('nama_barang',$create['nama_barang'])->update(['stock'=>$stock]);
    	sewa_barang::where('nama_barang',$create['nama_barang'])->update([
				'nama_barang'=>$create['nama_barang'],
				'tgl_sewa'=>$create['tgl_sewa'],
				'tgl_kembali'=>$create['tgl_kembali'],
				'jumlah_barang'=>$jb,
				'harga'=>$harga
			]);
    	return redirect('/detailsewa/'.$auth)->with('sewa','berhasil di pesan');
    }
    public function hapussb(sewa_barang $id){
    	$stock = $id->nama_barang;
    	$barang = barang::where('nama_barang',$stock)->first();
    	$jb = $barang->stock;
    	$jb+=$id->jumlah_barang;
        $idus = auth()->user()->id;
    	
    	barang::where('nama_barang',$stock)->update(['stock'=>$jb]);
    	
    	
    	sewa_barang::where('nama_barang',$stock)->delete();
    	return redirect('/detailsewa/'.$idus)->with('hapus','berhasil dihapus');
    }
















    public function kamar($id){
    	$data = user::all();
    	$kamar = kamar::where('nomor_kamar',$id)->first();
    	return view('users/sewakamar',[
    		'title'=>$id,
    		'data'=>$data,
    		'kamar'=>$kamar,
    		'jml'=>1
    	]);
    }

    public function sewakamar(Request $request,$id){
    	$create = $request->validate([
    		'nomor_kamar'=>'required|min:3|max:10|',
    		'check_in'=>'required',
    		'check_out'=>'required',
    	]);
    	$get = kamar::where('nomor_kamar',$create['nomor_kamar'])->first();
    	$auth = auth()->user()->id;
    	

    	$diff = abs(strtotime($request->check_in) - strtotime($request->check_out)); 

		$years   = floor($diff / (365*60*60*24)); 
		$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
		$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		$hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));
    	
    	$hargak = $get['harga_kamar'];
    	

    	$days*=24;
    	$hargaw = $hargak/12;


    	$total_jam = $days+$hours;
    	$harga = $hargaw*$total_jam;

    	
    	if ($total_jam<12) {
    		$message = "pastikan waktu dipilih dengan tepat";
    	}
    	$message = "pesan berhasil";

		$create = ($create+[
    		"kamar_id"=>"$get[id]",
    		"user_id"=>"$auth",
    		"harga"=>"$harga"
    	]);
		
    	
    	
    	sewa_kamar::create($create);
    	kamar::where('nomor_kamar',$create['nomor_kamar'])->update(['status'=>'kosong']);
    	return redirect('/detailsewa/'.$auth)->with('sewa','berhasil di pesan');
    }

    public function kamaredit($id){
    	$data = user::all();
    	$sk = sewa_kamar::where('nomor_kamar', $id)->first();
    	$kamar = kamar::where('nomor_kamar',$id)->first();
    	return view('users/editsewakamar',[
    		'title'=>$id,
    		'data'=>$data,
    		'kamar'=>$kamar,
    		'sk'=>$sk,
    		'jml'=>1
    	]);
    }

    public function updatesewakamar(Request $request,$id){
    	$create = $request->validate([
    		'nomor_kamar'=>'required|min:3|max:10|',
    		'check_in'=>'required',
    		'check_out'=>'required',
    	]);

    	$get = kamar::where('nomor_kamar',$create['nomor_kamar'])->first();
    	$auth = auth()->user()->id;
    	

    	$diff = abs(strtotime($request->check_in) - strtotime($request->check_out)); 

		$years   = floor($diff / (365*60*60*24)); 
		$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
		$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		$hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));
    	
    	$hargak = $get['harga_kamar'];
    	

    	$days*=24;
    	$hargaw = 20000/12;


    	$total_jam = $days+$hours;
    	$harga = $hargaw*$total_jam;

    	
    	if ($total_jam<12) {
    		$message = "pastikan waktu dipilih dengan tepat";
    	}
    	$message = "pesan berhasil";

		$create = ($create+[
    		"kamar_id"=>"$get[id]",
    		"user_id"=>"$auth",
    		"harga"=>"$harga"
    	]);
		
    	
    	
    	
    	sewa_kamar::where('nomor_kamar',$create['nomor_kamar'])->update([
				'nomor_kamar'=>$create['nomor_kamar'],
				'check_in'=>$create['check_in'],
				'check_out'=>$create['check_out'],
				'harga'=>$harga
			]);
    	return redirect('/detailsewa/'.$auth)->with('sewa','berhasil di pesan');
    }

    public function hapussk(sewa_kamar $id){
    	$nomor_kamar = $id->nomor_kamar;
        $idus = auth()->user()->id;
    	$kamar = kamar::where('nomor_kamar',$nomor_kamar)->first();
    	
    	kamar::where('nomor_kamar',$nomor_kamar)->update(['status'=>'tersedia']);
    	
    	
    	sewa_kamar::where('nomor_kamar',$nomor_kamar)->delete();
    	return redirect('/detailsewa/'.$idus)->with('hapus','berhasil dihapus');
    }
}
