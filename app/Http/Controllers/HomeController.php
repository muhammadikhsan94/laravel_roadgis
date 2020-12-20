<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapor;
use App\Models\DetailLapor;
use App\Models\Foto;
use App\Models\Kategori;
use App\Models\Admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Lapor::with(['DetailLapor'])->get();
        //dd($data->toArray());
        return view('home', compact('data'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function create()
    {
        return view('buat_pengaduan');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        //Save to Lapor Table
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

        // Save to Foto Table        
        if($request->hasFile('foto_jalan')) {
            $i = 0;
            foreach($request->file('foto_jalan') as $files)
            {
                $foto = new Foto;
                $filename = time().'_'.$i.'.'.$files->getClientOriginalExtension();
                $files->move(public_path('images/'), $filename);  
                $foto->id_lapor=$data->id_lapor;
                $foto->foto_jalan = $filename;
                $foto->save();
                $i++;
            };
        };

        // Save to DetailLapor
        $detail = new DetailLapor;
        $detail->id_lapor=$data->id_lapor;
        $detail->disposisi="3";
        $detail->status="Pengajuan";
        $detail->save();

        return redirect('/')->with('alert-success', 'Data updated successfully!');
    }

    public function read()
    {
        $data = Lapor::with(['Foto', 'Kategori'])->orderBy('tanggal_lapor', 'DESC')->get();
        return view('data_pengaduan', compact('data'));
    }

    public function detailLapor($id_lapor){
        $data = Lapor::with(['Foto', 'Kategori', 'DetailLapor.Admin'])->get();
        $data = $data->find($id_lapor);
        return view('detail-lapor', compact('data'));
    }

}
