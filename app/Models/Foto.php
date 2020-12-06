<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table="tbl_foto";
    protected $fillable=['foto_jalan'];
    public $timestamps = false;
}
