<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapor;
use App\Models\Foto;

class ComplaintController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelapot' => 'required',
            'nik' => 'required',
            'nama_jalan' => 'required',
            'id_kategori' => 'required'
        ]);

        $data = new Lapor;
        $data->nama_pelapor=$request->get('nama_pelapor');
        $data->nik=$request->get('nik');
        $data->alamat=$request->get('alamat');
        $data->no_hp=$request->get('no_hp');
        $data->nama_jalan=$request->get('nama_jalan');
        $data->id_kategori=$request->get('id_kategori');
        $data->lat=$request->get('lat');
        $data->lng=$request->get('lng');
        $data->save();

        $foto = new Foto;
        $foto->foto_jalan=$request->get('foto_jalan');
        $foto->save();

        return redirect('read')->with('alert-success', 'Data updated successfully!');

    }
}
