<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';
    protected $primaryKey = 'id_kota';
    protected $fillable = [
        'nama_kota'
    ];
    public $timestamps = false;
}
