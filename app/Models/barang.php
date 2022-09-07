<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $fillable = [
    	'jenis_barang_id',
    	'nama_barang',
    	'kode_barang',
    	'harga_barang',
    	'stock'
    ];

    public function jenis_barang(){
    	return $this->belongsTo(jenis_barang::class);
    }

    public function sewa_barang(){
        return $this->hasMany(sewa_barang::class);   
    }
}
