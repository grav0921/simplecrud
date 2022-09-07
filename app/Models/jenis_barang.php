<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_barang extends Model
{
    use HasFactory;

    protected $fillable = [
    	'id_jenis',
    	'jenis_barang'
    ];

    public function barang(){
    	return $this->hasMany(barang::class);
    }

    public function sewa_barang(){
    	return $this->hasMany(sewa_barang::class);
    }
}
