<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $primaryKey = 'id_kecamatan';
    protected $fillable = [
        'nama_kecamatan', 'id_kota'
    ];
    public $timestamps = false;
}
