<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class logincontroller extends Controller
{
    public function index(){
    	return view('auth.login',['title'=>'login']);
    }
    public function auth(Request $request){
    	$credit = $request->validate([
    		'username'=> 'required',
    		'password'=> 'required'
    	]);

    	if (Auth::attempt($credit)) {
    		$hk = $request->session()->regenerate();
    		// return $hk;
    		return redirect()->intended('/user');
    	}

    	return back()->with('login','Login gagal coba lagi');

    }

    public function logout(){
    	Auth::logout();
    	request()->session()->invalidate();
    	request()->session()->regenerateToken();
    	return redirect('/login')->with('logout');
    }
}
