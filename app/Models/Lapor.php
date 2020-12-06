<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Lapor extends Model
{
    protected $table="tbl_lapor";
    protected $primaryKey="id_lapor"; 
    protected $fillable=['nama_pelapor', 'nik', 'alamat', 'no_hp', 'nama_jalan', 'id_kategori', 'lat', 'lng'];
    public $timestamps = false;
}