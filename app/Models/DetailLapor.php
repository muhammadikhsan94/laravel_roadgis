<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailLapor extends Model
{
    protected $table="tbl_detaillapor";
    protected $fillable=['id_lapor', 'disposisi', 'status', 'proses_perbaikan'];
    public $timestamps = false;

    public function lapor()
    {
        return $this->belongsTo('App\Models\Lapor', 'id_lapor');
    }
}