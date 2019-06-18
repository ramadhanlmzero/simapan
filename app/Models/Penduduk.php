<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';
    protected $primaryKey = 'nik';
    protected $fillable = [
        'nik', 'no_kk', 'no_rt', 'nama', 'jenis_kelamin', 'alamat', 'agama', 'tgl_lahir', 'tempat_lahir', 'status_keluarga', 'status_kawin', 'pendidikan', 'pekerjaan', 'kewarganegaraan'
    ];
    public $timestamps = false;

    public function rt()
    {
        return $this->belongsTo(RT::class);
    }
}
