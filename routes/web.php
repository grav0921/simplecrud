<?php

use Illuminate\Support\Facades\Route;
use App\Models\file;
use App\Models\User;
use App\Models\barang;
use App\Models\jenis_barang;
use App\Models\sewa_barang;
use App\Models\kamar;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home',function(){
	return redirect('/user');
});

// Route::get('/sewa/proses/{id}',function($id){
// 	return $id;
// });

Route::get('/home2', [TaskController::class, 'index'])->name('home');
Route::get('/create', [TaskController::class, 'create'])->name('home');
Route::post('/create/proses', [TaskController::class, 'store'])->name('home');
Route::get('/show/item', [TaskController::class, 'show'])->name('home');
Route::get('/edit/item/{task}', [TaskController::class, 'edit'])->name('home');
Route::post('/edit/proses/{task}', [TaskController::class, 'update'])->name('home');
Route::get('/hapus/item/{task}', [TaskController::class, 'destroy'])->name('home');

// Route::get('/home30', [App\Http\Controllers\API\TaskController::class, 'index'])->name('home');
Route::get('/home3',function(){
	return view('homeoldd');
});

// Route::resource('/task', 'TaskController@index');


Route::get('/', function () {
	$barang = barang::all();
	$jb = jenis_barang::all();
	$kamar = kamar::all();
    return view('home/index',[
    	'title'=>'camp123.com',
    	'cek'=>"cek",
    	'barang'=>$barang, 
    	'jb'=>$jb,
    	'kamar'=>$kamar
    ]);
})->middleware('guest');

Route::get('/kategori', [App\Http\Controllers\kategori::class, 'return2']);
Route::get('/kategori/{id}',function(jenis_barang $id){
	
	$kamar = kamar::all();
	
	// return $sb;
	return view('home/kategori',[
		'title'=>'kategori',
		'cek'=>$id,
	]);
});

Route::get('/kamar/{id}',function(kamar $id){
	$jb = jenis_barang::all();
	$kamar = kamar::where('id', $id)->first();
	// return $id->nomor_kamar;
	return view('home/kamar',[
		'title'=>'kamar',
		'cek'=>$id,
		'kamar'=>$kamar,
		'data'=>'www'
	]);
});

Route::get('/view/transaksi/{id}',function(user $id){
	// return $id->transaksi;
	return view('users/detailtransaksi',[
		'title'=>'transaksi',
		'id'=>$id
	]);
})->middleware('auth');

// Route::get('/detailsewa/{jenis_user}',function(user $id){
// 	return ;
// 	$jb = jenis_barang::all();
// 	$kamar = kamar::where('id', $id)->first();
// 	// return $id->nomor_kamar;
// 	return view('home/kamar',[
// 		'cek'=>$id,
// 		'kamar'=>$kamar,
// 		'data'=>'www'
// 	]);
// });

Route::get('/detailsewa/{id}', [App\Http\Controllers\detailsewacontroller::class, 'index'])->middleware('auth');

Route::get('/sewa/{id}', [App\Http\Controllers\sewacontroller::class, 'index'])->middleware('auth');
Route::get('/sewa/edit/barang/{id}', [App\Http\Controllers\sewacontroller::class, 'edit'])->middleware('auth');
Route::post('/sewa/proses/{id}', [App\Http\Controllers\sewacontroller::class, 'sewa']);
Route::post('/sewa/edit/proses/{id}', [App\Http\Controllers\sewacontroller::class, 'update']);
Route::get('/sewa/hapus/barang/{id}', [App\Http\Controllers\sewacontroller::class, 'hapussb']);



Route::get('/sewa/kamar/{id}', [App\Http\Controllers\sewacontroller::class, 'kamar'])->middleware('auth');
Route::post('/sewa/kamar/proses/{id}', [App\Http\Controllers\sewacontroller::class, 'sewakamar'])->middleware('auth');
Route::post('/sewa/editkamar/proses/{id}', [App\Http\Controllers\sewacontroller::class, 'updatesewakamar'])->middleware('auth');
Route::get('/sewa/edit/kamar/{id}', [App\Http\Controllers\sewacontroller::class, 'kamaredit'])->middleware('auth');
Route::get('/sewa/hapus/kamar/{id}', [App\Http\Controllers\sewacontroller::class, 'hapussk']);


Route::get('/login', [App\Http\Controllers\logincontroller::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [App\Http\Controllers\logincontroller::class, 'auth']);

Route::get('/register', [App\Http\Controllers\registercontroller::class, 'index'])->name('login')->middleware('guest');
Route::post('/register', [App\Http\Controllers\registercontroller::class, 'register']);

Route::post('/bayar/{id}', [App\Http\Controllers\transaksicontroller::class, 'bayar'])->middleware('auth');

Route::get('/isi/saldo/{id}', [App\Http\Controllers\transaksicontroller::class, 'saldo'])->middleware('auth');
Route::post('/isi/saldo/proses/{id}', [App\Http\Controllers\transaksicontroller::class, 'isisaldo']);

// Route::get('/user', function(){
// 	return view('users.admin');
// })->middleware('auth');
Route::get('/user', function(){
	// $jenis = User::select('id_jenis')->where('username',$request)->first();
	$jenis = auth()->user()->username;
	$check = User::where('username', $jenis)->first();
	// return $check->jenis_user;
	$barang = barang::all();
	$jb = jenis_barang::all();
	$kamar = kamar::all();
	if ($check->jenis_user == 0) {
		return view('users/admin',[
			'url'=>'user',
			'title'=>$jenis,
			'barang'=>$barang,
			'jb'=>$jb,
			'kamar'=>$kamar
		]);
	}elseif($check->jenis_user == 1){
		// return view('users/user',['title'=>$jenis]);
		// return auth()->user()->id;
		return view('users/admin',[
			'title'=>$jenis,
			'barang'=>$barang,
			'jb'=>$jb,
			'kamar'=>$kamar
		]);
		// return $barang;
	}
	return view('login');
})->middleware('auth');




Route::post('/logout',[App\Http\Controllers\logincontroller::class, 'logout']);

