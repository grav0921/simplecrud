<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;

class kategori extends Controller
{
	// public $sdr = 'ini sdr';

    public function return($id)
    {

    	return view('home/kategori',['title'=>'kategori']);
    	// return $id;
    }

    public function return2()
    {

    	return view('home/kategori',['title'=>'kategori']);
    	// return $id;
    }
    
    // return echo "string";
}
