<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'Surat';
    protected $primaryKey = 'id_surat';
    protected $fillable = ['jenis_surat'];
    public $timestamps = false;
}
