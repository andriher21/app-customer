<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('Auth.login');
    }
    public function loginpost(Request $request){
        $data =[
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(Auth::attempt($data)){
            return redirect('/home');
        }
        return back()->with('error','Email or Password salah');
    }
    /**
     * Summary of logout
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success','Kamu berhasil logout');
    }
}
