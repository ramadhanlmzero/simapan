<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RW extends Model
{
    protected $table = 'rw';
    protected $primaryKey = 'id_rw';
    protected $fillable = [
        'no_rw', 'nama_rw', 'id_kelurahan'
    ];
    public $timestamps = false;
}
