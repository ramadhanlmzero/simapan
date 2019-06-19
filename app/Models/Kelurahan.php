<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $primaryKey = 'id_kelurahan';
    protected $fillable = [
        'nama_kelurahan', 'id_kecamatan'
    ];
    public $timestamps = false;
}
