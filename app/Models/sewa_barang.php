<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sewa_barang extends Model
{
    use HasFactory;

    protected $fillable=[
    'user_id',
	'barang_id',
    'nama_barang',
	'tgl_sewa',
	'tgl_kembali',
	'jumlah_barang',
	'harga'
	];

	public function barang(){
		return $this->belongsTo(barang::class);
	}

	public function jenis_barang(){
    	return $this->belongsTo(jenis_barang::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    	// return"wwww";
    }

    public function transaksi(){
    	return $this->belongsTo(transaksi::class);
    	// return"wwww";
    }
}
