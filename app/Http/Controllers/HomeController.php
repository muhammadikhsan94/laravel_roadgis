<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_aduan;
use App\Models\Lapor;
use App\Models\Foto;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function create()
    {
        return view('buat_pengaduan');
    }

    public function read()
    {
        return view('data_pengaduan');
    }

    public function store(Request $request)
    {
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
        $foto->id_lapor=$data->id_lapor;
        $foto->foto_jalan=$request->file('foto_jalan')->getClientOriginalName();
        $foto->save();

        return redirect('/')->with('alert-success', 'Data updated successfully!');
    }
}
