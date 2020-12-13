<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapor;
use App\Models\Foto;
use App\Models\Kategori;
use App\Models\DetailLapor;
use App\Models\Disposisi;
use App\Models\Status;

class ComplaintController extends Controller
{
    public function store(Request $request)
    {
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
        $foto = new Foto;
        $foto->id_lapor=$data->id_lapor;
        // Define File Upload
        $file = $request->file('foto_jalan');

        $filename = time().'_'.'.'.$file->getClientOriginalExtension();
        $file->move(public_path('img'), $filename);
        $foto->foto_jalan=$filename;

        $foto->save();

        // Save to DetailLapor
        $detail = new DetailLapor;
        $detail->id_lapor=$data->id_lapor;
        $detail->disposisi="Belum Ditentukan";
        $detail->status="Pengajuan";
        $detail->save();

        return redirect('/')->with('alert-success', 'Data updated successfully!');
    }

    public function read()
    {
        $data = Lapor::with(['Foto', 'Kategori'])->orderBy('tanggal_lapor', 'DESC')->get();
        //dd($data->toArray());
        return view('data_pengaduan', compact('data'));
    }

    public function detailLapor($id_lapor){
        $data = Lapor::with(['Foto', 'Kategori', 'DetailLapor'])->get();
        $data = $data->find($id_lapor);
        //dd($data->toArray());
        return view('detail-lapor', compact('data'));
    }
}
