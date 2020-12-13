<?php

namespace App\Http\Controllers;
use App\Models\Lapor;
use App\Models\Foto;
use App\Models\DetailLapor;

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

    public function index(){
        $data = Lapor::with(['DetailLapor'])->get();
        //dd($data->toArray());
        return view('v1.admin.home', compact('data'));
    }
}
