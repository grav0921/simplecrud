<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sewa_kamar extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id',
		'kamar_id',
    	'nomor_kamar',
		'check_in',
		'check_out',
		'total_kamar',
		'harga'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function transaksi(){
        return $this->belongsTo(transaksi::class);
        // return"wwww";
    }
}
