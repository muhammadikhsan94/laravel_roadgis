<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapor;
use App\Models\Foto;
use App\Models\DetailLapor;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lapor::with(['DetailLapor'])->get();
        //dd($data->toArray());
        return view('home', compact('data'));
    }

    public function create()
    {
        return view('buat_pengaduan');
    }

    public function read()
    {
        return view('data_pengaduan');
    }
}
