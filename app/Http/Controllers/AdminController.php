<?php

namespace App\Http\Controllers;
use App\Models\Lapor;
use App\Models\Foto;
use App\Models\Kategori;
use App\Models\DetailLapor;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $data = Lapor::with(['DetailLapor'])->get();
        //dd($data->toArray());
        return view('v1.admin.home', compact('data'));
    }

    public function read($id_lapor){
        $data = Lapor::with(['Foto', 'Kategori', 'DetailLapor'])->get();
        $data = $data->find($id_lapor);
        //dd($data->toArray());
        return view('v1.admin.data_pengaduan', compact('data'));
    }
}
