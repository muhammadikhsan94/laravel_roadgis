<?php

namespace App\Http\Controllers;
use App\Models\Lapor;
use App\Models\Foto;
use App\Models\Kategori;
use App\Models\DetailLapor;
use App\Models\Admin;
use Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $user = Auth::user()->id;

        $data = DetailLapor::with(['Lapor', 'Admin'])->orderBy('id_lapor', 'DESC')->get();

        return view('admin.home', compact('data', 'user'));
    }

    public function read($id_lapor)
    {

        $user = Auth::user()->id;
        
        $data = Lapor::with(['Foto', 'Kategori', 'DetailLapor.Admin'])->get();
        $data = $data->find($id_lapor);

        //dd($data->toArray());

        return view('admin.data_pengaduan', compact('data', 'user'));

    }

    public function update(Request $request)
    {

        $user = Auth::user()->id;
        
        if($user == "3"){
            DetailLapor::where('id_lapor', $request->id_lapor)
            ->update(['disposisi' => $request->disposisi]);
        } else {
            DetailLapor::where('id_lapor', $request->id_lapor)
            ->update(['proses_perbaikan' => $request->proses_perbaikan]);
        }; 

        return redirect ('admin')->with('alert-success','Data berhasil Diubah.');

    }
}
