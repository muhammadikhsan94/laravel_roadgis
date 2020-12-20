<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }

    public function auth(Request $request)
    {
        $email = $request->email;
        $pwd   = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $pwd])) {
            return redirect('/admin')->with('success', 'Berhasil Masuk!');
        }else{
            return redirect('/login')->with('failed', 'Maaf email atau password yang anda masukan tidak sesuai!');
        }
    }
}
