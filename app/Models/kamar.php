<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    use HasFactory;

    protected $fillable = [
    	'sewa_kamar_id',
    	'nomor_kamar',
		'harga_kamar',
		'status'
    ];

    public function sewa_kamar(){
    	return $this->belongsTo(sewa_kamar::class);
    }
}
