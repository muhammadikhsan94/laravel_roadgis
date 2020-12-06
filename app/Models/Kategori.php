<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table="tbl_kategori";
    protected $primaryKey="id_kategori";
    protected $fillable=['nama_kategori', 'icon'];
}
