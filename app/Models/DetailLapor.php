<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailLapor extends Model
{
    protected $table="tbl_detaillapor";
    protected $fillable=['id_lapor', 'disposisi', 'detail_lapor', 'proses_perbaikan'];
}
