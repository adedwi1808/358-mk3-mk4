<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function createuser(Request $request)
    {
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/register');
    }

    public function userlogin(Request $request)
    {
        $auth = Auth::attempt([
            'email'=> $request->email,
            'password'=> $request->password
        ]);

        if ($auth){
//            return redirect('/home');
            return "berhasil loginn";
        }else{
            return "Gagal Login Masszeh";
        }
    }
}
