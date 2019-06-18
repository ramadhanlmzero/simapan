<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';
    protected $primaryKey = 'id_surat';
    protected $fillable = [
        'jenis_surat'
    ];
    public $timestamps = false;
}
