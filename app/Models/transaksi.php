<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
	'total_harga',
	'waktu_transaksi'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function barang(){
        return $this->belongsTo(barang::class);
    }

    public function sewa_barang(){
    	return $this->hasMany(sewa_barang::class);
    	// return"wwww";
    }

    public function sewa_kamar(){
    	return $this->hasMany(sewa_kamar::class);
    	// return"wwww";
    }
}
