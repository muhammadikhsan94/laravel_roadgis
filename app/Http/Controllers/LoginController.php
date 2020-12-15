<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials)){
            return redirect('v1.admin.home');
        } else {
            return redirect('v1.admin.login');
        }
    }
}
